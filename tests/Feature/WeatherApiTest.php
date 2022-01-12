<?php

namespace Tests\Feature;

use Tests\TestCase;

class WeatherApiTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetWeatherByCityName()
    {
        $response = $this->get('/api/weather/get?by_object=city_name&object=omsk');
        $content = json_decode($response->getContent());
        var_dump($content);
        $this->assertTrue($content->cod == 200);
        $response->assertStatus(200);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetWeatherByCityID()
    {
        $response = $this->get('/api/weather/get?by_object=city_id&object=1496153');
        $content = json_decode($response->getContent());
        var_dump($content);
        $this->assertTrue($content->cod == 200);
        $response->assertStatus(200);
    }
}
