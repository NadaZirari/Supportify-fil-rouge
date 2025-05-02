<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Nouveau ticket de support</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body class="bg-[#0f172a] text-white font-sans min-h-screen flex flex-col">

  <!-- Barre de navigation horizontale -->
 
  <!-- Contenu principal -->
  <div class="flex flex-col md:flex-row flex-1">

    <!-- Menu latéral - caché sur mobile, visible sur tablette/desktop -->
     @include('partials.sidebaruser')

    <!-- Formulaire -->
    <main class="flex-1 p-4 sm:p-6 md:p-10">
      <h1 class="text-xl sm:text-2xl font-bold mb-2">Nouveau ticket de support</h1>
      <p class="text-xs sm:text-sm text-gray-400 mb-4 sm:mb-8">Décrivez votre problème en détail pour obtenir l'aide la plus adaptée</p>

     

@if(session('success'))
<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
        <strong class="font-bold">Succès!</strong>
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
@endif

      <form class="space-y-4 sm:space-y-6 max-w-2xl" action="{{ route('tickets.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
        <!-- Titre -->
        <div>
          <label class="block text-sm font-medium mb-1" for="title">Titre du ticket *</label>
          <input id="title" name="title" type="text" placeholder="Ex: Problème de connexion à l'application" class="w-full px-4 py-2 rounded-lg bg-[#1e293b] border border-gray-600 focus:outline-none focus:ring-2 focus:ring-orange-500" required  />
        </div>

        <!-- Description -->
        <div>
          <label class="block text-sm font-medium mb-1" for="description">Description détaillée *</label>
          <textarea id="description"  name="description" rows="5" placeholder="Décrivez votre problème en détail..." class="w-full px-4 py-2 rounded-lg bg-[#1e293b] border border-gray-600 focus:outline-none focus:ring-2 focus:ring-orange-500"></textarea>
        </div>

        <!-- Priorité et Catégorie -->
        <div class="flex flex-col sm:flex-row gap-4 sm:gap-6">
          <!-- Priorité -->
          <div class="flex-1">
          <label class="block text-sm font-medium mb-2">Priorité</label>
      <div class="space-y-2">
        <label class="flex items-center space-x-2">
          <input type="radio" name="priority" value="basse" class="accent-green-500" required />
          <span class="text-sm">🟢 Basse</span>
        </label>
        <label class="flex items-center space-x-2">
          <input type="radio" name="priority" value="moyenne" class="accent-yellow-500" />
          <span class="text-sm">🟠 Moyenne</span>
        </label>
        <label class="flex items-center space-x-2">
          <input type="radio" name="priority" value="haute" class="accent-red-500" />
          <span class="text-sm">🔴 Haute</span>
        </label>
            </div>
          </div>

          <!-- Catégorie -->
          <div class="flex-1">
          <label class="block text-sm font-medium mb-2">Catégorie</label>
            <select name="categorie_id" class="w-full px-4 py-2 rounded-lg bg-[#1e293b] border border-gray-600 focus:outline-none focus:ring-2 focus:ring-orange-500" required>
                <option disabled selected value="">Sélectionnez une catégorie</option>
                @foreach($categories as $categorie)
                    <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                @endforeach
            </select>
          </div>
        </div>

         <!-- Fichier -->
  <div>
    <label class="block text-sm font-medium mb-2">Pièces jointes</label>
    <div class="border border-dashed border-gray-500 rounded-lg p-4 sm:p-6 text-center bg-[#1e293b]" id="drop-area">
      <input type="file" name="fichier" class="hidden" id="file-upload" onchange="updateFileLabel(this)" />
      <label for="file-upload" class="cursor-pointer text-orange-400 hover:underline">
        Glissez vos fichiers ici ou <span class="underline">parcourir</span>
      </label>
      <p class="text-xs text-gray-400 mt-1">PNG, JPG, PDF jusqu'à 10MB</p>
      <div id="selected-file" class="mt-2 text-sm text-white"></div>
    </div>
  </div>

       <!-- Boutons -->
  <div class="flex flex-col sm:flex-row justify-between items-center mt-8 gap-4">
    <a href="{{ route('user.myticket') }}" class="text-sm text-gray-400 hover:text-white order-2 sm:order-1">← Retour</a>
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
                confirmButtonColor: '#4f46e5', 
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