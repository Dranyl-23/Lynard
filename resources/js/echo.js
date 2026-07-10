import Echo from 'laravel-echo';

import Pusher from 'pusher-js';
window.Pusher = Pusher;

try {
    const reverbConfig = window.Laravel || {};
    window.Echo = new Echo({
        broadcaster: 'reverb',
        key: reverbConfig.reverbAppKey || 'empty-key',
        wsHost: reverbConfig.reverbHost || '127.0.0.1',
        wsPort: reverbConfig.reverbPort || 80,
        wssPort: reverbConfig.reverbPort || 443,
        forceTLS: (reverbConfig.reverbScheme || 'https') === 'https',
        enabledTransports: ['ws', 'wss'],
    });
} catch (e) {
    console.error("Echo/Pusher initialization failed:", e);
}
