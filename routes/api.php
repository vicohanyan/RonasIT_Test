<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherController;

/*
|--------------------------------------------------------------------------
| Weather API Routes
|--------------------------------------------------------------------------
*/
Route::prefix('weather')->group(function () {
    Route::get('/get/', [WeatherController::class, 'getWeather'])->name('get_weather');
});
