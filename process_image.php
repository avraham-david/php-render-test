<?php
// --- התחלת קוד PHP ---

// !!! החלף במפתח ה-API האמיתי שלך !!!
define('GEMINI_API_KEY', 'AIzaSyBuVkI5yIDoXejGN_4E5gawGlTxk_Mkq4M'); // <-- ודא שהמפתח שלך כאן!

$response_text = ''; // לאתחול משתנה התשובה
$error_message = ''; // לאתחול משתנה השגיאה
$submitted_prompt = ''; // לאחסון השאילתה שהוגשה

// בדוק אם הטופס הוגש בשיטת POST ויש תוכן בשדה 'prompt'
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty(trim($_POST['prompt']))) {

    $submitted_prompt = trim($_POST['prompt']); // קבל את השאילתא מהטופס ונקה רווחים

    if (GEMINI_API_KEY === 'YOUR_API_KEY_HERE' || GEMINI_API_KEY === '') {
        $error_message = "שגיאה קריטית: מפתח API של Gemini אינו מוגדר בקוד ה-PHP.";
    } else {
        // --- שינוי כאן: שימוש ב-v1 וב-gemini-pro ---
        // הגדר את כתובת ה-API של Gemini (שימוש ב-v1 היציב ובמודל gemini-pro)
        $api_url = 'https://generativelanguage.googleapis.com/v1/models/gemini-pro:generateContent?key=' . GEMINI_API_KEY;
        // ---------------------------------------------

        // הכן את הנתונים לשליחה בפורמט JSON
        $data = [
            'contents' => [
                [
                    'parts' => [
                        ['text' => $submitted_prompt]
                    ]
                ]
            ],
            // מומלץ להוסיף הגדרות בטיחות בסיסיות כדי להימנע מחסימות מיותרות
            // אם אתה נתקל בחסימות תוכן, נסה להגביר את הרמה (למשל מ-BLOCK_MEDIUM_AND_ABOVE ל-BLOCK_LOW_AND_ABOVE או BLOCK_NONE)
            'safetySettings' => [
                [
                    'category' => 'HARM_CATEGORY_HARASSMENT',
                    'threshold' => 'BLOCK_MEDIUM_AND_ABOVE',
                ],
                [
                    'category' => 'HARM_CATEGORY_HATE_SPEECH',
                    'threshold' => 'BLOCK_MEDIUM_AND_ABOVE',
                ],
                [
                    'category' => 'HARM_CATEGORY_SEXUALLY_EXPLICIT',
                    'threshold' => 'BLOCK_MEDIUM_AND_ABOVE',
                ],
                [
                    'category' => 'HARM_CATEGORY_DANGEROUS_CONTENT',
                    'threshold' => 'BLOCK_MEDIUM_AND_ABOVE',
                ],
            ],
             // ניתן להוסיף גם generationConfig אם רוצים לשלוט בטמפרטורה, max tokens וכו'
            // 'generationConfig' => [
            //     'temperature' => 0.9,
            //     'topK' => 1,
            //     'topP' => 1,
            //     'maxOutputTokens' => 2048,
            //     'stopSequences' => [],
            // ],
        ];
        $json_data = json_encode($data);

        // התחל סשן cURL
        $ch = curl_init();

        // הגדרות cURL
        curl_setopt($ch, CURLOPT_URL, $api_url);
        curl_setopt($ch, CURLOPT_POST, true); // הגדר בקשת POST
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data); // הגדר את גוף הבקשה (JSON)
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // החזר את התוצאה כמחרוזת במקום להדפיס
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json', // הגדר את סוג התוכן כ-JSON
            'Accept: application/json'        // מומלץ להוסיף Accept header
        ]);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60); // הגדל זמן קצוב ל-60 שניות (למקרה שתגובות ארוכות)
        // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // השאר בהערה אלא אם יש בעיות SSL ספציפיות בסביבה מקומית (לא מומלץ!)

        // בצע את הבקשה וקבל את התגובה
        $api_response = curl_exec($ch);
        $curl_error = curl_error($ch); // בדוק שגיאות cURL
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE); // קבל את קוד סטטוס ה-HTTP

        // סגור את סשן cURL
        curl_close($ch);

        // --- עיבוד התגובה ---
        if ($curl_error) {
            $error_message = "שגיאת cURL: " . htmlspecialchars($curl_error);
        } elseif ($api_response === false) {
            $error_message = "שגיאה: לא התקבלה תגובה מה-API (ייתכן שזמן הקצוב פג). קוד HTTP: " . $http_code;
        } else {
            // פענוח התגובה מ-JSON לאובייקט PHP
            $decoded_response = json_decode($api_response);
            $json_error = json_last_error();

            if ($json_error !== JSON_ERROR_NONE) {
                $error_message = "שגיאה בפענוח JSON מה-API: " . json_last_error_msg();
                // מומלץ לרשום ללוג את התגובה הגולמית במקרה כזה
                 error_log("Gemini API Raw Response (JSON Error): " . $api_response);
                 $error_message .= "<br><pre style='white-space: pre-wrap; word-wrap: break-word;'>" . htmlspecialchars($api_response) . "</pre>"; // הצג את התגובה הגולמית לניפוי שגיאות
            } elseif ($http_code >= 400) { // בדוק אם קוד ה-HTTP מצביע על שגיאה (4xx או 5xx)
                 $api_error_msg = 'שגיאה לא ידועה מה-API';
                 if (isset($decoded_response->error->message)) {
                     $api_error_msg = $decoded_response->error->message;
                 } elseif (is_string($api_response)) {
                     // נסה להציג את גוף התגובה אם אין מבנה error סטנדרטי
                     $api_error_msg = $api_response;
                 }
                 $error_message = "שגיאת API של Gemini: (" . $http_code . ") " . htmlspecialchars($api_error_msg);
                 error_log("Gemini API Error (" . $http_code . "): " . $api_response); // רשום ללוג
            } elseif (isset($decoded_response->candidates[0]->content->parts[0]->text)) {
                // הצלחה! קבל את הטקסט שנוצר
                $response_text = $decoded_response->candidates[0]->content->parts[0]->text;
            } elseif (isset($decoded_response->candidates[0]->finishReason) && $decoded_response->candidates[0]->finishReason != 'STOP') {
                // מקרה בו התגובה נחסמה (למשל עקב תוכן לא בטוח) או הופסקה מסיבה אחרת
                 $error_message = "התגובה נחסמה או הופסקה על ידי ה-API. סיבה: " . htmlspecialchars($decoded_response->candidates[0]->finishReason);
                 if (isset($decoded_response->promptFeedback->blockReason)) {
                     $error_message .= " (סיבת חסימת השאילתה: " . htmlspecialchars($decoded_response->promptFeedback->blockReason) . ")";
                 } elseif (isset($decoded_response->candidates[0]->safetyRatings)) {
                    // נסה לספק מידע נוסף מדירוגי הבטיחות
                    $error_message .= ". דירוגי בטיחות:";
                    foreach($decoded_response->candidates[0]->safetyRatings as $rating) {
                         $error_message .= " " . htmlspecialchars($rating->category) . ": " . htmlspecialchars($rating->probability) . ";";
                    }
                 }
            }
            else {
                // מבנה תגובה לא צפוי
                $error_message = "שגיאה: התקבלה תגובה במבנה לא צפוי מה-API.";
                // מומלץ לרשום ללוג את התגובה המלאה
                 error_log("Unexpected Gemini API Response Structure: " . $api_response);
                 $error_message .= "<br><pre style='white-space: pre-wrap; word-wrap: break-word;'>" . htmlspecialchars($api_response) . "</pre>"; // הצג את התגובה הגולמית לניפוי שגיאות
            }
        }
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST" && empty(trim($_POST['prompt']))) {
    $error_message = "אנא הזן שאילתא בשדה הטקסט.";
}

// --- סוף קוד PHP ---
?>
<!DOCTYPE html>
<html lang="he" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>שאל את ג'מיני (v1)</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            padding: 20px;
            background-color: #f4f4f4;
            color: #333;
        }
        .container {
            max-width: 700px;
            margin: auto;
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #444;
            text-align: center;
            margin-bottom: 20px;
        }
        form label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box; /* Include padding and border in the element's total width and height */
            font-size: 1em;
            min-height: 100px;
            resize: vertical; /* Allow vertical resizing */
        }
        button {
            display: inline-block;
            background-color: #5c67f2;
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1.1em;
            margin-top: 15px;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #4a54c4;
        }
        .response-area {
            margin-top: 30px;
            padding: 20px;
            background-color: #e9eef6;
            border: 1px solid #d1d9e6;
            border-radius: 5px;
        }
        .response-area h2 {
            margin-top: 0;
            color: #333;
            border-bottom: 1px solid #ccc;
            padding-bottom: 10px;
        }
        .response-text {
             white-space: pre-wrap; /* Preserve line breaks and spaces */
             word-wrap: break-word; /* Break long words */
             font-size: 1.05em;
             /* הוספתי קצת ריפוד פנימי */
             padding: 10px 0;
        }
        .error-message {
            color: #d9534f; /* Red color for errors */
            background-color: #f2dede;
            border: 1px solid #ebccd1;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 4px;
            font-weight: bold;
        }
        /* סגנון להצגת תגובות גולמיות בניפוי שגיאות */
        .error-message pre {
            margin-top: 10px;
            padding: 10px;
            background-color: #eee;
            border: 1px dashed #ccc;
            font-size: 0.9em;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>שאל את ג'מיני (v1)</h1>

        <?php if (!empty($error_message)): ?>
            <div class="error-message">
                <?php /* השתמש ב-echo ישירות כי השגיאה כבר עברה htmlspecialchars ב-PHP */ ?>
                <?php echo $error_message; ?>
            </div>
        <?php endif; ?>

        <!-- הטופס שולח את הנתונים לעצמו (לקובץ הנוכחי) בשיטת POST -->
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="prompt">השאילתה שלך:</label>
            <textarea id="prompt" name="prompt" rows="5" required><?php echo htmlspecialchars($submitted_prompt); ?></textarea>
            <button type="submit">שלח שאילתא</button>
        </form>

        <?php if (!empty($response_text)): ?>
            <div class="response-area">
                <h2>תשובת ג'מיני:</h2>
                <div class="response-text">
                    <?php
                    // הצג את התשובה תוך המרת תווי HTML מיוחדים כדי למנוע XSS
                    // והמרת שורות חדשות לתגי <br> לתצוגה נכונה ב-HTML
                    echo nl2br(htmlspecialchars($response_text));
                    ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
