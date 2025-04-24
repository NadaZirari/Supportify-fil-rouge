<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Détail du ticket - Problème de connexion</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
   
   
    <style>
    </style>
</head>
<body class="bg-gray-900 text-white">
    <!-- Header -->
    @if(Auth::id() === $ticket->user_id)
    <div class="p-4 border-b border-gray-800">
        <a href="{{ route('tickets.show') }}" class="flex items-center text-gray-400 hover:text-white">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M19 12H5M12 19l-7-7 7-7"/>
            </svg>
            Retour aux tickets
        </a>
    </div>
    @elseif(Auth::user()->role_id === 1)
    <div class="p-4 border-b border-gray-800">
        <a href="{{ route('ticket_management') }}" class="flex items-center text-gray-400 hover:text-white">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M19 12H5M12 19l-7-7 7-7"/>
            </svg>
            Retour à la gestion des tickets
        </a>
    </div>
@endif

    <!-- Ticket details -->
    <div class="max-w-4xl mx-auto p-4">
        <div class="bg-gray-800 rounded-lg overflow-hidden mb-6">
            <div class="p-6">
                <div class="flex justify-between items-start mb-4">
                <h1 class="text-xl font-bold">{{ $ticket->title }}</h1>
                
                @if(Auth::id() === $ticket->user_id)
                    <form action="{{ route('tickets.close', $ticket->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-md text-sm">
                            Fermer le ticket
                        </button>
                    </form>
                @endif

                </div>
                
                <div class="flex items-center mb-4">
                <span class="bg-{{ $ticket->priority == 'haute' ? 'red' : ($ticket->priority == 'moyenne' ? 'yellow' : 'green') }}-900 text-{{ $ticket->priority == 'haute' ? 'red' : ($ticket->priority == 'moyenne' ? 'yellow' : 'green') }}-200 text-xs px-2 py-1 rounded mr-2">
                    {{ ucfirst($ticket->priority) }} priorité
                </span>
                <span class="bg-{{ $ticket->status == 'ouvert' ? 'green' : ($ticket->status == 'en cours' ? 'yellow' : 'gray') }}-900 text-{{ $ticket->status == 'ouvert' ? 'green' : ($ticket->status == 'en cours' ? 'yellow' : 'gray') }}-200 text-xs px-2 py-1 rounded mr-4">
                    {{ ucfirst($ticket->status) }}
                </span>
                <span class="text-gray-400 text-sm">Créé le {{ $ticket->created_at->format('d/m/Y') }}</span>
            </div>
            
            <p class="text-gray-300 mb-6">
                {{ $ticket->description }}
            </p>
                
            <div>
    <h3 class="text-sm font-medium text-gray-400 mb-2">Pièces jointes</h3>
    <div class="flex space-x-2">
    @if ($ticket->fichier)
    <div>
        <p>Pièce jointe :</p>
        @if(Str::endsWith($ticket->fichier, ['jpg','jpeg','png','gif']))
            <img src="{{ asset('storage/' . $ticket->fichier) }}" alt="Image" class="max-w-sm">
        @endif

        <a href="{{ asset('storage/' . $ticket->fichier) }}" target="_blank" class="text-blue-500 underline block mt-2">
            Voir / Télécharger la pièce jointe
        </a>
    </div>
@endif
    </div>
</div>

        
        <!-- Chat section -->
<div class="bg-gray-800 rounded-lg overflow-hidden mb-6">
    <div class="p-6">
        <!-- Affichage des messages existants -->
        @foreach($ticket->messages as $message)
            <div class="flex mb-6">
                <div class="flex-shrink-0 mr-3">
                    <div class="w-10 h-10 rounded-full {{ $message->user_id === $ticket->user_id ? 'bg-blue-600' : 'bg-gray-600' }} flex items-center justify-center text-white font-bold">
                        {{ substr($message->user->name ?? 'U', 0, 1) }}
                    </div>
                </div>
                <div>
                    <div class="{{ $message->user_id === $ticket->user_id ? 'bg-blue-600' : 'bg-gray-700' }} rounded-lg p-3 mb-1 max-w-md">
                        <p class="text-white">{{ $message->content }}</p>
                    </div>
                    <p class="text-xs text-gray-500">{{ $message->created_at->format('d/m/Y H:i') }}</p>
                </div>
            </div>
        @endforeach
                
               <!-- Message input -->
<div class="flex mt-6">
    <form action="{{ route('messages.store', $ticket->id) }}" method="POST" class="w-full flex">
        @csrf
        <div class="flex-grow relative">
            <input type="text" name="content" class="w-full bg-gray-700 border border-gray-600 rounded-md py-2 px-4 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Écrivez votre message...">
        </div>
        <button type="submit" class="ml-2 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md flex items-center">
            Envoyer
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="22" y1="2" x2="11" y2="13"></line>
                <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
            </svg>
        </button>
    </form>
</div>

    <script>
        
    </script>
</body>
</html>