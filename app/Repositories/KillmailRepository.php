<?php

namespace App\Repositories;

use App\Models\Killmail as KillmailImpl;

class KillmailRepository {
    public function getSingleKillmail($killmail_id) {
        return KillmailImpl::with(['victim',
            'victim.items',
            'victim.ship_type',
            'attackers'])->find($killmail_id);
    }
}