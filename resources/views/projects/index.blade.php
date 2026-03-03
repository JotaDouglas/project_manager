@extends('layouts.app')

@section('title', 'Projects')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Projects</h1>

    <div style="padding: 16px;">

        {{-- Botão criar --}}
        @can('create', \App\Models\Project::class)
            <a href="{{ route('projects.create') }}">Novo projeto</a>
        @endcan

        <hr>

        <ul>
            @foreach ($projects as $project)
                <li>
                    {{ $project->name }}

                    {{-- Botão editar --}}
                    @can('update', $project)
                        <a href="{{ route('projects.edit', $project) }}">Editar</a>
                    @endcan

                    {{-- Botão excluir --}}
                    @can('delete', $project)
                        <form method="POST"
                              action="{{ route('projects.destroy', $project) }}"
                              style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Excluir</button>
                        </form>
                    @endcan
                </li>
            @endforeach
        </ul>
    </div>
@endsection