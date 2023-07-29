<?php

namespace App\GraphQL\Directives\Pagination;

use GraphQL\Error\Error;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Pagination\CursorPaginator;
use Illuminate\Support\Arr;
//use Laravel\Scout\Builder as ScoutBuilder;

class PaginationArgs
{
    /**
     * @var string
     */
    public $cursor;

    /**
     * @var int
     */
    public $limit;

    /**
     * Create a new instance from user given args.
     *
     * @param  array<string, mixed>  $args
     *
     * @throws \GraphQL\Error\Error
     */
    public static function extractArgs(array $args, ?int $paginateMaxCount): self
    {
        $instance = new static();

        $instance->limit = $args['limit'];
        $instance->cursor = Arr::get($args, 'after');

        if ($instance->limit < 0) {
            throw new Error(
                self::requestedLessThanZeroItems($instance->limit)
            );
        }

        // Make sure the maximum pagination count is not exceeded
        if (
            null !== $paginateMaxCount
            && $instance->limit > $paginateMaxCount
        ) {
            throw new Error(
                self::requestedTooManyItems($paginateMaxCount, $instance->limit)
            );
        }

        return $instance;
    }

    public static function requestedLessThanZeroItems(int $amount): string
    {
        return "Requested pagination amount must be non-negative, got {$amount}.";
    }

    public static function requestedTooManyItems(int $maxCount, int $actualCount): string
    {
        return "Maximum number of {$maxCount} requested items exceeded, got {$actualCount}. Fetch smaller chunks.";
    }

    /**
     * Apply the args to a builder, constructing a paginator.
     *
     * @param  \Illuminate\Database\Query\Builder|\Laravel\Scout\Builder|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Relations\Relation  $builder
     */
    public function applyToBuilder(object $builder): CursorPaginator
    {
        // TODO: not supported yet
//        if ($builder instanceof ScoutBuilder) {
//            // TODO remove fallback when requiring Laravel 8.6.0+
//            if ($this->type->isSimple() && ! method_exists($builder, 'simplePaginate')) {
//                $methodName = 'paginate';
//            }
//
//            return $builder->paginate($this->first, 'page', $this->page);
//        }

        // @phpstan-ignore-next-line Relation&Builder mixin not recognized
        return $builder->cursorPaginate($this->limit, ['*'], 'cursor', $this->cursor);
    }
}
