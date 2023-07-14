<?php
use App\Models\City;
use Illuminate\Http\Response;
use function Pest\Laravel\post;

it('has city page', function () {
    $response = $this->get('/cities');

    $response->assertStatus(200);
});

it('should return 422 if name is missing', function ($name) {
    post(route('cities.store'), [
        'name' => $name,
    ])->assertStatus(302)->assertSessionHasErrors(['name']);
})->with([
    '', 
]);

 