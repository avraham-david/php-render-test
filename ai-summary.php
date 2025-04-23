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

$apiKey = 'AIzaSyBahgGefZmQHDm4G_VIFD1TBNK6DWeTrYM'; 
$systemInstruction = "תפקידך הוא לספק סיכום מדויק, מקיף ומעמיק של תוכן דף האינטרנט. עליך לכלול את כל הרעיונות המרכזיים, המסקנות החשובות והנקודות העיקריות כך שהקורא יוכל להבין את מהות הדף מבלי לקרוא אותו במלואו. הסיכום חייב להיות תמציתי, אך לא על חשבון פרטים חשובים – אל תשמיט אף נקודה משמעותית. עליך להימנע ממידע טכני שולי או פרטים שאין להם קשר ישיר להבנת התוכן המרכזי של הדף. הסיכום יינתן בעברית ברורה, שוטפת, וממוקדת, כך שהקורא יוכל להבין את עיקרי הדברים בצורה ברורה ומלאה.";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);

    if (isset($input['text'])) {
        $inputText = $input['text'];

        $url = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key=' . $apiKey;
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
    } else {
        http_response_code(400);
        echo json_encode(['error' => 'לא התקבל טקסט בבקשה']);
    }
} else {
    http_response_code(405);
echo 'verision 1.0.0';
}
?>
