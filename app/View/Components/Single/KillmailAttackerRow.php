<?php

namespace App\View\Components\Single;

use Illuminate\View\Component;

use App\Models\KillmailAttacker;

class KillmailAttackerRow extends Component {

    public $attacker;
    public $damagePercentage;

    public function __construct(KillmailAttacker $attacker, int $totalDamage) {
        $this->attacker = $attacker;
        $this->damagePercentage = number_format(($attacker->damage_done / $totalDamage) * 100, 1);
    }

    public function render() {
        return view('components.single.killmail-attacker-row');
    }
}
