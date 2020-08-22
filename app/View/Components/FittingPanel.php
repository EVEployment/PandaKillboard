<?php

namespace App\View\Components;

use Illuminate\View\Component;

use App\KillmailVictim;

class FittingPanel extends Component
{
    public $shipType;
    public $items;
    public $highSlotCount = 0;
    public $mediumSlotCount = 0;
    public $lowSlotCount = 0;
    public $fits = [];

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(KillmailVictim $victim)
    {
        $this->items = $victim->items;
        $this->shipType = $victim->ship_type;
        $this->parseFit();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.fitting-panel');
    }

    public function parseFit() {
        foreach ($this->items as $item) {
            if (!is_null($item->container_id)) {
                // only interpret root fit
                
                continue;
            }

            if ($item->flag >= 11 && $item->flag <= 34) {
                if ($item->group->categoryID === 7) {
                    // mods
                } else if ($item->group->categoryID === 8) {
                    // charges
                }
            } else if ($item->flag >= 92 && $item->flag <= 99) {
                // rigs
            } else if ($item->flag >= 125 && $item->flag <= 132) {
                //subsystems
            } else if ($item->flag >= 164 && $item->flag <= 171) {
                // services
            }
        }

        foreach ($this->items->whereBetween('flag', [11, 34]) as $item) {
            // mod & fit

        }

        foreach ($this->items->whereBetween('flag', ['92, 99']) as $item) {
            // rigs
        }


    }
}
