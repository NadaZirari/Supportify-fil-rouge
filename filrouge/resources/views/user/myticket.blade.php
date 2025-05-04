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
                        'bleuciel': '#052485', // Dark blue for buttons
                        'bleuciel-light': '#3b4db5', // Light blue for borders/hover
                        'inprogress': '#f59e0b', // Amber for in-progress status
                        'high': '#ef4444', // Red for high priority
                        'medium': '#3b82f6', // Blue for medium priority
                        'low': '#10b981', // Green for low priority
                        'active': '#10b981', // Green for active status
                        'closed': '#f59e0b' // Amber for closed status
                    },
                    fontFamily: {
                        sans: ['Inter', 'ui-sans-serif', 'system-ui']
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-100 text-gray-800 font-sans flex h-screen overflow-hidden">
    
    @include('partials.sidebaruser')

    <!-- Main Content -->
    <div class="flex-1 flex flex-col overflow-hidden">
        <!-- Top Navigation -->
        <header class="p-4 flex items-center justify-between border-b border-gray-200">
    <h2 class="text-2xl font-bold text-bleuciel">
        WELCOME : {{ (Auth::user()->name) }} !
    </h2>
    
    <div class="flex items-center space-x-3">
        <!-- Badge Premium -->
        @if(Auth::user()->is_premium ?? false)
        <span class="bg-gradient-to-r from-yellow-400 to-yellow-600 text-white text-xs font-semibold px-5 py-2 rounded-full shadow-sm animate-pulse">
            Premium
        </span>
        @endif

        <!-- Profile Image -->
        <div class="w-10 h-10 rounded-full bg-gray-500 flex items-center justify-center overflow-hidden">
            @if(Auth::user()->photo)
                <img src="{{ asset('storage/'.Auth::user()->photo) }}" alt="{{ Auth::user()->name }}" class="w-full h-full object-cover">
            @else
                <i class="fas fa-user"></i>
            @endif
        </div>
    </div>
</header>


        <!-- Content Area -->
        <main class="flex-1 overflow-auto p-6">
            <div class="max-w-7xl mx-auto">
                <h1 class="text-2xl font-bold text-gray-800 mb-6">Mes tickets</h1>

                <!-- Filters and Actions -->
                <div class="flex flex-col sm:flex-row items-center justify-between mb-6 gap-4">
                    <div class="relative w-full sm:w-80">
                        <input type="text" id="searchInput"  placeholder="Rechercher des tickets..." class="w-full pl-9 pr-3 py-3 bg-white border border-gray-200 rounded-xl text-gray-800 placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-bleuciel">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600 absolute left-3 top-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <div class="flex space-x-4 w-full sm:w-auto">
                        <div class="relative w-full sm:w-44">
                            <select id="statusFilter" class="w-full bg-white border border-gray-200 rounded-xl px-3 py-3 text-gray-800 appearance-none focus:outline-none focus:ring-2 focus:ring-bleuciel">
                            <option value="All Status">All Status</option>
                            <option value="en_cours">In Progress</option>
                            <option value="ouvert">Open</option>
                            <option value="fermé">Closed</option>
                            <option value="résolu">Resolved</option>
                            </select>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600 absolute right-3 top-3.5 pointer-events-none" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                        <div class="relative w-full sm:w-44">
                            <select  id="prioriteFilter" class="w-full bg-white border border-gray-200 rounded-xl px-3 py-3 text-gray-800 appearance-none focus:outline-none focus:ring-2 focus:ring-bleuciel">
                                <option>Toutes les priorités</option>
                                <option>Haute</option>
                                <option>Moyenne</option>
                                <option>Basse</option>
                            </select>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600 absolute right-3 top-3.5 pointer-events-none" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                        <input type="date" class="w-full sm:w-40 bg-white border border-gray-200 rounded-xl px-3 py-3 text-gray-800 focus:outline-none focus:ring-2 focus:ring-bleuciel">
                    </div>
                    <a href="{{ route('user.Soumettre_ticket') }}" class="bg-bleuciel hover:bg-bleuciel-light text-white px-3 py-2 rounded-xl shadow-lg border-2 border-bleuciel-light font-semibold flex items-center">
                        <i class="fas fa-plus mr-2"></i>
                        New ticket
                    </a>
                </div>

                <!-- Tickets Table -->
                <div class="bg-white rounded-2xl shadow-lg border border-gray-200">
                    <table class="w-full">
                        <thead>
                            <tr class="text-gray-600 border-b border-gray-200">
                                <th class="px-6 py-4 text-left text-sm font-semibold">Titre</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold">Date</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold">Priorité</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold">Statut</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($tickets as $ticket)
                                <tr class="border-b border-gray-200">
                                    <td class="px-6 py-4 text-sm text-gray-800">{{ $ticket->title }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-600">{{ $ticket->created_at->format('d/m/Y') }}</td>
                                    <td class="px-6 py-4 text-sm">
                                        <span class="px-3 py-1 rounded-full text-xs font-semibold 
                                            @if($ticket->priority == 'haute') bg-high bg-opacity-20 text-high border border-high
                                            @elseif($ticket->priority == 'moyenne') bg-medium bg-opacity-20 text-medium border border-medium
                                            @else bg-low bg-opacity-20 text-low border border-low @endif">
                                            {{ ucfirst($ticket->priority) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-sm">
                                        <span class="px-3 py-1 rounded-full text-xs font-semibold 
                                            @if($ticket->status == 'ouvert' || $ticket->status == 'en cours') bg-active bg-opacity-20 text-active border border-active
                                            @else bg-closed bg-opacity-20 text-closed border border-closed @endif">
                                            {{ ucfirst($ticket->status) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-sm">
                                        <a href="{{ route('ticket.detail', $ticket->id) }}" class="bg-bleuciel hover:bg-bleuciel-light text-white px-3 py-1 rounded-xl shadow-lg border-2 border-bleuciel-light font-semibold text-xs">
                                            Voir détails
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-600">
                                        Aucun ticket trouvé. 
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="flex justify-center mt-6">
                    <nav class="flex items-center space-x-2">
                        <a href="#" class="px-4 py-2 rounded-xl bg-white border border-gray-200 text-gray-600 hover:bg-bleuciel hover:text-white">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                        <a href="#" class="px-4 py-2 rounded-xl bg-bleuciel text-white">1</a>
                        <a href="#" class="px-4 py-2 rounded-xl bg-white border border-gray-200 text-gray-600 hover:bg-bleuciel hover:text-white">2</a>
                        <a href="#" class="px-4 py-2 rounded-xl bg-white border border-gray-200 text-gray-600 hover:bg-bleuciel hover:text-white">3</a>
                        <a href="#" class="px-4 py-2 rounded-xl bg-white border border-gray-200 text-gray-600 hover:bg-bleuciel hover:text-white">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </nav>
                </div>
            </div>
        </main>
    </div>
</body>
</html>