<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KillmailVictimPosition extends Model
{
    use HasFactory;

    /**
     * @var bool
     */
    public $incrementing = false;

    protected $fillable = [
        'id', 'x', 'y', 'z',
    ];

    public function killmail_victim() {
        return $this->belongsTo(KillmailVictim::class, 'id', 'id');
    }

    public function killmail() {
        return $this->belongsTo(Killmail::class, 'id', 'id');
    }
}
