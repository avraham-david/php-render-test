<?php

// --- פרטי API ---
$api_key = 'AIzaSyBuVkI5yIDoXejGN_4E5gawGlTxk_Mkq4M'; // החלף במפתח ה-API שלך
$api_endpoint = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-pro-vision:generateContent'; // נקודת הקצה עבור מודל vision

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $question = $_POST['question'] ?? '';
    $image = $_FILES['image'] ?? null;

    $contents = [];
    if (!empty($question)) {
        $contents[] = ['parts' => [['text' => $question]]];
    }

    if ($image && $image['error'] === UPLOAD_ERR_OK) {
        $mime_type = mime_content_type($image['tmp_name']);
        $image_data = base64_encode(file_get_contents($image['tmp_name']));
        $contents[] = [
            'parts' => [
                [
                    'inline_data' => [
                        'mime_type' => $mime_type,
                        'data' => $image_data
                    ]
                ]
            ]
        ];
    }

    if (!empty($contents)) {
        // --- נתוני בקשה ---
        $data = [
            'contents' => $contents
        ];

        // --- הגדרת בקשת cURL ---
        $ch = curl_init($api_endpoint . '?key=' . $api_key);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json'
        ]);

        // --- ביצוע הבקשה ---
        $response = curl_exec($ch);

        // --- טיפול בשגיאות ---
        if (curl_errno($ch)) {
            echo 'שגיאת cURL: ' . curl_error($ch);
        } else {
            // --- פענוח התגובה ---
            $result = json_decode($response, true);

            // --- הצגת התוצאה ---
            if (isset($result['candidates'][0]['content']['parts'][0]['text'])) {
                echo '<pre>' . htmlspecialchars($result['candidates'][0]['content']['parts'][0]['text']) . '</pre>';
            } else {
                echo 'שגיאה: לא נמצאה תשובה תקינה או שהמודל לא תומך בשאלה עם תמונה בלבד.';
                error_log('תגובת API לא תקינה: ' . $response); // רישום שגיאה בשרת
                var_dump($result); // הצגת כל התגובה לניתוח
            }
        }

        // --- סגירת cURL ---
        curl_close($ch);
    } else {
        echo 'בבקשה הזן שאלה או בחר תמונה.';
    }
} else {
    echo 'גישה לא חוקית.';
}

?>
