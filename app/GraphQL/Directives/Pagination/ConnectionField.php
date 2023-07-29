<?php

namespace App\GraphQL\Directives\Pagination;

use GraphQL\Type\Definition\ResolveInfo;
use Illuminate\Contracts\Pagination\CursorPaginator;
use Illuminate\Pagination\AbstractPaginator;
use Illuminate\Support\Collection;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class ConnectionField {
    /**
     * Resolve page info for connection.
     *
     * @return array<string, mixed>
     */
    public function paginatorResolver(CursorPaginator $paginator): array {

        return [
            'hasPages' => $paginator->hasPages(),
            'hasMorePages' => $paginator->hasMorePages(),
            'onFirstPage' => $paginator->onFirstPage(),
            'onLastPage' => $paginator->onLastPage(),
            'previousCursor' => $paginator->previousCursor()?->encode(),
            'nextCursor' => $paginator->nextCursor()?->encode(),
            'count' => $paginator->count(),
        ];
    }

    /**
     * Resolve edges for connection.
     *
     * @param array<string, mixed> $args
     */
    public function itemResolver(CursorPaginator $paginator, array $args, GraphQLContext $context, ResolveInfo $resolveInfo): array|Collection {
        return $paginator->items();
    }
}
