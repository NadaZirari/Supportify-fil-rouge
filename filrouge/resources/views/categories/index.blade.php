@extends('admin.layout')

@section('content')
<div class="p-6 flex-1 overflow-auto">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold">Gestion des Catégories</h1>
        <a href="{{ route('categories.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded-md">Ajouter une Catégorie</a>
    </div>

    @if(session('success'))
    <div class="bg-green-500 text-white p-4 rounded-md mb-6">
        {{ session('success') }}
    </div>
    @endif

    <!-- Liste des catégories -->
    <div class="bg-card rounded-lg p-6">
        <table class="w-full">
            <thead>
                <tr class="text-left text-gray-400 border-b border-gray-700">
                    <th class="py-3 px-6 font-medium">Nom</th>
                    <th class="py-3 px-6 font-medium">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $category)
                    <tr class="border-b border-gray-700">
                        <td class="py-4 px-6">{{ $category->nom }}</td>
                        <td class="py-4 px-6">
                            <a href="{{ route('categories.edit', $category->id) }}" class="text-blue-500">Éditer</a>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 ml-4">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @empty

                    <tr>
                        <td colspan="2" class="py-4 px-6 text-center text-gray-400">Aucune catégorie trouvée</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $categories->links() }}
    </div>
</div>
@endsection
