<header class="h-16">
    <div class="py-4 px-8 flex items-center justify-between">
        <x-success-button>
            {{ Auth::user()->role->name ?? 'Role' }}
        </x-success-button>
        <div x-data="{ open: false }" class="relative">
            <x-primary-button @click="open=!open">
                {{ Auth::user()->name ?? 'Name' }}
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="w-5 h-5 inline-block ml-2 transition ease-in-out duration-150"
                    :class="{ 'rotate-180': open }">
                    <path d="m6 9 6 6 6-6" />
                </svg>
            </x-primary-button>
            <div class="divide-gray-100 divide-y absolute mt-2 right-0 w-48 bg-white border border-gray-200 rounded-lg shadow-md"
                x-show="open" @click.away="open = false">
                <div class="px-3 py-2 cursor-pointer hover:bg-gray-100">
                    <a href="#">
                        <p
                            class="w-full flex items-center justify-between text-xs font-semibold uppercase tracking-widest">
                            Notifications
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="w-5 h-5 inline-block">
                                <path d="M10.268 21a2 2 0 0 0 3.464 0" />
                                <path
                                    d="M3.262 15.326A1 1 0 0 0 4 17h16a1 1 0 0 0 .74-1.673C19.41 13.956 18 12.499 18 8A6 6 0 0 0 6 8c0 4.499-1.411 5.956-2.738 7.326" />
                            </svg>
                        </p>
                    </a>
                </div>
                <form method="POST" action="" class="px-3 py-2 cursor-pointer hover:bg-gray-100">
                    @csrf
                    <button
                        class="w-full flex items-center justify-between text-xs font-semibold uppercase tracking-widest">
                        {{ __('Log Out') }}
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="w-5 h-5 inline-block">
                            <path d="m16 17 5-5-5-5" />
                            <path d="M21 12H9" />
                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </div>
</header>
