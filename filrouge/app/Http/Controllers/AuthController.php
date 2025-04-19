<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Role;
class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }
    public function register(Request $request)
    {
        // Validation des données d'entrée
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|string|in:User,Admin,Agent',
        ]);
    
        // Création de l'utilisateur dans la base de données
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'],
        ]);
    
        // Redirection avec un message de succès
        return redirect()->route('login')->with('success', 'Inscription réussie ! Vous pouvez maintenant vous connecter.');
    }
    

    public function login(Request $request)
{
    // Affiche les données soumises dans le formulaire
    $request->all();
    
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

   if (Auth::attempt($credentials)) {
        $request->session()->regenerate(); // Regénère la session

        // Récupère l'utilisateur authentifié
        $user = Auth::user();

        // Redirection en fonction du rôle de l'utilisateur
        if ($user->role === 'Admin') {
            return redirect()->route('dashboard.admin-dashboard');
        } elseif ($user->role === 'Agent') {
            return redirect()->route('agent.dashboard');
        } elseif ($user->role === 'User') {
            return redirect()->route('user.dashboard');
        }
        
        return redirect('/home');
    }
    // Si l'authentification échoue
    return back()->withErrors([
        'email' => 'Les identifiants fournis ne correspondent pas à nos enregistrements.',
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
