<?php
require_once 'openai.php';
$answer = "";
if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST["user_input"])) {
    $answer = askOpenAI($_POST["user_input"]);
}
?>

<!DOCTYPE html>
<html lang="he">
<head>
    <meta charset="UTF-8">
    <title>שיחה עם ChatGPT</title>
</head>
<body style="font-family: Arial; direction: rtl; padding: 2em;">
    <h2>שאל את ChatGPT</h2>
    <form method="post">
        <textarea name="user_input" rows="5" cols="60" placeholder="כתוב כאן את השאלה שלך..." required></textarea><br><br>
        <button type="submit">שלח</button>
    </form>

    <?php if (!empty($answer)): ?>
        <h3>תשובת ChatGPT:</h3>
        <div style="border:1px solid #ccc; padding:10px; background:#f9f9f9;">
            <?= nl2br(htmlspecialchars($answer)) ?>
        </div>
    <?php endif; ?>
</body>
</html>
