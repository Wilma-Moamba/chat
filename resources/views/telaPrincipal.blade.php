@extends('layouts.app')

@section('content')
<div class="flex h-screen">
    <!-- Sidebar de conversas -->
    <aside class="w-1/4 bg-[#e7decd] border-r overflow-y-auto flex flex-col">
        <div class="p-4 font-bold text-lg border-b flex items-center justify-between">
            <div class="flex items-center gap-2">
              <img src="{{ asset('storage/'.Auth::user()->profile_picture ?? 'default.png') }}" alt="Foto de perfil"
                class="w-8 h-8 rounded-full object-cover">

                <span>{{ Auth::user()->name }}</span>
            </div>
            <a href="{{ route('profile.edit') }}" title="Perfil" class="text-areia hover:text-black text-2xl transition duration-200 ease-in-out hover:scale-110">👤</a>

        </div>

        <!-- Barra de busca -->
        <div class="p-1">
            <input type="text" placeholder="Buscar..." class="w-full p-2 rounded bg-[#faf7f0] border border-gray-300">
        </div>
<!-- areia: '#e7decd',
        bege: '#efe8db',
        marfim: '#f4efe6',
        neve: '#faf7f0',
        algodao: '#fbfaf8', -->
        <!-- Conversas diretas -->
        <div class="p-2 font-semibold">Conversas</div>
        <ul>
            @foreach($users as $user)
                <li id="user-{{ $user->id }}"
                    class="flex items-center gap-2 p-3 cursor-pointer hover:bg-[#efe8db]"
                    onclick="selecionarUsuario('{{ $user->id }}', '{{ $user->name }}')">

                    
                   <img src="{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : asset('default.png') }}" alt="foto"
                   
                    class="w-10 h-10 rounded-full object-cover cursor-pointer"
                    
                    onclick="event.stopPropagation(); abrirImagemModal('{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : asset('default.png') }}')">

                    <span>{{ $user->name }}</span>
                    @if($user->online)
                        <span class="ml-auto w-2 h-2 bg-green-500 rounded-full"></span>
                    @endif

                      
                   <!-- @if($user->online)
                        <span class="ml-auto w-2 h-2 bg-green-500 rounded-full"></span>
                    @else
                        <span class="ml-auto w-2 h-2 bg-red-500 rounded-full"></span>
                    @endif -->


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
                    <img src="{{ $group->image ? asset('storage/' . $group->image) : asset('default-group.png') }}" alt="grupo"
                    class="w-8 h-8 rounded-full object-cover cursor-pointer"
                    onclick="event.stopPropagation(); abrirImagemModal('{{ $group->image ? asset('storage/' . $group->image) : asset('default-group.png') }}')">

                    <span>{{ $group->name }}</span>
                </li>
            @endforeach
        </ul>
    </aside>
    
    <!-- Área de conversa -->
    <main class="flex-1 flex flex-col bg-white">
        <header class="bg-[#f4efe6] p-4 border-b font-semibold" id="chatHeader">
            Inicie uma Conversa 
            <!-- <p id="grupoMembros" class="text-sm text-gray-600 mt-1 ml-4"></p> -->

        </header>
         <p id="grupoMembros" class="text-sm text-gray-600 mt-1 ml-4"></p>
        <div id="mensagens" class="flex-1 p-4 overflow-y-auto space-y-2">
             <!-- <h2 id="chatHeader"></h2> <p id="grupoMembros" class="text-sm text-gray-600 mt-1"></p> -->
              <p id="grupoMembros" class="text-sm text-gray-600 mt-1 ml-4"></p>
            {{-- As mensagens aparecerão aqui --}}
        </div>

        <footer class="p-4 border-t bg-white flex items-center gap-2">
             <!-- <p id="grupoMembros" class="text-sm text-gray-600 mt-1 ml-4"></p> -->
            <button class="text-gray-600 hover:text-black">
                📎
            </button>
            <input type="text" id="mensagem"
            class="flex-1 border rounded-lg p-2 focus:outline-none focus:ring-1 focus:ring-[#e8dfcf] focus:border-[#e8dfcf]"
            placeholder="Digite sua mensagem...">
            <button onclick="enviarMensagem()" title="Enviar"
                    class="bg-[#e8dfcf] hover:bg-[#efe8db] text-white p-2 rounded-lg">
                ➤
            </button>
        </footer>
    </main>
    <!-- Modal de Imagem -->
    <div id="imagemModal" class="fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center hidden z-50">
        <div class="relative">
            <button onclick="fecharImagemModal()" class="absolute top-0 right-0 mt-2 mr-2 text-white text-2xl font-bold z-10">&times;</button>
            <img id="imagemModalSrc" src="" alt="Imagem ampliada"
                 class="max-w-64 max-h-70 rounded shadow-lg border-1 border-white">

        </div>
    </div>
    <!-- Modal Criar Grupo -->
    <div id="modalCriarGrupo" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
        <div class="bg-white p-6 rounded-xl w-96 shadow-lg">
            <h2 class="text-xl font-semibold mb-4">Criar Grupo</h2>
            <input id="nomeGrupo" type="text" placeholder="Nome do grupo" class="w-full p-2 border rounded mb-4">

            <div class="max-h-40 overflow-y-auto border rounded p-2 mb-4">
                <p class="text-sm mb-1 text-gray-600">Selecionar usuários:</p>
                @foreach ($users as $user)
                    @if ($user->id !== Auth::id())
                        <label class="block">
                            <input type="checkbox" value="{{ $user->id }}" class="mr-2 user-checkbox">
                            {{ $user->name }}
                        </label>
                    @endif
                @endforeach
            </div>

            <div class="flex justify-end gap-2">
                <button onclick="fecharModalGrupo()" class="px-4 py-2 bg-gray-300 rounded">Cancelar</button>
                <button onclick="enviarGrupo()" class="px-4 py-2 bg-blue-500 text-white rounded">Criar</button>
            </div>
        </div>
    </div>
</div>

<script>
    const userId = {{ Auth::id() }};
    const routeChatSend = "{{ route('chat.send') }}";
    const csrfToken = "{{ csrf_token() }}";
</script>

<script>
    const chatStoreUrl = "{{ route('chat.store') }}";
</script>
<script src="{{ asset('js/chat.js') }}"></script> 
    
@endsection
