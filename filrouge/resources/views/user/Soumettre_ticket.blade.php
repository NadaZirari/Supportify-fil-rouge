<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Nouveau ticket de support</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#0f172a] text-white font-sans min-h-screen flex flex-col">

  <!-- Barre de navigation horizontale -->
  <header class="bg-[#1e293b] p-4 flex flex-col sm:flex-row justify-between items-center shadow-md">
    <div class="text-xl font-bold text-orange-500 mb-4 sm:mb-0">Supportify</div>
    <nav class="hidden md:flex space-x-6 text-sm">
      <a href="#" class="hover:underline">Tableau de bord</a>
      <a href="#" class="hover:underline">Mes tickets</a>
      <a href="#" class="hover:underline">Base de connaissances</a>
      <a href="#" class="hover:underline">Paramètres</a>
    </nav>
    <!-- Menu hamburger pour mobile -->
    <button class="md:hidden text-white text-2xl mb-4 sm:mb-0">
      ☰
    </button>
    <div class="flex items-center space-x-4">
      <button class="relative">
        <span class="absolute top-0 right-0 w-2 h-2 bg-red-500 rounded-full"></span>
        🔔
      </button>
      <img src="/photo.jpeg" alt="User" class="rounded-full w-8 h-8" />
    </div>
  </header>
  <!-- Contenu principal -->
  <div class="flex flex-col md:flex-row flex-1">

    <!-- Menu latéral - caché sur mobile, visible sur tablette/desktop -->
    <aside class="w-full md:w-64 bg-[#1e293b] p-6 space-y-6 md:block">
      <nav class="space-y-4 text-sm">
        <a href="#" class="block text-white hover:text-orange-400 font-medium">🏠 Accueil</a>
        <a href="#" class="block text-orange-500 font-bold">🎫 Nouveau ticket</a>
        <a href="#" class="block text-white hover:text-orange-400">📄 Mes tickets</a>
      </nav>
      <div class="mt-10 text-sm text-gray-400">
        <p class="mb-2">Support</p>
        <a href="#" class="block hover:text-white">📚 Documentation</a>
        <a href="#" class="block hover:text-white">💬 Chat en direct</a>
      </div>
    </aside>

    <!-- Formulaire -->
    <main class="flex-1 p-4 sm:p-6 md:p-10">
      <h1 class="text-xl sm:text-2xl font-bold mb-2">Nouveau ticket de support</h1>
      <p class="text-xs sm:text-sm text-gray-400 mb-4 sm:mb-8">Décrivez votre problème en détail pour obtenir l'aide la plus adaptée</p>

      <form class="space-y-4 sm:space-y-6 max-w-2xl">

        <!-- Titre -->
        <div>
          <label class="block text-sm font-medium mb-1" for="titre">Titre du ticket *</label>
          <input id="titre" type="text" placeholder="Ex: Problème de connexion à l'application" class="w-full px-4 py-2 rounded-lg bg-[#1e293b] border border-gray-600 focus:outline-none focus:ring-2 focus:ring-orange-500" />
        </div>

        <!-- Description -->
        <div>
          <label class="block text-sm font-medium mb-1" for="description">Description détaillée *</label>
          <textarea id="description" rows="5" placeholder="Décrivez votre problème en détail..." class="w-full px-4 py-2 rounded-lg bg-[#1e293b] border border-gray-600 focus:outline-none focus:ring-2 focus:ring-orange-500"></textarea>
        </div>

        <!-- Priorité et Catégorie -->
        <div class="flex flex-col sm:flex-row gap-4 sm:gap-6">
          <!-- Priorité -->
          <div class="flex-1">
            <label class="block text-sm font-medium mb-2">Priorité</label>
            <div class="space-y-2">
              <label class="flex items-center space-x-2">
                <input type="radio" name="priorite" class="accent-green-500" />
                <span class="text-sm">🟢 Basse</span>
              </label>
              <label class="flex items-center space-x-2">
                <input type="radio" name="priorite" class="accent-yellow-500" />
                <span class="text-sm">🟠 Moyenne</span>
              </label>
              <label class="flex items-center space-x-2">
                <input type="radio" name="priorite" class="accent-red-500" />
                <span class="text-sm">🔴 Haute</span>
              </label>
            </div>
          </div>

          <!-- Catégorie -->
          <div class="flex-1">
            <label class="block text-sm font-medium mb-2">Catégorie</label>
            <select class="w-full px-4 py-2 rounded-lg bg-[#1e293b] border border-gray-600 focus:outline-none focus:ring-2 focus:ring-orange-500">
              <option disabled selected>Sélectionnez une catégorie</option>
              <option>Connexion</option>
              <option>Facturation</option>
              <option>Bug</option>
              <option>Demande d'amélioration</option>
            </select>
          </div>
        </div>

        <!-- Fichier -->
        <div>
          <label class="block text-sm font-medium mb-2">Pièces jointes</label>
          <div class="border border-dashed border-gray-500 rounded-lg p-4 sm:p-6 text-center bg-[#1e293b]">
            <input type="file" class="hidden" id="file-upload" />
            <label for="file-upload" class="cursor-pointer text-orange-400 hover:underline">
              Glissez vos fichiers ici ou <span class="underline">parcourir</span>
            </label>
            <p class="text-xs text-gray-400 mt-1">PNG, JPG, PDF jusqu'à 10MB</p>
          </div>
        </div>

        <!-- Boutons -->
        <div class="flex flex-col sm:flex-row justify-between items-center mt-8 gap-4">
          <a href="#" class="text-sm text-gray-400 hover:text-white order-2 sm:order-1">← Retour</a>
          <button type="submit" class="w-full sm:w-auto bg-orange-500 hover:bg-orange-600 text-white px-6 py-2 rounded-lg flex items-center justify-center gap-2 order-1 sm:order-2">
            📤 Envoyer le ticket
          </button>
        </div>

      </form>
    </main>
  </div>

  <!-- Script pour le menu hamburger -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const menuButton = document.querySelector('button.md\\:hidden');
      const sidebar = document.querySelector('aside');
      
      menuButton.addEventListener('click', function() {
        sidebar.classList.toggle('hidden');
        sidebar.classList.toggle('block');
      });
    });
  </script>
</body>
</html>