<?php

namespace App\Http\Controllers;

use App\Models\Response;
use App\Models\Ticket;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ResponseController extends Controller
{
    public function index(Ticket $ticket)
    {
        $this->authorizeAccess($ticket);
        return $ticket->responses()->with('user')->orderBy('created_at')->get();
    }

    public function store(Request $request, Ticket $ticket)
    {
        $this->authorizeAccess($ticket);

        // Vérifier que l'utilisateur est un agent ou admin
        $user = Auth::user();
        if (!in_array($user->role_id, [1, 2])) {
            abort(403, 'Seuls les agents et administrateurs peuvent répondre aux tickets');
        }

        // Validation
        $data = $request->validate([
            'content' => 'required|string',
            'message_id' => 'nullable|exists:messages,id'
        ]);

        // Création de la réponse
        $response = $ticket->responses()->create([
            'user_id' => Auth::id(),
            'content' => $data['content'],
            'message_id' => $data['message_id'] ?? null,
        ]);

        return redirect()->back()->with('success', 'Réponse envoyée avec succès');
    }

    private function authorizeAccess(Ticket $ticket)
    {
        $user = Auth::user();
        
        // Les agents ne peuvent répondre qu'aux tickets qui leur sont assignés
        if ($user->role_id == 2 && $ticket->assigned_to!= $user->id) {
            abort(403, 'Vous n\'êtes pas autorisé à répondre à ce ticket');
        }
        // Les utilisateurs ne peuvent voir que leurs propres tickets
        if ($user->role_id == 3 && $ticket->user_id != $user->id) {
            abort(403, 'Accès non autorisé');
        }
    }
}
