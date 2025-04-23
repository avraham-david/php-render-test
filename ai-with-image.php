<?php

// הגדרת שגיאות ב-PHP
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: POST, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type");
    http_response_code(200);
    exit;
}

// הגדרת CORS
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

// הנתונים שלך
$apiKey = 'AIzaSyBuVkI5yIDoXejGN_4E5gawGlTxk_Mkq4M'; 
$systemInstruction = "עליך לענות בעברית בלבד. אם המשתמש מבקש לסכם או לתרגם את הדף שהוא נמצא בו, ציית. אחרת, אל תתייחס לפרטי הדף שהוא מביא איתו בשאלה.";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // קריאת נתונים
    $input = json_decode(file_get_contents('php://input'), true);

    if (isset($input['text'])) {
        $inputText = $input['text'];

        // שלח את הבקשה ל-Gemini API
        $url = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-pro-exp-03-25:generateContent?key=' . $apiKey;
        $headers = [
            'Content-Type: application/json'
        ];
        $postData = json_encode([
            'contents' => [
                [
                    'parts' => [
                        ['text' => $systemInstruction . ' ' . $inputText]
                    ]
                ]
            ]
        ]);

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($ch);
        if(curl_errno($ch)) {
            echo 'Error: ' . curl_error($ch);
        }
        curl_close($ch);

        echo 'Response: ' . $response;
    } else {
        http_response_code(400);
        echo json_encode(['error' => 'לא התקבל טקסט בבקשה']);
    }
} else {
    http_response_code(405);
    echo 'האתר פתוח! נסו את הסקריפט!';
}
?>
