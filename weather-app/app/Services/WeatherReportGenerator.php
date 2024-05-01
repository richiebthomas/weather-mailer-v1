<?php

namespace App\Services;

use OpenAI;

class WeatherReportGenerator
{
    protected $openai;

    public function __construct()
    {
        // Initialize OpenAI client with your API key
        $apiKey = 'YOUR_OPENAI_API_KEY';
        $this->openai = new OpenAI($apiKey);
    }

    public function generateWeatherReport($city, $temperature, $humidity, $precipitation, $condition)
    {
        // Format weather data into a readable report
        $prompt = "Weather Report for $city\n\n";
        $prompt .= "Temperature: $temperature°C\n";
        $prompt .= "Humidity: $humidity%\n";
        $prompt .= "Precipitation: $precipitation mm\n";
        $prompt .= "Condition: $condition\n";

        // Request weather report generation from OpenAI API
        $response = $this->openai->complete([
            'model' => 'text-davinci-002', // OpenAI model for text generation
            'prompt' => $prompt,
            'max_tokens' => 150, // Adjust token limit as needed
        ]);

        // Extract the generated weather report from the API response
        $weatherReport = $response->choices[0]->text;

        return $weatherReport;
    }
}
