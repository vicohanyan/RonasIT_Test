<?php

namespace App\Http\Controllers;

use App\Http\Requests\WeatherGetRequest;
use App\Services\WeatherServiceInterface;

class WeatherController extends Controller
{
    private WeatherServiceInterface $weatherService;

    public function __construct(WeatherServiceInterface $weatherService)
    {
        $this->weatherService = $weatherService;
    }

    /**
     * @param WeatherGetRequest $request
     * @return array
     */
    public function getWeather(WeatherGetRequest $request): array
    {
        return $this->weatherService->getWeather($request->by_object, $request->object);
    }
}
