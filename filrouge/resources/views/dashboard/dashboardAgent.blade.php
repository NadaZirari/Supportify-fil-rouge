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
                        'bleuciel': '#052485',
                        'bleuciel-light': '#3b4db5',
                        'inprogress': '#f59e0b',
                        'high': '#ef4444',
                        'technical': '#3b82f6',
                        'resolved': '#10b981',
                        'medium': '#3b82f6',
                        'low': '#10b981'
                    },
                    fontFamily: {
                        sans: ['Inter', 'ui-sans-serif', 'system-ui']
                    }
                }
            }
        }
</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="{{ asset('js/agent-statistics.js') }}"></script>


<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
    body {
        font-family: 'Inter', sans-serif;
    }
</style>

</head>
<body class="bg-gray-100 text-gray-800 font-sans flex h-screen ">
    <div class="flex h-screen ">
       @include('partials.sidebaragent')
        
        <!-- Main Content -->
        <div class="flex-1 p-6 absolute left-60">
            <!-- Search  -->
            <div class="relative mb-6 w-[300px]">
                <input type="text" placeholder="Search tickets..." class="w-full pl-10 pr-4 py-3 bg-white border border-gray-200 rounded-xl text-black placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-bleuciel">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600 absolute left-3 top-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
            
            <!-- Stats  -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
                <!-- Open  -->
                <div class="bg-white rounded-2xl  border-1 bg-gray-300 p-4 shadow-md">
                    <div class="flex justify-between items-center mb-2">
                        <h3 class="text-sm px-4 py-1 rounded-full font-semibold  bg-resolved bg-opacity-20 text-resolved border border-resolved">Tickets ouverts</h3>
                        <div class="bg-primary p-1 rounded-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                            </svg>
                        </div>
                    </div>
                    <div class="flex justify-between items-center">
                        <h2 class="text-2xl font-bold">{{ $openTickets }}</h2>
                       
                    </div>
                </div>
                 <!-- en cours -->
                 <div class="bg-white rounded-2xl  border-1 bg-gray-300 p-4 shadow-md">
                    <div class="flex justify-between items-center mb-2">
                        <h3 class="text-sm px-4 py-1 rounded-full font-semibold  bg-high bg-opacity-20 text-high border border-high bg-inprogress bg-opacity-20 text-inprogress border border-inprogress"> Tickets En cours</h3>
                        <div class="bg-secondary p-1 rounded-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                    </div>
                    <div class="flex justify-between items-center">
                        <h2 class="text-2xl font-bold">{{ $inProgressTickets }}</h2>
                        
                    </div>
                </div>
                
                <!-- Resolved -->
                <div class="bg-white rounded-2xl  border-1 bg-gray-300 p-4 shadow-md">
                    <div class="flex justify-between items-center mb-2">
                        <h3 class="text-sm px-4 py-1 rounded-full font-semibold  bg-resolved bg-opacity-20 text-resolved border border-resolved">Tickets Résolus</h3>
                        <div class="bg-secondary p-1 rounded-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                    </div>
                    <div class="flex justify-between items-center">
                        <h2 class="text-2xl font-bold">{{ $resolvedTickets }}</h2>
                        
                    </div>
                </div>
                
                <!-- totaal  -->
                <div class="bg-white rounded-2xl  border-1 bg-gray-300 p-4 shadow-md">
                    <div class="flex justify-between items-center mb-2">
                        <h3 class="text-sm px-4 py-1 rounded-full font-semibold  bg-bleuciel bg-opacity-20 text-bleuciel border border-bleuciel">Total Tickets </h3>
                        <div class="bg-primary p-1 rounded-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                            </svg>
                        </div>
                    </div>
                    <div class="flex justify-between items-center">
                        <h2 class="text-2xl font-bold">{{ $totalTickets }}</h2>
                        
                    </div>
                </div>
                
                <!-- client avis -->
                
            </div>
            
            <!-- Recent Tickets -->
            <div class="mb-6">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-bold">Tickets récents</h2>
                    <a href="{{ route('TicketAgent') }}" class="bg-bleuciel hover:bg-[#ff5252] text-white px-4 py-2 rounded-md text-sm">Voir tous</a>
                </div>
                
                <div class="space-y-3">
                    @forelse($recentTickets as $ticket)
                    <div class="bg-white rounded-2xl shadow-lg border-2 border-gray-200 p-6 flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 rounded-full bg-gray-600 flex items-center justify-center overflow-hidden">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($ticket->user->name) }}&background=random" alt="{{ $ticket->user->name }}" class="w-full h-full object-cover">
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-800">{{ $ticket->title }}</h3>
                                <p class="text-sm text-gray-600">{{ $ticket->user->name }} • {{ $ticket->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                        <span class="text-sm px-4 py-1 rounded-full font-semibold {{ $ticket->status == 'ouvert' ? 'bg-high bg-opacity-20 text-high border border-high' : ($ticket->status == 'en_cours' ? 'bg-inprogress bg-opacity-20 text-inprogress border border-inprogress' : 'bg-resolved bg-opacity-20 text-resolved border border-resolved') }}">
                            {{ ucfirst(str_replace('_', ' ', $ticket->status)) }}
                        </span>
                    </div>
                    @empty
                    <div class="bg-white rounded-2xl shadow-lg border-2 border-gray-200 p-6 text-center">
                        <p class="text-gray-600">Aucun ticket récent à afficher</p>
                    </div>
                    @endforelse
                </div>
            </div>
            
            <!-- Charts -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Resolution Time Chart -->
               

                <div class="bg-white rounded-2xl shadow-lg border-2  bg-white p-6">
                <h2 class="text-lg font-semibold mb-4">Répartition des Tickets</h2>
    <canvas 
        id="ticketsChart"
        data-open="{{ $openTickets }}"
        data-inprogress="{{ $inProgressTickets }}"
        data-resolved="{{ $resolvedTickets }}"
        width="400" height="400"
    ></canvas>
    
</div>
<div class="bg-white rounded-2xl shadow-lg border-2 border-gray-200 p-6">
    <h2 class="text-xl text-gray-800 font-semibold mb-4">Détails des Performances</h2>

    <table class="w-full text-left">
        <thead>
            <tr class="ext-gray-600 border-b border-gray-200">
                <th class="px-4 py-3 font-semibold">Statistique</th>
                <th class="px-4 py-3 font-semibold">Nombre</th>
                <th class="px-4 py-3 font-semibold">Pourcentage</th>
            </tr>
        </thead>
        <tbody>
            <tr class="border-b border-gray-200 bg-gradient-to-br from-high/10 to-white">
                <td class="px-4 py-3 text-gray-800">Tickets Ouverts</td>
                <td class="px-4 py-3 text-gray-800">{{ $openTickets }}</td>
                <td class="px-4 py-3 text-gray-800">
                    @if($totalTickets > 0)
                        {{ round(($openTickets / $totalTickets) * 100, 2) }}%
                    @else
                        0%
                    @endif
                </td>
            </tr>
            <tr class="border-b border-gray-200 bg-gradient-to-br from-inprogress/10 to-white">
                <td class="px-4 py-3 text-gray-800">Tickets En Cours</td>
                <td class="px-4 py-3 text-gray-800">{{ $inProgressTickets }}</td>
                <td class="px-4 py-3 text-gray-800">
                    @if($totalTickets > 0)
                        {{ round(($inProgressTickets / $totalTickets) * 100, 2) }}%
                    @else
                        0%
                    @endif
                </td>
            </tr>
            <tr class="bg-gradient-to-br from-resolved/10 to-white">
                <td class="px-4 py-3 text-gray-800">Tickets Résolus</td>
                <td class="px-4 py-3 text-gray-800">{{ $resolvedTickets }}</td>
                <td class="px-4 py-3 text-gray-800">
                    @if($totalTickets > 0)
                        {{ round(($resolvedTickets / $totalTickets) * 100, 2) }}%
                    @else
                        0%
                    @endif
                </td>
            </tr>
        </tbody>
    </table>
</div>

            </div>
        </div>
    </div>
    
</body>
</html>
