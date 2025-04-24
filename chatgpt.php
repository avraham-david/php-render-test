<?php
$answer = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["user_input"])) {
    $userInput = $_POST["user_input"];
    $apiKey = "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"; // שים כאן את המפתח שלך

    $data = [
        "model" => "gpt-4",
        "messages" => [
            ["role" => "user", "content" => $userInput]
        ],
        "temperature" => 0.7
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.openai.com/v1/chat/completions');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Authorization: Bearer ' . $apiKey
    ]);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    $response = curl_exec($ch);
    curl_close($ch);

    if ($response !== false) {
        $responseData = json_decode($response, true);
        $answer = $responseData['choices'][0]['message']['content'] ?? 'שגיאה בתגובה';
    } else {
        $answer = "שגיאה בשליחת הבקשה לשרת של OpenAI.";
    }
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
