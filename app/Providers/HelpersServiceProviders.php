<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Library\Services\GenerateModel;

class HelpersServiceProviders extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('App\Library\Services\DemoOne', function ($app) {
            return new GenerateModel();
          });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
