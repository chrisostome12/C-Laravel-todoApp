<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskApiController extends Controller
{
    public function index()
    {
        return Task::where('user_id', Auth::id())->get();
    }

    public function store(Request $request)
    {
        $request->validate(['title' => 'required|string']);
        $task = Task::create([
            'title' => $request->title,
            'user_id' => Auth::id(),
        ]);
        return response()->json($task, 201);
    }

    public function toggle(Task $task)
    {
        if ($task->user_id !== Auth::id()) {
            return response()->json(['message' => 'Non autorisé'], 403);
        }

        $task->is_done = !$task->is_done;
        $task->save();

        return response()->json($task);
    }

    public function destroy(Task $task)
    {
        if ($task->user_id !== Auth::id()) {
            return response()->json(['message' => 'Non autorisé'], 403);
        }

        $task->delete();
        return response()->json(['message' => 'Tâche supprimée']);
    }
}
