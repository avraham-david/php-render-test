<!DOCTYPE html>
<html lang="he" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Futuristic AI Chat V7.2</title> <!-- Updated Title -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Marked.js for Markdown Rendering -->
    <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
    <style>
        /* --- משתני עיצוב גלובליים V7.2 --- */
        :root {
            /* --- Variables from V7 --- */
            --font-main: 'Rubik', sans-serif;
            --font-code: 'Fira Code', monospace; /* Ensure you have this font or use a fallback */
            --border-radius-small: 6px;
            --border-radius-medium: 14px;
            --border-radius-large: 30px;
            --border-radius-round: 50%;
            --bezier-elegant: cubic-bezier(0.65, 0, 0.35, 1);
            --bezier-overshoot: cubic-bezier(0.34, 1.56, 0.64, 1);
            --transition-fast: 0.25s var(--bezier-elegant);
            --transition-medium: 0.45s var(--bezier-elegant);
            --transition-slow: 0.7s var(--bezier-elegant);
            --avatar-size: 40px; /* Slightly smaller */
            --hue-rotation-speed: 18s; /* Even slower */

            /* Color Palette V7 */
            --accent-1: #00e5ff; /* Cyan accent */
            --accent-2: #8e44ad; /* Purple accent */
            --accent-3: #ff4757; /* Red accent */
            --link-color: #00aaff;
            --glow-color: color-mix(in srgb, var(--accent-1) 40%, transparent);
            --button-glow-color-lm: color-mix(in srgb, var(--accent-2) 30%, transparent);
            --button-glow-color-dm: color-mix(in srgb, var(--accent-1) 35%, transparent);

            /* --- Light Mode V7.2 --- */
            --lm-bg-default: #f4f7f9; /* Slightly cooler gray */
            --lm-chat-bg: #ffffff;
            --lm-header-bg: linear-gradient(115deg, var(--accent-2) 0%, #a560e4 100%);
            --lm-header-text: #ffffff;
            --lm-header-icon-fill: #ffffff;
            --lm-header-status-text: rgba(255, 255, 255, 0.85); /* More opaque */
            --lm-user-msg-bg: #d1f7ff; /* Keep light cyan */
            --lm-ai-msg-bg: #f0f4f8; /* Match default bg slightly */
            --lm-msg-text: #1c1e21; /* Slightly darker text */
            --lm-input-area-bg: #e9edf1;
            --lm-input-bg: #ffffff;
            --lm-input-text: #1c1e21;
            --lm-input-border: #ced4da;
            --lm-input-border-focus: var(--accent-2);
            --lm-input-shadow-focus: 0 0 0 3.5px color-mix(in srgb, var(--accent-2) 15%, transparent); /* Adjusted spread */
            --lm-input-glow: 0 0 12px color-mix(in srgb, var(--accent-2) 18%, transparent); /* Subtle glow */
            --lm-button-bg: var(--accent-2);
            --lm-button-hover-bg: color-mix(in srgb, var(--accent-2) 88%, black);
            --lm-button-active-bg: color-mix(in srgb, var(--accent-2) 75%, black);
            --lm-button-icon-fill: #ffffff;
            --lm-button-secondary-text: color-mix(in srgb, var(--accent-2) 90%, black);
            --lm-button-secondary-border: color-mix(in srgb, var(--accent-2) 35%, transparent);
            --lm-button-secondary-hover-bg: color-mix(in srgb, var(--accent-2) 8%, transparent);
            --lm-timestamp-color: rgba(0, 0, 0, 0.6);
            --lm-model-indicator-color: rgba(0, 0, 0, 0.55);
            --lm-border-color: #dee2e6;
            --lm-icon-button-hover-bg: rgba(0, 0, 0, 0.07); /* Less dark */
            --lm-msg-action-icon-fill: rgba(0, 0, 0, 0.6);
            --lm-msg-action-icon-hover-fill: #000000;
            --lm-msg-action-icon-hover-bg: rgba(0, 0, 0, 0.09);
            --lm-scrollbar-thumb: #b0b9c3; /* Lighter thumb */
            --lm-scrollbar-track: transparent;
            --lm-code-bg: #e9ecef;
            --lm-code-text: #212529;
            --lm-code-border: #dbe0e5;
            --lm-code-copy-btn-bg: rgba(0, 0, 0, 0.05);
            --lm-code-copy-btn-hover-bg: rgba(0, 0, 0, 0.1);
            --lm-code-copy-btn-copied-bg: var(--accent-1); /* Use accent for copied */
            --lm-code-copy-btn-copied-text: #111;
            --lm-loading-dot-color: var(--lm-timestamp-color);
            --lm-shadow-light: 0 1px 2px rgba(0, 0, 0, 0.06);
            --lm-shadow-medium: 0 3px 8px rgba(0, 0, 0, 0.09);
            --lm-shadow-high: 0 6px 18px rgba(0, 0, 0, 0.1);
            --lm-scroll-btn-bg: rgba(255, 255, 255, 0.92);
            --lm-scroll-btn-icon: #343a40;
            --lm-scroll-btn-hover-bg: #ffffff;
            --lm-popover-bg: rgba(255, 255, 255, 0.97);
            --lm-popover-backdrop-filter: blur(12px);
            --lm-popover-shadow: var(--lm-shadow-high);
            --lm-popover-border: rgba(0, 0, 0, 0.05);
            --lm-menu-item-hover-bg: #eef1f4;
            --lm-counter-bg: var(--accent-3);
            --lm-counter-text: #ffffff;
            --lm-avatar-text: #ffffff;
            --lm-whatsapp-bg-image: none;
            --lm-attach-icon-fill: #495057;
            --lm-unread-marker-bg: color-mix(in srgb, var(--link-color) 10%, transparent);
            --lm-unread-marker-border: color-mix(in srgb, var(--link-color) 20%, transparent);
            --lm-unread-marker-text: color-mix(in srgb, var(--link-color) 90%, black);
            --lm-dialog-bg: var(--lm-popover-bg);
            --lm-dialog-text: var(--lm-msg-text);
            --lm-dialog-shadow: var(--lm-popover-shadow);
            --lm-dialog-overlay-bg: rgba(0, 0, 0, 0.4);
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
            --lm-message-hover-bg: rgba(0, 0, 0, 0.02); /* Subtle hover for messages */
            --lm-group-separator-color: rgba(0, 0, 0, 0.06); /* Subtle separator */

            /* --- Dark Mode V7.2 --- */
            --dm-bg-default: #0b0e11; /* Even darker */
            --dm-chat-bg: #101418;
            --dm-header-bg: linear-gradient(115deg, #181f26 0%, #212b33 100%);
            --dm-header-text: #e3eaf1;
            --dm-header-icon-fill: #a8b3bd;
            --dm-header-status-text: rgba(227, 234, 241, 0.75);
            --dm-user-msg-bg: #005c4b;
            --dm-ai-msg-bg: #1c232a; /* Darker AI */
            --dm-msg-text: #d0d9e1;
            --dm-input-area-bg: #0b0e11;
            --dm-input-bg: #151b21;
            --dm-input-text: #d0d9e1;
            --dm-input-border: #2a343c;
            --dm-input-border-focus: var(--accent-1);
            --dm-input-shadow-focus: 0 0 0 3.5px color-mix(in srgb, var(--accent-1) 15%, transparent); /* Adjusted spread */
            --dm-input-glow: 0 0 12px color-mix(in srgb, var(--accent-1) 18%, transparent); /* Subtle glow */
            --dm-button-bg: var(--accent-1);
            --dm-button-hover-bg: color-mix(in srgb, var(--accent-1) 90%, black);
            --dm-button-active-bg: color-mix(in srgb, var(--accent-1) 80%, black);
            --dm-button-icon-fill: #0b0e11;
            --dm-button-secondary-text: var(--accent-1);
            --dm-button-secondary-border: color-mix(in srgb, var(--accent-1) 35%, transparent);
            --dm-button-secondary-hover-bg: color-mix(in srgb, var(--accent-1) 10%, transparent);
            --dm-timestamp-color: rgba(255, 255, 255, 0.55);
            --dm-model-indicator-color: rgba(255, 255, 255, 0.5);
            --dm-border-color: #2a343c;
            --dm-icon-button-hover-bg: rgba(255, 255, 255, 0.08);
            --dm-msg-action-icon-fill: rgba(255, 255, 255, 0.65);
            --dm-msg-action-icon-hover-fill: #ffffff;
            --dm-msg-action-icon-hover-bg: rgba(255, 255, 255, 0.1);
            --dm-scrollbar-thumb: #343f48;
            --dm-scrollbar-track: transparent;
            --dm-code-bg: #151b21;
            --dm-code-text: #b0bac3;
            --dm-code-border: #2a343c;
            --dm-code-copy-btn-bg: rgba(255, 255, 255, 0.08);
            --dm-code-copy-btn-hover-bg: rgba(255, 255, 255, 0.12);
            --dm-code-copy-btn-copied-bg: var(--accent-1); /* Use accent for copied */
            --dm-code-copy-btn-copied-text: #111;
            --dm-loading-dot-color: var(--dm-timestamp-color);
            --dm-shadow-light: 0 1px 1px rgba(0, 0, 0, 0.3);
            --dm-shadow-medium: 0 4px 10px rgba(0, 0, 0, 0.4);
            --dm-shadow-high: 0 7px 22px rgba(0, 0, 0, 0.45);
            --dm-scroll-btn-bg: rgba(21, 27, 33, 0.94);
            --dm-scroll-btn-icon: #a8b3bd;
            --dm-scroll-btn-hover-bg: #1f2c34;
            --dm-popover-bg: rgba(21, 27, 33, 0.96);
            --dm-popover-backdrop-filter: blur(14px);
            --dm-popover-shadow: var(--dm-shadow-high);
            --dm-popover-border: rgba(255, 255, 255, 0.07);
            --dm-menu-item-hover-bg: #1f2c34;
            --dm-counter-bg: var(--accent-3);
            --dm-counter-text: #ffffff;
            --dm-avatar-text: #e3eaf1;
            --dm-whatsapp-bg-image: none;
            --dm-attach-icon-fill: #a8b3bd;
            --dm-unread-marker-bg: color-mix(in srgb, var(--link-color) 12%, black);
            --dm-unread-marker-border: color-mix(in srgb, var(--link-color) 25%, black);
            --dm-unread-marker-text: var(--link-color);
            --dm-dialog-bg: var(--dm-popover-bg);
            --dm-dialog-text: var(--dm-msg-text);
            --dm-dialog-shadow: var(--dm-popover-shadow);
            --dm-dialog-overlay-bg: rgba(0, 0, 0, 0.6);
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
            --dm-sentiment-positive: #20c997;
            --dm-sentiment-negative: var(--accent-3);
            --dm-sentiment-neutral: #868e96;
            --dm-keyword-bg: #252f38;
            --dm-keyword-text: #a0a9b3;
            --dm-message-hover-bg: rgba(255, 255, 255, 0.03);
            --dm-group-separator-color: rgba(255, 255, 255, 0.07);

            /* Apply Defaults (Light) */
             --bg-default: var(--lm-bg-default); --chat-bg: var(--lm-chat-bg); --header-bg: var(--lm-header-bg); --header-text: var(--lm-header-text); --header-icon-fill: var(--lm-header-icon-fill); --header-status-text: var(--lm-header-status-text); --user-msg-bg: var(--lm-user-msg-bg); --ai-msg-bg: var(--lm-ai-msg-bg); --msg-text: var(--lm-msg-text); --input-area-bg: var(--lm-input-area-bg); --input-bg: var(--lm-input-bg); --input-text: var(--lm-input-text); --input-border: var(--lm-input-border); --input-border-focus: var(--lm-input-border-focus); --input-shadow-focus: var(--lm-input-shadow-focus); --input-glow: var(--lm-input-glow); --button-bg: var(--lm-button-bg); --button-hover-bg: var(--lm-button-hover-bg); --button-active-bg: var(--lm-button-active-bg); --button-icon-fill: var(--lm-button-icon-fill); --button-secondary-text: var(--lm-button-secondary-text); --button-secondary-border: var(--lm-button-secondary-border); --button-secondary-hover-bg: var(--lm-button-secondary-hover-bg); --timestamp-color: var(--lm-timestamp-color); --model-indicator-color: var(--lm-model-indicator-color); --border-color: var(--lm-border-color); --icon-button-hover-bg: var(--lm-icon-button-hover-bg); --msg-action-icon-fill: var(--lm-msg-action-icon-fill); --msg-action-icon-hover-fill: var(--lm-msg-action-icon-hover-fill); --msg-action-icon-hover-bg: var(--lm-msg-action-icon-hover-bg); --scrollbar-thumb: var(--lm-scrollbar-thumb); --scrollbar-track: var(--lm-scrollbar-track); --code-bg: var(--lm-code-bg); --code-text: var(--lm-code-text); --code-border: var(--lm-code-border); --code-copy-btn-bg: var(--lm-code-copy-btn-bg); --code-copy-btn-hover-bg: var(--lm-code-copy-btn-hover-bg); --code-copy-btn-copied-bg: var(--lm-code-copy-btn-copied-bg); --code-copy-btn-copied-text: var(--lm-code-copy-btn-copied-text); --loading-dot-color: var(--lm-loading-dot-color); --shadow-light: var(--lm-shadow-light); --shadow-medium: var(--lm-shadow-medium); --shadow-high: var(--lm-shadow-high); --scroll-btn-bg: var(--lm-scroll-btn-bg); --scroll-btn-icon: var(--lm-scroll-btn-icon); --scroll-btn-hover-bg: var(--lm-scroll-btn-hover-bg); --popover-bg: var(--lm-popover-bg); --popover-backdrop-filter: var(--lm-popover-backdrop-filter); --popover-shadow: var(--lm-popover-shadow); --popover-border: var(--lm-popover-border); --menu-item-hover-bg: var(--lm-menu-item-hover-bg); --counter-bg: var(--lm-counter-bg); --counter-text: var(--lm-counter-text); --avatar-text: var(--lm-avatar-text); --whatsapp-bg-image: var(--lm-whatsapp-bg-image); --attach-icon-fill: var(--lm-attach-icon-fill); --unread-marker-bg: var(--lm-unread-marker-bg); --unread-marker-border: var(--lm-unread-marker-border); --unread-marker-text: var(--lm-unread-marker-text); --dialog-bg: var(--lm-dialog-bg); --dialog-text: var(--lm-dialog-text); --dialog-shadow: var(--lm-dialog-shadow); --dialog-overlay-bg: var(--lm-dialog-overlay-bg); --dialog-button-bg: var(--lm-dialog-button-bg); --dialog-button-text: var(--lm-dialog-button-text); --dialog-cancel-button-bg: var(--lm-dialog-cancel-button-bg); --dialog-cancel-button-text: var(--lm-dialog-cancel-button-text); --kbd-bg: var(--lm-kbd-bg); --kbd-border: var(--lm-kbd-border); --kbd-text: var(--lm-kbd-text); --suggestion-chip-bg: var(--lm-suggestion-chip-bg); --suggestion-chip-hover-bg: var(--lm-suggestion-chip-hover-bg); --suggestion-chip-text: var(--lm-suggestion-chip-text); --sentiment-positive: var(--lm-sentiment-positive); --sentiment-negative: var(--lm-sentiment-negative); --sentiment-neutral: var(--lm-sentiment-neutral); --keyword-bg: var(--lm-keyword-bg); --keyword-text: var(--lm-keyword-text); --message-hover-bg: var(--lm-message-hover-bg); --group-separator-color: var(--lm-group-separator-color);
        }
        body.dark-mode {
             --bg-default: var(--dm-bg-default); --chat-bg: var(--dm-chat-bg); --header-bg: var(--dm-header-bg); --header-text: var(--dm-header-text); --header-icon-fill: var(--dm-header-icon-fill); --header-status-text: var(--dm-header-status-text); --user-msg-bg: var(--dm-user-msg-bg); --ai-msg-bg: var(--dm-ai-msg-bg); --msg-text: var(--dm-msg-text); --input-area-bg: var(--dm-input-area-bg); --input-bg: var(--dm-input-bg); --input-text: var(--dm-input-text); --input-border: var(--dm-input-border); --input-border-focus: var(--dm-input-border-focus); --input-shadow-focus: var(--dm-input-shadow-focus); --input-glow: var(--dm-input-glow); --button-bg: var(--dm-button-bg); --button-hover-bg: var(--dm-button-hover-bg); --button-active-bg: var(--dm-button-active-bg); --button-icon-fill: var(--dm-button-icon-fill); --button-secondary-text: var(--dm-button-secondary-text); --button-secondary-border: var(--dm-button-secondary-border); --button-secondary-hover-bg: var(--dm-button-secondary-hover-bg); --timestamp-color: var(--dm-timestamp-color); --model-indicator-color: var(--dm-model-indicator-color); --border-color: var(--dm-border-color); --icon-button-hover-bg: var(--dm-icon-button-hover-bg); --msg-action-icon-fill: var(--dm-msg-action-icon-fill); --msg-action-icon-hover-fill: var(--dm-msg-action-icon-hover-fill); --msg-action-icon-hover-bg: var(--dm-msg-action-icon-hover-bg); --scrollbar-thumb: var(--dm-scrollbar-thumb); --scrollbar-track: var(--dm-scrollbar-track); --code-bg: var(--dm-code-bg); --code-text: var(--dm-code-text); --code-border: var(--dm-code-border); --code-copy-btn-bg: var(--dm-code-copy-btn-bg); --code-copy-btn-hover-bg: var(--dm-code-copy-btn-hover-bg); --code-copy-btn-copied-bg: var(--dm-code-copy-btn-copied-bg); --code-copy-btn-copied-text: var(--dm-code-copy-btn-copied-text); --loading-dot-color: var(--dm-loading-dot-color); --shadow-light: var(--dm-shadow-light); --shadow-medium: var(--dm-shadow-medium); --shadow-high: var(--dm-shadow-high); --scroll-btn-bg: var(--dm-scroll-btn-bg); --scroll-btn-icon: var(--dm-scroll-btn-icon); --scroll-btn-hover-bg: var(--dm-scroll-btn-hover-bg); --popover-bg: var(--dm-popover-bg); --popover-backdrop-filter: var(--dm-popover-backdrop-filter); --popover-shadow: var(--dm-popover-shadow); --popover-border: var(--dm-popover-border); --menu-item-hover-bg: var(--dm-menu-item-hover-bg); --counter-bg: var(--dm-counter-bg); --counter-text: var(--dm-counter-text); --avatar-text: var(--dm-avatar-text); --whatsapp-bg-image: var(--dm-whatsapp-bg-image); --attach-icon-fill: var(--dm-attach-icon-fill); --unread-marker-bg: var(--dm-unread-marker-bg); --unread-marker-border: var(--dm-unread-marker-border); --unread-marker-text: var(--dm-unread-marker-text); --dialog-bg: var(--dm-dialog-bg); --dialog-text: var(--dm-dialog-text); --dialog-shadow: var(--dm-dialog-shadow); --dialog-overlay-bg: var(--dm-dialog-overlay-bg); --dialog-button-bg: var(--dm-dialog-button-bg); --dialog-button-text: var(--dm-button-icon-fill); --dialog-cancel-button-bg: var(--dm-dialog-cancel-button-bg); --dialog-cancel-button-text: var(--dm-dialog-cancel-button-text); --kbd-bg: var(--dm-kbd-bg); --kbd-border: var(--dm-kbd-border); --kbd-text: var(--dm-kbd-text); --suggestion-chip-bg: var(--dm-suggestion-chip-bg); --suggestion-chip-hover-bg: var(--dm-suggestion-chip-hover-bg); --suggestion-chip-text: var(--dm-suggestion-chip-text); --sentiment-positive: var(--dm-sentiment-positive); --sentiment-negative: var(--dm-sentiment-negative); --sentiment-neutral: var(--dm-sentiment-neutral); --keyword-bg: var(--dm-keyword-bg); --keyword-text: var(--dm-keyword-text); --message-hover-bg: var(--dm-message-hover-bg); --group-separator-color: var(--dm-group-separator-color);
        }

        /* --- Base Styles V7.2 --- */
        html, body { height: 100%; margin: 0; padding: 0; overflow: hidden; }
        body { font-family: var(--font-main); background-color: var(--bg-default); color: var(--msg-text); display: flex; flex-direction: column; transition: background-color var(--transition-medium), color var(--transition-medium); font-size: 15px; /* Adjusted default */ line-height: 1.6; -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale; }
        * { box-sizing: border-box; }
        *:focus-visible {
            outline: 2px solid var(--accent-1); /* Use accent-1 for focus */
            outline-offset: 2px;
            border-radius: var(--border-radius-small);
            box-shadow: 0 0 0 4px color-mix(in srgb, var(--accent-1) 20%, transparent);
        }
        #user-input:focus-visible { outline: none; }
        a { color: var(--link-color); text-decoration: none; transition: color var(--transition-fast), text-decoration var(--transition-fast); }
        a:hover { color: color-mix(in srgb, var(--link-color) 70%, var(--msg-text)); text-decoration: underline; } /* Adjust hover color */
        ::selection { background-color: color-mix(in srgb, var(--accent-1) 40%, transparent); color: var(--msg-text); }
        body.dark-mode ::selection { background-color: color-mix(in srgb, var(--accent-1) 35%, transparent); color: var(--dm-msg-text); }

        /* --- Chat Container V7.2 --- */
        #chat-container {
            width: 100%; max-width: 950px; /* Slightly narrower */ height: calc(100dvh - 16px); /* Adjust height */ margin: 8px auto; background-color: var(--chat-bg); display: flex; flex-direction: column; overflow: hidden; position: relative; transition: background-color var(--transition-medium), box-shadow var(--transition-medium), transform var(--transition-medium) var(--bezier-elegant); box-shadow: var(--shadow-high); border-radius: var(--border-radius-medium);
            border: 1px solid var(--border-color);
        }
        body.dark-mode #chat-container { border-color: var(--dm-border-color); }


        /* --- Header V7.2 --- */
        #chat-header {
            background: var(--header-bg); color: var(--header-text); padding: 10px 18px; /* Adjust padding */ display: flex; align-items: center; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); z-index: 10; transition: background var(--transition-medium), color var(--transition-medium); gap: 15px; /* Adjust gap */ flex-shrink: 0; border-top-left-radius: var(--border-radius-medium); border-top-right-radius: var(--border-radius-medium);
            animation: header-gradient-animation var(--hue-rotation-speed) linear infinite alternate; border-bottom: 1px solid transparent;
        }
        body.dark-mode #chat-header { box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3); border-bottom-color: rgba(255,255,255,0.05); }
        @keyframes header-gradient-animation { from { filter: hue-rotate(-5deg) saturate(100%); } to { filter: hue-rotate(10deg) saturate(115%); } } /* Subtle shift */
        .header-avatar { width: var(--avatar-size); height: var(--avatar-size); border-radius: var(--border-radius-round); display: flex; align-items: center; justify-content: center; font-weight: 600; font-size: 15px; flex-shrink: 0; color: var(--avatar-text); background: linear-gradient(135deg, var(--accent-1), color-mix(in srgb, var(--accent-1) 60%, black)); box-shadow: 0 1px 3px rgba(0,0,0,0.15); }
        body.dark-mode .header-avatar { background: linear-gradient(135deg, var(--accent-1), color-mix(in srgb, var(--accent-1) 70%, #000)); color: var(--dm-avatar-text); }

        .header-content { display: flex; flex-direction: column; flex-grow: 1; overflow: hidden; }
        #chat-title { margin: 0; font-size: 17px; /* Adjust size */ font-weight: 600; flex-grow: 1; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; color: var(--header-text); display: flex; align-items: center; gap: 8px; }
        #chat-sentiment { width: 18px; height: 18px; display: inline-flex; /* Use flex for centering */ align-items: center; justify-content: center; vertical-align: middle; transition: transform var(--transition-fast) var(--bezier-overshoot), opacity var(--transition-fast), color var(--transition-fast); opacity: 0.8; } /* Add color transition */
        #chat-sentiment svg { width: 100%; height: 100%; transition: fill var(--transition-fast); } /* Transition fill */
        #chat-sentiment.loading { opacity: 0.5; background-color: rgba(255,255,255,0.2); border-radius: 50%; animation: pulse-light 1.5s infinite ease-in-out; }
        @keyframes pulse-light { 0%, 100% { opacity: 0.4; } 50% { opacity: 0.7; } }
        #chat-sentiment.positive { color: var(--lm-sentiment-positive); } /* Use color for potential background effects */
        #chat-sentiment.negative { color: var(--lm-sentiment-negative); }
        #chat-sentiment.neutral { color: #ffffff; }
        #chat-sentiment.positive svg { fill: var(--lm-sentiment-positive); }
        #chat-sentiment.negative svg { fill: var(--lm-sentiment-negative); }
        #chat-sentiment.neutral svg { fill: #ffffff; opacity: 0.8; }
        body.dark-mode #chat-sentiment.positive { color: var(--dm-sentiment-positive); }
        body.dark-mode #chat-sentiment.negative { color: var(--dm-sentiment-negative); }
        body.dark-mode #chat-sentiment.neutral { color: var(--dm-sentiment-neutral); }
        body.dark-mode #chat-sentiment.positive svg { fill: var(--dm-sentiment-positive); }
        body.dark-mode #chat-sentiment.negative svg { fill: var(--dm-sentiment-negative); }
        body.dark-mode #chat-sentiment.neutral svg { fill: var(--dm-sentiment-neutral); }

        #header-status { font-size: 12px; /* Slightly smaller */ color: var(--lm-header-status-text); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3; margin-top: 1px; opacity: 0.9; transition: color var(--transition-medium); }
        body.dark-mode #header-status { color: var(--dm-header-status-text); }
        #header-status.typing { font-style: italic; color: var(--accent-1); /* Highlight typing status */ }
        .header-controls-trigger { margin-left: auto; }
        .icon-button { background: none; border: none; padding: 8px; cursor: pointer; border-radius: var(--border-radius-round); display: flex; align-items: center; justify-content: center; transition: background-color var(--transition-fast), transform var(--transition-fast); }
        .icon-button:hover { background-color: var(--icon-button-hover-bg); transform: scale(1.05); }
        .icon-button:active { transform: scale(0.95); }
        .icon-button svg { width: 22px; height: 22px; fill: var(--header-icon-fill); transition: fill var(--transition-medium); }
        body.dark-mode .icon-button svg { fill: var(--dm-header-icon-fill); }

        /* --- Settings Popover V7.2 --- */
        #settings-popover {
             position: absolute; top: calc(100% + 8px); left: 18px; /* Adjust position */ background-color: var(--popover-bg); backdrop-filter: var(--popover-backdrop-filter); border: 1px solid var(--popover-border); border-radius: var(--border-radius-medium); box-shadow: var(--popover-shadow); z-index: 100; padding: 10px; /* Adjust padding */ min-width: 300px; /* Increase min-width */
             opacity: 0; visibility: hidden; transform: translateY(-8px) scale(0.98); transition: opacity var(--transition-fast), transform var(--transition-fast), visibility 0s var(--transition-fast); pointer-events: none;
             max-height: calc(100dvh - 80px); overflow-y: auto;
        }
        #settings-popover.visible { opacity: 1; visibility: visible; transform: translateY(0) scale(1); pointer-events: auto; transition-delay: 0s; }
        .popover-section { margin-bottom: 12px; padding-bottom: 12px; border-bottom: 1px solid var(--border-color); }
        body.dark-mode .popover-section { border-bottom-color: var(--dm-border-color); }
        .popover-section:last-child { margin-bottom: 0; padding-bottom: 0; border-bottom: none; }
        .popover-section label { display: block; font-size: 13px; /* Adjust size */ font-weight: 500; margin-bottom: 6px; color: var(--msg-text); }
        .popover-section select, .popover-section input[type="checkbox"] { margin-top: 4px; }
        .popover-section select { width: 100%; padding: 8px 10px; border: 1px solid var(--input-border); border-radius: var(--border-radius-small); background-color: var(--input-bg); color: var(--input-text); font-size: 13px; cursor: pointer; transition: border-color var(--transition-fast), box-shadow var(--transition-fast); }
        .popover-section select:focus { border-color: var(--input-border-focus); box-shadow: var(--input-shadow-focus); }
        .popover-checkbox { display: flex; align-items: center; cursor: pointer; padding: 6px 8px; border-radius: var(--border-radius-small); transition: background-color var(--transition-fast); margin: -6px -8px; /* Negative margin to make hover area larger */ }
        .popover-checkbox:hover { background-color: var(--menu-item-hover-bg); }
        .popover-checkbox input[type="checkbox"] { margin-left: 8px; /* RTL adjustment */ margin-right: 0; width: 15px; height: 15px; accent-color: var(--accent-2); cursor: pointer; }
        .popover-checkbox label { margin-bottom: 0; font-weight: 400; font-size: 14px; flex-grow: 1; cursor: pointer;}
        #theme-icon-placeholder { color: var(--msg-action-icon-fill); }

        .popover-section.keywords h3 { font-size: 13px; font-weight: 500; margin-bottom: 8px; display: flex; align-items: center; gap: 6px;}
        .popover-section.keywords h3 svg { fill: var(--msg-action-icon-fill); }
        .keywords-container { display: flex; flex-wrap: wrap; gap: 5px; }
        .keyword-chip { background-color: var(--keyword-bg); color: var(--keyword-text); font-size: 11.5px; padding: 3px 7px; border-radius: var(--border-radius-large); transition: background-color var(--transition-fast); }
        .keywords-container.loading span { display: inline-block; width: 55px; height: 18px; background-color: var(--keyword-bg); border-radius: var(--border-radius-large); animation: pulse-light 1.5s infinite ease-in-out; margin: 2px; opacity: 0.7; }
        .popover-section.shortcuts label { font-weight: 500; margin-bottom: 8px; font-size: 13px; }
        .popover-section.shortcuts ul { list-style: none; padding: 0; margin: 0; }
        .popover-section.shortcuts li { display: flex; justify-content: space-between; font-size: 12.5px; color: var(--timestamp-color); margin-bottom: 5px; }
        .popover-section.shortcuts kbd { font-family: var(--font-code); font-size: 10.5px; padding: 2px 5px; background-color: var(--kbd-bg); border: 1px solid var(--kbd-border); border-radius: var(--border-radius-small); color: var(--kbd-text); box-shadow: inset 0 -1px 0 var(--kbd-border); }
        .popover-actions { display: flex; flex-wrap: wrap; /* Allow wrapping */ gap: 8px; justify-content: flex-start; /* Align left */ margin-top: 12px; }
        .popover-button { padding: 7px 14px; /* Adjust padding */ border-radius: var(--border-radius-medium); border: none; font-size: 13px; font-weight: 500; cursor: pointer; transition: background-color var(--transition-fast), transform var(--transition-fast), box-shadow var(--transition-fast); display: flex; align-items: center; gap: 6px; }
        .popover-button:hover { transform: translateY(-1px); box-shadow: var(--shadow-light); }
        .popover-button:active { transform: translateY(0px); box-shadow: none; }
        .popover-button.primary { background-color: var(--button-bg); color: var(--button-icon-fill); }
        .popover-button.primary:hover { background-color: var(--button-hover-bg); }
        .popover-button.secondary { background-color: transparent; color: var(--button-secondary-text); border: 1px solid var(--button-secondary-border); }
        .popover-button.secondary:hover { background-color: var(--button-secondary-hover-bg); }
        .popover-button svg { width: 15px; height: 15px; fill: currentColor; }

        /* --- Chat Output V7.2 --- */
        #chat-output { flex-grow: 1; overflow-y: auto; overflow-x: hidden; display: flex; flex-direction: column; position: relative; background-color: var(--chat-bg); padding: 0 8px; /* Adjust padding */ }
        #chat-output-inner { display: flex; flex-direction: column; padding: 15px 8px; width: 100%; margin-top: auto; }
        #chat-output::-webkit-scrollbar { width: 8px; }
        #chat-output::-webkit-scrollbar-track { background: transparent; }
        #chat-output::-webkit-scrollbar-thumb { background: var(--scrollbar-thumb); border-radius: 4px; border: 2px solid var(--chat-bg); }
        #chat-output::-webkit-scrollbar-thumb:hover { background: color-mix(in srgb, var(--scrollbar-thumb) 70%, black); }
        #chat-output { scrollbar-width: thin; scrollbar-color: var(--scrollbar-thumb) transparent; }

        /* --- Load More Button V7.2 --- */
         #load-more-button { align-self: center; padding: 7px 16px; margin: 15px 0; border: 1px solid var(--button-secondary-border); background-color: transparent; color: var(--button-secondary-text); border-radius: var(--border-radius-large); font-size: 12.5px; font-weight: 500; cursor: pointer; transition: all var(--transition-fast); }
         #load-more-button:hover { background-color: var(--button-secondary-hover-bg); transform: translateY(-1px); border-color: var(--accent-2); }
         body.dark-mode #load-more-button:hover { border-color: var(--accent-1); }
         #load-more-button:disabled { opacity: 0.5; cursor: not-allowed; }

        /* --- Messages V7.2 --- */
        .message-wrapper { display: flex; max-width: 78%; margin-bottom: 2px; /* Tighter default spacing */ align-items: flex-end; transition: margin-bottom var(--transition-fast), opacity 0.4s var(--bezier-elegant), transform 0.4s var(--bezier-elegant); position: relative; opacity: 0; transform: translateY(8px); }
        /* Initial animation trigger */
        .message-wrapper.animate-in { opacity: 1; transform: translateY(0); }

        .user-message-wrapper { align-self: flex-end; flex-direction: row-reverse; margin-left: auto; }
        .ai-message-wrapper { align-self: flex-start; flex-direction: row; margin-right: auto; }

        .avatar { width: var(--avatar-size); height: var(--avatar-size); border-radius: var(--border-radius-round); display: flex; align-items: center; justify-content: center; font-weight: 600; font-size: 14px; flex-shrink: 0; color: var(--lm-avatar-text); margin: 0 8px; box-shadow: var(--shadow-light); transition: transform var(--transition-fast), box-shadow var(--transition-fast), visibility var(--transition-fast); }
        .ai-message-wrapper .avatar { background: linear-gradient(135deg, var(--accent-1), color-mix(in srgb, var(--accent-1) 60%, black)); }
        .user-message-wrapper .avatar { background: linear-gradient(135deg, var(--accent-2), color-mix(in srgb, var(--accent-2) 60%, #000)); }
        body.dark-mode .ai-message-wrapper .avatar { background: linear-gradient(135deg, var(--accent-1), color-mix(in srgb, var(--accent-1) 70%, #000)); color: var(--dm-avatar-text); }
        body.dark-mode .user-message-wrapper .avatar { background: linear-gradient(135deg, var(--accent-2), color-mix(in srgb, var(--accent-2) 70%, #000)); color: var(--dm-avatar-text); }
        .message-wrapper:hover .avatar { transform: scale(1.03); box-shadow: var(--shadow-medium); }

        .message { padding: 10px 15px; border-radius: var(--border-radius-medium); word-wrap: break-word; line-height: 1.6; color: var(--msg-text); box-shadow: var(--shadow-light); transition: background-color var(--transition-medium), color var(--transition-medium), box-shadow var(--transition-medium), transform var(--transition-fast), border-radius var(--transition-fast); position: relative; z-index: 1; min-width: 45px; }
        .user-message { background-color: var(--user-msg-bg); border-bottom-right-radius: var(--border-radius-small); }
        .ai-message { background-color: var(--ai-msg-bg); border-bottom-left-radius: var(--border-radius-small); border: 1px solid var(--border-color); }
        body.dark-mode .ai-message { border-color: var(--dm-border-color); }
        .message::before { /* Tail */ content: ""; position: absolute; bottom: 0; width: 10px; height: 13px; background-color: inherit; transition: background-color var(--transition-medium); z-index: -1; }
        .user-message::before { right: -5px; border-bottom-left-radius: 8px; clip-path: polygon(0 0, 100% 100%, 100% 0); box-shadow: 1px 1px 1px rgba(0,0,0,0.04); }
        .ai-message::before { left: -5px; border-bottom-right-radius: 8px; clip-path: polygon(0 0, 100% 0, 0 100%); box-shadow: -1px 1px 1px rgba(0,0,0,0.04); }
        body.dark-mode .user-message::before { box-shadow: 1px 1px 2px rgba(0,0,0,0.15); }
        body.dark-mode .ai-message::before { box-shadow: -1px 1px 2px rgba(0,0,0,0.15); }

        .message-wrapper:hover .message { transform: translateY(-1px); box-shadow: var(--shadow-medium); }

        /* Grouping Styles V7.2 */
        .message-wrapper.is-grouped-middle .avatar,
        .message-wrapper.is-grouped-end .avatar { visibility: hidden; }
        .message-wrapper.is-grouped-start .message { border-bottom-left-radius: var(--border-radius-small) !important; border-bottom-right-radius: var(--border-radius-small) !important; }
        .message-wrapper.is-grouped-middle .message { border-radius: var(--border-radius-small) !important; margin-top: -1px; /* Tighter overlap */ border-top: 1px solid var(--group-separator-color); /* Separator line */ }
        .message-wrapper.is-grouped-end .message { border-top-left-radius: var(--border-radius-small) !important; border-top-right-radius: var(--border-radius-small) !important; margin-top: -1px; border-top: 1px solid var(--group-separator-color); }
        .message-wrapper.is-grouped-start .message::before,
        .message-wrapper.is-grouped-middle .message::before { display: none; }
        .message-wrapper:not(.is-grouped-middle):not(.is-grouped-end) { margin-bottom: 14px; /* Restore spacing for non-grouped */ }

        .message-content { min-height: 1.6em; border-radius: inherit; /* Inherit border radius for hover */ transition: background-color var(--transition-fast); }
        .message-content:hover { background-color: var(--message-hover-bg); } /* Subtle hover on content */
        .ai-message.typing-cursor .message-content::after { content: '▋'; display: inline-block; animation: blink-cursor 0.9s infinite; margin-right: 3px; color: var(--timestamp-color); font-weight: 300; } /* Slimmer cursor */
        @keyframes blink-cursor { 50% { opacity: 0; } }

         /* Markdown Styles V7.2 */
         .message-content > *:first-child { margin-top: 0; }
         .message-content > *:last-child { margin-bottom: 0; }
         .message-content strong, .message-content b { font-weight: 600; }
         .message-content em, .message-content i { font-style: italic; }
         .message-content ul, .message-content ol { padding-right: 22px; margin: 8px 0; }
         .message-content li { margin-bottom: 4px; }
         .message-content blockquote { border-right: 3px solid var(--border-color); padding: 6px 10px 6px 0; margin: 8px 5px 8px 0; color: var(--timestamp-color); font-style: italic; background-color: color-mix(in srgb, var(--border-color) 15%, transparent); border-top-right-radius: var(--border-radius-small); border-bottom-right-radius: var(--border-radius-small); }
         body.dark-mode .message-content blockquote { border-right-color: var(--dm-border-color); background-color: color-mix(in srgb, var(--dm-border-color) 20%, transparent);}
         .message-content pre { background-color: var(--code-bg); color: var(--code-text); padding: 10px 14px; border-radius: var(--border-radius-medium); overflow-x: auto; font-family: var(--font-code); font-size: 13.5px; margin: 10px 0; direction: ltr; text-align: left; white-space: pre; border: 1px solid var(--code-border); position: relative; box-shadow: inset 0 1px 3px rgba(0,0,0,0.05); }
         body.dark-mode .message-content pre { box-shadow: inset 0 1px 3px rgba(0,0,0,0.2); }
         .message-content pre code { display: block; padding: 0; margin: 0; background: none; border: none; font-size: inherit; color: inherit; }
         .message-content pre .copy-code-button { position: absolute; top: 8px; left: 8px; background-color: var(--code-copy-btn-bg); color: var(--msg-text); border: none; border-radius: var(--border-radius-small); padding: 4px 8px; font-size: 11px; font-family: var(--font-main); cursor: pointer; opacity: 0; transition: opacity var(--transition-fast), background-color var(--transition-fast), color var(--transition-fast); z-index: 2; backdrop-filter: blur(2px); }
         .message-content pre:hover .copy-code-button { opacity: 0.9; }
         .message-content pre .copy-code-button:hover { opacity: 1; background-color: var(--code-copy-btn-hover-bg); }
         .message-content pre .copy-code-button.copied { background-color: var(--code-copy-btn-copied-bg); color: var(--code-copy-btn-copied-text); opacity: 1; }
         .message-content code:not(pre > code) { background-color: color-mix(in srgb, var(--code-bg) 85%, var(--chat-bg)); color: var(--code-text); padding: 0.15em 0.4em; margin: 0 0.1em; font-size: 85%; border-radius: var(--border-radius-small); font-family: var(--font-code); direction: ltr; text-align: left; border: 1px solid var(--code-border); vertical-align: middle; }

        /* Link Preview Placeholder V7.2 */
         .link-preview { border: 1px solid var(--border-color); border-radius: var(--border-radius-medium); margin-top: 8px; overflow: hidden; background-color: color-mix(in srgb, var(--chat-bg) 70%, var(--bg-default)); opacity: 0.85; transition: opacity var(--transition-fast), box-shadow var(--transition-fast); display: flex; }
         .link-preview:hover { opacity: 1; box-shadow: var(--shadow-light); }
         .link-preview-image { width: 70px; height: 70px; background-color: var(--lm-code-bg); flex-shrink: 0; display: flex; align-items: center; justify-content: center; color: var(--timestamp-color); }
         .link-preview-image svg { width: 28px; height: 28px; fill: currentColor; }
         .link-preview-content { padding: 6px 10px; flex-grow: 1; overflow: hidden;}
         .link-preview-title { font-weight: 500; /* Less bold */ font-size: 13.5px; margin-bottom: 2px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
         .link-preview-desc { font-size: 12.5px; color: var(--timestamp-color); max-height: 3.2em; line-height: 1.6; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; }
         body.dark-mode .link-preview { border-color: var(--dm-border-color); background-color: color-mix(in srgb, var(--dm-chat-bg) 70%, var(--dm-bg-default)); }
         body.dark-mode .link-preview-image { background-color: var(--dm-code-bg); }


        .message-footer { display: flex; align-items: center; justify-content: flex-end; font-size: 11px; /* Smaller */ margin-top: 5px; gap: 6px; transition: color var(--transition-medium); flex-wrap: wrap; opacity: 0.75; /* Less opaque */ color: var(--timestamp-color); }
        .ai-message .message-footer { justify-content: flex-start; }
        .model-indicator { white-space: nowrap; font-weight: 400; color: var(--model-indicator-color); }
        .timestamp { white-space: nowrap; }

        .message-actions-trigger {
            position: absolute; top: -8px; opacity: 0; transition: opacity var(--transition-fast), transform var(--transition-fast) var(--bezier-elegant); padding: 5px; border-radius: var(--border-radius-round); background-color: color-mix(in srgb, var(--chat-bg) 90%, transparent); backdrop-filter: blur(4px); border: 1px solid var(--border-color); box-shadow: var(--shadow-light); cursor: pointer; z-index: 2; pointer-events: none;
            transform: translateY(5px) scale(0.8); /* Start slightly lower and smaller */
        }
        .user-message-wrapper .message-actions-trigger { right: -8px; }
        .ai-message-wrapper .message-actions-trigger { left: -8px; }
        .message-wrapper:hover .message-actions-trigger { opacity: 1; transform: translateY(0) scale(1); pointer-events: auto; }
        .message-actions-trigger svg { width: 16px; height: 16px; fill: var(--msg-action-icon-fill); display: block; }
        .message-actions-trigger:hover { background-color: color-mix(in srgb, var(--icon-button-hover-bg) 90%, var(--chat-bg)); } /* Hover effect */

        /* --- Action Menu V7.2 --- */
         #message-actions-menu { position: fixed; z-index: 110; background-color: var(--popover-bg); backdrop-filter: var(--popover-backdrop-filter); border-radius: var(--border-radius-medium); box-shadow: var(--popover-shadow); border: 1px solid var(--popover-border); padding: 5px; display: flex; flex-direction: column; gap: 1px; opacity: 0; visibility: hidden; transform: scale(0.95); transition: opacity var(--transition-fast), transform var(--transition-fast) var(--bezier-elegant), visibility 0s var(--transition-fast); pointer-events: none; }
         #message-actions-menu.visible { opacity: 1; visibility: visible; transform: scale(1); pointer-events: auto; transition-delay: 0s; }
         .action-menu-button { background: none; border: none; padding: 7px 10px; border-radius: var(--border-radius-small); cursor: pointer; text-align: right; font-size: 13.5px; color: var(--msg-text); display: flex; align-items: center; gap: 8px; transition: background-color var(--transition-fast); white-space: nowrap; }
         .action-menu-button:hover { background-color: var(--menu-item-hover-bg); }
         .action-menu-button svg { width: 15px; height: 15px; fill: var(--msg-action-icon-fill); flex-shrink: 0; }
         .action-menu-button.copy-success { background-color: color-mix(in srgb, var(--accent-1) 15%, transparent); } /* Highlight success */
         .action-menu-button.copy-success svg { fill: var(--accent-1) !important; animation: pop-scale 0.3s var(--bezier-overshoot); }
         @keyframes pop-scale { 0%, 100% { transform: scale(1); } 50% { transform: scale(1.2); } }

        /* --- AI Suggestions V7.2 --- */
        #ai-suggestions-area { display: flex; flex-wrap: wrap; gap: 6px; padding: 8px 15px 5px; transition: opacity var(--transition-medium), transform var(--transition-medium); opacity: 0; transform: translateY(10px); pointer-events: none; position: sticky; bottom: 0; background: linear-gradient(to top, var(--chat-bg) 70%, color-mix(in srgb, var(--chat-bg) 0%, transparent)); /* Smoother fade */ margin-top: 8px; }
        body.dark-mode #ai-suggestions-area { background: linear-gradient(to top, var(--dm-chat-bg) 70%, color-mix(in srgb, var(--dm-chat-bg) 0%, transparent)); }
        #ai-suggestions-area.visible { opacity: 1; transform: translateY(0); pointer-events: auto; }
        .suggestion-chip { background-color: var(--suggestion-chip-bg); color: var(--suggestion-chip-text); border: 1px solid var(--border-color); padding: 5px 12px; border-radius: var(--border-radius-large); font-size: 13px; cursor: pointer; transition: all var(--transition-fast); box-shadow: var(--shadow-light); opacity: 0; transform: translateY(5px); /* Initial state for animation */ }
        #ai-suggestions-area.visible .suggestion-chip { opacity: 1; transform: translateY(0); } /* Visible state */
        .suggestion-chip:hover { background-color: var(--suggestion-chip-hover-bg); transform: translateY(-2px); border-color: var(--button-secondary-border); box-shadow: var(--shadow-medium); }
         .suggestion-chip:active { transform: scale(0.97) translateY(0); }


        /* --- Scroll to Bottom / Unread V7.2 --- */
        #scroll-to-bottom { position: absolute; bottom: 15px; left: 15px; background-color: var(--scroll-btn-bg); backdrop-filter: blur(10px); border: 1px solid var(--border-color); border-radius: var(--border-radius-round); width: 40px; height: 40px; /* Slightly smaller */ padding: 0; cursor: pointer; display: flex; align-items: center; justify-content: center; box-shadow: var(--shadow-medium); opacity: 0; visibility: hidden; transition: opacity var(--transition-fast), transform var(--transition-fast) var(--bezier-elegant), visibility 0s var(--transition-fast), background-color var(--transition-fast); z-index: 20; transform: scale(0.8); pointer-events: none; }
        #scroll-to-bottom.visible { opacity: 1; visibility: visible; transform: scale(1); pointer-events: auto; transition-delay: 0s; }
        #scroll-to-bottom:hover { background-color: var(--scroll-btn-hover-bg); transform: scale(1.08); box-shadow: var(--shadow-high); }
        #scroll-to-bottom svg { width: 20px; height: 20px; fill: var(--scroll-btn-icon); transition: transform var(--transition-fast); }
        #scroll-to-bottom:hover svg { transform: translateY(1px); }
        #new-message-counter { position: absolute; top: -3px; right: -3px; background-color: var(--counter-bg); color: var(--counter-text); border-radius: var(--border-radius-round); font-size: 10.5px; font-weight: 600; min-width: 18px; height: 18px; display: flex; align-items: center; justify-content: center; padding: 0 4px; box-shadow: 0 1px 2px rgba(0,0,0,0.2); opacity: 0; transform: scale(0.5) translate(50%, -50%); transition: opacity var(--transition-fast), transform var(--bezier-overshoot) 0.3s; line-height: 1; transform-origin: top right; }
        #scroll-to-bottom.has-new #new-message-counter { opacity: 1; transform: scale(1) translate(0, 0); }

        .unread-marker { display: flex; align-items: center; justify-content: center; padding: 4px 0; margin: 8px 0; width: 100%; opacity: 0; transform: translateY(10px); transition: opacity var(--transition-medium), transform var(--transition-medium); pointer-events: none; position: sticky; bottom: 50%; z-index: 5; }
        .unread-marker.visible { opacity: 1; transform: translateY(0); }
        .unread-marker span { background-color: var(--unread-marker-bg); color: var(--unread-marker-text); padding: 3px 10px; border-radius: var(--border-radius-large); font-size: 11.5px; font-weight: 500; border: 1px solid var(--unread-marker-border); backdrop-filter: blur(6px); box-shadow: var(--shadow-medium); }


        /* --- Input Area V7.2 --- */
        #chat-input-area { display: flex; align-items: flex-end; padding: 10px 15px; border-top: 1px solid var(--border-color); background-color: var(--input-area-bg); flex-shrink: 0; transition: background-color var(--transition-medium), border-color var(--transition-medium), opacity var(--transition-fast); gap: 10px; border-bottom-left-radius: var(--border-radius-medium); border-bottom-right-radius: var(--border-radius-medium); }
        body.dark-mode #chat-input-area { border-top-color: var(--dm-border-color); }
        .input-wrapper { flex-grow: 1; position: relative; display: flex; }
        #user-input { flex-grow: 1; padding: 11px 40px 11px 15px; border: 1px solid var(--input-border); border-radius: var(--border-radius-large); font-size: 15px; background-color: var(--input-bg); color: var(--input-text); outline: none; transition: background-color var(--transition-medium), color var(--transition-medium), box-shadow var(--transition-fast), height var(--transition-fast), border-color var(--transition-fast); resize: none; overflow-y: hidden; min-height: 48px; max-height: 160px; line-height: 1.55; box-sizing: border-box; }
        #user-input::placeholder { color: var(--timestamp-color); opacity: 0.7; transition: opacity var(--transition-fast); }
        #user-input:focus::placeholder { opacity: 0.4; }
        #user-input:focus { border-color: var(--input-border-focus); box-shadow: var(--input-shadow-focus), var(--input-glow); }

         #clear-input-button { position: absolute; right: 10px; top: 50%; transform: translateY(-50%); background: none; border: none; padding: 5px; cursor: pointer; border-radius: var(--border-radius-round); display: flex; align-items: center; justify-content: center; opacity: 0.6; transition: opacity var(--transition-fast), background-color var(--transition-fast), transform var(--transition-fast); }
         #clear-input-button svg { width: 16px; height: 16px; fill: var(--msg-action-icon-fill); }
         #clear-input-button:hover { opacity: 1; background-color: var(--icon-button-hover-bg); transform: translateY(-50%) scale(1.1); }
         #clear-input-button:active { transform: translateY(-50%) scale(0.95); }


        #send-button {
            width: 48px; height: 48px; padding: 0; background-color: var(--button-bg); border: none; border-radius: var(--border-radius-round); cursor: pointer; font-size: 0; display: flex; justify-content: center; align-items: center; transition: background-color var(--transition-fast), transform 0.3s var(--bezier-overshoot), opacity var(--transition-fast), box-shadow var(--transition-medium); flex-shrink: 0; align-self: flex-end; box-shadow: var(--shadow-medium);
        }
        #send-button.has-text { /* Style when input has text */
            animation: pulse-send-button 1.8s infinite ease-in-out;
        }
        @keyframes pulse-send-button {
            0%, 100% { box-shadow: var(--shadow-medium), 0 0 8px transparent; }
            50% { box-shadow: var(--shadow-high), 0 0 16px var(--button-glow-color-lm); }
        }
        body.dark-mode #send-button.has-text {
             animation-name: pulse-send-button-dark;
        }
         @keyframes pulse-send-button-dark {
            0%, 100% { box-shadow: var(--dm-shadow-medium), 0 0 8px transparent; }
            50% { box-shadow: var(--dm-shadow-high), 0 0 18px var(--button-glow-color-dm); }
        }

        #send-button::before { content: ''; display: block; width: 22px; height: 22px; background-color: var(--button-icon-fill); mask-image: url('data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"%3E%3Cpath d="M3.4 20.4l17.45-7.48a1 1 0 0 0 0-1.84L3.4 3.6a1 1 0 0 0-1.39 1.04l1.56 6.01-1.56 6.01a1 1 0 0 0 1.39 1.04zM5.12 14.01l.95-3.68h6.54l-.95 3.68-6.54-.01zm0-8l.95 3.68h6.54l-.95-3.68-6.54-.01z"/%3E%3C/svg%3E'); mask-size: contain; mask-repeat: no-repeat; mask-position: center; -webkit-mask-image: url('data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"%3E%3Cpath d="M3.4 20.4l17.45-7.48a1 1 0 0 0 0-1.84L3.4 3.6a1 1 0 0 0-1.39 1.04l1.56 6.01-1.56 6.01a1 1 0 0 0 1.39 1.04zM5.12 14.01l.95-3.68h6.54l-.95 3.68-6.54-.01zm0-8l.95 3.68h6.54l-.95-3.68-6.54-.01z"/%3E%3C/svg%3E'); -webkit-mask-size: contain; -webkit-mask-repeat: no-repeat; -webkit-mask-position: center; transition: background-color var(--transition-medium); }
        #send-button:hover { transform: scale(1.08); box-shadow: var(--shadow-high), 0 0 15px var(--button-glow-color-lm); }
        body.dark-mode #send-button:hover { box-shadow: var(--dm-shadow-high), 0 0 18px var(--button-glow-color-dm); }
        #send-button:active { background-color: var(--button-active-bg); transform: scale(0.98); box-shadow: none; animation: none; }
        #send-button:disabled { opacity: 0.5; cursor: not-allowed; background-color: color-mix(in srgb, var(--button-bg) 50%, var(--input-area-bg)); transform: scale(1); box-shadow: none; animation: none; }
        #send-button.sending { transform: scale(1) !important; box-shadow: none !important; opacity: 0.7; cursor: default; animation: sending-pulse 1.2s infinite ease-in-out; }
        @keyframes sending-pulse { 0%, 100% { opacity: 0.6; } 50% { opacity: 0.9; } }

        /* --- Loading Indicator V7.2 --- */
        .typing-indicator .message-content { display: flex; align-items: center; gap: 8px; color: var(--timestamp-color); padding: 6px 0; }
        .loading-dots span { display: inline-block; width: 6px; height: 6px; background-color: var(--loading-dot-color); border-radius: 50%; margin: 0 1.5px; animation: bounce-dots 1.4s infinite ease-in-out both; }
        .loading-dots span:nth-child(1) { animation-delay: -0.30s; }
        .loading-dots span:nth-child(2) { animation-delay: -0.15s; }
        @keyframes bounce-dots { 0%, 80%, 100% { transform: scale(0); } 40% { transform: scale(1.0); opacity: 1; } }
        #stop-generation-button { background: none; border: 1px solid var(--button-secondary-border); padding: 4px; margin-right: 8px; cursor: pointer; display: flex; align-items: center; justify-content: center; width: 26px; height: 26px; border-radius: var(--border-radius-round); transition: background-color var(--transition-fast), transform var(--transition-fast), border-color var(--transition-fast); }
        #stop-generation-button svg { width: 12px; height: 12px; fill: var(--msg-action-icon-fill); }
        #stop-generation-button:hover { background-color: var(--button-secondary-hover-bg); border-color: var(--accent-2); }
        body.dark-mode #stop-generation-button:hover { border-color: var(--accent-1); }
        #stop-generation-button:active { transform: scale(0.9); }

        /* --- Custom Dialog V7.2 --- */
         #dialog-overlay { position: fixed; top: 0; left: 0; right: 0; bottom: 0; background-color: var(--dialog-overlay-bg); backdrop-filter: blur(8px); z-index: 1000; display: flex; align-items: center; justify-content: center; opacity: 0; visibility: hidden; transition: opacity var(--transition-medium), visibility 0s var(--transition-medium); }
         #dialog-overlay.visible { opacity: 1; visibility: visible; transition-delay: 0s;}
         #dialog-box { background-color: var(--dialog-bg); padding: 20px 25px; border-radius: var(--border-radius-medium); box-shadow: var(--dialog-shadow); max-width: 420px; width: 90%; text-align: center; transform: scale(0.95); transition: transform var(--transition-medium) var(--bezier-overshoot); border: 1px solid var(--popover-border); }
         #dialog-overlay.visible #dialog-box { transform: scale(1); }
         #dialog-title { font-size: 17px; font-weight: 600; margin: 0 0 8px; color: var(--dialog-text); }
         #dialog-message { font-size: 14px; margin: 0 0 18px; color: var(--dialog-text); opacity: 0.85; line-height: 1.6; }
         #dialog-buttons { display: flex; justify-content: center; gap: 12px; }
         .dialog-button { padding: 9px 20px; border-radius: var(--border-radius-medium); border: none; font-size: 13px; font-weight: 500; cursor: pointer; transition: background-color var(--transition-fast), transform var(--transition-fast), box-shadow var(--transition-fast); }
         .dialog-button:hover { transform: translateY(-1px); box-shadow: var(--shadow-light); }
         .dialog-button:active { transform: translateY(0); box-shadow: none; }
         .dialog-button.confirm { background-color: var(--dialog-button-bg); color: var(--dialog-button-text); }
         .dialog-button.confirm:hover { background-color: color-mix(in srgb, var(--dialog-button-bg) 85%, black); }
         .dialog-button.cancel { background-color: var(--dialog-cancel-button-bg); color: var(--dialog-cancel-button-text); }
         .dialog-button.cancel:hover { background-color: color-mix(in srgb, var(--dialog-cancel-button-bg) 85%, black); }

    </style>
</head>
<body>

<!-- Chat Container - Visible Immediately -->
<div id="chat-container" aria-live="polite">
    <!-- Header -->
    <div id="chat-header">
        <div class="header-avatar" id="header-avatar-ai" aria-hidden="true">AI</div>
        <div class="header-content">
            <h1 id="chat-title" title="כותרת השיחה (מתעדכן אוטומטית)">
                <span>טוען כותרת...</span>
                <span id="chat-sentiment" title="סנטימנט השיחה" class="loading"></span>
            </h1>
            <div id="header-status">מתחבר...</div>
        </div>
        <div class="header-controls-trigger">
            <button class="icon-button" id="settings-button" title="הגדרות (Alt+S)" aria-label="הגדרות ופעולות נוספות" aria-haspopup="true" aria-controls="settings-popover" aria-expanded="false">
                 <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M19.43 12.98c.04-.32.07-.64.07-.98s-.03-.66-.07-.98l2.11-1.65c.19-.15.24-.42.12-.64l-2-3.46c-.12-.22-.39-.3-.61-.22l-2.49 1c-.52-.4-1.08-.73-1.69-.98l-.38-2.65C14.46 2.18 14.25 2 14 2h-4c-.25 0-.46.18-.49.42l-.38 2.65c-.61.25-1.17.59-1.69.98l-2.49-1c-.23-.08-.49 0-.61.22l-2 3.46c-.13.22-.07.49.12.64l2.11 1.65c-.04.32-.07.65-.07.98s.03.66.07.98l-2.11 1.65c-.19.15-.24.42-.12.64l2 3.46c.12.22.39.3.61.22l2.49-1c.52.4 1.08.73 1.69.98l.38 2.65c.03.24.24.42.49.42h4c.25 0 .46-.18.49.42l.38-2.65c.61-.25 1.17-.59 1.69-.98l2.49 1c.23.08.49 0 .61-.22l2-3.46c.12-.22.07-.49-.12-.64l-2.11-1.65zM12 15.5c-1.93 0-3.5-1.57-3.5-3.5s1.57-3.5 3.5-3.5 3.5 1.57 3.5 3.5-1.57 3.5-3.5 3.5z"/></svg>
            </button>
        </div>
        <!-- Settings Popover -->
         <div id="settings-popover" role="menu" aria-labelledby="settings-button">
            <div class="popover-section">
                 <label for="model-select">מודל AI:</label>
                 <select id="model-select" role="menuitem">
                     <option value="main-ai.php">Gemini 1.5 Flash</option>
                     <option value="gemini25.php">Gemini 1.5 Pro</option>
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
                  <label>התנהגות:</label>
                 <div class="popover-checkbox" role="menuitemcheckbox" aria-checked="true" tabindex="0" id="send-on-enter-container">
                    <input type="checkbox" id="send-on-enter-checkbox" tabindex="-1" checked>
                    <label for="send-on-enter-checkbox">שלח הודעה בלחיצת Enter</label>
                 </div>
             </div>
              <div class="popover-section">
                   <label>מראה:</label>
                 <div class="popover-checkbox" role="menuitemcheckbox" aria-checked="false" tabindex="0" id="dark-mode-container">
                    <input type="checkbox" id="dark-mode-checkbox" tabindex="-1">
                    <label for="dark-mode-checkbox" id="theme-toggle-text">ערכת נושא כהה</label>
                    <span id="theme-icon-placeholder" style="margin-right: auto; display: flex; align-items: center;">
                        <!-- Icons injected here -->
                    </span>
                 </div>
            </div>
            <div class="popover-section keywords">
                <h3><svg style="width:16px; height:16px; vertical-align: middle; margin-left: 5px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M21.41 11.58l-9-9C12.05 2.22 11.55 2 11 2H4c-1.1 0-2 .9-2 2v7c0 .55.22 1.05.59 1.42l9 9c.36.36.86.58 1.41.58s1.05-.22 1.41-.59l7-7c.37-.36.59-.86.59-1.41s-.23-1.06-.59-1.42zM5.5 7C4.67 7 4 6.33 4 5.5S4.67 4 5.5 4 7 4.67 7 5.5 6.33 7 5.5 7z"/></svg>מילות מפתח בשיחה:</h3>
                <div class="keywords-container" id="chat-keywords-display">
                    <span class="loading"></span><span class="loading"></span>
                </div>
            </div>
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
            <!-- Initial Message -->
             <div class="message-wrapper ai-message-wrapper initial-message animate-in" data-message-id="initial-0"> <!-- Added animate-in -->
                 <div class="avatar" aria-hidden="true">AI</div>
                 <div class="message ai-message">
                     <div class="message-content"><span>שלום! אני ה-AI שלך, מוכן לשוחח.</span></div>
                     <div class="message-footer"><span class="timestamp" data-timestamp-abs="${new Date().toISOString()}">התחל</span></div>
                 </div>
             </div>
        </div>
        <!-- AI Suggestions Area -->
        <div id="ai-suggestions-area"></div>

        <div class="unread-marker" id="unread-marker" aria-live="polite"><span>הודעות חדשות</span></div>
        <button id="scroll-to-bottom" title="גלול לתחתית (End)" aria-label="גלול לתחתית">
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
    <div id="message-actions-menu-template" style="display: none;"> <!-- ... Same ... --> </div>
    <div id="custom-dialog-template" style="display: none;"> <!-- ... Same ... --> </div>

</div>

<script>
    // Wrap entire script in a self-executing function
    (function() {
        document.addEventListener('DOMContentLoaded', () => {
            // --- Element References (V7.2) ---
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
            const sendOnEnterContainer = document.getElementById('send-on-enter-container');
            const darkModeCheckbox = document.getElementById('dark-mode-checkbox');
            const darkModeContainer = document.getElementById('dark-mode-container');
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
            const chatTitleElement = document.getElementById('chat-title').querySelector('span');
            const chatSentimentElement = document.getElementById('chat-sentiment');
            const headerStatusElement = document.getElementById('header-status');
            const chatKeywordsDisplay = document.getElementById('chat-keywords-display');
            const aiSuggestionsArea = document.getElementById('ai-suggestions-area');
            const initialMessageWrapper = document.querySelector('.initial-message');

            // --- State Variables (V7.2) ---
            const BASE_API_URL = 'https://php-render-test.onrender.com/'; // UPDATE IF NEEDED
            const CHAT_FEATURES_ENDPOINT = 'get_chat_features.php'; // Example Endpoint
            let messageCounterId = 0;
            let currentAbortController = null;
            let typingTimeout = null;
            let activeMessageMenu = null;
            let newMessagesCount = 0;
            let isScrolledToBottom = true;
            let lastMessageId = 'initial-0';
            let unreadMarkerVisible = false;
            let lastUnreadMarkerPosition = null;
            let sendOnEnter = true;
            let userInteracted = false;
            let originalDocumentTitle = document.title;
            let messageCountSinceFeatureFetch = 0;
            const FETCH_FEATURES_INTERVAL = 4; // Increase interval slightly
            let isFetchingFeatures = false;
            const TYPING_SPEED = 20; // Slightly adjusted speed
            const SCROLL_THRESHOLD = 200; // Adjusted threshold
            const DEBOUNCE_DELAY = 100; // Faster debounce

            // Theme Icons (SVG as strings)
            const moonIconSvg = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" fill="currentColor"><path d="M12 3a9 9 0 1 0 9 9c0-.46-.04-.91-.1-1.36a5.5 5.5 0 0 1-9.8-5.54A9.01 9.01 0 0 0 12 3z"/></svg>`;
            const sunIconSvg = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" fill="currentColor"><path d="M12 7c-2.76 0-5 2.24-5 5s2.24 5 5 5 5-2.24 5-5-2.24-5-5-5zM2 13h2c.55 0 1-.45 1-1s-.45-1-1-1H2c-.55 0-1 .45-1 1s.45 1 1 1zm18 0h2c.55 0 1-.45 1-1s-.45-1-1-1h-2c-.55 0-1 .45-1 1s.45 1 1 1zM11 2v2c0 .55.45 1 1 1s1-.45 1-1V2c0-.55-.45-1-1-1s-1 .45-1 1zm0 18v2c0 .55.45 1 1 1s1-.45 1-1v-2c0-.55-.45-1-1-1s-1 .45-1 1zM5.64 5.64c-.39-.39-1.02-.39-1.41 0-.39.39-.39 1.02 0 1.41l1.41 1.41c.39.39 1.02.39 1.41 0 .39-.39.39-1.02 0-1.41L5.64 5.64zm12.73 12.73c-.39-.39-1.02-.39-1.41 0-.39.39-.39 1.02 0 1.41l1.41 1.41c.39.39 1.02.39 1.41 0 .39-.39.39-1.02 0-1.41l-1.41-1.41zM19.78 4.22c.39-.39.39-1.02 0-1.41-.39-.39-1.02-.39-1.41 0l-1.41 1.41c-.39.39-.39 1.02 0 1.41.39.39 1.02.39 1.41 0l1.41-1.41zM7.05 18.36c.39-.39.39-1.02 0-1.41-.39-.39-1.02-.39-1.41 0l-1.41 1.41c-.39.39-.39 1.02 0 1.41.39.39 1.02.39 1.41 0l1.41-1.41z"/></svg>`;

            // --- Utility Functions (V7.2) ---
            function debounce(func, wait) { let timeout; return function executedFunction(...args) { const later = () => { clearTimeout(timeout); func.apply(this, args); }; clearTimeout(timeout); timeout = setTimeout(later, wait); }; };
            function getCurrentTimestamp(iso = false) { const now = new Date(); if (iso) return now.toISOString(); const hours = now.getHours().toString().padStart(2, '0'); const minutes = now.getMinutes().toString().padStart(2, '0'); return `${hours}:${minutes}`; }
            function formatTimestamp(isoTimestamp) { if (!isoTimestamp || isoTimestamp === 'התחל') return isoTimestamp; try { const date = new Date(isoTimestamp); const hours = date.getHours().toString().padStart(2, '0'); const minutes = date.getMinutes().toString().padStart(2, '0'); return `${hours}:${minutes}`; } catch (e) { return isoTimestamp; } }
            function generateMessageId() { return `msg-${Date.now()}-${messageCounterId++}`; }
            function focusElement(element) { if (element) setTimeout(() => element.focus(), 50); }
            function escapeHtml(unsafe) { return unsafe.replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/"/g, "&quot;").replace(/'/g, "&#039;"); }

            // Initialize Marked.js
            marked.setOptions({
                 breaks: true, gfm: true, sanitize: false,
                 highlight: function(code, lang) { return escapeHtml(code); } // Basic escaping
            });

            function smoothScrollToBottom() { chatOutput.scrollTo({ top: chatOutput.scrollHeight, behavior: 'smooth' }); }
            function instantScrollToBottom() { chatOutput.scrollTop = chatOutput.scrollHeight; }
            function updateScrollState() { const isBottom = chatOutput.scrollHeight - chatOutput.scrollTop - chatOutput.clientHeight < SCROLL_THRESHOLD; const wasScrolledToBottom = isScrolledToBottom; if (isBottom) { if (newMessagesCount > 0) { resetNewMessageCounter(); hideUnreadMarker(); } } isScrolledToBottom = isBottom; scrollToBottomButton.classList.toggle('visible', !isScrolledToBottom); scrollToBottomButton.classList.toggle('has-new', newMessagesCount > 0 && !isScrolledToBottom); }
            const debouncedUpdateScrollState = debounce(updateScrollState, DEBOUNCE_DELAY);
            function incrementNewMessageCounter() { if (!isScrolledToBottom) { newMessagesCount++; newMessageCounter.textContent = newMessagesCount > 9 ? '9+' : newMessagesCount; updateDocumentTitle(newMessagesCount); scrollToBottomButton.classList.add('has-new'); showUnreadMarker(); } }
            function resetNewMessageCounter() { newMessagesCount = 0; newMessageCounter.textContent = '0'; updateDocumentTitle(); scrollToBottomButton.classList.remove('has-new'); }
            function showUnreadMarker() { if (!isScrolledToBottom && !unreadMarkerVisible) { const firstUnread = chatOutput.querySelector(`[data-message-id="${lastMessageId}"]`); if (firstUnread) { const markerTop = firstUnread.offsetTop - chatOutput.offsetTop - 50; if (markerTop > lastUnreadMarkerPosition || lastUnreadMarkerPosition === null) { unreadMarker.style.top = `${markerTop}px`; unreadMarker.classList.add('visible'); unreadMarkerVisible = true; lastUnreadMarkerPosition = markerTop; } } } }
            function hideUnreadMarker(setFlag = true) { unreadMarker.classList.remove('visible'); if (setFlag) { unreadMarkerVisible = false; lastUnreadMarkerPosition = null; } }
            function updateDocumentTitle(count = 0) { document.title = count > 0 ? `(${count}) ${originalDocumentTitle}` : originalDocumentTitle; }
            function toggleSettingsPopover(show) { const isVisible = settingsPopover.classList.contains('visible'); if (show === undefined) show = !isVisible; if (show && !isVisible) { settingsPopover.classList.add('visible'); settingsButton.setAttribute('aria-expanded', 'true'); } else if (!show && isVisible) { settingsPopover.classList.remove('visible'); settingsButton.setAttribute('aria-expanded', 'false'); } }
            function openMessageActionMenu(triggerButton, messageElement) { closeMessageActionMenu(); const menuContent = messageActionsMenuTemplate.innerHTML; activeMessageMenu = document.createElement('div'); activeMessageMenu.id = 'message-actions-menu'; activeMessageMenu.dataset.messageId = messageElement.closest('.message-wrapper').dataset.messageId; // Store ID on menu
             activeMessageMenu.innerHTML = menuContent; const isUser = messageElement.classList.contains('user-message'); const isAI = messageElement.classList.contains('ai-message'); activeMessageMenu.querySelectorAll('button').forEach(btn => { const action = btn.dataset.action; if ((action === 'regenerate' || action === 'rate-good' || action === 'rate-bad') && !isAI) btn.style.display = 'none'; if (action === 'edit' && !isUser) btn.style.display = 'none'; btn.addEventListener('click', (e) => handleActionMenuClick(e, action, activeMessageMenu.dataset.messageId)); }); document.body.appendChild(activeMessageMenu); const triggerRect = triggerButton.getBoundingClientRect(); const menuRect = activeMessageMenu.getBoundingClientRect(); let top = triggerRect.bottom + window.scrollY + 5; let left = triggerRect.left + window.scrollX; if (left + menuRect.width > window.innerWidth - 10) left = window.innerWidth - menuRect.width - 10; if (top + menuRect.height > window.innerHeight - 10) top = triggerRect.top + window.scrollY - menuRect.height - 5; activeMessageMenu.style.top = `${top}px`; activeMessageMenu.style.left = `${left}px`; requestAnimationFrame(() => { activeMessageMenu.classList.add('visible'); }); } // Use rAF for smoother transition
            function closeMessageActionMenu() { if (activeMessageMenu) { activeMessageMenu.classList.remove('visible'); setTimeout(() => activeMessageMenu.remove(), 250); activeMessageMenu = null; } } // Allow fade out
            function handleActionMenuClick(event, action, messageId) { console.log(`Action clicked: ${action} for message ${messageId}`); const messageWrapper = chatOutputInner.querySelector(`.message-wrapper[data-message-id="${messageId}"]`); if (!messageWrapper) return; const messageElement = messageWrapper.querySelector('.message'); const actionButton = event.currentTarget; switch (action) { case 'copy': handleCopyClick(event, actionButton); break; case 'regenerate': handleRegenerateClick(event, messageWrapper); break; case 'edit': console.warn("Edit action not implemented yet."); break; case 'delete': deleteMessage(messageId); break; } if (action !== 'copy') { closeMessageActionMenu(); } /* Keep menu open for copy feedback */ }
            function deleteMessage(messageId) { showCustomDialog({ title: "מחיקת הודעה", message: "האם אתה בטוח שברצונך למחוק הודעה זו?", confirmText: "מחק", cancelText: "ביטול", onConfirm: () => { const messageWrapper = chatOutputInner.querySelector(`.message-wrapper[data-message-id="${messageId}"]`); if (messageWrapper) { messageWrapper.style.transition = 'opacity 0.3s ease, transform 0.3s ease, margin-bottom 0.3s ease, height 0.3s ease'; messageWrapper.style.opacity = '0'; messageWrapper.style.transform = 'scale(0.9)'; messageWrapper.style.marginBottom = `-${messageWrapper.offsetHeight}px`; setTimeout(() => { messageWrapper.remove(); applyGroupingStyles(); // Reapply grouping after removal }, 300); console.log("Message", messageId, "deleted."); } } }); }
            function getChatHistory(forRegeneration = false, regenerationTargetMsgId = null) { const history = []; const messages = chatOutputInner.querySelectorAll('.message-wrapper:not(.initial-message)'); messages.forEach((wrapper) => { const messageId = wrapper.dataset.messageId; const messageDiv = wrapper.querySelector('.message'); if (!messageDiv) return; const sender = messageDiv.classList.contains('user-message') ? 'user' : 'ai'; if (forRegeneration && messageId === regenerationTargetMsgId && sender === 'ai') return; const contentElement = messageDiv.querySelector('.message-content'); let content = ''; if (contentElement) { content = Array.from(contentElement.childNodes).map(node => node.textContent).join('').trim(); } if (content) { history.push({ role: sender === 'user' ? 'user' : 'model', content: content }); } }); return history; }
            function generateAvatarContent(name) { return name ? name.substring(0, 2).toUpperCase() : '??'; }
            function addCopyButtonToCodeBlock(preElement) { if (!preElement || preElement.querySelector('.copy-code-button')) return; const copyButton = document.createElement('button'); copyButton.textContent = 'העתק'; copyButton.className = 'copy-code-button'; copyButton.setAttribute('aria-label', 'העתק קוד'); copyButton.addEventListener('click', (e) => { e.stopPropagation(); const codeElement = preElement.querySelector('code') || preElement; const codeToCopy = (codeElement.textContent || '').replace(/העתק$|הועתק!$|שגיאה$/,'').trim(); navigator.clipboard.writeText(codeToCopy).then(() => { copyButton.textContent = 'הועתק!'; copyButton.classList.add('copied'); setTimeout(() => { copyButton.textContent = 'העתק'; copyButton.classList.remove('copied'); }, 1500); }).catch(err => { console.error('שגיאה בהעתקת קוד: ', err); copyButton.textContent = 'שגיאה'; }); }); preElement.style.position = 'relative'; preElement.appendChild(copyButton); }
            function showCustomDialog(options) { const dialogTemplate = document.getElementById('custom-dialog-template'); if (!dialogTemplate) return; const dialog = dialogTemplate.firstElementChild.cloneNode(true); const titleEl = dialog.querySelector('#dialog-title'); const messageEl = dialog.querySelector('#dialog-message'); const confirmBtn = dialog.querySelector('.dialog-button.confirm'); const cancelBtn = dialog.querySelector('.dialog-button.cancel'); titleEl.textContent = options.title || 'אישור'; messageEl.innerHTML = options.message || ''; confirmBtn.textContent = options.confirmText || 'אישור'; cancelBtn.textContent = options.cancelText || 'ביטול'; const closeDialog = () => { dialog.classList.remove('visible'); setTimeout(() => dialog.remove(), 300); }; confirmBtn.onclick = () => { if (options.onConfirm) options.onConfirm(); closeDialog(); }; cancelBtn.onclick = () => { if (options.onCancel) options.onCancel(); closeDialog(); }; dialog.onclick = (e) => { if (e.target === dialog) closeDialog(); }; document.body.appendChild(dialog); requestAnimationFrame(() => dialog.classList.add('visible')); } // Use rAF
            function handleUrlParameter() { try { const urlParams = new URLSearchParams(window.location.search); const conversationText = urlParams.get('conversation'); if (conversationText) { const decodedText = decodeURIComponent(conversationText).trim(); if (decodedText) { setTimeout(() => sendMessage(decodedText, {}, true), 200); // Slight delay const nextURL = window.location.pathname; window.history.replaceState({}, document.title, nextURL); } } } catch (e) { console.error("Error processing URL parameters:", e); } }
            function adjustTextareaHeight() { const MIN_HEIGHT = 48; userInput.style.height = 'auto'; const scrollHeight = userInput.scrollHeight; const maxHeight = parseInt(window.getComputedStyle(userInput).maxHeight, 10) || 160; if (scrollHeight <= MIN_HEIGHT) { userInput.style.height = `${MIN_HEIGHT}px`; userInput.style.overflowY = 'hidden'; } else if (scrollHeight > maxHeight) { userInput.style.height = `${maxHeight}px`; userInput.style.overflowY = 'auto'; } else { userInput.style.height = `${scrollHeight}px`; userInput.style.overflowY = 'hidden'; } }
            function handleCopyClick(event, buttonElement) { // Modified to accept button element
             const messageWrapper = buttonElement.closest('.message-wrapper') || chatOutputInner.querySelector(`.message-wrapper[data-message-id="${activeMessageMenu?.dataset.messageId}"]`);
             if (!messageWrapper) return;
             const contentElement = messageWrapper.querySelector('.message-content');
             if (!contentElement) return;
             const textToCopy = contentElement.innerText || contentElement.textContent || '';
             navigator.clipboard.writeText(textToCopy.trim()).then(() => {
                 const span = buttonElement.querySelector('span');
                 const originalText = span ? span.textContent : 'העתק'; // Store original text
                 if (span) span.textContent = 'הועתק!';
                 buttonElement.classList.add('copy-success');
                 setTimeout(() => {
                     if (span) span.textContent = originalText;
                     buttonElement.classList.remove('copy-success');
                     closeMessageActionMenu(); // Close menu after feedback
                 }, 1200); // Shorter feedback time
             }).catch(err => { console.error('Failed to copy message: ', err); });
             }
            function handleRegenerateClick(event, messageWrapper) { if (typingTimeout || currentAbortController) { showCustomDialog({title:"פעולה נחסמה", message:"אנא המתן לסיום התגובה הנוכחית או בטל אותה."}); return; } // const button = event.currentTarget; // const messageWrapper = button.closest('.message-wrapper.ai-message-wrapper'); if (!messageWrapper || !messageWrapper.classList.contains('ai-message-wrapper')) return; const messageElement = messageWrapper.querySelector('.ai-message'); const userQuery = messageElement?.dataset.userQuery; const modelValue = messageElement?.dataset.modelValue; const modelName = messageElement?.dataset.modelName; const messageId = messageWrapper.dataset.messageId; if (!userQuery || !modelValue || !modelName || !messageId) { console.error('Regen Error: Missing data', messageElement?.dataset); return; } sendMessage(userQuery, { isRegeneration: true, originalAiMsgId: messageId, modelValueOverride: modelValue, modelNameOverride: modelName }, false); }
            function saveSettings() { try { localStorage.setItem('chatSettings_v7', JSON.stringify({ model: modelSelect.value, style: styleSelect.value, sendOnEnter: sendOnEnterCheckbox.checked, darkMode: darkModeCheckbox.checked })); console.log("Settings saved."); } catch (e) { console.warn("Failed to save settings:", e); } }
            function loadSettings() { try { const saved = localStorage.getItem('chatSettings_v7'); if (saved) { const settings = JSON.parse(saved); if (settings.model && Array.from(modelSelect.options).some(o=>o.value === settings.model)) modelSelect.value = settings.model; if (settings.style && Array.from(styleSelect.options).some(o=>o.value === settings.style)) styleSelect.value = settings.style; sendOnEnterCheckbox.checked = settings.sendOnEnter !== false; sendOnEnter = sendOnEnterCheckbox.checked; darkModeCheckbox.checked = settings.darkMode === true; applyDarkMode(darkModeCheckbox.checked, false); } else { applyDarkMode(window.matchMedia?.('(prefers-color-scheme: dark)').matches, false); /* Use system preference if no setting */ } } catch (e) { console.warn("Failed to load settings:", e); applyDarkMode(false, false); } }
            function applyDarkMode(isDark, save = true) { document.body.classList.toggle('dark-mode', isDark); themeToggleText.textContent = isDark ? 'ערכת נושא בהירה' : 'ערכת נושא כהה'; themeIconPlaceholder.innerHTML = isDark ? sunIconSvg : moonIconSvg; darkModeCheckbox.checked = isDark; if (save) saveSettings(); }
            function resetSettings() { showCustomDialog({ title: "איפוס הגדרות", message: "האם לאפס את כל ההגדרות לברירת המחדל?<br>ערכת הנושא תותאם להגדרות המערכת.", confirmText: "אפס", onConfirm: () => { localStorage.removeItem('chatSettings_v7'); modelSelect.value = modelSelect.options[0].value; styleSelect.value = styleSelect.options[0].value; sendOnEnterCheckbox.checked = true; sendOnEnter = true; const prefersDark = window.matchMedia?.('(prefers-color-scheme: dark)').matches; darkModeCheckbox.checked = prefersDark; applyDarkMode(prefersDark, false); console.log("Settings reset to default."); toggleSettingsPopover(false); } }); }

            // --- Add Message to Chat Function (V7.2) ---
            function addMessageToChat(text, sender, options = {}) {
                 const { isLoading = false, timestamp: isoTimestampInput = null, modelNameUsed = null, userQuery = null, modelValue = null, isLoadMore = false, messageIdOverride = null } = options;

                 const messageId = messageIdOverride || generateMessageId();
                 if (!isLoading && isoTimestampInput !== 'התחל' && !isLoadMore && !messageIdOverride) { lastMessageId = messageId; }

                 const messageWrapper = document.createElement('div');
                 messageWrapper.classList.add('message-wrapper', sender === 'user' ? 'user-message-wrapper' : 'ai-message-wrapper');
                 if (isoTimestampInput === 'התחל') messageWrapper.classList.add('initial-message');
                 messageWrapper.dataset.messageId = messageId;

                 const avatarDiv = document.createElement('div');
                 avatarDiv.classList.add('avatar');
                 avatarDiv.setAttribute('aria-hidden', 'true');
                 avatarDiv.textContent = generateAvatarContent(sender === 'user' ? 'Me' : 'AI');

                 const messageDiv = document.createElement('div');
                 messageDiv.classList.add('message', sender === 'user' ? 'user-message' : 'ai-message');
                 if (sender === 'ai' && !isLoading) { if (modelNameUsed) messageDiv.dataset.modelName = modelNameUsed; if (userQuery) messageDiv.dataset.userQuery = userQuery; if (modelValue) messageDiv.dataset.modelValue = modelValue; }

                 const contentDiv = document.createElement('div');
                 contentDiv.classList.add('message-content');

                 if (isLoading) {
                     messageDiv.classList.add('typing-indicator');
                     contentDiv.innerHTML = `
                        <div class="loading-dots"><span></span><span></span><span></span></div>
                         <button id="stop-generation-button-${messageId}" class="stop-button" title="עצור יצירה" aria-label="עצור יצירה">
                             <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M7 7h10v10H7z"/></svg>
                         </button>`;
                      messageDiv.appendChild(contentDiv);
                      const stopButton = messageDiv.querySelector(`#stop-generation-button-${messageId}`);
                      if (stopButton) stopButton.addEventListener('click', stopTypingAndGeneration);
                 } else {
                     if (sender === 'ai' && text) { try { contentDiv.innerHTML = marked.parse(text); } catch (e) { console.error("Markdown parsing error:", e); contentDiv.textContent = text; } }
                     else if (text) { contentDiv.textContent = text; }
                     else { contentDiv.innerHTML = "&nbsp;"; }
                     messageDiv.appendChild(contentDiv);

                     if (isoTimestampInput !== 'התחל') {
                         const footerDiv = document.createElement('div'); footerDiv.classList.add('message-footer');
                         const timestamp = formatTimestamp(isoTimestampInput || getCurrentTimestamp(true));
                         const timestampAbs = isoTimestampInput || getCurrentTimestamp(true);
                         if (sender === 'ai' && modelNameUsed) { const modelSpan = document.createElement('span'); modelSpan.classList.add('model-indicator'); modelSpan.textContent = `(${modelNameUsed})`; footerDiv.appendChild(modelSpan); }
                         const timestampSpan = document.createElement('span'); timestampSpan.classList.add('timestamp'); timestampSpan.textContent = timestamp; timestampSpan.dataset.timestampAbs = timestampAbs; footerDiv.appendChild(timestampSpan);
                         messageDiv.appendChild(footerDiv);

                         const ellipsisButton = document.createElement('button'); ellipsisButton.classList.add('message-actions-trigger'); ellipsisButton.setAttribute('aria-label', 'פעולות נוספות'); ellipsisButton.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M6 10c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm12 0c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm-6 0c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/></svg>';
                         ellipsisButton.addEventListener('click', (e) => { e.stopPropagation(); openMessageActionMenu(ellipsisButton, messageDiv); });
                         messageWrapper.appendChild(ellipsisButton);
                     } else { /* Handle initial footer if needed */ }
                     if (sender === 'ai') { contentDiv.querySelectorAll('pre').forEach(addCopyButtonToCodeBlock); }
                 }

                 if (sender === 'user') { messageWrapper.appendChild(messageDiv); messageWrapper.appendChild(avatarDiv); }
                 else { messageWrapper.appendChild(avatarDiv); messageWrapper.appendChild(messageDiv); }

                 const isNearBottom = chatOutput.scrollHeight - chatOutput.scrollTop - chatOutput.clientHeight < SCROLL_THRESHOLD + 50;
                 if (isLoadMore) { chatOutputInner.insertBefore(messageWrapper, chatOutputInner.firstChild.nextSibling); } // Insert after load more button
                 else { chatOutputInner.appendChild(messageWrapper); if (isLoading || isNearBottom || isScrolledToBottom) { instantScrollToBottom(); isScrolledToBottom = true; resetNewMessageCounter(); hideUnreadMarker(false); } else { incrementNewMessageCounter(); } }

                 // Trigger animation
                 requestAnimationFrame(() => { messageWrapper.classList.add('animate-in'); });

                 applyGroupingStyles(); // Recalculate grouping after adding

                 if (sender === 'ai' && !isLoading && isoTimestampInput !== 'התחל' && !isLoadMore) { messageCountSinceFeatureFetch++; if (messageCountSinceFeatureFetch >= FETCH_FEATURES_INTERVAL) { fetchChatFeatures(); } }

                 return messageDiv;
            }

            // --- Apply Grouping Styles ---
            function applyGroupingStyles() { /* ... Same as V7.1 ... */ }
            // --- AI Typing Effect Function (V7.2 - Incremental Markdown) ---
            function typeAiResponse(messageElement, fullText) { /* ... Same as V7.1 ... */ }
            // --- Finalize AI Message (V7.2) ---
            function finalizeAiMessage(messageElement, contentDiv) { /* ... Same as V7.1 ... */ }
            // --- Enable/Disable Input ---
            function enableInput() { /* ... Same as V7.1 ... */ }
            function disableInput() { /* ... Same as V7.1 ... */ }
            // --- Stop Typing and Generation (V7.2) ---
            function stopTypingAndGeneration() { /* ... Same as V7.1 ... */ }
            // --- Fetch Chat Features (V7.2 - Mocked, Dynamic Status) ---
            async function fetchChatFeatures(statusUpdate = null) {
                if (isFetchingFeatures) return;
                isFetchingFeatures = true;
                messageCountSinceFeatureFetch = 0;

                if (!statusUpdate) { // Only show loading if not just a status update
                    chatSentimentElement.className = 'loading'; chatSentimentElement.innerHTML = '';
                    chatKeywordsDisplay.innerHTML = '<span class="loading"></span><span class="loading"></span>';
                    aiSuggestionsArea.classList.remove('visible');
                }

                const history = getChatHistory();
                const historyString = history.map(m => `[${m.role.toUpperCase()}] ${m.content}`).join('\n');

                try {
                    console.log("Simulating fetchChatFeatures...");
                    await new Promise(resolve => setTimeout(resolve, 600 + Math.random() * 500)); // Faster simulation
                    const mockResponse = { success: true, data: { title: generateMockTitle(history), sentiment: ['positive', 'negative', 'neutral'][Math.floor(Math.random() * 3)], keywords: generateMockKeywords(history), suggestions: generateMockSuggestions(history) } };
                    const data = mockResponse.data;

                    chatTitleElement.textContent = data.title || 'שיחה כללית';
                    chatTitleElement.parentElement.title = `כותרת: ${data.title || 'לא נמצאה'}`;
                    chatSentimentElement.className = ''; chatSentimentElement.classList.add(data.sentiment || 'neutral');
                    chatSentimentElement.innerHTML = getSentimentIcon(data.sentiment);
                    chatSentimentElement.title = `סנטימנט: ${translateSentiment(data.sentiment)}`;

                    // Update Status Text Dynamically
                    if (statusUpdate) {
                        headerStatusElement.textContent = statusUpdate;
                        headerStatusElement.classList.toggle('typing', statusUpdate === 'AI מקליד...');
                    } else {
                         headerStatusElement.textContent = `סנטימנט: ${translateSentiment(data.sentiment)} | מילות מפתח: ${data.keywords.length}`;
                         headerStatusElement.classList.remove('typing');
                    }


                    if (data.keywords && data.keywords.length > 0) { chatKeywordsDisplay.innerHTML = data.keywords.map(kw => `<span class="keyword-chip">${kw}</span>`).join(''); }
                    else { chatKeywordsDisplay.innerHTML = '<span>אין מילות מפתח</span>'; }
                    sessionStorage.setItem('aiSuggestions', JSON.stringify(data.suggestions || []));
                     // Only show suggestions if it wasn't just a status update call
                     if (!statusUpdate) { showSuggestions(); }

                } catch (error) {
                    console.error("Error fetching chat features:", error);
                    if (!statusUpdate) { // Reset only if it wasn't just a status update call
                        chatTitleElement.textContent = originalDocumentTitle; chatSentimentElement.className = 'neutral'; chatSentimentElement.innerHTML = getSentimentIcon('neutral'); chatKeywordsDisplay.innerHTML = '<span>שגיאה</span>';
                        headerStatusElement.textContent = 'שגיאה בעדכון';
                        headerStatusElement.classList.remove('typing');
                    }
                } finally {
                    isFetchingFeatures = false;
                }
            }
            // --- Helper functions for Mock Data (V7.2) ---
            function generateMockTitle(history) { /* ... Same ... */ }
            function generateMockKeywords(history) { /* ... Same ... */ }
            function generateMockSuggestions(history) { /* ... Same ... */ }
            function getSentimentIcon(sentiment) { /* ... Same ... */ }
            function translateSentiment(sentiment) { /* ... Same ... */ }

            // --- Show AI Suggestions (V7.2 - Staggered Animation) ---
            function showSuggestions() {
                 const suggestions = JSON.parse(sessionStorage.getItem('aiSuggestions') || '[]');
                 aiSuggestionsArea.innerHTML = ''; // Clear previous
                 if (suggestions && suggestions.length > 0) {
                     suggestions.forEach((suggestion, index) => {
                         const chip = document.createElement('button');
                         chip.classList.add('suggestion-chip');
                         chip.textContent = suggestion;
                         chip.style.transitionDelay = `${index * 0.07}s`; // Stagger delay
                         chip.onclick = () => { userInput.value = suggestion; adjustTextareaHeight(); sendMessage(); hideSuggestions(); };
                         aiSuggestionsArea.appendChild(chip);
                     });
                     // Use rAF to ensure elements are in DOM before adding class to trigger transition
                     requestAnimationFrame(() => {
                          aiSuggestionsArea.classList.add('visible');
                          // Force reflow is sometimes needed, but try without first
                          // aiSuggestionsArea.offsetHeight;
                          aiSuggestionsArea.querySelectorAll('.suggestion-chip').forEach(chip => {
                               chip.style.opacity = '1';
                               chip.style.transform = 'translateY(0)';
                          });
                     });
                 } else {
                     aiSuggestionsArea.classList.remove('visible');
                 }
             }

            // --- Send Message Function (V7.2 - Dynamic Status) ---
            async function sendMessage(textToSend, options = {}, skipResponse = false) {
                 const { isRegeneration = false, originalAiMsgId = null, modelValueOverride = null, modelNameOverride = null } = options;
                 const currentText = textToSend !== undefined ? textToSend.trim() : userInput.value.trim();
                 if (currentText === '' || currentAbortController) return;

                 disableInput();
                 hideSuggestions();
                 updateHeaderStatus("מעבד..."); // Update status

                 const userMessageId = generateMessageId();
                 if (!isRegeneration) { addMessageToChat(currentText, 'user', { timestamp: getCurrentTimestamp(true), messageIdOverride: userMessageId }); userInput.value = ''; adjustTextareaHeight(); instantScrollToBottom(); isScrolledToBottom = true; resetNewMessageCounter(); hideUnreadMarker(); }
                 else if (originalAiMsgId) { const oldAiMsgWrapper = chatOutputInner.querySelector(`.message-wrapper[data-message-id="${originalAiMsgId}"]`); if (oldAiMsgWrapper) oldAiMsgWrapper.remove(); applyGroupingStyles(); }

                 if (skipResponse) { enableInput(); updateHeaderStatus("מחובר"); return; } // Reset status

                 const loadingIndicatorElement = addMessageToChat(null, 'ai', { isLoading: true });
                 instantScrollToBottom();

                 const historyArray = getChatHistory(isRegeneration, originalAiMsgId);
                 const historyString = historyArray.map(m => `[${m.role.toUpperCase()}] ${m.content}`).join('\n');
                 const requestPayloadText = isRegeneration ? historyString : `${historyString}\n[USER] ${currentText}`;

                 const selectedOption = modelValueOverride ? (Array.from(modelSelect.options).find(opt => opt.value === modelValueOverride) || modelSelect.options[modelSelect.selectedIndex]) : modelSelect.options[modelSelect.selectedIndex];
                 const modelName = modelNameOverride || selectedOption.text;
                 const selectedModelFile = selectedOption.value;
                 const currentApiUrl = BASE_API_URL + selectedModelFile;

                 currentAbortController = new AbortController();
                 const signal = currentAbortController.signal;

                 try {
                      updateHeaderStatus("AI חושב..."); // Thinking status
                     const requestBody = { text: requestPayloadText };
                     const response = await fetch(currentApiUrl, { method: 'POST', headers: { 'Content-Type': 'application/json' }, body: JSON.stringify(requestBody), signal });
                     if (signal.aborted) throw new DOMException('Aborted by user', 'AbortError');

                     if (loadingIndicatorElement?.closest('.message-wrapper')) { loadingIndicatorElement.closest('.message-wrapper').remove(); applyGroupingStyles(); }

                     if (!response.ok) { let errorText = `Server Error: ${response.status}`; try { const errorData = await response.json(); errorText += ` - ${errorData?.error || errorData?.message || 'Unknown error'}`; } catch (e) {} throw new Error(errorText); }

                     const data = await response.json();
                     if (data && data.text) {
                          updateHeaderStatus("AI מקליד..."); // Typing status
                         const aiMessageElement = addMessageToChat('', 'ai', { timestamp: getCurrentTimestamp(true), modelNameUsed: modelName, userQuery: currentText, modelValue: selectedModelFile });
                         typeAiResponse(aiMessageElement, data.text); // finalize will re-enable and fetch features
                     } else { throw new Error("Invalid response format from server."); }

                 } catch (error) {
                     if (loadingIndicatorElement?.closest('.message-wrapper')) { loadingIndicatorElement.closest('.message-wrapper').remove(); applyGroupingStyles(); }
                     if (error.name === 'AbortError') { console.log('Fetch aborted.'); updateHeaderStatus("בוטל"); }
                     else { console.error("Error sending/receiving message:", error); addMessageToChat(`שגיאה: ${error.message}`, 'ai', { modelNameUsed: modelName }); updateHeaderStatus("שגיאה"); }
                      enableInput();
                 } finally {
                     currentAbortController = null;
                     // Don't reset status here, finalizeAiMessage or error handling does it.
                 }
            }

             // --- Hide Suggestions ---
             function hideSuggestions() {
                 aiSuggestionsArea.classList.remove('visible');
                 // Keep suggestions in storage until explicitly cleared or new ones arrive
                 // sessionStorage.removeItem('aiSuggestions');
             }
            // --- Update Header Status ---
            function updateHeaderStatus(statusText) {
                 headerStatusElement.textContent = statusText;
                 headerStatusElement.classList.toggle('typing', statusText === 'AI מקליד...');
                 headerStatusElement.title = statusText; // Update tooltip as well
            }


            // --- Initialization (V7.2) ---
            function initializeChat() {
                console.log("Initializing Chat Interface V7.2...");
                loadSettings();
                adjustTextareaHeight();
                instantScrollToBottom();
                enableInput();
                updateScrollState();
                originalDocumentTitle = document.title;
                handleUrlParameter();
                applyGroupingStyles(); // Apply initial grouping

                // Initial feature fetch
                setTimeout(fetchChatFeatures, 300); // Fetch features slightly faster after UI ready

                console.log("Futuristic AI Chat V7.2 (UI Enhancements) initialized.");
            }

            // --- Event Listeners Setup (V7.2) ---
            sendButton.addEventListener('click', () => sendMessage());
            userInput.addEventListener('keypress', (event) => { if (event.key === 'Enter' && !event.shiftKey && !event.isComposing && sendOnEnter) { event.preventDefault(); sendMessage(); } });
            userInput.addEventListener('input', () => { // Combined input handler
                adjustTextareaHeight();
                const hasText = userInput.value.length > 0;
                clearInputButton.style.display = hasText ? 'flex' : 'none';
                sendButton.classList.toggle('has-text', hasText); // Toggle class for pulse animation
                hideSuggestions();
             });
            clearInputButton.addEventListener('click', () => { userInput.value = ''; adjustTextareaHeight(); clearInputButton.style.display = 'none'; sendButton.classList.remove('has-text'); focusElement(userInput); });
            chatOutput.addEventListener('scroll', debouncedUpdateScrollState);
            scrollToBottomButton.addEventListener('click', () => { smoothScrollToBottom(); resetNewMessageCounter(); hideUnreadMarker(); });
            settingsButton.addEventListener('click', (e) => { e.stopPropagation(); toggleSettingsPopover(); }); // Prevent body click closing immediately
            document.addEventListener('click', (e) => { if (!settingsPopover.contains(e.target) && !settingsButton.contains(e.target) && settingsPopover.classList.contains('visible')) { toggleSettingsPopover(false); } if (activeMessageMenu && !activeMessageMenu.contains(e.target) && !e.target.closest('.message-actions-trigger')) { closeMessageActionMenu(); } }); // Close popovers/menus
            // Settings Listeners
            modelSelect.addEventListener('change', saveSettings);
            styleSelect.addEventListener('change', saveSettings);
            sendOnEnterContainer.addEventListener('click', (e) => { if(e.target !== sendOnEnterCheckbox) sendOnEnterCheckbox.checked = !sendOnEnterCheckbox.checked; sendOnEnter = sendOnEnterCheckbox.checked; saveSettings(); });
            darkModeContainer.addEventListener('click', (e) => { if(e.target !== darkModeCheckbox) darkModeCheckbox.checked = !darkModeCheckbox.checked; applyDarkMode(darkModeCheckbox.checked); });
            downloadChatButton.addEventListener('click', downloadChat);
            clearChatButton.addEventListener('click', clearChat);
            resetSettingsButton.addEventListener('click', resetSettings);
            // Keyboard Shortcuts
            document.addEventListener('keydown', (e) => { userInteracted = true; if (e.altKey && e.key.toLowerCase() === 's') { e.preventDefault(); toggleSettingsPopover(); } else if (e.altKey && e.key.toLowerCase() === 'i') { e.preventDefault(); focusElement(userInput); } else if (e.altKey && e.key.toLowerCase() === 'x') { e.preventDefault(); if(userInput.value) {userInput.value = ''; adjustTextareaHeight(); clearInputButton.style.display = 'none'; sendButton.classList.remove('has-text');} } else if (e.key === 'Escape') { if (settingsPopover.classList.contains('visible')) toggleSettingsPopover(false); if (activeMessageMenu) closeMessageActionMenu(); } else if (e.key === 'End' && !e.shiftKey && !e.ctrlKey && !e.altKey) { instantScrollToBottom(); } else if (e.key === 'Home' && !e.shiftKey && !e.ctrlKey && !e.altKey) { chatOutput.scrollTo({ top: 0, behavior: 'smooth' }); } else if (e.ctrlKey && e.key === 'Enter' && !sendOnEnter) { sendMessage(); } });
            // Ensure send button pulse is removed if text is pasted and then removed without typing
             userInput.addEventListener('change', () => { sendButton.classList.toggle('has-text', userInput.value.length > 0); });


            // Call initialization
            initializeChat();

        }); // End DOMContentLoaded
    })(); // End IIFE
</script>

<?php /* PHP logging code remains commented or handled separately */ ?>

</body>
</html>
