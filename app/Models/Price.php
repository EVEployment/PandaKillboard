<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_id',
        'date',
        'adjusted_price',
        'average_price',
    ];

    protected $casts = [
        'date' => 'immutable_date',
    ];
}
