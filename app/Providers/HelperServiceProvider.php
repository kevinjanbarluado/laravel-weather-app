<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Helpers\WeatherHelper;

class HelperServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->singleton(WeatherHelper::class, function () {
            return new WeatherHelper();
        });
    }
}
