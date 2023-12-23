<!DOCTYPE html>
<html lang="en">

<head>
    <title>ForecastPal: Ultimate Weather Companion</title>

    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"> <!-- Link to your external CSS file -->
    <link rel="icon" href="{{ asset('image/cloud-cloudy-day-forecast-sun-icon.png') }}">
</head>

<body
    style="background: url('image/360_F_461232389_XCYvca9n9P437nm3FrCsEIapG4SrhufP.jpg') no-repeat center center fixed;
    background-size: cover;">

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
                            placeholder="Enter City" required>
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary rounded-pill">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        @if (isset($weatherData))
            <div class="weather-info">
                <div class="card weather-card col-md-9 offset-1">
                    <div class="card-body">
                        <h2 class="card-title text-center">Current Weather in <b
                                class="city-name">{{ $weatherData['name'] }}</b></h2>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="temp-container">
                                    <div class="temp">{{ $weatherData['main']['temp'] }} °C</div>
                                    <div class="after-temp">Temperature</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="details-container">
                                    <div class="detail">
                                        <div class="label">Weather</div>
                                        <div class="value">{{ $weatherData['weather'][0]['description'] }}</div>
                                    </div>
                                    <!-- Add more details if needed -->
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
