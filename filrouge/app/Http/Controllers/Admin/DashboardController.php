<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return response()->json([
            'total_tickets' => Ticket::count(),
            'open_tickets' => Ticket::where('status', 'ouvert')->count(),
            'in_progress_tickets' => Ticket::where('status', 'en cours')->count(),
            'resolved_tickets' => Ticket::where('status', 'résolu')->count(),
            'average_response_time' => Ticket::avg('response_time'), // À calculer selon ton modèle
        ]);
    }
}
