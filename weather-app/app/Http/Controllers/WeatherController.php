<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Mail;
use App\Mail\WeatherReport;

class WeatherController extends Controller
{
    /**
     * Display the weather form.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('weather');
    }

    /**
     * Fetch weather data and display email form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function fetchWeather(Request $request)
    {
        // Validate the request
        $request->validate([
            'city' => 'required|string',
        ]);

        // Retrieve the city from the request
        $city = $request->input('city');

        // Make API request to fetch weather data
        $apiKey = '5329a33cba6e4391a1e84105240105';

        $client = new Client();
        $response = $client->request('GET', 'http://api.weatherapi.com/v1/current.json', [
            'query' => [
                'key' => $apiKey,
                'q' => $city,
                'aqi' => 'yes', // Include Air Quality Index
                'humidity' => 'yes', // Include Humidity
                'precip_mm' => 'yes', // Include Precipitation in mm
            ]
        ]);

        $weatherData = json_decode($response->getBody()->getContents());

        // Extract specific weather details from the response
        $temperature = $weatherData->current->temp_c;
        $humidity = $weatherData->current->humidity;
        $precipitation = $weatherData->current->precip_mm;
        $condition = $weatherData->current->condition->text;

        // Pass weather data to the email form view
        return view('email_form', compact('city', 'temperature', 'humidity', 'precipitation', 'condition'));
    }

    /**
     * Send weather report via email.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendWeatherReport(Request $request)
    {
        // Validate the form inputs
        $request->validate([
            'city' => 'required|string',
            'email' => 'required|email',
        ]);

        // Retrieve city and email address from the form
        $city = $request->input('city');
        $email = $request->input('email');

        try {
            // Make API request to fetch weather data
            $apiKey = '5329a33cba6e4391a1e84105240105';
            $client = new Client();
            $response = $client->request('GET', 'http://api.weatherapi.com/v1/current.json', [
                'query' => [
                    'key' => $apiKey,
                    'q' => $city,
                    'aqi' => 'yes', // Include Air Quality Index
                    'humidity' => 'yes', // Include Humidity
                    'precip_mm' => 'yes', // Include Precipitation in mm
                ]
            ]);

            $weatherData = json_decode($response->getBody()->getContents());

            // Extract specific weather details from the response
            $temperature = $weatherData->current->temp_c;
            $humidity = $weatherData->current->humidity;
            $precipitation = $weatherData->current->precip_mm;
            $condition = $weatherData->current->condition->text;

            // Send weather report email
            Mail::to($email)->send(new WeatherReport($city, [
                'temperature' => $temperature,
                'humidity' => $humidity,
                'precipitation' => $precipitation,
                'condition' => $condition,
            ]));

            // If no exception is thrown, the email was sent successfully
            return redirect('/weather')->with('success', 'Weather report sent successfully.');
        } catch (\Exception $e) {
            // Log the exception or handle the error appropriately
            return redirect()->back()->with('error', 'Failed to send weather report email: ' . $e->getMessage());
        }
    }
}
