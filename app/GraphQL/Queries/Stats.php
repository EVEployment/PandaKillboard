<?php

namespace App\GraphQL\Queries;

use App\Models\Killmail;

class Stats
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        return true;
    }

    public function topKillmailId(): int {
        return Killmail::max('id');
    }

    public function totalKills(): int {
        return Killmail::count();
    }

    public function killsParsedLastHour(): int {
        return Killmail::where('created_at', '>=', now()->subHour())->count();
    }
}
