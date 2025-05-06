<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage; 
use Illuminate\Http\Request;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        
        \Log::info('Utilisateur connecté: ID=' . $user->id . ', Role=' . $user->role);
        
        if ($user->role === 'agent') {
            // Pour un agent, récupérer les 3 derniers tickets qui lui sont assignés
            $tickets = Ticket::where('agent_id', $user->id)
                            ->with('user')
                            ->orderBy('created_at', 'desc')
                            ->take(3)
                            ->get();
                            
            // Vérifier si des tickets ont été trouvés
            if ($tickets->isEmpty()) {
                \Log::info('Aucun ticket trouvé pour l\'agent ID: ' . $user->id);
            } else {
                \Log::info('Tickets trouvés pour l\'agent ID: ' . $user->id . ', Nombre: ' . $tickets->count());
                \Log::info('Tickets: ' . $tickets->toJson());
            }
        } else {
            // Pour un utilisateur normal, récupérer ses 3 derniers tickets
            $tickets = Ticket::where('user_id', $user->id)
                            ->orderBy('created_at', 'desc')
                            ->take(3)
                            ->get();
                            
            if ($tickets->isEmpty()) {
                \Log::info('Aucun ticket trouvé pour l\'utilisateur ID: ' . $user->id);
            } else {
                \Log::info('Tickets trouvés pour l\'utilisateur ID: ' . $user->id . ', Nombre: ' . $tickets->count());
            }
        }
        return view('user.profil', compact('user', 'tickets'));
    }
    public function update(Request $request)
    {
        $user = Auth::user();
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
           
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
