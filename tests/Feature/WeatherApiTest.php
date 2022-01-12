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
        $this->assertTrue($content->cod == 200);
        $this->assertEquals('Omsk', $content->name);
        $this->assertObjectHasAttribute('id',$content->weather[0]);
        $this->assertObjectHasAttribute('main',$content->weather[0]);
        $this->assertObjectHasAttribute('description',$content->weather[0]);
        $this->assertObjectHasAttribute('icon',$content->weather[0]);
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
        $this->assertTrue($content->cod == 200);
        $this->assertEquals('Omsk', $content->name);
        $this->assertObjectHasAttribute('id',$content->weather[0]);
        $this->assertObjectHasAttribute('main',$content->weather[0]);
        $this->assertObjectHasAttribute('description',$content->weather[0]);
        $this->assertObjectHasAttribute('icon',$content->weather[0]);
        $response->assertStatus(200);
    }
}
