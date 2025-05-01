<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supportify - Dashboard</title>
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
</head>
<body class="bg-gray-100 text-gray-800 font-sans flex h-screen">
    <!-- Sidebar -->
@include('partials.sidebaradmin')
    <!-- Main Content -->
    <div class="flex-1 flex flex-col overflow-hidden">
        <div class="p-6 flex-1 overflow-auto">
            <!-- Header -->
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h1 class="text-2xl font-semibold text-bleuciel">Dashboard Overview</h1>
                    <p class="text-gray-600">Welcome back, {{ Auth::user()->name }}</p>
                </div>
                <div class="flex items-center space-x-4">
                    <button class="text-gray-600 hover:text-bleuciel">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                    </button>
                    <div class="flex items-center">
                    <div class="h-8 w-8 rounded-full bg-bleuciel flex items-center justify-center mr-2 overflow-hidden">
                            @if(Auth::user()->profile_photo_path)
                                <img src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}" alt="{{ Auth::user()->name }}" class="h-full w-full object-cover">
                            @else
                                <span class="text-white text-xs font-semibold">{{ substr(Auth::user()->name, 0, 2) }}</span>
                            @endif
                        </div>
                        <span class="text-gray-800">{{ Auth::user()->name }}</span>
                                    </div>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Total Tickets -->
                <div class="bg-white rounded-xl p-6 shadow-lg border border-gray-200 relative overflow-hidden">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <p class="text-gray-600 text-sm">Total Tickets</p>
                            <h2 class="text-3xl font-bold mt-1 text-bleuciel">{{ $totalTickets ?? 0}}</h2>
                        </div>
                        <div class="bg-bleuciel bg-opacity-20 p-2 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                            </svg>
                        </div>
                    </div>
                   
                </div>

                <!-- Atop categoryy -->
                <div class="bg-white rounded-xl p-6 shadow-lg border border-gray-200 relative overflow-hidden">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <p class="text-gray-600 text-sm">Top category</p>
                            <h2 class="text-3xl font-bold mt-1 text-bleuciel">{{ $topCategory ? $topCategory->category_name : 'N/A' }}</h2>
                        </div>
                        <div class="bg-technical bg-opacity-10 p-2 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-orange" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                </svg>
                        </div>
                    </div>
                    
                    <div class="flex items-center text-gray-600 text-sm">
                        <span>{{ $topCategory ? $topCategory->total : 0 }} tickets</span>
                    </div>
                </div>

                

                <!-- Open Tickets -->
                <div class="bg-white rounded-xl p-6 shadow-lg border border-gray-200 relative overflow-hidden">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <p class="text-gray-600 text-sm">Open Tickets</p>
                            <h2 class="text-3xl font-bold mt-1 text-bleuciel">{{ $openTickets }}</h2>
                        </div>
                        <div class="bg-inprogress bg-opacity-20 p-2 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-orange" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                    
                </div>
            </div>

            <!-- Top Performing Agents -->
            <div class="mb-8">
                <h2 class="text-xl font-semibold  text-bleuciel mb-4">Top Performing Agents</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($topAgents as $agent)
                    <div class="bg-white rounded-xl p-6 shadow-lg border border-gray-200">
                        <div class="flex items-center mb-4">
                            <div class="h-12 w-12 rounded-full bg-bleuciel flex items-center justify-center mr-4 overflow-hidden">
                                @if($agent->profile_photo_path)
                                    <img src="{{ asset('storage/' . $agent->profile_photo_path) }}" alt="{{ $agent->name }}" class="h-full w-full object-cover">
                                @else
                                    <div class="h-full w-full flex items-center justify-center bg-bleuciel text-white text-sm font-semibold">
                                        {{ substr($agent->name, 0, 2) }}
                                    </div>
                                @endif
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-800">{{ $agent->name }}</h3>
                                <p class="text-resolved text-sm">
                                {{ $agent->assignedTickets->where('status', 'résolu')->count() }} tickets resolved                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="bg-white rounded-xl p-6 shadow-lg border border-gray-200">
                        <p class="text-gray-600">No agents found</p>
                    </div>
                    @endforelse
                </div>
            </div>
            <!-- Recent Tickets -->
            <div>
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-semibold text-bleuciel">Recent Tickets</h2>
                    <a href="{{ route('ticket_management') }}" class="text-blue hover:underline text-sm">View all</a>
                </div>
                <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden">
                    <table class="w-full">
                        <thead>
                            <tr class="text-left text-gray-600 bg-gray-50 border-b border-gray-200">
                                <th class="py-3 px-6 font-medium">Ticket</th>
                                <th class="py-3 px-6 font-medium">Status</th>
                                <th class="py-3 px-6 font-medium">Priority</th>
                                <th class="py-3 px-6 font-medium">Agent</th>
                                <th class="py-3 px-6 font-medium">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($recentTickets as $ticket)
                            <tr class="border-b border-gray-200 hover:bg-gray-50">
                                <td class="py-4 px-6">
                                    <div class="flex items-center">
                                        <div class="bg-bleuciel bg-opacity-10 p-1 rounded mr-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                            </svg>
                                        </div>
                                        <span>{{ $ticket->title }}</span>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    @if($ticket->status == 'ouvert')
                                        <span class="bg-green-100 text-green-800 text-xs px-3 py-1 rounded-full font-medium">Ouvert</span>
                                    @elseif($ticket->status == 'en_cours')
                                        <span class="bg-inprogress bg-opacity-10 text-inprogress text-xs px-3 py-1 rounded-full font-medium">En cours</span>
                                    @elseif($ticket->status == 'résolu')
                                        <span class="bg-resolved bg-opacity-10 text-resolved text-xs px-3 py-1 rounded-full font-medium">Résolu</span>
                                    @elseif($ticket->status == 'fermé')
                                        <span class="bg-gray-100 text-gray-800 text-xs px-3 py-1 rounded-full font-medium">Fermé</span>
                                    @endif
                                </td>
                                <td class="py-4 px-6">
                                    @if($ticket->priority == 'haute')
                                        <span class="bg-high bg-opacity-10 text-high text-xs px-3 py-1 rounded-full font-medium">Haute</span>
                                    @elseif($ticket->priority == 'moyenne')
                                        <span class="bg-medium bg-opacity-10 text-medium text-xs px-3 py-1 rounded-full font-medium">Moyenne</span>
                                    @elseif($ticket->priority == 'basse')
                                        <span class="bg-low bg-opacity-10 text-low text-xs px-3 py-1 rounded-full font-medium">Basse</span>
                                    @endif
                                </td>
                                <td class="py-4 px-6 text-gray-800">{{ $ticket->agent ? $ticket->agent->name : 'Non assigné' }}</td>
                                <td class="py-4 px-6 text-gray-600">{{ $ticket->created_at->diffForHumans() }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="py-4 px-6 text-center text-gray-600">Aucun ticket récent</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>