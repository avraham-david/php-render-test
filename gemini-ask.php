<?php
// --- התחלת קוד PHP ---

// !!! החלף במפתח ה-API *החדש* והאמיתי שלך !!!
define('GEMINI_API_KEY', 'AIzaSyBuVkI5yIDoXejGN_4E5gawGlTxk_Mkq4M'); // <-- שים כאן מפתח חדש!

$response_text = '';
$error_message = '';
$submitted_prompt = ''; // אתחול
$uploaded_image_info = '';

// --- הוספה: קבלת שאילתה ראשונית מ-GET (מהסימנייה) ---
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['prompt'])) {
    // קבל את השאילתה מה-URL ונקה אותה
    $submitted_prompt = trim(urldecode($_GET['prompt'])); // urldecode אם נשלח מקודד
}
// --- סוף הוספה ---


// בדוק אם הטופס הוגש בשיטת POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // קבלת הטקסט (חובה) מ-POST
    if (!empty(trim($_POST['prompt']))) {
        // אם הטופס הוגש, הערך מ-POST גובר על מה שאולי הגיע מ-GET
        $submitted_prompt = trim($_POST['prompt']);
    } else {
         // אם הוגש POST בלי טקסט, אבל היה טקסט מ-GET, השאר אותו. אחרת, שגיאה.
        if (empty($submitted_prompt)) {
             $error_message = "אנא הזן שאילתא בשדה הטקסט.";
        }
    }

    // ... (שאר קוד ה-PHP לעיבוד POST, כולל העלאת תמונה וקריאה ל-API, נשאר זהה)...

} // סוף בדיקה אם POST

// --- סוף קוד PHP ---
?>
<!DOCTYPE html>
<!-- ... קוד ה-HTML נשאר זהה ... -->
<!-- שדה הטקסט יקבל את הערך מ-$submitted_prompt, בין אם הגיע מ-GET או מ-POST -->
<textarea id="prompt" name="prompt" rows="4" required><?php echo htmlspecialchars($submitted_prompt); ?></textarea>
<!-- ... שאר קוד ה-HTML ... -->
