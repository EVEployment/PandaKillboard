<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Staudenmeir\EloquentJsonRelations\HasJsonRelationships;

class Killmail extends Model
{
    use HasJsonRelationships;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'hash', 'source', 'pulled',
        'killmail_time', 'moon_id', 'solar_system_id', 'war_id',
        'nearest_celestial_id', 'nearest_celestial_distance',
        'nearest_structure_id', 'nearest_structure_distance',
        'points', 'npc', 'solo', 'padding', 'ganked', 'awox',
        'aggregated_shipfit', 'aggregated_dropped',
        'aggregated_destroyed', 'aggregated_value',
    ];

    /**
     * @var bool
     */
    public $incrementing = false;

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'content' => 'collection',
        'pulled' => 'boolean',
    ];

    // $this->link
    public function link(): Attribute {
        return Attribute::make(function () {
            return \sprintf("%s/latest/killmails/%d/%s/?datasource=", config('services.eveonline.root'), $this->id, $this->hash, config('services.eveonline.tenant'));
        });
    }

    public function nearest_celestial() {
        return $this->belongsTo(MapDenormalize::class, 'nearest_celestial_id', 'itemID');
    }

    public function nearest_structure() {
        return $this->belongsTo(MapDenormalize::class, 'nearest_structure_id');
    }

    public function attackers() {
        return $this->hasMany(KillmailAttacker::class);
    }

    public function victim() {
        return $this->hasOne(KillmailVictim::class);
    }

    public function solar_system() {
        return $this->belongsTo(MapDenormalize::class, 'solar_system_id', 'itemID');
    }

}
