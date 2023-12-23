<!DOCTYPE html>
<html lang="en">

<head>
    <title>Weather App</title>

    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/bootstrap.min.css') }}">
    <style>
        /* Your custom styles here */
        body {
            background: url('{{ asset('image/360_F_461232389_XCYvca9n9P437nm3FrCsEIapG4SrhufP.jpg') }}') no-repeat center center fixed;
            background-size: cover;
        }


        .container {
            margin-top: 50px;
        }

        .weather-form {
            text-align: center;
        }

        .weather-info {
            margin-top: 20px;
        }

        .weather-card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 20px;
        }

        .temp-container {
            display: flex;
            align-items: center;
        }

        .temp {
            font-size: 24px;
            margin-right: 10px;
        }

        .after-temp {
            font-size: 16px;
        }

        .real-feel {
            font-size: 14px;
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
        }
    </style>
</head>

<body>

    <div class="container">
        <h1 class="text-center mt-5">Weather App</h1>

        <form action="{{ url('/weather') }}" method="POST" class="weather-form">
            @csrf
            <div class="input-group input-group-lg">
                <input type="text" class="form-control" id="city" name="city" placeholder="Enter City"
                    required>
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-search"></i> Search
                    </button>
                </div>
            </div>
        </form>

        @if (isset($weatherData))
            <div class="weather-info mt-4">
                <div class="card weather-card">
                    <div class="card-body">
                        <h2 class="card-title">Current Weather in {{ $weatherData['name'] }}</h2>
                        <p class="card-text">Temperature: {{ $weatherData['main']['temp'] }} °C</p>
                        <p class="card-text">Weather: {{ $weatherData['weather'][0]['description'] }}</p>

                        <div class="temp-container">
                            <div class="temp">{{ $weatherData['main']['temp'] }}°<span class="after-temp">C</span>
                            </div>
                            <div class="real-feel">
                                RealFeel® 19°
                            </div>
                        </div>

                        <div class="details-container">
                            <div class="detail">
                                <span class="label">Air Quality</span>
                                <span class="value" style="color: #E9365A">Unhealthy</span>
                            </div>
                            <div class="detail">
                                <span class="label">Wind</span>
                                <span class="value">SSE 8 km/h</span>
                            </div>
                            <div class="detail">
                                <span class="label">Wind Gusts</span>
                                <span class="value">9 km/h</span>
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

    <!-- Add your custom JavaScript for animations here -->

</body>

</html>
