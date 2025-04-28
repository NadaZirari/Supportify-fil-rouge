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
        
        return view('user.profil', compact('user', 'tickets'));
    }
    public function update(Request $request)
    {
        $user = Auth::user();
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'phone' => 'nullable|string|max:20',
            'company' => 'nullable|string|max:255',
        ]);
        
        $user->update($validated);
        
        return redirect()->route('profile.show')->with('success', 'Profil mis à jour avec succès');
    }

    public function updatePhoto(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        $user = Auth::user();
        
        // Delete old photo if exists
        if ($user->photo && Storage::disk('public')->exists($user->photo)) {
            Storage::disk('public')->delete($user->photo);
        }
        
        // Store the new photo
        $photoPath = $request->file('photo')->store('profile-photos', 'public');
        
        // Update user record
        $user->update([
            'photo' => $photoPath
        ]);
        
        return redirect()->route('profile.show')->with('success', 'Photo de profil mise à jour avec succès');
    }



}
