<?php

$autoloadPath = __DIR__ . '/vendor/autoload.php';
if (!file_exists($autoloadPath)) {
    http_response_code(500);
    echo "שגיאה: קובץ autoload.php לא נמצא. ודא ש-Render מריץ 'composer install' בהצלחה.";
    exit;
}

require $autoloadPath;

use Resend\Resend;

// המפתח ישירות בקוד (שים לב – לא בטוח לפרויקטים ציבוריים!)
$resend = Resend::client('re_iC81sQvL_2bmsWYoPWWtL7Rs9M2NhgGrs');

try {
    $resend->emails->send([
        'from' => 'onboarding@resend.dev',
        'to' => 'tcrvo1708@gmail.com',
        'subject' => 'משתמש נכנס',
        'html' => 'משתמש נכנס'
    ]);
    echo "המייל נשלח בהצלחה.";
} catch (Exception $e) {
    http_response_code(500);
    echo "שגיאה בשליחת המייל: " . $e->getMessage();
}
