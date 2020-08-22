<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Killmail extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'hash', 'time', 'moon_id',
        'solar_system_id', 'war_id', 'position_x', 
        'position_y', 'position_z', 'nearest_celestial_id'
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
        'time'    => 'datetime',
    ];

    // $this->link
    public function getLinkAttribute() {
        return \sprintf("%s/latest/killmails/%d/%s/?datasource=", config('services.eveonline.root'), $this->id, $this->hash, config('services.eveonline.tenant'));
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

    public function nearest_celestial() {
        return $this->belongsTo(MapDenormalize::class, 'nearest_celestial_id', 'itemID');
    }
}
