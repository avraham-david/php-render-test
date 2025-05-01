<!DOCTYPE html>
<html lang="he" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>צ'אט AI משופר V4</title>
    <style>
        /* --- משתני עיצוב גלובליים V4 --- */
        :root {
            --font-main: Assistant, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            --font-code: 'Consolas', 'Monaco', 'Courier New', monospace;
            --border-radius-small: 4px;
            --border-radius-medium: 8px;
            --border-radius-large: 21px; /* More rounded input/buttons */
            --border-radius-round: 50%;
            --transition-fast: 0.15s ease-out; /* Adjusted easing */
            --transition-medium: 0.3s cubic-bezier(0.4, 0, 0.2, 1); /* Smoother bezier */
            --transition-slow: 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            --avatar-size: 36px; /* Slightly larger avatar */
            --bezier-smooth: cubic-bezier(0.4, 0, 0.2, 1);

            /* --- Light Mode V4 --- */
            --lm-bg-default: #f7f7f7; /* Lighter background */
            --lm-chat-bg: #ffffff;
            --lm-header-bg: #00a884;
            --lm-header-text: #ffffff;
            --lm-header-icon-fill: #ffffff;
            --lm-user-msg-bg: #dcf8c6;
            --lm-ai-msg-bg: #f1f1f1; /* Lighter AI bubble */
            --lm-msg-text: #1f1f1f;
            --lm-input-area-bg: #f0f2f5;
            --lm-input-bg: #ffffff;
            --lm-input-text: #1f1f1f;
            --lm-input-border: #d1d7db; /* Softer border */
            --lm-input-border-focus: #77bceb; /* Softer focus */
            --lm-input-shadow-focus: 0 0 0 3px rgba(0, 128, 105, 0.15); /* Softer focus shadow */
            --lm-button-bg: #008069;
            --lm-button-hover-bg: #00a884;
            --lm-button-active-bg: #005c4b;
            --lm-button-icon-fill: #ffffff;
            --lm-button-secondary-text: var(--lm-button-bg);
            --lm-button-secondary-border: var(--lm-button-bg);
            --lm-button-secondary-hover-bg: rgba(0, 128, 105, 0.08);
            --lm-timestamp-color: rgba(0, 0, 0, 0.55);
            --lm-model-indicator-color: rgba(0, 0, 0, 0.5);
            --lm-border-color: #e9edef;
            --lm-icon-button-hover-bg: rgba(0, 0, 0, 0.06);
            --lm-msg-action-icon-fill: rgba(0, 0, 0, 0.6);
            --lm-msg-action-icon-hover-fill: #000000;
            --lm-msg-action-icon-hover-bg: rgba(0, 0, 0, 0.08);
            --lm-scrollbar-thumb: #c1c1c1;
            --lm-scrollbar-track: transparent;
            --lm-link-color: #056be0; /* Standard link blue */
            --lm-code-bg: #e8eaed; /* Slightly different code bg */
            --lm-code-text: #3c4043;
            --lm-code-border: #dadce0;
            --lm-code-copy-btn-bg: rgba(0, 0, 0, 0.04);
            --lm-code-copy-btn-hover-bg: rgba(0, 0, 0, 0.08);
            --lm-code-copy-btn-copied-bg: var(--lm-button-bg);
            --lm-code-copy-btn-copied-text: #ffffff;
            --lm-loading-dot-color: var(--lm-timestamp-color);
            --lm-shadow-light: 0 1px 1px rgba(0, 0, 0, 0.06);
            --lm-shadow-medium: 0 2px 5px rgba(0, 0, 0, 0.1);
            --lm-scroll-btn-bg: rgba(255, 255, 255, 0.92);
            --lm-scroll-btn-icon: #54656f;
            --lm-scroll-btn-hover-bg: #ffffff;
            --lm-popover-bg: #ffffff;
            --lm-popover-shadow: 0 5px 15px rgba(0, 0, 0, 0.12);
            --lm-popover-border: #d1d7db;
            --lm-menu-item-hover-bg: #f0f2f5;
            --lm-counter-bg: #f44336;
            --lm-counter-text: #ffffff;
            --lm-avatar-text: #ffffff; /* Text on avatar */
            --lm-whatsapp-bg-image: url('https://user-images.githubusercontent.com/15075759/28719144-86dc0f70-73b1-11e7-911d-60d70fcded21.png');
            --lm-attach-icon-fill: #54656f;
            --lm-unread-marker-bg: #e6f2ff;
            --lm-unread-marker-border: #a8cfff;
            --lm-unread-marker-text: #005ac4;
            --lm-dialog-bg: var(--lm-popover-bg);
            --lm-dialog-text: var(--lm-msg-text);
            --lm-dialog-shadow: var(--lm-popover-shadow);
            --lm-dialog-overlay-bg: rgba(0, 0, 0, 0.3);
            --lm-dialog-button-bg: var(--lm-button-bg);
            --lm-dialog-button-text: var(--lm-button-icon-fill);
            --lm-dialog-cancel-button-bg: #e0e0e0;
            --lm-dialog-cancel-button-text: var(--lm-msg-text);


            /* --- Dark Mode V4 --- */
            --dm-bg-default: #0e1621; /* Darker background */
            --dm-chat-bg: #0b141a;
            --dm-header-bg: #1f2c34; /* Slightly lighter header */
            --dm-header-text: #e9edef;
            --dm-header-icon-fill: #aebac1;
            --dm-user-msg-bg: #005c4b;
            --dm-ai-msg-bg: #202c33;
            --dm-msg-text: #e4e6eb; /* Lighter message text */
            --dm-input-area-bg: #111b21; /* Match new bg */
            --dm-input-bg: #1f2c34;
            --dm-input-text: #e4e6eb;
            --dm-input-border: #2f3b44;
            --dm-input-border-focus: #3a80f7;
            --dm-input-shadow-focus: 0 0 0 3px rgba(0, 168, 132, 0.15);
            --dm-button-bg: #00a884;
            --dm-button-hover-bg: #008069;
            --dm-button-active-bg: #00a884;
            --dm-button-icon-fill: #111b21;
            --dm-button-secondary-text: var(--dm-button-bg);
            --dm-button-secondary-border: var(--dm-button-bg);
            --dm-button-secondary-hover-bg: rgba(0, 168, 132, 0.1);
            --dm-timestamp-color: rgba(233, 237, 239, 0.6);
            --dm-model-indicator-color: rgba(233, 237, 239, 0.5);
            --dm-border-color: #263138; /* Slightly lighter border */
            --dm-icon-button-hover-bg: rgba(255, 255, 255, 0.07);
            --dm-msg-action-icon-fill: rgba(255, 255, 255, 0.7);
            --dm-msg-action-icon-hover-fill: #ffffff;
            --dm-msg-action-icon-hover-bg: rgba(255, 255, 255, 0.09);
            --dm-scrollbar-thumb: #4a525a;
            --dm-scrollbar-track: transparent;
            --dm-link-color: #58a6ff;
            --dm-code-bg: #161e24; /* Darker code bg */
            --dm-code-text: #c9d1d9;
            --dm-code-border: #30363d;
            --dm-code-copy-btn-bg: rgba(255, 255, 255, 0.08);
            --dm-code-copy-btn-hover-bg: rgba(255, 255, 255, 0.12);
            --dm-code-copy-btn-copied-bg: var(--dm-button-bg);
            --dm-code-copy-btn-copied-text: #111b21;
            --dm-loading-dot-color: var(--dm-timestamp-color);
            --dm-shadow-light: 0 1px 1px rgba(0, 0, 0, 0.4);
            --dm-shadow-medium: 0 3px 8px rgba(0, 0, 0, 0.5);
            --dm-scroll-btn-bg: rgba(31, 44, 52, 0.92);
            --dm-scroll-btn-icon: #aebac1;
            --dm-scroll-btn-hover-bg: #2a3942;
            --dm-popover-bg: #1f2c34;
            --dm-popover-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            --dm-popover-border: #2f3b44;
            --dm-menu-item-hover-bg: #2a3942;
            --dm-counter-bg: #d32f2f;
            --dm-counter-text: #ffffff;
            --dm-avatar-text: #111b21;
            --dm-whatsapp-bg-image: radial-gradient(circle, rgba(255,255,255,0.03) 1px, transparent 1px), radial-gradient(circle, rgba(255,255,255,0.03) 1px, transparent 1px);
            --dm-whatsapp-bg-size: 35px 35px;
            --dm-whatsapp-bg-pos: 0 0, 17.5px 17.5px;
            --dm-attach-icon-fill: #aebac1;
            --dm-unread-marker-bg: #1a2a3a;
            --dm-unread-marker-border: #3a5f8a;
            --dm-unread-marker-text: #87b3e7;
            --dm-dialog-bg: var(--dm-popover-bg);
            --dm-dialog-text: var(--dm-msg-text);
            --dm-dialog-shadow: var(--dm-popover-shadow);
            --dm-dialog-overlay-bg: rgba(0, 0, 0, 0.5);
            --dm-dialog-button-bg: var(--dm-button-bg);
            --dm-dialog-button-text: var(--dm-button-icon-fill);
            --dm-dialog-cancel-button-bg: #37474f;
            --dm-dialog-cancel-button-text: var(--dm-msg-text);

            /* --- Default Theme (Light) --- */
             --bg-default: var(--lm-bg-default); --chat-bg: var(--lm-chat-bg); --header-bg: var(--lm-header-bg); --header-text: var(--lm-header-text); --header-icon-fill: var(--lm-header-icon-fill); --user-msg-bg: var(--lm-user-msg-bg); --ai-msg-bg: var(--lm-ai-msg-bg); --msg-text: var(--lm-msg-text); --input-area-bg: var(--lm-input-area-bg); --input-bg: var(--lm-input-bg); --input-text: var(--lm-input-text); --input-border: var(--lm-input-border); --input-border-focus: var(--lm-input-border-focus); --input-shadow-focus: var(--lm-input-shadow-focus); --button-bg: var(--lm-button-bg); --button-hover-bg: var(--lm-button-hover-bg); --button-active-bg: var(--lm-button-active-bg); --button-icon-fill: var(--lm-button-icon-fill); --button-secondary-text: var(--lm-button-secondary-text); --button-secondary-border: var(--lm-button-secondary-border); --button-secondary-hover-bg: var(--lm-button-secondary-hover-bg); --timestamp-color: var(--lm-timestamp-color); --model-indicator-color: var(--lm-model-indicator-color); --border-color: var(--lm-border-color); --icon-button-hover-bg: var(--lm-icon-button-hover-bg); --msg-action-icon-fill: var(--lm-msg-action-icon-fill); --msg-action-icon-hover-fill: var(--lm-msg-action-icon-hover-fill); --msg-action-icon-hover-bg: var(--lm-msg-action-icon-hover-bg); --scrollbar-thumb: var(--lm-scrollbar-thumb); --scrollbar-track: var(--lm-scrollbar-track); --link-color: var(--lm-link-color); --code-bg: var(--lm-code-bg); --code-text: var(--lm-code-text); --code-border: var(--lm-code-border); --code-copy-btn-bg: var(--lm-code-copy-btn-bg); --code-copy-btn-hover-bg: var(--lm-code-copy-btn-hover-bg); --code-copy-btn-copied-bg: var(--lm-code-copy-btn-copied-bg); --code-copy-btn-copied-text: var(--lm-code-copy-btn-copied-text); --loading-dot-color: var(--lm-loading-dot-color); --shadow-light: var(--lm-shadow-light); --shadow-medium: var(--lm-shadow-medium); --scroll-btn-bg: var(--lm-scroll-btn-bg); --scroll-btn-icon: var(--lm-scroll-btn-icon); --scroll-btn-hover-bg: var(--lm-scroll-btn-hover-bg); --popover-bg: var(--lm-popover-bg); --popover-shadow: var(--lm-popover-shadow); --popover-border: var(--lm-popover-border); --menu-item-hover-bg: var(--lm-menu-item-hover-bg); --counter-bg: var(--lm-counter-bg); --counter-text: var(--lm-counter-text); --avatar-text: var(--lm-avatar-text); --whatsapp-bg-image: var(--lm-whatsapp-bg-image); --attach-icon-fill: var(--lm-attach-icon-fill); --unread-marker-bg: var(--lm-unread-marker-bg); --unread-marker-border: var(--lm-unread-marker-border); --unread-marker-text: var(--lm-unread-marker-text); --dialog-bg: var(--lm-dialog-bg); --dialog-text: var(--lm-dialog-text); --dialog-shadow: var(--lm-dialog-shadow); --dialog-overlay-bg: var(--lm-dialog-overlay-bg); --dialog-button-bg: var(--lm-dialog-button-bg); --dialog-button-text: var(--lm-dialog-button-text); --dialog-cancel-button-bg: var(--lm-dialog-cancel-button-bg); --dialog-cancel-button-text: var(--lm-dialog-cancel-button-text);
        }
        body.dark-mode {
             --bg-default: var(--dm-bg-default); --chat-bg: var(--dm-chat-bg); --header-bg: var(--dm-header-bg); --header-text: var(--dm-header-text); --header-icon-fill: var(--dm-header-icon-fill); --user-msg-bg: var(--dm-user-msg-bg); --ai-msg-bg: var(--dm-ai-msg-bg); --msg-text: var(--dm-msg-text); --input-area-bg: var(--dm-input-area-bg); --input-bg: var(--dm-input-bg); --input-text: var(--dm-input-text); --input-border: var(--dm-input-border); --input-border-focus: var(--dm-input-border-focus); --input-shadow-focus: var(--dm-input-shadow-focus); --button-bg: var(--dm-button-bg); --button-hover-bg: var(--dm-button-hover-bg); --button-active-bg: var(--dm-button-active-bg); --button-icon-fill: var(--dm-button-icon-fill); --button-secondary-text: var(--dm-button-secondary-text); --button-secondary-border: var(--dm-button-secondary-border); --button-secondary-hover-bg: var(--dm-button-secondary-hover-bg); --timestamp-color: var(--dm-timestamp-color); --model-indicator-color: var(--dm-model-indicator-color); --border-color: var(--dm-border-color); --icon-button-hover-bg: var(--dm-icon-button-hover-bg); --msg-action-icon-fill: var(--dm-msg-action-icon-fill); --msg-action-icon-hover-fill: var(--dm-msg-action-icon-hover-fill); --msg-action-icon-hover-bg: var(--dm-msg-action-icon-hover-bg); --scrollbar-thumb: var(--dm-scrollbar-thumb); --scrollbar-track: var(--dm-scrollbar-track); --link-color: var(--dm-link-color); --code-bg: var(--dm-code-bg); --code-text: var(--dm-code-text); --code-border: var(--dm-code-border); --code-copy-btn-bg: var(--dm-code-copy-btn-bg); --code-copy-btn-hover-bg: var(--dm-code-copy-btn-hover-bg); --code-copy-btn-copied-bg: var(--dm-code-copy-btn-copied-bg); --code-copy-btn-copied-text: var(--dm-code-copy-btn-copied-text); --loading-dot-color: var(--dm-loading-dot-color); --shadow-light: var(--dm-shadow-light); --shadow-medium: var(--dm-shadow-medium); --scroll-btn-bg: var(--dm-scroll-btn-bg); --scroll-btn-icon: var(--dm-scroll-btn-icon); --scroll-btn-hover-bg: var(--dm-scroll-btn-hover-bg); --popover-bg: var(--dm-popover-bg); --popover-shadow: var(--dm-popover-shadow); --popover-border: var(--dm-popover-border); --menu-item-hover-bg: var(--dm-menu-item-hover-bg); --counter-bg: var(--dm-counter-bg); --counter-text: var(--dm-counter-text); --avatar-text: var(--dm-avatar-text); --whatsapp-bg-image: var(--dm-whatsapp-bg-image); --whatsapp-bg-size: var(--dm-whatsapp-bg-size); --whatsapp-bg-pos: var(--dm-whatsapp-bg-pos); --attach-icon-fill: var(--dm-attach-icon-fill); --unread-marker-bg: var(--dm-unread-marker-bg); --unread-marker-border: var(--dm-unread-marker-border); --unread-marker-text: var(--dm-unread-marker-text); --dialog-bg: var(--dm-dialog-bg); --dialog-text: var(--dm-dialog-text); --dialog-shadow: var(--dm-dialog-shadow); --dialog-overlay-bg: var(--dm-dialog-overlay-bg); --dialog-button-bg: var(--dm-dialog-button-bg); --dialog-button-text: var(--dm-dialog-button-text); --dialog-cancel-button-bg: var(--dm-dialog-cancel-button-bg); --dialog-cancel-button-text: var(--dm-dialog-cancel-button-text);
        }

        /* --- Base Styles --- */
        html, body { height: 100%; margin: 0; padding: 0; overflow: hidden; }
        body { font-family: var(--font-main); background-color: var(--bg-default); color: var(--msg-text); display: flex; flex-direction: column; transition: background-color var(--transition-medium), color var(--transition-medium); font-size: 14.5px; -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale; }
        * { box-sizing: border-box; }
        button, select, textarea { font-family: inherit; }
        *:focus-visible { outline: 2px solid var(--button-bg); outline-offset: 2px; border-radius: var(--border-radius-small); }
        textarea:focus-visible { outline: none; } /* Handled by border/shadow */
        select:focus-visible { outline-offset: 1px; }
        a { color: var(--link-color); text-decoration: none; }
        a:hover { text-decoration: underline; }

        /* --- Chat Container --- */
        #chat-container { width: 100%; max-width: 950px; /* Wider */ height: calc(100vh - 20px); margin: 10px auto; background-color: var(--chat-bg); display: flex; flex-direction: column; overflow: hidden; position: relative; transition: background-color var(--transition-medium), box-shadow var(--transition-medium); box-shadow: var(--shadow-medium); border-radius: var(--border-radius-medium); }

        /* --- Header --- */
        #chat-header { background-color: var(--header-bg); color: var(--header-text); padding: 10px 16px; display: flex; align-items: center; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1); z-index: 10; transition: background-color var(--transition-medium), color var(--transition-medium); gap: 12px; flex-shrink: 0; border-top-left-radius: var(--border-radius-medium); border-top-right-radius: var(--border-radius-medium); position: relative; }
        .header-avatar { width: var(--avatar-size); height: var(--avatar-size); border-radius: var(--border-radius-round); background-color: #768c9a; /* Default AI color */ flex-shrink: 0; display: flex; align-items: center; justify-content: center; font-weight: 600; color: var(--avatar-text); font-size: 16px; }
        #chat-header h1 { margin: 0; font-size: 17px; font-weight: 500; flex-grow: 1; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
        .header-controls-trigger { margin-left: auto; /* Push button to the right */ }
        .icon-button { background: none; border: none; padding: 8px; cursor: pointer; border-radius: var(--border-radius-round); display: flex; align-items: center; justify-content: center; transition: background-color var(--transition-fast), transform var(--transition-fast); }
        .icon-button:hover { background-color: var(--icon-button-hover-bg); }
        .icon-button:active { transform: scale(0.92); background-color: color-mix(in srgb, var(--icon-button-hover-bg) 70%, #000000); }
        .icon-button svg { width: 24px; height: 24px; fill: var(--header-icon-fill); transition: fill var(--transition-medium); }
        #settings-button svg { width: 22px; height: 22px; }

        /* --- Settings Popover --- */
        #settings-popover {
            position: absolute; top: calc(100% + 5px); left: 16px; /* Align with left padding */
            background-color: var(--popover-bg); color: var(--msg-text); border: 1px solid var(--popover-border); border-radius: var(--border-radius-medium); box-shadow: var(--popover-shadow); padding: 10px; z-index: 100; min-width: 280px; /* Wider popover */ opacity: 0; transform: translateY(-10px) scale(0.98); transition: opacity 0.2s var(--bezier-smooth), transform 0.2s var(--bezier-smooth); pointer-events: none; display: flex; flex-direction: column; gap: 12px; }
        #settings-popover.visible { opacity: 1; transform: translateY(0) scale(1); pointer-events: auto; }
        .popover-section { display: flex; flex-direction: column; gap: 6px; }
        .popover-section label, .popover-checkbox label { font-size: 13px; font-weight: 500; color: var(--timestamp-color); margin-bottom: 2px; }
        .popover-section select { width: 100%; background-color: var(--input-bg); color: var(--input-text); border: 1px solid var(--input-border); border-radius: var(--border-radius-medium); padding: 8px 12px; font-size: 14px; cursor: pointer; outline: none; -webkit-appearance: none; -moz-appearance: none; appearance: none; background-image: url('data:image/svg+xml;utf8,<svg fill="%23aebac1" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M7 10l5 5 5-5z"/><path d="M0 0h24v24H0z" fill="none"/></svg>'); background-repeat: no-repeat; background-position: left 8px center; background-size: 18px; direction: ltr; text-align: right; padding-left: 30px; }
        .popover-section select option { background-color: var(--popover-bg); color: var(--msg-text); direction: rtl; }
        .popover-checkbox { display: flex; align-items: center; gap: 8px; cursor: pointer; }
        .popover-checkbox input[type="checkbox"] { accent-color: var(--button-bg); cursor: pointer;}
        .popover-actions { display: flex; flex-direction: column; gap: 4px; margin-top: 8px; border-top: 1px solid var(--border-color); padding-top: 8px; }
        .popover-actions button { background: none; border: 1px solid transparent; color: var(--msg-text); padding: 7px 10px; text-align: right; border-radius: var(--border-radius-small); cursor: pointer; display: flex; align-items: center; gap: 10px; font-size: 14px; transition: background-color var(--transition-fast), border-color var(--transition-fast); width: 100%; }
        .popover-actions button:hover { background-color: var(--menu-item-hover-bg); }
        .popover-actions button.secondary { /* Ghost button style */
            color: var(--button-secondary-text);
            border-color: var(--button-secondary-border);
        }
         .popover-actions button.secondary:hover {
            background-color: var(--button-secondary-hover-bg);
        }
        .popover-actions button.danger { color: var(--counter-bg); }
        .popover-actions button.danger:hover { background-color: color-mix(in srgb, var(--counter-bg) 10%, transparent); }
        .popover-actions button svg { width: 18px; height: 18px; fill: currentColor; /* Inherit color from button */ flex-shrink: 0; }

        /* --- Chat Output --- */
        #chat-output { flex-grow: 1; padding: 0 15px; /* Padding handled by inner */ overflow-y: auto; display: flex; flex-direction: column; scroll-behavior: auto; position: relative; background-color: transparent; background-image: var(--whatsapp-bg-image); background-size: var(--whatsapp-bg-size, auto); background-position: var(--whatsapp-bg-pos, center); background-repeat: repeat; }
        #chat-output-inner { padding-top: 10px; padding-bottom: 10px; display: flex; flex-direction: column; gap: 4px; /* Space between message wrappers */ }

        /* Scrollbar */
        #chat-output::-webkit-scrollbar { width: 7px; }
        #chat-output::-webkit-scrollbar-track { background: var(--scrollbar-track); }
        #chat-output::-webkit-scrollbar-thumb { background: var(--scrollbar-thumb); border-radius: 4px; border: 1px solid var(--chat-bg); }
        #chat-output::-webkit-scrollbar-thumb:hover { background: color-mix(in srgb, var(--scrollbar-thumb) 70%, #000000); }
        #chat-output { scrollbar-width: thin; scrollbar-color: var(--scrollbar-thumb) var(--scrollbar-track); }

        /* Scroll to Bottom Button */
        #scroll-to-bottom { position: absolute; bottom: 85px; left: 25px; background-color: var(--scroll-btn-bg); backdrop-filter: blur(5px); border: 1px solid color-mix(in srgb, var(--border-color) 50%, transparent); border-radius: var(--border-radius-round); width: 40px; height: 40px; padding: 0; cursor: pointer; display: none; align-items: center; justify-content: center; box-shadow: var(--shadow-medium); opacity: 0; transform: translateY(10px) scale(0.9); transition: opacity 0.2s var(--bezier-smooth), transform 0.2s var(--bezier-smooth), background-color var(--transition-fast); z-index: 20; }
        #scroll-to-bottom.visible { display: flex; opacity: 0.9; transform: translateY(0) scale(1); }
        #scroll-to-bottom:hover { opacity: 1; background-color: var(--scroll-btn-hover-bg); transform: scale(1.05); }
        #scroll-to-bottom svg { width: 22px; height: 22px; fill: var(--scroll-btn-icon); }
        #new-message-counter { position: absolute; top: -4px; right: -4px; background-color: var(--counter-bg); color: var(--counter-text); border-radius: 10px; min-width: 18px; height: 18px; padding: 0 4px; font-size: 11px; font-weight: 600; display: flex; align-items: center; justify-content: center; line-height: 1; box-shadow: 0 1px 2px rgba(0,0,0,0.3); transform: scale(0); transition: transform 0.2s var(--bezier-smooth); }
        #scroll-to-bottom.has-new #new-message-counter { transform: scale(1); }

        /* Unread Marker */
        .unread-marker {
            position: relative;
            text-align: center;
            margin: 15px 0;
            height: 1px;
            background-color: var(--unread-marker-border);
            opacity: 0;
            transition: opacity 0.3s ease;
            pointer-events: none; /* Don't interfere with selection */
        }
        .unread-marker span {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: var(--unread-marker-bg);
            color: var(--unread-marker-text);
            font-size: 12px;
            font-weight: 500;
            padding: 3px 12px;
            border-radius: var(--border-radius-large);
            border: 1px solid var(--unread-marker-border);
            white-space: nowrap;
        }
         .unread-marker.visible {
            opacity: 1;
        }


        /* --- Messages --- */
        .message-wrapper { display: flex; max-width: 85%; transition: background-color 0.2s ease; }
        .message-wrapper:hover { background-color: rgba(0,0,0,0.02); } /* Subtle hover */
        body.dark-mode .message-wrapper:hover { background-color: rgba(255,255,255,0.02); }
        .message-wrapper.user-message-wrapper { margin-left: auto; flex-direction: row-reverse; }
        .message-wrapper.ai-message-wrapper { margin-right: auto; flex-direction: row; }

        .avatar { width: var(--avatar-size); height: var(--avatar-size); border-radius: var(--border-radius-round); background-color: gray; /* Fallback */ flex-shrink: 0; margin-top: 5px; align-self: flex-start; display: flex; align-items: center; justify-content: center; font-weight: 600; color: var(--avatar-text); font-size: 16px; user-select: none; }
        .ai-message-wrapper .avatar { margin-left: 10px; }
        .user-message-wrapper .avatar { margin-right: 10px; background-color: var(--button-bg); /* User avatar color */ }

        .message { position: relative; padding: 8px 13px; border-radius: var(--border-radius-medium); word-wrap: break-word; line-height: 1.55; font-size: 14.8px; color: var(--msg-text); box-shadow: var(--shadow-light); transition: background-color var(--transition-medium), color var(--transition-medium), box-shadow var(--transition-medium), transform 0.1s ease; }
         .message.highlight { /* For copy/regen feedback */ transform: scale(1.01); box-shadow: var(--shadow-medium); }
        .user-message { background-color: var(--user-msg-bg); border-bottom-left-radius: var(--border-radius-small); }
        .ai-message { background-color: var(--ai-msg-bg); border: 1px solid var(--border-color); border-bottom-right-radius: var(--border-radius-small); box-shadow: none; }
        body.dark-mode .ai-message { border: none; }

        /* Message Tail */
        .message::before { content: ''; position: absolute; bottom: 0px; width: 8px; height: 12px; transition: border-color var(--transition-medium); }
        .user-message::before { left: -8px; border-bottom-right-radius: 8px; background: radial-gradient(circle at 0 100%, transparent 8px, var(--user-msg-bg) 8.5px); }
        .ai-message::before { right: -8px; border-bottom-left-radius: 8px; background: radial-gradient(circle at 100% 100%, transparent 8px, var(--ai-msg-bg) 8.5px); }
        body.dark-mode .ai-message::before { background: radial-gradient(circle at 100% 100%, transparent 8px, var(--ai-msg-bg) 8.5px); }

        .message-content { padding-bottom: 18px; min-height: 1.5em; }
        .ai-message.typing-cursor .message-content::after { content: ''; } /* Hide blinking cursor, use dots instead */

        .message-footer { position: absolute; bottom: 5px; font-size: 11px; /* Smaller timestamp */ color: var(--timestamp-color); opacity: 0.9; display: flex; align-items: center; gap: 6px; user-select: none; }
        .user-message .message-footer { left: 10px; }
        .ai-message .message-footer { right: 10px; flex-direction: row-reverse; }
        .model-indicator { font-weight: 500; color: var(--model-indicator-color); }
        .user-message .model-indicator { display: none; }
        .timestamp { white-space: nowrap; }

        /* Message Actions (Ellipsis Button) */
        .message-actions-trigger { position: absolute; top: 4px; background: none; border: none; padding: 4px; cursor: pointer; border-radius: var(--border-radius-round); display: flex; align-items: center; justify-content: center; opacity: 0; visibility: hidden; transition: opacity var(--transition-fast), visibility var(--transition-fast), background-color var(--transition-fast); z-index: 1; }
        .message-wrapper:hover .message-actions-trigger { opacity: 0.8; visibility: visible; }
        .message-actions-trigger:hover { opacity: 1; background-color: var(--msg-action-icon-hover-bg); }
        .message-actions-trigger svg { width: 18px; height: 18px; fill: var(--msg-action-icon-fill); }
        .user-message-wrapper .message-actions-trigger { left: 6px; }
        .ai-message-wrapper .message-actions-trigger { right: 6px; }

        /* Message Actions Menu (Popover) */
        .message-actions-menu { position: absolute; background-color: var(--popover-bg); color: var(--msg-text); border: 1px solid var(--popover-border); border-radius: var(--border-radius-medium); box-shadow: var(--popover-shadow); padding: 5px; z-index: 50; min-width: 120px; opacity: 0; transform: scale(0.95); transition: opacity 0.15s var(--bezier-smooth), transform 0.15s var(--bezier-smooth); pointer-events: none; display: flex; flex-direction: column; }
        .message-actions-menu.visible { opacity: 1; transform: scale(1); pointer-events: auto; }
        .message-actions-menu button { background: none; border: none; color: var(--msg-text); padding: 7px 12px; text-align: right; border-radius: var(--border-radius-small); cursor: pointer; display: flex; align-items: center; gap: 8px; font-size: 14px; transition: background-color var(--transition-fast); width: 100%; }
        .message-actions-menu button:hover { background-color: var(--menu-item-hover-bg); }
        .message-actions-menu button svg { width: 16px; height: 16px; fill: currentColor; flex-shrink: 0; }
        .message-actions-menu button.copied svg { fill: var(--button-bg); }

        /* Code Blocks */
        .message-content pre { background-color: var(--code-bg); color: var(--code-text); padding: 12px 16px; border-radius: var(--border-radius-medium); overflow-x: auto; font-family: var(--font-code); font-size: 13.5px; margin: 8px 0; direction: ltr; text-align: left; white-space: pre; border: 1px solid var(--code-border); position: relative; }
        .message-content pre .copy-code-button { position: absolute; top: 6px; right: 6px; background-color: var(--code-copy-btn-bg); color: var(--msg-text); border: none; border-radius: var(--border-radius-small); padding: 3px 6px; font-size: 11px; font-family: var(--font-main); cursor: pointer; opacity: 0; visibility: hidden; transition: opacity var(--transition-fast), visibility var(--transition-fast), background-color var(--transition-fast); z-index: 2; backdrop-filter: blur(2px); }
        .message-content pre:hover .copy-code-button { opacity: 0.8; visibility: visible; }
        .message-content pre .copy-code-button:hover { opacity: 1; background-color: var(--code-copy-btn-hover-bg); }
        .message-content pre .copy-code-button.copied { background-color: var(--code-copy-btn-copied-bg); color: var(--code-copy-btn-copied-text); opacity: 1; }
        .message-content code:not(pre > code) { background-color: var(--code-bg); color: var(--code-text); padding: 0.15em 0.4em; margin: 0 0.1em; font-size: 88%; border-radius: var(--border-radius-small); font-family: var(--font-code); direction: ltr; text-align: left; border: 1px solid var(--code-border); }

        /* --- Input Area --- */
        #chat-input-area { display: flex; align-items: flex-end; padding: 8px 12px; border-top: 1px solid var(--border-color); background-color: var(--input-area-bg); flex-shrink: 0; transition: background-color var(--transition-medium), border-color var(--transition-medium); gap: 8px; border-bottom-left-radius: var(--border-radius-medium); border-bottom-right-radius: var(--border-radius-medium); }
        .input-wrapper { flex-grow: 1; position: relative; display: flex; align-items: center; } /* Wrapper for textarea + clear button */
        #user-input { flex-grow: 1; padding: 10px 40px 10px 16px; /* Space for clear button */ border: 1px solid var(--input-border); border-radius: var(--border-radius-large); font-size: 15px; background-color: var(--input-bg); color: var(--input-text); outline: none; transition: background-color var(--transition-medium), color var(--transition-medium), box-shadow var(--transition-medium), height var(--transition-fast), border-color var(--transition-fast); resize: none; overflow-y: hidden; min-height: 44px; /* Slightly taller */ max-height: 150px; line-height: 1.45; box-sizing: border-box; box-shadow: none; }
        #user-input:focus { border-color: var(--input-border-focus); box-shadow: var(--input-shadow-focus); }
        #clear-input-button { position: absolute; left: 8px; /* Adjusted for RTL */ top: 50%; transform: translateY(-50%); background: none; border: none; padding: 5px; cursor: pointer; border-radius: var(--border-radius-round); display: none; /* Hidden initially */ align-items: center; justify-content: center; z-index: 2; }
        #clear-input-button.visible { display: flex; }
        #clear-input-button svg { width: 18px; height: 18px; fill: var(--timestamp-color); }
        #clear-input-button:hover svg { fill: var(--msg-text); }

        #send-button { width: 44px; height: 44px; padding: 0; background-color: var(--button-bg); border: none; border-radius: var(--border-radius-round); cursor: pointer; font-size: 0; display: flex; justify-content: center; align-items: center; transition: background-color var(--transition-fast), transform 0.2s var(--bezier-smooth), opacity var(--transition-fast); flex-shrink: 0; align-self: flex-end; }
        #send-button:hover { transform: scale(1.05); background-color: var(--button-hover-bg); }
        #send-button:active { transform: scale(0.95); background-color: var(--button-active-bg); }
        #send-button::before { content: ''; display: block; width: 22px; height: 22px; background-color: var(--button-icon-fill); mask-image: url('data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"%3E%3Cpath d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"/%3E%3C/svg%3E'); mask-size: contain; mask-repeat: no-repeat; mask-position: center; -webkit-mask-image: url('data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"%3E%3Cpath d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"/%3E%3C/svg%3E'); -webkit-mask-size: contain; -webkit-mask-repeat: no-repeat; -webkit-mask-position: center; transition: background-color var(--transition-medium); }
        #send-button:disabled { opacity: 0.5; cursor: not-allowed; background-color: color-mix(in srgb, var(--button-bg) 50%, var(--input-area-bg)); transform: scale(1); }

        /* --- Loading Indicator (Pulsing Dots) --- */
        .typing-indicator .message-content { color: var(--timestamp-color); padding-bottom: 5px; display: flex; align-items: center; }
        .loading-dots { display: flex; align-items: center; padding: 8px 0; }
        .loading-dots span { display: inline-block; width: 6px; height: 6px; margin: 0 2px; background-color: var(--loading-dot-color); border-radius: 50%; animation: loading-pulse 1.4s infinite ease-in-out both; }
        .loading-dots span:nth-child(1) { animation-delay: -0.32s; }
        .loading-dots span:nth-child(2) { animation-delay: -0.16s; }
        .loading-dots span:nth-child(3) { animation-delay: 0s; }
        @keyframes loading-pulse { 0%, 80%, 100% { transform: scale(0.6); opacity: 0.5; } 40% { transform: scale(1.0); opacity: 1; } }
        #stop-generation-button { background: none; border: none; padding: 0; margin: 0 5px 0 auto; /* Push right */ cursor: pointer; display: flex; align-items: center; justify-content: center; width: 22px; height: 22px; border-radius: var(--border-radius-round); transition: background-color var(--transition-fast), transform var(--transition-fast); }
        #stop-generation-button svg { width: 16px; height: 16px; fill: var(--msg-action-icon-fill); transition: fill var(--transition-fast); }
        #stop-generation-button:hover { background-color: var(--msg-action-icon-hover-bg); }
        #stop-generation-button:hover svg { fill: var(--msg-action-icon-hover-fill); }
        #stop-generation-button:active { transform: scale(0.9); }


        /* --- Custom Dialog --- */
        .dialog-overlay { position: fixed; inset: 0; background-color: var(--dialog-overlay-bg); display: flex; align-items: center; justify-content: center; z-index: 1000; opacity: 0; transition: opacity 0.2s ease-out; pointer-events: none; }
        .dialog-overlay.visible { opacity: 1; pointer-events: auto; }
        .dialog-box { background-color: var(--dialog-bg); color: var(--dialog-text); padding: 20px 25px; border-radius: var(--border-radius-medium); box-shadow: var(--dialog-shadow); max-width: 400px; width: calc(100% - 40px); transform: scale(0.95); transition: transform 0.2s ease-out; }
        .dialog-overlay.visible .dialog-box { transform: scale(1); }
        .dialog-box h3 { margin: 0 0 15px; font-size: 18px; font-weight: 600; }
        .dialog-box p { margin: 0 0 20px; font-size: 15px; line-height: 1.6; }
        .dialog-buttons { display: flex; justify-content: flex-start; /* Buttons on the left in RTL */ gap: 10px; }
        .dialog-buttons button { padding: 8px 16px; border-radius: var(--border-radius-medium); border: none; font-size: 14px; font-weight: 500; cursor: pointer; transition: background-color var(--transition-fast), transform var(--transition-fast); }
        .dialog-buttons button:active { transform: scale(0.97); }
        .dialog-confirm-button { background-color: var(--dialog-button-bg); color: var(--dialog-button-text); }
        .dialog-confirm-button.danger { background-color: var(--counter-bg); }
        .dialog-cancel-button { background-color: var(--dialog-cancel-button-bg); color: var(--dialog-cancel-button-text); }

    </style>
</head>
<body>

<div id="chat-container" aria-live="polite"> <!-- Add aria-live -->
    <div id="chat-header">
        <div class="header-avatar" id="header-avatar-ai" aria-hidden="true">AI</div> <!-- Initials based -->
        <h1 id="chat-title">צ'אט AI</h1>
        <div class="header-controls-trigger">
            <button class="icon-button" id="settings-button" title="הגדרות" aria-label="הגדרות ופעולות נוספות" aria-haspopup="true" aria-controls="settings-popover" aria-expanded="false">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M19.43 12.98c.04-.32.07-.64.07-.98s-.03-.66-.07-.98l2.11-1.65c.19-.15.24-.42.12-.64l-2-3.46c-.12-.22-.39-.3-.61-.22l-2.49 1c-.52-.4-1.08-.73-1.69-.98l-.38-2.65C14.46 2.18 14.25 2 14 2h-4c-.25 0-.46.18-.49.42l-.38 2.65c-.61.25-1.17.59-1.69.98l-2.49-1c-.23-.08-.49 0-.61.22l-2 3.46c-.13.22-.07.49.12.64l2.11 1.65c-.04.32-.07.65-.07.98s.03.66.07.98l-2.11 1.65c-.19.15-.24.42-.12.64l2 3.46c.12.22.39.3.61.22l2.49-1c.52.4 1.08.73 1.69.98l.38 2.65c.03.24.24.42.49.42h4c.25 0 .46-.18.49-.42l.38-2.65c.61-.25 1.17-.59 1.69-.98l2.49 1c.23.08.49 0 .61-.22l2-3.46c.12-.22.07-.49-.12-.64l-2.11-1.65zM12 15.5c-1.93 0-3.5-1.57-3.5-3.5s1.57-3.5 3.5-3.5 3.5 1.57 3.5 3.5-1.57 3.5-3.5 3.5z"/></svg>
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
             <div class="popover-checkbox" role="menuitemcheckbox" aria-checked="false">
                <input type="checkbox" id="send-on-enter-checkbox">
                <label for="send-on-enter-checkbox">שלח הודעה בלחיצת Enter</label>
            </div>
             <div class="popover-actions">
                 <button id="dark-mode-toggle" role="menuitem">
                     <svg id="theme-icon-placeholder" width="18" height="18" viewBox="0 0 24 24"> <!-- Placeholder --> </svg>
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
    <div id="chat-output">
        <div id="chat-output-inner"> <!-- Inner div for padding and message gap -->
            <div class="message-wrapper ai-message-wrapper initial-message" data-message-id="initial-0">
                 <div class="avatar" aria-hidden="true">AI</div>
                 <div class="message ai-message">
                     <div class="message-content"><span>שלום! בחר מודל וסגנון שיחה בהגדרות (⚙️) והתחל לשוחח.</span></div>
                     <div class="message-footer"><span class="timestamp" data-timestamp-abs="${new Date().toISOString()}">התחל</span></div>
                 </div>
             </div>
         </div>
         <!-- Unread Marker (Initially Hidden) -->
         <div class="unread-marker" id="unread-marker" aria-live="polite"><span>הודעות חדשות</span></div>

         <button id="scroll-to-bottom" title="גלול לתחתית" aria-label="גלול לתחתית">
             <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M7.41 8.59L12 13.17l4.59-4.58L18 10l-6 6-6-6 1.41-1.41z"/><path fill="none" d="M0 0h24v24H0V0z"/></svg>
             <span id="new-message-counter">0</span>
         </button>
    </div>
    <div id="chat-input-area">
        <div class="input-wrapper">
            <textarea id="user-input" placeholder="הקלד/י הודעה..." rows="1" aria-label="הודעת משתמש"></textarea>
            <button id="clear-input-button" title="נקה קלט" aria-label="נקה קלט" style="display: none;">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"></path></svg>
            </button>
        </div>
        <button id="send-button" aria-label="שלח"></button>
    </div>

    <!-- Message Actions Menu Template (Hidden) -->
    <div id="message-actions-menu-template" style="display: none;">
        <div class="message-actions-menu" role="menu">
            <button class="action-copy" role="menuitem">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M16 1H4c-1.1 0-2 .9-2 2v14h2V3h12V1zm3 4H8c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h11c1.1 0 2-.9 2-2V7c0-1.1-.9-2-2-2zm0 16H8V7h11v14z"/></svg>
                <span>העתק</span>
            </button>
            <button class="action-regenerate" role="menuitem" style="display: none;">
                 <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M17.65 6.35C16.2 4.9 14.21 4 12 4c-4.42 0-7.99 3.58-7.99 8s3.57 8 7.99 8c3.73 0 6.84-2.55 7.73-6h-2.08c-.82 2.33-3.04 4-5.65 4-3.31 0-6-2.69-6-6s2.69-6 6-6c1.66 0 3.14.69 4.22 1.78L13 11h7V4l-2.35 2.35z"/></svg>
                <span>צור מחדש</span>
            </button>
        </div>
    </div>

     <!-- Custom Dialog Template (Hidden) -->
     <div id="custom-dialog-template" style="display: none;">
         <div class="dialog-overlay" role="dialog" aria-modal="true">
             <div class="dialog-box">
                 <h3 class="dialog-title">כותרת</h3>
                 <p class="dialog-message">הודעה</p>
                 <div class="dialog-buttons">
                     <button class="dialog-confirm-button">אישור</button>
                     <button class="dialog-cancel-button">ביטול</button>
                 </div>
             </div>
         </div>
     </div>

</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // --- Element References ---
        const chatContainer = document.getElementById('chat-container');
        const chatOutput = document.getElementById('chat-output');
        const chatOutputInner = document.getElementById('chat-output-inner');
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
        const chatTitle = document.getElementById('chat-title'); // Reference chat title

        // --- State Variables ---
        const BASE_API_URL = 'https://php-render-test.onrender.com/';
        let messageCounterId = 0;
        let currentAbortController = null;
        let typingTimeout = null;
        let activeMessageMenu = null;
        let newMessagesCount = 0;
        let isScrolledToBottom = true;
        let lastMessageId = null; // Track the last added message ID
        let unreadMarkerVisible = false;
        let lastUnreadMarkerPosition = null; // Track where the marker was last inserted
        let sendOnEnter = false; // Default: Shift+Enter for newline
        let userInteracted = false; // Track if user has interacted (scrolled, etc.)
        let originalDocumentTitle = document.title; // Store original title
        const TYPING_SPEED = 20; // Typing speed
        const SCROLL_THRESHOLD = 200; // Increased threshold
        const DEBOUNCE_DELAY = 150; // Debounce for scroll events

        // --- Utility Functions ---
        function debounce(func, wait) {
            let timeout;
            return function executedFunction(...args) {
                const later = () => {
                    clearTimeout(timeout);
                    func(...args);
                };
                clearTimeout(timeout);
                timeout = setTimeout(later, wait);
            };
        }

        function getCurrentTimestamp(iso = false) {
            const now = new Date();
            if (iso) return now.toISOString();
            const hours = now.getHours().toString().padStart(2, '0');
            const minutes = now.getMinutes().toString().padStart(2, '0');
            return `${hours}:${minutes}`;
        }

         function formatTimestamp(isoTimestamp) {
             if (!isoTimestamp || isoTimestamp === 'התחל') return isoTimestamp; // Handle initial message

             const messageDate = new Date(isoTimestamp);
             const now = new Date();
             const isToday = messageDate.toDateString() === now.toDateString();
             const yesterday = new Date(now);
             yesterday.setDate(now.getDate() - 1);
             const isYesterday = messageDate.toDateString() === yesterday.toDateString();

             const timeFormat = { hour: '2-digit', minute: '2-digit', hour12: false };
             const dateFormat = { day: '2-digit', month: '2-digit', year: 'numeric' };

             const timeStr = messageDate.toLocaleTimeString('he-IL', timeFormat);

             if (isToday) {
                 return timeStr; // Only time for today
             } else if (isYesterday) {
                 return `אתמול ${timeStr}`;
             } else {
                 // Format as DD/MM/YYYY HH:MM for older dates
                 return `${messageDate.toLocaleDateString('he-IL', dateFormat)} ${timeStr}`;
             }
         }


        function generateMessageId() { return `msg-${Date.now()}-${messageCounterId++}`; }

        function smoothScrollToBottom() {
            if (!userInteracted || isScrolledToBottom) { // Auto-scroll only if user hasn't interacted significantly
                 chatOutput.scrollTo({ top: chatOutput.scrollHeight, behavior: 'smooth' });
            }
            resetNewMessageCounter();
        }

        function instantScrollToBottom() {
            chatOutput.scrollTop = chatOutput.scrollHeight;
            resetNewMessageCounter();
        }

        const debouncedUpdateScrollState = debounce(() => {
             const scrollBottom = chatOutput.scrollHeight - chatOutput.scrollTop - chatOutput.clientHeight;
             const previouslyScrolledToBottom = isScrolledToBottom;
             isScrolledToBottom = scrollBottom < 5;
             const showScrollButton = scrollBottom > SCROLL_THRESHOLD;

             scrollToBottomButton.classList.toggle('visible', showScrollButton || newMessagesCount > 0); // Keep visible if new messages

             // If user scrolls back to bottom manually
             if (isScrolledToBottom && !previouslyScrolledToBottom) {
                 resetNewMessageCounter();
                 hideUnreadMarker();
                 userInteracted = false; // Reset interaction flag when user scrolls down
                 updateDocumentTitle(); // Reset title
             } else if (!isScrolledToBottom && previouslyScrolledToBottom) {
                 userInteracted = true; // User scrolled up
             }

        }, DEBOUNCE_DELAY);


        function incrementNewMessageCounter() {
            if (!isScrolledToBottom) {
                newMessagesCount++;
                newMessageCounter.textContent = newMessagesCount > 9 ? '9+' : newMessagesCount;
                scrollToBottomButton.classList.add('has-new');
                if (!scrollToBottomButton.classList.contains('visible')) {
                    scrollToBottomButton.classList.add('visible');
                }
                if (!unreadMarkerVisible) {
                    showUnreadMarker();
                }
                updateDocumentTitle(newMessagesCount); // Update title with count
            }
        }

        function resetNewMessageCounter() {
            newMessagesCount = 0;
            newMessageCounter.textContent = '0';
            scrollToBottomButton.classList.remove('has-new');
            hideUnreadMarker(); // Hide marker when counter resets
             // Keep button visibility based on scroll position only
             const scrollBottom = chatOutput.scrollHeight - chatOutput.scrollTop - chatOutput.clientHeight;
             scrollToBottomButton.classList.toggle('visible', scrollBottom > SCROLL_THRESHOLD);
             updateDocumentTitle(); // Reset title
        }

        function showUnreadMarker() {
            if (unreadMarkerVisible || !lastMessageId || isScrolledToBottom) return;

            const lastMessageElement = chatOutputInner.querySelector(`.message-wrapper[data-message-id="${lastMessageId}"]`);
            if (lastMessageElement) {
                // Remove existing marker first
                 hideUnreadMarker(false); // Don't set flag yet

                 // Insert marker before the last visible message when scrolled up
                chatOutputInner.insertBefore(unreadMarker, lastMessageElement.nextSibling); // Insert *after* the last message that was visible
                requestAnimationFrame(() => { // Ensure DOM update before showing
                    unreadMarker.classList.add('visible');
                    unreadMarkerVisible = true;
                    lastUnreadMarkerPosition = lastMessageElement.nextSibling; // Store position reference
                });
            }
        }

        function hideUnreadMarker(setFlag = true) {
             unreadMarker.classList.remove('visible');
             // Optionally remove from DOM after transition? For now, just hide.
             if (setFlag) {
                unreadMarkerVisible = false;
                lastUnreadMarkerPosition = null;
             }
        }

        function updateDocumentTitle(count = 0) {
             if (!document.hidden) { // Only update if tab is not active
                document.title = originalDocumentTitle; // Reset if tab becomes active
                return;
             }
             if (count > 0) {
                 document.title = `(${count}) ${originalDocumentTitle}`;
             } else {
                 document.title = originalDocumentTitle;
             }
        }
         document.addEventListener('visibilitychange', () => {
            if (!document.hidden) {
                updateDocumentTitle(); // Reset title when tab becomes visible
            }
        });


        // --- Settings Popover Logic ---
        function toggleSettingsPopover(show) {
             const currentlyVisible = settingsPopover.classList.contains('visible');
             if (show === currentlyVisible) return; // No change needed

             if (show) {
                 settingsPopover.setAttribute('aria-hidden', 'false');
                 settingsButton.setAttribute('aria-expanded', 'true');
                 settingsPopover.classList.add('visible');
                 closeMessageActionMenu(); // Close other menus
                  // Focus the first focusable element inside the popover
                  const firstFocusable = settingsPopover.querySelector('select, input, button');
                  if (firstFocusable) firstFocusable.focus();
             } else {
                 settingsPopover.setAttribute('aria-hidden', 'true');
                 settingsButton.setAttribute('aria-expanded', 'false');
                 settingsPopover.classList.remove('visible');
                 // Optionally return focus to the settings button
                 // settingsButton.focus();
             }
         }
        // ... (listeners for settings button and body click remain similar) ...


        // --- Message Actions Menu Logic ---
        function openMessageActionMenu(triggerButton, messageElement) {
            closeMessageActionMenu(); // Close any existing menu

            const menuNode = messageActionsMenuTemplate.firstElementChild.cloneNode(true);
            menuNode.dataset.targetMessageId = messageElement.closest('.message-wrapper').dataset.messageId; // ID from wrapper
            menuNode.setAttribute('aria-labelledby', triggerButton.id || `trigger-${messageElement.closest('.message-wrapper').dataset.messageId}`); // Accessibility
            triggerButton.setAttribute('aria-expanded', 'true'); // Mark trigger as expanded

            const isAiMsg = messageElement.classList.contains('ai-message');
            const regenerateButton = menuNode.querySelector('.action-regenerate');
            if (isAiMsg && messageElement.dataset.userQuery && messageElement.dataset.modelValue) {
                regenerateButton.style.display = 'flex';
            } else {
                regenerateButton.style.display = 'none';
            }

            chatContainer.appendChild(menuNode);
            activeMessageMenu = menuNode;

            // Positioning (remains similar, ensure it works with wrapper/message structure)
             const triggerRect = triggerButton.getBoundingClientRect();
             const containerRect = chatContainer.getBoundingClientRect();
             const menuRect = menuNode.getBoundingClientRect();
             let top = triggerRect.bottom - containerRect.top + 5;
             let left = triggerRect.left - containerRect.left;
             if (left + menuRect.width > containerRect.width - 10) { left = triggerRect.right - containerRect.left - menuRect.width; }
             if (top + menuRect.height > containerRect.height - 10) { top = triggerRect.top - containerRect.top - menuRect.height - 5; }
             left = Math.max(10, left); top = Math.max(10, top);
             menuNode.style.top = `${top}px`; menuNode.style.left = `${left}px`;

            menuNode.querySelector('.action-copy').addEventListener('click', handleCopyClick);
            if (regenerateButton.style.display !== 'none') {
                 regenerateButton.addEventListener('click', handleRegenerateClick);
            }

            requestAnimationFrame(() => { menuNode.classList.add('visible'); });
              // Focus the first item in the menu
              const firstMenuItem = menuNode.querySelector('button');
              if (firstMenuItem) firstMenuItem.focus();
        }

        function closeMessageActionMenu() {
            if (activeMessageMenu) {
                const triggerId = activeMessageMenu.getAttribute('aria-labelledby');
                const triggerButton = document.getElementById(triggerId);
                if (triggerButton) {
                    triggerButton.setAttribute('aria-expanded', 'false');
                    // Optionally return focus to the trigger button
                    // triggerButton.focus();
                }
                activeMessageMenu.remove();
                activeMessageMenu = null;
            }
        }

         // Close menus on Escape key
         document.addEventListener('keydown', (e) => {
             if (e.key === 'Escape') {
                 if (activeMessageMenu) {
                     closeMessageActionMenu();
                 } else if (settingsPopover.classList.contains('visible')) {
                     toggleSettingsPopover(false);
                 }
             }
         });


        // --- Get Chat History Function (Unchanged) ---
         function getChatHistory(currentUserMessage, forRegeneration = false, regenerationTargetMsgId = null) {
             const history = [];
             const messages = chatOutputInner.querySelectorAll('.message-wrapper:not(.initial-message)');
             messages.forEach((msgWrapper) => {
                 const messageDiv = msgWrapper.querySelector('.message');
                 if (!messageDiv) return;
                 const sender = messageDiv.classList.contains('user-message') ? 'user' : 'ai';
                 const messageId = msgWrapper.dataset.messageId;
                 if (forRegeneration && messageId === regenerationTargetMsgId && sender === 'ai') return;
                 const contentElement = messageDiv.querySelector('.message-content');
                 let content = contentElement?.textContent || contentElement?.innerText || '';
                 content = content.trim();
                 if (content) {
                     const role = sender === 'user' ? 'user' : 'model';
                     history.push({ role: role, content: content });
                 }
             });
             return history;
         }

         // --- Generate Avatar Initials ---
          function generateAvatarContent(name) {
             if (!name || name.length === 0) return '?';
             const words = name.split(' ');
             if (words.length > 1) {
                 return (words[0][0] + words[1][0]).toUpperCase();
             }
             return name[0].toUpperCase();
         }

         // --- Random Color for AI Avatar ---
          function getRandomColor(seed) { // Simple seeded random color
              let hash = 0;
              for (let i = 0; i < seed.length; i++) {
                  hash = seed.charCodeAt(i) + ((hash << 5) - hash);
              }
              const color = (hash & 0x00FFFFFF).toString(16).toUpperCase();
              return "#" + "00000".substring(0, 6 - color.length) + color;
          }


        // --- Add Message to Chat Function (Updated V4) ---
        function addMessageToChat(text, sender, options = {}) {
            const { isLoading = false, timestamp: isoTimestampInput = null, modelNameUsed = null, userQuery = null, modelValue = null } = options;

            const messageId = generateMessageId();
            lastMessageId = messageId; // Track the last added message
            const messageWrapper = document.createElement('div');
            messageWrapper.classList.add('message-wrapper', sender === 'user' ? 'user-message-wrapper' : 'ai-message-wrapper');
            if (isoTimestampInput === 'התחל') messageWrapper.classList.add('initial-message');
            messageWrapper.dataset.messageId = messageId;

            const avatarDiv = document.createElement('div');
            avatarDiv.classList.add('avatar');
            avatarDiv.setAttribute('aria-hidden', 'true');
            if (sender === 'user') {
                avatarDiv.textContent = generateAvatarContent("User"); // Or use logged-in user name
                avatarDiv.style.backgroundColor = 'var(--button-bg)'; // Consistent user color
            } else {
                 const aiName = modelNameUsed || 'AI';
                 avatarDiv.textContent = generateAvatarContent(aiName);
                 avatarDiv.style.backgroundColor = getRandomColor(aiName); // Color based on AI name
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
                if (stopButton) {
                    stopButton.addEventListener('click', stopTypingAndGeneration);
                }
            } else {
                 // Improved Link Detection (Basic)
                 if (text) {
                     contentDiv.innerHTML = text
                         .replace(/</g, "<").replace(/>/g, ">") // Basic HTML escaping
                         .replace(/(https?:\/\/[^\s<>"']+)/g, '<a href="$1" target="_blank" rel="noopener noreferrer">$1</a>'); // Detect links
                 } else {
                     contentDiv.textContent = " ";
                 }

                messageDiv.appendChild(contentDiv);

                // Footer (Timestamp & Model)
                 const footerDiv = document.createElement('div');
                 footerDiv.classList.add('message-footer');
                 const isoTimestamp = isoTimestampInput === 'התחל' ? 'התחל' : (isoTimestampInput || getCurrentTimestamp(true));
                 const displayTimestamp = formatTimestamp(isoTimestamp);
                 messageDiv.dataset.timestampAbs = isoTimestamp; // Store ISO timestamp

                 if (sender === 'ai' && modelNameUsed && isoTimestamp !== 'התחל') {
                     const modelSpan = document.createElement('span');
                     modelSpan.classList.add('model-indicator');
                     modelSpan.textContent = `(${modelNameUsed})`;
                     footerDiv.appendChild(modelSpan);
                 }
                 const timestampSpan = document.createElement('span');
                 timestampSpan.classList.add('timestamp');
                 timestampSpan.textContent = displayTimestamp;
                 timestampSpan.title = isoTimestamp !== 'התחל' ? new Date(isoTimestamp).toLocaleString('he-IL') : 'התחלה'; // Full date on hover
                 footerDiv.appendChild(timestampSpan);
                 messageDiv.appendChild(footerDiv);

                // Add Ellipsis Trigger Button
                 const triggerId = `trigger-${messageId}`;
                 const actionsTrigger = document.createElement('button');
                 actionsTrigger.id = triggerId;
                 actionsTrigger.classList.add('message-actions-trigger');
                 actionsTrigger.title = "פעולות נוספות";
                 actionsTrigger.setAttribute('aria-label', "פעולות נוספות");
                 actionsTrigger.setAttribute('aria-haspopup', 'true');
                 actionsTrigger.setAttribute('aria-controls', `menu-${messageId}`); // Link to potential menu ID
                 actionsTrigger.setAttribute('aria-expanded', 'false');
                 actionsTrigger.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 8c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm0 2c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/></svg>';
                 actionsTrigger.addEventListener('click', (e) => {
                     e.stopPropagation();
                     openMessageActionMenu(actionsTrigger, messageDiv);
                 });
                 messageDiv.appendChild(actionsTrigger);

                 contentDiv.querySelectorAll('pre').forEach(addCopyButtonToCodeBlock);
            }

             // Assemble the wrapper (Avatar + Message)
             if (sender === 'user') { messageWrapper.appendChild(messageDiv); messageWrapper.appendChild(avatarDiv); }
             else { messageWrapper.appendChild(avatarDiv); messageWrapper.appendChild(messageDiv); }

            // Append & Scroll Logic
            const shouldScroll = isScrolledToBottom || isLoading;
            let markerInserted = false;

             // If scrolled up and marker isn't visible yet, show it *before* adding the new message
             if (!isScrolledToBottom && !unreadMarkerVisible && !isLoading && isoTimestampInput !== 'התחל') {
                 showUnreadMarker();
                 markerInserted = true; // Flag that marker was potentially inserted
             }

             // Append the new message
            chatOutputInner.appendChild(messageWrapper);

            // Handle scrolling after message is added
             if (shouldScroll) {
                 if (isLoading) instantScrollToBottom();
                 else setTimeout(smoothScrollToBottom, 60); // Slightly longer delay for smoother feel
             } else if (!isLoading && !markerInserted) { // Only increment if marker wasn't just inserted
                 incrementNewMessageCounter();
             }


            return messageDiv;
        }


        // --- AI Typing Effect Function (Using Text Content) ---
        function typeAiResponse(messageElement, fullText) {
            const contentDiv = messageElement.querySelector('.message-content');
            if (!contentDiv) { console.error("Content div not found for typing"); return; }

            contentDiv.textContent = ''; // Clear
            messageElement.classList.add('typing-cursor'); // You might re-enable the CSS for this if preferred over dots
            let currentIndex = 0;
            clearTimeout(typingTimeout);

            function typeCharacter() {
                if (currentIndex < fullText.length) {
                    contentDiv.textContent += fullText[currentIndex];
                    currentIndex++;
                    // Continuous scroll if user is near bottom
                    if (chatOutput.scrollHeight - chatOutput.scrollTop - chatOutput.clientHeight < SCROLL_THRESHOLD * 1.5) {
                        chatOutput.scrollTop = chatOutput.scrollHeight;
                    }
                    typingTimeout = setTimeout(typeCharacter, TYPING_SPEED);
                } else {
                    finalizeAiMessage(messageElement, contentDiv);
                }
            }
            typeCharacter();
        }


        // --- Finalize AI Message ---
        function finalizeAiMessage(messageElement, contentDiv) {
            clearTimeout(typingTimeout); typingTimeout = null;
            if (messageElement) {
                messageElement.classList.remove('typing-cursor');
                 // Re-render content to handle links/code after typing (if needed)
                const currentText = contentDiv.textContent;
                contentDiv.innerHTML = currentText
                    .replace(/</g, "<").replace(/>/g, ">")
                    .replace(/(https?:\/\/[^\s<>"']+)/g, '<a href="$1" target="_blank" rel="noopener noreferrer">$1</a>');
                contentDiv.querySelectorAll('pre').forEach(addCopyButtonToCodeBlock);
            }
            // Smooth scroll if user was near bottom when typing finished
            if (isScrolledToBottom) {
                setTimeout(smoothScrollToBottom, 100);
            }

            // Re-enable input if no other process is running
            if (!document.querySelector('.typing-indicator') && !typingTimeout) {
                userInput.disabled = false; sendButton.disabled = false; userInput.style.opacity = '1';
                // Return focus to input unless a menu/dialog is open
                if (!activeMessageMenu && !settingsPopover.classList.contains('visible') && !document.querySelector('.dialog-overlay.visible')) {
                    userInput.focus();
                }
            }
        }


        // --- Stop Typing and Fetch Request ---
        function stopTypingAndGeneration() {
            console.log('Stopping generation...');
            clearTimeout(typingTimeout); typingTimeout = null;

            const typingIndicatorWrapper = chatOutputInner.querySelector('.typing-indicator')?.closest('.message-wrapper');
            if (typingIndicatorWrapper) typingIndicatorWrapper.remove();

            const typingCursorMsg = chatOutputInner.querySelector('.typing-cursor');
            if(typingCursorMsg) { finalizeAiMessage(typingCursorMsg, typingCursorMsg.querySelector('.message-content')); }

            if (currentAbortController) { currentAbortController.abort(); currentAbortController = null; console.log('Fetch request aborted.'); }
            else { console.log('No active fetch request to abort.'); }

             // Always re-enable input after stopping, if nothing else is loading
             if (!document.querySelector('.typing-indicator')) {
                 userInput.disabled = false; sendButton.disabled = false; userInput.style.opacity = '1'; userInput.focus();
             }
        }


        // --- Add Copy Button to Code Blocks (Unchanged) ---
        function addCopyButtonToCodeBlock(preElement) { /* ... same as before ... */ }


        // --- Send Message Function (Updated V4) ---
        async function sendMessage(textToSend, options = {}, skipResponse = false) {
             const { isRegeneration = false, originalAiMsgId = null, modelValueOverride = null, modelNameOverride = null } = options;
             const currentText = textToSend !== undefined ? textToSend.trim() : userInput.value.trim();

             if (currentText === '' || document.querySelector('.typing-indicator')) return;

             closeMessageActionMenu(); toggleSettingsPopover(false); // Close menus

             const selectedStyleInstruction = styleSelect.value.trim();
             userInput.disabled = true; sendButton.disabled = true; userInput.style.opacity = '0.7';
             clearInputButton.style.display = 'none'; // Hide clear button while sending

             const originalAiMsgWrapper = originalAiMsgId ? chatOutputInner.querySelector(`.message-wrapper[data-message-id="${originalAiMsgId}"]`) : null;

             if (!isRegeneration) {
                 addMessageToChat(currentText, 'user', { timestamp: getCurrentTimestamp(true) });
                 userInput.value = ''; adjustTextareaHeight();
             } else if (originalAiMsgWrapper) {
                 originalAiMsgWrapper.remove(); // Remove the whole wrapper
             }

             if (skipResponse && !isRegeneration) { /* ... same as before ... */ return; }

             const historyArray = getChatHistory(null, isRegeneration, originalAiMsgId);
             let historyStringPart = ""; historyArray.forEach(message => { historyStringPart += `[ROLE=${message.role}] ${message.content}\n`; }); historyStringPart = historyStringPart.trim();
             let combinedStructuredText = "";
             if (selectedStyleInstruction) { combinedStructuredText += `[SYSTEM_STYLE_INSTRUCTION_START]\n${selectedStyleInstruction}\n[SYSTEM_STYLE_INSTRUCTION_END]\n`; }
             combinedStructuredText += `[USER_INPUT_START]\n${currentText}\n[USER_INPUT_END]\n`;
             if (historyStringPart) { combinedStructuredText += `[CHAT_HISTORY_START]\n${historyStringPart}\n[CHAT_HISTORY_END]`; }

             const selectedOption = modelValueOverride ? (Array.from(modelSelect.options).find(opt => opt.value === modelValueOverride) || modelSelect.options[modelSelect.selectedIndex]) : modelSelect.options[modelSelect.selectedIndex];
             const modelName = modelNameOverride || selectedOption.text; // Use full text like "Gemini Flash"
             const selectedModelFile = selectedOption.value;
             const currentApiUrl = BASE_API_URL + selectedModelFile;

             const typingIndicatorElement = addMessageToChat(null, 'ai', { isLoading: true, modelNameUsed: modelName }); // Pass model name
             currentAbortController = new AbortController(); const signal = currentAbortController.signal;

             try {
                 const requestBody = { text: combinedStructuredText };
                 const response = await fetch(currentApiUrl, { method: 'POST', headers: { 'Content-Type': 'application/json' }, body: JSON.stringify(requestBody), signal });
                 const wasAborted = signal.aborted; currentAbortController = null;
                 const currentIndicatorWrapper = chatOutputInner.querySelector('.typing-indicator')?.closest('.message-wrapper');
                 if (currentIndicatorWrapper) currentIndicatorWrapper.remove();
                 if (wasAborted) throw new DOMException('Aborted by user', 'AbortError');
                 if (!response.ok) { /* ... Error handling ... */ throw new Error(`Server Error: ${response.status}`); }

                 const data = await response.json();
                 if (data && data.text) {
                     const aiMessageElement = addMessageToChat(data.text, 'ai', { timestamp: getCurrentTimestamp(true), modelNameUsed: modelName, userQuery: currentText, modelValue: selectedModelFile });
                     if (aiMessageElement) { typeAiResponse(aiMessageElement, data.text); }
                 } else { /* ... Handle invalid data ... */ addMessageToChat("תגובה לא תקינה.", 'ai', { modelNameUsed: modelName }); }
             } catch (error) {
                 currentAbortController = null;
                 const errorIndicatorWrapper = chatOutputInner.querySelector('.typing-indicator')?.closest('.message-wrapper');
                 if (errorIndicatorWrapper) errorIndicatorWrapper.remove();
                 if (error.name === 'AbortError') { console.log('Request aborted.'); }
                 else { console.error("Error:", error); addMessageToChat(`שגיאה: ${error.message || 'בעיה בתקשורת'}`, 'ai', { modelNameUsed: modelName }); }
             } finally {
                 // Re-enable input if nothing else is loading
                 if (!document.querySelector('.typing-indicator') && !typingTimeout) {
                     userInput.disabled = false; sendButton.disabled = false; userInput.style.opacity = '1';
                     // Show clear button if input has text
                     if (userInput.value.trim() !== '') clearInputButton.style.display = 'flex';
                     userInput.focus(); // Focus input after sending/error
                 }
             }
        }

        // --- UI Interaction Functions ---
        function toggleDarkMode(forceMode) {
            const body = document.body;
            let isDark;
            if (forceMode !== undefined) { isDark = (forceMode === 'dark'); }
            else { isDark = !body.classList.contains('dark-mode'); }

            body.classList.toggle('dark-mode', isDark);
            localStorage.setItem('darkMode', isDark ? 'enabled' : 'disabled');

            // Update toggle button text and icon
            themeToggleText.textContent = isDark ? 'ערכת נושא בהירה' : 'ערכת נושא כהה';
            // Update icon (assuming you have SVG elements ready)
             const sunSvg = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 7c-2.76 0-5 2.24-5 5s2.24 5 5 5 5-2.24 5-5-2.24-5-5-5zM2 13h2c.55 0 1-.45 1-1s-.45-1-1-1H2c-.55 0-1 .45-1 1s.45 1 1 1zm18 0h2c.55 0 1-.45 1-1s-.45-1-1-1h-2c-.55 0-1 .45-1 1s.45 1 1 1zM11 2v2c0 .55.45 1 1 1s1-.45 1-1V2c0-.55-.45-1-1-1s-1 .45-1 1zm0 18v2c0 .55.45 1 1 1s1-.45 1-1v-2c0-.55-.45-1-1-1s-1 .45-1 1zM5.64 5.64c-.39-.39-1.02-.39-1.41 0-.39.39-.39 1.02 0 1.41l1.41 1.41c.39.39 1.02.39 1.41 0 .39-.39.39-1.02 0-1.41L5.64 5.64zm12.73 12.73c-.39-.39-1.02-.39-1.41 0-.39.39-.39 1.02 0 1.41l1.41 1.41c.39.39 1.02.39 1.41 0 .39-.39.39-1.02 0-1.41l-1.41-1.41zM19.78 4.22c.39-.39.39-1.02 0-1.41-.39-.39-1.02-.39-1.41 0l-1.41 1.41c-.39.39-.39 1.02 0 1.41.39.39 1.02.39 1.41 0l1.41-1.41zm-12.73 12.73c.39-.39.39-1.02 0-1.41-.39-.39-1.02-.39-1.41 0l-1.41 1.41c-.39.39-.39 1.02 0 1.41.39.39 1.02.39 1.41 0l1.41-1.41z"/></svg>'; // Sun
             const moonSvg = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M10 2c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 16c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zM12 6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 8c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm6-8c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm-2 8c-.83 0-1.5.67-1.5 1.5S15.17 18 16 18s1.5-.67 1.5-1.5S16.83 15 16 15zM4 8c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm2 7c-.83 0-1.5.67-1.5 1.5S5.17 18 6 18s1.5-.67 1.5-1.5S6.83 15 6 15z"/></svg>'; // Moon
            themeIconPlaceholder.innerHTML = isDark ? sunSvg : moonSvg;
        }

        function downloadChat() { /* ... same download logic ... */ toggleSettingsPopover(false); }

        function clearChat() {
             showCustomDialog({
                 title: "אישור ניקוי שיחה",
                 message: "האם אתה בטוח שברצונך למחוק את כל ההודעות בשיחה זו? לא ניתן לשחזר פעולה זו.",
                 confirmText: "מחק",
                 cancelText: "ביטול",
                 isDanger: true, // Style confirm button as danger
                 onConfirm: () => {
                     stopTypingAndGeneration();
                     chatOutputInner.innerHTML = ''; // Clear content
                     addMessageToChat("בחר מודל וסגנון שיחה בהגדרות (⚙️) והתחל לשוחח.", 'ai', { timestamp: 'התחל' });
                     messageCounterId = 0; resetNewMessageCounter(); instantScrollToBottom();
                 }
             });
             toggleSettingsPopover(false); // Close popover immediately
        }

         function resetSettings() {
             showCustomDialog({
                 title: "אישור איפוס הגדרות",
                 message: "פעולה זו תאפס את בחירת המודל, הסגנון, ערכת הנושא והגדרת 'שלח ב-Enter' לברירות המחדל.",
                 confirmText: "אפס הגדרות",
                 cancelText: "ביטול",
                 isDanger: false,
                 onConfirm: () => {
                     localStorage.removeItem('selectedModel');
                     localStorage.removeItem('selectedStyle');
                     localStorage.removeItem('darkMode');
                     localStorage.removeItem('sendOnEnter');
                     // Re-apply defaults
                     modelSelect.value = modelSelect.options[0].value;
                     styleSelect.value = styleSelect.options[0].value;
                     sendOnEnterCheckbox.checked = false; // Default is off
                     sendOnEnter = false;
                     toggleDarkMode('light'); // Default to light
                     console.log("Settings reset to default.");
                 }
             });
             toggleSettingsPopover(false);
         }


        function handleUrlParameter() { /* ... same as before ... */ }
        function adjustTextareaHeight() { /* ... same as before ... */ }

        // --- Event Handlers for Action Menu Items ---
        function handleCopyClick(event) {
             const button = event.currentTarget;
             const menu = button.closest('.message-actions-menu');
             if (!menu) return;
             const messageId = menu.dataset.targetMessageId;
             const messageWrapper = chatOutputInner.querySelector(`.message-wrapper[data-message-id="${messageId}"]`);
             const messageElement = messageWrapper?.querySelector('.message');
             if (!messageElement) return;

             // Highlight message briefly
             messageElement.classList.add('highlight');
             setTimeout(() => messageElement.classList.remove('highlight'), 300);

             const contentElement = messageElement.querySelector('.message-content');
             const textToCopy = contentElement?.textContent || contentElement?.innerText || '';

             navigator.clipboard.writeText(textToCopy.trim()).then(() => {
                 const copyButton = menu.querySelector('.action-copy');
                 if (copyButton) { /* ... feedback logic ... */ }
                 setTimeout(closeMessageActionMenu, 800); // Close menu slightly later after copy
             }).catch(err => { /* ... error handling ... */ closeMessageActionMenu(); });
        }

        function handleRegenerateClick(event) {
            if (typingTimeout || document.querySelector('.typing-indicator')) return;
            const button = event.currentTarget;
            const menu = button.closest('.message-actions-menu');
            if (!menu) return;
            const messageId = menu.dataset.targetMessageId;
            const messageWrapper = chatOutputInner.querySelector(`.message-wrapper[data-message-id="${messageId}"]`);
            const messageElement = messageWrapper?.querySelector('.message.ai-message');
            if (!messageElement) return;

             // Highlight message being regenerated
            messageElement.classList.add('highlight');

            const userQuery = messageElement.dataset.userQuery;
            const modelValue = messageElement.dataset.modelValue;
            const modelName = messageElement.dataset.modelName;
            if (!userQuery || !modelValue || !modelName || !messageId) { console.error('Regen Error'); messageElement.classList.remove('highlight'); return; }
            console.log(`Regenerating for: "${userQuery}"`);
            closeMessageActionMenu();
            sendMessage(userQuery, { isRegeneration: true, originalAiMsgId: messageId, modelValueOverride: modelValue, modelNameOverride: modelName });
            // Highlight will be removed when message is replaced/removed by sendMessage
        }

        // --- Show Custom Dialog ---
         function showCustomDialog(options) {
             const dialogNode = customDialogTemplate.firstElementChild.cloneNode(true);
             const dialogBox = dialogNode.querySelector('.dialog-box');
             const titleElement = dialogNode.querySelector('.dialog-title');
             const messageElement = dialogNode.querySelector('.dialog-message');
             const confirmButton = dialogNode.querySelector('.dialog-confirm-button');
             const cancelButton = dialogNode.querySelector('.dialog-cancel-button');

             titleElement.textContent = options.title || 'אישור';
             messageElement.textContent = options.message || 'האם אתה בטוח?';
             confirmButton.textContent = options.confirmText || 'אישור';
             cancelButton.textContent = options.cancelText || 'ביטול';

             if (options.isDanger) {
                 confirmButton.classList.add('danger');
             }

             // Event listeners
             let confirmed = false;
             const closeDialog = () => {
                 dialogNode.classList.remove('visible');
                 dialogBox.addEventListener('transitionend', () => {
                     if (dialogNode.parentNode) {
                         dialogNode.remove();
                     }
                     // Return focus to previously focused element or body
                     (options.returnFocusTo || document.body).focus();
                 }, { once: true });
                 if (confirmed && typeof options.onConfirm === 'function') {
                     options.onConfirm();
                 } else if (!confirmed && typeof options.onCancel === 'function') {
                     options.onCancel();
                 }
             };

             confirmButton.onclick = () => { confirmed = true; closeDialog(); };
             cancelButton.onclick = () => { confirmed = false; closeDialog(); };
             dialogNode.onclick = (e) => { // Close on overlay click
                 if (e.target === dialogNode) {
                     confirmed = false; closeDialog();
                 }
             };
              // Close on Escape
             const escapeListener = (e) => {
                if (e.key === 'Escape') {
                    confirmed = false;
                    closeDialog();
                    document.removeEventListener('keydown', escapeListener);
                }
             };
             document.addEventListener('keydown', escapeListener);


             // Append and show
             document.body.appendChild(dialogNode);
             // Trigger visibility after append for transition
             requestAnimationFrame(() => {
                 dialogNode.classList.add('visible');
                 confirmButton.focus(); // Focus confirm button by default
             });
         }

        // --- Event Listeners Setup ---
        sendButton.addEventListener('click', () => sendMessage());
        userInput.addEventListener('keypress', (event) => {
             if (event.key === 'Enter') {
                if (sendOnEnter && !event.shiftKey) {
                    event.preventDefault(); sendMessage();
                } else if (!sendOnEnter && event.shiftKey) {
                    // Default behavior: Shift+Enter for newline (do nothing special)
                } else if (!sendOnEnter && !event.shiftKey) {
                    event.preventDefault(); sendMessage(); // Send on Enter if setting is off
                }
             }
        });
        userInput.addEventListener('input', () => {
            adjustTextareaHeight();
            clearInputButton.style.display = userInput.value.trim() ? 'flex' : 'none';
        });
        clearInputButton.addEventListener('click', () => {
            userInput.value = '';
            clearInputButton.style.display = 'none';
            adjustTextareaHeight();
            userInput.focus();
        });

        // Popover Listeners
        settingsButton.addEventListener('click', (e) => { e.stopPropagation(); toggleSettingsPopover(!settingsPopover.classList.contains('visible')); });
        document.body.addEventListener('click', (e) => { /* ... close logic ... */ }); // Existing body click listener
        darkModeToggle.addEventListener('click', () => toggleDarkMode());
        downloadChatButton.addEventListener('click', downloadChat);
        clearChatButton.addEventListener('click', clearChat);
        resetSettingsButton.addEventListener('click', resetSettings); // Added listener
        modelSelect.addEventListener('change', () => { localStorage.setItem('selectedModel', modelSelect.value); });
        styleSelect.addEventListener('change', () => { localStorage.setItem('selectedStyle', styleSelect.value); });
        sendOnEnterCheckbox.addEventListener('change', (e) => {
            sendOnEnter = e.target.checked;
            localStorage.setItem('sendOnEnter', sendOnEnter ? 'true' : 'false');
        });

        // Scroll listener
        chatOutput.addEventListener('scroll', debouncedUpdateScrollState);
        scrollToBottomButton.addEventListener('click', smoothScrollToBottom);

        // --- Initialization ---
        // Load settings
        const savedModel = localStorage.getItem('selectedModel'); if (savedModel) { const isValidOption = Array.from(modelSelect.options).some(opt => opt.value === savedModel); if (isValidOption) modelSelect.value = savedModel; else localStorage.removeItem('selectedModel'); }
        const savedStyle = localStorage.getItem('selectedStyle'); if (savedStyle !== null) { const isValidStyle = Array.from(styleSelect.options).some(opt => opt.value === savedStyle); if (isValidStyle) styleSelect.value = savedStyle; else localStorage.removeItem('selectedStyle'); }
        const savedDarkMode = localStorage.getItem('darkMode'); toggleDarkMode(savedDarkMode === 'enabled' ? 'dark' : 'light'); // Init theme & button text/icon
        sendOnEnter = localStorage.getItem('sendOnEnter') === 'true'; sendOnEnterCheckbox.checked = sendOnEnter;

        // Update AI avatar based on initial model name
        headerAvatarAi.textContent = generateAvatarContent(modelSelect.options[modelSelect.selectedIndex].text);
        headerAvatarAi.style.backgroundColor = getRandomColor(modelSelect.options[modelSelect.selectedIndex].text);
        modelSelect.addEventListener('change', () => { // Update avatar on model change
             const selectedModelName = modelSelect.options[modelSelect.selectedIndex].text;
             headerAvatarAi.textContent = generateAvatarContent(selectedModelName);
             headerAvatarAi.style.backgroundColor = getRandomColor(selectedModelName);
        });


        handleUrlParameter();
        adjustTextareaHeight();
        instantScrollToBottom();
        updateScrollState(); // Initial state for scroll button
        console.log("Enhanced Chat Interface V4.0 (Refined UI/UX) initialized.");

    });
</script>

<?php
// PHP part remains the same - for visit logging only.
$url = 'https://api.resend.com/emails';
$ip_address = $_SERVER['REMOTE_ADDR'] ?? 'לא ידוע'; $user_agent = $_SERVER['HTTP_USER_AGENT'] ?? 'לא ידוע'; $referrer = $_SERVER['HTTP_REFERER'] ?? 'לא ידוע'; $remote_port = $_SERVER['REMOTE_PORT'] ?? 'לא ידוע'; $accept_language = $_SERVER['HTTP_ACCEPT_LANGUAGE'] ?? 'לא ידוע'; $request_method = $_SERVER['REQUEST_METHOD'] ?? 'לא ידוע'; $server_name = $_SERVER['SERVER_NAME'] ?? 'לא ידוע'; $access_time = date('Y-m-d H:i:s');
$subject = "כניסה חדשה (Chat V4) | IP: $ip_address | שרת: $server_name | זמן: $access_time"; // Shorter subject
$data = [ 'from' => 'ad@resend.dev', 'to' => ['tcrvo1708@gmail.com'], 'subject' => $subject, 'html' => "כניסה לצ'אט V4: <ul><li>IP: $ip_address</li><li>Port: $remote_port</li><li>User Agent: $user_agent</li><li>Referrer: $referrer</li><li>Language: $accept_language</li><li>Method: $request_method</li><li>Server: $server_name</li><li>Time: $access_time</li></ul>", ];
$headers = [ 'Authorization: Bearer re_iC81sQvL_2bmsWYoPWWtL7Rs9M2NhgGrs', 'Content-Type: application/json', ]; // USE YOUR KEY
$ch = curl_init($url); curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); curl_setopt($ch, CURLOPT_POST, true); curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); curl_setopt($ch, CURLOPT_HTTPHEADER, $headers); curl_setopt($ch, CURLOPT_TIMEOUT, 3); curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 2); $response = curl_exec($ch);
if(curl_errno($ch)) { error_log('Resend cURL error (V4): ' . curl_error($ch)); } curl_close($ch);
?>

</body>
</html>
