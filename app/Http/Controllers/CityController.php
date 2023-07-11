<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCityRequest;
use App\Http\Requests\UpdateCityRequest;
use App\Models\City;
use App\Services\WeatherService;

class CityController extends Controller
{
    protected $weatherService;

    public function __construct(WeatherService $weatherService)
    {
        $this->weatherService = $weatherService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cities = City::all();

        return view('cities.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCityRequest $request)
    {
        try {
            City::create($request->validated());

            return redirect()->route('cities.index')
                ->with('success', 'City created successfully.');
        } catch (\Exception $e) {
            return redirect()->route('cities.index')
                ->with('error', 'Failed to create city.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(City $city)
    {
        $weather = $this->weatherService->getWeatherByCity($city->name);
        $five_days_data = [];

        return view('cities.show', compact('city', 'weather', 'five_days_data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(City $city)
    {
        return view('cities.edit', compact('city'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCityRequest $request, City $city)
    {
        try {
            $city->update($request->validated());

            return redirect()->route('cities.index')
                ->with('success', 'City updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('cities.index')
                ->with('error', 'Failed to update city.');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city)
    {
        try {
            $city->delete();

            return redirect()->route('cities.index')
                ->with('success', 'City deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('cities.index')
                ->with('error', 'Failed to delete city.');
        }

    }
}
