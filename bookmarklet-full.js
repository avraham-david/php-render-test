(() => {
  // SECTION 1: Initial check and setup
  if (window.__geminiSidebarRunning) {
    const existingSidebar = document.getElementById('gemini-sidebar');
    if (existingSidebar) {
      if (!existingSidebar.classList.contains('open')) {
        existingSidebar.classList.add('open');
      }
      const mainElement = existingSidebar.querySelector('main');
      const navElement = existingSidebar.querySelector('nav#gemini-nav-categories');
      const toggleNavButtonContainer = existingSidebar.querySelector('#toggle-nav-in-chat-focus-container');
      const toggleNavButton = existingSidebar.querySelector('#toggle-nav-in-chat-focus');

      if (mainElement) {
        if (mainElement.classList.contains('chat-focused')) {
          if (navElement) navElement.classList.remove('nav-expanded-in-chat-focus');
          if (toggleNavButton) {
              const textEl = toggleNavButton.querySelector('.toggle-text');
              const iconEl = toggleNavButton.querySelector('.toggle-icon');
              if (textEl) textEl.textContent = 'הרחב תפריט';
              if (iconEl) iconEl.innerHTML = '▼'; // Down arrow
              toggleNavButton.setAttribute('aria-expanded', 'false');
          }
        } else {
           mainElement.classList.remove('chat-focused');
        }
      }
      if (toggleNavButtonContainer) {
        if (mainElement && mainElement.classList.contains('chat-focused')) {
            toggleNavButtonContainer.style.height = 'auto';
        } else {
            toggleNavButtonContainer.style.height = '0';
        }
      }
      if (typeof closeAllCategoriesGlobal === "function") {
        closeAllCategoriesGlobal(existingSidebar);
      }
    }
    return;
  }
  window.__geminiSidebarRunning = true;
  const API_URL = 'https://php-render-test.onrender.com/main-ai.php';

  // SECTION 2: CSS Styles
  const styleContent = `
  /* IMPORTANT: All selectors are prefixed with #gemini-sidebar */
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
  }
  #gemini-sidebar { direction: rtl; position: fixed; top: 0; right: 0; width: 400px; max-width: 90vw; height: 100vh; background: var(--gemini-primary-bg); box-shadow: var(--gemini-box-shadow); font-family: var(--gemini-font); color: var(--gemini-text-color); z-index: 2147483647; display: flex; flex-direction: column; transform: translateX(100%); transition: transform 0.45s cubic-bezier(0.23, 1, 0.32, 1); border-top-left-radius: var(--gemini-border-radius); border-bottom-left-radius: var(--gemini-border-radius); overflow: hidden; }
  #gemini-sidebar.open { transform: translateX(0); }
  #gemini-sidebar header { background-color: var(--gemini-secondary-bg); padding: 12px 15px; display: flex; justify-content: space-between; align-items: center; font-size: 1.1em; font-weight: bold; border-bottom: 1px solid rgba(255,255,255,0.1); flex-shrink: 0; }
  #gemini-sidebar .close-btn { background: none; border: none; color: var(--gemini-text-color); font-size: 1.6em; cursor: pointer; padding: 5px; line-height: 1; opacity: 0.8; transition: opacity var(--animation-speed-fast), transform var(--animation-speed-fast); }
  #gemini-sidebar .close-btn:hover { opacity: 1; transform: rotate(90deg) scale(1.1); }

  #gemini-sidebar main {
    flex-grow: 1; display: flex; flex-direction: column;
    overflow: hidden; padding: 12px;
    background: var(--gemini-primary-bg); /* Ensure main has a solid background */
  }

  #gemini-sidebar #toggle-nav-in-chat-focus-container { text-align: right; height: 0; overflow: hidden; transition: height var(--animation-speed-normal) ease, margin-bottom var(--animation-speed-normal) ease; }
  #gemini-sidebar main.chat-focused #toggle-nav-in-chat-focus-container { height: auto; margin-bottom: 10px; }
  #gemini-sidebar main:not(.chat-focused) #toggle-nav-in-chat-focus-container { display: none !important; }
  #gemini-sidebar #toggle-nav-in-chat-focus { display: inline-flex; align-items: center; gap: 7px; background-color: rgba(255, 255, 255, 0.12); color: var(--gemini-text-color); border: 1px solid rgba(255, 255, 255, 0.25); padding: 7px 14px; border-radius: var(--gemini-border-radius); cursor: pointer; font-size: 0.85em; font-weight: 500; transition: all var(--animation-speed-fast); box-shadow: 0 1px 3px rgba(0,0,0,0.15); }
  #gemini-sidebar #toggle-nav-in-chat-focus:hover { background-color: rgba(255, 255, 255, 0.22); border-color: rgba(255,255,255,0.35); transform: translateY(-1px); box-shadow: 0 3px 7px rgba(0,0,0,0.2); }
  #gemini-sidebar #toggle-nav-in-chat-focus .toggle-icon { transition: transform var(--animation-speed-normal) cubic-bezier(0.68, -0.55, 0.27, 1.55); display: inline-block; font-size: 1.1em; line-height:1; }
  #gemini-sidebar #toggle-nav-in-chat-focus[aria-expanded="true"] .toggle-icon { transform: rotate(180deg); }

  /* NAV STYLING */
  #gemini-sidebar nav#gemini-nav-categories {
    display: flex; flex-direction: column; gap: 8px;
    background-color: rgba(0,0,0,0.05); border-radius: var(--gemini-border-radius);
    transition: all var(--animation-speed-normal) ease;
  }

  /* NAV: Initial State (Not Chat Focused) */
  #gemini-sidebar main:not(.chat-focused) nav#gemini-nav-categories {
    flex-grow: 2; max-height: 75vh; overflow-y: auto; margin-bottom: 10px;
    opacity: 1; transform: translateY(0); padding: 5px;
    border: 1px solid rgba(var(--gemini-secondary-bg),0.5);
  }
  #gemini-sidebar main:not(.chat-focused) #gemini-chat { flex-grow: 0.5; min-height: 60px; max-height: 15vh; opacity: 0.7; }

  /* NAV: Chat Focused, Nav Compact (Not Manually Expanded) */
  #gemini-sidebar main.chat-focused nav#gemini-nav-categories:not(.nav-expanded-in-chat-focus) {
    max-height: 0px !important; padding: 0 !important; margin-bottom: 0 !important;
    border-width: 0 !important; opacity: 0 !important; overflow: hidden !important;
    flex-grow: 0; transform: scaleY(0.9) translateY(-10px); transform-origin: top;
    visibility: hidden !important; /* <<<< Ensure it does not affect layout */
  }

  /* NAV: Chat Focused, Nav MANUALLY Expanded */
  #gemini-sidebar main.chat-focused nav#gemini-nav-categories.nav-expanded-in-chat-focus {
    max-height: 60vh; overflow-y: auto;
    opacity: 1; transform: translateY(0); padding: 8px 5px; margin-bottom: 10px;
    border: 1px solid rgba(var(--gemini-secondary-bg),0.5); flex-grow: 1;
    visibility: visible !important; /* <<<< Ensure it is visible */
  }
  #gemini-sidebar main.chat-focused nav#gemini-nav-categories.nav-expanded-in-chat-focus .category-content {
    grid-template-columns: 1fr; gap: 6px; padding: 10px 5px;
  }
  #gemini-sidebar main.chat-focused nav#gemini-nav-categories.nav-expanded-in-chat-focus .category-content button {
    padding: 10px 12px; font-size: 0.9em;
  }

  /* CHAT: Chat Focused State */
  #gemini-sidebar main.chat-focused #gemini-chat { flex-grow: 3; min-height: 200px; max-height: none; opacity:1; }

  /* CATEGORY STYLING */
  #gemini-sidebar .category { background-color: var(--gemini-tertiary-bg); border-radius: calc(var(--gemini-border-radius) - 2px); overflow: hidden; box-shadow: 0 2px 5px rgba(0,0,0,0.2); transition: box-shadow var(--animation-speed-fast), transform var(--animation-speed-fast); }
  #gemini-sidebar .category:hover { box-shadow: 0 4px 8px rgba(0,0,0,0.25); transform: translateY(-1px); }
  
  #gemini-sidebar .category-header {
    background-color: var(--gemini-secondary-bg); 
    padding: 10px 10px; /* Reduced padding for more text space */
    cursor: pointer;
    display: flex; 
    justify-content: space-between; 
    align-items: flex-start; /* MODIFIED: Better alignment if text wraps */
    font-weight: 600; 
    font-size:0.95em;
    transition: background-color var(--animation-speed-fast) ease;
    user-select: none; 
    border-bottom: 1px solid rgba(255,255,255,0.05);
    position:relative; 
    /* min-height: 38px; */ /* REMOVED: Allow header to grow for wrapped text */
    box-sizing: border-box;
  }

  #gemini-sidebar .category-header span:first-child { /* The text span */
    white-space: normal;   /* MODIFIED: Allow text wrapping */
    overflow: visible;     /* MODIFIED: Not needed if wrapping, allow natural flow */
    text-overflow: clip;   /* MODIFIED: Ellipsis not needed if wrapping */
    flex-grow: 1;
    margin-right: 5px;     /* Keep margin for spacing from icon if icon is on the left (RTL means icon is on left) */
    line-height: 1.35;     /* ADDED: Adjust line height for readability if wrapped */
  }
  
  #gemini-sidebar .category-header:hover { background-color: var(--gemini-hover-accent-color); }
  #gemini-sidebar .category-header.open { border-bottom-color: var(--gemini-accent-color); }
  
  #gemini-sidebar .category-toggle-icon { 
    font-size: 0.8em; 
    margin-left: 10px; /* In RTL, this pushes icon away from text */
    transition: transform var(--animation-speed-normal) cubic-bezier(0.68, -0.55, 0.27, 1.55); 
    flex-shrink:0; 
    padding-top: 0.1em; /* Slight adjustment for vertical alignment with multi-line text */
  }
  #gemini-sidebar .category-header.open .category-toggle-icon { transform: rotate(90deg); }

  #gemini-sidebar .category-content { max-height: 0; overflow: hidden; padding: 0 10px; transition: max-height var(--animation-speed-normal) cubic-bezier(0.4, 0, 0.2, 1), padding var(--animation-speed-normal) cubic-bezier(0.4, 0, 0.2, 1); display: grid; grid-template-columns: repeat(auto-fill, minmax(130px, 1fr)); gap: 8px; background-color: rgba(0,0,0,0.1); }
  #gemini-sidebar .category-content.open { padding: 10px; }
  #gemini-sidebar .category-content button { background-color: var(--gemini-input-bg); color: var(--gemini-text-color); border: 1px solid transparent; padding: 10px 8px; border-radius: calc(var(--gemini-border-radius) - 4px); cursor: pointer; font-size: 0.85em; transition: all 0.25s ease-out; text-align: right; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; opacity: 0; transform: perspective(500px) rotateX(-20deg) translateY(15px); animation-fill-mode: forwards; box-shadow: 0 1px 2px rgba(0,0,0,0.15); }
  #gemini-sidebar .category-content.open button { animation-name: popInButton; animation-duration: var(--animation-speed-slow); animation-timing-function: cubic-bezier(0.25, 0.46, 0.45, 0.94); }
  @keyframes popInButton { 0% { opacity: 0; transform: perspective(500px) rotateX(-30deg) translateY(20px) scale(0.9); } 60% { opacity: 0.8; transform: perspective(500px) rotateX(10deg) translateY(-5px) scale(1.05); } 100% { opacity: 1; transform: perspective(500px) rotateX(0deg) translateY(0) scale(1); } }
  #gemini-sidebar .category-content.open button:nth-child(1) { animation-delay: 0.05s; } #gemini-sidebar .category-content.open button:nth-child(2) { animation-delay: 0.1s; } #gemini-sidebar .category-content.open button:nth-child(3) { animation-delay: 0.15s; } #gemini-sidebar .category-content.open button:nth-child(4) { animation-delay: 0.2s; } #gemini-sidebar .category-content.open button:nth-child(5) { animation-delay: 0.25s; }
  #gemini-sidebar .category-content button:hover { background-color: var(--gemini-accent-color); color: #fff; transform: translateY(-2px) scale(1.03); box-shadow: 0 4px 8px rgba(0,0,0,0.2); border-color: rgba(255,255,255,0.3); }
  #gemini-sidebar .category-content button:active { transform: translateY(0px) scale(0.98); box-shadow: 0 1px 2px rgba(0,0,0,0.15); }
  #gemini-sidebar .category-content button:disabled { opacity: 0.5 !important; cursor: not-allowed; background-color: var(--gemini-input-bg); transform: none; box-shadow: none; border-color: transparent; }

  /* CHAT AREA AND MESSAGES */
  #gemini-sidebar #gemini-chat { overflow-y: auto; padding: 10px; margin-bottom: 10px; background-color: rgba(0,0,0,0.25); border-radius: var(--gemini-border-radius); scroll-behavior: smooth; transition: flex-grow var(--animation-speed-normal) ease, min-height var(--animation-speed-normal) ease, opacity var(--animation-speed-normal) ease; }
  #gemini-sidebar .gemini-message { padding: 10px 15px; border-radius: var(--gemini-border-radius); margin-bottom: 10px; max-width: 85%; line-height: 1.6; word-wrap: break-word; unicode-bidi: plaintext; white-space: pre-wrap; animation: fadeInMessage 0.3s ease-out; }
  @keyframes fadeInMessage { from { opacity: 0; transform: translateY(5px); } to { opacity: 1; transform: translateY(0); } }
  #gemini-sidebar .gemini-message.user { background-color: var(--gemini-user-message-bg); margin-right: auto; color: #fff; text-align: right; }
  #gemini-sidebar .gemini-message.server { background-color: var(--gemini-server-message-bg); margin-left: auto; text-align: right; }
  #gemini-sidebar .gemini-message.loading { font-style: italic; animation: gemini-pulse 1.5s infinite ease-in-out, fadeInMessage 0.3s ease-out; }
  @keyframes gemini-pulse { 0%, 100% { opacity: 0.7; } 50% { opacity: 1; } }
  #gemini-sidebar .gemini-message.server strong { font-weight: bold; color: #f0f4ff; } #gemini-sidebar .gemini-message.server em { font-style: italic; } #gemini-sidebar .gemini-message.server code { background-color: rgba(0,0,0,0.35); padding: 3px 7px; border-radius: 4px; font-family: 'Consolas', 'Courier New', Courier, monospace; font-size: 0.9em; border: 1px solid rgba(255,255,255,0.1); color: #c7d2fe; direction: ltr; display: inline-block; max-width: 100%; overflow-x: auto; }
  #gemini-sidebar .gemini-message.server del { text-decoration: line-through; } #gemini-sidebar .gemini-message.server a { color: var(--gemini-accent-color); text-decoration: underline; } #gemini-sidebar .gemini-message.server a:hover { color: var(--gemini-hover-accent-color); }
  #gemini-sidebar #gemini-input-area { display: flex; align-items: flex-end; padding: 8px; background-color: rgba(0,0,0,0.1); border-radius: var(--gemini-border-radius); flex-shrink: 0; transition: opacity 0.3s ease, max-height 0.3s ease; }
  #gemini-sidebar #gemini-input { flex-grow: 1; padding: 10px 12px; border: 1px solid var(--gemini-accent-color); border-radius: var(--gemini-border-radius); background-color: var(--gemini-input-bg); color: var(--gemini-text-color); font-family: inherit; font-size: 1em; resize: none; min-height: 40px; max-height: 150px; overflow-y: auto; direction: rtl; }
  #gemini-sidebar #gemini-input::placeholder { color: rgba(224, 231, 255, 0.6); direction: rtl; } #gemini-sidebar #gemini-input:focus { outline: none; border-color: var(--gemini-hover-accent-color); box-shadow: 0 0 0 3px rgba(var(--gemini-accent-color), 0.3); }
  #gemini-sidebar .send-btn { background-color: var(--gemini-accent-color); color: #fff; border: none; padding: 0 12px; height: 40px; border-radius: var(--gemini-border-radius); cursor: pointer; margin-right: 8px; font-size: 1em; display: flex; align-items: center; justify-content: center; transition: background-color var(--animation-speed-fast); flex-shrink: 0; }
  #gemini-sidebar .send-btn svg { width: 20px; height: 20px; fill: currentColor; } #gemini-sidebar .send-btn:hover { background-color: var(--gemini-hover-accent-color); } #gemini-sidebar .send-btn:disabled { background-color: #9ca3af; cursor: not-allowed; }
  #gemini-sidebar footer { padding: 8px 15px; text-align: center; font-size: 0.8em; opacity: 0.7; border-top: 1px solid rgba(255,255,255,0.1); flex-shrink: 0; }
  #gemini-sidebar #gemini-chat::-webkit-scrollbar, #gemini-sidebar #gemini-input::-webkit-scrollbar, #gemini-sidebar nav#gemini-nav-categories::-webkit-scrollbar { width: 8px; }
  #gemini-sidebar #gemini-chat::-webkit-scrollbar-track, #gemini-sidebar #gemini-input::-webkit-scrollbar-track, #gemini-sidebar nav#gemini-nav-categories::-webkit-scrollbar-track { background: rgba(0,0,0,0.1); border-radius: var(--gemini-border-radius); }
  #gemini-sidebar #gemini-chat::-webkit-scrollbar-thumb, #gemini-sidebar #gemini-input::-webkit-scrollbar-thumb, #gemini-sidebar nav#gemini-nav-categories::-webkit-scrollbar-thumb { background: var(--gemini-accent-color); border-radius: var(--gemini-border-radius); }
  #gemini-sidebar #gemini-chat::-webkit-scrollbar-thumb:hover, #gemini-sidebar #gemini-input::-webkit-scrollbar-thumb:hover, #gemini-sidebar nav#gemini-nav-categories::-webkit-scrollbar-thumb:hover { background: var(--gemini-hover-accent-color); }
  `;
  const styleTag = document.createElement('style');
  styleTag.textContent = styleContent;
  document.head.appendChild(styleTag);

  // SECTION 3: HTML Structure
  const sidebar = document.createElement('aside');
  sidebar.id = 'gemini-sidebar';
  sidebar.innerHTML = `
    <header> <div>תפריט Gemini חכם + צ'אט</div> <button class="close-btn" title="סגור תפריט">✖</button> </header>
    <main>
      <div id="toggle-nav-in-chat-focus-container">
        <button id="toggle-nav-in-chat-focus" aria-expanded="false" aria-controls="gemini-nav-categories">
          <span class="toggle-icon">▼</span> <span class="toggle-text">הרחב תפריט</span>
        </button>
      </div>
      <nav id="gemini-nav-categories">
        <div class="category"> <div class="category-header"> <span>ניתוח תוכן דף</span> <span class="category-toggle-icon">◀️</span> </div> <div class="category-content"> <button data-action="summary">סכם דף</button> <button data-action="keywords">מילות מפתח</button> <button data-action="toneAnalysis">ניתוח טון</button> <button data-action="simplify">פשט משפטים</button> <button data-action="explainTerms">הסבר מושגים</button> <button data-action="relatedReads">קריאה נוספת</button> <button data-action="notes">תזכורות/הערות</button> </div> </div>
        <div class="category"> <div class="category-header"> <span>יצירת תוכן</span> <span class="category-toggle-icon">◀️</span> </div> <div class="category-content"> <button data-action="ideas">רעיונות למאמר</button> <button data-action="introParagraph">פסקת פתיחה</button> <button data-action="writeSocialPost">פוסט לרשת חברתית</button> <button data-action="translateText">תרגם טקסט</button> </div> </div>
        <div class="category"> <div class="category-header"> <span>ניתוח טכני וכלים</span> <span class="category-toggle-icon">◀️</span> </div> <div class="category-content"> <button data-action="findForms">איתור טפסים</button> <button data-action="analyzeHTML">ניתוח HTML</button> <button data-action="checkAccessibility">בדיקת נגישות</button> <button data-action="countElements">ספירת אלמנטים</button> <button data-action="loadImage">טעינת תמונה</button> <button data-action="checkPageSpeedFactors">בדיקת מהירות (גורמים)</button> <button data-action="extractEmails">חילוץ אימיילים</button> </div> </div>
        <div class="category"> <div class="category-header"> <span>שיתוף ופעולות דפדפן</span> <span class="category-toggle-icon">◀️</span> </div> <div class="category-content"> <button data-action="sharePage">שיתוף עמוד</button> </div> </div>
      </nav>
      <section id="gemini-chat" aria-label="אזור צ'אט עם Gemini API" role="log" aria-live="polite"></section>
      <div id="gemini-input-area"> <textarea id="gemini-input" placeholder="הקלד הודעה כאן..." rows="1" aria-label="הודעה לצ'אט"></textarea> <button class="send-btn" title="שלח הודעה"> <svg viewBox="0 0 24 24"><path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"></path></svg> </button> </div>
    </main>
    <footer>מופעל באמצעות Gemini API</footer>
  `;
  document.body.appendChild(sidebar);

  // SECTION 4: DOM Element Variables
  const mainLayoutElement = sidebar.querySelector('main');
  const navElement = sidebar.querySelector('nav#gemini-nav-categories');
  const toggleNavButtonContainer = sidebar.querySelector('#toggle-nav-in-chat-focus-container');
  const toggleNavButton = sidebar.querySelector('#toggle-nav-in-chat-focus');
  const toggleNavButtonText = toggleNavButton ? toggleNavButton.querySelector('.toggle-text') : null;
  const toggleNavButtonIcon = toggleNavButton ? toggleNavButton.querySelector('.toggle-icon') : null;
  const chatArea = sidebar.querySelector('#gemini-chat');
  const inputEl = sidebar.querySelector('#gemini-input');
  const sendBtn = sidebar.querySelector('.send-btn');
  const closeBtn = sidebar.querySelector('.close-btn');

  // SECTION 5: State Variables
  const messages = [];
  let isLoading = false;
  let loadingMessageDiv = null;

  // SECTION 6: Core Functions
  function closeAllCategoriesGlobal(parentElement = sidebar) { if (!parentElement) return; parentElement.querySelectorAll('nav .category-content.open').forEach(catContent => { catContent.classList.remove('open'); catContent.style.maxHeight = null; const header = catContent.previousElementSibling; if (header && header.classList.contains('category-header')) { header.classList.remove('open'); const icon = header.querySelector('.category-toggle-icon'); if(icon) icon.textContent = '◀️'; } }); }
  function focusChatLayout() { if (mainLayoutElement && !mainLayoutElement.classList.contains('chat-focused')) { mainLayoutElement.classList.add('chat-focused'); if (toggleNavButton) { if (toggleNavButtonText) toggleNavButtonText.textContent = 'הרחב תפריט'; if (toggleNavButtonIcon) toggleNavButtonIcon.innerHTML = '▼'; toggleNavButton.setAttribute('aria-expanded', 'false'); } if (navElement) navElement.classList.remove('nav-expanded-in-chat-focus'); closeAllCategoriesGlobal(); } }
  function escapeHTML(str) { const p = document.createElement('p'); p.textContent = str; return p.innerHTML; }
  function applyBasicMarkdown(text) { let html = text; html = html.replace(/(?<!\\)\*\*(.*?)(?<!\\)\*\*/g, '<strong>$1</strong>'); html = html.replace(/(?<!\\)__(.*?)(?<!\\)__/g, '<strong>$1</strong>'); html = html.replace(/(?<!\\)\*(.*?)(?<!\\)\*/g, '<em>$1</em>'); html = html.replace(/(^|\s|\()(?<!\\)_(.*?)(?<!\\)_(\s|$|\)|\.|,|\?|!)/g, '$1<em>$2</em>$3'); html = html.replace(/(?<!\\)`(.*?)`(?<!\\)/g, '<code>$1</code>'); html = html.replace(/~~(.*?)~~/g, '<del>$1</del>'); html = html.replace(/(https?:\/\/[^\s<>"']+)/g, '<a href="$1" target="_blank" rel="noopener noreferrer">$1</a>'); html = html.replace(/\\\*/g, '*').replace(/\\_/g, '_').replace(/\\`/g, '`'); return html; }
  function setLoading(loading) { isLoading = loading; if(sendBtn) sendBtn.disabled = loading; if(inputEl) inputEl.disabled = loading; sidebar.querySelectorAll('nav .category-content button').forEach(btn => btn.disabled = loading); if (toggleNavButton) toggleNavButton.disabled = loading; if (loading) { if (loadingMessageDiv && loadingMessageDiv.parentNode === chatArea) { loadingMessageDiv.remove(); } loadingMessageDiv = document.createElement('div'); loadingMessageDiv.className = 'gemini-message server loading'; loadingMessageDiv.textContent = 'ממתין לתשובה מהשרת...'; if(chatArea) chatArea.appendChild(loadingMessageDiv); if(chatArea) chatArea.scrollTop = chatArea.scrollHeight; } else { if (loadingMessageDiv && loadingMessageDiv.parentNode === chatArea) { loadingMessageDiv.remove(); loadingMessageDiv = null; } } }
  function addMessage(text, sender) { const msgDiv = document.createElement('div'); msgDiv.className = 'gemini-message ' + sender; if (sender === 'server') { const escapedText = escapeHTML(text); const formattedText = applyBasicMarkdown(escapedText); msgDiv.innerHTML = formattedText; } else { msgDiv.textContent = text; } if(chatArea) chatArea.appendChild(msgDiv); if(chatArea) chatArea.scrollTop = chatArea.scrollHeight; }
  async function sendChatMessage(text, isAction = false) { if (!text || !text.trim() || isLoading) return; const currentInputVal = inputEl ? inputEl.value : ""; if (!isAction) { addMessage(text, 'user'); messages.push({ role: 'user', text }); if(inputEl) { inputEl.value = ''; inputEl.style.height = 'auto'; inputEl.style.height = (inputEl.scrollHeight) + 'px'; } } else { if (!messages.find(m => m.text === text && m.role === 'user')) { messages.push({ role: 'user', text }); } } if(inputEl) inputEl.focus(); focusChatLayout(); setLoading(true); const combinedText = messages.map(m => `${m.role === 'user' ? 'משתמש' : 'שרת'}: ${m.text}`).join('\n\n'); try { const response = await fetch(API_URL, { method: 'POST', headers: {'Content-Type': 'application/json'}, body: JSON.stringify({ text: combinedText }) }); if (!response) { throw new Error("תגובת השרת לא הוגדרה (undefined)."); } setLoading(false); if (!response.ok) { let errorText = `שגיאת שרת (${response.status})`; try { const errorData = await response.json(); errorText += `: ${errorData.message || errorData.error || JSON.stringify(errorData)}`; } catch (e_json) { try { const textError = await response.text(); errorText += `: ${textError || 'אין מידע טקסטואלי נוסף בשגיאה'}`; } catch (e_text) { errorText += ': לא ניתן היה לקרוא את גוף השגיאה.'; }} throw new Error(errorText); } const data = await response.json(); const reply = data.text || 'לא התקבלה תשובה תקינה מהשרת. (תגובה ריקה)'; addMessage(reply, 'server'); messages.push({ role: 'server', text: reply }); } catch (e) { console.error('שגיאה מלאה ב-sendChatMessage:', e); setLoading(false); let displayErrorMessage = 'שגיאה בשליחת ההודעה.'; if (e instanceof TypeError && e.message.toLowerCase().includes("failed to fetch")) { displayErrorMessage = "שגיאה: לא ניתן היה להתחבר לשרת (Failed to fetch). בדוק חיבור רשת או זמינות השרת."; } else if (e.message) { displayErrorMessage = e.message; } addMessage(displayErrorMessage, 'server'); if (!isAction && currentInputVal && inputEl) { inputEl.value = currentInputVal; } } }
  function sendActionToGemini(promptPrefix, contentExtractor) { if (isLoading) return; focusChatLayout(); let content; try { content = contentExtractor(); if (content === null || typeof content === 'undefined' || (typeof content === 'string' && !content.trim())) { addMessage("לא נמצא תוכן רלוונטי בדף עבור פעולה זו, או שהתוכן ריק.", "server"); messages.push({role: 'server', text: "לא נמצא תוכן רלוונטי בדף עבור פעולה זו, או שהתוכן ריק."}); return; } } catch (error) { console.error("Error extracting content:", error); addMessage("שגיאה באיסוף תוכן מהדף: " + error.message, "server"); messages.push({role: 'server', text: "שגיאה באיסוף תוכן מהדף: " + error.message}); return; } const fullPrompt = `${promptPrefix}\n\nהתוכן מהדף:\n${content.substring(0, 15000)}`; sendChatMessage(fullPrompt, true); }
  const getPageText = () => document.body.innerText || document.documentElement.textContent; 
  const getPageHTML = () => document.documentElement.outerHTML; 
  const getFormsHTML = () => { const forms = Array.from(document.forms); if (forms.length === 0) return "לא נמצאו טפסים בדף זה."; return forms.map(f => { const formElements = Array.from(f.elements).map(el => `<${el.tagName.toLowerCase()} name="${el.name || ''}" type="${el.type || ''}" />`).join('\n  '); return `<form name="${f.name || ''}" action="${f.action || ''}" method="${f.method || 'GET'}">\n  ${formElements}\n</form>`; }).join('\n\n---\n\n'); };
  
  // SECTION 7: Action Definitions (actionsMap)
  const actionsMap = { summary: () => sendActionToGemini("סכם בקצרה את התוכן הבא:", getPageText), ideas: () => sendActionToGemini("הפק רשימת רעיונות למאמר (3-5 רעיונות עם תיאור קצר) על בסיס התוכן הבא:", getPageText), findForms: () => sendActionToGemini("אתר ופרט את כל הטפסים הקיימים בקוד ה-HTML הבא. עבור כל טופס, ציין את שמו (אם יש), פעולתו (action), שיטת השליחה (method), ואת שמות השדות העיקריים. הצע שיפורי נגישות או שימושיות אם רלוונטי:", getFormsHTML), introParagraph: () => sendActionToGemini("כתוב פסקת פתיחה קצרה ומושכת (2-3 משפטים) למאמר בנושא של התוכן הבא:", getPageText), keywords: () => sendActionToGemini("הצע 5-7 מילות מפתח רלוונטיות וממוקדות (כולל זנב ארוך אם מתאים) עבור התוכן הבא:", getPageText), analyzeHTML: () => sendActionToGemini("נתח את מבנה ה-HTML הבא. התמקד ב: 1. סמנטיקה נכונה של תגיות. 2. בעיות SEO בסיסיות (כותרות, מטא תגים חסרים). 3. הצעות לשיפור ביצועים קלות (למשל, תמונות). פרט בקצרה:", getPageHTML), checkAccessibility: () => sendActionToGemini("בצע בדיקת נגישות ראשונית עבור קוד ה-HTML הבא. התמקד ב: 1. טקסטים אלטרנטיביים לתמונות. 2. תוויות (labels) לשדות קלט. 3. ניגודיות צבעים בסיסית (באופן כללי, אם ניתן להסיק). 4. מבנה כותרות היררכי. הצע שיפורים קונקרטיים (ברמת קוד אם אפשר):", getPageHTML), toneAnalysis: () => sendActionToGemini("נתח את הטון הכללי (למשל, רשמי, אינפורמטיבי, ידידותי, ביקורתי) והסגנון של הטקסט הבא. ספק דוגמאות קצרות מהטקסט לתמיכה בניתוח שלך:", getPageText), countElements: () => { if (isLoading) return; focusChatLayout(); const text = document.body.innerText || document.documentElement.textContent || ""; const wordCount = (text.match(/\S+/g) || []).length; const charCount = text.length; const linkCount = document.querySelectorAll('a').length; const imageCount = document.querySelectorAll('img').length; const formsCount = document.forms.length; const headingCount = document.querySelectorAll('h1, h2, h3, h4, h5, h6').length; const resultText = `סיכום אלמנטים בדף:\n- מילים: ${wordCount}\n- תווים: ${charCount}\n- קישורים (<a>): ${linkCount}\n- תמונות (<img>): ${imageCount}\n- טפסים (<form>): ${formsCount}\n- כותרות (<h1>-<h6>): ${headingCount}`.trim(); addMessage(resultText, 'server'); messages.push({role: 'server', text: resultText}); }, sharePage: () => { if (isLoading) return; focusChatLayout(); const pageTitle = document.title; const pageUrl = window.location.href; let shareMessage = ""; if (navigator.share) { navigator.share({title: pageTitle, text: `בדוק את העמוד הזה: ${pageTitle}`, url: pageUrl}) .then(() => shareMessage = 'העמוד שותף בהצלחה!').catch(err => { if (err.name !== 'AbortError') { shareMessage = 'שיתוף נכשל: ' + err.message; } else { shareMessage = 'שיתוף בוטל.'; }}) .finally(() => { if (shareMessage) { addMessage(shareMessage, 'server'); messages.push({role: 'server', text: shareMessage}); }}); } else if (navigator.clipboard) { navigator.clipboard.writeText(pageUrl).then(() => shareMessage = 'כתובת העמוד הועתקה ללוח: ' + pageUrl).catch(err => shareMessage = 'העתקת כתובת נכשלה: ' + err.message) .finally(() => { addMessage(shareMessage, 'server'); messages.push({role: 'server', text: shareMessage}); }); } else { shareMessage = 'שיתוף או העתקה אוטומטית אינם נתמכים בדפדפן זה. הכתובת היא: ' + pageUrl; addMessage(shareMessage, 'server'); messages.push({role: 'server', text: shareMessage}); } }, loadImage: () => { if (isLoading) return; const input = document.createElement('input'); input.type = 'file'; input.accept = 'image/jpeg, image/png, image/gif, image/webp'; input.onchange = () => { if (input.files && input.files.length > 0) { const file = input.files[0]; if (!file) return; if (file.size > 4 * 1024 * 1024) { addMessage('הקובץ גדול מדי. אנא בחר קובץ קטן מ-4MB.', 'server'); messages.push({role: 'server', text: 'הקובץ גדול מדי. אנא בחר קובץ קטן מ-4MB.'}); return; } const reader = new FileReader(); reader.onload = e => { const base64 = e.target.result; sendActionToGemini(`זוהי תמונה בפורמט base64. אנא תאר אותה בקצרה (מה רואים בתמונה?) ואם אפשר, ציין אלמנטים מרכזיים. אם יש טקסט בתמונה, נסה לחלץ אותו.`, () => base64); }; reader.onerror = () => { addMessage('שגיאה בקריאת הקובץ.', 'server'); messages.push({role: 'server', text: 'שגיאה בקריאת הקובץ.'}); }; reader.readAsDataURL(file); }}; input.click(); }, relatedReads: () => sendActionToGemini("על בסיס הטקסט הבא, הצע 2-3 המלצות לקריאה נוספת (מאמרים, ספרים, או אתרים רלוונטיים) בנושאים קשורים. ספק קישור אם אפשר (באופן היפותטי, אין צורך לבדוק זמינות קישור):", getPageText), notes: () => sendActionToGemini("עזור לי ליצור סיכום קצר בנקודות (3-5 נקודות עיקריות) מהתוכן הבא, שיהיה שימושי כתזכורת או הערה פנימית:", getPageText), simplify: () => sendActionToGemini("פשט את המשפטים המורכבים בטקסט הבא. שמור על המשמעות המקורית, אך הפוך את הטקסט לברור וקל יותר להבנה עבור קהל רחב. אם יש מונחים מקצועיים, הסבר אותם בקצרה:", getPageText), explainTerms: () => sendActionToGemini("זהה 3-5 מושגים מורכבים או מקצועיים מהטקסט הבא. הסבר כל מושג בצורה פשוטה וברורה, כאילו אתה מסביר למישהו שאינו מהתחום. ספק דוגמה לכל מושג אם אפשר:", getPageText), writeSocialPost: () => sendActionToGemini("כתוב פוסט קצר (2-3 משפטים) ומעניין לרשת חברתית (כמו פייסבוק או טוויטר) על בסיס התוכן המרכזי של הדף הבא. התאם את הסגנון לרשת חברתית והוסף האשטגים רלוונטיים:", getPageText), translateText: () => sendActionToGemini("תרגם את הטקסט הבא. המשתמש יציין את שפת היעד בצ'אט לאחר מכן, או נסה לתרגם לאנגלית אם לא צוין אחרת:", getPageText), checkPageSpeedFactors: () => sendActionToGemini("על סמך התוכן והמבנה הכללי של הדף הבא (ללא גישה לנתוני רשת אמיתיים), ציין 3-5 גורמים פוטנציאליים שיכולים להשפיע על מהירות טעינתו (לדוגמה: גודל תמונות, קבצי סקריפט, CSS מורכב). הצע פתרונות כלליים לשיפור:", getPageText), extractEmails: () => sendActionToGemini("סרוק את הטקסט הבא וחלץ ממנו את כל כתובות האימייל התקניות שתמצא. הצג אותן כרשימה:", getPageText), };

  // SECTION 8: Event Listeners
  if (toggleNavButton) {
    toggleNavButton.addEventListener('click', () => {
        if (!navElement) return;
        navElement.classList.toggle('nav-expanded-in-chat-focus');
        if (navElement.classList.contains('nav-expanded-in-chat-focus')) {
            if (toggleNavButtonText) toggleNavButtonText.textContent = 'צמצם תפריט';
            if (toggleNavButtonIcon) toggleNavButtonIcon.innerHTML = '▲'; // Up arrow
            toggleNavButton.setAttribute('aria-expanded', 'true');
        } else {
            if (toggleNavButtonText) toggleNavButtonText.textContent = 'הרחב תפריט';
            if (toggleNavButtonIcon) toggleNavButtonIcon.innerHTML = '▼'; // Down arrow
            toggleNavButton.setAttribute('aria-expanded', 'false');
            closeAllCategoriesGlobal(); 
        }
    });
  }

  sidebar.querySelectorAll('.category-header').forEach(header => { 
    header.addEventListener('click', () => { 
      if(isLoading) return; 
      const content = header.nextElementSibling; 
      if (!content || !content.classList) return;
      const icon = header.querySelector('.category-toggle-icon'); 
      const wasOpen = content.classList.contains('open');
      
      sidebar.querySelectorAll('.category-content.open').forEach(openContent => { 
          if (openContent !== content) { 
              openContent.classList.remove('open'); 
              openContent.style.maxHeight = null; 
              const otherHeader = openContent.previousElementSibling;
              if (otherHeader && otherHeader.classList) {
                  otherHeader.classList.remove('open');
                  const otherIcon = otherHeader.querySelector('.category-toggle-icon'); 
                  if(otherIcon) otherIcon.textContent = '◀️'; 
              }
          } 
      }); 

      if (wasOpen) {
          content.classList.remove('open'); 
          if (header.classList) header.classList.remove('open');
          content.style.maxHeight = null; 
          if(icon) icon.textContent = '◀️'; 
      } else {
          content.classList.add('open'); 
          if (header.classList) header.classList.add('open');
          content.style.maxHeight = content.scrollHeight + "px"; 
          if(icon) icon.textContent = '▼'; 
      }
    }); 
  });

  sidebar.querySelectorAll('nav .category-content button').forEach(button => { 
    button.addEventListener('click', e => { 
        if (!isLoading) { 
            const action = button.getAttribute('data-action'); 
            if (actionsMap[action]) { 
                try { actionsMap[action](); } 
                catch (error) { 
                    console.error(`Error executing action ${action}:`, error); 
                    addMessage(`שגיאה בביצוע הפעולה "${button.textContent || action}": ${error.message}`, 'server'); 
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
      inputEl.addEventListener('input', () => { inputEl.style.height = 'auto'; inputEl.style.height = (inputEl.scrollHeight) + 'px'; });
  }
  if(closeBtn) closeBtn.addEventListener('click', () => { if(sidebar) sidebar.classList.remove('open'); });
  
  // SECTION 9: Initial Animation and Message
  requestAnimationFrame(() => { if(sidebar) sidebar.classList.add('open'); });

  if (messages && messages.length === 0) { 
    const welcomeMsg = 'ברוכים הבאים ל-Gemini! בחרו קטגוריה ופעולה מהתפריט או הקלידו הודעה.'; 
    addMessage(welcomeMsg, 'server'); 
    if(typeof messages.push === 'function') messages.push({role: 'server', text: welcomeMsg}); 
  }
  if(inputEl) inputEl.focus(); 
  document.addEventListener('keydown', function(event) { if (event.key === 'Escape' && sidebar && sidebar.classList.contains('open') && closeBtn) { closeBtn.click(); } });

})();
