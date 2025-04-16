<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supportify - Tableau de bord</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        dark: {
                            DEFAULT: '#1e1e2d',
                            lighter: '#252547',
                            sidebar: '#252547',
                            card: '#252547'
                        },
                        primary: {
                            DEFAULT: '#ff6b6b',
                        },
                        secondary: {
                            DEFAULT: '#6b77ff',
                        },
                        accent: {
                            DEFAULT: '#ff9f6b',
                            green: '#6bffb8'
                        }
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
<body class="bg-dark text-white">
    <div class="flex h-screen overflow-hidden">
        
       @include 
        <!-- Main Content -->
        <div class="flex-1 overflow-auto p-6">
            <!-- Search Bar -->
            <div class="relative mb-6 w-[300px]">
                <input type="text" placeholder="Search tickets..." class="w-full pl-10 pr-4 py-2 bg-dark-card border-none rounded-md text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 absolute left-3 top-2.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
            
            </div>
           
</body>
</html>