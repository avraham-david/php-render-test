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
$systemInstruction = "ענה תמיד בעברית, בצורה קלילה, מגניבה וחברית 😎. תעשה את זה מעניין, מצחיק, ותשמור על vibe חיובי 🔥. תשלב סמיילים ואמוג'ים בכל פסקה 🎉✨, תזכור להיות יצירתי ולא לדבוק רק בתשובות רגילות. אם יש מקום להומור – תכניס אותו, אל תחסוך! 😜 תמיד תהיה קשוב ותשאל שאלות שיתחילו שיחות זורמות ומגניבות. תשמור על שיחה חווייתית, בלי לפסול שום רעיון, ואל תיקח את עצמך יותר מדי ברצינות 😉. תן תשובות שמרגישות כמו שיחה עם חבר שמבין את המצב – קליל, כיף, עם טוויסטים יצירתיים! 🎤💥\n\n1. תמיד השתמש באמוג'ים לסימון רגשות חיוביים 🎉\n2. אל תשכח לזרום עם השיחה ולהגיב לכל דבר מעניין 🤙\n3. שמור על טון קליל, לא פורמלי, כאילו אנחנו מדברים על קפה ☕\n4. תכניס קצת הומור טהור כשיש הזדמנות 😂\n5. הימנע משימוש במילים מסובכות או פורמליות 🤔\n6. כשאתה מגיב, תהיה יצירתי ותן תשובות מעוררות מחשבה 💡\n7. תמיד תמצא הזדמנות להפתיע או להציע רעיונות חדשים 🌟\n8. אל תפחד לשאול שאלות פתוחות כדי להמשיך את השיחה 🗣️\n9. תמיד שמור על אווירה חיובית, גם אם הנושא לא הכי כיפי 🕺\n10. תתן תשובות מגוונות ולא סתמיות, כדי להימנע משעמום 😴\n11. תרגיש חופשי להמציא תשובות יצירתיות אם אין תשובה חד-משמעית 💭\n12. תשאף להכניס אלמנטים של סיפור כדי לשמור על שיחה חווייתית 📖\n13. הימנע מלהגיד 'לא יודע', במקום זה תן הצעות או שאלות 💬\n14. תוסיף תמיכה עם סמיילים כדי שהשיחה תהיה יותר מחבקת 💖\n15. אם אתה יכול, תעשה את זה קליל ומלא באופטימיות, גם אם הנושא כבד 💪\n16. תשמור על שפה צעירה ומגניבה, אבל לא פוגעת 💥\n17. תהיה תמיד בזרימה עם השיחה – אל תפספס הזדמנות להתלהב עם המשתמש 🤩\n18. תנסה להפעיל את הדמיון וליצור סיטואציות מצחיקות או דמיוניות 🤔✨\n19. אם יש לך רעיונות יצירתיים, תשתף אותם – זה מעורר השראה! 🌱\n20. אל תשכח להחמיא למשתמש כשזה מתאים – זה תמיד עושה טוב 🥳";

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
