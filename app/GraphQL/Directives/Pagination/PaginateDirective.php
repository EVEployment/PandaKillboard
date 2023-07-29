<?php

namespace App\GraphQL\Directives\Pagination;

use GraphQL\Language\AST\FieldDefinitionNode;
use GraphQL\Language\AST\ObjectTypeDefinitionNode;
use GraphQL\Type\Definition\ResolveInfo;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Pagination\CursorPaginator;
use Laravel\Scout\Builder as ScoutBuilder;
use Nuwave\Lighthouse\Schema\AST\DocumentAST;
use Nuwave\Lighthouse\Schema\Directives\BaseDirective;
use Nuwave\Lighthouse\Schema\Values\FieldValue;
use Nuwave\Lighthouse\Support\Contracts\FieldManipulator;
use Nuwave\Lighthouse\Support\Contracts\FieldResolver;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class PaginateDirective extends BaseDirective implements FieldResolver, FieldManipulator
{
    public static function definition(): string
    {
        return /** @lang GraphQL */ <<<'GRAPHQL'
"""
Query multiple model entries as a paginated list.
"""
directive @paginate(

  """
  Specify the class name of the model to use.
  This is only needed when the default model detection does not work.
  """
  model: String

  """
  Point to a function that provides a Query Builder instance.
  This replaces the use of a model.
  """
  builder: String

  """
  Apply scopes to the underlying query.
  """
  scopes: [String!]

  """
  Allow clients to query paginated lists without specifying the amount of items.
  Overrules the `pagination.default_count` setting from `lighthouse.php`.
  Setting this to `null` means clients have to explicitly ask for the count.
  """
  defaultCount: Int

  """
  Limit the maximum amount of items that clients can request from paginated lists.
  Overrules the `pagination.max_count` setting from `lighthouse.php`.
  Setting this to `null` means the count is unrestricted.
  """
  maxCount: Int
) on FIELD_DEFINITION
GRAPHQL;
    }

    public function manipulateFieldDefinition(DocumentAST &$documentAST, FieldDefinitionNode &$fieldDefinition, ObjectTypeDefinitionNode &$parentType): void
    {
        $paginationManipulator = new PaginationManipulator($documentAST);

        if ($this->directiveHasArgument('builder')) {
            // This is done only for validation
            $this->getResolverFromArgument('builder');
        } else {
            $paginationManipulator->setModelClass(
                $this->getModelClass()
            );
        }

        $paginationManipulator->transformToPaginatedField(
            $fieldDefinition,
            $parentType,
            $this->defaultCount(),
            $this->paginateMaxCount()
        );
    }

    public function resolveField(FieldValue $fieldValue): FieldValue
    {
        $fieldValue->setResolver(function ($root, array $args, GraphQLContext $context, ResolveInfo $resolveInfo): CursorPaginator {
            if ($this->directiveHasArgument('builder')) {
                $builderResolver = $this->getResolverFromArgument('builder');

                $query = $builderResolver($root, $args, $context, $resolveInfo);
                assert(
                    $query instanceof QueryBuilder || $query instanceof EloquentBuilder || $query instanceof ScoutBuilder || $query instanceof Relation,
                    "The method referenced by the builder argument of the @{$this->name()} directive on {$this->nodeName()} must return a Builder or Relation."
                );
            } else {
                $query = $this->getModelClass()::query();
            }

            $query = $resolveInfo
                ->argumentSet
                ->enhanceBuilder(
                    $query,
                    $this->directiveArgValue('scopes', [])
                );

            $paginationArgs = PaginationArgs::extractArgs($args, $this->paginateMaxCount());

            return $paginationArgs->applyToBuilder($query);
        });

        return $fieldValue;
    }

    protected function defaultCount(): ?int
    {
        return $this->directiveArgValue('defaultCount', config('lighthouse.pagination.default_count'));
    }

    protected function paginateMaxCount(): ?int
    {
        return $this->directiveArgValue('maxCount', config('lighthouse.pagination.max_count'));
    }
}
