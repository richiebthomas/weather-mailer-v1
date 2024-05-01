# Weather App

This is a web application that retrieves weather data from the WeatherAPI.com and generates weather reports using the OpenAI API. Users can fetch weather details for a specific city, view the current weather conditions, and receive a detailed weather report via email.

## Setup

Follow these steps to set up the project locally:

1. **Clone the Repository:**

   ```
   git clone https://github.com/your-username/your-repository.git
   ```
    Install Dependencies:
```
   cd your-repository
   composer install
   npm install
```
This command will install all the PHP and JavaScript dependencies required for the project. Additionally, you may need to install the Guzzle HTTP client library using Composer:
  ```
  composer require guzzlehttp/guzzle
```
This command will add Guzzle HTTP client as a dependency to your project.

Set Environment Variables:

Create a copy of the .env.example file and name it .env. Update the following environment variables with your SMTP details:


```
MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_mailtrap_username
MAIL_PASSWORD=your_mailtrap_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=r@rbt.com
MAIL_FROM_NAME="${APP_NAME}"
```
Replace MAIL_HOST, MAIL_PORT, MAIL_USERNAME, and MAIL_PASSWORD with your Mailtrap SMTP credentials.

Generate Application Key:

    php artisan key:generate

Running the Application

Start the Laravel development server:
```
php artisan serve
```
Access the application in your web browser at http://localhost:8000.
Functionality

    Fetch Weather Data:
        Users can enter a city name to fetch current weather data from WeatherAPI.com.
        The application displays temperature, humidity, precipitation, and weather condition for the specified city.

    Generate Weather Report:
        After fetching weather data, users can request a detailed weather report generated using the OpenAI API.
        The weather report includes a summary of the weather conditions for the specified city.

    Email Weather Report:
        Users can enter an email address to receive the weather report via email.
        The application uses Laravel Mail to send the weather report to the specified email address.

Screenshots
