<?php

namespace App\Http\Controllers;
use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Models\categorie;
use App\Models\TicketHistory;
use Illuminate\Support\Facades\Auth;


class TicketController extends Controller
{
    // Affiche la liste des tickets
    public function index()
    {
        $tickets = Ticket::where('user_id', Auth::id())->get();
        return view('user.myticket', compact('tickets'));
    }

    // Formulaire de création

    public function create()
    {
        $categories = Categorie::all();
        return view('user.Soumettre_ticket', compact('categories'));

        
    }

     // Enregistrement d'un nouveau ticket
    
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required',
            'priority' => 'required|in:basse,moyenne,haute',
            'categorie_id' => 'required|exists:categories,id'
        

        ]);
        Ticket::create([
            'title' => $request->title,
            'description' => $request->description,
            'priority' => $request->priority,
            'statut' => 'ouvert',
            'categorie_id' => $request->categorie_id,
            'assigned_to' => null, // Assigné à personne par défaut
            'user_id' => auth()->id(),
        ]);
    
        return redirect()->route('user.myticket')->with('success', 'Ticket soumis avec succès');
    }

       // Afficher un ticket spécifique
    
        public function show(Ticket $ticket)
    {
                // Vérifier que l'utilisateur a le droit de voir ce ticket
                if ($ticket->user_id !== Auth::id() && !Auth::user()->hasRole('Agent') && !Auth::user()->hasRole('Admin')) {
                    abort(403, 'Non autorisé');
                }        
        // $ticket = Ticket::findOrFail($id); 
        return view('ticket.detail', compact('ticket'));    

        }

    // Formulaire d’édition
    public function edit(Ticket $ticket)
    {
        $categories = Categorie::all();
        return view('tickets.edit', compact('ticket', 'categories'));
    }


        // Mettre à jour un ticket

    public function update(Request $request, Ticket $ticke)
    {
        
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required',
            'priority' => 'required|in:faible,moyenne,élevée',
            'categorie_id' => 'required|exists:categories,id',
            'statut' => 'required|in:ouvert,en cours,résolu,fermé'
        ]);

        $ticket->update($request->all());

        return redirect()->route('tickets.index')->with('success', 'Ticket mis à jour.');
    }

       // Supprimer un ticket


    public function destroy(string $id)
    {
        $ticket = Ticket::findOrFail($id);

        // Vérifier user est admin 
        if ($ticket->user_id !== Auth::id() && !Auth::user()->hasRole('support')) {
            abort(403, 'Non autorisé');
                }

        $ticket->delete();

        return redirect()->route('tickets.index')->with('success', 'Ticket supprimé');
    }



    public function archiveResolvedTickets()
{
    if (!Auth::user()->hasRole('Agent')) {
        abort(403, 'Non autorisé');
    }
    $tickets = Ticket::where('status', 'résolu')->whereNull('archived_at')->get();

    foreach ($tickets as $ticket) {
        $ticket->archived_at = now();
        $ticket->save();
    }

    return redirect()->route('tickets.index')->with('success', 'Tickets archivés avec succès.');
}
    
}
