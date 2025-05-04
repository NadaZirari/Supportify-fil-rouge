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
        $userId = $user->id;
        // Récupérer les statistiques des tickets
        $totalTickets = Ticket::where('user_id', $user->id)->count();
        $openTickets = Ticket::where('user_id', $user->id)
                            ->where('status', 'ouvert')
                            ->count();
        $pendingTickets = Ticket::where('user_id', $user->id)
                               ->where('status', 'en_cours')
                               ->count();
        $resolvedTickets = Ticket::where('user_id', $user->id)
                                ->where('status', 'résolu')
                                ->count();
                                $startDate = now()->subDays(13)->startOfDay();
                                $endDate = now()->endOfDay();
                                
                                $dailyTickets = Ticket::where('user_id', $userId)
                                    ->whereBetween('created_at', [$startDate, $endDate])
                                    ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as count'))
                                    ->groupBy('date')
                                    ->orderBy('date')
                                    ->get();
                                
                                // Create arrays for chart data
                                $days = [];
                                $ticketCounts = [];
                                
                                // Fill in all days in the range
                                for ($date = clone $startDate; $date <= $endDate; $date->addDay()) {
                                    $formattedDate = $date->format('Y-m-d');
                                    $days[] = $date->format('d M'); // Format as "01 Jan"
                                    
                                    // Find if we have tickets for this day
                                    $dayData = $dailyTickets->firstWhere('date', $formattedDate);
                                    $ticketCounts[] = $dayData ? $dayData->count : 0;
                                }
                                
                                return view('user.dashboardUser', compact(
                                    'totalTickets', 
                                    'openTickets', 
                                    'pendingTickets', 
                                    'resolvedTickets',
                                    'days',
                                    'ticketCounts'
                                ));
    } 
    
}
