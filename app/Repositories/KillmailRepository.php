<?php

namespace App\Repositories;

use App\Models\Killmail;
use App\Models\KillmailAttacker;
use App\Models\KillmailItem;
use App\Models\KillmailVictim;

class KillmailRepository {
    public function getSingleKillmail($killmail_id) {
        return Killmail::with([
            'victim',
            'victim.items',
            'victim.ship_type',
            'attackers',
            'attackers.corporation',
            'attackers.character',
            'attackers.alliance',
            'attackers.ship_type',
            'attackers.weapon_type',
            ])->find($killmail_id);
    }

    public function isKillmailExists($killmail_id) {
        return Killmail::whereId($killmail_id)->exists();
    }

    public function writeKillmail($killmail_id, $killmail_hash, $killmail_data) {

        $killmail = Killmail::create([
            'id' => $killmail_id,
            'hash' => $killmail_hash,

            'moon_id' => $killmail_data->moon_id ?? null,
            'solar_system_id' => $killmail_data->solar_system_id,
            'time' => $killmail_data->killmail_time,
            'war_id' => $killmail_data->war_id ?? null,

            'position_x' => $killmail_data->victim->position->x,
            'position_y' => $killmail_data->victim->position->y,
            'position_z' => $killmail_data->victim->position->z,

            'nearest_celestial_id' => \App\Utils::findNearestCelestial(
                $killmail_data->solar_system_id,
                $killmail_data->victim->position->x,
                $killmail_data->victim->position->y,
                $killmail_data->victim->position->z,
            ),
        ]);

        // Victim

        $victim = KillmailVictim::create([
            'killmail_id' => $killmail->id,
            'alliance_id' => $killmail_data->victim->alliance_id ?? null,
            'character_id' => $killmail_data->victim->character_id ?? null,
            'corporation_id' => $killmail_data->victim->corporation_id ?? null,
            'damage_taken' => $killmail_data->victim->damage_taken,
            'faction_id' => $killmail_data->victim->faction_id ?? null,
            'ship_type_id' => $killmail_data->victim->ship_type_id,
        ]);

        // Items

        if (isset($killmail_data->victim->items)) {
            foreach ($killmail_data->victim->items as $item) {
                $itemEntry = KillmailItem::create([
                    'killmail_victim_id' => $victim->id,
                    'flag' => $item->flag,
                    'item_type_id' => $item->item_type_id,
                    'quantity_destroyed' => $item->quantity_destroyed ?? null,
                    'quantity_dropped' => $item->quantity_dropped ?? null,
                    'singleton' => $item->singleton,
                ]);
                if (isset($item->items)) {
                    foreach ($item->items as $subitem) {
                        $subitemEntry = KillmailItem::create([
                            'killmail_victim_id' => $victim->id,
                            'flag' => $item->flag,
                            'container_id' => $itemEntry->id,
                            'item_type_id' => $subitem->item_type_id,
                            'quantity_destroyed' => $subitem->quantity_destroyed ?? null,
                            'quantity_dropped' => $subitem->quantity_dropped ?? null,
                            'singleton' => $subitem->singleton,
                        ]);
                    }
                }
            }
        }

        // Attackers

        foreach ($killmail_data->attackers as $attacker) {
            $attackerEntry = KillmailAttacker::create([
                'killmail_id' => $killmail->id,
                'alliance_id' => $attacker->alliance_id ?? null,
                'character_id' => $attacker->character_id ?? null,
                'corporation_id' => $attacker->corporation_id ?? null,
                'damage_done' => $attacker->damage_done,
                'final_blow' => $attacker->final_blow,
                'security_status' => $attacker->security_status,
                'ship_type_id' => $attacker->ship_type_id ?? null,
                'weapon_type_id' => $attacker->weapon_type_id ?? null,
            ]);
        }

    }
}
