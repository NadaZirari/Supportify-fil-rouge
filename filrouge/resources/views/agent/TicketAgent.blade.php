<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Supportify - Tickets assignés</title>
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
    <style> @media (max-width: 768px) {
            .flex-1.flex.flex-col.overflow-hidden {
                margin-left: 60px;
                width: calc(100% - 60px);
            }
            
            .ml-\[11rem\] {
                margin-left: 0 ;
            }
            main .ml-\[11rem\] {
        margin-left: 0 !important;
    }
            .max-w-7xl {
                padding-left: 10px;
                padding-right: 10px;
                width: 100% ;
            }
            
            .flex.flex-col.sm\:flex-row {
                flex-direction: column;
            }
            
            .flex.flex-col.sm\:flex-row > div {
                width: 100%;
                margin-bottom: 10px;
            }
            
            .flex.space-x-4 {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 10px;
                margin-top: 10px;
            }
            
            .flex.space-x-4 > div {
                margin-left: 0 !important;
            }
            
            table {
                display: block;
                overflow-x: auto;
                white-space: nowrap;
            }
            
            table th, table td {
                padding-left: 10px;
                padding-right: 10px;
            }
            
            .flex.space-x-2 {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .flex.space-x-2 > * {
                margin-left: 0 !important;
                margin-top: 5px;
                width: 100%;
                text-align: center;
            }
            
            .flex.space-x-2 > *:first-child {
                margin-top: 0;
            }
        }
        
        @media (max-width: 640px) {
            .p-6 {
                padding: 1rem;
            }
            
            .text-2xl {
                font-size: 1.25rem;
            }
            
            .flex.space-x-4 {
                grid-template-columns: 1fr;
            }
        }
        </style>
</head>
<body class="bg-gray-100 text-gray-800 font-sans flex h-screen overflow-hidden">
    <!-- Sidebar -->
    @include('partials.sidebaragent')
    <!-- Main Content -->
    <div class="flex-1 flex flex-col overflow-hidden">
        <main class="flex-1 overflow-auto p-6">
            <div class="ml-[11rem] mx-auto">
                <h1 class="text-2xl font-bold text-gray-800 mb-6">Mes tickets assignés</h1>

                <!-- Message de succès -->
                @if(session('success'))
                    <div class="bg-resolved bg-opacity-10 text-resolved p-4 rounded-xl mb-6 border-2 border-resolved border-opacity-20 font-semibold flex justify-between items-center">
                        <span>{{ session('success') }}</span>
                        <button onclick="this.parentElement.remove()" class="text-resolved">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                @endif

                @if($tickets->isEmpty())
                    <div class="bg-white rounded-2xl shadow-lg border-2 border-gray-200 p-6 text-center">
                        <p class="text-gray-600">Aucun ticket ne vous a été assigné pour le moment.</p>
                    </div>
                @else
                    <!-- Filters and Search -->
                    <div class="flex flex-col sm:flex-row items-center justify-between mb-6 gap-4">
                        <div class="relative w-full sm:w-80">
                            <input type="text" placeholder="Rechercher des tickets..." class="w-full pl-10 pr-4 py-3 bg-white border border-gray-200 rounded-xl text-gray-800 placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-bleuciel">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600 absolute left-3 top-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        <div class="flex space-x-4 w-full sm:w-auto">
                            <div class="relative w-full sm:w-40">
                                <select class="w-full bg-white border border-gray-200 rounded-xl px-3 py-3 text-gray-800 appearance-none focus:outline-none focus:ring-2 focus:ring-bleuciel">
                                    <option>Tous les statuts</option>
                                    <option>Ouvert</option>
                                    <option>En cours</option>
                                    <option>Résolu</option>
                                    <option>Fermé</option>
                                </select>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600 absolute right-3 top-3.5 pointer-events-none" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                            <div class="relative w-full sm:w-40 ">
                                <select class="w-full bg-white border border-gray-200 rounded-xl px-2 py-3 text-gray-800 appearance-none focus:outline-none focus:ring-2 focus:ring-bleuciel">
                                    <option>Toutes les priorités</option>
                                    <option>Haute</option>
                                    <option>Moyenne</option>
                                    <option>Basse</option>
                                </select>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600 absolute right-3 top-3.5 pointer-events-none" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Tickets Table -->
                    <div class="bg-white rounded-2xl shadow-lg border-1  ">
                        <table class="w-full">
                            <thead>
                                <tr class="text-gray-600 border-b border-gray-200">
                                    <th class="px-6 py-4 text-left text-sm font-semibold">Titre</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold">Demandeur</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold">Date</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold">Priorité</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold">Statut</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tickets as $index => $ticket)
                                    <tr class="border-b border-gray-200 ">
                                        <td class="px-6 py-4 text-sm text-gray-800">{{ $ticket->title }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-800">{{ $ticket->user->name }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-600">{{ $ticket->created_at->format('d/m/Y') }}</td>
                                        <td class="px-6 py-4 text-sm">
                                            <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $ticket->priority == 'haute' ? 'bg-high bg-opacity-20 text-high border border-high' : ($ticket->priority == 'moyenne' ? 'bg-medium bg-opacity-20 text-medium border border-medium' : 'bg-low bg-opacity-20 text-low border border-low') }}">
                                                {{ ucfirst($ticket->priority) }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-sm">
                                            <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $ticket->status == 'ouvert' || $ticket->status == 'en_cours' ? 'bg-inprogress bg-opacity-20 text-inprogress border border-inprogress' : 'bg-resolved bg-opacity-20 text-resolved border border-resolved' }}">
                                                {{ str_replace('_', ' ', ucfirst($ticket->status)) }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-sm flex space-x-2">
                                            <a href="{{ route('ticket.detail', $ticket->id) }}" class="bg-bleuciel text-white px-3 py-1 rounded-xl shadow-lg border-2 border-bleuciel-light font-semibold text-xs">
                                                Voir détails
                                            </a>
                                            <button onclick="openStatusModal({{ $ticket->id }})" class="bg-bleuciel-light text-white px-3 py-1 rounded-xl shadow-lg border-2 border-bleuciel font-semibold text-xs">
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
                        {{ $tickets->links('vendor.pagination.tailwind') }}
                    </div>
                @endif
            </div>
        </main>
    </div>

    <!-- Modal pour changer le statut -->
    <div id="statusModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-2xl p-6 w-full max-w-md border-2 border-gray-200 shadow-lg">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-semibold text-gray-800">Changer le statut du ticket</h3>
                <button onclick="closeStatusModal()" class="text-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <form action="{{ route('ticket.update.status') }}" method="POST">
                @csrf
                <input type="hidden" name="ticket_id" id="modalTicketId">
                <div class="mb-6">
                    <label for="status" class="block text-gray-600 font-semibold text-sm mb-2">Nouveau statut</label>
                    <select id="status" name="status" class="w-full bg-gray-100 border border-gray-200 rounded-xl px-3 py-3 text-gray-800 focus:outline-none focus:ring-2 focus:ring-bleuciel">
                        <option value="ouvert">Ouvert</option>
                        <option value="en_cours">En cours</option>
                        <option value="résolu">Résolu</option>
                    </select>
                </div>
                <div class="flex justify-end space-x-3">
                    <button type="button" onclick="closeStatusModal()" class="text-gray-600 font-semibold text-sm">Annuler</button>
                    <button type="submit" class="bg-bleuciel text-white px-4 py-2 rounded-xl shadow-lg border-2 border-bleuciel-light font-semibold text-sm">
                        Enregistrer
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openStatusModal(ticketId) {
            document.getElementById('modalTicketId').value = ticketId;
            document.getElementById('statusModal').classList.remove('hidden');
        }

        function closeStatusModal() {
            document.getElementById('statusModal').classList.add('hidden');
        }

        document.getElementById('statusModal').addEventListener('click', function(event) {
            if (event.target === this) {
                closeStatusModal();
            }
        });
    </script>
</body>
</html>