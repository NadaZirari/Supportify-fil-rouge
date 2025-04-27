<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supportify - Tickets assignés</title>
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
    @include('partials.sidebaragent')
    
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
            <h1 class="text-2xl font-semibold mb-6">Mes tickets assignés</h1>
            

             <!-- Message de succès -->
             @if(session('success'))
                <div class="bg-green-500 text-white p-4 rounded-md mb-6 flex justify-between items-center">
                    <span>{{ session('success') }}</span>
                    <button onclick="this.parentElement.remove()" class="text-white">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            @endif

            @if($tickets->isEmpty())
                <div class="bg-gray-800 rounded-lg p-6 text-center">
                    <p class="text-gray-400">Aucun ticket ne vous a été assigné pour le moment.</p>
                </div>
            @else
                <!-- Filters and Actions
                <div class="flex items-center justify-between mb-6">
                    <div class="flex space-x-4">
                        <div class="relative">
                            <select class="bg-sidebar text-white rounded-md px-3 py-2 pr-8 appearance-none">
                                <option>Tous les status</option>
                                <option>Ouvert</option>
                                <option>En cours</option>
                                <option>Résolu</option>
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
                    </div>
                </div> -->
  <!-- Onglets de statut -->
  <div class="flex border-b border-gray-700 mb-6">
                    <a href="{{ route('TicketAgent') }}" 
                       class="px-4 py-2 {{ !isset($currentStatus) ? 'border-b-2 border-orange-500 text-orange-500' : 'text-gray-400 hover:text-white' }}">
                        Tous
                    </a>
                    <a href="{{ route('TicketAgent', ['status' => 'ouvert']) }}" 
                       class="px-4 py-2 {{ isset($currentStatus) && $currentStatus == 'ouvert' ? 'border-b-2 border-orange-500 text-orange-500' : 'text-gray-400 hover:text-white' }}">
                        Ouverts
                    </a>
                    <a href="{{ route('TicketAgent', ['status' => 'en_cours']) }}" 
                       class="px-4 py-2 {{ isset($currentStatus) && $currentStatus == 'en_cours' ? 'border-b-2 border-orange-500 text-orange-500' : 'text-gray-400 hover:text-white' }}">
                        En cours
                    </a>
                    <a href="{{ route('TicketAgent', ['status' => 'résolu']) }}" 
                       class="px-4 py-2 {{ isset($currentStatus) && $currentStatus == 'résolu' ? 'border-b-2 border-orange-500 text-orange-500' : 'text-gray-400 hover:text-white' }}">
                        Résolus
                    </a>
                    <a href="{{ route('TicketAgent', ['status' => 'fermé']) }}" 
                       class="px-4 py-2 {{ isset($currentStatus) && $currentStatus == 'fermé' ? 'border-b-2 border-orange-500 text-orange-500' : 'text-gray-400 hover:text-white' }}">
                        Fermés
                    </a>
                </div>
                <!-- Tickets Table -->
                <div class="bg-sidebar rounded-md overflow-hidden">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b border-gray-700">
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-300">Titre</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-300">Demandeur</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-300">Date</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-300">Priorité</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-300">Status</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-300">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tickets as $ticket)
                            <tr class="border-b border-gray-700 hover:bg-gray-800">
                                <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $ticket->title }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $ticket->user->name }}</td>
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
                                        @if($ticket->status == 'ouvert' || $ticket->status == 'en_cours') bg-active 
                                        @else bg-closed @endif">
                                        {{ str_replace('_', ' ', ucfirst($ticket->status)) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <a href="{{ route('ticket.detail', $ticket->id) }}" class="bg-btn-blue hover:bg-blue-700 text-white px-3 py-1 rounded-md text-xs inline-block">
                                        Voir détails
                                    </a>
                                    <button 
                                    onclick="openStatusModal({{ $ticket->id }})" 
                                    class="bg-orange-500 hover:bg-orange-600 text-white px-3 py-1 rounded-md text-xs inline-block">
        Changer statut
    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <!-- Pagination -->
                <div class="mt-6">
                    {{ $tickets->links() }}
                </div>
            @endif
        </main>
    </div>
     <!-- Modal pour changer le statut -->
     <div id="statusModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-sidebar rounded-lg p-6 w-full max-w-md">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-semibold">Changer le statut du ticket</h3>
                <button onclick="closeStatusModal()" class="text-gray-400 hover:text-white">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            
            <form action="{{ route('ticket.update.status') }}" method="POST">
                @csrf
                <input type="hidden" name="ticket_id" id="modalTicketId">
                
                <div class="mb-4">
                    <label for="status" class="block text-sm font-medium text-gray-300 mb-2">Nouveau statut</label>
                    <select id="status" name="status" class="w-full bg-gray-700 border border-gray-600 rounded-md px-3 py-2 text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="ouvert">Ouvert</option>
                        <option value="en_cours">En cours</option>
                        <option value="résolu">Résolu</option>
                    </select>
                </div>
                
               
                
                <div class="flex justify-end space-x-3">
                <button type="button" onclick="closeStatusModal()" class="px-4 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700">
                Annuler
                    </button>
                    <button type="submit" class="px-4 py-2 bg-btn-blue text-white rounded-md hover:bg-blue-700">
                        Enregistrer
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script>
        // Fonctions pour gérer le modal
        function openStatusModal(ticketId) {
            document.getElementById('modalTicketId').value = ticketId;
            document.getElementById('statusModal').classList.remove('hidden');
        }
        
        function closeStatusModal() {
            document.getElementById('statusModal').classList.add('hidden');
        }
        
        // Fermer le modal si on clique en dehors
        document.getElementById('statusModal').addEventListener('click', function(event) {
            if (event.target === this) {
                closeStatusModal();
            }
        });
    </script>
</body>
</html>
