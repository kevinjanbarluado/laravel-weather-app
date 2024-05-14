<?php

namespace App\Helpers;

use DateTime;

/**
 * Class WeatherHelper
 * 
 * Provides various helper functions for weather-related calculations.
 */
class WeatherHelper
{
    /**
     * Converts a Unix timestamp to the hour of the day (24-hour format).
     *
     * @param int $timestamp Unix timestamp
     * @return string The hour of the day (00-23)
     */
    public static function getHourFromTimestamp(int $timestamp): string
    {
        // Create a DateTime object from the Unix timestamp
        $dateTime = new DateTime('@' . $timestamp);

        // Return the hour part of the time in 24-hour format
        return $dateTime->format('H');
    }

    /**
     * Converts a temperature from Kelvin to Celsius.
     *
     * @param float $temperatureInKelvin Temperature in Kelvin
     * @return float Temperature in Celsius, rounded to the nearest integer
     */
    public static function kelvinToCelsius(float $temperatureInKelvin): float
    {
        // Convert Kelvin to Celsius and round the result
        return round($temperatureInKelvin - 273.15);
    }

    /**
     * Converts a temperature from Celsius to Fahrenheit.
     *
     * @param float $celsius Temperature in Celsius
     * @return float Temperature in Fahrenheit, rounded to one decimal place
     */
    public static function celsiusToFahrenheit(float $celsius): float
    {
        // Convert Celsius to Fahrenheit and round the result to one decimal place
        return round($celsius * 9 / 5 + 32, 1);
    }
}
