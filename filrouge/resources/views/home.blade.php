<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Supportify - Support client intelligent et efficace</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

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
            font-family: 'Poppins', sans-serif;
            background-color: white;
            color: var(--text-primary);
            line-height: 1.6;
        }
        
        .container {
            width: 100%;
            max-width: 1442px;
            /* margin: 0 auto; */
            padding: 0 20px;
            background-color: white;

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
            color:#001968;
            text-decoration: none;
        }
        
        .logo i {
            color: #077ae6;
            margin-right: 8px;
            margin-left: 20px;
        }
        
        nav ul {
            display: flex;
            list-style: none;
        }
        
        nav ul li {
            margin-left: 30px;
        }
        
        nav ul li a {
            color: black;
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 600;
            transition: color 0.3s;
        }
        
        nav ul li a:hover {
            color: gray;
        }
        
        .btn {
            display: inline-block;
            padding: 10px 30px;
            margin-right: 40px;
            background-color: #001968;
            color: white;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: background-color 0.3s;
        }
        
        .btn:hover {
            background-color: green;
        }
        
        .btn-outline {
            background-color: transparent;
            border: 1px solid #E0F0FE;
            color: #E0F0FE;
        }
        
        .btn-outline:hover {
            background-color: #E0F0FE;
            color: white;
        }
        
        .hero {
            display: flex;
            align-items: center;
            padding: 80px 0;
            background-color:#E0F0FE;
        }
        
        .hero-content {
            flex: 1;
            padding-right: 40px;
            margin-left: 40px;
        }
        
        .hero-image {
            flex: 1;
            margin-right: 20px;
        }
        
        
        .hero-image img {
            width: 100%;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.0);
        }
        
        h1 {
            font-size: 3rem;
            line-height: 1.2;
            margin-bottom: 20px;
            color:#052485;
        }
        
        h1 span {
            color: black;
        }
        
        .subtitle {
            color: black;
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
            background-color: #052485;
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
            color: #E0F0FE;
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
            flex-wrap: wrap;
            gap: 30px;
        }
        
        .feature-card {
            flex: 1;
            background-color:#001968;
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
            color: #E0F0FE
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
            background-color: #001968;
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
            background-color: #061031;
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
            header {
            flex-direction: column;
            padding: 15px 0;
        }
        
        .logo {
            margin-bottom: 15px;
        }
        
        nav {
            width: 100%;
            margin-bottom: 15px;
        }
        
        nav ul {
            justify-content: center;
            flex-wrap: wrap;
        }
        
        nav ul li {
            margin: 5px 10px;
        }
        
        .btn {
            margin-right: 0;
            text-align: center;
            display: block;
            width: 80%;
            margin: 0 auto;
        }
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
            .why-container {
        flex-direction: column;
    }
    
    .why-card {
        margin-bottom: 20px;
    }
}
 .why-supportify {
    padding: 80px 0;
    background-color: white;
}

.why-container {
    display: flex;
    flex-wrap: wrap;
    gap: 30px;
    justify-content: center;
}

.why-card {
    flex: 1;
    min-width: 250px;
    background-color: #052485;
    border-radius: 10px;
    padding: 30px;
    color: white;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
}

.why-card:hover {
    transform: translateY(-5px);
}

.why-icon {
    width: 50px;
    height: 50px;
    background-color: rgba(224, 240, 254, 0.1);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 20px;
}

.why-icon i {
    color: #E0F0FE;
    font-size: 1.5rem;
}

.why-title {
    font-size: 1.3rem;
    margin-bottom: 15px;
    color: white;
}

.why-description {
    color: var(--text-secondary);
}


        
    </style>
</head>
<body >
    <header class="">
        <a href="#" class="logo">
            <i class="fas fa-headset"></i>
            Supportify
        </a>
        
        <nav>
            <ul>
                <li><a href="{{ route('fonctionnalite') }}">Fonctionnalités</a></li>
                <li><a href="{{ route('solutions') }}">Solutions</a></li>
                <li><a href="#">Témoignages</a></li>
            </ul>
        </nav>
        
        <a href="{{ route('register') }}" class="btn">Démarrer Essai Gratuit</a>
    </header>
    
    <section class="hero ">
        <div class="hero-content">
            <h1>Support client <span>intelligent et efficace</span></h1>
            <p class="subtitle">Optimisez votre service client grâce à notre technologie avancée. Gérez les tickets, communiquez en temps réel et analysez les données pour un support exceptionnel.</p>
            <a href="{{ route('login') }}" class="btn">Essayer gratuitement</a>
        </div>
        
        <div class="hero-image">
            <img src="/photo2.jpeg" alt="Dashboard Supportify" onerror="this.src='https://hebbkx1anhila5yf.public.blob.vercel-storage.com/homepagefil-AKFfVIbp0ACJ9CrVIXB8ATpPA7VHAo.png'">
        </div>
    </section>
    
    <section class="why-supportify">
        <div class="container">
            <h2 class="section-title">Pourquoi choisir Supportify ?</h2>
            <div class="why-container">
                <div class="why-card">
                    <div class="why-icon">
                        <i class="fas fa-rocket"></i>
                    </div>
                    <h3 class="why-title">Rapidité inégalée</h3>
                    <p class="why-description">Réduisez le temps de réponse grâce à une automatisation intelligente et des outils optimisés pour la productivité.</p>
                </div>
                <div class="why-card">
                    <div class="why-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3 class="why-title">Satisfaction client</h3>
                    <p class="why-description">Offrez une expérience client exceptionnelle avec des interactions fluides et personnalisées.</p>
                </div>
                <div class="why-card">
                    <div class="why-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3 class="why-title">Sécurité renforcée</h3>
                    <p class="why-description">Protégez les données de vos clients avec des protocoles de sécurité avancés et une conformité totale.</p>
                </div>
                <div class="why-card">
                    <div class="why-icon">
                        <i class="fas fa-globe"></i>
                    </div>
                    <h3 class="why-title">Accessibilité globale</h3>
                    <p class="why-description">Supportez vos clients partout dans le monde avec une plateforme multilingue et disponible 24/7.</p>
                </div>
            </div>
        </div>
    </section>
    
    
    <section class="features ">
        <h2 class="section-title">Fonctionnalités Principales</h2>
        
        <div class="features-container">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-ticket-alt"></i>
                </div>
                <h3 class="feature-title">Gestion des Tickets</h3>
                <p class="feature-description">Créez, assignez et suivez les tickets de support. Organisez les priorités et résolvez les problèmes efficacement.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-comments"></i>
                </div>
                <h3 class="feature-title">Chat en Temps Réel</h3>
                <p class="feature-description">Communiquez instantanément avec vos clients ou agents. Partagez des fichiers et résolvez les problèmes rapidement.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <h3 class="feature-title">Analyses Détaillées</h3>
                <p class="feature-description">Suivez les performances, identifiez les tendances et optimisez votre service client grâce à des rapports complets.</p>
            </div>
        </div>
    </section>
    
    <section class="testimonials ">
        <h2 class="section-title">Ce que disent nos clients</h2>
        
        <div class="testimonials-container">
            <div class="testimonial-card">
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <p class="testimonial-text">"Supportify a transformé notre service client. Nous avons réduit notre temps de réponse de 60% et augmenté la satisfaction client. Un outil indispensable !"</p>
                <div class="testimonial-author">
                    <div class="author-avatar">
                        <img src="{{ asset('images/avatar1.jpg') }}" alt="Avatar" onerror="this.src='https://via.placeholder.com/40'">
                    </div>
                    <span class="author-name">Marie Dupont</span>
                </div>
            </div>
            
            <div class="testimonial-card">
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <p class="testimonial-text">"Fonctionnalités puissantes et support réactif. Supportify nous a permis d'améliorer considérablement notre relation client."</p>
                <div class="testimonial-author">
                    <div class="author-avatar">
                        <img src="{{ asset('images/avatar2.jpg') }}" alt="Avatar" onerror="this.src='https://via.placeholder.com/40'">
                    </div>
                    <span class="author-name">Thomas Martin</span>
                </div>
            </div>
        </div>
    </section>
    
    <section class="cta ">
        <h2 class="cta-title">Prêt à améliorer votre support client ?</h2>
        <p class="cta-subtitle">Commencez votre essai gratuit de 14 jours. Aucune carte de crédit requise. Annulez à tout moment.</p>
        <a href="{{ route('login') }}" class="btn">Commencer maintenant</a>
    </section>
    
    <footer>
            <div class="footer-content">
                <div class="footer-column">
                    <a href="#" class="logo">
                        <i class="fas fa-headset"></i>
                        Supportify
                    </a>
                    <p style="color: var(--text-secondary); margin-top: 15px;">Plateforme de support client intelligente et efficace pour les entreprises de toutes tailles.</p>
                </div>
                
                <div class="footer-column">
                    <h3>Produit</h3>
                    <ul>
                        <li><a href="#">Fonctionnalités</a></li>
                        <li><a href="#">Intégrations</a></li>
                        <li><a href="#">Mises à jour</a></li>
                    </ul>
                </div>
                
                <div class="footer-column">
                    <h3>Ressources</h3>
                    <ul>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Guides</a></li>
                        <li><a href="#">Webinaires</a></li>
                        <li><a href="#">Documentation</a></li>
                    </ul>
                </div>
                
                <div class="footer-column">
                    <h3>Contact</h3>
                    <ul>
                        <li><a href="#">Support</a></li>
                        <li><a href="#">Ventes</a></li>
                        <li><a href="#">Partenaires</a></li>
                        <li><a href="#">Carrières</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>© 2023 Supportify. Tous droits réservés.</p>
                
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
            </div>
    </footer>
</body>
</html>

