<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function index(Request $request)
    {
        $apiKey =  $apiKey = config('services.openweathermap.key');
        $city = $request->city;

        try {
            $response = Http::get("https://api.openweathermap.org/data/2.5/weather", [
                'q' => $city,
                'appid' => $apiKey,
                'units' => 'metric',
            ]);

            $weatherData = $response->json();

            // Check if the API request was successful
            if ($response->successful()) {
                return view('weather.index', compact('weatherData'));
            } else {
                return view('weather.index')->with('error', 'Unable to fetch weather data. Please try again.');
            }
        } catch (\Exception $e) {
            // Handle exceptions (e.g., connection issues)
            return view('weather.index')->with('error', 'An error occurred. Please try again later.');
        }
    }
}
