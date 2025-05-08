<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Supportify - Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
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
                        'low': '#10b981',
                        'premium': '#FFD700',
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
        <div class="p-6 flex-1 overflow-auto max-w-6xl mx-auto w-full">
            <!-- Header -->
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h1 class="text-3xl font-bold text-bleuciel">Dashboard Overview</h1>
                    <p class="text-gray-600">Welcome back, {{ Auth::user()->name }}</p>
                </div>
                <div class="flex space-x-4">
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
            <div id="dashboard-content">
                <!-- Statistiques -->
                <div class="flex flex-col md:flex-row md:space-x-6 mb-8">
    <div class="bg-white rounded-2xl shadow-lg border-2 border-gray-200 p-6 flex-1 mb-6 md:mb-0">
        <h3 class="text-sm font-medium text-gray-500 mb-1">Total Tickets</h3>
        <p class="text-3xl font-bold text-gray-800">{{ $totalTickets ?? 0 }}</p>
    </div>
    <div class="bg-white rounded-2xl shadow-lg border-2 border-gray-200 p-6 flex-1 mb-6 md:mb-0">
        <h3 class="text-sm font-medium text-gray-500 mb-1">Open Tickets</h3>
        <p class="text-3xl font-bold text-resolved">{{ $openTickets }}</p>
    </div>
    <div class="bg-white rounded-2xl shadow-lg border-2 border-gray-200 p-6 flex-1">
        <h3 class="text-sm font-medium text-gray-500 mb-1">Top Category</h3>
        <p class="text-3xl font-bold text-bleuciel">{{ $topCategory ? $topCategory->category_name : 'N/A' }}</p>
    </div>
    
</div>

              

                <!-- Top Performing Agents -->
                <div class="mb-8">
                    <h2 class="text-xl font-semibold text-bleuciel mb-4">Top Performing Agents</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        @forelse($topAgents as $agent)
                            <div class="bg-white rounded-2xl shadow-lg border-2 border-gray-200 p-6">
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
                                            {{ $agent->assignedTickets->where('status', 'résolu')->count() }} tickets resolved
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="bg-white rounded-2xl shadow-lg border-2 border-gray-200 p-6">
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
                    <div class="bg-white rounded-2xl shadow-lg border-2 border-gray-200 overflow-hidden">
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
    </div>

    
</body>
</html>