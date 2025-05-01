<!DOCTYPE html>
<html lang="he" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Futuristic AI Chat V7</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Marked.js for Markdown Rendering -->
    <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
    <style>
        /* --- משתני עיצוב גלובליים V7 --- */
        :root {
            --font-main: 'Rubik', sans-serif;
            --font-code: 'Fira Code', monospace;
            --border-radius-small: 6px;
            --border-radius-medium: 14px; /* More rounded */
            --border-radius-large: 30px;
            --border-radius-round: 50%;
            --bezier-elegant: cubic-bezier(0.65, 0, 0.35, 1); /* Elegant ease */
            --bezier-overshoot: cubic-bezier(0.34, 1.56, 0.64, 1); /* Slight overshoot */
            --transition-fast: 0.25s var(--bezier-elegant);
            --transition-medium: 0.45s var(--bezier-elegant);
            --transition-slow: 0.7s var(--bezier-elegant);
            --avatar-size: 42px;
            --hue-rotation-speed: 15s; /* Slower, more subtle */

            /* Color Palette V7 - Futuristic & Clean */
            --accent-1: #00e5ff; /* Cyan accent */
            --accent-2: #8e44ad; /* Purple accent */
            --accent-3: #ff4757; /* Red accent */
            --link-color: #00aaff;
            --glow-color: color-mix(in srgb, var(--accent-1) 40%, transparent);

            /* --- Light Mode V7 --- */
            --lm-bg-default: #eef2f7; /* Very light blueish gray */
            --lm-chat-bg: #ffffff;
            --lm-header-bg: linear-gradient(120deg, var(--accent-2) 0%, #a560e4 100%); /* Purple Gradient */
            --lm-header-text: #ffffff;
            --lm-header-icon-fill: #ffffff;
            --lm-header-status-text: rgba(255, 255, 255, 0.8);
            --lm-user-msg-bg: #d1f7ff; /* Light cyan user bubble */
            --lm-ai-msg-bg: #f1f3f7;
            --lm-msg-text: #181a1d;
            --lm-input-area-bg: #e4e9f0;
            --lm-input-bg: #ffffff;
            --lm-input-text: #181a1d;
            --lm-input-border: #cbd2d9;
            --lm-input-border-focus: var(--accent-2);
            --lm-input-shadow-focus: 0 0 0 3px color-mix(in srgb, var(--accent-2) 15%, transparent);
            --lm-input-glow: 0 0 15px color-mix(in srgb, var(--accent-2) 20%, transparent);
            --lm-button-bg: var(--accent-2); /* Purple button */
            --lm-button-hover-bg: color-mix(in srgb, var(--accent-2) 85%, black);
            --lm-button-active-bg: color-mix(in srgb, var(--accent-2) 70%, black);
            --lm-button-icon-fill: #ffffff;
            --lm-button-secondary-text: var(--accent-2);
            --lm-button-secondary-border: color-mix(in srgb, var(--accent-2) 40%, transparent);
            --lm-button-secondary-hover-bg: color-mix(in srgb, var(--accent-2) 8%, transparent);
            --lm-timestamp-color: rgba(0, 0, 0, 0.55);
            --lm-model-indicator-color: rgba(0, 0, 0, 0.5);
            --lm-border-color: #e0e5eb;
            --lm-icon-button-hover-bg: rgba(0, 0, 0, 0.08);
            --lm-msg-action-icon-fill: rgba(0, 0, 0, 0.65);
            --lm-msg-action-icon-hover-fill: #000000;
            --lm-msg-action-icon-hover-bg: rgba(0, 0, 0, 0.1);
            --lm-scrollbar-thumb: #aab4be;
            --lm-scrollbar-track: transparent;
            --lm-code-bg: #eef1f4;
            --lm-code-text: #212529;
            --lm-code-border: #dbe0e5;
            --lm-code-copy-btn-bg: rgba(0, 0, 0, 0.06);
            --lm-code-copy-btn-hover-bg: rgba(0, 0, 0, 0.11);
            --lm-loading-dot-color: var(--lm-timestamp-color);
            --lm-shadow-light: 0 1px 3px rgba(0, 0, 0, 0.08);
            --lm-shadow-medium: 0 4px 10px rgba(0, 0, 0, 0.1);
            --lm-shadow-high: 0 8px 22px rgba(0, 0, 0, 0.12);
            --lm-scroll-btn-bg: rgba(255, 255, 255, 0.94);
            --lm-scroll-btn-icon: #343a40;
            --lm-scroll-btn-hover-bg: #ffffff;
            --lm-popover-bg: rgba(255, 255, 255, 0.96);
            --lm-popover-backdrop-filter: blur(10px);
            --lm-popover-shadow: var(--lm-shadow-high);
            --lm-popover-border: rgba(0, 0, 0, 0.06);
            --lm-menu-item-hover-bg: #eef1f4;
            --lm-counter-bg: var(--accent-3);
            --lm-counter-text: #ffffff;
            --lm-avatar-text: #ffffff;
            --lm-whatsapp-bg-image: none; /* Cleaner look */
            --lm-attach-icon-fill: #343a40;
            --lm-unread-marker-bg: color-mix(in srgb, var(--link-color) 8%, transparent);
            --lm-unread-marker-border: color-mix(in srgb, var(--link-color) 25%, transparent);
            --lm-unread-marker-text: var(--link-color);
            --lm-dialog-bg: var(--lm-popover-bg);
            --lm-dialog-text: var(--lm-msg-text);
            --lm-dialog-shadow: var(--lm-popover-shadow);
            --lm-dialog-overlay-bg: rgba(0, 0, 0, 0.45);
            --lm-dialog-button-bg: var(--lm-button-bg);
            --lm-dialog-button-text: var(--lm-button-icon-fill);
            --lm-dialog-cancel-button-bg: #e4e9f0;
            --lm-dialog-cancel-button-text: var(--lm-msg-text);
            --lm-kbd-bg: #e4e9f0;
            --lm-kbd-border: #cbd2d9;
            --lm-kbd-text: #495057;
            --lm-suggestion-chip-bg: #eef1f4;
            --lm-suggestion-chip-hover-bg: #dbe0e5;
            --lm-suggestion-chip-text: var(--lm-msg-text);
            --lm-sentiment-positive: #28a745;
            --lm-sentiment-negative: var(--accent-3);
            --lm-sentiment-neutral: #6c757d;
            --lm-keyword-bg: #eef1f4;
            --lm-keyword-text: #495057;

            /* --- Dark Mode V7 --- */
            --dm-bg-default: #0a0d10; /* Very Dark */
            --dm-chat-bg: #0e1318;
            --dm-header-bg: linear-gradient(120deg, #181f26 0%, #1f2933 100%); /* Darker Header */
            --dm-header-text: #e1e8f0;
            --dm-header-icon-fill: #a0a9b3;
            --dm-header-status-text: rgba(225, 232, 240, 0.7);
            --dm-user-msg-bg: #005c4b; /* Keep distinct */
            --dm-ai-msg-bg: #1a2229; /* Darker AI */
            --dm-msg-text: #cdd6e0;
            --dm-input-area-bg: #0a0d10;
            --dm-input-bg: #131a20;
            --dm-input-text: #cdd6e0;
            --dm-input-border: #252f38;
            --dm-input-border-focus: var(--accent-1);
            --dm-input-shadow-focus: 0 0 0 3.5px color-mix(in srgb, var(--accent-1) 18%, transparent);
            --dm-input-glow: 0 0 15px color-mix(in srgb, var(--accent-1) 20%, transparent);
            --dm-button-bg: var(--accent-1);
            --dm-button-hover-bg: color-mix(in srgb, var(--accent-1) 88%, black);
            --dm-button-active-bg: color-mix(in srgb, var(--accent-1) 75%, black);
            --dm-button-icon-fill: #0a0d10;
            --dm-button-secondary-text: var(--accent-1);
            --dm-button-secondary-border: color-mix(in srgb, var(--accent-1) 40%, transparent);
            --dm-button-secondary-hover-bg: color-mix(in srgb, var(--accent-1) 8%, transparent);
            --dm-timestamp-color: rgba(255, 255, 255, 0.5);
            --dm-model-indicator-color: rgba(255, 255, 255, 0.45);
            --dm-border-color: #252f38;
            --dm-icon-button-hover-bg: rgba(255, 255, 255, 0.09);
            --dm-msg-action-icon-fill: rgba(255, 255, 255, 0.7);
            --dm-msg-action-icon-hover-fill: #ffffff;
            --dm-msg-action-icon-hover-bg: rgba(255, 255, 255, 0.11);
            --dm-scrollbar-thumb: #303b46;
            --dm-scrollbar-track: transparent;
            --dm-code-bg: #131a20;
            --dm-code-text: #adbac7;
            --dm-code-border: #252f38;
            --dm-code-copy-btn-bg: rgba(255, 255, 255, 0.09);
            --dm-code-copy-btn-hover-bg: rgba(255, 255, 255, 0.13);
            --dm-loading-dot-color: var(--dm-timestamp-color);
            --dm-shadow-light: 0 1px 1px rgba(0, 0, 0, 0.4);
            --dm-shadow-medium: 0 4px 12px rgba(0, 0, 0, 0.5);
            --dm-shadow-high: 0 8px 28px rgba(0, 0, 0, 0.5);
            --dm-scroll-btn-bg: rgba(26, 36, 45, 0.93);
            --dm-scroll-btn-icon: #a0a9b3;
            --dm-scroll-btn-hover-bg: #1f2c34;
            --dm-popover-bg: rgba(26, 36, 45, 0.94);
            --dm-popover-backdrop-filter: blur(12px);
            --dm-popover-shadow: var(--dm-shadow-high);
            --dm-popover-border: rgba(255, 255, 255, 0.08);
            --dm-menu-item-hover-bg: #1f2c34;
            --dm-counter-bg: var(--accent-3);
            --dm-counter-text: #ffffff;
            --dm-avatar-text: #e1e8f0;
            --dm-whatsapp-bg-image: none;
            --dm-attach-icon-fill: #a0a9b3;
            --dm-unread-marker-bg: color-mix(in srgb, var(--link-color) 10%, black);
            --dm-unread-marker-border: color-mix(in srgb, var(--link-color) 30%, black);
            --dm-unread-marker-text: var(--link-color);
            --dm-dialog-bg: var(--dm-popover-bg);
            --dm-dialog-text: var(--dm-msg-text);
            --dm-dialog-shadow: var(--dm-popover-shadow);
            --dm-dialog-overlay-bg: rgba(0, 0, 0, 0.7);
            --dm-dialog-button-bg: var(--dm-button-bg);
            --dm-dialog-button-text: var(--dm-button-icon-fill);
            --dm-dialog-cancel-button-bg: #37474f;
            --dm-dialog-cancel-button-text: var(--dm-msg-text);
            --dm-kbd-bg: #28333d;
            --dm-kbd-border: #3a4752;
            --dm-kbd-text: #b0bac3;
            --dm-suggestion-chip-bg: #252f38;
            --dm-suggestion-chip-hover-bg: #303b46;
            --dm-suggestion-chip-text: var(--dm-msg-text);
            --dm-sentiment-positive: #20c997; /* Tealish green for dark */
            --dm-sentiment-negative: var(--accent-3);
            --dm-sentiment-neutral: #868e96; /* Lighter gray */
            --dm-keyword-bg: #252f38;
            --dm-keyword-text: #a0a9b3;

            /* Apply Defaults (Light) */
             --bg-default: var(--lm-bg-default); --chat-bg: var(--lm-chat-bg); --header-bg: var(--lm-header-bg); /* ... rest */ --sentiment-positive: var(--lm-sentiment-positive); --sentiment-negative: var(--lm-sentiment-negative); --sentiment-neutral: var(--lm-sentiment-neutral); --keyword-bg: var(--lm-keyword-bg); --keyword-text: var(--lm-keyword-text); --suggestion-chip-bg: var(--lm-suggestion-chip-bg); --suggestion-chip-hover-bg: var(--lm-suggestion-chip-hover-bg); --suggestion-chip-text: var(--lm-suggestion-chip-text);
        }
        body.dark-mode {
             --bg-default: var(--dm-bg-default); --chat-bg: var(--dm-chat-bg); --header-bg: var(--dm-header-bg); /* ... rest */ --sentiment-positive: var(--dm-sentiment-positive); --sentiment-negative: var(--dm-sentiment-negative); --sentiment-neutral: var(--dm-sentiment-neutral); --keyword-bg: var(--dm-keyword-bg); --keyword-text: var(--dm-keyword-text); --suggestion-chip-bg: var(--dm-suggestion-chip-bg); --suggestion-chip-hover-bg: var(--dm-suggestion-chip-hover-bg); --suggestion-chip-text: var(--dm-suggestion-chip-text);
        }

        /* --- Base Styles V7 --- */
        html, body { height: 100%; margin: 0; padding: 0; overflow: hidden; }
        body { font-family: var(--font-main); background-color: var(--bg-default); color: var(--msg-text); display: flex; flex-direction: column; transition: background-color var(--transition-medium), color var(--transition-medium); font-size: 15.8px; /* Even larger */ line-height: 1.65; -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale; }
        /* ... Focus styles, link styles, selection styles from V6 ... */
        *:focus-visible { outline-color: var(--accent-2); }

        /* --- Splash Screen V7 (Same as V6) --- */
        /* ... Splash styles ... */

        /* --- Chat Container V7 --- */
        #chat-container { /* ... */ max-width: 1050px; } /* Wider still */

        /* --- Header V7 --- */
        #chat-header { /* ... */ padding: 12px 20px; gap: 18px; animation: header-gradient-animation var(--hue-rotation-speed) linear infinite alternate; }
        @keyframes header-gradient-animation {
            from { filter: hue-rotate(0deg); } to { filter: hue-rotate(20deg); }
        }
        .header-content { /* Wrapper for title and status */
            display: flex; flex-direction: column; flex-grow: 1;
            overflow: hidden; /* Prevent overflow */
        }
        #chat-title { /* ... */ font-size: 18px; font-weight: 600; display: flex; align-items: center; gap: 8px; }
        #chat-sentiment { /* Sentiment icon next to title */
            width: 18px; height: 18px; display: inline-block; vertical-align: middle;
            transition: transform 0.3s var(--bezier-overshoot);
            opacity: 0.7;
        }
        #chat-sentiment.loading { /* Placeholder look */
            background-color: rgba(255,255,255,0.3); border-radius: 50%; animation: pulse-light 1.5s infinite ease-in-out;
        }
        @keyframes pulse-light { 0%, 100% { opacity: 0.5; } 50% { opacity: 0.9; } }
        #chat-sentiment.positive svg { fill: var(--sentiment-positive); }
        #chat-sentiment.negative svg { fill: var(--sentiment-negative); }
        #chat-sentiment.neutral svg { fill: var(--dm-sentiment-neutral); } /* Use dark neutral for both for visibility */
        body.dark-mode #chat-sentiment.neutral svg { fill: var(--dm-sentiment-neutral); }

        #header-status { /* Last seen status */
            font-size: 12.5px; color: var(--lm-header-status-text); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3; margin-top: 2px;
        }
        body.dark-mode #header-status { color: var(--dm-header-status-text); }

        /* --- Settings Popover V7 --- */
        #settings-popover { /* ... */ }
        .popover-section.keywords h3 { font-size: 14px; font-weight: 500; margin-bottom: 8px; }
        .keywords-container { display: flex; flex-wrap: wrap; gap: 6px; }
        .keyword-chip {
            background-color: var(--keyword-bg); color: var(--keyword-text);
            font-size: 12px; padding: 3px 8px; border-radius: var(--border-radius-large);
        }
        .keywords-container.loading span { /* Loading state for keywords */
             display: inline-block; width: 60px; height: 20px; background-color: var(--keyword-bg); border-radius: var(--border-radius-large); animation: pulse-light 1.5s infinite ease-in-out; margin: 2px;
        }


        /* --- Chat Output V7 --- */
        #chat-output { /* ... */ }
        #chat-output-inner { /* ... */ gap: 0px; /* Remove gap, handled by message margins */ }

        /* --- Messages V7 --- */
        .message-wrapper {
             /* ... existing styles ... */
             margin-bottom: 4px; /* Default spacing */
             transition: margin-bottom var(--transition-fast); /* Smooth transition for grouping */
        }
        .message-wrapper:hover .message { transform: translateY(-3px); box-shadow: var(--shadow-high); } /* More lift */
        /* Grouping Styles */
        .message-wrapper.is-grouped-middle .avatar,
        .message-wrapper.is-grouped-end .avatar { visibility: hidden; } /* Hide avatar for middle/end */
        .message-wrapper.is-grouped-start .message { /* Top message in group */
            border-bottom-left-radius: var(--border-radius-small) !important; /* Sharper bottom corner */
            border-bottom-right-radius: var(--border-radius-small) !important;
        }
        .message-wrapper.is-grouped-middle .message { /* Middle message */
            border-radius: var(--border-radius-small) !important; /* Sharp corners top/bottom */
             margin-top: -2px; /* Overlap slightly */
        }
        .message-wrapper.is-grouped-end .message { /* Bottom message */
            border-top-left-radius: var(--border-radius-small) !important; /* Sharper top corner */
            border-top-right-radius: var(--border-radius-small) !important;
             margin-top: -2px; /* Overlap slightly */
        }
        /* Remove tail for middle/start messages */
        .message-wrapper.is-grouped-start .message::before,
        .message-wrapper.is-grouped-middle .message::before { display: none; }
        /* Adjust margin for non-grouped messages */
        .message-wrapper:not(.is-grouped-middle):not(.is-grouped-end) { margin-bottom: 12px; }


        .message { /* ... */ }
        .message-content { /* ... */ }
         /* Markdown Styles */
         .message-content strong, .message-content b { font-weight: 600; }
         .message-content em, .message-content i { font-style: italic; }
         .message-content ul, .message-content ol { padding-right: 25px; /* Indent lists */ margin: 8px 0; }
         .message-content li { margin-bottom: 4px; }
         .message-content blockquote {
             border-right: 3px solid var(--border-color); /* Blockquote style */
             padding-right: 10px; margin-right: 5px; color: var(--timestamp-color); font-style: italic;
         }
        /* Link Preview Placeholder */
         .link-preview {
             border: 1px solid var(--border-color); border-radius: var(--border-radius-medium);
             margin-top: 8px; overflow: hidden; background-color: var(--chat-bg);
             opacity: 0.7; /* Indicate it's a placeholder */
         }
         .link-preview-image { height: 100px; background-color: var(--lm-code-bg); /* Placeholder color */ display: flex; align-items: center; justify-content: center; color: var(--timestamp-color); }
         .link-preview-content { padding: 8px 12px; }
         .link-preview-title { font-weight: 600; font-size: 14px; margin-bottom: 3px; }
         .link-preview-desc { font-size: 13px; color: var(--timestamp-color); max-height: 40px; overflow: hidden; }

        .message-footer { /* ... */ }
        .message-actions-trigger { /* ... */ }
        .message-actions-menu { /* ... */ }
        .message-content pre { /* ... */ }
        .message-content code:not(pre > code) { /* ... */ }

        /* --- AI Suggestions --- */
        #ai-suggestions-area {
            display: flex; flex-wrap: wrap; gap: 8px;
            padding: 10px 15px 5px; /* Below last AI message */
             transition: opacity var(--transition-medium), transform var(--transition-medium);
             opacity: 0; transform: translateY(10px);
        }
        #ai-suggestions-area.visible { opacity: 1; transform: translateY(0); }
        .suggestion-chip {
            background-color: var(--suggestion-chip-bg); color: var(--suggestion-chip-text);
            border: 1px solid transparent; padding: 5px 12px; border-radius: var(--border-radius-large);
            font-size: 13px; cursor: pointer; transition: all var(--transition-fast);
        }
        .suggestion-chip:hover {
            background-color: var(--suggestion-chip-hover-bg); transform: translateY(-1px);
            border-color: var(--border-color);
        }
         .suggestion-chip:active { transform: scale(0.97); }


        /* --- Input Area V7 --- */
        #chat-input-area { /* ... */ padding: 12px 18px; }
        #user-input { /* ... */ }
        #user-input:focus { /* ... */ box-shadow: var(--input-shadow-focus), var(--input-glow); }
        #clear-input-button { /* ... */ }
        #send-button { /* ... */ transition: background-color var(--transition-fast), transform 0.3s var(--bezier-overshoot), opacity var(--transition-fast), box-shadow var(--transition-medium); } /* Bouncier Send */
        #send-button:hover { transform: scale(1.1); box-shadow: var(--shadow-high), 0 0 20px var(--glow-color); } /* Add glow on hover */
        #send-button.sending { transform: scale(1) !important; /* Prevent scale during sending */ box-shadow: none !important; }

        /* --- Loading Indicator V7 --- */
        /* ... Loading dots styles ... */

        /* --- Custom Dialog V7 --- */
        /* ... Dialog styles ... */

        /* --- Load More Button V7 --- */
        #load-more-button { /* ... */ }

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
        <div class="header-content">
            <h1 id="chat-title" title="כותרת השיחה (מתעדכן אוטומטית)">
                <span>המתן לכותרת...</span>
                <span id="chat-sentiment" title="סנטימנט השיחה" class="loading"></span>
            </h1>
            <div id="header-status">נראה לאחרונה: ממש עכשיו</div> <!-- Placeholder status -->
        </div>
        <div class="header-controls-trigger">
            <button class="icon-button" id="settings-button" title="הגדרות (Alt+S)" aria-label="הגדרות ופעולות נוספות" aria-haspopup="true" aria-controls="settings-popover" aria-expanded="false">
                 <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M19.43 12.98c.04-.32.07-.64.07-.98s-.03-.66-.07-.98l2.11-1.65c.19-.15.24-.42.12-.64l-2-3.46c-.12-.22-.39-.3-.61-.22l-2.49 1c-.52-.4-1.08-.73-1.69-.98l-.38-2.65C14.46 2.18 14.25 2 14 2h-4c-.25 0-.46.18-.49.42l-.38 2.65c-.61.25-1.17.59-1.69.98l-2.49-1c-.23-.08-.49 0-.61.22l-2 3.46c-.13.22-.07.49.12.64l2.11 1.65c-.04.32-.07.65-.07.98s.03.66.07.98l-2.11 1.65c-.19.15-.24.42-.12.64l2 3.46c.12.22.39.3.61.22l2.49-1c.52.4 1.08.73 1.69.98l.38 2.65c.03.24.24.42.49.42h4c.25 0 .46-.18.49-.42l.38-2.65c.61-.25 1.17-.59 1.69-.98l2.49 1c.23.08.49 0 .61-.22l2-3.46c.12-.22.07-.49-.12-.64l-2.11-1.65zM12 15.5c-1.93 0-3.5-1.57-3.5-3.5s1.57-3.5 3.5-3.5 3.5 1.57 3.5 3.5-1.57 3.5-3.5 3.5z"/></svg>
            </button>
        </div>
        <!-- Settings Popover -->
         <div id="settings-popover" role="menu" aria-labelledby="settings-button">
             <div class="popover-section">
                 <label for="model-select">מודל AI:</label>
                 <select id="model-select" role="menuitem"> /* ... Options ... */ </select>
             </div>
             <div class="popover-section">
                  <label for="style-select">סגנון שיחה:</label>
                  <select id="style-select" role="menuitem"> /* ... Options ... */ </select>
             </div>
             <div class="popover-section">
                 <div class="popover-checkbox" role="menuitemcheckbox" aria-checked="true" tabindex="0">
                    <input type="checkbox" id="send-on-enter-checkbox" tabindex="-1" checked>
                    <label for="send-on-enter-checkbox">שלח הודעה בלחיצת Enter</label>
                 </div>
             </div>
              <!-- Chat Keywords Section -->
            <div class="popover-section keywords">
                <h3><svg style="width:16px; height:16px; vertical-align: middle; margin-left: 5px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M21.41 11.58l-9-9C12.05 2.22 11.55 2 11 2H4c-1.1 0-2 .9-2 2v7c0 .55.22 1.05.59 1.42l9 9c.36.36.86.58 1.41.58s1.05-.22 1.41-.59l7-7c.37-.36.59-.86.59-1.41s-.23-1.06-.59-1.42zM5.5 7C4.67 7 4 6.33 4 5.5S4.67 4 5.5 4 7 4.67 7 5.5 6.33 7 5.5 7z"/></svg>מילות מפתח בשיחה:</h3>
                <div class="keywords-container" id="chat-keywords-display">
                    <span class="loading"></span> <!-- Loading placeholder -->
                </div>
            </div>
             <!-- Keyboard Shortcuts Section -->
            <div class="popover-section shortcuts">
                <label>קיצורי מקשים:</label>
                <ul> /* ... Shortcut list from V6 ... */ </ul>
            </div>
             <div class="popover-actions"> /* ... Buttons from V6 ... */ </div>
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
                     <div class="message-content"><span>מאתחל בינה מלאכותית...</span></div>
                     <div class="message-footer"><span class="timestamp" data-timestamp-abs="${new Date().toISOString()}">התחל</span></div>
                 </div>
             </div>
        </div>
        <!-- AI Suggestions Area -->
        <div id="ai-suggestions-area"></div>

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
            <button id="clear-input-button" title="נקה קלט" aria-label="נקה קלט" style="display: none;"> /* ... Clear icon ... */ </button>
        </div>
        <button id="send-button" aria-label="שלח (Ctrl+Enter)"></button>
    </div>

    <!-- Templates (Hidden) -->
    <div id="message-actions-menu-template" style="display: none;"> <!-- ... Same ... --> </div>
    <div id="custom-dialog-template" style="display: none;"> <!-- ... Same ... --> </div>

</div>

<script>
    // Wrap entire script in a self-executing function to avoid global scope pollution
    (function() {
        document.addEventListener('DOMContentLoaded', () => {
            // --- Element References (V7) ---
            const splashScreen = document.getElementById('splash-screen');
            const chatContainer = document.getElementById('chat-container');
            const chatOutput = document.getElementById('chat-output');
            const chatOutputInner = document.getElementById('chat-output-inner');
            const loadMoreButton = document.getElementById('load-more-button');
            const userInput = document.getElementById('user-input');
            const sendButton = document.getElementById('send-button');
            const chatInputArea = document.getElementById('chat-input-area'); // Reference input area
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
            const chatTitleElement = document.getElementById('chat-title').querySelector('span'); // Title span
            const chatSentimentElement = document.getElementById('chat-sentiment');
            const headerStatusElement = document.getElementById('header-status');
            const chatKeywordsDisplay = document.getElementById('chat-keywords-display');
            const aiSuggestionsArea = document.getElementById('ai-suggestions-area');
            const initialMessageWrapper = document.querySelector('.initial-message');

            // --- State Variables (V7) ---
            const BASE_API_URL = 'https://php-render-test.onrender.com/'; // UPDATE IF NEEDED
            const CHAT_FEATURES_ENDPOINT = 'get_chat_features.php'; // <<< NEW PHP Endpoint Name
            let messageCounterId = 0;
            let currentAbortController = null;
            let typingTimeout = null;
            let activeMessageMenu = null;
            let newMessagesCount = 0;
            let isScrolledToBottom = true;
            let lastMessageId = null;
            let unreadMarkerVisible = false;
            let lastUnreadMarkerPosition = null;
            let sendOnEnter = true; // Default true
            let userInteracted = false;
            let originalDocumentTitle = document.title;
            let splashVisible = true;
            let messageCountSinceFeatureFetch = 0; // Counter for title/feature update
            const FETCH_FEATURES_INTERVAL = 3; // Update features every 3 messages
            let isFetchingFeatures = false; // Prevent concurrent feature fetches
            const TYPING_SPEED = 18;
            const SCROLL_THRESHOLD = 250; // Slightly larger threshold
            const DEBOUNCE_DELAY = 120;
            const SPLASH_DURATION = 1800; // Faster splash

            // --- Utility Functions (V7 - Marked.js added) ---
            // ... (debounce, getCurrentTimestamp, formatTimestamp, generateMessageId, focusElement, ...)

            // Initialize Marked.js
             marked.setOptions({
                 breaks: true, // Convert GFM line breaks to <br>
                 gfm: true,    // Enable GitHub Flavored Markdown
                 sanitize: false // IMPORTANT: Assume server-side sanitization or trust the source. Set to true if rendering untrusted markdown.
                 // Consider adding a syntax highlighter library integration here if needed
             });

             function smoothScrollToBottom() { /* ... V6 logic ... */ }
             function instantScrollToBottom() { /* ... V6 logic ... */ }
             const debouncedUpdateScrollState = debounce(() => { /* ... V6 logic ... */ }, DEBOUNCE_DELAY);
             function incrementNewMessageCounter() { /* ... V6 logic ... */ }
             function resetNewMessageCounter() { /* ... V6 logic ... */ }
             function showUnreadMarker() { /* ... V6 logic ... */ }
             function hideUnreadMarker(setFlag = true) { /* ... V6 logic ... */ }
             function updateDocumentTitle(count = 0) { /* ... V6 logic ... */ }
             function toggleSettingsPopover(show) { /* ... V6 logic ... */ }
             function openMessageActionMenu(triggerButton, messageElement) { /* ... V6 logic ... */ }
             function closeMessageActionMenu() { /* ... V6 logic ... */ }
             function getChatHistory(currentUserMessage, forRegeneration = false, regenerationTargetMsgId = null) { /* ... V6 logic ... */ }
             function generateAvatarContent(name) { /* ... V6 logic ... */ }
             function getRandomColor(seed) { /* ... V6 logic ... */ }
             function addCopyButtonToCodeBlock(preElement) { /* ... V6 logic ... */ }
             function showCustomDialog(options) { /* ... V6 logic ... */ }
             function handleUrlParameter() { /* ... V6 logic ... */ }
             function adjustTextareaHeight() { /* ... V6 logic ... */ }
             function handleCopyClick(event) { /* ... V6 logic ... */ }
             function handleRegenerateClick(event) { /* ... V6 logic ... */ }

            // --- Splash Screen Logic (V7) ---
            function hideSplashScreen() {
                if (!splashVisible) return;
                splashScreen.classList.add('hidden');
                chatContainer.style.opacity = '1'; // Start chat fade-in
                splashVisible = false;
                 if (initialMessageWrapper) {
                    const initialContent = initialMessageWrapper.querySelector('.message-content span');
                    if (initialContent) initialContent.textContent = "שלום! אני ה-AI שלך, מוכן לשוחח.";
                 }
                // loadMoreButton.style.display = 'block'; // Show load more button
                focusElement(userInput);
                instantScrollToBottom();
                updateScrollState();
                 // Initial feature fetch after splash
                 setTimeout(fetchChatFeatures, 500); // Fetch features shortly after load
            }
            setTimeout(hideSplashScreen, SPLASH_DURATION);

            // --- Add Message to Chat Function (V7 - Markdown & Grouping) ---
            function addMessageToChat(text, sender, options = {}) {
                const { isLoading = false, timestamp: isoTimestampInput = null, modelNameUsed = null, userQuery = null, modelValue = null, isLoadMore = false } = options;

                const messageId = generateMessageId();
                 if (!isLoading && isoTimestampInput !== 'התחל' && !isLoadMore) { lastMessageId = messageId; }

                const messageWrapper = document.createElement('div');
                messageWrapper.classList.add('message-wrapper', sender === 'user' ? 'user-message-wrapper' : 'ai-message-wrapper');
                 if (isoTimestampInput === 'התחל') messageWrapper.classList.add('initial-message');
                 messageWrapper.dataset.messageId = messageId;

                 // --- Message Grouping Logic ---
                 const prevMessageWrapper = chatOutputInner.lastElementChild;
                 let prevSender = null;
                 if (prevMessageWrapper && !prevMessageWrapper.classList.contains('initial-message') && !prevMessageWrapper.querySelector('.unread-marker') && !prevMessageWrapper.querySelector('#load-more-button')) {
                     const prevMessageDiv = prevMessageWrapper.querySelector('.message');
                     if (prevMessageDiv) {
                         prevSender = prevMessageDiv.classList.contains('user-message') ? 'user' : 'ai';
                     }
                 }

                 if (!isLoadMore && prevSender === sender) {
                     // This message continues a group
                     messageWrapper.classList.add('is-grouped-end'); // New message is always the end for now
                     // Mark previous as start or middle
                     if (prevMessageWrapper.classList.contains('is-grouped-end')) {
                          prevMessageWrapper.classList.remove('is-grouped-end');
                          prevMessageWrapper.classList.add('is-grouped-middle');
                     } else if (!prevMessageWrapper.classList.contains('is-grouped-middle')) {
                         prevMessageWrapper.classList.add('is-grouped-start');
                     }
                 }
                 // --- End Grouping Logic ---


                const avatarDiv = document.createElement('div');
                avatarDiv.classList.add('avatar');
                avatarDiv.setAttribute('aria-hidden', 'true');
                if (sender === 'user') { /* ... user avatar ... */ }
                else { /* ... AI avatar ... */ }

                const messageDiv = document.createElement('div');
                messageDiv.classList.add('message', sender === 'user' ? 'user-message' : 'ai-message');
                if (sender === 'ai' && modelNameUsed) { /* ... set data attributes ... */ }

                const contentDiv = document.createElement('div');
                contentDiv.classList.add('message-content');

                if (isLoading) { /* ... Loading indicator ... */ }
                else {
                     // Render Markdown for AI, plain text for User
                     if (sender === 'ai' && text) {
                        try {
                            // Use Marked.js to render Markdown
                             contentDiv.innerHTML = marked.parse(text);
                             // Add link previews (Placeholder)
                             contentDiv.querySelectorAll('a').forEach(link => {
                                // In real app, fetch metadata here
                                // createLinkPreviewPlaceholder(link, contentDiv);
                             });
                        } catch (e) {
                            console.error("Markdown parsing error:", e);
                            contentDiv.textContent = text; // Fallback to plain text
                        }
                     } else if (text) {
                         contentDiv.textContent = text; // User message or fallback
                     } else {
                         contentDiv.textContent = " ";
                     }

                     messageDiv.appendChild(contentDiv);
                     /* ... Footer (Timestamp & Model) ... */
                     /* ... Ellipsis Trigger Button ... */
                     // Add copy buttons AFTER markdown processing
                     contentDiv.querySelectorAll('pre code').forEach(block => { // Target code inside pre
                        addCopyButtonToCodeBlock(block.parentElement); // Add to pre element
                     });
                }

                if (sender === 'user') { messageWrapper.appendChild(messageDiv); messageWrapper.appendChild(avatarDiv); }
                else { messageWrapper.appendChild(avatarDiv); messageWrapper.appendChild(messageDiv); }

                 /* ... Append & Scroll Logic (Adjusted for Grouping & Load More) ... */

                 // Increment feature fetch counter only for new non-loading, non-initial messages
                 if (!isLoading && isoTimestampInput !== 'התחל' && !isLoadMore) {
                    messageCountSinceFeatureFetch++;
                    if (messageCountSinceFeatureFetch >= FETCH_FEATURES_INTERVAL) {
                        fetchChatFeatures();
                    }
                 }

                return messageDiv;
            }

            // --- Finalize AI Message (V7 - Use Marked.js) ---
            function finalizeAiMessage(messageElement, contentDiv) {
                 clearTimeout(typingTimeout); typingTimeout = null;
                 if (messageElement) {
                     messageElement.classList.remove('typing-cursor');
                     const currentText = contentDiv.textContent; // Get text potentially added by typing effect
                     try {
                         contentDiv.innerHTML = marked.parse(currentText); // Re-render full markdown
                         contentDiv.querySelectorAll('pre code').forEach(block => addCopyButtonToCodeBlock(block.parentElement));
                     } catch (e) {
                         console.error("Markdown parsing error on finalize:", e);
                         // contentDiv already has plain text
                     }
                 }
                 /* ... Rest of finalize logic from V6 ... */
                 // Show suggestions after message finalized
                 showSuggestions(); // Call function to display suggestions (if any)
            }

             // --- Fetch Chat Features (Title, Sentiment, Keywords, Suggestions) ---
             async function fetchChatFeatures() {
                 if (isFetchingFeatures) return; // Prevent concurrent runs
                 isFetchingFeatures = true;
                 messageCountSinceFeatureFetch = 0; // Reset counter

                 // Show loading states
                 chatTitleElement.textContent = 'מעדכן כותרת...';
                 chatSentimentElement.className = 'loading'; // Use class for styling
                 chatKeywordsDisplay.innerHTML = '<span class="loading"></span><span class="loading"></span>'; // Placeholder loading
                 aiSuggestionsArea.classList.remove('visible'); // Hide old suggestions

                 const history = getChatHistory();
                 // Limit history length sent to PHP if necessary
                 const historyString = history.map(m => `[${m.role.toUpperCase()}] ${m.content}`).join('\n');

                 try {
                     // --- SIMULATE PHP Response ---
                     console.log("Simulating fetchChatFeatures for:", historyString.substring(0, 100) + "...");
                     await new Promise(resolve => setTimeout(resolve, 1200)); // Simulate network delay
                     const mockResponse = {
                         success: true,
                         data: {
                             title: generateMockTitle(history),
                             sentiment: ['positive', 'negative', 'neutral'][Math.floor(Math.random() * 3)],
                             keywords: generateMockKeywords(history),
                             suggestions: generateMockSuggestions(history)
                         }
                     };
                     console.log("Mock Response:", mockResponse);
                     // --- End Simulation ---

                     /* // --- Real Fetch (Commented Out) ---
                     const response = await fetch(CHAT_FEATURES_ENDPOINT, {
                         method: 'POST',
                         headers: { 'Content-Type': 'application/json' },
                         body: JSON.stringify({ history: history }) // Send history array
                     });

                     if (!response.ok) {
                         throw new Error(`Server error: ${response.status}`);
                     }
                     const result = await response.json();
                     if (!result || !result.success || !result.data) {
                         throw new Error("Invalid response format from feature endpoint.");
                     }
                     const data = result.data;
                     */
                      const data = mockResponse.data; // Use mock data

                     // Update UI
                     chatTitleElement.textContent = data.title || 'שיחה כללית';
                     chatTitleElement.parentElement.title = `כותרת: ${data.title || 'לא נמצאה'}`; // Update tooltip

                     chatSentimentElement.className = ''; // Clear loading class
                     chatSentimentElement.classList.add(data.sentiment || 'neutral');
                     chatSentimentElement.innerHTML = getSentimentIcon(data.sentiment); // Update icon
                     chatSentimentElement.title = `סנטימנט: ${translateSentiment(data.sentiment)}`;

                     // Update Keywords
                     if (data.keywords && data.keywords.length > 0) {
                         chatKeywordsDisplay.innerHTML = data.keywords.map(kw => `<span class="keyword-chip">${kw}</span>`).join('');
                     } else {
                         chatKeywordsDisplay.innerHTML = '<span>אין מילות מפתח עדיין</span>';
                     }

                     // Store and potentially display suggestions
                     sessionStorage.setItem('aiSuggestions', JSON.stringify(data.suggestions || []));
                     showSuggestions(); // Attempt to show immediately

                 } catch (error) {
                     console.error("Error fetching chat features:", error);
                     // Reset loading states on error
                     chatTitleElement.textContent = document.title; // Fallback title
                     chatSentimentElement.className = 'neutral'; // Default sentiment
                     chatSentimentElement.innerHTML = getSentimentIcon('neutral');
                     chatKeywordsDisplay.innerHTML = '<span>שגיאה בטעינת מילות מפתח</span>';
                 } finally {
                     isFetchingFeatures = false;
                 }
             }

             // --- Helper functions for Mock Data ---
             function generateMockTitle(history) {
                 if (history.length === 0) return "שיחה חדשה";
                 const lastUserMsg = [...history].reverse().find(m => m.role === 'user');
                 return lastUserMsg ? `נושא: ${lastUserMsg.content.substring(0, 20)}...` : "דיון כללי";
             }
             function generateMockKeywords(history) {
                 const words = history.flatMap(m => m.content.split(/\s+/));
                 const commonWords = ['את', 'של', 'על', 'עם', 'זה', 'הוא', 'היא', 'אני', 'אתה', 'מה', 'איך', 'למה', 'כן', 'לא', 'אבל', 'או'];
                 const freq = words.reduce((acc, word) => {
                     const cleanWord = word.toLowerCase().replace(/[.,!?]/g, '');
                     if (cleanWord.length > 3 && !commonWords.includes(cleanWord)) {
                         acc[cleanWord] = (acc[cleanWord] || 0) + 1;
                     }
                     return acc;
                 }, {});
                 return Object.entries(freq).sort((a, b) => b[1] - a[1]).slice(0, 3).map(entry => entry[0]);
             }
              function generateMockSuggestions(history) {
                 const suggestions = ["ספר לי עוד על זה", "תוכל להסביר?", "מה הדוגמאות?", "ומה הלאה?", "יש לך מקורות?"];
                 return suggestions.sort(() => 0.5 - Math.random()).slice(0, Math.floor(Math.random() * 3) + 1); // 1-3 random suggestions
              }
              function getSentimentIcon(sentiment) {
                 switch (sentiment) {
                     case 'positive': return '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm3.5-9c.83 0 1.5-.67 1.5-1.5S16.33 8 15.5 8 14 8.67 14 9.5s.67 1.5 1.5 1.5zm-7 0c.83 0 1.5-.67 1.5-1.5S9.33 8 8.5 8 7 8.67 7 9.5 7.67 11 8.5 11zm3.5 6.5c2.33 0 4.31-1.46 5.11-3.5H6.89c.8 2.04 2.78 3.5 5.11 3.5z"/></svg>'; // Smiley face
                     case 'negative': return '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm3.5-9c.83 0 1.5-.67 1.5-1.5S16.33 8 15.5 8 14 8.67 14 9.5s.67 1.5 1.5 1.5zm-7 0c.83 0 1.5-.67 1.5-1.5S9.33 8 8.5 8 7 8.67 7 9.5 7.67 11 8.5 11zm3.5 2.5c-2.33 0-4.31 1.46-5.11 3.5h10.22c-.8-2.04-2.78-3.5-5.11-3.5z"/></svg>'; // Frowny face
                     case 'neutral':
                     default: return '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm3.5-9c.83 0 1.5-.67 1.5-1.5S16.33 8 15.5 8 14 8.67 14 9.5s.67 1.5 1.5 1.5zm-7 0c.83 0 1.5-.67 1.5-1.5S9.33 8 8.5 8 7 8.67 7 9.5 7.67 11 8.5 11zm3.5 4.5H7v-1h10v1z"/></svg>'; // Neutral face
                 }
              }
              function translateSentiment(sentiment) {
                 switch (sentiment) {
                    case 'positive': return 'חיובי';
                    case 'negative': return 'שלילי';
                    case 'neutral': default: return 'ניטרלי';
                 }
              }

             // --- Show AI Suggestions ---
             function showSuggestions() {
                 const suggestions = JSON.parse(sessionStorage.getItem('aiSuggestions') || '[]');
                 aiSuggestionsArea.innerHTML = ''; // Clear previous
                 if (suggestions && suggestions.length > 0) {
                     suggestions.forEach(suggestion => {
                         const chip = document.createElement('button');
                         chip.classList.add('suggestion-chip');
                         chip.textContent = suggestion;
                         chip.onclick = () => {
                             userInput.value = suggestion; // Fill input
                             sendMessage(); // Send suggestion as message
                             aiSuggestionsArea.classList.remove('visible'); // Hide after click
                             sessionStorage.removeItem('aiSuggestions'); // Clear stored suggestions
                         };
                         aiSuggestionsArea.appendChild(chip);
                     });
                     aiSuggestionsArea.classList.add('visible');
                 } else {
                     aiSuggestionsArea.classList.remove('visible');
                 }
             }


            // --- Initialization (V7) ---
            // Load settings, theme, avatar (after splash)
            // ... (Initialization logic from V6, adjusted for splash delay) ...

            console.log("Futuristic AI Chat Interface V7.0 (PHP Features, Markdown, Grouping) initialized.");
        }); // End DOMContentLoaded
    })(); // End IIFE
</script>

<?php
// PHP visit logging part remains unchanged.
/* ... PHP logging code ... */
?>

</body>
</html>
