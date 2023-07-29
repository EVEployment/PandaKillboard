<?php

namespace App\Repositories;

use App\Concerns\CheckKillmailFlags;
use App\Models\Killmail;
use App\Models\KillmailAttacker;
use App\Models\KillmailItem;
use App\Models\KillmailVictim;
use App\Models\KillmailVictimPosition;
use Illuminate\Support\Facades\DB;

class KillmailRepository {
    use CheckKillmailFlags;

    public function __construct(private EntityRepository $entityRepository) {

    }

    public function isKillmailExists($killmail_id) {
        return Killmail::whereId($killmail_id)->exists();
    }


    public function writeKillmail($killmail_id, $killmail_hash, $killmail_data) {
        [$nearest_celestial_id, $nearest_celestial_distance] = \App\Utils::findNearestCelestial(
            $killmail_data->solar_system_id,
            $killmail_data->victim->position->x,
            $killmail_data->victim->position->y,
            $killmail_data->victim->position->z,
        );

        // FIXME move
        foreach ($killmail_data->attackers as $attacker) {
            if (!is_null(optional($attacker)->character_id))
                dispatch($this->entityRepository->job($attacker->character_id));
            if (!is_null(optional($attacker)->corporation_id))
                if ($this->entityRepository->getTypeByID($attacker->corporation_id) === 'corporation')
                    dispatch($this->entityRepository->job($attacker->corporation_id));
            if (!is_null(optional($attacker)->alliance_id))
                dispatch($this->entityRepository->job($attacker->alliance_id));
        }

        if (!is_null(optional($killmail_data->victim)->character_id))
            dispatch($this->entityRepository->job($killmail_data->victim->character_id));
        if (!is_null(optional($killmail_data->victim)->corporation_id))
            if ($this->entityRepository->getTypeByID($killmail_data->victim->corporation_id) === 'corporation')
                dispatch($this->entityRepository->job($killmail_data->victim->corporation_id));
        if (!is_null(optional($killmail_data->victim)->alliance_id))
            dispatch($this->entityRepository->job($killmail_data->victim->alliance_id));

        $npc = $this->isNPC($killmail_data);
        $solo = $this->isSolo($killmail_data);

        DB::transaction(function () use (
            $solo,
            $npc, $nearest_celestial_distance, $nearest_celestial_id,
                $killmail_hash, $killmail_id, $killmail_data) {
            Killmail::create([
                'id' => $killmail_id,
                'hash' => $killmail_hash,

                'moon_id' => $killmail_data->moon_id ?? null,
                'solar_system_id' => $killmail_data->solar_system_id,
                'killmail_time' => $killmail_data->killmail_time,
                'war_id' => $killmail_data->war_id ?? null,

                'nearest_celestial_id' => $nearest_celestial_id,
                'nearest_celestial_distance' => round($nearest_celestial_distance),

                'pulled' => true,
                'npc' => $npc,
                'solo' => $solo,
            ]);

            // Victim

            KillmailVictim::create([
                'id' => $killmail_id,
                'alliance_id' => $killmail_data->victim->alliance_id ?? null,
                'character_id' => $killmail_data->victim->character_id ?? null,
                'corporation_id' => $killmail_data->victim->corporation_id ?? null,
                'damage_taken' => $killmail_data->victim->damage_taken,
                'faction_id' => $killmail_data->victim->faction_id ?? null,
                'ship_type_id' => $killmail_data->victim->ship_type_id,
            ]);

            KillmailVictimPosition::create([
                'id' => $killmail_id,
                'x' => $killmail_data->victim->position->x,
                'y' => $killmail_data->victim->position->y,
                'z' => $killmail_data->victim->position->z,
            ]);

            // Items

            if (isset($killmail_data->victim->items)) {
                foreach ($killmail_data->victim->items as $item) {
                    $itemEntry = KillmailItem::create([
                        'killmail_id' => $killmail_id,
                        'date' => $killmail_data->killmail_time,
                        'flag' => $item->flag,
                        'item_type_id' => $item->item_type_id,
                        'quantity_destroyed' => $item->quantity_destroyed ?? null,
                        'quantity_dropped' => $item->quantity_dropped ?? null,
                        'singleton' => $item->singleton,
                    ]);
                    if (isset($item->items)) {
                        foreach ($item->items as $subitem) {
                            KillmailItem::create([
                                'killmail_id' => $killmail_id,
                                'date' => $killmail_data->killmail_time,
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
                KillmailAttacker::create([
                    'killmail_id' => $killmail_id,
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
        });
    }
}
