<!DOCTYPE html>
<html lang="en">

<head>
    <title>ForecastPal: Ultimate Weather Companion</title>
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/bootstrap.min.css') }}">

    <link rel="icon" href="{{ asset('image/cloud-cloudy-day-forecast-sun-icon.png') }}">
    <style>
        body {
            background: url('image/360_F_461232389_XCYvca9n9P437nm3FrCsEIapG4SrhufP.jpg') no-repeat center center fixed;
            background-size: cover;
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            transition: background 0.5s ease-in-out;
        }

        .container {
            margin-top: 50px;
        }

        .weather-card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 20px;
            transition: box-shadow 0.3s ease-in-out;
        }

        .weather-card:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .city-name {
            color: rgba(0, 0, 255, 0.8);
            font-size: 45px;
            transition: color 0.3s ease-in-out;
        }

        .city-name:hover {
            color: #0056b3;
        }

        ::placeholder {
            color: #6c757d;
            opacity: 0.7;
            font-style: italic;
        }

        input:focus::placeholder {
            opacity: 0.5;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            transition: background-color 0.3s ease-in-out, border-color 0.3s ease-in-out;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .card.weather-card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 20px;
            transition: box-shadow 0.3s ease-in-out;
        }

        .card.weather-card:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .details-container {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .detail {
            text-align: center;
        }

        .label {
            font-size: 14px;
            color: #888;
        }

        .value {
            font-size: 16px;
            font-weight: bold;
            transition: color 0.3s ease-in-out;
        }

        .value:hover {
            color: #0056b3;
        }

        h1 {
            font-size: 2.5rem;
            color: #0059ff;
            margin-bottom: 20px;
            transition: color 0.3s ease-in-out;
        }

        h1 i {
            color: #FFD700;
        }

        h1:hover {
            color: #007bff;
        }
    </style>


</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h1 class="text-center" style="color: #0059ff;">
                    <i class="fas fa-cloud-sun" style="color: #FFD700;"></i>&nbsp; Weather App &nbsp;<i
                        class="fas fa-bolt" style="color: #FFD700;"></i>
                </h1>

                <form action="{{ url('/weather') }}" method="POST" class="weather-form">
                    @csrf
                    <div class="input-group input-group-lg">
                        <input type="text" class="form-control rounded-pill" id="city" name="city"
                            placeholder="Enter City"
                            value="@if (isset($city)) {{ $city }} @endif" required>
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary rounded-pill">
                                <i class="fas fa-search"></i> Search
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        @if (isset($weatherData))
            <div class="row">
                <div class="col-md-9 offset-md-1">
                    <div class="weather-info">
                        <div class="card weather-card">
                            <div class="card-body">
                                <h2 class="card-title text-center">
                                    <i class="fas fa-cloud" style="color: #FFD700"></i>
                                    Current Weather in <b class="city-name">{{ $weatherData['name'] }}</b>
                                    <sub><i>{{ $weatherData['sys']['country'] }}</i></sub>
                                </h2>
                                <p class="text-center">
                                    <strong>
                                        <i class="fas fa-clock" style="color: #007BFF; font-size: 15px;"></i>&nbsp;
                                        {{ date_default_timezone_set('Asia/Karachi') }}
                                        {{ date('l, F j, Y g:i A', time()) }}
                                    </strong><br>

                                    <strong>
                                        <i class="fas fa-sun" style="color: #FFD700; font-size: 15px;"></i>&nbsp;Sun
                                        Rise: {{ date('g:i A', $weatherData['sys']['sunrise']) }}
                                    </strong>
                                    <strong>
                                        <i class="fas fa-moon" style="color: #2E3192;font-size: 15px;"></i>&nbsp;Sun
                                        Set: {{ date('g:i A', $weatherData['sys']['sunset']) }}
                                    </strong>
                                </p>

                                <div class="temp-container">
                                    <div class="after-temp">
                                        <b>Temperature:</b>
                                        <b style="font-size: 24px; color: rgba(0, 0, 255, 0.719);">
                                            {{ $weatherData['main']['temp'] }} °C
                                        </b>
                                    </div>

                                    <div class="after-temp">
                                        <b>Feels Like:</b>
                                        <b style="font-size: 24px; color: rgba(0, 0, 255, 0.719);">
                                            {{ $weatherData['main']['feels_like'] }} °C
                                        </b>
                                    </div>

                                    <div class="after-temp">
                                        <b>Min:</b>
                                        <b style="font-size: 24px; color: rgba(0, 0, 255, 0.719);">
                                            {{ $weatherData['main']['temp_min'] }} °C
                                        </b>
                                        <b>Max:</b>
                                        <b style="font-size: 24px; color: rgba(0, 0, 255, 0.719);">
                                            {{ $weatherData['main']['temp_max'] }} °C
                                        </b>
                                    </div>

                                    <div class="after-temp">
                                        <b>Weather:</b>
                                        <b style="font-size: 24px; color: rgba(0, 0, 255, 0.719);">
                                            {{ $weatherData['weather'][0]['main'] }}
                                        </b>
                                    </div>

                                    <div class="after-temp">
                                        <b>Humidity:</b>
                                        <b style="font-size: 24px; color: rgba(0, 0, 255, 0.719);">
                                            {{ $weatherData['main']['humidity'] }}%
                                        </b>
                                    </div>

                                    <div class="after-temp">
                                        <b>TimeZone:</b>
                                        <b style="font-size: 24px; color: rgba(0, 0, 255, 0.719);">
                                            {{ $weatherData['name'] }} Time
                                            (UTC&nbsp;{{ $weatherData['timezone'] / 3600 }}:00)
                                        </b>
                                    </div>

                                    <div class="after-temp">
                                        <b>Cloudiness:</b>
                                        <b style="font-size: 24px; color: rgba(0, 0, 255, 0.719);">
                                            {{ $weatherData['clouds']['all'] }}%
                                        </b>
                                    </div>

                                    <div class="after-temp">
                                        <b>Visibility:</b>
                                        <b style="font-size: 24px; color: rgba(0, 0, 255, 0.719);">
                                            {{ $weatherData['visibility'] }} meters
                                        </b>
                                    </div>

                                    <div class="after-temp">
                                        <b>Wind Speed:</b>
                                        <b style="font-size: 24px; color: rgba(0, 0, 255, 0.719);">
                                            {{ $weatherData['wind']['speed'] }} m/s
                                        </b>
                                    </div>
                                    @if (isset($weatherData['rain']))
                                        <div class="after-temp">
                                            <b>Wind Gust:</b>
                                            <b style="font-size: 24px; color: rgba(0, 0, 255, 0.719);">
                                                {{ $weatherData['wind']['gust'] }} m/s
                                            </b>
                                        </div>
                                    @endif
                                    <div class="after-temp">
                                        <b>Wind Direction:</b>
                                        <b style="font-size: 24px; color: rgba(0, 0, 255, 0.719);">
                                            {{ $weatherData['wind']['deg'] }}°
                                        </b>
                                    </div>

                                    @if (isset($weatherData['rain']))
                                        <div class="after-temp">
                                            <b>Rain (last 1 hour):</b>
                                            <b style="font-size: 24px; color: rgba(0, 0, 255, 0.719);">
                                                {{ $weatherData['rain']['1h'] }} mm
                                            </b>
                                        </div>
                                    @endif

                                    <div class="after-temp">
                                        <b>Coordinates:</b>
                                        <b style="font-size: 24px; color: rgba(0, 0, 255, 0.719);">
                                            <i class="fas fa-map-marker-alt"></i> Lon:
                                            {{ $weatherData['coord']['lon'] }},
                                            <i class="fas fa-map-marker-alt"></i> Lat:
                                            {{ $weatherData['coord']['lat'] }}
                                        </b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <script src="{{ asset('fontawesome/js/all.min.js') }}"></script>
    <script src="{{ asset('bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('jQuery/jquery.min.js') }}"></script>
</body>

</html>
