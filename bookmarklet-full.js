(() => {
  // SECTION 1: Initial check and setup
  if (window.__geminiSidebarRunning) {
    const existingSidebar = document.getElementById('gemini-sidebar');
    if (existingSidebar && !existingSidebar.classList.contains('open')) {
      existingSidebar.classList.add('open');
      if (typeof updateChatPlaceholder === "function") updateChatPlaceholder();
      if (typeof updateSelectedTextActionStates === "function") updateSelectedTextActionStates();
    }
    return;
  }
  window.__geminiSidebarRunning = true;
  const API_URL = 'https://php-render-test.onrender.com/main-ai.php';
  const MAX_INPUT_CHARS = 8000;

  // SECTION 2: CSS Styles
  const styleContent = `
  :root {
    --gemini-primary-bg: linear-gradient(135deg, #2563eb 0%, #3b82f6 100%);
    --gemini-secondary-bg: #1e40af; 
    --gemini-tertiary-bg: #1c3d5a;
    --gemini-text-color: #e0e7ff;
    --gemini-accent-color: #60a5fa;
    --gemini-hover-accent-color: #3b82f6;
    --gemini-user-message-bg: #3b82f6;
    --gemini-server-message-bg: #1e3a8a;
    --gemini-input-bg: #2c5282;
    --gemini-border-radius: 8px;
    --gemini-box-shadow: -6px 0 22px rgba(0,0,0,0.4);
    --gemini-font: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    --animation-speed-fast: 0.2s;
    --animation-speed-normal: 0.35s;
    --animation-speed-slow: 0.5s;
    --nav-max-height: 40vh;
    --gemini-header-success-bg: #10b981; 
    --gemini-header-error-bg: #ef4444;   
    --gemini-timestamp-color: #a5b4fc; 
  }
  #gemini-sidebar { 
    direction: rtl; 
    position: fixed; 
    top: 0; 
    right: 0; 
    width: 400px; 
    max-width: 90vw; 
    height: 100vh; 
    background: var(--gemini-primary-bg); 
    box-shadow: var(--gemini-box-shadow); 
    font-family: var(--gemini-font); 
    color: var(--gemini-text-color); 
    z-index: 2147483647; 
    display: flex; 
    flex-direction: column; 
    transform: translateX(100%); 
    transition: transform 0.45s cubic-bezier(0.23, 1, 0.32, 1); 
    border-top-left-radius: var(--gemini-border-radius); 
    border-bottom-left-radius: var(--gemini-border-radius); 
    overflow: hidden; 
  }
  #gemini-sidebar.open { transform: translateX(0); }
  
  #gemini-sidebar header { 
    background-color: var(--gemini-secondary-bg);
    padding: 12px 15px; 
    display: flex; 
    justify-content: space-between; 
    align-items: center; 
    font-size: 1.1em; 
    font-weight: bold; 
    border-bottom: 1px solid rgba(255,255,255,0.1); 
    flex-shrink: 0; 
    transition: background-color var(--animation-speed-normal) ease;
  }
  #gemini-sidebar header > div:first-child { flex-grow: 1; }
  #gemini-sidebar header .header-buttons { display: flex; align-items: center; gap: 5px; }
  #gemini-sidebar .close-btn, #gemini-sidebar #gemini-clear-chat-btn { 
    background: none; 
    border: none; 
    color: var(--gemini-text-color); 
    font-size: 1.4em;
    cursor: pointer; 
    padding: 5px; 
    line-height: 1; 
    opacity: 0.8; 
    transition: opacity var(--animation-speed-fast), transform var(--animation-speed-fast); 
  }
  #gemini-sidebar .close-btn:hover, #gemini-sidebar #gemini-clear-chat-btn:hover { 
    opacity: 1; 
    transform: scale(1.1); 
  }
  #gemini-sidebar .close-btn:hover { transform: rotate(90deg) scale(1.1); }


  #gemini-nav-container {
    padding: 10px 12px 0 12px; 
    background: var(--gemini-primary-bg); 
    flex-shrink: 0; 
    overflow-y: auto; 
    max-height: var(--nav-max-height); 
  }

  #gemini-sidebar nav#gemini-nav-categories {
    display: flex; 
    flex-direction: column; 
    gap: 8px;
  }

  #gemini-sidebar .category { 
    background-color: var(--gemini-tertiary-bg); 
    border-radius: calc(var(--gemini-border-radius) - 2px); 
    overflow: hidden; 
    box-shadow: 0 2px 5px rgba(0,0,0,0.2); 
    transition: box-shadow var(--animation-speed-fast), transform var(--animation-speed-fast); 
  }
  #gemini-sidebar .category:hover { box-shadow: 0 4px 8px rgba(0,0,0,0.25); transform: translateY(-1px); }
  
  #gemini-sidebar .category-header {
    background-color: var(--gemini-secondary-bg);
    padding: 10px; 
    cursor: pointer;
    display: flex;
    justify-content: space-between;
    align-items: center; 
    gap: 8px; 
    font-weight: 600; 
    font-size: 0.95em; 
    transition: background-color var(--animation-speed-fast) ease;
    user-select: none;
    border-bottom: 1px solid rgba(255,255,255,0.05);
    position: relative; 
    box-sizing: border-box;
  }

  #gemini-sidebar .category-header span:first-child { 
    white-space: normal;   
    line-height: 1.35;     
    flex-grow: 1;          
    overflow-wrap: break-word; 
  }
  
  #gemini-sidebar .category-header:hover { background-color: var(--gemini-hover-accent-color); }
  #gemini-sidebar .category-header.open { border-bottom-color: var(--gemini-accent-color); }
  
  #gemini-sidebar .category-toggle-icon { 
    flex-shrink:0; 
    transition: transform var(--animation-speed-normal) cubic-bezier(0.68, -0.55, 0.27, 1.55);
    width: 18px; 
    height: 18px;
    fill: currentColor; 
  }
  #gemini-sidebar .category-header.open .category-toggle-icon { transform: rotate(90deg); }

  #gemini-sidebar .category-content { 
    max-height: 0; 
    overflow: hidden; 
    padding: 0 10px; 
    transition: max-height var(--animation-speed-normal) cubic-bezier(0.4, 0, 0.2, 1), padding var(--animation-speed-normal) cubic-bezier(0.4, 0, 0.2, 1); 
    display: grid; 
    grid-template-columns: repeat(auto-fill, minmax(130px, 1fr)); 
    gap: 8px; 
    background-color: rgba(0,0,0,0.1); 
  }
  #gemini-sidebar .category-content.open { padding: 10px; }
  #gemini-sidebar .category-content button { 
    background-color: var(--gemini-input-bg); 
    color: var(--gemini-text-color); 
    border: 1px solid transparent; 
    padding: 10px 8px; 
    border-radius: calc(var(--gemini-border-radius) - 4px); 
    cursor: pointer; 
    font-size: 0.85em; 
    transition: all 0.25s ease-out; 
    text-align: right; 
    white-space: nowrap; 
    overflow: hidden; 
    text-overflow: ellipsis; 
    opacity: 0; 
    transform: perspective(500px) rotateX(-20deg) translateY(15px); 
    animation-fill-mode: forwards; 
    box-shadow: 0 1px 2px rgba(0,0,0,0.15); 
  }
  #gemini-sidebar .category-content.open button { 
    animation-name: popInButton; 
    animation-duration: var(--animation-speed-slow); 
    animation-timing-function: cubic-bezier(0.25, 0.46, 0.45, 0.94); 
  }
  @keyframes popInButton { 
    0% { opacity: 0; transform: perspective(500px) rotateX(-30deg) translateY(20px) scale(0.9); } 
    60% { opacity: 0.8; transform: perspective(500px) rotateX(10deg) translateY(-5px) scale(1.05); } 
    100% { opacity: 1; transform: perspective(500px) rotateX(0deg) translateY(0) scale(1); } 
  }
  #gemini-sidebar .category-content.open button:nth-child(1) { animation-delay: 0.05s; } 
  #gemini-sidebar .category-content.open button:nth-child(2) { animation-delay: 0.1s; } 
  #gemini-sidebar .category-content.open button:nth-child(3) { animation-delay: 0.15s; } 
  #gemini-sidebar .category-content button:hover { 
    background-color: var(--gemini-accent-color); 
    color: #fff; 
    transform: translateY(-2px) scale(1.03); 
    box-shadow: 0 4px 8px rgba(0,0,0,0.2); 
    border-color: rgba(255,255,255,0.3); 
  }
  #gemini-sidebar .category-content button:active { transform: translateY(0px) scale(0.98); box-shadow: 0 1px 2px rgba(0,0,0,0.15); }
  #gemini-sidebar .category-content button:disabled { 
    opacity: 0.5 !important;
    cursor: not-allowed; 
    background-color: var(--gemini-input-bg) !important;
    transform: none !important; 
    box-shadow: none !important; 
    border-color: transparent !important; 
  }

  #gemini-sidebar main {
    flex-grow: 1; 
    display: flex; 
    flex-direction: column;
    overflow: hidden; 
    padding: 0 12px 12px 12px; 
    background: var(--gemini-primary-bg); 
  }

  #gemini-sidebar #gemini-chat { 
    flex-grow: 1; 
    overflow-y: auto; 
    padding: 10px; 
    margin-bottom: 10px; 
    background-color: rgba(0,0,0,0.25); 
    border-radius: var(--gemini-border-radius); 
    scroll-behavior: smooth; 
    margin-top: 10px; 
  }
  #gemini-nav-container:empty + main #gemini-chat {
      margin-top: 0; 
  }

  #gemini-sidebar .gemini-message { 
    padding: 8px 12px;
    border-radius: var(--gemini-border-radius); 
    margin-bottom: 10px; 
    max-width: 90%;
    line-height: 1.5; 
    word-wrap: break-word; 
    unicode-bidi: plaintext; 
    animation: fadeInMessage 0.3s ease-out; 
    display: flex; 
    flex-direction: column; 
    position: relative; 
  }
  #gemini-sidebar .gemini-message-content {
    white-space: pre-wrap; 
    margin-bottom: 4px; 
  }
  #gemini-sidebar .gemini-message-meta {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 0.75em;
    opacity: 0.8;
  }
  #gemini-sidebar .gemini-message-timestamp {
    color: var(--gemini-timestamp-color);
    direction: ltr; 
    margin-right: auto; 
  }
  #gemini-sidebar .gemini-copy-btn {
    background: none;
    border: none;
    color: var(--gemini-accent-color);
    cursor: pointer;
    font-size: 1.2em; 
    padding: 2px 4px;
    line-height: 1;
    opacity: 0.7;
  }
  #gemini-sidebar .gemini-copy-btn:hover { opacity: 1; transform: scale(1.1); }
  #gemini-sidebar .gemini-copy-btn.copied { color: var(--gemini-header-success-bg); }


  @keyframes fadeInMessage { from { opacity: 0; transform: translateY(5px); } to { opacity: 1; transform: translateY(0); } }
  #gemini-sidebar .gemini-message.user { background-color: var(--gemini-user-message-bg); margin-right: auto; color: #fff; text-align: right; }
  #gemini-sidebar .gemini-message.server { background-color: var(--gemini-server-message-bg); margin-left: auto; text-align: right; }
  
  /* Styling for the loading dots animation */
  #gemini-sidebar .gemini-message.loading { 
    font-style: normal; /* Remove italic */
    animation: none; /* Remove gemini-pulse */
    display: flex; 
    align-items: center; 
    justify-content: flex-end; /* Align to the right for server messages */
    min-height: 30px; /* Ensure it has some height */
  }
  #gemini-sidebar .loading-dots span {
    display: inline-block;
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background-color: var(--gemini-text-color); /* Or var(--gemini-accent-color) */
    margin: 0 2px;
    animation: dot-bounce 1.4s infinite ease-in-out both;
  }
  #gemini-sidebar .loading-dots span:nth-child(1) { animation-delay: -0.32s; }
  #gemini-sidebar .loading-dots span:nth-child(2) { animation-delay: -0.16s; }
  /* #gemini-sidebar .loading-dots span:nth-child(3) { animation-delay: 0s; } /* No delay for the third one */

  @keyframes dot-bounce {
    0%, 80%, 100% { transform: scale(0); }
    40% { transform: scale(1.0); }
  }

  #gemini-sidebar .gemini-message.server strong { font-weight: bold; color: #f0f4ff; } 
  #gemini-sidebar .gemini-message.server em { font-style: italic; } 
  #gemini-sidebar .gemini-message.server code { 
    background-color: rgba(0,0,0,0.35); 
    padding: 3px 7px; 
    border-radius: 4px; 
    font-family: 'Consolas', 'Courier New', Courier, monospace; 
    font-size: 0.9em; 
    border: 1px solid rgba(255,255,255,0.1); 
    color: #c7d2fe; 
    direction: ltr; 
    display: inline-block; 
    max-width: 100%; 
    overflow-x: auto; 
  }
  #gemini-sidebar .gemini-message.server del { text-decoration: line-through; } 
  #gemini-sidebar .gemini-message.server a { color: var(--gemini-accent-color); text-decoration: underline; } 
  #gemini-sidebar .gemini-message.server a:hover { color: var(--gemini-hover-accent-color); }
  
  #gemini-sidebar #gemini-input-area { 
    display: flex; 
    align-items: flex-end; 
    padding: 8px; 
    background-color: rgba(0,0,0,0.1); 
    border-radius: var(--gemini-border-radius); 
    flex-shrink: 0; 
    position: relative; 
  }
  #gemini-sidebar #gemini-char-counter {
    position: absolute;
    bottom: 10px; 
    left: 60px; 
    font-size: 0.75em;
    color: var(--gemini-timestamp-color);
    background-color: rgba(0,0,0,0.3);
    padding: 1px 4px;
    border-radius: 3px;
    direction: ltr; 
    user-select: none;
  }
  #gemini-sidebar #gemini-input { 
    flex-grow: 1; 
    padding: 10px 12px; 
    border: 1px solid var(--gemini-accent-color); 
    border-radius: var(--gemini-border-radius); 
    background-color: var(--gemini-input-bg); 
    color: var(--gemini-text-color); 
    font-family: inherit; 
    font-size: 1em; 
    resize: none; 
    min-height: 40px; 
    max-height: 150px; 
    overflow-y: auto; 
    direction: rtl; 
  }
  #gemini-sidebar #gemini-input::placeholder { color: rgba(224, 231, 255, 0.6); direction: rtl; } 
  #gemini-sidebar #gemini-input:focus { 
    outline: none; 
    border-color: var(--gemini-hover-accent-color); 
    box-shadow: 0 0 0 3px rgba(var(--gemini-accent-color), 0.3); 
  }
  #gemini-sidebar .send-btn { 
    background-color: var(--gemini-accent-color); 
    color: #fff; 
    border: none; 
    padding: 0 12px; 
    height: 40px; 
    border-radius: var(--gemini-border-radius); 
    cursor: pointer; 
    margin-right: 8px; 
    font-size: 1em; 
    display: flex; 
    align-items: center; 
    justify-content: center; 
    transition: background-color var(--animation-speed-fast); 
    flex-shrink: 0; 
  }
  #gemini-sidebar .send-btn svg { width: 20px; height: 20px; fill: currentColor; } 
  #gemini-sidebar .send-btn:hover { background-color: var(--gemini-hover-accent-color); } 
  #gemini-sidebar .send-btn:disabled { background-color: #9ca3af; cursor: not-allowed; }
  
  #gemini-sidebar footer { 
    padding: 8px 15px; 
    text-align: center; 
    font-size: 0.8em; 
    opacity: 0.7; 
    border-top: 1px solid rgba(255,255,255,0.1); 
    flex-shrink: 0; 
  }
  
  #gemini-sidebar #gemini-chat::-webkit-scrollbar, 
  #gemini-sidebar #gemini-input::-webkit-scrollbar, 
  #gemini-sidebar #gemini-nav-container::-webkit-scrollbar, 
  #gemini-sidebar nav#gemini-nav-categories::-webkit-scrollbar { width: 8px; }
  
  #gemini-sidebar #gemini-chat::-webkit-scrollbar-track, 
  #gemini-sidebar #gemini-input::-webkit-scrollbar-track, 
  #gemini-sidebar #gemini-nav-container::-webkit-scrollbar-track, 
  #gemini-sidebar nav#gemini-nav-categories::-webkit-scrollbar-track { 
    background: rgba(0,0,0,0.1); 
    border-radius: var(--gemini-border-radius); 
  }
  
  #gemini-sidebar #gemini-chat::-webkit-scrollbar-thumb, 
  #gemini-sidebar #gemini-input::-webkit-scrollbar-thumb, 
  #gemini-sidebar #gemini-nav-container::-webkit-scrollbar-thumb, 
  #gemini-sidebar nav#gemini-nav-categories::-webkit-scrollbar-thumb { 
    background: var(--gemini-accent-color); 
    border-radius: var(--gemini-border-radius); 
  }
  
  #gemini-sidebar #gemini-chat::-webkit-scrollbar-thumb:hover, 
  #gemini-sidebar #gemini-input::-webkit-scrollbar-thumb:hover, 
  #gemini-sidebar #gemini-nav-container::-webkit-scrollbar-thumb:hover, 
  #gemini-sidebar nav#gemini-nav-categories::-webkit-scrollbar-thumb:hover { 
    background: var(--gemini-hover-accent-color); 
  }
  #gemini-sidebar #toggle-nav-in-chat-focus-container { display: none !important; }
  `;
  const styleTag = document.createElement('style');
  styleTag.textContent = styleContent;
  document.head.appendChild(styleTag);

  const chevronIconSVG = `<svg class="category-toggle-icon" viewBox="0 0 24 24"><path d="M8.59 16.59L13.17 12 8.59 7.41 10 6l6 6-6 6-1.41-1.41z"></path></svg>`;

  // SECTION 3: HTML Structure
  const sidebar = document.createElement('aside');
  sidebar.id = 'gemini-sidebar';
  // Make sure to fill in all categories and buttons correctly here.
  // This is a condensed version for brevity.
  sidebar.innerHTML = `
    <header> 
      <div>תפריט Gemini חכם + צ'אט</div> 
      <div class="header-buttons">
        <button id="gemini-clear-chat-btn" title="נקה צ'אט">🗑️</button>
        <button class="close-btn" title="סגור תפריט (Esc)">✖</button> 
      </div>
    </header>
    
    <div id="gemini-nav-container">
      <nav id="gemini-nav-categories">
        <div class="category"> 
          <div class="category-header"> <span>ניתוח תוכן דף</span> ${chevronIconSVG} </div> 
          <div class="category-content"> 
            <button data-action="summary" title="סכם את כל תוכן הטקסט של הדף הנוכחי">סכם דף</button> 
            <button data-action="keywords" title="הצע מילות מפתח רלוונטיות לתוכן הדף">מילות מפתח</button> 
            <button data-action="toneAnalysis" title="נתח את הטון והסגנון של תוכן הדף">ניתוח טון</button> 
            <button data-action="simplify" title="פשט משפטים מורכבים בתוכן הדף">פשט משפטים</button> 
            <button data-action="explainTerms" title="הסבר מושגים מורכבים מתוכן הדף">הסבר מושגים</button> 
            <button data-action="relatedReads" title="הצע קריאה נוספת בנושאים קשורים לדף">קריאה נוספת</button> 
            <button data-action="notes" title="צור תזכורות או הערות מתוכן הדף">תזכורות/הערות</button> 
            <button data-action="generateQA" title="צור שאלות ותשובות על בסיס תוכן הדף">צור שאלות ותשובות</button>
            <button data-action="factCheck" title="בדוק עובדות עיקריות מתוכן הדף">בדוק עובדות עיקריות</button>
            <button data-action="translatePageToEnglish" title="תרגם את כל תוכן הדף לאנגלית">תרגם דף לאנגלית</button>
          </div> 
        </div>
        <div class="category"> 
          <div class="category-header"> <span>יצירת תוכן</span> ${chevronIconSVG} </div> 
          <div class="category-content"> 
            <button data-action="ideas" title="הפק רעיונות למאמר על בסיס תוכן הדף">רעיונות למאמר</button> 
            <button data-action="introParagraph" title="כתוב פסקת פתיחה למאמר בנושא הדף">פסקת פתיחה</button> 
            <button data-action="writeSocialPost" title="כתוב פוסט לרשת חברתית על בסיס תוכן הדף">פוסט לרשת חברתית</button> 
            <button data-action="generateShoppingList" title="צור רשימת קניות מתוכן הדף (אם רלוונטי)">צור רשימת קניות</button>
            <button data-action="defineTermsInPage" title="הגדר מונחים טכניים מתוכן הדף">הגדרות מילוניות</button>
          </div> 
        </div>
         <div class="category"> 
          <div class="category-header"> <span>פעולות על טקסט מסומן</span> ${chevronIconSVG} </div> 
          <div class="category-content"> 
            <button data-action="translateSelected" title="תרגם את הטקסט שסימנת כעת בדף">תרגם טקסט מסומן</button>
            <button data-action="explainSelected" title="הסבר את הטקסט שסימנת כעת בדף">הסבר טקסט מסומן</button>
            <button data-action="summarizeSelected" title="סכם את הטקסט שסימנת כעת בדף">סכם טקסט מסומן</button>
            <button data-action="searchSelectedWithGoogle" title="חפש בגוגל את הטקסט שסימנת">חפש מסומן בגוגל</button>
            <button data-action="createNoteFromSelected" title="צור הערה מהטקסט שסימנת">צור הערה מהמסומן</button>
          </div> 
        </div>
        <div class="category"> 
          <div class="category-header"> <span>כלי עזר לגלישה</span> ${chevronIconSVG} </div> 
          <div class="category-content"> 
            <button data-action="findRelatedVideos" title="הצע חיפושים ליוטיוב לסרטונים קשורים לדף">מצא סרטונים קשורים</button> 
            <button data-action="eli5" title="הסבר את נושא הדף כמו לילד בן 5">הסבר כמו לילד בן 5</button> 
            <button data-action="removeAdsBasic" title="נסה להסיר פרסומות בסיסיות מהדף">הסר פרסומות (בסיסי)</button> 
            <button data-action="highlightLinks" title="הדגש את כל הקישורים בדף">הדגש קישורים</button> 
            <button data-action="increaseTextSize" title="הגדל את גודל הטקסט הכללי בדף">הגדל טקסט</button> 
            <button data-action="decreaseTextSize" title="הקטן את גודל הטקסט הכללי בדף">הקטן טקסט</button> 
            <button data-action="readingModeBasic" title="הפעל מצב קריאה בסיסי לדף">מצב קריאה (בסיסי)</button> 
            <button data-action="generateQRCode" title="צור קוד QR לכתובת הדף הנוכחי">צור קוד QR</button> 
            <button data-action="saveAsPDF" title="שמור את הדף הנוכחי כקובץ PDF">שמור כ-PDF</button> 
            <button data-action="toggleVideos" title="נגן או השהה את כל סרטוני הוידאו בדף">נגן/השהה סרטונים</button>
          </div> 
        </div>
        <div class="category"> 
          <div class="category-header"> <span>ניתוח טכני וכלים</span> ${chevronIconSVG} </div> 
          <div class="category-content"> 
            <button data-action="findForms" title="נתח את הטפסים הקיימים בדף">איתור טפסים</button> 
            <button data-action="analyzeHTML" title="נתח את מבנה ה-HTML של הדף">ניתוח HTML</button> 
            <button data-action="checkAccessibility" title="בצע בדיקת נגישות ראשונית לדף">בדיקת נגישות</button> 
            <button data-action="countElements" title="ספור אלמנטים שונים בדף (מילים, קישורים וכו')">ספירת אלמנטים</button> 
            <button data-action="loadImage" title="טען תמונה מכתובת URL והצג אותה">טעינת תמונה</button> 
            <button data-action="checkPageSpeedFactors" title="זהה גורמים פוטנציאליים המשפיעים על מהירות הדף">בדיקת מהירות (גורמים)</button> 
            <button data-action="extractEmails" title="חלץ כתובות אימייל מתוכן הדף">חילוץ אימיילים</button> 
            <button data-action="checkBrokenLinksBasic" title="בדוק קישורים שבורים בסיסיים בדף">בדוק קישורים שבורים (בסיסי)</button>
          </div> 
        </div>
        <div class="category"> 
          <div class="category-header"> <span>שיתוף ופעולות דפדפן</span> ${chevronIconSVG} </div> 
          <div class="category-content"> 
            <button data-action="sharePage" title="שתף את הדף הנוכחי באמצעות אפשרויות השיתוף של הדפדפן">שיתוף עמוד</button> 
          </div> 
        </div>
      </nav>
    </div>

    <main> 
      <section id="gemini-chat" aria-label="אזור צ'אט עם Gemini API" role="log" aria-live="polite"></section>
      <div id="gemini-input-area"> 
        <textarea id="gemini-input" placeholder="הקלד הודעה כאן..." rows="1" aria-label="הודעה לצ'אט"></textarea> 
        <span id="gemini-char-counter">0/${MAX_INPUT_CHARS}</span>
        <button class="send-btn" title="שלח הודעה (Enter)"> 
          <svg viewBox="0 0 24 24"><path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"></path></svg> 
        </button> 
      </div>
    </main>
    
    <footer>מופעל באמצעות Gemini API</footer>
  `;
  document.body.appendChild(sidebar);

  // SECTION 4: DOM Element Variables
  const headerElement = sidebar.querySelector('header');
  const navElement = sidebar.querySelector('nav#gemini-nav-categories'); 
  const chatArea = sidebar.querySelector('#gemini-chat');
  const inputEl = sidebar.querySelector('#gemini-input');
  const sendBtn = sidebar.querySelector('.send-btn');
  const closeBtn = sidebar.querySelector('.close-btn');
  const clearChatBtn = sidebar.querySelector('#gemini-clear-chat-btn');
  const charCounterElement = sidebar.querySelector('#gemini-char-counter');

  // SECTION 5: State Variables
  const messages = [];
  let isLoading = false;
  let loadingMessageDiv = null;
  const chatPlaceholders = [
    "איך אני יכול לעזור לך היום?", "שאל אותי על תוכן הדף...",
    "מה תרצה ליצור או לנתח?", "הקלד שאלה או בחר פעולה מהתפריט...",
    "יש לך שאלה על הדף הזה? אני כאן לעזור."
  ];
  let placeholderIndex = 0;
  let headerStatusTimeout = null; 

  // SECTION 6: Core Functions
  function closeAllCategoriesGlobal(parentElement = sidebar.querySelector('#gemini-nav-container')) { 
    if (!parentElement) return; 
    parentElement.querySelectorAll('nav .category-content.open').forEach(catContent => { 
      catContent.classList.remove('open'); 
      catContent.style.maxHeight = null; 
      const header = catContent.previousElementSibling; 
      if (header && header.classList.contains('category-header')) { 
        header.classList.remove('open'); 
      } 
    }); 
  }
  
  function escapeHTML(str) { const p = document.createElement('p'); p.textContent = str; return p.innerHTML; }
  function applyBasicMarkdown(text) { let html = text; html = html.replace(/(?<!\\)\*\*(.*?)(?<!\\)\*\*/g, '<strong>$1</strong>'); html = html.replace(/(?<!\\)__(.*?)(?<!\\)__/g, '<strong>$1</strong>'); html = html.replace(/(?<!\\)\*(.*?)(?<!\\)\*/g, '<em>$1</em>'); html = html.replace(/(^|\s|\()(?<!\\)_(.*?)(?<!\\)_(\s|$|\)|\.|,|\?|!)/g, '$1<em>$2</em>$3'); html = html.replace(/(?<!\\)`(.*?)`(?<!\\)/g, '<code>$1</code>'); html = html.replace(/~~(.*?)~~/g, '<del>$1</del>'); html = html.replace(/(https?:\/\/[^\s<>"']+)/g, '<a href="$1" target="_blank" rel="noopener noreferrer">$1</a>'); html = html.replace(/\\\*/g, '*').replace(/\\_/g, '_').replace(/\\`/g, '`'); return html; }
  
  function updateChatPlaceholder() {
    if (inputEl) {
        inputEl.placeholder = chatPlaceholders[placeholderIndex];
        placeholderIndex = (placeholderIndex + 1) % chatPlaceholders.length;
    }
  }

  function setHeaderStatus(statusType) { 
      if (headerStatusTimeout) clearTimeout(headerStatusTimeout);
      if (headerElement) {
          if (statusType === 'success') {
              headerElement.style.backgroundColor = 'var(--gemini-header-success-bg)';
          } else if (statusType === 'error') {
              headerElement.style.backgroundColor = 'var(--gemini-header-error-bg)';
          } else { 
              headerElement.style.backgroundColor = 'var(--gemini-secondary-bg)';
              return; 
          }
          headerStatusTimeout = setTimeout(() => {
              headerElement.style.backgroundColor = 'var(--gemini-secondary-bg)';
              headerStatusTimeout = null;
          }, 2000);
      }
  }


  function setLoading(loading) { 
    isLoading = loading; 
    if(sendBtn) sendBtn.disabled = loading; 
    if(inputEl) inputEl.disabled = loading; 

    sidebar.querySelectorAll('#gemini-nav-container .category-content button').forEach(btn => {
        const action = btn.getAttribute('data-action');
        if (!selectedTextActions.includes(action)) {
            btn.disabled = loading;
        }
    });
    updateSelectedTextActionStates(); 

    if (loading) { 
      setHeaderStatus('default'); 
      if (loadingMessageDiv && loadingMessageDiv.parentNode === chatArea) { 
        loadingMessageDiv.remove(); 
      } 
      loadingMessageDiv = document.createElement('div'); 
      loadingMessageDiv.className = 'gemini-message server loading'; 
      // Create the dots animation
      const dotsContainer = document.createElement('div');
      dotsContainer.className = 'loading-dots';
      for (let i = 0; i < 3; i++) {
          dotsContainer.appendChild(document.createElement('span'));
      }
      loadingMessageDiv.appendChild(dotsContainer);

      if(chatArea) chatArea.appendChild(loadingMessageDiv); 
      if(chatArea) chatArea.scrollTop = chatArea.scrollHeight; 
    } else { 
      if (loadingMessageDiv && loadingMessageDiv.parentNode === chatArea) { 
        loadingMessageDiv.remove(); 
        loadingMessageDiv = null; 
      } 
    } 
  }
  
  function addMessage(text, sender, isRawHTML = false) { 
    const msgDiv = document.createElement('div'); 
    msgDiv.className = 'gemini-message ' + sender; 

    const messageContentSpan = document.createElement('span');
    messageContentSpan.className = 'gemini-message-content';

    if (sender === 'server') { 
      if (isRawHTML) {
        messageContentSpan.innerHTML = text;
      } else {
        const escapedText = escapeHTML(text); 
        const formattedText = applyBasicMarkdown(escapedText); 
        messageContentSpan.innerHTML = formattedText; 
      }
    } else { 
      messageContentSpan.textContent = text; 
    } 
    
    msgDiv.appendChild(messageContentSpan);

    const metaDiv = document.createElement('div');
    metaDiv.className = 'gemini-message-meta';

    const timestamp = new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
    const timestampSpan = document.createElement('span');
    timestampSpan.className = 'gemini-message-timestamp';
    timestampSpan.textContent = timestamp;
    metaDiv.appendChild(timestampSpan);

    const copyBtn = document.createElement('button');
    copyBtn.innerHTML = '📋'; 
    copyBtn.title = 'העתק הודעה';
    copyBtn.className = 'gemini-copy-btn';
    copyBtn.addEventListener('click', () => {
        const textToCopy = messageContentSpan.innerText || messageContentSpan.textContent;
        navigator.clipboard.writeText(textToCopy)
            .then(() => {
                copyBtn.innerHTML = '✅';
                copyBtn.classList.add('copied');
                setTimeout(() => { 
                    copyBtn.innerHTML = '📋'; 
                    copyBtn.classList.remove('copied');
                }, 1500);
            })
            .catch(err => {
                console.error('Failed to copy: ', err);
                copyBtn.innerHTML = '❌';
                 setTimeout(() => { copyBtn.innerHTML = '📋'; }, 1500);
            });
    });
    metaDiv.appendChild(copyBtn);
    msgDiv.appendChild(metaDiv);
    
    if(chatArea) chatArea.appendChild(msgDiv); 
    if(chatArea) chatArea.scrollTop = chatArea.scrollHeight; 
  }
  
  async function sendChatMessage(text, isAction = false) { 
    if (!text || !text.trim() || isLoading) return; 
    const currentInputVal = inputEl ? inputEl.value : ""; 

    const messagesToSend = [...messages]; 

    if (messagesToSend.length === 0) { 
        const pageUrl = window.location.href;
        const pageTitle = document.title;
        const timestamp = new Date().toISOString();
        const pageInfoMessage = `System Note: User is on page:\nURL: ${pageUrl}\nTitle: ${pageTitle}\nTimestamp: ${timestamp}`;
        messagesToSend.unshift({ role: 'system', text: pageInfoMessage }); 
    }

    if (!isAction) { 
      addMessage(text, 'user'); 
      messages.push({ role: 'user', text }); 
      messagesToSend.push({ role: 'user', text }); 
      if(inputEl) { 
        inputEl.value = ''; 
        inputEl.style.height = 'auto'; 
        inputEl.style.height = (inputEl.scrollHeight) + 'px'; 
        if (charCounterElement) charCounterElement.textContent = `0/${MAX_INPUT_CHARS}`;
      } 
    } else { 
      if (!messages.find(m => m.text === text && m.role === 'user')) {
          messages.push({ role: 'user', text });
      }
      messagesToSend.push({ role: 'user', text });
    } 

    if(inputEl) inputEl.focus(); 
    if(chatArea) chatArea.scrollTop = chatArea.scrollHeight; 
    setLoading(true); 
    
    const combinedTextForAPI = messagesToSend.map(m => `${m.role === 'system' ? 'System Note' : (m.role === 'user' ? 'משתמש' : 'שרת')}: ${m.text}`).join('\n\n');

    try { 
      const response = await fetch(API_URL, { 
        method: 'POST', 
        headers: {'Content-Type': 'application/json'}, 
        body: JSON.stringify({ text: combinedTextForAPI }) 
      }); 
      if (!response) { throw new Error("תגובת השרת לא הוגדרה (undefined)."); } 
      
      if (!response.ok) { 
        setLoading(false); 
        let errorText = `שגיאת שרת (${response.status})`; 
        try { 
          const errorData = await response.json(); 
          errorText += `: ${errorData.message || errorData.error || JSON.stringify(errorData)}`; 
        } catch (e_json) { 
          try { 
            const textError = await response.text(); 
            errorText += `: ${textError || 'אין מידע טקסטואלי נוסף בשגיאה'}`; 
          } catch (e_text) { 
            errorText += ': לא ניתן היה לקרוא את גוף השגיאה.'; 
          }
        } 
        throw new Error(errorText); 
      } 
      const data = await response.json(); 
      setLoading(false); 
      const reply = data.text || 'לא התקבלה תשובה תקינה מהשרת. (תגובה ריקה)'; 
      addMessage(reply, 'server'); 
      messages.push({ role: 'server', text: reply }); 
      setHeaderStatus('success');
    } catch (e) { 
      console.error('שגיאה מלאה ב-sendChatMessage:', e); 
      if(isLoading) setLoading(false); 
      let displayErrorMessage = 'שגיאה בשליחת ההודעה.'; 
      if (e instanceof TypeError && e.message.toLowerCase().includes("failed to fetch")) { 
        displayErrorMessage = "שגיאה: לא ניתן היה להתחבר לשרת (Failed to fetch). בדוק חיבור רשת או זמינות השרת."; 
      } else if (e.message) { 
        displayErrorMessage = e.message; 
      } 
      addMessage(displayErrorMessage, 'server'); 
      setHeaderStatus('error');
      if (!isAction && currentInputVal && inputEl) { 
        inputEl.value = currentInputVal; 
        if (charCounterElement) charCounterElement.textContent = `${currentInputVal.length}/${MAX_INPUT_CHARS}`;
      } 
    } 
  }
  
  function sendActionToGemini(promptPrefix, content) { 
    if (isLoading) return; 
    if(chatArea) chatArea.scrollTop = chatArea.scrollHeight; 
    if(inputEl) inputEl.focus(); 
    
    if (content === null || typeof content === 'undefined' || (typeof content === 'string' && !content.trim())) { 
      addMessage("לא נמצא תוכן רלוונטי עבור פעולה זו.", "server"); 
      setHeaderStatus('error');
      return; 
    } 
    
    const fullPrompt = `${promptPrefix}\n\nהתוכן:\n${content.substring(0, 15000)}`; 
    sendChatMessage(fullPrompt, true); 
  }

  const getPageText = () => document.body.innerText || document.documentElement.textContent; 
  const getSelectedText = () => window.getSelection().toString().trim();
  const getPageHTML = () => document.documentElement.outerHTML; 
  const getFormsHTML = () => { const forms = Array.from(document.forms); if (forms.length === 0) return "לא נמצאו טפסים בדף זה."; return forms.map(f => { const formElements = Array.from(f.elements).map(el => `<${el.tagName.toLowerCase()} name="${el.name || ''}" type="${el.type || ''}" />`).join('\n  '); return `<form name="${f.name || ''}" action="${f.action || ''}" method="${f.method || 'GET'}">\n  ${formElements}\n</form>`; }).join('\n\n---\n\n'); };
  
  const selectedTextActions = ['translateSelected', 'explainSelected', 'summarizeSelected', 'searchSelectedWithGoogle', 'createNoteFromSelected'];

  // SECTION 7: Action Definitions (actionsMap) - No major changes, just ensure setHeaderStatus is called
  const actionsMap = { 
    summary: () => sendActionToGemini("סכם בקצרה את התוכן הבא:", getPageText()), 
    keywords: () => sendActionToGemini("הצע 5-7 מילות מפתח רלוונטיות וממוקדות עבור התוכן הבא:", getPageText()), 
    toneAnalysis: () => sendActionToGemini("נתח את הטון הכללי והסגנון של הטקסט הבא:", getPageText()), 
    simplify: () => sendActionToGemini("פשט את המשפטים המורכבים בטקסט הבא:", getPageText()), 
    explainTerms: () => sendActionToGemini("זהה 3-5 מושגים מורכבים מהטקסט הבא והסבר אותם:", getPageText()), 
    relatedReads: () => sendActionToGemini("על בסיס הטקסט הבא, הצע 2-3 המלצות לקריאה נוספת:", getPageText()), 
    notes: () => sendActionToGemini("צור סיכום קצר בנקודות מהתוכן הבא:", getPageText()), 
    generateQA: () => sendActionToGemini("על בסיס התוכן הבא, הפק 3-5 שאלות ותשובות:", getPageText()),
    factCheck: () => sendActionToGemini("זהה 2-3 טענות עיקריות מהתוכן הבא ובדוק אותן:", getPageText()),
    translatePageToEnglish: () => sendActionToGemini("Translate the following page content to English:", getPageText()),
    ideas: () => sendActionToGemini("הפק רעיונות למאמר על בסיס התוכן הבא:", getPageText()), 
    introParagraph: () => sendActionToGemini("כתוב פסקת פתיחה למאמר בנושא של התוכן הבא:", getPageText()), 
    writeSocialPost: () => sendActionToGemini("כתוב פוסט לרשת חברתית על בסיס תוכן הדף הבא:", getPageText()), 
    generateShoppingList: () => sendActionToGemini("סרוק את תוכן הדף וחפש פריטים לרשימת קניות:", getPageText()),
    defineTermsInPage: () => sendActionToGemini("זהה 3-5 מונחים טכניים מתוכן הדף וספק הגדרות:", getPageText()),
    
    translateSelected: () => {
        const selectedContent = getSelectedText();
        if (!selectedContent) { addMessage("אנא סמן טקסט בדף כדי לתרגם אותו.", "server"); setHeaderStatus('error'); return; }
        sendActionToGemini("תרגם את הטקסט המסומן הבא:", selectedContent);
    },
    explainSelected: () => {
        const selectedContent = getSelectedText();
        if (!selectedContent) { addMessage("אנא סמן טקסט בדף כדי לקבל עליו הסבר.", "server"); setHeaderStatus('error'); return; }
        sendActionToGemini("הסבר בפירוט את הטקסט המסומן הבא:", selectedContent);
    },
    summarizeSelected: () => {
        const selectedContent = getSelectedText();
        if (!selectedContent) { addMessage("אנא סמן טקסט בדף כדי לסכם אותו.", "server"); setHeaderStatus('error'); return; }
        sendActionToGemini("סכם בקצרה את הטקסט המסומן הבא:", selectedContent);
    },
    searchSelectedWithGoogle: () => {
        if (isLoading) return;
        const selectedText = getSelectedText();
        if (!selectedText) { addMessage("אנא סמן טקסט בדף כדי לחפש אותו בגוגל.", "server"); setHeaderStatus('error'); return; } 
        window.open(`https://www.google.com/search?q=${encodeURIComponent(selectedText)}`, '_blank');
        addMessage(`פותח חיפוש בגוגל עבור: "${selectedText.substring(0,50)}..."`, 'server');
        setHeaderStatus('success');
    },
    createNoteFromSelected: () => {
        const selectedContent = getSelectedText();
        if (!selectedContent) { addMessage("אנא סמן טקסט בדף כדי ליצור ממנו הערה.", "server"); setHeaderStatus('error'); return; }
        sendActionToGemini("צור הערה על בסיס הטקסט המסומן הבא:", selectedContent);
    },

    findRelatedVideos: () => sendActionToGemini("על בסיס תוכן הדף, הצע שאילתות חיפוש ליוטיוב:", getPageText()),
    eli5: () => sendActionToGemini("הסבר את הנושא המרכזי של תוכן הדף כמו לילד בן 5:", getPageText()),
    removeAdsBasic: () => { addMessage("הסרת פרסומות בסיסית (לא מיושם).", "server"); setHeaderStatus('default');},
    highlightLinks: () => { if (isLoading) return; document.querySelectorAll('a').forEach(a => { a.style.outline = a.style.outline === '2px solid yellow' ? '' : '2px solid yellow'; }); addMessage("הקישורים הודגשו/הוסרה הדגשה.", "server"); setHeaderStatus('success');},
    increaseTextSize: () => { if (isLoading) return; const currentSize = parseFloat(getComputedStyle(document.body).fontSize); document.body.style.fontSize = (currentSize * 1.1) + 'px'; addMessage("גודל הטקסט הוגדל.", "server"); setHeaderStatus('success');},
    decreaseTextSize: () => { if (isLoading) return; const currentSize = parseFloat(getComputedStyle(document.body).fontSize); document.body.style.fontSize = (currentSize * 0.9) + 'px'; addMessage("גודל הטקסט הוקטן.", "server"); setHeaderStatus('success');},
    readingModeBasic: () => { addMessage("מצב קריאה בסיסי (לא מיושם).", "server"); setHeaderStatus('default');},
    generateQRCode: () => {
        if (isLoading) return;
        if (!window.QRCode) {
            addMessage("ספריית QRCode.js לא נטענה.", "server"); setHeaderStatus('error'); return;
        }
        const qrContainerId = 'gemini-qr-code-container';
        let qrDiv = document.getElementById(qrContainerId);
        if (qrDiv) qrDiv.remove(); 
        qrDiv = document.createElement('div');
        qrDiv.id = qrContainerId;
        qrDiv.style.cssText = "padding: 10px; background: white; border-radius: 5px; margin-top: 10px; display: inline-block;";
        addMessage("", "server", true); // Placeholder for QR
        const tempMsgDiv = Array.from(chatArea.querySelectorAll('.gemini-message.server')).pop().querySelector('.gemini-message-content');
        if (tempMsgDiv) { tempMsgDiv.innerHTML = ''; tempMsgDiv.appendChild(qrDiv); } 
        else { chatArea.appendChild(qrDiv); }
        new QRCode(qrDiv, { text: window.location.href, width: 128, height: 128, correctLevel: QRCode.CorrectLevel.H });
        setHeaderStatus('success'); chatArea.scrollTop = chatArea.scrollHeight;
    },
    saveAsPDF: () => { if (isLoading) return; window.print(); addMessage("נפתח חלון הדפסה לשמירה כ-PDF.", "server"); setHeaderStatus('success');},
    toggleVideos: () => { if (isLoading) return; let toggled = 0; document.querySelectorAll('video').forEach(v => { if(v.paused) {v.play(); toggled++;} else {v.pause(); toggled++;} }); addMessage(toggled > 0 ? `הוחלף מצב ניגון של ${toggled} סרטונים.` : "לא נמצאו סרטונים.", "server"); setHeaderStatus('success');},
    findForms: () => sendActionToGemini("אתר ופרט את הטפסים בקוד ה-HTML הבא:", getFormsHTML()), 
    analyzeHTML: () => sendActionToGemini("נתח את מבנה ה-HTML הבא:", getPageHTML()), 
    checkAccessibility: () => sendActionToGemini("בצע בדיקת נגישות ראשונית לקוד ה-HTML הבא:", getPageHTML()), 
    countElements: () => { if (isLoading) return; const text = getPageText(); const wordCount = (text.match(/\S+/g) || []).length; const charCount = text.length; const linkCount = document.querySelectorAll('a').length; const imageCount = document.querySelectorAll('img').length; const formsCount = document.forms.length; const headingCount = document.querySelectorAll('h1,h2,h3,h4,h5,h6').length; const resultText = `סיכום אלמנטים:\nמילים: ${wordCount}, תווים: ${charCount}, קישורים: ${linkCount}, תמונות: ${imageCount}, טפסים: ${formsCount}, כותרות: ${headingCount}`; addMessage(resultText, 'server'); messages.push({role: 'server', text: resultText}); setHeaderStatus('success');}, 
    loadImage: () => { if (isLoading) return; const url = prompt("הכנס כתובת URL של תמונה:"); if(url) { const img = document.createElement('img'); img.src=url; img.style.maxWidth='100%'; img.style.borderRadius='var(--gemini-border-radius)'; img.onload = () => { chatArea.appendChild(img); chatArea.scrollTop = chatArea.scrollHeight; setHeaderStatus('success');}; img.onerror = () => { addMessage("שגיאה בטעינת התמונה.", "server"); setHeaderStatus('error');}; } else {addMessage("טעינת תמונה בוטלה.", "server"); setHeaderStatus('default');} }, 
    checkPageSpeedFactors: () => sendActionToGemini("ציין גורמים פוטנציאליים המשפיעים על מהירות הדף הבא:", getPageText()), 
    extractEmails: () => sendActionToGemini("סרוק את הטקסט הבא וחלץ כתובות אימייל:", getPageText()),
    checkBrokenLinksBasic: () => { addMessage("בדיקת קישורים שבורים (לא מיושם).", "server"); setHeaderStatus('default');},
    sharePage: () => { if (isLoading) return; if(navigator.share) { navigator.share({ title: document.title, url: window.location.href }).then(() => addMessage("השיתוף הוצג.", "server")).catch(e => addMessage("שגיאה בשיתוף: " + e.message, "server")); setHeaderStatus('success'); } else { addMessage("שיתוף Web Share API אינו נתמך.", "server"); setHeaderStatus('default');} },
  };

  function updateSelectedTextActionStates() {
    const currentSelectedText = getSelectedText();
    sidebar.querySelectorAll('#gemini-nav-container .category-content button').forEach(button => {
        const action = button.getAttribute('data-action');
        if (selectedTextActions.includes(action)) {
            button.disabled = !currentSelectedText || isLoading;
        } else if (isLoading) { 
             button.disabled = true;
        } else { 
             button.disabled = false;
        }
    });
  }


  // SECTION 8: Event Listeners
  sidebar.querySelectorAll('#gemini-nav-container .category-header').forEach(header => { 
    header.addEventListener('click', () => { 
      if(isLoading) return; 
      const content = header.nextElementSibling; 
      if (!content || !content.classList) return;
      const wasOpen = content.classList.contains('open');
      
      closeAllCategoriesGlobal(); 

      if (wasOpen) {
          content.classList.remove('open'); 
          if (header.classList) header.classList.remove('open');
          content.style.maxHeight = null; 
      } else { 
          content.classList.add('open'); 
          if (header.classList) header.classList.add('open');
          requestAnimationFrame(() => { 
            content.style.maxHeight = content.scrollHeight + "px"; 
          });
      }
      updateSelectedTextActionStates(); 
    }); 
  });

  sidebar.querySelectorAll('#gemini-nav-container .category-content button').forEach(button => { 
    button.addEventListener('click', e => { 
        if (!button.disabled) { 
            const action = button.getAttribute('data-action'); 
            if (actionsMap[action]) { 
                try { actionsMap[action](); } 
                catch (error) { 
                    console.error(`Error executing action ${action}:`, error); 
                    addMessage(`שגיאה בביצוע הפעולה "${button.textContent || action}": ${error.message}`, 'server'); 
                    setHeaderStatus('error');
                    if(messages && typeof messages.push === 'function') {
                        messages.push({role: 'server', text: `שגיאה בביצוע הפעולה "${button.textContent || action}": ${error.message}`}); 
                    }
                } 
            } 
        } 
    }); 
  });
  
  function handleSend() { if(inputEl){const val = inputEl.value.trim(); if (val && !isLoading) { sendChatMessage(val, false); }} }
  if(sendBtn) sendBtn.addEventListener('click', handleSend); 
  
  if(inputEl) {
      inputEl.addEventListener('keydown', e => { if (e.key === 'Enter' && !e.shiftKey) { e.preventDefault(); handleSend(); } }); 
      inputEl.addEventListener('input', () => { 
          inputEl.style.height = 'auto'; 
          inputEl.style.height = (inputEl.scrollHeight) + 'px'; 
          if (charCounterElement) {
              const currentLength = inputEl.value.length;
              charCounterElement.textContent = `${currentLength}/${MAX_INPUT_CHARS}`;
              charCounterElement.style.color = currentLength > MAX_INPUT_CHARS ? 'var(--gemini-header-error-bg)' : 'var(--gemini-timestamp-color)';
          }
      });
  }
  
  if(closeBtn) closeBtn.addEventListener('click', () => { if(sidebar) sidebar.classList.remove('open'); });
  
  if(clearChatBtn) {
    clearChatBtn.addEventListener('click', () => {
        if (isLoading) return;
        if (chatArea) chatArea.innerHTML = '';
        messages.length = 0;
        addMessage('הצ׳אט נוקה. איך אפשר לעזור?', 'server');
        setHeaderStatus('default'); 
        updateChatPlaceholder();
        if(inputEl) inputEl.focus();
    });
  }
  
  document.addEventListener('selectionchange', () => {
    if (sidebar.classList.contains('open')) {
        updateSelectedTextActionStates();
    }
  });

  // SECTION 9: Initial Animation and Message
  if (!window.QRCode) {
    const qrScript = document.createElement('script');
    qrScript.src = 'https://cdn.jsdelivr.net/npm/qrcodejs@1.0.0/qrcode.min.js'; 
    qrScript.onload = () => console.log("QRCode.js loaded.");
    qrScript.onerror = () => console.error("Failed to load QRCode.js. QR Code generation will not work.");
    document.head.appendChild(qrScript);
  }

  requestAnimationFrame(() => { 
      if(sidebar) sidebar.classList.add('open'); 
      updateChatPlaceholder();
      updateSelectedTextActionStates();
      if (charCounterElement) charCounterElement.textContent = `0/${MAX_INPUT_CHARS}`; 
  });

  if (messages && messages.length === 0) { 
    const welcomeMsg = 'ברוכים הבאים ל-Gemini! בחרו קטגוריה ופעולה מהתפריט או הקלידו הודעה.'; 
    addMessage(welcomeMsg, 'server'); 
    if(typeof messages.push === 'function') messages.push({role: 'server', text: welcomeMsg}); 
  }
  if(inputEl) inputEl.focus(); 
  document.addEventListener('keydown', function(event) { if (event.key === 'Escape' && sidebar && sidebar.classList.contains('open') && closeBtn) { closeBtn.click(); } });

})();
