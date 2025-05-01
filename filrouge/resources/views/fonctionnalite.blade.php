<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Supportify - Fonctionnalités</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            'bleuciel': '#052485',
            'bleuciel-light': '#3b4db5'
          },
          fontFamily: {
            sans: ['Inter', 'ui-sans-serif', 'system-ui']
          }
        }
      }
    }
  </script>
</head>
<body class="bg-gray-100 text-gray-800 font-sans">
 @include('partials.navbar')

  <!-- Hero -->
  <section class="bg-bleuciel text-white text-center py-24">
    <h2 class="text-5xl font-extrabold mb-4 tracking-tight">Nos Fonctionnalités Puissantes</h2>
    <p class="text-xl max-w-3xl mx-auto opacity-90">Transformez votre support client avec les outils intuitifs et performants de Supportify, conçus pour simplifier et optimiser votre workflow.</p>
  </section>

  <!-- Fonctionnalités Grille -->
  <section class="max-w-7xl mx-auto px-6 py-20">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
      <!-- Fonctionnalité 1 -->
      <div class="bg-white rounded-3xl shadow-xl p-8 border border-gray-100">
        <div class="w-12 h-12 bg-bleuciel text-white rounded-xl flex items-center justify-center mb-6">
          <i class="fas fa-ticket-alt text-xl"></i>
        </div>
        <h3 class="text-2xl font-bold mb-3 text-bleuciel">Gestion des Tickets</h3>
        <p class="text-gray-600 mb-4 leading-relaxed">Gérez les demandes d'assistance avec un système de suivi et d'assignation fluide et efficace.</p>
        <a href="#" class="text-bleuciel-light font-semibold text-sm uppercase tracking-wide hover:text-bleuciel">En savoir plus</a>
      </div>

      <!-- Fonctionnalité 2 -->
      <div class="bg-white rounded-3xl shadow-xl p-8 border border-gray-100">
        <div class="w-12 h-12 bg-bleuciel text-white rounded-xl flex items-center justify-center mb-6">
          <i class="fas fa-users text-xl"></i>
        </div>
        <h3 class="text-2xl font-bold mb-3 text-bleuciel">Gestion des Utilisateurs</h3>
        <p class="text-gray-600 mb-4 leading-relaxed">Créez des profils, attribuez des rôles et gérez les permissions en quelques clics.</p>
        <a href="#" class="text-bleuciel-light font-semibold text-sm uppercase tracking-wide hover:text-bleuciel">En savoir plus</a>
      </div>

      <!-- Fonctionnalité 3 -->
      <div class="bg-white rounded-3xl shadow-xl p-8 border border-gray-100">
        <div class="w-12 h-12 bg-bleuciel text-white rounded-xl flex items-center justify-center mb-6">
          <i class="fas fa-chart-line text-xl"></i>
        </div>
        <h3 class="text-2xl font-bold mb-3 text-bleuciel">Tableau de Bord</h3>
        <p class="text-gray-600 mb-4 leading-relaxed">Accédez à des statistiques en temps réel via un tableau de bord clair et intuitif.</p>
        <a href="#" class="text-bleuciel-light font-semibold text-sm uppercase tracking-wide hover:text-bleuciel">En savoir plus</a>
      </div>

      <!-- Fonctionnalité 4 -->
      <div class="bg-white rounded-3xl shadow-xl p-8 border border-gray-100">
        <div class="w-12 h-12 bg-bleuciel text-white rounded-xl flex items-center justify-center mb-6">
          <i class="fas fa-comments text-xl"></i>
        </div>
        <h3 class="text-2xl font-bold mb-3 text-bleuciel">Messagerie Interne</h3>
        <p class="text-gray-600 mb-4 leading-relaxed">Facilitez la communication entre agents et utilisateurs directement sur la plateforme.</p>
        <a href="#" class="text-bleuciel-light font-semibold text-sm uppercase tracking-wide hover:text-bleuciel">En savoir plus</a>
      </div>

      <!-- Fonctionnalité 5 -->
      <div class="bg-white rounded-3xl shadow-xl p-8 border border-gray-100">
        <div class="w-12 h-12 bg-bleuciel text-white rounded-xl flex items-center justify-center mb-6">
          <i class="fas fa-archive text-xl"></i>
        </div>
        <h3 class="text-2xl font-bold mb-3 text-bleuciel">Archivage des Tickets</h3>
        <p class="text-gray-600 mb-4 leading-relaxed">Organisez et conservez vos tickets résolus pour un historique clair.</p>
        <a href="#" class="text-bleuciel-light font-semibold text-sm uppercase tracking-wide hover:text-bleuciel">En savoir plus</a>
      </div>

      <!-- Fonctionnalité 6 -->
      <div class="bg-white rounded-3xl shadow-xl p-8 border border-gray-100">
        <div class="w-12 h-12 bg-bleuciel text-white rounded-xl flex items-center justify-center mb-6">
          <i class="fas fa-cogs text-xl"></i>
        </div>
        <h3 class="text-2xl font-bold mb-3 text-bleuciel">Paramétrage Avancé</h3>
        <p class="text-gray-600 mb-4 leading-relaxed">Adaptez la plateforme à vos besoins avec des options de personnalisation poussées.</p>
        <a href="#" class="text-bleuciel-light font-semibold text-sm uppercase tracking-wide hover:text-bleuciel">En savoir plus</a>
      </div>
    </div>
  </section>

  <!-- CTA Section -->
  <section class="bg-bleuciel text-white text-center py-16">
    <h3 class="text-3xl font-bold mb-4">Prêt à transformer votre support client ?</h3>
    <p class="text-lg max-w-xl mx-auto mb-8 opacity-90">Rejoignez des milliers d'entreprises qui optimisent leur gestion avec Supportify.</p>
    <a href="{{ route('register') }}" class="inline-block bg-white text-bleuciel font-semibold px-8 py-3 rounded-full text-lg hover:bg-gray-200">Démarrer maintenant</a>
  </section>

  <!-- Footer -->
  <footer class="bg-white py-10 mt-20 border-t">
    <div class="max-w-7xl mx-auto px-6 text-center text-sm text-gray-500">
      © 2025 Supportify. Tous droits réservés.
    </div>
  </footer>

  <!-- Font Awesome pour les icônes -->
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html>