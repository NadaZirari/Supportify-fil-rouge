<?php
namespace App\Http\Controllers;

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\TicketController;

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;

Route::get('/', function () {
    return view('home');
});
// Afficher le formulaire d'inscription/connexion
Route::get('/auth', function () {
    return view('auth.register');
})->name('auth.form');

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

// Route pour soumettre un ticket
Route::get('/ticket/nouveau', function () {
    return view('Soumettre_ticket');
})->name('ticket.nouveau');

// Route pour le dashboard de l'agent
Route::get('/agent/dashboard', function () {
    return view('dashboard_agent');
})->name('agent.dashboard');

// Routes de réinitialisation de mot de passe
Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

Route::get('/profil/edit', [ProfileController::class, 'edit'])->name('profile.edit')->middleware('auth');
Route::get('/dashboard/admin', function () {
    return 'Bienvenue sur le tableau de bord Admin';
})->middleware('role:Admin')->name('admin.dashboard');


Route::get('/dashboard/agent', function () {
    return view('dashboard.dashboardAgent'); // Charge la vue dashboardAgent.blade.php dans le dossier dashboard
})->middleware('role:Agent')->name('agent.dashboard');


Route::get('/dashboard/user', function () {
    return 'Bienvenue sur le tableau de bord Utilisateur';
})->middleware('role:User')->name('user.dashboard');

Route::middleware(['auth', 'role:Admin'])->prefix('admin')->name('admin.')->group(function() {
    Route::get('tickets', [AdminController::class, 'manageTickets'])->name('manageTickets');
    Route::post('tickets/{id}/validate', [AdminController::class, 'validateTicket'])->name('validateTicket');
    Route::post('tickets/{id}/archive', [AdminController::class, 'archiveTicket'])->name('archiveTicket');

    Route::get('users', [AdminController::class, 'manageUsers'])->name('manageUsers');
    Route::post('users/{id}/role', [AdminController::class, 'updateUserRole'])->name('updateUserRole');
    Route::delete('users/{id}', [AdminController::class, 'deleteUser'])->name('deleteUser');

});