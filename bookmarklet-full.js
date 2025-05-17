(() => {
  if (window.__geminiSidebarRunning) return;
  window.__geminiSidebarRunning = true;

  const styleContent = `
  #gemini-sidebar {
    direction: rtl;
    position: fixed;
    top: 0; right: 0;
    width: 400px;
    height: 100vh;
    background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
    box-shadow: -5px 0 15px rgba(0,0,0,0.3);
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    color: #f0f4ff;
    z-index: 100000;
    display: flex;
    flex-direction: column;
    transform: translateX(100%);
    transition: transform 0.3s ease;
    border-top-left-radius: 10px;
    border-bottom-left-radius: 10px;
  }
  #gemini-sidebar.open {
    transform: translateX(0);
  }
  #gemini-sidebar header {
    padding: 18px 20px;
    font-size: 1.3rem;
    font-weight: 700;
    background: rgba(255 255 255 / 0.15);
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-top-left-radius: 10px;
  }
  #gemini-sidebar header button.close-btn {
    background: transparent;
    border: none;
    color: #f0f4ff;
    font-size: 1.8rem;
    cursor: pointer;
    padding: 0;
    transition: color 0.2s ease;
  }
  #gemini-sidebar header button.close-btn:hover {
    color: #ffd700;
  }
  #gemini-sidebar main {
    flex-grow: 1;
    display: flex;
    flex-direction: column;
    overflow: hidden;
  }
  #gemini-sidebar nav {
    flex-shrink: 0;
    background: rgba(255 255 255 / 0.1);
    display: flex;
    flex-wrap: wrap;
    gap: 6px;
    padding: 10px 12px;
    justify-content: flex-start;
    overflow-y: auto;
    max-height: 120px;
    border-bottom: 1px solid rgba(255 255 255 / 0.2);
  }
  #gemini-sidebar nav button {
    border: none;
    background: rgba(255 255 255 / 0.25);
    color: #e0e7ff;
    padding: 8px 14px;
    font-size: 0.9rem;
    border-radius: 20px;
    cursor: pointer;
    font-weight: 600;
    transition: background 0.3s ease, transform 0.15s ease;
    user-select: none;
  }
  #gemini-sidebar nav button:hover {
    background: rgba(255 255 255 / 0.45);
    transform: scale(1.07);
  }
  #gemini-sidebar nav button:active {
    transform: scale(0.95);
  }
  #gemini-chat {
    flex-grow: 1;
    background: rgba(255 255 255 / 0.07);
    padding: 14px 16px;
    overflow-y: auto;
    display: flex;
    flex-direction: column;
    gap: 12px;
    font-size: 0.92rem;
    scrollbar-width: thin;
    scrollbar-color: #a3bffa transparent;
  }
  #gemini-chat::-webkit-scrollbar {
    width: 8px;
  }
  #gemini-chat::-webkit-scrollbar-thumb {
    background-color: #a3bffa;
    border-radius: 4px;
  }
  .gemini-message {
    max-width: 75%;
    padding: 14px 18px;
    border-radius: 22px;
    line-height: 1.4;
    white-space: pre-wrap;
    box-shadow: 0 3px 8px rgba(0,0,0,0.15);
    user-select: text;
    transition: background-color 0.3s ease;
  }
  .gemini-message.user {
    background: #1e40af;
    align-self: flex-end;
    border-bottom-right-radius: 6px;
    color: #dbeafe;
  }
  .gemini-message.server {
    background: #3b82f6;
    align-self: flex-start;
    border-bottom-left-radius: 6px;
    color: #f0f9ff;
  }
  #gemini-input-area {
    background: rgba(255 255 255 / 0.15);
    padding: 12px 14px;
    display: flex;
    gap: 10px;
    border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;
  }
  #gemini-input-area textarea {
    resize: none;
    flex-grow: 1;
    border-radius: 20px;
    border: none;
    padding: 12px 16px;
    font-size: 1rem;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    min-height: 38px;
    max-height: 120px;
    background: rgba(255 255 255 / 0.3);
    color: #0f172a;
    box-shadow: inset 0 0 5px rgba(0,0,0,0.1);
    transition: background-color 0.3s ease;
  }
  #gemini-input-area textarea:focus {
    outline: none;
    background: #ffffff;
  }
  #gemini-input-area button.send-btn {
    background: #2563eb;
    border: none;
    border-radius: 20px;
    color: white;
    font-weight: 700;
    padding: 0 22px;
    cursor: pointer;
    font-size: 1.1rem;
    user-select: none;
    transition: background-color 0.3s ease, transform 0.15s ease;
  }
  #gemini-input-area button.send-btn:hover {
    background: #1e40af;
  }
  #gemini-input-area button.send-btn:active {
    transform: scale(0.9);
  }
  #gemini-sidebar footer {
    padding: 10px 20px;
    font-size: 0.85rem;
    background: rgba(255 255 255 / 0.12);
    text-align: center;
    border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;
    color: #dbeafe;
    user-select: none;
  }
  `;

  const styleTag = document.createElement('style');
  styleTag.textContent = styleContent;
  document.head.appendChild(styleTag);

  const sidebar = document.createElement('aside');
  sidebar.id = 'gemini-sidebar';

  sidebar.innerHTML = `
    <header>
      <div>תפריט Gemini חכם + צ'אט</div>
      <button class="close-btn" title="סגור תפריט">✖</button>
    </header>
    <main>
      <nav>
        <button data-action="summary">סכם את הדף</button>
        <button data-action="ideas">הפק רעיונות למאמר</button>
        <button data-action="findForms">איתור טפסים בדף</button>
        <button data-action="introParagraph">כתוב פסקת פתיחה</button>
        <button data-action="keywords">מילות מפתח</button>
        <button data-action="analyzeHTML">ניתוח HTML</button>
        <button data-action="checkAccessibility">בדיקת נגישות</button>
        <button data-action="toneAnalysis">ניתוח טון</button>
        <button data-action="countElements">מילים, תווים, קישורים</button>
        <button data-action="sharePage">שיתוף עמוד</button>
        <button data-action="loadImage">טעינת תמונה</button>
        <button data-action="relatedReads">קריאה נוספת</button>
        <button data-action="notes">תזכורות/הערות</button>
        <button data-action="simplify">פשט משפטים</button>
        <button data-action="explainTerms">הסבר מושגים</button>
      </nav>
      <section id="gemini-chat" aria-label="אזור צ'אט עם Gemini API" role="log" aria-live="polite"></section>
      <div id="gemini-input-area">
        <textarea id="gemini-input" placeholder="כתוב הודעה..." rows="1" aria-label="הודעה לצ'אט"></textarea>
        <button class="send-btn" title="שלח הודעה">שלח</button>
      </div>
    </main>
    <footer>Powered by Gemini API</footer>
  `;

  document.body.appendChild(sidebar);
  setTimeout(() => sidebar.classList.add('open'), 100);

  const chatArea = sidebar.querySelector('#gemini-chat');
  const inputEl = sidebar.querySelector('#gemini-input');
  const sendBtn = sidebar.querySelector('.send-btn');
  const closeBtn = sidebar.querySelector('.close-btn');

  // מערך שמירת ההודעות
  const messages = [];

  function addMessage(text, sender) {
    const msgDiv = document.createElement('div');
    msgDiv.className = 'gemini-message ' + sender;
    msgDiv.textContent = text;
    chatArea.appendChild(msgDiv);
    chatArea.scrollTop = chatArea.scrollHeight;
  }

  async function sendChatMessage(text) {
    if (!text.trim()) return;
    addMessage(text, 'user');
    messages.push({ role: 'user', text });

    // שולח את כל ההודעות בבת אחת כדי לשמור על הקשר השיחתי
    const combinedText = messages.map(m => `${m.role === 'user' ? 'משתמש:' : 'שרת:'} ${m.text}`).join('\n\n');

    try {
      const response = await fetch('https://php-render-test.onrender.com/main-ai.php', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({ prompt: combinedText })
      });
      if (!response.ok) throw new Error('שרת לא הגיב כשורה');

      const data = await response.json();
      const reply = data.choices?.[0]?.message?.content || data.answer || 'אין תגובה מהשרת.';

      addMessage(reply, 'server');
      messages.push({ role: 'server', text: reply });

    } catch (e) {
      addMessage('שגיאה בשליחת ההודעה: ' + e.message, 'server');
    }
  }

  // פעולות מתוך התפריט
  function sendToGemini(prompt) {
    sendChatMessage(prompt);
  }

  function actionSummary() {
    sendToGemini(`אתה עוזר חכם. סכם בקצרה את התוכן בדף הבא:\n${document.body.innerText}`);
  }
  function actionIdeas() {
    sendToGemini(`אתה עוזר חכם. הפק רשימת רעיונות למאמר על בסיס הדף הבא:\n${document.body.innerText}`);
  }
  function actionFindForms() {
    const formsHTML = Array.from(document.forms).map(f => f.outerHTML).join('\n\n');
    sendToGemini(`אתה עוזר חכם. איתר ופרט את כל הטפסים הקיימים בדף הבא, והצע שיפורים אם אפשר:\n${formsHTML}`);
  }
  function actionIntroParagraph() {
    sendToGemini(`אתה עוזר חכם. כתוב פסקת פתיחה מעניינת למאמר בנושא של הדף הבא:\n${document.body.innerText}`);
  }
  function actionKeywords() {
    sendToGemini(`אתה עוזר חכם. הצע מילות מפתח רלוונטיות וממוקדות לדף הבא:\n${document.body.innerText}`);
  }
  function actionAnalyzeHTML() {
    sendToGemini(`אתה עוזר חכם. נתח את מבנה ה-HTML הבא, פרט בעיות אפשריות ועצות לשיפור:\n${document.documentElement.outerHTML}`);
  }
  function actionCheckAccessibility() {
    sendToGemini(`אתה עוזר חכם. בצע בדיקת נגישות ראשונית עבור הדף הבא והצע שיפורים:\n${document.documentElement.outerHTML}`);
  }
  function actionToneAnalysis() {
    sendToGemini(`אתה עוזר חכם. נתח את הטון והסגנון של הטקסט בדף הבא:\n${document.body.innerText}`);
  }
  function actionCountElements() {
    const wordCount = document.body.innerText.trim().split(/\s+/).length;
    const charCount = document.body.innerText.length;
    const linkCount = document.querySelectorAll('a').length;
    alert(`מספר מילים בדף: ${wordCount}\nמספר תווים: ${charCount}\nמספר קישורים: ${linkCount}`);
  }
  function actionSharePage() {
    if (navigator.share) {
      navigator.share({title: document.title, url: window.location.href}).catch(err => alert('שיתוף נכשל: ' + err));
    } else {
      prompt('העתק את כתובת העמוד:', window.location.href);
    }
  }
  function actionLoadImage() {
    const input = document.createElement('input');
    input.type = 'file';
    input.accept = 'image/*';
    input.onchange = () => {
      const file = input.files[0];
      if (!file) return;
      const reader = new FileReader();
      reader.onload = e => {
        const base64 = e.target.result;
        sendToGemini(`הנה תמונה בקוד בסיס64:\n${base64}\nאנא נתח את התמונה או בצע פעולות לפי בקשת המשתמש.`);
      };
      reader.readAsDataURL(file);
    };
    input.click();
  }

  // הפונקציות החדשות שהוספנו
  function actionRelatedReads() {
    sendToGemini(`הצע המלצות לקריאה נוספת בנושאים קשורים לטקסט הבא:\n${document.body.innerText}`);
  }
  function actionNotes() {
    sendToGemini(`עזור לי ליצור תזכורות או הערות פנימיות שימושיות מהתוכן הבא:\n${document.body.innerText}`);
  }
  function actionSimplify() {
    sendToGemini(`זיהוי משפטים מסובכים ושכתוב שלהם לפשטות, על בסיס הטקסט הבא:\n${document.body.innerText}`);
  }
  function actionExplainTerms() {
    sendToGemini(`הסבר בצורה פשוטה וברורה את המושגים המרכזיים בטקסט הבא:\n${document.body.innerText}`);
  }

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
        case 'relatedReads': actionRelatedReads(); break;
        case 'notes': actionNotes(); break;
        case 'simplify': actionSimplify(); break;
        case 'explainTerms': actionExplainTerms(); break;
      }
    });
  });

  // אירועים בצ'אט
  function resizeTextarea() {
    inputEl.style.height = 'auto';
    inputEl.style.height = inputEl.scrollHeight + 'px';
  }
  inputEl.addEventListener('input', resizeTextarea);
  resizeTextarea();

  sendBtn.addEventListener('click', () => {
    sendChatMessage(inputEl.value);
    inputEl.value = '';
    resizeTextarea();
  });

  inputEl.addEventListener('keydown', (e) => {
    if (e.key === 'Enter' && !e.shiftKey) {
      e.preventDefault();
      sendBtn.click();
    }
  });

  closeBtn.addEventListener('click', () => {
    sidebar.classList.remove('open');
    setTimeout(() => sidebar.remove(), 300);
    window.__geminiSidebarRunning = false;
  });

})();
