@extends('layouts.app')

@section('content')
<div class="flex h-screen">
    <!-- Sidebar de conversas -->
    <aside class="w-1/4 bg-[#e7decd] border-r overflow-y-auto flex flex-col">
        <div class="p-4 font-bold text-lg border-b flex items-center justify-between">
            <div class="flex items-center gap-2">
                <img src="{{ Auth::user()->profile_picture ?? '/default.png' }}" alt="Foto de perfil"
                     class="w-8 h-8 rounded-full object-cover">
                <span>{{ Auth::user()->name }}</span>
            </div>
        </div>

        <!-- Barra de busca -->
        <div class="p-2">
            <input type="text" placeholder="Buscar..." class="w-full p-2 rounded bg-[#fbfaf8] border border-gray-300">
        </div>

        <!-- Conversas diretas -->
        <div class="p-2 font-semibold">Conversas</div>
        <ul>
            @foreach($users as $user)
                <li id="user-{{ $user->id }}"
                    class="flex items-center gap-2 p-3 cursor-pointer hover:bg-[#faf7f0]"
                    onclick="selecionarUsuario('{{ $user->id }}', '{{ $user->name }}')">
                    <img src="{{ $user->profile_picture ?? '/default.png' }}" alt="foto"
                         class="w-8 h-8 rounded-full object-cover">
                    <span>{{ $user->name }}</span>
                    @if($user->online)
                        <span class="ml-auto w-2 h-2 bg-green-500 rounded-full"></span>
                    @endif
                </li>
            @endforeach
        </ul>

        <!-- Grupos -->
        <div class="p-2 font-semibold mt-4 flex justify-between items-center">
            <span>Grupos</span>
            <button onclick="criarGrupo()" title="Criar grupo" class="text-blue-700 hover:text-blue-900 text-lg">＋</button>
        </div>
        <ul>
            @foreach($groups ?? [] as $group)
                <li id="group-{{ $group->id }}"
                    class="flex items-center gap-2 p-3 cursor-pointer hover:bg-[#faf7f0]"
                    onclick="selecionarGrupo('{{ $group->id }}', '{{ $group->name }}')">
                    <img src="{{ $group->image ?? '/default-group.png' }}" alt="grupo"
                         class="w-8 h-8 rounded-full object-cover">
                    <span>{{ $group->name }}</span>
                </li>
            @endforeach
        </ul>
    </aside>

    <!-- Área de conversa -->
    <main class="flex-1 flex flex-col bg-[#f4efe6]">
        <header class="bg-white p-4 border-b font-semibold" id="chatHeader">
            Selecione um usuário ou grupo
        </header>

        <div id="chatBox" class="flex-1 p-4 overflow-y-auto space-y-2">
            {{-- As mensagens aparecerão aqui --}}
        </div>

        <footer class="p-4 border-t bg-white flex items-center gap-2">
            <button class="text-gray-600 hover:text-black">
                📎
            </button>
            <input type="text" id="mensagem" class="flex-1 border rounded-lg p-2"
                   placeholder="Digite sua mensagem...">
            <button onclick="enviarMensagem()" title="Enviar"
                    class="bg-blue-500 hover:bg-blue-600 text-white p-2 rounded-lg">
                ➤
            </button>
        </footer>
    </main>
</div>

<script>
    let destinoId = null;
    let tipoDestino = null;

    function selecionarUsuario(id, nome) {
        limparSelecao();
        document.getElementById('user-' + id).classList.add('bg-white');
        destinoId = id;
        tipoDestino = 'user';
        document.getElementById('chatHeader').innerText = 'Chat com ' + nome;
        carregarMensagens();
    }

    function selecionarGrupo(id, nome) {
        limparSelecao();
        document.getElementById('group-' + id).classList.add('bg-white');
        destinoId = id;
        tipoDestino = 'group';
        document.getElementById('chatHeader').innerText = 'Grupo: ' + nome;
        carregarMensagens();
    }

    function limparSelecao() {
        document.querySelectorAll('li.bg-white').forEach(el => el.classList.remove('bg-white'));
    }

    function enviarMensagem() {
        const mensagem = document.getElementById('mensagem').value.trim();
        if (!mensagem || !destinoId) return;

        const chatBox = document.getElementById('chatBox');
        const div = document.createElement('div');
        div.className = 'text-right';
        div.innerHTML = `<span class="inline-block bg-[#fbfaf8] text-black px-3 py-2 rounded-lg">${mensagem}</span>`;
        chatBox.appendChild(div);
        document.getElementById('mensagem').value = '';
        chatBox.scrollTop = chatBox.scrollHeight;
    }

    function carregarMensagens() {
        // Requisição futura para buscar mensagens
    }

    function criarGrupo() {
        alert('Funcionalidade para criar grupo será implementada!');
    }
</script>
@endsection
