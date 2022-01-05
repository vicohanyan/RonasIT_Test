<?php

namespace App\Http\Controllers;

use App\Services\WeatherService;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    private WeatherService $weatherService;

    public function __construct(WeatherService $weatherService)
    {
        $this->weatherService = $weatherService;
    }

    /**
     * @param Request $request
     * @return array
     */
    public function getWeatherByCityName(Request $request): array
    {
        return $this->weatherService->getWeatherByCityName($request->city_name);
    }

    /**
     * @param Request $request
     * @return array
     */
    public function getWeatherByCityID(Request $request): array
    {
        return $this->weatherService->getWeatherByCityID($request->city_id);
    }
}
