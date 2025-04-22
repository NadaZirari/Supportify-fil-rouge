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
            <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                Ajouter un utilisateur
            </button>
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
               ""
            </table>
        </div>
    </div>
</body>
</html>