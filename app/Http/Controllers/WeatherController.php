<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WeatherController extends Controller
{
    public function getDailyWeather()
    {
        $url = 'http://api.weatherapi.com/v1/forecast.json?key=347264df1b4f41fd823160255251604&q=Manila&days=7&aqi=no&alerts=no';
    
        try {
            $client = new \GuzzleHttp\Client();
            $response = $client->request("GET", $url);
            return json_decode($response->getBody(), true);
        } catch (\Throwable $th) {
            return [
                'error' => 'Unable to fetch weather data. Please try again later.',
            ];
        }
    }
}
