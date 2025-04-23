<?php
// --- התחלת קוד PHP ---

// !!! החלף במפתח ה-API *החדש* והאמיתי שלך !!!
define('GEMINI_API_KEY', 'AIzaSyBuVkI5yIDoXejGN_4E5gawGlTxk_Mkq4M'); // <-- שים כאן מפתח חדש!

$response_text = ''; // לאתחול משתנה התשובה
$error_message = ''; // לאתחול משתנה השגיאה
$submitted_prompt = ''; // לאחסון השאילתה שהוגשה

// בדוק אם הטופס הוגש בשיטת POST ויש תוכן בשדה 'prompt'
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty(trim($_POST['prompt']))) {

    $submitted_prompt = trim($_POST['prompt']);

    if (GEMINI_API_KEY === 'YOUR_NEW_API_KEY_HERE' || GEMINI_API_KEY === '') {
        $error_message = "שגיאה קריטית: מפתח API של Gemini אינו מוגדר בקוד ה-PHP.";
    } else {
        // --- שינוי כאן: שימוש במודל gemini-1.5-flash מתוך הרשימה ---
        // הגדר את כתובת ה-API של Gemini (שימוש ב-v1 ובמודל gemini-1.5-flash)
        $api_url = 'https://generativelanguage.googleapis.com/v1/models/gemini-1.5-flash:generateContent?key=' . GEMINI_API_KEY;
        // ----------------------------------------------------------

        $data = [
            'contents' => [
                [
                    'parts' => [
                        ['text' => $submitted_prompt]
                    ]
                ]
            ],
            'safetySettings' => [
                // ... (הגדרות בטיחות כמו בקוד הקודם) ...
                [ 'category' => 'HARM_CATEGORY_HARASSMENT', 'threshold' => 'BLOCK_MEDIUM_AND_ABOVE' ],
                [ 'category' => 'HARM_CATEGORY_HATE_SPEECH', 'threshold' => 'BLOCK_MEDIUM_AND_ABOVE' ],
                [ 'category' => 'HARM_CATEGORY_SEXUALLY_EXPLICIT', 'threshold' => 'BLOCK_MEDIUM_AND_ABOVE' ],
                [ 'category' => 'HARM_CATEGORY_DANGEROUS_CONTENT', 'threshold' => 'BLOCK_MEDIUM_AND_ABOVE' ],
            ],
            // 'generationConfig' => [ ... ] // אפשר להוסיף אם רוצים
        ];
        $json_data = json_encode($data);

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

        // --- !!! אזהרת אבטחה !!! ---
        // השורה הבאה מבטלת את אימות ה-SSL.
        // השתמש בה רק לבדיקה מקומית אם אתה נתקל בשגיאות SSL.
        // --- !!! אל תשתמש בזה בפרודקשן !!! ---
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        // אם תרצה לנסות לפתור את בעיית ה-SSL בשרת, תצטרך להסיר/להעיר שורה זו
        // ולבדוק אם הבעיה ב-PHP עצמו (למשל, קובץ cacert.pem לא מעודכן).
        // ---------------------------------------

        $api_response = curl_exec($ch);
        $curl_error = curl_error($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);

        // --- עיבוד התגובה (זהה לקוד הקודם) ---
        if ($curl_error) {
            // שגיאת cURL - ייתכן שעדיין קשורה ל-SSL אם הדילוג לא פתר הכל, או רשת.
            $error_message = "שגיאת cURL: " . htmlspecialchars($curl_error);
             // בדוק אם הודעת השגיאה קשורה ל-SSL
             if (strpos(strtolower($curl_error), 'ssl') !== false || strpos(strtolower($curl_error), 'certificate') !== false) {
                 $error_message .= "<br><br><b>הערה:</b> שגיאת cURL קשורה ל-SSL. האם קובץ ה-CA certificate בשרת ה-PHP שלך מעודכן?";
                 $error_message .= "<br>למטרות בדיקה בלבד, הקוד הנוכחי מנסה לדלג על אימות SSL (CURLOPT_SSL_VERIFYPEER=false).";
             }
        } elseif ($api_response === false) {
            $error_message = "שגיאה: לא התקבלה תגובה מה-API (ייתכן שזמן הקצוב פג). קוד HTTP: " . $http_code;
        } else {
            $decoded_response = json_decode($api_response);
            $json_error = json_last_error();

            if ($json_error !== JSON_ERROR_NONE) {
                $error_message = "שגיאה בפענוח JSON מה-API: " . json_last_error_msg();
                error_log("Gemini API Raw Response (JSON Error): " . $api_response);
                $error_message .= "<br><pre style='white-space: pre-wrap; word-wrap: break-word;'>" . htmlspecialchars($api_response) . "</pre>";
            } elseif ($http_code >= 400) {
                $api_error_msg = 'שגיאה לא ידועה מה-API';
                 if (isset($decoded_response->error->message)) {
                     $api_error_msg = $decoded_response->error->message;
                 } elseif (is_string($api_response)) {
                     $api_error_msg = $api_response;
                 }
                 $error_message = "שגיאת API של Gemini: (" . $http_code . ") " . htmlspecialchars($api_error_msg);
                 error_log("Gemini API Error (" . $http_code . "): " . $api_response);
            } elseif (isset($decoded_response->candidates[0]->content->parts[0]->text)) {
                $response_text = $decoded_response->candidates[0]->content->parts[0]->text;
            } elseif (isset($decoded_response->candidates[0]->finishReason) && $decoded_response->candidates[0]->finishReason != 'STOP') {
                 $error_message = "התגובה נחסמה או הופסקה על ידי ה-API. סיבה: " . htmlspecialchars($decoded_response->candidates[0]->finishReason);
                 // ... (הוספת פרטי חסימה כמו קודם) ...
                 if (isset($decoded_response->promptFeedback->blockReason)) {
                     $error_message .= " (סיבת חסימת השאילתה: " . htmlspecialchars($decoded_response->promptFeedback->blockReason) . ")";
                 } elseif (isset($decoded_response->candidates[0]->safetyRatings)) {
                    $error_message .= ". דירוגי בטיחות:";
                    foreach($decoded_response->candidates[0]->safetyRatings as $rating) {
                         $error_message .= " " . htmlspecialchars($rating->category) . ": " . htmlspecialchars($rating->probability) . ";";
                    }
                 }
            }
            else {
                $error_message = "שגיאה: התקבלה תגובה במבנה לא צפוי מה-API.";
                error_log("Unexpected Gemini API Response Structure: " . $api_response);
                $error_message .= "<br><pre style='white-space: pre-wrap; word-wrap: break-word;'>" . htmlspecialchars($api_response) . "</pre>";
            }
        }
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST" && empty(trim($_POST['prompt']))) {
    $error_message = "אנא הזן שאילתא בשדה הטקסט.";
}

// --- סוף קוד PHP ---
?>
<!DOCTYPE html>
<!-- HTML נשאר זהה לקוד הקודם -->
<html lang="he" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>שאל את ג'מיני (v1 - gemini-1.5-flash)</title>
    <style>
        /* CSS נשאר זהה לקוד הקודם */
        body { font-family: Arial, sans-serif; line-height: 1.6; padding: 20px; background-color: #f4f4f4; color: #333; }
        .container { max-width: 700px; margin: auto; background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        h1 { color: #444; text-align: center; margin-bottom: 20px; }
        form label { display: block; margin-bottom: 8px; font-weight: bold; }
        textarea { width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; font-size: 1em; min-height: 100px; resize: vertical; }
        button { display: inline-block; background-color: #5c67f2; color: white; padding: 12px 25px; border: none; border-radius: 4px; cursor: pointer; font-size: 1.1em; margin-top: 15px; transition: background-color 0.3s ease; }
        button:hover { background-color: #4a54c4; }
        .response-area { margin-top: 30px; padding: 20px; background-color: #e9eef6; border: 1px solid #d1d9e6; border-radius: 5px; }
        .response-area h2 { margin-top: 0; color: #333; border-bottom: 1px solid #ccc; padding-bottom: 10px; }
        .response-text { white-space: pre-wrap; word-wrap: break-word; font-size: 1.05em; padding: 10px 0; }
        .error-message { color: #d9534f; background-color: #f2dede; border: 1px solid #ebccd1; padding: 15px; margin-bottom: 20px; border-radius: 4px; font-weight: bold; }
        .error-message pre { margin-top: 10px; padding: 10px; background-color: #eee; border: 1px dashed #ccc; font-size: 0.9em; color: #555; }
    </style>
</head>
<body>
    <div class="container">
        <h1>שאל את ג'מיני (v1 - gemini-1.5-flash)</h1>

        <?php if (!empty($error_message)): ?>
            <div class="error-message">
                <?php echo $error_message; ?>
            </div>
        <?php endif; ?>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="prompt">השאילתה שלך:</label>
            <textarea id="prompt" name="prompt" rows="5" required><?php echo htmlspecialchars($submitted_prompt); ?></textarea>
            <button type="submit">שלח שאילתא</button>
        </form>

        <?php if (!empty($response_text)): ?>
            <div class="response-area">
                <h2>תשובת ג'מיני:</h2>
                <div class="response-text">
                    <?php echo nl2br(htmlspecialchars($response_text)); ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
