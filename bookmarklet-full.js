// bookmarklet-full.js
(() => {
  if (window.__geminiSidebarRunning) return;
  window.__geminiSidebarRunning = true;

  // --- עיצוב בסיסי + אנימציות ---
  const styleContent = `
  /* עיצוב תפריט צד */
  #gemini-sidebar {
    direction: rtl;
    position: fixed;
    top: 0;
    right: 0;
    width: 320px;
    height: 100vh;
    background: #1e3a8a;
    box-shadow: -4px 0 12px rgba(0,0,0,0.3);
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    color: white;
    z-index: 100000;
    display: flex;
    flex-direction: column;
    transform: translateX(100%);
    transition: transform 0.3s ease;
  }
  #gemini-sidebar.open {
    transform: translateX(0);
  }
  #gemini-sidebar header {
    padding: 16px;
    font-size: 1.2rem;
    font-weight: 700;
    background: #3749a3;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }
  #gemini-sidebar header button.close-btn {
    background: transparent;
    border: none;
    color: white;
    font-size: 1.5rem;
    cursor: pointer;
    padding: 0;
  }
  #gemini-sidebar nav {
    flex-grow: 1;
    overflow-y: auto;
  }
  #gemini-sidebar nav button {
    width: 100%;
    border: none;
    background: none;
    padding: 14px 18px;
    font-size: 1rem;
    color: white;
    text-align: right;
    border-bottom: 1px solid rgba(255,255,255,0.1);
    cursor: pointer;
    transition: background 0.2s;
  }
  #gemini-sidebar nav button:hover {
    background: #3b82f6;
  }
  #gemini-sidebar footer {
    padding: 12px 16px;
    font-size: 0.85rem;
    background: #2c438d;
    text-align: center;
  }
  /* אנימציה לכפתורים */
  #gemini-sidebar nav button:active {
    transform: scale(0.95);
    background: #2563eb;
  }
  /* פופאפ תוצאות */
  #gemini-popup-overlay {
    position: fixed;
    top: 0; left: 0; right: 0; bottom: 0;
    background: rgba(0,0,0,0.6);
    backdrop-filter: blur(3px);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 110000;
    animation: fadeIn 0.3s ease forwards;
  }
  #gemini-popup {
    background: #E1F5FE;
    color: #1f2937;
    border-radius: 20px;
    box-shadow: 0 12px 48px rgba(0,0,0,0.3);
    max-width: 90vw;
    max-height: 80vh;
    overflow-y: auto;
    padding: 24px 28px 40px 28px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    direction: rtl;
    text-align: right;
    position: relative;
    animation: popupScaleIn 0.3s ease forwards;
  }
  #gemini-popup pre {
    background: #1f2937;
    color: #e0e7ff;
    padding: 12px;
    border-radius: 12px;
    overflow-x: auto;
    font-size: 0.9rem;
  }
  #gemini-popup button.close-popup {
    position: absolute;
    top: 12px;
    left: 12px;
    background: none;
    border: none;
    font-size: 1.6rem;
    cursor: pointer;
    color: #ef4444;
  }
  #gemini-popup button.copy-text {
    position: absolute;
    top: 12px;
    right: 12px;
    background: none;
    border: none;
    font-size: 1.4rem;
    cursor: pointer;
    color: #2563eb;
  }
  /* Keyframes */
  @keyframes fadeIn {
    from {opacity: 0;}
    to {opacity: 1;}
  }
  @keyframes popupScaleIn {
    from {opacity: 0; transform: scale(0.95);}
    to {opacity: 1; transform: scale(1);}
  }
  `;

  // --- הוספת style לדף ---
  const styleTag = document.createElement('style');
  styleTag.textContent = styleContent;
  document.head.appendChild(styleTag);

  // --- יצירת אלמנטים ---
  const sidebar = document.createElement('aside');
  sidebar.id = 'gemini-sidebar';

  sidebar.innerHTML = `
    <header>
      <div>תפריט Gemini חכם</div>
      <button class="close-btn" title="סגור תפריט">✖</button>
    </header>
    <nav>
      <button data-action="summary">סכם את הדף</button>
      <button data-action="ideas">הפק רעיונות למאמר</button>
      <button data-action="findForms">איתור טפסים בדף</button>
      <button data-action="introParagraph">כתוב פסקת פתיחה למאמר</button>
      <button data-action="keywords">הצעת מילות מפתח</button>
      <button data-action="analyzeHTML">ניתוח מבנה HTML</button>
      <button data-action="checkAccessibility">בדיקת נגישות</button>
      <button data-action="toneAnalysis">ניתוח טון כתיבה</button>
      <button data-action="countElements">ספירת מילים, תווים וקישורים</button>
      <button data-action="sharePage">שיתוף עמוד</button>
      <button data-action="loadImage">טעינת תמונה ושליחה</button>
    </nav>
    <footer>Powered by Gemini API</footer>
  `;

  document.body.appendChild(sidebar);

  // --- פוקוס פתיחה ואנימציה ---
  setTimeout(() => sidebar.classList.add('open'), 10);

  // --- כפתור סגירה ---
  sidebar.querySelector('button.close-btn').onclick = () => {
    sidebar.classList.remove('open');
    setTimeout(() => {
      sidebar.remove();
      styleTag.remove();
      window.__geminiSidebarRunning = false;
    }, 300);
  };

  // --- פופאפ תוצאות ---
  function showPopup(text) {
    // אם כבר קיים, לא נפתח פופאפ נוסף
    if (document.getElementById('gemini-popup-overlay')) return;

    const overlay = document.createElement('div');
    overlay.id = 'gemini-popup-overlay';

    const popup = document.createElement('div');
    popup.id = 'gemini-popup';

    const closeBtn = document.createElement('button');
    closeBtn.className = 'close-popup';
    closeBtn.title = 'סגור';
    closeBtn.textContent = '✖';
    closeBtn.onclick = () => overlay.remove();

    const copyBtn = document.createElement('button');
    copyBtn.className = 'copy-text';
    copyBtn.title = 'העתק טקסט';
    copyBtn.textContent = '📋';
    copyBtn.onclick = () => {
      navigator.clipboard.writeText(text).then(() => {
        copyBtn.textContent = '✅';
        setTimeout(() => (copyBtn.textContent = '📋'), 1500);
      });
    };

    const content = document.createElement('div');
    content.style.whiteSpace = 'pre-wrap';
    content.style.marginTop = '32px';
    content.textContent = text;

    popup.appendChild(closeBtn);
    popup.appendChild(copyBtn);
    popup.appendChild(content);
    overlay.appendChild(popup);
    document.body.appendChild(overlay);

    // סגירה עם ESC
    overlay.tabIndex = 0;
    overlay.focus();
    overlay.addEventListener('keydown', (e) => {
      if (e.key === 'Escape') overlay.remove();
    });
  }

  // --- שליחה ל-Gemini ---
  async function sendToGemini(prompt) {
    try {
      const response = await fetch('https://php-render-test.onrender.com/main-ai.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ text: prompt }),
      });
      const json = await response.json();
      if (json && json.text) {
        showPopup(json.text);
      } else {
        showPopup('❌ לא התקבלה תשובה תקינה מהשרת.');
      }
    } catch (e) {
      showPopup('❌ שגיאה בתקשורת עם השרת.');
      console.error(e);
    }
  }

  // --- פונקציות פעולה ---

  // סיכום דף
  function actionSummary() {
    const prompt = `
אתה עוזר חכם. סכם את תוכן הדף הבא בצורה מפורטת, מקצועית ונהירה:
${document.body.innerText}
    `;
    sendToGemini(prompt);
  }

  // הפקת רעיונות למאמר
  function actionIdeas() {
    const prompt = `
אתה עוזר חכם. קרא את תוכן הדף הבא והפק עבורי לפחות 15 רעיונות למאמרים רלוונטיים, כולל נקודות משנה לכל רעיון:
${document.body.innerText}
    `;
    sendToGemini(prompt);
  }

  // איתור טפסים
  function actionFindForms() {
    // לא רק טפסים, נשלח גם את קוד ה-HTML עם הסבר
    const prompt = `
אתה עוזר חכם. אתר את כל הטפסים בדף הבא, פרט מה תפקיד כל שדה בטופס ומהם סוגי הקלטים. הנה הקוד:
${document.documentElement.outerHTML}
    `;
    sendToGemini(prompt);
  }

  // כתיבת פסקת פתיחה
  function actionIntroParagraph() {
    const prompt = `
אתה עוזר חכם. כתוב פסקת פתיחה מעניינת למאמר בנושא של הדף הבא:
${document.body.innerText}
    `;
    sendToGemini(prompt);
  }

  // הצעת מילות מפתח
  function actionKeywords() {
    const prompt = `
אתה עוזר חכם. הצע מילות מפתח רלוונטיות וממוקדות לדף הבא:
${document.body.innerText}
    `;
    sendToGemini(prompt);
  }

  // ניתוח מבנה HTML
  function actionAnalyzeHTML() {
    const prompt = `
אתה עוזר חכם. נתח את מבנה ה-HTML הבא, פרט בעיות אפשריות ועצות לשיפור:
${document.documentElement.outerHTML}
    `;
    sendToGemini(prompt);
  }

  // בדיקת נגישות
  function actionCheckAccessibility() {
    const prompt = `
אתה עוזר חכם. בצע בדיקת נגישות ראשונית עבור הדף הבא והצע שיפורים:
${document.documentElement.outerHTML}
    `;
    sendToGemini(prompt);
  }

  // ניתוח טון כתיבה
  function actionToneAnalysis() {
    const prompt = `
אתה עוזר חכם. נתח את הטון והסגנון של הטקסט בדף הבא:
${document.body.innerText}
    `;
    sendToGemini(prompt);
  }

  // ספירת מילים, תווים וקישורים
  function actionCountElements() {
    const wordCount = document.body.innerText.trim().split(/\s+/).length;
    const charCount = document.body.innerText.length;
    const linkCount = document.querySelectorAll('a').length;
    const msg = `מספר מילים בדף: ${wordCount}\nמספר תווים: ${charCount}\nמספר קישורים: ${linkCount}`;
    showPopup(msg);
  }

  // שיתוף עמוד
  function actionSharePage() {
    if (navigator.share) {
      navigator.share({
        title: document.title,
        url: window.location.href
      }).catch(err => alert('שיתוף נכשל: ' + err));
    } else {
      prompt('העתק את כתובת העמוד:', window.location.href);
    }
  }

  // טעינת תמונה ושליחה
  function actionLoadImage() {
    const input = document.createElement('input');
    input.type = 'file';
    input.accept = 'image/*';
    input.onchange = () => {
      const file = input.files[0];
      if (!file) return;

      const reader = new FileReader();
      reader.onload = async (e) => {
        const base64 = e.target.result;
        const prompt = `הנה תמונה בקוד בסיס64:\n${base64}\nאנא נתח את התמונה או בצע פעולות לפי בקשת המשתמש.`;
        sendToGemini(prompt);
      };
      reader.readAsDataURL(file);
    };
    input.click();
  }

  // --- ניהול אירועים לכפתורים ---
  sidebar.querySelectorAll('nav button').forEach(btn => {
    btn.addEventListener('click', e => {
      const action = btn.dataset.action;
      switch (action) {
        case 'summary': actionSummary(); break;
        case 'ideas': actionIdeas(); break;
        case 'findForms': actionFindForms(); break;
        case 'introParagraph': actionIntroParagraph(); break;
        case 'keywords': actionKeywords(); break;
        case 'analyzeHTML': actionAnalyzeHTML(); break;
        case 'checkAccessibility': actionCheckAccessibility(); break;
        case 'toneAnalysis': actionToneAnalysis(); break;
        case 'countElements': actionCountElements(); break;
        case 'sharePage': actionSharePage(); break;
        case 'loadImage': actionLoadImage(); break;
      }
    });
  });

})();
