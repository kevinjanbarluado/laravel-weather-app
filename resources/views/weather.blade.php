@extends('layout')

@section('content')
@isset($currentWeatherData)
<div id="result-card" class="card shadow card-absolute mt-5 lightbg">
    <div class="card-body text-center bg-gradient d-flex flex-column justify-content-between">
        <h5 class="card-title fw-bold title">{{ $currentWeatherData['name'] }}</h5>
        <h6 class="card-subtitle mb-2 text-secondary h3">{{ $currentWeatherData['temperature_celsius'] }} °C / {{$currentWeatherData['temperature_fahrenheit'] }} °F</h6>
        <div class="text-center">
            <img src="https://openweathermap.org/img/wn/{{ $currentWeatherData['weather'][0]['icon'] }}@4x.png" alt="Weather Icon" width="90px">
        </div>
        <p class="card-text lead fw-bold">{{ $currentWeatherData['weather'][0]['description'] }}</p>
        @isset($forecastData['list'])
        <div class="row mt-4">
            <div id="hourly-forecast" class="col-md-12 d-flex justify-content-between flex-wrap">
                @include('partials.forecast')
            </div>
        </div>
        @endisset
        <a href="/" class="btn btn-outline-primary mt-4 rounded-pill btn-sm w-25 mx-auto">Back</a>
    </div>
</div>
@else
<div class="card-absolute text-center d-flex flex-column">
    <h1 class="h2 mb-3 title fw-bold">Weather App</h1>
    <form class="d-flex input-group justify-content-center" action="{{ route('weather') }}" method="GET">
        <div class="form-group">
            <input id="city" name="city" type="text" class="form-control {{ isset($error) ? 'is-invalid' : '' }}" placeholder="enter city name..." list="list-suggestions">
            <datalist id="list-suggestions">
                <option>Tokyo</option>
                <option>Yokohama</option>
                <option>Kyoto</option>
                <option>Osaka</option>
                <option>Sapporo</option>
                <option>Nagoya</option>
            </datalist>
        </div>
        <button class="btn btn-primary bg-gradient fw-bold" style="border-top-right-radius: 25px; border-bottom-right-radius: 25px;" type="submit" disabled>
            <img src="{{ asset('images/search-icon.svg') }}" alt="Search Icon" /> Search
        </button>
    </form>
    @isset($error)
    <span class="text-danger mt-3fw-bold text-left" role="alert">{{ $error }}</span>
    @endisset
</div>
@endisset
@endsection