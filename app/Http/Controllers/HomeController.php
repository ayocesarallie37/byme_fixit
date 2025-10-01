<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Datos del clima para CDMX
        $weatherData = $this->getWeatherData();
        
        return view('home', [
            'weather' => $weatherData
        ]);
    }

    private function getWeatherData()
    {
        $apiKey = env('OPENWEATHERMAP_API_KEY'); // Guarda tu API Key en .env
        $city = 'Mexico City';
        $url = "https://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$apiKey}&units=metric&lang=es";

        try {
            $response = Http::get($url);
            $data = $response->json();

            return [
                'temp' => round($data['main']['temp']),
                'description' => ucfirst($data['weather'][0]['description']),
                'icon' => $this->getWeatherIcon($data['weather'][0]['main']),
                'city' => $data['name'],
            ];
        } catch (\Exception $e) {
            // Datos por defecto si la API falla
            return [
                'temp' => '--',
                'description' => 'Clima no disponible',
                'icon' => 'fa-cloud-sun',
                'city' => 'Ciudad de México',
            ];
        }
    }

    private function getWeatherIcon($weather)
    {
        $icons = [
            'Clear' => 'fa-sun',
            'Clouds' => 'fa-cloud',
            'Rain' => 'fa-cloud-rain',
            'Thunderstorm' => 'fa-bolt',
            'Snow' => 'fa-snowflake',
        ];
        return $icons[$weather] ?? 'fa-cloud-sun';
    }
}