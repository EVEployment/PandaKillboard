<?php

namespace App\GraphQL;

use GraphQL\Error\Error;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Support\Str;
use Nuwave\Lighthouse\WhereConditions\Operator;

class KillmailFilterHandler {
    /**
     * @param \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder $builder
     * @param array<string, mixed> $whereConditions
     */
    public function __invoke(object $builder, array $whereConditions, Model $model = null,
                             string $boolean = 'and'): void {
        if ($builder instanceof EloquentBuilder) {
            $model = $builder->getModel();
        }

        if ($andConnectedConditions = $whereConditions['AND'] ?? null) {
            $builder->whereNested(
                function ($builder) use ($andConnectedConditions, $model): void {
                    foreach ($andConnectedConditions as $condition) {
                        $this->__invoke($builder, $condition, $model);
                    }
                },
                $boolean
            );
        }

        if ($orConnectedConditions = $whereConditions['OR'] ?? null) {
            $builder->whereNested(
                function ($builder) use ($orConnectedConditions, $model): void {
                    foreach ($orConnectedConditions as $condition) {
                        $this->__invoke($builder, $condition, $model, 'or');
                    }
                },
                $boolean
            );
        }

        if (($hasRelationConditions = $whereConditions['HAS'] ?? null) && $model) {
            $nestedBuilder = $this->handleHasCondition(
                $model,
                $hasRelationConditions['relation'],
                $hasRelationConditions['operator'],
                $hasRelationConditions['amount'],
                $hasRelationConditions['condition'] ?? null
            );

            // @phpstan-ignore-next-line Simply wrong, maybe from Larastan?
            $builder->addNestedWhereQuery($nestedBuilder, $boolean);
        }

        if (array_key_exists('column', $whereConditions)) {
            $this->applyFilters($builder, $whereConditions, $boolean);
        }
    }

    /**
     * @param array<string, mixed>|null $condition
     */
    public function handleHasCondition(
        Model  $model,
        string $relation,
        string $operator,
        int    $amount,
        ?array $condition = null
    ): QueryBuilder {
        return $model
            ->newQuery()
            ->whereHas(
                $relation,
                $condition
                    ? function ($builder) use ($condition): void {
                    $this->__invoke(
                        $builder,
                        $this->prefixConditionWithTableName(
                            $condition,
                            $builder->getModel()
                        ),
                        $builder->getModel()
                    );
                }
                    : null,
                $operator,
                $amount
            )
            ->getQuery();
    }

    /**
     * If the condition references a column, prefix it with the table name.
     *
     * This is important for queries which can otherwise be ambiguous, for
     * example when multiple tables with a column "id" are involved.
     *
     * @param array<string, mixed> $condition
     *
     * @return array<string, mixed>
     */
    protected function prefixConditionWithTableName(array $condition, Model $model): array {
        if (isset($condition['column'])) {
            $condition['column'] = $model->getTable() . '.' . $condition['column'];
        }

        return $condition;
    }

    /**
     * @throws Error
     */
    public function applyFilters($builder, array $whereConditions, string $boolean): void {
        $column = $whereConditions['column'];

        if (Str::startsWith($column, 'attackers->')) {
//            $fieldName = Str::after($column, 'attackers->');
            $column = 'content->'.$column;
            if ($whereConditions['operator'] === '=') {
                $builder->whereJsonContains($column, [$column => $whereConditions['value']], $boolean);
            } else {
                throw new Error(
                    "Unsupported operator {$whereConditions['operator']} for column $column."
                );
            }
            return;
        }

        if ($column === 'victim->items->type_id') {
            if ($whereConditions['operator'] === '=') {
                $builder->where(function ($query) use ($whereConditions) {
                    $query->whereJsonContains('victim->items', [['type_id' => $whereConditions['value']]])
                        ->orWhereJsonContains('victim->items',
                            [['items' => [['type_id' => $whereConditions['value']]]]]);
                }, $boolean);
            } else {
                throw new Error(
                    "Unsupported operator {$whereConditions['operator']} for column $column."
                );
            }
            return;
        }

        if (Str::startsWith($column, 'victim->')
            || $column === 'killmail_time'
            || $column === 'war_id'
            || $column === 'solar_system_id'
        ) {
            $column = 'content->'.$column;
        }

        // Laravel's conditions always start off with this prefix
        $method = 'where';

        // The first argument to conditions methods is always the column name
        $args = [$column];

        // Some operators require calling Laravel's conditions in different ways
        $operator = $whereConditions['operator'];
        $arity = match ($operator) {
            'Null', 'NotNull' => 1,
            'In', 'NotIn', 'Between', 'NotBetween' => 2,
            default => 3,
        };

        if (3 === $arity) {
            // Usually, the operator is passed as the second argument to the condition
            // method, e.g. ->where('some_col', '=', $value)
            $args[] = $operator;
        } else {
            // We utilize the fact that the operators are named after Laravel's condition
            // methods so we can simply append the name, e.g. whereNull, whereNotBetween
            $method .= $operator;
        }

        if ($arity > 1) {
            // The conditions with arity 1 require no args apart from the column name.
            // All other arities take a value to query against.
            if (!array_key_exists('value', $whereConditions)) {
                throw new Error(
                    "Did not receive a value to match the WhereConditions for column $column."
                );
            }

            $args[] = $whereConditions['value'];
        }

        // The condition methods always have the `$boolean` arg after the value
        $args[] = $boolean;

        $builder->{$method}(...$args);

    }

}

