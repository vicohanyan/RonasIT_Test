<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class OpenWeatherMapService implements WeatherServiceInterface
{

    private string $apiKey;
    private string $appUrl;
    private const OBJECT_TYPES = [
        "city_name" => "q",
        "city_id" => "id",
    ];

    /**
     *
     * @param string $apiKey
     * @param string $appUrl
     */
    public function __construct(string $apiKey, string $appUrl)
    {
        $this->apiKey = $apiKey;
        $this->appUrl = $appUrl;
    }

    /**
     * @param string $byObject
     * @param string $object
     * @return string[]
     */
    public function getWeather(string $byObject, string $object): array
    {
        try {
            $response = Http::get(
                $this->appUrl,
                [
                    "appid" => $this->apiKey,
                    self::OBJECT_TYPES[$byObject] => $object,
                ],
            );
        } catch (\Exception $exception) {
            return ["error" => "Something when wrong"];
        }
        return $response->json();
    }
}
