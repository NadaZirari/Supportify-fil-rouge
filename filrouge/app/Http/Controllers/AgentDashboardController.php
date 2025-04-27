<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AgentDashboardController extends Controller
{
    public function index()
    {
       
    }
    public function statistics()
{
    $agent_id = auth()->id(); // ID de l'agent connecté

    $totalTickets = Ticket::where('assigned_to', $agent_id)->count();
    $openTickets = Ticket::where('assigned_to', $agent_id)
                         ->where('status', 'ouvert')
                         ->count();
    $inProgressTickets = Ticket::where('assigned_to', $agent_id)
                                ->where('status', 'en_cours')
                                ->count();
    $resolvedTickets = Ticket::where('assigned_to', $agent_id)
                              ->where('status', 'résolu')
                              ->count();
                                      // Récupérer les tickets récents
        $recentTickets = Ticket::where('assigned_to', $agent_id)
        ->with('user')
        ->orderBy('created_at', 'desc')
        ->take(3)
        ->get();


    return view('dashboard.dashboardAgent', compact(
        'totalTickets',
        'openTickets',
        'inProgressTickets',
        'resolvedTickets',
        'recentTickets'

    ));
}

}
