<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = [
            ['name' => 'New York'],
            ['name' => 'London'],
            ['name' => 'Paris'],
            // Add more cities as needed
        ];

        foreach ($cities as $cityData) {
            City::create($cityData);
        }
    }
}
