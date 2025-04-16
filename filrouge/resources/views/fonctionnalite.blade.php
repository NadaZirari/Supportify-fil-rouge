<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fonctionnalités - Supportify</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<style>
        :root {
            --bg-dark: #0f1123;
            --bg-card: #1a1e35;
            --accent: #ff5c35;
            --text-primary: #ffffff;
            --text-secondary: #a0a3bd;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-dark);
            color: var(--text-primary);
            line-height: 1.6;
        }
        
        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        header {
            padding: 20px 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo {
            display: flex;
            align-items: center;
            font-weight: 700;
            font-size: 1.5rem;
            color: var(--text-primary);
            text-decoration: none;
        }
        
        .logo i {
            color: var(--accent);
            margin-right: 8px;
        }
        
        nav ul {
            display: flex;
            list-style: none;
        }
        
        nav ul li {
            margin-left: 30px;
        }
        
        nav ul li a {
            color: var(--text-secondary);
            text-decoration: none;
            font-size: 0.9rem;
            transition: color 0.3s;
        }
        
        nav ul li a:hover {
            color: var(--text-primary);
        }
        
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: var(--accent);
            color: white;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
            transition: background-color 0.3s;
        }
        
        .btn:hover {
            background-color: #e64a19;
        }
        
        .btn-outline {
            background-color: transparent;
            border: 1px solid var(--accent);
            color: var(--accent);
        }
        
        .btn-outline:hover {
            background-color: var(--accent);
            color: white;
        }
        
        .hero {
            display: flex;
            align-items: center;
            padding: 80px 0;
        }
        
        .hero-content {
            flex: 1;
            padding-right: 40px;
        }
        
        .hero-image {
            flex: 1;
        }
        
        .hero-image img {
            width: 100%;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }
        
        h1 {
            font-size: 3rem;
            line-height: 1.2;
            margin-bottom: 20px;
        }
        
        h1 span {
            color: var(--accent);
        }
        
        .subtitle {
            color: var(--text-secondary);
            margin-bottom: 30px;
            font-size: 1.1rem;
        }
        
        .section-title {
            text-align: center;
            font-size: 2rem;
            margin-bottom: 50px;
        }
        
        .roles {
            padding: 80px 0;
        }
        
        .roles-container {
            display: flex;
            gap: 30px;
        }
        
        .role-card {
            flex: 1;
            background-color: var(--bg-card);
            border-radius: 10px;
            padding: 30px;
            display: flex;
            flex-direction: column;
        }
        
        .role-icon {
            width: 50px;
            height: 50px;
            background-color: rgba(255, 92, 53, 0.1);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }
        
        .role-icon i {
            color: var(--accent);
            font-size: 1.5rem;
        }
        
        .role-title {
            font-size: 1.3rem;
            margin-bottom: 15px;
        }
        
        .role-description {
            color: var(--text-secondary);
            margin-bottom: 20px;
            flex-grow: 1;
        }
        
        .features {
            padding: 80px 0;
        }
        
        .features-container {
            display: flex;
            gap: 30px;
        }
        
        .feature-card {
            flex: 1;
            background-color: var(--bg-card);
            border-radius: 10px;
            padding: 30px;
        }
        
        .feature-icon {
            width: 50px;
            height: 50px;
            background-color: rgba(255, 92, 53, 0.1);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }
        
        .feature-icon i {
            color: var(--accent);
            font-size: 1.5rem;
        }
        
        .feature-title {
            font-size: 1.3rem;
            margin-bottom: 15px;
        }
        
        .feature-description {
            color: var(--text-secondary);
        }
        
        .testimonials {
            padding: 80px 0;
        }
        
        .testimonials-container {
            display: flex;
            gap: 30px;
        }
        
        .testimonial-card {
            flex: 1;
            background-color: var(--bg-card);
            border-radius: 10px;
            padding: 30px;
        }
        
        .stars {
            color: #ffc107;
            margin-bottom: 15px;
        }
        
        .testimonial-text {
            color: var(--text-secondary);
            margin-bottom: 20px;
        }
        
        .testimonial-author {
            display: flex;
            align-items: center;
        }
        
        .author-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 15px;
            overflow: hidden;
        }
        
        .author-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .author-name {
            font-weight: 600;
        }
        
        .cta {
            padding: 80px 0;
            text-align: center;
        }
        
        .cta-title {
            font-size: 2rem;
            margin-bottom: 20px;
        }
        
        .cta-subtitle {
            color: var(--text-secondary);
            margin-bottom: 30px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }
        
        footer {
            background-color: var(--bg-card);
            padding: 60px 0 30px;
        }
        
        .footer-content {
            display: flex;
            justify-content: space-between;
            margin-bottom: 40px;
        }
        
        .footer-column {
            flex: 1;
        }
        
        .footer-column h3 {
            font-size: 1.2rem;
            margin-bottom: 20px;
        }
        
        .footer-column ul {
            list-style: none;
        }
        
        .footer-column ul li {
            margin-bottom: 10px;
        }
        
        .footer-column ul li a {
            color: var(--text-secondary);
            text-decoration: none;
            transition: color 0.3s;
        }
        
        .footer-column ul li a:hover {
            color: var(--text-primary);
        }
        
        .footer-bottom {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 30px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .footer-bottom p {
            color: var(--text-secondary);
            font-size: 0.9rem;
        }
        
        .social-icons a {
            color: var(--text-secondary);
            margin-left: 15px;
            font-size: 1.2rem;
            transition: color 0.3s;
        }
        
        .social-icons a:hover {
            color: var(--text-primary);
        }
        
        @media (max-width: 768px) {
            .hero, .roles-container, .features-container, .testimonials-container, .footer-content {
                flex-direction: column;
            }
            
            .hero-content {
                padding-right: 0;
                margin-bottom: 40px;
            }
            
            .role-card, .feature-card, .testimonial-card {
                margin-bottom: 30px;
            }
            
            .footer-column {
                margin-bottom: 30px;
            }
            
            h1 {
                font-size: 2.5rem;
            }
        }
    </style>
</head>
<body>
    <header class="container">
    <a href="{{ route('home') }}" class="logo">
            <i class="fas fa-headset"></i>
            Supportify
        </a>
        
        <nav>
            <ul>
                <li><a href="{{ route('fonctionnalite') }}">Fonctionnalités</a></li>
                <li><a href="#">Solutions</a></li>
                <li><a href="#">Tarification</a></li>
                <li><a href="#">Témoignages</a></li>
            </ul>
        </nav>
        
        <a href="{{ route('register') }}" class="btn">Démarrer</a>
    </header>
    

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-12">
        <h1 class="text-4xl font-bold text-orange-500 mb-8 text-center">Découvrez nos Fonctionnalités</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Feature 1 -->
            <div class="bg-gray-800 p-6 rounded-lg shadow-md hover:shadow-xl transition">
                <div class="text-orange-500 text-3xl mb-4"><i class="fas fa-ticket-alt"></i></div>
                <h2 class="text-2xl font-semibold mb-2">Gestion des Tickets</h2>
                <p class="text-gray-400 mb-4">Suivi des tickets, assignation et résolution des demandes d'assistance en
                    toute simplicité.</p>
                <a href="#" class="text-orange-500 hover:text-orange-400 transition">En savoir plus</a>
            </div>

            <!-- Feature 2 -->
            <div class="bg-gray-800 p-6 rounded-lg shadow-md hover:shadow-xl transition">
                <div class="text-orange-500 text-3xl mb-4"><i class="fas fa-users"></i></div>
                <h2 class="text-2xl font-semibold mb-2">Gestion des Utilisateurs</h2>
                <p class="text-gray-400 mb-4">Créez et gérez les profils utilisateurs, assignez des rôles et permissions
                    pour une gestion fluide.</p>
                <a href="#" class="text-orange-500 hover:text-orange-400 transition">En savoir plus</a>
            </div>

            <!-- Feature 3 -->
            <div class="bg-gray-800 p-6 rounded-lg shadow-md hover:shadow-xl transition">
                <div class="text-orange-500 text-3xl mb-4"><i class="fas fa-chart-line"></i></div>
                <h2 class="text-2xl font-semibold mb-2">Tableau de Bord</h2>
                <p class="text-gray-400 mb-4">Visualisez vos tickets, performances et statistiques en temps réel sur un
                    tableau de bord intuitif.</p>
                <a href="#" class="text-orange-500 hover:text-orange-400 transition">En savoir plus</a>
            </div>

            <!-- Feature 4 -->
            <div class="bg-gray-800 p-6 rounded-lg shadow-md hover:shadow-xl transition">
                <div class="text-orange-500 text-3xl mb-4"><i class="fas fa-comments"></i></div>
                <h2 class="text-2xl font-semibold mb-2">Messagerie Interne</h2>
                <p class="text-gray-400 mb-4">Communiquez facilement entre agents et utilisateurs directement depuis la
                    plateforme.</p>
                <a href="#" class="text-orange-500 hover:text-orange-400 transition">En savoir plus</a>
            </div>

            <!-- Feature 5 -->
            <div class="bg-gray-800 p-6 rounded-lg shadow-md hover:shadow-xl transition">
                <div class="text-orange-500 text-3xl mb-4"><i class="fas fa-archive"></i></div>
                <h2 class="text-2xl font-semibold mb-2">Archivage des Tickets</h2>
                <p class="text-gray-400 mb-4">Archivez les tickets résolus pour une gestion optimale des données
                    historiques.</p>
                <a href="#" class="text-orange-500 hover:text-orange-400 transition">En savoir plus</a>
            </div>

            <!-- Feature 6 -->
            <div class="bg-gray-800 p-6 rounded-lg shadow-md hover:shadow-xl transition">
                <div class="text-orange-500 text-3xl mb-4"><i class="fas fa-cogs"></i></div>
                <h2 class="text-2xl font-semibold mb-2">Paramétrage Avancé</h2>
                <p class="text-gray-400 mb-4">Personnalisez votre plateforme selon vos besoins, ajustez les paramètres
                    pour un usage optimal.</p>
                <a href="#" class="text-orange-500 hover:text-orange-400 transition">En savoir plus</a>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 py-6 mt-12">
        <div class="container mx-auto text-center text-gray-400">
            <p>&copy; 2025 Supportify. Tous droits réservés.</p>
        </div>
    </footer>

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>

</html>
