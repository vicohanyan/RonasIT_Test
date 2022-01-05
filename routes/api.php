<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherController;

/*
|--------------------------------------------------------------------------
| Weather API Routes
|--------------------------------------------------------------------------
*/
Route::prefix('weather')->group(function () {
    Route::get('/by_city_name/', [WeatherController::class, 'getWeatherByCityName'])->name('by_city_name');
    Route::get('/by_city_id/', [WeatherController::class, 'getWeatherByCityID'])->name('by_city_id');
});
