<?php

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: POST, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type");
    http_response_code(200);
    exit;
}

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

$apiKey = 'AIzaSyBuVkI5yIDoXejGN_4E5gawGlTxk_Mkq4M'; 
$systemInstruction = "עליך לענות בעברית בלבד. אם המשתמש מבקש לסכם או לתרגם את הדף שהוא נמצא בו, ציית. אחרת, אל תתייחס לפרטי הדף שהוא מביא איתו בשאלה.";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);

    if (isset($input['text']) || isset($_FILES['image'])) {
        $inputText = $input['text'] ?? null;
        $image = $_FILES['image'] ?? null;

        // אם יש טקסט בלבד
        if ($inputText) {
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
            curl_close($ch);

            header('Content-Type: application/json');
            echo json_encode([
                'text' => json_decode($response, true)['candidates'][0]['content']['parts'][0]['text'] ?? 'שגיאה: לא התקבלה תשובה תקינה מה-Gemini API'
            ]);
        }

        // אם יש תמונה בלבד
        if ($image) {
            // קוד Base64 לתמונה
            $imageData = base64_encode(file_get_contents($image['tmp_name']));

            $url = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-pro-exp-03-25:generateContent?key=' . $apiKey;
            $postData = json_encode([
                'contents' => [
                    [
                        'parts' => [
                            ['image' => $imageData],
                            ['instruction' => $systemInstruction]
                        ]
                    ]
                ]
            ]);

            $headers = [
                'Content-Type: application/json'
            ];

            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            $response = curl_exec($ch);
            curl_close($ch);

            header('Content-Type: application/json');
            echo json_encode([
                'image_response' => json_decode($response, true) ?? 'שגיאה: לא התקבלה תשובה תקינה מה-Gemini API'
            ]);
        }
    } else {
        http_response_code(400);
        echo json_encode(['error' => 'לא התקבל טקסט או תמונה בבקשה']);
    }
} else {
    http_response_code(405);
    echo 'האתר פתוח! נסו את הסקריפט!';
}
?>
