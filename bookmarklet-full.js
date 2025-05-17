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
  /* ... שאר ה-CSS נשאר כפי שהוא ... */
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

    // שולח את כל ההודעות לשמירת הקשר
    const combinedText = messages.map(m => (m.role === 'user' ? 'משתמש:' : 'שרת:') + ' ' + m.text).join('\n\n');

    try {
      const response = await fetch('https://php-render-test.onrender.com/main-ai.php', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({ text: combinedText }) // כאן השינוי העיקרי
      });
      if (!response.ok) throw new Error('שרת לא הגיב כשורה');

      const data = await response.json();
      const reply = data.text || 'אין תגובה מהשרת.'; // קריאה לפי data.text

      addMessage(reply, 'server');
      messages.push({ role: 'server', text: reply });

    } catch (e) {
      addMessage('שגיאה בשליחת ההודעה: ' + e.message, 'server');
    }
  }

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

  function actionRelatedReads() {
    sendToGemini(`הצע המלצות לקריאה נוספת בנושאים קשורים לטקסט הבא:\n${document.body.innerText}`);
  }
  function actionNotes() {
    sendToGemini(`עזור לי ליצור תזכורות או הערות פנימיות שימושיות מהתוכן הבא:\n${document.body.innerText}`);
  }
  function actionSimplify() {
    sendToGemini(`פשט את המשפטים הבאים לטקסט ברור וקל להבנה:\n${document.body.innerText}`);
  }
  function actionExplainTerms() {
    sendToGemini(`הסבר את המושגים המורכבים בטקסט הבא בצורה פשוטה וברורה:\n${document.body.innerText}`);
  }

  const actionsMap = {
    summary: actionSummary,
    ideas: actionIdeas,
    findForms: actionFindForms,
    introParagraph: actionIntroParagraph,
    keywords: actionKeywords,
    analyzeHTML: actionAnalyzeHTML,
    checkAccessibility: actionCheckAccessibility,
    toneAnalysis: actionToneAnalysis,
    countElements: actionCountElements,
    sharePage: actionSharePage,
    loadImage: actionLoadImage,
    relatedReads: actionRelatedReads,
    notes: actionNotes,
    simplify: actionSimplify,
    explainTerms: actionExplainTerms,
  };

  sidebar.querySelector('nav').addEventListener('click', e => {
    if (e.target.tagName === 'BUTTON') {
      const action = e.target.getAttribute('data-action');
      if (actionsMap[action]) actionsMap[action]();
    }
  });

  sendBtn.addEventListener('click', () => {
    const val = inputEl.value;
    if (!val.trim()) return;
    inputEl.value = '';
    sendChatMessage(val);
  });

  inputEl.addEventListener('keydown', e => {
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

  addMessage('ברוכים הבאים ל-Gemini! השתמשו בכפתורים למעלה או הקלידו הודעה כאן.', 'server');
})();
