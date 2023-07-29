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
        'id', 'name', 'ticker', 'ceo_id',
        'alliance_id', 'member_count',
    ];

    /**
     * @var bool
     */
    public $incrementing = false;

    public function alliance() {
        return $this->belongsTo(Alliance::class);
    }

    public function ceo() {
        return $this->belongsTo(Character::class, 'ceo_id');
    }
}
