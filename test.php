<!DOCTYPE html>
<html lang="he" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advanced AI Chat V6</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        /* --- משתני עיצוב גלובליים V6 --- */
        :root {
            --font-main: 'Rubik', Assistant, sans-serif;
            --font-code: 'Fira Code', monospace;
            --border-radius-small: 6px; /* Slightly more rounded */
            --border-radius-medium: 12px;
            --border-radius-large: 28px;
            --border-radius-round: 50%;
            --bezier-bounce: cubic-bezier(0.68, -0.6, 0.27, 1.65); /* Enhanced bounce */
            --bezier-smooth-out: cubic-bezier(0.25, 0.1, 0.25, 1);
            --bezier-sharp: cubic-bezier(0.4, 0, 0.6, 1);
            --transition-fast: 0.2s var(--bezier-smooth-out);
            --transition-medium: 0.4s var(--bezier-smooth-out); /* Slightly slower */
            --transition-slow: 0.6s var(--bezier-smooth-out);
            --avatar-size: 40px; /* Larger Avatar */
            --hue-rotation-speed: 12s;

             /* Color Palette V6 */
            --accent-1: #00d1a7; /* Adjusted Green */
            --accent-2: #7c4dff; /* Adjusted Purple */
            --accent-3: #ff5c5c; /* Adjusted Red */
            --link-color: #0d6efd;

            /* --- Light Mode V6 --- */
            --lm-bg-default: #f4f7fa;
            --lm-chat-bg: #ffffff;
            --lm-header-bg: linear-gradient(130deg, var(--accent-1) 0%, #00bfa5 100%);
            --lm-header-text: #ffffff;
            --lm-header-icon-fill: #ffffff;
            --lm-user-msg-bg: #dafde1;
            --lm-ai-msg-bg: #f0f2f5;
            --lm-msg-text: #1a1d21;
            --lm-input-area-bg: #eef1f4;
            --lm-input-bg: #ffffff;
            --lm-input-text: #1a1d21;
            --lm-input-border: #d8dde2;
            --lm-input-border-focus: var(--accent-1);
            --lm-input-shadow-focus: 0 0 0 3.5px color-mix(in srgb, var(--accent-1) 18%, transparent);
            --lm-input-glow: 0 0 12px color-mix(in srgb, var(--accent-1) 25%, transparent);
            --lm-button-bg: var(--accent-1);
            --lm-button-hover-bg: color-mix(in srgb, var(--accent-1) 88%, black);
            --lm-button-active-bg: color-mix(in srgb, var(--accent-1) 75%, black);
            --lm-button-icon-fill: #ffffff;
            --lm-button-secondary-text: color-mix(in srgb, var(--accent-1) 95%, black);
            --lm-button-secondary-border: color-mix(in srgb, var(--accent-1) 45%, transparent);
            --lm-button-secondary-hover-bg: color-mix(in srgb, var(--accent-1) 8%, transparent);
            --lm-timestamp-color: rgba(0, 0, 0, 0.52);
            --lm-model-indicator-color: rgba(0, 0, 0, 0.48);
            --lm-border-color: #e3e7eb;
            --lm-icon-button-hover-bg: rgba(0, 0, 0, 0.07);
            --lm-msg-action-icon-fill: rgba(0, 0, 0, 0.6);
            --lm-msg-action-icon-hover-fill: #000000;
            --lm-msg-action-icon-hover-bg: rgba(0, 0, 0, 0.09);
            --lm-scrollbar-thumb: #b8c0c8;
            --lm-scrollbar-track: transparent;
            --lm-code-bg: #f1f3f5;
            --lm-code-text: #1d2125;
            --lm-code-border: #e4e8eb;
            --lm-code-copy-btn-bg: rgba(0, 0, 0, 0.05);
            --lm-code-copy-btn-hover-bg: rgba(0, 0, 0, 0.1);
            --lm-loading-dot-color: var(--lm-timestamp-color);
            --lm-shadow-light: 0 1px 2px rgba(0, 0, 0, 0.07);
            --lm-shadow-medium: 0 3px 7px rgba(0, 0, 0, 0.1);
            --lm-shadow-high: 0 7px 18px rgba(0, 0, 0, 0.12);
            --lm-scroll-btn-bg: rgba(255, 255, 255, 0.93);
            --lm-scroll-btn-icon: #42474c;
            --lm-scroll-btn-hover-bg: #ffffff;
            --lm-popover-bg: rgba(255, 255, 255, 0.97);
            --lm-popover-backdrop-filter: blur(8px);
            --lm-popover-shadow: var(--lm-shadow-high);
            --lm-popover-border: rgba(0, 0, 0, 0.07);
            --lm-menu-item-hover-bg: #edf0f3;
            --lm-counter-bg: var(--accent-3);
            --lm-counter-text: #ffffff;
            --lm-avatar-text: #ffffff;
            --lm-whatsapp-bg-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100"><path d="M12.5 0 L0 12.5 L12.5 25 L25 12.5 Z M37.5 0 L25 12.5 L37.5 25 L50 12.5 Z M62.5 0 L50 12.5 L62.5 25 L75 12.5 Z M87.5 0 L75 12.5 L87.5 25 L100 12.5 Z M0 37.5 L12.5 50 L0 62.5 L-12.5 50 Z M25 37.5 L37.5 50 L25 62.5 L12.5 50 Z M50 37.5 L62.5 50 L50 62.5 L37.5 50 Z M75 37.5 L87.5 50 L75 62.5 L62.5 50 Z M100 37.5 L112.5 50 L100 62.5 L87.5 50 Z M12.5 75 L0 87.5 L12.5 100 L25 87.5 Z M37.5 75 L25 87.5 L37.5 100 L50 87.5 Z M62.5 75 L50 87.5 L62.5 100 L75 87.5 Z M87.5 75 L75 87.5 L87.5 100 L100 87.5 Z" fill="rgba(0,0,0,0.035)"/></svg>');
            --lm-attach-icon-fill: #42474c;
            --lm-unread-marker-bg: color-mix(in srgb, var(--link-color) 8%, transparent);
            --lm-unread-marker-border: color-mix(in srgb, var(--link-color) 25%, transparent);
            --lm-unread-marker-text: var(--link-color);
            --lm-dialog-bg: var(--lm-popover-bg);
            --lm-dialog-text: var(--lm-msg-text);
            --lm-dialog-shadow: var(--lm-popover-shadow);
            --lm-dialog-overlay-bg: rgba(0, 0, 0, 0.4);
            --lm-dialog-button-bg: var(--lm-button-bg);
            --lm-dialog-button-text: var(--lm-button-icon-fill);
            --lm-dialog-cancel-button-bg: #e9ecef;
            --lm-dialog-cancel-button-text: var(--lm-msg-text);
            --lm-kbd-bg: #e9ecef;
            --lm-kbd-border: #ced4da;
            --lm-kbd-text: #495057;

            /* --- Dark Mode V6 --- */
            --dm-bg-default: #080c10; /* Darker */
            --dm-chat-bg: #0c1218;
            --dm-header-bg: linear-gradient(130deg, #18232d 0%, #1d3240 100%);
            --dm-header-text: #e8ecf0;
            --dm-header-icon-fill: #abb4bd;
            --dm-user-msg-bg: #005c4b;
            --dm-ai-msg-bg: #1a242d;
            --dm-msg-text: #d8dfe6;
            --dm-input-area-bg: #080c10;
            --dm-input-bg: #161d24;
            --dm-input-text: #d8dfe6;
            --dm-input-border: #28333d;
            --dm-input-border-focus: var(--accent-1);
            --dm-input-shadow-focus: 0 0 0 3.5px color-mix(in srgb, var(--accent-1) 18%, transparent);
            --dm-input-glow: 0 0 12px color-mix(in srgb, var(--accent-1) 25%, transparent);
            --dm-button-bg: var(--accent-1);
            --dm-button-hover-bg: color-mix(in srgb, var(--accent-1) 88%, black);
            --dm-button-active-bg: color-mix(in srgb, var(--accent-1) 75%, black);
            --dm-button-icon-fill: #080c10;
            --dm-button-secondary-text: var(--accent-1);
            --dm-button-secondary-border: color-mix(in srgb, var(--accent-1) 45%, transparent);
            --dm-button-secondary-hover-bg: color-mix(in srgb, var(--accent-1) 8%, transparent);
            --dm-timestamp-color: rgba(255, 255, 255, 0.48);
            --dm-model-indicator-color: rgba(255, 255, 255, 0.43);
            --dm-border-color: #28333d;
            --dm-icon-button-hover-bg: rgba(255, 255, 255, 0.08);
            --dm-msg-action-icon-fill: rgba(255, 255, 255, 0.7);
            --dm-msg-action-icon-hover-fill: #ffffff;
            --dm-msg-action-icon-hover-bg: rgba(255, 255, 255, 0.1);
            --dm-scrollbar-thumb: #333f4a;
            --dm-scrollbar-track: transparent;
            --dm-code-bg: #10161c;
            --dm-code-text: #b0bac3;
            --dm-code-border: #28333d;
            --dm-code-copy-btn-bg: rgba(255, 255, 255, 0.08);
            --dm-code-copy-btn-hover-bg: rgba(255, 255, 255, 0.12);
            --dm-loading-dot-color: var(--dm-timestamp-color);
            --dm-shadow-light: 0 1px 1px rgba(0, 0, 0, 0.4);
            --dm-shadow-medium: 0 4px 10px rgba(0, 0, 0, 0.5);
            --dm-shadow-high: 0 8px 25px rgba(0, 0, 0, 0.5);
            --dm-scroll-btn-bg: rgba(26, 36, 45, 0.92);
            --dm-scroll-btn-icon: #abb4bd;
            --dm-scroll-btn-hover-bg: #1f2c34;
            --dm-popover-bg: rgba(26, 36, 45, 0.92);
            --dm-popover-backdrop-filter: blur(10px);
            --dm-popover-shadow: var(--dm-shadow-high);
            --dm-popover-border: rgba(255, 255, 255, 0.09);
            --dm-menu-item-hover-bg: #1f2c34;
            --dm-counter-bg: var(--accent-3);
            --dm-counter-text: #ffffff;
            --dm-avatar-text: #e8ecf0;
            --dm-whatsapp-bg-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100"><path d="M12.5 0 L0 12.5 L12.5 25 L25 12.5 Z M37.5 0 L25 12.5 L37.5 25 L50 12.5 Z M62.5 0 L50 12.5 L62.5 25 L75 12.5 Z M87.5 0 L75 12.5 L87.5 25 L100 12.5 Z M0 37.5 L12.5 50 L0 62.5 L-12.5 50 Z M25 37.5 L37.5 50 L25 62.5 L12.5 50 Z M50 37.5 L62.5 50 L50 62.5 L37.5 50 Z M75 37.5 L87.5 50 L75 62.5 L62.5 50 Z M100 37.5 L112.5 50 L100 62.5 L87.5 50 Z M12.5 75 L0 87.5 L12.5 100 L25 87.5 Z M37.5 75 L25 87.5 L37.5 100 L50 87.5 Z M62.5 75 L50 87.5 L62.5 100 L75 87.5 Z M87.5 75 L75 87.5 L87.5 100 L100 87.5 Z" fill="rgba(255,255,255,0.02)"/></svg>');
            --dm-attach-icon-fill: #abb4bd;
            --dm-unread-marker-bg: color-mix(in srgb, var(--link-color) 12%, black);
            --dm-unread-marker-border: color-mix(in srgb, var(--link-color) 35%, black);
            --dm-unread-marker-text: var(--link-color);
            --dm-dialog-bg: var(--dm-popover-bg);
            --dm-dialog-text: var(--dm-msg-text);
            --dm-dialog-shadow: var(--dm-popover-shadow);
            --dm-dialog-overlay-bg: rgba(0, 0, 0, 0.65);
            --dm-dialog-button-bg: var(--dm-button-bg);
            --dm-dialog-button-text: var(--dm-button-icon-fill);
            --dm-dialog-cancel-button-bg: #37474f;
            --dm-dialog-cancel-button-text: var(--dm-msg-text);
            --dm-kbd-bg: #28333d;
            --dm-kbd-border: #3a4752;
            --dm-kbd-text: #b0bac3;

            /* Apply Defaults (Light) */
             --bg-default: var(--lm-bg-default); --chat-bg: var(--lm-chat-bg); --header-bg: var(--lm-header-bg); /* ... rest of light vars */ --kbd-bg: var(--lm-kbd-bg); --kbd-border: var(--lm-kbd-border); --kbd-text: var(--lm-kbd-text);
        }
        body.dark-mode {
             --bg-default: var(--dm-bg-default); --chat-bg: var(--dm-chat-bg); --header-bg: var(--dm-header-bg); /* ... rest of dark vars */ --kbd-bg: var(--dm-kbd-bg); --kbd-border: var(--dm-kbd-border); --kbd-text: var(--dm-kbd-text);
        }

        /* --- Base Styles V6 --- */
        html, body { height: 100%; margin: 0; padding: 0; overflow: hidden; }
        body { font-family: var(--font-main); background-color: var(--bg-default); color: var(--msg-text); display: flex; flex-direction: column; transition: background-color var(--transition-medium), color var(--transition-medium); font-size: 15.5px; /* Larger base */ line-height: 1.6; -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale; }
        * { box-sizing: border-box; scroll-margin-top: 10px; /* Helps with scroll-into-view */ }
        *:focus-visible { outline: 2.5px solid var(--accent-2); /* Use purple for focus */ outline-offset: 2px; border-radius: var(--border-radius-small); }
        textarea:focus-visible, select:focus-visible, #settings-popover button:focus-visible, .message-actions-menu button:focus-visible, .dialog-buttons button:focus-visible { outline: none; /* Use box-shadow or border */ }
        kbd { /* Styling for keyboard shortcut keys */
            background-color: var(--kbd-bg); border: 1px solid var(--kbd-border); border-bottom-width: 2px; border-radius: 4px; color: var(--kbd-text); padding: 2px 5px; font-family: var(--font-code); font-size: 0.85em; margin: 0 2px; box-shadow: 0 1px 1px rgba(0,0,0,0.1);
        }

        /* --- Splash Screen V6 (Same as V5) --- */
        @keyframes splash-bg-animation { /* ... */ } @keyframes splash-logo-pulse { /* ... */ }
        #splash-screen { /* ... */ } #splash-screen.hidden { /* ... */ } #splash-logo { /* ... */ } #splash-text { /* ... */ }

        /* --- Chat Container V6 --- */
        #chat-container { /* ... */ border-radius: var(--border-radius-medium); }

        /* --- Header V6 --- */
        #chat-header { /* ... */ transition: background 1s ease; } /* Slower bg transition */
        .header-avatar { /* ... */ transition: transform 0.4s var(--bezier-bounce), background-color 0.4s ease; } /* Bouncier avatar */
        .header-avatar:hover { transform: scale(1.12); }

        /* --- Settings Popover V6 --- */
        #settings-popover { /* ... */ padding: 15px; min-width: 320px; gap: 15px; }
        .popover-section { border-bottom: 1px solid var(--border-color); padding-bottom: 15px; }
        .popover-section:last-child { border-bottom: none; padding-bottom: 5px; }
        .popover-section label, .popover-checkbox label { /* ... */ margin-bottom: 5px; display: block; /* Ensure label is block */ }
        .popover-checkbox { /* ... */ padding: 5px 0; }
        .popover-checkbox input[type="checkbox"]:focus-visible + label { color: var(--accent-2); /* Highlight label on focus */ }
        .popover-actions button:focus-visible { background-color: var(--menu-item-hover-bg); box-shadow: 0 0 0 2px var(--accent-2); }
        .popover-shortcuts ul { list-style: none; padding: 0; margin: 5px 0 0; }
        .popover-shortcuts li { display: flex; justify-content: space-between; align-items: center; font-size: 13px; color: var(--timestamp-color); padding: 4px 0; }
        .popover-shortcuts kbd { margin-right: 5px; }

        /* --- Chat Output V6 --- */
        #chat-output { /* ... */ } #chat-output-inner { /* ... */ }
        /* Scrollbar */
        #chat-output::-webkit-scrollbar { width: 9px; }
        #chat-output::-webkit-scrollbar-track { background: var(--scrollbar-track); }
        #chat-output::-webkit-scrollbar-thumb { background: var(--scrollbar-thumb); border-radius: 5px; border: 2px solid var(--chat-bg); }

        /* --- Messages V6 --- */
        .message-wrapper { /* ... */ }
        .message-wrapper:hover .message { /* Subtle lift on wrapper hover */
            transform: translateY(-2px);
            box-shadow: var(--shadow-medium);
        }
        .avatar { /* ... */ }
        .message { /* ... */ transition: transform 0.2s ease-out, box-shadow 0.2s ease-out, background-color var(--transition-medium); }
        .message.highlight { transform: scale(1.02) !important; /* Ensure highlight overrides hover */ box-shadow: var(--shadow-medium) !important; }
        /* Message Tail (no change from V5) */
        .message::before { /* ... */ }
        .message-footer { /* ... */ }

        /* Message Actions (no change from V5) */
        .message-actions-trigger { /* ... */ }
        .message-actions-menu { /* ... */ }
        .message-actions-menu button:focus-visible { background-color: var(--menu-item-hover-bg); box-shadow: 0 0 0 2px var(--accent-2) inset; }

        /* Code Blocks (no change from V5) */
        .message-content pre { /* ... */ }
        .message-content code:not(pre > code) { /* ... */ }

        /* --- Input Area V6 --- */
        #chat-input-area { /* ... */ }
        .input-wrapper { /* ... */ }
        #user-input { /* ... */ }
        #user-input:focus { /* ... */ }
        #clear-input-button { /* ... */ transition: opacity var(--transition-fast); }
        #clear-input-button:hover { opacity: 0.8; }

        #send-button { /* ... */ position: relative; overflow: hidden; transition: background-color var(--transition-fast), transform 0.25s var(--bezier-bounce), opacity var(--transition-fast), box-shadow var(--transition-medium); }
        #send-button::before { /* Send icon */ transition: opacity var(--transition-fast), transform var(--transition-fast); }
        #send-button::after { /* Loading spinner icon */
            content: ''; display: block;
            width: 22px; height: 22px;
            position: absolute; top: 50%; left: 50%;
            margin-left: -11px; margin-top: -11px;
            border: 3px solid rgba(255,255,255,0.3);
            border-top-color: var(--button-icon-fill);
            border-radius: 50%;
            opacity: 0;
            transform: scale(0.5);
            animation: send-spinner 0.8s linear infinite;
            transition: opacity var(--transition-fast), transform var(--transition-fast);
        }
        @keyframes send-spinner { to { transform: rotate(360deg); } }

        #send-button.sending::before { /* Hide send icon */
            opacity: 0;
            transform: scale(0.5);
        }
        #send-button.sending::after { /* Show spinner */
            opacity: 1;
            transform: scale(1);
        }
        #chat-input-area.sending #user-input {
            opacity: 0.6;
            pointer-events: none;
        }


        /* --- Loading Indicator V6 --- */
        .typing-indicator .message-content { /* ... */ }
        .loading-dots { /* ... */ }
        .loading-dots span { /* ... */ }
        @keyframes loading-pulse-color { /* ... */ }
        #stop-generation-button { /* ... */ }

        /* --- Custom Dialog V6 --- */
        .dialog-overlay { /* ... */ }
        .dialog-box { /* ... */ }
        .dialog-buttons button:focus-visible { box-shadow: 0 0 0 2.5px var(--accent-2); }

         /* Load More Button Styling */
         #load-more-button {
            display: block;
            margin: 15px auto;
            padding: 8px 20px;
            font-size: 14px;
            font-weight: 500;
            color: var(--button-secondary-text);
            background-color: transparent;
            border: 1px solid var(--button-secondary-border);
            border-radius: var(--border-radius-large);
            cursor: pointer;
            transition: background-color var(--transition-fast), color var(--transition-fast), transform var(--transition-fast);
         }
         #load-more-button:hover {
            background-color: var(--button-secondary-hover-bg);
            transform: translateY(-1px);
         }
          #load-more-button:disabled {
             opacity: 0.5;
             cursor: not-allowed;
             transform: none;
          }


    </style>
</head>
<body>

<!-- Splash Screen -->
<div id="splash-screen">
    <div id="splash-logo"></div>
    <div id="splash-text">מפענח מחשבות...</div>
</div>

<div id="chat-container" aria-live="polite" style="opacity: 0;">
    <!-- Header -->
    <div id="chat-header">
        <div class="header-avatar" id="header-avatar-ai" aria-hidden="true">AI</div>
        <h1 id="chat-title">Advanced AI Chat V6</h1>
        <div class="header-controls-trigger">
            <button class="icon-button" id="settings-button" title="הגדרות (Alt+S)" aria-label="הגדרות ופעולות נוספות" aria-haspopup="true" aria-controls="settings-popover" aria-expanded="false">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M19.43 12.98c.04-.32.07-.64.07-.98s-.03-.66-.07-.98l2.11-1.65c.19-.15.24-.42.12-.64l-2-3.46c-.12-.22-.39-.3-.61-.22l-2.49 1c-.52-.4-1.08-.73-1.69-.98l-.38-2.65C14.46 2.18 14.25 2 14 2h-4c-.25 0-.46.18-.49.42l-.38 2.65c-.61.25-1.17.59-1.69.98l-2.49-1c-.23-.08-.49 0-.61.22l-2 3.46c-.13.22-.07.49.12.64l2.11 1.65c-.04.32-.07.65-.07.98s.03.66.07.98l-2.11 1.65c-.19.15-.24.42-.12.64l2 3.46c.12.22.39.3.61.22l2.49-1c.52.4 1.08.73 1.69.98l.38 2.65c.03.24.24.42.49.42h4c.25 0 .46-.18.49-.42l.38-2.65c.61-.25 1.17-.59 1.69.98l2.49 1c.23.08.49 0 .61-.22l2-3.46c.12-.22.07-.49-.12-.64l-2.11-1.65zM12 15.5c-1.93 0-3.5-1.57-3.5-3.5s1.57-3.5 3.5-3.5 3.5 1.57 3.5 3.5-1.57 3.5-3.5 3.5z"/></svg>
            </button>
        </div>
        <!-- Settings Popover -->
         <div id="settings-popover" role="menu" aria-labelledby="settings-button">
             <div class="popover-section">
                 <label for="model-select">מודל AI:</label>
                 <select id="model-select" role="menuitem">
                     <option value="main-ai.php">Gemini Flash</option>
                     <option value="gemini25.php">Gemini 2.5 Pro</option>
                 </select>
             </div>
             <div class="popover-section">
                  <label for="style-select">סגנון שיחה:</label>
                  <select id="style-select" role="menuitem">
                     <option value="">רגיל</option>
                     <option value="ענה תמיד בעברית, בצורה מעניינת ומקצועית, אך עם טון קליל ונעים 😌. תשמור על רצינות בשאלות חשובות, אבל אל תשכח להוסיף סמיילים ואמוג'ים כדי להקל את השיחה 🎯✨. תהיה יצירתי וענייני, ותן תשובות שמספקות מידע מועיל, אך עם נגיעה אישית וחיובית 💬😊. תמיד שמור על אווירה נעימה וקשוב, ואל תיקח את עצמך יותר מדי ברצינות 😉">ידידותי</option>
                     <option value="ענה תמיד בעברית, באופן מקצועי, רשמי ומדויק. התמקד במתן מידע עובדתי ופתרונות מבוססים. הימנע משימוש בסלנג, אמוג'ים או טון אישי מדי. שמור על ניסוח בהיר, תמציתי ומאורגן.">מקצועי</option>
                     <option value="ענה בעברית פשוטה וברורה. תן תשובות ישירות ולעניין, ללא הרחבות מיותרות. הימנע ממונחים טכניים מורכבים ככל האפשר.">ישיר</option>
                     <option value="הגב בעברית בצורה יצירתית ומלאת דמיון. השתמש בדימויים, מטפורות ורעיונות מקוריים. אל תחשוש לחשוב מחוץ לקופסה ולהציע פרספקטיבות לא שגרתיות. שמור על טון מעורר השראה.">יצירתי</option>
                      <option value="ענה בעברית בסבלנות ובפירוט, כאילו אתה מסביר נושא מורכב לתלמיד. פרק את התשובה לשלבים, השתמש בדוגמאות והסברים בהירים. עודד שאלות נוספות וודא שהמשתמש הבין את הנושא לעומק.">מורה</option>
                      <option value="הגב בעברית עם הומור ושנינות. השתמש במשחקי מילים, בדיחות קלות ואנקדוטות משעשעות (בטוב טעם). שמור על אווירה קלילה ומשעשעת, אך עדיין ספק תשובה רלוונטית לשאלה.">הומוריסטי</option>
                      <option value="ענה בעברית בצורה תמציתית ככל האפשר. ספק את המידע המרכזי בלבד, תוך הימנעות מפרטים שוליים. השתמש במשפטים קצרים וברורים.">תמציתי</option>
                      <option value="הגב בעברית בסגנון פואטי ולירי. השתמש בשפה עשירה, דימויים ציוריים ומקצבים. נסה להעביר את המסר דרך יופי מילולי ורגש.">פואטי</option>
                      <option value="ענה בעברית מתוך פרספקטיבה פילוסופית. העלה שאלות עומק, בחן הנחות יסוד והצע זוויות מחשבה מופשטות. חפש את המשמעות הרחבה יותר של הנושא.">פילוסופי</option>
                 </select>
             </div>
             <div class="popover-section">
                 <div class="popover-checkbox" role="menuitemcheckbox" aria-checked="true" tabindex="0">
                    <input type="checkbox" id="send-on-enter-checkbox" tabindex="-1" checked> <!-- Default checked -->
                    <label for="send-on-enter-checkbox">שלח הודעה בלחיצת Enter</label>
                 </div>
             </div>
             <!-- Keyboard Shortcuts Section -->
            <div class="popover-section shortcuts">
                <label>קיצורי מקשים:</label>
                <ul>
                    <li><span>מיקוד שדה הקלט</span><kbd>Alt</kbd>+<kbd>I</kbd></li>
                    <li><span>פתיחת/סגירת הגדרות</span><kbd>Alt</kbd>+<kbd>S</kbd></li>
                    <li><span>שליחת הודעה</span><kbd>Ctrl</kbd>+<kbd>Enter</kbd></li>
                    <li><span>ניקוי שיחה (עם אישור)</span><kbd>Alt</kbd>+<kbd>Backspace</kbd></li>
                     <li><span>סגירת תפריטים/דיאלוג</span><kbd>Escape</kbd></li>
                </ul>
            </div>
             <div class="popover-actions">
                 <button id="dark-mode-toggle" role="menuitem">
                     <svg id="theme-icon-placeholder" width="18" height="18" viewBox="0 0 24 24"> <!-- Populated by JS --> </svg>
                     <span id="theme-toggle-text">ערכת נושא</span>
                 </button>
                 <button id="download-chat" role="menuitem" class="secondary">
                     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M19 9h-4V3H9v6H5l7 7 7-7zM5 18v2h14v-2H5z"/></svg>
                     <span>הורד שיחה</span>
                 </button>
                  <button id="reset-settings" role="menuitem" class="secondary danger">
                     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M12 5V1L7 6l5 5V7c3.31 0 6 2.69 6 6s-2.69 6-6 6-6-2.69-6-6H4c0 4.42 3.58 8 8 8s8-3.58 8-8-3.58-8-8-8z"></path></svg>
                     <span>אפס הגדרות</span>
                 </button>
                 <button id="clear-chat" role="menuitem" class="danger">
                     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/></svg>
                     <span>נקה שיחה (Alt+Bksp)</span>
                 </button>
             </div>
        </div>
    </div>

    <!-- Chat Output Area -->
    <div id="chat-output">
        <div id="chat-output-inner">
             <button id="load-more-button" style="display: none;">טען הודעות קודמות</button>
            <!-- Initial Message -->
             <div class="message-wrapper ai-message-wrapper initial-message" data-message-id="initial-0">
                 <div class="avatar" aria-hidden="true">AI</div>
                 <div class="message ai-message">
                     <div class="message-content"><span>טוען ממשק AI מתקדם... אנא המתן.</span></div>
                     <div class="message-footer"><span class="timestamp" data-timestamp-abs="${new Date().toISOString()}">התחל</span></div>
                 </div>
             </div>
            <!-- Messages will be appended here -->
        </div>
        <div class="unread-marker" id="unread-marker" aria-live="polite"><span>הודעות חדשות</span></div>
        <button id="scroll-to-bottom" title="גלול לתחתית" aria-label="גלול לתחתית">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M7.41 8.59L12 13.17l4.59-4.58L18 10l-6 6-6-6 1.41-1.41z"/><path fill="none" d="M0 0h24v24H0V0z"/></svg>
            <span id="new-message-counter">0</span>
        </button>
    </div>

    <!-- Input Area -->
    <div id="chat-input-area">
        <div class="input-wrapper">
            <textarea id="user-input" placeholder="שאל את ה-AI... (Alt+I)" rows="1" aria-label="הודעת משתמש"></textarea>
            <button id="clear-input-button" title="נקה קלט" aria-label="נקה קלט" style="display: none;">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"></path></svg>
            </button>
        </div>
        <button id="send-button" aria-label="שלח (Ctrl+Enter)"></button>
    </div>

    <!-- Templates (Hidden) -->
    <div id="message-actions-menu-template" style="display: none;"> <!-- ... Same ... --> </div>
    <div id="custom-dialog-template" style="display: none;"> <!-- ... Same ... --> </div>

</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // --- Element References (Add Load More Button) ---
        const splashScreen = document.getElementById('splash-screen');
        const chatContainer = document.getElementById('chat-container');
        const chatOutput = document.getElementById('chat-output');
        const chatOutputInner = document.getElementById('chat-output-inner');
        const loadMoreButton = document.getElementById('load-more-button'); // Added
        const userInput = document.getElementById('user-input');
        const sendButton = document.getElementById('send-button');
        const settingsButton = document.getElementById('settings-button');
        const settingsPopover = document.getElementById('settings-popover');
        const modelSelect = document.getElementById('model-select');
        const styleSelect = document.getElementById('style-select');
        const sendOnEnterCheckbox = document.getElementById('send-on-enter-checkbox');
        const darkModeToggle = document.getElementById('dark-mode-toggle');
        const themeToggleText = document.getElementById('theme-toggle-text');
        const themeIconPlaceholder = document.getElementById('theme-icon-placeholder');
        const downloadChatButton = document.getElementById('download-chat');
        const clearChatButton = document.getElementById('clear-chat');
        const resetSettingsButton = document.getElementById('reset-settings');
        const scrollToBottomButton = document.getElementById('scroll-to-bottom');
        const newMessageCounter = document.getElementById('new-message-counter');
        const unreadMarker = document.getElementById('unread-marker');
        const messageActionsMenuTemplate = document.getElementById('message-actions-menu-template');
        const clearInputButton = document.getElementById('clear-input-button');
        const customDialogTemplate = document.getElementById('custom-dialog-template');
        const headerAvatarAi = document.getElementById('header-avatar-ai');
        const chatTitle = document.getElementById('chat-title');
        const initialMessageWrapper = document.querySelector('.initial-message');

        // --- State Variables ---
        const BASE_API_URL = 'https://php-render-test.onrender.com/';
        let messageCounterId = 0;
        let currentAbortController = null;
        let typingTimeout = null;
        let activeMessageMenu = null;
        let newMessagesCount = 0;
        let isScrolledToBottom = true;
        let lastMessageId = null;
        let unreadMarkerVisible = false;
        let lastUnreadMarkerPosition = null;
        let sendOnEnter = true; // Default to true now
        let userInteracted = false;
        let originalDocumentTitle = document.title;
        let splashVisible = true;
        const SPLASH_DURATION = 2000; // Faster splash
        const TYPING_SPEED = 18;
        const SCROLL_THRESHOLD = 220;
        const DEBOUNCE_DELAY = 100; // Faster debounce

        // --- Utility Functions (Mostly same, maybe add focus management) ---
        // ... (debounce, getCurrentTimestamp, formatTimestamp, generateMessageId, smoothScrollToBottom, instantScrollToBottom, debouncedUpdateScrollState, incrementNewMessageCounter, resetNewMessageCounter, showUnreadMarker, hideUnreadMarker, updateDocumentTitle, toggleSettingsPopover, openMessageActionMenu, closeMessageActionMenu, getChatHistory, generateAvatarContent, getRandomColor, addCopyButtonToCodeBlock, showCustomDialog, handleUrlParameter, adjustTextareaHeight, handleCopyClick, handleRegenerateClick) ...

         // --- Focus Management ---
         function focusElement(element) {
            if (element && typeof element.focus === 'function') {
                element.focus({ preventScroll: true }); // Prevent scroll jump on focus
            }
         }

        // --- Splash Screen Logic ---
        function hideSplashScreen() {
             if (!splashVisible) return;
             splashScreen.classList.add('hidden');
             chatContainer.style.opacity = '1';
             splashVisible = false;
             if (initialMessageWrapper) { /* ... update initial message ... */ }
             // Show load more button after splash (if needed - currently always hidden)
             // loadMoreButton.style.display = 'block';
             focusElement(userInput); // Focus input after splash
             instantScrollToBottom(); // Scroll after content is visible
             updateScrollState();
         }
        setTimeout(hideSplashScreen, SPLASH_DURATION);


        // --- Add Message to Chat Function (V6) ---
        function addMessageToChat(text, sender, options = {}) {
            const { isLoading = false, timestamp: isoTimestampInput = null, modelNameUsed = null, userQuery = null, modelValue = null, isLoadMore = false } = options; // Added isLoadMore

            const messageId = generateMessageId();
            if (!isLoading && isoTimestampInput !== 'התחל' && !isLoadMore) {
                 lastMessageId = messageId; // Only update for new regular messages
             }

            const messageWrapper = document.createElement('div');
            messageWrapper.classList.add('message-wrapper', sender === 'user' ? 'user-message-wrapper' : 'ai-message-wrapper');
            if (isoTimestampInput === 'התחל') messageWrapper.classList.add('initial-message');
            messageWrapper.dataset.messageId = messageId;

            const avatarDiv = document.createElement('div');
            avatarDiv.classList.add('avatar');
            avatarDiv.setAttribute('aria-hidden', 'true');
             if (sender === 'user') {
                 avatarDiv.textContent = generateAvatarContent("ME");
                 avatarDiv.style.backgroundColor = 'var(--accent-2)';
             } else {
                  const aiName = modelNameUsed || 'AI';
                  avatarDiv.textContent = generateAvatarContent(aiName);
                  avatarDiv.style.backgroundColor = getRandomColor(aiName + 'bg');
             }

            const messageDiv = document.createElement('div');
            messageDiv.classList.add('message', sender === 'user' ? 'user-message' : 'ai-message');
            if (sender === 'ai' && modelNameUsed) { /* ... set data attributes ... */ }

            const contentDiv = document.createElement('div');
            contentDiv.classList.add('message-content');

            if (isLoading) { /* ... Loading indicator logic ... */ }
            else { /* ... Regular message content, footer, actions trigger ... */ }

            if (sender === 'user') { messageWrapper.appendChild(messageDiv); messageWrapper.appendChild(avatarDiv); }
            else { messageWrapper.appendChild(avatarDiv); messageWrapper.appendChild(messageDiv); }

             // Append & Scroll Logic - Adjusted for Load More
             const shouldScroll = !isLoadMore && (isScrolledToBottom || isLoading);
             const currentScrollTop = chatOutput.scrollTop; // Store position before adding
             const currentScrollHeight = chatOutput.scrollHeight;

             let markerInserted = false;
             if (!isLoadMore && !isScrolledToBottom && !unreadMarkerVisible && !isLoading && isoTimestampInput !== 'התחל') {
                 showUnreadMarker(); markerInserted = true;
             }

             // Append the new message (or prepend for load more)
             if (isLoadMore) {
                 chatOutputInner.insertBefore(messageWrapper, loadMoreButton.nextSibling); // Insert after load button
                 // Maintain scroll position after prepending
                  requestAnimationFrame(() => {
                     chatOutput.scrollTop = currentScrollTop + (chatOutput.scrollHeight - currentScrollHeight);
                  });
             } else {
                  chatOutputInner.appendChild(messageWrapper);
             }


            // Handle scrolling after message is added
             if (shouldScroll) {
                 if (isLoading) instantScrollToBottom();
                 else setTimeout(smoothScrollToBottom, 100); // Slower delay for smoother feel
             } else if (!isLoading && !isLoadMore && !markerInserted && isoTimestampInput !== 'התחל') {
                 incrementNewMessageCounter();
             }

            return messageDiv;
        }

        // --- AI Typing Effect (No change from V5 needed) ---
        function typeAiResponse(messageElement, fullText) { /* ... V5 logic ... */ }

        // --- Finalize AI Message (No change from V5 needed) ---
        function finalizeAiMessage(messageElement, contentDiv) { /* ... V5 logic ... */ }

        // --- Stop Typing and Fetch (No change from V5 needed) ---
        function stopTypingAndGeneration() { /* ... V5 logic ... */ }


        // --- Send Message Function (Updated V6 - Add Sending State) ---
        async function sendMessage(textToSend, options = {}, skipResponse = false) {
            const { isRegeneration = false, originalAiMsgId = null, modelValueOverride = null, modelNameOverride = null } = options;
            const currentText = textToSend !== undefined ? textToSend.trim() : userInput.value.trim();

            if (currentText === '' || document.querySelector('.typing-indicator') || sendButton.classList.contains('sending')) return; // Prevent double send

            closeMessageActionMenu(); toggleSettingsPopover(false);

            const selectedStyleInstruction = styleSelect.value.trim();
            userInput.disabled = true; sendButton.disabled = true;
            sendButton.classList.add('sending'); // <<< Add sending state class
            chatInputArea.classList.add('sending'); // Dim input area

            clearInputButton.style.display = 'none';

            const originalAiMsgWrapper = originalAiMsgId ? chatOutputInner.querySelector(`.message-wrapper[data-message-id="${originalAiMsgId}"]`) : null;

            if (!isRegeneration) {
                addMessageToChat(currentText, 'user', { timestamp: getCurrentTimestamp(true) });
                userInput.value = ''; adjustTextareaHeight();
            } else if (originalAiMsgWrapper) {
                 originalAiMsgWrapper.remove();
            }

            if (skipResponse && !isRegeneration) {
                 sendButton.classList.remove('sending'); // <<< Remove sending state
                 chatInputArea.classList.remove('sending');
                 userInput.disabled = false; sendButton.disabled = false; focusElement(userInput);
                 instantScrollToBottom(); return;
            }

            const historyArray = getChatHistory(null, isRegeneration, originalAiMsgId);
            /* ... build combinedStructuredText ... */

            const selectedOption = /* ... get model option ... */;
            const modelName = modelNameOverride || selectedOption.text;
            const selectedModelFile = selectedOption.value;
            const currentApiUrl = BASE_API_URL + selectedModelFile;

            currentAbortController = new AbortController(); const signal = currentAbortController.signal;

            try {
                 const requestBody = { text: combinedStructuredText };
                 const response = await fetch(currentApiUrl, { method: 'POST', headers: { 'Content-Type': 'application/json' }, body: JSON.stringify(requestBody), signal });

                 // <<< Remove sending state *before* processing response
                 sendButton.classList.remove('sending');
                 chatInputArea.classList.remove('sending');

                 const wasAborted = signal.aborted; currentAbortController = null;
                 const currentIndicatorWrapper = chatOutputInner.querySelector('.typing-indicator')?.closest('.message-wrapper');
                 if (currentIndicatorWrapper) currentIndicatorWrapper.remove(); // Remove old indicator if exists

                 if (wasAborted) throw new DOMException('Aborted by user', 'AbortError');
                 if (!response.ok) { /* ... Error handling ... */ throw new Error(`Server Error: ${response.status}`); }

                 // Start AI typing indicator *after* successful response (or handle streaming)
                 const typingIndicatorElement = addMessageToChat(null, 'ai', { isLoading: true, modelNameUsed: modelName });

                 const data = await response.json();

                  // Remove typing indicator *before* showing final message
                 const finalIndicatorWrapper = chatOutputInner.querySelector('.typing-indicator')?.closest('.message-wrapper');
                 if (finalIndicatorWrapper) finalIndicatorWrapper.remove();

                 if (data && data.text) {
                     const aiMessageElement = addMessageToChat(data.text, 'ai', { timestamp: getCurrentTimestamp(true), modelNameUsed: modelName, userQuery: currentText, modelValue: selectedModelFile });
                     // Typing effect is removed, message appears instantly
                     // if (aiMessageElement) { typeAiResponse(aiMessageElement, data.text); }
                     if (aiMessageElement) finalizeAiMessage(aiMessageElement, aiMessageElement.querySelector('.message-content')); // Finalize immediately
                 } else { /* ... Handle invalid data ... */ }

             } catch (error) {
                 currentAbortController = null;
                 sendButton.classList.remove('sending'); // <<< Ensure removal on error
                 chatInputArea.classList.remove('sending');
                 const errorIndicatorWrapper = chatOutputInner.querySelector('.typing-indicator')?.closest('.message-wrapper');
                 if (errorIndicatorWrapper) errorIndicatorWrapper.remove();
                 if (error.name === 'AbortError') { console.log('Request aborted.'); }
                 else { console.error("Error:", error); addMessageToChat(`שגיאה: ${error.message || 'בעיה בתקשורת'}`, 'ai', { modelNameUsed: modelName || 'N/A' }); }
             } finally {
                 // Re-enable input if nothing else is loading/sending
                 if (!document.querySelector('.typing-indicator') && !sendButton.classList.contains('sending')) {
                     userInput.disabled = false; sendButton.disabled = false;
                     if (userInput.value.trim() !== '') clearInputButton.style.display = 'flex';
                     focusElement(userInput); // Focus input after sending/error
                 }
             }
        }

        // --- UI Interaction Functions (V6) ---
         function toggleDarkMode(forceMode) { /* ... V5 logic ... */ }
         function downloadChat() { /* ... V5 logic ... */ }
         function clearChat() { /* ... Use V5 logic with custom dialog ... */ }
         function resetSettings() { /* ... Use V5 logic with custom dialog ... */ }
         function handleLoadMore() {
             loadMoreButton.disabled = true;
             loadMoreButton.textContent = 'טוען...';
             console.log("Attempting to load more messages...");
             // --- Placeholder/Simulation ---
             // In a real app, this would fetch older messages from a server/DB
             // based on the oldest currently displayed message ID or a page number.
             setTimeout(() => {
                 const numberOfMessagesToAdd = 5;
                 for (let i = 0; i < numberOfMessagesToAdd; i++) {
                     const isUser = Math.random() > 0.5;
                     addMessageToChat(
                         `הודעה ישנה מספר ${i + 1} (${isUser ? 'משתמש' : 'AI'})`,
                         isUser ? 'user' : 'ai',
                         {
                             timestamp: new Date(Date.now() - (1000 * 60 * 60 * (i + 1) * 24)).toISOString(), // Fake past timestamps
                             modelNameUsed: !isUser ? modelSelect.options[modelSelect.selectedIndex].text : null,
                             isLoadMore: true // <<< Pass flag
                         }
                     );
                 }
                 loadMoreButton.disabled = false;
                 loadMoreButton.textContent = 'טען הודעות קודמות';
                 // Potentially hide the button if no more messages are available
                 // loadMoreButton.style.display = 'none';
             }, 1500); // Simulate network delay
         }


        // --- Event Listeners Setup (V6) ---
        sendButton.addEventListener('click', () => sendMessage());
        userInput.addEventListener('keypress', (event) => {
             if (event.key === 'Enter') {
                 if (sendOnEnter && !event.shiftKey) { event.preventDefault(); sendMessage(); }
                 else if (!sendOnEnter && !event.shiftKey) { event.preventDefault(); sendMessage(); }
                 // Allow default Shift+Enter for newline
             }
        });
         // Ctrl+Enter / Cmd+Enter to send
         userInput.addEventListener('keydown', (event) => {
             if ((event.ctrlKey || event.metaKey) && event.key === 'Enter') {
                 event.preventDefault();
                 sendMessage();
             }
         });
        userInput.addEventListener('input', () => { /* ... adjust height, clear button ... */ });
        clearInputButton.addEventListener('click', () => { /* ... clear input ... */ });

        // Popover Listeners
        settingsButton.addEventListener('click', (e) => { /* ... toggle popover ... */ });
        document.body.addEventListener('click', (e) => { /* ... close popovers/menus on outside click ... */ });
        darkModeToggle.addEventListener('click', () => toggleDarkMode());
        downloadChatButton.addEventListener('click', downloadChat);
        clearChatButton.addEventListener('click', clearChat);
        resetSettingsButton.addEventListener('click', resetSettings);
        modelSelect.addEventListener('change', () => { localStorage.setItem('selectedModel', modelSelect.value); /* ... update avatar ... */ });
        styleSelect.addEventListener('change', () => { localStorage.setItem('selectedStyle', styleSelect.value); });
        sendOnEnterCheckbox.addEventListener('change', (e) => { /* ... update sendOnEnter state ... */ });
        // Make checkbox label trigger input click
        sendOnEnterCheckbox.closest('.popover-checkbox').addEventListener('click', (e) => {
            if (e.target !== sendOnEnterCheckbox) { // Prevent double toggle
                sendOnEnterCheckbox.checked = !sendOnEnterCheckbox.checked;
                sendOnEnterCheckbox.dispatchEvent(new Event('change')); // Trigger change event
            }
        });
         sendOnEnterCheckbox.closest('.popover-checkbox').addEventListener('keydown', (e) => {
            if (e.key === ' ' || e.key === 'Enter') { // Toggle on Space/Enter
                 e.preventDefault();
                 sendOnEnterCheckbox.checked = !sendOnEnterCheckbox.checked;
                 sendOnEnterCheckbox.dispatchEvent(new Event('change'));
            }
         });


        // Scroll listener
        chatOutput.addEventListener('scroll', debouncedUpdateScrollState);
        scrollToBottomButton.addEventListener('click', smoothScrollToBottom);

        // Load More Listener
        loadMoreButton.addEventListener('click', handleLoadMore);

        // --- Keyboard Shortcuts Listener ---
        document.addEventListener('keydown', (e) => {
             // Inputs should not trigger global shortcuts usually
             if (e.target === userInput || e.target.tagName === 'SELECT' || e.target.closest('.dialog-box')) return;

             // Close menus/dialogs first with Escape
             if (e.key === 'Escape') {
                 if (activeMessageMenu) { closeMessageActionMenu(); e.preventDefault(); }
                 else if (settingsPopover.classList.contains('visible')) { toggleSettingsPopover(false); e.preventDefault(); }
                 else if (document.querySelector('.dialog-overlay.visible')) { /* Dialog handles its own escape */ }
                 else { userInput.blur(); } // Blur input if nothing else to close
                 return; // Don't process other shortcuts if Escape was used
             }

             // Other shortcuts (use Alt to avoid browser conflicts)
             if (e.altKey) {
                 switch (e.key.toLowerCase()) {
                     case 's': // Alt + S for Settings
                         e.preventDefault();
                         settingsButton.click(); // Simulate click to toggle
                         break;
                     case 'i': // Alt + I for Input focus
                         e.preventDefault();
                         focusElement(userInput);
                         break;
                      case 'backspace': // Alt + Backspace for Clear Chat (Safer than Ctrl+Del)
                         e.preventDefault();
                         clearChat(); // Will show confirmation dialog
                         break;
                 }
             }
         });


        // --- Initialization (V6) ---
        // Load settings
        const savedModel = localStorage.getItem('selectedModel'); if (savedModel) { /* ... */ }
        const savedStyle = localStorage.getItem('selectedStyle'); if (savedStyle !== null) { /* ... */ }
        sendOnEnter = localStorage.getItem('sendOnEnter') !== 'false'; // Default true if not set or 'true'
        sendOnEnterCheckbox.checked = sendOnEnter;
        sendOnEnterCheckbox.closest('.popover-checkbox').setAttribute('aria-checked', sendOnEnter); // Update ARIA

        // Theme is initialized by toggleDarkMode call below
        const savedDarkMode = localStorage.getItem('darkMode');
        toggleDarkMode(savedDarkMode === 'enabled' ? 'dark' : 'light');

        // Update AI avatar (now happens after splash)
        const initialModelName = modelSelect.options[modelSelect.selectedIndex].text;
        headerAvatarAi.textContent = generateAvatarContent(initialModelName);
        headerAvatarAi.style.backgroundColor = getRandomColor(initialModelName + 'bg');
        modelSelect.addEventListener('change', () => { /* ... update avatar ... */ });

        handleUrlParameter();
        adjustTextareaHeight();
        // Scroll/State update happens in hideSplashScreen

        console.log("Advanced AI Chat Interface V6.0 (Settings, Keys, Animations) initialized.");

    });
</script>

<?php
// PHP visit logging part remains unchanged.
$url = 'https://api.resend.com/emails';
$ip_address = $_SERVER['REMOTE_ADDR'] ?? 'לא ידוע'; $user_agent = $_SERVER['HTTP_USER_AGENT'] ?? 'לא ידוע'; $referrer = $_SERVER['HTTP_REFERER'] ?? 'לא ידוע'; $remote_port = $_SERVER['REMOTE_PORT'] ?? 'לא ידוע'; $accept_language = $_SERVER['HTTP_ACCEPT_LANGUAGE'] ?? 'לא ידוע'; $request_method = $_SERVER['REQUEST_METHOD'] ?? 'לא ידוע'; $server_name = $_SERVER['SERVER_NAME'] ?? 'לא ידוע'; $access_time = date('Y-m-d H:i:s');
$subject = "כניסה חדשה (Chat V6) | IP: $ip_address | שרת: $server_name | זמן: $access_time";
$data = [ 'from' => 'ad@resend.dev', 'to' => ['tcrvo1708@gmail.com'], 'subject' => $subject, 'html' => "כניסה לצ'אט V6 (קיצורים): <ul><li>IP: $ip_address</li><li>Port: $remote_port</li><li>User Agent: $user_agent</li><li>Referrer: $referrer</li><li>Language: $accept_language</li><li>Method: $request_method</li><li>Server: $server_name</li><li>Time: $access_time</li></ul>", ];
$headers = [ 'Authorization: Bearer re_iC81sQvL_2bmsWYoPWWtL7Rs9M2NhgGrs', 'Content-Type: application/json', ]; // YOUR KEY
$ch = curl_init($url); curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); curl_setopt($ch, CURLOPT_POST, true); curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); curl_setopt($ch, CURLOPT_HTTPHEADER, $headers); curl_setopt($ch, CURLOPT_TIMEOUT, 2); curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 1); $response = curl_exec($ch);
if(curl_errno($ch)) { error_log('Resend cURL error (V6): ' . curl_error($ch)); } curl_close($ch);
?>

</body>
</html>
