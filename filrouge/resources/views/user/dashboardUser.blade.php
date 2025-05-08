<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Utilisateur</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-100 font-sans">
    <div class="min-h-screen flex ">
        @include('partials.sidebaruser')

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
        <header class="p-4 flex items-center justify-between bg-white border-b border-gray-200">
        <h2 class="text-3xl font-semibold text-gray-800 dark:text-black">
    <span class="text-bleuciel">Welcome,</span> {{ Auth::user()->name }} 
</h2>
    
    <div class="flex items-center space-x-3">
        <!-- Badge Premium -->
        @if(Auth::user()->is_premium ?? false)
        <span class="bg-gradient-to-r from-yellow-400 to-yellow-600 text-white text-xs font-semibold px-5 py-2 rounded-full shadow-sm animate-pulse">
            Premium
        </span>
        @endif

        <!-- Profile Image -->
        <div class="w-10 h-10 rounded-full bg-gray-500 flex items-center justify-center overflow-hidden">
            @if(Auth::user()->photo)
                <img src="{{ asset('storage/'.Auth::user()->photo) }}" alt="{{ Auth::user()->name }}" class="w-full h-full object-cover">
            @else
                <i class="fas fa-user"></i>
            @endif
        </div>
    </div>
</header>

        <div class="flex-1 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <h2 class="text-xl font-semibold text-gray-800 mb-6">Résumé de vos tickets </h2>
            
            <!--  Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Total tickrtss -->
                <div class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition-shadow">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                            <i class="fas fa-ticket-alt"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Total des tickets soumis</p>
                            <p class="text-2xl font-bold text-gray-800" id="total-tickets">{{ $totalTickets }}</p>
                        </div>
                    </div>
                </div>

                <!--  ouverts -->
                <div class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition-shadow">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-yellow-100 text-yellow-600">
                            <i class="fas fa-folder-open"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Tickets ouverts</p>
                            <p class="text-2xl font-bold text-gray-800" id="open-tickets">{{ $openTickets }}</p>
                        </div>
                    </div>
                </div>

                <!--  en attente de réponse -->
                <div class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition-shadow">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-orange-100 text-orange-600">
                            <i class="fas fa-hourglass-half"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Tickets en attente</p>
                            <p class="text-2xl font-bold text-gray-800" id="pending-tickets">{{ $pendingTickets }}</p>
                        </div>
                    </div>
                </div>
  <!-- Tickets résolus   -->
  <div class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition-shadow">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-green-100 text-green-600">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Tickets résolus</p>
                            <p class="text-2xl font-bold text-gray-800" id="resolved-tickets">{{ $resolvedTickets }}</p>
                        </div>
                    </div>
                </div>
            </div>

             <!-- Historique d'activité -->
             <div class="mt-8">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Historique d'activité</h2>
                <div class="bg-white rounded-lg shadow p-6">
                    <canvas id="activityChart" class="w-full" style="max-height: 300px;"></canvas>
                </div>
            </div>
        </div>
        </div>
        </div>

        <script>
       

        // Données pour le graphique d'activité (exemple : tickets soumis par semaine)
        const activityData = {
            labels: {!! json_encode($days) !!},
        datasets: [{
            label: 'Tickets soumis par jour',
            data:  {!! json_encode($ticketCounts) !!},
                backgroundColor: 'rgba(59, 130, 246, 0.2)',
                borderColor: 'rgba(59, 130, 246, 1)',
                borderWidth: 2,
                fill: true,
                tension: 0.4
            }]
        };

        // Configuration du graphique
        const ctx = document.getElementById('activityChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: activityData,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Nombre de tickets'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Jours'
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                        position: 'top'
                    }
                }
            }
        });
    </script>

