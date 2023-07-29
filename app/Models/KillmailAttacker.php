<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KillmailAttacker extends Model
{
    use HasFactory, HasUlids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'killmail_id', 'alliance_id', 'corporation_id', 'character_id',
        'damage_done', 'faction_id', 'final_blow', 'security_status',
        'ship_type_id', 'weapon_type_id'
    ];

    public function killmail() {
        return $this->belongsTo(Killmail::class);
    }

    public function alliance() {
        return $this->belongsTo(Alliance::class);
    }

    public function corporation() {
        return $this->belongsTo(Corporation::class);
    }

    public function character() {
        return $this->belongsTo(Character::class);
    }

    public function ship_type() {
        return $this->belongsTo(InvType::class, 'ship_type_id', 'typeID');
    }

    public function weapon_type() {
        return $this->belongsTo(InvType::class, 'weapon_type_id', 'typeID');
    }
}
