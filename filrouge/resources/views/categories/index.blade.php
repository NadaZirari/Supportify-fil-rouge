<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Supportify - Gestion des Catégories</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
                        'low': '#10b981'
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
        <div class="p-6 flex-1 overflow-auto max-w-7xl mx-auto w-full">
            <!-- Header -->
            <div class="flex justify-between items-center mb-8">
                <h1 class="text-3xl font-bold text-bleuciel">Gestion des Catégories</h1>
                <button onclick="openModal('createCategoryModal')" class="bg-bleuciel text-white py-3 px-6 rounded-full shadow-lg border-2 border-bleuciel-light flex items-center space-x-2 font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    <span>Ajouter une Catégorie</span>
                </button>
            </div>

            <!-- Grille de cartes -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                @forelse($categories as $index => $category)
                    <div class="bg-white rounded-2xl   p-6 ">
                        <div class="flex items-center mb-4">
                            <div class="p-3 rounded-lg mr-4 ">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800">{{ $category->nom }}</h3>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm px-4 py-1 rounded-full font-semibold  ">
                                {{ $category->tickets_count ?? 0 }} tickets
                            </span>
                            <div class="flex space-x-4">
                                <button onclick="openEditModal({{ $category->id }}, '{{ addslashes($category->nom) }}')" class="text-bleuciel-light font-semibold flex items-center space-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                   
                                </button>
                                <button onclick="openDeleteModal(document.getElementById('delete-form-{{ $category->id }}'))" class="text-high font-semibold flex items-center space-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5-4h4M7 7h10" />
                                    </svg>
                                   
                                </button>
                                <form id="delete-form-{{ $category->id }}" action="{{ route('categories.destroy', $category->id) }}" method="POST" class="hidden">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="bg-white rounded-2xl p-6 shadow-lg border-2 border-gray-200 col-span-full text-center">
                        <p class="text-gray-600 text-xl font-semibold">Aucune catégorie trouvée</p>
                    </div>
                @endforelse
            </div>

            <!-- Message de succès -->
            @if(session('success'))
                <div class="bg-resolved bg-opacity-10 text-resolved p-4 rounded-xl mb-8 border-2 border-resolved border-opacity-20 font-semibold">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Pagination -->
            <div class="mt-8">
                {{ $categories->links('vendor.pagination.tailwind') }}
            </div>

            <!-- Modal pour ajouter une catégorie -->
            <div id="createCategoryModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
                <div class="bg-white rounded-2xl p-8 w-full max-w-md border-2 border-gray-200 shadow-lg">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold text-bleuciel">Ajouter une Catégorie</h2>
                        <button onclick="closeModal('createCategoryModal')" class="text-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <form action="{{ route('categories.store') }}" method="POST">
                        @csrf
                        <div class="mb-6">
                            <label for="nom_create" class="text-gray-600 font-semibold text-lg">Nom de la Catégorie</label>
                            <input type="text" id="nom_create" name="nom" class="mt-2 p-4 bg-gray-100 text-gray-800 rounded-xl w-full border border-gray-200 focus:ring-2 focus:ring-bleuciel focus:outline-none" value="{{ old('nom') }}" required>
                            @error('nom')
                                <div class="text-high mt-2 text-sm font-medium">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="flex justify-end space-x-4">
                            <button type="button" onclick="closeModal('createCategoryModal')" class="text-gray-600 font-semibold text-lg">Annuler</button>
                            <button type="submit" class="bg-bleuciel text-white py-3 px-6 rounded-xl shadow-lg border-2 border-bleuciel-light font-semibold">Créer</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Modal pour modifier une catégorie -->
            <div id="editCategoryModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
                <div class="bg-white rounded-2xl p-8 w-full max-w-md border-2 border-gray-200 shadow-lg">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold text-bleuciel">Modifier la Catégorie</h2>
                        <button onclick="closeModal('editCategoryModal')" class="text-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <form id="editCategoryForm" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-6">
                            <label for="nom_edit" class="text-gray-600 font-semibold text-lg">Nom de la Catégorie</label>
                            <input type="text" id="nom_edit" name="nom" class="mt-2 p-4 bg-gray-100 text-gray-800 rounded-xl w-full border border-gray-200 focus:ring-2 focus:ring-bleuciel focus:outline-none" required>
                            @error('nom')
                                <div class="text-high mt-2 text-sm font-medium">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="flex justify-end space-x-4">
                            <button type="button" onclick="closeModal('editCategoryModal')" class="text-gray-600 font-semibold text-lg">Annuler</button>
                            <button type="submit" class="bg-bleuciel text-white py-3 px-6 rounded-xl shadow-lg border-2 border-bleuciel-light font-semibold">Mettre à jour</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Modal pour confirmer la suppression -->
            <div id="deleteCategoryModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
                <div class="bg-white rounded-2xl p-8 w-full max-w-md border-2 border-gray-200 shadow-lg">
                    <h2 class="text-2xl font-bold text-bleuciel mb-4">Confirmer la Suppression</h2>
                    <p class="text-gray-600 text-lg mb-6">Voulez-vous vraiment supprimer cette catégorie ? Cette action est irréversible.</p>
                    <div class="flex justify-end space-x-4">
                        <button onclick="closeModal('deleteCategoryModal')" class="text-gray-600 font-semibold text-lg">Annuler</button>
                        <button onclick="confirmDelete()" class="bg-high text-white py-3 px-6 rounded-xl shadow-lg border-2 border-red-600 font-semibold">Supprimer</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let deleteForm;

        function openModal(modalId) {
            document.getElementById(modalId).classList.remove('hidden');
        }

        function closeModal(modalId) {
            document.getElementById(modalId).classList.add('hidden');
        }

        function openEditModal(id, nom) {
            const form = document.getElementById('editCategoryForm');
            form.action = `{{ url('categories') }}/${id}`;
            document.getElementById('nom_edit').value = nom;
            openModal('editCategoryModal');
        }

        function openDeleteModal(form) {
            deleteForm = form;
            openModal('deleteCategoryModal');
        }

        function confirmDelete() {
            deleteForm.submit();
        }

        // Fermer le modal en cliquant à l'extérieur
        document.querySelectorAll('.fixed').forEach(modal => {
            modal.addEventListener('click', (e) => {
                if (e.target === modal) {
                    closeModal(modal.id);
                }
            });
        });
    </script>
</body>
</html>