<?php

namespace App\Providers;

use App\Services\Curl;
use App\Services\WeatherService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerWeatherService();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    private function registerWeatherService()
    {

        $this->app->singleton(Curl::class, function () {
            return new Curl();
        });
        $this->app->singleton(WeatherService::class, function ($app) {
            return new WeatherService(
                $app->make(Curl::class),
                config('weather.api_key'),
                config('weather.app_url'),
                config('weather.default_unit'),
                config('weather.units'),
            );
        });
    }
}
