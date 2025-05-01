@extends('layouts.app')

@section('content')
    <h1>Mes tâches</h1>
    <a href="{{ route('tasks.create') }}">Ajouter une tâche</a>

    <ul>
        @foreach ($tasks as $task)
            <li>
                {{ $task->title }}
                <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Supprimer</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
