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

        $role = Role::where('nom', $validated['role'])->first();

         // Vérifier que le rôle existe
         if (!$role) {
            
            \Log::error('Rôle non trouvé: ' . $validated['role']);

            $availableRoles = Role::all();
            \Log::info('Rôles disponibles: ', $availableRoles->toArray());
            
            return back()->withErrors(['role' => 'Le rôle spécifié n\'existe pas.'])->withInput();
        }

        try {
        // Création de l'utilisateur dans la base de données
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
           'role_id' => $role->id,
        ]);
        \Log::info('Utilisateur créé avec succès: ', ['id' => $user->id, 'email' => $user->email]);

        // Redirection avec un message de succès
        return redirect()->route('login')->with('success', 'Inscription réussie ! Vous pouvez maintenant vous connecter.');

    } catch (\Exception $e) {
        \Log::error('Erreur lors de la création de l\'utilisateur: ' . $e->getMessage());
        return back()->withErrors(['general' => 'Une erreur est survenue lors de l\'inscription.'])->withInput();
    }
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
        if ($user->role_id === 1) {
            return redirect()->route('dashboard.admin-dashboard');
        } elseif ($user->role_id === 2) {
            return redirect()->route('agent.dashboard');
        } elseif ($user->role_id === 3) {
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
