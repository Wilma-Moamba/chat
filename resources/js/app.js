import Echo from 'laravel-echo';
import { io } from 'socket.io-client';

window.io = io;

window.Echo = new Echo({
    broadcaster: 'socket.io',
    host: window.location.hostname + ':6001', // ou o host onde está o Echo Server
    auth: {
        headers: {
            Authorization: 'Bearer ' + localStorage.getItem('token') // se usar auth API
        }
    }
});

// Exemplo para ouvir mensagens privadas
window.Echo.private('chat.' + userId).listen('MensagemEnviada', (e) => {
    console.log('Mensagem recebida:', e);
});

// Exemplo para grupos
window.Echo.private('grupo.' + groupId).listen('MensagemEnviada', (e) => {
    console.log('Mensagem no grupo:', e);
});
