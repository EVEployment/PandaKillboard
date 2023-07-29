<?php

namespace App\GraphQL\Directives;

use Laravel\Scout\Builder as ScoutBuilder;
use Nuwave\Lighthouse\Schema\Directives\BaseDirective;
use Nuwave\Lighthouse\Scout\ScoutBuilderDirective;
use Nuwave\Lighthouse\Support\Contracts\ArgBuilderDirective;
use Nuwave\Lighthouse\Support\Contracts\ArgDirective;
use Nuwave\Lighthouse\Support\Contracts\FieldBuilderDirective;

class QueryLimitDirective extends BaseDirective implements ArgBuilderDirective, ArgDirective
{
    public static function definition(): string
    {
        return /** @lang GraphQL */ <<<'GRAPHQL'
"""
Set the maximum number of results to return.
"""
directive @queryLimit on ARGUMENT_DEFINITION | INPUT_FIELD_DEFINITION
scalar BuilderValue
GRAPHQL;
    }

    /**
     * Apply a "LIMIT $value" clause.
     *
     * @param  \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder  $builder
     * @param  mixed  $value
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function handleBuilder($builder, $value): object {
        // FIXME: move this somewhere else
        if ($value > 100) {
            $value = 100;
        }
        return $builder->limit($value);
    }
}
