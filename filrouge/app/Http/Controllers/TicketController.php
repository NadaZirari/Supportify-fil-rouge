<?php

namespace App\Http\Controllers;
use App\Models\Ticket;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tickets = Ticket::all();
        return view('tickets.index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Soumettre_ticket');
    }

    /**
     * Store a newly created resource in storage.
     */
    
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required',
            'priority' => 'required|in:basse,moyenne,haute',
        ]);
        Ticket::create([
            'title' => $request->title,
            'description' => $request->description,
            'priority' => $request->priority,
            'user_id' => auth()->id(),
        ]);
    
        return redirect()->route('tickets.index')->with('success', 'Ticket soumis avec succès');
    }

    /**
     * Display the specified resource.
     */
    
        public function show($id)
    {
        $ticket = Ticket::findOrFail($id);

        // Vérifier user  est le propriétaire du ticket ou un agent
        if ($ticket->user_id !== Auth::id() && !Auth::user()->hasRole('support')) {
            abort(403, 'Non autorisé');        

        }

        return view('tickets.show', compact('ticket'));
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $oldStatus = $ticket->status;

            $ticket = Ticket::findOrFail($id);
    
          
            if (!Auth::user()->hasRole('support')) {
                abort(403, 'Non autorisé');
                        }
         $oldStatus = $ticket->status;
            $ticket->update($request->only('status', 'priority'));
    
       
if ($oldStatus !== $request->status) {
    TicketHistory::create([
        'ticket_id' => $ticket->id,
        'user_id' => auth()->id(),
        'old_status' => $oldStatus,
        'new_status' => $request->status,
    ]);
       }
return redirect()->route('tickets.show', $ticket)->with('success', 'Ticket mis à jour');
    }

    /**
     * Remove the specified resource from storage.
     */
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
    if (!Auth::user()->hasRole('support')) {
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
