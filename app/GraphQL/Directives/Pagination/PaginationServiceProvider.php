<?php

namespace App\GraphQL\Directives\Pagination;

use GraphQL\Language\AST\ObjectTypeDefinitionNode;
use GraphQL\Language\Parser;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Support\ServiceProvider;
use Nuwave\Lighthouse\Events\ManipulateAST;
use Nuwave\Lighthouse\Events\RegisterDirectiveNamespaces;

class PaginationServiceProvider extends ServiceProvider
{
    public function boot(Dispatcher $dispatcher): void
    {
        $dispatcher->listen(
            ManipulateAST::class,
            function (ManipulateAST $manipulateAST): void {
                $documentAST = $manipulateAST->documentAST;
                $documentAST->setTypeDefinition(self::paginatorInfo());
            }
        );

        $dispatcher->listen(
            RegisterDirectiveNamespaces::class,
            static function (): string {
                return __NAMESPACE__;
            }
        );
    }

    protected static function paginatorInfo(): ObjectTypeDefinitionNode
    {
        return Parser::objectTypeDefinition(/** @lang GraphQL */ '
            "Information about pagination using a cursor connection."
            type PaginatorInfo {
                "Determine if there are enough items to split into multiple pages."
                hasPages: Boolean!

                "Determine if there are more items in the data store."
                hasMorePages: Boolean!

                "Determine if the paginator is on the first page."
                onFirstPage: Boolean!

                "Determine if the paginator is on the last page."
                onLastPage: Boolean!

                "The cursor to continue paginating backwards."
                previousCursor: String

                "The cursor to continue paginating forwards."
                nextCursor: String

                "Number of nodes in the current page."
                count: Int!
            }
        ');
    }
}
