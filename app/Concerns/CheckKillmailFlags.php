<?php

namespace App\Concerns;

use App\Models\InvType;

trait CheckKillmailFlags {
    public function isNPC($killmail_data) {
        $victim = collect($killmail_data->victim);
        if (is_null($victim->get('character_id'))
            && $victim->get('corporation_id') > 1
            && $victim->get('corporation_id') < 2000000) {
            return true;
        }

        $attackers = collect($killmail_data->attackers);
        $hasHumanCharacter = $attackers->contains(fn($item) => $item->character_id >= 4000000);
        $hasHumanCorporation = $attackers->contains(fn($item) => $item->corporation_id >= 2000000);
        return !$hasHumanCharacter && !$hasHumanCorporation;
    }

    public function isSolo($killmail_data) {
        $victimShipTypeID = $killmail_data?->victim?->ship_type_id;
        if (is_null($victimShipTypeID)) return false;

        $victimShipType = InvType::with('group')->find($victimShipTypeID);

        if (in_array($victimShipType->groupID, config('classifier.solo_blacklist'))) {
            return false;
        }

        if ($victimShipType->group->categoryID != 6) {
            // Not ship
            return false;
        }

        $hasOne = false;

        foreach ($killmail_data->attackers as $attacker) {
            if ($attacker->character_id < 4000000) {
                // Not Human
                continue;
            } elseif ($hasOne) {
                return false;
            } else {
                $hasOne = true;
            }

            $attackerShipTypeID = $attacker?->ship_type_id;
            if (is_null($attackerShipTypeID)) return false;
            $attackerShipType = InvType::find($attackerShipTypeID);
            if ($attackerShipType->groupID == 65) return false;
        }

        return $hasOne;
    }

}
