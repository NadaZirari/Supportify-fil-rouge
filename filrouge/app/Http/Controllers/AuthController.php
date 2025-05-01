<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Role;
class AuthController extends Controller
{
    public function showAuthForm()
    {
        return view('auth.login');
    }
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|string|exists:roles,nom',
        ]);
    
        try {
            $role = Role::where('nom', $validated['role'])->first();
    
            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'role_id' => $role->id,
            ]);
    
            \Log::info('Utilisateur créé avec succès: ', ['id' => $user->id, 'email' => $user->email]);
    
            return redirect()->route('auth.form')->with('sweet_alert', [
                'type' => 'success',
                'title' => 'Inscription réussie',
                'text' => 'Vous pouvez maintenant vous connecter.'
            ]);
        } catch (\Exception $e) {
            \Log::error('Erreur lors de la création de l\'utilisateur: ' . $e->getMessage());
            return back()->with('sweet_alert', [
                'type' => 'error',
                'title' => 'Erreur',
                'text' => 'Une erreur est survenue lors de l\'inscription.'
            ])->withInput();
        }
    }
    
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        // Vérifier si l'utilisateur existe et est actif
        $user = User::where('email', $credentials['email'])->first();
        if ($user && !$user->is_active) {
            return back()->with('sweet_alert', [
                'type' => 'error',
                'title' => 'Compte désactivé',
                'text' => 'Votre compte a été désactivé. Veuillez contacter l\'administrateur.'
            ])->withInput($request->except('password'));
        }
    
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();
            $roleName = $user->role->nom; // Assurez-vous que la relation 'role' est définie dans le modèle User
    
            if ($roleName === 'Admin') {
                return redirect()->route('dashboard.admin-dashboard');
            } elseif ($roleName === 'Agent') {
                return redirect()->route('agent.dashboard');
            } elseif ($roleName === 'User') {
                return redirect()->route('user.dashboard');
            }
    
            return redirect()->route('home');
        }
    
        return back()->with('sweet_alert', [
            'type' => 'error',
            'title' => 'Échec de la connexion',
            'text' => 'Les identifiants fournis ne correspondent pas à nos enregistrements.'
        ])->withInput($request->except('password'));
    }




    public function logout(Request $request)
    {
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('login');
    }
}
