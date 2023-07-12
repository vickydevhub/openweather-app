<?php
use App\Models\City;
it('has city page', function () {
    $response = $this->get('/cities');

    $response->assertStatus(200);
});

it('can fetch a weather', function () {
     
     
    // Make a request to the API for each city and check the response
     
    $response = $this->getJson('/api/v1/weather');
 
    $response->assertStatus(200)->assertJson($response);
});
