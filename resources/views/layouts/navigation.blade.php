@php
    $sheets = config('sheets');
@endphp
<nav x-data="{ open: false }"
    class="w-64 h-auto border   text-xs overflow-y-auto mt-2 mb-2 ml-2 rounded-md backdrop-blur-xs shadow-xs">
    <!-- User  -->
    <div
        class="h-16 flex items-center px-4 border-b-2 border-white hover:bg-gray-50 m-2 rounded-md shadow-sm select-none">
        <a href="{{ route('dashboard') }}" class="flex items-center gap-2">
            <div class="bg-[{{ config('theme.primary') }}] p-2 rounded-sm text-[{{ config('theme.text.inverted') }}]">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-package-open-icon lucide-package-open">
                    <path d="M12 22v-9" />
                    <path
                        d="M15.17 2.21a1.67 1.67 0 0 1 1.63 0L21 4.57a1.93 1.93 0 0 1 0 3.36L8.82 14.79a1.655 1.655 0 0 1-1.64 0L3 12.43a1.93 1.93 0 0 1 0-3.36z" />
                    <path
                        d="M20 13v3.87a2.06 2.06 0 0 1-1.11 1.83l-6 3.08a1.93 1.93 0 0 1-1.78 0l-6-3.08A2.06 2.06 0 0 1 4 16.87V13" />
                    <path
                        d="M21 12.43a1.93 1.93 0 0 0 0-3.36L8.83 2.2a1.64 1.64 0 0 0-1.63 0L3 4.57a1.93 1.93 0 0 0 0 3.36l12.18 6.86a1.636 1.636 0 0 0 1.63 0z" />
                </svg>
            </div>
            <div>
                <h1 class="text-lg">{{ auth()->user()->name }}</h1>
                <span>{{ auth()->user()->company }}</span>
            </div>
        </a>
    </div>

    <!-- Navigation Links -->
    <div class="mt-4 flex flex-col gap-6">
        <!-- Main Section -->
        <div class="space-y-1">
            <x-nav-heading>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-database-icon lucide-database">
                    <ellipse cx="12" cy="5" rx="9" ry="3" />
                    <path d="M3 5V19A9 3 0 0 0 21 19V5" />
                    <path d="M3 12A9 3 0 0 0 21 12" />
                </svg>
                {{ auth()->user()->company }}
            </x-nav-heading>
            <div class="border-l ml-5">
                <x-nav-heading>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-folder-down-icon lucide-folder-down">
                        <path
                            d="M20 20a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.9a2 2 0 0 1-1.69-.9L9.6 3.9A2 2 0 0 0 7.93 3H4a2 2 0 0 0-2 2v13a2 2 0 0 0 2 2Z" />
                        <path d="M12 10v6" />
                        <path d="m15 13-3 3-3-3" />
                    </svg>
                    {{ __('Customers') }}
                </x-nav-heading>
                <div class="p-2 border-l ml-5 mt-2">
                    @foreach ($sheets as $key => $sheet)
                        <x-nav-link :href="route('index', $key)" :active="request()->routeIs('index')">
                            {{ $sheet }}
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-mail-icon lucide-mail">
                                <path d="m22 7-8.991 5.727a2 2 0 0 1-2.009 0L2 7" />
                                <rect x="2" y="4" width="20" height="16" rx="2" />
                            </svg>
                        </x-nav-link>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</nav>
