@extends('layouts.app')

@section('title', 'Minha Empresa')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Minha Empresa</h1>

    <div style="padding:20px;">
        <p><strong>Nome:</strong> {{ $company?->name ?? 'Sem empresa' }}</p>
        <p><strong>Slug:</strong> {{ $company?->slug ?? 'Sem slug' }}</p>
    </div>
@endsection