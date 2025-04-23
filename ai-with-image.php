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
$systemInstruction = "ענה תמיד בעברית בלבד, בצורה הכי מדויקת, תמציתית, קצרה וברורה ככל האפשר. אל תוסיף הסברים מיותרים או הקדמות, רק את התשובה הישירה ביותר.";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);

    if (isset($input['text'])) {
        $inputText = $input['text'];
        $imageBase64 = $input['image'] ?? null; // אם קיימת תמונה ב־Base64, קח אותה

        $url = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-pro-exp-03-25:generateContent?key=' . $apiKey;
        $headers = [
            'Content-Type: application/json'
        ];

        // יצירת גוף הבקשה לשליחת טקסט + תמונה אם קיימת
        $postData = [
            'contents' => [
                [
                    'parts' => [
                        ['text' => $systemInstruction . ' ' . $inputText]
                    ]
                ]
            ]
        ];

        // אם יש תמונה, הוסף אותה לפלט
        if ($imageBase64) {
            $postData['contents'][0]['parts'][] = [
                'inline_data' => [
                    'mime_type' => 'image/jpeg', // שים את סוג התמונה אם ידוע (יכולה להיות גם png או webp)
                    'data' => $imageBase64
                ]
            ];
        }

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($ch);
        curl_close($ch);

        header('Content-Type: application/json');
        echo json_encode([
            'text' => json_decode($response, true)['candidates'][0]['content']['parts'][0]['text'] ?? 'שגיאה: לא התקבלה תשובה תקינה מה-Gemini API'
        ]);
    } else {
        http_response_code(400);
        echo json_encode(['error' => 'לא התקבל טקסט בבקשה']);
    }
} else {
    http_response_code(405);
    echo 'האתר פתוח! נסו את הסקריפט!';
}
?>
