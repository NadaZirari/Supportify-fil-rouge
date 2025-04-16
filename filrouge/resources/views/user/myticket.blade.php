<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supportify - Système de tickets</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'sidebar': '#1e293b',
                        'main-bg': '#0f172a',
                        'btn-blue': '#3b82f6',
                        'high': '#ef4444',
                        'medium': '#f59e0b',
                        'low': '#10b981',
                        'active': '#10b981',
                        'closed': '#f59e0b'
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-main-bg text-white flex h-screen">
     <!-- Sidebar -->
     <!-- <div class="w-64 bg-sidebar flex-shrink-0">
            <div class="p-4">
                <h1 class="text-primary font-bold text-xl">Supportify</h1>
            </div>
            
            <nav class="mt-6">
                <a href="#" class="flex items-center px-4 py-3  text-gray-400 hover:bg-[#2a2a5e] hover:text-white transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <span>Dashboard</span>
                </a>
                
                <a href="{{ route('user.myticket') }}" class="flex items-center px-4 py-3 text-gray-400 hover:bg-[#2a2a5e] hover:text-white transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                    </svg>
                    <span>Tickets</span>
                </a>
                
                <a href="#" class="flex items-center px-4 py-3 text-gray-400 hover:bg-[#2a2a5e] hover:text-white transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                    </svg>
                    <span>Messages</span>
                </a>
                
                <a href="#" class="flex items-center px-4 py-3 text-gray-400 hover:bg-[#2a2a5e] hover:text-white transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                    </svg>
                    <span>Analytics</span>
                </a>
                
                <a href="#" class="flex items-center px-4 py-3 text-gray-400 hover:bg-[#2a2a5e] hover:text-white transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <span>Settings</span>
                </a>

                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
    @csrf
    <button type="submit" class="flex items-center px-4 py-3 text-gray-400 hover:bg-[#2a2a5e] hover:text-white transition-colors">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
        </svg>
        <span>LOGOUT</span>
    </button>
</form>


                
            </nav>
        </div> -->
        @include('partials.sidebaruser')


    <!-- Main Content -->
    <div class="flex-1 flex flex-col overflow-hidden">
        <!-- Top Navigation -->
        <header class="p-4 flex items-center justify-between border-b border-gray-700">
            <div class="relative w-64">
                <input type="text" placeholder="Rechercher..." class="bg-gray-700 text-white rounded-md px-3 py-1 w-full pl-8">
                <i class="fas fa-search absolute left-2 top-2 text-gray-400"></i>
            </div>
            <div class="flex items-center space-x-4">
                <button class="text-gray-300 hover:text-white">
                    <i class="fas fa-bell"></i>
                </button>
                <div class="w-8 h-8 rounded-full bg-gray-500 flex items-center justify-center">
                    <i class="fas fa-user"></i>
                </div>
            </div>
        </header>

        <!-- Content Area -->
        <main class="flex-1 overflow-auto p-6">
            <!-- Filters and Actions -->
            <div class="flex items-center justify-between mb-6">
                <div class="flex space-x-4">
                    <div class="relative">
                        <select class="bg-sidebar text-white rounded-md px-3 py-2 pr-8 appearance-none">
                            <option>Tous les statuts</option>
                            <option>Actif</option>
                            <option>Fermé</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-white">
                            <i class="fas fa-chevron-down text-xs"></i>
                        </div>
                    </div>
                    <div class="relative">
                        <select class="bg-sidebar text-white rounded-md px-3 py-2 pr-8 appearance-none">
                            <option>Toutes les priorités</option>
                            <option>Haute</option>
                            <option>Moyenne</option>
                            <option>Basse</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-white">
                            <i class="fas fa-chevron-down text-xs"></i>
                        </div>
                    </div>
                    <input type="date" class="bg-sidebar text-white rounded-md px-3 py-2" placeholder="mm/dd/yyyy">
                </div>
                <a href="{{ route('user.Soumettre_ticket') }}" class="bg-btn-blue hover:bg-blue-700 text-white px-4 py-2 rounded-md flex items-center">
    <i class="fas fa-plus mr-2"></i>
    Nouveau ticket
</a>
            </div>

            <!-- Tickets Table -->
            <div class="bg-sidebar rounded-md overflow-hidden">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-gray-700">
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-300">Titre</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-300">Date</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-300">Priorité</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-300">Statut</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-300">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b border-gray-700">
                            <td class="px-6 py-4 whitespace-nowrap text-sm">Problème de connexion</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">01/03/2023</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <span class="px-2 py-1 rounded-full text-xs bg-high">Haute</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <span class="px-2 py-1 rounded-full text-xs bg-closed">Fermé</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <button class="bg-btn-blue hover:bg-blue-700 text-white px-3 py-1 rounded-md text-xs">
                                    Voir détails
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">Bug interface utilisateur</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">28/02/2023</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <span class="px-2 py-1 rounded-full text-xs bg-medium">Moyenne</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <span class="px-2 py-1 rounded-full text-xs bg-active">Actif</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <button class="bg-btn-blue hover:bg-blue-700 text-white px-3 py-1 rounded-md text-xs">
                                    Voir détails
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="flex justify-center mt-6">
                <nav class="flex items-center space-x-1">
                    <a href="#" class="px-3 py-1 rounded-md bg-gray-700 text-gray-300">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                    <a href="#" class="px-3 py-1 rounded-md bg-blue-600 text-white">1</a>
                    <a href="#" class="px-3 py-1 rounded-md bg-gray-700 text-gray-300">2</a>
                    <a href="#" class="px-3 py-1 rounded-md bg-gray-700 text-gray-300">3</a>
                    <a href="#" class="px-3 py-1 rounded-md bg-gray-700 text-gray-300">
                        <i class="fas fa-chevron-right"></i>
                    </a>
                </nav>
            </div>
        </main>
    </div>
</body>
</html>