<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;


class WeatherReport extends Mailable
{
    use Queueable, SerializesModels;

    public $city;
    public $weatherDetails;

    public function __construct($city, $weatherDetails)
    {
        $this->city = $city;
        $this->weatherDetails = $weatherDetails;
    }

    public function build()
    {
        return $this->subject('Weather Report for ' . $this->city)
                    ->view('emails.weather_report');
    }
}
