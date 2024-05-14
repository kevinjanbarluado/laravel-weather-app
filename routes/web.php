<?php

use App\Http\Controllers\WeatherController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('weather');
});

Route::get('/weather', [WeatherController::class, 'show'])->name('weather');
