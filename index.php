<!DOCTYPE html>
<html lang="he" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>צ'אט AI - רקע WhatsApp</title>
    <style>
        /* --- משתני עיצוב גלובליים --- */
        :root {
            --font-main: Assistant, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            --font-code: 'Consolas', 'Monaco', 'Courier New', monospace;
            --border-radius-small: 4px;
            --border-radius-medium: 8px;
            --border-radius-large: 18px;
            --border-radius-round: 50%;
            --transition-fast: 0.15s ease;
            --transition-medium: 0.3s ease;
            --transition-slow: 0.5s ease;

            /* --- Light Mode --- */
            --lm-bg-default: #e5ddd5; /* רקע כמו וואטסאפ מסביב */
            --lm-chat-bg: #ffffff; /* רקע הקונטיינר חזר ללבן */
            --lm-header-bg: #00a884;
            --lm-header-text: #ffffff;
            --lm-header-icon-fill: #ffffff;
            --lm-user-msg-bg: #dcf8c6;
            --lm-ai-msg-bg: #ffffff;
            --lm-msg-text: #111b21;
            --lm-input-area-bg: #f0f2f5;
            --lm-input-bg: #ffffff;
            --lm-input-text: #111b21;
            --lm-input-border: #e0e0e0;
            --lm-input-border-focus: var(--lm-button-bg);
            --lm-button-bg: #008069;
            --lm-button-hover-bg: #00a884;
            --lm-button-active-bg: #005c4b;
            --lm-button-icon-fill: #ffffff;
            --lm-timestamp-color: rgba(17, 27, 33, 0.65);
            --lm-model-indicator-color: rgba(17, 27, 33, 0.55);
            --lm-border-color: #e9edef; /* חזרה לגבול בהיר יותר */
            --lm-icon-button-hover-bg: rgba(0, 0, 0, 0.07);
            --lm-msg-action-icon-fill: rgba(0, 0, 0, 0.5);
            --lm-msg-action-icon-hover-fill: #000000;
            --lm-msg-action-icon-hover-bg: rgba(0, 0, 0, 0.09);
            --lm-scrollbar-thumb: #b0b0b0;
            --lm-scrollbar-track: #f0f0f0; /* רקע בהיר לפס גלילה */
            --lm-link-color: #007bff;
            --lm-code-bg: #f8f9fa;
            --lm-code-text: #212529;
            --lm-code-border: #dee2e6;
            --lm-code-copy-btn-bg: rgba(0, 0, 0, 0.05);
            --lm-code-copy-btn-hover-bg: rgba(0, 0, 0, 0.1);
            --lm-code-copy-btn-copied-bg: var(--lm-button-bg);
            --lm-code-copy-btn-copied-text: #ffffff;
            --lm-loading-spinner-color1: #00a884;
            --lm-loading-spinner-color2: #dcf8c6;
            --lm-shadow-light: 0 1px 2px rgba(0, 0, 0, 0.07);
            --lm-shadow-medium: 0 3px 6px rgba(0, 0, 0, 0.09);
            --lm-scroll-btn-bg: rgba(255, 255, 255, 0.85);
            --lm-scroll-btn-icon: #54656f;
            --lm-scroll-btn-hover-bg: #ffffff;

            /* --- Dark Mode --- */
            --dm-bg-default: #111b21; --dm-chat-bg: #0b141a; --dm-header-bg: #202c33; --dm-header-text: #e9edef; --dm-header-icon-fill: #aebac1; --dm-user-msg-bg: #005c4b; --dm-ai-msg-bg: #202c33; --dm-msg-text: #e9edef; --dm-input-area-bg: #1f2c34; --dm-input-bg: #2a3942; --dm-input-text: #e9edef; --dm-input-border: #374151; --dm-input-border-focus: var(--dm-button-bg); --dm-button-bg: #00a884; --dm-button-hover-bg: #008069; --dm-button-active-bg: #00a884; --dm-button-icon-fill: #111b21; --dm-timestamp-color: rgba(233, 237, 239, 0.7); --dm-model-indicator-color: rgba(233, 237, 239, 0.6); --dm-border-color: #2a3942; --dm-icon-button-hover-bg: rgba(255, 255, 255, 0.08); --dm-msg-action-icon-fill: rgba(255, 255, 255, 0.6); --dm-msg-action-icon-hover-fill: #ffffff; --dm-msg-action-icon-hover-bg: rgba(255, 255, 255, 0.1); --dm-scrollbar-thumb: #4a4a4a;
            --dm-scrollbar-track: var(--dm-chat-bg); /* רקע כהה לפס גלילה */
            --dm-link-color: #58a6ff; --dm-code-bg: #182128; --dm-code-text: #d1d5db; --dm-code-border: #374151; --dm-code-copy-btn-bg: rgba(255, 255, 255, 0.1); --dm-code-copy-btn-hover-bg: rgba(255, 255, 255, 0.15); --dm-code-copy-btn-copied-bg: var(--dm-button-bg); --dm-code-copy-btn-copied-text: #111b21; --dm-loading-spinner-color1: #25d366; --dm-loading-spinner-color2: #005c4b; --dm-shadow-light: 0 1px 1px rgba(0, 0, 0, 0.3); --dm-shadow-medium: 0 3px 6px rgba(0, 0, 0, 0.4); --dm-scroll-btn-bg: rgba(42, 57, 66, 0.85); --dm-scroll-btn-icon: #aebac1; --dm-scroll-btn-hover-bg: #2a3942;

            /* ברירת מחדל */
             --bg-default: var(--lm-bg-default); --chat-bg: var(--lm-chat-bg); --header-bg: var(--lm-header-bg); --header-text: var(--lm-header-text); --header-icon-fill: var(--lm-header-icon-fill); --user-msg-bg: var(--lm-user-msg-bg); --ai-msg-bg: var(--lm-ai-msg-bg); --msg-text: var(--lm-msg-text); --input-area-bg: var(--lm-input-area-bg); --input-bg: var(--lm-input-bg); --input-text: var(--lm-input-text); --input-border: var(--lm-input-border); --input-border-focus: var(--lm-input-border-focus); --button-bg: var(--lm-button-bg); --button-hover-bg: var(--lm-button-hover-bg); --button-active-bg: var(--lm-button-active-bg); --button-icon-fill: var(--lm-button-icon-fill); --timestamp-color: var(--lm-timestamp-color); --model-indicator-color: var(--lm-model-indicator-color); --border-color: var(--lm-border-color); --icon-button-hover-bg: var(--lm-icon-button-hover-bg); --msg-action-icon-fill: var(--lm-msg-action-icon-fill); --msg-action-icon-hover-fill: var(--lm-msg-action-icon-hover-fill); --msg-action-icon-hover-bg: var(--lm-msg-action-icon-hover-bg); --scrollbar-thumb: var(--lm-scrollbar-thumb); --scrollbar-track: var(--lm-scrollbar-track); --link-color: var(--lm-link-color); --code-bg: var(--lm-code-bg); --code-text: var(--lm-code-text); --code-border: var(--lm-code-border); --code-copy-btn-bg: var(--lm-code-copy-btn-bg); --code-copy-btn-hover-bg: var(--lm-code-copy-btn-hover-bg); --code-copy-btn-copied-bg: var(--lm-code-copy-btn-copied-bg); --code-copy-btn-copied-text: var(--lm-code-copy-btn-copied-text); --loading-spinner-color1: var(--lm-loading-spinner-color1); --loading-spinner-color2: var(--lm-loading-spinner-color2); --shadow-light: var(--lm-shadow-light); --shadow-medium: var(--lm-shadow-medium); --scroll-btn-bg: var(--lm-scroll-btn-bg); --scroll-btn-icon: var(--lm-scroll-btn-icon); --scroll-btn-hover-bg: var(--lm-scroll-btn-hover-bg);
            --select-bg: rgba(255, 255, 255, 0.15); --select-border: rgba(255, 255, 255, 0.3); --select-text: var(--lm-header-text); --select-arrow: var(--lm-header-icon-fill); --stop-button-fill: var(--lm-msg-action-icon-fill); --stop-button-hover-fill: var(--lm-msg-action-icon-hover-fill);
        }
        body.dark-mode {
             --bg-default: var(--dm-bg-default); --chat-bg: var(--dm-chat-bg); --header-bg: var(--dm-header-bg); --header-text: var(--dm-header-text); --header-icon-fill: var(--dm-header-icon-fill); --user-msg-bg: var(--dm-user-msg-bg); --ai-msg-bg: var(--dm-ai-msg-bg); --msg-text: var(--dm-msg-text); --input-area-bg: var(--dm-input-area-bg); --input-bg: var(--dm-input-bg); --input-text: var(--dm-input-text); --input-border: var(--dm-input-border); --input-border-focus: var(--dm-input-border-focus); --button-bg: var(--dm-button-bg); --button-hover-bg: var(--dm-button-hover-bg); --button-active-bg: var(--dm-button-active-bg); --button-icon-fill: var(--dm-button-icon-fill); --timestamp-color: var(--dm-timestamp-color); --model-indicator-color: var(--dm-model-indicator-color); --border-color: var(--dm-border-color); --icon-button-hover-bg: var(--dm-icon-button-hover-bg); --msg-action-icon-fill: var(--dm-msg-action-icon-fill); --msg-action-icon-hover-fill: var(--dm-msg-action-icon-hover-fill); --msg-action-icon-hover-bg: var(--dm-msg-action-icon-hover-bg); --scrollbar-thumb: var(--dm-scrollbar-thumb); --scrollbar-track: var(--dm-scrollbar-track); --link-color: var(--dm-link-color); --code-bg: var(--dm-code-bg); --code-text: var(--dm-code-text); --code-border: var(--dm-code-border); --code-copy-btn-bg: var(--dm-code-copy-btn-bg); --code-copy-btn-hover-bg: var(--dm-code-copy-btn-hover-bg); --code-copy-btn-copied-bg: var(--dm-code-copy-btn-copied-bg); --code-copy-btn-copied-text: var(--dm-code-copy-btn-copied-text); --loading-spinner-color1: var(--dm-loading-spinner-color1); --loading-spinner-color2: var(--dm-loading-spinner-color2); --shadow-light: var(--dm-shadow-light); --shadow-medium: var(--dm-shadow-medium); --scroll-btn-bg: var(--dm-scroll-btn-bg); --scroll-btn-icon: var(--dm-scroll-btn-icon); --scroll-btn-hover-bg: var(--dm-scroll-btn-hover-bg);
             --select-bg: rgba(255, 255, 255, 0.08); --select-border: rgba(255, 255, 255, 0.15); --select-text: var(--dm-header-text); --select-arrow: var(--dm-header-icon-fill); --stop-button-fill: var(--dm-msg-action-icon-fill); --stop-button-hover-fill: var(--dm-msg-action-icon-hover-fill);
        }

        /* --- CSS הכללי נשאר זהה --- */
        html, body { height: 100%; margin: 0; padding: 0; overflow: hidden; }
        body { font-family: var(--font-main); background-color: var(--bg-default); color: var(--msg-text); display: flex; flex-direction: column; transition: background-color var(--transition-medium), color var(--transition-medium); font-size: 14.5px; }
        * { box-sizing: border-box; }
        #chat-container { width: 100%; max-width: 850px; height: calc(100vh - 20px); margin: 10px auto; background-color: var(--chat-bg); display: flex; flex-direction: column; overflow: hidden; position: relative; transition: background-color var(--transition-medium), box-shadow var(--transition-medium); box-shadow: var(--shadow-medium); border-radius: var(--border-radius-medium); }
        #chat-header { background-color: var(--header-bg); color: var(--header-text); padding: 10px 16px; display: flex; align-items: center; box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1); z-index: 10; transition: background-color var(--transition-medium), color var(--transition-medium); gap: 10px; flex-shrink: 0; border-top-left-radius: var(--border-radius-medium); border-top-right-radius: var(--border-radius-medium); }
        #chat-header h1 { margin: 0; font-size: 18px; font-weight: 600; flex-grow: 1; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
        .header-controls { display: flex; align-items: center; gap: 6px; }
        #model-select { background-color: var(--select-bg); color: var(--select-text); border: 1px solid var(--select-border); border-radius: var(--border-radius-large); padding: 6px 28px 6px 12px; font-size: 13px; cursor: pointer; outline: none; -webkit-appearance: none; -moz-appearance: none; appearance: none; background-image: url('data:image/svg+xml;utf8,<svg fill="%23ffffff" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M7 10l5 5 5-5z"/><path d="M0 0h24v24H0z" fill="none"/></svg>'); background-repeat: no-repeat; background-position: right 8px center; background-size: 18px; transition: background-color var(--transition-fast), border-color var(--transition-fast), background-image var(--transition-medium); }
        #model-select:hover { background-color: color-mix(in srgb, var(--select-bg) 80%, #000000 20%); }
        #model-select option { background-color: var(--chat-bg); color: var(--msg-text); }
        body.dark-mode #model-select option { background-color: var(--input-bg); color: var(--msg-text); }
        .icon-button { background: none; border: none; padding: 8px; cursor: pointer; border-radius: var(--border-radius-round); display: flex; align-items: center; justify-content: center; transition: background-color var(--transition-fast), transform var(--transition-fast); }
        .icon-button:hover { background-color: var(--icon-button-hover-bg); }
        .icon-button:active { background-color: color-mix(in srgb, var(--icon-button-hover-bg) 70%, #000000); transform: scale(0.92); }
        .icon-button svg { width: 22px; height: 22px; fill: var(--header-icon-fill); transition: fill var(--transition-medium); }

        #chat-output {
            flex-grow: 1; padding: 15px; overflow-y: auto;
            display: flex; flex-direction: column; scroll-behavior: smooth;
            position: relative;
            background-color: transparent; /* הסרת צבע הרקע המוצק */
        }
         /* החזרת רקע התמונה במצב בהיר */
         body:not(.dark-mode) #chat-output {
             background-image: url('https://user-images.githubusercontent.com/15075759/28719144-86dc0f70-73b1-11e7-911d-60d70fcded21.png');
             background-repeat: repeat;
         }
         /* רקע מוצק במצב כהה */
         body.dark-mode #chat-output {
             background-color: var(--dm-chat-bg);
         }

        #chat-output::-webkit-scrollbar { width: 8px; }
        #chat-output::-webkit-scrollbar-track { background: var(--scrollbar-track); border-radius: 4px; }
        #chat-output::-webkit-scrollbar-thumb { background: var(--scrollbar-thumb); border-radius: 4px; border: 2px solid var(--chat-bg); /* התאמת צבע הגבול לרקע הקונטיינר */ }
        #chat-output::-webkit-scrollbar-thumb:hover { background: color-mix(in srgb, var(--scrollbar-thumb) 70%, #000000); }
        #chat-output { scrollbar-width: thin; scrollbar-color: var(--scrollbar-thumb) var(--scrollbar-track); }
        #scroll-to-bottom { position: absolute; bottom: 70px; left: 20px; background-color: var(--scroll-btn-bg); backdrop-filter: blur(5px); border: 1px solid color-mix(in srgb, var(--border-color) 50%, transparent); border-radius: var(--border-radius-round); width: 36px; height: 36px; padding: 0; cursor: pointer; display: none; align-items: center; justify-content: center; box-shadow: var(--shadow-medium); opacity: 0; transition: opacity var(--transition-medium), transform var(--transition-medium), background-color var(--transition-fast); z-index: 20; }
        #scroll-to-bottom.visible { display: flex; opacity: 0.8; }
        #scroll-to-bottom:hover { opacity: 1; background-color: var(--scroll-btn-hover-bg); transform: scale(1.05); }
        #scroll-to-bottom svg { width: 20px; height: 20px; fill: var(--scroll-btn-icon); }

        .message { max-width: 78%; padding: 9px 15px; margin-bottom: 12px; border-radius: var(--border-radius-large); word-wrap: break-word; line-height: 1.55; font-size: 14.8px; color: var(--msg-text); box-shadow: var(--shadow-light); transition: background-color var(--transition-medium), color var(--transition-medium), box-shadow var(--transition-medium), transform var(--transition-fast); opacity: 0; animation: fadeInSlideUp 0.5s cubic-bezier(0.25, 0.8, 0.25, 1) forwards; position: relative; }
        @keyframes fadeInSlideUp { from { opacity: 0; transform: translateY(12px); } to { opacity: 1; transform: translateY(0); } }
        .user-message { background-color: var(--user-msg-bg); align-self: flex-start; margin-left: auto; border-bottom-left-radius: var(--border-radius-medium); }
        .ai-message { background-color: var(--ai-msg-bg); align-self: flex-end; margin-right: auto; border: 1px solid var(--border-color); border-bottom-right-radius: var(--border-radius-medium); box-shadow: none; }
        .ai-message.typing-cursor .message-content::after { content: '▍'; display: inline-block; animation: blink-cursor 0.8s infinite; margin-right: 2px; color: var(--timestamp-color); }
        @keyframes blink-cursor { 50% { opacity: 0; } }
        .message-content { padding-bottom: 2px; min-height: 1.55em; }
        .message-footer { display: flex; align-items: center; font-size: 11.5px; margin-top: 6px; gap: 8px; transition: color var(--transition-medium); flex-wrap: wrap; opacity: 0.85; }
        .model-indicator { color: var(--model-indicator-color); white-space: nowrap; font-weight: 500; }
        .timestamp { color: var(--timestamp-color); white-space: nowrap; }
        .user-message .message-footer { justify-content: flex-end; color: var(--timestamp-color); }
        .ai-message .message-footer { justify-content: flex-start; color: var(--timestamp-color); }
        .user-message .model-indicator { display: none; }
        .message-actions { position: absolute; top: 4px; display: flex; gap: 4px; opacity: 0; transition: opacity var(--transition-fast), transform var(--transition-fast); background-color: color-mix(in srgb, var(--chat-bg) 85%, transparent); backdrop-filter: blur(3px); border-radius: var(--border-radius-large); padding: 3px 5px; z-index: 1; pointer-events: none; }
        .user-message .message-actions { left: -8px; transform: translateX(-100%) translateY(-5px) scale(0.9); }
        .ai-message .message-actions { right: -8px; transform: translateX(100%) translateY(-5px) scale(0.9); }
        .message:hover .message-actions { opacity: 1; transform: translateX(0) translateY(0) scale(1); pointer-events: auto; }
        .msg-action-button { background: none; border: none; padding: 4px; cursor: pointer; border-radius: var(--border-radius-round); display: flex; align-items: center; justify-content: center; transition: background-color var(--transition-fast), transform var(--transition-fast); }
        .msg-action-button svg { width: 17px; height: 17px; fill: var(--msg-action-icon-fill); transition: fill var(--transition-fast); }
        .msg-action-button:hover { background-color: var(--msg-action-icon-hover-bg); }
        .msg-action-button:hover svg { fill: var(--msg-action-icon-hover-fill); }
        .msg-action-button:active { transform: scale(0.9); }
        .msg-action-button.copied { animation: copied-feedback 0.5s ease; }
        .msg-action-button.copied svg { fill: var(--button-bg); }
        @keyframes copied-feedback { 0%, 100% { transform: scale(1); } 50% { transform: scale(1.2); } }
        .message-content pre { background-color: var(--code-bg); color: var(--code-text); padding: 12px 16px; border-radius: var(--border-radius-medium); overflow-x: auto; font-family: var(--font-code); font-size: 13.5px; margin: 10px 0; direction: ltr; text-align: left; white-space: pre; border: 1px solid var(--code-border); position: relative; }
        .message-content pre .copy-code-button { position: absolute; top: 8px; right: 8px; background-color: var(--code-copy-btn-bg); color: var(--code-text); border: none; border-radius: var(--border-radius-small); padding: 4px 8px; font-size: 11px; font-family: var(--font-main); cursor: pointer; opacity: 0; transition: opacity var(--transition-fast), background-color var(--transition-fast); z-index: 2; backdrop-filter: blur(2px); }
        .message-content pre:hover .copy-code-button { opacity: 0.8; }
        .message-content pre .copy-code-button:hover { opacity: 1; background-color: var(--code-copy-btn-hover-bg); }
        .message-content pre .copy-code-button.copied { background-color: var(--code-copy-btn-copied-bg); color: var(--code-copy-btn-copied-text); opacity: 1; }
        .message-content code:not(pre > code) { background-color: color-mix(in srgb, var(--code-bg) 80%, var(--chat-bg)); color: var(--code-text); padding: 0.2em 0.5em; margin: 0 0.1em; font-size: 88%; border-radius: var(--border-radius-small); font-family: var(--font-code); direction: ltr; text-align: left; border: 1px solid var(--code-border); }

        #chat-input-area { display: flex; align-items: flex-end; padding: 10px 14px; border-top: 1px solid var(--border-color); background-color: var(--input-area-bg); flex-shrink: 0; transition: background-color var(--transition-medium), border-color var(--transition-medium); gap: 10px; border-bottom-left-radius: var(--border-radius-medium); border-bottom-right-radius: var(--border-radius-medium); }
        #user-input { flex-grow: 1; padding: 11px 18px; border: 1px solid var(--input-border); border-radius: var(--border-radius-large); font-size: 15px; background-color: var(--input-bg); color: var(--input-text); outline: none; transition: background-color var(--transition-medium), color var(--transition-medium), box-shadow var(--transition-fast), height var(--transition-fast), border-color var(--transition-fast); resize: none; overflow-y: hidden; min-height: 44px; max-height: 160px; line-height: 1.45; box-sizing: border-box; box-shadow: 0 1px 2px rgba(0,0,0,0.05) inset; }
        #user-input:focus { border-color: var(--input-border-focus); box-shadow: 0 0 0 3px color-mix(in srgb, var(--button-bg) 20%, transparent), 0 1px 2px rgba(0,0,0,0.05) inset; }
        #send-button { width: 44px; height: 44px; padding: 0; background-color: var(--button-bg); border: none; border-radius: var(--border-radius-round); cursor: pointer; font-size: 0; display: flex; justify-content: center; align-items: center; transition: background-color var(--transition-fast), transform var(--transition-fast), opacity var(--transition-fast), box-shadow var(--transition-fast); flex-shrink: 0; align-self: flex-end; box-shadow: var(--shadow-light); }
        #send-button:hover { background-color: var(--button-hover-bg); transform: scale(1.03); box-shadow: var(--shadow-medium); }
        #send-button:active { background-color: var(--button-active-bg); transform: scale(0.95); box-shadow: none; }
        #send-button::before { content: ''; display: block; width: 22px; height: 22px; background-color: var(--button-icon-fill); mask-image: url('data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"%3E%3Cpath d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"/%3E%3C/svg%3E'); mask-size: contain; mask-repeat: no-repeat; mask-position: center; -webkit-mask-image: url('data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"%3E%3Cpath d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"/%3E%3C/svg%3E'); -webkit-mask-size: contain; -webkit-mask-repeat: no-repeat; -webkit-mask-position: center; transition: background-color var(--transition-medium); }
        #send-button:disabled { opacity: 0.5; cursor: not-allowed; background-color: color-mix(in srgb, var(--button-bg) 50%, var(--input-area-bg)); transform: scale(1); box-shadow: none; }

        /* --- אנימצית טעינה "מגניבה" --- */
         .typing-indicator .message-content { color: var(--timestamp-color); }
         .cool-loading-container { display: flex; align-items: center; justify-content: flex-start; gap: 8px; padding: 4px 0; }
         .cool-loading-container span { font-size: 0.9em; animation: pulse-text 1.5s infinite ease-in-out; }
         .loading-spinner { width: 20px; height: 20px; border-radius: 50%; border: 3px solid var(--loading-spinner-color1); border-top-color: transparent; animation: cool-spinner 1s linear infinite; flex-shrink: 0; }
         @keyframes cool-spinner { to { transform: rotate(360deg); } }
         @keyframes pulse-text { 0%, 100% { opacity: 0.7; } 50% { opacity: 1; } }
        #stop-generation-button { background: none; border: none; padding: 4px; margin: 0; cursor: pointer; display: flex; align-items: center; justify-content: center; width: 24px; height: 24px; border-radius: var(--border-radius-round); transition: background-color var(--transition-fast), transform var(--transition-fast); }
        #stop-generation-button svg { width: 16px; height: 16px; fill: var(--stop-button-fill); transition: fill var(--transition-fast); }
        #stop-generation-button:hover { background-color: var(--msg-action-icon-hover-bg); }
        #stop-generation-button:hover svg { fill: var(--stop-button-hover-fill); }
        #stop-generation-button:active { transform: scale(0.9); }

        *:focus-visible { outline: 2px solid var(--button-bg); outline-offset: 2px; border-radius: var(--border-radius-small); }
        #user-input:focus-visible { outline: none; }

    </style>
</head>
<body>

<div id="chat-container">
    <div id="chat-header">
        <h1>צ'אט AI</h1>
        <div class="header-controls">
            <select id="model-select" aria-label="בחר מודל AI">
                <option value="main-ai.php">Gemini 2 Flash</option>
                <option value="gemini25.php">Gemini 2.5 Pro</option>
            </select>
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
    <div id="chat-output" aria-live="polite">
        <!-- ההודעה הראשונית תישאר כמו שהיא -->
        <div class="message ai-message" data-message-id="initial-0" data-sender="ai" data-timestamp="התחל">
            <div class="message-content"><span>שלום! בחר מודל AI והתחל לשוחח.</span></div>
            <div class="message-footer"><span class="timestamp">התחל</span></div>
        </div>
         <button id="scroll-to-bottom" title="גלול לתחתית" aria-label="גלול לתחתית">
             <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M7.41 8.59L12 13.17l4.59-4.58L18 10l-6 6-6-6 1.41-1.41z"/><path d="M0 0h24v24H0V0z" fill="none"/></svg>
         </button>
    </div>
    <div id="chat-input-area">
        <textarea id="user-input" placeholder="הקלד/י הודעה..." rows="1" aria-label="הודעת משתמש"></textarea>
        <button id="send-button" aria-label="שלח"></button>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // --- Element References ---
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

        // --- State Variables ---
        const BASE_API_URL = 'https://php-render-test.onrender.com/';
        let messageCounter = 0;
        let currentAbortController = null;
        let typingTimeout = null;
        const TYPING_SPEED = 10; // מהירות הקלדה
        const SCROLL_THRESHOLD = 150;

        // --- Utility Functions ---
        function getCurrentTimestamp() { const now = new Date(); const hours = now.getHours().toString().padStart(2, '0'); const minutes = now.getMinutes().toString().padStart(2, '0'); return `${hours}:${minutes}`; }
        function generateMessageId() { return `msg-${Date.now()}-${messageCounter++}`; }
        function scrollToBottom(behavior = 'smooth') {
             // Short delay to allow rendering before scrolling
             setTimeout(() => {
                 if (behavior === 'smooth') {
                     chatOutput.scrollTo({ top: chatOutput.scrollHeight, behavior: 'smooth' });
                 } else {
                     chatOutput.scrollTop = chatOutput.scrollHeight;
                 }
             }, 50); // Added a small delay
        }

        // --- Get Chat History Function ---
        function getChatHistory(currentUserMessage, forRegeneration = false, regenerationTargetMsgId = null) {
             const history = [];
             const messages = chatOutput.querySelectorAll('.message:not(.typing-indicator)');
             messages.forEach((msg) => {
                 const sender = msg.dataset.sender;
                 const timestamp = msg.dataset.timestamp;
                 const messageId = msg.dataset.messageId;
                 // Skip initial message
                 if (timestamp === 'התחל' && sender === 'ai') return;
                 // Skip the AI message being regenerated
                 if (forRegeneration && messageId === regenerationTargetMsgId && sender === 'ai') return;

                 const contentElement = msg.querySelector('.message-content');
                 let content = '';
                 if (contentElement) {
                     // Try to reconstruct content more reliably, handling different node types
                     contentElement.childNodes.forEach(node => {
                         if (node.nodeType === Node.TEXT_NODE) {
                             content += node.textContent;
                         } else if (node.nodeType === Node.ELEMENT_NODE) {
                             if (node.tagName === 'PRE') {
                                 // Extract code directly, ignore copy button if present
                                 const codeNode = node.querySelector('code') || node;
                                 content += '```\n' + (codeNode.textContent || '').replace(/\nהעתק קוד$/, '').trim() + '\n```'; // Basic markdown reconstruction
                             } else if (!node.classList.contains('copy-code-button') && !node.classList.contains('message-actions') && !node.classList.contains('message-footer')) {
                                 content += node.textContent; // Get text from other elements like span, div etc.
                             }
                         }
                     });
                 }
                 content = content.trim();
                 if (content) {
                    const role = sender === 'user' ? 'user' : 'model';
                    history.push({ role: role, content: content });
                 } else {
                     console.warn("Skipping empty message in history:", msg);
                 }
             });
             // Add the current user message if provided (and not empty)
             if (currentUserMessage && currentUserMessage.trim()) {
                history.push({ role: 'user', content: currentUserMessage.trim() });
             }
             return history;
         }


        // --- Add Message to Chat Function ---
        function addMessageToChat(text, sender, options = {}) {
            const { isLoading = false, timestamp = null, modelNameUsed = null, userQuery = null, modelValue = null } = options;
            const messageId = generateMessageId();
            const messageDiv = document.createElement('div');
            messageDiv.classList.add('message', sender === 'user' ? 'user-message' : 'ai-message');
            messageDiv.dataset.sender = sender;
            messageDiv.dataset.messageId = messageId;
            const contentDiv = document.createElement('div');
            contentDiv.classList.add('message-content');

            if (isLoading) {
                messageDiv.classList.add('typing-indicator');
                contentDiv.innerHTML = `
                    <div class="cool-loading-container">
                        <div class="loading-spinner"></div>
                        <span>מעבד...</span>
                        <button id="stop-generation-button-${messageId}" class="msg-action-button stop-button" title="עצור יצירה" aria-label="עצור יצירה">
                             <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm5 13H7v-2h10v2z"/></svg>
                        </button>
                    </div>`;
                messageDiv.appendChild(contentDiv);
                // Use unique ID for stop button
                const stopButton = messageDiv.querySelector(`#stop-generation-button-${messageId}`);
                if (stopButton) {
                    stopButton.addEventListener('click', stopTypingAndGeneration);
                } else {
                    console.error("Stop button not found after creation!");
                }
            } else {
                if (sender === 'user') {
                     // Basic sanitization for user input to prevent simple HTML injection
                     const tempDiv = document.createElement('div');
                     tempDiv.textContent = text;
                     contentDiv.innerHTML = tempDiv.innerHTML; // Convert text to safe HTML (handles <, > etc.)
                } else {
                     // For AI messages, text might contain HTML/Markdown rendered later by typeAiResponse
                     // Initially set empty or with placeholder if needed
                     contentDiv.innerHTML = ''; // Will be populated by typeAiResponse or finalize
                }
                messageDiv.appendChild(contentDiv);

                const footerDiv = document.createElement('div');
                footerDiv.classList.add('message-footer');
                const currentTimestamp = timestamp || getCurrentTimestamp();
                messageDiv.dataset.timestamp = currentTimestamp; // Store timestamp

                if (sender === 'ai' && modelNameUsed && timestamp !== 'התחל') {
                    const modelSpan = document.createElement('span');
                    modelSpan.classList.add('model-indicator');
                    modelSpan.textContent = `(${modelNameUsed})`;
                    footerDiv.appendChild(modelSpan);
                    // Store data attributes needed for regeneration
                    messageDiv.dataset.userQuery = userQuery || '';
                    messageDiv.dataset.modelName = modelNameUsed || '';
                    messageDiv.dataset.modelValue = modelValue || '';
                }

                const timestampSpan = document.createElement('span');
                timestampSpan.classList.add('timestamp');
                timestampSpan.textContent = currentTimestamp;
                footerDiv.appendChild(timestampSpan);
                messageDiv.appendChild(footerDiv);

                // Add action buttons (Copy, Regenerate) only if it's not the initial message
                if (timestamp !== 'התחל') {
                    const actionsDiv = document.createElement('div');
                    actionsDiv.classList.add('message-actions');

                    const copyButton = document.createElement('button');
                    copyButton.classList.add('msg-action-button', 'copy-button');
                    copyButton.title = 'העתק הודעה';
                    copyButton.setAttribute('aria-label', 'העתק הודעה');
                    copyButton.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M16 1H4c-1.1 0-2 .9-2 2v14h2V3h12V1zm3 4H8c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h11c1.1 0 2-.9 2-2V7c0-1.1-.9-2-2-2zm0 16H8V7h11v14z"/></svg>';
                    copyButton.addEventListener('click', handleCopyClick);
                    actionsDiv.appendChild(copyButton);

                    if (sender === 'ai' && userQuery && modelValue) { // Ensure necessary data exists for regen
                        const regenerateButton = document.createElement('button');
                        regenerateButton.classList.add('msg-action-button', 'regenerate-button');
                        regenerateButton.title = 'צור תגובה מחדש';
                        regenerateButton.setAttribute('aria-label', 'צור תגובה מחדש');
                        regenerateButton.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M17.65 6.35C16.2 4.9 14.21 4 12 4c-4.42 0-7.99 3.58-7.99 8s3.57 8 7.99 8c3.73 0 6.84-2.55 7.73-6h-2.08c-.82 2.33-3.04 4-5.65 4-3.31 0-6-2.69-6-6s2.69-6 6-6c1.66 0 3.14.69 4.22 1.78L13 11h7V4l-2.35 2.35z"/></svg>';
                        regenerateButton.addEventListener('click', handleRegenerateClick);
                        actionsDiv.appendChild(regenerateButton);
                    }
                    messageDiv.appendChild(actionsDiv);
                }
                 // If adding a fully formed AI message directly (not typing)
                 if (sender === 'ai' && text && !isLoading) {
                     finalizeAiMessage(messageDiv, contentDiv, text); // Render content immediately
                 }
            }

            chatOutput.insertBefore(messageDiv, scrollToBottomButton);
            // Scroll immediately for loading indicator, slightly delayed otherwise
            scrollToBottom(isLoading ? 'auto' : 'smooth');

            return messageDiv;
        }

        // --- AI Typing Effect Function ---
         function typeAiResponse(messageElement, fullText) {
             const contentDiv = messageElement.querySelector('.message-content');
             if (!contentDiv) { console.error("Content div not found for typing"); return; }

             contentDiv.innerHTML = ''; // Clear previous content
             messageElement.classList.add('typing-cursor');

             let nodeIndex = 0;
             const nodes = [];
             // Use a more robust HTML parser (DOMParser)
             try {
                const parser = new DOMParser();
                const doc = parser.parseFromString(fullText, 'text/html');
                // Select nodes from the body, excluding potentially harmful ones if needed later
                doc.body.childNodes.forEach(node => nodes.push(node));
             } catch (e) {
                 console.error("Error parsing AI response HTML:", e);
                 // Fallback to plain text rendering
                 const textNode = document.createTextNode(fullText);
                 nodes.push(textNode);
             }


             clearTimeout(typingTimeout);
             typingTimeout = null; // Reset timeout flag

             function processNode() {
                 if (currentAbortController?.signal.aborted) { // Check if aborted during typing
                      console.log("Typing aborted.");
                      finalizeAiMessage(messageElement, contentDiv, contentDiv.innerHTML); // Finalize with current content
                      return;
                 }
                 if (nodeIndex >= nodes.length) {
                      finalizeAiMessage(messageElement, contentDiv, contentDiv.innerHTML); // Finalize when done
                      return;
                 }

                 const currentNode = nodes[nodeIndex];

                 if (currentNode.nodeType === Node.TEXT_NODE) {
                     let textContent = currentNode.textContent;
                     let charIndex = 0;

                     function typeChar() {
                          if (currentAbortController?.signal.aborted) { // Check abort during char typing
                             console.log("Typing aborted (char level).");
                             finalizeAiMessage(messageElement, contentDiv, contentDiv.innerHTML);
                             return;
                          }
                         if (charIndex < textContent.length) {
                             // Append char by char
                             contentDiv.appendChild(document.createTextNode(textContent[charIndex]));
                             charIndex++;
                             scrollToBottom('auto'); // Scroll as content grows
                             typingTimeout = setTimeout(typeChar, TYPING_SPEED);
                         } else {
                             // Text node finished, move to next node
                             nodeIndex++;
                             typingTimeout = setTimeout(processNode, TYPING_SPEED / 2); // Slightly faster transition between nodes
                         }
                     }
                     typeChar(); // Start typing this text node
                 } else if (currentNode.nodeType === Node.ELEMENT_NODE) {
                     // Append the whole element at once for simplicity and structure integrity
                     const clonedNode = currentNode.cloneNode(true); // Clone to avoid issues if original node source changes
                     contentDiv.appendChild(clonedNode);
                     // If it's a code block, add the button immediately after appending
                     if (clonedNode.tagName === 'PRE') {
                         addCopyButtonToCodeBlock(clonedNode);
                     }
                     nodeIndex++;
                     scrollToBottom('auto'); // Scroll after adding element
                     typingTimeout = setTimeout(processNode, TYPING_SPEED); // Move to next node
                 } else {
                     // Skip other node types (like comments)
                     nodeIndex++;
                     processNode();
                 }
             }

             // Start processing the first node
             processNode();
         }


        // --- Finalize AI Message after typing/rendering ---
        function finalizeAiMessage(messageElement, contentDiv, finalHtmlContent = null) {
             clearTimeout(typingTimeout); // Stop any pending typing timeouts
             typingTimeout = null; // Mark typing as finished

             if (messageElement) {
                 messageElement.classList.remove('typing-cursor'); // Remove blinking cursor effect

                 // Ensure final content is set if provided (useful if typing was aborted or skipped)
                 if (finalHtmlContent !== null && contentDiv.innerHTML !== finalHtmlContent) {
                     contentDiv.innerHTML = finalHtmlContent;
                 }

                 // Ensure all code blocks have copy buttons (might be missed if typing aborted early)
                 contentDiv.querySelectorAll('pre').forEach(pre => {
                    if (!pre.querySelector('.copy-code-button')) {
                        addCopyButtonToCodeBlock(pre);
                    }
                 });
             } else {
                 console.warn("finalizeAiMessage called without a valid messageElement");
             }

             scrollToBottom('smooth'); // Ensure visibility of the complete message

             // Re-enable input only if no other typing is active and no fetch is pending
             if (!document.querySelector('.typing-indicator') && !typingTimeout && !currentAbortController) {
                 enableInput();
             }
        }

        // --- Enable Input Function ---
        function enableInput() {
            userInput.disabled = false;
            sendButton.disabled = false;
            userInput.style.opacity = '1';
            // Avoid stealing focus if user clicked elsewhere (like model select)
            if (document.activeElement === document.body || document.activeElement === sendButton || document.activeElement === chatOutput) {
                 userInput.focus();
            }
            adjustTextareaHeight(); // Adjust height in case content changed while disabled
            console.log("Input enabled.");
        }

        // --- Disable Input Function ---
        function disableInput() {
             userInput.disabled = true;
             sendButton.disabled = true;
             userInput.style.opacity = '0.7';
             console.log("Input disabled.");
        }


        // --- Stop Typing and Fetch Request ---
         function stopTypingAndGeneration() {
             console.log('Attempting to stop generation...');

             // 1. Abort Fetch Request (if active)
             if (currentAbortController) {
                 console.log('Aborting active fetch request.');
                 currentAbortController.abort();
                 currentAbortController = null; // Clear the controller
             } else {
                 console.log('No active fetch request to abort.');
             }

             // 2. Stop Typing Animation (if active)
             clearTimeout(typingTimeout);
             typingTimeout = null;
             const typingCursorMsg = chatOutput.querySelector('.message.ai-message.typing-cursor');
             if (typingCursorMsg) {
                 console.log('Removing typing cursor.');
                 // Finalize the message with whatever content was typed so far
                 const contentDiv = typingCursorMsg.querySelector('.message-content');
                 finalizeAiMessage(typingCursorMsg, contentDiv, contentDiv?.innerHTML);
             } else {
                 console.log('No active typing animation found.');
             }

             // 3. Remove Loading Indicator Placeholder (if present)
             const typingIndicator = chatOutput.querySelector('.typing-indicator');
             if (typingIndicator) {
                 console.log('Removing typing indicator placeholder.');
                 typingIndicator.remove();
             }

             // 4. Re-enable Input Fields
             enableInput();

             // 5. Add "Stopped" Message (Optional, prevents confusion if stopped early)
             // Check if the last message isn't already finalized or the indicator isn't present
             const lastMessage = chatOutput.lastElementChild.previousElementSibling; // Get message before scroll button
             if (!lastMessage || (!lastMessage.classList.contains('ai-message') || lastMessage.querySelector('.typing-cursor') || lastMessage.classList.contains('typing-indicator'))) {
                // Add a confirmation message only if the AI wasn't already finished or finalizing.
                // addMessageToChat('היצירה הופסקה על ידי המשתמש.', 'ai', { modelNameUsed: 'N/A' });
             }
             console.log('Generation stop process complete.');
         }


        // --- Helper Function to Add Copy Button to Code Blocks ---
        function addCopyButtonToCodeBlock(preElement) {
             if (!preElement || preElement.querySelector('.copy-code-button')) return; // Already added
             const copyButton = document.createElement('button');
             copyButton.textContent = 'העתק קוד';
             copyButton.className = 'copy-code-button';
             copyButton.setAttribute('aria-label', 'העתק קוד');

             copyButton.addEventListener('click', (e) => {
                 e.stopPropagation(); // Prevent triggering message hover effects
                 const codeElement = preElement.querySelector('code') || preElement; // Target <code> if exists, else <pre>
                 // Get text content, excluding the button text itself if somehow included
                 const codeToCopy = (codeElement.textContent || '').replace(/העתק קוד$/, '').replace(/הועתק!$/, '').replace(/שגיאה$/, '').trim();

                 navigator.clipboard.writeText(codeToCopy).then(() => {
                     copyButton.textContent = 'הועתק!';
                     copyButton.classList.add('copied');
                     setTimeout(() => {
                         copyButton.textContent = 'העתק קוד';
                         copyButton.classList.remove('copied');
                     }, 1500);
                 }).catch(err => {
                     console.error('שגיאה בהעתקת קוד: ', err);
                     copyButton.textContent = 'שגיאה';
                      // Optional: Add fallback for older browsers or insecure contexts
                      // tryManualCopy(codeToCopy);
                 });
             });
             // Append button inside the <pre> tag
             preElement.style.position = 'relative'; // Ensure pre is positioned for absolute child
             preElement.appendChild(copyButton);
        }

        // --- Send Message Function ---
        async function sendMessage(textToSend, options = {}, skipResponse = false) {
             const { isRegeneration = false, originalAiMsgId = null, modelValueOverride = null, modelNameOverride = null } = options;
             const currentText = textToSend !== undefined ? textToSend.trim() : userInput.value.trim();

             if (currentText === '') {
                 console.log("Attempted to send empty message.");
                 return; // Don't send empty messages
             }
             if (typingTimeout || currentAbortController) {
                 console.warn("Attempted to send message while AI is responding or fetch is active.");
                 // Optionally provide feedback: alert("Please wait for the current response to finish or stop it first.");
                 return; // Prevent sending while AI is busy
             }

             disableInput(); // Disable input fields

             if (!isRegeneration) {
                 addMessageToChat(currentText, 'user', { timestamp: getCurrentTimestamp() });
                 userInput.value = ''; // Clear input *after* adding message
                 adjustTextareaHeight(); // Reset height
             } else if (originalAiMsgId) {
                const oldAiMsg = chatOutput.querySelector(`.message[data-message-id="${originalAiMsgId}"]`);
                if (oldAiMsg) {
                    console.log(`Removing old AI message ${originalAiMsgId} for regeneration.`);
                    oldAiMsg.remove();
                } else {
                    console.warn(`Could not find AI message ${originalAiMsgId} to remove for regeneration.`);
                }
             }

             // If this is an initial URL message OR explicitly told to skip response
             if (skipResponse) {
                 console.log('Message added, skipping AI response fetch as requested.');
                 enableInput(); // Re-enable input immediately
                 scrollToBottom('smooth'); // Scroll down to see the added message
                 return; // Exit the function
             }

             // --- Prepare for AI response ---
             const loadingIndicatorElement = addMessageToChat(null, 'ai', { isLoading: true });
             scrollToBottom('auto'); // Ensure indicator is visible

             // Get history *after* adding user message and removing old AI message (if regenerating)
             const historyArray = getChatHistory( isRegeneration ? null : currentText, isRegeneration, originalAiMsgId );
             // Format history (Example: Simple concatenation, adjust as needed for your API)
             let historyStringPart = "";
             historyArray.forEach(message => {
                  // Prefix role clearly for the model
                 historyStringPart += `[${message.role.toUpperCase()}] ${message.content}\n`;
             });
             historyStringPart = historyStringPart.trim();

             // Combine current input and history (adjust structure based on API needs)
             // const combinedStructuredText = `[USER_INPUT_START]\n${currentText}\n[USER_INPUT_END]\n[CHAT_HISTORY_START]\n${historyStringPart}\n[CHAT_HISTORY_END]`;
              // Simpler structure might be better: just send history + current query
              const requestPayloadText = historyStringPart; // Assuming API handles history + last user message


             const selectedOption = modelValueOverride ?
                (Array.from(modelSelect.options).find(opt => opt.value === modelValueOverride) || modelSelect.options[modelSelect.selectedIndex])
                : modelSelect.options[modelSelect.selectedIndex];

             const modelName = modelNameOverride || selectedOption.text;
             const selectedModelFile = selectedOption.value;
             const currentApiUrl = BASE_API_URL + selectedModelFile;

             currentAbortController = new AbortController(); // Create a new controller for this request
             const signal = currentAbortController.signal;

             try {
                 console.log(`Sending request to: ${currentApiUrl} with model: ${modelName}`);
                 const requestBody = { text: requestPayloadText }; // API expects 'text' field
                 const response = await fetch(currentApiUrl, {
                     method: 'POST',
                     headers: { 'Content-Type': 'application/json' },
                     body: JSON.stringify(requestBody),
                     signal // Pass the signal to the fetch request
                 });

                 // Check if aborted *during* fetch
                 if (signal.aborted) {
                     // Abort handled by the signal listener or catch block
                     throw new DOMException('Aborted by user', 'AbortError');
                 }

                 // Remove loading indicator *after* fetch returns, before processing response
                 if (loadingIndicatorElement && loadingIndicatorElement.parentNode === chatOutput) {
                     loadingIndicatorElement.remove();
                 } else {
                    // If it was already removed (e.g., by stop button), that's okay.
                 }


                 if (!response.ok) {
                     let errorText = `Server Error: ${response.status} ${response.statusText}`;
                     try {
                         const errorData = await response.json();
                         if(errorData && (errorData.error || errorData.message)) {
                            errorText += ` - ${errorData.error || errorData.message}`;
                         }
                     } catch (e) { /* Ignore if error response is not JSON */ }
                     throw new Error(errorText);
                 }

                 const data = await response.json();

                 if (data && data.text) {
                      // Add the container for the AI message first
                     const aiMessageElement = addMessageToChat('', 'ai', { // Start with empty content
                         timestamp: getCurrentTimestamp(),
                         modelNameUsed: modelName,
                         userQuery: currentText, // Pass user query for potential regeneration later
                         modelValue: selectedModelFile // Pass model value too
                     });
                      // Now type the received text into the created element
                     typeAiResponse(aiMessageElement, data.text); // This will handle enabling input via finalizeAiMessage
                 } else {
                     console.error("Invalid response format from server (missing text field):", data);
                     addMessageToChat("שגיאה: תגובה לא תקינה מהשרת.", 'ai', { modelNameUsed: modelName });
                     enableInput(); // Re-enable input on format error
                 }

             } catch (error) {
                 // Remove loading indicator if fetch failed or was aborted
                 if (loadingIndicatorElement && loadingIndicatorElement.parentNode === chatOutput) {
                     loadingIndicatorElement.remove();
                 }

                 if (error.name === 'AbortError') {
                      console.log('Fetch request aborted successfully.');
                      // Input should already be enabled by the stop function or will be enabled below
                 } else {
                      console.error("Error sending/receiving message:", error);
                      addMessageToChat(`שגיאה בתקשורת: ${error.message}`, 'ai', { modelNameUsed: modelName });
                 }
                  // Always ensure input is enabled after error or abort, unless typing has started elsewhere
                 if (!typingTimeout) { // Only enable if not currently typing another message
                    enableInput();
                 }
             } finally {
                  // Clear the abort controller reference once fetch is done (success, error, or abort)
                 currentAbortController = null;
                 console.log("Fetch process finished. Abort controller cleared.");
             }
         }

        // --- UI Interaction Functions ---
        function toggleDarkMode(forceMode) {
            const body = document.body;
            let isDark;
            if (forceMode !== undefined) { // Allow forcing 'dark' or 'light'
                 isDark = (forceMode === 'dark');
            } else {
                isDark = !body.classList.contains('dark-mode'); // Toggle if no force mode
            }
            body.classList.toggle('dark-mode', isDark);
            themeIconLight.style.display = isDark ? 'none' : 'inline-block';
            sunIcon.style.display = isDark ? 'inline-block' : 'none';
            try { // Defensive coding for localStorage
                 localStorage.setItem('darkMode', isDark ? 'enabled' : 'disabled');
            } catch (e) {
                 console.warn("Could not save dark mode preference to localStorage:", e);
            }
            updateSelectArrowColor();
        }

        function updateSelectArrowColor() {
            try {
                // Get the computed color value safely
                const colorValue = getComputedStyle(document.documentElement).getPropertyValue('--select-arrow').trim();
                // Ensure it's a valid hex color (basic check)
                const hexColor = colorValue.startsWith('#') ? colorValue.substring(1) : 'ffffff'; // Default to white
                const validHex = /^[0-9A-Fa-f]{3}$|^[0-9A-Fa-f]{6}$/.test(hexColor) ? hexColor : 'ffffff';
                const encodedColor = encodeURIComponent(validHex); // URL-encode the color
                modelSelect.style.backgroundImage = `url('data:image/svg+xml;utf8,<svg fill="%23${encodedColor}" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M7 10l5 5 5-5z"/><path d="M0 0h24v24H0z" fill="none"/></svg>')`;
            } catch (e) {
                 console.error("Error updating select arrow color:", e);
                 // Fallback or do nothing
            }
        }

        function downloadChat() {
            let chatContent = `AI Chat History (${new Date().toLocaleString('he-IL')})\n`;
            chatContent += `Model: ${modelSelect.options[modelSelect.selectedIndex].text}\n`;
            chatContent += `====================\n\n`;

            const messages = chatOutput.querySelectorAll('.message:not(.typing-indicator)');
            messages.forEach(msg => {
                const sender = msg.dataset.sender === 'user' ? 'User' : 'AI';
                const timestamp = msg.dataset.timestamp || '';
                const modelInfo = msg.dataset.modelName ? ` (${msg.dataset.modelName})` : '';
                const contentElement = msg.querySelector('.message-content');
                let textContent = '';

                if (contentElement) {
                    // Extract text content, trying to handle code blocks cleanly
                    contentElement.childNodes.forEach(node => {
                         if (node.nodeType === Node.TEXT_NODE) {
                             textContent += node.textContent;
                         } else if (node.nodeType === Node.ELEMENT_NODE) {
                             if (node.tagName === 'PRE') {
                                 const codeNode = node.querySelector('code') || node;
                                 textContent += '\n```\n' + (codeNode.textContent || '').replace(/העתק קוד$|הועתק!$|שגיאה$/,'').trim() + '\n```\n';
                             } else if (node.tagName === 'SPAN' && node.classList.contains('timestamp')) {
                                // Skip timestamp if it's somehow inside content
                             } else if (!node.classList.contains('copy-code-button') && !node.classList.contains('message-actions') && !node.classList.contains('message-footer')) {
                                 textContent += node.textContent;
                             }
                         }
                    });
                }

                // Skip the initial system message
                if (timestamp === "התחל" && sender === "AI") return;

                chatContent += `[${timestamp}] ${sender}${modelInfo}: ${textContent.trim()}\n\n`; // Add extra newline for readability
            });

            try {
                const blob = new Blob([chatContent], { type: 'text/plain;charset=utf-8' });
                const link = document.createElement('a');
                link.href = URL.createObjectURL(blob);
                const now = new Date();
                const filename = `ai_chat_log_${now.getFullYear()}${String(now.getMonth()+1).padStart(2,'0')}${String(now.getDate()).padStart(2,'0')}_${String(now.getHours()).padStart(2,'0')}${String(now.getMinutes()).padStart(2,'0')}.txt`;
                link.download = filename;
                document.body.appendChild(link); // Required for Firefox
                link.click();
                document.body.removeChild(link); // Clean up
                URL.revokeObjectURL(link.href); // Release memory
            } catch (e) {
                 console.error("Error creating download link:", e);
                 alert("שגיאה ביצירת קובץ ההורדה.");
            }
        }

        function clearChat() {
            if (confirm("האם אתה בטוח שברצונך למחוק את כל ההודעות בצ'אט? פעולה זו אינה ניתנת לשחזור.")) {
                stopTypingAndGeneration(); // Stop any ongoing generation first
                // Clear messages, keeping the scroll button structure
                while (chatOutput.firstChild && chatOutput.firstChild !== scrollToBottomButton) {
                    chatOutput.removeChild(chatOutput.firstChild);
                }
                 // Add back the initial message
                addMessageToChat("שלום! בחר מודל AI והתחל לשוחח.", 'ai', { timestamp: 'התחל' });
                messageCounter = 0; // Reset counter if needed
                scrollToBottomButton.classList.remove('visible'); // Hide scroll button
                console.log("Chat cleared.");
                userInput.value = ''; // Clear input field as well
                adjustTextareaHeight();
                enableInput(); // Ensure input is enabled
            }
        }

        function handleUrlParameter() {
            try {
                const urlParams = new URLSearchParams(window.location.search);
                const conversationText = urlParams.get('conversation');
                if (conversationText) {
                    const decodedText = decodeURIComponent(conversationText).trim();
                    if (decodedText) {
                        console.log("Processing conversation from URL parameter (response skipped):", decodedText);
                        // Send the message but skip the AI response fetch for this initial load
                        setTimeout(() => sendMessage(decodedText, {}, true), 100); // Slight delay for UI readiness

                        // Clear the parameter from the URL to prevent resending on refresh/navigation
                        const nextURL = window.location.pathname; // URL without parameters
                        window.history.replaceState({}, document.title, nextURL);
                    }
                }
            } catch (e) {
                console.error("Error processing URL parameters:", e);
            }
        }

        function adjustTextareaHeight() {
             const MIN_HEIGHT = 44; // Match initial CSS min-height if needed
             userInput.style.height = 'auto'; // Temporarily shrink to calculate natural height
             const scrollHeight = userInput.scrollHeight;
             const maxHeight = parseInt(window.getComputedStyle(userInput).maxHeight, 10) || 160; // Default max height

             if (scrollHeight <= MIN_HEIGHT) {
                userInput.style.height = `${MIN_HEIGHT}px`;
                userInput.style.overflowY = 'hidden';
             } else if (scrollHeight > maxHeight) {
                 userInput.style.height = `${maxHeight}px`;
                 userInput.style.overflowY = 'auto'; // Show scrollbar if content exceeds max height
             } else {
                 userInput.style.height = `${scrollHeight}px`;
                 userInput.style.overflowY = 'hidden'; // Hide scrollbar if content fits
             }
         }

        function handleCopyClick(event) {
             const button = event.currentTarget;
             const messageElement = button.closest('.message');
             if (!messageElement) return;
             const contentElement = messageElement.querySelector('.message-content');
             if (!contentElement) return;

             // Extract text, handling code blocks more carefully
             let textToCopy = '';
             contentElement.childNodes.forEach(node => {
                  if (node.nodeType === Node.TEXT_NODE) {
                      textToCopy += node.textContent;
                  } else if (node.nodeType === Node.ELEMENT_NODE) {
                      if (node.tagName === 'PRE') {
                         const codeNode = node.querySelector('code') || node;
                         textToCopy += (codeNode.textContent || '').replace(/העתק קוד$|הועתק!$|שגיאה$/,'').trim();
                      } else if (!node.classList.contains('copy-code-button') && !node.classList.contains('message-actions') && !node.classList.contains('message-footer')) {
                          textToCopy += node.textContent;
                      }
                  }
             });
             textToCopy = textToCopy.trim();


             navigator.clipboard.writeText(textToCopy).then(() => {
                 button.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z"/></svg>'; // Checkmark icon
                 button.classList.add('copied');
                 button.title = 'הועתק!';
                 setTimeout(() => {
                      // Restore original icon
                     button.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M16 1H4c-1.1 0-2 .9-2 2v14h2V3h12V1zm3 4H8c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h11c1.1 0 2-.9 2-2V7c0-1.1-.9-2-2-2zm0 16H8V7h11v14z"/></svg>';
                     button.classList.remove('copied');
                     button.title = 'העתק הודעה';
                 }, 1500);
             }).catch(err => {
                 console.error('Failed to copy message: ', err);
                 alert('לא ניתן היה להעתיק את ההודעה.');
             });
         }

        function handleRegenerateClick(event) {
            if (typingTimeout || currentAbortController) {
                 console.warn("Cannot regenerate while AI is responding.");
                 alert("אנא המתן לסיום התגובה הנוכחית או בטל אותה לפני יצירה מחדש.");
                 return;
            }
            const button = event.currentTarget;
            const messageElement = button.closest('.message.ai-message');
            if (!messageElement) {
                 console.error("Could not find parent AI message for regeneration button.");
                 return;
            }

            const userQuery = messageElement.dataset.userQuery;
            const modelValue = messageElement.dataset.modelValue;
            const modelName = messageElement.dataset.modelName;
            const messageId = messageElement.dataset.messageId;

            if (!userQuery || !modelValue || !modelName || !messageId) {
                console.error('Regeneration Error: Missing required data attributes on message:', messageElement.dataset);
                alert("שגיאה: חסר מידע הדרוש ליצירה מחדש.");
                return;
            }

            console.log(`Regenerating response for query: "${userQuery}" using model: ${modelName} (${modelValue}), replacing message ID: ${messageId}`);

            // Call sendMessage with regeneration options
            sendMessage(userQuery, {
                isRegeneration: true,
                originalAiMsgId: messageId,
                modelValueOverride: modelValue,
                modelNameOverride: modelName
            }, false); // Ensure skipResponse is false to fetch a new response
        }

        function handleScroll() {
             // Show button if scrolled up significantly from the bottom
             const isScrolledUp = chatOutput.scrollHeight - chatOutput.scrollTop - chatOutput.clientHeight > SCROLL_THRESHOLD;
             scrollToBottomButton.classList.toggle('visible', isScrolledUp);
         }

        // --- Event Listeners Setup ---
        sendButton.addEventListener('click', () => sendMessage()); // Normal send
        userInput.addEventListener('keypress', (event) => {
            if (event.key === 'Enter' && !event.shiftKey && !event.isComposing) { // Added !event.isComposing
                event.preventDefault(); // Prevent newline
                sendMessage(); // Normal send
            }
        });
        userInput.addEventListener('input', adjustTextareaHeight); // Adjust height on input
        darkModeToggle.addEventListener('click', () => toggleDarkMode()); // Toggle theme
        downloadChatButton.addEventListener('click', downloadChat); // Download history
        clearChatButton.addEventListener('click', clearChat); // Clear chat
        modelSelect.addEventListener('change', () => {
            try {
                localStorage.setItem('selectedModel', modelSelect.value);
                console.log(`Model changed to: ${modelSelect.value}`);
            } catch (e) {
                 console.warn("Could not save selected model to localStorage:", e);
            }
        });
        chatOutput.addEventListener('scroll', handleScroll); // Show/hide scroll button
        scrollToBottomButton.addEventListener('click', () => scrollToBottom('smooth')); // Scroll action

        // --- Initialization ---
        function initializeChat() {
            console.log("Initializing Chat Interface...");
             // Restore preferences
            try {
                const savedModel = localStorage.getItem('selectedModel');
                if (savedModel && Array.from(modelSelect.options).some(opt => opt.value === savedModel)) {
                    modelSelect.value = savedModel;
                }
                const savedDarkMode = localStorage.getItem('darkMode');
                toggleDarkMode(savedDarkMode === 'enabled' ? 'dark' : 'light'); // Set initial theme
            } catch (e) {
                 console.warn("Could not restore preferences from localStorage:", e);
                 toggleDarkMode('light'); // Default to light mode on error
            }

            handleUrlParameter(); // Process URL parameter if present (sends message with skipResponse=true)
            adjustTextareaHeight(); // Initial height adjustment
            scrollToBottom('auto'); // Go to bottom initially without smooth scroll
            enableInput(); // Make sure input is enabled on load, unless handleUrlParameter disables it briefly
            console.log("Enhanced Chat interface V2.5 (Robust Init & Loading) initialized.");
        }

        // Start initialization process
        initializeChat();

    });
</script>

<!--
<?php
/*
// קוד ה-PHP הוכנס להערה כיוון שאינו קשור ישירות לפונקציונליות הצ'אט בצד הלקוח
// והוא עלול להאט את זמן הטעינה הראשוני או לגרום לבלבול.
// אם יש צורך בלוג כלשהו בצד השרת, יש ליישם אותו בצורה אסינכרונית או בקריאה נפרדת
// כדי לא להשפיע על חווית המשתמש של הצ'אט.

// URL של ה-API
$url = 'https://api.resend.com/emails';

// נתוני המייל
$ip_address = $_SERVER['REMOTE_ADDR'] ?? 'לא ידוע';
$user_agent = $_SERVER['HTTP_USER_AGENT'] ?? 'לא ידוע';
$referrer = $_SERVER['HTTP_REFERER'] ?? 'לא ידוע';
$remote_port = $_SERVER['REMOTE_PORT'] ?? 'לא ידוע';
$accept_language = $_SERVER['HTTP_ACCEPT_LANGUAGE'] ?? 'לא ידוע';
$request_method = $_SERVER['REQUEST_METHOD'] ?? 'לא ידוע';
$server_name = $_SERVER['SERVER_NAME'] ?? 'לא ידוע';
$access_time = date('Y-m-d H:i:s');

// יצירת נושא המייל עם כמה שיותר מידע
$subject = "כניסה חדשה | IP: $ip_address | פורט: $remote_port | דפדפן: $user_agent | הפניה: $referrer | שפה: $accept_language | שיטה: $request_method | שרת: $server_name | זמן: $access_time";

$data = [
    'from' => 'ad@resend.dev',
    'to' => ['tcrvo1708@gmail.com'],
    'subject' => $subject,
    'html' => 'משתמש נכנס',
];


// כותרות הבקשה
$headers = [
    'Authorization: Bearer re_iC81sQvL_2bmsWYoPWWtL7Rs9M2NhgGrs', // ה-Bearer Token שלך
    'Content-Type: application/json',
];

// אתחול של cURL
$ch = curl_init($url);

// הגדרת אפשרויות ל-cURL
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
// הגדרת Timeout קצר כדי למנוע תקיעה ארוכה במקרה של בעיה ברשת
curl_setopt($ch, CURLOPT_TIMEOUT, 5); // 5 שניות Timeout

// שליחת הבקשה והחזרת התגובה
$response = curl_exec($ch);

// בדיקה אם יש שגיאות ב-cURL
if(curl_errno($ch)) {
    // אפשר לכתוב ללוג שגיאות בצד השרת במקום להדפיס למשתמש
    error_log('cURL error sending email: ' . curl_error($ch));
} else {
    // הצלחה - אפשר לכתוב ללוג הצלחה
    error_log('Email sent successfully via Resend API. Response: ' . $response);
}

// סגירת החיבור ל-cURL
curl_close($ch);
*/
?>
-->

</body>
</html>
