<?php

namespace App\Http\Controllers;

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
    
}
