<?php
// --- התחלת קוד PHP - API Endpoint ---

// !!! חובה: לאפשר בקשות מכל דומיין (לצורך הסימנייה) !!!
// אזהרה: זה פחות מאובטח מאשר לאפשר רק דומיינים ספציפיים.
// אם אתה יודע מאיזה דומיין עיקרי תשתמש בסימנייה, עדיף לציין אותו במקום '*'.
header("Access-Control-Allow-Origin: *"); // מאפשר גישה מכל מקור (חשוב ל-CORS)
header("Access-Control-Allow-Methods: POST, GET, OPTIONS"); // מתיר שיטות בקשה
header("Access-Control-Allow-Headers: Content-Type, Authorization"); // מתיר כותרות מסוימות

// טפל בבקשת OPTIONS של CORS preflight (הדפדפן שולח אותה לפני POST)
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    http_response_code(200); // אישור שהבקשה המקדימה תקינה
    exit; // אל תמשיך לעבד
}

// הגדר Content-Type כתשובת JSON
header('Content-Type: application/json; charset=utf-8');

// !!! החלף במפתח ה-API *החדש* והאמיתי שלך !!!
define('GEMINI_API_KEY', 'AIzaSyBuVkI5yIDoXejGN_4E5gawGlTxk_Mkq4M'); // <-- שים כאן מפתח חדש!

// --- קבלת הקלט כ-JSON מ-POST ---
$input_data = json_decode(file_get_contents('php://input'), true);
$submitted_prompt = null;
if (isset($input_data['prompt'])) {
    $submitted_prompt = trim($input_data['prompt']);
}

// --- אתחול מערך התשובה ---
$response = ['success' => false, 'text' => null, 'error' => null];

// --- בדיקות ובקשה ל-Gemini ---
if (empty($submitted_prompt)) {
    $response['error'] = "שגיאה: לא התקבלה שאילתה (prompt).";
    http_response_code(400); // Bad Request
} elseif (GEMINI_API_KEY === 'YOUR_NEW_API_KEY_HERE' || GEMINI_API_KEY === '') {
    $response['error'] = "שגיאה קריטית: מפתח API של Gemini אינו מוגדר בשרת.";
    http_response_code(500); // Internal Server Error
} else {
    // --- קריאה ל-API של Gemini (טקסט בלבד) ---
    $api_url = 'https://generativelanguage.googleapis.com/v1/models/gemini-1.5-flash:generateContent?key=' . GEMINI_API_KEY;

    $data_to_send = [
        'contents' => [
            [ 'parts' => [ ['text' => $submitted_prompt] ] ]
        ],
        'safetySettings' => [
            [ 'category' => 'HARM_CATEGORY_HARASSMENT', 'threshold' => 'BLOCK_MEDIUM_AND_ABOVE' ],
            [ 'category' => 'HARM_CATEGORY_HATE_SPEECH', 'threshold' => 'BLOCK_MEDIUM_AND_ABOVE' ],
            [ 'category' => 'HARM_CATEGORY_SEXUALLY_EXPLICIT', 'threshold' => 'BLOCK_MEDIUM_AND_ABOVE' ],
            [ 'category' => 'HARM_CATEGORY_DANGEROUS_CONTENT', 'threshold' => 'BLOCK_MEDIUM_AND_ABOVE' ],
        ],
    ];
    $json_data = json_encode($data_to_send);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $api_url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Accept: application/json'
    ]);
    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
    // --- שים לב: *הסרתי* את הדילוג על SSL (CURLOPT_SSL_VERIFYPEER=false) ---
    // מכיוון שהשרת שלך ב-Render כנראה מטפל ב-SSL בצורה תקינה.
    // אם הקריאה ל-Gemini נכשלת עם שגיאת SSL מהשרת שלך, ייתכן שתצטרך להחזיר את זה,
    // או לפתור את בעיית ה-SSL בשרת עצמו (הדרך המומלצת).
    // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    $api_response_body = curl_exec($ch);
    $curl_error = curl_error($ch);
    $http_code_gemini = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    // --- עיבוד התגובה מ-Gemini ---
    if ($curl_error) {
        $response['error'] = "שגיאת cURL בתקשורת עם Gemini: " . $curl_error;
        http_response_code(502); // Bad Gateway
    } elseif ($api_response_body === false) {
        $response['error'] = "שגיאה: לא התקבלה תגובה מ-API של Gemini. קוד HTTP: " . $http_code_gemini;
        http_response_code(502); // Bad Gateway
    } else {
        $decoded_gemini_response = json_decode($api_response_body);
        $json_error = json_last_error();

        if ($json_error !== JSON_ERROR_NONE) {
            $response['error'] = "שגיאה בפענוח JSON מתגובת Gemini: " . json_last_error_msg();
             error_log("Gemini API Raw Response (JSON Error): " . $api_response_body);
             http_response_code(500);
        } elseif ($http_code_gemini >= 400) {
            $api_error_msg = 'שגיאה מ-API של Gemini';
             if (isset($decoded_gemini_response->error->message)) {
                 $api_error_msg = $decoded_gemini_response->error->message;
             } elseif (is_string($api_response_body)) {
                 $api_error_msg = $api_response_body;
             }
             $response['error'] = "שגיאת API של Gemini: (" . $http_code_gemini . ") " . $api_error_msg;
             error_log("Gemini API Error (" . $http_code_gemini . "): " . $api_response_body);
             // העבר את קוד השגיאה מה-API של ג'מיני, אם הוא קיים
             http_response_code($http_code_gemini);
        } elseif (isset($decoded_gemini_response->candidates[0]->content->parts[0]->text)) {
            // הצלחה!
            $response['success'] = true;
            $response['text'] = $decoded_gemini_response->candidates[0]->content->parts[0]->text;
            http_response_code(200); // OK
        } elseif (isset($decoded_gemini_response->candidates[0]->finishReason) && $decoded_gemini_response->candidates[0]->finishReason != 'STOP') {
            $response['error'] = "התגובה נחסמה או הופסקה על ידי API Gemini. סיבה: " . $decoded_gemini_response->candidates[0]->finishReason;
             // ... הוספת פרטי חסימה אם רוצים ...
             http_response_code(400); // Bad Request (blocked prompt/response)
        } else {
            $response['error'] = "שגיאה: התקבלה תגובה במבנה לא צפוי מ-API Gemini.";
             error_log("Unexpected Gemini API Response Structure: " . $api_response_body);
             http_response_code(500);
        }
    }
}

// --- הדפסת התשובה כ-JSON וסיום ---
echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
exit; // חשוב לסיים כאן כדי שלא יודפס שום HTML

?>
