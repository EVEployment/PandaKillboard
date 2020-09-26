<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Corporation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'ticker',
        'alliance_id', 'member_count',
    ];

    /**
     * @var bool
     */
    public $incrementing = false;

}
