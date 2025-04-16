<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supportify - Fonctionnalités</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary': '#3b82f6',
                        'secondary': '#8b5cf6',
                        'dark': '#1a2234',
                        'darker': '#151c2c',
                        'card': '#252e3f',
                    }
                }
            }
        }
    </script>
    <style>
        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.3);
        }
        .gradient-bg {
            background: linear-gradient(135deg, #1a2234 0%, #252e3f 100%);
        }
        .feature-icon {
            transition: all 0.3s ease;
        }
        .feature-card:hover .feature-icon {
            transform: scale(1.1);
        }
    </style>
</head>
<body class="bg-dark text-white">
    <!-- Header/Navigation -->
    <header class="bg-darker">
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    <span class="text-xl font-bold">Supportify</span>
                </div>
                <nav class="hidden md:flex space-x-8">
                    <a href="/" class="hover:text-primary transition-colors">Accueil</a>
                    <a href="/fonctionnalites" class="text-primary border-b-2 border-primary pb-1">Fonctionnalités</a>
                    <a href="/solutions" class="hover:text-primary transition-colors">Solutions</a>
                    <a href="/tarification" class="hover:text-primary transition-colors">Tarification</a>
                    <a href="/temoignages" class="hover:text-primary transition-colors">Témoignages</a>
                </nav>
                <div class="flex items-center space-x-4">
                    <a href="/login" class="text-gray-300 hover:text-white transition-colors">Connexion</a>
                    <a href="/register" class="bg-primary hover:bg-blue-600 text-white px-4 py-2 rounded-md transition-colors">Essai gratuit</a>
                </div>
                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button type="button" class="text-gray-300 hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="py-20 gradient-bg">
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-10 md:mb-0">
                    <h1 class="text-4xl md:text-5xl font-bold mb-6">Découvrez toutes nos fonctionnalités</h1>
                    <p class="text-xl text-gray-300 mb-8">Supportify offre une suite complète d'outils pour transformer votre service client et améliorer la satisfaction de vos utilisateurs.</p>
                    <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                        <a href="/register" class="bg-primary hover:bg-blue-600 text-white px-6 py-3 rounded-md text-center transition-colors">Commencer gratuitement</a>
                        <a href="#fonctionnalites-cles" class="border border-gray-600 hover:border-gray-400 px-6 py-3 rounded-md text-center transition-colors">Explorer les fonctionnalités</a>
                    </div>
                </div>
                <div class="md:w-1/2">
                    <img src="https://via.placeholder.com/600x400" alt="Supportify Dashboard" class="rounded-lg shadow-xl">
                </div>
            </div>
        </div>
    </section>

    <!-- Fonctionnalités Clés Section -->
    <section id="fonctionnalites-cles" class="py-20">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold mb-4">Fonctionnalités clés</h2>
                <p class="text-xl text-gray-300 max-w-3xl mx-auto">Découvrez comment Supportify peut transformer votre service client avec ces fonctionnalités essentielles.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="bg-card rounded-lg p-8 transition-all duration-300 feature-card">
                    <div class="bg-primary bg-opacity-20 p-3 rounded-full w-14 h-14 flex items-center justify-center mb-6 feature-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Gestion des tickets</h3>
                    <p class="text-gray-300 mb-4">Centralisez toutes les demandes clients dans une interface intuitive. Assignez, suivez et résolvez les tickets efficacement.</p>
                    <img src="https://via.placeholder.com/400x200" alt="Gestion des tickets" class="rounded-lg w-full h-40 object-cover">
                </div>

                <!-- Feature 2 -->
                <div class="bg-card rounded-lg p-8 transition-all duration-300 feature-card">
                    <div class="bg-secondary bg-opacity-20 p-3 rounded-full w-14 h-14 flex items-center justify-center mb-6 feature-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-secondary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Analyses et rapports</h3>
                    <p class="text-gray-300 mb-4">Obtenez des insights précieux sur les performances de votre équipe et la satisfaction client grâce à des tableaux de bord détaillés.</p>
                    <img src="https://via.placeholder.com/400x200" alt="Analyses et rapports" class="rounded-lg w-full h-40 object-cover">
                </div>

                <!-- Feature 3 -->
                <div class="bg-card rounded-lg p-8 transition-all duration-300 feature-card">
                    <div class="bg-green-600 bg-opacity-20 p-3 rounded-full w-14 h-14 flex items-center justify-center mb-6 feature-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Automatisation</h3>
                    <p class="text-gray-300 mb-4">Automatisez les tâches répétitives comme l'assignation des tickets, les réponses automatiques et les suivis pour gagner du temps.</p>
                    <img src="https://via.placeholder.com/400x200" alt="Automatisation" class="rounded-lg w-full h-40 object-cover">
                </div>

                <!-- Feature 4 -->
                <div class="bg-card rounded-lg p-8 transition-all duration-300 feature-card">
                    <div class="bg-yellow-600 bg-opacity-20 p-3 rounded-full w-14 h-14 flex items-center justify-center mb-6 feature-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Personnalisation</h3>
                    <p class="text-gray-300 mb-4">Adaptez Supportify à vos besoins spécifiques avec des champs personnalisés, des workflows sur mesure et des intégrations flexibles.</p>
                    <img src="https://via.placeholder.com/400x200" alt="Personnalisation" class="rounded-lg w-full h-40 object-cover">
                </div>

                <!-- Feature 5 -->
                <div class="bg-card rounded-lg p-8 transition-all duration-300 feature-card">
                    <div class="bg-red-600 bg-opacity-20 p-3 rounded-full w-14 h-14 flex items-center justify-center mb-6 feature-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Sécurité avancée</h3>
                    <p class="text-gray-300 mb-4">Protégez les données de vos clients avec un chiffrement de bout en bout, une authentification à deux facteurs et des contrôles d'accès granulaires.</p>
                    <img src="https://via.placeholder.com/400x200" alt="Sécurité avancée" class="rounded-lg w-full h-40 object-cover">
                </div>

                <!-- Feature 6 -->
                <div class="bg-card rounded-lg p-8 transition-all duration-300 feature-card">
                    <div class="bg-indigo-600 bg-opacity-20 p-3 rounded-full w-14 h-14 flex items-center justify-center mb-6 feature-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Intégrations</h3>
                    <p class="text-gray-300 mb-4">Connectez Supportify à vos outils existants comme Slack, Gmail, Jira et plus encore pour un flux de travail sans interruption.</p>
                    <img src="https://via.placeholder.com/400x200" alt="Intégrations" class="rounded-lg w-full h-40 object-cover">
                </div>
            </div>
        </div>
    </section>

    <!-- Fonctionnalités détaillées -->
    <section class="py-20 bg-darker">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold mb-4">Fonctionnalités détaillées</h2>
                <p class="text-xl text-gray-300 max-w-3xl mx-auto">Explorez en profondeur les capacités de Supportify pour comprendre comment notre plateforme peut répondre à tous vos besoins.</p>
            </div>

            <!-- Feature Detail 1 -->
            <div class="flex flex-col md:flex-row items-center mb-20">
                <div class="md:w-1/2 mb-10 md:mb-0 md:pr-10">
                    <div class="bg-primary bg-opacity-10 inline-block p-3 rounded-full mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Gestion avancée des tickets</h3>
                    <p class="text-gray-300 mb-6">Notre système de gestion des tickets va bien au-delà des solutions basiques. Avec Supportify, vous pouvez :</p>
                    <ul class="space-y-3">
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Créer des files d'attente personnalisées pour différents types de demandes</span>
                        </li>
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Définir des règles d'attribution automatique basées sur la compétence, la charge de travail ou la disponibilité</span>
                        </li>
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Configurer des SLA (accords de niveau de service) avec des alertes automatiques</span>
                        </li>
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Utiliser des étiquettes et des catégories pour organiser et filtrer efficacement les tickets</span>
                        </li>
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Accéder à l'historique complet des interactions pour chaque ticket</span>
                        </li>
                    </ul>
                </div>
                <div class="md:w-1/2">
                    <img src="https://via.placeholder.com/600x400" alt="Gestion avancée des tickets" class="rounded-lg shadow-xl">
                </div>
            </div>

            <!-- Feature Detail 2 -->
            <div class="flex flex-col md:flex-row-reverse items-center mb-20">
                <div class="md:w-1/2 mb-10 md:mb-0 md:pl-10">
                    <div class="bg-secondary bg-opacity-10 inline-block p-3 rounded-full mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-secondary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Tableaux de bord et analyses</h3>
                    <p class="text-gray-300 mb-6">Prenez des décisions éclairées grâce à nos outils d'analyse puissants :</p>
                    <ul class="space-y-3">
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-secondary mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Tableaux de bord personnalisables avec des widgets configurables</span>
                        </li>
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-secondary mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Rapports en temps réel sur les performances de l'équipe et la satisfaction client</span>
                        </li>
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-secondary mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Visualisations avancées avec des graphiques et des diagrammes interactifs</span>
                        </li>
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-secondary mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Analyse des tendances pour identifier les problèmes récurrents</span>
                        </li>
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-secondary mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Rapports programmés envoyés automatiquement par email</span>
                        </li>
                    </ul>
                </div>
                <div class="md:w-1/2">
                    <img src="https://via.placeholder.com/600x400" alt="Tableaux de bord et analyses" class="rounded-lg shadow-xl">
                </div>
            </div>

            <!-- Feature Detail 3 -->
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-10 md:mb-0 md:pr-10">
                    <div class="bg-green-600 bg-opacity-10 inline-block p-3 rounded-full mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Automatisation intelligente</h3>
                    <p class="text-gray-300 mb-6">Libérez du temps pour votre équipe grâce à nos puissantes fonctionnalités d'automatisation :</p>
                    <ul class="space-y-3">
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Réponses automatiques pour les questions fréquentes</span>
                        </li>
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Workflows personnalisables avec des déclencheurs et des actions</span>
                        </li>
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Routage intelligent des tickets basé sur le contenu et les mots-clés</span>
                        </li>
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Notifications automatiques pour les clients et les agents</span>
                        </li>
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Escalade automatique des tickets critiques ou en attente depuis trop longtemps</span>
                        </li>
                    </ul>
                </div>
                <div class="md:w-1/2">
                    <img src="https://via.placeholder.com/600x400" alt="Automatisation intelligente" class="rounded-lg shadow-xl">
                </div>
            </div>
        </div>
    </section>

    <!-- Comparaison des fonctionnalités -->
    <section class="py-20">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold mb-4">Comparaison des fonctionnalités</h2>
                <p class="text-xl text-gray-300 max-w-3xl mx-auto">Découvrez comment les fonctionnalités de Supportify se comparent selon les différents plans.</p>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full bg-card rounded-lg overflow-hidden">
                    <thead>
                        <tr class="border-b border-gray-700">
                            <th class="py-4 px-6 text-left">Fonctionnalité</th>
                            <th class="py-4 px-6 text-center">Starter</th>
                            <th class="py-4 px-6 text-center bg-secondary bg-opacity-10">Professional</th>
                            <th class="py-4 px-6 text-center">Enterprise</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b border-gray-700">
                            <td class="py-4 px-6 font-medium">Gestion des tickets</td>
                            <td class="py-4 px-6 text-center">Basique</td>
                            <td class="py-4 px-6 text-center bg-secondary bg-opacity-10">Avancée</td>
                            <td class="py-4 px-6 text-center">Complète</td>
                        </tr>
                        <tr class="border-b border-gray-700">
                            <td class="py-4 px-6 font-medium">Nombre d'agents</td>
                            <td class="py-4 px-6 text-center">Jusqu'à 3</td>
                            <td class="py-4 px-6 text-center bg-secondary bg-opacity-10">Illimité</td>
                            <td class="py-4 px-6 text-center">Illimité</td>
                        </tr>
                        <tr class="border-b border-gray-700">
                            <td class="py-4 px-6 font-medium">Automatisation</td>
                            <td class="py-4 px-6 text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </td>
                            <td class="py-4 px-6 text-center bg-secondary bg-opacity-10">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </td>
                            <td class="py-4 px-6 text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </td>
                        </tr>
                        <tr class="border-b border-gray-700">
                            <td class="py-4 px-6 font-medium">Rapports et analyses</td>
                            <td class="py-4 px-6 text-center">Basiques</td>
                            <td class="py-4 px-6 text-center bg-secondary bg-opacity-10">Avancés</td>
                            <td class="py-4 px-6 text-center">Personnalisés</td>
                        </tr>
                        <tr class="border-b border-gray-700">
                            <td class="py-4 px-6 font-medium">Intégrations</td>
                            <td class="py-4 px-6 text-center">5</td>
                            <td class="py-4 px-6 text-center bg-secondary bg-opacity-10">20+</td>
                            <td class="py-4 px-6 text-center">Illimitées</td>
                        </tr>
                        <tr class="border-b border-gray-700">
                            <td class="py-4 px-6 font-medium">Base de connaissances</td>
                            <td class="py-4 px-6 text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </td>
                            <td class="py-4 px-6 text-center bg-secondary bg-opacity-10">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </td>
                            <td class="py-4 px-6 text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </td>
                        </tr>
                        <tr class="border-b border-gray-700">
                            <td class="py-4 px-6 font-medium">SLA personnalisés</td>
                            <td class="py-4 px-6 text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </td>
                            <td class="py-4 px-6 text-center bg-secondary bg-opacity-10">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </td>
                            <td class="py-4 px-6 text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-4 px-6 font-medium">Support prioritaire</td>
                            <td class="py-4 px-6 text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </td>
                            <td class="py-4 px-6 text-center bg-secondary bg-opacity-10">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </td>
                            <td class="py-4 px-6 text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- Témoignages -->
    <section class="py-20 bg-darker">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold mb-4">Ce que nos clients disent de nos fonctionnalités</h2>
                <p class="text-xl text-gray-300 max-w-3xl mx-auto">Découvrez comment nos fonctionnalités ont transformé le service client de ces entreprises.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Témoignage 1 -->
                <div class="bg-card rounded-lg p-8">
                    <div class="flex items-center mb-6">
                        <div class="text-yellow-400 flex">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        </div>
                    </div>
                    <p class="text-gray-300 mb-6">"Les fonctionnalités d'automatisation de Supportify nous ont permis d'économiser plus de 20 heures par semaine. Notre équipe peut maintenant se concentrer sur les problèmes complexes plutôt que sur les tâches répétitives."</p>
                    <div class="flex items-center">
                        <div class="h-12 w-12 rounded-full bg-green-500 flex items-center justify-center mr-4 overflow-hidden">
                            <img src="https://randomuser.me/api/portraits/men/54.jpg" alt="Thomas Laurent" class="h-full w-full object-cover">
                        </div>
                        <div>
                            <h4 class="font-semibold">Thomas Laurent</h4>
                            <p class="text-gray-400 text-sm">CTO, StartupFlow</p>
                        </div>
                    </div>
                </div>

                <!-- Témoignage 2 -->
                <div class="bg-card rounded-lg p-8">
                    <div class="flex items-center mb-6">
                        <div class="text-yellow-400 flex">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        </div>
                    </div>
                    <p class="text-gray-300 mb-6">"Les tableaux de bord et les rapports de Supportify nous ont donné une visibilité sans précédent sur notre service client. Nous avons pu identifier des tendances et améliorer nos processus, ce qui a conduit à une augmentation de 30% de notre taux de satisfaction client."</p>
                    <div class="flex items-center">
                        <div class="h-12 w-12 rounded-full bg-blue-500 flex items-center justify-center mr-4 overflow-hidden">
                            <img src="https://randomuser.me/api/portraits/women/32.jpg" alt="Marie Dupont" class="h-full w-full object-cover">
                        </div>
                        <div>
                            <h4 class="font-semibold">Marie Dupont</h4>
                            <p class="text-gray-400 text-sm">Directrice du Support, TechCorp</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-primary bg-opacity-10">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold mb-4">Prêt à transformer votre support client ?</h2>
            <p class="text-xl text-gray-300 max-w-3xl mx-auto mb-8">Découvrez par vous-même comment les fonctionnalités de Supportify peuvent améliorer votre service client.</p>
            <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4">
                <a href="/register" class="bg-primary hover:bg-blue-600 text-white px-8 py-3 rounded-md text-lg transition-colors">Commencer gratuitement</a>
                <a href="/demo" class="border border-primary text-primary hover:bg-primary hover:text-white px-8 py-3 rounded-md text-lg transition-colors">Demander une démo</a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-darker py-12">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
                <div>
                    <div class="flex items-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        <span class="text-xl font-bold">Supportify</span>
                    </div>
                    <p class="text-gray-400 mb-4">Simplifiez votre support client avec notre plateforme tout-en-un.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                            </svg>
                        </a>
                    </div>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Produit</h3>
                    <ul class="space-y-2">
                        <li><a href="/fonctionnalites" class="text-gray-400 hover:text-primary">Fonctionnalités</a></li>
                        <li><a href="/solutions" class="text-gray-400 hover:text-primary">Solutions</a></li>
                        <li><a href="/tarification" class="text-gray-400 hover:text-primary">Tarification</a></li>
                        <li><a href="/integrations" class="text-gray-400 hover:text-primary">Intégrations</a></li>
                        <li><a href="/roadmap" class="text-gray-400 hover:text-primary">Feuille de route</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Ressources</h3>
                    <ul class="space-y-2">
                        <li><a href="/blog" class="text-gray-400 hover:text-primary">Blog</a></li>
                        <li><a href="/documentation" class="text-gray-400 hover:text-primary">Documentation</a></li>
                        <li><a href="/guides" class="text-gray-400 hover:text-primary">Guides</a></li>
                        <li><a href="/webinaires" class="text-gray-400 hover:text-primary">Webinaires</a></li>
                        <li><a href="/api" class="text-gray-400 hover:text-primary">API</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Entreprise</h3>
                    <ul class="space-y-2">
                        <li><a href="/a-propos" class="text-gray-400 hover:text-primary">À propos</a></li>
                        <li><a href="/clients" class="text-gray-400 hover:text-primary">Clients</a></li>
                        <li><a href="/carrieres" class="text-gray-400 hover:text-primary">Carrières</a></li>
                        <li><a href="/contact" class="text-gray-400 hover:text-primary">Contact</a></li>
                        <li><a href="/partenaires" class="text-gray-400 hover:text-primary">Partenaires</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-700 pt-8">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <p class="text-gray-400 mb-4 md:mb-0">&copy; 2025 Supportify. Tous droits réservés.</p>
                    <div class="flex space-x-6">
                        <a href="/conditions" class="text-gray-400 hover:text-primary">Conditions d'utilisation</a>
                        <a href="/confidentialite" class="text-gray-400 hover:text-primary">Politique de confidentialité</a>
                        <a href="/mentions-legales" class="text-gray-400 hover:text-primary">Mentions légales</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>