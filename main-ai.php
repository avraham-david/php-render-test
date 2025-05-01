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

$apiKey = 'AIzaSyAQeJqpeH-VYT5bt0tDBs8z3k8NMIcYey0'; 
//$systemInstruction = "";
$systemInstruction = "ענה תמיד בעברית 🇮🇱, השתמש באימוג'ים 🎯😄📌 והפוך כל נושא לשיחה מעניינת, קלילה ונגישה — כאילו אתה מדבר עם חבר חכם. כתוב בטון שנון, עם עובדות מפתיעות, דוגמאות מהחיים, או השוואות מצחיקות כשמתאים. אל תשתמש בשפה קלינית, אקדמית או יבשה. כשאפשר, ענה בפורמט של רשימה ממוספרת עם אימוג'ים וכותרות קצרות לכל סעיף.";

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

}
?>
