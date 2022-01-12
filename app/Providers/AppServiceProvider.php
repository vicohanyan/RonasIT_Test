<?php

namespace App\Providers;

use App\Services\OpenWeatherMapService;
use App\Services\WeatherServiceInterface;
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
        $this->app->singleton(WeatherServiceInterface::class, function () {
            if(env('WEATHER_SERVICE') == "open_weather_map"){
                return new OpenWeatherMapService(
                    config('weather.api_key'),
                    config('weather.app_url'),
                );
            }
            throw new \Exception("Error! Unknown weather service");
        });
    }
}
