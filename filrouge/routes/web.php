<?php
namespace App\Http\Controllers;

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\TicketController;

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;

use App\Http\Controllers\GoogleAuthController;

Route::get('/', function () {
    return view('home');
});
Route::get('/home', function () {
    return view('home');  // Remarquez que 'home' fait référence à 'home.blade.php'
})->name('home');
// Afficher le formulaire d'inscription/connexion
Route::get('/auth', function () {
    return view('auth.register');
})->name('auth.form');

Route::get('/fonctionnalites', function () {
    return view('fonctionnalite');
})->name('fonctionnalite');


Route::middleware(['auth'])->group(function () {
    Route::resource('tickets', TicketController::class);
});
// Routes d'authentification
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);



Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// Ajouter cette nouvelle route pour traiter la soumission du formulaire
Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register']);Route::get('/tickets/create', [TicketController::class, 'create'])->name('tickets.create');
Route::post('/tickets', [TicketController::class, 'store'])->name('tickets.store');



Route::get('/user/Soumettre_ticket', function () {
    return view('user.Soumettre_ticket');
})->middleware(['auth', 'role:3'])->name('user.Soumettre_ticket');

Route::get('/user/profil', function () {
    return view('user.profil');
})->middleware(['auth', 'role:3'])->name('user.profil');

Route::get('user-management', function() {
    return view('admin.user_management');
})->name('user_management');


Route::get('ticket-management', function() {
    return view('admin.ticket_management');
})->name('ticket_management');


Route::get('admin-dashboard', function() {
    return view('dashboard.admin-dashboard');
})->name('admin-dashboard');




Route::resource('tickets', TicketController::class);
Route::post('tickets/archive', [TicketController::class, 'archiveResolvedTickets'])->name('tickets.archive');

// Routes de réinitialisation de mot de passe
Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

Route::get('/profil/edit', [ProfileController::class, 'edit'])->name('profile.edit')->middleware('auth');

Route::get('/dashboard/admin', function () {
    return view('dashboard.admin-dashboard');
})->middleware(['auth', 'role:1'])->name('dashboard.admin-dashboard');


// Route pour le dashboard de l'agent
Route::get('/agent/dashboard', function () {
    return view('dashboard_agent');
})->name('agent.dashboard');

Route::get('/ticket/detail', function () {
    return view('ticket.detail');
});

Route::get('/dashboard/agent', function () {
    return view('dashboard.dashboardAgent'); // Charge la vue dashboardAgent.blade.php dans le dossier dashboard
})->middleware('role:2')->name('agent.dashboard');

Route::get('/user/dashboard', function () {
    return view('user.dashboardUser');
})->middleware(['auth', 'role:3'])->name('user.dashboard');

// Route pour le dashboard de l'agent
Route::get('/agent/dashboard', function () {
    return view('dashboard_agent');
})->name('agent.dashboard');

Route::get('/user/myticket', function () {
    return view('user.myticket');
})->middleware(['auth', 'role:3'])->name('user.myticket');

// Ajoutez cette route pour afficher les détails d'un ticket
Route::get('/tickets', [TicketController::class, 'show'])->name('ticket.detail');
// Routes pour les tickets
Route::middleware(['auth'])->group(function () {
    // Liste des tickets de l'utilisateur
    Route::get('/user/myticket', [TicketController::class, 'index'])->name('user.myticket');
    
    // Formulaire de création de ticket
    Route::get('/user/Soumettre_ticket', [TicketController::class, 'create'])->name('user.Soumettre_ticket');
    
    // Enregistrer un nouveau ticket
    Route::post('/tickets', [TicketController::class, 'store'])->name('tickets.store');
    
    // Afficher les détails d'un ticket
    Route::get('/tickets/{ticket}', [TicketController::class, 'show'])->name('ticket.detail');
});


Route::get('/user/submit-ticket', function () {
    return view('user.Soumettre_ticket');
})->middleware(['auth', 'role:3'])->name('user.submit-ticket');

Route::middleware(['auth', 'role:1'])->group(function () {

Route::get('/categories', [CategorieController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategorieController::class, 'create'])->name('categories.create');
Route::post('/categories', [CategorieController::class, 'store'])->name('categories.store');
Route::get('/categories/{categorie}/edit', [CategorieController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{categorie}', [CategorieController::class, 'update'])->name('ategories.update');
Route::delete('/categories/{categorie}', [CategorieController::class, 'destroy'])->name('categories.destroy');
Route::get('categories/{id}', [CategorieController::class, 'show'])->name('categories.show');
Route::get('/categories', [CategorieController::class, 'index'])->name('categories.index');
Route::put('/categories/{categorie}', [CategorieController::class, 'update'])->name('admin.categories.update');

}); 
Route::middleware(['auth', 'role:1'])->group(function() {
    Route::get('tickets', [AdminController::class, 'manageTickets'])->name('manageTickets');
    Route::post('tickets/{id}/validate', [AdminController::class, 'validateTicket'])->name('validateTicket');
    Route::post('tickets/{id}/archive', [AdminController::class, 'archiveTicket'])->name('archiveTicket');
       Route::put('/admin/categories/{categorie}', [CategorieController::class, 'update'])->name('admin.categories.update');

    Route::get('users', [AdminController::class, 'manageUsers'])->name('manageUsers');
    Route::post('users/{id}/role', [AdminController::class, 'updateUserRole'])->name('updateUserRole');
    Route::delete('users/{id}', [AdminController::class, 'deleteUser'])->name('deleteUser');

});
Route::post('/tickets', [TicketController::class, 'store'])->name('tickets.store');
Route::get('/tickets/{ticket}', [TicketController::class, 'show'])->name('ticket.detail');
Route::get('/tickets/{ticket}/edit', [TicketController::class, 'edit'])->name('tickets.edit');
Route::put('/tickets/{ticket}', [TicketController::class, 'update'])->name('ticket.update');
Route::delete('/tickets/{ticket}', [TicketController::class, 'destroy'])->name('ticket.destroy');
Route::get('/tickets', [TicketController::class, 'index'])->name('tickets.index');

Route::get('/google/redirect', [GoogleAuthController::class, 'redirect'])->name('auth.google.redirect');

Route::get('/google/callback', [GoogleAuthController::class, 'callback'])->name('auth.google.callback');