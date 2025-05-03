<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Supportify - Gestion des Utilisateurs</title>
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
                        'low': '#10b981',
                        'admin': '#1e40af',
                        'support': '#3b82f6',
                        'user': '#10b981',
                        'active': '#10b981',
                        'inactive': '#6b7280'
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
                <h1 class="text-3xl font-bold text-bleuciel">Gestion des Utilisateurs</h1>
                
            </div>
            <div class="flex flex-wrap ml-5 gap-4 mb-8">
                <div class=" ml-10 relative">
                <select id="roleFilter" class="bg-white text-gray-800 py-3 pl-4 pr-10 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-bleuciel w-48">
        <option value="All Roles">All Roles</option>
        <option value="Admin">Admin</option>
        <option value="Agents">Agents</option>
        <option value="Users">Users</option>
    </select>
    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-600">
    </div>

                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-600">
                       
                    </div>
                </div>
            <!-- Utilisateurs Actifs -->
            <div class="mb-8">
                <h2 class="text-xl font-semibold text-bleuciel ml-10 mb-4">Utilisateurs Actifs</h2>
                <table class="w-full bg-white ml-10 rounded-2xl ">
                    <thead>
                        <tr class="text-left text-gray-600 border-b border-gray-200">
                            <th class="p-4 font-semibold">Nom</th>
                            <th class="p-4 font-semibold">Email</th>
                            <th class="p-4 font-semibold">Rôle</th>
                            <th class="p-4 font-semibold">Statut</th>
                            <th class="p-4 font-semibold">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($activeUsers as $index => $user)
                        <tr class="border-b border-gray-200 " data-role="{{ $user->role_id == 1 ? 'Admin' : ($user->role_id == 2 ? 'Agents' : 'Users') }}">                            <td class="p-4">
                                <div class="flex items-center">
                                    <div class="h-12 w-12 rounded-full flex items-center justify-center mr-3 text-white font-semibold overflow-hidden {{ $user->role_id == 1 ? 'bg-admin' : ($user->role_id == 2 ? 'bg-support' : 'bg-user') }}">
                                        @if($user->photo)
                                            <img src="{{ asset('storage/' . $user->photo) }}" alt="{{ $user->name }}" class="h-full w-full object-cover">
                                        @else
                                            {{ strtoupper(substr($user->name, 0, 1)) }}{{ strtoupper(substr($user->name, strpos($user->name, ' ') + 1, 1)) }}
                                        @endif
                                    </div>
                                    <span class="text-gray-800">{{ $user->name }}</span>
                                </div>
                            </td>
                            <td class="p-4 text-gray-600">{{ $user->email }}</td>
                            <td class="p-4">
                                <span class="text-sm px-4 py-1 rounded-full font-semibold ">
                                    {{ $user->role_id == 1 ? 'Admin' : ($user->role_id == 2 ? 'Support' : 'Utilisateur') }}
                                </span>
                            </td>
                            <td class="p-4">
                                <span class="bg-active bg-opacity-20 text-active text-sm px-4 py-1 rounded-full font-semibold border border-active">Actif</span>
                            </td>
                            <td class="p-4">
                                <div class="flex space-x-4">
                                    <button onclick="openRoleModal({{ $user->id }})" class="text-bleuciel-light font-semibold flex items-center space-x-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                        <span>Éditer</span>
                                    </button>
                                    <button onclick="openArchiveModal(document.getElementById('archive-form-{{ $user->id }}'))" class="text-high font-semibold flex items-center space-x-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                                        </svg>
                                        <span>Archiver</span>
                                    </button>
                                    <form id="archive-form-{{ $user->id }}" method="POST" action="{{ route('admin.archiveToggleUser', $user->id) }}" class="hidden">
                                        @csrf
                                    </form>
                                    <button onclick="openDeleteModal(document.getElementById('delete-form-{{ $user->id }}'))" class="text-high font-semibold flex items-center space-x-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                        <span>Supprimer</span>
                                    </button>
                                    <form id="delete-form-{{ $user->id }}" action="{{ route('admin.deleteUser', $user->id) }}" method="POST" class="hidden">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Utilisateurs Archivés -->
            @if(count($archivedUsers) > 0)
            <div class="mb-8">
                <h2 class="text-xl font-semibold ml-10 text-bleuciel mb-4">Utilisateurs Archivés</h2>
                <table class="w-full ml-10 bg-white rounded-2xl">
                    <thead>
                    <tr class="border-b border-gray-200 " {{ $index % 3 === 0 ? 'bg-gradient-to-br from-bleuciel/10 to-white' : ($index % 3 === 1 ? 'bg-gradient-to-br from-inprogress/10 to-white' : 'bg-gradient-to-br from-resolved/10 to-white') }}">        
                                           <th class="p-4 font-semibold">Email</th>
                            <th class="p-4 font-semibold">Rôle</th>
                            <th class="p-4 font-semibold">Statut</th>
                            <th class="p-4 font-semibold">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($archivedUsers as $index => $user)
                        <tr class="border-b border-gray-200 {{ $index % 3 === 0 ? 'bg-gradient-to-br from-bleuciel/10 to-white' : ($index % 3 === 1 ? 'bg-gradient-to-br from-inprogress/10 to-white' : 'bg-gradient-to-br from-resolved/10 to-white') }}">
                            <td class="p-4">
                                <div class="flex items-center">
                                    <div class="h-12 w-12 rounded-full flex items-center justify-center mr-3 text-white font-semibold opacity-50 {{ $user->role_id == 1 ? 'bg-admin' : ($user->role_id == 2 ? 'bg-support' : 'bg-user') }}">
                                        {{ strtoupper(substr($user->name, 0, 1)) }}{{ strtoupper(substr($user->name, strpos($user->name, ' ') + 1, 1)) }}
                                    </div>
                                    <span class="text-gray-600">{{ $user->name }}</span>
                                </div>
                            </td>
                            <td class="p-4 text-gray-600">{{ $user->email }}</td>
                            <td class="p-4">
                                <span class="text-sm px-4 py-1 rounded-full font-semibold opacity-50 {{ $index % 3 === 0 ? 'bg-medium bg-opacity-20 text-medium border border-medium' : ($index % 3 === 1 ? 'bg-low bg-opacity-20 text-low border border-low' : 'bg-inprogress bg-opacity-20 text-inprogress border border-inprogress') }}">
                                    {{ $user->role_id == 1 ? 'Admin' : ($user->role_id == 2 ? 'Support' : 'Utilisateur') }}
                                </span>
                            </td>
                            <td class="p-4">
                                <span class="bg-inactive bg-opacity-20 text-inactive text-sm px-4 py-1 rounded-full font-semibold border border-inactive">Archivé</span>
                            </td>
                            <td class="p-4">
                                <div class="flex space-x-4">
                                    <button onclick="openArchiveModal(document.getElementById('archive-form-{{ $user->id }}'))" class="text-bleuciel-light font-semibold flex items-center space-x-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                        </svg>
                                        <span>Réactiver</span>
                                    </button>
                                    <form id="archive-form-{{ $user->id }}" method="POST" action="{{ route('admin.archiveToggleUser', $user->id) }}" class="hidden">
                                        @csrf
                                    </form>
                                    <button onclick="openDeleteModal(document.getElementById('delete-form-{{ $user->id }}'))" class="text-high font-semibold flex items-center space-x-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                        <span>Supprimer</span>
                                    </button>
                                    <form id="delete-form-{{ $user->id }}" action="{{ route('admin.deleteUser', $user->id) }}" method="POST" class="hidden">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif

            <!-- Message de succès -->
            @if(session('success'))
            <div class="bg-resolved bg-opacity-10 text-resolved p-4 rounded-xl mb-8 border-2 border-resolved border-opacity-20 font-semibold">
                {{ session('success') }}
            </div>
            @endif

           
            <!-- Modal pour changer le rôle -->
            <div id="roleModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
                <div class="bg-white rounded-2xl p-8 w-full max-w-md border-2 border-gray-200 shadow-lg">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold text-bleuciel">Changer le Rôle</h2>
                        <button onclick="closeModal('roleModal')" class="text-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <form id="roleForm" method="POST" action="">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="user_id" id="user_id">
                        <div class="mb-6">
                            <label for="role_id" class="text-gray-600 font-semibold text-lg">Sélectionner un Rôle</label>
                            <select id="role_id" name="role_id" class="mt-2 p-4 bg-gray-100 text-gray-800 rounded-xl w-full border border-gray-200 focus:ring-2 focus:ring-bleuciel focus:outline-none">
                                <option value="2">Support</option>
                                <option value="3">Utilisateur</option>
                            </select>
                        </div>
                        <div class="flex justify-end space-x-4">
                            <button type="button" onclick="closeModal('roleModal')" class="text-gray-600 font-semibold text-lg">Annuler</button>
                            <button type="submit" class="bg-bleuciel text-white py-3 px-6 rounded-xl shadow-lg border-2 border-bleuciel-light font-semibold">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Modal pour confirmer l'archivage -->
            <div id="archiveModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
                <div class="bg-white rounded-2xl p-8 w-full max-w-md border-2 border-gray-200 shadow-lg">
                    <h2 class="text-2xl font-bold text-bleuciel mb-4">Confirmer l'Archivage/desarchivaage</h2>
                    <p class="text-gray-600 text-lg mb-6">Voulez-vous vraiment archiver/réactiver cet utilisateur ?</p>
                    <div class="flex justify-end space-x-4">
                        <button onclick="closeModal('archiveModal')" class="text-gray-600 font-semibold text-lg">Annuler</button>
                        <button onclick="confirmArchive()" class="bg-high text-white py-3 px-6 rounded-xl shadow-lg border-2 border-red-600 font-semibold">Confirmer</button>
                    </div>
                </div>
            </div>

            <!-- Modal pour confirmer la suppression -->
            <div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
                <div class="bg-white rounded-2xl p-8 w-full max-w-md border-2 border-gray-200 shadow-lg">
                    <h2 class="text-2xl font-bold text-bleuciel mb-4">Confirmer la Suppression</h2>
                    <p class="text-gray-600 text-lg mb-6">Voulez-vous vraiment supprimer cet utilisateur ? Cette action est irréversible.</p>
                    <div class="flex justify-end space-x-4">
                        <button onclick="closeModal('deleteModal')" class="text-gray-600 font-semibold text-lg">Annuler</button>
                        <button onclick="confirmDelete()" class="bg-high text-white py-3 px-6 rounded-xl shadow-lg border-2 border-red-600 font-semibold">Supprimer</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let archiveForm;
        let deleteForm;

        function openModal(modalId) {
            document.getElementById(modalId).classList.remove('hidden');
        }

        function closeModal(modalId) {
            document.getElementById(modalId).classList.add('hidden');
        }

        function openRoleModal(userId) {
            document.getElementById('user_id').value = userId;
            document.getElementById('roleForm').action = `/admin/users/${userId}/role`;
            openModal('roleModal');
        }

        function openArchiveModal(form) {
            archiveForm = form;
            openModal('archiveModal');
        }

        function confirmArchive() {
            archiveForm.submit();
        }

        function openDeleteModal(form) {
            deleteForm = form;
            openModal('deleteModal');
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





        document.addEventListener('DOMContentLoaded', function() {
    const roleFilter = document.getElementById('roleFilter');
    if (roleFilter) {
        roleFilter.addEventListener('change', function() {
            const selectedRole = this.value;
            document.querySelectorAll('tbody tr[data-role]').forEach(row => {
                row.style.display = selectedRole === 'All Roles' || row.getAttribute('data-role') === selectedRole ? '' : 'none';
            });
        });
    }
});

    </script>
</body>
</html>