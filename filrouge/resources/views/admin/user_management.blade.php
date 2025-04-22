<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supportify - Gestion des utilisateurs</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'sidebar': '#1a2234',
                        'content': '#1e293b',
                        'admin': '#6366f1',
                        'support': '#8b5cf6',
                        'user': '#3b82f6',
                        'active': '#10b981',
                        'inactive': '#ef4444',
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
        <div class="p-6 flex justify-between items-center">
            <h1 class="text-2xl font-semibold">Gestion des utilisateurs</h1>
            <a href=" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md flex items-center">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
    </svg>
    Ajouter un utilisateur
</a>
            
        </div>

        <div class="flex-1 overflow-auto px-6 pb-6">
            <table class="w-full">
                <thead>
                    <tr class="text-left text-gray-400 border-b border-gray-700">
                        <th class="pb-3 font-medium">Nom</th>
                        <th class="pb-3 font-medium">Email</th>
                        <th class="pb-3 font-medium">Rôle</th>
                        <th class="pb-3 font-medium">Status</th>
                        <th class="pb-3 font-medium">Actions</th>
                    </tr>
                </thead>
                <!-- Remplacer tout le contenu du tbody -->
<tbody>
    @forelse($users as $user)
    <tr class="border-b border-gray-700">
        <td class="py-4">
            <div class="flex items-center">
                <div class="h-10 w-10 rounded-full 
                    @if($user->role_id == 1) bg-admin 
                    @elseif($user->role_id == 2) bg-support 
                    @else bg-user @endif 
                    flex items-center justify-center mr-3 text-white font-medium">
                    {{ substr($user->name, 0, 2) }}
                </div>
                <span>{{ $user->name }}</span>
            </div>
        </td>
        <td class="py-4 text-gray-300">{{ $user->email }}</td>
        <td class="py-4">
            @if($user->role_id == 1)
                <span class="bg-admin text-white text-xs px-2 py-1 rounded-md">Admin</span>
            @elseif($user->role_id == 2)
                <span class="bg-support text-white text-xs px-2 py-1 rounded-md">Support</span>
            @else
                <span class="bg-user text-white text-xs px-2 py-1 rounded-md">Utilisateur</span>
            @endif
        </td>
        <td class="py-4">
            <span class="bg-active text-white text-xs px-2 py-1 rounded-md">Actif</span>
        </td>
        <td class="py-4">
            <div class="flex space-x-2">
                <a href="{{ route('admin.editUser', $user->id) }}" class="text-gray-400 hover:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                </a>
                <a href="#" class="text-gray-400 hover:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                    </svg>
                </a>
                <form action="{{ route('admin.deleteUser', $user->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-gray-400 hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </button>
                </form>
            </div>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="5" class="py-4 text-center text-gray-400">Aucun utilisateur trouvé</td>
    </tr>
    @endforelse
</tbody>

            </table>
        </div>
    </div>
</body>
</html>