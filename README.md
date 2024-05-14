<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Laravel Weather App
- A Laravel 10-based weather application system delivering accurate forecasts, real-time updates, and customizable settings for a seamless user experience, powered by the OpenWeatherMap API.

## Requirements

- PHP ^8.1

## Installation

1. Clone the repository:
    ```bash
    git clone https://github.com/kevinjanbarluado2/LaravelWeatherApp.git
    cd LaravelWeatherApp
    ```

2. Install dependencies:
    ```bash
    composer install
    ```

3. Copy the `.env.sample` file to `.env`:
    ```bash
    cp .env.sample .env
    ```

4. Generate the application key:
    ```bash
    php artisan key:generate
    ```

5. Add your OpenWeatherMap API key to the `.env` file:
    ```
    WEATHER_API_KEY=your_openweathermap_api_key
    ```

6. Serve the application:
    ```bash
    php artisan serve
    ```
