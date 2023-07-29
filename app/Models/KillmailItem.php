<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KillmailItem extends Model
{
    use HasFactory, HasUlids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'killmail_id', 'date', 'container_id', 'flag', 'item_type_id',
        'quantity_destroyed', 'quantity_dropped', 'singleton',
    ];

    public function killmail_victim() {
        return $this->belongsTo(KillmailVictim::class, 'killmail_id', 'id');
    }

    public function killmail() {
        return $this->belongsTo(Killmail::class, 'killmail_id', 'id');
    }

    public function container() {
        return $this->belongsTo(self::class);
    }

    public function items() {
        return $this->hasMany(self::class, 'container_id');
    }

    public function item_type() {
        return $this->belongsTo(InvType::class, 'item_type_id', 'typeID');
    }
}
