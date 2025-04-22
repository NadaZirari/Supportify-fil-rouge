@extends('admin.layout')

@section('content')
<div class="p-6 flex-1 overflow-auto">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold">Modifier le ticket</h1>
        <a href="{{ route('tickets.index') }}" class="text-blue-500">Retour à la liste</a>
    </div>

    <div class="bg-gray-800 rounded-lg p-6">
        <form action="{{ route('tickets.update', $ticket->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="mb-4">
                <label for="title" class="block text-gray-400 mb-2">Titre</label>
                <input type="text" id="title" name="title" class="w-full bg-gray-700 text-white rounded-md p-2" value="{{ old('title', $ticket->title) }}" required>
                @error('title')
                    <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-400 mb-2">Description</label>
                <textarea id="description" name="description" rows="4" class="w-full bg-gray-700 text-white rounded-md p-2" required>{{ old('description', $ticket->description) }}</textarea>
                @error('description')
                    <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="priority" class="block text-gray-400 mb-2">Priorité</label>
                <select id="priority" name="priority" class="w-full bg-gray-700 text-white rounded-md p-2">
                    <option value="basse" {{ old('priority', $ticket->priority) == 'basse' ? 'selected' : '' }}>Basse</option>
                    <option value="moyenne" {{ old('priority', $ticket->priority) == 'moyenne' ? 'selected' : '' }}>Moyenne</option>
                    <option value="haute" {{ old('priority', $ticket->priority) == 'haute' ? 'selected' : '' }}>Haute</option>
                </select>
                @error('priority')
                    <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="categorie_id" class="block text-gray-400 mb-2">Catégorie</label>
                <select id="categorie_id" name="categorie_id" class="w-full bg-gray-700 text-white rounded-md p-2">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('categorie_id', $ticket->categorie_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->nom }}
                        </option>
                    @endforeach
                </select>
                @error('categorie_id')
                    <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="status" class="block text-gray-400 mb-2">Statut</label>
                <select id="status" name="status" class="w-full bg-gray-700 text-white rounded-md p-2">
                    <option value="ouvert" {{ old('status', $ticket->status) == 'ouvert' ? 'selected' : '' }}>Ouvert</option>
                    <option value="en_cours" {{ old('status', $ticket->status) == 'en_cours' ? 'selected' : '' }}>En cours</option>
                    <option value="résolu" {{ old('status', $ticket->status) == 'résolu' ? 'selected' : '' }}>Résolu</option>
                </select>
                @error('status')
                    <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="fichier" class="block text-gray-400 mb-2">Fichier (optionnel)</label>
                <input type="file" id="fichier" name="fichier" class="w-full bg-gray-700 text-white rounded-md p-2">
                @if($ticket->fichier)
                    <p class="text-gray-400 mt-1">Fichier actuel : {{ basename($ticket->fichier) }}</p>
                @endif
                @error('fichier')
                    <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md">Mettre à jour le ticket</button>
        </form>
    </div>
</div>
@endsection
