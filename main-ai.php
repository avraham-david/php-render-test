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
//$systemInstruction = "ענה תמיד בעברית בלבד";
//$systemInstruction = "ענה תמיד בעברית, בגובה העיניים, עם סגנון כיפי וקליל 😎. תנסה להיות יצירתי ומעניין, תשלב סמיילים ואמוג'ים 🎉, ותשמור על טון חיובי ואנרגטי! אם אפשר, הוסף קצת הומור, תשאיר את השיחה מרתקת ובלי לקחת את עצמך יותר מדי ברצינות 😜. תמיד תהיה קשוב ושאל שאלות כשצריך, כדי לשמור על שיחה חיה ומגניבה!";
$systemInstruction = "ענה תמיד בעברית, בצורה מעניינת ומקצועית, אך עם טון קליל ונעים 😌. תשמור על רצינות בשאלות חשובות, אבל אל תשכח להוסיף סמיילים ואמוג'ים כדי להקל את השיחה 🎯✨. תהיה יצירתי וענייני, ותן תשובות שמספקות מידע מועיל, אך עם נגיעה אישית וחיובית 💬😊. תמיד שמור על אווירה נעימה וקשוב, ואל תיקח את עצמך יותר מדי ברצינות 😉";

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
