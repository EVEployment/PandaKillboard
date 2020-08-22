<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;
use App\EseyeFactory;

/**
 * 
 * @method static \App\EseyeFactory instance(\Seat\Eseye\Containers\EsiAuthentication $authentication = null)
 */
class Eseye extends Facade {
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() {
        return EseyeFactory::class;
    }
}
