<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;

// Page d'accueil (accessible à tous)
Route::get('/', function () {
    return view('home.home');
});

// Tableau de bord (réservé aux utilisateurs connectés et vérifiés)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Routes protégées (profil utilisateur)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Ressources des tâches (CRUD)
    Route::resource('tasks', TaskController::class);

    // Route pour marquer une tâche comme faite/non faite
    Route::patch('/tasks/{task}/toggle', [TaskController::class, 'toggle'])->name('tasks.toggle');
});

require __DIR__.'/auth.php';
