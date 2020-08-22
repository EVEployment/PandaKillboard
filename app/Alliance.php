<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alliance extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'ticker', 'closed', 
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
    ];
}
