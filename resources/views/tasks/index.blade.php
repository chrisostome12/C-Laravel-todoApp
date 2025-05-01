
    <div class="p-6">
        <h2 class="text-xl mb-4">Mes Tâches</h2>

        <form method="POST" action="{{ route('tasks.store') }}" class="mb-4">
            @csrf
            <input type="text" name="title" placeholder="Nouvelle tâche" class="border p-2 w-full rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 mt-2 rounded-lg hover:bg-blue-600 focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Ajouter</button>
        </form>

        <ul class="mt-4">
        @if ($tasks && count($tasks) > 0)
            @foreach($tasks as $task)
                <li class="flex justify-between items-center border-b py-2 hover:bg-gray-50">
                    <form action="{{ route('tasks.toggle', $task) }}" method="POST" class="flex items-center">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="{{ $task->is_done ? 'line-through text-gray-500' : 'text-gray-800' }} transition duration-300">
                            {{ $task->title }}
                        </button>
                    </form>@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Mes Tâches</h2>

    <!-- Message de succès -->
    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    <!-- Formulaire d'ajout -->
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <input type="text" name="title" placeholder="Nouvelle tâche" required>
        <button type="submit">Ajouter</button>
    </form>

    <!-- Liste des tâches -->
    <ul>
        @forelse ($tasks as $task)
            <li>
                {{ $task->title }}
                
                <!-- Supprimer -->
                <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Supprimer</button>
                </form>

                <!-- Marquer comme fait/non fait -->
                <form action="{{ route('tasks.toggle', $task) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('PATCH')
                    <button type="submit">
                        {{ $task->is_done ? 'Marquer comme non faite' : 'Marquer comme faite' }}
                    </button>
                </form>
            </li>
        @empty
            <li>Aucune tâche pour le moment.</li>
        @endforelse
    </ul>
</div>
@endsection

                    <div class="flex gap-2">
                        <form method="POST" action="{{ route('tasks.destroy', $task) }}">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-500 hover:text-red-700 transition duration-300">Supprimer</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

    <style>
        /* CSS customisé pour améliorer le design */
        body {
            background-color: #f7f7f7;
            font-family: 'Arial', sans-serif;
        }

        .p-6 {
            background-color: #fff;
            border-radius: 0.5rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        h2 {
            font-size: 1.5rem;
            font-weight: 600;
            color: #333;
        }

        input[type="text"] {
            border: 1px solid #ddd;
            padding: 0.5rem 1rem;
            width: 100%;
            border-radius: 0.375rem;
            margin-bottom: 1rem;
        }

        button {
            border-radius: 0.375rem;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        button:hover {
            transform: scale(1.05);
        }

        .text-gray-500 {
            color: #6b7280;
        }

        .text-gray-800 {
            color: #333;
        }

        .line-through {
            text-decoration: line-through;
        }

        .hover:bg-gray-50 {
            transition: background-color 0.2s ease-in-out;
        }

        .flex {
            display: flex;
        }

        .gap-2 {
            gap: 0.5rem;
        }
    </style>
</x-app-layout>
