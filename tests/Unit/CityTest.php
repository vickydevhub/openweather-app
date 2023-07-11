<?php

namespace Tests\Unit;

use App\Models\City;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CityTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * Test creating a city.
     *
     * @return void
     */
    public function testCreateCity()
    {
        $data = [
            'name' => fake()->city,
        ];

        $city = City::create($data);

        $this->assertInstanceOf(City::class, $city);
        $this->assertDatabaseHas('cities', $data);
    }

    /**
     * Test updating a city.
     *
     * @return void
     */
    public function testUpdateCity()
    {
        $city = City::factory()->create();

        $data = [
            'name' => fake()->city,
        ];

        $city->update($data);

        $this->assertEquals($data['name'], $city->name);
        $this->assertDatabaseHas('cities', $data);
    }

    /**
     * Test deleting a city.
     *
     * @return void
     */
    public function testDeleteCity()
    {
        $city = City::factory()->create();

        $city->delete();

        $this->assertDatabaseMissing('cities', [
            'id' => $city->id,
        ]);
    }
}
