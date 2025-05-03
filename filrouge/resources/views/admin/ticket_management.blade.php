<!DOCTYPE html>
<html lang="fr" class="light">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supportify - Gestion des tickets</title>
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
          'technical': '#3b82f6'
        },
        fontFamily: {
          sans: ['Inter', 'ui-sans-serif', 'system-ui']
        }
      }
    }}
  </script>
</head>
<body class="bg-gray-100 text-gray-800 font-sans flex h-screen">
  
    @include('partials.sidebaradmin')
    <!-- Main Content -->
    <div class="flex-1 flex flex-col min-h-screen">
  <div class="p-6 max-w-7xl mx-auto w-full">
            <div class="flex justify-between items-center mb-8">
  <h1 class="text-3xl font-bold text-bleuciel">Gestion des Tickets</h1>
  <button class="bg-bleuciel text-white px-6 py-2 rounded-full flex items-center font-semibold">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10" />
    </svg>
    Exporter en PDF
  </button>
</div>

            <div class="flex flex-wrap gap-4 mb-8">
                <div class="relative">
                <select id="statusFilter" class="bg-white text-gray-800 py-3 pl-4 pr-10 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-bleuciel w-48">
            <option value="All Status">All Status</option>
            <option value="en_cours">In Progress</option>
            <option value="ouvert">Open</option>
            <option value="fermé">Closed</option>
            <option value="résolu">Resolved</option>
        </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-600">
                       
                    </div>
                </div>

                <div class="relative">
                <select id="categoryFilter" class="bg-white text-gray-800 py-3 pl-4 pr-10 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-bleuciel w-48">
            <option value="">Toutes les catégories</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->nom }}</option>
            @endforeach
        </select>


                </div>

                <div class="relative">
                <select id="agentFilter" class="bg-white text-gray-800 py-3 pl-4 pr-10 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-bleuciel w-48">
            <option value="">Tous les agents</option>
            @foreach($agents as $agent)
                <option value="{{ $agent->id }}">{{ $agent->name }}</option>
            @endforeach
        </select>
                    
                </div>

                <div class="relative ml-auto">
                    <input type="text" id="searchInput"  placeholder="Rechercher des tickets..." class="bg-white text-gray-800 py-3 pl-10 pr-4 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-bleuciel w-64">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <button type="button" id="searchButton" class="absolute inset-y-0 right-0 flex items-center pr-3">
            <svg class="h-5 w-5 text-gray-400 hover:text-bleuciel" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </button>
                </div>
            </div>
           
            <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden">
                <table class="w-full">
                    <thead>
                        <tr class="text-left text-bleuciel bg-gray-50 border-b border-gray-200">
                            <th class="py-3 px-6 font-medium">Title</th>
                            <th class="py-3 px-6 font-medium">Status</th>
                            <th class="py-3 px-6 font-medium">Created</th>
                            <th class="py-3 px-6 font-medium">Priority</th>
                            <th class="py-3 px-6 font-medium">Category</th>
                            <th class="py-3 px-6 font-medium">Assigned To</th>
                            <th class="py-3 px-6 font-medium">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($tickets as $ticket)

                    <tr class="border-b border-gray-200" 
    data-status="{{ $ticket->status }}" 
    data-category="{{ $ticket->categorie_id }}" 
    data-agent="{{ $ticket->assigned_to }}" 
    data-title="{{ strtolower($ticket->title) }}" 
    data-description="{{ strtolower($ticket->description) }}">                        <td class="py-4 px-6">{{ $ticket->title }}</td>
                            <td class="py-4 px-6">
                                @if($ticket->status == 'ouvert')
                                    <span class="bg-green-100 text-green-800 text-xs px-3 py-1 rounded-full font-medium">Ouvert</span>
                                @elseif($ticket->status == 'en_cours')
                                    <span class="bg-inprogress bg-opacity-10 text-inprogress text-xs px-3 py-1 rounded-full font-medium">En cours</span>
                                @elseif($ticket->status == 'résolu')
                                    <span class="bg-blue-100 text-blue-800 text-xs px-3 py-1 rounded-full font-medium">Résolu</span>
                                @elseif($ticket->status == 'fermé')
                                    <span class="bg-gray-100 text-gray-800 text-xs px-3 py-1 rounded-full font-medium">Fermé</span>
                                @endif
                            </td>
                            <td class="py-4 px-6 text-bleuciel">{{ $ticket->created_at->format('d/m/Y') }}</td>
                            <td class="py-4 px-6">
                                @if($ticket->priority == 'haute')
                                    <span class="bg-high bg-opacity-10 text-high text-xs px-3 py-1 rounded-full font-medium">Haute</span>
                                @elseif($ticket->priority == 'moyenne')
                                    <span class="bg-inprogress bg-opacity-10 text-inprogress text-xs px-3 py-1 rounded-full font-medium">Moyenne</span>
                                @elseif($ticket->priority == 'basse')
                                    <span class="bg-green-100 text-green-800 text-xs px-3 py-1 rounded-full font-medium">Basse</span>
                                @endif
                            </td>
                            <td class="py-4 px-6">
                                <span class="bg-technical bg-opacity-10 text-technical text-xs px-3 py-1 rounded-full font-medium">
                                    {{ $ticket->categorie->nom ?? 'Non catégorisé' }}
                                </span>
                            </td>
                           

                            <td class="py-4 px-6">
    @if($ticket->assigned_to && $ticket->agent)
    <div class="flex items-center">
    @if($ticket->agent->photo)
            <img src="{{ asset('storage/' . $ticket->agent->photo) }}" alt="{{ $ticket->agent->name }}" class="h-8 w-8 rounded-full object-cover mr-2">
        @else
            <div class="h-8 w-8 rounded-full bg-bleuciel flex items-center justify-center mr-2 text-white text-xs font-semibold">
                {{ substr($ticket->agent->name ?? 'NA', 0, 2) }}
            </div>
        @endif
        <span class="text-gray-600">{{ $ticket->agent->name ?? 'Non assigné' }}</span>
    </div>
    @else
    <div class="flex items-center text-gray-600">
    <span>Non assigné</span>

    <!-- Bouton pour changer l'assignation -->
    <button onclick="openAssignModal('{{ $ticket->id }}')" class="ml-2 text-blue-400 hover:text-blue-300">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
        </svg>
    </button>
</div>

    </div>
   
    @endif
</td>

                            <td class="py-4 px-6">
                            <div class="flex space-x-2">
              <a href="{{ route('ticket.detail', $ticket->id) }}" class="text-bleuciel-light bg-bleuciel bg-opacity-10 rounded-full p-2 hover:text-bleuciel">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>
              </a>
                                   
                                    <form action="{{ route('ticket.destroy', $ticket->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce ticket?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-400 bg-red-900 bg-opacity-10 rounded-full p-2 hover:text-red-500">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                  </svg>
                </button>
              </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr class="border-b border-gray-700">
                            <td colspan="7" class="py-4 px-6 text-center text-gray-400">Aucun ticket trouvé</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-2 flex items-center justify-between">

            <div class="mt-6 flex items-center justify-between">
  <div class="text-sm text-gray-600">
    Affichage de {{ $tickets->firstItem() ?? 0 }} à {{ $tickets->lastItem() ?? 0 }} sur {{ $tickets->total() ?? 0 }} tickets
  </div>
  <div class="mt-4 flex justify-end">
    <div class="inline-flex items-center space-x-2">
      {{ $tickets->links('vendor.pagination.tailwind') }}
    </div>
  </div>
</div>
        </div>
    </div>
    <!-- Modal d'assignation -->
    <div id="assignModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
  <div class="bg-white rounded-2xl p-6 w-96 shadow-xl border border-gray-100">
    <h2 class="text-xl font-bold text-bleuciel mb-4">Assigner le ticket</h2>
    <form id="assignForm" action="" method="POST">
      @csrf
      <div class="mb-4">
        <label for="agent_id" class="block text-gray-600 mb-2 font-medium">Sélectionner un agent</label>
        <select id="agent_id" name="agent_id" class="w-full bg-gray-100 text-gray-800 rounded-xl p-3 border border-gray-200 focus:outline-none focus:ring-2 focus:ring-bleuciel">
          @foreach($agents as $agent)
            <option value="{{ $agent->id }}">{{ $agent->name }}</option>
          @endforeach
        </select>
      </div>
      <div class="flex justify-end space-x-2">
        <button type="button" onclick="closeAssignModal()" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-xl font-semibold">Annuler</button>
        <button type="submit" class="px-4 py-2 bg-bleuciel text-white rounded-xl font-semibold">Assigner</button>
      </div>
    </form>
  </div>
</div>
<script>
    function openAssignModal(ticketId) {
        document.getElementById('assignForm').action = `/tickets/${ticketId}/assign`;
        document.getElementById('assignModal').classList.remove('hidden');
    }
    
    function closeAssignModal() {
        document.getElementById('assignModal').classList.add('hidden');
    }
</script>
</body>
</html>