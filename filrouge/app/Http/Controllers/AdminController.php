<?php

namespace App\Http\Controllers;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function manageTickets()
    {
        // Récupère tous les tickets
        $tickets = Ticket::all(); // ou utilise des filtres selon tes besoins

        return view('admin.manage-tickets', compact('tickets'));
    }
    public function validateTicket($id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->status = 'resolved'; // Met le ticket à l'état "résolu"
        $ticket->save();

        // Redirection après mise à jour
        return redirect()->route('admin.manageTickets')->with('success', 'Ticket validé avec succès!');
    }
    public function archiveTicket($id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->status = 'archived'; // Change l'état à "archivé"
        $ticket->save();

        // Redirection après archivage
        return redirect()->route('admin.manageTickets')->with('success', 'Ticket archivé avec succès!');
    }

    public function manageUsers()
    {
        // Récupère tous les utilisateurs
        $users = User::all();

        return view('admin.manage-users', compact('users'));
    }


    public function updateUserRole(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->role_id = $request->input('role_id');
        $user->save();

        return redirect()->route('admin.manageUsers')->with('success', 'Rôle utilisateur mis à jour avec succès!');
    }
    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.manageUsers')->with('success', 'Utilisateur supprimé avec succès!');
    }
}

