<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\TicketController;

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;

Route::get('/', function () {
    return view('welcome');
});
// Afficher le formulaire d'inscription/connexion
Route::get('/auth', function () {
    return view('auth.register');
})->name('auth.form');

Route::middleware(['auth'])->group(function () {
    Route::resource('tickets', TicketController::class);
});


// Routes d'authentification
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Routes d'enregistrement
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/tickets/create', [TicketController::class, 'create'])->name('tickets.create');
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
