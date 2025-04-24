<?php

// URL של ה-API
$url = 'https://api.resend.com/emails';

// נתוני המייל
$data = [
    'from' => 'av@av.av',
    'to' => ['tcrvo1708@gmail.com'],
    'subject' => 'hello world',
    'html' => '<p>it works!</p>',
];

// כותרות הבקשה
$headers = [
    'Authorization: Bearer re_iC81sQvL_2bmsWYoPWWtL7Rs9M2NhgGrs', // ה-Bearer Token שלך
    'Content-Type: application/json',
];

// אתחול של cURL
$ch = curl_init($url);

// הגדרת אפשרויות ל-cURL
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

// שליחת הבקשה והחזרת התגובה
$response = curl_exec($ch);

// בדיקה אם יש שגיאות ב-cURL
if(curl_errno($ch)) {
    echo 'cURL error: ' . curl_error($ch);
} else {
    // הצגת התגובה
    echo $response;
}

// סגירת החיבור ל-cURL
curl_close($ch);

?>
