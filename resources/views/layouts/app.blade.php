<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Laravel'))</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100" x-data="{ sidebarOpen: true }">
    {{-- Topbar ORIGINAL do Breeze --}}
    @include('layouts.navigation')

    <div class="flex">
        {{-- Sidebar colapsável --}}
        @include('layouts.sidebar')

        <main class="flex-1 p-6">
            {{-- Botão de colapsar (fica abaixo da topbar, não mexe no menu original) --}}
            <div class="mb-4">
                <button
                    type="button"
                    class="px-3 py-2 bg-white border rounded hover:bg-gray-50"
                    @click="sidebarOpen = !sidebarOpen"
                    x-text="sidebarOpen ? '⬅️ Recolher menu' : '➡️ Expandir menu'"
                ></button>
            </div>

            {{-- Flash success --}}
            @if(session('success'))
                <div class="mb-4 p-3 bg-green-100 border border-green-200 rounded">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Validation errors --}}
            @if($errors->any())
                <div class="mb-4 p-3 bg-red-100 border border-red-200 rounded">
                    <ul class="list-disc pl-5">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </main>
    </div>
</div>
</body>
</html>