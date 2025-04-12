<?php

namespace App\Http\Controllers\API;
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

}
