<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Détail du ticket - Problème de connexion</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Ou si vous utilisez Laravel Mix/Vite -->
    <!-- @vite('resources/css/app.css') -->
    
    <!-- Styles supplémentaires si nécessaire -->
    <style>
        /* Styles personnalisés si besoin */
    </style>
</head>
<body class="bg-gray-900 text-white">
    <!-- Header -->
    <div class="p-4 border-b border-gray-800">
        <a href="{{ route('tickets.index') }}" class="flex items-center text-gray-400 hover:text-white">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M19 12H5M12 19l-7-7 7-7"/>
            </svg>
            Retour aux tickets
        </a>
    </div>

    <!-- Ticket details -->
    <div class="max-w-4xl mx-auto p-4">
        <div class="bg-gray-800 rounded-lg overflow-hidden mb-6">
            <div class="p-6">
                <div class="flex justify-between items-start mb-4">
                    <h1 class="text-xl font-bold">Problème de connexion</h1>
                    <button class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-md text-sm">
                        Fermer le ticket
                    </button>
                </div>
                
                <div class="flex items-center mb-4">
                    <span class="bg-red-900 text-red-200 text-xs px-2 py-1 rounded mr-2">Haute priorité</span>
                    <span class="bg-yellow-900 text-yellow-200 text-xs px-2 py-1 rounded mr-4">En cours</span>
                    <span class="text-gray-400 text-sm">Créé le 01/03/2025</span>
                </div>
                
                <p class="text-gray-300 mb-6">
                    Je n'arrive pas à me connecter à mon compte depuis ce matin. J'ai essayé de réinitialiser mon mot de passe mais je ne reçois pas l'email de confirmation.
                </p>
                
                <div>
                    <h3 class="text-sm font-medium text-gray-400 mb-2">Pièces jointes</h3>
                    <div class="flex space-x-2">
                        <a href="#" class="flex items-center bg-gray-700 hover:bg-gray-600 rounded px-3 py-2 text-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="2" y="2" width="20" height="20" rx="2" ry="2"></rect>
                                <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                <polyline points="21 15 16 10 5 21"></polyline>
                            </svg>
                            screenshot.png
                        </a>
                        <a href="#" class="flex items-center bg-gray-700 hover:bg-gray-600 rounded px-3 py-2 text-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                <polyline points="14 2 14 8 20 8"></polyline>
                                <line x1="16" y1="13" x2="8" y2="13"></line>
                                <line x1="16" y1="17" x2="8" y2="17"></line>
                                <polyline points="10 9 9 9 8 9"></polyline>
                            </svg>
                            logs.pdf
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Chat section -->
        <div class="bg-gray-800 rounded-lg overflow-hidden mb-6">
            <div class="p-6">
                <!-- User message -->
                <div class="flex mb-6">
                    <div class="flex-shrink-0 mr-3">
                        <div class="w-10 h-10 rounded-full bg-blue-600 flex items-center justify-center text-white font-bold">
                            {{ substr($ticket->user->name ?? 'U', 0, 1) }}
                        </div>
                    </div>
                    <div>
                        <div class="bg-blue-600 rounded-lg p-3 mb-1 max-w-md">
                            <p class="text-white">Bonjour, je n'arrive pas à me connecter à mon compte depuis ce matin.</p>
                        </div>
                        <p class="text-xs text-gray-500">01/03/2025 09:15</p>
                    </div>
                </div>
                
                <!-- Support agent message -->
                <div class="flex mb-6">
                    <div class="flex-shrink-0 mr-3">
                        <div class="w-10 h-10 rounded-full bg-gray-600 flex items-center justify-center text-white font-bold">
                            {{ substr($ticket->agent->name ?? 'A', 0, 1) }}
                        </div>
                    </div>
                    <div>
                        <div class="bg-gray-700 rounded-lg p-3 mb-1 max-w-md">
                            <p class="text-white">Bonjour, je comprends votre problème. Pouvez-vous me dire si vous avez vidé le cache de votre navigateur ?</p>
                        </div>
                        <p class="text-xs text-gray-500">01/03/2025 09:20</p>
                    </div>
                </div>
                
                <!-- Message input -->
                <div class="flex mt-6">
                    <div class="flex-grow relative">
                        <input type="text" class="w-full bg-gray-700 border border-gray-600 rounded-md py-2 px-4 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Écrivez votre message...">
                        <button class="absolute right-2 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21.44 11.05l-9.19 9.19a6 6 0 0 1-8.49-8.49l9.19-9.19a4 4 0 0 1 5.66 5.66l-9.2 9.19a2 2 0 0 1-2.83-2.83l8.49-8.48"></path>
                            </svg>
                        </button>
                    </div>
                    <button class="ml-2 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md flex items-center">
                        Envoyer
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="22" y1="2" x2="11" y2="13"></line>
                            <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        // JavaScript personnalisé si nécessaire
    </script>
</body>
</html>