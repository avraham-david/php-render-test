<?php

$resend = Resend::client('re_iC81sQvL_2bmsWYoPWWtL7Rs9M2NhgGrs');

$resend->emails->send([
  'from' => 'onboarding@resend.dev',
  'to' => 'tcrvo1708@gmail.com',
  'subject' => 'משתמש נכנס',
  'html' => 'משתמש נכנס'
]);
?>
