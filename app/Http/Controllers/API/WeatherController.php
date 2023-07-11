<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\WeatherResource;
use App\Models\City;
use App\Services\WeatherService;

class WeatherController extends BaseController
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
            $weatherData[] = [
                'city' => $city->name,
                'weather' => $weather,
            ];
        }
        $data = WeatherResource::collection($weatherData);

        return $this->sendResponse($data, 'All cities weather data.');
    }

    /**
     * Display weather for city passed in DB
     */
    public function show($city)
    {
        $city = City::where('name', $city)->first();

        if (! $city) {
            return response()->json(['error' => 'City not found'], 404);
        }

        $weather = $this->weatherService->getWeatherByCity($city->name);

        return new WeatherResource([
            'city' => $city->name,
            'weather' => $weather,
        ]);
    }
}
