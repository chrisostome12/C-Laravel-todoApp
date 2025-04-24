<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Liste toutes les tâches de l'utilisateur connecté.
     */
    public function index(Request $request)
    {
        return response()->json($request->user()->tasks);
    }

    /**
     * Enregistre une nouvelle tâche pour l'utilisateur connecté.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $task = $request->user()->tasks()->create([
            'title' => $request->title,
        ]);

        return response()->json($task, 201);
    }

    /**
     * Bascule l'état (fait / pas fait) d'une tâche.
     */
    public function toggle(Request $request, Task $task)
    {
        // Vérifie que la tâche appartient à l'utilisateur connecté
        if ($task->user_id !== $request->user()->id) {
            return response()->json(['message' => 'Non autorisé'], 403);
        }

        $task->is_done = !$task->is_done;
        $task->save();

        return response()->json($task);
    }

    /**
     * Supprime une tâche.
     */
    public function destroy(Request $request, Task $task)
    {
        // Vérifie que la tâche appartient à l'utilisateur connecté
        if ($task->user_id !== $request->user()->id) {
            return response()->json(['message' => 'Non autorisé'], 403);
        }

        $task->delete();

        return response()->json(['message' => 'Tâche supprimée avec succès.'], 204);
    }
}
