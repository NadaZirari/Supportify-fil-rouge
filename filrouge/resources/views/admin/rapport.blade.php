<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rapport d'activité - Supportify</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'bleuciel': '#052485',
                        'bleuciel-light': '#3b4db5',
                        'inprogress': '#f59e0b',
                        'high': '#ef4444',
                        'technical': '#3b82f6',
                        'resolved': '#10b981',
                        'medium': '#3b82f6',
                        'low': '#10b981',
                        'premium': '#FFD700',
                    },
                    fontFamily: {
                        sans: ['Inter', 'ui-sans-serif', 'system-ui']
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-100 text-gray-800 font-sans flex h-screen">
    <!-- Sidebar -->
    @include('partials.sidebaradmin')
    
    <!-- Main Content -->
    <div class="flex-1 flex flex-col overflow-hidden">
        <div class="p-6 flex-1 overflow-auto max-w-6xl mx-auto w-full">
            <!-- Header -->
            <div class="flex justify-between items-center mb-8">
                <h1 class="text-3xl font-bold text-bleuciel">Rapport d'activité</h1>
                <div class="flex space-x-4">
                    <form id="periodForm" action="{{ route('admin.rapport') }}" method="GET">
                        <select id="period" name="period" onchange="this.form.submit()" class="bg-white border border-gray-300 rounded-xl py-2 px-4 text-gray-700 focus:outline-none focus:ring-2 focus:ring-bleuciel">
                            <option value="week" {{ $period == 'week' ? 'selected' : '' }}>Cette semaine</option>
                            <option value="month" {{ $period == 'month' ? 'selected' : '' }}>Ce mois</option>
                            <option value="year" {{ $period == 'year' ? 'selected' : '' }}>Cette année</option>
                        </select>
                    </form>
                    <button id="exportPDF" class="bg-bleuciel text-white py-2 px-6 rounded-xl shadow-lg border-2 border-bleuciel-light font-semibold">
                        Exporter PDF
                    </button>
                </div>
            </div>
            <div id="rapport-content">

            <!-- Statistiques -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <div class="bg-white rounded-2xl shadow-lg border-2 border-gray-200 p-6">
                    <h3 class="text-sm font-medium text-gray-500 mb-1">Total tickets</h3>
                    <p class="text-3xl font-bold text-gray-800">{{ $totalTickets }}</p>
                </div>
                <div class="bg-white rounded-2xl shadow-lg border-2 border-gray-200 p-6">
                    <h3 class="text-sm font-medium text-gray-500 mb-1">Tickets ouverts</h3>
                    <p class="text-3xl font-bold text-resolved">{{ $openTickets }}</p>
                </div>
                
                <div class="bg-white rounded-2xl shadow-lg border-2 border-gray-200 p-6">
                    <h3 class="text-sm font-medium text-gray-500 mb-1">Utilisateurs premium</h3>
                    <p class="text-3xl font-bold text-premium">{{ $premiumUsers }}</p>
                </div>
            </div>

            <!-- Charts Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <!-- Tickets par statut -->
                <div class="bg-white rounded-2xl shadow-lg border-2 border-gray-200 p-6">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Tickets par statut</h2>
                    <div class="h-64">
                        <canvas id="ticketStatusChart"></canvas>
                    </div>
                </div>

                <!-- Tickets par priorité -->
                <div class="bg-white rounded-2xl shadow-lg border-2 border-gray-200 p-6">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Tickets par priorité</h2>
                    <div class="h-64">
                        <canvas id="ticketPriorityChart"></canvas>
                    </div>
                </div>

                <!-- Tickets par mois -->
                <div class="bg-white rounded-2xl shadow-lg border-2 border-gray-200 p-6 col-span-1 md:col-span-2">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Évolution des tickets</h2>
                    <div class="h-80">
                        <canvas id="ticketTrendChart"></canvas>
                    </div>
                </div>
                
                
            </div>
        </div>
    </div>
</div>
    <script>
        // Configuration des graphiques
        window.onload = function() {
            // Graphique des statuts
            const statusCtx = document.getElementById('ticketStatusChart').getContext('2d');
            new Chart(statusCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Ouvert', 'En cours', 'Fermé'],
                    datasets: [{
                        data: [
                            {{ $statusCounts['ouvert'] ?? 0 }}, 
                            {{ $statusCounts['en cours'] ?? 0 }}, 
                            {{ $statusCounts['fermé'] ?? 0 }}
                        ],
                        backgroundColor: ['#10b981', '#f59e0b', '#6b7280'],
                        borderWidth: 0
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom'
                        }
                    }
                }
            });

            // Graphique des priorités
            const priorityCtx = document.getElementById('ticketPriorityChart').getContext('2d');
            new Chart(priorityCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Basse', 'Moyenne', 'Haute'],
                    datasets: [{
                        data: [
                            {{ $priorityCounts['basse'] ?? 0 }}, 
                            {{ $priorityCounts['moyenne'] ?? 0 }}, 
                            {{ $priorityCounts['haute'] ?? 0 }}
                        ],
                        backgroundColor: ['#10b981', '#f59e0b', '#ef4444'],
                        borderWidth: 0
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom'
                        }
                    }
                }
            });

            // Graphique de tendance
            const trendCtx = document.getElementById('ticketTrendChart').getContext('2d');
            new Chart(trendCtx, {
                type: 'line',
                data: {
                    labels: [
                        @foreach($trendLabels as $label)
                            '{{ $label }}',
                        @endforeach
                    ],
                    datasets: [{
                        label: 'Nouveaux tickets',
                        data: [
                            @foreach($trendData as $data)
                                {{ $data }},
                            @endforeach
                        ],
                        borderColor: '#052485',
                        backgroundColor: 'rgba(5, 36, 133, 0.1)',
                        tension: 0.3,
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                precision: 0
                            }
                        }
                    }
                }
            });
            
           
        };

       
        document.getElementById('exportPDF').addEventListener('click', function() {
            // Attendre que les graphiques soient rendus
            setTimeout(function() {
                // Options pour html2pdf
                const options = {
                    margin: 10,
                    filename: 'rapport-supportify-{{ now()->format("Y-m-d") }}.pdf',
                    image: { type: 'jpeg', quality: 0.98 },
                    html2canvas: { scale: 2, useCORS: true },
                    jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
                };
                
                // Sélectionner le contenu à exporter
                const element = document.getElementById('rapport-content');
                
                // Générer le PDF
                html2pdf().set(options).from(element).save();
            }, 1000); 
        });

    </script>
</body>
</html>