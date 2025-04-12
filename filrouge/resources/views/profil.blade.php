<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Utilisateur - Supportify</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #1a1a2e;
            color: #ffffff;
            font-family: 'Inter', sans-serif;
        }
        .toggle-checkbox:checked {
            right: 0;
            border-color: #ff6b6b;
        }
        .toggle-checkbox:checked + .toggle-label {
            background-color: #ff6b6b;
        }
    </style>
</head>
<body class="min-h-screen">
    <!-- Header -->
    <header class="flex justify-between items-center px-6 py-4 border-b border-gray-700">
        <div class="flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            <h1 class="text-xl font-bold text-white">Supportify</h1>
        </div>
        <div class="w-8 h-8 rounded-full bg-blue-500 overflow-hidden">
            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Avatar" class="w-full h-full object-cover">
        </div>
    </header>

    <div class="container mx-auto px-4 py-6 max-w-6xl">
        <!-- Profile Card -->
        <div class="bg-gray-800 bg-opacity-50 rounded-lg p-6 mb-6">
            <div class="flex flex-col md:flex-row items-center md:items-start">
                <div class="w-20 h-20 rounded-full overflow-hidden mb-4 md:mb-0 md:mr-6">
                    <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Nada ZIRARI" class="w-full h-full object-cover">
                </div>
                <div class="flex-1 text-center md:text-left">
                    <h2 class="text-xl font-bold">{{ $user->name ?? 'Nada ZIRARI' }}</h2>
                    <p class="text-gray-400">{{ $user->email ?? 'NADA@GMAIL.com' }}</p>
                </div>
                <button class="mt-4 md:mt-0 bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-md text-sm transition duration-200">
                    Modifier le profil
                </button>
            </div>
        </div>

        
</body>
</html>