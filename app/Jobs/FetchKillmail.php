<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use App\Killmail;
use App\KillmailAttacker;
use App\KillmailItem;
use App\KillmailVictim;

class FetchKillmail implements ShouldQueue {
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $kill_id;

    public $kill_hash;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($id, $hash) {
        $this->kill_id = $id;
        $this->kill_hash = $hash;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle() {

        $killmailData = \Eseye::invoke('get', '/killmails/{killmail_id}/{killmail_hash}/', [
            'killmail_id' => $this->kill_id,
            'killmail_hash' => $this->kill_hash,
        ]);

        // General metadata

        $killmail = Killmail::firstOrCreate([
            'id' => $this->kill_id,
        ],[
            'hash' => $this->kill_hash,

            'moon_id' => $killmailData->moon_id ?? null,
            'solar_system_id' => $killmailData->solar_system_id,
            'time' => $killmailData->killmail_time,
            'war_id' => $killmailData->war_id ?? null,

            'position_x' => $killmailData->victim->position->x,
            'position_y' => $killmailData->victim->position->y,
            'position_z' => $killmailData->victim->position->z,

            'nearest_celestial_id' => \App\Utils::findNearestCelestial(
                $killmailData->solar_system_id,
                $killmailData->victim->position->x,
                $killmailData->victim->position->y,
                $killmailData->victim->position->z,
            ),
        ]);

        // Victim

        $victim = KillmailVictim::create([
            'killmail_id' => $killmail->id,
            'alliance_id' => $killmailData->victim->alliance_id ?? null,
            'character_id' => $killmailData->victim->character_id ?? null,
            'corporation_id' => $killmailData->victim->corporation_id ?? null,
            'damage_taken' => $killmailData->victim->damage_taken,
            'faction_id' => $killmailData->victim->faction_id ?? null,
            'ship_type_id' => $killmailData->victim->ship_type_id,
        ]);

        // Items
        
        if (isset($killmailData->victim->items)) {
            foreach ($killmailData->victim->items as $item) {
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

        foreach ($killmailData->attackers as $attacker) {
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
