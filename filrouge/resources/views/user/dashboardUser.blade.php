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
    <div class="min-h-screen flex flex-col">
        @include('partials.sidebaruser')
        <nav class="bg-white shadow">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
                <div class="flex justify-between items-center">
                    <h1 class="text-2xl font-bold text-gray-800">Dashboard Utilisateur</h1>
                    <div class="flex items-center space-x-4">
                        <div class="flex items-center space-x-2">
                            <span class="text-gray-600">Bonjour, Utilisateur</span>
                            <!-- Badge Premium -->
                            <span class="bg-gradient-to-r from-yellow-400 to-yellow-600 text-white text-xs font-semibold px-2.5 py-1 rounded-full shadow-sm animate-pulse">
                                Premium
                            </span>
                        </div>
                        <button class="text-gray-600 hover:text-gray-800">
                            <i class="fas fa-sign-out-alt"></i>
                        </button>
                    </div>
                </div>
            </div>
        </nav>
        <div class="flex-1 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <h2 class="text-xl font-semibold text-gray-800 mb-6">Résumé rapide</h2>
            
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
                            <p class="text-2xl font-bold text-gray-800" id="total-tickets">142</p>
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
                            <p class="text-2xl font-bold text-gray-800" id="open-tickets">23</p>
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
                            <p class="text-2xl font-bold text-gray-800" id="pending-tickets">15</p>
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
                            <p class="text-2xl font-bold text-gray-800" id="resolved-tickets">104</p>
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


        <script>
        const ticketData = {
            total: 142,
            open: 23,
            pending: 15,
            resolved: 104
        };

        // Mise à jour des valeurs dans les cartes
        document.getElementById('total-tickets').textContent = ticketData.total;
        document.getElementById('open-tickets').textContent = ticketData.open;
        document.getElementById('pending-tickets').textContent = ticketData.pending;
        document.getElementById('resolved-tickets').textContent = ticketData.resolved;

        // Données pour le graphique d'activité (exemple : tickets soumis par semaine)
        const activityData = {
            labels: ['Sem 1', 'Sem 2', 'Sem 3', 'Sem 4', 'Sem 5'],
            datasets: [{
                label: 'Tickets soumis',
                data: [30, 45, 20, 60, 35],
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
                            text: 'Semaines'
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

