<?php
function askOpenAI($prompt) {
    $config = require 'config.php';
    $apiKey = $config['OPENAI_API_KEY'];

    $data = [
        "model" => "gpt-4",
        "messages" => [["role" => "user", "content" => $prompt]],
        "temperature" => 0.7
    ];

    $ch = curl_init('https://api.openai.com/v1/chat/completions');
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_HTTPHEADER => [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $apiKey
        ],
        CURLOPT_POSTFIELDS => json_encode($data)
    ]);
    $response = curl_exec($ch);
    curl_close($ch);

    if ($response) {
        $responseData = json_decode($response, true);
        return $responseData['choices'][0]['message']['content'] ?? 'שגיאה בפענוח תשובה';
    }
    return 'שגיאה בשליחת הבקשה ל-OpenAI.';
}
