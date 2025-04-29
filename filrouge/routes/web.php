<?php
namespace App\Http\Controllers;
use App\Http\Controllers\AgentDashboardController;

use App\Http\Controllers\MessageController;
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
    return view('home');  
})->name('home');
// Afficher le formulaire d'inscription/connexion
Route::get('/auth', function () {
    return view('auth.register');
})->name('auth.form');

Route::get('/fonctionnalites', function () {
    return view('fonctionnalite');
})->name('fonctionnalite');

Route::post('/tickets', [TicketController::class, 'store'])->name('tickets.store');

Route::middleware(['auth'])->group(function () {
    Route::resource('tickets', TicketController::class);
});
// Routes d'authentification
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);



Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register']);Route::get('/tickets/create', [TicketController::class, 'create'])->name('tickets.create');
Route::post('/tickets', [TicketController::class, 'store'])->name('tickets.store');

Route::patch('/tickets/{ticket}/close', [TicketController::class, 'closeTicket'])->name('tickets.close');


Route::get('/user/Soumettre_ticket', function () {
    return view('user.Soumettre_ticket');
})->middleware(['auth', 'role:3'])->name('user.Soumettre_ticket');

Route::get('/user/profil', [ProfileController::class, 'show'])->middleware(['auth', 'role:3'])->name('user.profil');

Route::get('user-management', [AdminController::class, 'manageUsers'])->name('user_management');


// Route::get('ticket-management', function() {
//     return view('admin.ticket_management');
// })->name('ticket_management');


Route::get('admin-dashboard', function() {
    return view('dashboard.admin-dashboard');
})->name('admin-dashboard');


Route::resource('categories', CategorieController::class);

Route::get('/admin/ticket-management', [TicketController::class, 'adminIndex'])->name('ticket_management');
Route::delete('/admin/users/{id}', [AdminController::class, 'deleteUser'])->name('admin.deleteUser');
Route::put('/admin/users/{id}/role', [AdminController::class, 'updateUserRole'])->name('admin.updateUserRole');


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
// Route::get('/agent/dashboard', function () {
//     return view('dashboard_agent');
// })->name('agent.dashboard');

Route::get('/ticket/detail', function () {
    return view('ticket.detail');
});

Route::get('/dashboard/agent', [AgentDashboardController::class, 'statistics'])
    ->middleware('role:2')
    ->name('agent.dashboard');

Route::get('/user/dashboard', function () {
    return view('user.dashboardUser');
})->middleware(['auth', 'role:3'])->name('user.dashboard');


Route::get('/user/myticket', function () {
    return view('user.myticket');
})->middleware(['auth', 'role:3'])->name('user.myticket');
Route::get('/profil', [ProfileController::class, 'show'])->name('profile.show')->middleware('auth');


// afficher les détails d'un ticket
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

// Route::get('/categories', [CategorieController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategorieController::class, 'create'])->name('categories.create');
Route::post('/categories', [CategorieController::class, 'store'])->name('categories.store');
Route::get('/categories/{categorie}/edit', [CategorieController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{categorie}', [CategorieController::class, 'update'])->name('categories.update');
Route::delete('/categories/{categorie}', [CategorieController::class, 'destroy'])->name('categories.destroy');
Route::get('categories/{id}', [CategorieController::class, 'show'])->name('categories.show');
Route::get('/categories', [CategorieController::class, 'index'])->name('categories.index');
Route::put('/categories/{categorie}', [CategorieController::class, 'update'])->name('admin.categories.update');


Route::get('/admin/users', [AdminController::class, 'manageUsers'])->name('admin.manageUsers');
Route::delete('/admin/users/{id}', [AdminController::class, 'deleteUser'])->name('admin.deleteUser');
Route::put('/admin/users/{id}/role', [AdminController::class, 'updateUserRole'])->name('admin.updateUserRole');
}); 
Route::middleware(['auth', 'role:1'])->group(function() {
    Route::get('tickets', [AdminController::class, 'manageTickets'])->name('manageTickets');
    Route::post('tickets/{id}/validate', [AdminController::class, 'validateTicket'])->name('validateTicket');
    Route::post('tickets/{id}/archive', [AdminController::class, 'archiveTicket'])->name('archiveTicket');
    Route::put('/admin/categories/{categorie}', [CategorieController::class, 'update'])->name('admin.categories.update');
    Route::delete('/tickets/{ticket}', [TicketController::class, 'destroy'])->name('ticket.destroy');

    // Route pour assigner un ticket à un agent
    Route::post('/tickets/{ticket}/assign', [TicketController::class, 'assignTicket'])->name('tickets.assign');

    Route::get('users', [AdminController::class, 'manageUsers'])->name('manageUsers');
    Route::post('users/{id}/role', [AdminController::class, 'updateUserRole'])->name('updateUserRole');
    Route::delete('users/{id}', [AdminController::class, 'deleteUser'])->name('deleteUser');

});
Route::get('/admin/users', [AdminController::class, 'manageUsers'])->name('admin.manageUsers');

///////////////////////
Route::post('/admin/users/{id}/archive-toggle', [AdminController::class, 'archiveToggleUser'])->name('admin.archiveToggleUser');
/////////////////////////////

Route::post('/tickets', [TicketController::class, 'store'])->name('tickets.store');
Route::get('/tickets/{ticket}', [TicketController::class, 'show'])->name('ticket.detail');
Route::get('/tickets/{ticket}/edit', [TicketController::class, 'edit'])->name('ticket.edit');
Route::put('/tickets/{ticket}', [TicketController::class, 'update'])->name('ticket.update');
Route::get('/tickets', [TicketController::class, 'index'])->name('tickets.show');

Route::get('/google/redirect', [GoogleAuthController::class, 'redirect'])->name('auth.google.redirect');

Route::get('/google/callback', [GoogleAuthController::class, 'callback'])->name('auth.google.callback');
Route::post('/tickets/{ticket}/messages', [MessageController::class, 'store'])->name('messages.store')->middleware('auth');
// Route pour agents
Route::middleware(['auth', 'role:2'])->group(function() {
    Route::get('/agent/tickets', [TicketController::class, 'agentTickets'])->name('TicketAgent');;
    
});
// Ajoutez cette route
Route::post('/ticket/update-status', [TicketController::class, 'updateStatus'])->name('ticket.update.status');
Route::get('/agent/tickets/{status?}', [TicketController::class, 'agentTickets'])->name('TicketAgent');


Route::post('/profile/update-photo', [ProfileController::class, 'updatePhoto'])->name('profile.update.photo');

Route::get('/upgrade', [UserController::class, 'upgrade'])->name('user.upgrade');


Route::get('/back-to-dashboard', function () {
    if (!auth()->check()) {
        return redirect()->route('login');
    }
    
    switch(auth()->user()->role_id) {
        case 1: 
            return redirect()->route('admin.dashboard');
        case 2: 
            return redirect()->route('agent.dashboard');
        case 3: 
            return redirect()->route('user.dashboard');
        default:
            return redirect()->route('home');
    }
})->name('back.to.dashboard');
