<!DOCTYPE html>
<html lang="he" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Futuristic AI Chat V7.1 (No Splash)</title> <!-- Changed Title -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Marked.js for Markdown Rendering -->
    <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
    <style>
        /* --- CSS (V7) - ללא שינוי ב-CSS עצמו --- */
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
             --bg-default: var(--lm-bg-default); --chat-bg: var(--lm-chat-bg); --header-bg: var(--lm-header-bg); --header-text: var(--lm-header-text); --header-icon-fill: var(--lm-header-icon-fill); --header-status-text: var(--lm-header-status-text); --user-msg-bg: var(--lm-user-msg-bg); --ai-msg-bg: var(--lm-ai-msg-bg); --msg-text: var(--lm-msg-text); --input-area-bg: var(--lm-input-area-bg); --input-bg: var(--lm-input-bg); --input-text: var(--lm-input-text); --input-border: var(--lm-input-border); --input-border-focus: var(--lm-input-border-focus); --input-shadow-focus: var(--lm-input-shadow-focus); --input-glow: var(--lm-input-glow); --button-bg: var(--lm-button-bg); --button-hover-bg: var(--lm-button-hover-bg); --button-active-bg: var(--lm-button-active-bg); --button-icon-fill: var(--lm-button-icon-fill); --button-secondary-text: var(--lm-button-secondary-text); --button-secondary-border: var(--lm-button-secondary-border); --button-secondary-hover-bg: var(--lm-button-secondary-hover-bg); --timestamp-color: var(--lm-timestamp-color); --model-indicator-color: var(--lm-model-indicator-color); --border-color: var(--lm-border-color); --icon-button-hover-bg: var(--lm-icon-button-hover-bg); --msg-action-icon-fill: var(--lm-msg-action-icon-fill); --msg-action-icon-hover-fill: var(--lm-msg-action-icon-hover-fill); --msg-action-icon-hover-bg: var(--lm-msg-action-icon-hover-bg); --scrollbar-thumb: var(--lm-scrollbar-thumb); --scrollbar-track: var(--lm-scrollbar-track); --code-bg: var(--lm-code-bg); --code-text: var(--lm-code-text); --code-border: var(--lm-code-border); --code-copy-btn-bg: var(--lm-code-copy-btn-bg); --code-copy-btn-hover-bg: var(--lm-code-copy-btn-hover-bg); --loading-dot-color: var(--lm-loading-dot-color); --shadow-light: var(--lm-shadow-light); --shadow-medium: var(--lm-shadow-medium); --shadow-high: var(--lm-shadow-high); --scroll-btn-bg: var(--lm-scroll-btn-bg); --scroll-btn-icon: var(--lm-scroll-btn-icon); --scroll-btn-hover-bg: var(--lm-scroll-btn-hover-bg); --popover-bg: var(--lm-popover-bg); --popover-backdrop-filter: var(--lm-popover-backdrop-filter); --popover-shadow: var(--lm-popover-shadow); --popover-border: var(--lm-popover-border); --menu-item-hover-bg: var(--lm-menu-item-hover-bg); --counter-bg: var(--lm-counter-bg); --counter-text: var(--lm-counter-text); --avatar-text: var(--lm-avatar-text); --whatsapp-bg-image: var(--lm-whatsapp-bg-image); --attach-icon-fill: var(--lm-attach-icon-fill); --unread-marker-bg: var(--lm-unread-marker-bg); --unread-marker-border: var(--lm-unread-marker-border); --unread-marker-text: var(--lm-unread-marker-text); --dialog-bg: var(--lm-dialog-bg); --dialog-text: var(--lm-dialog-text); --dialog-shadow: var(--lm-dialog-shadow); --dialog-overlay-bg: var(--lm-dialog-overlay-bg); --dialog-button-bg: var(--lm-dialog-button-bg); --dialog-button-text: var(--lm-dialog-button-text); --dialog-cancel-button-bg: var(--lm-dialog-cancel-button-bg); --dialog-cancel-button-text: var(--lm-dialog-cancel-button-text); --kbd-bg: var(--lm-kbd-bg); --kbd-border: var(--lm-kbd-border); --kbd-text: var(--lm-kbd-text); --suggestion-chip-bg: var(--lm-suggestion-chip-bg); --suggestion-chip-hover-bg: var(--lm-suggestion-chip-hover-bg); --suggestion-chip-text: var(--lm-suggestion-chip-text); --sentiment-positive: var(--lm-sentiment-positive); --sentiment-negative: var(--lm-sentiment-negative); --sentiment-neutral: var(--lm-sentiment-neutral); --keyword-bg: var(--lm-keyword-bg); --keyword-text: var(--lm-keyword-text);
        }
        body.dark-mode {
             --bg-default: var(--dm-bg-default); --chat-bg: var(--dm-chat-bg); --header-bg: var(--dm-header-bg); --header-text: var(--dm-header-text); --header-icon-fill: var(--dm-header-icon-fill); --header-status-text: var(--dm-header-status-text); --user-msg-bg: var(--dm-user-msg-bg); --ai-msg-bg: var(--dm-ai-msg-bg); --msg-text: var(--dm-msg-text); --input-area-bg: var(--dm-input-area-bg); --input-bg: var(--dm-input-bg); --input-text: var(--dm-input-text); --input-border: var(--dm-input-border); --input-border-focus: var(--dm-input-border-focus); --input-shadow-focus: var(--dm-input-shadow-focus); --input-glow: var(--dm-input-glow); --button-bg: var(--dm-button-bg); --button-hover-bg: var(--dm-button-hover-bg); --button-active-bg: var(--dm-button-active-bg); --button-icon-fill: var(--dm-button-icon-fill); --button-secondary-text: var(--dm-button-secondary-text); --button-secondary-border: var(--dm-button-secondary-border); --button-secondary-hover-bg: var(--dm-button-secondary-hover-bg); --timestamp-color: var(--dm-timestamp-color); --model-indicator-color: var(--dm-model-indicator-color); --border-color: var(--dm-border-color); --icon-button-hover-bg: var(--dm-icon-button-hover-bg); --msg-action-icon-fill: var(--dm-msg-action-icon-fill); --msg-action-icon-hover-fill: var(--dm-msg-action-icon-hover-fill); --msg-action-icon-hover-bg: var(--dm-msg-action-icon-hover-bg); --scrollbar-thumb: var(--dm-scrollbar-thumb); --scrollbar-track: var(--dm-scrollbar-track); --code-bg: var(--dm-code-bg); --code-text: var(--dm-code-text); --code-border: var(--dm-code-border); --code-copy-btn-bg: var(--dm-code-copy-btn-bg); --code-copy-btn-hover-bg: var(--dm-code-copy-btn-hover-bg); --loading-dot-color: var(--dm-loading-dot-color); --shadow-light: var(--dm-shadow-light); --shadow-medium: var(--dm-shadow-medium); --shadow-high: var(--dm-shadow-high); --scroll-btn-bg: var(--dm-scroll-btn-bg); --scroll-btn-icon: var(--dm-scroll-btn-icon); --scroll-btn-hover-bg: var(--dm-scroll-btn-hover-bg); --popover-bg: var(--dm-popover-bg); --popover-backdrop-filter: var(--dm-popover-backdrop-filter); --popover-shadow: var(--dm-popover-shadow); --popover-border: var(--dm-popover-border); --menu-item-hover-bg: var(--dm-menu-item-hover-bg); --counter-bg: var(--dm-counter-bg); --counter-text: var(--dm-counter-text); --avatar-text: var(--dm-avatar-text); --whatsapp-bg-image: var(--dm-whatsapp-bg-image); --attach-icon-fill: var(--dm-attach-icon-fill); --unread-marker-bg: var(--dm-unread-marker-bg); --unread-marker-border: var(--dm-unread-marker-border); --unread-marker-text: var(--dm-unread-marker-text); --dialog-bg: var(--dm-dialog-bg); --dialog-text: var(--dm-dialog-text); --dialog-shadow: var(--dm-dialog-shadow); --dialog-overlay-bg: var(--dm-dialog-overlay-bg); --dialog-button-bg: var(--dm-dialog-button-bg); --dialog-button-text: var(--dm-button-icon-fill); --dialog-cancel-button-bg: var(--dm-dialog-cancel-button-bg); --dialog-cancel-button-text: var(--dm-dialog-cancel-button-text); --kbd-bg: var(--dm-kbd-bg); --kbd-border: var(--dm-kbd-border); --kbd-text: var(--dm-kbd-text); --suggestion-chip-bg: var(--dm-suggestion-chip-bg); --suggestion-chip-hover-bg: var(--dm-suggestion-chip-hover-bg); --suggestion-chip-text: var(--dm-suggestion-chip-text); --sentiment-positive: var(--dm-sentiment-positive); --sentiment-negative: var(--dm-sentiment-negative); --sentiment-neutral: var(--dm-sentiment-neutral); --keyword-bg: var(--dm-keyword-bg); --keyword-text: var(--dm-keyword-text);
        }

        /* --- Base Styles V7 --- */
        html, body { height: 100%; margin: 0; padding: 0; overflow: hidden; }
        body { font-family: var(--font-main); background-color: var(--bg-default); color: var(--msg-text); display: flex; flex-direction: column; transition: background-color var(--transition-medium), color var(--transition-medium); font-size: 15.8px; /* Even larger */ line-height: 1.65; -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale; }
        * { box-sizing: border-box; }
        *:focus-visible {
            outline: 2px solid var(--accent-2); /* Changed focus outline color */
            outline-offset: 2px;
            border-radius: var(--border-radius-small);
            box-shadow: 0 0 0 4px color-mix(in srgb, var(--accent-2) 20%, transparent); /* Added focus shadow */
        }
        #user-input:focus-visible { outline: none; } /* Handled by border/shadow change */
        a { color: var(--link-color); text-decoration: none; transition: color var(--transition-fast), text-decoration var(--transition-fast); }
        a:hover { color: color-mix(in srgb, var(--link-color) 70%, black); text-decoration: underline; }
        ::selection { background-color: color-mix(in srgb, var(--accent-1) 40%, transparent); color: var(--msg-text); }
        body.dark-mode ::selection { background-color: color-mix(in srgb, var(--accent-1) 30%, black); color: var(--msg-text); }


        /* --- Splash Screen V7 (REMOVED CSS) --- */
        /* Styles for #splash-screen, #splash-logo, #splash-text are removed */

        /* --- Chat Container V7 --- */
        #chat-container {
            width: 100%; max-width: 1050px; height: calc(100dvh - 20px); margin: 10px auto; background-color: var(--chat-bg); display: flex; flex-direction: column; overflow: hidden; position: relative; transition: background-color var(--transition-medium), box-shadow var(--transition-medium), transform var(--transition-medium) var(--bezier-elegant); box-shadow: var(--shadow-high); border-radius: var(--border-radius-medium);
            /* REMOVED: style="opacity: 0;" - Container is visible immediately */
            border: 1px solid var(--border-color); /* Subtle border */
        }

        /* --- Header V7 --- */
        #chat-header {
            background: var(--header-bg); color: var(--header-text); padding: 12px 20px; display: flex; align-items: center; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.15); z-index: 10; transition: background-color var(--transition-medium), color var(--transition-medium); gap: 18px; flex-shrink: 0; border-top-left-radius: var(--border-radius-medium); border-top-right-radius: var(--border-radius-medium);
            animation: header-gradient-animation var(--hue-rotation-speed) linear infinite alternate; border-bottom: 1px solid transparent; /* For blend */
        }
        body.dark-mode #chat-header { box-shadow: 0 2px 8px rgba(0, 0, 0, 0.4); border-bottom-color: rgba(255,255,255,0.05); }
        @keyframes header-gradient-animation {
            from { filter: hue-rotate(0deg) saturate(100%); } to { filter: hue-rotate(15deg) saturate(110%); }
        }
        .header-avatar {
            width: var(--avatar-size); height: var(--avatar-size); border-radius: var(--border-radius-round); display: flex; align-items: center; justify-content: center; font-weight: 600; font-size: 16px; flex-shrink: 0; color: var(--avatar-text);
            background: linear-gradient(135deg, var(--accent-1), color-mix(in srgb, var(--accent-1) 60%, black));
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }
        body.dark-mode .header-avatar { color: var(--dm-avatar-text); background: linear-gradient(135deg, var(--accent-1), color-mix(in srgb, var(--accent-1) 70%, black)); }

        .header-content { /* Wrapper for title and status */
            display: flex; flex-direction: column; flex-grow: 1;
            overflow: hidden; /* Prevent overflow */
        }
        #chat-title { margin: 0; font-size: 18px; font-weight: 600; flex-grow: 1; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; color: var(--header-text); display: flex; align-items: center; gap: 8px; }
        #chat-sentiment { /* Sentiment icon next to title */
            width: 18px; height: 18px; display: inline-block; vertical-align: middle;
            transition: transform 0.3s var(--bezier-overshoot), opacity 0.3s ease;
            opacity: 0.7;
        }
        #chat-sentiment.loading { /* Placeholder look */
            opacity: 0.5;
            width: 18px; height: 18px;
            background-color: rgba(255,255,255,0.3); border-radius: 50%; animation: pulse-light 1.5s infinite ease-in-out;
            display: inline-block; vertical-align: middle;
        }
        @keyframes pulse-light { 0%, 100% { opacity: 0.5; } 50% { opacity: 0.9; } }
        #chat-sentiment.positive svg { fill: var(--lm-sentiment-positive); }
        #chat-sentiment.negative svg { fill: var(--lm-sentiment-negative); }
        #chat-sentiment.neutral svg { fill: #ffffff; opacity: 0.8; } /* Neutral icon color for header */
        body.dark-mode #chat-sentiment.positive svg { fill: var(--dm-sentiment-positive); }
        body.dark-mode #chat-sentiment.negative svg { fill: var(--dm-sentiment-negative); }
        body.dark-mode #chat-sentiment.neutral svg { fill: var(--dm-sentiment-neutral); }

        #header-status { /* Last seen status */
            font-size: 12.5px; color: var(--lm-header-status-text); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3; margin-top: 2px;
            opacity: 0.9;
        }
        body.dark-mode #header-status { color: var(--dm-header-status-text); }
        .header-controls-trigger { margin-left: auto; /* Push button to the right */}
        .icon-button { background: none; border: none; padding: 8px; cursor: pointer; border-radius: var(--border-radius-round); display: flex; align-items: center; justify-content: center; transition: background-color var(--transition-fast), transform var(--transition-fast); }
        .icon-button:hover { background-color: var(--icon-button-hover-bg); }
        .icon-button:active { transform: scale(0.92); }
        .icon-button svg { width: 24px; height: 24px; fill: var(--header-icon-fill); transition: fill var(--transition-medium); }
        body.dark-mode .icon-button svg { fill: var(--dm-header-icon-fill); }

        /* --- Settings Popover V7 --- */
        #settings-popover {
             position: absolute; top: calc(100% + 5px); left: 20px; /* Position relative to header */
             background-color: var(--popover-bg); backdrop-filter: var(--popover-backdrop-filter); border: 1px solid var(--popover-border); border-radius: var(--border-radius-medium); box-shadow: var(--popover-shadow); z-index: 100; padding: 12px; min-width: 280px;
             opacity: 0; visibility: hidden; transform: translateY(-10px) scale(0.95); transition: opacity var(--transition-fast), transform var(--transition-fast), visibility 0s var(--transition-fast); pointer-events: none;
             max-height: calc(100vh - 100px); overflow-y: auto; /* Prevent overflow */
        }
        #settings-popover.visible { opacity: 1; visibility: visible; transform: translateY(0) scale(1); pointer-events: auto; transition-delay: 0s; }
        .popover-section { margin-bottom: 15px; padding-bottom: 15px; border-bottom: 1px solid var(--border-color); }
        .popover-section:last-child { margin-bottom: 0; padding-bottom: 0; border-bottom: none; }
        .popover-section label { display: block; font-size: 14px; font-weight: 500; margin-bottom: 8px; color: var(--msg-text); }
        .popover-section select, .popover-section input[type="checkbox"] { margin-top: 4px; }
        .popover-section select {
             width: 100%; padding: 8px 12px; border: 1px solid var(--input-border); border-radius: var(--border-radius-small); background-color: var(--input-bg); color: var(--input-text); font-size: 14px;
             cursor: pointer;
        }
         .popover-checkbox { display: flex; align-items: center; cursor: pointer; }
         .popover-checkbox input[type="checkbox"] { margin-right: 8px; width: 16px; height: 16px; accent-color: var(--accent-2); }
         .popover-checkbox label { margin-bottom: 0; font-weight: 400; } /* Adjust label style */

        .popover-section.keywords h3 { font-size: 14px; font-weight: 500; margin-bottom: 8px; display: flex; align-items: center; gap: 6px;}
        .keywords-container { display: flex; flex-wrap: wrap; gap: 6px; }
        .keyword-chip {
            background-color: var(--keyword-bg); color: var(--keyword-text);
            font-size: 12px; padding: 3px 8px; border-radius: var(--border-radius-large);
            transition: background-color var(--transition-fast);
        }
        .keywords-container.loading span { /* Loading state for keywords */
             display: inline-block; width: 60px; height: 20px; background-color: var(--keyword-bg); border-radius: var(--border-radius-large); animation: pulse-light 1.5s infinite ease-in-out; margin: 2px; opacity: 0.7;
        }
        .popover-section.shortcuts label { font-weight: 500; margin-bottom: 8px; }
        .popover-section.shortcuts ul { list-style: none; padding: 0; margin: 0; }
        .popover-section.shortcuts li { display: flex; justify-content: space-between; font-size: 13px; color: var(--timestamp-color); margin-bottom: 6px; }
        .popover-section.shortcuts kbd {
             font-family: var(--font-code); font-size: 11px; padding: 2px 6px; background-color: var(--kbd-bg); border: 1px solid var(--kbd-border); border-radius: var(--border-radius-small); color: var(--kbd-text); box-shadow: inset 0 -1px 0 var(--kbd-border);
        }
         .popover-actions { display: flex; gap: 10px; justify-content: flex-end; margin-top: 15px; }
         .popover-button {
             padding: 8px 16px; border-radius: var(--border-radius-medium); border: none; font-size: 14px; font-weight: 500; cursor: pointer; transition: background-color var(--transition-fast), transform var(--transition-fast);
             display: flex; align-items: center; gap: 6px;
         }
         .popover-button.primary { background-color: var(--button-bg); color: var(--button-icon-fill); }
         .popover-button.primary:hover { background-color: var(--button-hover-bg); }
         .popover-button.secondary {
            background-color: transparent; color: var(--button-secondary-text);
            border: 1px solid var(--button-secondary-border);
         }
         .popover-button.secondary:hover { background-color: var(--button-secondary-hover-bg); }
         .popover-button svg { width: 16px; height: 16px; fill: currentColor; }


        /* --- Chat Output V7 --- */
        #chat-output {
            flex-grow: 1; overflow-y: auto; overflow-x: hidden; display: flex; flex-direction: column; position: relative;
            background-color: var(--chat-bg); /* Solid background */
            padding: 0 10px; /* Padding for scrollbar space */
        }
        #chat-output-inner {
            display: flex; flex-direction: column; padding: 15px 10px; /* Inner padding for content */
            width: 100%; margin-top: auto; /* Push content to bottom */
        }
        #chat-output::-webkit-scrollbar { width: 10px; }
        #chat-output::-webkit-scrollbar-track { background: transparent; }
        #chat-output::-webkit-scrollbar-thumb { background: var(--scrollbar-thumb); border-radius: 5px; border: 2px solid var(--chat-bg); }
        #chat-output::-webkit-scrollbar-thumb:hover { background: color-mix(in srgb, var(--scrollbar-thumb) 70%, black); }
        #chat-output { scrollbar-width: thin; scrollbar-color: var(--scrollbar-thumb) transparent; }

        /* --- Load More Button V7 --- */
         #load-more-button {
             align-self: center; /* Center the button */
             padding: 8px 18px; margin: 15px 0; border: 1px solid var(--button-secondary-border); background-color: transparent; color: var(--button-secondary-text); border-radius: var(--border-radius-large); font-size: 13px; font-weight: 500; cursor: pointer; transition: all var(--transition-fast);
         }
         #load-more-button:hover { background-color: var(--button-secondary-hover-bg); transform: translateY(-1px); }
         #load-more-button:disabled { opacity: 0.5; cursor: not-allowed; }

        /* --- Messages V7 --- */
        .message-wrapper {
             display: flex; max-width: 80%; /* Slightly wider */ margin-bottom: 4px; align-items: flex-end; /* Align avatar and bubble */
             transition: margin-bottom var(--transition-fast); /* Smooth transition for grouping */
             position: relative; /* For action button positioning */
             opacity: 0; animation: message-fade-in 0.4s var(--bezier-elegant) forwards;
        }
        @keyframes message-fade-in { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }

        .user-message-wrapper { align-self: flex-end; flex-direction: row-reverse; margin-left: auto; } /* Align user messages right */
        .ai-message-wrapper { align-self: flex-start; flex-direction: row; margin-right: auto; } /* Align AI messages left */

        .avatar {
             width: var(--avatar-size); height: var(--avatar-size); border-radius: var(--border-radius-round); display: flex; align-items: center; justify-content: center; font-weight: 600; font-size: 16px; flex-shrink: 0; color: var(--lm-avatar-text);
             margin: 0 10px; box-shadow: var(--shadow-light); transition: transform var(--transition-fast), box-shadow var(--transition-fast), visibility var(--transition-fast);
        }
        .ai-message-wrapper .avatar { background: linear-gradient(135deg, var(--accent-1), color-mix(in srgb, var(--accent-1) 60%, black)); }
        .user-message-wrapper .avatar { background: linear-gradient(135deg, var(--accent-2), color-mix(in srgb, var(--accent-2) 60%, #000)); }
        body.dark-mode .ai-message-wrapper .avatar { background: linear-gradient(135deg, var(--accent-1), color-mix(in srgb, var(--accent-1) 70%, #000)); color: var(--dm-avatar-text); }
        body.dark-mode .user-message-wrapper .avatar { background: linear-gradient(135deg, var(--accent-2), color-mix(in srgb, var(--accent-2) 70%, #000)); color: var(--dm-avatar-text); }
        .message-wrapper:hover .avatar { transform: scale(1.05); box-shadow: var(--shadow-medium); }

        .message {
            padding: 10px 16px; border-radius: var(--border-radius-medium); word-wrap: break-word; line-height: 1.6; color: var(--msg-text); box-shadow: var(--shadow-light); transition: background-color var(--transition-medium), color var(--transition-medium), box-shadow var(--transition-medium), transform var(--transition-fast), border-radius var(--transition-fast);
             position: relative; /* For tail */
             z-index: 1;
             min-width: 50px; /* Ensure minimum width */
        }
        .user-message { background-color: var(--user-msg-bg); border-bottom-right-radius: var(--border-radius-small); }
        .ai-message { background-color: var(--ai-msg-bg); border-bottom-left-radius: var(--border-radius-small); border: 1px solid var(--border-color); }
        body.dark-mode .ai-message { border-color: var(--dm-border-color); }

         /* Message Tail (Improved) */
         .message::before {
             content: ""; position: absolute; bottom: 0; width: 12px; height: 15px;
             background-color: inherit; /* Match bubble color */
             transition: background-color var(--transition-medium); z-index: -1;
         }
         .user-message::before {
             right: -6px; /* Position tail on the right */
             border-bottom-left-radius: 10px; /* Curve */
             clip-path: polygon(0 0, 100% 100%, 100% 0); /* Triangle shape */
             box-shadow: 1px 1px 2px rgba(0,0,0,0.05);
         }
         .ai-message::before {
             left: -6px; /* Position tail on the left */
             border-bottom-right-radius: 10px; /* Curve */
             clip-path: polygon(0 0, 100% 0, 0 100%); /* Triangle shape */
             box-shadow: -1px 1px 2px rgba(0,0,0,0.05);
         }
         body.dark-mode .user-message::before { box-shadow: 1px 1px 3px rgba(0,0,0,0.2); }
         body.dark-mode .ai-message::before { box-shadow: -1px 1px 3px rgba(0,0,0,0.2); }

        .message-wrapper:hover .message { transform: translateY(-2px); box-shadow: var(--shadow-medium); }

        /* Grouping Styles */
        .message-wrapper.is-grouped-middle .avatar,
        .message-wrapper.is-grouped-end .avatar { visibility: hidden; } /* Hide avatar for middle/end */
        .message-wrapper.is-grouped-start .message { /* Top message in group */
            border-bottom-left-radius: var(--border-radius-small) !important;
            border-bottom-right-radius: var(--border-radius-small) !important;
        }
        .message-wrapper.is-grouped-middle .message { /* Middle message */
            border-radius: var(--border-radius-small) !important;
             margin-top: -2px; /* Overlap slightly */
             box-shadow: var(--shadow-light) inset 0 1px 0 var(--border-color); /* Subtle separator */
        }
        body.dark-mode .message-wrapper.is-grouped-middle .message { box-shadow: var(--dm-shadow-light) inset 0 1px 0 var(--dm-border-color); }
        .message-wrapper.is-grouped-end .message { /* Bottom message */
            border-top-left-radius: var(--border-radius-small) !important;
            border-top-right-radius: var(--border-radius-small) !important;
             margin-top: -2px; /* Overlap slightly */
        }
        /* Remove tail for middle/start messages */
        .message-wrapper.is-grouped-start .message::before,
        .message-wrapper.is-grouped-middle .message::before { display: none; }
        /* Adjust margin for non-grouped messages */
        .message-wrapper:not(.is-grouped-middle):not(.is-grouped-end) { margin-bottom: 16px; /* Increase spacing for non-grouped */ }

        .message-content { min-height: 1.6em; /* Ensure minimum height */}
        .ai-message.typing-cursor .message-content::after { /* ... Blinking cursor ... */ }
         /* Markdown Styles */
         .message-content > *:first-child { margin-top: 0; } /* Remove top margin from first element */
         .message-content > *:last-child { margin-bottom: 0; } /* Remove bottom margin from last element */
         .message-content strong, .message-content b { font-weight: 600; }
         .message-content em, .message-content i { font-style: italic; }
         .message-content ul, .message-content ol { padding-right: 25px; margin: 10px 0; }
         .message-content li { margin-bottom: 5px; }
         .message-content blockquote {
             border-right: 4px solid var(--border-color); padding-right: 12px; margin: 10px 5px 10px 0; color: var(--timestamp-color); font-style: italic;
             background-color: color-mix(in srgb, var(--border-color) 20%, transparent);
             border-top-right-radius: var(--border-radius-small); border-bottom-right-radius: var(--border-radius-small);
         }
         body.dark-mode .message-content blockquote { border-right-color: var(--dm-border-color); background-color: color-mix(in srgb, var(--dm-border-color) 30%, transparent);}
         .message-content pre { background-color: var(--code-bg); color: var(--code-text); padding: 12px 16px; border-radius: var(--border-radius-medium); overflow-x: auto; font-family: var(--font-code); font-size: 14px; margin: 12px 0; direction: ltr; text-align: left; white-space: pre; border: 1px solid var(--code-border); position: relative; }
         .message-content pre code { /* Styles specifically for code inside pre */
             display: block; padding: 0; margin: 0; background: none; border: none; font-size: inherit; color: inherit;
         }
         .message-content pre .copy-code-button { position: absolute; top: 10px; left: 10px; /* Changed position to left */ background-color: var(--code-copy-btn-bg); color: var(--msg-text); border: none; border-radius: var(--border-radius-small); padding: 5px 10px; font-size: 12px; font-family: var(--font-main); cursor: pointer; opacity: 0; transition: opacity var(--transition-fast), background-color var(--transition-fast); z-index: 2; backdrop-filter: blur(2px); }
         .message-content pre:hover .copy-code-button { opacity: 0.8; }
         .message-content pre .copy-code-button:hover { opacity: 1; background-color: var(--code-copy-btn-hover-bg); }
         .message-content pre .copy-code-button.copied { background-color: var(--accent-1); color: var(--dm-button-icon-fill); opacity: 1; }
         .message-content code:not(pre > code) { /* Inline code */ background-color: color-mix(in srgb, var(--code-bg) 80%, var(--chat-bg)); color: var(--code-text); padding: 0.2em 0.5em; margin: 0 0.1em; font-size: 88%; border-radius: var(--border-radius-small); font-family: var(--font-code); direction: ltr; text-align: left; border: 1px solid var(--code-border); vertical-align: middle; }

        /* Link Preview Placeholder */
         .link-preview {
             border: 1px solid var(--border-color); border-radius: var(--border-radius-medium);
             margin-top: 8px; overflow: hidden; background-color: color-mix(in srgb, var(--chat-bg) 80%, var(--bg-default)); /* Slightly different background */
             opacity: 0.8; transition: opacity var(--transition-fast); display: flex;
         }
         .link-preview:hover { opacity: 1; }
         .link-preview-image { width: 80px; height: 80px; background-color: var(--lm-code-bg); flex-shrink: 0; display: flex; align-items: center; justify-content: center; color: var(--timestamp-color); }
         .link-preview-image svg { width: 30px; height: 30px; fill: currentColor; }
         .link-preview-content { padding: 8px 12px; flex-grow: 1; overflow: hidden;}
         .link-preview-title { font-weight: 600; font-size: 14px; margin-bottom: 3px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
         .link-preview-desc { font-size: 13px; color: var(--timestamp-color); max-height: 3.2em; /* Approx 2 lines */ line-height: 1.6; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; }
         body.dark-mode .link-preview { border-color: var(--dm-border-color); background-color: color-mix(in srgb, var(--dm-chat-bg) 80%, var(--dm-bg-default)); }
         body.dark-mode .link-preview-image { background-color: var(--dm-code-bg); }


        .message-footer { display: flex; align-items: center; justify-content: flex-end; font-size: 11.5px; margin-top: 6px; gap: 8px; transition: color var(--transition-medium); flex-wrap: wrap; opacity: 0.8; color: var(--timestamp-color); }
        .ai-message .message-footer { justify-content: flex-start; }
        .model-indicator { white-space: nowrap; font-weight: 500; color: var(--model-indicator-color); }
        .timestamp { white-space: nowrap; }

        .message-actions-trigger {
            position: absolute; top: -5px; /* Position above the bubble slightly */ opacity: 0; transition: opacity var(--transition-fast), transform var(--transition-fast); padding: 4px; border-radius: var(--border-radius-round); background-color: color-mix(in srgb, var(--chat-bg) 85%, transparent); backdrop-filter: blur(3px); border: 1px solid var(--border-color); box-shadow: var(--shadow-light); cursor: pointer; z-index: 2; pointer-events: none;
        }
        .user-message-wrapper .message-actions-trigger { right: -10px; transform: translate(5px, -5px) scale(0.8); }
        .ai-message-wrapper .message-actions-trigger { left: -10px; transform: translate(-5px, -5px) scale(0.8); }
        .message-wrapper:hover .message-actions-trigger { opacity: 1; transform: translate(0, 0) scale(1); pointer-events: auto; }
        .message-actions-trigger svg { width: 18px; height: 18px; fill: var(--msg-action-icon-fill); display: block; }

        /* --- Action Menu --- */
         #message-actions-menu {
             position: fixed; /* Use fixed for reliable positioning */ z-index: 110; background-color: var(--popover-bg); backdrop-filter: var(--popover-backdrop-filter); border-radius: var(--border-radius-medium); box-shadow: var(--popover-shadow); border: 1px solid var(--popover-border); padding: 6px; display: flex; flex-direction: column; gap: 2px;
             opacity: 0; visibility: hidden; transform: scale(0.9); transition: opacity var(--transition-fast), transform var(--transition-fast), visibility 0s var(--transition-fast); pointer-events: none;
         }
         #message-actions-menu.visible { opacity: 1; visibility: visible; transform: scale(1); pointer-events: auto; transition-delay: 0s; }
         .action-menu-button { background: none; border: none; padding: 8px 12px; border-radius: var(--border-radius-small); cursor: pointer; text-align: right; font-size: 14px; color: var(--msg-text); display: flex; align-items: center; gap: 8px; transition: background-color var(--transition-fast); white-space: nowrap; }
         .action-menu-button:hover { background-color: var(--menu-item-hover-bg); }
         .action-menu-button svg { width: 16px; height: 16px; fill: var(--msg-action-icon-fill); flex-shrink: 0; }
         .action-menu-button.copy-success svg { fill: var(--accent-1) !important; animation: pop-scale 0.3s var(--bezier-overshoot); }
         @keyframes pop-scale { 0%, 100% { transform: scale(1); } 50% { transform: scale(1.2); } }

        /* --- AI Suggestions --- */
        #ai-suggestions-area {
            display: flex; flex-wrap: wrap; gap: 8px;
            padding: 10px 15px 5px; /* Below last AI message */
            transition: opacity var(--transition-medium), transform var(--transition-medium);
            opacity: 0; transform: translateY(10px); pointer-events: none;
            position: sticky; bottom: 0; /* Stick to bottom of scroll area */
            background: linear-gradient(to top, var(--chat-bg) 60%, transparent); /* Fade background */
            margin-top: 10px; /* Space from last message */
        }
        body.dark-mode #ai-suggestions-area { background: linear-gradient(to top, var(--dm-chat-bg) 60%, transparent); }
        #ai-suggestions-area.visible { opacity: 1; transform: translateY(0); pointer-events: auto; }
        .suggestion-chip {
            background-color: var(--suggestion-chip-bg); color: var(--suggestion-chip-text);
            border: 1px solid var(--border-color); padding: 6px 14px; border-radius: var(--border-radius-large);
            font-size: 13.5px; cursor: pointer; transition: all var(--transition-fast);
            box-shadow: var(--shadow-light);
        }
        .suggestion-chip:hover {
            background-color: var(--suggestion-chip-hover-bg); transform: translateY(-2px);
            border-color: var(--button-secondary-border); box-shadow: var(--shadow-medium);
        }
         .suggestion-chip:active { transform: scale(0.97); }


        /* --- Scroll to Bottom / Unread --- */
        #scroll-to-bottom {
             position: absolute; bottom: 20px; left: 20px; /* Consistent position */ background-color: var(--scroll-btn-bg); backdrop-filter: blur(8px); border: 1px solid var(--border-color); border-radius: var(--border-radius-round); width: 44px; height: 44px; padding: 0; cursor: pointer; display: flex; align-items: center; justify-content: center; box-shadow: var(--shadow-medium); opacity: 0; visibility: hidden; transition: opacity var(--transition-fast), transform var(--transition-fast), visibility 0s var(--transition-fast); z-index: 20; transform: scale(0.8); pointer-events: none;
        }
        #scroll-to-bottom.visible { opacity: 1; visibility: visible; transform: scale(1); pointer-events: auto; transition-delay: 0s; }
        #scroll-to-bottom:hover { background-color: var(--scroll-btn-hover-bg); transform: scale(1.08); box-shadow: var(--shadow-high); }
        #scroll-to-bottom svg { width: 22px; height: 22px; fill: var(--scroll-btn-icon); transition: transform var(--transition-fast); }
        #scroll-to-bottom:hover svg { transform: translateY(1px); }
        #new-message-counter {
            position: absolute; top: -4px; right: -4px; background-color: var(--counter-bg); color: var(--counter-text); border-radius: var(--border-radius-round); font-size: 11px; font-weight: 600; min-width: 20px; height: 20px; display: flex; align-items: center; justify-content: center; padding: 0 4px; box-shadow: 0 1px 3px rgba(0,0,0,0.2); opacity: 0; transform: scale(0.5); transition: opacity var(--transition-fast), transform var(--bezier-overshoot) 0.3s; line-height: 1;
        }
        #scroll-to-bottom.has-new #new-message-counter { opacity: 1; transform: scale(1); }

        .unread-marker {
             display: flex; align-items: center; justify-content: center; padding: 4px 0; margin: 10px 0; width: 100%; opacity: 0; transform: translateY(10px); transition: opacity var(--transition-medium), transform var(--transition-medium); pointer-events: none; position: sticky; bottom: 50%; /* Try to center */ z-index: 5;
        }
        .unread-marker.visible { opacity: 1; transform: translateY(0); }
        .unread-marker span {
             background-color: var(--unread-marker-bg); color: var(--unread-marker-text); padding: 4px 12px; border-radius: var(--border-radius-large); font-size: 12px; font-weight: 500; border: 1px solid var(--unread-marker-border); backdrop-filter: blur(5px); box-shadow: var(--shadow-medium);
        }


        /* --- Input Area V7 --- */
        #chat-input-area {
            display: flex; align-items: flex-end; padding: 12px 18px; border-top: 1px solid var(--border-color); background-color: var(--input-area-bg); flex-shrink: 0; transition: background-color var(--transition-medium), border-color var(--transition-medium); gap: 12px; border-bottom-left-radius: var(--border-radius-medium); border-bottom-right-radius: var(--border-radius-medium);
        }
        body.dark-mode #chat-input-area { border-top-color: var(--dm-border-color); }
        .input-wrapper { flex-grow: 1; position: relative; display: flex; }
        #user-input {
             flex-grow: 1; padding: 12px 45px 12px 18px; /* Space for clear button */ border: 1px solid var(--input-border); border-radius: var(--border-radius-large); font-size: 15.5px; background-color: var(--input-bg); color: var(--input-text); outline: none; transition: background-color var(--transition-medium), color var(--transition-medium), box-shadow var(--transition-fast), height var(--transition-fast) ease-in-out, border-color var(--transition-fast); resize: none; overflow-y: hidden; min-height: 50px; max-height: 180px; line-height: 1.55; box-sizing: border-box;
        }
        #user-input::placeholder { color: var(--timestamp-color); opacity: 0.8; }
        #user-input:focus { border-color: var(--input-border-focus); box-shadow: var(--input-shadow-focus), var(--input-glow); }

         #clear-input-button {
             position: absolute; right: 12px; top: 50%; transform: translateY(-50%); background: none; border: none; padding: 6px; cursor: pointer; border-radius: var(--border-radius-round); display: flex; align-items: center; justify-content: center; opacity: 0.7; transition: opacity var(--transition-fast), background-color var(--transition-fast);
         }
         #clear-input-button svg { width: 18px; height: 18px; fill: var(--msg-action-icon-fill); }
         #clear-input-button:hover { opacity: 1; background-color: var(--icon-button-hover-bg); }


        #send-button {
            width: 50px; height: 50px; padding: 0; background-color: var(--button-bg); border: none; border-radius: var(--border-radius-round); cursor: pointer; font-size: 0; display: flex; justify-content: center; align-items: center; transition: background-color var(--transition-fast), transform 0.3s var(--bezier-overshoot), opacity var(--transition-fast), box-shadow var(--transition-medium); flex-shrink: 0; align-self: flex-end; box-shadow: var(--shadow-medium);
        }
        #send-button::before {
            content: ''; display: block; width: 24px; height: 24px; background-color: var(--button-icon-fill);
            mask-image: url('data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"%3E%3Cpath d="M3.4 20.4l17.45-7.48a1 1 0 0 0 0-1.84L3.4 3.6a1 1 0 0 0-1.39 1.04l1.56 6.01-1.56 6.01a1 1 0 0 0 1.39 1.04zM5.12 14.01l.95-3.68h6.54l-.95 3.68-6.54-.01zm0-8l.95 3.68h6.54l-.95-3.68-6.54-.01z"/%3E%3C/svg%3E');
            mask-size: contain; mask-repeat: no-repeat; mask-position: center;
            -webkit-mask-image: url('data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"%3E%3Cpath d="M3.4 20.4l17.45-7.48a1 1 0 0 0 0-1.84L3.4 3.6a1 1 0 0 0-1.39 1.04l1.56 6.01-1.56 6.01a1 1 0 0 0 1.39 1.04zM5.12 14.01l.95-3.68h6.54l-.95 3.68-6.54-.01zm0-8l.95 3.68h6.54l-.95-3.68-6.54-.01z"/%3E%3C/svg%3E');
            -webkit-mask-size: contain; -webkit-mask-repeat: no-repeat; -webkit-mask-position: center;
            transition: background-color var(--transition-medium);
        }
        #send-button:hover { transform: scale(1.1); box-shadow: var(--shadow-high), 0 0 20px var(--glow-color); } /* Add glow on hover */
        #send-button:active { background-color: var(--button-active-bg); transform: scale(0.98); box-shadow: none; }
        #send-button:disabled { opacity: 0.5; cursor: not-allowed; background-color: color-mix(in srgb, var(--button-bg) 50%, var(--input-area-bg)); transform: scale(1); box-shadow: none; }
        #send-button.sending { /* Style when sending (optional) */
             transform: scale(1) !important; /* Prevent scale during sending */ box-shadow: none !important;
             animation: sending-pulse 1s infinite ease-in-out;
        }
        @keyframes sending-pulse { 0%, 100% { opacity: 0.7; } 50% { opacity: 1; } }

        /* --- Loading Indicator V7 --- */
        .typing-indicator .message-content {
             display: flex; align-items: center; gap: 6px; color: var(--timestamp-color); padding: 8px 0; /* Adjust padding */
        }
        .loading-dots span {
             display: inline-block; width: 7px; height: 7px; background-color: var(--loading-dot-color); border-radius: 50%; margin: 0 2px; animation: bounce-dots 1.4s infinite ease-in-out both;
        }
        .loading-dots span:nth-child(1) { animation-delay: -0.32s; }
        .loading-dots span:nth-child(2) { animation-delay: -0.16s; }
        @keyframes bounce-dots { 0%, 80%, 100% { transform: scale(0); } 40% { transform: scale(1.0); } }
        #stop-generation-button {
            background: none; border: 1px solid var(--button-secondary-border); padding: 5px; margin-right: 10px; cursor: pointer; display: flex; align-items: center; justify-content: center; width: 28px; height: 28px; border-radius: var(--border-radius-round); transition: background-color var(--transition-fast), transform var(--transition-fast);
        }
        #stop-generation-button svg { width: 14px; height: 14px; fill: var(--msg-action-icon-fill); }
        #stop-generation-button:hover { background-color: var(--button-secondary-hover-bg); }
        #stop-generation-button:active { transform: scale(0.9); }

        /* --- Custom Dialog V7 --- */
         #dialog-overlay { position: fixed; top: 0; left: 0; right: 0; bottom: 0; background-color: var(--dialog-overlay-bg); backdrop-filter: blur(6px); z-index: 1000; display: flex; align-items: center; justify-content: center; opacity: 0; visibility: hidden; transition: opacity var(--transition-medium), visibility 0s var(--transition-medium); }
         #dialog-overlay.visible { opacity: 1; visibility: visible; transition-delay: 0s;}
         #dialog-box { background-color: var(--dialog-bg); padding: 25px 30px; border-radius: var(--border-radius-medium); box-shadow: var(--dialog-shadow); max-width: 450px; width: 90%; text-align: center; transform: scale(0.9); transition: transform var(--transition-medium) var(--bezier-overshoot); }
         #dialog-overlay.visible #dialog-box { transform: scale(1); }
         #dialog-title { font-size: 18px; font-weight: 600; margin: 0 0 10px; color: var(--dialog-text); }
         #dialog-message { font-size: 15px; margin: 0 0 20px; color: var(--dialog-text); opacity: 0.9; line-height: 1.6; }
         #dialog-buttons { display: flex; justify-content: center; gap: 15px; }
         .dialog-button { padding: 10px 25px; border-radius: var(--border-radius-medium); border: none; font-size: 14px; font-weight: 500; cursor: pointer; transition: background-color var(--transition-fast), transform var(--transition-fast); }
         .dialog-button.confirm { background-color: var(--dialog-button-bg); color: var(--dialog-button-text); }
         .dialog-button.confirm:hover { background-color: color-mix(in srgb, var(--dialog-button-bg) 85%, black); }
         .dialog-button.cancel { background-color: var(--dialog-cancel-button-bg); color: var(--dialog-cancel-button-text); }
         .dialog-button.cancel:hover { background-color: color-mix(in srgb, var(--dialog-cancel-button-bg) 85%, black); }
         .dialog-button:active { transform: scale(0.96); }
    </style>
</head>
<body>

<!-- Splash Screen REMOVED -->

<!-- Chat Container - Visible Immediately -->
<div id="chat-container" aria-live="polite">
    <!-- Header -->
    <div id="chat-header">
        <div class="header-avatar" id="header-avatar-ai" aria-hidden="true">AI</div>
        <div class="header-content">
            <h1 id="chat-title" title="כותרת השיחה (מתעדכן אוטומטית)">
                <span>טוען כותרת...</span> <!-- Initial state -->
                <span id="chat-sentiment" title="סנטימנט השיחה" class="loading"></span> <!-- Loading state -->
            </h1>
            <div id="header-status">מתחבר...</div> <!-- Initial status -->
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
                 <select id="model-select" role="menuitem">
                     <option value="main-ai.php">Gemini 1.5 Flash</option>
                     <option value="gemini25.php">Gemini 1.5 Pro</option>
                      <!-- Add more models if available -->
                 </select>
             </div>
             <div class="popover-section">
                  <label for="style-select">סגנון שיחה:</label>
                  <select id="style-select" role="menuitem">
                      <option value="default">ברירת מחדל</option>
                      <option value="creative">יצירתי</option>
                      <option value="formal">רשמי</option>
                      <option value="concise">תמציתי</option>
                      <option value="humorous">הומוריסטי</option>
                  </select>
             </div>
             <div class="popover-section">
                 <div class="popover-checkbox" role="menuitemcheckbox" aria-checked="true" tabindex="0" id="send-on-enter-container"> <!-- Added ID -->
                    <input type="checkbox" id="send-on-enter-checkbox" tabindex="-1" checked>
                    <label for="send-on-enter-checkbox">שלח הודעה בלחיצת Enter</label>
                 </div>
             </div>
             <div class="popover-section">
                 <div class="popover-checkbox" role="menuitemcheckbox" aria-checked="false" tabindex="0" id="dark-mode-container"> <!-- Added ID -->
                    <input type="checkbox" id="dark-mode-checkbox" tabindex="-1">
                    <label for="dark-mode-checkbox" id="theme-toggle-text">ערכת נושא כהה</label>
                    <span id="theme-icon-placeholder" style="margin-right: auto; display: flex; align-items: center;">
                        <!-- Icons will be injected here -->
                    </span>
                 </div>
            </div>
              <!-- Chat Keywords Section -->
            <div class="popover-section keywords">
                <h3><svg style="width:16px; height:16px; vertical-align: middle; margin-left: 5px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M21.41 11.58l-9-9C12.05 2.22 11.55 2 11 2H4c-1.1 0-2 .9-2 2v7c0 .55.22 1.05.59 1.42l9 9c.36.36.86.58 1.41.58s1.05-.22 1.41-.59l7-7c.37-.36.59-.86.59-1.41s-.23-1.06-.59-1.42zM5.5 7C4.67 7 4 6.33 4 5.5S4.67 4 5.5 4 7 4.67 7 5.5 6.33 7 5.5 7z"/></svg>מילות מפתח בשיחה:</h3>
                <div class="keywords-container" id="chat-keywords-display">
                    <span class="loading"></span><span class="loading"></span> <!-- Loading placeholder -->
                </div>
            </div>
             <!-- Keyboard Shortcuts Section -->
            <div class="popover-section shortcuts">
                <label>קיצורי מקשים:</label>
                <ul>
                     <li><span>פתיחת/סגירת הגדרות:</span> <kbd>Alt</kbd> + <kbd>S</kbd></li>
                     <li><span>מיקוד שדה הקלט:</span> <kbd>Alt</kbd> + <kbd>I</kbd></li>
                     <li><span>שליחת הודעה:</span> <kbd>Ctrl</kbd> + <kbd>Enter</kbd></li>
                     <li><span>שורה חדשה:</span> <kbd>Shift</kbd> + <kbd>Enter</kbd></li>
                     <li><span>ניקוי קלט:</span> <kbd>Alt</kbd> + <kbd>X</kbd></li>
                     <li><span>גלילה לתחתית:</span> <kbd>End</kbd></li>
                     <li><span>גלילה ללמעלה:</span> <kbd>Home</kbd></li>
                </ul>
            </div>
             <div class="popover-actions">
                 <button class="popover-button secondary" id="reset-settings" title="אפס הגדרות לברירת מחדל">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 5V1L7 6l5 5V7c3.31 0 6 2.69 6 6s-2.69 6-6 6-6-2.69-6-6H4c0 4.42 3.58 8 8 8s8-3.58 8-8-3.58-8-8-8z"/></svg>
                    איפוס
                 </button>
                 <button class="popover-button secondary" id="download-chat" title="הורד היסטוריית שיחה">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M19 9h-4V3H9v6H5l7 7 7-7zM5 18v2h14v-2H5z"/></svg>
                    הורדה
                 </button>
                  <button class="popover-button secondary" id="clear-chat" title="נקה את כל השיחה">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/></svg>
                    ניקוי
                 </button>
            </div>
        </div>
    </div>

    <!-- Chat Output Area -->
    <div id="chat-output">
        <div id="chat-output-inner">
             <button id="load-more-button" style="display: none;">טען הודעות קודמות</button>
            <!-- Initial Message - Updated Text -->
             <div class="message-wrapper ai-message-wrapper initial-message" data-message-id="initial-0">
                 <div class="avatar" aria-hidden="true">AI</div>
                 <div class="message ai-message">
                     <div class="message-content"><span>שלום! אני ה-AI שלך, מוכן לשוחח.</span></div> <!-- Updated Initial Text -->
                     <div class="message-footer"><span class="timestamp" data-timestamp-abs="${new Date().toISOString()}">התחל</span></div>
                 </div>
             </div>
        </div>
        <!-- AI Suggestions Area -->
        <div id="ai-suggestions-area"></div>

        <div class="unread-marker" id="unread-marker" aria-live="polite"><span>הודעות חדשות</span></div>
        <button id="scroll-to-bottom" title="גלול לתחתית (End)" aria-label="גלול לתחתית"> <!-- Added shortcut to title -->
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M7.41 8.59L12 13.17l4.59-4.58L18 10l-6 6-6-6 1.41-1.41z"/><path fill="none" d="M0 0h24v24H0V0z"/></svg>
            <span id="new-message-counter">0</span>
        </button>
    </div>

    <!-- Input Area -->
    <div id="chat-input-area">
        <div class="input-wrapper">
            <textarea id="user-input" placeholder="שאל את ה-AI... (Alt+I)" rows="1" aria-label="הודעת משתמש"></textarea>
            <button id="clear-input-button" title="נקה קלט (Alt+X)" aria-label="נקה קלט" style="display: none;">
                 <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/></svg>
             </button>
        </div>
        <button id="send-button" aria-label="שלח (Ctrl+Enter)"></button>
    </div>

    <!-- Templates (Hidden) -->
    <div id="message-actions-menu-template" style="display: none;">
         <button class="action-menu-button copy-button" data-action="copy">
             <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M16 1H4c-1.1 0-2 .9-2 2v14h2V3h12V1zm3 4H8c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h11c1.1 0 2-.9 2-2V7c0-1.1-.9-2-2-2zm0 16H8V7h11v14z"/></svg>
             <span>העתק</span>
         </button>
         <button class="action-menu-button regenerate-button" data-action="regenerate">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M17.65 6.35C16.2 4.9 14.21 4 12 4c-4.42 0-7.99 3.58-7.99 8s3.57 8 7.99 8c3.73 0 6.84-2.55 7.73-6h-2.08c-.82 2.33-3.04 4-5.65 4-3.31 0-6-2.69-6-6s2.69-6 6-6c1.66 0 3.14.69 4.22 1.78L13 11h7V4l-2.35 2.35z"/></svg>
             <span>צור מחדש</span>
         </button>
          <button class="action-menu-button edit-button" data-action="edit">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/></svg>
             <span>ערוך</span>
         </button>
         <button class="action-menu-button delete-button" data-action="delete">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/></svg>
            <span>מחק</span>
         </button>
    </div>
    <div id="custom-dialog-template" style="display: none;">
         <div id="dialog-overlay">
             <div id="dialog-box" role="alertdialog" aria-labelledby="dialog-title" aria-describedby="dialog-message">
                 <h2 id="dialog-title">כותרת דיאלוג</h2>
                 <p id="dialog-message">הודעת דיאלוג כאן.</p>
                 <div id="dialog-buttons">
                     <button class="dialog-button confirm">אישור</button>
                     <button class="dialog-button cancel">ביטול</button>
                 </div>
             </div>
         </div>
    </div>

</div>

<script>
    // Wrap entire script in a self-executing function to avoid global scope pollution
    (function() {
        document.addEventListener('DOMContentLoaded', () => {
            // --- Element References (V7.1 - No Splash) ---
            // const splashScreen = document.getElementById('splash-screen'); // REMOVED
            const chatContainer = document.getElementById('chat-container');
            const chatOutput = document.getElementById('chat-output');
            const chatOutputInner = document.getElementById('chat-output-inner');
            const loadMoreButton = document.getElementById('load-more-button');
            const userInput = document.getElementById('user-input');
            const sendButton = document.getElementById('send-button');
            const chatInputArea = document.getElementById('chat-input-area');
            const settingsButton = document.getElementById('settings-button');
            const settingsPopover = document.getElementById('settings-popover');
            const modelSelect = document.getElementById('model-select');
            const styleSelect = document.getElementById('style-select');
            const sendOnEnterCheckbox = document.getElementById('send-on-enter-checkbox');
            const sendOnEnterContainer = document.getElementById('send-on-enter-container'); // Get container
            // const darkModeToggle = document.getElementById('dark-mode-toggle'); // REMOVED - Handled in popover
            const darkModeCheckbox = document.getElementById('dark-mode-checkbox');
            const darkModeContainer = document.getElementById('dark-mode-container');
            const themeToggleText = document.getElementById('theme-toggle-text');
            const themeIconPlaceholder = document.getElementById('theme-icon-placeholder'); // Popover icon
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
            const chatTitleElement = document.getElementById('chat-title').querySelector('span');
            const chatSentimentElement = document.getElementById('chat-sentiment');
            const headerStatusElement = document.getElementById('header-status');
            const chatKeywordsDisplay = document.getElementById('chat-keywords-display');
            const aiSuggestionsArea = document.getElementById('ai-suggestions-area');
            const initialMessageWrapper = document.querySelector('.initial-message');

            // --- State Variables (V7.1) ---
            const BASE_API_URL = 'https://php-render-test.onrender.com/'; // UPDATE IF NEEDED
            const CHAT_FEATURES_ENDPOINT = 'get_chat_features.php'; // Example Endpoint
            let messageCounterId = 0;
            let currentAbortController = null;
            let typingTimeout = null;
            let activeMessageMenu = null;
            let newMessagesCount = 0;
            let isScrolledToBottom = true;
            let lastMessageId = 'initial-0'; // Start with initial message ID
            let unreadMarkerVisible = false;
            let lastUnreadMarkerPosition = null;
            let sendOnEnter = true;
            let userInteracted = false;
            let originalDocumentTitle = document.title;
            // let splashVisible = true; // REMOVED
            let messageCountSinceFeatureFetch = 0;
            const FETCH_FEATURES_INTERVAL = 3;
            let isFetchingFeatures = false;
            const TYPING_SPEED = 18;
            const SCROLL_THRESHOLD = 250;
            const DEBOUNCE_DELAY = 120;
            // const SPLASH_DURATION = 1800; // REMOVED

            // Theme Icons (SVG as strings)
            const moonIconSvg = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" fill="currentColor"><path d="M12 3a9 9 0 1 0 9 9c0-.46-.04-.91-.1-1.36a5.5 5.5 0 0 1-9.8-5.54A9.01 9.01 0 0 0 12 3z"/></svg>`;
            const sunIconSvg = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" fill="currentColor"><path d="M12 7c-2.76 0-5 2.24-5 5s2.24 5 5 5 5-2.24 5-5-2.24-5-5-5zM2 13h2c.55 0 1-.45 1-1s-.45-1-1-1H2c-.55 0-1 .45-1 1s.45 1 1 1zm18 0h2c.55 0 1-.45 1-1s-.45-1-1-1h-2c-.55 0-1 .45-1 1s.45 1 1 1zM11 2v2c0 .55.45 1 1 1s1-.45 1-1V2c0-.55-.45-1-1-1s-1 .45-1 1zm0 18v2c0 .55.45 1 1 1s1-.45 1-1v-2c0-.55-.45-1-1-1s-1 .45-1 1zM5.64 5.64c-.39-.39-1.02-.39-1.41 0-.39.39-.39 1.02 0 1.41l1.41 1.41c.39.39 1.02.39 1.41 0 .39-.39.39-1.02 0-1.41L5.64 5.64zm12.73 12.73c-.39-.39-1.02-.39-1.41 0-.39.39-.39 1.02 0 1.41l1.41 1.41c.39.39 1.02.39 1.41 0 .39-.39.39-1.02 0-1.41l-1.41-1.41zM19.78 4.22c.39-.39.39-1.02 0-1.41-.39-.39-1.02-.39-1.41 0l-1.41 1.41c-.39.39-.39 1.02 0 1.41.39.39 1.02.39 1.41 0l1.41-1.41zM7.05 18.36c.39-.39.39-1.02 0-1.41-.39-.39-1.02-.39-1.41 0l-1.41 1.41c-.39.39-.39 1.02 0 1.41.39.39 1.02.39 1.41 0l1.41-1.41z"/></svg>`;

            // --- Utility Functions (V7.1 - Marked.js added, debounce included) ---
             function debounce(func, wait) { let timeout; return function executedFunction(...args) { const later = () => { clearTimeout(timeout); func.apply(this, args); }; clearTimeout(timeout); timeout = setTimeout(later, wait); }; };
             function getCurrentTimestamp(iso = false) { const now = new Date(); if (iso) return now.toISOString(); const hours = now.getHours().toString().padStart(2, '0'); const minutes = now.getMinutes().toString().padStart(2, '0'); return `${hours}:${minutes}`; }
             function formatTimestamp(isoTimestamp) { if (!isoTimestamp || isoTimestamp === 'התחל') return isoTimestamp; try { const date = new Date(isoTimestamp); const hours = date.getHours().toString().padStart(2, '0'); const minutes = date.getMinutes().toString().padStart(2, '0'); return `${hours}:${minutes}`; } catch (e) { return isoTimestamp; /* Fallback */ } }
             function generateMessageId() { return `msg-${Date.now()}-${messageCounterId++}`; }
             function focusElement(element) { if (element) setTimeout(() => element.focus(), 50); } // Short delay
             function escapeHtml(unsafe) { return unsafe.replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/"/g, "&quot;").replace(/'/g, "&#039;"); }

            // Initialize Marked.js
             marked.setOptions({
                 breaks: true, gfm: true, sanitize: false, // Set to true if markdown source is untrusted
                  highlight: function(code, lang) { // Optional: Add syntax highlighting with a library like highlight.js
                      // const language = hljs.getLanguage(lang) ? lang : 'plaintext';
                      // return hljs.highlight(code, { language }).value;
                       return escapeHtml(code); // Basic escaping if no highlighter
                  }
             });

             function smoothScrollToBottom() { chatOutput.scrollTo({ top: chatOutput.scrollHeight, behavior: 'smooth' }); }
             function instantScrollToBottom() { chatOutput.scrollTop = chatOutput.scrollHeight; }
             function updateScrollState() { const isBottom = chatOutput.scrollHeight - chatOutput.scrollTop - chatOutput.clientHeight < SCROLL_THRESHOLD; const wasScrolledToBottom = isScrolledToBottom; if (isBottom) { if (newMessagesCount > 0) { resetNewMessageCounter(); hideUnreadMarker(); } } isScrolledToBottom = isBottom; scrollToBottomButton.classList.toggle('visible', !isScrolledToBottom); scrollToBottomButton.classList.toggle('has-new', newMessagesCount > 0 && !isScrolledToBottom); }
             const debouncedUpdateScrollState = debounce(updateScrollState, DEBOUNCE_DELAY);
             function incrementNewMessageCounter() { if (!isScrolledToBottom) { newMessagesCount++; newMessageCounter.textContent = newMessagesCount > 9 ? '9+' : newMessagesCount; updateDocumentTitle(newMessagesCount); scrollToBottomButton.classList.add('has-new'); showUnreadMarker(); } }
             function resetNewMessageCounter() { newMessagesCount = 0; newMessageCounter.textContent = '0'; updateDocumentTitle(); scrollToBottomButton.classList.remove('has-new'); }
             function showUnreadMarker() { if (!isScrolledToBottom && !unreadMarkerVisible) { const firstUnread = chatOutput.querySelector(`[data-message-id="${lastMessageId}"]`); if (firstUnread) { const markerTop = firstUnread.offsetTop - chatOutput.offsetTop - 50; // Position above the last message if (markerTop > lastUnreadMarkerPosition || lastUnreadMarkerPosition === null) { unreadMarker.style.top = `${markerTop}px`; unreadMarker.classList.add('visible'); unreadMarkerVisible = true; lastUnreadMarkerPosition = markerTop; } } } }
             function hideUnreadMarker(setFlag = true) { unreadMarker.classList.remove('visible'); if (setFlag) { unreadMarkerVisible = false; lastUnreadMarkerPosition = null; } }
             function updateDocumentTitle(count = 0) { document.title = count > 0 ? `(${count}) ${originalDocumentTitle}` : originalDocumentTitle; }
             function toggleSettingsPopover(show) { const isVisible = settingsPopover.classList.contains('visible'); if (show === undefined) show = !isVisible; if (show && !isVisible) { settingsPopover.classList.add('visible'); settingsButton.setAttribute('aria-expanded', 'true'); } else if (!show && isVisible) { settingsPopover.classList.remove('visible'); settingsButton.setAttribute('aria-expanded', 'false'); } }
             function openMessageActionMenu(triggerButton, messageElement) { closeMessageActionMenu(); const menuContent = messageActionsMenuTemplate.innerHTML; activeMessageMenu = document.createElement('div'); activeMessageMenu.id = 'message-actions-menu'; activeMessageMenu.innerHTML = menuContent; const messageId = messageElement.closest('.message-wrapper').dataset.messageId; const isUser = messageElement.classList.contains('user-message'); const isAI = messageElement.classList.contains('ai-message'); activeMessageMenu.querySelectorAll('button').forEach(btn => { const action = btn.dataset.action; if ((action === 'regenerate' || action === 'rate-good' || action === 'rate-bad') && !isAI) { btn.style.display = 'none'; } if (action === 'edit' && !isUser) { btn.style.display = 'none'; } btn.addEventListener('click', (e) => handleActionMenuClick(e, action, messageId)); }); document.body.appendChild(activeMessageMenu); const triggerRect = triggerButton.getBoundingClientRect(); const menuRect = activeMessageMenu.getBoundingClientRect(); let top = triggerRect.bottom + window.scrollY + 5; let left = triggerRect.left + window.scrollX; if (left + menuRect.width > window.innerWidth - 10) { left = window.innerWidth - menuRect.width - 10; } if (top + menuRect.height > window.innerHeight - 10) { top = triggerRect.top + window.scrollY - menuRect.height - 5; } activeMessageMenu.style.top = `${top}px`; activeMessageMenu.style.left = `${left}px`; activeMessageMenu.classList.add('visible'); }
             function closeMessageActionMenu() { if (activeMessageMenu) { activeMessageMenu.remove(); activeMessageMenu = null; } }
             function handleActionMenuClick(event, action, messageId) { console.log(`Action clicked: ${action} for message ${messageId}`); const messageWrapper = chatOutputInner.querySelector(`.message-wrapper[data-message-id="${messageId}"]`); if (!messageWrapper) return; const messageElement = messageWrapper.querySelector('.message'); switch (action) { case 'copy': handleCopyClick(event); break; case 'regenerate': handleRegenerateClick(event); break; case 'edit': console.warn("Edit action not implemented yet."); break; case 'delete': deleteMessage(messageId); break; } closeMessageActionMenu(); }
             function deleteMessage(messageId) { showCustomDialog({ title: "מחיקת הודעה", message: "האם אתה בטוח שברצונך למחוק הודעה זו?", confirmText: "מחק", cancelText: "ביטול", onConfirm: () => { const messageWrapper = chatOutputInner.querySelector(`.message-wrapper[data-message-id="${messageId}"]`); if (messageWrapper) { messageWrapper.style.transition = 'opacity 0.3s ease, transform 0.3s ease'; messageWrapper.style.opacity = '0'; messageWrapper.style.transform = 'scale(0.9)'; setTimeout(() => messageWrapper.remove(), 300); console.log("Message", messageId, "deleted."); // Here you might want to update chat history/context for the AI } } }); }
             function getChatHistory(forRegeneration = false, regenerationTargetMsgId = null) { const history = []; const messages = chatOutputInner.querySelectorAll('.message-wrapper:not(.initial-message)'); messages.forEach((wrapper) => { const messageId = wrapper.dataset.messageId; const messageDiv = wrapper.querySelector('.message'); if (!messageDiv) return; const sender = messageDiv.classList.contains('user-message') ? 'user' : 'ai'; if (forRegeneration && messageId === regenerationTargetMsgId && sender === 'ai') return; const contentElement = messageDiv.querySelector('.message-content'); let content = ''; if (contentElement) { // Basic reconstruction, might need improvement for complex markdown content = Array.from(contentElement.childNodes).map(node => node.textContent).join('').trim(); } if (content) { history.push({ role: sender === 'user' ? 'user' : 'model', content: content }); } }); return history; }
             function generateAvatarContent(name) { return name ? name.substring(0, 2).toUpperCase() : '??'; }
             function getRandomColor(seed) { /* ... Not used in V7.1 ... */ }
             function addCopyButtonToCodeBlock(preElement) { if (!preElement || preElement.querySelector('.copy-code-button')) return; const copyButton = document.createElement('button'); copyButton.textContent = 'העתק'; copyButton.className = 'copy-code-button'; copyButton.setAttribute('aria-label', 'העתק קוד'); copyButton.addEventListener('click', (e) => { e.stopPropagation(); const codeElement = preElement.querySelector('code') || preElement; const codeToCopy = (codeElement.textContent || '').replace(/העתק$|הועתק!$|שגיאה$/,'').trim(); navigator.clipboard.writeText(codeToCopy).then(() => { copyButton.textContent = 'הועתק!'; copyButton.classList.add('copied'); setTimeout(() => { copyButton.textContent = 'העתק'; copyButton.classList.remove('copied'); }, 1500); }).catch(err => { console.error('שגיאה בהעתקת קוד: ', err); copyButton.textContent = 'שגיאה'; }); }); preElement.style.position = 'relative'; preElement.appendChild(copyButton); }
             function showCustomDialog(options) { const dialog = customDialogTemplate.firstElementChild.cloneNode(true); const titleEl = dialog.querySelector('#dialog-title'); const messageEl = dialog.querySelector('#dialog-message'); const confirmBtn = dialog.querySelector('.dialog-button.confirm'); const cancelBtn = dialog.querySelector('.dialog-button.cancel'); titleEl.textContent = options.title || 'אישור'; messageEl.textContent = options.message || ''; confirmBtn.textContent = options.confirmText || 'אישור'; cancelBtn.textContent = options.cancelText || 'ביטול'; const closeDialog = () => { dialog.classList.remove('visible'); setTimeout(() => dialog.remove(), 300); }; confirmBtn.onclick = () => { if (options.onConfirm) options.onConfirm(); closeDialog(); }; cancelBtn.onclick = () => { if (options.onCancel) options.onCancel(); closeDialog(); }; dialog.onclick = (e) => { if (e.target === dialog) closeDialog(); }; document.body.appendChild(dialog); setTimeout(() => dialog.classList.add('visible'), 10); }
             function handleUrlParameter() { /* ... V6 logic ... */ }
             function adjustTextareaHeight() { const MIN_HEIGHT = 50; userInput.style.height = 'auto'; const scrollHeight = userInput.scrollHeight; const maxHeight = parseInt(window.getComputedStyle(userInput).maxHeight, 10) || 180; if (scrollHeight <= MIN_HEIGHT) { userInput.style.height = `${MIN_HEIGHT}px`; userInput.style.overflowY = 'hidden'; } else if (scrollHeight > maxHeight) { userInput.style.height = `${maxHeight}px`; userInput.style.overflowY = 'auto'; } else { userInput.style.height = `${scrollHeight}px`; userInput.style.overflowY = 'hidden'; } }
             function handleCopyClick(event) { const button = event.currentTarget.closest('.action-menu-button') || event.currentTarget; // Handle direct or menu click const messageWrapper = chatOutputInner.querySelector(`.message-wrapper[data-message-id="${activeMessageMenu?.dataset.messageId || button.closest('.message-wrapper')?.dataset.messageId}"]`); if (!messageWrapper) return; const contentElement = messageWrapper.querySelector('.message-content'); if (!contentElement) return; const textToCopy = contentElement.innerText || contentElement.textContent || ''; navigator.clipboard.writeText(textToCopy.trim()).then(() => { if (button.classList.contains('action-menu-button')) { const span = button.querySelector('span'); const svg = button.querySelector('svg'); if (span) span.textContent = 'הועתק!'; button.classList.add('copy-success'); setTimeout(() => { span.textContent = 'העתק'; button.classList.remove('copy-success'); }, 1500); } else { /* Handle direct copy button if needed */ } }).catch(err => { console.error('Failed to copy message: ', err); }); }
             function handleRegenerateClick(event) { if (typingTimeout || currentAbortController) { showCustomDialog({title:"פעולה נחסמה", message:"אנא המתן לסיום התגובה הנוכחית או בטל אותה."}); return; } const button = event.currentTarget; const messageWrapper = button.closest('.message-wrapper.ai-message-wrapper'); if (!messageWrapper) return; const messageElement = messageWrapper.querySelector('.ai-message'); const userQuery = messageElement?.dataset.userQuery; const modelValue = messageElement?.dataset.modelValue; const modelName = messageElement?.dataset.modelName; const messageId = messageWrapper.dataset.messageId; if (!userQuery || !modelValue || !modelName || !messageId) { console.error('Regen Error: Missing data', messageElement?.dataset); return; } sendMessage(userQuery, { isRegeneration: true, originalAiMsgId: messageId, modelValueOverride: modelValue, modelNameOverride: modelName }, false); }
             function saveSettings() { try { localStorage.setItem('chatSettings_v7', JSON.stringify({ model: modelSelect.value, style: styleSelect.value, sendOnEnter: sendOnEnterCheckbox.checked, darkMode: darkModeCheckbox.checked })); console.log("Settings saved."); } catch (e) { console.warn("Failed to save settings to localStorage:", e); } }
             function loadSettings() { try { const saved = localStorage.getItem('chatSettings_v7'); if (saved) { const settings = JSON.parse(saved); if (settings.model && Array.from(modelSelect.options).some(o=>o.value === settings.model)) modelSelect.value = settings.model; if (settings.style && Array.from(styleSelect.options).some(o=>o.value === settings.style)) styleSelect.value = settings.style; sendOnEnterCheckbox.checked = settings.sendOnEnter !== false; sendOnEnter = sendOnEnterCheckbox.checked; darkModeCheckbox.checked = settings.darkMode === true; applyDarkMode(darkModeCheckbox.checked, false); // Apply loaded theme without saving again console.log("Settings loaded."); } else { applyDarkMode(false, false); // Default to light if no settings } } catch (e) { console.warn("Failed to load settings from localStorage:", e); applyDarkMode(false, false); // Default to light on error } }
             function applyDarkMode(isDark, save = true) { document.body.classList.toggle('dark-mode', isDark); themeToggleText.textContent = isDark ? 'ערכת נושא בהירה' : 'ערכת נושא כהה'; themeIconPlaceholder.innerHTML = isDark ? sunIconSvg : moonIconSvg; darkModeCheckbox.checked = isDark; // Sync checkbox if called directly if (save) saveSettings(); }
             function resetSettings() { showCustomDialog({ title: "איפוס הגדרות", message: "האם לאפס את כל ההגדרות לברירת המחדל?", confirmText: "אפס", onConfirm: () => { localStorage.removeItem('chatSettings_v7'); // Clear saved settings // Reset UI elements to default modelSelect.value = modelSelect.options[0].value; styleSelect.value = styleSelect.options[0].value; sendOnEnterCheckbox.checked = true; sendOnEnter = true; darkModeCheckbox.checked = false; applyDarkMode(false, false); // Apply default light theme without saving (will be saved on next change) console.log("Settings reset to default."); toggleSettingsPopover(false); // Close popover } }); }

            // --- Splash Screen Logic (REMOVED) ---
            /* function hideSplashScreen() { ... } */
            /* setTimeout(hideSplashScreen, SPLASH_DURATION); */

            // --- Add Message to Chat Function (V7.1 - Markdown & Grouping) ---
            function addMessageToChat(text, sender, options = {}) {
                const { isLoading = false, timestamp: isoTimestampInput = null, modelNameUsed = null, userQuery = null, modelValue = null, isLoadMore = false, messageIdOverride = null } = options;

                const messageId = messageIdOverride || generateMessageId();
                // Update lastMessageId only for new, non-loading, non-initial, non-loadMore messages
                 if (!isLoading && isoTimestampInput !== 'התחל' && !isLoadMore && !messageIdOverride) {
                    lastMessageId = messageId;
                 }

                const messageWrapper = document.createElement('div');
                messageWrapper.classList.add('message-wrapper', sender === 'user' ? 'user-message-wrapper' : 'ai-message-wrapper');
                 if (isoTimestampInput === 'התחל') messageWrapper.classList.add('initial-message');
                 messageWrapper.dataset.messageId = messageId;


                const avatarDiv = document.createElement('div');
                avatarDiv.classList.add('avatar');
                avatarDiv.setAttribute('aria-hidden', 'true');
                avatarDiv.textContent = generateAvatarContent(sender === 'user' ? 'Me' : 'AI'); // Simple initials

                const messageDiv = document.createElement('div');
                messageDiv.classList.add('message', sender === 'user' ? 'user-message' : 'ai-message');
                // Add data attributes for AI messages needed for regeneration etc.
                if (sender === 'ai' && !isLoading) {
                     if (modelNameUsed) messageDiv.dataset.modelName = modelNameUsed;
                     if (userQuery) messageDiv.dataset.userQuery = userQuery;
                     if (modelValue) messageDiv.dataset.modelValue = modelValue;
                 }

                const contentDiv = document.createElement('div');
                contentDiv.classList.add('message-content');

                if (isLoading) {
                     messageDiv.classList.add('typing-indicator');
                     contentDiv.innerHTML = `
                        <div class="loading-dots"><span></span><span></span><span></span></div>
                         <button id="stop-generation-button-${messageId}" class="stop-button" title="עצור יצירה" aria-label="עצור יצירה">
                             <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M7 7h10v10H7z"/></svg> <!-- Stop icon -->
                         </button>`;
                      messageDiv.appendChild(contentDiv);
                      const stopButton = messageDiv.querySelector(`#stop-generation-button-${messageId}`);
                      if (stopButton) stopButton.addEventListener('click', stopTypingAndGeneration);

                } else {
                    // Render Markdown for AI, plain text for User
                     if (sender === 'ai' && text) {
                        try { contentDiv.innerHTML = marked.parse(text); }
                        catch (e) { console.error("Markdown parsing error:", e); contentDiv.textContent = text; }
                     } else if (text) {
                         contentDiv.textContent = text; // User message or fallback
                     } else {
                         contentDiv.innerHTML = "&nbsp;"; // Ensure div has height
                     }
                     messageDiv.appendChild(contentDiv);

                     // Footer (Timestamp & Model) - only if not initial message
                     if (isoTimestampInput !== 'התחל') {
                         const footerDiv = document.createElement('div');
                         footerDiv.classList.add('message-footer');
                         const timestamp = formatTimestamp(isoTimestampInput || getCurrentTimestamp(true));
                         const timestampAbs = isoTimestampInput || getCurrentTimestamp(true); // Store ISO always

                         if (sender === 'ai' && modelNameUsed) {
                            const modelSpan = document.createElement('span');
                            modelSpan.classList.add('model-indicator');
                            modelSpan.textContent = `(${modelNameUsed})`;
                            footerDiv.appendChild(modelSpan);
                         }
                         const timestampSpan = document.createElement('span');
                         timestampSpan.classList.add('timestamp');
                         timestampSpan.textContent = timestamp;
                         timestampSpan.dataset.timestampAbs = timestampAbs; // Store full ISO time
                         footerDiv.appendChild(timestampSpan);
                         messageDiv.appendChild(footerDiv);
                     } else {
                         // Handle initial message footer separately if needed
                         const initialFooter = messageWrapper.querySelector('.message-footer');
                         if (initialFooter) {
                             initialFooter.querySelector('.timestamp').dataset.timestampAbs = getCurrentTimestamp(true);
                         }
                     }

                     // Ellipsis Trigger Button - only if not initial message
                     if (isoTimestampInput !== 'התחל') {
                         const ellipsisButton = document.createElement('button');
                         ellipsisButton.classList.add('message-actions-trigger');
                         ellipsisButton.setAttribute('aria-label', 'פעולות נוספות');
                         ellipsisButton.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M6 10c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm12 0c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm-6 0c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/></svg>';
                         ellipsisButton.addEventListener('click', (e) => {
                             e.stopPropagation();
                             openMessageActionMenu(ellipsisButton, messageDiv);
                         });
                         messageWrapper.appendChild(ellipsisButton); // Append to wrapper
                     }

                     // Add copy buttons AFTER markdown processing
                      if (sender === 'ai') {
                        contentDiv.querySelectorAll('pre').forEach(addCopyButtonToCodeBlock);
                      }
                }

                 // Append avatar and message to wrapper in correct order
                 if (sender === 'user') { messageWrapper.appendChild(messageDiv); messageWrapper.appendChild(avatarDiv); }
                 else { messageWrapper.appendChild(avatarDiv); messageWrapper.appendChild(messageDiv); }


                 // Append to DOM
                 const isNearBottom = chatOutput.scrollHeight - chatOutput.scrollTop - chatOutput.clientHeight < SCROLL_THRESHOLD + 50;
                 if (isLoadMore) {
                     chatOutputInner.insertBefore(messageWrapper, chatOutputInner.querySelector('.message-wrapper')); // Insert at top
                     // Don't scroll when loading more unless already at top
                 } else {
                    chatOutputInner.appendChild(messageWrapper);
                    if (isLoading || isNearBottom || isScrolledToBottom) {
                         instantScrollToBottom(); // Scroll immediately if loading or user is near bottom
                         isScrolledToBottom = true; // Assume scrolled down
                         resetNewMessageCounter();
                         hideUnreadMarker(false); // Hide marker but don't reset position yet
                    } else {
                        incrementNewMessageCounter(); // Increment if user is scrolled up
                    }
                 }
                 applyGroupingStyles(); // Recalculate grouping after adding

                 // Increment feature fetch counter only for new non-loading, non-initial, non-loadMore messages from AI
                 if (sender === 'ai' && !isLoading && isoTimestampInput !== 'התחל' && !isLoadMore) {
                    messageCountSinceFeatureFetch++;
                    if (messageCountSinceFeatureFetch >= FETCH_FEATURES_INTERVAL) {
                        fetchChatFeatures();
                    }
                 }

                return messageDiv; // Return the message div itself
            }

            // --- Apply Grouping Styles ---
            function applyGroupingStyles() {
                const messages = Array.from(chatOutputInner.querySelectorAll('.message-wrapper:not(.initial-message)'));
                messages.forEach((wrapper, index) => {
                    // Clear previous grouping classes
                    wrapper.classList.remove('is-grouped-start', 'is-grouped-middle', 'is-grouped-end');

                    const messageDiv = wrapper.querySelector('.message');
                    if (!messageDiv) return;
                    const currentSender = messageDiv.classList.contains('user-message') ? 'user' : 'ai';

                    const prevWrapper = messages[index - 1];
                    const nextWrapper = messages[index + 1];

                    let prevSender = null;
                    if (prevWrapper) {
                        const prevMessageDiv = prevWrapper.querySelector('.message');
                        if (prevMessageDiv) prevSender = prevMessageDiv.classList.contains('user-message') ? 'user' : 'ai';
                    }

                    let nextSender = null;
                    if (nextWrapper) {
                        const nextMessageDiv = nextWrapper.querySelector('.message');
                        if (nextMessageDiv) nextSender = nextMessageDiv.classList.contains('user-message') ? 'user' : 'ai';
                    }

                    const isStart = prevSender !== currentSender && nextSender === currentSender;
                    const isMiddle = prevSender === currentSender && nextSender === currentSender;
                    const isEnd = prevSender === currentSender && nextSender !== currentSender;

                    if (isStart) wrapper.classList.add('is-grouped-start');
                    else if (isMiddle) wrapper.classList.add('is-grouped-middle');
                    else if (isEnd) wrapper.classList.add('is-grouped-end');
                });
            }


            // --- AI Typing Effect Function (V7.1 - Markdown aware) ---
            function typeAiResponse(messageElement, fullText) {
                const contentDiv = messageElement.querySelector('.message-content');
                if (!contentDiv) { console.error("Content div not found for typing"); return; }

                contentDiv.innerHTML = ''; // Clear previous content
                messageElement.classList.add('typing-cursor');

                 // Basic streaming simulation: split by lines or sentences
                 const chunks = fullText.split('\n'); // Split by newline first
                 let chunkIndex = 0;
                 clearTimeout(typingTimeout);
                 typingTimeout = null;

                function typeChunk() {
                     if (currentAbortController?.signal.aborted) {
                         console.log("Typing aborted.");
                         finalizeAiMessage(messageElement, contentDiv); // Finalize with current content
                         return;
                     }
                    if (chunkIndex >= chunks.length) {
                         finalizeAiMessage(messageElement, contentDiv); // Done
                         return;
                    }

                    let currentChunk = chunks[chunkIndex].trim();
                     if (chunkIndex < chunks.length - 1) { currentChunk += '\n'; } // Add back newline except for last chunk

                     // Append the chunk and re-render markdown incrementally
                     contentDiv.textContent += currentChunk; // Append plain text first
                     try {
                         // Render the *entire* accumulated text as Markdown
                          contentDiv.innerHTML = marked.parse(contentDiv.textContent);
                           // Re-apply copy buttons to any code blocks rendered
                          contentDiv.querySelectorAll('pre').forEach(addCopyButtonToCodeBlock);
                     } catch(e) {
                         console.error("Incremental Markdown parsing error:", e);
                         // Fallback: contentDiv already has the appended plain text
                     }


                    chunkIndex++;
                    instantScrollToBottom(); // Scroll as content grows
                    const delay = TYPING_SPEED * (currentChunk.length / 10 + 1); // Delay based on chunk length
                    typingTimeout = setTimeout(typeChunk, Math.min(delay, 300)); // Max delay 300ms
                 }

                typeChunk(); // Start typing the first chunk
            }


            // --- Finalize AI Message (V7.1 - Use Marked.js) ---
            function finalizeAiMessage(messageElement, contentDiv) {
                 clearTimeout(typingTimeout); typingTimeout = null;
                 if (messageElement) {
                     messageElement.classList.remove('typing-cursor');
                      // Ensure final render with full markdown
                     const finalFullText = contentDiv?.textContent || ''; // Get accumulated text
                     if (contentDiv && finalFullText) {
                         try {
                             contentDiv.innerHTML = marked.parse(finalFullText); // Final render
                             contentDiv.querySelectorAll('pre').forEach(addCopyButtonToCodeBlock);
                         } catch (e) { console.error("Markdown parsing error on finalize:", e); }
                     }
                 }
                 // --- Re-enable Input ---
                  if (!currentAbortController) { // Only enable if no fetch is active
                    enableInput();
                  }
                 // --- End Re-enable Input ---
                 smoothScrollToBottom();
                 applyGroupingStyles(); // Apply grouping after message is finalized
                 showSuggestions(); // Show suggestions after message finalized
            }

            // --- Enable/Disable Input ---
            function enableInput() { userInput.disabled = false; sendButton.disabled = false; sendButton.classList.remove('sending'); userInput.style.opacity = '1'; chatInputArea.style.opacity = '1'; focusElement(userInput); }
            function disableInput() { userInput.disabled = true; sendButton.disabled = true; sendButton.classList.add('sending'); userInput.style.opacity = '0.7'; chatInputArea.style.opacity = '0.7'; }

             // --- Stop Typing and Generation (V7.1) ---
             function stopTypingAndGeneration() {
                 console.log('Attempting to stop generation...');
                 if (currentAbortController) {
                     currentAbortController.abort();
                     currentAbortController = null; // Clear immediately after aborting
                 }
                 clearTimeout(typingTimeout);
                 typingTimeout = null;
                 const typingIndicator = chatOutputInner.querySelector('.message.typing-indicator');
                 if (typingIndicator) {
                    finalizeAiMessage(typingIndicator, typingIndicator.querySelector('.message-content'));
                 }
                 enableInput(); // Always enable input after stopping
                 console.log('Generation stop process complete.');
             }

             // --- Fetch Chat Features (V7.1 - Mocked) ---
             async function fetchChatFeatures() {
                 if (isFetchingFeatures) return;
                 isFetchingFeatures = true;
                 messageCountSinceFeatureFetch = 0;

                 chatSentimentElement.className = 'loading'; chatSentimentElement.innerHTML = '';
                 chatKeywordsDisplay.innerHTML = '<span class="loading"></span><span class="loading"></span>';
                 aiSuggestionsArea.classList.remove('visible');

                 const history = getChatHistory();
                 const historyString = history.map(m => `[${m.role.toUpperCase()}] ${m.content}`).join('\n');

                 try {
                     console.log("Simulating fetchChatFeatures...");
                     await new Promise(resolve => setTimeout(resolve, 800 + Math.random() * 700));
                     const mockResponse = { success: true, data: { title: generateMockTitle(history), sentiment: ['positive', 'negative', 'neutral'][Math.floor(Math.random() * 3)], keywords: generateMockKeywords(history), suggestions: generateMockSuggestions(history) } };
                     const data = mockResponse.data;

                     chatTitleElement.textContent = data.title || 'שיחה כללית';
                     chatTitleElement.parentElement.title = `כותרת: ${data.title || 'לא נמצאה'}`;
                     chatSentimentElement.className = ''; chatSentimentElement.classList.add(data.sentiment || 'neutral');
                     chatSentimentElement.innerHTML = getSentimentIcon(data.sentiment);
                     chatSentimentElement.title = `סנטימנט: ${translateSentiment(data.sentiment)}`;
                     headerStatusElement.textContent = `סנטימנט: ${translateSentiment(data.sentiment)} | מילות מפתח: ${data.keywords.length}`; // Example combined status

                     if (data.keywords && data.keywords.length > 0) { chatKeywordsDisplay.innerHTML = data.keywords.map(kw => `<span class="keyword-chip">${kw}</span>`).join(''); }
                     else { chatKeywordsDisplay.innerHTML = '<span>אין מילות מפתח עדיין</span>'; }
                     sessionStorage.setItem('aiSuggestions', JSON.stringify(data.suggestions || []));
                     showSuggestions();

                 } catch (error) {
                     console.error("Error fetching chat features:", error);
                     chatTitleElement.textContent = originalDocumentTitle; chatSentimentElement.className = 'neutral'; chatSentimentElement.innerHTML = getSentimentIcon('neutral'); chatKeywordsDisplay.innerHTML = '<span>שגיאה בטעינה</span>';
                     headerStatusElement.textContent = 'שגיאה בעדכון סטטוס';
                 } finally {
                     isFetchingFeatures = false;
                 }
             }
             // --- Helper functions for Mock Data (V7.1) ---
             function generateMockTitle(history) { if (history.length === 0) return "שיחה חדשה"; const lastUserMsg = [...history].reverse().find(m => m.role === 'user' || m.role === 'model'); return lastUserMsg ? `דיון על ${lastUserMsg.content.split(' ')[0]}...` : "נושא לא מזוהה"; }
             function generateMockKeywords(history) { const words = history.flatMap(m => m.content.split(/\s+/)); const commonWords = ['את', 'של', 'על', 'עם', 'זה', 'הוא', 'היא', 'אני', 'אתה', 'מה', 'איך', 'למה', 'כן', 'לא', 'אבל', 'או', 'אז', 'כי', 'גם', 'אם', 'רק', 'אולי', 'יכול', 'יש', 'אין', 'לי', 'לך', 'לו', 'לה', 'לנו', 'לכם', 'להם', 'להן']; const freq = words.reduce((acc, word) => { const cleanWord = word.toLowerCase().replace(/[.,!?"';:()]/g, ''); if (cleanWord.length > 2 && !commonWords.includes(cleanWord) && !/^\d+$/.test(cleanWord)) { acc[cleanWord] = (acc[cleanWord] || 0) + 1; } return acc; }, {}); return Object.entries(freq).sort((a, b) => b[1] - a[1]).slice(0, 4).map(entry => entry[0]); } // Get top 4
             function generateMockSuggestions(history) { const baseSuggestions = ["ספר לי עוד", "תוכל להרחיב?", "מה ההשלכות?", "ומה דעתך על...?", "יש דוגמאות?", "במה זה שונה מ...?"]; const lastMsgContent = history.length > 0 ? history[history.length-1].content.toLowerCase() : ""; let count = Math.floor(Math.random() * 3) + 1; // 1 to 3 suggestions let suggestions = []; if (lastMsgContent.includes("שאלה")) { suggestions.push("יש לי שאלה נוספת"); } if (lastMsgContent.includes("בעיה")) { suggestions.push("מה הפתרון לבעיה?"); } while(suggestions.length < count) { let randomSuggestion = baseSuggestions[Math.floor(Math.random() * baseSuggestions.length)]; if (!suggestions.includes(randomSuggestion)) { suggestions.push(randomSuggestion); } } return suggestions; }
             function getSentimentIcon(sentiment) { /* ... Same as V7 ... */ }
             function translateSentiment(sentiment) { /* ... Same as V7 ... */ }

            // --- Show AI Suggestions (V7.1) ---
            function showSuggestions() {
                 const suggestions = JSON.parse(sessionStorage.getItem('aiSuggestions') || '[]');
                 aiSuggestionsArea.innerHTML = ''; // Clear previous
                 if (suggestions && suggestions.length > 0) {
                     suggestions.forEach(suggestion => {
                         const chip = document.createElement('button');
                         chip.classList.add('suggestion-chip');
                         chip.textContent = suggestion;
                         chip.onclick = () => {
                             userInput.value = suggestion;
                             adjustTextareaHeight(); // Adjust height after setting value
                             sendMessage();
                             aiSuggestionsArea.classList.remove('visible');
                             sessionStorage.removeItem('aiSuggestions');
                         };
                         aiSuggestionsArea.appendChild(chip);
                     });
                     aiSuggestionsArea.classList.add('visible');
                 } else {
                     aiSuggestionsArea.classList.remove('visible');
                 }
             }

            // --- Send Message Function (V7.1) ---
             async function sendMessage(textToSend, options = {}, skipResponse = false) {
                 const { isRegeneration = false, originalAiMsgId = null, modelValueOverride = null, modelNameOverride = null } = options;
                 const currentText = textToSend !== undefined ? textToSend.trim() : userInput.value.trim();

                 if (currentText === '' || currentAbortController) return; // Prevent empty or concurrent sends

                 disableInput(); // Disable input fields
                 hideSuggestions(); // Hide suggestions when user sends message

                 const userMessageId = generateMessageId(); // Generate ID for user message wrapper
                 if (!isRegeneration) {
                     addMessageToChat(currentText, 'user', { timestamp: getCurrentTimestamp(true), messageIdOverride: userMessageId });
                     userInput.value = '';
                     adjustTextareaHeight();
                     instantScrollToBottom(); // Scroll immediately after user sends
                     isScrolledToBottom = true; resetNewMessageCounter(); hideUnreadMarker();
                 } else if (originalAiMsgId) {
                    const oldAiMsgWrapper = chatOutputInner.querySelector(`.message-wrapper[data-message-id="${originalAiMsgId}"]`);
                    if (oldAiMsgWrapper) oldAiMsgWrapper.remove();
                     applyGroupingStyles(); // Reapply grouping after removal
                 }

                 if (skipResponse) { enableInput(); return; }

                 const loadingIndicatorElement = addMessageToChat(null, 'ai', { isLoading: true });
                 instantScrollToBottom(); // Ensure indicator is visible

                 const historyArray = getChatHistory(isRegeneration, originalAiMsgId);
                 const historyString = historyArray.map(m => `[${m.role.toUpperCase()}] ${m.content}`).join('\n');
                 // Add the current user text explicitly if it wasn't part of history yet
                 const requestPayloadText = isRegeneration ? historyString : `${historyString}\n[USER] ${currentText}`;


                 const selectedOption = modelValueOverride ? (Array.from(modelSelect.options).find(opt => opt.value === modelValueOverride) || modelSelect.options[modelSelect.selectedIndex]) : modelSelect.options[modelSelect.selectedIndex];
                 const modelName = modelNameOverride || selectedOption.text;
                 const selectedModelFile = selectedOption.value;
                 const currentApiUrl = BASE_API_URL + selectedModelFile;

                 currentAbortController = new AbortController();
                 const signal = currentAbortController.signal;

                 try {
                     const requestBody = { text: requestPayloadText }; // API expects 'text' field containing history + query
                     const response = await fetch(currentApiUrl, { method: 'POST', headers: { 'Content-Type': 'application/json' }, body: JSON.stringify(requestBody), signal });

                     if (signal.aborted) throw new DOMException('Aborted by user', 'AbortError');

                     if (loadingIndicatorElement && loadingIndicatorElement.closest('.message-wrapper')) {
                         loadingIndicatorElement.closest('.message-wrapper').remove(); // Remove the whole wrapper
                         applyGroupingStyles(); // Reapply grouping after removal
                     }

                     if (!response.ok) { let errorText = `Server Error: ${response.status}`; try { const errorData = await response.json(); errorText += ` - ${errorData?.error || errorData?.message || 'Unknown error'}`; } catch (e) {} throw new Error(errorText); }

                     const data = await response.json();
                     if (data && data.text) {
                         const aiMessageElement = addMessageToChat('', 'ai', { timestamp: getCurrentTimestamp(true), modelNameUsed: modelName, userQuery: currentText, modelValue: selectedModelFile });
                         typeAiResponse(aiMessageElement, data.text); // finalizeAiMessage will re-enable input
                     } else { throw new Error("Invalid response format from server."); }

                 } catch (error) {
                     if (loadingIndicatorElement && loadingIndicatorElement.closest('.message-wrapper')) {
                          loadingIndicatorElement.closest('.message-wrapper').remove();
                          applyGroupingStyles();
                      }
                     if (error.name === 'AbortError') { console.log('Fetch aborted.'); }
                     else { console.error("Error sending/receiving message:", error); addMessageToChat(`שגיאה: ${error.message}`, 'ai', { modelNameUsed: modelName }); }
                      enableInput(); // Ensure input is enabled on error/abort
                 } finally {
                     currentAbortController = null; // Clear controller when done
                 }
            }

             // --- Hide Suggestions ---
             function hideSuggestions() {
                 aiSuggestionsArea.classList.remove('visible');
                 sessionStorage.removeItem('aiSuggestions'); // Optional: Clear suggestions when user types/sends
             }


            // --- Initialization (V7.1) ---
            function initializeChat() {
                console.log("Initializing Chat Interface V7.1...");
                loadSettings(); // Load theme, model, etc.
                adjustTextareaHeight(); // Initial height
                instantScrollToBottom(); // Start at the bottom
                enableInput(); // Ensure input is enabled
                updateScrollState(); // Set initial scroll state
                originalDocumentTitle = document.title; // Store original title
                handleUrlParameter(); // Process URL param if exists
                applyGroupingStyles(); // Initial grouping calculation

                 // Initial feature fetch - moved here from splash handler
                 setTimeout(fetchChatFeatures, 500); // Fetch features shortly after UI is ready

                console.log("Futuristic AI Chat V7.1 (No Splash) initialized.");
            }


            // --- Event Listeners Setup (V7.1) ---
            sendButton.addEventListener('click', () => sendMessage());
            userInput.addEventListener('keypress', (event) => { if (event.key === 'Enter' && !event.shiftKey && !event.isComposing && sendOnEnter) { event.preventDefault(); sendMessage(); } });
            userInput.addEventListener('input', () => { adjustTextareaHeight(); clearInputButton.style.display = userInput.value ? 'flex' : 'none'; hideSuggestions(); /* Hide suggestions on input */ });
            clearInputButton.addEventListener('click', () => { userInput.value = ''; adjustTextareaHeight(); clearInputButton.style.display = 'none'; focusElement(userInput); });
            chatOutput.addEventListener('scroll', debouncedUpdateScrollState);
            scrollToBottomButton.addEventListener('click', () => { smoothScrollToBottom(); resetNewMessageCounter(); hideUnreadMarker(); });
            settingsButton.addEventListener('click', () => toggleSettingsPopover());
            document.addEventListener('click', (e) => { if (!settingsPopover.contains(e.target) && !settingsButton.contains(e.target) && settingsPopover.classList.contains('visible')) { toggleSettingsPopover(false); } if (activeMessageMenu && !activeMessageMenu.contains(e.target)) { closeMessageActionMenu(); } }); // Close popovers on outside click
             // Settings Listeners
             modelSelect.addEventListener('change', saveSettings);
             styleSelect.addEventListener('change', saveSettings);
             sendOnEnterContainer.addEventListener('click', (e) => { if(e.target !== sendOnEnterCheckbox) sendOnEnterCheckbox.checked = !sendOnEnterCheckbox.checked; sendOnEnter = sendOnEnterCheckbox.checked; saveSettings(); }); // Toggle on container click
             darkModeContainer.addEventListener('click', (e) => { if(e.target !== darkModeCheckbox) darkModeCheckbox.checked = !darkModeCheckbox.checked; applyDarkMode(darkModeCheckbox.checked); }); // Toggle on container click
             downloadChatButton.addEventListener('click', downloadChat);
             clearChatButton.addEventListener('click', clearChat);
             resetSettingsButton.addEventListener('click', resetSettings);
             // Keyboard Shortcuts
             document.addEventListener('keydown', (e) => { userInteracted = true; if (e.altKey && e.key.toLowerCase() === 's') { e.preventDefault(); toggleSettingsPopover(); } else if (e.altKey && e.key.toLowerCase() === 'i') { e.preventDefault(); focusElement(userInput); } else if (e.altKey && e.key.toLowerCase() === 'x') { e.preventDefault(); userInput.value = ''; adjustTextareaHeight(); clearInputButton.style.display = 'none'; } else if (e.key === 'Escape') { if (settingsPopover.classList.contains('visible')) toggleSettingsPopover(false); if (activeMessageMenu) closeMessageActionMenu(); } else if (e.key === 'End') { instantScrollToBottom(); } else if (e.key === 'Home') { chatOutput.scrollTo({ top: 0, behavior: 'smooth' }); } else if (e.ctrlKey && e.key === 'Enter' && !sendOnEnter) { sendMessage(); } });

            // Call initialization
            initializeChat();

        }); // End DOMContentLoaded
    })(); // End IIFE
</script>

<?php
/* PHP logging code remains commented or handled separately */
?>

</body>
</html>
