<!DOCTYPE html>
<html lang="he" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>צ'אט AI משופר</title>
    <style>
        /* --- משתני עיצוב גלובליים --- */
        :root {
            --font-main: Assistant, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            --font-code: 'Consolas', 'Monaco', 'Courier New', monospace;
            --border-radius-small: 4px;
            --border-radius-medium: 8px;
            --border-radius-large: 18px; /* מעוגל יותר */
            --border-radius-round: 50%;
            --transition-fast: 0.15s ease;
            --transition-medium: 0.3s ease;
            --transition-slow: 0.5s ease;
            --avatar-size: 32px; /* גודל אווטאר */

            /* --- Light Mode --- */
            --lm-bg-default: #e5ddd5;
            --lm-chat-bg: #ffffff;
            --lm-header-bg: #00a884;
            --lm-header-text: #ffffff;
            --lm-header-icon-fill: #ffffff;
            --lm-user-msg-bg: #dcf8c6;
            --lm-ai-msg-bg: #ffffff;
            --lm-msg-text: #111b21; /* טקסט הודעה מעט כהה יותר */
            --lm-input-area-bg: #f0f2f5;
            --lm-input-bg: #ffffff;
            --lm-input-text: #111b21;
            --lm-input-border: #e0e0e0;
            --lm-input-border-focus: var(--lm-button-bg);
            --lm-button-bg: #008069;
            --lm-button-hover-bg: #00a884;
            --lm-button-active-bg: #005c4b;
            --lm-button-icon-fill: #ffffff;
            --lm-timestamp-color: rgba(17, 27, 33, 0.6); /* מעט פחות שקוף */
            --lm-model-indicator-color: rgba(17, 27, 33, 0.5);
            --lm-border-color: #e9edef;
            --lm-icon-button-hover-bg: rgba(0, 0, 0, 0.07);
            --lm-msg-action-icon-fill: rgba(0, 0, 0, 0.55); /* טיפה כהה יותר */
            --lm-msg-action-icon-hover-fill: #000000;
            --lm-msg-action-icon-hover-bg: rgba(0, 0, 0, 0.09);
            --lm-scrollbar-thumb: #b0b0b0;
            --lm-scrollbar-track: transparent; /* רקע פס גלילה שקוף */
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
            --lm-shadow-light: 0 1px 1px rgba(0, 0, 0, 0.05); /* צל עדין יותר */
            --lm-shadow-medium: 0 2px 4px rgba(0, 0, 0, 0.08);
            --lm-scroll-btn-bg: rgba(255, 255, 255, 0.9);
            --lm-scroll-btn-icon: #54656f;
            --lm-scroll-btn-hover-bg: #ffffff;
            --lm-popover-bg: #ffffff;
            --lm-popover-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            --lm-popover-border: #e0e0e0;
            --lm-menu-item-hover-bg: #f0f0f0;
            --lm-counter-bg: #f44336;
            --lm-counter-text: #ffffff;
            --lm-avatar-bg: #e0e0e0;
            --lm-whatsapp-bg-image: url('https://user-images.githubusercontent.com/15075759/28719144-86dc0f70-73b1-11e7-911d-60d70fcded21.png');
            --lm-attach-icon-fill: #54656f;

            /* --- Dark Mode --- */
            --dm-bg-default: #111b21;
            --dm-chat-bg: #0b141a;
            --dm-header-bg: #202c33;
            --dm-header-text: #e9edef;
            --dm-header-icon-fill: #aebac1;
            --dm-user-msg-bg: #005c4b;
            --dm-ai-msg-bg: #202c33;
            --dm-msg-text: #e9edef;
            --dm-input-area-bg: #1f2c34;
            --dm-input-bg: #2a3942;
            --dm-input-text: #e9edef;
            --dm-input-border: #374151;
            --dm-input-border-focus: var(--dm-button-bg);
            --dm-button-bg: #00a884;
            --dm-button-hover-bg: #008069;
            --dm-button-active-bg: #00a884;
            --dm-button-icon-fill: #111b21;
            --dm-timestamp-color: rgba(233, 237, 239, 0.65);
            --dm-model-indicator-color: rgba(233, 237, 239, 0.55);
            --dm-border-color: #2a3942;
            --dm-icon-button-hover-bg: rgba(255, 255, 255, 0.08);
            --dm-msg-action-icon-fill: rgba(255, 255, 255, 0.65);
            --dm-msg-action-icon-hover-fill: #ffffff;
            --dm-msg-action-icon-hover-bg: rgba(255, 255, 255, 0.1);
            --dm-scrollbar-thumb: #4a4a4a;
            --dm-scrollbar-track: transparent;
            --dm-link-color: #58a6ff;
            --dm-code-bg: #182128;
            --dm-code-text: #d1d5db;
            --dm-code-border: #374151;
            --dm-code-copy-btn-bg: rgba(255, 255, 255, 0.1);
            --dm-code-copy-btn-hover-bg: rgba(255, 255, 255, 0.15);
            --dm-code-copy-btn-copied-bg: var(--dm-button-bg);
            --dm-code-copy-btn-copied-text: #111b21;
            --dm-loading-spinner-color1: #25d366;
            --dm-loading-spinner-color2: #005c4b;
            --dm-shadow-light: 0 1px 1px rgba(0, 0, 0, 0.3);
            --dm-shadow-medium: 0 3px 6px rgba(0, 0, 0, 0.4);
            --dm-scroll-btn-bg: rgba(42, 57, 66, 0.9);
            --dm-scroll-btn-icon: #aebac1;
            --dm-scroll-btn-hover-bg: #2a3942;
            --dm-popover-bg: #2a3942;
            --dm-popover-shadow: 0 4px 12px rgba(0, 0, 0, 0.4);
            --dm-popover-border: #374151;
            --dm-menu-item-hover-bg: #374151;
            --dm-counter-bg: #d32f2f; /* אדום קצת פחות בוהק */
            --dm-counter-text: #ffffff;
            --dm-avatar-bg: #374151;
            /* דפוס רקע עדין למצב כהה */
            --dm-whatsapp-bg-image: radial-gradient(circle, rgba(255,255,255,0.02) 1px, transparent 1px), radial-gradient(circle, rgba(255,255,255,0.02) 1px, transparent 1px);
            --dm-whatsapp-bg-size: 30px 30px;
            --dm-whatsapp-bg-pos: 0 0, 15px 15px;
            --dm-attach-icon-fill: #aebac1;

            /* --- Default Theme (Light) --- */
             --bg-default: var(--lm-bg-default); --chat-bg: var(--lm-chat-bg); --header-bg: var(--lm-header-bg); --header-text: var(--lm-header-text); --header-icon-fill: var(--lm-header-icon-fill); --user-msg-bg: var(--lm-user-msg-bg); --ai-msg-bg: var(--lm-ai-msg-bg); --msg-text: var(--lm-msg-text); --input-area-bg: var(--lm-input-area-bg); --input-bg: var(--lm-input-bg); --input-text: var(--lm-input-text); --input-border: var(--lm-input-border); --input-border-focus: var(--lm-input-border-focus); --button-bg: var(--lm-button-bg); --button-hover-bg: var(--lm-button-hover-bg); --button-active-bg: var(--lm-button-active-bg); --button-icon-fill: var(--lm-button-icon-fill); --timestamp-color: var(--lm-timestamp-color); --model-indicator-color: var(--lm-model-indicator-color); --border-color: var(--lm-border-color); --icon-button-hover-bg: var(--lm-icon-button-hover-bg); --msg-action-icon-fill: var(--lm-msg-action-icon-fill); --msg-action-icon-hover-fill: var(--lm-msg-action-icon-hover-fill); --msg-action-icon-hover-bg: var(--lm-msg-action-icon-hover-bg); --scrollbar-thumb: var(--lm-scrollbar-thumb); --scrollbar-track: var(--lm-scrollbar-track); --link-color: var(--lm-link-color); --code-bg: var(--lm-code-bg); --code-text: var(--lm-code-text); --code-border: var(--lm-code-border); --code-copy-btn-bg: var(--lm-code-copy-btn-bg); --code-copy-btn-hover-bg: var(--lm-code-copy-btn-hover-bg); --code-copy-btn-copied-bg: var(--lm-code-copy-btn-copied-bg); --code-copy-btn-copied-text: var(--lm-code-copy-btn-copied-text); --loading-spinner-color1: var(--lm-loading-spinner-color1); --loading-spinner-color2: var(--lm-loading-spinner-color2); --shadow-light: var(--lm-shadow-light); --shadow-medium: var(--lm-shadow-medium); --scroll-btn-bg: var(--lm-scroll-btn-bg); --scroll-btn-icon: var(--lm-scroll-btn-icon); --scroll-btn-hover-bg: var(--lm-scroll-btn-hover-bg); --popover-bg: var(--lm-popover-bg); --popover-shadow: var(--lm-popover-shadow); --popover-border: var(--lm-popover-border); --menu-item-hover-bg: var(--lm-menu-item-hover-bg); --counter-bg: var(--lm-counter-bg); --counter-text: var(--lm-counter-text); --avatar-bg: var(--lm-avatar-bg); --whatsapp-bg-image: var(--lm-whatsapp-bg-image); --attach-icon-fill: var(--lm-attach-icon-fill);
        }
        body.dark-mode {
             --bg-default: var(--dm-bg-default); --chat-bg: var(--dm-chat-bg); --header-bg: var(--dm-header-bg); --header-text: var(--dm-header-text); --header-icon-fill: var(--dm-header-icon-fill); --user-msg-bg: var(--dm-user-msg-bg); --ai-msg-bg: var(--dm-ai-msg-bg); --msg-text: var(--dm-msg-text); --input-area-bg: var(--dm-input-area-bg); --input-bg: var(--dm-input-bg); --input-text: var(--dm-input-text); --input-border: var(--dm-input-border); --input-border-focus: var(--dm-input-border-focus); --button-bg: var(--dm-button-bg); --button-hover-bg: var(--dm-button-hover-bg); --button-active-bg: var(--dm-button-active-bg); --button-icon-fill: var(--dm-button-icon-fill); --timestamp-color: var(--dm-timestamp-color); --model-indicator-color: var(--dm-model-indicator-color); --border-color: var(--dm-border-color); --icon-button-hover-bg: var(--dm-icon-button-hover-bg); --msg-action-icon-fill: var(--dm-msg-action-icon-fill); --msg-action-icon-hover-fill: var(--dm-msg-action-icon-hover-fill); --msg-action-icon-hover-bg: var(--dm-msg-action-icon-hover-bg); --scrollbar-thumb: var(--dm-scrollbar-thumb); --scrollbar-track: var(--dm-scrollbar-track); --link-color: var(--dm-link-color); --code-bg: var(--dm-code-bg); --code-text: var(--dm-code-text); --code-border: var(--dm-code-border); --code-copy-btn-bg: var(--dm-code-copy-btn-bg); --code-copy-btn-hover-bg: var(--dm-code-copy-btn-hover-bg); --code-copy-btn-copied-bg: var(--dm-code-copy-btn-copied-bg); --code-copy-btn-copied-text: var(--dm-code-copy-btn-copied-text); --loading-spinner-color1: var(--dm-loading-spinner-color1); --loading-spinner-color2: var(--dm-loading-spinner-color2); --shadow-light: var(--dm-shadow-light); --shadow-medium: var(--dm-shadow-medium); --scroll-btn-bg: var(--dm-scroll-btn-bg); --scroll-btn-icon: var(--dm-scroll-btn-icon); --scroll-btn-hover-bg: var(--dm-scroll-btn-hover-bg); --popover-bg: var(--dm-popover-bg); --popover-shadow: var(--dm-popover-shadow); --popover-border: var(--dm-popover-border); --menu-item-hover-bg: var(--dm-menu-item-hover-bg); --counter-bg: var(--dm-counter-bg); --counter-text: var(--dm-counter-text); --avatar-bg: var(--dm-avatar-bg); --whatsapp-bg-image: var(--dm-whatsapp-bg-image); --whatsapp-bg-size: var(--dm-whatsapp-bg-size); --whatsapp-bg-pos: var(--dm-whatsapp-bg-pos); --attach-icon-fill: var(--dm-attach-icon-fill);
        }

        /* --- Base Styles --- */
        html, body { height: 100%; margin: 0; padding: 0; overflow: hidden; }
        body { font-family: var(--font-main); background-color: var(--bg-default); color: var(--msg-text); display: flex; flex-direction: column; transition: background-color var(--transition-medium), color var(--transition-medium); font-size: 14.5px; -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale; }
        * { box-sizing: border-box; }
        button, select, textarea { font-family: inherit; }
        *:focus-visible { outline: 2px solid var(--button-bg); outline-offset: 2px; border-radius: var(--border-radius-small); }
        textarea:focus-visible { outline: none; } /* Handled by border/shadow */
        select:focus-visible { outline-offset: 1px; }

        /* --- Chat Container --- */
        #chat-container { width: 100%; max-width: 900px; /* קצת יותר רחב */ height: calc(100vh - 20px); margin: 10px auto; background-color: var(--chat-bg); display: flex; flex-direction: column; overflow: hidden; position: relative; transition: background-color var(--transition-medium), box-shadow var(--transition-medium); box-shadow: var(--shadow-medium); border-radius: var(--border-radius-medium); }

        /* --- Header --- */
        #chat-header { background-color: var(--header-bg); color: var(--header-text); padding: 10px 16px; display: flex; align-items: center; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1); z-index: 10; transition: background-color var(--transition-medium), color var(--transition-medium); gap: 12px; flex-shrink: 0; border-top-left-radius: var(--border-radius-medium); border-top-right-radius: var(--border-radius-medium); position: relative; /* For popover positioning */ }
        .header-avatar { width: var(--avatar-size); height: var(--avatar-size); border-radius: var(--border-radius-round); background-color: var(--avatar-bg); /* Placeholder */ flex-shrink: 0; /* Add an actual AI icon later */ background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="%23ffffff"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-1-11h2v2h-2v-2zm0 4h2v4h-2v-4z"/></svg>'); background-size: 60%; background-position: center; background-repeat: no-repeat; }
        #chat-header h1 { margin: 0; font-size: 17px; /* מעט קטן יותר */ font-weight: 500; flex-grow: 1; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
        .header-controls { display: flex; align-items: center; gap: 6px; } /* Controls within the popover */
        .icon-button { background: none; border: none; padding: 8px; cursor: pointer; border-radius: var(--border-radius-round); display: flex; align-items: center; justify-content: center; transition: background-color var(--transition-fast), transform var(--transition-fast); }
        .icon-button:hover { background-color: var(--icon-button-hover-bg); }
        .icon-button:active { transform: scale(0.92); background-color: color-mix(in srgb, var(--icon-button-hover-bg) 70%, #000000); }
        .icon-button svg { width: 24px; height: 24px; /* סטנדרטי יותר */ fill: var(--header-icon-fill); transition: fill var(--transition-medium); }
        #settings-button svg { width: 22px; height: 22px; } /* גלגל שיניים מעט קטן */

        /* --- Settings Popover --- */
        #settings-popover {
            position: absolute; top: calc(100% + 5px); /* מתחת לכותרת */ left: 10px; /* בצד שמאל */
            background-color: var(--popover-bg); color: var(--msg-text); border: 1px solid var(--popover-border); border-radius: var(--border-radius-medium); box-shadow: var(--popover-shadow); padding: 12px; z-index: 100; min-width: 250px; opacity: 0; transform: translateY(-10px) scale(0.95); transition: opacity var(--transition-fast), transform var(--transition-fast); pointer-events: none; display: flex; flex-direction: column; gap: 15px; }
        #settings-popover.visible { opacity: 1; transform: translateY(0) scale(1); pointer-events: auto; }
        .popover-section { display: flex; flex-direction: column; gap: 8px; }
        .popover-section label { font-size: 13px; font-weight: 500; color: var(--timestamp-color); margin-bottom: 2px; }
        #settings-popover select { width: 100%; background-color: var(--input-bg); color: var(--input-text); border: 1px solid var(--input-border); border-radius: var(--border-radius-medium); padding: 8px 12px; font-size: 14px; cursor: pointer; outline: none; -webkit-appearance: none; -moz-appearance: none; appearance: none; background-image: url('data:image/svg+xml;utf8,<svg fill="%23aebac1" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M7 10l5 5 5-5z"/><path d="M0 0h24v24H0z" fill="none"/></svg>'); background-repeat: no-repeat; background-position: left 8px center; background-size: 18px; direction: ltr; text-align: right; padding-left: 30px; /* Space for arrow */ }
        #settings-popover select option { background-color: var(--popover-bg); color: var(--msg-text); direction: rtl; }
        .popover-actions { display: flex; flex-direction: column; gap: 5px; margin-top: 5px; border-top: 1px solid var(--border-color); padding-top: 10px; }
        .popover-actions button { background: none; border: none; color: var(--msg-text); padding: 8px 10px; text-align: right; border-radius: var(--border-radius-small); cursor: pointer; display: flex; align-items: center; gap: 10px; font-size: 14px; transition: background-color var(--transition-fast); }
        .popover-actions button:hover { background-color: var(--menu-item-hover-bg); }
        .popover-actions button svg { width: 18px; height: 18px; fill: var(--msg-action-icon-fill); flex-shrink: 0; }

        /* --- Chat Output --- */
        #chat-output { flex-grow: 1; padding: 10px 15px 0 15px; /* פחות רווח תחתון */ overflow-y: auto; display: flex; flex-direction: column; scroll-behavior: auto; /* Let JS handle smooth scroll */ position: relative; background-color: transparent; background-image: var(--whatsapp-bg-image); background-size: var(--whatsapp-bg-size, auto); background-position: var(--whatsapp-bg-pos, center); background-repeat: repeat; }
        #chat-output-inner { padding-bottom: 10px; /* Add padding at the bottom for spacing */ }

        /* Scrollbar */
        #chat-output::-webkit-scrollbar { width: 7px; }
        #chat-output::-webkit-scrollbar-track { background: var(--scrollbar-track); border-radius: 4px; }
        #chat-output::-webkit-scrollbar-thumb { background: var(--scrollbar-thumb); border-radius: 4px; border: 1px solid var(--chat-bg); }
        #chat-output::-webkit-scrollbar-thumb:hover { background: color-mix(in srgb, var(--scrollbar-thumb) 70%, #000000); }
        #chat-output { scrollbar-width: thin; scrollbar-color: var(--scrollbar-thumb) var(--scrollbar-track); }

        /* Scroll to Bottom Button */
        #scroll-to-bottom { position: absolute; bottom: 80px; /* Higher due to input area */ left: 25px; background-color: var(--scroll-btn-bg); backdrop-filter: blur(5px); border: 1px solid color-mix(in srgb, var(--border-color) 50%, transparent); border-radius: var(--border-radius-round); width: 40px; height: 40px; padding: 0; cursor: pointer; display: none; /* Initially hidden */ align-items: center; justify-content: center; box-shadow: var(--shadow-medium); opacity: 0; transform: scale(0.8); transition: opacity var(--transition-medium), transform var(--transition-medium), background-color var(--transition-fast); z-index: 20; }
        #scroll-to-bottom.visible { display: flex; opacity: 0.85; transform: scale(1); }
        #scroll-to-bottom:hover { opacity: 1; background-color: var(--scroll-btn-hover-bg); transform: scale(1.05); }
        #scroll-to-bottom svg { width: 22px; height: 22px; fill: var(--scroll-btn-icon); }
        #new-message-counter { position: absolute; top: -3px; right: -3px; background-color: var(--counter-bg); color: var(--counter-text); border-radius: var(--border-radius-round); width: 18px; height: 18px; font-size: 11px; font-weight: bold; display: flex; align-items: center; justify-content: center; line-height: 1; box-shadow: 0 1px 2px rgba(0,0,0,0.3); transform: scale(0); transition: transform var(--transition-fast); }
        #scroll-to-bottom.has-new #new-message-counter { transform: scale(1); }

        /* --- Messages --- */
        .message-wrapper { display: flex; margin-bottom: 2px; /* Reduced margin */ max-width: 85%; /* Limit width */ animation: fadeInSlideUp 0.4s cubic-bezier(0.1, 0.8, 0.3, 1) forwards; opacity: 0; }
        @keyframes fadeInSlideUp { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
        .message-wrapper.user-message-wrapper { margin-left: auto; flex-direction: row-reverse; /* Avatar on the left */ }
        .message-wrapper.ai-message-wrapper { margin-right: auto; flex-direction: row; /* Avatar on the right */ }

        .avatar { width: var(--avatar-size); height: var(--avatar-size); border-radius: var(--border-radius-round); background-color: var(--avatar-bg); flex-shrink: 0; margin-top: 5px; /* Align with top of bubble */ align-self: flex-start; }
        .ai-message-wrapper .avatar { margin-left: 8px; /* Space between avatar and bubble */ /* Placeholder AI avatar */ background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="%23607d8b"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>'); background-size: 60%; background-position: center; background-repeat: no-repeat; }
        .user-message-wrapper .avatar { margin-right: 8px; /* Placeholder User avatar */ background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="%234caf50"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>'); background-size: 60%; background-position: center; background-repeat: no-repeat; }


        .message { position: relative; /* For tail and actions */ padding: 7px 12px; /* Adjusted padding */ border-radius: var(--border-radius-medium); /* Standard radius */ word-wrap: break-word; line-height: 1.5; font-size: 14.8px; color: var(--msg-text); box-shadow: var(--shadow-light); transition: background-color var(--transition-medium), color var(--transition-medium), box-shadow var(--transition-medium); }
        .user-message { background-color: var(--user-msg-bg); border-bottom-left-radius: var(--border-radius-small); /* Sharper corner */ }
        .ai-message { background-color: var(--ai-msg-bg); border: 1px solid var(--border-color); border-bottom-right-radius: var(--border-radius-small); box-shadow: none; }
        body.dark-mode .ai-message { border: none; } /* No border for AI in dark mode */

        /* Message Tail */
        .message::before { content: ''; position: absolute; bottom: 0px; width: 8px; height: 12px; transition: border-color var(--transition-medium); }
        .user-message::before { left: -8px; border-bottom-right-radius: 8px; background: radial-gradient(circle at 0 100%, transparent 8px, var(--user-msg-bg) 8.5px); }
        .ai-message::before { right: -8px; border-bottom-left-radius: 8px; background: radial-gradient(circle at 100% 100%, transparent 8px, var(--ai-msg-bg) 8.5px); }
        body.dark-mode .ai-message::before { background: radial-gradient(circle at 100% 100%, transparent 8px, var(--ai-msg-bg) 8.5px); } /* Ensure tail color updates */

        .message-content { padding-bottom: 18px; /* Space for timestamp */ min-height: 1.5em; }
        .ai-message.typing-cursor .message-content::after { content: '▍'; display: inline-block; animation: blink-cursor 0.8s infinite; margin-left: 2px; /* RTL adjustment */ color: var(--timestamp-color); vertical-align: bottom; }
        @keyframes blink-cursor { 50% { opacity: 0; } }

        .message-footer { position: absolute; bottom: 5px; /* Position timestamp at bottom */ font-size: 11.5px; color: var(--timestamp-color); opacity: 0.9; display: flex; align-items: center; gap: 6px; }
        .user-message .message-footer { left: 10px; }
        .ai-message .message-footer { right: 10px; flex-direction: row-reverse; } /* Model name first in RTL */
        .model-indicator { font-weight: 500; color: var(--model-indicator-color); }
        .user-message .model-indicator { display: none; }

        /* Message Actions (Ellipsis Button) */
        .message-actions-trigger { position: absolute; top: 4px; background: none; border: none; padding: 4px; cursor: pointer; border-radius: var(--border-radius-round); display: flex; align-items: center; justify-content: center; opacity: 0; transition: opacity var(--transition-fast), background-color var(--transition-fast); z-index: 1; }
        .message-wrapper:hover .message-actions-trigger { opacity: 0.8; }
        .message-actions-trigger:hover { opacity: 1; background-color: var(--msg-action-icon-hover-bg); }
        .message-actions-trigger svg { width: 18px; height: 18px; fill: var(--msg-action-icon-fill); }
        .user-message-wrapper .message-actions-trigger { left: 6px; }
        .ai-message-wrapper .message-actions-trigger { right: 6px; }

        /* Message Actions Menu (Popover) */
        .message-actions-menu { position: absolute; background-color: var(--popover-bg); color: var(--msg-text); border: 1px solid var(--popover-border); border-radius: var(--border-radius-medium); box-shadow: var(--popover-shadow); padding: 5px; z-index: 50; min-width: 120px; opacity: 0; transform: scale(0.95); transition: opacity var(--transition-fast), transform var(--transition-fast); pointer-events: none; display: flex; flex-direction: column; }
        .message-actions-menu.visible { opacity: 1; transform: scale(1); pointer-events: auto; }
        /* Positioning will be handled by JS based on trigger button */
        .message-actions-menu button { background: none; border: none; color: var(--msg-text); padding: 7px 12px; text-align: right; border-radius: var(--border-radius-small); cursor: pointer; display: flex; align-items: center; gap: 8px; font-size: 14px; transition: background-color var(--transition-fast); }
        .message-actions-menu button:hover { background-color: var(--menu-item-hover-bg); }
        .message-actions-menu button svg { width: 16px; height: 16px; fill: var(--msg-action-icon-fill); flex-shrink: 0; }
        .message-actions-menu button.copied svg { fill: var(--button-bg); }

        /* Code Blocks */
        .message-content pre { background-color: var(--code-bg); color: var(--code-text); padding: 12px 16px; border-radius: var(--border-radius-medium); overflow-x: auto; font-family: var(--font-code); font-size: 13.5px; margin: 8px 0; /* Reduced margin */ direction: ltr; text-align: left; white-space: pre; border: 1px solid var(--code-border); position: relative; }
        .message-content pre .copy-code-button { position: absolute; top: 8px; right: 8px; background-color: var(--code-copy-btn-bg); color: var(--code-text); border: none; border-radius: var(--border-radius-small); padding: 4px 8px; font-size: 11px; font-family: var(--font-main); cursor: pointer; opacity: 0; transition: opacity var(--transition-fast), background-color var(--transition-fast); z-index: 2; backdrop-filter: blur(2px); }
        .message-content pre:hover .copy-code-button { opacity: 0.8; }
        .message-content pre .copy-code-button:hover { opacity: 1; background-color: var(--code-copy-btn-hover-bg); }
        .message-content pre .copy-code-button.copied { background-color: var(--code-copy-btn-copied-bg); color: var(--code-copy-btn-copied-text); opacity: 1; }
        .message-content code:not(pre > code) { background-color: color-mix(in srgb, var(--code-bg) 80%, var(--chat-bg)); color: var(--code-text); padding: 0.2em 0.5em; margin: 0 0.1em; font-size: 88%; border-radius: var(--border-radius-small); font-family: var(--font-code); direction: ltr; text-align: left; border: 1px solid var(--code-border); }

        /* --- Input Area --- */
        #chat-input-area { display: flex; align-items: flex-end; padding: 8px 12px; /* Reduced padding */ border-top: 1px solid var(--border-color); background-color: var(--input-area-bg); flex-shrink: 0; transition: background-color var(--transition-medium), border-color var(--transition-medium); gap: 8px; /* Reduced gap */ border-bottom-left-radius: var(--border-radius-medium); border-bottom-right-radius: var(--border-radius-medium); }
        /* Optional Input Buttons */
        .input-button { /* display: none; */ /* Hide by default */ background: none; border: none; padding: 8px; margin-bottom: 5px; /* Align with textarea bottom */ cursor: pointer; border-radius: var(--border-radius-round); display: flex; align-items: center; justify-content: center; transition: background-color var(--transition-fast); flex-shrink: 0; }
        .input-button:hover { background-color: var(--icon-button-hover-bg); }
        .input-button svg { width: 24px; height: 24px; fill: var(--attach-icon-fill); }

        #user-input { flex-grow: 1; padding: 10px 16px; /* Adjusted padding */ border: 1px solid var(--input-border); border-radius: var(--border-radius-large); font-size: 15px; background-color: var(--input-bg); color: var(--input-text); outline: none; transition: background-color var(--transition-medium), color var(--transition-medium), box-shadow var(--transition-fast), height var(--transition-fast), border-color var(--transition-fast); resize: none; overflow-y: hidden; min-height: 42px; max-height: 140px; line-height: 1.4; box-sizing: border-box; box-shadow: 0 1px 1px rgba(0,0,0,0.04) inset; }
        #user-input:focus { border-color: var(--input-border-focus); box-shadow: 0 0 0 2px color-mix(in srgb, var(--button-bg) 20%, transparent), 0 1px 1px rgba(0,0,0,0.04) inset; }
        #send-button { width: 42px; height: 42px; padding: 0; background-color: var(--button-bg); border: none; border-radius: var(--border-radius-round); cursor: pointer; font-size: 0; display: flex; justify-content: center; align-items: center; transition: background-color var(--transition-fast), transform var(--transition-fast), opacity var(--transition-fast), box-shadow var(--transition-fast); flex-shrink: 0; align-self: flex-end; box-shadow: none; /* Removed default shadow */ }
        #send-button:hover { background-color: var(--button-hover-bg); transform: scale(1.05); }
        #send-button:active { background-color: var(--button-active-bg); transform: scale(0.95); }
        #send-button::before { content: ''; display: block; width: 22px; height: 22px; background-color: var(--button-icon-fill); mask-image: url('data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"%3E%3Cpath d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"/%3E%3C/svg%3E'); mask-size: contain; mask-repeat: no-repeat; mask-position: center; -webkit-mask-image: url('data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"%3E%3Cpath d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"/%3E%3C/svg%3E'); -webkit-mask-size: contain; -webkit-mask-repeat: no-repeat; -webkit-mask-position: center; transition: background-color var(--transition-medium); }
        #send-button:disabled { opacity: 0.5; cursor: not-allowed; background-color: color-mix(in srgb, var(--button-bg) 50%, var(--input-area-bg)); transform: scale(1); }

        /* --- Loading Indicator --- */
        .typing-indicator .message-content { color: var(--timestamp-color); padding-bottom: 5px; }
        .cool-loading-container { display: flex; align-items: center; justify-content: flex-start; gap: 8px; padding: 4px 0; }
        .cool-loading-container .loading-model-name { font-size: 0.9em; font-weight: 500; animation: pulse-text 1.5s infinite ease-in-out; white-space: nowrap; }
        .loading-spinner { width: 18px; height: 18px; border-radius: 50%; border: 2px solid var(--loading-spinner-color1); border-top-color: transparent; animation: cool-spinner 1s linear infinite; flex-shrink: 0; }
        @keyframes cool-spinner { to { transform: rotate(360deg); } }
        @keyframes pulse-text { 0%, 100% { opacity: 0.6; } 50% { opacity: 0.9; } }
        #stop-generation-button { background: none; border: none; padding: 0; margin: 0 5px 0 0; cursor: pointer; display: flex; align-items: center; justify-content: center; width: 20px; height: 20px; border-radius: var(--border-radius-round); transition: background-color var(--transition-fast), transform var(--transition-fast); }
        #stop-generation-button svg { width: 14px; height: 14px; fill: var(--msg-action-icon-fill); transition: fill var(--transition-fast); }
        #stop-generation-button:hover { background-color: var(--msg-action-icon-hover-bg); }
        #stop-generation-button:hover svg { fill: var(--msg-action-icon-hover-fill); }
        #stop-generation-button:active { transform: scale(0.9); }

    </style>
</head>
<body>

<div id="chat-container">
    <div id="chat-header">
        <div class="header-avatar"></div>
        <h1>צ'אט AI</h1>
        <div class="header-controls-trigger"> <!-- Renamed for clarity -->
            <button class="icon-button" id="settings-button" title="הגדרות" aria-label="הגדרות ופעולות נוספות">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M19.43 12.98c.04-.32.07-.64.07-.98s-.03-.66-.07-.98l2.11-1.65c.19-.15.24-.42.12-.64l-2-3.46c-.12-.22-.39-.3-.61-.22l-2.49 1c-.52-.4-1.08-.73-1.69-.98l-.38-2.65C14.46 2.18 14.25 2 14 2h-4c-.25 0-.46.18-.49.42l-.38 2.65c-.61.25-1.17.59-1.69.98l-2.49-1c-.23-.08-.49 0-.61.22l-2 3.46c-.13.22-.07.49.12.64l2.11 1.65c-.04.32-.07.65-.07.98s.03.66.07.98l-2.11 1.65c-.19.15-.24.42-.12.64l2 3.46c.12.22.39.3.61.22l2.49-1c.52.4 1.08.73 1.69.98l.38 2.65c.03.24.24.42.49.42h4c.25 0 .46-.18.49-.42l.38-2.65c.61-.25 1.17-.59 1.69-.98l2.49 1c.23.08.49 0 .61-.22l2-3.46c.12-.22.07-.49-.12-.64l-2.11-1.65zM12 15.5c-1.93 0-3.5-1.57-3.5-3.5s1.57-3.5 3.5-3.5 3.5 1.57 3.5 3.5-1.57 3.5-3.5 3.5z"/></svg>
            </button>
        </div>
        <!-- Settings Popover - Initially Hidden -->
        <div id="settings-popover">
             <div class="popover-section">
                 <label for="model-select">מודל AI:</label>
                 <select id="model-select" aria-label="בחר מודל AI">
                     <option value="main-ai.php">Gemini Flash</option>
                     <option value="gemini25.php">Gemini 2.5 Pro</option>
                 </select>
             </div>
             <div class="popover-section">
                  <label for="style-select">סגנון שיחה:</label>
                  <select id="style-select" aria-label="בחר סגנון שיחה">
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
             <div class="popover-actions">
                 <button id="dark-mode-toggle" aria-label="שנה ערכת נושא">
                     <svg id="theme-icon-light" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M10 2c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 16c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zM12 6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 8c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm6-8c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm-2 8c-.83 0-1.5.67-1.5 1.5S15.17 18 16 18s1.5-.67 1.5-1.5S16.83 15 16 15zM4 8c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm2 7c-.83 0-1.5.67-1.5 1.5S5.17 18 6 18s1.5-.67 1.5-1.5S6.83 15 6 15z"/></svg> <!-- Moon Icon -->
                     <svg id="sun-icon" style="display: none;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 7c-2.76 0-5 2.24-5 5s2.24 5 5 5 5-2.24 5-5-2.24-5-5-5zM2 13h2c.55 0 1-.45 1-1s-.45-1-1-1H2c-.55 0-1 .45-1 1s.45 1 1 1zm18 0h2c.55 0 1-.45 1-1s-.45-1-1-1h-2c-.55 0-1 .45-1 1s.45 1 1 1zM11 2v2c0 .55.45 1 1 1s1-.45 1-1V2c0-.55-.45-1-1-1s-1 .45-1 1zm0 18v2c0 .55.45 1 1 1s1-.45 1-1v-2c0-.55-.45-1-1-1s-1 .45-1 1zM5.64 5.64c-.39-.39-1.02-.39-1.41 0-.39.39-.39 1.02 0 1.41l1.41 1.41c.39.39 1.02.39 1.41 0 .39-.39.39-1.02 0-1.41L5.64 5.64zm12.73 12.73c-.39-.39-1.02-.39-1.41 0-.39.39-.39 1.02 0 1.41l1.41 1.41c.39.39 1.02.39 1.41 0 .39-.39.39-1.02 0-1.41l-1.41-1.41zM19.78 4.22c.39-.39.39-1.02 0-1.41-.39-.39-1.02-.39-1.41 0l-1.41 1.41c-.39.39-.39 1.02 0 1.41.39.39 1.02.39 1.41 0l1.41-1.41zm-12.73 12.73c.39-.39.39-1.02 0-1.41-.39-.39-1.02-.39-1.41 0l-1.41 1.41c-.39.39-.39 1.02 0 1.41.39.39 1.02.39 1.41 0l1.41-1.41z"/></svg>
                     <span id="theme-toggle-text">ערכת נושא כהה</span>
                 </button>
                 <button id="download-chat" aria-label="הורד צ'אט">
                     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M19 9h-4V3H9v6H5l7 7 7-7zM5 18v2h14v-2H5z"/></svg>
                     <span>הורד שיחה</span>
                 </button>
                 <button id="clear-chat" aria-label="נקה צ'אט">
                     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/></svg>
                     <span>נקה שיחה</span>
                 </button>
             </div>
        </div>
    </div>
    <div id="chat-output" aria-live="polite">
        <div id="chat-output-inner"> <!-- Inner div for padding -->
            <div class="message-wrapper ai-message-wrapper initial-message" data-message-id="initial-0">
                 <div class="avatar"></div>
                 <div class="message ai-message">
                     <div class="message-content"><span>שלום! בחר מודל וסגנון שיחה בהגדרות (⚙️) והתחל לשוחח.</span></div>
                     <div class="message-footer"><span class="timestamp">התחל</span></div>
                 </div>
             </div>
         </div>
         <button id="scroll-to-bottom" title="גלול לתחתית" aria-label="גלול לתחתית">
             <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M7.41 8.59L12 13.17l4.59-4.58L18 10l-6 6-6-6 1.41-1.41z"/><path fill="none" d="M0 0h24v24H0V0z"/></svg>
             <span id="new-message-counter">0</span>
         </button>
    </div>
    <div id="chat-input-area">
         <!-- Optional Buttons (Hidden by default) -->
         <!--
         <button class="input-button" id="emoji-button" aria-label="בחר אמוג'י" title="אמוג'י">
             <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm3.5-9c.83 0 1.5-.67 1.5-1.5S16.33 8 15.5 8 14 8.67 14 9.5s.67 1.5 1.5 1.5zm-7 0c.83 0 1.5-.67 1.5-1.5S9.33 8 8.5 8 7 8.67 7 9.5 7.67 11 8.5 11zm3.5 6.5c2.33 0 4.31-1.46 5.11-3.5H6.89c.8 2.04 2.78 3.5 5.11 3.5z"/></svg>
         </button>
         <button class="input-button" id="attach-button" aria-label="צרף קובץ" title="צרף">
             <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M16.5 6v11.5c0 2.21-1.79 4-4 4s-4-1.79-4-4V5c0-1.38 1.12-2.5 2.5-2.5s2.5 1.12 2.5 2.5v10.5c0 .55-.45 1-1 1s-1-.45-1-1V6H10v9.5c0 1.38 1.12 2.5 2.5 2.5s2.5-1.12 2.5-2.5V5c0-2.21-1.79-4-4-4S7 2.79 7 5v12.5c0 3.04 2.46 5.5 5.5 5.5s5.5-2.46 5.5-5.5V6h-1.5z"/></svg>
         </button>
         -->
        <textarea id="user-input" placeholder="הקלד/י הודעה..." rows="1" aria-label="הודעת משתמש"></textarea>
        <button id="send-button" aria-label="שלח"></button>
    </div>

    <!-- Message Actions Menu Template (Hidden) -->
    <div id="message-actions-menu-template" style="display: none;">
        <div class="message-actions-menu">
            <button class="action-copy">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M16 1H4c-1.1 0-2 .9-2 2v14h2V3h12V1zm3 4H8c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h11c1.1 0 2-.9 2-2V7c0-1.1-.9-2-2-2zm0 16H8V7h11v14z"/></svg>
                <span>העתק</span>
            </button>
            <button class="action-regenerate" style="display: none;"> <!-- Hidden by default -->
                 <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M17.65 6.35C16.2 4.9 14.21 4 12 4c-4.42 0-7.99 3.58-7.99 8s3.57 8 7.99 8c3.73 0 6.84-2.55 7.73-6h-2.08c-.82 2.33-3.04 4-5.65 4-3.31 0-6-2.69-6-6s2.69-6 6-6c1.66 0 3.14.69 4.22 1.78L13 11h7V4l-2.35 2.35z"/></svg>
                <span>צור מחדש</span>
            </button>
            <!-- Add other actions here later (e.g., Edit, Delete) -->
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
        const darkModeToggle = document.getElementById('dark-mode-toggle');
        const themeToggleText = document.getElementById('theme-toggle-text');
        const themeIconLight = document.getElementById('theme-icon-light'); // Moon
        const sunIcon = document.getElementById('sun-icon');
        const downloadChatButton = document.getElementById('download-chat');
        const clearChatButton = document.getElementById('clear-chat');
        const scrollToBottomButton = document.getElementById('scroll-to-bottom');
        const newMessageCounter = document.getElementById('new-message-counter');
        const messageActionsMenuTemplate = document.getElementById('message-actions-menu-template');

        // --- State Variables ---
        const BASE_API_URL = 'https://php-render-test.onrender.com/'; // Verify URL
        let messageCounterId = 0; // Use a simple incrementing ID for internal tracking
        let currentAbortController = null;
        let typingTimeout = null;
        let activeMessageMenu = null; // Track the currently open message menu
        let newMessagesCount = 0; // Counter for new messages while scrolled up
        let isScrolledToBottom = true; // Track if user is at the bottom
        const TYPING_SPEED = 15; // Slightly slower typing
        const SCROLL_THRESHOLD = 150; // Pixels from bottom to trigger button/counter

        // --- Utility Functions ---
        function getCurrentTimestamp() {
            const now = new Date();
            const hours = now.getHours().toString().padStart(2, '0');
            const minutes = now.getMinutes().toString().padStart(2, '0');
            return `${hours}:${minutes}`;
        }
        function generateMessageId() { return `msg-${Date.now()}-${messageCounterId++}`; }

        function smoothScrollToBottom() {
            chatOutput.scrollTo({ top: chatOutput.scrollHeight, behavior: 'smooth' });
            resetNewMessageCounter(); // Reset counter when explicitly scrolling down
        }

        function instantScrollToBottom() {
             chatOutput.scrollTop = chatOutput.scrollHeight;
             resetNewMessageCounter();
        }

        function updateScrollState() {
            const scrollBottom = chatOutput.scrollHeight - chatOutput.scrollTop - chatOutput.clientHeight;
            isScrolledToBottom = scrollBottom < 5; // Allow a small tolerance
            const showScrollButton = scrollBottom > SCROLL_THRESHOLD;
            scrollToBottomButton.classList.toggle('visible', showScrollButton);

            // If user scrolls back to bottom manually, hide counter
            if (isScrolledToBottom && newMessagesCount > 0) {
                resetNewMessageCounter();
            }
        }

        function incrementNewMessageCounter() {
            if (!isScrolledToBottom) {
                newMessagesCount++;
                newMessageCounter.textContent = newMessagesCount > 9 ? '9+' : newMessagesCount;
                scrollToBottomButton.classList.add('has-new');
                // Ensure the button is visible if there are new messages
                if (!scrollToBottomButton.classList.contains('visible')) {
                    scrollToBottomButton.classList.add('visible');
                }
            }
        }

        function resetNewMessageCounter() {
            newMessagesCount = 0;
            newMessageCounter.textContent = '0';
            scrollToBottomButton.classList.remove('has-new');
            // Keep button visible only if scroll position demands it
             updateScrollState();
        }

        // --- Settings Popover Logic ---
        function toggleSettingsPopover(show) {
             if (show) {
                 settingsPopover.classList.add('visible');
                 // Close message menus if open
                 closeMessageActionMenu();
             } else {
                 settingsPopover.classList.remove('visible');
             }
         }

        settingsButton.addEventListener('click', (e) => {
             e.stopPropagation(); // Prevent body click listener
             toggleSettingsPopover(!settingsPopover.classList.contains('visible'));
         });

         // Close popover if clicking outside
         document.body.addEventListener('click', (e) => {
             if (!settingsPopover.contains(e.target) && !settingsButton.contains(e.target)) {
                 toggleSettingsPopover(false);
             }
             // Close message menu if clicking outside of it
             if (activeMessageMenu && !activeMessageMenu.contains(e.target) && !e.target.closest('.message-actions-trigger')) {
                closeMessageActionMenu();
             }
         });


        // --- Message Actions Menu Logic ---
        function openMessageActionMenu(triggerButton, messageElement) {
            closeMessageActionMenu(); // Close any existing menu

            const menuNode = messageActionsMenuTemplate.firstElementChild.cloneNode(true);
            menuNode.dataset.targetMessageId = messageElement.dataset.messageId; // Link menu to message

            // Customize menu content based on message type
            const isAiMsg = messageElement.classList.contains('ai-message');
            const regenerateButton = menuNode.querySelector('.action-regenerate');

            if (isAiMsg && messageElement.dataset.userQuery && messageElement.dataset.modelValue) {
                regenerateButton.style.display = 'flex'; // Show regenerate button
            } else {
                regenerateButton.style.display = 'none'; // Hide for user messages or initial AI msg
            }

            // Append menu to chat container for correct positioning context
            chatContainer.appendChild(menuNode);
            activeMessageMenu = menuNode; // Track the active menu

            // Position the menu
            const triggerRect = triggerButton.getBoundingClientRect();
            const containerRect = chatContainer.getBoundingClientRect();
            const menuRect = menuNode.getBoundingClientRect();

            let top = triggerRect.bottom - containerRect.top + 5;
            let left = triggerRect.left - containerRect.left;

            // Adjust if menu goes off-screen
            if (left + menuRect.width > containerRect.width - 10) {
                left = triggerRect.right - containerRect.left - menuRect.width;
            }
            if (top + menuRect.height > containerRect.height - 10) {
                 top = triggerRect.top - containerRect.top - menuRect.height - 5;
            }
             // Ensure minimum distance from edges
             left = Math.max(10, left);
             top = Math.max(10, top);

            menuNode.style.top = `${top}px`;
            menuNode.style.left = `${left}px`;

            // Add event listeners to menu items
            menuNode.querySelector('.action-copy').addEventListener('click', handleCopyClick);
            if (regenerateButton.style.display !== 'none') {
                 regenerateButton.addEventListener('click', handleRegenerateClick);
            }

            // Make visible after positioning
            requestAnimationFrame(() => {
                menuNode.classList.add('visible');
            });
        }

        function closeMessageActionMenu() {
            if (activeMessageMenu) {
                activeMessageMenu.remove();
                activeMessageMenu = null;
            }
        }


        // --- Get Chat History Function (Unchanged) ---
         function getChatHistory(currentUserMessage, forRegeneration = false, regenerationTargetMsgId = null) {
             const history = [];
             // Select message divs directly inside the inner container
             const messages = chatOutputInner.querySelectorAll('.message-wrapper:not(.initial-message)');
             messages.forEach((msgWrapper) => {
                 const messageDiv = msgWrapper.querySelector('.message');
                 if (!messageDiv) return;

                 const sender = messageDiv.classList.contains('user-message') ? 'user' : 'ai';
                 const messageId = msgWrapper.dataset.messageId;

                 // Skip the AI message being regenerated
                 if (forRegeneration && messageId === regenerationTargetMsgId && sender === 'ai') return;

                 const contentElement = messageDiv.querySelector('.message-content');
                 let content = '';
                 if (contentElement) {
                     // Simple text extraction for history
                     content = contentElement.textContent || contentElement.innerText || '';
                 }
                 content = content.trim();

                 if (content) {
                     const role = sender === 'user' ? 'user' : 'model';
                     history.push({ role: role, content: content });
                 }
             });
             return history;
         }

        // --- Add Message to Chat Function (Updated for new structure) ---
        function addMessageToChat(text, sender, options = {}) {
            const { isLoading = false, timestamp = null, modelNameUsed = null, userQuery = null, modelValue = null } = options;

            const messageId = generateMessageId();
            const messageWrapper = document.createElement('div');
            messageWrapper.classList.add('message-wrapper', sender === 'user' ? 'user-message-wrapper' : 'ai-message-wrapper');
            messageWrapper.dataset.messageId = messageId; // ID on the wrapper

            const avatarDiv = document.createElement('div');
            avatarDiv.classList.add('avatar');
            // Specific avatar styles/icons could be added here or kept in CSS

            const messageDiv = document.createElement('div');
            messageDiv.classList.add('message', sender === 'user' ? 'user-message' : 'ai-message');
            // Store data attributes on the main message div for easier access
            if (sender === 'ai' && modelNameUsed) {
                messageDiv.dataset.userQuery = userQuery || '';
                messageDiv.dataset.modelName = modelNameUsed || '';
                messageDiv.dataset.modelValue = modelValue || '';
            }


            const contentDiv = document.createElement('div');
            contentDiv.classList.add('message-content');

            if (isLoading) {
                messageDiv.classList.add('typing-indicator');
                const cleanModelName = modelNameUsed || 'AI'; // Use provided name or fallback
                contentDiv.innerHTML = `
                    <div class="cool-loading-container">
                        <div class="loading-spinner"></div>
                        <span class="loading-model-name">${cleanModelName} חושב...</span>
                        <button id="stop-generation-button" class="stop-button" title="עצור יצירה" aria-label="עצור יצירה">
                             <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm5 13H7v-2h10v2z"/></svg>
                        </button>
                    </div>`;
                messageDiv.appendChild(contentDiv);
                const stopButton = messageDiv.querySelector('#stop-generation-button');
                if (stopButton) {
                    stopButton.addEventListener('click', stopTypingAndGeneration);
                }
            } else {
                 // Basic text rendering (Replace with Markdown later if needed)
                 if (text) {
                    contentDiv.textContent = text; // Safer default
                     // Simple link detection (example only, needs robust library)
                     // contentDiv.innerHTML = text.replace(/(https?:\/\/[^\s]+)/g, '<a href="$1" target="_blank" rel="noopener noreferrer">$1</a>');
                 } else {
                    contentDiv.textContent = " "; // Prevent empty div collapse issues
                 }


                messageDiv.appendChild(contentDiv);

                // Footer (Timestamp & Model)
                const footerDiv = document.createElement('div');
                footerDiv.classList.add('message-footer');
                const currentTimestamp = timestamp || getCurrentTimestamp();
                messageDiv.dataset.timestamp = currentTimestamp; // Store timestamp

                if (sender === 'ai' && modelNameUsed && timestamp !== 'התחל') {
                    const modelSpan = document.createElement('span');
                    modelSpan.classList.add('model-indicator');
                    modelSpan.textContent = `(${modelNameUsed})`;
                    footerDiv.appendChild(modelSpan);
                }
                const timestampSpan = document.createElement('span');
                timestampSpan.classList.add('timestamp');
                timestampSpan.textContent = currentTimestamp;
                footerDiv.appendChild(timestampSpan);
                messageDiv.appendChild(footerDiv);

                // Add Ellipsis Trigger Button (if not loading indicator)
                 const actionsTrigger = document.createElement('button');
                 actionsTrigger.classList.add('message-actions-trigger');
                 actionsTrigger.title = "פעולות נוספות";
                 actionsTrigger.setAttribute('aria-label', "פעולות נוספות");
                 actionsTrigger.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 8c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm0 2c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/></svg>';
                 actionsTrigger.addEventListener('click', (e) => {
                     e.stopPropagation();
                     openMessageActionMenu(actionsTrigger, messageDiv);
                 });
                 messageDiv.appendChild(actionsTrigger);

                 // Add copy buttons to code blocks after content is set
                 contentDiv.querySelectorAll('pre').forEach(addCopyButtonToCodeBlock);
            }

            // Assemble the wrapper
            if (sender === 'user') {
                messageWrapper.appendChild(messageDiv);
                messageWrapper.appendChild(avatarDiv);
            } else {
                messageWrapper.appendChild(avatarDiv);
                messageWrapper.appendChild(messageDiv);
            }


            // Append to the inner container
            chatOutputInner.appendChild(messageWrapper);


            // Scroll logic and counter
            const shouldScroll = isScrolledToBottom || isLoading; // Scroll if at bottom or loading
            if (shouldScroll) {
                // Use instant scroll for loading indicator for immediate visibility
                if (isLoading) instantScrollToBottom();
                else setTimeout(smoothScrollToBottom, 50); // Slight delay for render
            } else if (!isLoading) {
                 // Increment counter only for non-loading, non-initial AI messages
                 if (sender === 'ai' && messageDiv.dataset.timestamp !== 'התחל') {
                    incrementNewMessageCounter();
                 }
            }

            return messageDiv; // Return the main message div for typing effect reference
        }

        // --- AI Typing Effect Function (Simplified for Text Content) ---
        function typeAiResponse(messageElement, fullText) {
             const contentDiv = messageElement.querySelector('.message-content');
             if (!contentDiv) { console.error("Content div not found for typing"); return; }

             contentDiv.textContent = ''; // Clear previous content
             messageElement.classList.add('typing-cursor');
             let currentIndex = 0;
             clearTimeout(typingTimeout);

             function typeCharacter() {
                 if (currentIndex < fullText.length) {
                     contentDiv.textContent += fullText[currentIndex];
                     currentIndex++;
                     // Scroll only if near bottom during typing
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


        // --- Finalize AI Message after typing/rendering ---
        function finalizeAiMessage(messageElement, contentDiv) {
             clearTimeout(typingTimeout); typingTimeout = null;
             if (messageElement) {
                 messageElement.classList.remove('typing-cursor');
                 // Re-add copy buttons if content was dynamically generated
                 contentDiv.querySelectorAll('pre').forEach(addCopyButtonToCodeBlock);
                 // Maybe re-render using Markdown here if needed
             }
             // Smooth scroll to bottom after typing finishes, if user was near bottom
             if (isScrolledToBottom) {
                 setTimeout(smoothScrollToBottom, 100);
             }

             if (!document.querySelector('.typing-indicator') && !typingTimeout) {
                 userInput.disabled = false;
                 sendButton.disabled = false;
                 userInput.style.opacity = '1';
                 if (document.activeElement !== sendButton &&
                     !document.activeElement.closest('#settings-popover') && // Check if focus is in popover
                     !document.activeElement.closest('.message-actions-menu')) { // Check if focus is in message menu
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
             if(typingCursorMsg) {
                 finalizeAiMessage(typingCursorMsg, typingCursorMsg.querySelector('.message-content'));
             }

             if (currentAbortController) {
                 currentAbortController.abort();
                 currentAbortController = null;
                 console.log('Fetch request aborted.');
             } else {
                 console.log('No active fetch request to abort.');
             }
             // Always re-enable input after stopping
             userInput.disabled = false;
             sendButton.disabled = false;
             userInput.style.opacity = '1';
             userInput.focus();
         }


        // --- Add Copy Button to Code Blocks (Unchanged) ---
        function addCopyButtonToCodeBlock(preElement) {
             if (!preElement || preElement.querySelector('.copy-code-button')) return;
             const copyButton = document.createElement('button');
             copyButton.textContent = 'העתק'; // Shorter text
             copyButton.className = 'copy-code-button';
             copyButton.setAttribute('aria-label', 'העתק קוד');
             copyButton.addEventListener('click', (e) => {
                 e.stopPropagation();
                 const codeElement = preElement.querySelector('code') || preElement;
                 const codeToCopy = codeElement.textContent || '';
                 navigator.clipboard.writeText(codeToCopy).then(() => {
                     copyButton.textContent = 'הועתק!';
                     copyButton.classList.add('copied');
                     setTimeout(() => {
                         copyButton.textContent = 'העתק';
                         copyButton.classList.remove('copied');
                     }, 1500);
                 }).catch(err => { console.error('שגיאה בהעתקת קוד: ', err); copyButton.textContent = 'שגיאה'; });
             });
             preElement.appendChild(copyButton);
         }

        // --- Send Message Function (Updated) ---
        async function sendMessage(textToSend, options = {}, skipResponse = false) {
             const { isRegeneration = false, originalAiMsgId = null, modelValueOverride = null, modelNameOverride = null } = options;
             const currentText = textToSend !== undefined ? textToSend.trim() : userInput.value.trim();

             if (currentText === '' || document.querySelector('.typing-indicator')) return; // Prevent sending empty or while loading

             closeMessageActionMenu(); // Close message menu if open
             toggleSettingsPopover(false); // Close settings if open

             const selectedStyleInstruction = styleSelect.value.trim();
             userInput.disabled = true; sendButton.disabled = true; userInput.style.opacity = '0.7';

             // Find the original message *div* to remove/replace if regenerating
             const originalAiMsgDiv = originalAiMsgId ? chatOutputInner.querySelector(`.message-wrapper[data-message-id="${originalAiMsgId}"] .message.ai-message`) : null;


             if (!isRegeneration) {
                 addMessageToChat(currentText, 'user', { timestamp: getCurrentTimestamp() });
                 userInput.value = ''; adjustTextareaHeight();
             } else if (originalAiMsgDiv) {
                 // Remove the entire wrapper of the message being regenerated
                 originalAiMsgDiv.closest('.message-wrapper')?.remove();
             }


             if (skipResponse && !isRegeneration) {
                 console.log('Initial URL message added, skipping AI response fetch.');
                 userInput.disabled = false; sendButton.disabled = false; userInput.style.opacity = '1'; userInput.focus();
                 instantScrollToBottom(); // Scroll down to see the added message
                 return;
             }

             const historyArray = getChatHistory(null, isRegeneration, originalAiMsgId);
             let historyStringPart = "";
             historyArray.forEach(message => { historyStringPart += `[ROLE=${message.role}] ${message.content}\n`; });
             historyStringPart = historyStringPart.trim();

             let combinedStructuredText = "";
             if (selectedStyleInstruction) { combinedStructuredText += `[SYSTEM_STYLE_INSTRUCTION_START]\n${selectedStyleInstruction}\n[SYSTEM_STYLE_INSTRUCTION_END]\n`; }
             combinedStructuredText += `[USER_INPUT_START]\n${currentText}\n[USER_INPUT_END]\n`;
             if (historyStringPart) { combinedStructuredText += `[CHAT_HISTORY_START]\n${historyStringPart}\n[CHAT_HISTORY_END]`; }

             const selectedOption = modelValueOverride
                 ? (Array.from(modelSelect.options).find(opt => opt.value === modelValueOverride) || modelSelect.options[modelSelect.selectedIndex])
                 : modelSelect.options[modelSelect.selectedIndex];
             const modelName = modelNameOverride || selectedOption.text; // Use full text like "Gemini Flash"
             const selectedModelFile = selectedOption.value;
             const currentApiUrl = BASE_API_URL + selectedModelFile;

             const typingIndicatorElement = addMessageToChat(null, 'ai', { isLoading: true, modelNameUsed: modelName }); // Pass model name here
             currentAbortController = new AbortController(); const signal = currentAbortController.signal;

             try {
                 const requestBody = { text: combinedStructuredText };
                 const response = await fetch(currentApiUrl, { method: 'POST', headers: { 'Content-Type': 'application/json' }, body: JSON.stringify(requestBody), signal });
                 const wasAborted = signal.aborted; currentAbortController = null;

                 // Remove indicator only if it still exists
                  const currentIndicatorWrapper = chatOutputInner.querySelector('.typing-indicator')?.closest('.message-wrapper');
                  if (currentIndicatorWrapper) currentIndicatorWrapper.remove();


                 if (wasAborted) throw new DOMException('Aborted by user', 'AbortError');
                 if (!response.ok) { /* Error handling as before */ throw new Error(`Server Error: ${response.status} ${response.statusText}`); }

                 const data = await response.json();
                 if (data && data.text) {
                     const aiMessageElement = addMessageToChat(data.text, 'ai', { timestamp: getCurrentTimestamp(), modelNameUsed: modelName, userQuery: currentText, modelValue: selectedModelFile });
                     if (aiMessageElement) { typeAiResponse(aiMessageElement, data.text); }
                     else { /* Handle error if element not added */ }
                 } else { /* Handle invalid data */ addMessageToChat("תגובה לא תקינה מהשרת.", 'ai', { modelNameUsed: modelName }); if (!typingTimeout) { userInput.disabled = false; sendButton.disabled = false; userInput.style.opacity = '1'; userInput.focus(); } }
             } catch (error) {
                 currentAbortController = null;
                 // Ensure indicator is removed on error too
                 const errorIndicatorWrapper = chatOutputInner.querySelector('.typing-indicator')?.closest('.message-wrapper');
                 if (errorIndicatorWrapper) errorIndicatorWrapper.remove();

                 if (error.name === 'AbortError') { console.log('Request aborted.'); }
                 else { console.error("Error sending/receiving message:", error); addMessageToChat(`שגיאה: ${error.message}`, 'ai', { modelNameUsed: modelName }); }
                 // Re-enable input on error/abort if nothing else is loading
                 if (!document.querySelector('.typing-indicator') && !typingTimeout) { userInput.disabled = false; sendButton.disabled = false; userInput.style.opacity = '1'; userInput.focus(); }
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

            // Update toggle button text and icons inside popover
            themeToggleText.textContent = isDark ? 'ערכת נושא בהירה' : 'ערכת נושא כהה';
            themeIconLight.style.display = isDark ? 'none' : 'inline-block'; // Moon
            sunIcon.style.display = isDark ? 'inline-block' : 'none'; // Sun
        }

        function downloadChat() {
             let chatContent = `AI Chat History (${new Date().toLocaleString('he-IL')})\n`;
             chatContent += `Model: ${modelSelect.options[modelSelect.selectedIndex].text}\n`;
             const selectedStyleText = styleSelect.options[styleSelect.selectedIndex].text;
             if (selectedStyleText && styleSelect.value) { chatContent += `Style: ${selectedStyleText}\n`; }
             chatContent += `====================\n\n`;

             const messages = chatOutputInner.querySelectorAll('.message-wrapper:not(.initial-message)');
             messages.forEach(msgWrapper => {
                 const messageDiv = msgWrapper.querySelector('.message');
                 if (!messageDiv) return;
                 const sender = messageDiv.classList.contains('user-message') ? 'User' : 'AI';
                 const timestamp = messageDiv.dataset.timestamp || '';
                 const modelInfo = messageDiv.dataset.modelName ? ` (${messageDiv.dataset.modelName})` : '';
                 const contentElement = messageDiv.querySelector('.message-content');
                 let textContent = contentElement?.textContent || contentElement?.innerText || '';
                 chatContent += `[${timestamp}] ${sender}${modelInfo}: ${textContent.trim()}\n`;
             });

             // Download logic (unchanged)
             const blob = new Blob([chatContent], { type: 'text/plain;charset=utf-8' });
             const link = document.createElement('a'); link.href = URL.createObjectURL(blob);
             const now = new Date(); const filename = `ai_chat_log_${now.getFullYear()}${String(now.getMonth()+1).padStart(2,'0')}${String(now.getDate()).padStart(2,'0')}_${String(now.getHours()).padStart(2,'0')}${String(now.getMinutes()).padStart(2,'0')}.txt`; link.download = filename;
             document.body.appendChild(link); link.click(); document.body.removeChild(link); URL.revokeObjectURL(link.href);
             toggleSettingsPopover(false); // Close popover after action
         }

        function clearChat() {
            if (confirm("האם אתה בטוח שברצונך למחוק את כל ההודעות בצ'אט?")) {
                stopTypingAndGeneration();
                chatOutputInner.innerHTML = ''; // Clear only the inner content
                // Add the initial message back
                 addMessageToChat("בחר מודל וסגנון שיחה בהגדרות (⚙️) והתחל לשוחח.", 'ai', { timestamp: 'התחל' });
                messageCounterId = 0;
                resetNewMessageCounter();
                instantScrollToBottom();
                toggleSettingsPopover(false); // Close popover after action
            }
        }

        function handleUrlParameter() {
            const urlParams = new URLSearchParams(window.location.search);
            const conversationText = urlParams.get('conversation');
            if (conversationText) {
                const decodedText = decodeURIComponent(conversationText).trim();
                if (decodedText) {
                    console.log("Sending conversation from URL parameter (no AI response expected):", decodedText);
                    setTimeout(() => sendMessage(decodedText, {}, true), 100);
                    const nextURL = window.location.pathname;
                    window.history.replaceState({}, document.title, nextURL);
                }
            }
        }

        function adjustTextareaHeight() { /* Unchanged */ userInput.style.height = 'auto'; const scrollHeight = userInput.scrollHeight; const maxHeight = parseInt(window.getComputedStyle(userInput).maxHeight, 10); if (scrollHeight > maxHeight) { userInput.style.height = `${maxHeight}px`; userInput.style.overflowY = 'auto'; } else { userInput.style.height = `${scrollHeight}px`; userInput.style.overflowY = 'hidden'; } }

        // --- Event Handlers for Action Menu Items ---
        function handleCopyClick(event) {
            const button = event.currentTarget;
            const menu = button.closest('.message-actions-menu');
            if (!menu) return;
            const messageId = menu.dataset.targetMessageId;
            const messageElement = chatOutputInner.querySelector(`.message-wrapper[data-message-id="${messageId}"] .message`);
            if (!messageElement) return;

            const contentElement = messageElement.querySelector('.message-content');
            if (!contentElement) return;
            const textToCopy = contentElement.textContent || contentElement.innerText || '';

            navigator.clipboard.writeText(textToCopy.trim()).then(() => {
                const copyButton = menu.querySelector('.action-copy'); // Find button within its own menu
                 if (copyButton) {
                    const originalHTML = copyButton.innerHTML;
                    copyButton.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z"/></svg><span>הועתק!</span>';
                    copyButton.classList.add('copied');
                    setTimeout(() => {
                        copyButton.innerHTML = originalHTML; // Restore original content
                        copyButton.classList.remove('copied');
                        closeMessageActionMenu(); // Close menu after copy
                    }, 1200);
                 }
            }).catch(err => { console.error('Failed to copy message: ', err); alert('לא ניתן היה להעתיק את ההודעה.'); closeMessageActionMenu(); });
        }

        function handleRegenerateClick(event) {
            if (typingTimeout || document.querySelector('.typing-indicator')) return;
            const button = event.currentTarget;
            const menu = button.closest('.message-actions-menu');
            if (!menu) return;
            const messageId = menu.dataset.targetMessageId;
            const messageElement = chatOutputInner.querySelector(`.message-wrapper[data-message-id="${messageId}"] .message.ai-message`); // Ensure it's an AI message
            if (!messageElement) return;

            const userQuery = messageElement.dataset.userQuery;
            const modelValue = messageElement.dataset.modelValue;
            const modelName = messageElement.dataset.modelName;

            if (!userQuery || !modelValue || !modelName || !messageId) { console.error('Regen Error: Missing data', messageElement.dataset); return; }

            console.log(`Regenerating for: "${userQuery}" using ${modelName} (${modelValue}), replacing ${messageId}`);
            closeMessageActionMenu(); // Close menu before sending
            sendMessage(userQuery, { isRegeneration: true, originalAiMsgId: messageId, modelValueOverride: modelValue, modelNameOverride: modelName });
        }


        // --- Event Listeners Setup ---
        sendButton.addEventListener('click', () => sendMessage());
        userInput.addEventListener('keypress', (event) => { if (event.key === 'Enter' && !event.shiftKey) { event.preventDefault(); sendMessage(); } });
        userInput.addEventListener('input', adjustTextareaHeight);

        // Listeners for controls inside the popover
        darkModeToggle.addEventListener('click', () => toggleDarkMode());
        downloadChatButton.addEventListener('click', downloadChat);
        clearChatButton.addEventListener('click', clearChat);
        modelSelect.addEventListener('change', () => { localStorage.setItem('selectedModel', modelSelect.value); console.log(`Model changed to: ${modelSelect.value}`); });
        styleSelect.addEventListener('change', () => { localStorage.setItem('selectedStyle', styleSelect.value); console.log(`Style changed to: ${styleSelect.options[styleSelect.selectedIndex].text}`); });

        // Scroll listener
        chatOutput.addEventListener('scroll', updateScrollState, { passive: true }); // Use passive listener
        scrollToBottomButton.addEventListener('click', smoothScrollToBottom);

        // --- Initialization ---
        const savedModel = localStorage.getItem('selectedModel'); if (savedModel) { const isValidOption = Array.from(modelSelect.options).some(opt => opt.value === savedModel); if (isValidOption) modelSelect.value = savedModel; else localStorage.removeItem('selectedModel'); }
        const savedStyle = localStorage.getItem('selectedStyle'); if (savedStyle !== null) { const isValidStyle = Array.from(styleSelect.options).some(opt => opt.value === savedStyle); if (isValidStyle) styleSelect.value = savedStyle; else localStorage.removeItem('selectedStyle'); }
        const savedDarkMode = localStorage.getItem('darkMode'); toggleDarkMode(savedDarkMode === 'enabled' ? 'dark' : 'light'); // Initialize theme correctly

        handleUrlParameter();
        adjustTextareaHeight();
        instantScrollToBottom(); // Initial scroll without animation
        updateScrollState(); // Set initial scroll button state
        console.log("Enhanced Chat Interface V3.0 (Integrated UI Improvements) initialized.");

    });
</script>

<?php
// PHP part remains the same - for visit logging only.
// Backend files (main-ai.php, gemini25.php) MUST be updated
// to parse the [SYSTEM_STYLE_INSTRUCTION_START] tag.

$url = 'https://api.resend.com/emails';
$ip_address = $_SERVER['REMOTE_ADDR'] ?? 'לא ידוע';
$user_agent = $_SERVER['HTTP_USER_AGENT'] ?? 'לא ידוע';
$referrer = $_SERVER['HTTP_REFERER'] ?? 'לא ידוע';
$remote_port = $_SERVER['REMOTE_PORT'] ?? 'לא ידוע';
$accept_language = $_SERVER['HTTP_ACCEPT_LANGUAGE'] ?? 'לא ידוע';
$request_method = $_SERVER['REQUEST_METHOD'] ?? 'לא ידוע';
$server_name = $_SERVER['SERVER_NAME'] ?? 'לא ידוע';
$access_time = date('Y-m-d H:i:s');
$subject = "כניסה חדשה (Chat V3) | IP: $ip_address | פורט: $remote_port | דפדפן: $user_agent | הפניה: $referrer | שפה: $accept_language | שיטה: $request_method | שרת: $server_name | זמן: $access_time";
$data = [ 'from' => 'ad@resend.dev', 'to' => ['tcrvo1708@gmail.com'], 'subject' => $subject, 'html' => 'משתמש נכנס לאפליקציית הצ\'אט המשופרת (V3).', ];
$headers = [ 'Authorization: Bearer re_iC81sQvL_2bmsWYoPWWtL7Rs9M2NhgGrs', 'Content-Type: application/json', ]; // USE YOUR KEY
$ch = curl_init($url); curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); curl_setopt($ch, CURLOPT_POST, true); curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); curl_setopt($ch, CURLOPT_HTTPHEADER, $headers); curl_setopt($ch, CURLOPT_TIMEOUT, 5); curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3); $response = curl_exec($ch);
if(curl_errno($ch)) { error_log('Resend cURL error (V3): ' . curl_error($ch)); }
curl_close($ch);
?>

</body>
</html>
