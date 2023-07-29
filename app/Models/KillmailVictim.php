<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KillmailVictim extends Model
{
    use HasFactory;

    /**
     * @var bool
     */
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'alliance_id', 'corporation_id', 'character_id',
        'damage_taken', 'faction_id', 'ship_type_id',
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

    public function items() {
        return $this->hasMany(KillmailItem::class);
    }

    public function ship_type() {
        return $this->belongsTo(InvType::class, 'ship_type_id', 'typeID');
    }
}
