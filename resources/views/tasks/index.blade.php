<!DOCTYPE html>
<html>
<head>
    <title>Minhas Tasks</title>
</head>
<body>

<h1>Minhas Tasks</h1>

{{-- Formulário de criação --}}
<form method="POST" action="{{ route('tasks.store') }}">
    @csrf

    <input type="text" name="title" placeholder="Título" required>
    <br><br>

    <textarea name="description" placeholder="Descrição"></textarea>
    <br><br>

    <button type="submit">Criar Task</button>
</form>

<hr>


{{-- Lista de Tasks --}}
@foreach($tasks as $task)
    <div style="margin-bottom:15px;">
        <strong>{{ $task->title }}</strong>
        <br>
        {{ $task->description }}
        <br>
        Status:
        @if($task->completed)
            ✅ Concluída
        @else
            ❌ Pendente
        @endif

        <br><br>

        {{-- Botão concluir --}}
        <form method="POST" action="{{ route('tasks.update', $task->id) }}">
            @csrf
            @method('PUT')
            <input type="hidden" name="title" value="{{ $task->title }}">
            <input type="hidden" name="description" value="{{ $task->description }}">
            <input type="hidden" name="completed" value="1">
            <button type="submit">Concluir</button>
        </form>

        {{-- Botão deletar --}}
        <form method="POST" action="{{ route('tasks.destroy', $task->id) }}">
            @csrf
            @method('DELETE')
            <button type="submit">Excluir</button>
        </form>
    </div>
@endforeach

</body>
</html>