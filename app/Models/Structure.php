<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Structure extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'x', 'y', 'z',
        'owner_id', 'type_id', 'solar_system_id',
    ];

    public function owner() {
        return $this->belongsTo(Corporation::class, 'owner_id', 'id');
    }

    public function solar_system() {
        return $this->belongsTo(MapDenormalize::class, 'solar_system_id', 'itemID');
    }
}
