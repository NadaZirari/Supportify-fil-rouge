<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        $tickets = $user->tickets()->latest()->get();
        
        return view('profil', compact('user', 'tickets'));
    }
}
