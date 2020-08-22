<?php

namespace App\Repositories;

use App\Killmail as KillmailImpl;

class Killmail {
    public function getSingleKillmail($killmail_id) {
        return KillmailImpl::with(['victim', 
            'victim.items', 
            'victim.ship_type', 
            'attackers'])->find($killmail_id);
    }
}
