<!DOCTYPE html>
<html lang="he" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Chat V9.2 - Gamer Load</title> <!-- Updated Title -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Marked.js -->
    <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>

    <!-- Prism.js for Syntax Highlighting -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism-okaidia.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-core.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/plugins/autoloader/prism-autoloader.min.js"></script>

    <style>
        /* --- CSS V9.2 --- */
        :root {
            --font-main: 'Rubik', sans-serif;
            --font-code: 'Fira Code', monospace, ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New";
            --border-radius-small: 6px;
            --border-radius-medium: 14px;
            --border-radius-large: 30px;
            --border-radius-round: 50%;
            --bezier-elegant: cubic-bezier(0.65, 0, 0.35, 1);
            --bezier-overshoot: cubic-bezier(0.34, 1.56, 0.64, 1);
            --transition-fast: 0.2s var(--bezier-elegant);
            --transition-medium: 0.4s var(--bezier-elegant);
            --transition-slow: 0.6s var(--bezier-elegant);
            --avatar-size: 40px;
            --hue-rotation-speed: 15s;
            --splash-hue-rotation-speed: 10s;
            --accent-1: #00e5ff; --accent-2: #8e44ad; --accent-3: #ff4757; --link-color: #00aaff;
            --glow-color: color-mix(in srgb, var(--accent-1) 40%, transparent);
            --button-glow-color-lm: color-mix(in srgb, var(--accent-2) 30%, transparent);
            --button-glow-color-dm: color-mix(in srgb, var(--accent-1) 35%, transparent);
            --lm-whatsapp-bg-color: #e5ddd5;
            --dm-whatsapp-bg-color: #0e161a;
            --lm-whatsapp-bg-image: none;
            --dm-whatsapp-bg-image: none;
            /* --- Light Mode --- */
            --lm-bg-default: #f4f7f9; --lm-chat-bg: #ffffff; --lm-header-bg: linear-gradient(115deg, var(--accent-2) 0%, #a560e4 100%); --lm-header-text: #ffffff; --lm-header-icon-fill: #ffffff; --lm-header-status-text: rgba(255, 255, 255, 0.85); --lm-user-msg-bg: #dcf8c6; --lm-ai-msg-bg: #ffffff; --lm-msg-text: #1c1e21; --lm-input-area-bg: #e9edf1; --lm-input-bg: #ffffff; --lm-input-text: #1c1e21; --lm-input-border: #ced4da; --lm-input-border-focus: var(--accent-2); --lm-input-shadow-focus: 0 0 0 3.5px color-mix(in srgb, var(--accent-2) 15%, transparent); --lm-input-glow: 0 0 12px color-mix(in srgb, var(--accent-2) 18%, transparent); --lm-button-bg: #008069; --lm-button-hover-bg: #00a884; --lm-button-active-bg: #005c4b; --lm-button-icon-fill: #ffffff; --lm-button-secondary-text: color-mix(in srgb, var(--accent-2) 90%, black); --lm-button-secondary-border: color-mix(in srgb, var(--accent-2) 35%, transparent); --lm-button-secondary-hover-bg: color-mix(in srgb, var(--accent-2) 8%, transparent); --lm-timestamp-color: rgba(0, 0, 0, 0.6); --lm-model-indicator-color: rgba(0, 0, 0, 0.55); --lm-border-color: #dee2e6; --lm-icon-button-hover-bg: rgba(0, 0, 0, 0.07); --lm-msg-action-icon-fill: rgba(0, 0, 0, 0.6); --lm-msg-action-icon-hover-fill: #000000; --lm-msg-action-icon-hover-bg: rgba(0, 0, 0, 0.09); --lm-scrollbar-thumb: #b0b9c3; --lm-scrollbar-track: transparent; --lm-code-bg: #f1f3f5; --lm-code-text: #212529; --lm-code-border: #dbe0e5; --lm-code-copy-btn-bg: rgba(0, 0, 0, 0.05); --lm-code-copy-btn-hover-bg: rgba(0, 0, 0, 0.1); --lm-code-copy-btn-copied-bg: var(--accent-1); --lm-code-copy-btn-copied-text: #111; --lm-loading-dot-color: var(--lm-timestamp-color); --lm-shadow-light: 0 1px 1px rgba(0, 0, 0, 0.05); --lm-shadow-medium: 0 2px 4px rgba(0, 0, 0, 0.08); --lm-shadow-high: 0 4px 10px rgba(0, 0, 0, 0.1); --lm-scroll-btn-bg: rgba(255, 255, 255, 0.92); --lm-scroll-btn-icon: #343a40; --lm-scroll-btn-hover-bg: #ffffff; --lm-popover-bg: rgba(255, 255, 255, 0.97); --lm-popover-backdrop-filter: blur(12px); --lm-popover-shadow: var(--lm-shadow-high); --lm-popover-border: rgba(0, 0, 0, 0.05); --lm-menu-item-hover-bg: #eef1f4; --lm-counter-bg: var(--accent-3); --lm-counter-text: #ffffff; --lm-avatar-text: #ffffff; --lm-dialog-bg: var(--lm-popover-bg); --lm-dialog-text: var(--lm-msg-text); --lm-dialog-shadow: var(--lm-popover-shadow); --lm-dialog-overlay-bg: rgba(0, 0, 0, 0.4); --lm-dialog-button-bg: var(--lm-button-bg); --lm-dialog-button-text: var(--lm-button-icon-fill); --lm-dialog-cancel-button-bg: #e4e9f0; --lm-dialog-cancel-button-text: var(--lm-msg-text); --lm-kbd-bg: #e4e9f0; --lm-kbd-border: #cbd2d9; --lm-kbd-text: #495057; --lm-message-hover-bg: rgba(0, 0, 0, 0.02); --lm-group-separator-color: rgba(0, 0, 0, 0.06); --stop-button-fill: var(--lm-msg-action-icon-fill); --stop-button-hover-fill: var(--lm-msg-action-icon-hover-fill); --lm-thinking-text-bg: linear-gradient(90deg, var(--accent-2), var(--accent-1), var(--accent-3), var(--accent-2)); --lm-thinking-border-color: color-mix(in srgb, var(--accent-2) 40%, transparent); --lm-external-link-icon-color: rgba(0, 0, 0, 0.5); --lm-table-border: #e0e0e0; --lm-table-header-bg: #f9f9f9; --lm-thinking-bubble-bg-pulse: rgba(142, 68, 173, 0.05);
            /* --- Dark Mode --- */
            --dm-bg-default: #0b0e11; --dm-chat-bg: #101418; --dm-header-bg: linear-gradient(115deg, #181f26 0%, #212b33 100%); --dm-header-text: #e3eaf1; --dm-header-icon-fill: #a8b3bd; --dm-header-status-text: rgba(227, 234, 241, 0.75); --dm-user-msg-bg: #005c4b; --dm-ai-msg-bg: #1f2c34; --dm-msg-text: #d0d9e1; --dm-input-area-bg: #0b0e11; --dm-input-bg: #151b21; --dm-input-text: #d0d9e1; --dm-input-border: #2a343c; --dm-input-border-focus: var(--accent-1); --dm-input-shadow-focus: 0 0 0 3.5px color-mix(in srgb, var(--accent-1) 15%, transparent); --dm-input-glow: 0 0 12px color-mix(in srgb, var(--accent-1) 18%, transparent); --dm-button-bg: #00a884; --dm-button-hover-bg: #008069; --dm-button-active-bg: #00a884; --dm-button-icon-fill: #111b21; --dm-button-secondary-text: var(--accent-1); --dm-button-secondary-border: color-mix(in srgb, var(--accent-1) 35%, transparent); --dm-button-secondary-hover-bg: color-mix(in srgb, var(--accent-1) 10%, transparent); --dm-timestamp-color: rgba(255, 255, 255, 0.55); --dm-model-indicator-color: rgba(255, 255, 255, 0.5); --dm-border-color: #2a343c; --dm-icon-button-hover-bg: rgba(255, 255, 255, 0.08); --dm-msg-action-icon-fill: rgba(255, 255, 255, 0.65); --dm-msg-action-icon-hover-fill: #ffffff; --dm-msg-action-icon-hover-bg: rgba(255, 255, 255, 0.1); --dm-scrollbar-thumb: #343f48; --dm-scrollbar-track: transparent; --dm-code-bg: #151b21; --dm-code-text: #b0bac3; --dm-code-border: #2a343c; --dm-code-copy-btn-bg: rgba(255, 255, 255, 0.08); --dm-code-copy-btn-hover-bg: rgba(255, 255, 255, 0.12); --dm-code-copy-btn-copied-bg: var(--accent-1); --dm-code-copy-btn-copied-text: #111; --dm-loading-dot-color: var(--dm-timestamp-color); --dm-shadow-light: 0 1px 1px rgba(0, 0, 0, 0.3); --dm-shadow-medium: 0 4px 10px rgba(0, 0, 0, 0.4); --dm-shadow-high: 0 7px 22px rgba(0, 0, 0, 0.45); --dm-scroll-btn-bg: rgba(21, 27, 33, 0.94); --dm-scroll-btn-icon: #a8b3bd; --dm-scroll-btn-hover-bg: #1f2c34; --dm-popover-bg: rgba(21, 27, 33, 0.96); --dm-popover-backdrop-filter: blur(14px); --dm-popover-shadow: var(--dm-shadow-high); --dm-popover-border: rgba(255, 255, 255, 0.07); --dm-menu-item-hover-bg: #1f2c34; --dm-counter-bg: var(--accent-3); --dm-counter-text: #ffffff; --dm-avatar-text: #e3eaf1; --dm-dialog-bg: var(--dm-popover-bg); --dm-dialog-text: var(--dm-msg-text); --dm-dialog-shadow: var(--dm-popover-shadow); --dm-dialog-overlay-bg: rgba(0, 0, 0, 0.6); --dm-dialog-button-bg: var(--dm-button-bg); --dm-dialog-button-text: var(--dm-button-icon-fill); --dm-dialog-cancel-button-bg: #37474f; --dm-dialog-cancel-button-text: var(--dm-msg-text); --dm-kbd-bg: #28333d; --dm-kbd-border: #3a4752; --dm-kbd-text: #b0bac3; --dm-message-hover-bg: rgba(255, 255, 255, 0.03); --dm-group-separator-color: rgba(255, 255, 255, 0.07); --stop-button-fill: var(--dm-msg-action-icon-fill); --stop-button-hover-fill: var(--dm-msg-action-icon-hover-fill); --dm-thinking-text-bg: linear-gradient(90deg, var(--accent-1), var(--accent-2), #45a3e5, var(--accent-1)); --dm-thinking-border-color: color-mix(in srgb, var(--accent-1) 40%, transparent); --dm-external-link-icon-color: rgba(255, 255, 255, 0.5); --dm-table-border: #3a4752; --dm-table-header-bg: #28333d; --dm-thinking-bubble-bg-pulse: rgba(0, 229, 255, 0.06);

            /* Apply Defaults */
             --bg-default: var(--lm-bg-default); --chat-bg: var(--lm-chat-bg); --header-bg: var(--lm-header-bg); --header-text: var(--lm-header-text); --header-icon-fill: var(--lm-header-icon-fill); --header-status-text: var(--lm-header-status-text); --user-msg-bg: var(--lm-user-msg-bg); --ai-msg-bg: var(--lm-ai-msg-bg); --msg-text: var(--lm-msg-text); --input-area-bg: var(--lm-input-area-bg); --input-bg: var(--lm-input-bg); --input-text: var(--lm-input-text); --input-border: var(--lm-input-border); --input-border-focus: var(--lm-input-border-focus); --input-shadow-focus: var(--lm-input-shadow-focus); --input-glow: var(--lm-input-glow); --button-bg: var(--lm-button-bg); --button-hover-bg: var(--lm-button-hover-bg); --button-active-bg: var(--lm-button-active-bg); --button-icon-fill: var(--lm-button-icon-fill); --button-secondary-text: var(--lm-button-secondary-text); --button-secondary-border: var(--lm-button-secondary-border); --button-secondary-hover-bg: var(--lm-button-secondary-hover-bg); --timestamp-color: var(--lm-timestamp-color); --model-indicator-color: var(--lm-model-indicator-color); --border-color: var(--lm-border-color); --icon-button-hover-bg: var(--lm-icon-button-hover-bg); --msg-action-icon-fill: var(--lm-msg-action-icon-fill); --msg-action-icon-hover-fill: var(--lm-msg-action-icon-hover-fill); --msg-action-icon-hover-bg: var(--lm-msg-action-icon-hover-bg); --scrollbar-thumb: var(--lm-scrollbar-thumb); --scrollbar-track: transparent; --code-bg: var(--lm-code-bg); --code-text: var(--lm-code-text); --code-border: var(--lm-code-border); --code-copy-btn-bg: var(--lm-code-copy-btn-bg); --code-copy-btn-hover-bg: var(--lm-code-copy-btn-hover-bg); --code-copy-btn-copied-bg: var(--lm-code-copy-btn-copied-bg); --code-copy-btn-copied-text: var(--lm-code-copy-btn-copied-text); --loading-dot-color: var(--lm-loading-dot-color); --shadow-light: var(--lm-shadow-light); --shadow-medium: var(--lm-shadow-medium); --shadow-high: var(--lm-shadow-high); --scroll-btn-bg: var(--lm-scroll-btn-bg); --scroll-btn-icon: var(--lm-scroll-btn-icon); --scroll-btn-hover-bg: var(--lm-scroll-btn-hover-bg); --popover-bg: var(--lm-popover-bg); --popover-backdrop-filter: var(--lm-popover-backdrop-filter); --popover-shadow: var(--lm-popover-shadow); --popover-border: var(--lm-popover-border); --menu-item-hover-bg: var(--lm-menu-item-hover-bg); --counter-bg: var(--lm-counter-bg); --counter-text: var(--lm-counter-text); --avatar-text: var(--lm-avatar-text); --dialog-bg: var(--lm-dialog-bg); --dialog-text: var(--lm-dialog-text); --dialog-shadow: var(--lm-dialog-shadow); --dialog-overlay-bg: var(--lm-dialog-overlay-bg); --dialog-button-bg: var(--lm-dialog-button-bg); --dialog-button-text: var(--lm-dialog-button-text); --dialog-cancel-button-bg: var(--lm-dialog-cancel-button-bg); --dialog-cancel-button-text: var(--lm-dialog-cancel-button-text); --kbd-bg: var(--lm-kbd-bg); --kbd-border: var(--lm-kbd-border); --kbd-text: var(--lm-kbd-text); --message-hover-bg: var(--lm-message-hover-bg); --group-separator-color: var(--lm-group-separator-color); --stop-button-fill: var(--lm-msg-action-icon-fill); --stop-button-hover-fill: var(--lm-msg-action-icon-hover-fill);
             --whatsapp-bg-color: var(--lm-whatsapp-bg-color); --whatsapp-bg-image: var(--lm-whatsapp-bg-image);
             --thinking-text-bg: var(--lm-thinking-text-bg); --thinking-border-color: var(--lm-thinking-border-color);
             --external-link-icon-color: var(--lm-external-link-icon-color); --table-border: var(--lm-table-border); --table-header-bg: var(--lm-table-header-bg);
             --thinking-bubble-bg-pulse: var(--lm-thinking-bubble-bg-pulse);
        }
        body.dark-mode {
             --bg-default: var(--dm-bg-default); --chat-bg: var(--dm-chat-bg); --header-bg: var(--dm-header-bg); --header-text: var(--dm-header-text); --header-icon-fill: var(--dm-header-icon-fill); --header-status-text: var(--dm-header-status-text); --user-msg-bg: var(--dm-user-msg-bg); --ai-msg-bg: var(--dm-ai-msg-bg); --msg-text: var(--dm-msg-text); --input-area-bg: var(--dm-input-area-bg); --input-bg: var(--dm-input-bg); --input-text: var(--dm-input-text); --input-border: var(--dm-input-border); --input-border-focus: var(--dm-input-border-focus); --input-shadow-focus: var(--dm-input-shadow-focus); --input-glow: var(--dm-input-glow); --button-bg: var(--dm-button-bg); --button-hover-bg: var(--dm-button-hover-bg); --button-active-bg: var(--dm-button-active-bg); --button-icon-fill: var(--dm-button-icon-fill); --button-secondary-text: var(--dm-button-secondary-text); --button-secondary-border: var(--dm-button-secondary-border); --button-secondary-hover-bg: var(--dm-button-secondary-hover-bg); --timestamp-color: var(--dm-timestamp-color); --model-indicator-color: var(--dm-model-indicator-color); --border-color: var(--dm-border-color); --icon-button-hover-bg: var(--dm-icon-button-hover-bg); --msg-action-icon-fill: var(--dm-msg-action-icon-fill); --msg-action-icon-hover-fill: var(--dm-msg-action-icon-hover-fill); --msg-action-icon-hover-bg: var(--dm-msg-action-icon-hover-bg); --scrollbar-thumb: var(--dm-scrollbar-thumb); --scrollbar-track: transparent; --code-bg: var(--dm-code-bg); --code-text: var(--dm-code-text); --code-border: var(--dm-code-border); --code-copy-btn-bg: var(--dm-code-copy-btn-bg); --code-copy-btn-hover-bg: var(--dm-code-copy-btn-hover-bg); --code-copy-btn-copied-bg: var(--dm-code-copy-btn-copied-bg); --code-copy-btn-copied-text: var(--dm-code-copy-btn-copied-text); --loading-dot-color: var(--dm-loading-dot-color); --shadow-light: var(--dm-shadow-light); --shadow-medium: var(--dm-shadow-medium); --shadow-high: var(--dm-shadow-high); --scroll-btn-bg: var(--dm-scroll-btn-bg); --scroll-btn-icon: var(--dm-scroll-btn-icon); --scroll-btn-hover-bg: var(--dm-scroll-btn-hover-bg); --popover-bg: var(--dm-popover-bg); --popover-backdrop-filter: var(--dm-popover-backdrop-filter); --popover-shadow: var(--dm-popover-shadow); --popover-border: var(--dm-popover-border); --menu-item-hover-bg: var(--dm-menu-item-hover-bg); --counter-bg: var(--dm-counter-bg); --counter-text: var(--dm-counter-text); --avatar-text: var(--dm-avatar-text); --dialog-bg: var(--dm-dialog-bg); --dialog-text: var(--dm-msg-text); --dialog-shadow: var(--dm-dialog-shadow); --dialog-overlay-bg: var(--dm-dialog-overlay-bg); --dialog-button-bg: var(--dm-dialog-button-bg); --dialog-button-text: var(--dm-button-icon-fill); --dialog-cancel-button-bg: var(--dm-dialog-cancel-button-bg); --dialog-cancel-button-text: var(--dm-msg-text); --kbd-bg: var(--dm-kbd-bg); --kbd-border: var(--dm-kbd-border); --kbd-text: var(--dm-kbd-text); --message-hover-bg: var(--dm-message-hover-bg); --group-separator-color: var(--dm-group-separator-color);
             --stop-button-fill: var(--dm-msg-action-icon-fill); --stop-button-hover-fill: var(--dm-msg-action-icon-hover-fill);
             --whatsapp-bg-color: var(--dm-whatsapp-bg-color); --whatsapp-bg-image: var(--dm-whatsapp-bg-image);
              --thinking-text-bg: var(--dm-thinking-text-bg); --thinking-border-color: var(--dm-thinking-border-color);
             --external-link-icon-color: var(--dm-external-link-icon-color); --table-border: var(--dm-table-border); --table-header-bg: var(--dm-table-header-bg);
             --thinking-bubble-bg-pulse: var(--dm-thinking-bubble-bg-pulse);
        }
        /* Base Styles */ html, body { height: 100%; margin: 0; padding: 0; overflow: hidden; } body { font-family: var(--font-main); background-color: var(--bg-default); color: var(--msg-text); display: flex; flex-direction: column; transition: background-color var(--transition-medium), color var(--transition-medium); font-size: 15px; line-height: 1.6; -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale; } * { box-sizing: border-box; } *:focus-visible { outline: 2px solid var(--accent-1); outline-offset: 2px; border-radius: var(--border-radius-small); box-shadow: 0 0 0 4px color-mix(in srgb, var(--accent-1) 20%, transparent); } #user-input:focus-visible { outline: none; } a { color: var(--link-color); text-decoration: none; transition: color var(--transition-fast), text-decoration var(--transition-fast); } a:hover { color: color-mix(in srgb, var(--link-color) 70%, var(--msg-text)); text-decoration: underline; }
        /* External Link Icon */
        .message-content a[href^="http"] { position: relative; margin-left: 16px; }
        .message-content a[href^="http"]::after { content: ''; display: inline-block; width: 12px; height: 12px; background-color: var(--external-link-icon-color); mask-image: url('data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"%3E%3Cpath d="M19 19H5V5h7V3H5c-1.11 0-2 .9-2 2v14c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2v-7h-2v7zM14 3v2h3.59l-9.83 9.83 1.41 1.41L19 6.41V10h2V3h-7z"/%3E%3C/svg%3E'); -webkit-mask-image: url('data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"%3E%3Cpath d="M19 19H5V5h7V3H5c-1.11 0-2 .9-2 2v14c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2v-7h-2v7zM14 3v2h3.59l-9.83 9.83 1.41 1.41L19 6.41V10h2V3h-7z"/%3E%3C/svg%3E'); mask-size: contain; mask-repeat: no-repeat; position: absolute; left: -16px; top: 50%; transform: translateY(-50%); opacity: 0.7; transition: opacity var(--transition-fast); }
        .message-content a[href^="http"]:hover::after { opacity: 1; }
        ::selection { background-color: color-mix(in srgb, var(--accent-1) 40%, transparent); color: var(--msg-text); } body.dark-mode ::selection { background-color: color-mix(in srgb, var(--accent-1) 35%, transparent); color: var(--dm-msg-text); }

        /* --- Splash Screen - Tech/Gamer Style --- */
        #splash-screen {
            position: fixed; inset: 0; z-index: 1000;
            display: flex; flex-direction: column; align-items: center; justify-content: center;
            background: linear-gradient(145deg, #0f0c29, #302b63, #24243e, #004e92); /* Dark tech gradient */
            background-size: 300% 300%;
            animation: splash-gradient 15s ease infinite, splash-hue-rotate var(--splash-hue-rotation-speed) linear infinite alternate;
            opacity: 1; transition: opacity 0.5s ease-out, visibility 0s 0.5s;
            pointer-events: auto;
            overflow: hidden; /* Hide noise overflow */
        }
        #splash-screen::before { /* Noise overlay */
            content: ''; position: absolute; inset: 0;
            background-image: url('data:image/svg+xml,%3Csvg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg"%3E%3Cfilter id="noiseFilter"%3E%3CfeTurbulence type="fractalNoise" baseFrequency="0.95" numOctaves="3" stitchTiles="stitch"/%3E%3C/filter%3E%3Crect width="100%25" height="100%25" filter="url(%23noiseFilter)"/%3E%3C/svg%3E');
            opacity: 0.03; /* Very subtle */
            animation: noise-animation 0.5s steps(2) infinite;
            pointer-events: none;
        }
        #splash-screen.hidden { opacity: 0; visibility: hidden; pointer-events: none; }

        @keyframes splash-gradient { 0%{background-position:0% 50%} 50%{background-position:100% 50%} 100%{background-position:0% 50%} }
        @keyframes splash-hue-rotate { from { filter: hue-rotate(-10deg) brightness(1); } to { filter: hue-rotate(10deg) brightness(1.1); } }
        @keyframes noise-animation { 0% { transform: translate(0, 0); } 25% { transform: translate(-2px, 2px); } 50% { transform: translate(2px, -2px); } 75% { transform: translate(-1px, 1px); } 100% { transform: translate(0, 0); } }

        #splash-logo {
            width: 90px; height: 90px; position: relative; margin-bottom: 35px;
            display: flex; align-items: center; justify-content: center;
        }
        .logo-square { /* Base for squares */
            position: absolute; width: 100%; height: 100%;
            border: 2px solid var(--accent-1);
            box-shadow: 0 0 8px 1px color-mix(in srgb, var(--accent-1) 50%, transparent),
                        inset 0 0 5px 0px color-mix(in srgb, var(--accent-1) 30%, transparent);
            background: transparent;
        }
        .logo-square.outer {
            animation: spin-outer 5s linear infinite;
        }
        .logo-square.inner {
             width: 70%; height: 70%;
             border-width: 1.5px;
             border-style: dashed;
             animation: spin-inner 4s linear infinite reverse;
        }
        .logo-square.center {
            width: 45%; height: 45%;
            border-style: solid;
            background-color: color-mix(in srgb, var(--accent-1) 15%, #000);
            animation: glitch-effect 1.5s infinite alternate steps(4, end);
        }
        @keyframes spin-outer { to { transform: rotate(360deg); } }
        @keyframes spin-inner { to { transform: rotate(-360deg); } }
        @keyframes glitch-effect {
            0% { transform: translate(0, 0) skew(0); border-color: var(--accent-1); box-shadow: 0 0 8px 1px color-mix(in srgb, var(--accent-1) 50%, transparent); }
            25% { transform: translate(-2px, 1px) skew(-2deg); border-color: var(--accent-3); box-shadow: 0 0 12px 2px color-mix(in srgb, var(--accent-3) 60%, transparent); }
            50% { transform: translate(1px, -2px) skew(1deg); border-color: var(--accent-1); box-shadow: 0 0 8px 1px color-mix(in srgb, var(--accent-1) 50%, transparent); }
            75% { transform: translate(2px, 2px) skew(3deg); border-color: var(--accent-2); box-shadow: 0 0 10px 1px color-mix(in srgb, var(--accent-2) 55%, transparent);}
            100% { transform: translate(0, 0) skew(0); border-color: var(--accent-1); box-shadow: 0 0 8px 1px color-mix(in srgb, var(--accent-1) 50%, transparent); }
        }

        #splash-text {
            font-family: var(--font-code); /* Use code font */
            font-size: 16px;
            color: var(--accent-1);
            font-weight: 400;
            text-shadow: 0 0 5px color-mix(in srgb, var(--accent-1) 40%, transparent);
            overflow: hidden; /* For typing effect */
            white-space: nowrap; /* For typing effect */
            border-right: .10em solid var(--accent-1); /* Blinking cursor */
            letter-spacing: .1em;
            animation: typing 1s steps(20, end) forwards, blink-caret .75s step-end infinite;
            animation-delay: 0.1s; /* Start typing slightly after load */
            opacity: 0; /* Start hidden */
        }
        @keyframes typing {
            from { width: 0; opacity: 1;}
            to { width: 100%; opacity: 1;}
        }
        @keyframes blink-caret {
            from, to { border-color: transparent }
            50% { border-color: var(--accent-1); }
        }
        /* --- End Splash Screen --- */

        /* Chat Container */ #chat-container { width: 100%; max-width: 950px; height: calc(100dvh - 16px); margin: 8px auto; background-color: transparent; display: flex; flex-direction: column; overflow: hidden; position: relative; transition: box-shadow var(--transition-medium), transform var(--transition-medium) var(--bezier-elegant), opacity 0.5s ease-in; box-shadow: var(--shadow-high); border-radius: var(--border-radius-medium); border: 1px solid var(--border-color); opacity: 0; } body.dark-mode #chat-container { border-color: var(--dm-border-color); } #chat-container.loaded { opacity: 1; }
        /* Header */ #chat-header { background: var(--header-bg); color: var(--header-text); padding: 10px 18px; display: flex; align-items: center; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); z-index: 10; transition: background var(--transition-medium), color var(--transition-medium); gap: 15px; flex-shrink: 0; border-top-left-radius: var(--border-radius-medium); border-top-right-radius: var(--border-radius-medium); animation: header-gradient-animation var(--hue-rotation-speed) linear infinite alternate; border-bottom: 1px solid transparent; } body.dark-mode #chat-header { box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3); border-bottom-color: rgba(255,255,255,0.05); } @keyframes header-gradient-animation { from { filter: hue-rotate(-5deg) saturate(100%); } to { filter: hue-rotate(10deg) saturate(115%); } } .header-avatar { width: var(--avatar-size); height: var(--avatar-size); border-radius: var(--border-radius-round); display: flex; align-items: center; justify-content: center; font-weight: 600; font-size: 15px; flex-shrink: 0; color: var(--avatar-text); background: linear-gradient(135deg, var(--accent-1), color-mix(in srgb, var(--accent-1) 60%, black)); box-shadow: 0 1px 3px rgba(0,0,0,0.15); margin-left: 8px; } body.dark-mode .header-avatar { background: linear-gradient(135deg, var(--accent-1), color-mix(in srgb, var(--accent-1) 70%, #000)); color: var(--dm-avatar-text); } #chat-title { margin: 0; font-size: 17px; font-weight: 600; flex-grow: 1; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; color: var(--header-text); } .header-controls-trigger { margin-left: auto; } .icon-button { background: none; border: none; padding: 8px; cursor: pointer; border-radius: var(--border-radius-round); display: flex; align-items: center; justify-content: center; transition: background-color var(--transition-fast), transform var(--transition-fast); } .icon-button:hover { background-color: var(--icon-button-hover-bg); transform: scale(1.1) rotate(-5deg); } .icon-button:active { transform: scale(0.95); } .icon-button svg { width: 22px; height: 22px; fill: var(--header-icon-fill); transition: fill var(--transition-medium); } body.dark-mode .icon-button svg { fill: var(--dm-header-icon-fill); }
        /* Settings Popover */ #settings-popover { position: absolute; top: calc(100% + 8px); left: 18px; background-color: var(--popover-bg); backdrop-filter: var(--popover-backdrop-filter); border: 1px solid var(--popover-border); border-radius: var(--border-radius-medium); box-shadow: var(--popover-shadow); z-index: 100; padding: 10px; min-width: 300px; opacity: 0; visibility: hidden; transform: translateY(-10px) scale(0.97); transition: opacity var(--transition-fast), transform var(--transition-fast), visibility 0s var(--transition-fast); pointer-events: none; max-height: calc(100dvh - 80px); overflow-y: auto; } #settings-popover.visible { opacity: 1; visibility: visible; transform: translateY(0) scale(1); pointer-events: auto; transition-delay: 0s; } .popover-section { margin-bottom: 12px; padding-bottom: 12px; border-bottom: 1px solid var(--border-color); } body.dark-mode .popover-section { border-bottom-color: var(--dm-border-color); } .popover-section:last-child { margin-bottom: 0; padding-bottom: 0; border-bottom: none; } .popover-section label { display: block; font-size: 13px; font-weight: 500; margin-bottom: 6px; color: var(--msg-text); } .popover-section select, .popover-section input[type="checkbox"] { margin-top: 4px; } .popover-section select { width: 100%; padding: 8px 10px; border: 1px solid var(--input-border); border-radius: var(--border-radius-small); background-color: var(--input-bg); color: var(--input-text); font-size: 13px; cursor: pointer; transition: border-color var(--transition-fast), box-shadow var(--transition-fast); font-family: var(--font-main); } .popover-section select:focus { border-color: var(--input-border-focus); box-shadow: var(--input-shadow-focus); } .popover-checkbox { display: flex; align-items: center; cursor: pointer; padding: 6px 8px; border-radius: var(--border-radius-small); transition: background-color var(--transition-fast); margin: -6px -8px; } .popover-checkbox:hover { background-color: var(--menu-item-hover-bg); } .popover-checkbox input[type="checkbox"] { margin-left: 8px; margin-right: 0; width: 15px; height: 15px; accent-color: var(--accent-2); cursor: pointer; flex-shrink: 0; } .popover-checkbox label { margin-bottom: 0; font-weight: 400; font-size: 14px; flex-grow: 1; cursor: pointer; } #theme-icon-placeholder { color: var(--msg-action-icon-fill); margin-right: auto; display: flex; align-items: center; } .popover-section.shortcuts label { font-weight: 500; margin-bottom: 8px; font-size: 13px; } .popover-section.shortcuts ul { list-style: none; padding: 0; margin: 0; } .popover-section.shortcuts li { display: flex; justify-content: space-between; font-size: 12.5px; color: var(--timestamp-color); margin-bottom: 5px; } .popover-section.shortcuts kbd { font-family: var(--font-code); font-size: 10.5px; padding: 2px 5px; background-color: var(--kbd-bg); border: 1px solid var(--kbd-border); border-radius: var(--border-radius-small); color: var(--kbd-text); box-shadow: inset 0 -1px 0 var(--kbd-border); margin: 0 2px; } .popover-actions { display: flex; flex-wrap: wrap; gap: 8px; justify-content: flex-start; margin-top: 12px; padding-top: 12px; border-top: 1px solid var(--border-color); } body.dark-mode .popover-actions { border-top-color: var(--dm-border-color); } .popover-button { padding: 7px 14px; border-radius: var(--border-radius-medium); border: none; font-size: 13px; font-weight: 500; cursor: pointer; transition: background-color var(--transition-fast), transform var(--transition-fast), box-shadow var(--transition-fast); display: flex; align-items: center; gap: 6px; background-color: transparent; color: var(--button-secondary-text); border: 1px solid var(--button-secondary-border); } .popover-button:hover { transform: translateY(-2px) scale(1.02); box-shadow: var(--shadow-medium); background-color: var(--button-secondary-hover-bg); } .popover-button:active { transform: translateY(0px) scale(1); box-shadow: none; } .popover-button svg { width: 15px; height: 15px; fill: currentColor; }
        /* Chat Output - WhatsApp Background */ #chat-output { flex-grow: 1; overflow-y: auto; overflow-x: hidden; display: flex; flex-direction: column; position: relative; padding: 0 8px; background-color: var(--whatsapp-bg-color); background-image: var(--whatsapp-bg-image); background-repeat: repeat; background-size: auto; transition: background-color var(--transition-medium); } #chat-output-inner { display: flex; flex-direction: column; padding: 15px 8px; width: 100%; margin-top: auto; } #chat-output::-webkit-scrollbar { width: 8px; } #chat-output::-webkit-scrollbar-track { background: transparent; } #chat-output::-webkit-scrollbar-thumb { background: var(--scrollbar-thumb); border-radius: 4px; border: 2px solid transparent; background-clip: padding-box; } #chat-output::-webkit-scrollbar-thumb:hover { background: color-mix(in srgb, var(--scrollbar-thumb) 70%, black); } #chat-output { scrollbar-width: thin; scrollbar-color: var(--scrollbar-thumb) transparent; }
        /* Scroll Button */ #scroll-to-bottom { position: absolute; bottom: 20px; left: 20px; background-color: var(--scroll-btn-bg); backdrop-filter: blur(10px); border: 1px solid var(--border-color); border-radius: var(--border-radius-round); width: 40px; height: 40px; padding: 0; cursor: pointer; display: flex; align-items: center; justify-content: center; box-shadow: var(--shadow-medium); opacity: 0; visibility: hidden; transition: opacity var(--transition-fast), transform var(--transition-fast) var(--bezier-elegant), visibility 0s var(--transition-fast), background-color var(--transition-fast); z-index: 20; transform: scale(0.8); pointer-events: none; } #scroll-to-bottom.visible { opacity: 1; visibility: visible; transform: scale(1); pointer-events: auto; transition-delay: 0s; } #scroll-to-bottom:hover { background-color: var(--scroll-btn-hover-bg); transform: scale(1.1) rotate(3deg); box-shadow: var(--shadow-high); } #scroll-to-bottom svg { width: 20px; height: 20px; fill: var(--scroll-btn-icon); transition: transform var(--transition-fast); } #scroll-to-bottom:hover svg { transform: translateY(2px); }
        /* Messages */ .message-wrapper { display: flex; max-width: 78%; margin-bottom: 8px; align-items: flex-end; position: relative; opacity: 0; transform: translateY(15px) scale(0.98); transition: opacity 0.4s var(--bezier-elegant), transform 0.4s var(--bezier-elegant); } .message-wrapper.animate-in { opacity: 1; transform: translateY(0) scale(1); } .user-message-wrapper { align-self: flex-end; flex-direction: row-reverse; margin-left: auto; } .ai-message-wrapper { align-self: flex-start; flex-direction: row; margin-right: auto; } .avatar { width: var(--avatar-size); height: var(--avatar-size); border-radius: var(--border-radius-round); display: flex; align-items: center; justify-content: center; font-weight: 600; font-size: 14px; flex-shrink: 0; color: var(--lm-avatar-text); margin: 0 8px; box-shadow: var(--shadow-light); transition: transform var(--transition-fast), box-shadow var(--transition-fast), visibility var(--transition-fast); } .ai-message-wrapper .avatar { background: linear-gradient(135deg, var(--accent-1), color-mix(in srgb, var(--accent-1) 60%, black)); } .user-message-wrapper .avatar { background: linear-gradient(135deg, var(--accent-2), color-mix(in srgb, var(--accent-2) 60%, #000)); } body.dark-mode .ai-message-wrapper .avatar { background: linear-gradient(135deg, var(--accent-1), color-mix(in srgb, var(--accent-1) 70%, #000)); color: var(--dm-avatar-text); } body.dark-mode .user-message-wrapper .avatar { background: linear-gradient(135deg, var(--accent-2), color-mix(in srgb, var(--accent-2) 70%, #000)); color: var(--dm-avatar-text); } .avatar:hover { transform: scale(1.1) rotate(5deg); box-shadow: var(--shadow-high); } .message { padding: 8px 14px; border-radius: var(--border-radius-medium); word-wrap: break-word; line-height: 1.6; color: var(--msg-text); box-shadow: var(--shadow-light); transition: background-color var(--transition-medium), color var(--transition-medium), box-shadow var(--transition-medium), transform var(--transition-fast), border-radius var(--transition-fast); position: relative; z-index: 1; min-width: 45px; font-size: 15px; } .user-message { background-color: var(--user-msg-bg); } .ai-message { background-color: var(--ai-msg-bg); border: 1px solid transparent; } body.dark-mode .ai-message { background-color: var(--dm-ai-msg-bg); } .message-wrapper:hover .message { transform: translateY(-1px); box-shadow: var(--shadow-medium); }
        /* Message Tail */ .message-tail { position: absolute; bottom: 2px; width: 0; height: 0; border-style: solid; z-index: 0; filter: drop-shadow(0 1px 0.5px rgba(0,0,0,0.1)); transition: border-color var(--transition-medium); } .user-message-wrapper .message-tail { right: -7px; border-width: 6px 0 6px 8px; border-color: transparent transparent transparent var(--user-msg-bg); } .ai-message-wrapper .message-tail { left: -7px; border-width: 6px 8px 6px 0; border-color: transparent var(--ai-msg-bg) transparent transparent; } body.dark-mode .ai-message-wrapper .message-tail { border-color: transparent var(--dm-ai-msg-bg) transparent transparent; } body.dark-mode .message-tail { filter: drop-shadow(0 1px 0.5px rgba(0,0,0,0.3)); }
        /* Message Content & Footer */ .message-content { padding-bottom: 0; min-height: 1.6em; } .message-content > *:first-child { margin-top: 0; } .message-content > *:last-child { margin-bottom: 0; } .message-footer { display: flex; align-items: center; justify-content: flex-end; font-size: 11px; margin-top: 5px; gap: 6px; transition: color var(--transition-medium); flex-wrap: wrap; opacity: 0.75; color: var(--timestamp-color); padding: 0 2px; } .ai-message .message-footer { justify-content: flex-start; } .model-indicator { white-space: nowrap; font-weight: 400; color: var(--model-indicator-color); } .timestamp { white-space: nowrap; }
        /* Message Actions */ .message-actions { position: absolute; top: -12px; display: flex; gap: 4px; opacity: 0; transition: opacity var(--transition-fast), transform var(--transition-fast) var(--bezier-elegant); background-color: color-mix(in srgb, var(--chat-bg, #fff) 80%, transparent); backdrop-filter: blur(4px); border: 1px solid var(--border-color); border-radius: var(--border-radius-large); padding: 4px 6px; z-index: 2; pointer-events: none; transform: translateY(5px) scale(0.9); } .user-message-wrapper .message-actions { left: -10px; } .ai-message-wrapper .message-actions { right: -10px; } .message-wrapper:hover .message-actions { opacity: 1; transform: translateY(0) scale(1); pointer-events: auto; } .msg-action-button { background: none; border: none; padding: 4px; cursor: pointer; border-radius: var(--border-radius-round); display: flex; align-items: center; justify-content: center; transition: background-color var(--transition-fast), transform var(--transition-fast), opacity var(--transition-fast); } .msg-action-button svg { width: 16px; height: 16px; fill: var(--msg-action-icon-fill); transition: fill var(--transition-fast); } .msg-action-button:hover { background-color: var(--msg-action-icon-hover-bg); transform: scale(1.15); } .msg-action-button:hover svg { fill: var(--msg-action-icon-hover-fill); } .msg-action-button:active { transform: scale(0.95); } .msg-action-button.copied { animation: copied-feedback 0.5s ease; } .msg-action-button.copied svg { fill: var(--accent-1); } @keyframes copied-feedback { 0%, 100% { transform: scale(1); } 50% { transform: scale(1.2); } }
        /* Code Blocks (Prism.js integration) */
        .message-content p { margin: 0.5em 0; }
        .message-content pre { padding: 1em; border-radius: var(--border-radius-medium); overflow-x: auto; font-family: var(--font-code); font-size: 13.5px; margin: 10px 0; direction: ltr; text-align: left; white-space: pre; border: 1px solid var(--code-border); position: relative; box-shadow: inset 0 1px 3px rgba(0,0,0,0.05); line-height: 1.5; }
        body.dark-mode .message-content pre { box-shadow: inset 0 1px 3px rgba(0,0,0,0.2); }
        .message-content pre[class*="language-"], .message-content code[class*="language-"] { font-family: var(--font-code); }
        .message-content pre .copy-code-button { position: absolute; top: 8px; left: 8px; background-color: var(--code-copy-btn-bg); color: var(--msg-text); border: none; border-radius: var(--border-radius-small); padding: 4px 8px; font-size: 11px; font-family: var(--font-main); cursor: pointer; opacity: 0; transition: opacity var(--transition-fast), background-color var(--transition-fast), color var(--transition-fast); z-index: 2; backdrop-filter: blur(2px); }
        .message-content pre:hover .copy-code-button { opacity: 0.9; }
        .message-content pre .copy-code-button:hover { opacity: 1; background-color: var(--code-copy-btn-hover-bg); }
        .message-content pre .copy-code-button.copied { background-color: var(--code-copy-btn-copied-bg); color: var(--code-copy-btn-copied-text); opacity: 1; }
        .message-content code:not(pre > code) { background-color: color-mix(in srgb, var(--code-bg) 85%, transparent); color: var(--code-text); padding: 0.15em 0.4em; margin: 0 0.1em; font-size: 85%; border-radius: var(--border-radius-small); font-family: var(--font-code); direction: ltr; text-align: left; border: 1px solid var(--code-border); vertical-align: middle; white-space: nowrap; }
        /* Markdown Lists, Blockquotes etc. */ .message-content ul, .message-content ol { padding-right: 20px; margin: 0.5em 0; } .message-content li { margin-bottom: 0.3em; } .message-content blockquote { border-right: 3px solid var(--border-color); padding-right: 10px; margin-right: 0; margin-left: 0; color: var(--timestamp-color); } body.dark-mode .message-content blockquote { border-right-color: var(--dm-border-color); } .message-content hr { border: none; border-top: 1px solid var(--border-color); margin: 1em 0; } body.dark-mode .message-content hr { border-top-color: var(--dm-border-color); }
        /* Improved Table Styles */
        .message-content table { border-collapse: collapse; margin: 1em 0; width: auto; direction: ltr; text-align: left; border: 1px solid var(--table-border); box-shadow: var(--shadow-light); border-radius: var(--border-radius-small); overflow: hidden; }
        .message-content th, .message-content td { border: 1px solid var(--table-border); padding: 8px 12px; }
        .message-content th { background-color: var(--table-header-bg); font-weight: 600; text-align: inherit; }
        .message-content tr:nth-child(even) { background-color: color-mix(in srgb, var(--chat-bg) 95%, transparent); }
        body.dark-mode .message-content th, body.dark-mode .message-content td { border-color: var(--dm-table-border); }
        body.dark-mode .message-content th { background-color: var(--dm-table-header-bg); }
        body.dark-mode .message-content tr:nth-child(even) { background-color: color-mix(in srgb, var(--dm-chat-bg) 95%, transparent); }
        /* Input Area */ #chat-input-area { display: flex; align-items: flex-end; padding: 10px 15px; border-top: 1px solid var(--border-color); background-color: var(--input-area-bg); flex-shrink: 0; transition: background-color var(--transition-medium), border-color var(--transition-medium), opacity var(--transition-fast); gap: 10px; border-bottom-left-radius: var(--border-radius-medium); border-bottom-right-radius: var(--border-radius-medium); } body.dark-mode #chat-input-area { border-top-color: var(--dm-border-color); } .input-wrapper { flex-grow: 1; position: relative; display: flex; } #user-input { flex-grow: 1; padding: 11px 40px 11px 15px; border: 1px solid var(--input-border); border-radius: var(--border-radius-large); font-size: 15px; background-color: var(--input-bg); color: var(--input-text); outline: none; transition: background-color var(--transition-medium), color var(--transition-medium), box-shadow var(--transition-fast), height 0.2s ease-out, border-color var(--transition-fast); resize: none; overflow-y: hidden; min-height: 48px; max-height: 160px; line-height: 1.55; box-sizing: border-box; font-family: var(--font-main); } #user-input::placeholder { color: var(--timestamp-color); opacity: 0.7; transition: opacity var(--transition-fast); } #user-input:focus::placeholder { opacity: 0.4; } #user-input:focus { border-color: var(--input-border-focus); box-shadow: var(--input-shadow-focus), var(--input-glow); } #clear-input-button { position: absolute; left: 10px; top: 50%; transform: translateY(-50%); background: none; border: none; padding: 5px; cursor: pointer; border-radius: var(--border-radius-round); display: flex; align-items: center; justify-content: center; opacity: 0.6; transition: opacity var(--transition-fast), background-color var(--transition-fast), transform var(--transition-fast); z-index: 2; } #clear-input-button svg { width: 16px; height: 16px; fill: var(--msg-action-icon-fill); } #clear-input-button:hover { opacity: 1; background-color: var(--icon-button-hover-bg); transform: translateY(-50%) scale(1.15); } #clear-input-button:active { transform: translateY(-50%) scale(0.95); }
        /* Send Button (Simple) */ #send-button { width: 48px; height: 48px; padding: 0; background-color: var(--button-bg); border: none; border-radius: var(--border-radius-round); cursor: pointer; font-size: 0; display: flex; justify-content: center; align-items: center; transition: background-color var(--transition-fast), transform 0.3s var(--bezier-overshoot), opacity var(--transition-fast), box-shadow var(--transition-medium); flex-shrink: 0; align-self: flex-end; box-shadow: var(--shadow-medium); } #send-button::before { content: ''; display: block; width: 22px; height: 22px; background-color: var(--button-icon-fill); mask-image: url('data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"%3E%3Cpath d="M3.4 20.4l17.45-7.48a1 1 0 0 0 0-1.84L3.4 3.6a1 1 0 0 0-1.39 1.04l1.56 6.01-1.56 6.01a1 1 0 0 0 1.39 1.04zM5.12 14.01l.95-3.68h6.54l-.95 3.68-6.54-.01zm0-8l.95 3.68h6.54l-.95-3.68-6.54-.01z"/%3E%3C/svg%3E'); -webkit-mask-image: url('data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"%3E%3Cpath d="M3.4 20.4l17.45-7.48a1 1 0 0 0 0-1.84L3.4 3.6a1 1 0 0 0-1.39 1.04l1.56 6.01-1.56 6.01a1 1 0 0 0 1.39 1.04zM5.12 14.01l.95-3.68h6.54l-.95 3.68-6.54-.01zm0-8l.95 3.68h6.54l-.95-3.68-6.54-.01z"/%3E%3C/svg%3E'); mask-size: contain; mask-repeat: no-repeat; mask-position: center; -webkit-mask-size: contain; -webkit-mask-repeat: no-repeat; -webkit-mask-position: center; transition: background-color var(--transition-medium), transform var(--transition-fast); }
        #send-button.has-text { animation: pulse-send-button 1.8s infinite ease-in-out; } @keyframes pulse-send-button { 0%, 100% { box-shadow: var(--shadow-medium), 0 0 8px transparent; } 50% { box-shadow: var(--shadow-high), 0 0 16px var(--button-glow-color-lm); } } body.dark-mode #send-button.has-text { animation-name: pulse-send-button-dark; } @keyframes pulse-send-button-dark { 0%, 100% { box-shadow: var(--dm-shadow-medium), 0 0 8px transparent; } 50% { box-shadow: var(--dm-shadow-high), 0 0 18px var(--button-glow-color-dm); } }
        #send-button:hover:not(:disabled) { transform: scale(1.1); box-shadow: var(--shadow-high), 0 0 18px var(--button-glow-color-lm); } body.dark-mode #send-button:hover:not(:disabled) { box-shadow: var(--dm-shadow-high), 0 0 20px var(--button-glow-color-dm); }
        #send-button:hover:not(:disabled)::before { transform: translateX(-1px) rotate(-5deg); }
        #send-button:active:not(:disabled) { background-color: var(--button-active-bg); transform: scale(0.97); box-shadow: none; animation: none; }
        #send-button:disabled { opacity: 0.5; cursor: not-allowed; background-color: color-mix(in srgb, var(--button-bg) 50%, var(--input-area-bg)); transform: scale(1); box-shadow: none; animation: none; }
        #send-button.sending { transform: scale(1) !important; box-shadow: none !important; opacity: 0.7; cursor: default; animation: sending-pulse 1.2s infinite ease-in-out; } @keyframes sending-pulse { 0%, 100% { opacity: 0.6; } 50% { opacity: 0.9; } }
        /* Loading Indicator */
        .ai-message.typing-indicator { animation: pulse-thinking-bubble 1.8s infinite ease-in-out; }
        @keyframes pulse-thinking-bubble {
            0%, 100% { background-color: var(--ai-msg-bg); }
            50% { background-color: var(--thinking-bubble-bg-pulse); }
        }
        .typing-indicator .message-content { display: flex; align-items: center; gap: 10px; color: var(--timestamp-color); padding: 0; min-height: 36px; justify-content: space-between; position: relative; overflow: hidden; border: 1px solid transparent; border-radius: var(--border-radius-small); animation: pulse-thinking-border 1.5s ease-in-out infinite; }
        @keyframes pulse-thinking-border { 0%, 100% { border-color: transparent; box-shadow: none; } 50% { border-color: var(--thinking-border-color); box-shadow: 0 0 8px -2px var(--thinking-border-color); } } .ai-thinking-text { font-weight: 500; font-size: 14px; background: var(--thinking-text-bg); background-size: 300% 100%; -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent; animation: text-gradient-wave 2.5s linear infinite; white-space: nowrap; margin-right: 5px; } @keyframes text-gradient-wave { 0% { background-position: 0% 50%; } 50% { background-position: 100% 50%;} 100% { background-position: 0% 50%; } } .stop-button { border: 1px solid var(--button-secondary-border); width: 28px; height: 28px; margin-left: 8px; flex-shrink: 0; background: none; transition: background-color var(--transition-fast), transform var(--transition-fast); } .stop-button svg { width: 12px; height: 12px; fill: var(--stop-button-fill); } .stop-button:hover { background-color: var(--button-secondary-hover-bg); border-color: var(--accent-2); transform: scale(1.1); } body.dark-mode .stop-button:hover { border-color: var(--accent-1); } .stop-button:active { transform: scale(0.9); }
        /* Custom Dialog */ #dialog-overlay { position: fixed; inset: 0; background-color: var(--dialog-overlay-bg); backdrop-filter: blur(8px); z-index: 1000; display: flex; align-items: center; justify-content: center; opacity: 0; visibility: hidden; transition: opacity var(--transition-medium), visibility 0s var(--transition-medium); padding: 15px; } #dialog-overlay.visible { opacity: 1; visibility: visible; transition-delay: 0s;} #dialog-box { background-color: var(--dialog-bg); padding: 20px 25px; border-radius: var(--border-radius-medium); box-shadow: var(--dialog-shadow); max-width: 420px; width: 100%; text-align: center; transform: scale(0.95) translateY(10px); transition: transform var(--transition-medium) var(--bezier-overshoot), opacity var(--transition-fast); border: 1px solid var(--popover-border); opacity: 0; } #dialog-overlay.visible #dialog-box { transform: scale(1) translateY(0); opacity: 1; } #dialog-title { font-size: 17px; font-weight: 600; margin: 0 0 8px; color: var(--dialog-text); } #dialog-message { font-size: 14px; margin: 0 0 18px; color: var(--dialog-text); opacity: 0.85; line-height: 1.6; text-align: right; } #dialog-message ul { padding-right: 20px; margin-top: 8px; } #dialog-message li { margin-bottom: 4px; } #dialog-buttons { display: flex; justify-content: center; gap: 12px; } .dialog-button { padding: 9px 20px; border-radius: var(--border-radius-medium); border: none; font-size: 13px; font-weight: 500; cursor: pointer; transition: background-color var(--transition-fast), transform var(--transition-fast), box-shadow var(--transition-fast); } .dialog-button:hover { transform: translateY(-2px); box-shadow: var(--shadow-medium); } .dialog-button:active { transform: translateY(0); box-shadow: none; } .dialog-button.confirm { background-color: var(--dialog-button-bg); color: var(--dialog-button-text); } .dialog-button.confirm:hover { background-color: color-mix(in srgb, var(--dialog-button-bg) 85%, black); } .dialog-button.cancel { background-color: var(--dialog-cancel-button-bg); color: var(--dialog-cancel-button-text); } .dialog-button.cancel:hover { background-color: color-mix(in srgb, var(--dialog-cancel-button-bg) 85%, black); }
        /* Prism Line Numbers Plugin Adjustment */
        pre[class*="language-"].line-numbers { padding-left: 3.8em; }
    </style>
</head>
<body>

<!-- Splash Screen -->
<div id="splash-screen">
    <div id="splash-logo">
        <div class="logo-square outer"></div>
        <div class="logo-square inner"></div>
        <div class="logo-square center"></div>
    </div>
    <div id="splash-text">טוען מערכות AI...</div>
</div>

<!-- Chat Container -->
<div id="chat-container" aria-live="polite">
    <!-- Header -->
    <div id="chat-header">
        <div class="header-avatar" aria-hidden="true">AI</div>
        <h1 id="chat-title">AI Chat</h1>
        <div class="header-controls-trigger">
            <button class="icon-button" id="settings-button" title="הגדרות (Alt+S)" aria-label="הגדרות" aria-haspopup="true" aria-controls="settings-popover" aria-expanded="false">
                 <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M19.43 12.98c.04-.32.07-.64.07-.98s-.03-.66-.07-.98l2.11-1.65c.19-.15.24-.42.12-.64l-2-3.46c-.12-.22-.39-.3-.61-.22l-2.49 1c-.52-.4-1.08-.73-1.69-.98l-.38-2.65C14.46 2.18 14.25 2 14 2h-4c-.25 0-.46.18-.49.42l-.38 2.65c-.61.25-1.17.59-1.69.98l-2.49-1c-.23-.08-.49 0-.61.22l-2 3.46c-.13.22-.07.49.12.64l2.11 1.65c-.04.32-.07.65-.07.98s.03.66.07.98l-2.11 1.65c-.19.15-.24.42-.12.64l2 3.46c.12.22.39.3.61.22l2.49-1c.52.4 1.08.73 1.69.98l.38 2.65c.03.24.24.42.49.42h4c.25 0 .46-.18.49.42l.38-2.65c.61-.25 1.17-.59 1.69-.98l2.49 1c.23.08.49 0 .61.22l2-3.46c.12-.22.07-.49-.12-.64l-2.11-1.65zM12 15.5c-1.93 0-3.5-1.57-3.5-3.5s1.57-3.5 3.5-3.5 3.5 1.57 3.5 3.5-1.57 3.5-3.5 3.5z"/></svg>
            </button>
        </div>
        <!-- Settings Popover -->
         <div id="settings-popover" role="menu" aria-labelledby="settings-button">
             <div class="popover-section">
                 <label for="model-select" title="בחר את מודל הבינה המלאכותית שיגיב לך">מודל AI:</label>
                 <select id="model-select" role="menuitem">
                     <option value="main-ai.php">Gemini 1.5 Flash</option>
                     <option value="gemini25.php">Gemini 1.5 Pro</option>
                 </select>
             </div>
             <div class="popover-section">
                  <label for="style-select" title="בחר את סגנון הכתיבה של הבינה המלאכותית">סגנון שיחה:</label>
                  <select id="style-select" role="menuitem">
                      <!-- Options populated by JS -->
                  </select>
             </div>
              <div class="popover-section"> <label>התנהגות:</label> <div class="popover-checkbox" role="menuitemcheckbox" aria-checked="true" tabindex="0" id="send-on-enter-container" title="אם מסומן, לחיצת Enter תשלח את ההודעה. Shift+Enter תמיד יוסיף שורה חדשה."> <input type="checkbox" id="send-on-enter-checkbox" tabindex="-1" checked> <label for="send-on-enter-checkbox">שלח הודעה בלחיצת Enter</label> </div> </div>
              <div class="popover-section"> <label>מראה:</label> <div class="popover-checkbox" role="menuitemcheckbox" aria-checked="false" tabindex="0" id="dark-mode-container" title="החלף בין ערכת נושא בהירה לכהה"> <input type="checkbox" id="dark-mode-checkbox" tabindex="-1"> <label for="dark-mode-checkbox" id="theme-toggle-text">ערכת נושא כהה</label> <span id="theme-icon-placeholder" style="margin-right: auto; display: flex; align-items: center;"></span> </div> </div>

              <div class="popover-section shortcuts"> <label>קיצורי מקשים:</label> <ul> <li><span>הגדרות:</span> <kbd>Alt</kbd> + <kbd>S</kbd></li> <li><span>מיקוד קלט:</span> <kbd>Alt</kbd> + <kbd>I</kbd></li> <li><span>שליחה:</span> <kbd>Ctrl</kbd> + <kbd>Enter</kbd></li> <li><span>שורה חדשה:</span> <kbd>Shift</kbd> + <kbd>Enter</kbd></li> <li><span>ניקוי קלט:</span> <kbd>Alt</kbd> + <kbd>X</kbd></li> <li><span>גלילה לתחתית:</span> <kbd>End</kbd></li> <li><span>גלילה ללמעלה:</span> <kbd>Home</kbd></li> </ul> </div>
              <div class="popover-actions"> <button type="button" class="popover-button" id="download-chat-txt" title="הורד שיחה כקובץ טקסט פשוט"> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M19 9h-4V3H9v6H5l7 7 7-7zM5 18v2h14v-2H5z"/></svg> הורד TXT </button> <button type="button" class="popover-button" id="clear-chat-settings" title="נקה את כל השיחה הנוכחית והתחל מחדש"> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/></svg> ניקוי שיחה </button> </div>
        </div>
    </div>

    <!-- Chat Output Area -->
    <div id="chat-output"> <div id="chat-output-inner" aria-live="polite" aria-relevant="additions"> <!-- Messages dynamically added here --> </div> <button type="button" id="scroll-to-bottom" title="גלול לתחתית (End)" aria-label="גלול לתחתית"> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M7.41 8.59L12 13.17l4.59-4.58L18 10l-6 6-6-6 1.41-1.41z"/><path fill="none" d="M0 0h24v24H0V0z"/></svg> </button> </div>

    <!-- Input Area -->
    <div id="chat-input-area"> <div class="input-wrapper"> <textarea id="user-input" placeholder="הקלד/י הודעה כאן... (Alt+I למיקוד)" rows="1" aria-label="הודעת משתמש"></textarea> <button type="button" id="clear-input-button" title="נקה קלט (Alt+X)" aria-label="נקה קלט" style="display: none;"> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/></svg> </button> </div> <button type="button" id="send-button" aria-label="שלח (Ctrl+Enter)"></button> </div>

    <!-- Templates (Hidden) - Dialog Only -->
    <div id="custom-dialog-template" style="display: none;"> <div id="dialog-overlay"> <div id="dialog-box" role="alertdialog" aria-labelledby="dialog-title" aria-describedby="dialog-message"> <h2 id="dialog-title"></h2> <p id="dialog-message"></p> <div id="dialog-buttons"> <button type="button" class="dialog-button confirm"></button> <button type="button" class="dialog-button cancel"></button> </div> </div> </div> </div>

</div>

<script>
    // Wrap entire script in a self-executing function
    (function() {
        // --- Constants ---
        const BASE_API_URL = 'https://php-render-test.onrender.com/'; // Updated API Base URL
//const TYPING_SPEED = 2; const SCROLL_THRESHOLD = 200; const DEBOUNCE_DELAY = 33;
        const TYPING_SPEED = 0; const SCROLL_THRESHOLD = 200; const DEBOUNCE_DELAY = 0;

        const MAX_HISTORY_LENGTH = 15;
        const SPLASH_DURATION = 400; // Faster splash screen

        // Theme Icons
        const moonIconSvg = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" fill="currentColor"><path d="M12 3a9 9 0 1 0 9 9c0-.46-.04-.91-.1-1.36a5.5 5.5 0 0 1-9.8-5.54A9.01 9.01 0 0 0 12 3z"/></svg>`;
        const sunIconSvg = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" fill="currentColor"><path d="M12 7c-2.76 0-5 2.24-5 5s2.24 5 5 5 5-2.24 5-5-2.24-5-5-5zM2 13h2c.55 0 1-.45 1-1s-.45-1-1-1H2c-.55 0-1 .45-1 1s.45 1 1 1zm18 0h2c.55 0 1-.45 1-1s-.45-1-1-1h-2c-.55 0-1 .45-1 1s.45 1 1 1zM11 2v2c0 .55.45 1 1 1s1-.45 1-1V2c0-.55-.45-1-1-1s-1 .45-1 1zm0 18v2c0 .55.45 1 1 1s1-.45 1-1v-2c0-.55-.45-1-1-1s-1 .45-1 1zM5.64 5.64c-.39-.39-1.02-.39-1.41 0-.39.39-.39 1.02 0 1.41l1.41 1.41c.39.39 1.02.39 1.41 0 .39-.39.39-1.02 0-1.41L5.64 5.64zm12.73 12.73c-.39-.39-1.02-.39-1.41 0-.39.39-.39 1.02 0 1.41l1.41 1.41c.39.39 1.02.39 1.41 0 .39-.39.39-1.02 0-1.41l-1.41-1.41zM19.78 4.22c.39-.39.39-1.02 0-1.41-.39-.39-1.02-.39-1.41 0l-1.41 1.41c-.39.39-.39 1.02 0 1.41.39.39 1.02.39 1.41 0l1.41-1.41zM7.05 18.36c.39-.39.39-1.02 0-1.41-.39-.39-1.02-.39-1.41 0l-1.41 1.41c-.39.39-.39 1.02 0 1.41.39.39 1.02.39 1.41 0l1.41-1.41z"/></svg>`;

        // Conversation Styles & Prefixes (Unchanged)
        const conversationStyles = { "default": { name: "ברירת מחדל" }, "creative": { name: "יצירתי" }, "formal": { name: "רשמי" }, "concise": { name: "תמציתי" }, "humorous": { name: "הומוריסטי" }, "technical": { name: "טכני" }, "empathetic": { name: "אמפתי" }, "storyteller": { name: "מספר סיפורים" }, "skeptic": { name: "ספקני" }, "optimistic": { name: "אופטימי" }, "teacher": { name: "מסבירן (מורה)" }, "pirate": { name: "פיראט" } };
        const conversationStylePrefixes = { "creative": "היה יצירתי במיוחד בתגובתך: ", "formal": "אנא הגב בצורה רשמית ומקצועית: ", "concise": "ספק תשובה תמציתית וישירה, ישר לעניין: ", "humorous": "הגב בהומור ובקלילות, אפשר בדיחה קטנה: ", "technical": "התמקד בהיבטים הטכניים והיה מדויק בפרטים: ", "empathetic": "הגב באמפתיה וברגישות: ", "storyteller": "ספר סיפור קצר או השתמש בדוגמאות סיפוריות בתגובתך: ", "skeptic": "הגב בספקנות בריאה, הצג את שני צידי המטבע: ", "optimistic": "הגב בצורה אופטימית וחיובית: ", "teacher": "הסבר את הנושא בצורה ברורה ודידקטית, כמו מורה: ", "pirate": "ענה כמו פיראט, אהוי!: " };

        // State Variables
        let messageCounterId = 0, currentAbortController = null, typingTimeout = null;
        let sendOnEnter = true, userInteracted = false, originalDocumentTitle = "AI Chat";
        let currentStyle = "default", isDarkMode = false, isScrolledToBottom = true;
        // Removed editing/feedback state variables

        // Element References
        let chatContainer, chatOutput, chatOutputInner, userInput, sendButton, chatInputArea, settingsButton, settingsPopover, modelSelect, styleSelect, sendOnEnterCheckbox, sendOnEnterContainer, darkModeCheckbox, darkModeContainer, themeToggleText, themeIconPlaceholder, downloadChatButtonTxt, clearChatButtonSettings, scrollToBottomButton, clearInputButton, customDialogTemplate, chatTitle, splashScreen;

        // Safe Element Access & Initialization
        function getElement(id) { const el = document.getElementById(id); if (!el) console.error(`Elem Error: #${id} not found!`); return el; }
        function querySelectorSafe(sel, parent = document) { return parent.querySelector(sel); }
        function initializeElements() {
            // console.log("Initializing elements...");
            splashScreen = getElement('splash-screen'); chatContainer = getElement('chat-container'); chatOutput = getElement('chat-output'); chatOutputInner = getElement('chat-output-inner'); userInput = getElement('user-input'); sendButton = getElement('send-button'); chatInputArea = getElement('chat-input-area'); settingsButton = getElement('settings-button'); settingsPopover = getElement('settings-popover'); modelSelect = getElement('model-select'); styleSelect = getElement('style-select'); sendOnEnterCheckbox = getElement('send-on-enter-checkbox'); sendOnEnterContainer = getElement('send-on-enter-container'); darkModeCheckbox = getElement('dark-mode-checkbox'); darkModeContainer = getElement('dark-mode-container'); themeToggleText = getElement('theme-toggle-text'); themeIconPlaceholder = getElement('theme-icon-placeholder'); downloadChatButtonTxt = getElement('download-chat-txt'); clearChatButtonSettings = getElement('clear-chat-settings'); scrollToBottomButton = getElement('scroll-to-bottom'); clearInputButton = getElement('clear-input-button'); customDialogTemplate = getElement('custom-dialog-template'); chatTitle = getElement('chat-title');

            // Simplified check
            if (!chatContainer || !chatOutput || !chatOutputInner || !userInput || !sendButton || !settingsButton || !settingsPopover || !modelSelect || !styleSelect || !splashScreen || !customDialogTemplate || !clearChatButtonSettings || !downloadChatButtonTxt) {
                 let missing = ['chatContainer', 'chatOutput', 'chatOutputInner', 'userInput', 'sendButton', 'settingsButton', 'settingsPopover', 'modelSelect', 'styleSelect', 'splashScreen', 'customDialogTemplate', 'clearChatButtonSettings', 'downloadChatButtonTxt']
                    .filter(id => !getElement(id.replace(/([A-Z])/g, '-$1').toLowerCase()));
                throw new Error(`Critical chat elements missing: ${missing.join(', ')}`);
             }
             // Initialize send button icon (simple version) - already done by CSS :before
            // console.log("Elements initialized successfully.");
        }

        document.addEventListener('DOMContentLoaded', () => {
            // console.log("DOM Content Loaded");
            try {
                initializeElements();
                originalDocumentTitle = document.title || "AI Chat";

                // --- Utility Functions ---
                const debounce = (func, wait) => { let t; return (...a) => { clearTimeout(t); t = setTimeout(() => func.apply(this, a), wait); }; };
                const getCurrentTimestamp = (iso = false) => { const n = new Date(); return iso ? n.toISOString() : `${n.getHours().toString().padStart(2,'0')}:${n.getMinutes().toString().padStart(2,'0')}`; };
                const generateMessageId = () => `msg-${Date.now()}-${messageCounterId++}`;
                const focusElement = (el) => { if(el && !userInteracted) setTimeout(() => el.focus(), 50); };
                const escapeHtml = (unsafe) => (typeof unsafe === 'string' ? unsafe.replace(/</g, "&lt;").replace(/>/g, "&gt;") : unsafe);
                const generateAvatarContent = (name) => name ? name.substring(0, 2).toUpperCase() : '??';
                const scrollToBottom = (b='smooth') => { setTimeout(() => { if(chatOutput) chatOutput.scrollTo({top: chatOutput.scrollHeight, behavior: b}); }, 50); };
                const instantScrollToBottom = () => scrollToBottom('auto');
                const smoothScrollToBottom = () => scrollToBottom('smooth');

                // --- Marked.js & Prism.js Setup ---
                if (typeof marked !== 'undefined' && typeof Prism !== 'undefined') {
                    marked.setOptions({
                        breaks: true, gfm: true, sanitize: false,
                        highlight: function(code, lang) {
                            const language = lang && Prism.languages[lang] ? lang : 'clike';
                            if (Prism.languages[language]) {
                                try { return Prism.highlight(code, Prism.languages[language], language); }
                                catch (e) { console.warn("Prism highlighting failed:", e); return escapeHtml(code); }
                            } return escapeHtml(code);
                        }
                    });
                    // console.log("Marked.js & Prism.js configured.");
                 } else { /* Fallback logic */ console.warn("Marked.js or Prism.js not loaded."); if (typeof marked !== 'undefined') { marked.setOptions({ breaks: true, gfm: true, sanitize: false, highlight: (code) => escapeHtml(code) }); window.marked = marked; } else { window.marked = { parse: (text) => '<p>' + escapeHtml(text).replace(/\n{2,}/g, '</p><p>').replace(/\n/g, '<br>') + '</p>' }; } }

                // --- Splash Screen ---
                const hideSplashScreen = () => {
                    if (splashScreen && chatContainer) {
                        splashScreen.classList.add('hidden');
                        chatContainer.classList.add('loaded');
                        focusElement(userInput);
                        instantScrollToBottom();
                        updateScrollState();
                    } else { console.error("Could not hide splash screen - elements missing?"); }
                };
                setTimeout(hideSplashScreen, SPLASH_DURATION);

                // --- Settings ---
                const saveSettings = () => {
                    try {
                        const settings = { model: modelSelect?.value, style: styleSelect?.value, sendOnEnter: sendOnEnterCheckbox?.checked, darkMode: darkModeCheckbox?.checked };
                        localStorage.setItem('aiChatSettings_v9_basic', JSON.stringify(settings)); // Keep key for persistence
                    } catch (e) { console.warn("Save settings failed:", e); }
                 };
                const loadSettings = () => {
                    try {
                        const s = localStorage.getItem('aiChatSettings_v9_basic');
                        let sets = s ? JSON.parse(s) : {};
                        if (typeof sets !== 'object' || sets === null) { sets = {}; }
                        if (modelSelect) modelSelect.value = (sets.model && Array.from(modelSelect.options).some(o=>o.value === sets.model)) ? sets.model : modelSelect.options[0]?.value;
                        currentStyle = (sets.style && conversationStyles[sets.style]) ? sets.style : 'default';
                        if (styleSelect) styleSelect.value = currentStyle;
                        if (sendOnEnterCheckbox) sendOnEnterCheckbox.checked = sets.sendOnEnter !== false; sendOnEnter = sendOnEnterCheckbox?.checked !== false;
                        if (darkModeCheckbox) darkModeCheckbox.checked = sets.darkMode === true; applyDarkMode(darkModeCheckbox?.checked === true, false);
                    } catch (e) { console.error("Load settings failed:", e); if (sendOnEnterCheckbox) sendOnEnterCheckbox.checked = true; sendOnEnter = true; currentStyle = 'default'; if (styleSelect) styleSelect.value = 'default'; applyDarkMode(false, false); console.log("Applied default settings due to load error."); }
                 };
                const applyDarkMode = (isDark, save = true) => { isDarkMode = isDark; document.body.classList.toggle('dark-mode', isDark); if(themeToggleText) themeToggleText.textContent = isDark ? 'ערכת נושא בהירה' : 'ערכת נושא כהה'; if(themeIconPlaceholder) themeIconPlaceholder.innerHTML = isDark ? sunIconSvg : moonIconSvg; if(darkModeCheckbox) darkModeCheckbox.checked = isDark; if (save) saveSettings(); };
                const toggleSettingsPopover = (show) => { if(settingsPopover && settingsButton) { const isVisible = settingsPopover.classList.contains('visible'); if (show === undefined) show = !isVisible; settingsPopover.classList.toggle('visible', show); settingsButton.setAttribute('aria-expanded', String(show)); }};
                const populateStyleSelect = () => { if (styleSelect) { styleSelect.innerHTML = ''; for (const key in conversationStyles) { const option = document.createElement('option'); option.value = key; option.textContent = conversationStyles[key].name; styleSelect.appendChild(option); } }};
                const showCustomDialog = (opts) => { if (!customDialogTemplate) return; const dialogOverlay = customDialogTemplate.firstElementChild.cloneNode(true); const dialogBox=dialogOverlay.querySelector('#dialog-box'), titleEl=dialogOverlay.querySelector('#dialog-title'), msgEl=dialogOverlay.querySelector('#dialog-message'), confirmBtn=dialogOverlay.querySelector('.confirm'), cancelBtn=dialogOverlay.querySelector('.cancel'); if (!dialogBox || !titleEl || !msgEl || !confirmBtn || !cancelBtn) return; titleEl.textContent=opts.title||''; msgEl.innerHTML=opts.message||''; confirmBtn.textContent=opts.confirmText||'אישור'; cancelBtn.textContent=opts.cancelText||'ביטול'; const close=()=>{ dialogOverlay.classList.remove('visible'); setTimeout(()=>dialogOverlay.remove(),300); }; confirmBtn.onclick=()=>{ if(opts.onConfirm) opts.onConfirm(); close(); }; cancelBtn.onclick=()=>{ if(opts.onCancel) opts.onCancel(); close(); }; dialogOverlay.onclick=(e)=>{ if(e.target === dialogOverlay) close(); }; document.body.appendChild(dialogOverlay); requestAnimationFrame(()=>dialogOverlay.classList.add('visible')); };

                // --- Scroll & Update State ---
                const updateScrollState = () => { if(chatOutput && scrollToBottomButton) { const isNearBottom = chatOutput.scrollHeight - chatOutput.scrollTop - chatOutput.clientHeight < SCROLL_THRESHOLD; isScrolledToBottom = isNearBottom; scrollToBottomButton.classList.toggle('visible', !isNearBottom); }};
                const debouncedUpdateScrollState = debounce(updateScrollState, DEBOUNCE_DELAY);

                 // --- Chat History ---
                 const getChatHistory = (forRegeneration = false, regenerationTargetMsgId = null) => { const history = []; if (!chatOutputInner) return history; const wrappers = chatOutputInner.querySelectorAll('.message-wrapper:not(.initial-message)'); wrappers.forEach((wrapper) => { const msgDiv = wrapper.querySelector('.message'); if (!msgDiv) return; const sender = msgDiv.dataset.sender, msgId = wrapper.dataset.messageId; if (forRegeneration && msgId === regenerationTargetMsgId && sender === 'ai') return; const contentEl = msgDiv.querySelector('.message-content'); let content = contentEl?.dataset.rawText || contentEl?.textContent?.trim() || ''; if (sender === 'user' && msgDiv.dataset.originalUserQuery) { content = msgDiv.dataset.originalUserQuery; } if (content) history.push({ role: sender === 'user' ? 'user' : 'model', content: content }); }); return history.slice(-MAX_HISTORY_LENGTH); };

                // --- Enable/Disable Input ---
                const enableInput = (focus = true) => { if(userInput && sendButton && chatInputArea) { userInput.disabled = false; sendButton.disabled = false; sendButton.classList.remove('sending'); userInput.style.opacity = '1'; chatInputArea.style.opacity = '1'; if (focus && !userInteracted) focusElement(userInput); }};
                const disableInput = () => { if(userInput && sendButton && chatInputArea) { userInput.disabled = true; sendButton.disabled = true; sendButton.classList.add('sending'); userInput.style.opacity = '0.7'; chatInputArea.style.opacity = '0.7'; }};

                // --- Add/Manage Messages ---
                const addMessageToChat = (text, sender, options = {}) => {
                    if (!chatOutputInner) return null;
                    const { isLoading = false, timestamp = null, modelNameUsed = null, userQuery = null, modelValue = null, messageIdOverride = null, originalUserQueryForDisplay = null } = options;
                    const messageId = messageIdOverride || generateMessageId();
                    const tsValue = timestamp || getCurrentTimestamp(false);
                    const isInitial = tsValue === 'התחל';

                    const messageWrapper = document.createElement('div');
                    messageWrapper.classList.add('message-wrapper', sender === 'user' ? 'user-message-wrapper' : 'ai-message-wrapper');
                    if (isInitial) messageWrapper.classList.add('initial-message');
                    messageWrapper.dataset.messageId = messageId;

                    const avatarDiv = document.createElement('div');
                    avatarDiv.className = 'avatar';
                    avatarDiv.setAttribute('aria-hidden', 'true');
                    avatarDiv.textContent = generateAvatarContent(sender === 'user' ? 'Me' : 'AI');

                    const messageDiv = document.createElement('div');
                    messageDiv.classList.add('message', sender === 'user' ? 'user-message' : 'ai-message');
                    messageDiv.dataset.sender = sender;
                    messageDiv.dataset.timestamp = tsValue;

                    if (sender === 'user' && originalUserQueryForDisplay) { messageDiv.dataset.originalUserQuery = originalUserQueryForDisplay; }
                    if (sender === 'ai' && !isLoading && !isInitial) { if (modelNameUsed) messageDiv.dataset.modelName = modelNameUsed; if (userQuery) messageDiv.dataset.userQuery = userQuery; if (modelValue) messageDiv.dataset.modelValue = modelValue; }

                    const contentDiv = document.createElement('div');
                    contentDiv.className = 'message-content';
                    if (!isLoading && text) contentDiv.dataset.rawText = text; // Store raw text

                    if (isLoading) {
                        messageDiv.classList.add('typing-indicator'); // Add class for bubble pulse animation
                        const stopButtonId = `stop-generation-button-${messageId}`;
                        contentDiv.innerHTML = `<span class="ai-thinking-text">AI חושב...</span><button type="button" id="${stopButtonId}" class="stop-button msg-action-button" title="עצור"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M7 7h10v10H7z"/></svg></button>`;
                        messageDiv.appendChild(contentDiv);
                        const stopBtn = contentDiv.querySelector(`#${stopButtonId}`);
                        if (stopBtn) stopBtn.onclick = stopTypingAndGeneration;
                    } else {
                        if (text) {
                             try {
                                contentDiv.innerHTML = marked.parse(text);
                                if (typeof Prism !== 'undefined') { contentDiv.querySelectorAll('pre code').forEach(block => Prism.highlightElement(block)); }
                             } catch (e) { console.error("Markdown/Prism render err:", e); contentDiv.textContent = text; }
                         } else { contentDiv.textContent = " "; }
                        messageDiv.appendChild(contentDiv);

                        if (!isInitial) {
                            const footerDiv = document.createElement('div'); footerDiv.className = 'message-footer';
                            if (sender === 'ai' && modelNameUsed) { const modelSpan = document.createElement('span'); modelSpan.className = 'model-indicator'; modelSpan.textContent = `(${modelNameUsed})`; footerDiv.appendChild(modelSpan); }
                            const tsSpan = document.createElement('span'); tsSpan.className = 'timestamp'; tsSpan.textContent = tsValue; tsSpan.dataset.timestampAbs = getCurrentTimestamp(true); footerDiv.appendChild(tsSpan);
                            messageDiv.appendChild(footerDiv);

                            const actionsDiv = document.createElement('div'); actionsDiv.classList.add('message-actions');
                            const copyBtn = document.createElement('button'); copyBtn.type = 'button'; copyBtn.className = 'msg-action-button copy-button'; copyBtn.title = 'העתק טקסט'; copyBtn.setAttribute('aria-label', 'העתק טקסט'); copyBtn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M16 1H4c-1.1 0-2 .9-2 2v14h2V3h12V1zm3 4H8c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h11c1.1 0 2-.9 2-2V7c0-1.1-.9-2-2-2zm0 16H8V7h11v14z"/></svg>'; copyBtn.onclick = handleCopyClick; actionsDiv.appendChild(copyBtn);
                            if (sender === 'ai') {
                                const regenBtn = document.createElement('button'); regenBtn.type = 'button'; regenBtn.className = 'msg-action-button regenerate-button'; regenBtn.title = 'צור תגובה זו מחדש'; regenBtn.setAttribute('aria-label', 'צור תגובה זו מחדש'); regenBtn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M17.65 6.35C16.2 4.9 14.21 4 12 4c-4.42 0-7.99 3.58-7.99 8s3.57 8 7.99 8c3.73 0 6.84-2.55 7.73-6h-2.08c-.82 2.33-3.04 4-5.65 4-3.31 0-6-2.69-6-6s2.69-6 6-6c1.66 0 3.14.69 4.22 1.78L13 11h7V4l-2.35 2.35z"/></svg>'; regenBtn.onclick = handleRegenerateClick; actionsDiv.appendChild(regenBtn);
                                // Feedback buttons removed
                            }
                            // Edit button removed
                            messageWrapper.appendChild(actionsDiv);
                        }
                        contentDiv.querySelectorAll('pre').forEach(addCopyButtonToCodeBlock);
                    }

                    if (!isInitial) { const tailSpan = document.createElement('span'); tailSpan.className = 'message-tail'; tailSpan.setAttribute('aria-hidden', 'true'); messageWrapper.appendChild(tailSpan); }
                    if (sender === 'user') { messageWrapper.appendChild(messageDiv); messageWrapper.appendChild(avatarDiv); }
                    else { messageWrapper.appendChild(avatarDiv); messageWrapper.appendChild(messageDiv); }

                    chatOutputInner.appendChild(messageWrapper);
                    requestAnimationFrame(() => messageWrapper.classList.add('animate-in'));
                    scrollToBottom(isLoading ? 'auto' : 'smooth');
                    return messageWrapper;
                };

                const typeAiResponse = (messageWrapper, fullText) => {
                    const messageElement = messageWrapper?.querySelector('.message');
                    const contentDiv = messageElement?.querySelector('.message-content');
                    if (!contentDiv || !messageElement) { enableInput(); return; }
                    messageElement.classList.remove('typing-indicator'); // Remove pulse class
                    contentDiv.innerHTML = ''; contentDiv.dataset.rawText = fullText;
                    let charIndex = 0; clearTimeout(typingTimeout); typingTimeout = null;
                    function typeChar() {
                        if (currentAbortController?.signal.aborted) { finalizeAiMessage(messageWrapper, contentDiv, contentDiv.textContent); return; }
                        if (charIndex < fullText.length) { contentDiv.textContent += fullText[charIndex]; charIndex++; if(isScrolledToBottom) instantScrollToBottom(); typingTimeout = setTimeout(typeChar, TYPING_SPEED); }
                        else { finalizeAiMessage(messageWrapper, contentDiv, fullText); }
                    }; typeChar();
                };

                const finalizeAiMessage = (messageWrapper, contentDiv, textToParse) => {
                    clearTimeout(typingTimeout); typingTimeout = null;
                    if (messageWrapper && contentDiv && textToParse) {
                        try {
                            contentDiv.innerHTML = marked.parse(textToParse);
                            if (typeof Prism !== 'undefined') { contentDiv.querySelectorAll('pre code[class*="language-"]').forEach(block => Prism.highlightElement(block)); }
                            contentDiv.querySelectorAll('pre').forEach(addCopyButtonToCodeBlock); // Re-add copy buttons
                        } catch(e) { console.error("Markdown/Prism finalize err:", e); contentDiv.textContent = textToParse; }
                    }
                    messageWrapper?.querySelector('.message')?.classList.remove('typing-indicator'); // Ensure pulse class is removed
                    if (chatOutputInner) chatOutputInner.removeAttribute('aria-busy');
                    if (!currentAbortController || (currentAbortController && !currentAbortController.signal.aborted)) { enableInput(); }
                    smoothScrollToBottom();
                };

                const stopTypingAndGeneration = () => {
                    if (currentAbortController) { currentAbortController.abort(); }
                    else { clearTimeout(typingTimeout); typingTimeout = null; const typingMsgWrapper = chatOutputInner?.querySelector('.ai-message-wrapper .typing-indicator')?.closest('.message-wrapper'); if (typingMsgWrapper) { const contentDiv = typingMsgWrapper.querySelector('.message-content'); if (contentDiv) { finalizeAiMessage(typingMsgWrapper, contentDiv, contentDiv.textContent); } else { typingMsgWrapper.remove(); } } enableInput(); }
                    if (chatOutputInner) chatOutputInner.removeAttribute('aria-busy');
                    console.log('Stop process triggered.');
                };

                const addCopyButtonToCodeBlock = (pre) => { if(!pre || pre.querySelector('.copy-code-button')) return; const btn = document.createElement('button'); btn.textContent = 'העתק'; btn.className = 'copy-code-button'; btn.ariaLabel = 'העתק קוד'; btn.type = 'button'; btn.onclick = (e) => { e.stopPropagation(); const codeElement = pre.querySelector('code') || pre; const buttonText = btn.textContent; let textToCopy = (codeElement.textContent || ''); if (textToCopy.endsWith(buttonText)) textToCopy = textToCopy.substring(0, textToCopy.length - buttonText.length).trimEnd(); navigator.clipboard.writeText(textToCopy.trim()).then(()=>{ btn.textContent='הועתק!'; btn.classList.add('copied'); setTimeout(()=>{btn.textContent='העתק';btn.classList.remove('copied');},1500);}).catch(err=>{console.error("Copy failed:", err);btn.textContent='שגיאה';setTimeout(()=>{btn.textContent='העתק';},1500);}); }; pre.style.position='relative'; pre.appendChild(btn); };
                const handleCopyClick = (e) => { const button = e.currentTarget; const wrapper = button.closest('.message-wrapper'); if (!wrapper) return; const content = wrapper.querySelector('.message-content'); if (!content) return; const textToCopy = content.dataset.rawText || content.textContent?.trim() || ''; navigator.clipboard.writeText(textToCopy).then(()=>{button.innerHTML = '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z"/></svg>';button.classList.add('copied');button.title='הועתק!';setTimeout(()=>{button.innerHTML='<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M16 1H4c-1.1 0-2 .9-2 2v14h2V3h12V1zm3 4H8c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h11c1.1 0 2-.9 2-2V7c0-1.1-.9-2-2-2zm0 16H8V7h11v14z"/></svg>';button.classList.remove('copied');button.title='העתק טקסט';},1500);}).catch(err=>{console.error("Copy failed:", err);button.title='שגיאת העתקה';}); };
                const handleRegenerateClick = (e) => { if(typingTimeout || currentAbortController) { showCustomDialog({ title: "פעולה חסומה", message: "לא ניתן לחדש תגובה בזמן שה-AI מגיב." }); return; } const button = e.currentTarget; const wrapper = button.closest('.message-wrapper'); if(!wrapper) return; const msg = wrapper.querySelector('.ai-message'); if(!msg) return; const originalUserQuery=msg.dataset.userQuery, modelValueUsed=msg.dataset.modelValue, modelNameUsed=msg.dataset.modelName, originalAiMsgId=wrapper.dataset.messageId; if(!originalUserQuery || !modelValueUsed || !modelNameUsed || !originalAiMsgId) { showCustomDialog({ title: "שגיאה", message: "לא ניתן לשחזר תגובה זו (חסר מידע)." }); return; } sendMessage(originalUserQuery, { isRegeneration: true, originalAiMsgId: originalAiMsgId, modelValueOverride: modelValueUsed, modelNameOverride: modelNameUsed }, false); };
                // handleFeedbackClick removed
                // updateEditButtons, startEdit, cancelEdit, saveEdit removed

                // --- Send Message ---
                const sendMessage = async (textToSend, options = {}, skipResponse = false) => {
                    // Edit logic removed
                    if (!userInput || !chatOutputInner || !modelSelect || !sendButton) return;

                    const { isRegeneration = false, originalAiMsgId = null, modelValueOverride = null, modelNameOverride = null } = options;
                    const originalUserText = (textToSend !== undefined ? textToSend : userInput.value).trim();

                    if (originalUserText === '' || currentAbortController) { if (currentAbortController) showCustomDialog({ title: "פעולה חסומה", message: "נא המתן לסיום התגובה." }); return; }

                    disableInput();
                    if(clearInputButton) clearInputButton.style.display = 'none';
                    if(sendButton) sendButton.classList.remove('has-text');

                    let textForApi = originalUserText;
                    const stylePrefix = (!isRegeneration && currentStyle !== 'default') ? conversationStylePrefixes[currentStyle] || '' : '';
                    if (stylePrefix) { textForApi = stylePrefix + originalUserText; }

                    if (!isRegeneration) { addMessageToChat(originalUserText, 'user', { timestamp: getCurrentTimestamp(false), originalUserQueryForDisplay: originalUserText }); userInput.value = ''; adjustTextareaHeight(); instantScrollToBottom(); }
                    else if (originalAiMsgId) { const oldWrapper = chatOutputInner.querySelector(`.message-wrapper[data-message-id="${originalAiMsgId}"]`); if (oldWrapper) oldWrapper.remove(); }

                    if (skipResponse) { enableInput(); return; }

                    const loadingIndicatorWrapper = addMessageToChat(null, 'ai', { isLoading: true });
                    if (chatOutputInner) chatOutputInner.setAttribute('aria-busy', 'true');
                    instantScrollToBottom();

                    const historyArray = getChatHistory(isRegeneration, originalAiMsgId);
                    let requestPayloadText = historyArray.map(m => `[${m.role.toUpperCase()}] ${m.content}`).join('\n');
                    requestPayloadText += (requestPayloadText ? '\n' : '') + `[USER] ${textForApi}`;
                    requestPayloadText = requestPayloadText.trim();

                    const selectedOption = modelSelect ? (modelValueOverride ? (Array.from(modelSelect.options).find(opt => opt.value === modelValueOverride) || modelSelect.options[modelSelect.selectedIndex]) : modelSelect.options[modelSelect.selectedIndex]) : null;
                    const modelName = modelNameOverride || selectedOption?.text || 'default';
                    const selectedModelFile = selectedOption?.value || 'main-ai.php';
                    const finalApiUrl = BASE_API_URL + selectedModelFile; // Simple concatenation

                    currentAbortController = new AbortController();
                    const signal = currentAbortController.signal;

                    try {
                        const requestBody = { text: requestPayloadText }; // No generationConfig
                        // console.log("API Request:", finalApiUrl, JSON.stringify(requestBody, null, 2));

                        const response = await fetch(finalApiUrl, { method: 'POST', headers: { 'Content-Type': 'application/json' }, body: JSON.stringify(requestBody), signal });
                        // console.log("API Response Status:", response.status);

                        if (!signal.aborted) { loadingIndicatorWrapper?.remove(); }
                        else { loadingIndicatorWrapper?.remove(); if (chatOutputInner) chatOutputInner.removeAttribute('aria-busy'); currentAbortController = null; enableInput(); return; }

                        if (!response.ok) {
                            let errorText = `שגיאת שרת (${response.status})`;
                             try { const errorData = await response.json(); errorText += `: ${errorData?.error || response.statusText || 'לא ידוע'}`; } catch (e) { errorText += `: ${response.statusText || 'לא ידוע'}`; }
                             // Log the full response text for debugging server issues
                             response.text().then(text => console.error("Server error response body:", text));
                            throw new Error(errorText);
                        }

                        const data = await response.json();
                        // console.log("API Response Data:", data);

                        if (data?.text) {
                            const aiMsgWrapper = addMessageToChat('', 'ai', { timestamp: getCurrentTimestamp(false), modelNameUsed: modelName, userQuery: originalUserText, modelValue: selectedModelFile });
                            if (aiMsgWrapper) { typeAiResponse(aiMsgWrapper, data.text); }
                            else { throw new Error("Failed to create AI message element wrapper."); }
                        } else if (data?.error) {
                             throw new Error(`שגיאה מה-API: ${data.error}`);
                        } else {
                            throw new Error("תגובה לא תקינה מהשרת (חסר טקסט או שגיאה).");
                        }

                    } catch (error) {
                        loadingIndicatorWrapper?.remove();
                        if (chatOutputInner) chatOutputInner.removeAttribute('aria-busy');

                        if (error.name === 'AbortError') { console.log('בקשת שליחה בוטלה.'); const lastAiWrapper = chatOutputInner?.querySelector('.ai-message-wrapper:last-child'); const contentDiv = lastAiWrapper?.querySelector('.message-content'); if (lastAiWrapper && contentDiv && typingTimeout) { finalizeAiMessage(lastAiWrapper, contentDiv, contentDiv.textContent); } }
                        else { console.error("Send Error:", error); addMessageToChat(`שגיאה בשליחה: ${error.message}`, 'ai', { modelNameUsed: modelName }); enableInput(); }
                    } finally {
                        currentAbortController = null;
                        if (!typingTimeout && !currentAbortController) { enableInput(); }
                    }
                };

                // --- Download / Clear ---
                const downloadChat = () => { let chatContent = `AI Chat History (${new Date().toLocaleString('he-IL')})\nModel: ${modelSelect?.options[modelSelect.selectedIndex]?.text || 'N/A'}\nStyle: ${conversationStyles[styleSelect?.value || 'default']?.name || 'Default'}\n====================\n\n`; const historyForDownload = []; const wrappers = chatOutputInner?.querySelectorAll('.message-wrapper'); wrappers?.forEach(w => { const msgDiv = w.querySelector('.message'); if (!msgDiv) return; const sender = msgDiv.dataset.sender; const ts = msgDiv.dataset.timestamp; const model = msgDiv.dataset.modelName ? ` (${msgDiv.dataset.modelName})` : ''; const contentEl = msgDiv.querySelector('.message-content'); let text = contentEl?.dataset.rawText || contentEl?.textContent?.trim() || ''; if (sender === 'user' && msgDiv.dataset.originalUserQuery) text = msgDiv.dataset.originalUserQuery; const role = sender === 'user' ? 'User' : (ts === 'התחל' ? 'System' : 'AI'); historyForDownload.push(`[${ts}] ${role}${model}: ${text}`); }); chatContent += historyForDownload.join('\n\n'); try { const blob = new Blob([chatContent], { type: 'text/plain;charset=utf-8' }); const link = document.createElement('a'); link.href = URL.createObjectURL(blob); const now = new Date(); const dateString = `${now.getFullYear()}-${(now.getMonth() + 1).toString().padStart(2, '0')}-${now.getDate().toString().padStart(2, '0')}`; const filename = `ai_chat_log_${dateString}.txt`; link.download = filename; document.body.appendChild(link); link.click(); document.body.removeChild(link); URL.revokeObjectURL(link.href); } catch (e) { console.error("Download error:", e); showCustomDialog({ title: "שגיאה", message: "הורדה נכשלה." }); } };
                const clearChat = () => { showCustomDialog({ title: "ניקוי שיחה", message: "למחוק את כל ההודעות ולהתחיל שיחה חדשה?", confirmText: "מחק והתחל מחדש", onConfirm: () => { stopTypingAndGeneration(); if (chatOutputInner) chatOutputInner.innerHTML = ''; initializeGreeting(); messageCounterId = 0; if (scrollToBottomButton) scrollToBottomButton.classList.remove('visible'); isScrolledToBottom = true; if (userInput) { userInput.value = ''; adjustTextareaHeight(); } if(clearInputButton) clearInputButton.style.display = 'none'; if(sendButton) sendButton.classList.remove('has-text'); enableInput(); console.log("Chat cleared."); }}); };
                const adjustTextareaHeight = () => { if (!userInput) return; const MIN_HEIGHT_PX = 48; userInput.style.height = 'auto'; const scrollH = userInput.scrollHeight; const computedStyle = window.getComputedStyle(userInput); const maxH = parseInt(computedStyle.maxHeight, 10) || 160; if (scrollH <= MIN_HEIGHT_PX) userInput.style.height = `${MIN_HEIGHT_PX}px`; else if (scrollH > maxH) userInput.style.height = `${maxH}px`; else userInput.style.height = `${scrollH}px`; userInput.style.overflowY = (scrollH > maxH) ? 'auto' : 'hidden'; };
                const handleUrlParameter = () => { try { const params = new URLSearchParams(window.location.search); const conversationParam = params.get('conversation'); if (conversationParam) { const decodedText = decodeURIComponent(conversationParam).trim(); if (decodedText) { setTimeout(() => { addMessageToChat(decodedText, 'user', { timestamp: getCurrentTimestamp(false), originalUserQueryForDisplay: decodedText }); if(userInput) userInput.value = ''; adjustTextareaHeight(); instantScrollToBottom(); enableInput(); }, 200); const nextURL = window.location.pathname; window.history.replaceState({}, document.title, nextURL); } } } catch (e) { console.error("URL param error:", e); } };

                // --- Initial Greeting Function ---
                const initializeGreeting = () => { const greetingText = `ברוך הבא לממשק AI המתקדם! 🚀\n\n*   קוד צבעוני וברור.\n*   אנימציות משופרות.\n*   שליטה בהגדרות (⚙️).\n\nמוכן לפעולה? שאל אותי משהו!`; addMessageToChat(greetingText, 'ai', { timestamp: 'התחל' }); };

                // --- Initialization ---
                const initializeChat = () => { console.log("Initializing AI Chat V9.2..."); originalDocumentTitle = document.title; populateStyleSelect(); loadSettings(); adjustTextareaHeight(); initializeGreeting(); handleUrlParameter(); instantScrollToBottom(); enableInput(); updateScrollState(); console.log("AI Chat V9.2 Initialized."); };

                // --- Event Listeners ---
                if (sendButton) sendButton.onclick = () => sendMessage();
                if (userInput) { userInput.addEventListener('keypress', (e) => { userInteracted = true; if (e.key === 'Enter' && !e.shiftKey && !e.isComposing && sendOnEnter) { e.preventDefault(); sendMessage(); } }); userInput.addEventListener('input', () => { userInteracted = true; adjustTextareaHeight(); const hasText = userInput.value.length > 0; if(clearInputButton) clearInputButton.style.display = hasText ? 'flex' : 'none'; if(sendButton) sendButton.classList.toggle('has-text', hasText); }); }
                if (clearInputButton) clearInputButton.onclick = () => { if (userInput) { userInput.value = ''; adjustTextareaHeight(); clearInputButton.style.display = 'none'; if(sendButton) sendButton.classList.remove('has-text'); focusElement(userInput); } };
                if (chatOutput) chatOutput.addEventListener('scroll', debouncedUpdateScrollState);
                if (scrollToBottomButton) scrollToBottomButton.onclick = smoothScrollToBottom;
                if (settingsButton) settingsButton.onclick = (e) => { e.stopPropagation(); toggleSettingsPopover(); };
                document.addEventListener('click', (e) => { userInteracted = true; if (settingsPopover?.classList.contains('visible') && !settingsPopover.contains(e.target) && !settingsButton?.contains(e.target)) { toggleSettingsPopover(false); } });
                if (modelSelect) modelSelect.onchange = saveSettings;
                if (styleSelect) { styleSelect.onchange = () => { currentStyle = styleSelect.value; saveSettings(); console.log("Style changed to:", currentStyle); }; }
                if (sendOnEnterContainer) { sendOnEnterContainer.onclick = (e) => { userInteracted = true; if (e.target !== sendOnEnterCheckbox && sendOnEnterCheckbox) { sendOnEnterCheckbox.checked = !sendOnEnterCheckbox.checked; } sendOnEnter = sendOnEnterCheckbox.checked; saveSettings(); }; if(sendOnEnterCheckbox) sendOnEnterCheckbox.onchange = () => { sendOnEnter = sendOnEnterCheckbox.checked; saveSettings(); }; }
                if (darkModeContainer) { darkModeContainer.onclick = (e) => { userInteracted = true; if (e.target !== darkModeCheckbox && darkModeCheckbox) { darkModeCheckbox.checked = !darkModeCheckbox.checked; } applyDarkMode(darkModeCheckbox.checked); }; if(darkModeCheckbox) darkModeCheckbox.onchange = () => { applyDarkMode(darkModeCheckbox.checked); }; }
                if (downloadChatButtonTxt) downloadChatButtonTxt.onclick = downloadChat;
                if (clearChatButtonSettings) clearChatButtonSettings.onclick = clearChat;

                // --- Keyboard Shortcuts ---
                 document.addEventListener('keydown', (e) => {
                     userInteracted = true;
                     const focusOnInput = document.activeElement === userInput;
                     const popoverVisible = settingsPopover?.classList.contains('visible');
                     const isOverlayVisible = document.querySelector('#dialog-overlay.visible');
                     const isTextInputFocused = document.activeElement?.tagName === 'INPUT' || document.activeElement?.tagName === 'TEXTAREA';
                     if (isOverlayVisible || (isTextInputFocused && !focusOnInput)) return;
                     if (e.altKey && e.key.toLowerCase() === 's') { e.preventDefault(); toggleSettingsPopover(); }
                     else if (e.altKey && e.key.toLowerCase() === 'i' && !focusOnInput) { e.preventDefault(); focusElement(userInput); }
                     else if (e.altKey && e.key.toLowerCase() === 'x' && focusOnInput) { e.preventDefault(); if (userInput?.value) { userInput.value = ''; adjustTextareaHeight(); if (clearInputButton) clearInputButton.style.display = 'none'; if (sendButton) sendButton.classList.remove('has-text'); } }
                     else if (e.key === 'Escape' && popoverVisible) { e.preventDefault(); toggleSettingsPopover(false); }
                     else if (e.key === 'End' && !focusOnInput) { e.preventDefault(); instantScrollToBottom(); }
                     else if (e.key === 'Home' && !focusOnInput) { e.preventDefault(); if (chatOutput) chatOutput.scrollTo({ top: 0, behavior: 'smooth' }); }
                     else if (e.ctrlKey && e.key === 'Enter' && focusOnInput) { e.preventDefault(); sendMessage(); }
                 });

                // --- Start Initialization ---
                initializeChat();

            } catch (error) {
                console.error("Fatal Error during Chat Initialization:", error);
                const escapeHtmlForError = (unsafe) => (typeof unsafe === 'string' ? unsafe.replace(/</g, "&lt;").replace(/>/g, "&gt;") : unsafe);
                const body = document.body;
                if (body) { body.innerHTML = `<div style="padding: 30px; margin: 20px; border: 1px solid red; background-color: #ffebee; text-align: center; font-family: 'Rubik', sans-serif; color: #c62828;"><h2>תקלה קריטית!</h2><p>טעינת הצ'אט נכשלה באופן חמור.</p><p>נסה לרענן את הדף. אם הבעיה חוזרת, בדוק את קונסולת המפתחים (F12) לשגיאות.</p><pre style="text-align:left; direction:ltr; white-space:pre-wrap; word-break:break-all;">${escapeHtmlForError(error.stack || error.message)}</pre></div>`; }
             }
        }); // End DOMContentLoaded

    })(); // End IIFE
</script>

</body>
</html>
