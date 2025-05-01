<?php

namespace App\Http\Controllers;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\CategorieController;
use Illuminate\Support\Facades\Hash;

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
        // $users = User::all();

        $activeUsers = User::where('is_active', true)->get();

        $archivedUsers = User::where('is_active', false)->get();

        return view('admin.user_management', compact('activeUsers', 'archivedUsers'));
    }


    public function updateUserRole(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->role_id = $request->input('role_id');
        $user->save();

        return redirect()->route('admin.manageUsers')->with('success', 'Rôle utilisateur mis à jour avec succès!');
    }


    public function archiveToggleUser($id)
{
    $user = User::findOrFail($id);
    $user->is_active = !$user->is_active;
    $user->save();

    $status = $user->is_active ? 'activé' : 'archivé';
    return redirect()->route('admin.manageUsers')->with('success', "L'utilisateur a été $status avec succès!");
}


    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.manageUsers')->with('success', 'Utilisateur supprimé avec succès!');
    }

    public function dashboard()
    {
        // Statistiques des tickets
        $totalTickets = Ticket::count();
        $openTickets = Ticket::where('status', 'ouvert')->count();
        
      
        // Récupérer la catégorie avec le plus de tickets
        $topCategory = DB::table('tickets')
            ->join('categories', 'tickets.categorie_id', '=', 'categories.id')
            ->select('categories.nom as category_name', DB::raw('count(*) as total'))
            ->groupBy('categories.id', 'categories.nom')
            ->orderBy('total', 'desc')
            ->first();
        
        // Top agents performants
        $topAgents = User::where('role_id', 2) // Agents
            ->take(3)
            ->get();
        
        // Tickets récents
        $recentTickets = Ticket::with(['user', 'agent', 'categorie'])
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
        
        return view('dashboard.admin-dashboard', compact(
            'totalTickets', 
            'openTickets', 
            'ticketGrowth',
            'topCategory',
            'topAgents',
            'recentTickets'
        ));
    }

}

