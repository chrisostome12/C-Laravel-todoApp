<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\TaskController;


// Authentification API (login et token)
Route::post('/login', [AuthController::class, 'login']);

// Utilisateur connecté (protégé par Sanctum)
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Tâches (routes protégées par token)
Route::middleware('auth:sanctum')->prefix('/tasks')->group(function () {
    Route::get('/', [TaskApiController::class, 'index']); // Liste des tâches
    Route::post('/', [TaskApiController::class, 'store']); // Ajouter tâche
    Route::patch('/{task}/toggle', [TaskApiController::class, 'toggle']); // Marquer comme fait/non fait
    Route::delete('/{task}', [TaskApiController::class, 'destroy']); // Supprimer tâche
});
