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
            href="{{ route('dashboard') }}"
            class="flex items-center gap-3 px-3 py-2 rounded text-sm
                {{ request()->routeIs('dashboard') ? 'bg-gray-100 font-semibold' : 'hover:bg-gray-50' }}"
            title="Dashboard"
        >
            <span class="material-icons text-lg">dashboard</span>
            <span x-show="sidebarOpen">Dashboard</span>
        </a>

        <a
            href="{{ route('tasks.index') }}"
            class="flex items-center gap-3 px-3 py-2 rounded text-sm
                {{ request()->routeIs('tasks.*') ? 'bg-gray-100 font-semibold' : 'hover:bg-gray-50' }}"
            title="Tasks"
        >
            <span class="material-icons text-lg">task_alt</span>
            <span x-show="sidebarOpen">Tasks</span>
        </a>

        @if (auth()->user()->isAdmin())
            <a
                href="{{ route('projects.index') }}"
                class="flex items-center gap-3 px-3 py-2 rounded text-sm
                    {{ request()->routeIs('projects.*') ? 'bg-gray-100 font-semibold' : 'hover:bg-gray-50' }}"
                title="Projects"
            >
                <span class="material-icons text-lg">folder</span>
                <span x-show="sidebarOpen">Projects</span>
            </a>

            <a
                href="{{ route('companies.index') }}"
                class="flex items-center gap-3 px-3 py-2 rounded text-sm
                    {{ request()->routeIs('companies.*') ? 'bg-gray-100 font-semibold' : 'hover:bg-gray-50' }}"
                title="Company"
            >
                <span class="material-icons text-lg">apartment</span>
                <span x-show="sidebarOpen">Company</span>
            </a>
        @endif
    </nav>
</aside>