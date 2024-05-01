<!DOCTYPE html>
<html>
<head>
    <title>Send Weather Report</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Custom CSS for centering contents */
        body {
            background-color: #f0f8ff; /* Light blue background color */
            padding: 20px;
        }
        .weather-details {
            max-width: 500px;
            margin: 0 auto;
            background-color: #add8e6; /* Light blue background color */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="weather-details">
        <h1 class="mb-4">Weather Details for {{ $city }}</h1>

        <p><strong>Temperature:</strong> {{ $temperature }}°C</p>
        <p><strong>Humidity:</strong> {{ $humidity }}%</p>
        <p><strong>Precipitation:</strong> {{ $precipitation }} mm</p>
        <p><strong>Condition:</strong> {{ $condition }}</p>

        <hr>

        <form method="post" action="{{ route('sendWeatherReport') }}" class="mb-4">
            @csrf
            <input type="hidden" name="city" value="{{ $city }}">
            <div class="form-group">
                <label for="email">Email Address:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <button type="submit" class="btn btn-primary">Send Weather Report</button>
        </form>
    </div>
</div>

<!-- Bootstrap JS (optional, if needed) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
