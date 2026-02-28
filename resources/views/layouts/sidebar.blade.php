<aside
    class="bg-white border-r transition-all duration-200"
    :class="sidebarOpen ? 'w-64' : 'w-16'"
    style="min-height: calc(100vh - 4rem);"  {{-- 4rem ~ altura da topbar --}}
>
    <div class="p-4 border-b flex items-center justify-center">
        {{-- “Logo” simples do menu --}}
        <span class="font-bold text-gray-700" x-show="sidebarOpen">Menu</span>
        <span class="font-bold text-gray-700" x-show="!sidebarOpen">≡</span>
    </div>

    <nav class="p-2 space-y-1">
        <a
            href="{{ route('tasks.index') }}"
            class="flex items-center gap-3 px-3 py-2 rounded text-sm
                {{ request()->routeIs('tasks.*') ? 'bg-gray-100 font-semibold' : 'hover:bg-gray-50' }}"
            title="Tasks"
        >
            <span class="text-lg">✅</span>
            <span x-show="sidebarOpen">Tasks</span>
        </a>

        {{-- futuro --}}
        {{-- 
        <a href="#" class="flex items-center gap-3 px-3 py-2 rounded text-sm hover:bg-gray-50" title="Usuários">
            <span class="text-lg">👥</span>
            <span x-show="sidebarOpen">Usuários</span>
        </a>
        --}}
    </nav>
</aside>