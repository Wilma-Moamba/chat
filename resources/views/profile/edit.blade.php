
@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                <!-- FORMULÁRIO para atualização da imagem de perfil -->
                <form method="POST" action="{{ route('profile.updatePicture') }}" enctype="multipart/form-data">
                    @csrf

                    <!-- Mostrar imagem atual -->
                    <div class="mb-4">
                        <label class="block font-semibold">Imagem atual:</label>
                        <img src="{{ Auth::user()->profile_picture 
                            ? asset('storage/' . Auth::user()->profile_picture) 
                            : asset('default.png') }}" 
                            alt="Foto atual"
                            class="w-24 h-24 rounded-full object-cover border mt-1">
                    </div>

                    <!-- Input de nova imagem -->
                    <label for="profile_picture" class="block font-semibold">Nova imagem:</label>
                    <input type="file" name="profile_picture" id="profile_picture" accept="image/*"
                        onchange="previewImage(event)" required>

                    <!-- Pré-visualização -->
                    <div id="preview-container" class="mt-2 hidden">
                        <p class="text-sm text-gray-600">Pré-visualização:</p>
                        <img id="preview" class="w-24 h-24 rounded-full object-cover border" />
                    </div>

                    <!-- Botão de envio -->
                    <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                        Salvar Imagem
                    </button>
                </form>
            </div>
        </div>

        <!-- Script para pré-visualização -->
        <script>
            function previewImage(event) {
                const previewContainer = document.getElementById('preview-container');
                const preview = document.getElementById('preview');

                const file = event.target.files[0];
                if (file) {
                    preview.src = URL.createObjectURL(file);
                    previewContainer.classList.remove('hidden');
                } else {
                    preview.src = '';
                    previewContainer.classList.add('hidden');
                }
            }
        </script>


            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

             <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-red-600 hover:text-red-800 font-semibold">
                            Logout
                        </button>
                    </form>
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
@endsection
