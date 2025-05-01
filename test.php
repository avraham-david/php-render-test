<!DOCTYPE html>
<html lang="he" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>צ'אט AI אולטימטיבי V4.0+</title>
    <!-- Syntax Highlighting CSS (Choose a theme) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/atom-one-dark.min.css" media="(prefers-color-scheme: dark)">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/default.min.css" media="(prefers-color-scheme: light), (prefers-color-scheme: no-preference)">
    <!-- Font Awesome for Icons (Optional but used in examples) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- KaTeX for Math Rendering (Optional) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.css">

    <style>
        /* --- V3.0 Variables + NEW --- */
        :root {
            /* Existing variables... */
            --font-main: Assistant, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            --font-code: 'Consolas', 'Monaco', 'Courier New', monospace;
            --border-radius-small: 4px;
            --border-radius-medium: 8px;
            --border-radius-large: 18px;
            --border-radius-avatar: 50%;
            --transition-fast: 0.15s ease;
            --transition-medium: 0.3s ease;
            --transition-slow: 0.5s ease;
            --avatar-size: 30px;
            --message-spacing: 10px;
            --message-spacing-grouped: 3px;
            --message-horizontal-gap: 10px;

            /* NEW Variables */
            --header-height: 59px; /* Approximate */
            --input-area-min-height: 64px; /* Includes padding */
            --pinned-message-height: 40px;
            --reply-preview-height: 50px; /* NEW */
            --toolbar-height: 35px;
            --accent-color-light: #008069; /* Default light accent */
            --accent-color-dark: #00a884; /* Default dark accent */
            --accent-color: var(--accent-color-light); /* Default */
            --lm-accent-color: var(--accent-color-light);
            --dm-accent-color: var(--accent-color-dark);
            --lm-reply-bg: rgba(0, 0, 0, 0.05);
            --dm-reply-bg: rgba(255, 255, 255, 0.08);
            --lm-modal-bg: rgba(255, 255, 255, 0.95);
            --dm-modal-bg: rgba(30, 40, 50, 0.95);
            --lm-modal-shadow: 0 5px 15px rgba(0,0,0,0.2);
            --dm-modal-shadow: 0 5px 20px rgba(0,0,0,0.4);
            --lm-search-highlight-bg: #fff3cd;
            --dm-search-highlight-bg: #6a4d00;
            --lm-pinned-bg: #fffbeb; --lm-pinned-border: #ffeccc;
            --dm-pinned-bg: #2c3e50; --dm-pinned-border: #34495e;
            --lm-toolbar-bg: #e9edef; --lm-toolbar-button-hover: #d1d7db;
            --dm-toolbar-bg: #2a3942; --dm-toolbar-button-hover: #374151;
            --lm-tooltip-bg: #333; --lm-tooltip-text: #fff;
            --dm-tooltip-bg: #ddd; --dm-tooltip-text: #111;
            --lm-error-msg-bg: #fff0f0; --lm-error-msg-border: #ffcccc; --lm-error-msg-text: #c00;
            --dm-error-msg-bg: #4d1f1f; --dm-error-msg-border: #662d2d; --dm-error-msg-text: #ffdddd;
            --lm-reply-context-bg: rgba(0, 128, 105, 0.08); /* Light reply context bg */
            --dm-reply-context-bg: rgba(0, 168, 132, 0.15); /* Dark reply context bg */
            --lm-action-spinner-color: var(--lm-accent-color);
            --dm-action-spinner-color: var(--dm-accent-color);
            --lm-skeleton-bg: #e0e0e0;
            --dm-skeleton-bg: #374151;


            /* --- Light Mode --- */
            --lm-bg-default: #e5ddd5; --lm-chat-bg: #ffffff; --lm-header-bg: #00a884; --lm-header-bg-gradient: linear-gradient(to bottom, #00b09b, #00a884); --lm-header-text: #ffffff; --lm-header-icon-fill: #ffffff; --lm-user-msg-bg: #dcf8c6; --lm-ai-msg-bg: #ffffff; --lm-msg-text: #111b21; --lm-avatar-user-bg: #adff2f; --lm-avatar-ai-bg: #b0e0e6; --lm-input-area-bg: #f0f2f5; --lm-input-bg: #ffffff; --lm-input-text: #111b21; --lm-input-border: #e0e0e0; --lm-input-border-focus: var(--lm-accent-color); --lm-button-bg: var(--lm-accent-color); --lm-button-hover-bg: color-mix(in srgb, var(--lm-accent-color) 85%, #000); --lm-button-active-bg: color-mix(in srgb, var(--lm-accent-color) 70%, #000); --lm-button-icon-fill: #ffffff; --lm-timestamp-color: rgba(17, 27, 33, 0.6); --lm-model-indicator-color: rgba(17, 27, 33, 0.5); --lm-border-color: #e9edef; --lm-icon-button-hover-bg: rgba(0, 0, 0, 0.07); --lm-msg-action-icon-fill: rgba(0, 0, 0, 0.5); --lm-msg-action-icon-hover-fill: #000000; --lm-msg-action-icon-hover-bg: rgba(0, 0, 0, 0.09); --lm-scrollbar-thumb: #b0b0b0; --lm-scrollbar-track: #f5f5f5; --lm-link-color: #007bff; --lm-code-bg: #f8f9fa; --lm-code-text: #212529; --lm-code-border: #dee2e6; --lm-code-copy-btn-bg: rgba(0, 0, 0, 0.05); --lm-code-copy-btn-hover-bg: rgba(0, 0, 0, 0.1); --lm-code-copy-btn-copied-bg: var(--lm-button-bg); --lm-code-copy-btn-copied-text: #ffffff; --lm-loading-spinner-color1: var(--lm-accent-color); --lm-loading-spinner-color2: #dcf8c6; --lm-shadow-light: 0 1px 1px rgba(0, 0, 0, 0.06); --lm-shadow-medium: 0 2px 4px rgba(0, 0, 0, 0.08); --lm-scroll-btn-bg: rgba(255, 255, 255, 0.9); --lm-scroll-btn-icon: #54656f; --lm-scroll-btn-hover-bg: #ffffff; --lm-date-separator-bg: #e9e9e9; --lm-date-separator-text: #54656f; --lm-focus-outline: var(--lm-accent-color);

            /* --- Dark Mode --- */
            --dm-bg-default: #0f1a21; --dm-chat-bg: #0b141a; --dm-header-bg: #202c33; --dm-header-bg-gradient: linear-gradient(to bottom, #2a3942, #202c33); --dm-header-text: #e9edef; --dm-header-icon-fill: #aebac1; --dm-user-msg-bg: #005c4b; --dm-ai-msg-bg: #202c33; --dm-msg-text: #e9edef; --dm-avatar-user-bg: #008069; --dm-avatar-ai-bg: #345665; --dm-input-area-bg: #1f2c34; --dm-input-bg: #2a3942; --dm-input-text: #e9edef; --dm-input-border: #374151; --dm-input-border-focus: var(--dm-accent-color); --dm-button-bg: var(--dm-accent-color); --dm-button-hover-bg: color-mix(in srgb, var(--dm-accent-color) 85%, #fff); --dm-button-active-bg: color-mix(in srgb, var(--dm-accent-color) 70%, #fff); --dm-button-icon-fill: #111b21; --dm-timestamp-color: rgba(233, 237, 239, 0.65); --dm-model-indicator-color: rgba(233, 237, 239, 0.55); --dm-border-color: #2a3942; --dm-icon-button-hover-bg: rgba(255, 255, 255, 0.08); --dm-msg-action-icon-fill: rgba(255, 255, 255, 0.6); --dm-msg-action-icon-hover-fill: #ffffff; --dm-msg-action-icon-hover-bg: rgba(255, 255, 255, 0.1); --dm-scrollbar-thumb: #4a4a4a; --dm-scrollbar-track: #1a242b; --dm-link-color: #58a6ff; --dm-code-bg: #182128; --dm-code-text: #d1d5db; --dm-code-border: #374151; --dm-code-copy-btn-bg: rgba(255, 255, 255, 0.1); --dm-code-copy-btn-hover-bg: rgba(255, 255, 255, 0.15); --dm-code-copy-btn-copied-bg: var(--dm-button-bg); --dm-code-copy-btn-copied-text: #111b21; --dm-loading-spinner-color1: var(--dm-accent-color); --dm-loading-spinner-color2: #005c4b; --dm-shadow-light: 0 1px 1px rgba(0, 0, 0, 0.25); --dm-shadow-medium: 0 2px 5px rgba(0, 0, 0, 0.3); --dm-scroll-btn-bg: rgba(42, 57, 66, 0.9); --dm-scroll-btn-icon: #aebac1; --dm-scroll-btn-hover-bg: #2a3942; --dm-date-separator-bg: #2a3942; --dm-date-separator-text: #aebac1; --dm-focus-outline: var(--dm-accent-color);


             /* Default Assign Light */
             --bg-default: var(--lm-bg-default); --chat-bg: var(--lm-chat-bg); /* ... other light vars ... */
             --accent-color: var(--lm-accent-color); --reply-bg: var(--lm-reply-bg);
             --modal-bg: var(--lm-modal-bg); --modal-shadow: var(--lm-modal-shadow);
             --pinned-bg: var(--lm-pinned-bg); --pinned-border: var(--lm-pinned-border);
             --toolbar-bg: var(--lm-toolbar-bg); --toolbar-button-hover: var(--lm-toolbar-button-hover);
             --tooltip-bg: var(--lm-tooltip-bg); --tooltip-text: var(--lm-tooltip-text);
             --error-msg-bg: var(--lm-error-msg-bg); --error-msg-border: var(--lm-error-msg-border);
             --error-msg-text: var(--lm-error-msg-text);
             --search-highlight-bg: var(--lm-search-highlight-bg);
             --reply-context-bg: var(--lm-reply-context-bg);
             --action-spinner-color: var(--lm-action-spinner-color);
             --skeleton-bg: var(--lm-skeleton-bg);
             /* Assign all other LM vars */
             --header-bg: var(--lm-header-bg); --header-bg-image: var(--lm-header-bg-gradient); --header-text: var(--lm-header-text); --header-icon-fill: var(--lm-header-icon-fill); --user-msg-bg: var(--lm-user-msg-bg); --ai-msg-bg: var(--lm-ai-msg-bg); --msg-text: var(--lm-msg-text); --avatar-user-bg: var(--lm-avatar-user-bg); --avatar-ai-bg: var(--lm-avatar-ai-bg); --input-area-bg: var(--lm-input-area-bg); --input-bg: var(--lm-input-bg); --input-text: var(--lm-input-text); --input-border: var(--lm-input-border); --input-border-focus: var(--lm-input-border-focus); --button-bg: var(--lm-button-bg); --button-hover-bg: var(--lm-button-hover-bg); --button-active-bg: var(--lm-button-active-bg); --button-icon-fill: var(--lm-button-icon-fill); --timestamp-color: var(--lm-timestamp-color); --model-indicator-color: var(--lm-model-indicator-color); --border-color: var(--lm-border-color); --icon-button-hover-bg: var(--lm-icon-button-hover-bg); --msg-action-icon-fill: var(--lm-msg-action-icon-fill); --msg-action-icon-hover-fill: var(--lm-msg-action-icon-hover-fill); --msg-action-icon-hover-bg: var(--lm-msg-action-icon-hover-bg); --scrollbar-thumb: var(--lm-scrollbar-thumb); --scrollbar-track: var(--lm-scrollbar-track); --link-color: var(--lm-link-color); --code-bg: var(--lm-code-bg); --code-text: var(--lm-code-text); --code-border: var(--lm-code-border); --code-copy-btn-bg: var(--lm-code-copy-btn-bg); --code-copy-btn-hover-bg: var(--lm-code-copy-btn-hover-bg); --code-copy-btn-copied-bg: var(--lm-code-copy-btn-copied-bg); --code-copy-btn-copied-text: var(--lm-code-copy-btn-copied-text); --loading-spinner-color1: var(--lm-loading-spinner-color1); --loading-spinner-color2: var(--lm-loading-spinner-color2); --shadow-light: var(--lm-shadow-light); --shadow-medium: var(--lm-shadow-medium); --scroll-btn-bg: var(--lm-scroll-btn-bg); --scroll-btn-icon: var(--lm-scroll-btn-icon); --scroll-btn-hover-bg: var(--lm-scroll-btn-hover-bg); --date-separator-bg: var(--lm-date-separator-bg); --date-separator-text: var(--lm-date-separator-text); --focus-outline-color: var(--lm-focus-outline);
             --select-bg: rgba(255, 255, 255, 0.15); --select-border: rgba(255, 255, 255, 0.3); --select-text: var(--lm-header-text); --select-arrow: var(--lm-header-icon-fill); --stop-button-fill: var(--lm-msg-action-icon-fill); --stop-button-hover-fill: var(--lm-msg-action-icon-hover-fill);

        }
        body.dark-mode {
             /* Assign all DM vars */
             --bg-default: var(--dm-bg-default); --chat-bg: var(--dm-chat-bg); /* ... other dark vars ... */
             --accent-color: var(--dm-accent-color); --reply-bg: var(--dm-reply-bg);
             --modal-bg: var(--dm-modal-bg); --modal-shadow: var(--dm-modal-shadow);
             --pinned-bg: var(--dm-pinned-bg); --pinned-border: var(--dm-pinned-border);
             --toolbar-bg: var(--dm-toolbar-bg); --toolbar-button-hover: var(--dm-toolbar-button-hover);
             --tooltip-bg: var(--dm-tooltip-bg); --tooltip-text: var(--dm-tooltip-text);
             --error-msg-bg: var(--dm-error-msg-bg); --error-msg-border: var(--dm-error-msg-border);
             --error-msg-text: var(--dm-error-msg-text);
             --search-highlight-bg: var(--dm-search-highlight-bg);
             --reply-context-bg: var(--dm-reply-context-bg);
             --action-spinner-color: var(--dm-action-spinner-color);
             --skeleton-bg: var(--dm-skeleton-bg);
             /* Assign all other DM vars */
             --header-bg: var(--dm-header-bg); --header-bg-image: var(--dm-header-bg-gradient); --header-text: var(--dm-header-text); --header-icon-fill: var(--dm-header-icon-fill); --user-msg-bg: var(--dm-user-msg-bg); --ai-msg-bg: var(--dm-ai-msg-bg); --msg-text: var(--dm-msg-text); --avatar-user-bg: var(--dm-avatar-user-bg); --avatar-ai-bg: var(--dm-avatar-ai-bg); --input-area-bg: var(--dm-input-area-bg); --input-bg: var(--dm-input-bg); --input-text: var(--dm-input-text); --input-border: var(--dm-input-border); --input-border-focus: var(--dm-input-border-focus); --button-bg: var(--dm-button-bg); --button-hover-bg: var(--dm-button-hover-bg); --button-active-bg: var(--dm-button-active-bg); --button-icon-fill: var(--dm-button-icon-fill); --timestamp-color: var(--dm-timestamp-color); --model-indicator-color: var(--dm-model-indicator-color); --border-color: var(--dm-border-color); --icon-button-hover-bg: var(--dm-icon-button-hover-bg); --msg-action-icon-fill: var(--dm-msg-action-icon-fill); --msg-action-icon-hover-fill: var(--dm-msg-action-icon-hover-fill); --msg-action-icon-hover-bg: var(--dm-msg-action-icon-hover-bg); --scrollbar-thumb: var(--dm-scrollbar-thumb); --scrollbar-track: var(--dm-scrollbar-track); --link-color: var(--dm-link-color); --code-bg: var(--dm-code-bg); --code-text: var(--dm-code-text); --code-border: var(--dm-code-border); --code-copy-btn-bg: var(--dm-code-copy-btn-bg); --code-copy-btn-hover-bg: var(--dm-code-copy-btn-hover-bg); --code-copy-btn-copied-bg: var(--dm-code-copy-btn-copied-bg); --code-copy-btn-copied-text: var(--dm-code-copy-btn-copied-text); --loading-spinner-color1: var(--dm-loading-spinner-color1); --loading-spinner-color2: var(--dm-loading-spinner-color2); --shadow-light: var(--dm-shadow-light); --shadow-medium: var(--dm-shadow-medium); --scroll-btn-bg: var(--dm-scroll-btn-bg); --scroll-btn-icon: var(--dm-scroll-btn-icon); --scroll-btn-hover-bg: var(--dm-scroll-btn-hover-bg); --date-separator-bg: var(--dm-date-separator-bg); --date-separator-text: var(--dm-date-separator-text); --focus-outline-color: var(--dm-focus-outline);
             --select-bg: rgba(255, 255, 255, 0.08); --select-border: rgba(255, 255, 255, 0.15); --select-text: var(--dm-header-text); --select-arrow: var(--dm-header-icon-fill); --stop-button-fill: var(--dm-msg-action-icon-fill); --stop-button-hover-fill: var(--dm-msg-action-icon-hover-fill);
        }

        /* --- Base & Layout --- */
        html, body { height: 100%; margin: 0; padding: 0; overflow: hidden; }
        body { font-family: var(--font-main); background-color: var(--bg-default); color: var(--msg-text); display: flex; flex-direction: column; transition: background-color var(--transition-medium), color var(--transition-medium); font-size: 14.5px; }
        * { box-sizing: border-box; scroll-behavior: smooth; /* Base smooth scroll */ }
        #chat-container { width: 100%; max-width: 950px; /* Even wider */ height: calc(100vh - 20px); margin: 10px auto; background-color: var(--chat-bg); display: flex; flex-direction: column; overflow: hidden; position: relative; transition: background-color var(--transition-medium), box-shadow var(--transition-medium); box-shadow: var(--shadow-medium); border-radius: var(--border-radius-medium); }

        /* Compact Mode */
        body.compact-mode { font-size: 13.5px; }
        body.compact-mode #chat-container { max-width: 1100px; }
        body.compact-mode .message { padding: 6px 12px; line-height: 1.45; }
        body.compact-mode .message-wrapper { --message-spacing: 6px; --message-spacing-grouped: 2px; }
        body.compact-mode .avatar-placeholder { --avatar-size: 26px; }
        body.compact-mode #chat-input-area { padding: 8px 12px; --input-area-min-height: 56px; }
        body.compact-mode #user-input { padding: 9px 15px; min-height: 38px; }
        body.compact-mode #send-button { width: 38px; height: 38px; }
        body.compact-mode #send-button::before { width: 20px; height: 20px; }
        body.compact-mode #pinned-message { height: 35px; font-size: 12px; }
        body.compact-mode #reply-preview { height: 45px; font-size: 12px; }
        body.compact-mode #input-toolbar { height: 30px; }

        /* Rounded Mode */
        body.rounded-mode { --border-radius-medium: 16px; --border-radius-large: 24px; }
        body.rounded-mode .avatar-placeholder { border-radius: 40%; } /* Squircle */
        body.rounded-mode #user-input { border-radius: 22px; }
        body.rounded-mode #send-button { border-radius: 22px; }
        body.rounded-mode .date-separator { border-radius: 20px; }
        body.rounded-mode #pinned-message { border-radius: var(--border-radius-medium); margin: 5px; height: calc(var(--pinned-message-height) - 10px);}
        body.rounded-mode #reply-preview { border-top-left-radius: var(--border-radius-medium); border-top-right-radius: var(--border-radius-medium); }
        body.rounded-mode .modal-content { border-radius: var(--border-radius-large); }


        /* --- Header --- */
        #chat-header {
            display: flex; /* Ensure flex for centering */
            align-items: center; /* Vertical centering */
            height: var(--header-height);
            padding: 0 16px; /* Adjusted padding */
            background-color: var(--header-bg);
            background-image: var(--header-bg-image);
            color: var(--header-text);
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
            z-index: 10;
            position: relative;
            flex-shrink: 0;
            border-top-left-radius: var(--border-radius-medium); border-top-right-radius: var(--border-radius-medium);
             transition: background-color var(--transition-medium), color var(--transition-medium), background-image var(--transition-medium), opacity var(--transition-fast);
        }
        #chat-header.model-changing { opacity: 0.8; }
        #chat-header h1 { margin: 0; font-size: 18px; font-weight: 600; flex-grow: 1; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; cursor: pointer; }
        #chat-header h1:hover { opacity: 0.8; }
        #chat-header h1:focus { outline: 1px dashed var(--header-text); } /* Focus style for editing */
        .header-controls { display: flex; align-items: center; gap: 6px; }
        .icon-button { background: none; border: none; padding: 8px; cursor: pointer; border-radius: var(--border-radius-round); display: flex; align-items: center; justify-content: center; transition: background-color var(--transition-fast), transform var(--transition-fast); color: var(--header-icon-fill); } /* Set color */
        .icon-button:hover { background-color: var(--icon-button-hover-bg); transform: scale(1.05); }
        .icon-button:active { transform: scale(0.92); }
        .icon-button svg, .icon-button i { width: 22px; height: 22px; fill: var(--header-icon-fill); font-size: 20px; /* For FontAwesome */ }
        #model-select { background-color: var(--select-bg); color: var(--select-text); border: 1px solid var(--select-border); border-radius: var(--border-radius-large); padding: 6px 28px 6px 12px; font-size: 13px; cursor: pointer; outline: none; -webkit-appearance: none; -moz-appearance: none; appearance: none; background-image: url('data:image/svg+xml;utf8,<svg fill="%23ffffff" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M7 10l5 5 5-5z"/><path d="M0 0h24v24H0z" fill="none"/></svg>'); background-repeat: no-repeat; background-position: right 8px center; background-size: 18px; transition: background-color var(--transition-fast), border-color var(--transition-fast), background-image var(--transition-medium); }
        #model-select:hover { background-color: color-mix(in srgb, var(--select-bg) 80%, #000000 20%); }
        #model-select option { background-color: var(--chat-bg); color: var(--msg-text); }
        body.dark-mode #model-select option { background-color: var(--input-bg); color: var(--msg-text); }

        /* NEW: Search Bar in Header */
        .header-search-container { display: none; align-items: center; background-color: var(--chat-bg); padding: 5px 10px; position: absolute; top: 0; left: 0; right: 0; height: 100%; z-index: 11; animation: slideDownFadeIn 0.3s ease forwards; }
        .header-search-container.active { display: flex; }
        @keyframes slideDownFadeIn { from { opacity: 0; transform: translateY(-100%); } to { opacity: 1; transform: translateY(0); } }
        #chat-search-input { flex-grow: 1; padding: 8px 12px; border: 1px solid var(--border-color); border-radius: var(--border-radius-large); background-color: var(--input-bg); color: var(--input-text); outline: none; font-size: 14px; }
        #search-results-count { font-size: 12px; color: var(--timestamp-color); margin: 0 8px; white-space: nowrap; }
        #search-prev-button, #search-next-button, #search-close-button { padding: 6px; color: var(--msg-action-icon-fill); } /* Use message action color */
        #search-prev-button:hover, #search-next-button:hover, #search-close-button:hover { background-color: var(--icon-button-hover-bg); color: var(--msg-action-icon-hover-fill); }

        /* --- Pinned Message Area --- */
        #pinned-message {
            display: none; flex-shrink: 0; height: var(--pinned-message-height);
            background-color: var(--pinned-bg); border-bottom: 1px solid var(--pinned-border);
            padding: 0 16px; align-items: center; font-size: 13px;
            color: var(--msg-text); cursor: pointer; overflow: hidden;
            position: relative;
            transition: background-color var(--transition-medium), border-color var(--transition-medium), color var(--transition-medium), height var(--transition-fast);
        }
        #pinned-message.visible { display: flex; }
        #pinned-message:hover { background-color: color-mix(in srgb, var(--pinned-bg) 90%, var(--border-color)); }
        #pinned-message .pinned-icon { margin-left: 8px; font-size: 14px; color: var(--timestamp-color); flex-shrink: 0; }
        #pinned-message .pinned-text { white-space: nowrap; overflow: hidden; text-overflow: ellipsis; flex-grow: 1; }
        #unpin-button { position: absolute; left: 8px; top: 50%; transform: translateY(-50%); background: none; border: none; padding: 5px; cursor: pointer; border-radius: 50%; line-height: 0; display: flex; align-items: center; justify-content: center;}
        #unpin-button:hover { background-color: rgba(0,0,0,0.1); }
        #unpin-button svg, #unpin-button i { width: 16px; height: 16px; fill: var(--timestamp-color); color: var(--timestamp-color); }


        /* --- Chat Output --- */
        #chat-output {
            flex-grow: 1; /* Takes remaining space */
            padding: 15px 15px 5px 15px; overflow-y: auto;
            display: flex; flex-direction: column; position: relative;
            background-color: transparent; /* Base transparent */
             /* Height calculation is handled by flex-grow */
         }
         /* Background images remain same */
         body:not(.dark-mode) #chat-output { background-image: url('https://user-images.githubusercontent.com/15075759/28719144-86dc0f70-73b1-11e7-911d-60d70fcded21.png'); background-repeat: repeat; }
         body.dark-mode #chat-output { background-color: var(--chat-bg); }
         /* Scrollbar styles remain same */
        #chat-output::-webkit-scrollbar { width: 8px; }
        #chat-output::-webkit-scrollbar-track { background: var(--scrollbar-track); border-radius: 4px; }
        #chat-output::-webkit-scrollbar-thumb { background: var(--scrollbar-thumb); border-radius: 4px; border: 1px solid var(--scrollbar-track); }
        #chat-output::-webkit-scrollbar-thumb:hover { background: color-mix(in srgb, var(--scrollbar-thumb) 70%, #000000); }
        #chat-output { scrollbar-width: thin; scrollbar-color: var(--scrollbar-thumb) var(--scrollbar-track); }

        /* --- Scroll Buttons --- */
        #scroll-to-bottom, #scroll-to-top {
            position: absolute; left: 20px;
            background-color: var(--scroll-btn-bg); backdrop-filter: blur(5px);
            border: 1px solid color-mix(in srgb, var(--border-color) 50%, transparent);
            border-radius: var(--border-radius-round); width: 38px; height: 38px;
            padding: 0; cursor: pointer; display: none; align-items: center; justify-content: center;
            box-shadow: var(--shadow-medium); opacity: 0;
            transition: opacity var(--transition-medium), transform var(--transition-medium), background-color var(--transition-fast);
            z-index: 20; color: var(--scroll-btn-icon); /* Color for FontAwesome */
        }
        #scroll-to-bottom { bottom: 75px; transform: translateY(10px); }
        #scroll-to-top { top: 70px; transform: translateY(-10px); } /* Position top */
        #scroll-to-bottom.visible, #scroll-to-top.visible { display: flex; opacity: 0.85; transform: translateY(0); }
        #scroll-to-bottom:hover, #scroll-to-top:hover { opacity: 1; background-color: var(--scroll-btn-hover-bg); transform: scale(1.05) translateY(0); }
        #scroll-to-bottom svg, #scroll-to-top svg, #scroll-to-bottom i, #scroll-to-top i { width: 22px; height: 22px; fill: var(--scroll-btn-icon); font-size: 18px; }

        /* Date Separator Styles remain same */
        .date-separator { align-self: center; background-color: var(--date-separator-bg); color: var(--date-separator-text); padding: 3px 12px; border-radius: var(--border-radius-large); font-size: 11px; font-weight: 500; margin: 15px 0 10px 0; text-transform: uppercase; letter-spacing: 0.5px; box-shadow: var(--shadow-light); opacity: 0; animation: fadeIn 0.5s ease forwards; }
         @keyframes fadeIn { to { opacity: 1; } }

        /* --- Messages --- */
        /* Wrapper, Avatar, Base Message styles remain largely same */
        .message-wrapper { display: flex; margin-bottom: var(--message-spacing); opacity: 0; animation: fadeInSlideUp 0.5s cubic-bezier(0.25, 0.8, 0.25, 1) forwards; align-items: flex-end; position: relative; /* For context menu */ }
        .message-wrapper.grouped { margin-bottom: var(--message-spacing-grouped); }
        .avatar-placeholder { width: var(--avatar-size); height: var(--avatar-size); border-radius: var(--border-radius-avatar); background-color: gray; flex-shrink: 0; margin-left: var(--message-horizontal-gap); box-shadow: var(--shadow-light); background-size: cover; background-position: center; }
        .user-message-wrapper .avatar-placeholder { background-color: var(--avatar-user-bg); margin-left: 0; margin-right: var(--message-horizontal-gap); }
        .ai-message-wrapper .avatar-placeholder { background-color: var(--avatar-ai-bg); }
        .user-message-wrapper .avatar-placeholder::before { content: '👤'; display: flex; align-items: center; justify-content: center; height: 100%; font-size: calc(var(--avatar-size) * 0.6); color: rgba(0,0,0,0.6); }
        .ai-message-wrapper .avatar-placeholder::before { content: '🤖'; display: flex; align-items: center; justify-content: center; height: 100%; font-size: calc(var(--avatar-size) * 0.6); color: rgba(255,255,255,0.7); }
        body.dark-mode .user-message-wrapper .avatar-placeholder::before { color: rgba(255,255,255,0.7); }
        body.dark-mode .ai-message-wrapper .avatar-placeholder::before { color: rgba(255,255,255,0.7); }
        .user-message-wrapper { flex-direction: row-reverse; }
        .ai-message-wrapper { flex-direction: row; }
        .message { max-width: calc(78% - var(--avatar-size) - var(--message-horizontal-gap)); padding: 9px 15px; border-radius: var(--border-radius-large); word-wrap: break-word; line-height: 1.55; font-size: 14.8px; color: var(--msg-text); box-shadow: var(--shadow-light); transition: background-color var(--transition-medium), color var(--transition-medium), box-shadow var(--transition-medium); position: relative; outline: none; /* For tabindex focus */ }
        .message:focus-visible { box-shadow: 0 0 0 2px var(--focus-outline-color); /* Focus indicator */ }
        .user-message { background-color: var(--user-msg-bg); margin-left: auto; border-bottom-left-radius: var(--border-radius-medium); }
        .ai-message { background-color: var(--ai-msg-bg); margin-right: auto; border: 1px solid var(--border-color); border-bottom-right-radius: var(--border-radius-medium); box-shadow: none; }
        .message-wrapper.grouped .message { border-bottom-left-radius: var(--border-radius-large); border-bottom-right-radius: var(--border-radius-large); }
        @keyframes fadeInSlideUp { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }

        /* Typing cursor style remains same */
        .ai-message.typing-cursor .message-content::after { content: '▍'; display: inline-block; animation: blink-cursor 0.8s infinite; margin-right: 3px; color: var(--timestamp-color); }
         @keyframes blink-cursor { 50% { opacity: 0; } }

        /* Content Styling (Markdown, Code, etc.) */
        .message-content { padding-bottom: 2px; min-height: 1.55em; }
        .message-content strong { font-weight: 600; }
        .message-content em { font-style: italic; }
        .message-content ul, .message-content ol { padding-right: 25px; margin: 8px 0; }
        .message-content li { margin-bottom: 4px; }
        .message-content a { color: var(--link-color); text-decoration: underline; text-underline-offset: 3px; }
        .message-content a:hover { text-decoration: none; opacity: 0.8; }
        .message-content a[target="_blank"]::after { /* External link icon */ content: ' \f08e'; font-family: 'Font Awesome 6 Free'; font-weight: 900; font-size: 0.8em; margin-left: 3px; opacity: 0.7; }
        .message-content code:not(pre > code) { background-color: color-mix(in srgb, var(--code-bg) 80%, var(--chat-bg)); color: var(--code-text); padding: 0.2em 0.5em; margin: 0 0.1em; font-size: 88%; border-radius: var(--border-radius-small); font-family: var(--font-code); direction: ltr; text-align: left; border: 1px solid var(--code-border); }
        .message-content pre { background-color: var(--code-bg); color: var(--code-text); padding: 12px 16px; border-radius: var(--border-radius-medium); overflow-x: auto; font-family: var(--font-code); font-size: 13.5px; margin: 10px 0; direction: ltr; text-align: left; white-space: pre; border: 1px solid var(--code-border); position: relative; }
        /* Highlight.js styles applied by library */
        .message-content pre .copy-code-button { position: absolute; top: 8px; right: 8px; background-color: var(--code-copy-btn-bg); color: var(--code-text); border: none; border-radius: var(--border-radius-small); padding: 4px 8px; font-size: 11px; font-family: var(--font-main); cursor: pointer; opacity: 0; transition: opacity var(--transition-fast), background-color var(--transition-fast); z-index: 2; backdrop-filter: blur(2px); }
        .message-content pre:hover .copy-code-button { opacity: 0.8; }
        .message-content pre .copy-code-button:hover { opacity: 1; background-color: var(--code-copy-btn-hover-bg); }
        .message-content pre .copy-code-button.copied { background-color: var(--code-copy-btn-copied-bg); color: var(--code-copy-btn-copied-text); opacity: 1; }
        .message-content img { max-width: 100%; height: auto; border-radius: var(--border-radius-medium); margin-top: 5px; cursor: pointer; }
        /* Table styling */
        .message-content table { width: 100%; border-collapse: collapse; margin: 10px 0; direction: rtl; text-align: right; }
        .message-content th, .message-content td { border: 1px solid var(--border-color); padding: 6px 10px; }
        .message-content th { background-color: var(--input-area-bg); font-weight: 600; }
        /* KaTeX Math Styling */
        .katex-display { overflow-x: auto; overflow-y: hidden; padding: 5px 0; } /* Allow horizontal scroll for wide equations */

        /* Search Highlight */
        .message.highlighted { /* Style when scrolled to via search */ box-shadow: 0 0 0 3px var(--accent-color); transition: box-shadow 0.5s ease; }
        mark.search-highlight { /* Style for the specific term */ background-color: var(--search-highlight-bg); color: inherit; padding: 0.1em 0; border-radius: var(--border-radius-small); box-shadow: 0 0 0 1px var(--search-highlight-bg); }

        /* Error Message Style */
        .message.error-message { background-color: var(--error-msg-bg); border: 1px solid var(--error-msg-border); color: var(--error-msg-text); }
        .message.error-message .model-indicator { color: var(--error-msg-text) !important; opacity: 0.8; }

        /* Reply Context Style */
        .reply-context {
            background-color: var(--reply-context-bg);
            padding: 5px 10px; margin: -5px -10px 8px -10px; /* Extend slightly into padding */
            border-radius: var(--border-radius-medium) var(--border-radius-medium) 0 0;
            border-bottom: 1px dashed color-mix(in srgb, var(--border-color) 50%, transparent);
            font-size: 0.9em; opacity: 0.85; cursor: pointer;
            display: flex; align-items: center; gap: 5px;
            overflow: hidden; white-space: nowrap; text-overflow: ellipsis;
        }
        .reply-context i { font-size: 0.9em; }
        .reply-context strong { margin-left: 3px; }
        .reply-context:hover { opacity: 1; }


        /* Message Footer */
        .message-footer { display: flex; align-items: center; font-size: 11.5px; margin-top: 6px; gap: 8px; transition: color var(--transition-medium); flex-wrap: wrap; opacity: 0.85; justify-content: flex-end; /* Default align end */ }
        .ai-message .message-footer { justify-content: flex-start; /* AI aligns start */}
        .model-indicator { color: var(--model-indicator-color); white-space: nowrap; font-weight: 500; margin-right: auto; /* Push left for AI */ }
        .user-message .model-indicator { display: none; }
        .timestamp { color: var(--timestamp-color); white-space: nowrap; }
        /* Read receipts (Visual Only) */
        .message-footer .read-receipts { margin-left: 5px; font-size: 14px; color: var(--timestamp-color); line-height: 1; order: 1; /* Ensure it's at the very end */ }
        .message-footer .read-receipts.sent::before { content: '✓'; }
        .message-footer .read-receipts.delivered::before { content: '✓✓'; }
        .message-footer .read-receipts.read::before { content: '✓✓'; color: #4fc3f7; }
        .ai-message .message-footer .read-receipts { display: none; }

        /* Message Actions */
        .message-actions { position: absolute; top: -12px; display: flex; gap: 5px; opacity: 0; transition: opacity var(--transition-fast), transform var(--transition-fast); background-color: color-mix(in srgb, var(--chat-bg) 90%, transparent); backdrop-filter: blur(4px); border-radius: var(--border-radius-large); padding: 4px 6px; z-index: 1; pointer-events: none; box-shadow: var(--shadow-medium); }
        .user-message-wrapper .message-actions { left: -10px; transform: translateX(-100%) translateY(0) scale(0.9); }
        .ai-message-wrapper .message-actions { right: -10px; transform: translateX(100%) translateY(0) scale(0.9); }
        .message-wrapper:hover .message-actions, .message:focus-within ~ .message-actions /* Show on focus - Might need JS */ { opacity: 1; transform: translateX(0) translateY(0) scale(1); pointer-events: auto; }
        .msg-action-button { background: none; border: none; padding: 5px; cursor: pointer; border-radius: var(--border-radius-round); display: flex; align-items: center; justify-content: center; transition: background-color var(--transition-fast), transform var(--transition-fast), color var(--transition-fast); color: var(--msg-action-icon-fill); position: relative; /* For spinner */ }
        .msg-action-button i { font-size: 16px; line-height: 1; } /* Icon size */
        .msg-action-button:hover { background-color: var(--msg-action-icon-hover-bg); transform: scale(1.1); color: var(--msg-action-icon-hover-fill); }
        .msg-action-button:active { transform: scale(0.95); }
        .msg-action-button.copied { animation: copied-feedback 0.6s ease-out; }
        .msg-action-button.copied i::before { content: "\f00c"; /* Checkmark icon */ font-family: 'Font Awesome 6 Free'; font-weight: 900; } /* Show check on copy */
        @keyframes copied-feedback { 0% { transform: scale(1.1); } 50% { transform: scale(1.3); background-color: var(--button-bg); } 100% { transform: scale(1.1); background-color: transparent;} }
        .msg-action-button.active { background-color: var(--msg-action-icon-hover-bg); color: var(--accent-color); } /* Style for active pin/star */
        /* Tooltip styles remain same */
        .msg-action-button[title]::after { content: attr(title); position: absolute; bottom: 120%; left: 50%; transform: translateX(-50%); background-color: var(--tooltip-bg); color: var(--tooltip-text); padding: 4px 8px; border-radius: var(--border-radius-small); font-size: 11px; white-space: nowrap; z-index: 10; pointer-events: none; opacity: 0; transition: opacity var(--transition-fast); box-shadow: var(--shadow-light); }
        .msg-action-button[title]:hover::after { opacity: 1; transition-delay: 0.5s; /* Delay showing tooltip */ }
        /* Action Spinner */
        .action-spinner {
            display: none; /* Hidden by default */
            width: 12px; height: 12px; border-radius: 50%; margin: 0 2px;
            border: 2px solid var(--action-spinner-color); border-top-color: transparent;
            animation: cool-spinner 0.6s linear infinite;
        }
        .msg-action-button:disabled .action-spinner { display: inline-block; }
        .msg-action-button:disabled i { display: none; } /* Hide icon when spinner shows */
        @keyframes cool-spinner { to { transform: rotate(360deg); } }


        /* Collapsible Code Block */
        .message-content pre.collapsible { max-height: 200px; overflow: hidden; position: relative; transition: max-height var(--transition-medium); padding-bottom: 30px; /* Space for button */ }
        .message-content pre.collapsible::after { content: ''; position: absolute; bottom: 0; left: 0; right: 0; height: 50px; background: linear-gradient(to bottom, transparent, var(--code-bg)); pointer-events: none; transition: opacity 0.2s ease; }
        .message-content pre.collapsible.expanded { max-height: 1000px; padding-bottom: 12px; }
        .message-content pre.collapsible.expanded::after { opacity: 0; }
        .expand-code-button { position: absolute; bottom: 5px; left: 50%; transform: translateX(-50%); background-color: var(--code-copy-btn-hover-bg); color: var(--code-text); border: none; border-radius: var(--border-radius-small); padding: 3px 8px; font-size: 10px; cursor: pointer; z-index: 3; opacity: 0.7; transition: opacity var(--transition-fast), background-color var(--transition-fast); }
         .expand-code-button:hover { opacity: 1; }
        .message-content pre.collapsible.expanded .expand-code-button { display: none; } /* Hide when expanded */


        /* --- Input Area --- */
        /* Reply Preview */
        #reply-preview {
            display: none; height: var(--reply-preview-height);
            background-color: var(--reply-bg); padding: 8px 14px;
            border-top: 1px solid var(--border-color); flex-shrink: 0;
            align-items: center; font-size: 13px; color: var(--msg-text);
            position: relative; overflow: hidden;
            transition: height var(--transition-fast), padding var(--transition-fast), opacity var(--transition-fast);
             border-top-left-radius: var(--border-radius-medium); border-top-right-radius: var(--border-radius-medium); /* Rounded top */
        }
        #reply-preview.visible { display: flex; }
        #reply-preview .reply-icon { margin-left: 8px; color: var(--accent-color); flex-shrink: 0;}
        #reply-preview .reply-content-wrapper { flex-grow: 1; overflow: hidden; display: flex; flex-direction: column; }
        #reply-preview .reply-sender { font-weight: 600; font-size: 0.95em; }
        #reply-preview .reply-text { white-space: nowrap; overflow: hidden; text-overflow: ellipsis; opacity: 0.8; }
        #cancel-reply-button { position: absolute; left: 8px; top: 50%; transform: translateY(-50%); background: none; border: none; padding: 5px; cursor: pointer; border-radius: 50%; line-height: 0; display: flex; align-items: center; justify-content: center;}
        #cancel-reply-button:hover { background-color: rgba(0,0,0,0.1); }
        #cancel-reply-button i { width: 16px; height: 16px; color: var(--timestamp-color); }

        /* Input Toolbar */
        #input-toolbar {
            display: flex;
            height: 0; overflow: hidden;
            opacity: 0; visibility: hidden; /* Use visibility for transition */
            background-color: var(--toolbar-bg); padding: 0 10px;
            border-top: 1px solid var(--border-color); flex-shrink: 0;
            align-items: center; gap: 5px;
            transition: height var(--transition-fast), opacity var(--transition-fast) 0.05s, padding var(--transition-fast), visibility 0s var(--transition-fast); /* Delay hiding */
        }
        #input-toolbar.visible {
            height: var(--toolbar-height);
            opacity: 1;
            padding: 0 10px;
            visibility: visible;
            transition-delay: 0s; /* Show immediately */
         }
        .toolbar-button { background: none; border: none; padding: 6px; cursor: pointer; border-radius: var(--border-radius-small); color: var(--msg-action-icon-fill); display: flex; align-items: center; justify-content: center; }
        .toolbar-button:hover { background-color: var(--toolbar-button-hover); color: var(--msg-action-icon-hover-fill); }
        .toolbar-button i { font-size: 16px; line-height: 1; }

        /* Main Input Area */
        #chat-input-area { display: flex; flex-direction: column; background-color: var(--input-area-bg); flex-shrink: 0; transition: background-color var(--transition-medium), border-color var(--transition-medium); border-bottom-left-radius: var(--border-radius-medium); border-bottom-right-radius: var(--border-radius-medium); border-top: 1px solid var(--border-color); /* Add top border here */ }
        #chat-input-area::before { display: none; }

        .input-main-row { display: flex; align-items: flex-end; gap: 10px; width: 100%; padding: 10px 14px; /* Standard padding here */ }

        /* Prefix Buttons */
        .input-prefix-buttons { display: flex; align-items: center; gap: 5px; align-self: flex-end; margin-bottom: 5px; }
        .input-prefix-buttons .icon-button { padding: 6px; color: var(--timestamp-color); }
        .input-prefix-buttons .icon-button:hover { color: var(--msg-action-icon-hover-fill); background-color: var(--icon-button-hover-bg); }
        .input-prefix-buttons .icon-button i { font-size: 20px; }

        #user-input {
            flex-grow: 1; padding: 11px 18px; border: 1px solid var(--input-border); border-radius: var(--border-radius-large); font-size: 15px; background-color: var(--input-bg); color: var(--input-text); outline: none;
            transition: background-color var(--transition-medium), color var(--transition-medium), box-shadow var(--transition-fast), height 0.1s ease-out, /* Faster height transition */ border-color var(--transition-fast), opacity var(--transition-medium);
            resize: none; overflow-y: hidden; min-height: 44px; max-height: 180px; /* Increased max height */ line-height: 1.45; box-sizing: border-box; box-shadow: 0 1px 1px rgba(0,0,0,0.04) inset;
        }
         #user-input:focus { border-color: var(--input-border-focus); box-shadow: 0 0 0 2px color-mix(in srgb, var(--button-bg) 20%, transparent), 0 1px 1px rgba(0,0,0,0.04) inset; }
         #user-input::placeholder { transition: opacity var(--transition-fast); }
         #user-input:focus::placeholder { opacity: 0.5; }

        /* Char Counter */
        #char-counter { font-size: 11px; color: var(--timestamp-color); text-align: left; padding: 0 19px 5px 0; /* Align near send button */ height: 15px; transition: color 0.2s; }
        #char-counter.limit-exceeded { color: red; font-weight: bold; }

        #send-button {
            width: 44px; height: 44px; padding: 0; background-color: var(--button-bg); border: none; border-radius: var(--border-radius-round); cursor: pointer; font-size: 0; display: flex; justify-content: center; align-items: center;
            transition: background-color var(--transition-fast), transform var(--transition-medium), opacity var(--transition-medium), box-shadow var(--transition-fast); /* Smoother transform/opacity */
            flex-shrink: 0; align-self: flex-end; box-shadow: var(--shadow-light);
            opacity: 0.5;
            transform: scale(0.95);
         }
         #send-button:not(:disabled) {
             opacity: 1;
             transform: scale(1);
         }
         #send-button:not(:disabled):hover { background-color: var(--button-hover-bg); transform: scale(1.05); box-shadow: var(--shadow-medium); }
         #send-button:not(:disabled):active { background-color: var(--button-active-bg); transform: scale(0.95); box-shadow: none; }
         #send-button::before { content: ''; display: block; width: 22px; height: 22px; background-color: var(--button-icon-fill); mask-image: url('data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"%3E%3Cpath d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"/%3E%3C/svg%3E'); mask-size: contain; mask-repeat: no-repeat; mask-position: center; -webkit-mask-image: url('data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"%3E%3Cpath d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"/%3E%3C/svg%3E'); -webkit-mask-size: contain; -webkit-mask-repeat: no-repeat; -webkit-mask-position: center; transition: background-color var(--transition-medium); }
         #send-button:disabled { cursor: not-allowed; background-color: color-mix(in srgb, var(--button-bg) 40%, var(--input-area-bg)); box-shadow: none; opacity: 0.4; transform: scale(0.95); }

         /* Animation for send icon */
        #send-button.sending::before { animation: pulse-send-icon 0.5s ease-out; }
        @keyframes pulse-send-icon { 0% { transform: scale(1); } 50% { transform: scale(1.2) rotate(10deg); } 100% { transform: scale(1); } }


        /* --- Modals (Settings, Confirmation, Lightbox) --- */
        /* Base Modal styles remain same */
        .modal-overlay { position: fixed; top: 0; left: 0; right: 0; bottom: 0; background-color: rgba(0, 0, 0, 0.6); backdrop-filter: blur(5px); z-index: 100; display: none; align-items: center; justify-content: center; opacity: 0; transition: opacity var(--transition-medium); }
        .modal-overlay.visible { display: flex; opacity: 1; }
        .modal-content { background-color: var(--modal-bg); color: var(--msg-text); padding: 25px 30px; border-radius: var(--border-radius-medium); box-shadow: var(--modal-shadow); max-width: 500px; width: 90%; max-height: 80vh; overflow-y: auto; position: relative; transform: scale(0.95); transition: transform var(--transition-medium); }
        .modal-overlay.visible .modal-content { transform: scale(1); }
        .modal-content h2 { margin-top: 0; margin-bottom: 20px; font-size: 1.3em; color: var(--msg-text); }
        .modal-close-button { position: absolute; top: 10px; left: 10px; background: none; border: none; font-size: 24px; color: var(--timestamp-color); cursor: pointer; padding: 5px; line-height: 1; border-radius: 50%; }
        .modal-close-button:hover { background-color: var(--icon-button-hover-bg); color: var(--msg-action-icon-hover-fill); }
        .modal-actions { margin-top: 25px; display: flex; justify-content: flex-end; gap: 10px; }
        .modal-button { padding: 8px 16px; border-radius: var(--border-radius-medium); cursor: pointer; font-weight: 500; transition: background-color var(--transition-fast), color var(--transition-fast); border: 1px solid transparent; /* Base border */ }
        .modal-button.primary { background-color: var(--button-bg); color: var(--button-icon-fill); border-color: var(--button-bg); }
        .modal-button.primary:hover { background-color: var(--button-hover-bg); border-color: var(--button-hover-bg); }
        .modal-button.secondary { background-color: transparent; color: var(--button-bg); border: 1px solid var(--button-bg); }
        .modal-button.secondary:hover { background-color: color-mix(in srgb, var(--button-bg) 10%, transparent); }
        .modal-button.danger { background-color: #dc3545; color: white; border-color: #dc3545; }
        .modal-button.danger:hover { background-color: #c82333; border-color: #c82333; }
        /* Settings Modal Specifics */
        .settings-section { margin-bottom: 20px; }
        .settings-section label { display: block; margin-bottom: 8px; font-weight: 500; font-size: 0.95em; }
        .settings-section select, .settings-section input, .settings-section textarea { width: 100%; padding: 8px 10px; border: 1px solid var(--input-border); border-radius: var(--border-radius-medium); background-color: var(--input-bg); color: var(--input-text); font-size: 1em; margin-bottom: 5px; }
        .settings-section input[type="range"] { padding: 0; }
        .settings-section input[type="color"] { padding: 2px; height: 38px; /* Align height */ }
        .settings-section .range-value { font-size: 0.9em; color: var(--timestamp-color); margin-left: 10px; }
        .settings-section textarea { min-height: 80px; resize: vertical; }
        .setting-toggle { display: flex; align-items: center; justify-content: space-between; margin-bottom: 10px; }
        /* Basic Toggle Switch Style */
        .toggle-switch { appearance: none; width: 40px; height: 20px; background-color: var(--input-border); border-radius: 10px; position: relative; cursor: pointer; transition: background-color 0.2s ease; }
        .toggle-switch::before { content: ''; position: absolute; width: 16px; height: 16px; border-radius: 50%; background-color: white; top: 2px; right: 2px; transition: transform 0.2s ease; }
        .toggle-switch:checked { background-color: var(--accent-color); }
        .toggle-switch:checked::before { transform: translateX(-20px); }

        /* Image Lightbox Styles remain same */
        #image-lightbox .modal-content { background:none; box-shadow:none; padding:10px; max-width: 90vw; max-height: 90vh; }
        #lightbox-image { max-width:100%; max-height:100%; object-fit: contain; display:block; }

        /* --- Skeleton Loaders --- */
        .skeleton {
             background-color: var(--skeleton-bg);
             border-radius: var(--border-radius-medium);
             animation: pulse-skeleton 1.5s infinite ease-in-out;
         }
         @keyframes pulse-skeleton { 0%, 100% { opacity: 1; } 50% { opacity: 0.6; } }
         .message-wrapper.skeleton-loading .avatar-placeholder { background-color: var(--skeleton-bg); animation: pulse-skeleton 1.5s infinite ease-in-out; }
         .message-wrapper.skeleton-loading .message { background-color: transparent !important; box-shadow: none; border: none; pointer-events: none; }
        .message-wrapper.skeleton-loading .message-content { min-height: 3em; background-color: var(--skeleton-bg); border-radius: var(--border-radius-medium); animation: pulse-skeleton 1.5s infinite ease-in-out; }
        .message-wrapper.skeleton-loading .message-footer,
        .message-wrapper.skeleton-loading .message-actions,
        .message-wrapper.skeleton-loading .reply-context { display: none; }

        /* Reduce motion preference */
        @media (prefers-reduced-motion: reduce) {
          * {
            animation-duration: 0.01ms !important;
            animation-iteration-count: 1 !important;
            transition-duration: 0.01ms !important;
            scroll-behavior: auto !important;
          }
          #send-button.sending::before { animation: none; }
        }

    </style>
</head>
<body > <!-- Add classes dynamically: compact-mode, rounded-mode -->

<div id="chat-container">
    <div id="chat-header">
        <!-- Search container -->
        <div class="header-search-container" id="header-search-area">
             <input type="text" id="chat-search-input" placeholder="חפש בהודעות...">
             <span id="search-results-count">0/0</span>
             <button class="icon-button" id="search-prev-button" title="התוצאה הקודמת" aria-label="התוצאה הקודמת"><i class="fas fa-chevron-up"></i></button>
             <button class="icon-button" id="search-next-button" title="התוצאה הבאה" aria-label="התוצאה הבאה"><i class="fas fa-chevron-down"></i></button>
             <button class="icon-button" id="search-close-button" title="סגור חיפוש" aria-label="סגור חיפוש"><i class="fas fa-times"></i></button>
        </div>
        <!-- Original Header Content -->
        <h1 id="chat-title" title="לחץ לעריכת שם השיחה">צ'אט AI אולטימטיבי</h1>
        <div class="header-controls">
            <button class="icon-button" id="search-open-button" title="חפש בשיחה" aria-label="חפש בשיחה"><i class="fas fa-search"></i></button>
            <select id="model-select" aria-label="בחר מודל AI">
                 <option value="main-ai.php">Gemini 1.5 Flash</option>
                 <option value="gemini25.php">Gemini 1.5 Pro</option>
            </select>
            <button class="icon-button" id="settings-button" title="הגדרות" aria-label="הגדרות"><i class="fas fa-cog"></i></button>
            <button class="icon-button" id="dark-mode-toggle" title="שנה ערכת נושא" aria-label="שנה ערכת נושא">
                <svg id="theme-icon-light" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2zm0 18v-8a2 2 0 0 0-2-2H4.08A8 8 0 0 1 12 4v8a2 2 0 0 0 2 2h5.92A8 8 0 0 1 12 20z"/></svg>
                <svg id="sun-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="display: none;"><path d="M12 7c-2.76 0-5 2.24-5 5s2.24 5 5 5 5-2.24 5-5-2.24-5-5-5zM2 13h2c.55 0 1-.45 1-1s-.45-1-1-1H2c-.55 0-1 .45-1 1s.45 1 1 1zm18 0h2c.55 0 1-.45 1-1s-.45-1-1-1h-2c-.55 0-1 .45-1 1s.45 1 1 1zM11 2v2c0 .55.45 1 1 1s1-.45 1-1V2c0-.55-.45-1-1-1s-1 .45-1 1zm0 18v2c0 .55.45 1 1 1s1-.45 1-1v-2c0-.55-.45-1-1-1s-1 .45-1 1zM5.64 5.64c-.39-.39-1.02-.39-1.41 0-.39.39-.39 1.02 0 1.41l1.41 1.41c.39.39 1.02.39 1.41 0 .39-.39.39-1.02 0-1.41L5.64 5.64zm12.73 12.73c-.39-.39-1.02-.39-1.41 0-.39.39-.39 1.02 0 1.41l1.41 1.41c.39.39 1.02.39 1.41 0 .39-.39.39-1.02 0-1.41l-1.41-1.41zM19.78 4.22c.39-.39.39-1.02 0-1.41-.39-.39-1.02-.39-1.41 0l-1.41 1.41c-.39.39-.39 1.02 0 1.41.39.39 1.02.39 1.41 0l1.41-1.41zm-12.73 12.73c.39-.39.39-1.02 0-1.41-.39-.39-1.02-.39-1.41 0l-1.41 1.41c-.39.39-.39 1.02 0 1.41.39.39 1.02.39 1.41 0l1.41-1.41z"/></svg>
            </button>
            <button class="icon-button" id="download-chat" title="הורד צ'אט" aria-label="הורד צ'אט">
                 <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M19 9h-4V3H9v6H5l7 7 7-7zM5 18v2h14v-2H5z"/></svg>
            </button>
            <button class="icon-button" id="clear-chat" title="נקה צ'אט" aria-label="נקה צ'אט">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/></svg>
            </button>
        </div>
    </div>

    <!-- Pinned Message -->
    <div id="pinned-message">
        <i class="fas fa-thumbtack pinned-icon"></i>
        <span class="pinned-text"></span> <!-- Text set by JS -->
        <button id="unpin-button" title="בטל נעיצה" aria-label="בטל נעיצה">
             <i class="fas fa-times"></i> <!-- Use a simple X -->
        </button>
    </div>


    <div id="chat-output" aria-live="polite" role="log">
         <!-- Initial Message -->
         <div class="message-wrapper ai-message-wrapper" data-sender="ai" data-message-id="initial-0">
             <div class="avatar-placeholder"></div>
             <div class="message ai-message" tabindex="0">
                 <div class="message-content"><span>👋 שלום! אני מוכן לעזור. בחר מודל AI והתחל לשוחח. השתמש ב-Shift+Enter לשורה חדשה.</span></div>
                 <div class="message-footer"><span class="timestamp">התחל</span></div>
             </div>
         </div>
         <!-- Messages will be added here -->
         <button id="scroll-to-bottom" title="גלול לתחתית" aria-label="גלול לתחתית"><i class="fas fa-chevron-down"></i></button>
         <button id="scroll-to-top" title="גלול לראש השיחה" aria-label="גלול לראש השיחה" ><i class="fas fa-chevron-up"></i></button>
    </div>

    <div id="chat-input-area">
        <!-- Reply Preview Area -->
        <div id="reply-preview">
             <i class="fas fa-reply reply-icon"></i>
             <div class="reply-content-wrapper">
                 <span class="reply-sender"></span>
                 <span class="reply-text"></span>
             </div>
             <button id="cancel-reply-button" title="בטל תגובה" aria-label="בטל תגובה"><i class="fas fa-times"></i></button>
        </div>

        <!-- Input Toolbar -->
        <div id="input-toolbar">
             <button class="toolbar-button" data-format="bold" title="מודגש (Ctrl+B)"><i class="fas fa-bold"></i></button>
             <button class="toolbar-button" data-format="italic" title="נטוי (Ctrl+I)"><i class="fas fa-italic"></i></button>
             <button class="toolbar-button" data-format="code" title="קוד מוטבע"><i class="fas fa-code"></i></button>
             <button class="toolbar-button" data-format="ul" title="רשימה"><i class="fas fa-list-ul"></i></button>
             <button class="toolbar-button" data-format="link" title="קישור"><i class="fas fa-link"></i></button>
        </div>

        <!-- Main Input Row -->
        <div class="input-main-row">
            <div class="input-prefix-buttons">
                 <button class="icon-button" id="emoji-picker-button" title="בחר אימוג'י (UI)" aria-label="בחר אימוג'י"><i class="far fa-smile"></i></button>
                 <button class="icon-button" id="attachment-button" title="צרף קובץ (UI)" aria-label="צרף קובץ"><i class="fas fa-paperclip"></i></button>
            </div>
            <textarea id="user-input" placeholder="הקלד/י הודעה..." rows="1" aria-label="הודעת משתמש" aria-describedby="char-counter"></textarea>
            <button id="send-button" aria-label="שלח" disabled></button> <!-- Icon set by CSS -->
        </div>
         <!-- Character Counter -->
        <div id="char-counter">0</div>
    </div>
</div>

<!-- Settings Modal -->
<div class="modal-overlay" id="settings-modal">
    <div class="modal-content">
        <button class="modal-close-button" aria-label="סגור הגדרות">&times;</button>
        <h2>הגדרות שיחה</h2>

        <div class="settings-section">
            <label for="system-prompt">הנחיית מערכת (System Prompt)</label>
            <textarea id="system-prompt" rows="3" placeholder="לדוגמה: תמיד תענה בצורה ידידותית ומפורטת."></textarea>
        </div>

        <div class="settings-section">
            <label for="temperature-slider">טמפרטורה (יצירתיות): <span class="range-value" id="temperature-value">0.7</span></label>
            <input type="range" id="temperature-slider" min="0" max="1" step="0.1" value="0.7">
        </div>

         <div class="settings-section">
             <label>מצב תצוגה</label>
             <div class="setting-toggle">
                 <span>מצב קומפקטי</span>
                 <input type="checkbox" id="compact-mode-toggle" class="toggle-switch">
             </div>
             <div class="setting-toggle">
                 <span>פינות מעוגלות</span>
                 <input type="checkbox" id="rounded-mode-toggle" class="toggle-switch">
             </div>
             <div class="setting-toggle">
                <span>צלילי התראות (מושבת)</span>
                <input type="checkbox" id="sound-toggle" disabled class="toggle-switch">
            </div>
         </div>

        <div class="settings-section">
            <label for="accent-color-picker">צבע הדגשה</label>
            <input type="color" id="accent-color-picker" value="#008069">
        </div>

        <div class="modal-actions">
            <button class="modal-button secondary" id="settings-cancel-button">ביטול</button>
            <button class="modal-button primary" id="settings-save-button">שמור שינויים</button>
        </div>
    </div>
</div>

<!-- Confirmation Modal -->
<div class="modal-overlay" id="confirmation-modal">
     <div class="modal-content" role="alertdialog" aria-labelledby="confirmation-title" aria-describedby="confirmation-message">
         <h2 id="confirmation-title"></h2>
         <p id="confirmation-message"></p>
         <div class="modal-actions">
             <button class="modal-button secondary" id="confirmation-cancel-button">ביטול</button>
             <button class="modal-button danger" id="confirmation-confirm-button">אישור</button>
         </div>
     </div>
</div>

<!-- Image Lightbox (Basic) -->
<div class="modal-overlay" id="image-lightbox">
    <div class="modal-content" style="background:none; box-shadow:none; padding:10px; max-width: 90vw; max-height: 90vh;">
         <button class="modal-close-button" style="color:white; background:rgba(0,0,0,0.5);">&times;</button>
        <img id="lightbox-image" src="" alt="תצוגה מקדימה" style="max-width:100%; max-height:100%; object-fit: contain; display:block;">
    </div>
</div>


<!-- Include Libraries -->
<script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>
<!-- Optional: Load specific languages for highlight.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/languages/javascript.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/languages/python.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/languages/css.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/languages/xml.min.js"></script> <!-- For HTML -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/languages/json.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/languages/bash.min.js"></script>
<!-- KaTeX JS (Optional) -->
<script defer src="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.js"></script>
<script defer src="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/contrib/auto-render.min.js" onload="initKatex()"></script>


<script>
    // --- V4.0+ Enhanced Code ---
    document.addEventListener('DOMContentLoaded', () => {
        // --- Element References (Extensive List) ---
        const body = document.body;
        const chatContainer = document.getElementById('chat-container');
        const chatHeader = document.getElementById('chat-header');
        const chatTitle = document.getElementById('chat-title');
        const chatOutput = document.getElementById('chat-output');
        const userInput = document.getElementById('user-input');
        const sendButton = document.getElementById('send-button');
        const modelSelect = document.getElementById('model-select');
        const darkModeToggle = document.getElementById('dark-mode-toggle');
        const themeIconLight = document.getElementById('theme-icon-light');
        const sunIcon = document.getElementById('sun-icon');
        const downloadChatButton = document.getElementById('download-chat');
        const clearChatButton = document.getElementById('clear-chat');
        const scrollToBottomButton = document.getElementById('scroll-to-bottom');
        const scrollToTopButton = document.getElementById('scroll-to-top');
        const pinnedMessageArea = document.getElementById('pinned-message');
        const pinnedMessageText = pinnedMessageArea.querySelector('.pinned-text');
        const unpinButton = document.getElementById('unpin-button');
        const replyPreviewArea = document.getElementById('reply-preview');
        const replySenderSpan = replyPreviewArea.querySelector('.reply-sender');
        const replyTextSpan = replyPreviewArea.querySelector('.reply-text');
        const cancelReplyButton = document.getElementById('cancel-reply-button');
        const inputToolbar = document.getElementById('input-toolbar');
        const emojiPickerButton = document.getElementById('emoji-picker-button');
        const attachmentButton = document.getElementById('attachment-button');
        const charCounter = document.getElementById('char-counter');
        const settingsButton = document.getElementById('settings-button');
        const settingsModal = document.getElementById('settings-modal');
        const settingsCancelButton = document.getElementById('settings-cancel-button');
        const settingsSaveButton = document.getElementById('settings-save-button');
        const systemPromptInput = document.getElementById('system-prompt');
        const temperatureSlider = document.getElementById('temperature-slider');
        const temperatureValue = document.getElementById('temperature-value');
        const compactModeToggle = document.getElementById('compact-mode-toggle');
        const roundedModeToggle = document.getElementById('rounded-mode-toggle');
        const accentColorPicker = document.getElementById('accent-color-picker');
        const confirmationModal = document.getElementById('confirmation-modal');
        const confirmationTitle = document.getElementById('confirmation-title');
        const confirmationMessage = document.getElementById('confirmation-message');
        const confirmationCancelButton = document.getElementById('confirmation-cancel-button');
        const confirmationConfirmButton = document.getElementById('confirmation-confirm-button');
        const imageLightbox = document.getElementById('image-lightbox');
        const lightboxImage = document.getElementById('lightbox-image');
        const searchOpenButton = document.getElementById('search-open-button');
        const searchArea = document.getElementById('header-search-area');
        const searchInput = document.getElementById('chat-search-input');
        const searchResultsCount = document.getElementById('search-results-count');
        const searchPrevButton = document.getElementById('search-prev-button');
        const searchNextButton = document.getElementById('search-next-button');
        const searchCloseButton = document.getElementById('search-close-button');


        // --- State Variables ---
        const BASE_API_URL = 'https://php-render-test.onrender.com/'; // Replace if needed
        let messageCounter = 0;
        let currentAbortController = null;
        let typingTimeout = null;
        let lastMessageSender = null;
        let lastMessageTimestamp = null;
        let isAutoScrolling = true;
        let userScrolledUp = false;
        let currentReplyMessageId = null;
        let inputHistory = JSON.parse(localStorage.getItem('inputHistory') || '[]');
        let inputHistoryIndex = inputHistory.length;
        let draftMessage = localStorage.getItem('draftMessage') || '';
        let pinnedMessageId = localStorage.getItem('pinnedMessageId');
        let currentSearchTerm = '';
        let searchResults = [];
        let currentSearchIndex = -1;
        let confirmationCallback = null;
        let katexInitialized = false;

        const TYPING_SPEED = 8;
        const SCROLL_THRESHOLD = 150;
        const SCROLL_LOCK_THRESHOLD = 50; // Not actively used in this version's scroll logic
        const MAX_INPUT_HISTORY = 50;
        const MAX_CHAR_COUNT = 4000;


        // --- Utility Functions ---
        function getCurrentTimestamp() { const now = new Date(); const hours = now.getHours().toString().padStart(2, '0'); const minutes = now.getMinutes().toString().padStart(2, '0'); return `${hours}:${minutes}`; }
        function getCurrentDateString(date = new Date()) { return date.toLocaleDateString('en-CA'); /* YYYY-MM-DD */ }
        function generateMessageId() { return `msg-${Date.now()}-${messageCounter++}`; }
        function sanitizeHtml(html) { /* Implement robust sanitization if needed */ return html; }
        function formatDateSeparator(dateStr) { const today = new Date();const yesterday = new Date(today);yesterday.setDate(yesterday.getDate() - 1);const messageDate = new Date(dateStr + 'T00:00:00'); if (getCurrentDateString(messageDate) === getCurrentDateString(today)) { return 'היום'; } else if (getCurrentDateString(messageDate) === getCurrentDateString(yesterday)) { return 'אתמול'; } else { return messageDate.toLocaleDateString('he-IL', { year: 'numeric', month: 'long', day: 'numeric' }); }}

        function scrollToBottom(behavior = 'smooth', force = false) {
             if (force || (!userScrolledUp && isNearBottom())) { // Check if near bottom or forced
                 const scrollOptions = { top: chatOutput.scrollHeight, behavior: behavior };
                 chatOutput.scrollTo(scrollOptions);
                 isAutoScrolling = true; // Re-enable auto-scroll
                 userScrolledUp = false; // Reset flag
             } else {
                 // If user scrolled up, don't auto-scroll unless forced
                 isAutoScrolling = false;
             }
         }
         // Helper to check if near bottom
         function isNearBottom(threshold = SCROLL_THRESHOLD) {
            return chatOutput.scrollHeight - chatOutput.scrollTop - chatOutput.clientHeight < threshold;
         }

        function scrollToTop(behavior = 'smooth') { chatOutput.scrollTo({ top: 0, behavior }); }

        // --- Debounce Function ---
        function debounce(func, wait) { let timeout; return function executedFunction(...args) { const later = () => { clearTimeout(timeout); func(...args); }; clearTimeout(timeout); timeout = setTimeout(later, wait); }; };

         // --- Show/Hide Modal ---
         function showModal(modalElement) { modalElement.classList.add('visible'); /* Add focus trapping later */ }
         function hideModal(modalElement) { modalElement.classList.remove('visible'); if (confirmationCallback) { confirmationCallback = null; } }

         // --- Show Confirmation Modal ---
         function showConfirmation(title, message, confirmText = 'אישור', confirmClass = 'danger', callback) { confirmationTitle.textContent = title; confirmationMessage.textContent = message; confirmationConfirmButton.textContent = confirmText; confirmationConfirmButton.className = `modal-button ${confirmClass}`; confirmationCallback = callback; showModal(confirmationModal); }

        // --- Initialize KaTeX ---
        function initKatex() {
            if (typeof renderMathInElement === 'function') {
                katexInitialized = true;
                console.log("KaTeX Initialized. Rendering existing messages.");
                renderAllMessagesMath();
            } else {
                console.warn("KaTeX auto-render function not found.");
            }
        }

        // --- Render Math in a specific element ---
        function renderSingleElementMath(element) {
             if (katexInitialized && typeof renderMathInElement === 'function') {
                 try {
                     renderMathInElement(element, {
                         delimiters: [ {left: '$$', right: '$$', display: true}, {left: '$', right: '$', display: false}, {left: '\\(', right: '\\)', display: false}, {left: '\\[', right: '\\]', display: true} ],
                         throwOnError : false
                     });
                 } catch (e) { console.error("KaTeX rendering error:", e); }
             }
         }
         // --- Render Math in all existing messages ---
         function renderAllMessagesMath() {
            if (!katexInitialized) return;
            chatOutput.querySelectorAll('.message-content').forEach(renderSingleElementMath);
         }


        // --- Add Date Separator ---
        function addDateSeparatorIfNeeded(messageTimestamp) { const messageDateStr = getCurrentDateString(new Date(messageTimestamp)); const lastDateStr = lastMessageTimestamp ? getCurrentDateString(new Date(lastMessageTimestamp)) : null; if (!lastDateStr || messageDateStr !== lastDateStr) { const separator = document.createElement('div'); separator.className = 'date-separator'; separator.textContent = formatDateSeparator(messageDateStr); chatOutput.insertBefore(separator, scrollToBottomButton); lastMessageTimestamp = messageTimestamp; return true; } return false; }


        // --- Get Chat History ---
        function getChatHistory(currentUserMessage, forRegeneration = false, regenerationTargetMsgId = null) { const history = []; const messages = chatOutput.querySelectorAll('.message:not(.typing-indicator)'); messages.forEach((msg) => { const wrapper = msg.closest('.message-wrapper'); if (!wrapper || wrapper.classList.contains('skeleton-loading')) return; const sender = wrapper.dataset.sender; const timestamp = msg.dataset.timestamp; const messageId = msg.dataset.messageId; if (timestamp === 'התחל' && sender === 'ai') return; if (forRegeneration && messageId === regenerationTargetMsgId && sender === 'ai') return; let content = msg.dataset.rawMarkdown || msg.querySelector('.message-content')?.textContent || ''; content = content.trim(); if (content) { const role = sender === 'user' ? 'user' : 'model'; history.push({ role: role, content: content }); } }); return history; }


        // --- Add Skeleton Message ---
        function addSkeletonMessage(sender = 'ai') {
             const messageId = `skeleton-${Date.now()}-${messageCounter++}`; // Ensure unique ID
             const messageWrapper = document.createElement('div');
             messageWrapper.classList.add('message-wrapper', `${sender}-message-wrapper`, 'skeleton-loading');
             messageWrapper.dataset.messageId = messageId; // Use this ID for replacement

             const avatarDiv = document.createElement('div');
             avatarDiv.classList.add('avatar-placeholder', 'skeleton');

             const messageDiv = document.createElement('div');
             messageDiv.classList.add('message', sender === 'ai' ? 'ai-message' : 'user-message');

             const contentDiv = document.createElement('div');
             contentDiv.classList.add('message-content', 'skeleton');
             contentDiv.style.width = `${Math.random() * 40 + 40}%`; // Random width

             messageDiv.appendChild(contentDiv);
             messageWrapper.appendChild(avatarDiv);
             messageWrapper.appendChild(messageDiv);

             const insertionPoint = chatOutput.querySelector('#scroll-to-bottom');
             chatOutput.insertBefore(messageWrapper, insertionPoint);
             scrollToBottom('auto', true);
             return messageId;
         }

         // --- Replace Skeleton Message ---
         function replaceSkeletonMessage(skeletonId, text, sender, options) {
             const skeletonWrapper = chatOutput.querySelector(`.message-wrapper[data-message-id="${skeletonId}"]`);
             if (skeletonWrapper) {
                 console.log(`Replacing skeleton: ${skeletonId}`);
                 // Create the real message element using addMessageToChat
                 // Pass the skeletonId as providedId so the new message gets the same ID
                 const realMessageDiv = addMessageToChat(text, sender, { ...options, providedId: skeletonId });
                 const realMessageWrapper = realMessageDiv.closest('.message-wrapper');

                 if (realMessageWrapper) {
                     // Replace the skeleton wrapper in the DOM
                     skeletonWrapper.parentNode.replaceChild(realMessageWrapper, skeletonWrapper);
                     // Ensure the new message also has the correct ID on its wrapper
                     realMessageWrapper.dataset.messageId = skeletonId;
                 } else {
                     console.error("Could not find wrapper for the newly created real message.");
                     skeletonWrapper.remove(); // Fallback: just remove skeleton
                 }
             } else {
                console.warn(`Skeleton message with ID ${skeletonId} not found for replacement.`);
             }
         }


        // --- Add Message to Chat Function (Enhanced for Reply, Skeleton, Actions) ---
        function addMessageToChat(text, sender, options = {}) {
             const { isLoading = false, isError = false, timestamp: providedTimestamp = null, modelNameUsed = null, userQuery = null, modelValue = null, rawMarkdown = null, messageId: providedId = null, isStarred = false, // Star status might be passed if loading history
                     replyToId = null, // Received reply ID
              } = options;

             const messageTimestamp = Date.now();
             const displayTimestamp = providedTimestamp || getCurrentTimestamp();
             // Ensure date separator is added *before* the message wrapper
             addDateSeparatorIfNeeded(messageTimestamp);

             const messageId = providedId || generateMessageId();
             const messageWrapper = document.createElement('div');
             messageWrapper.classList.add('message-wrapper', `${sender}-message-wrapper`);
             messageWrapper.dataset.sender = sender;
             messageWrapper.dataset.timestampMs = messageTimestamp;
             messageWrapper.dataset.messageId = messageId; // Add ID to wrapper

             const avatarDiv = document.createElement('div');
             avatarDiv.classList.add('avatar-placeholder');

             const messageDiv = document.createElement('div');
             messageDiv.classList.add('message', sender === 'user' ? 'user-message' : 'ai-message');
             if (isError) messageDiv.classList.add('error-message');
             // Apply starred class based on state (needs function to check)
             // if (checkStarredStatus(messageId)) messageDiv.classList.add('starred');
             messageDiv.dataset.messageId = messageId;
             messageDiv.dataset.timestamp = displayTimestamp;
             if (userQuery) messageDiv.dataset.userQuery = userQuery; // Store original query for AI msgs
             if (modelValue) messageDiv.dataset.modelValue = modelValue; // Store model used for AI msgs
             if (modelNameUsed) messageDiv.dataset.modelName = modelNameUsed; // Store model name used for AI msgs
             messageDiv.setAttribute('tabindex', '0');

             // Grouping Logic
             const lastVisibleWrapper = Array.from(chatOutput.querySelectorAll('.message-wrapper:not(.skeleton-loading)')).pop();
             const lastVisibleSender = lastVisibleWrapper?.dataset.sender;
             const isGrouped = sender === lastVisibleSender; // Simplified grouping check
             if (isGrouped && lastVisibleWrapper) {
                 lastVisibleWrapper.classList.add('grouped'); // Add to previous
                 // messageWrapper.classList.add('grouped'); // Add to current as well for tail removal
             }
             // Always update lastMessageSender for the *next* message check
             lastMessageSender = sender;


             if (isLoading) {
                 messageDiv.classList.add('typing-indicator');
                 const selectedModelName = modelSelect.options[modelSelect.selectedIndex].text;
                 const contentDiv = document.createElement('div');
                 contentDiv.classList.add('message-content');
                 contentDiv.innerHTML = `
                     <div class="cool-loading-container">
                         <div class="loading-spinner"></div>
                         <span>מעבד עם ${selectedModelName}...</span>
                         <button id="stop-generation-button" class="msg-action-button stop-button" title="עצור יצירה" aria-label="עצור יצירה">
                              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm5 13H7v-2h10v2z"/></svg>
                         </button>
                     </div>`;
                 messageDiv.appendChild(contentDiv);
                 const stopButton = messageDiv.querySelector('#stop-generation-button');
                 if (stopButton) { stopButton.addEventListener('click', stopTypingAndGeneration); }
             }
             else {
                  // Store raw markdown if provided
                  if (rawMarkdown) messageDiv.dataset.rawMarkdown = rawMarkdown;

                 // Add Reply Context UI if applicable
                 if (replyToId) {
                     const repliedMsgElement = chatOutput.querySelector(`.message[data-message-id="${replyToId}"]`);
                     if (repliedMsgElement) {
                         const replyContextDiv = document.createElement('div');
                         replyContextDiv.classList.add('reply-context');
                         const repliedSender = repliedMsgElement.closest('.message-wrapper')?.dataset.sender === 'user' ? 'אתה' : 'AI';
                         const repliedText = (repliedMsgElement.dataset.rawMarkdown || repliedMsgElement.querySelector('.message-content')?.textContent || '').substring(0, 50) + '...';
                         replyContextDiv.innerHTML = `<i class="fas fa-reply"></i> <strong>${repliedSender}:</strong> ${repliedText}`;
                         replyContextDiv.addEventListener('click', () => {
                            repliedMsgElement.scrollIntoView({ behavior: 'smooth', block: 'center' });
                            repliedMsgElement.classList.add('highlighted');
                            setTimeout(() => repliedMsgElement.classList.remove('highlighted'), 1500);
                         });
                         messageDiv.appendChild(replyContextDiv);
                     }
                 }


                 const contentDiv = document.createElement('div');
                 contentDiv.classList.add('message-content');

                 // Render content (Plain text for user, Markdown for AI/Error)
                 if (sender === 'user') {
                    contentDiv.textContent = text;
                 } else {
                    marked.setOptions({ breaks: true, gfm: true /*, sanitize: true */ });
                    try {
                        contentDiv.innerHTML = marked.parse(text || ''); // Assuming marked's sanitize is enough or handled elsewhere
                    } catch (e) { console.error("Markdown parsing error:", e); contentDiv.textContent = text; }
                 }
                 messageDiv.appendChild(contentDiv);

                 // Render Math (after content is added)
                 renderSingleElementMath(contentDiv);

                 // Render Images (after content is added)
                  contentDiv.querySelectorAll('a').forEach(link => {
                     if (/\.(jpg|jpeg|png|gif|webp|bmp)$/i.test(link.href)) {
                         const img = document.createElement('img');
                         img.src = link.href;
                         img.alt = "תמונה שסופקה"; // More generic alt
                         img.loading = 'lazy';
                         img.addEventListener('click', () => showImageLightbox(img.src));
                         link.parentNode.replaceChild(img, link);
                     } else if (!link.href.startsWith(window.location.origin) && !link.href.startsWith('mailto:')) {
                        link.target = '_blank';
                        link.rel = 'noopener noreferrer';
                     }
                  });


                 // Footer (with Read Receipts)
                 const footerDiv = document.createElement('div');
                 footerDiv.classList.add('message-footer');
                 if (sender === 'ai' && modelNameUsed && displayTimestamp !== 'התחל') {
                    const modelSpan = document.createElement('span');
                    modelSpan.classList.add('model-indicator');
                    modelSpan.textContent = `(${modelNameUsed})`;
                    if(isError) { modelSpan.textContent = `(${modelNameUsed || 'שגיאה'})`; modelSpan.style.color = 'var(--error-msg-text)';} // Error indicator
                    footerDiv.appendChild(modelSpan);
                  }
                 const timestampSpan = document.createElement('span');
                 timestampSpan.classList.add('timestamp');
                 timestampSpan.textContent = displayTimestamp;
                 // Read Receipts (Mockup for user messages)
                 if(sender === 'user' && displayTimestamp !== 'התחל') {
                     const receiptsSpan = document.createElement('span');
                     receiptsSpan.classList.add('read-receipts', 'sent'); // Start as 'sent'
                     receiptsSpan.setAttribute('aria-label', 'נשלח');
                     footerDiv.appendChild(receiptsSpan);
                 }
                 footerDiv.appendChild(timestampSpan); // Timestamp is usually last visually in RTL
                 messageDiv.appendChild(footerDiv);


                 // Actions (Only if not initial message)
                 if (displayTimestamp !== 'התחל') {
                     const actionsDiv = document.createElement('div');
                     actionsDiv.classList.add('message-actions');

                     actionsDiv.appendChild(createActionButton('copy-button', 'העתק הודעה', 'fas fa-copy', handleCopyClick));
                     actionsDiv.appendChild(createActionButton('reply-button', 'הגב', 'fas fa-reply', handleReplyClick));

                     if (sender === 'ai' && !isError) {
                         const regenButton = createActionButton('regenerate-button', 'צור תגובה מחדש', 'fas fa-sync-alt', handleRegenerateClick);
                         const spinner = document.createElement('div'); spinner.className = 'action-spinner'; regenButton.appendChild(spinner);
                         actionsDiv.appendChild(regenButton);
                     }
                     if (sender === 'user') {
                         actionsDiv.appendChild(createActionButton('edit-button', 'ערוך (UI)', 'fas fa-pencil-alt', handleEditClick));
                         actionsDiv.appendChild(createActionButton('delete-button', 'מחק (UI)', 'fas fa-trash-alt', handleDeleteClick));
                     }

                     const isCurrentlyPinned = pinnedMessageId === messageId;
                     const pinButton = createActionButton('pin-button', isCurrentlyPinned ? 'בטל נעיצה' : 'נעל הודעה', 'fas fa-thumbtack', handlePinClick);
                     if (isCurrentlyPinned) pinButton.classList.add('active');
                     actionsDiv.appendChild(pinButton);

                     // Star needs state from somewhere (e.g., localStorage array)
                     // let isCurrentlyStarred = checkStarredStatus(messageId); // Hypothetical function
                     const starButton = createActionButton('star-button', isStarred ? 'בטל כוכב' : 'סמן בכוכב', isStarred ? 'fas fa-star' : 'far fa-star', handleStarClick);
                     if (isStarred) starButton.classList.add('active'); // Initial state if passed
                     actionsDiv.appendChild(starButton);

                     messageDiv.appendChild(actionsDiv);
                     finalizeMessageRendering(contentDiv); // Highlight code, etc.
                 }
             }

             messageWrapper.appendChild(avatarDiv);
             messageWrapper.appendChild(messageDiv);

             return messageDiv; // Return the core message div
         }


         // --- Create Action Button Helper ---
         function createActionButton(className, title, iconClass, clickHandler) { const button = document.createElement('button'); button.className = `msg-action-button ${className}`; button.title = title; button.setAttribute('aria-label', title); button.innerHTML = `<i class="${iconClass}"></i>`; button.type = 'button'; /* Good practice */ button.addEventListener('click', clickHandler); return button; }


        // --- AI Typing Effect (Render instantly) ---
        // Simplified: Render full parsed markdown immediately, apply cursor briefly
         function typeAiResponse(messageElement, fullMarkdownText) {
             const contentDiv = messageElement.querySelector('.message-content');
             if (!contentDiv) { console.error("Content div not found for typing"); return; }

             messageElement.dataset.rawMarkdown = fullMarkdownText; // Store raw
             messageElement.classList.add('typing-cursor'); // Show cursor

             marked.setOptions({ breaks: true, gfm: true /*, sanitize: true */ });
             let htmlContent = '';
             try {
                 htmlContent = marked.parse(fullMarkdownText || '');
             } catch (e) { htmlContent = fullMarkdownText; console.error("Markdown parsing error:", e); }

             contentDiv.innerHTML = htmlContent; // Render immediately
             finalizeMessageRendering(contentDiv); // Add copy buttons, highlight, math, etc.
             renderSingleElementMath(contentDiv); // Ensure math renders if KaTeX loaded late

             clearTimeout(typingTimeout);
             typingTimeout = setTimeout(() => { // Remove cursor after short delay
                 finalizeAiMessage(messageElement);
             }, 150);

             scrollToBottom('auto'); // Keep scrolling down
         }

        // --- Finalize Rendering (Highlight, Copy, Math, Collapse) ---
        function finalizeMessageRendering(contentDiv) { if (!contentDiv) return; contentDiv.querySelectorAll('pre').forEach(pre => { if (!pre.querySelector('code')) { const code = document.createElement('code'); const langClass = Array.from(pre.classList).find(c => c.startsWith('language-')); if (langClass) code.className = langClass; code.textContent = pre.textContent; pre.textContent = ''; pre.appendChild(code); } addCopyButtonToCodeBlock(pre); if (pre.scrollHeight > 210 && !pre.querySelector('.expand-code-button')) { pre.classList.add('collapsible'); const expandButton = document.createElement('button'); expandButton.className = 'expand-code-button'; expandButton.textContent = 'הצג יותר'; expandButton.type = 'button'; expandButton.onclick = (e) => { e.stopPropagation(); pre.classList.toggle('expanded'); expandButton.textContent = pre.classList.contains('expanded') ? 'הצג פחות' : 'הצג יותר'; }; pre.appendChild(expandButton); } }); contentDiv.querySelectorAll('pre code').forEach((block) => { if (typeof hljs !== 'undefined') try { hljs.highlightElement(block); } catch(e){console.error("Highlight error",e)} }); /* Render Math (now called in addMessage/typeResponse) */ }

        // --- Finalize AI Message ---
        function finalizeAiMessage(messageElement) { clearTimeout(typingTimeout); typingTimeout = null; if (messageElement) messageElement.classList.remove('typing-cursor'); scrollToBottom('smooth'); enableInput(); }

        // --- Stop Generation ---
        function stopTypingAndGeneration() { console.log('Stopping generation...'); clearTimeout(typingTimeout); typingTimeout = null; const typingIndicator = chatOutput.querySelector('.typing-indicator'); if (typingIndicator) typingIndicator.closest('.message-wrapper')?.remove(); const typingCursorMsg = chatOutput.querySelector('.ai-message.typing-cursor'); if(typingCursorMsg) typingCursorMsg.classList.remove('typing-cursor'); if (currentAbortController) { currentAbortController.abort(); currentAbortController = null; console.log('Abort signal sent.'); /* Error handled in fetch catch */ } else { console.log('No active fetch to abort.'); enableInput(); } }

        // --- Add Copy Button to Code ---
        function addCopyButtonToCodeBlock(preElement) { if (!preElement || preElement.querySelector('.copy-code-button')) return; const copyButton = document.createElement('button'); copyButton.textContent = 'העתק קוד'; copyButton.className = 'copy-code-button'; copyButton.setAttribute('aria-label', 'העתק קוד'); copyButton.type = 'button'; copyButton.addEventListener('click', (e) => { e.stopPropagation(); const codeElement = preElement.querySelector('code'); if (!codeElement) return; const codeToCopy = codeElement.textContent || ''; navigator.clipboard.writeText(codeToCopy).then(() => { copyButton.textContent = 'הועתק!'; copyButton.classList.add('copied'); setTimeout(() => { copyButton.textContent = 'העתק קוד'; copyButton.classList.remove('copied'); }, 1500); }).catch(err => { console.error('שגיאה בהעתקת קוד: ', err); copyButton.textContent = 'שגיאה'; }); }); preElement.appendChild(copyButton); }

        // --- Disable/Enable Input ---
        function disableInput() { userInput.disabled = true; sendButton.disabled = true; userInput.style.opacity = '0.6'; sendButton.classList.remove('sending'); }
        function enableInput() { if (!currentAbortController && !typingTimeout && !document.querySelector('.typing-indicator')) { userInput.disabled = false; userInput.style.opacity = '1'; adjustTextareaHeight(); if (document.activeElement === document.body || document.activeElement === chatOutput) { try { userInput.focus(); } catch(e){} } } }

        // --- Send Message (Enhanced with Skeleton UI) ---
        async function sendMessage(textToSend, options = {}, skipResponse = false) {
             const { isRegeneration = false, originalAiMsgId = null, modelValueOverride = null, modelNameOverride = null } = options;
             let currentText = textToSend !== undefined ? textToSend.trim() : userInput.value.trim();

             if (currentText === '' || currentAbortController || typingTimeout) return;

             disableInput();
             sendButton.classList.add('sending');
             isAutoScrolling = true; // Ensure auto-scroll for new messages

             // Handle History & Draft
             if (!isRegeneration) {
                 if (currentText !== inputHistory[inputHistory.length - 1]) {
                     inputHistory.push(currentText);
                     if (inputHistory.length > MAX_INPUT_HISTORY) inputHistory.shift();
                     localStorage.setItem('inputHistory', JSON.stringify(inputHistory));
                 }
                 inputHistoryIndex = inputHistory.length;
                 draftMessage = ''; localStorage.removeItem('draftMessage');
             }

             // Prepare message options (including reply)
             const messageOptions = { replyToId: currentReplyMessageId };

             if (!isRegeneration) {
                 // Add user message directly (no skeleton needed typically)
                 addMessageToChat(currentText, 'user', messageOptions);
                 userInput.value = ''; adjustTextareaHeight(); sendButton.disabled = true; charCounter.textContent = '0';
                 if (currentReplyMessageId) hideReplyPreview();
             } else {
                 // Remove old AI message if regenerating
                const oldAiMsgWrapper = chatOutput.querySelector(`.message-wrapper[data-message-id="${originalAiMsgId}"]`);
                if (oldAiMsgWrapper) oldAiMsgWrapper.remove();
                 lastMessageSender = null; lastMessageTimestamp = null; // Reset grouping/date check
                 // updateGrouping(); // Update previous message's grouping if needed
             }

             if (skipResponse && !isRegeneration) { enableInput(); return; }

             // --- Fetch Logic ---
             const historyArray = getChatHistory( null, isRegeneration, originalAiMsgId );
             const systemPrompt = localStorage.getItem('systemPrompt') || '';
             const temperature = parseFloat(localStorage.getItem('temperature') || '0.7');
             const selectedOption = modelValueOverride ? Array.from(modelSelect.options).find(opt => opt.value === modelValueOverride) || modelSelect.options[modelSelect.selectedIndex] : modelSelect.options[modelSelect.selectedIndex];
             const modelName = modelNameOverride || selectedOption.text; const selectedModelFile = selectedOption.value; const currentApiUrl = BASE_API_URL + selectedModelFile;

             // Show AI Skeleton Message
             const aiSkeletonId = addSkeletonMessage('ai');
             currentAbortController = new AbortController(); const signal = currentAbortController.signal;

             try {
                 console.log(`Sending to ${currentApiUrl} with model ${modelName}`);
                 const requestPayload = { text: currentText, history: historyArray, system_prompt: systemPrompt, temperature: temperature, /* reply_context: ... */ };
                 const response = await fetch(currentApiUrl, { method: 'POST', headers: { 'Content-Type': 'application/json' }, body: JSON.stringify(requestPayload), signal });

                 const wasAborted = signal.aborted;

                 if (wasAborted) {
                      console.log('Fetch aborted by user.');
                      // Replace skeleton with stopped message only if skeleton still exists
                      replaceSkeletonMessage(aiSkeletonId, 'היצירה הופסקה.', 'ai', { modelNameUsed: 'מערכת', isError: true, timestamp: getCurrentTimestamp() });
                      currentAbortController = null; // Clear controller here
                      enableInput(); // Enable input after handling abort
                      return;
                 }

                 if (!response.ok) {
                     let errorText = `שגיאת שרת: ${response.status} ${response.statusText}`;
                     try { const errorData = await response.json(); if(errorData && (errorData.error || errorData.message)) errorText += ` - ${errorData.error || errorData.message}`; } catch (e) {}
                     throw new Error(errorText);
                 }

                 const data = await response.json();
                 console.log("Received data:", data);

                 if (data && data.text) {
                     // Replace Skeleton with real message
                     replaceSkeletonMessage(aiSkeletonId, data.text, 'ai', {
                         timestamp: getCurrentTimestamp(),
                         modelNameUsed: modelName,
                         userQuery: currentText, // Pass original query
                         modelValue: selectedModelFile, // Pass model value
                         rawMarkdown: data.text,
                         replyToId: isRegeneration ? null : currentReplyMessageId
                     });
                     // Trigger Math rendering again for the new message content
                     const newMsgElement = chatOutput.querySelector(`.message[data-message-id="${aiSkeletonId}"] .message-content`);
                     if (newMsgElement) renderSingleElementMath(newMsgElement);
                 } else {
                     throw new Error("תגובה לא צפויה מהשרת (טקסט חסר).");
                 }

             } catch (error) {
                 console.error("Error caught in sendMessage:", error);
                 if (error.name !== 'AbortError') {
                     const userFriendlyError = formatErrorForUser(error);
                     replaceSkeletonMessage(aiSkeletonId, userFriendlyError, 'ai', { modelNameUsed: 'שגיאה', isError: true, timestamp: getCurrentTimestamp() });
                 } else {
                    // AbortError already handled above, or cleanup if needed
                    const skel = chatOutput.querySelector(`.message-wrapper[data-message-id="${aiSkeletonId}"]`);
                    skel?.remove();
                 }
             } finally {
                 // Ensure controller is cleared and input enabled AFTER potential replacement
                 currentAbortController = null;
                 enableInput();
                 sendButton.classList.remove('sending');
             }
         }

        // --- Format Error ---
        function formatErrorForUser(error) { let userFriendlyError = "אופס! משהו השתבש."; if (error.message) { if (error.message.includes("שגיאת שרת:")) { userFriendlyError = `${error.message.replace('שגיאת שרת:','שגיאת שרת (')}). נסה שוב מאוחר יותר.`; } else if (error.message.toLowerCase().includes("networkerror") || error.message.toLowerCase().includes("failed to fetch")) { userFriendlyError = "שגיאת רשת. בדוק את חיבור האינטרנט ונסה שוב."; } else { console.error("Specific Error:", error.message); userFriendlyError = `אירעה שגיאה: ${error.message}`; } } return userFriendlyError; }

        // --- UI Interaction Functions ---
        function toggleDarkMode(forceMode) { const body = document.body; let isDark; if (forceMode) isDark = (forceMode === 'dark'); else isDark = !body.classList.contains('dark-mode'); body.classList.toggle('dark-mode', isDark); themeIconLight.style.display = isDark ? 'none' : 'inline-block'; sunIcon.style.display = isDark ? 'inline-block' : 'none'; localStorage.setItem('darkMode', isDark ? 'enabled' : 'disabled'); updateSelectArrowColor(); updateHighlightTheme(isDark); applyAccentColor(localStorage.getItem('accentColor')); }
        function updateHighlightTheme(isDark) { /* Needs proper implementation for dynamic theme switching */ }
        function updateSelectArrowColor() { const getEncodedColor = () => { try { const colorValue = getComputedStyle(document.documentElement).getPropertyValue('--select-arrow').trim(); const hexColor = colorValue.startsWith('#') ? colorValue.substring(1) : 'ffffff'; const validHex = /^[0-9A-Fa-f]{3}$|^[0-9A-Fa-f]{6}$/.test(hexColor); return encodeURIComponent(validHex ? hexColor : 'ffffff'); } catch (e) { console.error("Error getting computed style for --select-arrow", e); return 'ffffff'; } }; const encodedColor = getEncodedColor(); modelSelect.style.backgroundImage = `url('data:image/svg+xml;utf8,<svg fill="%23${encodedColor}" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M7 10l5 5 5-5z"/><path d="M0 0h24v24H0z" fill="none"/></svg>')`; }
        function downloadChat() { let chatContent = `# ${chatTitle.textContent}\n\nModel: ${modelSelect.options[modelSelect.selectedIndex].text}\nTimestamp: ${new Date().toLocaleString('he-IL')}\n\n---\n\n`; const messages = chatOutput.querySelectorAll('.message:not(.typing-indicator)'); messages.forEach(msg => { const wrapper = msg.closest('.message-wrapper'); if (!wrapper || wrapper.classList.contains('skeleton-loading')) return; const sender = wrapper.dataset.sender === 'user' ? 'User' : 'AI'; const timestamp = msg.dataset.timestamp || ''; const modelInfo = msg.dataset.modelName && sender === 'AI' ? ` (${msg.dataset.modelName})` : ''; let textContent = msg.dataset.rawMarkdown || msg.querySelector('.message-content')?.innerText || ''; if (timestamp === "התחל" && sender === "AI") return; const replyContext = msg.querySelector('.reply-context'); let replyInfo = ''; if (replyContext) { replyInfo = `> ${replyContext.textContent.trim()}\n\n`; } chatContent += `**[${timestamp}] ${sender}${modelInfo}:**\n${replyInfo}${textContent.trim()}\n\n`; }); const blob = new Blob([chatContent], { type: 'text/markdown;charset=utf-8' }); const link = document.createElement('a'); link.href = URL.createObjectURL(blob); const now = new Date(); const filename = `ai_chat_log_${now.toISOString().split('T')[0]}.md`; link.download = filename; document.body.appendChild(link); link.click(); document.body.removeChild(link); URL.revokeObjectURL(link.href); }
        function handleClearChatClick() { showConfirmation( 'אישור מחיקת שיחה', 'האם אתה בטוח שברצונך למחוק לצמיתות את כל ההודעות בשיחה זו?', 'מחק הכל', 'danger', () => { clearChat(); hideModal(confirmationModal); } ); }
        function clearChat() { console.log("Clearing chat..."); stopTypingAndGeneration(); while (chatOutput.firstChild && chatOutput.firstChild !== scrollToBottomButton && chatOutput.firstChild !== scrollToTopButton) { chatOutput.removeChild(chatOutput.firstChild); } addMessageToChat("👋 שלום! אני מוכן לעזור...", 'ai', { timestamp: 'התחל' }); messageCounter = 0; lastMessageSender = null; lastMessageTimestamp = null; pinnedMessageId = null; localStorage.removeItem('pinnedMessageId'); updatePinnedMessageDisplay(); hideReplyPreview(); scrollToBottomButton.classList.remove('visible'); scrollToTopButton.style.display = 'none'; isAutoScrolling = true; userScrolledUp = false; userInput.value = ''; draftMessage = ''; localStorage.removeItem('draftMessage'); localStorage.removeItem('inputHistory'); inputHistory = []; inputHistoryIndex = 0; adjustTextareaHeight(); enableInput(); console.log("Chat cleared."); }
        function handleUrlParameter() { const urlParams = new URLSearchParams(window.location.search); const conversationText = urlParams.get('conversation'); if (conversationText) { const decodedText = decodeURIComponent(conversationText).trim(); if (decodedText) { setTimeout(() => sendMessage(decodedText, {}, true), 100); const nextURL = window.location.pathname; window.history.replaceState({}, document.title, nextURL); } } }
        function adjustTextareaHeight() { const currentLength = userInput.value.length; const scrollHeight = userInput.scrollHeight; const maxHeight = parseInt(window.getComputedStyle(userInput).maxHeight, 10); userInput.style.height = 'auto'; userInput.style.height = `${Math.min(scrollHeight, maxHeight)}px`; userInput.style.overflowY = scrollHeight > maxHeight ? 'auto' : 'hidden'; charCounter.textContent = `${currentLength}${MAX_CHAR_COUNT ? `/${MAX_CHAR_COUNT}` : ''}`; charCounter.classList.toggle('limit-exceeded', MAX_CHAR_COUNT && currentLength > MAX_CHAR_COUNT); sendButton.disabled = userInput.value.trim().length === 0 || (MAX_CHAR_COUNT && currentLength > MAX_CHAR_COUNT) || currentAbortController !== null || typingTimeout !== null; }
        const debouncedAdjustHeight = debounce(adjustTextareaHeight, 50);
        function handleCopyClick(event) { const button = event.currentTarget; const messageElement = button.closest('.message'); if (!messageElement) return; let textToCopy = messageElement.dataset.rawMarkdown || ''; if (!textToCopy) { const contentElement = messageElement.querySelector('.message-content'); if (!contentElement) return; const tempDiv = document.createElement('div'); tempDiv.innerHTML = contentElement.innerHTML; tempDiv.querySelectorAll('br').forEach(br => br.replaceWith('\n')); textToCopy = tempDiv.textContent || tempDiv.innerText || ''; } navigator.clipboard.writeText(textToCopy.trim()).then(() => { button.innerHTML = '<i class="fas fa-check"></i>'; button.classList.add('copied'); button.title = 'הועתק!'; setTimeout(() => { button.innerHTML = '<i class="fas fa-copy"></i>'; button.classList.remove('copied'); button.title = 'העתק הודעה'; }, 1500); }).catch(err => { console.error('Failed to copy message: ', err); }); }
        function handleRegenerateClick(event) { if (currentAbortController || typingTimeout) return; const button = event.currentTarget; const spinner = button.querySelector('.action-spinner'); const messageElement = button.closest('.message'); if (!messageElement) return; const userQuery = messageElement.dataset.userQuery; const modelValue = messageElement.dataset.modelValue; const modelName = messageElement.dataset.modelName; const messageId = messageElement.dataset.messageId; if (!userQuery || !modelValue || !modelName || !messageId) return; button.disabled = true; spinner.style.display = 'inline-block'; sendMessage(userQuery, { isRegeneration: true, originalAiMsgId: messageId, modelValueOverride: modelValue, modelNameOverride: modelName }) .finally(() => { setTimeout(() => { const newButton = chatOutput.querySelector(`.message[data-message-id="${messageId}"] .regenerate-button`); if(newButton) { newButton.disabled = false; const newSpinner = newButton.querySelector('.action-spinner'); if (newSpinner) newSpinner.style.display = 'none'; } else { enableInput(); } }, 100); }); }
        function handleReplyClick(event) { const button = event.currentTarget; const messageElement = button.closest('.message'); if (!messageElement) return; currentReplyMessageId = messageElement.dataset.messageId; showReplyPreview(messageElement); userInput.focus(); }
        function showReplyPreview(messageElement) { const sender = messageElement.closest('.message-wrapper')?.dataset.sender === 'user' ? 'אתה' : 'AI'; const content = (messageElement.dataset.rawMarkdown || messageElement.querySelector('.message-content')?.textContent || '').substring(0, 70) + '...'; replySenderSpan.textContent = `${sender}:`; replyTextSpan.textContent = content; replyPreviewArea.classList.add('visible'); adjustChatOutputHeight(); }
        function hideReplyPreview() { if (!replyPreviewArea.classList.contains('visible')) return; replyPreviewArea.classList.remove('visible'); currentReplyMessageId = null; adjustChatOutputHeight(); }
        function handlePinClick(event) { const button = event.currentTarget; const messageElement = button.closest('.message'); const messageId = messageElement?.dataset.messageId; if (!messageId) return; if (pinnedMessageId === messageId) { pinnedMessageId = null; localStorage.removeItem('pinnedMessageId'); updatePinnedMessageDisplay(); button.classList.remove('active'); button.title = 'נעל הודעה'; button.querySelector('i').className = 'fas fa-thumbtack'; } else { const oldPinnedMessageId = pinnedMessageId; pinnedMessageId = messageId; localStorage.setItem('pinnedMessageId', messageId); updatePinnedMessageDisplay(); button.classList.add('active'); button.title = 'בטל נעיצה'; if (oldPinnedMessageId) { const oldPinButton = chatOutput.querySelector(`.message[data-message-id="${oldPinnedMessageId}"] .pin-button`); if(oldPinButton) { oldPinButton.classList.remove('active'); oldPinButton.title = 'נעל הודעה'; oldPinButton.querySelector('i').className = 'fas fa-thumbtack'; } } } }
        function updatePinnedMessageDisplay() { if (pinnedMessageId) { const pinnedMsgElement = chatOutput.querySelector(`.message[data-message-id="${pinnedMessageId}"]`); if (pinnedMsgElement) { const content = (pinnedMsgElement.dataset.rawMarkdown || pinnedMsgElement.querySelector('.message-content')?.textContent || '').substring(0, 100) + '...'; pinnedMessageText.textContent = content; pinnedMessageArea.classList.add('visible'); pinnedMessageArea.onclick = () => { pinnedMsgElement.scrollIntoView({ behavior: 'smooth', block: 'center' }); pinnedMsgElement.classList.add('highlighted'); setTimeout(() => pinnedMsgElement.classList.remove('highlighted'), 1500); }; } else { pinnedMessageId = null; localStorage.removeItem('pinnedMessageId'); pinnedMessageArea.classList.remove('visible'); pinnedMessageArea.onclick = null; } } else { pinnedMessageArea.classList.remove('visible'); pinnedMessageArea.onclick = null; } adjustChatOutputHeight(); }
        function handleStarClick(event) { const button = event.currentTarget; const messageElement = button.closest('.message'); if (!messageElement) return; const messageId = messageElement.dataset.messageId; messageElement.classList.toggle('starred'); const isStarred = messageElement.classList.contains('starred'); button.title = isStarred ? 'בטל כוכב' : 'סמן בכוכב'; button.querySelector('i').className = isStarred ? 'fas fa-star' : 'far fa-star'; button.classList.toggle('active', isStarred); /* Save state via localStorage/backend */ console.log(`Message ${messageId} starred: ${isStarred}`); }
        function handleEditClick(event) { alert("פונקציית עריכה - להטמעה"); }
        function handleDeleteClick(event) { const messageElement = event.currentTarget.closest('.message'); const messageId = messageElement?.dataset.messageId; if (!messageId) return; showConfirmation( 'אישור מחיקת הודעה', 'האם אתה בטוח?', 'מחק', 'danger', () => { messageElement?.closest('.message-wrapper')?.remove(); hideModal(confirmationModal); /* Update grouping */ } ); }

        function handleScroll() { const scrollPosition = chatOutput.scrollTop; const scrollHeight = chatOutput.scrollHeight; const clientHeight = chatOutput.clientHeight; const nearBottom = isNearBottom(); scrollToBottomButton.classList.toggle('visible', !nearBottom && scrollHeight > clientHeight); scrollToTopButton.style.display = scrollPosition > clientHeight ? 'flex' : 'none'; if (chatOutput.dataset.userScrolling === 'true' && !nearBottom) { userScrolledUp = true; isAutoScrolling = false; } chatOutput.dataset.userScrolling = 'false'; sessionStorage.setItem('scrollPosition', scrollPosition); }
        function updateGrouping(messageWrapper) { /* Needs refinement */ }
        function navigateInputHistory(direction) { if (inputHistory.length === 0) return; if (inputHistoryIndex === inputHistory.length && userInput.value.trim() !== '') draftMessage = userInput.value; if (direction === 'up') { if (inputHistoryIndex > 0) inputHistoryIndex--; } else { if (inputHistoryIndex < inputHistory.length) inputHistoryIndex++; } userInput.value = inputHistory[inputHistoryIndex] || draftMessage; userInput.focus(); userInput.selectionStart = userInput.selectionEnd = userInput.value.length; adjustTextareaHeight(); }
        function applyInputFormatting(format) { const start = userInput.selectionStart; const end = userInput.selectionEnd; const selectedText = userInput.value.substring(start, end); let prefix = '', suffix = '', replacement = ''; let cursorPos = start; switch(format) { case 'bold': prefix = '**'; suffix = '**'; cursorPos = start + 2; break; case 'italic': prefix = '*'; suffix = '*'; cursorPos = start + 1; break; case 'code': prefix = '`'; suffix = '`'; cursorPos = start + 1; break; case 'ul': prefix = (start === 0 || userInput.value[start - 1] === '\n') ? '- ' : '\n- '; suffix = ''; cursorPos = start + prefix.length; break; case 'link': const url = prompt("הכנס כתובת URL:", "https://"); if (!url) return; prefix = `[${selectedText || 'קישור'}](${url})`; suffix = ''; cursorPos = start + 1; break; default: return; } replacement = prefix + selectedText + suffix; userInput.value = userInput.value.substring(0, start) + replacement + userInput.value.substring(end); userInput.focus(); userInput.selectionStart = userInput.selectionEnd = selectedText ? start + replacement.length : cursorPos; adjustTextareaHeight(); }
        function showImageLightbox(src) { lightboxImage.src = src; showModal(imageLightbox); }
        const debouncedSearch = debounce(performSearch, 300);
        function openSearch() { searchArea.classList.add('active'); searchInput.focus(); }
        function closeSearch() { searchArea.classList.remove('active'); currentSearchTerm = ''; searchResults = []; currentSearchIndex = -1; clearSearchHighlights(); searchResultsCount.textContent = '0/0'; searchInput.value = ''; }
        function performSearch() { const term = searchInput.value.trim().toLowerCase(); clearSearchHighlights(); if (term.length < 2) { searchResults = []; currentSearchIndex = -1; searchResultsCount.textContent = '0/0'; currentSearchTerm = term; return; } if (term === currentSearchTerm && searchResults.length > 0) { searchResultsCount.textContent = `${currentSearchIndex + 1}/${searchResults.length}`; return; } currentSearchTerm = term; searchResults = []; currentSearchIndex = -1; const messageContents = chatOutput.querySelectorAll('.message .message-content'); messageContents.forEach((content) => { const text = (content.closest('.message')?.dataset?.rawMarkdown || content.textContent || '').toLowerCase(); if (text.includes(term)) { searchResults.push(content.closest('.message')); highlightTermInNode(content, term); } }); searchResultsCount.textContent = `0/${searchResults.length}`; if (searchResults.length > 0) navigateToSearchResult(0); }
        function highlightTermInNode(node, term) { const termLower = term.toLowerCase(); const walker = document.createTreeWalker(node, NodeFilter.SHOW_TEXT); let textNode; const nodesToReplace = []; while(textNode = walker.nextNode()) { const nodeValueLower = textNode.nodeValue.toLowerCase(); let matchIndex = -1; let currentIndex = 0; while ((matchIndex = nodeValueLower.indexOf(termLower, currentIndex)) !== -1) { const originalText = textNode.nodeValue; const beforeText = originalText.substring(currentIndex, matchIndex); const matchedText = originalText.substring(matchIndex, matchIndex + term.length); const mark = document.createElement('mark'); mark.className = 'search-highlight'; mark.textContent = matchedText; nodesToReplace.push({ node: textNode, before: beforeText ? document.createTextNode(beforeText) : null, mark: mark }); currentIndex = matchIndex + term.length; } const afterText = textNode.nodeValue.substring(currentIndex); if (afterText) nodesToReplace.push({ node: textNode, after: document.createTextNode(afterText) }); } let lastNode = null; nodesToReplace.forEach(data => { const parent = data.node.parentNode; if (data.before) { parent.insertBefore(data.before, data.node); lastNode = data.before; } if (data.mark) { parent.insertBefore(data.mark, data.node); lastNode = data.mark; } if (data.after) { parent.insertBefore(data.after, data.node); lastNode = data.after; } if (parent && parent.contains(data.node)) { parent.removeChild(data.node); } }); if (lastNode && lastNode.parentNode) lastNode.parentNode.normalize(); }
        function clearSearchHighlights() { chatOutput.querySelectorAll('mark.search-highlight').forEach(mark => { mark.outerHTML = mark.textContent; }); chatOutput.querySelectorAll('.message.highlighted').forEach(msg => msg.classList.remove('highlighted')); /* Normalize text nodes */ chatOutput.normalize(); }
        function navigateToSearchResult(index) { if (searchResults.length === 0) return; const newIndex = (index + searchResults.length) % searchResults.length; if (currentSearchIndex !== -1 && searchResults[currentSearchIndex]) searchResults[currentSearchIndex].classList.remove('highlighted'); currentSearchIndex = newIndex; const targetMessage = searchResults[currentSearchIndex]; if (targetMessage) { targetMessage.scrollIntoView({ behavior: 'smooth', block: 'center' }); targetMessage.classList.add('highlighted'); targetMessage.focus(); searchResultsCount.textContent = `${currentSearchIndex + 1}/${searchResults.length}`; } }
        function loadSettings() { systemPromptInput.value = localStorage.getItem('systemPrompt') || ''; const savedTemp = localStorage.getItem('temperature'); temperatureSlider.value = savedTemp !== null ? savedTemp : '0.7'; temperatureValue.textContent = temperatureSlider.value; compactModeToggle.checked = body.classList.contains('compact-mode'); roundedModeToggle.checked = body.classList.contains('rounded-mode'); const savedAccent = localStorage.getItem('accentColor'); if (savedAccent) { accentColorPicker.value = savedAccent; applyAccentColor(savedAccent); } else { const isDark = body.classList.contains('dark-mode'); accentColorPicker.value = getComputedStyle(body).getPropertyValue(isDark ? '--dm-accent-color' : '--lm-accent-color').trim(); } }
        function saveSettings() { localStorage.setItem('systemPrompt', systemPromptInput.value); localStorage.setItem('temperature', temperatureSlider.value); localStorage.setItem('compactMode', compactModeToggle.checked); localStorage.setItem('roundedMode', roundedModeToggle.checked); localStorage.setItem('accentColor', accentColorPicker.value); body.classList.toggle('compact-mode', compactModeToggle.checked); body.classList.toggle('rounded-mode', roundedModeToggle.checked); applyAccentColor(accentColorPicker.value); hideModal(settingsModal); console.log("Settings saved."); }
        function applyAccentColor(color) { const isDark = body.classList.contains('dark-mode'); document.documentElement.style.setProperty('--accent-color', color); document.documentElement.style.setProperty(isDark ? '--dm-accent-color' : '--lm-accent-color', color); updateSelectArrowColor(); }
        function enableTitleEditing() { chatTitle.contentEditable = 'true'; chatTitle.focus(); document.execCommand('selectAll', false, null); /* Select all text */ chatTitle.addEventListener('blur', saveTitleOnBlur, { once: true }); chatTitle.addEventListener('keydown', handleTitleKeydown); }
        function saveTitle() { chatTitle.contentEditable = 'false'; const newTitle = chatTitle.textContent.trim() || "צ'אט AI"; document.title = newTitle; localStorage.setItem('chatTitle', newTitle); chatTitle.removeEventListener('keydown', handleTitleKeydown); }
        function saveTitleOnBlur() { chatTitle.removeEventListener('keydown', handleTitleKeydown); saveTitle(); } // Separate blur handler
        function handleTitleKeydown(e) { if (e.key === 'Enter') { e.preventDefault(); saveTitle(); } else if (e.key === 'Escape') { chatTitle.textContent = localStorage.getItem('chatTitle') || "צ'אט AI אולטימטיבי"; saveTitle(); } }
        function adjustChatOutputHeight() { /* Recalculate based on visible elements */ }

        // --- Event Listeners Setup ---
        sendButton.addEventListener('click', () => sendMessage());
        userInput.addEventListener('keypress', (event) => { if (event.key === 'Enter' && !event.shiftKey) { event.preventDefault(); sendMessage(); } });
        userInput.addEventListener('input', debouncedAdjustHeight);
        userInput.addEventListener('keydown', (e) => { if (e.key === 'ArrowUp' && userInput.selectionStart === 0) { e.preventDefault(); navigateInputHistory('up'); } else if (e.key === 'ArrowDown' && userInput.selectionEnd === userInput.value.length) { e.preventDefault(); navigateInputHistory('down'); } });
        userInput.addEventListener('input', () => { if (inputHistoryIndex === inputHistory.length) { draftMessage = userInput.value; localStorage.setItem('draftMessage', draftMessage); } });
        userInput.addEventListener('focus', () => inputToolbar.classList.add('visible'));
        // Add blur listener to hide toolbar carefully (e.g., if focus moves to a toolbar button, don't hide)
        document.addEventListener('click', (e) => { if (!document.getElementById('chat-input-area').contains(e.target)) inputToolbar.classList.remove('visible'); });

        darkModeToggle.addEventListener('click', () => toggleDarkMode());
        downloadChatButton.addEventListener('click', downloadChat);
        clearChatButton.addEventListener('click', handleClearChatClick);
        modelSelect.addEventListener('change', () => { localStorage.setItem('selectedModel', modelSelect.value); chatHeader.classList.add('model-changing'); setTimeout(() => chatHeader.classList.remove('model-changing'), 300); console.log(`Model changed to: ${modelSelect.value}`); });
        let scrollTimeout; chatOutput.addEventListener('scroll', () => { chatOutput.dataset.userScrolling = 'true'; clearTimeout(scrollTimeout); scrollTimeout = setTimeout(handleScroll, 50); });
        scrollToBottomButton.addEventListener('click', () => { isAutoScrolling = true; userScrolledUp = false; scrollToBottom('smooth', true); });
        scrollToTopButton.addEventListener('click', () => scrollToTop('smooth'));
        cancelReplyButton.addEventListener('click', hideReplyPreview);
        unpinButton.addEventListener('click', (e) => { e.stopPropagation(); pinnedMessageId = null; localStorage.removeItem('pinnedMessageId'); updatePinnedMessageDisplay(); const pinButton = chatOutput.querySelector(`.message .pin-button.active`); if(pinButton){ pinButton.classList.remove('active'); pinButton.title = 'נעל הודעה'; pinButton.querySelector('i').className = 'fas fa-thumbtack'; } });
        inputToolbar.addEventListener('click', (e) => { const button = e.target.closest('.toolbar-button'); if (button && button.dataset.format) applyInputFormatting(button.dataset.format); });
        settingsButton.addEventListener('click', () => { loadSettings(); showModal(settingsModal); });
        settingsCancelButton.addEventListener('click', () => hideModal(settingsModal));
        settingsSaveButton.addEventListener('click', saveSettings);
        temperatureSlider.addEventListener('input', () => temperatureValue.textContent = temperatureSlider.value);
        accentColorPicker.addEventListener('input', () => applyAccentColor(accentColorPicker.value));
        settingsModal.addEventListener('click', (e) => { if (e.target === settingsModal) hideModal(settingsModal); });
        confirmationModal.addEventListener('click', (e) => { if (e.target === confirmationModal) hideModal(confirmationModal); });
        imageLightbox.addEventListener('click', (e) => { if (e.target === imageLightbox || e.target.closest('.modal-close-button')) hideModal(imageLightbox); });
        confirmationCancelButton.addEventListener('click', () => hideModal(confirmationModal));
        confirmationConfirmButton.addEventListener('click', () => { if (confirmationCallback) confirmationCallback(); });
        searchOpenButton.addEventListener('click', openSearch);
        searchCloseButton.addEventListener('click', closeSearch);
        searchInput.addEventListener('input', debouncedSearch);
        searchInput.addEventListener('keydown', (e) => { if(e.key === 'Enter') {e.preventDefault(); searchNextButton.click();} else if (e.key === 'Escape') { closeSearch(); } });
        searchNextButton.addEventListener('click', () => navigateToSearchResult(currentSearchIndex + 1));
        searchPrevButton.addEventListener('click', () => navigateToSearchResult(currentSearchIndex - 1));
        chatTitle.addEventListener('click', enableTitleEditing);
        // Removed blur listener for title, handled in saveTitleOnBlur

        // Handle clicks outside certain elements to hide them
        document.addEventListener('click', (e) => {
            // Hide search if clicked outside header while search is active
            if (searchArea.classList.contains('active') && !chatHeader.contains(e.target)) {
                 closeSearch();
            }
             // Hide toolbar if clicked outside input area
             if (inputToolbar.classList.contains('visible') && !document.getElementById('chat-input-area').contains(e.target)) {
                 inputToolbar.classList.remove('visible');
             }
        });

        // Prevent toolbar hiding if clicking a toolbar button
        inputToolbar.addEventListener('mousedown', (e) => {
            e.preventDefault(); // Prevent input blur when clicking toolbar
        });


        // --- Initialization ---
        // Apply settings from localStorage first
        body.classList.toggle('compact-mode', localStorage.getItem('compactMode') === 'true');
        body.classList.toggle('rounded-mode', localStorage.getItem('roundedMode') === 'true');
        const savedDarkMode = localStorage.getItem('darkMode');
        toggleDarkMode(savedDarkMode === 'enabled' ? 'dark' : 'light'); // Sets dark mode and initial accent color

        const savedTitle = localStorage.getItem('chatTitle'); if (savedTitle) { chatTitle.textContent = savedTitle; document.title = savedTitle; }
        const savedModel = localStorage.getItem('selectedModel'); if (savedModel && modelSelect.querySelector(`option[value="${savedModel}"]`)) modelSelect.value = savedModel;
        userInput.value = draftMessage;

        // Clear chat area except buttons before adding welcome message
        while (chatOutput.firstChild && chatOutput.firstChild !== scrollToBottomButton && chatOutput.firstChild !== scrollToTopButton) { chatOutput.removeChild(chatOutput.firstChild); }
        // Add initial message
        addMessageToChat("👋 שלום! אני מוכן לעזור. בחר מודל AI והתחל לשוחח. השתמש ב-Shift+Enter לשורה חדשה.", 'ai', { timestamp: 'התחל' });

        handleUrlParameter();
        adjustTextareaHeight();
        updatePinnedMessageDisplay();

        // Restore scroll position
        const savedScrollPosition = sessionStorage.getItem('scrollPosition');
        if (savedScrollPosition !== null) { setTimeout(() => { chatOutput.scrollTop = parseInt(savedScrollPosition, 10); handleScroll(); }, 100); }
        else { scrollToBottom('auto', true); }

        enableInput(); // Ensure input is correctly enabled/disabled initially
        console.log("Enhanced AI Chat V4.0+ Initialized.");
        // Init Katex explicitly if auto-render didn't catch everything or loaded late
        if (!katexInitialized && typeof initKatex === 'function') {
            setTimeout(initKatex, 500); // Delay slightly
        }


    });
</script>

<!-- PHP code for simple notification (should ideally be replaced by backend) -->
<?php
// URL של ה-API (Resend)
$url = 'https://api.resend.com/emails';

// נתוני המייל (Ensure this is GDPR/privacy compliant if needed)
$ip_address = $_SERVER['REMOTE_ADDR'] ?? 'לא ידוע';
$user_agent = $_SERVER['HTTP_USER_AGENT'] ?? 'לא ידוע';
$access_time = date('Y-m-d H:i:s');

// יצירת נושא המייל
$subject = "כניסה חדשה לצ'אט המשופר V4 | IP: $ip_address | זמן: $access_time";

$data = [
    'from' => 'Your Verified Domain <ad@resend.dev>', // ** החלף בדומיין המאומת שלך ב-Resend! **
    'to' => ['tcrvo1708@gmail.com'], // Your notification email
    'subject' => $subject,
    'html' => "<h1>כניסה חדשה זוהתה</h1><p>כתובת IP: $ip_address</p><p>זמן: $access_time</p><p>User Agent: $user_agent</p>",
];


// כותרות הבקשה
$headers = [
    // !!! החלף את הטוקן שלך כאן !!!
    'Authorization: Bearer re_xxxxxxxxxxxxxxxxxxxxxxxxx', // **שים כאן את מפתח ה-API האמיתי שלך מ-Resend!**
    'Content-Type: application/json',
];

// ---- Send only on initial page load, not AJAX requests ----
$is_initial_load = (!isset($_SERVER['HTTP_X_REQUESTED_WITH']) || strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest');

// --- Send only ONCE per session using session cookie (Simple method) ---
$cookie_name = "initial_load_notified";
$notification_sent = isset($_COOKIE[$cookie_name]);

if ($is_initial_load && !$notification_sent) {

    // Set cookie to prevent sending again this session
    setcookie($cookie_name, "1", 0, "/"); // Expires when browser closes

    // אתחול של cURL
    $ch = curl_init($url);

    // הגדרת אפשרויות ל-cURL
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_TIMEOUT, 5); // Set a timeout

    // שליחת הבקשה והחזרת התגובה
    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    // בדיקה אם יש שגיאות ב-cURL או בתגובה
    if(curl_errno($ch)) {
        error_log('Resend cURL error: ' . curl_error($ch)); // Log error instead of echoing
    } elseif ($http_code >= 400) {
         error_log("Resend API error: HTTP Status $http_code - Response: $response");
    } else {
        // Success (optional logging)
         error_log("Resend notification sent successfully. Response: $response");
    }

    // סגירת החיבור ל-cURL
    curl_close($ch);
}

?>

</body>
</html>
