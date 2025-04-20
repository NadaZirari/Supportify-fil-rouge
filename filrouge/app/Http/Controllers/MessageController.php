<?php

namespace App\Http\Controllers;
use App\Models\Message;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(Ticket $ticket)
    {
        $this->authorizeAccess($ticket);
        return $ticket->messages()->with('user')->orderBy('created_at')->get();
    }


    public function store(Request $request, Ticket $ticket)
    {

        $this->authorizeAccess($ticket);

        // Validation
        $data = $request->validate([
            'content' => 'required|string',
    ]);

      // Création du message
      $message = $ticket->messages()->create([
        'user_id' => Auth::id(),
        'content' => $data['content'],
    ]);
    return redirect()->back()->with('success', 'Message envoyé avec succès');
    }


    private function authorizeAccess(Ticket $ticket)
    {
        $user = Auth::user();
        if ($user->role === 'user' && $ticket->user_id !== $user->id) {
            abort(403, 'Accès non autorisé');
        }
    }
}
