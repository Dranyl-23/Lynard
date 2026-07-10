import Echo from 'laravel-echo';

import Pusher from 'pusher-js';
window.Pusher = Pusher;

try {
    const config = window.Laravel || {};
    window.Echo = new Echo({
        broadcaster: 'pusher',
        key: config.pusherAppKey || 'empty-key',
        cluster: config.pusherCluster || 'mt1',
        forceTLS: true,
        enabledTransports: ['ws', 'wss'],
    });
} catch (e) {
    console.error("Echo/Pusher initialization failed:", e);
}
