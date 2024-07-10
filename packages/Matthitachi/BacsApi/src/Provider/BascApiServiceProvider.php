<?php

namespace Matthitachi\BacsApi;

use Illuminate\Support\ServiceProvider;

class BacsApiServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/config/bacsapi.php', 'bacsapi');
    }

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/api.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/config/bacsapi.php' => config_path('bacsapi.php'),
            ], 'config');
        }
    }
}
