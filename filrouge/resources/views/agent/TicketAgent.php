
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
<body class="bg-main-bg text-white flex h-screen">@extends('layouts.agent') 

@include('partials.sidebaragent')
<div class="p-6">
    <h1 class="text-2xl font-semibold mb-6">Mes tickets assignés</h1>
    
    @if($tickets->isEmpty())
        <div class="bg-gray-800 rounded-lg p-6 text-center">
            <p class="text-gray-400">Aucun ticket ne vous a été assigné pour le moment.</p>
        </div>
    @else
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
                    <tr class="border-b border-gray-700">
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
                                {{ ucfirst($ticket->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            <a href="{{ route('tickets.show', $ticket->id) }}" class="bg-btn-blue hover:bg-blue-700 text-white px-3 py-1 rounded-md text-xs inline-block">
                                Voir détails
                            </a>
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
</div>
@endsection
