<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
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
        $premiumUsers = User::where('is_premium', true)->count();
      
        // Récupérer la catégorie avec le plus de tickets
        $topCategory = DB::table('tickets')
            ->join('categories', 'tickets.categorie_id', '=', 'categories.id')
            ->select('categories.nom as category_name', DB::raw('count(*) as total'))
            ->groupBy('categories.id', 'categories.nom')
            ->orderBy('total', 'desc')
            ->first();
        
        // Top agents performants
        $topAgents = User::where('role_id', 2) // Agents
            ->take(4)
            ->get();
        
        // Tickets récents
        $recentTickets = Ticket::with(['user', 'agent', 'categorie'])
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
        
        return view('dashboard.admin-dashboard', compact(
            'totalTickets', 
            'openTickets', 
            'topCategory',
            'topAgents',
            'premiumUsers',
            'recentTickets'
        ));
    }



    public function rapport(Request $request)
    {
        // Récupérer la période sélectionnée (par défaut: mois)
        $period = $request->query('period', 'month');
        
        // Récupérer les statistiques pour les tickets
        $totalTickets = Ticket::count();
        $openTickets = Ticket::where('status', 'ouvert')->count();
        $premiumUsers = User::where('is_premium', true)->count();
        
       
        
        // Compter les tickets par statut
        $statusCounts = [
            'ouvert' => Ticket::where('status', 'ouvert')->count(),
            'en cours' => Ticket::where('status', 'en cours')->count(),
            'fermé' => Ticket::where('status', 'fermé')->count(),
        ];
        
        // Compter les tickets par priorité
        $priorityCounts = [
            'basse' => Ticket::where('priority', 'basse')->count(),
            'moyenne' => Ticket::where('priority', 'moyenne')->count(),
            'haute' => Ticket::where('priority', 'haute')->count(),
        ];
        
        // Données pour le graphique de tendance
        $trendLabels = [];
        $trendData = [];
        
        // Ajuster la période pour le graphique de tendance
        switch ($period) {
            case 'week':
                // Derniers 7 jours
                for ($i = 6; $i >= 0; $i--) {
                    $date = Carbon::now()->subDays($i);
                    $trendLabels[] = $date->format('D');
                    
                    $count = Ticket::whereDate('created_at', $date->toDateString())->count();
                    $trendData[] = $count;
                }
                break;
                
            case 'month':
                // Derniers 30 jours par semaine
                for ($i = 3; $i >= 0; $i--) {
                    $startDate = Carbon::now()->subWeeks($i);
                    $endDate = $i > 0 ? Carbon::now()->subWeeks($i-1)->subDay() : Carbon::now();
                    
                    $trendLabels[] = 'Sem ' . $startDate->weekOfYear;
                    
                    $count = Ticket::whereBetween('created_at', [$startDate, $endDate])->count();
                    $trendData[] = $count;
                }
                break;
                
            case 'year':
                // Derniers 12 mois
                for ($i = 11; $i >= 0; $i--) {
                    $date = Carbon::now()->subMonths($i);
                    $trendLabels[] = $date->format('M');
                    
                    $count = Ticket::whereYear('created_at', $date->year)
                        ->whereMonth('created_at', $date->month)
                        ->count();
                        
                    $trendData[] = $count;
                }
                break;
        }
        
        // Données pour le graphique des catégories
        $categories = DB::table('tickets')
            ->join('categories', 'tickets.categorie_id', '=', 'categories.id')
            ->select('categories.nom as name', DB::raw('count(*) as count'))
            ->groupBy('categories.id', 'categories.nom')
            ->orderBy('count', 'desc')
            ->get();
            
        $categoryLabels = $categories->pluck('name')->toArray();
        $categoryData = $categories->pluck('count')->toArray();
        
        return view('admin.rapport', compact(
            'totalTickets', 
            'openTickets', 
            'premiumUsers',
            'statusCounts',
            'priorityCounts',
            'trendLabels',
            'trendData',
            'categoryLabels',
            'categoryData',
            'period'
        ));
    }


}

