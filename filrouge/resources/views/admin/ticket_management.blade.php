<!DOCTYPE html>
<html lang="fr">
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
                        'sidebar': '#1a2234',
                        'content': '#1e293b',
                        'inprogress': '#f59e0b',
                        'high': '#ef4444',
                        'technical': '#3b82f6',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-content text-white flex h-screen">
  
    @include('partials.sidebaradmin')
    <!-- Main Content -->
    <div class="flex-1 flex flex-col overflow-hidden">
        <div class="p-6">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-semibold">Ticket Management</h1>
                <button class="bg-gray-700 hover:bg-gray-600 text-white px-4 py-2 rounded-md flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10" />
                    </svg>
                    Export PDF
                </button>
            </div>

            <div class="flex flex-wrap gap-4 mb-6">
                <div class="relative">
                    <select class="bg-gray-800 text-white py-2 pl-4 pr-10 rounded-md appearance-none focus:outline-none focus:ring-2 focus:ring-indigo-500 w-40">
                        <option>All Status</option>
                        <option>In Progress</option>
                        <option>Open</option>
                        <option>Closed</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-white">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                </div>

                <div class="relative">
                    <select id="category-filter" class="bg-gray-800 text-white py-2 pl-4 pr-10 rounded-md appearance-none focus:outline-none focus:ring-2 focus:ring-indigo-500 w-40">
                        <option value="">Toutes les catégories</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->nom }}</option>
                        @endforeach
                        </select>

                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-white">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                </div>

                <div class="relative">
                    <select id="agent-filter" class="bg-gray-800 text-white py-2 pl-4 pr-10 rounded-md appearance-none focus:outline-none focus:ring-2 focus:ring-indigo-500 w-40">
                        <option value="">Tous les agents</option>
                        @foreach($agents as $agent)
                            <option value="{{ $agent->id }}">{{ $agent->name }}</option>
                        @endforeach
                    </select>

                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-white">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                </div>

                <div class="relative ml-auto">
                    <input type="text" id="search" placeholder="Rechercher des tickets..." class="bg-gray-800 text-white py-2 pl-10 pr-4 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 w-64">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-gray-800 rounded-lg overflow-hidden">
                <table class="w-full">
                    <thead>
                        <tr class="text-left text-gray-400 border-b border-gray-700">
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

                        <tr class="border-b border-gray-700">
                        <td class="py-4 px-6">{{ $ticket->title }}</td>
                            <td class="py-4 px-6">
                                @if($ticket->status == 'ouvert')
                                    <span class="bg-green-600 text-white text-xs px-2 py-1 rounded-md">Ouvert</span>
                                @elseif($ticket->status == 'en cours')
                                    <span class="bg-inprogress text-white text-xs px-2 py-1 rounded-md">En cours</span>
                                @elseif($ticket->status == 'résolu')
                                    <span class="bg-blue-600 text-white text-xs px-2 py-1 rounded-md">Résolu</span>
                                @elseif($ticket->status == 'fermé')
                                    <span class="bg-gray-600 text-white text-xs px-2 py-1 rounded-md">Fermé</span>
                                @endif
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex space-x-2">
                                    <button class="text-blue-400 hover:text-blue-300 bg-blue-900 bg-opacity-30 rounded-full p-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </button>
                                    <button class="text-green-400 hover:text-green-300 bg-green-900 bg-opacity-30 rounded-full p-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </button>
                                    <button class="text-red-400 hover:text-red-300 bg-red-900 bg-opacity-30 rounded-full p-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="mt-6 flex items-center justify-between">
                <div class="text-sm text-gray-400">
                    Showing 1 to 10 of 50 entries
                </div>
                <div class="flex space-x-2">
                    <button class="px-4 py-2 bg-gray-700 text-gray-300 rounded-md hover:bg-gray-600">Previous</button>
                    <button class="px-4 py-2 bg-indigo-600 text-white rounded-md">1</button>
                    <button class="px-4 py-2 bg-gray-700 text-white rounded-md hover:bg-gray-600">2</button>
                    <button class="px-4 py-2 bg-gray-700 text-white rounded-md hover:bg-gray-600">3</button>
                    <button class="px-4 py-2 bg-gray-700 text-gray-300 rounded-md hover:bg-gray-600">Next</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>