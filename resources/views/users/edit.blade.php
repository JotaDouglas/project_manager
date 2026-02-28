@extends('layouts.app')

@section('title', 'Editar Usuário')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Editar Usuário</h1>

    <form class="bg-white border rounded p-4 space-y-3" method="POST" action="{{ route('users.update', $user) }}">
        @csrf
        @method('PUT')

        <div>
            <label>Nome</label>
            <input class="w-full border rounded p-2" name="name" value="{{ old('name', $user->name) }}" required>
        </div>

        <div>
            <label>Email</label>
            <input class="w-full border rounded p-2" type="email" name="email" value="{{ old('email', $user->email) }}"
                required>
        </div>

        <div>
            <label>Role</label>
            <select class="w-full border rounded p-2" name="role" required>
                <option value="user" @selected(old('role', $user->role) === 'user')>user</option>
                <option value="admin" @selected(old('role', $user->role) === 'admin')>admin</option>
            </select>
        </div>

        <hr>

        <div>
            <label>Nova senha (opcional)</label>
            <input class="w-full border rounded p-2" type="password" name="password">
        </div>

        <div>
            <label>Confirmar nova senha</label>
            <input class="w-full border rounded p-2" type="password" name="password_confirmation">
        </div>

        <div class="flex gap-2">
            <button class="px-3 py-2 border rounded bg-white" type="submit">Atualizar</button>
            <a class="px-3 py-2 border rounded" href="{{ route('users.index') }}">Voltar</a>
        </div>
    </form>
@endsection
