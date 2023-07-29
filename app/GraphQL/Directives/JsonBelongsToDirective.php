<?php

namespace App\GraphQL\Directives;

use App\GraphQL\Deferred\ModelIdentifierBatchLoader;
use GraphQL\Type\Definition\ResolveInfo;
use Illuminate\Database\Eloquent\Model;
use Nuwave\Lighthouse\Execution\BatchLoader\BatchLoaderRegistry;
use Nuwave\Lighthouse\Schema\Directives\BaseDirective;
use Nuwave\Lighthouse\Schema\Values\FieldValue;
use Nuwave\Lighthouse\Support\Contracts\FieldResolver;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

final class JsonBelongsToDirective extends BaseDirective implements FieldResolver
{
    public static function definition(): string
    {
        return /** @lang GraphQL */ <<<'GRAPHQL'
directive @jsonBelongsTo (
    """
    The name of the related field.
    """
    relation: String

    """
    The name of the destination model.
    """
    model: String!
) on FIELD_DEFINITION
GRAPHQL;
    }

    /**
     * Set a field resolver on the FieldValue.
     *
     * This must call $fieldValue->setResolver() before returning
     * the FieldValue.
     *
     * @param  \Nuwave\Lighthouse\Schema\Values\FieldValue  $fieldValue
     * @return \Nuwave\Lighthouse\Schema\Values\FieldValue
     */
    public function resolveField(FieldValue $fieldValue) : FieldValue
    {
        $fieldValue->setResolver(function ($root, array $args, GraphQLContext $context, ResolveInfo $resolveInfo) {
            $fieldName = $this->definitionNode->name->value;

            $model = $this->modelArgValue();
            $relation = $this->directiveArgValue('relation', $fieldName.'_id');

            if (($root instanceof Model)) {
                $key = $root->getAttribute($relation);
            } else if (is_array($root)) {
                if (!array_key_exists($relation, $root)) return null;
                $key = $root[$relation];
            } else {
                return null;
            }

            if (is_null($key)) return null;

            $batchLoader = BatchLoaderRegistry::instance(
                ['model', $model],
                function () use ($model): ModelIdentifierBatchLoader {
                    return new ModelIdentifierBatchLoader($model);
                }
            );

            return $batchLoader->load($key);
        });

        return $fieldValue;

    }

    /**
     * Retrieves the model argument for the directive.
     *
     * @throws \Nuwave\Lighthouse\Exceptions\DefinitionException
     */
    public function modelArgValue(): string
    {
        $attribute = $this->directiveArgValue('model');

        if (! $attribute) {
            throw new DefinitionException(
                "The @{$this->name()} directive requires an `model` argument."
            );
        }

        return 'App\\Models\\'.$attribute;
    }
}
