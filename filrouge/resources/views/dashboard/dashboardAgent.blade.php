<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supportify - Tableau de bord</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
                    'closed': '#f59e0b',
                    dark: {
                        DEFAULT: '#1e1e2d',
                        lighter: '#252547',
                        sidebar: '#252547',
                        card: '#252547'
                    },
                    primary: {
                        DEFAULT: '#ff6b6b',
                    },
                    secondary: {
                        DEFAULT: '#6b77ff',
                    },
                    accent: {
                        DEFAULT: '#ff9f6b',
                        green: '#6bffb8'
                    }
                }
            }
        }
    }
</script>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
    body {
        font-family: 'Inter', sans-serif;
    }
</style>

</head>
<body class="bg-dark text-white">
    <div class="flex h-screen overflow-hidden">
       @include('partials.sidebaragent')
        
        <!-- Main Content -->
        <div class="flex-1 overflow-auto p-6">
            <!-- Search  -->
            <div class="relative mb-6 w-[300px]">
                <input type="text" placeholder="Search tickets..." class="w-full pl-10 pr-4 py-2 bg-dark-card border-none rounded-md text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 absolute left-3 top-2.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
            
            <!-- Stats  -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
                <!-- Open  -->
                <div class="bg-dark-card rounded-lg p-4">
                    <div class="flex justify-between items-center mb-2">
                        <h3 class="text-sm text-gray-400">Tickets ouverts</h3>
                        <div class="bg-primary p-1 rounded-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                            </svg>
                        </div>
                    </div>
                    <div class="flex justify-between items-center">
                        <h2 class="text-2xl font-bold">{{ $openTicketsCount }}</h2>
                        <div class="flex items-center text-green-500 text-xs">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                            </svg>
                            <span>{{ $openTicketsPercentage }}% dernière semaine</span>
                        </div>
                    </div>
                </div>
                
                <!-- Resolved -->
                <div class="bg-dark-card rounded-lg p-4">
                    <div class="flex justify-between items-center mb-2">
                        <h3 class="text-sm text-gray-400">Résolus</h3>
                        <div class="bg-secondary p-1 rounded-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                    </div>
                    <div class="flex justify-between items-center">
                        <h2 class="text-2xl font-bold">{{ $resolvedTicketsCount }}</h2>
                        <div class="flex items-center text-green-500 text-xs">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                            </svg>
                            <span>{{ $resolvedTicketsPercentage }}% dernière semaine</span>
                        </div>
                    </div>
                </div>
                
                <!-- repondree temps -->
                <div class="bg-dark-card rounded-lg p-4">
                    <div class="flex justify-between items-center mb-2">
                        <h3 class="text-sm text-gray-400">Temps de réponse</h3>
                        <div class="bg-accent p-1 rounded-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                    <div class="flex justify-between items-center">
                        <h2 class="text-2xl font-bold">{{ $averageResponseTime }}h</h2>
                        <div class="flex items-center {{ $responseTimeChange < 0 ? 'text-green-500' : 'text-red-500' }} text-xs">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                            </svg>
                            <span>{{ abs($responseTimeChange) }}% dernière semaine</span>
                        </div>
                    </div>
                </div>
                
                <!-- client avis -->
                <div class="bg-dark-card rounded-lg p-4">
                    <div class="flex justify-between items-center mb-2">
                        <h3 class="text-sm text-gray-400">Satisfaction client</h3>
                        <div class="bg-accent-green p-1 rounded-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                            </svg>
                        </div>
                    </div>
                    <div class="flex justify-between items-center">
                        <h2 class="text-2xl font-bold">{{ $satisfactionRate }}%</h2>
                        <div class="flex items-center text-green-500 text-xs">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                            </svg>
                            <span>{{ $satisfactionChange }}% dernière semaine</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Recent Tickets -->
            <div class="mb-6">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-bold">Tickets récents</h2>
                    <a href="{{ route('TicketAgent') }}" class="bg-primary hover:bg-[#ff5252] text-white px-4 py-2 rounded-md text-sm">Voir tous</a>
                </div>
                
                <div class="space-y-3">
                    @forelse($recentTickets as $ticket)
                    <div class="bg-dark-card rounded-lg p-4 flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-gray-600 flex items-center justify-center overflow-hidden">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($ticket->user->name) }}&background=random" alt="{{ $ticket->user->name }}" class="w-full h-full object-cover">
                            </div>
                            <div>
                                <h3 class="font-medium">{{ $ticket->title }}</h3>
                                <p class="text-sm text-gray-400">{{ $ticket->user->name }} • {{ $ticket->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                        <span class="px-3 py-1 bg-{{ $ticket->status == 'ouvert' ? 'yellow' : ($ticket->status == 'en_cours' ? 'blue' : ($ticket->status == 'resolu' ? 'green' : 'gray')) }}-600 text-white text-xs rounded-full">
                            {{ ucfirst(str_replace('_', ' ', $ticket->status)) }}
                        </span>
                    </div>
                    @empty
                    <div class="bg-dark-card rounded-lg p-4 text-center">
                        <p class="text-gray-400">Aucun ticket récent à afficher</p>
                    </div>
                    @endforelse
                </div>
            </div>
            
            <!-- Charts -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Resolution Time Chart -->
                <div class="bg-dark-card rounded-lg p-4">
                    <h2 class="text-xl font-bold mb-4">Temps de résolution</h2>
                    <div class="h-[200px] bg-dark flex items-center justify-center text-gray-500">
                        <!-- Chart je vais lajouté -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                    </div>
                </div>
                
                <!-- Ticket Categories Chart -->
                <div class="bg-dark-card rounded-lg p-4">
                    <h2 class="text-xl font-bold mb-4">Catégories de tickets</h2>
                    <div class="h-[200px] bg-dark flex items-center justify-center text-gray-500">
                        <!-- Chart would go here -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
