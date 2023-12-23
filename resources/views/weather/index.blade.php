<!DOCTYPE html>
<html lang="en">

<head>
    <title>Weather App</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include Font Awesome CSS via CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        integrity="sha384-VoUJINyvpqW5LWfBTOuNhGn58ylBOn0l7LFvlxdA/W5gFcEn5gtqiX5dAyJ3ZdjI" crossorigin="anonymous">

    <style>
        /* Your custom styles here */
        body {
            background-color: #f8f9fa;
            /* Light grey background color */
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

                        @php
                            $iconClass = 'fas fa-sun'; // Default icon
                            $weatherCode = $weatherData['weather'][0]['id'];

                            // Map weather codes to FontAwesome icons
                            // ... (same as in your previous code)

                        @endphp

                        <i class="{{ $iconClass }} fa-3x mt-2"></i>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <!-- Include Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Add your custom JavaScript for animations here -->

</body>

</html>
