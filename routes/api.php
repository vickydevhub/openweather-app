<?php

use App\Http\Controllers\API\WeatherController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::prefix('v1')->middleware(['throttle:30,1'])->group(function () {
    Route::get('/weather', [WeatherController::class, 'index']);
    Route::get('/weather/{city}', [WeatherController::class, 'show']);
});
