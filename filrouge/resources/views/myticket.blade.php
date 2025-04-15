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
    <!-- Sidebar -->
    <div class="w-64 bg-sidebar flex-shrink-0 flex flex-col">
        <div class="p-4 border-b border-gray-700 flex items-center">
            <h1 class="text-xl font-bold">Supportify</h1>
        </div>
        <nav class="flex-1 p-4">
            <ul class="space-y-2">
                <li>
                    <a href="#" class="flex items-center p-2 rounded-md hover:bg-gray-700">
                        <i class="fas fa-chart-line mr-3"></i>
                        <span>Tableau de bord</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center p-2 rounded-md bg-blue-600">
                        <i class="fas fa-ticket-alt mr-3"></i>
                        <span>Mes tickets</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center p-2 rounded-md hover:bg-gray-700">
                        <i class="fas fa-cog mr-3"></i>
                        <span>Paramètres</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col overflow-hidden">
        <!-- Top Navigation -->
        <header class="bg-sidebar p-2 flex items-center justify-between border-b border-gray-700">
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
                            <option>Tous les statuts</option>
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

    </div>
</body>
</html>