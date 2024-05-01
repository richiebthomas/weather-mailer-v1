<?php

use App\Http\Controllers\WeatherController;
Route::get('/weather', [WeatherController::class, 'index'])->name('weather');
Route::match(['get', 'post'], '/fetch-weather', [WeatherController::class, 'fetchWeather'])->name('fetchWeather');
Route::post('/send-weather-report', [WeatherController::class, 'sendWeatherReport'])->name('sendWeatherReport');




