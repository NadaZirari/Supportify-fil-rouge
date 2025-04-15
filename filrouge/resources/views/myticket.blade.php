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

  
    </div>
</body>
</html>