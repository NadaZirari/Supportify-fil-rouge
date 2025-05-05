<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supportify Premium</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --bleuciel: #2563EB;
            --bleuciel-light: #60A5FA;
            --resolved: #10B981;
            --background-card: #F8FAFC;
            --gradient-btn: linear-gradient(135deg, #2563EB, #3B82F6);
        }
        
        body {
             font-family: 'Poppins', sans-serif;
            background: linear-gradient(to bottom, #F3F4F6, #E5E7EB);
            min-height: 100vh;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes pulse {
            0% { box-shadow: 0 0 0 0 rgba(37, 99, 235, 0.4); }
            70% { box-shadow: 0 0 0 10px rgba(37, 99, 235, 0); }
            100% { box-shadow: 0 0 0 0 rgba(37, 99, 235, 0); }
        }

        .fade-in {
            animation: fadeIn 0.8s ease-out forwards;
        }
        
        .btn-premium {
            background: var(--gradient-btn);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .btn-premium:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 24px rgba(37, 99, 235, 0.3);
            animation: pulse 1.5s infinite;
        }
        
        .bg-bleuciel {
            background-color: var(--bleuciel);
        }
        
        .text-bleuciel {
            color: var(--bleuciel);
        }
        
        .border-bleuciel-light {
            border-color: var(--bleuciel-light);
        }
        
        .bg-background-card {
            background-color: var(--background-card);
        }

        .card-hover {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .faq-item {
            transition: background-color 0.3s ease;
        }

        .faq-item:hover {
            background-color: #E5E7EB;
        }

        @media (max-width: 640px) {
            .text-4xl {
                font-size: 2rem;
            }
            .text-2xl {
                font-size: 1.5rem;
            }
            .p-10 {
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
   @include('partials.sidebaruser')
    <!-- Contenu principal -->
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="bg-white ml-20 rounded-3xl shadow-2xl border border-gray-100 p-10 mb-12 transform transition-all duration-300 fade-in card-hover">
            <h1 class="text-4xl font-extrabold text-center text-bleuciel mb-10 tracking-tight">
                Passez à <span class="text-gray-900">Supportify Premium</span>
            </h1>

            <div class="flex flex-col lg:flex-row items-center justify-between gap-12">
                <!-- Section avantages -->
                <div class="lg:w-2/3">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Pourquoi choisir Premium ?</h2>
                    <ul class="space-y-6">
                        <li class="flex items-start">
                            <svg class="w-7 h-7 text-bleuciel mt-0.5 mr-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <div>
                                <p class="font-semibold text-lg text-gray-900">Tickets illimités</p>
                                <p class="text-gray-600 text-base">Créez autant de tickets que nécessaire, sans aucune limite.</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-7 h-7 text-bleuciel mt-0.5 mr-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <div>
                                <p class="font-semibold text-lg text-gray-900">Support prioritaire</p>
                                <p class="text-gray-600 text-base">Vos demandes sont traitées en priorité par notre équipe dédiée.</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-7 h-7 text-bleuciel mt-0.5 mr-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <div>
                                <p class="font-semibold text-lg text-gray-900">Fonctionnalités exclusives</p>
                                <p class="text-gray-600 text-base">Débloquez des outils réservés aux membres Premium.</p>
                            </div>
                        </li>
                    </ul>
                </div>
                
                <!-- Section prix et paiement -->
                <div class="bg-background-card rounded-2xl p-8 text-center w-full lg:w-1/3 shadow-xl card-hover">
                    <p class="text-gray-500 text-sm mb-3 uppercase tracking-widest font-medium">Paiement unique</p>
                    <p class="text-5xl font-extrabold text-bleuciel mb-6 tracking-tight">19,99€</p>

                    <form action="{{ route('payment.process') }}" method="POST">
                        @csrf
                        <button type="submit" class="w-full bg-bleuciel text-white py-4 px-6 rounded-xl font-semibold text-lg btn-premium">
                            Payer maintenant
                        </button>
                    </form>

                    <p class="text-gray-500 text-sm mt-6">
                        Paiement sécurisé avec <span class="font-semibold text-bleuciel">Stripe</span>
                    </p>
                </div>
            </div>
            
            
       

    
</body>
</html>