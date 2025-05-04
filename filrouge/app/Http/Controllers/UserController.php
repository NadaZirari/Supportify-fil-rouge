<?php

namespace App\Http\Controllers;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function upgrade()
    {
        $user = auth()->user();
        $user->is_premium = true;
        $user->save();
    
        return redirect()->back()->with('success', 'Vous êtes maintenant Premium !');
    }
    public function dashboard()
    {
        $user = Auth::user();
        
        // Récupérer les statistiques des tickets
        $totalTickets = Ticket::where('user_id', $user->id)->count();
        $openTickets = Ticket::where('user_id', $user->id)
                            ->where('status', 'Ouvert')
                            ->count();
        $pendingTickets = Ticket::where('user_id', $user->id)
                               ->where('status', 'En attente')
                               ->count();
        $resolvedTickets = Ticket::where('user_id', $user->id)
                                ->where('status', 'Résolu')
                                ->count();
        $ticketsByWeek = Ticket::selectRaw('WEEK(created_at) as week, COUNT(*) as count')
                                ->where('user_id', $user->id)
                                ->where('created_at', '>=', now()->subWeeks(5))
                                ->groupBy('week')
                                ->orderBy('week')
                                ->get();
        
        // Formater les données pour le graphique
        $weeks = [];
        $ticketCounts = [];
        
        foreach ($ticketsByWeek as $data) {
            $weeks[] = 'Sem ' . $data->week;
            $ticketCounts[] = $data->count;
        }
        
        // Si aucun, add  this  par défaut
        if (empty($weeks)) {
            $weeks = ['Sem 1', 'Sem 2', 'Sem 3', 'Sem 4', 'Sem 5'];
            $ticketCounts = [0, 0, 0, 0, 0];
        }
        
        return view('user.dashboardUser', compact(
            'user', 
            'totalTickets', 
            'openTickets', 
            'pendingTickets', 
            'resolvedTickets',
            'weeks',
            'ticketCounts'
        ));
    } 
    
}
