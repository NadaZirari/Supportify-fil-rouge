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

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <!-- Personal Information -->
            <div class="bg-gray-800 bg-opacity-50 rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-4">Informations personnelles</h3>
                
                <div class="grid grid-cols-1 gap-4">
                    <div>
                        <label class="block text-gray-400 text-sm mb-1">Nom</label>
                        <input type="text" value="{{ $user->name ?? 'Nada ZIRARI' }}" class="w-full bg-gray-900 border border-gray-700 rounded-md px-3 py-2 text-white" readonly>
                    </div>
                    
                    <div>
                        <label class="block text-gray-400 text-sm mb-1">Email</label>
                        <input type="email" value="{{ $user->email ?? 'NADA@GMAIL.com' }}" class="w-full bg-gray-900 border border-gray-700 rounded-md px-3 py-2 text-white" readonly>
                    </div>
                    
                    <div>
                        <label class="block text-gray-400 text-sm mb-1">Téléphone</label>
                        <input type="tel" value="{{ $user->phone ?? '+33 6 12 34 56 78' }}" class="w-full bg-gray-900 border border-gray-700 rounded-md px-3 py-2 text-white" readonly>
                    </div>
                    
                    <div>
                        <label class="block text-gray-400 text-sm mb-1">Entreprise</label>
                        <input type="text" value="{{ $user->company ?? 'TechCorp' }}" class="w-full bg-gray-900 border border-gray-700 rounded-md px-3 py-2 text-white" readonly>
                    </div>
                </div>
            </div>
            
            <!-- Notification Preferences -->
            <div class="bg-gray-800 bg-opacity-50 rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-4">Préférences de notification</h3>
                
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="font-medium">Email</p>
                            <p class="text-sm text-gray-400">Notifications par email</p>
                        </div>
                        <div class="relative inline-block w-12 mr-2 align-middle select-none">
                            <input type="checkbox" name="email_notifications" id="email_notifications" checked class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer right-0"/>
                            <label for="email_notifications" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-600 cursor-pointer"></label>
                        </div>
                    </div>
                    
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="font-medium">Desktop</p>
                            <p class="text-sm text-gray-400">Notifications sur le bureau</p>
                        </div>
                        <div class="relative inline-block w-12 mr-2 align-middle select-none">
                            <input type="checkbox" name="desktop_notifications" id="desktop_notifications" class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer"/>
                            <label for="desktop_notifications" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-600 cursor-pointer"></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
       
</body>
</html>