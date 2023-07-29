<?php

namespace App\GraphQL\Directives;

use App\GraphQL\Deferred\PriceBatchLoader;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Execution\BatchLoader\BatchLoaderRegistry;
use Nuwave\Lighthouse\Schema\Directives\BaseDirective;
use Nuwave\Lighthouse\Schema\Values\FieldValue;
use Nuwave\Lighthouse\Support\Contracts\FieldResolver;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

final class FetchPriceDirective extends BaseDirective implements FieldResolver
{
    public static function definition(): string
    {
        return /** @lang GraphQL */ <<<'GRAPHQL'
directive @fetchPrice (
    """
    The name of the related ID field.
    """
    field: String
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
    public function resolveField(FieldValue $fieldValue)
    {
        $fieldValue->setResolver(function ($root, array $args, GraphQLContext $context, ResolveInfo $resolveInfo) {
            $field = $this->fieldArgValue();

            if (is_null($root[$field])) return null;
            if (!array_key_exists('_date', $root)) return null;

            $batchLoader = BatchLoaderRegistry::instance(
                ['model', 'item_prices'],
                function (): PriceBatchLoader {
                    return new PriceBatchLoader();
                }
            );

            return $batchLoader->load($root[$field], $root['_date']);
        });

        return $fieldValue;
    }

    /**
     * Retrieves the field argument for the directive.
     *
     * @throws \Nuwave\Lighthouse\Exceptions\DefinitionException
     */
    public function fieldArgValue(): string
    {
        $attribute = $this->directiveArgValue('field');

        if (! $attribute) {
            throw new DefinitionException(
                "The @{$this->name()} directive requires an `field` argument."
            );
        }

        return $attribute;
    }
}
