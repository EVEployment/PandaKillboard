<?php

namespace App\GraphQL\Directives\Pagination;

use GraphQL\Language\AST\FieldDefinitionNode;
use GraphQL\Language\AST\NamedTypeNode;
use GraphQL\Language\AST\NonNullTypeNode;
use GraphQL\Language\AST\ObjectTypeDefinitionNode;
use GraphQL\Language\AST\TypeNode;
use GraphQL\Language\Parser;
use Illuminate\Container\Container;
use Illuminate\Contracts\Config\Repository as ConfigRepository;
use Nuwave\Lighthouse\Exceptions\DefinitionException;
use Nuwave\Lighthouse\Schema\AST\ASTHelper;
use Nuwave\Lighthouse\Schema\AST\DocumentAST;
use Nuwave\Lighthouse\Schema\Directives\ModelDirective;

class PaginationManipulator
{
    /**
     * @var \Nuwave\Lighthouse\Schema\AST\DocumentAST
     */
    protected $documentAST;

    /**
     * The class name of the model that is returned from the field.
     *
     * Might not be present if we are creating a paginated field
     * for a relation, as the model is not required for resolving
     * that directive and the user may choose a different type.
     *
     * @var class-string<\Illuminate\Database\Eloquent\Model>|null
     */
    protected $modelClass;

    public function __construct(DocumentAST $documentAST)
    {
        $this->documentAST = $documentAST;
    }

    /**
     * Set the model class to use for code generation.
     *
     * @param  class-string<\Illuminate\Database\Eloquent\Model>  $modelClass
     */
    public function setModelClass(string $modelClass): self
    {
        $this->modelClass = $modelClass;

        return $this;
    }

    /**
     * Transform the definition for a field to a field with pagination.
     *
     * This makes either an offset-based Paginator or a cursor-based Connection.
     * The types in between are automatically generated and applied to the schema.
     */
    public function transformToPaginatedField(
        FieldDefinitionNode &$fieldDefinition,
        ObjectTypeDefinitionNode &$parentType,
        ?int $defaultCount = null,
        ?int $maxCount = null,
        ?ObjectTypeDefinitionNode $edgeType = null
    ): void {
        $this->registerConnection($fieldDefinition, $parentType, $defaultCount, $maxCount, $edgeType);
    }

    protected function registerConnection(
        FieldDefinitionNode &$fieldDefinition,
        ObjectTypeDefinitionNode &$parentType,
        ?int $defaultCount = null,
        ?int $maxCount = null
    ): void {
        $fieldTypeName = ASTHelper::getUnderlyingTypeName($fieldDefinition);

        $connectionTypeName = "{$fieldTypeName}Connection";

        $connectionFieldName = addslashes(ConnectionField::class);

        $connectionType = Parser::objectTypeDefinition(/** @lang GraphQL */ <<<GRAPHQL
            "A paginated list of {$fieldTypeName}."
            type {$connectionTypeName} {
                "Pagination information about the list of $fieldTypeName."
                paginatorInfo: PaginatorInfo! @field(resolver: "{$connectionFieldName}@paginatorResolver")

                "A list of {$fieldTypeName}."
                data: [{$fieldTypeName}!]! @field(resolver: "{$connectionFieldName}@itemResolver")
            }
GRAPHQL
        );
        $this->addPaginationWrapperType($connectionType);

        $fieldDefinition->arguments[] = Parser::inputValueDefinition(
            self::countArgument($defaultCount, $maxCount)
        );
        $fieldDefinition->arguments[] = Parser::inputValueDefinition(/** @lang GraphQL */ <<<'GRAPHQL'
"A cursor after which elements are returned."
after: String
GRAPHQL
        );

        $fieldDefinition->type = $this->paginationResultType($connectionTypeName);
        $parentType->fields = ASTHelper::mergeUniqueNodeList($parentType->fields, [$fieldDefinition], true);
    }

    protected function addPaginationWrapperType(ObjectTypeDefinitionNode $objectType): void
    {
        $typeName = $objectType->name->value;

        // Reuse existing types to preserve directives or other modifications made to it
        $existingType = $this->documentAST->types[$typeName] ?? null;
        if (null !== $existingType) {
            if (! $existingType instanceof ObjectTypeDefinitionNode) {
                throw new DefinitionException(
                    "Expected object type for pagination wrapper {$typeName}, found {$objectType->kind} instead."
                );
            }

            $objectType = $existingType;
        }

        if (
            $this->modelClass
            && ! ASTHelper::hasDirective($objectType, ModelDirective::NAME)
        ) {
            $objectType->directives[] = Parser::constDirective(/** @lang GraphQL */ '@model(class: "' . addslashes($this->modelClass) . '")');
        }

        $this->documentAST->setTypeDefinition($objectType);
    }

    /**
     * Build the count argument definition string, considering default and max values.
     */
    protected static function countArgument(?int $defaultCount = null, ?int $maxCount = null): string
    {
        $description = '"Limits number of fetched items.';
        if ($maxCount) {
            $description .= " Maximum allowed value: {$maxCount}.";
        }
        $description .= "\"\n";

        // TODO always add ! in v6
        $definition = 'limit: Int!'
            . ($defaultCount
                ? " =  {$defaultCount}"
                : '');

        return $description . $definition;
    }

    /**
     * @return \GraphQL\Language\AST\NamedTypeNode|\GraphQL\Language\AST\NonNullTypeNode
     */
    protected function paginationResultType(string $typeName): TypeNode
    {
        $config = Container::getInstance()->make(ConfigRepository::class);
        assert($config instanceof ConfigRepository);
        $nonNull = $config->get('lighthouse.non_null_pagination_results')
            ? '!'
            : '';

        $typeNode = Parser::typeReference(/** @lang GraphQL */ "{$typeName}{$nonNull}");
        assert(
            $typeNode instanceof NamedTypeNode || $typeNode instanceof NonNullTypeNode,
            'We do not wrap the typename in [], so this will never be a ListOfTypeNode.'
        );

        return $typeNode;
    }
}
