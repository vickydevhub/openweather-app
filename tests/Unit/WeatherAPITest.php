<?php

namespace Tests\Unit;

use App\Models\City;
use Tests\TestCase;

class WeatherAPITest extends TestCase
{
    /**
     * Test the weather data API for all cities.
     *
     * @return void
     */
    public function testWeatherDataForAllCities()
    {
        // Retrieve the cities from the database
        $cities = City::all();

        // Make a request to the API for each city and check the response
        foreach ($cities as $city) {
            $response = $this->postJson('/api/v1/weather/'.$city->name);

            $response->assertStatus(200); // Ensure the response is successful

            $response->assertStatus(200);
            // Validate the response structure
            $response->assertJsonFragment([
                'city',
                'temperature',
                'humidity',
            ]);
        }
    }
}
