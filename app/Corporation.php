<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Corporation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'ticker', 'closed', 'npc',
        'alliance_id',
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
        'closed' => 'bool',
        'npc'    => 'bool',
    ];
}
