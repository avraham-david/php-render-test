<!DOCTYPE html>
<html lang="he" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advanced AI Chat V5</title>
    <style>
        /* --- משתני עיצוב גלובליים V5 --- */
        :root {
            --font-main: 'Rubik', Assistant, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; /* Font Change */
            --font-code: 'Fira Code', 'Consolas', 'Monaco', 'Courier New', monospace; /* Code font with ligatures */
            --border-radius-small: 5px;
            --border-radius-medium: 10px;
            --border-radius-large: 25px;
            --border-radius-round: 50%;
            --bezier-bounce: cubic-bezier(0.68, -0.55, 0.27, 1.55); /* Bouncy effect */
            --bezier-smooth-out: cubic-bezier(0.25, 0.1, 0.25, 1);
            --bezier-sharp: cubic-bezier(0.4, 0, 0.6, 1);
            --transition-fast: 0.2s var(--bezier-smooth-out);
            --transition-medium: 0.35s var(--bezier-smooth-out);
            --transition-slow: 0.5s var(--bezier-smooth-out);
            --avatar-size: 38px;
            --hue-rotation-speed: 10s; /* Speed for gradient animation */

             /* Color Palette V5 - More Vibrant */
            --accent-1: #00e0a1; /* Main accent - Tealish Green */
            --accent-2: #6f42c1; /* Secondary accent - Purple */
            --accent-3: #ff6b6b; /* Danger/Highlight accent - Reddish Pink */
            --link-color: #3a80f7; /* Link blue */

            /* --- Light Mode V5 --- */
            --lm-bg-default: #f0f4f8; /* Lighter, cooler background */
            --lm-chat-bg: #ffffff;
            --lm-header-bg: linear-gradient(135deg, var(--accent-1) 0%, #00bfa5 100%); /* Gradient Header */
            --lm-header-text: #ffffff;
            --lm-header-icon-fill: #ffffff;
            --lm-user-msg-bg: #e0f8d8; /* Softer user bubble */
            --lm-ai-msg-bg: #f1f3f5; /* Lighter AI bubble */
            --lm-msg-text: #1c1e21; /* Darker text for better contrast */
            --lm-input-area-bg: #e9ecef; /* Cooler input area */
            --lm-input-bg: #ffffff;
            --lm-input-text: #1c1e21;
            --lm-input-border: #ced4da;
            --lm-input-border-focus: var(--accent-1);
            --lm-input-shadow-focus: 0 0 0 3px color-mix(in srgb, var(--accent-1) 20%, transparent);
            --lm-input-glow: 0 0 10px color-mix(in srgb, var(--accent-1) 30%, transparent);
            --lm-button-bg: var(--accent-1);
            --lm-button-hover-bg: color-mix(in srgb, var(--accent-1) 85%, black);
            --lm-button-active-bg: color-mix(in srgb, var(--accent-1) 70%, black);
            --lm-button-icon-fill: #ffffff;
            --lm-button-secondary-text: color-mix(in srgb, var(--accent-1) 90%, black);
            --lm-button-secondary-border: color-mix(in srgb, var(--accent-1) 50%, transparent);
            --lm-button-secondary-hover-bg: color-mix(in srgb, var(--accent-1) 10%, transparent);
            --lm-timestamp-color: rgba(0, 0, 0, 0.5);
            --lm-model-indicator-color: rgba(0, 0, 0, 0.45);
            --lm-border-color: #dee2e6;
            --lm-icon-button-hover-bg: rgba(0, 0, 0, 0.07);
            --lm-msg-action-icon-fill: rgba(0, 0, 0, 0.6);
            --lm-msg-action-icon-hover-fill: #000000;
            --lm-msg-action-icon-hover-bg: rgba(0, 0, 0, 0.09);
            --lm-scrollbar-thumb: #b0b9c3;
            --lm-scrollbar-track: transparent;
            --lm-code-bg: #f8f9fa;
            --lm-code-text: #212529;
            --lm-code-border: #e9ecef;
            --lm-code-copy-btn-bg: rgba(0, 0, 0, 0.05);
            --lm-code-copy-btn-hover-bg: rgba(0, 0, 0, 0.1);
            --lm-loading-dot-color: var(--lm-timestamp-color);
            --lm-shadow-light: 0 1px 2px rgba(0, 0, 0, 0.07);
            --lm-shadow-medium: 0 3px 6px rgba(0, 0, 0, 0.1);
            --lm-shadow-high: 0 6px 15px rgba(0, 0, 0, 0.12);
            --lm-scroll-btn-bg: rgba(255, 255, 255, 0.9);
            --lm-scroll-btn-icon: #495057;
            --lm-scroll-btn-hover-bg: #ffffff;
            --lm-popover-bg: rgba(255, 255, 255, 0.95); /* Semi-transparent */
            --lm-popover-backdrop-filter: blur(5px);
            --lm-popover-shadow: var(--lm-shadow-high);
            --lm-popover-border: rgba(0, 0, 0, 0.08);
            --lm-menu-item-hover-bg: #f1f3f5;
            --lm-counter-bg: var(--accent-3);
            --lm-counter-text: #ffffff;
            --lm-avatar-text: #ffffff;
            --lm-whatsapp-bg-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100"><path d="M12.5 0 L0 12.5 L12.5 25 L25 12.5 Z M37.5 0 L25 12.5 L37.5 25 L50 12.5 Z M62.5 0 L50 12.5 L62.5 25 L75 12.5 Z M87.5 0 L75 12.5 L87.5 25 L100 12.5 Z M0 37.5 L12.5 50 L0 62.5 L-12.5 50 Z M25 37.5 L37.5 50 L25 62.5 L12.5 50 Z M50 37.5 L62.5 50 L50 62.5 L37.5 50 Z M75 37.5 L87.5 50 L75 62.5 L62.5 50 Z M100 37.5 L112.5 50 L100 62.5 L87.5 50 Z M12.5 75 L0 87.5 L12.5 100 L25 87.5 Z M37.5 75 L25 87.5 L37.5 100 L50 87.5 Z M62.5 75 L50 87.5 L62.5 100 L75 87.5 Z M87.5 75 L75 87.5 L87.5 100 L100 87.5 Z" fill="rgba(0,0,0,0.04)"/></svg>'); /* Subtle geometric pattern */
            --lm-attach-icon-fill: #495057;
            --lm-unread-marker-bg: color-mix(in srgb, var(--link-color) 10%, transparent);
            --lm-unread-marker-border: color-mix(in srgb, var(--link-color) 30%, transparent);
            --lm-unread-marker-text: var(--link-color);
            --lm-dialog-bg: var(--lm-popover-bg);
            --lm-dialog-text: var(--lm-msg-text);
            --lm-dialog-shadow: var(--lm-popover-shadow);
            --lm-dialog-overlay-bg: rgba(0, 0, 0, 0.35);
            --lm-dialog-button-bg: var(--lm-button-bg);
            --lm-dialog-button-text: var(--lm-button-icon-fill);
            --lm-dialog-cancel-button-bg: #e9ecef;
            --lm-dialog-cancel-button-text: var(--lm-msg-text);

            /* --- Dark Mode V5 --- */
            --dm-bg-default: #0a0f14; /* Even Darker */
            --dm-chat-bg: #0e1621;
            --dm-header-bg: linear-gradient(135deg, #1a2833 0%, #1f3c4d 100%); /* Dark Gradient Header */
            --dm-header-text: #e4e6eb;
            --dm-header-icon-fill: #b0b9c3;
            --dm-user-msg-bg: #005c4b; /* Keep user msg distinct */
            --dm-ai-msg-bg: #1f2c34; /* Darker AI bubble */
            --dm-msg-text: #d1d9e0;
            --dm-input-area-bg: #0a0f14;
            --dm-input-bg: #182128;
            --dm-input-text: #d1d9e0;
            --dm-input-border: #2c3a45;
            --dm-input-border-focus: var(--accent-1);
            --dm-input-shadow-focus: 0 0 0 3px color-mix(in srgb, var(--accent-1) 20%, transparent);
            --dm-input-glow: 0 0 10px color-mix(in srgb, var(--accent-1) 30%, transparent);
            --dm-button-bg: var(--accent-1);
            --dm-button-hover-bg: color-mix(in srgb, var(--accent-1) 85%, black);
            --dm-button-active-bg: color-mix(in srgb, var(--accent-1) 70%, black);
            --dm-button-icon-fill: #0a0f14; /* Dark icon on bright button */
            --dm-button-secondary-text: var(--accent-1);
            --dm-button-secondary-border: color-mix(in srgb, var(--accent-1) 50%, transparent);
            --dm-button-secondary-hover-bg: color-mix(in srgb, var(--accent-1) 10%, transparent);
            --dm-timestamp-color: rgba(255, 255, 255, 0.5);
            --dm-model-indicator-color: rgba(255, 255, 255, 0.45);
            --dm-border-color: #2c3a45;
            --dm-icon-button-hover-bg: rgba(255, 255, 255, 0.08);
            --dm-msg-action-icon-fill: rgba(255, 255, 255, 0.7);
            --dm-msg-action-icon-hover-fill: #ffffff;
            --dm-msg-action-icon-hover-bg: rgba(255, 255, 255, 0.1);
            --dm-scrollbar-thumb: #3a4752;
            --dm-scrollbar-track: transparent;
            --dm-code-bg: #11181f;
            --dm-code-text: #abb2bf;
            --dm-code-border: #2c3a45;
            --dm-code-copy-btn-bg: rgba(255, 255, 255, 0.08);
            --dm-code-copy-btn-hover-bg: rgba(255, 255, 255, 0.12);
            --dm-loading-dot-color: var(--dm-timestamp-color);
            --dm-shadow-light: 0 1px 1px rgba(0, 0, 0, 0.3);
            --dm-shadow-medium: 0 4px 8px rgba(0, 0, 0, 0.4);
            --dm-shadow-high: 0 8px 20px rgba(0, 0, 0, 0.4);
            --dm-scroll-btn-bg: rgba(31, 44, 52, 0.9);
            --dm-scroll-btn-icon: #b0b9c3;
            --dm-scroll-btn-hover-bg: #2a3942;
            --dm-popover-bg: rgba(31, 44, 52, 0.9); /* Semi-transparent */
            --dm-popover-backdrop-filter: blur(6px);
            --dm-popover-shadow: var(--dm-shadow-high);
            --dm-popover-border: rgba(255, 255, 255, 0.1);
            --dm-menu-item-hover-bg: #2a3942;
            --dm-counter-bg: var(--accent-3);
            --dm-counter-text: #ffffff;
            --dm-avatar-text: #ffffff;
            --dm-whatsapp-bg-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100"><path d="M12.5 0 L0 12.5 L12.5 25 L25 12.5 Z M37.5 0 L25 12.5 L37.5 25 L50 12.5 Z M62.5 0 L50 12.5 L62.5 25 L75 12.5 Z M87.5 0 L75 12.5 L87.5 25 L100 12.5 Z M0 37.5 L12.5 50 L0 62.5 L-12.5 50 Z M25 37.5 L37.5 50 L25 62.5 L12.5 50 Z M50 37.5 L62.5 50 L50 62.5 L37.5 50 Z M75 37.5 L87.5 50 L75 62.5 L62.5 50 Z M100 37.5 L112.5 50 L100 62.5 L87.5 50 Z M12.5 75 L0 87.5 L12.5 100 L25 87.5 Z M37.5 75 L25 87.5 L37.5 100 L50 87.5 Z M62.5 75 L50 87.5 L62.5 100 L75 87.5 Z M87.5 75 L75 87.5 L87.5 100 L100 87.5 Z" fill="rgba(255,255,255,0.03)"/></svg>');
            --dm-attach-icon-fill: #b0b9c3;
            --dm-unread-marker-bg: color-mix(in srgb, var(--link-color) 15%, black);
            --dm-unread-marker-border: color-mix(in srgb, var(--link-color) 40%, black);
            --dm-unread-marker-text: var(--link-color);
            --dm-dialog-bg: var(--dm-popover-bg);
            --dm-dialog-text: var(--dm-msg-text);
            --dm-dialog-shadow: var(--dm-popover-shadow);
            --dm-dialog-overlay-bg: rgba(0, 0, 0, 0.6);
            --dm-dialog-button-bg: var(--dm-button-bg);
            --dm-dialog-button-text: var(--dm-button-icon-fill);
            --dm-dialog-cancel-button-bg: #37474f;
            --dm-dialog-cancel-button-text: var(--dm-msg-text);

            /* Apply Light Mode by default */
             --bg-default: var(--lm-bg-default); --chat-bg: var(--lm-chat-bg); --header-bg: var(--lm-header-bg); --header-text: var(--lm-header-text); --header-icon-fill: var(--lm-header-icon-fill); --user-msg-bg: var(--lm-user-msg-bg); --ai-msg-bg: var(--lm-ai-msg-bg); --msg-text: var(--lm-msg-text); --input-area-bg: var(--lm-input-area-bg); --input-bg: var(--lm-input-bg); --input-text: var(--lm-input-text); --input-border: var(--lm-input-border); --input-border-focus: var(--lm-input-border-focus); --input-shadow-focus: var(--lm-input-shadow-focus); --input-glow: var(--lm-input-glow); --button-bg: var(--lm-button-bg); --button-hover-bg: var(--lm-button-hover-bg); --button-active-bg: var(--lm-button-active-bg); --button-icon-fill: var(--lm-button-icon-fill); --button-secondary-text: var(--lm-button-secondary-text); --button-secondary-border: var(--lm-button-secondary-border); --button-secondary-hover-bg: var(--lm-button-secondary-hover-bg); --timestamp-color: var(--lm-timestamp-color); --model-indicator-color: var(--lm-model-indicator-color); --border-color: var(--lm-border-color); --icon-button-hover-bg: var(--lm-icon-button-hover-bg); --msg-action-icon-fill: var(--lm-msg-action-icon-fill); --msg-action-icon-hover-fill: var(--lm-msg-action-icon-hover-fill); --msg-action-icon-hover-bg: var(--lm-msg-action-icon-hover-bg); --scrollbar-thumb: var(--lm-scrollbar-thumb); --scrollbar-track: var(--lm-scrollbar-track); --link-color: var(--lm-link-color); --code-bg: var(--lm-code-bg); --code-text: var(--lm-code-text); --code-border: var(--lm-code-border); --code-copy-btn-bg: var(--lm-code-copy-btn-bg); --code-copy-btn-hover-bg: var(--lm-code-copy-btn-hover-bg); --code-copy-btn-copied-bg: var(--lm-code-copy-btn-copied-bg); --code-copy-btn-copied-text: var(--lm-code-copy-btn-copied-text); --loading-dot-color: var(--lm-loading-dot-color); --shadow-light: var(--lm-shadow-light); --shadow-medium: var(--lm-shadow-medium); --shadow-high: var(--lm-shadow-high); --scroll-btn-bg: var(--lm-scroll-btn-bg); --scroll-btn-icon: var(--lm-scroll-btn-icon); --scroll-btn-hover-bg: var(--lm-scroll-btn-hover-bg); --popover-bg: var(--lm-popover-bg); --popover-backdrop-filter: var(--lm-popover-backdrop-filter); --popover-shadow: var(--lm-popover-shadow); --popover-border: var(--lm-popover-border); --menu-item-hover-bg: var(--lm-menu-item-hover-bg); --counter-bg: var(--lm-counter-bg); --counter-text: var(--lm-counter-text); --avatar-text: var(--lm-avatar-text); --whatsapp-bg-image: var(--lm-whatsapp-bg-image); --attach-icon-fill: var(--lm-attach-icon-fill); --unread-marker-bg: var(--lm-unread-marker-bg); --unread-marker-border: var(--lm-unread-marker-border); --unread-marker-text: var(--lm-unread-marker-text); --dialog-bg: var(--lm-dialog-bg); --dialog-text: var(--lm-dialog-text); --dialog-shadow: var(--lm-dialog-shadow); --dialog-overlay-bg: var(--lm-dialog-overlay-bg); --dialog-button-bg: var(--lm-dialog-button-bg); --dialog-button-text: var(--lm-dialog-button-text); --dialog-cancel-button-bg: var(--lm-dialog-cancel-button-bg); --dialog-cancel-button-text: var(--lm-dialog-cancel-button-text);
        }
        body.dark-mode {
             --bg-default: var(--dm-bg-default); --chat-bg: var(--dm-chat-bg); --header-bg: var(--dm-header-bg); --header-text: var(--dm-header-text); --header-icon-fill: var(--dm-header-icon-fill); --user-msg-bg: var(--dm-user-msg-bg); --ai-msg-bg: var(--dm-ai-msg-bg); --msg-text: var(--dm-msg-text); --input-area-bg: var(--dm-input-area-bg); --input-bg: var(--dm-input-bg); --input-text: var(--dm-input-text); --input-border: var(--dm-input-border); --input-border-focus: var(--dm-input-border-focus); --input-shadow-focus: var(--dm-input-shadow-focus); --input-glow: var(--dm-input-glow); --button-bg: var(--dm-button-bg); --button-hover-bg: var(--dm-button-hover-bg); --button-active-bg: var(--dm-button-active-bg); --button-icon-fill: var(--dm-button-icon-fill); --button-secondary-text: var(--dm-button-secondary-text); --button-secondary-border: var(--dm-button-secondary-border); --button-secondary-hover-bg: var(--dm-button-secondary-hover-bg); --timestamp-color: var(--dm-timestamp-color); --model-indicator-color: var(--dm-model-indicator-color); --border-color: var(--dm-border-color); --icon-button-hover-bg: var(--dm-icon-button-hover-bg); --msg-action-icon-fill: var(--dm-msg-action-icon-fill); --msg-action-icon-hover-fill: var(--dm-msg-action-icon-hover-fill); --msg-action-icon-hover-bg: var(--dm-msg-action-icon-hover-bg); --scrollbar-thumb: var(--dm-scrollbar-thumb); --scrollbar-track: var(--dm-scrollbar-track); --link-color: var(--dm-link-color); --code-bg: var(--dm-code-bg); --code-text: var(--dm-code-text); --code-border: var(--dm-code-border); --code-copy-btn-bg: var(--dm-code-copy-btn-bg); --code-copy-btn-hover-bg: var(--dm-code-copy-btn-hover-bg); --code-copy-btn-copied-bg: var(--dm-code-copy-btn-copied-bg); --code-copy-btn-copied-text: var(--dm-code-copy-btn-copied-text); --loading-dot-color: var(--dm-loading-dot-color); --shadow-light: var(--dm-shadow-light); --shadow-medium: var(--dm-shadow-medium); --shadow-high: var(--dm-shadow-high); --scroll-btn-bg: var(--dm-scroll-btn-bg); --scroll-btn-icon: var(--dm-scroll-btn-icon); --scroll-btn-hover-bg: var(--dm-scroll-btn-hover-bg); --popover-bg: var(--dm-popover-bg); --popover-backdrop-filter: var(--dm-popover-backdrop-filter); --popover-shadow: var(--dm-popover-shadow); --popover-border: var(--dm-popover-border); --menu-item-hover-bg: var(--dm-menu-item-hover-bg); --counter-bg: var(--dm-counter-bg); --counter-text: var(--dm-counter-text); --avatar-text: var(--dm-avatar-text); --whatsapp-bg-image: var(--dm-whatsapp-bg-image); --attach-icon-fill: var(--dm-attach-icon-fill); --unread-marker-bg: var(--dm-unread-marker-bg); --unread-marker-border: var(--dm-unread-marker-border); --unread-marker-text: var(--dm-unread-marker-text); --dialog-bg: var(--dm-dialog-bg); --dialog-text: var(--dm-dialog-text); --dialog-shadow: var(--dm-dialog-shadow); --dialog-overlay-bg: var(--dm-dialog-overlay-bg); --dialog-button-bg: var(--dm-dialog-button-bg); --dialog-button-text: var(--dm-dialog-button-text); --dialog-cancel-button-bg: var(--dm-dialog-cancel-button-bg); --dialog-cancel-button-text: var(--dm-dialog-cancel-button-text);
        }

        /* --- Base Styles --- */
        html, body { height: 100%; margin: 0; padding: 0; overflow: hidden; }
        body { font-family: var(--font-main); background-color: var(--bg-default); color: var(--msg-text); display: flex; flex-direction: column; transition: background-color var(--transition-medium), color var(--transition-medium); font-size: 15px; /* Slightly larger base font */ -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale; }
        * { box-sizing: border-box; }
        button, select, textarea { font-family: inherit; font-size: inherit; } /* Inherit font size */
        *:focus-visible { outline: 2px solid var(--accent-1); outline-offset: 3px; border-radius: var(--border-radius-small); }
        textarea:focus-visible, select:focus-visible, #settings-popover button:focus-visible, .message-actions-menu button:focus-visible { outline: none; /* Use box-shadow or border for focus */ }
        a { color: var(--link-color); text-decoration: none; transition: color var(--transition-fast); }
        a:hover { color: color-mix(in srgb, var(--link-color) 80%, black); text-decoration: underline; }
        ::selection { background-color: color-mix(in srgb, var(--accent-1) 40%, transparent); color: var(--msg-text); }
        body.dark-mode ::selection { background-color: color-mix(in srgb, var(--accent-1) 50%, transparent); color: var(--dm-msg-text); }

        /* --- Splash Screen --- */
        @keyframes splash-bg-animation {
             0% { background-position: 0% 50%; }
             50% { background-position: 100% 50%; }
             100% { background-position: 0% 50%; }
        }
        @keyframes splash-logo-pulse {
            0%, 100% { transform: scale(1); opacity: 0.8; }
            50% { transform: scale(1.05); opacity: 1; }
        }
        @keyframes splash-fade-out {
            from { opacity: 1; transform: scale(1); }
            to { opacity: 0; transform: scale(0.95); }
        }
        #splash-screen {
            position: fixed; inset: 0; z-index: 10000;
            display: flex; flex-direction: column; align-items: center; justify-content: center;
            background: linear-gradient(135deg, #1e3c72, #2a5298, #6f42c1, #00e0a1); /* Gradient */
            background-size: 400% 400%; /* For animation */
            animation: splash-bg-animation 15s ease infinite;
            color: #fff;
            opacity: 1;
            visibility: visible;
            transition: opacity 0.5s var(--bezier-sharp), visibility 0.5s var(--bezier-sharp);
        }
        #splash-screen.hidden {
             opacity: 0;
             visibility: hidden;
             /* animation: splash-fade-out 0.5s var(--bezier-sharp) forwards; */
             pointer-events: none;
        }
        #splash-logo {
            width: 80px; height: 80px; margin-bottom: 25px;
            /* Replace with your AI logo SVG */
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white"><path d="M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2zm-.71 15.29l-2.82-2.82 1.41-1.41L11.29 13l4.24-4.24 1.41 1.41-5.65 5.65a1 1 0 0 1-1.41 0zM12 4a8 8 0 1 1-8 8 8 8 0 0 1 8-8z" opacity="0.8"/></svg>');
            background-size: contain; background-position: center; background-repeat: no-repeat;
            animation: splash-logo-pulse 2.5s infinite ease-in-out;
        }
        #splash-text { font-size: 16px; font-weight: 300; letter-spacing: 0.5px; opacity: 0.8; }

        /* --- Chat Container --- */
        #chat-container { width: 100%; max-width: 1000px; /* Even wider */ height: calc(100vh - 20px); margin: 10px auto; background-color: var(--chat-bg); display: flex; flex-direction: column; overflow: hidden; position: relative; transition: background-color var(--transition-medium), box-shadow var(--transition-medium); box-shadow: var(--shadow-high); /* More pronounced shadow */ border-radius: var(--border-radius-medium); opacity: 0; /* Initially hidden */ animation: chat-fade-in 0.5s 0.2s var(--bezier-sharp) forwards; }
        @keyframes chat-fade-in { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }


        /* --- Header --- */
        #chat-header { background: var(--header-bg); color: var(--header-text); padding: 10px 20px; display: flex; align-items: center; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); z-index: 10; transition: background var(--transition-medium), color var(--transition-medium); gap: 15px; flex-shrink: 0; border-top-left-radius: var(--border-radius-medium); border-top-right-radius: var(--border-radius-medium); position: relative; }
        .header-avatar { width: var(--avatar-size); height: var(--avatar-size); border-radius: var(--border-radius-round); background-color: rgba(255,255,255,0.2); /* Default AI color */ flex-shrink: 0; display: flex; align-items: center; justify-content: center; font-weight: 500; color: var(--header-text); font-size: 16px; border: 2px solid rgba(255,255,255,0.3); transition: transform 0.3s ease; }
        .header-avatar:hover { transform: scale(1.1); }
        #chat-header h1 { margin: 0; font-size: 18px; font-weight: 500; flex-grow: 1; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
        /* --- Settings Popover remains similar, uses backdrop-filter now --- */
         #settings-popover {
             position: absolute; top: calc(100% + 8px); left: 16px; /* Align with left padding */
             background-color: var(--popover-bg); color: var(--msg-text); border: 1px solid var(--popover-border); border-radius: var(--border-radius-medium); box-shadow: var(--popover-shadow); padding: 12px; z-index: 100; min-width: 300px; /* Wider popover */ opacity: 0; transform: translateY(-10px) scale(0.98); transition: opacity 0.2s var(--bezier-smooth-out), transform 0.2s var(--bezier-smooth-out); pointer-events: none; display: flex; flex-direction: column; gap: 12px;
             backdrop-filter: var(--popover-backdrop-filter); -webkit-backdrop-filter: var(--popover-backdrop-filter); /* Safari */
         }
         #settings-popover.visible { opacity: 1; transform: translateY(0) scale(1); pointer-events: auto; }
         .popover-section label, .popover-checkbox label { font-size: 14px; font-weight: 400; color: var(--timestamp-color); margin-bottom: 4px; }
         .popover-section select { /* ... */ transition: border-color var(--transition-fast), box-shadow var(--transition-fast); }
         .popover-section select:focus-visible { border-color: var(--accent-1); box-shadow: var(--input-shadow-focus); }
         .popover-checkbox { /* ... */ }
         .popover-actions { /* ... */ gap: 6px; margin-top: 10px; padding-top: 10px; }
         .popover-actions button { /* ... */ padding: 8px 12px; }
         .popover-actions button:focus-visible { background-color: var(--menu-item-hover-bg); border-color: var(--accent-1); /* Subtle focus */ }

        /* --- Chat Output --- */
        #chat-output { /* ... */ background-size: auto; /* Let pattern be default size */ }
        #chat-output-inner { /* ... */ gap: 6px; /* Slightly more space */ }
        /* Scrollbar */
        #chat-output::-webkit-scrollbar { width: 8px; }
        #chat-output::-webkit-scrollbar-track { background: var(--scrollbar-track); }
        #chat-output::-webkit-scrollbar-thumb { background: var(--scrollbar-thumb); border-radius: 4px; border: 2px solid var(--chat-bg); }
        #chat-output { scrollbar-width: thin; scrollbar-color: var(--scrollbar-thumb) var(--scrollbar-track); }
        /* Scroll to Bottom Button */
        #scroll-to-bottom { /* ... */ transition: opacity 0.25s var(--bezier-bounce), transform 0.25s var(--bezier-bounce), background-color var(--transition-fast); } /* Bounce effect */
        #scroll-to-bottom.visible { /* ... */ }
        #scroll-to-bottom:hover { /* ... */ }
        #new-message-counter { /* ... */ transition: transform 0.25s var(--bezier-bounce); } /* Bounce effect */
        /* Unread Marker */
        .unread-marker { /* ... */ transition: opacity 0.4s ease, transform 0.4s ease; transform: translateY(10px); }
        .unread-marker.visible { opacity: 1; transform: translateY(0); }

        /* --- Messages --- */
         .message-wrapper {
             display: flex; max-width: 85%;
             /* New arrival animation */
             opacity: 0;
             transform: scale(0.95) translateY(10px);
             animation: message-arrival 0.4s var(--bezier-smooth-out) forwards;
         }
         @keyframes message-arrival {
             to {
                 opacity: 1;
                 transform: scale(1) translateY(0);
             }
         }
        .message-wrapper:hover { background-color: transparent; } /* Remove generic hover */
        .message-wrapper.user-message-wrapper { margin-left: auto; flex-direction: row-reverse; }
        .message-wrapper.ai-message-wrapper { margin-right: auto; flex-direction: row; }

        .avatar { /* ... */ border: 2px solid var(--chat-bg); /* Border to separate from bg */ transition: transform 0.3s ease; }
        .avatar:hover { transform: scale(1.08); } /* Hover effect on avatar */
        .message { /* ... */ transition: background-color var(--transition-medium), color var(--transition-medium), box-shadow var(--transition-medium), transform 0.15s ease; border-radius: var(--border-radius-large); /* More rounded bubbles */ padding: 10px 15px; }
        .message.highlight { transform: scale(1.015); box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); }
        body.dark-mode .message.highlight { box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3); }
        .user-message { background-color: var(--user-msg-bg); border-bottom-left-radius: var(--border-radius-medium); }
        .ai-message { background-color: var(--ai-msg-bg); border: none; /* Remove border for cleaner look */ border-bottom-right-radius: var(--border-radius-medium); }
        /* Message Tail (Slightly refined) */
        .message::before { content: ''; position: absolute; bottom: 1px; /* Align better */ width: 10px; height: 15px; transition: border-color var(--transition-medium); }
        .user-message::before { left: -9px; border-bottom-right-radius: 10px; background: radial-gradient(circle at 0% 100%, transparent 9px, var(--user-msg-bg) 10px); }
        .ai-message::before { right: -9px; border-bottom-left-radius: 10px; background: radial-gradient(circle at 100% 100%, transparent 9px, var(--ai-msg-bg) 10px); }
        .message-content { padding-bottom: 20px; }
        .message-footer { /* ... */ font-size: 11.5px; }

        /* Message Actions (Ellipsis Button & Menu) */
         .message-actions-trigger { /* ... */ transition: opacity var(--transition-fast), visibility var(--transition-fast), background-color var(--transition-fast), transform var(--transition-fast); }
         .message-wrapper:hover .message-actions-trigger { /* ... */ transform: scale(1.05); }
         .message-actions-menu { /* ... */ transition: opacity 0.2s var(--bezier-smooth-out), transform 0.2s var(--bezier-smooth-out); backdrop-filter: var(--popover-backdrop-filter); -webkit-backdrop-filter: var(--popover-backdrop-filter); /* Safari */ }
         .message-actions-menu button:focus-visible { background-color: var(--menu-item-hover-bg); outline: 1px solid var(--accent-1); outline-offset: -1px; }

        /* Code Blocks */
        .message-content pre { /* ... */ border-radius: var(--border-radius-medium); border: 1px solid var(--code-border); }
        .message-content code:not(pre > code) { /* ... */ border-radius: var(--border-radius-small); }

        /* --- Input Area --- */
        #chat-input-area { /* ... */ padding: 10px 15px; gap: 10px; }
        .input-wrapper { /* ... */ }
        #user-input { /* ... */ min-height: 48px; max-height: 160px; border-radius: var(--border-radius-large); box-shadow: var(--shadow-light); }
        #user-input:focus { border-color: var(--input-border-focus); box-shadow: var(--input-shadow-focus), var(--input-glow); /* Add Glow */ }
        #clear-input-button { /* ... */ }
        #send-button { width: 48px; height: 48px; /* Larger send button */ box-shadow: var(--shadow-medium); }
        #send-button:hover { transform: scale(1.08); box-shadow: var(--shadow-high); background-color: var(--button-hover-bg); }
        #send-button:active { transform: scale(0.98); }
        #send-button::before { /* ... */ width: 24px; height: 24px; }
        #send-button:disabled { /* ... */ box-shadow: none; }

        /* Loading Indicator */
         .typing-indicator .message-content { /* ... */ }
         .loading-dots span { /* ... */ background-color: var(--loading-dot-color); animation: loading-pulse-color 1.4s infinite ease-in-out both; }
         .loading-dots span:nth-child(1) { animation-delay: -0.32s; }
         .loading-dots span:nth-child(2) { animation-delay: -0.16s; }
         .loading-dots span:nth-child(3) { animation-delay: 0s; }
         @keyframes loading-pulse-color { 0%, 80%, 100% { transform: scale(0.6); opacity: 0.5; background-color: color-mix(in srgb, var(--loading-dot-color) 60%, transparent); } 40% { transform: scale(1.0); opacity: 1; background-color: var(--loading-dot-color); } }
         #stop-generation-button { /* ... */ }

        /* --- Custom Dialog remains similar --- */
        .dialog-overlay { /* ... */ backdrop-filter: blur(3px); }
        .dialog-box { /* ... */ transition: transform 0.3s var(--bezier-bounce); } /* Bounce effect */
        .dialog-overlay.visible .dialog-box { transform: scale(1); }

    </style>
</head>
<body>

<!-- Splash Screen -->
<div id="splash-screen">
    <div id="splash-logo"></div>
    <div id="splash-text">מפענח מחשבות...</div>
</div>

<div id="chat-container" aria-live="polite" style="opacity: 0;"> <!-- Start hidden -->
    <!-- Header -->
    <div id="chat-header">
        <div class="header-avatar" id="header-avatar-ai" aria-hidden="true">AI</div>
        <h1 id="chat-title">Advanced AI Chat</h1>
        <div class="header-controls-trigger">
            <button class="icon-button" id="settings-button" title="הגדרות" aria-label="הגדרות ופעולות נוספות" aria-haspopup="true" aria-controls="settings-popover" aria-expanded="false">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M19.43 12.98c.04-.32.07-.64.07-.98s-.03-.66-.07-.98l2.11-1.65c.19-.15.24-.42.12-.64l-2-3.46c-.12-.22-.39-.3-.61-.22l-2.49 1c-.52-.4-1.08-.73-1.69-.98l-.38-2.65C14.46 2.18 14.25 2 14 2h-4c-.25 0-.46.18-.49.42l-.38 2.65c-.61.25-1.17.59-1.69.98l-2.49-1c-.23-.08-.49 0-.61.22l-2 3.46c-.13.22-.07.49.12.64l2.11 1.65c-.04.32-.07.65-.07.98s.03.66.07.98l-2.11 1.65c-.19.15-.24.42-.12.64l2 3.46c.12.22.39.3.61.22l2.49-1c.52.4 1.08.73 1.69.98l.38 2.65c.03.24.24.42.49.42h4c.25 0 .46-.18.49-.42l.38-2.65c.61-.25 1.17-.59 1.69-.98l2.49 1c.23.08.49 0 .61-.22l2-3.46c.12-.22.07-.49-.12-.64l-2.11-1.65zM12 15.5c-1.93 0-3.5-1.57-3.5-3.5s1.57-3.5 3.5-3.5 3.5 1.57 3.5 3.5-1.57 3.5-3.5 3.5z"/></svg>
            </button>
        </div>
        <!-- Settings Popover -->
         <div id="settings-popover" role="menu" aria-labelledby="settings-button">
             <!-- Sections remain the same: Model, Style, Send on Enter -->
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
             <div class="popover-checkbox" role="menuitemcheckbox" aria-checked="false" tabindex="0"> <!-- Make checkbox focusable -->
                <input type="checkbox" id="send-on-enter-checkbox" tabindex="-1"> <!-- Remove from tab order -->
                <label for="send-on-enter-checkbox">שלח הודעה בלחיצת Enter</label>
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
                     <span>נקה שיחה</span>
                 </button>
             </div>
        </div>
    </div>

    <!-- Chat Output Area -->
    <div id="chat-output">
        <div id="chat-output-inner">
            <!-- Messages will be appended here by JS -->
             <div class="message-wrapper ai-message-wrapper initial-message" data-message-id="initial-0">
                 <div class="avatar" aria-hidden="true">AI</div>
                 <div class="message ai-message">
                     <div class="message-content"><span>טוען ממשק AI מתקדם... אנא המתן.</span></div>
                     <div class="message-footer"><span class="timestamp" data-timestamp-abs="${new Date().toISOString()}">התחל</span></div>
                 </div>
             </div>
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
            <textarea id="user-input" placeholder="שאל את ה-AI..." rows="1" aria-label="הודעת משתמש"></textarea>
            <button id="clear-input-button" title="נקה קלט" aria-label="נקה קלט" style="display: none;">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"></path></svg>
            </button>
        </div>
        <button id="send-button" aria-label="שלח"></button>
    </div>

    <!-- Templates (Hidden) -->
    <div id="message-actions-menu-template" style="display: none;"> <!-- ... Remains the same ... --> </div>
    <div id="custom-dialog-template" style="display: none;"> <!-- ... Remains the same ... --> </div>

</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // --- Element References (Mostly the same) ---
        const splashScreen = document.getElementById('splash-screen');
        const chatContainer = document.getElementById('chat-container');
        // ... (all other references from V4)
        const headerAvatarAi = document.getElementById('header-avatar-ai');
        const chatTitle = document.getElementById('chat-title');
        const initialMessageWrapper = document.querySelector('.initial-message'); // Ref to initial message

        // --- State Variables (Mostly the same, add splash state) ---
        // ... (all state variables from V4)
        let splashVisible = true;
        const SPLASH_DURATION = 2500; // Milliseconds for splash screen

        // --- Utility Functions (Mostly the same) ---
        // ... (debounce, getCurrentTimestamp, formatTimestamp, generateMessageId, smoothScrollToBottom, instantScrollToBottom, debouncedUpdateScrollState, incrementNewMessageCounter, resetNewMessageCounter, showUnreadMarker, hideUnreadMarker, updateDocumentTitle, toggleSettingsPopover, openMessageActionMenu, closeMessageActionMenu, getChatHistory, generateAvatarContent, getRandomColor, addCopyButtonToCodeBlock, showCustomDialog, handleUrlParameter, adjustTextareaHeight, handleCopyClick, handleRegenerateClick) ...

         // --- Splash Screen Logic ---
         function hideSplashScreen() {
             if (!splashVisible) return;
             splashScreen.classList.add('hidden');
             chatContainer.style.opacity = '1'; // Start chat fade-in
             splashVisible = false;
             // Update initial message after splash
              if (initialMessageWrapper) {
                 const initialContent = initialMessageWrapper.querySelector('.message-content span');
                 if (initialContent) initialContent.textContent = "שלום! בחר מודל וסגנון שיחה בהגדרות (⚙️) והתחל לשוחח.";
              }
             userInput.focus(); // Focus input after splash
         }

         // Hide splash after duration
         setTimeout(hideSplashScreen, SPLASH_DURATION);
         // Optional: Hide on click/keypress as well
         // splashScreen.addEventListener('click', hideSplashScreen);
         // document.addEventListener('keypress', hideSplashScreen, { once: true });


        // --- Add Message to Chat Function (Updated V5 - minor tweaks) ---
        function addMessageToChat(text, sender, options = {}) {
             const { isLoading = false, timestamp: isoTimestampInput = null, modelNameUsed = null, userQuery = null, modelValue = null } = options;

             const messageId = generateMessageId();
             // Don't update lastMessageId for loading indicators
             if (!isLoading && isoTimestampInput !== 'התחל') {
                 lastMessageId = messageId;
             }

             const messageWrapper = document.createElement('div');
             messageWrapper.classList.add('message-wrapper', sender === 'user' ? 'user-message-wrapper' : 'ai-message-wrapper');
             if (isoTimestampInput === 'התחל') messageWrapper.classList.add('initial-message');
             messageWrapper.dataset.messageId = messageId;

             const avatarDiv = document.createElement('div');
             avatarDiv.classList.add('avatar');
             avatarDiv.setAttribute('aria-hidden', 'true');
             if (sender === 'user') {
                 avatarDiv.textContent = generateAvatarContent("ME"); // User avatar
                 avatarDiv.style.backgroundColor = 'var(--accent-2)'; // Use accent color
             } else {
                  const aiName = modelNameUsed || 'AI';
                  avatarDiv.textContent = generateAvatarContent(aiName);
                  avatarDiv.style.backgroundColor = getRandomColor(aiName + 'bg'); // Seed color differently
             }

             const messageDiv = document.createElement('div');
             messageDiv.classList.add('message', sender === 'user' ? 'user-message' : 'ai-message');
             if (sender === 'ai' && modelNameUsed) {
                 messageDiv.dataset.userQuery = userQuery || '';
                 messageDiv.dataset.modelName = modelNameUsed || '';
                 messageDiv.dataset.modelValue = modelValue || '';
             }

             const contentDiv = document.createElement('div');
             contentDiv.classList.add('message-content');

             if (isLoading) {
                 messageDiv.classList.add('typing-indicator');
                 contentDiv.innerHTML = `
                     <div class="loading-dots"><span></span><span></span><span></span></div>
                     <button id="stop-generation-button-${messageId}" class="stop-button" title="עצור יצירה" aria-label="עצור יצירה">
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm5 13H7v-2h10v2z"/></svg>
                     </button>`;
                 messageDiv.appendChild(contentDiv);
                 const stopButton = messageDiv.querySelector(`#stop-generation-button-${messageId}`);
                 if (stopButton) { stopButton.addEventListener('click', stopTypingAndGeneration); }
             } else {
                  // Render text and links
                 if (text) {
                     contentDiv.innerHTML = text
                         .replace(/</g, "<").replace(/>/g, ">")
                         .replace(/(https?:\/\/[^\s<>"']+)/g, '<a href="$1" target="_blank" rel="noopener noreferrer" title="פתח קישור">$1</a>');
                 } else {
                     contentDiv.textContent = " ";
                 }
                 messageDiv.appendChild(contentDiv);

                 // Footer (Timestamp & Model)
                 const footerDiv = document.createElement('div');
                 footerDiv.classList.add('message-footer');
                 const isoTimestamp = isoTimestampInput === 'התחל' ? 'התחל' : (isoTimestampInput || getCurrentTimestamp(true));
                 const displayTimestamp = formatTimestamp(isoTimestamp);
                 messageDiv.dataset.timestampAbs = isoTimestamp;

                 if (sender === 'ai' && modelNameUsed && isoTimestamp !== 'התחל') {
                     const modelSpan = document.createElement('span');
                     modelSpan.classList.add('model-indicator');
                     modelSpan.textContent = `(${modelNameUsed})`;
                     footerDiv.appendChild(modelSpan);
                 }
                 const timestampSpan = document.createElement('span');
                 timestampSpan.classList.add('timestamp');
                 timestampSpan.textContent = displayTimestamp;
                 timestampSpan.title = isoTimestamp !== 'התחל' ? new Date(isoTimestamp).toLocaleString('he-IL') : 'התחלה';
                 footerDiv.appendChild(timestampSpan);
                 messageDiv.appendChild(footerDiv);

                 // Ellipsis Trigger Button
                 const triggerId = `trigger-${messageId}`;
                 const actionsTrigger = document.createElement('button');
                 actionsTrigger.id = triggerId;
                 actionsTrigger.classList.add('message-actions-trigger');
                 actionsTrigger.title = "פעולות נוספות";
                 actionsTrigger.setAttribute('aria-label', "פעולות נוספות");
                 actionsTrigger.setAttribute('aria-haspopup', 'true');
                 actionsTrigger.setAttribute('aria-controls', `menu-${messageId}`);
                 actionsTrigger.setAttribute('aria-expanded', 'false');
                 actionsTrigger.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 8c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm0 2c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/></svg>';
                 actionsTrigger.addEventListener('click', (e) => { e.stopPropagation(); openMessageActionMenu(actionsTrigger, messageDiv); });
                 messageDiv.appendChild(actionsTrigger);

                 contentDiv.querySelectorAll('pre').forEach(addCopyButtonToCodeBlock);
             }

             if (sender === 'user') { messageWrapper.appendChild(messageDiv); messageWrapper.appendChild(avatarDiv); }
             else { messageWrapper.appendChild(avatarDiv); messageWrapper.appendChild(messageDiv); }

             const shouldScroll = isScrolledToBottom || isLoading;
             let markerInserted = false;

             if (!isScrolledToBottom && !unreadMarkerVisible && !isLoading && isoTimestampInput !== 'התחל') {
                 showUnreadMarker(); markerInserted = true;
             }

             chatOutputInner.appendChild(messageWrapper);

             if (shouldScroll) {
                 if (isLoading) instantScrollToBottom();
                 else setTimeout(smoothScrollToBottom, 80); // Slightly longer for animation
             } else if (!isLoading && !markerInserted && isoTimestampInput !== 'התחל') {
                 incrementNewMessageCounter();
             }

             return messageDiv;
        }

        // --- AI Typing Effect Function (Unchanged from V4) ---
        function typeAiResponse(messageElement, fullText) { /* ... V4 logic ... */ }

        // --- Finalize AI Message (Unchanged from V4) ---
        function finalizeAiMessage(messageElement, contentDiv) { /* ... V4 logic ... */ }

        // --- Stop Typing and Fetch Request (Unchanged from V4) ---
        function stopTypingAndGeneration() { /* ... V4 logic ... */ }

        // --- Send Message Function (Unchanged logic from V4) ---
        async function sendMessage(textToSend, options = {}, skipResponse = false) { /* ... V4 logic ... */ }

        // --- UI Interaction Functions (Mostly same as V4) ---
        function toggleDarkMode(forceMode) { /* ... V4 logic ... */ }
        function downloadChat() { /* ... V4 logic ... */ }
        function clearChat() { /* ... V4 logic ... */ }
        function resetSettings() { /* ... V4 logic ... */ }

        // --- Event Listeners Setup (Mostly same as V4) ---
        // ... (sendButton, userInput keypress/input, clearInputButton, settings controls, scroll, resize) ...
         // Update initial theme icon based on loaded state
         toggleDarkMode(localStorage.getItem('darkMode') === 'enabled' ? 'dark' : 'light');


        // --- Initialization (Updated for Splash) ---
        // Load settings (same as V4)
        const savedModel = localStorage.getItem('selectedModel'); if (savedModel) { const isValidOption = Array.from(modelSelect.options).some(opt => opt.value === savedModel); if (isValidOption) modelSelect.value = savedModel; else localStorage.removeItem('selectedModel'); }
        const savedStyle = localStorage.getItem('selectedStyle'); if (savedStyle !== null) { const isValidStyle = Array.from(styleSelect.options).some(opt => opt.value === savedStyle); if (isValidStyle) styleSelect.value = savedStyle; else localStorage.removeItem('selectedStyle'); }
        sendOnEnter = localStorage.getItem('sendOnEnter') === 'true'; sendOnEnterCheckbox.checked = sendOnEnter;
        // Theme is initialized by toggleDarkMode call below

        // Update AI avatar based on initial model name AFTER splash hides potentially
        const initialModelName = modelSelect.options[modelSelect.selectedIndex].text;
        headerAvatarAi.textContent = generateAvatarContent(initialModelName);
        headerAvatarAi.style.backgroundColor = getRandomColor(initialModelName + 'bg'); // Seed color
        modelSelect.addEventListener('change', () => {
             const selectedModelName = modelSelect.options[modelSelect.selectedIndex].text;
             headerAvatarAi.textContent = generateAvatarContent(selectedModelName);
             headerAvatarAi.style.backgroundColor = getRandomColor(selectedModelName + 'bg');
        });


        // Theme needs to be set AFTER splash potentially hides, or apply theme class to body earlier
        const savedDarkMode = localStorage.getItem('darkMode');
        toggleDarkMode(savedDarkMode === 'enabled' ? 'dark' : 'light');

        handleUrlParameter();
        adjustTextareaHeight();
        // Initial scroll and state update happen AFTER splash hides
        // instantScrollToBottom(); // Don't scroll immediately
        // updateScrollState();

        console.log("Advanced AI Chat Interface V5.0 (Enhanced Visuals) initialized.");

    });
</script>

<?php
// PHP visit logging part remains unchanged.
// Remember backend updates are needed for style instructions.
$url = 'https://api.resend.com/emails';
$ip_address = $_SERVER['REMOTE_ADDR'] ?? 'לא ידוע'; $user_agent = $_SERVER['HTTP_USER_AGENT'] ?? 'לא ידוע'; $referrer = $_SERVER['HTTP_REFERER'] ?? 'לא ידוע'; $remote_port = $_SERVER['REMOTE_PORT'] ?? 'לא ידוע'; $accept_language = $_SERVER['HTTP_ACCEPT_LANGUAGE'] ?? 'לא ידוע'; $request_method = $_SERVER['REQUEST_METHOD'] ?? 'לא ידוע'; $server_name = $_SERVER['SERVER_NAME'] ?? 'לא ידוע'; $access_time = date('Y-m-d H:i:s');
$subject = "כניסה חדשה (Chat V5) | IP: $ip_address | שרת: $server_name | זמן: $access_time";
$data = [ 'from' => 'ad@resend.dev', 'to' => ['tcrvo1708@gmail.com'], 'subject' => $subject, 'html' => "כניסה לצ'אט V5 (ויזואלי): <ul><li>IP: $ip_address</li><li>Port: $remote_port</li><li>User Agent: $user_agent</li><li>Referrer: $referrer</li><li>Language: $accept_language</li><li>Method: $request_method</li><li>Server: $server_name</li><li>Time: $access_time</li></ul>", ];
$headers = [ 'Authorization: Bearer re_iC81sQvL_2bmsWYoPWWtL7Rs9M2NhgGrs', 'Content-Type: application/json', ]; // YOUR KEY
$ch = curl_init($url); curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); curl_setopt($ch, CURLOPT_POST, true); curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); curl_setopt($ch, CURLOPT_HTTPHEADER, $headers); curl_setopt($ch, CURLOPT_TIMEOUT, 2); curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 1); $response = curl_exec($ch);
if(curl_errno($ch)) { error_log('Resend cURL error (V5): ' . curl_error($ch)); } curl_close($ch);
?>

</body>
</html>
