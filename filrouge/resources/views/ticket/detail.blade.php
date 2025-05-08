<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Détail du ticket - {{ $ticket->title }}</title>
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
    @if(Auth::user()->role_id == 1)
    @include('partials.sidebaradmin')
@elseif(Auth::user()->role_id == 2)
    @include('partials.sidebaragent')
@elseif(Auth::user()->role_id == 3)
    @include('partials.sidebaruser')
@endif    <!-- Main Content -->
    <div class="flex-1 flex flex-col overflow-hidden">
        <div class="p-6 flex-1 overflow-auto max-w-4xl mx-auto w-full">
            <!-- Header -->
            <div class="mb-8">
            <a href="{{ 
    Auth::id() === $ticket->user_id 
        ? route('tickets.show') 
        : (Auth::user()->role_id== 2 
            ? route('TicketAgent') 
            : route('ticket_management')) 
}}" class="flex items-center text-bleuciel-light font-semibold space-x-2">
    
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="M19 12H5M12 19l-7-7 7-7"/>
    </svg>
    
    <span>
        {{ 
            Auth::id() === $ticket->user_id 
                ? 'Retour aux tickets' 
                : (Auth::user()->role_id== 2
                    ? 'Retour au tableau de bord agent' 
                    : 'Retour à la gestion des tickets') 
        }}
    </span>
</a>

            </div>

            <!-- Ticket Details -->
            <div class="bg-white rounded-2xl shadow-lg border-4 {{ $ticket->priority == 'haute' ? 'border-high' : ($ticket->priority == 'moyenne' ? 'border-inprogress' : 'border-low') }} bg-gradient-to-br {{ $ticket->priority == 'haute' ? 'from-high/10 to-white' : ($ticket->priority == 'moyenne' ? 'from-inprogress/10 to-white' : 'from-low/10 to-white') }} mb-8">
                <div class="p-6">
                    <div class="flex justify-between items-start mb-4">
                        <h1 class="text-2xl font-bold text-gray-800">{{ $ticket->title }}</h1>
                        @if(Auth::id() === $ticket->user_id && $ticket->status != 'fermé')
                            <button onclick="openModal('closeTicketModal')" class="bg-high text-white py-2 px-4 rounded-xl shadow-lg border-2 border-red-600 font-semibold text-sm">
                                Fermer le ticket
                            </button>
                        @endif
                    </div>
                    <div class="flex items-center mb-4 space-x-4">
                        <span class="bg-{{ $ticket->priority == 'haute' ? 'high' : ($ticket->priority == 'moyenne' ? 'inprogress' : 'low') }} bg-opacity-20 text-{{ $ticket->priority == 'haute' ? 'high' : ($ticket->priority == 'moyenne' ? 'inprogress' : 'low') }} text-sm px-4 py-1 rounded-full font-semibold border border-{{ $ticket->priority == 'haute' ? 'high' : ($ticket->priority == 'moyenne' ? 'inprogress' : 'low') }}">
                            {{ ucfirst($ticket->priority) }} priorité
                        </span>
                        <span class="bg-{{ $ticket->status == 'ouvert' ? 'resolved' : ($ticket->status == 'en cours' ? 'inprogress' : 'gray-600') }} bg-opacity-20 text-{{ $ticket->status == 'ouvert' ? 'resolved' : ($ticket->status == 'en cours' ? 'inprogress' : 'gray-600') }} text-sm px-4 py-1 rounded-full font-semibold border border-{{ $ticket->status == 'ouvert' ? 'resolved' : ($ticket->status == 'en cours' ? 'inprogress' : 'gray-600') }}">
                            {{ ucfirst($ticket->status) }}
                        </span>
                        <span class="text-gray-600 text-sm">Créé le {{ $ticket->created_at->format('d/m/Y') }}</span>
                    </div>
                    <p class="text-gray-600 mb-6">{{ $ticket->description }}</p>
                    @if($ticket->fichier)
                        <div>
                            <h3 class="text-sm font-semibold text-gray-600 mb-2">Pièce jointe</h3>
                            <div class="bg-gray-100 rounded-xl p-4 border border-gray-200">
                                @if(Str::endsWith($ticket->fichier, ['jpg', 'jpeg', 'png', 'gif']))
                                    <img src="{{ asset('storage/' . $ticket->fichier) }}" alt="Pièce jointe" class="max-w-xs rounded-lg mb-2">
                                @endif
                                <a href="{{ asset('storage/' . $ticket->fichier) }}" target="_blank" class="text-bleuciel-light font-semibold flex items-center space-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4"/>
                                        <polyline points="7 10 12 15 17 10"/>
                                        <line x1="12" y1="15" x2="12" y2="3"/>
                                    </svg>
                                    <span>Voir / Télécharger</span>
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>


            @if(Auth::user()->role_id == 1 || Auth::user()->role_id == 2 || Auth::id() === $ticket->user_id)
            <!-- Conversation Section -->
            <div class="bg-white rounded-2xl shadow-lg border-2 border-gray-200 mb-8">
                <div class="p-6">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Conversation</h2>
                    
                    <!-- Timeline de la conversation -->
                    <div class="space-y-6">
                        @php
                            // Combiner messages et réponses pour les afficher chronologiquement
                            $allItems = collect();
                            
                            // Ajouter les messages de l'utilisateur
                            foreach($ticket->messages as $message) {
                                $allItems->push([
                                    'type' => 'message',
                                    'data' => $message,
                                    'time' => $message->created_at
                                ]);
                            }
                            
                            // Ajouter les réponses des agents (si elles existent)
                            if(isset($ticket->responses)) {
                                foreach($ticket->responses as $response) {
                                    $allItems->push([
                                        'type' => 'response',
                                        'data' => $response,
                                        'time' => $response->created_at
                                    ]);
                                }
                            }
                            
                            // Trier par date
                            $allItems = $allItems->sortBy('time');
                        @endphp
                        
                        @foreach($allItems as $item)
                            @if($item['type'] === 'message')
                                @php $message = $item['data']; @endphp
                                <!-- Message de l'utilisateur -->
                                <div class="flex {{ $message->user_id === Auth::id() ? 'justify-end' : 'justify-start' }}">
                                    <div class="flex {{ $message->user_id === Auth::id() ? 'flex-row-reverse' : 'flex-row' }} items-start max-w-md">
                                        <div class="flex-shrink-0 {{ $message->user_id === Auth::id() ? 'ml-3' : 'mr-3' }}">
                                            @if($message->user && $message->user->photo)
                                                <img src="{{ asset('storage/' . $message->user->photo) }}" alt="{{ $message->user->name }}" class="w-12 h-12 rounded-full object-cover">
                                            @else
                                                <div class="w-12 h-12 rounded-full bg-bleuciel flex items-center justify-center text-white font-semibold">
                                                    {{ substr($message->user->name ?? 'U', 0, 1) }}
                                                </div>
                                            @endif
                                        </div>
                                        <div>
                                            <div class="flex items-center mb-1 {{ $message->user_id === Auth::id() ? 'justify-end' : 'justify-start' }}">
                                                <span class="font-semibold text-sm text-gray-700">{{ $message->user->name ?? 'Utilisateur' }}</span>
                                                <span class="ml-2 px-2 py-0.5 bg-bleuciel bg-opacity-10 text-bleuciel text-xs rounded-full">Client</span>
                                            </div>
                                            <div class="{{ $message->user_id === Auth::id() ? 'bg-bleuciel bg-opacity-10 border-bleuciel' : 'bg-gray-100 border-gray-200' }} rounded-xl p-4 border">
                                                <p class="text-gray-800">{{ $message->content }}</p>
                                            </div>
                                            <p class="text-xs text-gray-600 mt-1 {{ $message->user_id === Auth::id() ? 'text-right' : 'text-left' }}">{{ $message->created_at->format('d/m/Y H:i') }}</p>
                                        </div>
                                    </div>
                                </div>
                            @else
                                @php $response = $item['data']; @endphp
                                <!-- Réponse de l'agent -->
                                <div class="flex {{ $response->user_id === Auth::id() ? 'justify-end' : 'justify-start' }}">
                                    <div class="flex {{ $response->user_id === Auth::id() ? 'flex-row-reverse' : 'flex-row' }} items-start max-w-md">
                                        <div class="flex-shrink-0 {{ $response->user_id === Auth::id() ? 'ml-3' : 'mr-3' }}">
                                            @if($response->user && $response->user->photo)
                                                <img src="{{ asset('storage/' . $response->user->photo) }}" alt="{{ $response->user->name }}" class="w-12 h-12 rounded-full object-cover">
                                            @else
                                                <div class="w-12 h-12 rounded-full bg-gray-600 flex items-center justify-center text-white font-semibold">
                                                    {{ substr($response->user->name ?? 'A', 0, 1) }}
                                                </div>
                                            @endif
                                        </div>
                                        <div>
                                            <div class="flex items-center mb-1 {{ $response->user_id === Auth::id() ? 'justify-end' : 'justify-start' }}">
                                                <span class="font-semibold text-sm text-gray-700">{{ $response->user->name ?? 'Agent' }}</span>
                                                <span class="ml-2 px-2 py-0.5 bg-gray-600 bg-opacity-10 text-gray-600 text-xs rounded-full">Agent</span>
                                            </div>
                                            <div class="{{ $response->user_id === Auth::id() ? 'bg-gray-600 bg-opacity-10 border-gray-600' : 'bg-gray-100 border-gray-200' }} rounded-xl p-4 border">
                                                <p class="text-gray-800">{{ $response->content }}</p>
                                                
                                               
                                            </div>
                                            <p class="text-xs text-gray-600 mt-1 {{ $response->user_id === Auth::id() ? 'text-right' : 'text-left' }}">{{ $response->created_at->format('d/m/Y H:i') }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    
                    <!-- Formulaires d'envoi -->
                    @if($ticket->status != 'fermé')
                        @if(Auth::user()->role_id == 3 && Auth::id() === $ticket->user_id)
                            <!-- Formulaire pour l'utilisateur (message) -->
                            <form action="{{ route('messages.store', $ticket->id) }}" method="POST" class="mt-8">
                                @csrf
                                <div class="flex-grow">
                                    <label for="content" class="block text-gray-700 font-semibold mb-2">Ajouter un message</label>
                                    <textarea name="content" id="content" rows="3" class="w-full bg-gray-100 border border-gray-200 rounded-xl py-3 px-4 text-gray-800 placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-bleuciel" placeholder="Écrivez votre message..." required></textarea>
                                    @error('content')
                                        <div class="text-high mt-2 text-sm font-medium">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mt-3 flex justify-end">
                                    <button type="submit" class="bg-bleuciel text-white py-3 px-6 rounded-xl shadow-lg border-2 border-bleuciel-light font-semibold flex items-center space-x-2">
                                        <span>Envoyer</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <line x1="22" y1="2" x2="11" y2="13"></line>
                                            <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                                        </svg>
                                    </button>
                                </div>
                            </form>
                        @elseif( (Auth::user()->role_id == 2 ))
                            <!-- Formulaire pour l'agent (réponse) -->
                            <form action="{{ route('responses.store', $ticket->id) }}" method="POST" class="mt-8">
                                @csrf
                                <div class="flex-grow">
                                    <label for="content" class="block text-gray-700 font-semibold mb-2">Ajouter une réponse</label>
                                    <textarea name="content" id="content" rows="3" class="w-full bg-gray-100 border border-gray-200 rounded-xl py-3 px-4 text-gray-800 placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-bleuciel" placeholder="Écrivez votre réponse..." required></textarea>
                                    @error('content')
                                        <div class="text-high mt-2 text-sm font-medium">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                
                                <div class="mt-3 flex justify-end">
                                    <button type="submit" class="bg-bleuciel text-white py-3 px-6 rounded-xl shadow-lg border-2 border-bleuciel-light font-semibold flex items-center space-x-2">
                                        <span>Envoyer la réponse</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <line x1="22" y1="2" x2="11" y2="13"></line>
                                            <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                                        </svg>
                                    </button>
                                </div>
                            </form>
                        @endif
                    @else
                        <div class="mt-6 bg-gray-100 rounded-xl p-4 text-center border border-gray-300">
                            <p class="text-gray-600">Ce ticket est fermé. Aucun nouveau message ne peut être ajouté.</p>
                        </div>
                    @endif
                </div>
            </div>
            @endif
            <!-- Modal pour confirmer la fermeture -->
            <div id="closeTicketModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
                <div class="bg-white rounded-2xl p-8 w-full max-w-md border-2 border-gray-200 shadow-lg">
                    <h2 class="text-2xl font-bold text-bleuciel mb-4">Confirmer la Fermeture</h2>
                    <p class="text-gray-600 text-lg mb-6">Voulez-vous vraiment fermer ce ticket ? Cette action est irréversible.</p>
                    <div class="flex justify-end space-x-4">
                        <button onclick="closeModal('closeTicketModal')" class="text-gray-600 font-semibold text-lg">Annuler</button>
                        <form action="{{ route('tickets.close', $ticket->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="bg-high text-white py-3 px-6 rounded-xl shadow-lg border-2 border-red-600 font-semibold">Fermer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openModal(modalId) {
            document.getElementById(modalId).classList.remove('hidden');
        }

        function closeModal(modalId) {
            document.getElementById(modalId).classList.add('hidden');
        }

        // Fermer le modal en cliquant à l'extérieur
        document.querySelectorAll('.fixed').forEach(modal => {
            modal.addEventListener('click', (e) => {
                if (e.target === modal) {
                    closeModal(modal.id);
                }
            });
        });
    </script>
</body>
</html>