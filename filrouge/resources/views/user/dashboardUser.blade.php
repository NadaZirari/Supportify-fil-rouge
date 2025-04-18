<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supportify - Tableau de bord</title>
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
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-main-bg text-white flex h-screen">
    <!-- <div class="flex h-screen overflow-hidden"> -->
        <!-- Sidebar -->
        <!-- <div class="w-64 bg-dark-sidebar flex-shrink-0"> -->
            
            
            @include('partials.sidebaruser')
        <!-- </div> -->
        
        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Search Bar -->
            <header class="p-4 flex items-center justify-between border-b border-gray-700">
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
            
        </div>
           
</body>
</html>