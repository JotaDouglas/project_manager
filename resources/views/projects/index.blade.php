<x-app-layout>
    <x-slot name="header">
        <h2>Projects</h2>
    </x-slot>

    <div style="padding: 16px;">
        <form method="POST" action="{{ route('projects.store') }}">
            @csrf
            <input name="name" placeholder="Nome do projeto" required>
            <input name="description" placeholder="Descrição (opcional)">
            <button type="submit">Criar</button>
        </form>

        <hr>

        <ul>
            @foreach ($projects as $project)
                <li>
                    {{ $project->name }}
                    <form method="POST" action="{{ route('projects.destroy', $project) }}" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Excluir</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
</x-app-layout>