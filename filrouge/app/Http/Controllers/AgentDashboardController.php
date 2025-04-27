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
        $agent_id = auth()->id();
        
        // Récupérer les tickets ouverts assignés à l'agent
        $openTicketsCount = Ticket::where('assigned_to', $agent_id)
            ->whereIn('status', ['ouvert', 'en_cours'])
            ->count();
            
        // Récupérer les tickets résolus par l'agent
        $resolvedTicketsCount = Ticket::where('assigned_to', $agent_id)
            ->where('status', 'resolu')
            ->count();
            
        // Calculer le pourcentage d'augmentation des tickets ouverts par rapport à la semaine dernière
        $lastWeekOpenTickets = Ticket::where('assigned_to', $agent_id)
            ->whereIn('status', ['ouvert', 'en_cours'])
            ->where('created_at', '<=', Carbon::now()->subWeek())
            ->count();
            
        $openTicketsPercentage = $lastWeekOpenTickets > 0 
            ? round((($openTicketsCount - $lastWeekOpenTickets) / $lastWeekOpenTickets) * 100) 
            : 0;
            
        // Calculer le pourcentage d'augmentation des tickets résolus par rapport à la semaine dernière
        $lastWeekResolvedTickets = Ticket::where('assigned_to', $agent_id)
            ->where('status', 'resolu')
            ->where('updated_at', '<=', Carbon::now()->subWeek())
            ->count();
            
        $resolvedTicketsPercentage = $lastWeekResolvedTickets > 0 
            ? round((($resolvedTicketsCount - $lastWeekResolvedTickets) / $lastWeekResolvedTickets) * 100) 
            : 0;
            
        // Calculer le temps de réponse moyen (en heures)
        $averageResponseTime = 1.8; // Valeur par défaut
        $responseTimeChange = -4; // Valeur par défaut
        
        // Taux de satisfaction client (exemple)
        $satisfactionRate = 94; // Valeur par défaut
        $satisfactionChange = 2; // Valeur par défaut
        
        // Récupérer les tickets récents
        $recentTickets = Ticket::where('assigned_to', $agent_id)
            ->with('user')
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();
            
        return view('dashboard.dashboardAgent', compact(
            'openTicketsCount',
            'resolvedTicketsCount',
            'openTicketsPercentage',
            'resolvedTicketsPercentage',
            'averageResponseTime',
            'responseTimeChange',
            'satisfactionRate',
            'satisfactionChange',
            'recentTickets'
        ));
    }
}
