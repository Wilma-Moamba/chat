// import Echo from 'laravel-echo';
// window.io = require('socket.io-client');

// window.Echo = new Echo({
//     broadcaster: 'socket.io',
//     host: window.location.hostname + ':6001', // ajuste a porta se necessário
// });

import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: import.meta.env.VITE_PUSHER_APP_KEY,
    cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
    forceTLS: true,
});
