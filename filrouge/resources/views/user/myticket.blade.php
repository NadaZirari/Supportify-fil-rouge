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
                            <option>Tous les status</option>
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
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-300">Status</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-300">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($tickets as $ticket)

                        <tr class="border-b border-gray-700">
                        <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $ticket->title }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $ticket->created_at->format('d/m/Y') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            <span class="px-2 py-1 rounded-full text-xs 
                            @if($ticket->priority == 'haute') bg-high 
                            @elseif($ticket->priority == 'moyenne') bg-medium 
                            @else bg-low @endif">
                            {{ ucfirst($ticket->priority) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                        <span class="px-2 py-1 rounded-full text-xs 
                            @if($ticket->status== 'ouvert' || $ticket->status == 'en cours') bg-active 
                            @else bg-closed @endif">
                            {{ ucfirst($ticket->status) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">
    <a href="{{ route('tickets.show', $ticket->id) }}" class="bg-btn-blue hover:bg-blue-700 text-white px-3 py-1 rounded-md text-xs inline-block">
        Voir détails
    </a>
</td>
                        </tr>
                        @empty

                        <tr>
                    <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-400">
                        Aucun ticket trouvé. 
                        <a href="{{ route('user.Soumettre_ticket') }}" class="text-blue-400 hover:underline">Créer un ticket</a>
                    </td>
                </tr>
            @endforelse
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