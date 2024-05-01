<!DOCTYPE html>
<html>
<head>
  <title>Weather Report</title>
</head>
<body>
  <h1>Weather Report for <?php echo $city; ?></h1>

  <p><strong>Temperature:</strong> <?php echo $weatherDetails['temperature']; ?>°C</p>
  <p><strong>Humidity:</strong> <?php echo $weatherDetails['humidity']; ?>%</p>
  <p><strong>Precipitation:</strong> <?php echo $weatherDetails['precipitation']; ?> mm</p>
  <p><strong>Condition:</strong> <?php echo $weatherDetails['condition']; ?></p>

  <?php
  use GuzzleHttp\Client;

  $client = new Client();

  try {
      $response = $client->request('POST', 'https://api.edenai.run/v2/text/generation', [
          'json' => [
              'response_as_dict' => true,
              'attributes_as_list' => false,
              'show_original_response' => true,
              'temperature' => 1,
              'max_tokens' => 1000,
              'text' => 'Write email with a greeting, weather summary, and closing statement, remember that the person youre writing to does not have a name or adress or whatever, just give them the summary, nothing else the weather details are temperatureTemperature: ' . $weatherDetails['temperature'] . '°C, Humidity: ' . $weatherDetails['humidity'] . '%, Precipitation: ' . $weatherDetails['precipitation'] . 'mm, Condition: ' . $weatherDetails['condition'] . 'thats all',
              'providers' => 'openai,cohere'
          ],
          'headers' => [
              'Accept' => 'application/json',
              'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyX2lkIjoiOWYzYTBmYTgtMTBmMy00NzM4LThiYWEtNGZjNjU1MzhjMmNhIiwidHlwZSI6ImFwaV90b2tlbiJ9.y5PUOG5HYnVzRp-tB0b-4Mnc2PF0L2-C4FwfmVsGuoE', // Replace with your Eden AI API key
              'Content-Type' => 'application/json',
          ],
      ]);

      $body = $response->getBody()->getContents();
      $responseData = json_decode($body, true);

      // Check if the 'openai' section exists in the response and if generated_text is not empty
      if (isset($responseData['openai']) && !empty($responseData['openai']['generated_text'])) {
          $openaiText = $responseData['openai']['generated_text'];
          echo '<p><strong></strong> ' . $openaiText . '</p>';
      } else {
          echo '<p><strong>Summary:</strong> No response from OpenAI provider</p>';
      }

  } catch (Exception $e) {
      echo '<p><strong>Summary:</strong> Error: ' . $e->getMessage() . '</p>';
  }
  ?>

</body>
</html>
