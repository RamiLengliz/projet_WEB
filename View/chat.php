<?php
require '../vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

function getChatGPTResponse($prompt) {
    $apiKey = 'your-openai-api-key';  // Replace with your actual OpenAI API key

    $client = new Client();
    try {
        $response = $client->post('https://api.openai.com/v1/chat/completions', [
            'headers' => [
                'Authorization' => 'Bearer ' . $apiKey,
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    ['role' => 'system', 'content' => 'You are ChatGPT, a large language model trained by OpenAI.'],
                    ['role' => 'user', 'content' => $prompt],
                ],
                'max_tokens' => 150,
                'temperature' => 0.7,
            ],
        ]);

        $body = $response->getBody();
        $data = json_decode($body, true);

        return $data['choices'][0]['message']['content'];

    } catch (RequestException $e) {
        return 'Error: ' . $e->getMessage();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userPrompt = $_POST['prompt'];
    $chatGPTResponse = getChatGPTResponse($userPrompt);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ChatGPT Assistant</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
        }
        textarea {
            width: 100%;
            height: 100px;
            margin-bottom: 10px;
        }
        input[type="submit"] {
            padding: 10px 20px;
            font-size: 16px;
        }
        .response {
            margin-top: 20px;
            padding: 10px;
            background-color: #f0f0f0;
            border: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>ChatGPT Assistant</h1>
        <form method="POST">
            <label for="prompt">Ask ChatGPT:</label><br>
            <textarea id="prompt" name="prompt" required></textarea><br>
            <input type="submit" value="Submit">
        </form>

        <?php if (isset($chatGPTResponse)): ?>
            <div class="response">
                <h2>ChatGPT Response:</h2>
                <p><?php echo nl2br(htmlspecialchars($chatGPTResponse)); ?></p>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
