<?php

namespace App\Services;

class WeatherService
{

    private Curl $curl;
    private string $apiKey;
    private string $appUrl;

    /**
     *
     * @param Curl $curl
     * @param string $apiKey
     * @param string $appUrl
     */
    public function __construct(Curl $curl, string $apiKey, string $appUrl)
    {
        $this->curl = $curl;
        $this->apiKey = $apiKey;
        $this->appUrl = $appUrl;
    }

    /**
     * @param string $cityName
     * @return string[]
     */
    public function getWeatherByCityName(string $cityName): array
    {
        return $this->curl->get(
            $this->appUrl,
            [
                "appid" => $this->apiKey,
                "q" => $cityName,
            ],
        );
    }

    /**
     * @param string $cityId
     * @return array
     */
    public function getWeatherByCityID(string $cityId): array
    {

        return $this->curl->get(
            $this->appUrl,
            [
                "appid" => $this->apiKey,
                "id" => $cityId,
            ],
        );
    }
}
