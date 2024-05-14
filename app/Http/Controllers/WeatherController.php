<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class WeatherController extends Controller
{
    /**
     * Show the weather information for a given city.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function show(Request $request): View
    {
        // Validate the 'city' input
        $validator = Validator::make($request->all(), [
            'city' => 'required|string|regex:/^[a-zA-Z\s]+$/',
        ]);

        // Return an error view if validation fails
        if ($validator->fails()) {
            return view('weather', ['error' => 'Please enter a valid city name.']);
        }

        // Get the validated city input
        $city = $request->input('city');

        // If no city is provided, return the default weather view
        if (!$city) {
            return view('weather');
        }

        // Get the API key from the configuration
        $apiKey = config('services.weather.api_key');

        // Fetch current weather data from the API
        $response = Http::get("https://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$apiKey}&units=metric");

        // Return an error view if the API request fails
        if ($response->failed()) {
            return view('weather', ['error' => 'City not found']);
        }

        // Parse the current weather data
        $currentWeatherData = $response->json();

        // Fetch weather forecast data from the API
        $forecastResponse = Http::get("https://api.openweathermap.org/data/2.5/forecast?q={$city}&appid={$apiKey}&units=metric");
        $forecastData = $forecastResponse->json();

        // Add temperature in Celsius and Fahrenheit to the current weather data
        if (isset($currentWeatherData['main']['temp'])) {
            $currentWeatherData['temperature_celsius'] = round($currentWeatherData['main']['temp'], 1);
            $currentWeatherData['temperature_fahrenheit'] = \App\Helpers\WeatherHelper::celsiusToFahrenheit($currentWeatherData['temperature_celsius']);
        }

        // Return the weather view with the current weather and forecast data
        return view('weather', compact('currentWeatherData', 'forecastData'));
    }
}
