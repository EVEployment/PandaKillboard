<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Seat\Eseye\Configuration;
use App\EseyeFactory;

class EseyeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(EseyeFactory::class, function ($app) {
            return new EseyeFactory;
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $configuration = Configuration::getInstance();
        $configData = config('eseye');

        foreach ($configData as $configKey => $configValue) {
            $configuration->{$configKey} = $configValue;
        }

        
    }
}
