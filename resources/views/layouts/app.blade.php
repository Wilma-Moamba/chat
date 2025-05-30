<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Chat') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/ioredis@5.6.1/built/Script.min.js"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-[#f4efe6]">
    <!-- Cabeçalho personalizado (opcional) -->
    <!-- <header class="bg-[#fbfaf8] p-4 border-b flex justify-between items-center shadow">
        <h1 class="text-xl font-semibold text-gray-800">Chat</h1>
        <div class="text-gray-600">{{ Auth::user()->name }}</div>
    </header> -->

    <!-- Conteúdo da Página -->
    <main class="min-h-screen">
        @yield('content')
    </main>
</body>
</html>
