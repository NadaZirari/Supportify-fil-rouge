<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Profil Utilisateur - Supportify</title>
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
    <!-- Main Content -->
    <div class="flex-1 flex flex-col overflow-hidden">
        <div class="p-6 flex-1 overflow-auto max-w-6xl mx-auto w-full">
            <!-- Header -->
            <div class="mb-8 flex items-center">
                <a href="{{ route('back.to.dashboard') }}" class="flex items-center text-bleuciel-light font-semibold space-x-2">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    <span>Retour au tableau de bord</span>
                </a>
            </div>

            <!-- Profile Card -->
            <div class="bg-white rounded-2xl bg-bleuciel from-bleuciel/10 to-white mb-8">
                <div class="p-6 flex flex-col md:flex-row items-center md:items-start">
                <div class="relative w-24 h-24 rounded-full overflow-hidden mb-4 md:mb-0 md:mr-6 group">
    @if($user->photo)
        <img src="{{ Storage::url($user->photo) }}" alt="{{ $user->name }}" class="w-full h-full object-cover">
    @else
        <div class="w-full h-full bg-gray-600 flex items-center justify-center text-white text-2xl font-semibold">
            {{ substr($user->name ?? 'U', 0, 1) }}
        </div>
    @endif

    <button 
        type="button" 
        onclick="openModal('photo-upload-modal')" 
        class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300"
    >
        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
        </svg>
    </button>
</div>

                    <div class="flex-1 text-center md:text-left">
                        <h2 class="text-2xl font-bold text-gray-800">{{ $user->name ?? 'Nada ZIRARI' }}</h2>
                        <p class="text-gray-600">{{ $user->email ?? 'NADA@GMAIL.com' }}</p>
                    </div>
                    <button onclick="openModal('edit-profile-modal')" class="mt-4 md:mt-0 bg-bleuciel text-white py-2 px-4 rounded-xl shadow-lg border-2 border-bleuciel-light font-semibold text-sm">
                        Modifier le profil
                    </button>
                </div>
            </div>

            <!-- Personal Information & Notifications -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <!-- Personal Information -->
                <div class="bg-white rounded-2xl shadow-lg border-2 border-gray-200 p-6">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Informations personnelles</h3>
                    <div class="grid grid-cols-1 gap-4">
                        <div>
                            <label class="block text-gray-600 text-sm font-semibold mb-1">Nom</label>
                            <input type="text" value="{{ $user->name ?? 'Nada ZIRARI' }}" class="w-full bg-gray-100 border border-gray-200 rounded-xl px-3 py-2 text-gray-800" readonly>
                        </div>
                        <div>
                            <label class="block text-gray-600 text-sm font-semibold mb-1">Email</label>
                            <input type="email" value="{{ $user->email ?? 'NADA@GMAIL.com' }}" class="w-full bg-gray-100 border border-gray-200 rounded-xl px-3 py-2 text-gray-800" readonly>
                        </div>
                        <div>
                            <label class="block text-gray-600 text-sm font-semibold mb-1">Téléphone</label>
                            <input type="tel" value="{{ $user->phone ?? '+33 6 12 34 56 78' }}" class="w-full bg-gray-100 border border-gray-200 rounded-xl px-3 py-2 text-gray-800" readonly>
                        </div>
                        <div>
                            <label class="block text-gray-600 text-sm font-semibold mb-1">Entreprise</label>
                            <input type="text" value="{{ $user->company ?? 'TechCorp' }}" class="w-full bg-gray-100 border border-gray-200 rounded-xl px-3 py-2 text-gray-800" readonly>
                        </div>
                    </div>
                </div>
                <!-- Notification Preferences -->
                <div class="bg-white rounded-2xl shadow-lg border-2 border-gray-200 p-6">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Préférences de notification</h3>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="font-semibold text-gray-800">Email</p>
                                <p class="text-sm text-gray-600">Notifications par email</p>
                            </div>
                            <div class="relative inline-block w-12 select-none">
                                <input type="checkbox" name="email_notifications" id="email_notifications" checked class="absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer checked:right-0 checked:border-bleuciel"/>
                                <label for="email_notifications" class="block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer checked:bg-bleuciel"></label>
                            </div>
                        </div>
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="font-semibold text-gray-800">Desktop</p>
                                <p class="text-sm text-gray-600">Notifications sur le bureau</p>
                            </div>
                            <div class="relative inline-block w-12 select-none">
                                <input type="checkbox" name="desktop_notifications" id="desktop_notifications" class="absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer checked:right-0 checked:border-bleuciel"/>
                                <label for="desktop_notifications" class="block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer checked:bg-bleuciel"></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Ticket History -->
            <div class="bg-white rounded-2xl shadow-lg border-4 border-inprogress bg-gradient-to-br from-inprogress/10 to-white p-6">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Historique des tickets</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead>
                            <tr class="text-left text-gray-600 border-b border-gray-200">
                                <th class="px-4 py-3 font-semibold">ID</th>
                                <th class="px-4 py-3 font-semibold">Sujet</th>
                                <th class="px-4 py-3 font-semibold">Statut</th>
                                <th class="px-4 py-3 font-semibold">Date</th>
                                <th class="px-4 py-3 font-semibold">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($tickets ?? [] as $index => $ticket)
                                <tr class="border-b border-gray-200 {{ $index % 3 === 0 ? 'bg-gradient-to-br from-bleuciel/10 to-white' : ($index % 3 === 1 ? 'bg-gradient-to-br from-inprogress/10 to-white' : 'bg-gradient-to-br from-resolved/10 to-white') }}">
                                    <td class="px-4 py-3 text-sm text-gray-800">#{{ $ticket->id }}</td>
                                    <td class="px-4 py-3 text-sm text-gray-800">{{ $ticket->subject }}</td>
                                    <td class="px-4 py-3 text-sm">
                                        <span class="text-sm px-4 py-1 rounded-full font-semibold {{ $ticket->status === 'Résolu' ? 'bg-resolved bg-opacity-20 text-resolved border border-resolved' : ($ticket->status === 'En cours' ? 'bg-inprogress bg-opacity-20 text-inprogress border border-inprogress' : 'bg-high bg-opacity-20 text-high border border-high') }}">
                                            {{ $ticket->status }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3 text-sm text-gray-600">{{ $ticket->created_at->format('d/m/Y') }}</td>
                                    <td class="px-4 py-3 text-sm">
                                        <a href="{{ route('tickets.show', $ticket->id) }}" class="text-bleuciel-light font-semibold flex items-center space-x-2">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                            <span>Voir</span>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr class="bg-gradient-to-br from-bleuciel/10 to-white">
                                    <td class="px-4 py-3 text-sm text-gray-800">#1234</td>
                                    <td class="px-4 py-3 text-sm text-gray-800">Problème de connexion</td>
                                    <td class="px-4 py-3 text-sm">
                                        <span class="text-sm px-4 py-1 rounded-full font-semibold bg-resolved bg-opacity-20 text-resolved border border-resolved">Résolu</span>
                                    </td>
                                    <td class="px-4 py-3 text-sm text-gray-600">01/03/2025</td>
                                    <td class="px-4 py-3 text-sm">
                                        <a href="#" class="text-bleuciel-light font-semibold flex items-center space-x-2">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                            <span>Voir</span>
                                        </a>
                                    </td>
                                </tr>
                                <tr class="bg-gradient-to-br from-inprogress/10 to-white">
                                    <td class="px-4 py-3 text-sm text-gray-800">#1235</td>
                                    <td class="px-4 py-3 text-sm text-gray-800">Bug d'affichage</td>
                                    <td class="px-4 py-3 text-sm">
                                        <span class="text-sm px-4 py-1 rounded-full font-semibold bg-inprogress bg-opacity-20 text-inprogress border border-inprogress">En cours</span>
                                    </td>
                                    <td class="px-4 py-3 text-sm text-gray-600">28/02/2025</td>
                                    <td class="px-4 py-3 text-sm">
                                        <a href="#" class="text-bleuciel-light font-semibold flex items-center space-x-2">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                            <span>Voir</span>
                                        </a>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Modal for Photo Upload -->
            <div id="photo-upload-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
                <div class="bg-white rounded-2xl p-8 w-full max-w-md border-2 border-gray-200 shadow-lg">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-2xl font-bold text-bleuciel">Modifier la photo de profil</h3>
                        <button onclick="closeModal('photo-upload-modal')" class="text-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <form action="{{ route('profile.update.photo') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-6">
                            <label class="block text-gray-600 font-semibold text-lg mb-2">Sélectionner une nouvelle photo</label>
                            <input type="file" name="photo" accept="image/*" class="w-full bg-gray-100 border border-gray-200 rounded-xl px-3 py-2 text-gray-800">
                            <p class="text-sm text-gray-600 mt-1">Formats acceptés : JPG, PNG, GIF. Taille max : 2MB</p>
                        </div>
                        <div class="flex justify-end space-x-4">
                            <button type="button" onclick="closeModal('photo-upload-modal')" class="text-gray-600 font-semibold text-lg">Annuler</button>
                            <button type="submit" class="bg-bleuciel text-white py-3 px-6 rounded-xl shadow-lg border-2 border-bleuciel-light font-semibold">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Modal for Editing Profile -->
            <div id="edit-profile-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
                <div class="bg-white rounded-2xl p-8 w-full max-w-md border-2 border-gray-200 shadow-lg">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-2xl font-bold text-bleuciel">Modifier le profil</h3>
                        <!-- <button onclick="closeModal('edit-profile-modal')" class="text-gray-600"> -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <form action="#" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="mb-6">
                            <label for="name" class="block text-gray-600 font-semibold text-lg mb-2">Nom</label>
                            <input type="text" id="name" name="name" value="{{ old('name', $user->name ?? 'Nada ZIRARI') }}" class="w-full bg-gray-100 border border-gray-200 rounded-xl px-3 py-2 text-gray-800 focus:ring-2 focus:ring-bleuciel" required>
                            @error('name')
                                <div class="text-high mt-2 text-sm font-medium">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-6">
                            <label for="phone" class="block text-gray-600 font-semibold text-lg mb-2">Téléphone</label>
                            <input type="tel" id="phone" name="phone" value="{{ old('phone', $user->phone ?? '+33 6 12 34 56 78') }}" class="w-full bg-gray-100 border border-gray-200 rounded-xl px-3 py-2 text-gray-800 focus:ring-2 focus:ring-bleuciel">
                            @error('phone')
                                <div class="text-high mt-2 text-sm font-medium">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="company" class="block text-gray-600 font-semibold text-lg mb-2">Entreprise</label>
                            <input type="text" id="company" name="company" value="{{ old('company', $user->company ?? 'TechCorp') }}" class="w-full bg-gray-100 border border-gray-200 rounded-xl px-3 py-2 text-gray-800 focus:ring-2 focus:ring-bleuciel">
                            @error('company')
                                <div class="text-high mt-2 text-sm font-medium">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="flex justify-end space-x-4">
                            <button type="button" onclick="closeModal('edit-profile-modal')" class="text-gray-600 font-semibold text-lg">Annuler</button>
                            <button type="submit" class="bg-bleuciel text-white py-3 px-6 rounded-xl shadow-lg border-2 border-bleuciel-light font-semibold">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openModal(modalId) {
            document.getElementById(modalId).classList.remove('hidden');
        }

        function closeModal(modalId) {
            document.getElementById(modalId).classList.add('hidden');
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