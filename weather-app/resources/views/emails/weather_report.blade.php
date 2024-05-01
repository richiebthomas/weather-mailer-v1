<!DOCTYPE html>
<html>
<head>
    <title>Weather Report</title>
</head>
<body>
    <h1>Weather Report for {{ $city }}</h1>

    <p><strong>Temperature:</strong> {{ $weatherDetails['temperature'] }}°C</p>
    <p><strong>Humidity:</strong> {{ $weatherDetails['humidity'] }}%</p>
    <p><strong>Precipitation:</strong> {{ $weatherDetails['precipitation'] }} mm</p>
    <p><strong>Condition:</strong> {{ $weatherDetails['condition'] }}</p>
</body>
</html>
