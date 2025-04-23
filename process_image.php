<?php
// --- התחלת קוד PHP ---

// !!! החלף במפתח ה-API *החדש* והאמיתי שלך !!!
define('GEMINI_API_KEY', 'AIzaSyBuVkI5yIDoXejGN_4E5gawGlTxk_Mkq4M'); // <-- שים כאן מפתח חדש!

$response_text = '';
$error_message = '';
$submitted_prompt = '';
$uploaded_image_info = ''; // מידע על התמונה שהועלתה

// בדוק אם הטופס הוגש בשיטת POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // קבלת הטקסט (חובה)
    if (!empty(trim($_POST['prompt']))) {
        $submitted_prompt = trim($_POST['prompt']);
    } else {
        $error_message = "אנא הזן שאילתה בשדה הטקסט.";
    }

    // אתחול משתני תמונה
    $image_mime_type = null;
    $image_base64_data = null;

    // --- עיבוד קובץ התמונה (אם הועלה) ---
    if (isset($_FILES['image_upload']) && $_FILES['image_upload']['error'] === UPLOAD_ERR_OK) {
        $image_tmp_path = $_FILES['image_upload']['tmp_name'];
        $image_size = $_FILES['image_upload']['size'];
        $image_original_name = basename($_FILES['image_upload']['name']); // שם קובץ מקורי לאבטחה

        // בדיקות בסיסיות לקובץ
        $max_file_size = 5 * 1024 * 1024; // 5MB limit (adjust as needed)
        if ($image_size > $max_file_size) {
            $error_message .= ($error_message ? '<br>' : '') . "שגיאה: קובץ התמונה גדול מדי (מותר עד 5MB).";
        } elseif (!function_exists('mime_content_type')) {
             $error_message .= ($error_message ? '<br>' : '') . "שגיאה: הרחבת PHP 'fileinfo' אינה מופעלת ודרושה לזיהוי סוג קובץ.";
        } else {
            // זיהוי סוג MIME
            $detected_mime_type = mime_content_type($image_tmp_path);
            $allowed_mime_types = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];

            if (!in_array($detected_mime_type, $allowed_mime_types)) {
                $error_message .= ($error_message ? '<br>' : '') . "שגיאה: סוג קובץ התמונה אינו נתמך (מותר: JPEG, PNG, GIF, WebP). זוהה: " . htmlspecialchars($detected_mime_type);
            } else {
                // קריאת תוכן הקובץ וקידוד ל-Base64
                $image_content = file_get_contents($image_tmp_path);
                if ($image_content === false) {
                     $error_message .= ($error_message ? '<br>' : '') . "שגיאה: לא ניתן היה לקרוא את קובץ התמונה.";
                } else {
                    $image_mime_type = $detected_mime_type;
                    $image_base64_data = base64_encode($image_content);
                    $uploaded_image_info = "תמונה הועלתה: " . htmlspecialchars($image_original_name) . " (" . htmlspecialchars($image_mime_type) . ")";
                    // אין צורך לשמור את הקובץ הזמני, הוא יימחק אוטומטית
                }
            }
        }
    } elseif (isset($_FILES['image_upload']) && $_FILES['image_upload']['error'] !== UPLOAD_ERR_NO_FILE && $_FILES['image_upload']['error'] !== UPLOAD_ERR_OK) {
        // שגיאה כלשהי בהעלאת הקובץ
        $error_message .= ($error_message ? '<br>' : '') . "שגיאה בהעלאת קובץ התמונה. קוד שגיאה: " . $_FILES['image_upload']['error'];
    }
    // --- סוף עיבוד קובץ התמונה ---


    // המשך לקריאה ל-API רק אם אין שגיאות קודמות והוכנס טקסט
    if (empty($error_message) && !empty($submitted_prompt)) {

        if (GEMINI_API_KEY === 'YOUR_NEW_API_KEY_HERE' || GEMINI_API_KEY === '') {
            $error_message = "שגיאה קריטית: מפתח API של Gemini אינו מוגדר בקוד ה-PHP.";
        } else {
            // שימוש במודל gemini-1.5-flash (תומך בטקסט ותמונה)
            $api_url = 'https://generativelanguage.googleapis.com/v1/models/gemini-1.5-flash:generateContent?key=' . GEMINI_API_KEY;

            // --- הרכבת גוף הבקשה (Payload) ---
            $request_parts = [];

            // 1. הוסף תמיד את חלק הטקסט
            $request_parts[] = ['text' => $submitted_prompt];

            // 2. הוסף את חלק התמונה (אם הועלתה ועובדה בהצלחה)
            if ($image_base64_data !== null && $image_mime_type !== null) {
                $request_parts[] = [
                    'inlineData' => [
                        'mimeType' => $image_mime_type,
                        'data' => $image_base64_data
                    ]
                ];
            }

            // יצירת מבנה הנתונים המלא
            $data = [
                'contents' => [
                    [
                        'parts' => $request_parts // שימוש במערך החלקים שהורכב
                    ]
                ],
                'safetySettings' => [
                    // ... (הגדרות בטיחות כמו קודם) ...
                    [ 'category' => 'HARM_CATEGORY_HARASSMENT', 'threshold' => 'BLOCK_MEDIUM_AND_ABOVE' ],
                    [ 'category' => 'HARM_CATEGORY_HATE_SPEECH', 'threshold' => 'BLOCK_MEDIUM_AND_ABOVE' ],
                    [ 'category' => 'HARM_CATEGORY_SEXUALLY_EXPLICIT', 'threshold' => 'BLOCK_MEDIUM_AND_ABOVE' ],
                    [ 'category' => 'HARM_CATEGORY_DANGEROUS_CONTENT', 'threshold' => 'BLOCK_MEDIUM_AND_ABOVE' ],
                ],
                // 'generationConfig' => [ ... ]
            ];
            $json_data = json_encode($data);
            // ------------------------------------

            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, $api_url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Content-Type: application/json',
                'Accept: application/json'
            ]);
            curl_setopt($ch, CURLOPT_TIMEOUT, 90); // הגדל זמן קצוב ל-90 שניות (תמונות עשויות לקחת יותר זמן)

            // --- !!! אזהרת אבטחה - SSL !!! ---
            // השורה הזו מבטלת אימות SSL. נחוצה רק לבדיקה מקומית אם יש בעיות SSL.
            // --- !!! אל תשתמש בזה בפרודקשן !!! ---
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            // ---------------------------------------

            $api_response = curl_exec($ch);
            $curl_error = curl_error($ch);
            $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

            curl_close($ch);

            // --- עיבוד התגובה (זהה לקוד הקודם, כולל טיפול בשגיאות) ---
            if ($curl_error) {
                $error_message = "שגיאת cURL: " . htmlspecialchars($curl_error);
                if (strpos(strtolower($curl_error), 'ssl') !== false || strpos(strtolower($curl_error), 'certificate') !== false) {
                     $error_message .= "<br><br><b>הערה:</b> שגיאת cURL קשורה ל-SSL.";
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
                    $api_error_msg = 'שגיאה מה-API';
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
    } // סוף בדיקה אם אין שגיאות קודמות
} // סוף בדיקה אם POST

// --- סוף קוד PHP ---
?>
<!DOCTYPE html>
<html lang="he" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>שאל את ג'מיני (טקסט ותמונה)</title>
    <style>
        /* CSS נשאר זהה ברובו, אולי נוסיף רווח לשדה הקובץ */
        body { font-family: Arial, sans-serif; line-height: 1.6; padding: 20px; background-color: #f4f4f4; color: #333; }
        .container { max-width: 700px; margin: auto; background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        h1 { color: #444; text-align: center; margin-bottom: 20px; }
        form div { margin-bottom: 15px; /* רווח בין השדות */ }
        form label { display: block; margin-bottom: 8px; font-weight: bold; }
        textarea, input[type="file"] { /* החל סגנון דומה על שניהם */
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 1em;
        }
         input[type="file"] {
            padding: 8px 12px; /* התאמה קלה לשדה קובץ */
         }
        textarea { min-height: 100px; resize: vertical; }
        button { display: inline-block; background-color: #5c67f2; color: white; padding: 12px 25px; border: none; border-radius: 4px; cursor: pointer; font-size: 1.1em; margin-top: 15px; transition: background-color 0.3s ease; }
        button:hover { background-color: #4a54c4; }
        .response-area { margin-top: 30px; padding: 20px; background-color: #e9eef6; border: 1px solid #d1d9e6; border-radius: 5px; }
        .response-area h2 { margin-top: 0; color: #333; border-bottom: 1px solid #ccc; padding-bottom: 10px; }
        .response-text { white-space: pre-wrap; word-wrap: break-word; font-size: 1.05em; padding: 10px 0; }
        .error-message { color: #d9534f; background-color: #f2dede; border: 1px solid #ebccd1; padding: 15px; margin-bottom: 20px; border-radius: 4px; font-weight: bold; word-wrap: break-word; }
        .error-message pre { margin-top: 10px; padding: 10px; background-color: #eee; border: 1px dashed #ccc; font-size: 0.9em; color: #555; }
        .image-info { /* סגנון להודעה על התמונה שהועלתה */
            font-size: 0.9em;
            color: #555;
            margin-top: 5px;
            padding: 5px;
            background-color: #f0f0f0;
            border-radius: 3px;
            display: inline-block;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>שאל את ג'מיני (טקסט ותמונה)</h1>

        <?php if (!empty($error_message)): ?>
            <div class="error-message">
                <?php echo $error_message; // אין צורך ב-htmlspecialchars כי טיפלנו בזה ב-PHP ?>
            </div>
        <?php endif; ?>

        <!-- שינוי ה-enctype של הטופס -->
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
            <div>
                <label for="prompt">השאילתה שלך (חובה):</label>
                <textarea id="prompt" name="prompt" rows="4" required><?php echo htmlspecialchars($submitted_prompt); ?></textarea>
            </div>
            <div>
                <label for="image_upload">העלה תמונה (אופציונלי, עד 5MB):</label>
                <input type="file" id="image_upload" name="image_upload" accept="image/jpeg, image/png, image/gif, image/webp">
                <?php if (!empty($uploaded_image_info) && empty($error_message)): ?>
                    <div class="image-info"><?php echo $uploaded_image_info; ?></div>
                <?php endif; ?>
            </div>
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
