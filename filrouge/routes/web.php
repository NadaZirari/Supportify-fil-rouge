<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// Afficher le formulaire d'inscription/connexion
Route::get('/auth', function () {
    return view('auth.register-login');
})->name('auth.form');
