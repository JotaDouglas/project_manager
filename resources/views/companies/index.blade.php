<x-app-layout>
    <x-slot name="header">
        <h2>Minha Empresa</h2>
    </x-slot>

    <div style="padding:20px;">
        <p><strong>Nome:</strong> {{ $company?->name ?? 'Sem empresa' }}</p>
        <p><strong>Slug:</strong> {{ $company?->slug ?? 'Sem slug' }}</p>
    </div>
</x-app-layout>