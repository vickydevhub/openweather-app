<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Services\WeatherService;

class WeatherController extends Controller
{
    protected $weatherService;

    public function __construct(WeatherService $weatherService)
    {
        $this->weatherService = $weatherService;
    }

    /**
     * Display weather for all cities stored in DB.
     */
    public function index()
    {
        $cities = City::all();

        $weatherData = [];

        foreach ($cities as $city) {
            $weather = $this->weatherService->getWeatherByCity($city->name);
            $weatherData[$city->name] = $weather;
        }

        return view('weather.index', compact('weatherData'));
    }
}
