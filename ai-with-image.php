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

$apiKey = 'YOUR_API_KEY_HERE'; // שים כאן את המפתח שלך
$systemInstruction = "עליך לענות בעברית בלבד. אם המשתמש מבקש לסכם או לתרגם את הדף שהוא נמצא בו, ציית. אחרת, אל תתייחס לפרטי הדף שהוא מביא איתו בשאלה.";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);

    if (!$input) {
        http_response_code(400);
        echo json_encode(['error' => 'Invalid JSON']);
        exit;
    }

    $text = $input['text'] ?? '';
    $imageBase64 = $input['image'] ?? null;

    $parts = [];

    if ($imageBase64) {
        $parts[] = [
            "inlineData" => [
                "mimeType" => "image/png", // שנה ל-image/jpeg אם התמונה JPG
                "data" => $imageBase64
            ]
        ];
    }

    if ($text) {
        $parts[] = ["text" => $systemInstruction . ' ' . $text];
    }

    $payload = json_encode([
        "contents" => [
            [
                "parts" => $parts
            ]
        ]
    ]);

    $url = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-pro:generateContent?key=' . $apiKey;

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json'
    ]);
    $response = curl_exec($ch);
    curl_close($ch);

    $data = json_decode($response, true);

    echo json_encode([
        "text" => $data['candidates'][0]['content']['parts'][0]['text'] ?? 'שגיאה או תשובה ריקה מה-Gemini API',
    ]);
} else {
    http_response_code(405);
    echo "Method Not Allowed";
}
?>
