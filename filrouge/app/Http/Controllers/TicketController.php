<?php

namespace App\Http\Controllers;
use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Models\categorie;
use App\Models\TicketHistory;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CategorieController;


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
        $validated = $request->validate([
            'title' => 'required|string',
            'description' => 'required',
            'priority' => 'required|in:basse,moyenne,haute',
            'categorie_id' => 'required|exists:categories,id',
            'fichier' => 'nullable|file|mimes:jpeg,png,jpg,gif,pdf|max:10240', // 10MB max

        ]);

        $ticketData = [
            'title' => $request->title,
            'description' => $request->description,
            'priority' => $request->priority,
            'status' => 'ouvert',
            'categorie_id' => $request->categorie_id,
            'assigned_to' => null, // Assigné à personne par défaut
            'user_id' => auth()->id(),
        ];
     // Traitement du fichier
     if ($request->hasFile('fichier')) {
        $file = $request->file('fichier');
        $filename = time() . '_' . $file->getClientOriginalName();
        $path = $file->storeAs('ticket-attachments', $filename, 'public');
        $ticketData['fichier'] = $path;
    }
    $ticket = Ticket::create($ticketData);

    \Log::info('Ticket créé avec succès', [
        'ticket_id' => $ticket->id,
        'user_id' => auth()->id(),
        'fichier' => $ticket->fichier ?? 'Aucun fichier'
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
                $ticket->load('messages.user');
  
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
            'status' => 'required|in:ouvert,en cours,résolu,fermé'
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

// Ajouter cette méthode à votre TicketController existant
public function adminIndex()
{
    // Récupérer tous les tickets avec leurs relations
    $tickets = Ticket::with(['user', 'agent', 'categorie'])->latest()->paginate(10);
    
    // Récupérer les catégories pour les filtres
    $categories = Categorie::all();
    
    // Récupérer les agents (utilisateurs avec rôle agent)
    $agents = User::where('role_id', 2)->get(); // Ajustez selon votre structure de rôles

    return view('admin.ticket_management', compact('tickets', 'categories', 'agents'));
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
