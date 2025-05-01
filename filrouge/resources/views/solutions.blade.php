<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Supportify - Solutions</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in {
      animation: fadeIn 1s ease-out forwards;
    }
  </style>
   <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'bleuciel': '#052485'
                       
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-100 text-gray-800 font-sans">

  @include('partials.navbar')

  <!-- Hero -->
  <section class="bg-bleuciel text-white text-center py-20">
    <h2 class="text-4xl font-bold mb-4">Nos Solutions</h2>
    <p class="text-lg max-w-2xl mx-auto">Découvrez comment Supportify transforme la gestion du support client pour les équipes modernes.</p>
  </section>

  <!-- Solutions Alternées -->
  <section class="max-w-7xl mx-auto px-6 py-16 space-y-24">

    <!-- Solution 1 -->
    <div class="flex flex-col-reverse lg:flex-row items-center gap-10 animate-fade-in">
      <div class="lg:w-1/2 text-center lg:text-left">
        <h3 class="text-3xl font-bold text-bleuciel mb-4">Gestion intelligente des tickets</h3>
        <p class="text-gray-600">Centralisez toutes les demandes clients dans un tableau de bord clair, structuré et collaboratif. Bénéficiez d’un suivi en temps réel, d’une priorisation automatique basée sur l’urgence et la catégorie, ainsi que d’un historique complet pour un traitement efficace et transparent de chaque requête.

</p>
      </div>
      <div class="lg:w-1/2">
        <img src="ticket.png" alt="Gestion des tickets" class="rounded-2xl shadow-md">
      </div>
    </div>

    <!-- Solution 2 -->
    <div class="flex flex-col lg:flex-row items-center gap-10 animate-fade-in">
      <div class="lg:w-1/2">
        <img src="ticketphoto.png" alt="Collaboration" class="rounded-2xl shadow-md">
      </div>
      <div class="lg:w-1/2 text-center lg:text-left">
        <h3 class="text-3xl font-bold text-bleuciel mb-4">Collaboration d’équipe optimisée</h3>
        <p class="text-gray-600">Optimisez la collaboration au sein de votre équipe de support client avec une gestion simplifiée des tickets et une communication en temps réel. Suivez l'avancement de chaque demande grâce à des dashboards intuitifs, visualisez des KPIs clés et générez des rapports détaillés. Tout est facilement exportable pour un suivi approfondi et une analyse des performances de votre support.



</p>
      </div>
    </div>

    <!-- Solution 3 -->
    <div class="flex flex-col-reverse lg:flex-row items-center gap-10 animate-fade-in">
      <div class="lg:w-1/2 text-center lg:text-left">
        <h3 class="text-3xl font-bold text-bleuciel mb-4">Statistiques et rapports</h3>
        <p class="text-gray-600">Obtenez une vue d'ensemble complète de l'efficacité de votre support client grâce à des dashboards visuels et interactifs. Suivez des KPIs clés tels que les temps de réponse, les taux de résolution et la satisfaction client, pour évaluer la qualité du service. Générer des rapports détaillés et personnalisés, que vous pouvez exporter facilement pour des analyses approfondies ou partager avec vos équipes pour une prise de décision stratégique.</p>
      </div>
      <div class="lg:w-1/2">
        <img src="stat.jpg" alt="Statistiques" class="rounded-2xl shadow-md">
      </div>
    </div>

  </section>

  <!-- Footer -->
  <footer class="bg-white py-10 mt-20 border-t">
    <div class="max-w-7xl mx-auto px-6 text-center text-sm text-gray-500">
      © 2025 Supportify. Tous droits réservés.
    </div>
  </footer>

</body>
</html>
