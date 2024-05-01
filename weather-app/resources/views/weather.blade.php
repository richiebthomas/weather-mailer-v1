<!DOCTYPE html>
<html>
<head>
    <title>Weather Information</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Custom CSS for centering contents */
        .center-content {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }
        /* Custom CSS for light blue background */
        body {
            background-color: #f0f8ff; /* Light blue background color */
        }
        /* Custom CSS for card */
        .weather-card {
            max-width: 400px;
            padding: 20px;
            border-radius: 10px;
            background-color: #add8e6; /* Light blue background color */
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>

<div class="container-fluid center-content">
    <div class="weather-card">
        <h1 class="mb-4">Weather Information</h1>
        <form method="post" action="{{ route('fetchWeather') }}" class="mb-4">
            @csrf
            <div class="form-group">
                <label for="city">Enter City:</label>
                <input type="text" class="form-control" id="city" name="city" required>
            </div>
            <button type="submit" class="btn btn-primary">Get Weather</button>
        </form>

        <div class="text-center">
            <h2>Current Weather</h2>
            <p><strong>Temperature:</strong> <?php echo (isset($temperature) && $temperature !== '') ? $temperature . ' °C' : '--'; ?></p>
            <p><strong>Humidity:</strong> <?php echo (isset($humidity) && $humidity !== '') ? $humidity . '%' : '--'; ?></p>
            <p><strong>Precipitation:</strong> <?php echo (isset($precipitation) && $precipitation !== '') ? $precipitation . ' mm' : '--'; ?></p>
            <p><strong>Condition:</strong> <?php echo (isset($condition) && $condition !== '') ? $condition : '--'; ?></p>
        </div>
    </div>
</div>

<!-- Bootstrap JS (optional, if needed) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
