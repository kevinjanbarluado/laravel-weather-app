@php $count = 0 @endphp
@foreach($forecastData['list'] as $forecast)
@if($count < 5) <div class="forecast-item text-center">
    <p>{{ \Carbon\Carbon::parse($forecast['dt_txt'])->format('H:i') }}</p>
    <img src="https://openweathermap.org/img/wn/{{ $forecast['weather'][0]['icon'] }}@2x.png" alt="Forecast Icon" width="50px">
    <p class="small my-0 py-0 fw-bold">{{round( $forecast['main']['temp'],1) }} °C</p>
    <p class="small my-0 py-0 fw-bold">{{\App\Helpers\WeatherHelper::celsiusToFahrenheit($forecast['main']['temp'])}} °F</p>
    </div>
    @php $count++ @endphp
    @endif
    @endforeach