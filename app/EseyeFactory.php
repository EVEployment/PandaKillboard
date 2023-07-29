<?php

namespace App;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redis;
use Seat\Eseye\Containers\EsiResponse;
use Seat\Eseye\Eseye as EseyeImpl;
use Seat\Eseye\Containers\EsiAuthentication;
use Seat\Eseye\Exceptions\RequestFailedException;

class EseyeFactory extends EseyeImpl {
    public static function instance(EsiAuthentication $authentication = null): EseyeFactory {
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

    public function invoke(string $method, string $uri, array $uri_data = []): EsiResponse {
        try {
            return parent::invoke($method, $uri, $uri_data);
        } catch (RequestFailedException $e) {
            if (App::environment('local')) {
                // Don't bother set the counter for local development
                throw $e;
            }
            $response = $e->getEsiResponse();
            $errorLimitRemain = $response->getHeaders('x-esi-error-limit-remain');
            $errorLimitReset = $response->getHeaders('x-esi-error-limit-reset');

            Redis::eval(<<<'LUA'
//save the smaller of the error-limit-remain values. set error-limit-reset as ttl

local errorLimitRemain = tonumber(ARGV[1])
local errorLimitReset = tonumber(ARGV[2])
local counter = redis.call('GET', 'esi:error-limit')
if counter then
    counter = tonumber(counter)
    if errorLimitRemain < counter then
        redis.call('SET', 'esi:error-limit', errorLimitRemain, 'EX', errorLimitReset)
    end
else
    redis.call('SET', 'esi:error-limit', errorLimitRemain, 'EX', errorLimitReset)
end
LUA
, 2, $errorLimitRemain, $errorLimitReset);
        }

    }


}
