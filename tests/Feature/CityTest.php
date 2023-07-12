<?php
use App\Models\City;
it('has city page', function () {
    $response = $this->get('/cities');

    $response->assertStatus(200);
});

