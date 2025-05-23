<?php

namespace App\Http\Controllers;
use App\Models\Categorie;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categorie::withCount('tickets')->latest()->paginate(10);
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
        ]);

        Categorie::create([
            'nom' => $request->nom,
        ]);
        return redirect()->route('categories.index')->with('success', 'Catégorie ajoutée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Categorie::findOrFail($id);  // Trouve la catégorie par ID
        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Categorie::findOrFail($id); // Récupère la catégorie par son ID

        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
        ]);

        $category = Categorie::findOrFail($id); // Récupère la catégorie par son ID
        $category->update($request->only('nom'));

        return redirect()->route('categories.index')->with('success', 'Catégorie mise à jour.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Categorie::findOrFail($id); // Récupère la catégorie par son ID

        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Catégorie supprimée.');
    }
}
