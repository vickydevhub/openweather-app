<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class WeatherService
{
    protected $apiKey;

    public function __construct()
    {
        $this->apiKey = config('services.open_weather.api_key');
    }

    public function getWeatherByCity($city)
    {
        $response = Http::get('https://api.openweathermap.org/data/2.5/forecast', [
            'q' => $city,
            'appid' => $this->apiKey,
            'units' => 'metric',
        ]);

        return $response->json();
    }
}
