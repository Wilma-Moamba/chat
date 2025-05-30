let usuarioSelecionadoId = null;
let grupoSelecionadoId = null;

// Enviar mensagem
function enviarMensagem() {
    const mensagemInput = document.getElementById('mensagem');
    const body = mensagemInput.value.trim();

    if (!body || (!usuarioSelecionadoId && !grupoSelecionadoId)) return;

    fetch(routeChatSend, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken
        },
        body: JSON.stringify({
            body,
            receiver_id: usuarioSelecionadoId,
            group_id: grupoSelecionadoId
        })
    }).then(res => res.json())
      .then(data => {
        mensagemInput.value = '';
        if (usuarioSelecionadoId) {
            carregarMensagens('user', usuarioSelecionadoId);
        } else if (grupoSelecionadoId) {
            carregarMensagens('group', grupoSelecionadoId);
        }

      })
      .catch(error => {
        console.error('Erro ao enviar a mensagem:', error);
        alert('Erro ao enviar a mensagem. Veja o console para mais detalhes.');
    });
}

// Selecionar conversa com usuário
function selecionarUsuario(id, nome) {
    limparSelecao();
    document.getElementById('user-' + id).classList.add('bg-yellow-50');



    grupoSelecionadoId = null;
    usuarioSelecionadoId = id;
    document.getElementById("chatHeader").innerText = `Conversando com ${nome}`;
    carregarMensagens('user', id);
}

// Selecionar grupo
function selecionarGrupo(id, nome) {
    limparSelecao();
    document.getElementById('group-' + id).classList.add('bg-yellow-50');

    usuarioSelecionadoId = null;
    grupoSelecionadoId = id;
    document.getElementById("chatHeader").innerText = `Grupo: ${nome}`;
    carregarMensagens('group', id);

    fetch(`/chat/grupo/${id}/usuarios`)
        .then(res => res.json())
        .then(membros => {
            const nomes = membros.map(m => m.name).join(', ');
            document.getElementById("grupoMembros").innerText = `Membros: ${nomes}`;
        })
        .catch(() => {
            document.getElementById("grupoMembros").innerText = 'Membrs: erro ao carregar';
        });

}

// Carregar mensagens via AJAX
function carregarMensagens(tipo, id) {
    fetch(`/chat/messages/${tipo}/${id}`)
        .then(res => res.json())
        .then(data => {
            const mensagensDiv = document.getElementById("mensagens");
            mensagensDiv.innerHTML = '';
            data.forEach(msg => {
                const msgEl = document.createElement('div');
                msgEl.className = `inline-block p-2 rounded mb-2 max-w-[70%] break-words ${
                    msg.sender_id == userId
                        ? 'bg-[#e8dfcf] text-right self-end'
                        : 'bg-[#f4efe6] self-start'
                }`;
                // msgEl.className = `p-2 rounded max-w-lg ${msg.sender_id == userId ? 'bg-[#e8dfcf] text-right mb-2' : 'bg-[#f4efe6]'} w-fit`;
                msgEl.textContent = msg.body;
                 const wrapper = document.createElement('div');
                wrapper.className = 'flex w-full';
                wrapper.classList.add(msg.sender_id == userId ? 'justify-end' : 'justify-start');

                wrapper.appendChild(msgEl);
                mensagensDiv.appendChild(wrapper);
            });
            mensagensDiv.scrollTop = mensagensDiv.scrollHeight;
        });
}

function limparSelecao() {
    document.querySelectorAll('li.bg-yellow-50').forEach(el => el.classList.remove('bg-yellow-50'));
}


// Receber mensagens com Echo
window.Echo.private(`chat.${userId}`)
    .listen('MensagemEnviada', (e) => {
        if (e.message.receiver_id == usuarioSelecionadoId || e.message.group_id == grupoSelecionadoId) {
            adicionarMensagem(e.message);
        }
    });

window.Echo.channel('chat.grupos')
    .listen('MensagemEnviada', (e) => {
        if (e.message.group_id == grupoSelecionadoId) {
            adicionarMensagem(e.message);
        }
    });

function adicionarMensagem(msg) {
    const mensagensDiv = document.getElementById("mensagens");
    const msgEl = document.createElement('div');
    msgEl.className = `p-2 rounded max-w-lg ${msg.sender_id == userId ? 'bg-blue-100 self-end' : 'bg-gray-200'}`;
    msgEl.textContent = msg.body;
    mensagensDiv.appendChild(msgEl);
    mensagensDiv.scrollTop = mensagensDiv.scrollHeight;
}








    function limparSelecao() {
        document.querySelectorAll('li.bg-yellow-50').forEach(el => el.classList.remove('bg-yellow-50'));
    }


    function criarGrupo() {
        document.getElementById('modalCriarGrupo').classList.remove('hidden');
    }

    function fecharModalGrupo() {
        document.getElementById('modalCriarGrupo').classList.add('hidden');
    }

    function enviarGrupo() {
        const nome = document.getElementById('nomeGrupo').value.trim();
        const checkboxes = document.querySelectorAll('.user-checkbox:checked');
        const users = Array.from(checkboxes).map(cb => cb.value);

        if (!nome) {
            alert('Digite o nome do grupo.');
            return;
        }

        const formData = new FormData();
        formData.append('name', nome);
        users.forEach(user => formData.append('users[]', user));

        fetch("{{ route('chat.store') }}", {
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            body: formData
        })
        .then(res => res.json())
        .then(data => {
             
            alert(data.message);
            fecharModalGrupo();
            location.reload(); 
        })
        .catch(() => alert('Erro ao criar grupo!'));
    }

    
    function abrirImagemModal(imagemPath) {
        const modal = document.getElementById('imagemModal');
        const img = document.getElementById('imagemModalSrc');

        const src = imagemPath.startsWith('http') || imagemPath.startsWith('/') 
            ? imagemPath 
            : '/storage/' + imagemPath;

        img.src = src;
        modal.classList.remove('hidden');
    }

    function fecharImagemModal() {
        document.getElementById('imagemModal').classList.add('hidden');
    }

    document.addEventListener('click', function (event) {
        const modal = document.getElementById('imagemModal');
        const img = document.getElementById('imagemModalSrc');

        if (!img.contains(event.target) && !event.target.closest('#imagemModalSrc') && modal.classList.contains('flex')) {
            fecharImagemModal();
        }
    });


    


    

