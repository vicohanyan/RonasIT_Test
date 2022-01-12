<?php

namespace App\Services;

interface WeatherServiceInterface
{
    /**
     * Get weather from api
     * @param string $byObject
     * @param string $object
     * @return array
     */
    public function getWeather(string $byObject,string $object):array;
}
