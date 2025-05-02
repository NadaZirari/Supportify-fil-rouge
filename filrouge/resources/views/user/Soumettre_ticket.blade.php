<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Nouveau ticket de support</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');
    body {
      font-family: 'Inter', sans-serif;
    }
    .fade-in {
      animation: fadeIn 0.5s ease-out;
    }
    .scale-hover {
      transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .scale-hover:hover {
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(15px); }
      to { opacity: 1; transform: translateY(0); }
    }
    .gradient-bg {
      background: linear-gradient(135deg, #f3f4f6 0%, #e5e7eb 100%);
    }
    .input-focus {
      transition: all 0.3s ease;
    }
    .input-focus:focus {
      box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.3);
    }
  </style>
</head>
<body class="bg-gray-50 text-gray-900 font-sans min-h-screen flex flex-col gradient-bg">
  <!-- Contenu principal -->
  <div class="flex flex-col md:flex-row flex-1">
    @include('partials.sidebaruser')

    <!-- Formulaire -->
    <main class="flex-1 p-4 sm:p-6 md:p-8 lg:p-12">
      <div class="max-w-3xl mx-auto bg-white rounded-2xl shadow-lg p-6 sm:p-8 lg:p-10 fade-in">
        @if(session('premium_success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-800 px-4 py-3 rounded-lg mb-6 shadow-sm" role="alert">
          <strong class="font-semibold">Succès!</strong>
          <span class="block sm:inline">{{ session('premium_success') }}</span>
        </div>
        @endif

        <script>
          document.addEventListener('DOMContentLoaded', function() {
            @if(session('premium_success'))
              Swal.fire({
                icon: 'success',
                title: 'Vous êtes maintenant Premium!',
                text: '{{ session('premium_success') }}',
                confirmButtonColor: '#3b82f6'
              });
            @endif
          });
        </script>

        <h1 class="text-3xl sm:text-4xl font-extrabold mb-3 text-gray-900 bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-indigo-600">Nouveau ticket de support</h1>
        <p class="text-base text-gray-600 mb-8">Décrivez votre problème en détail pour obtenir une assistance rapide et adaptée.</p>

        @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-800 px-4 py-3 rounded-lg mb-6 shadow-sm" role="alert">
          <strong class="font-semibold">Succès!</strong>
          <span class="block sm:inline">{{ session('success') }}</span>
        </div>
        @endif

        <form class="space-y-6" action="{{ route('tickets.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <!-- Titre -->
          <div>
            <label class="block text-sm font-medium mb-2 text-gray-700" for="title">Titre du ticket *</label>
            <input id="title" name="title" type="text" placeholder="Ex: Problème de connexion à l'application" class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:outline-none focus:ring-0 input-focus text-gray-900 placeholder-gray-400 scale-hover" required />
          </div>

          <!-- Description -->
          <div>
            <label class="block text-sm font-medium mb-2 text-gray-700" for="description">Description détaillée *</label>
            <textarea id="description" name="description" rows="5" placeholder="Décrivez votre problème en détail..." class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:outline-none focus:ring-0 input-focus text-gray-900 placeholder-gray-400 scale-hover"></textarea>
          </div>

          <!-- Priorité et Catégorie -->
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <!-- Priorité -->
            <div>
              <label class="block text-sm font-medium mb-2 text-gray-700">Priorité</label>
              <div class="space-y-3">
                <label class="flex items-center space-x-3 cursor-pointer scale-hover">
                  <input type="radio" name="priority" value="basse" class="w-5 h-5 accent-green-500" required />
                  <span class="text-sm text-gray-600">🟢 Basse</span>
                </label>
                <label class="flex items-center space-x-3 cursor-pointer scale-hover">
                  <input type="radio" name="priority" value="moyenne" class="w-5 h-5 accent-yellow-500" />
                  <span class="text-sm text-gray-600">🟠 Moyenne</span>
                </label>
                <label class="flex items-center space-x-3 cursor-pointer scale-hover">
                  <input type="radio" name="priority" value="haute" class="w-5 h-5 accent-red-500" />
                  <span class="text-sm text-gray-600">🔴 Haute</span>
                </label>
              </div>
            </div>

            <!-- Catégorie -->
            <div>
              <label class="block text-sm font-medium mb-2 text-gray-700">Catégorie</label>
              <select name="categorie_id" class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:outline-none focus:ring-0 input-focus text-gray-900 scale-hover" required>
                <option disabled selected value="">Sélectionnez une catégorie</option>
                @foreach($categories as $categorie)
                <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                @endforeach
              </select>
            </div>
          </div>

          <!-- Fichier -->
          <div>
            <label class="block text-sm font-medium mb-2 text-gray-700">Pièces jointes</label>
            <div class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center bg-gray-50 hover:bg-gray-100 transition scale-hover" id="drop-area">
              <input type="file" name="fichier" class="hidden" id="file-upload" onchange="updateFileLabel(this)" />
              <label for="file-upload" class="cursor-pointer text-blue-600 hover:text-blue-700 font-medium text-base">
                <svg class="w-8 h-8 mx-auto mb-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V8m0 0l-4 4m4-4l4 4m6-4v12m-4-2l4-4m-4 4l-4-4"></path>
                </svg>
                Glissez vos fichiers ici ou <span class="underline">parcourir</span>
              </label>
              <p class="text-xs text-gray-500 mt-2">PNG, JPG, PDF jusqu'à 10MB</p>
              <div id="selected-file" class="mt-3 text-sm text-gray-600"></div>
            </div>
          </div>

          <!-- Boutons -->
          <div class="flex flex-col sm:flex-row justify-between items-center mt-8 gap-4">
            <a href="{{ route('user.myticket') }}" class="text-sm text-gray-600 hover:text-blue-600 font-medium transition order-2 sm:order-1">← Retour</a>
            <button type="submit" class="w-full sm:w-auto bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white px-6 py-3 rounded-lg flex items-center justify-center gap-2 font-medium shadow-lg transition transform hover:scale-105 order-1 sm:order-2">
              📤 Envoyer le ticket
            </button>
          </div>
        </form>
      </div>
    </main>
  </div>

  <!-- Scripts -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const menuButton = document.querySelector('button.md\\:hidden');
      const sidebar = document.querySelector('aside');
      
      if (menuButton && sidebar) {
        menuButton.addEventListener('click', function() {
          sidebar.classList.toggle('hidden');
          sidebar.classList.toggle('block');
        });
      }
    });

    // Afficher le nom du fichier sélectionné
    document.getElementById('file-upload').addEventListener('change', function(e) {
      const fileName = e.target.files[0] ? e.target.files[0].name : 'Aucun fichier sélectionné';
      document.getElementById('selected-file').textContent = fileName;
    });

    document.addEventListener('DOMContentLoaded', function() {
      @if(session('error') && session('show_premium'))
        Swal.fire({
          icon: 'error',
          title: 'Limite de tickets atteinte',
          text: '{{ session('error') }}',
          showCancelButton: true,
          confirmButtonColor: '#3b82f6',
          cancelButtonColor: '#6b7280',
          confirmButtonText: 'Passer en Premium',
          cancelButtonText: 'Rester en mode gratuit',
          reverseButtons: true
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = "{{ route('payment.premium') }}";
          }
        });
      @elseif(session('error'))
        Swal.fire({
          icon: 'error',
          title: 'Erreur',
          text: '{{ session('error') }}'
        });
      @endif
    });
  </script>
</body>
</html>