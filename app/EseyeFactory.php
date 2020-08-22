<?php

namespace App;

use Seat\Eseye\Eseye as EseyeImpl;
use Seat\Eseye\Containers\EsiAuthentication;

class EseyeFactory extends EseyeImpl {
    public function instance(EsiAuthentication $authentication = null): EseyeFactory {
        if ($authentication) {

            tap($authentication, function ($auth) {

                $auth->client_id = config('esi.client_id');
                $auth->secret = config('esi.client_secret');
            });

            return new self($authentication);
        }

        // Return an unauthenticated Eseye instance
        return new self;
    }
}
