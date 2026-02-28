@extends('layouts.app')

@section('title', 'Usuários')

@section('content')
    <div class="flex items-center justify-between mb-4">
        <h1 class="text-2xl font-bold">Usuários</h1>
        <a class="px-3 py-2 bg-white border rounded" href="{{ route('users.create') }}">+ Novo</a>
    </div>

    <table class="w-full bg-white border rounded">
        <thead class="bg-gray-50">
            <tr>
                <th class="p-2 text-left">ID</th>
                <th class="p-2 text-left">Nome</th>
                <th class="p-2 text-left">Email</th>
                <th class="p-2 text-left">Role</th>
                <th class="p-2 text-left">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr class="border-t">
                    <td class="p-2">{{ $user->id }}</td>
                    <td class="p-2">{{ $user->name }}</td>
                    <td class="p-2">{{ $user->email }}</td>
                    <td class="p-2">{{ $user->role }}</td>
                    <td class="p-2 flex gap-2">
                        <a class="px-2 py-1 border rounded" href="{{ route('users.edit', $user) }}">Editar</a>

                        <form method="POST" action="{{ route('users.destroy', $user) }}"
                            onsubmit="return confirm('Excluir usuário?')">
                            @csrf
                            @method('DELETE')
                            <button class="px-2 py-1 border rounded" type="submit">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $users->links() }}
    </div>
@endsection
