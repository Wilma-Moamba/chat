<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem-vindo ao Sandy Chat</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- <style>
        .sidebar {
            background-color: #e7decd;
            width: 250px;
            /* height: 100vh; */
            padding: 20px;
        }
    </style> -->
</head>
<body class="bg-[#f4efe6] text-gray-800 font-sans">
    <!-- Seção principal -->
    <div class="min-h-screen flex flex-col items-center justify-center relative overflow-hidden px-6">
        
        <!-- Círculo decorativo grande -->
        <div class="absolute w-[700px] h-[700px] bg-[#e7decd] rounded-full top-[-250px] -left-[250px] opacity-30"></div>
        
        <!-- Círculo decorativo menor -->
        <div class="absolute w-[300px] h-[300px] bg-[#fbfaf8] rounded-full bottom-[-100px] -right-[100px] opacity-40"></div>

        <!-- Retângulo branco central -->
        <div class="bg-white shadow-xl rounded-3xl w-full max-w-5xl z-10 p-8 md:p-12 flex flex-col md:flex-row items-center justify-between gap-10">
            
            <!-- Texto e botões -->
            <div class="flex-1">
                <!-- <img src="{{ asset('chat1.png') }}" alt="team communication" class="w-24 h-24 rounded-full bg-[#efe8db] p-2 absolute top-10 left-32" > -->
                <p  class="w-24 h-24 rounded-full bg-[#efe8db] p-2 absolute top-10 left-28" >
                <p  class="w-24 h-24 rounded-full bg-[#efe8db] p-2 absolute top-5 left-48" >
                <p  class="w-24 h-24 rounded-full bg-[#efe8db] p-2 absolute top-20 left-38" >
                <p  class="w-24 h-24 rounded-full bg-[#efe8db] p-2 absolute top-20 left-28" >

                <!-- <p  class="w-24 h-24 rounded-full bg-[#d9cbb7] p-2 absolute top-10 left-28" >
                <p  class="w-24 h-24 rounded-full bg-[#d9cbb7] p-2 absolute top-5 left-48" >
                <p  class="w-24 h-24 rounded-full bg-[#d9cbb7] p-2 absolute top-20 left-38" >
                <p  class="w-24 h-24 rounded-full bg-[#d9cbb7] p-2 absolute top-20 left-28" > -->
                <h1 class="text-4xl font-bold mb-4">Bem-vindo ao Chat</h1>
                <p class="text-lg mb-6 text-gray-600">
                    Uma experiência de conversa moderna, elegante e organizada. Conecte-se com amigos, grupos e comunidades em um só lugar.
                </p>
                
                <div class="flex gap-4">
                    <a href="{{ route('register') }}" class="bg-[#e7decd] hover:bg-[#d9cbb7] text-gray-800 font-semibold py-2 px-6 rounded-full transition duration-200">Registar</a>
                    <a href="{{ route('login') }}" class="bg-transparent border border-[#e7decd] hover:bg-[#efe8db] text-gray-800 font-semibold py-2 px-6 rounded-full transition duration-200">Fazer Login</a>
                </div>
            </div>

            <!-- Imagem -->
            <div class="flex-1">
                <!-- <img src="https://cdn-icons-png.flaticon.com/512/4712/4712291.png" alt="team communication" class="w-full max-w-sm mx-auto"> -->
                <img src="{{ asset('pessoas.jpg') }}" alt="team communication" class="w-full max-w-sm mx-auto rounded-full" >
                
            </div>
            
        </div>

        <!-- Linha com recursos -->
        
        </div>
    </div>
</body>
</html>
