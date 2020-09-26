<?php

namespace App\Repositories;

use App\Models\Alliance;
use App\Models\Corporation;
use App\Models\Character;

class EntityRepository {

    /**
     * Get ID Type By Range Check
     * @param int $id ID to check
     * @return string|null Type
     */
    public function getTypeByID(int $id) {
        if ($id >= 0 && $id < 10000) {
            return 'system_item';
        } else if ($id >= 500000 && $id < 1000000) {
            return 'faction';
        } else if ($id >= 1000000 && $id < 2000000) {
            return 'npc_corporation';
        } else if ($id >= 3000000 && $id < 4000000) {
            return 'npc_character';
        } else if ($id >= 9000000 && $id < 10000000) {
            return 'universe';
        } else if ($id >= 10000000 && $id < 11000000) {
            return 'k_region';
        } else if ($id >= 11000000 && $id < 12000000) {
            return 'w_region';
        } else if ($id >= 12000000 && $id < 13000000) {
            return 'abyssal_region';
        } else if ($id >= 20000000 && $id < 21000000) {
            return 'k_constellation';
        } else if ($id >= 21000000 && $id < 22000000) {
            return 'w_constellation';
        } else if ($id >= 22000000 && $id < 23000000) {
            return 'abyssal_constellation';
        } else if ($id >= 30000000 && $id < 31000000) {
            return 'k_solar_system';
        } else if ($id >= 31000000 && $id < 32000000) {
            return 'w_solar_system';
        } else if ($id >= 32000000 && $id < 33000000) {
            return 'abyssal_solar_system';
        } else if ($id >= 40000000 && $id < 50000000) {
            return 'celestial';
        } else if ($id >= 50000000 && $id < 60000000) {
            return 'stargate';
        } else if ($id >= 60000000 && $id < 64000000) {
            return 'station';
        } else if ($id >= 70000000 && $id < 80000000) {
            return 'asteroid';
        } else if ($id >= 90000000 && $id < 98000000) {
            return 'character';
        } else if ($id >= 98000000 && $id < 99000000) {
            return 'corporation';
        } else if ($id >= 99000000 && $id < 100000000) {
            return 'alliance';
        } else if ($id >= 100000000 && $id < 2147483647) {
            return 'character';
        }
        return null;
    }

    public function resolve(int $id) {
        $type = $this->getTypeByID($id);
        switch ($type) {
            case 'faction':
            case 'npc_corporation':
            case 'npc_character':
                return null;
            case 'character':
                return Character::find($id);
            case 'corporation':
                return Corporation::find($id);
            case 'alliance':
                return Alliance::find($id);
            default:
                return null;
        }
    }

    public function isEntityNeedUpdate(int $id) {
        $type = $this->getTypeByID($id);
        switch ($type) {
            case 'alliance': // 3600s
                return !Alliance::whereId($id)->where('updated_at', '>', now()->subHour())->exists();
            case 'corporation': // 3600s
                return !Corporation::whereId($id)->where('updated_at', '>', now()->subHour())->exists();
            case 'character': // 86400s
                return !Character::whereId($id)->where('updated_at', '>', now()->subDay())->exists();
            default:
                return false;
        }
    }

    public function updateAlliance($alliance_id, $alliance_data) {
        return Alliance::updateOrCreate([
            'id' => $alliance_id,
        ], [
            'name' => $alliance_data->name,
            'ticker' => $alliance_data->ticker,
            'date_founded' => $alliance_data->date_founded,
        ]);
    }

    public function updateCorporation($corporation_id, $corporation_data) {
        return Corporation::updateOrCreate([
            'id' => $corporation_id,
        ], [
            'name' => $corporation_data->name,
            'ticker' => $corporation_data->ticker,
            'ceo_id' => $corporation_data->ceo_id,
            'member_count' => $corporation_data->member_count,
            'alliance_id' => $corporation_data->alliance_id ?? null,
        ]);
    }

    public function updateCharacter($character_id, $character_data) {
        return Character::updateOrCreate([
            'id' => $character_id,
        ], [
            'name' => $character_data->name,
            'corporation_id' => $character_data->corporation_id,
            'alliance_id' => $character_data->alliance_id ?? null,
            'faction_id' => $character_data->faction_id ?? null,
            'birthday' => $character_data->birthday,
            'security_status' => $character_data->security_status,
        ]);
    }
}
