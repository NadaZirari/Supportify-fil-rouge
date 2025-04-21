<!-- resources/views/categories/edit.blade.php -->

<!-- resources/views/categories/create.blade.php -->

@extends('admin.layout')



@section('content')
    <div class="p-6 flex-1 overflow-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-semibold">Modifier la Catégorie</h1>
            <a href="{{ route('categories.index') }}" class="text-blue-500">Retour à la liste</a>
        </div>

        <div class="bg-card rounded-lg p-6">
            <form action="{{ route('categories.update', $category->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="nom" class="text-gray-400">Nom de la Catégorie</label>
                    <input type="text" id="nom" name="nom" class="mt-2 p-3 bg-content text-black rounded-md w-full" value="{{ old('nom', $category->nom) }}" required>
                    @error('nom')
                        <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
    <label for="status" class="text-gray-400">Statut</label>
    <select id="status" name="status" class="mt-2 p-3 bg-content text-white rounded-md w-full">
        <option value="ouvert" {{ old('status', $ticket->status) == 'ouvert' ? 'selected' : '' }}>Ouvert</option>
        <option value="en_cours" {{ old('status', $ticket->status) == 'en_cours' ? 'selected' : '' }}>En cours</option>
        <option value="résolu" {{ old('status', $ticket->status) == 'résolu' ? 'selected' : '' }}>Résolu</option>
    </select>
    @error('status')
        <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
    @enderror
</div>

                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md">Mettre à jour</button>
            </form>
        </div>
    </div>
@endsection
