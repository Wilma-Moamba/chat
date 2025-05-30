window.Echo.channel('chat.1.2')
    .listen('NewMessage', (e) => {
        console.log('Mensagem privada:', e.message);
    });

window.Echo.channel('group.3')
    .listen('NewMessage', (e) => {
        console.log('Mensagem do grupo:', e.message);
    });
