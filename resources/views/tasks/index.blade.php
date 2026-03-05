@extends('layouts.app')

@section('title', 'Minhas Tasks')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Minhas Tasks</h1>
    {{-- Formulário de criação --}}
    @can('create', \App\Models\Task::class)
        <form method="POST" action="{{ route('tasks.store') }}">
            @csrf

            <input type="text" name="title" placeholder="Título" required>
            <br><br>

            <textarea name="description" placeholder="Descrição"></textarea>
            <br><br>

            <button type="submit">Criar Task</button>
        </form>
    @endcan

    <hr>


    {{-- Lista de Tasks --}}

    @foreach ($tasks as $task)
        <div style="margin-bottom:15px;">
            <strong>{{ $task->title }}</strong>
            <br>
            {{ $task->description }}
            <br>
            Status:
            @if ($task->completed)
                ✅ Concluída
            @else
                ❌ Pendente
            @endif

            <br><br>

            @can('update', $task)
                {{-- Botão concluir --}}
                <form method="POST" action="{{ route('tasks.complete', $task) }}">
                    @csrf
                    @method('PATCH')
                    <button type="submit">Concluir</button>
                </form>
            @endcan

            @can('delete', $task)
                {{-- Botão deletar --}}
                <form method="POST" action="{{ route('tasks.destroy', $task) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Excluir</button>
                </form>
            @endcan
        </div>
    @endforeach

    {{-- Seu formulário e lista aqui (o mesmo que já fez) --}}
@endsection
