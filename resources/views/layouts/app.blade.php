<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Template Kit') }}</title>

    <!-- Tailwind -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <!-- Alpine Js -->
    <script src="//unpkg.com/alpinejs" defer></script>

    <!-- Toastr -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- FLowbite -->
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

    <!-- Tailwind -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap');

        * {
            font-family: "Inter", sans-serif;
        }

        [x-cloak] {
            display: none;
        }
    </style>

    @stack('styles')
</head>

<body>
    <div class="uppercase text-center absolute left-0 top-0 w-full h-screen flex flex-col items-center justify-center bg-white z-50"
        id="loader">
        <div
            class="w-16 h-16 border-4 border-dashed rounded-full animate-spin border-[{{ config('theme.primary') }}] mx-auto">
        </div>
        <h2 class="text-[{{ config('theme.text.default') }}] mt-4">Loading...</h2>
        <p class="text-[{{ config('theme.text.default') }}] dark:text-zinc-400">
            Your CRM is right this way
        </p>
    </div>

    <div class="h-screen text-xs font-medium uppercase bg-[{{ config('theme.background.default') }}]">
        <div class="flex h-full">
            @include('layouts.navigation')

            <!-- Main Content -->
            <div class="flex flex-col w-[75%] h-screen">
                <!-- Page Heading -->
                <x-header />
                <!-- Page Content -->
                <main class="h-[100vh]  rounded-md mx-8 my-4">
                    {{ $slot }}
                </main>
            </div>
        </div>
    </div>

    <script>
        @if (session('success'))
            toastr.success("{{ session('success') }}");
        @endif

        @if (session('error'))
            toastr.error("{{ session('error') }}");
        @endif

        @if (session('info'))
            toastr.info("{{ session('info') }}");
        @endif

        @if (session('warning'))
            toastr.warning("{{ session('warning') }}");
        @endif

        // Loader functionality
        const MIN_DISPLAY_TIME = 2000;

        const loaderStartTime = Date.now();

        function hideLoader() {
            const loader = document.getElementById('loader');
            if (!loader) return;
            const elapsed = Date.now() - loaderStartTime;
            const remainingTime = Math.max(0, MIN_DISPLAY_TIME - elapsed);

            setTimeout(() => {
                loader.classList.add('hidden');

                loader.addEventListener('transitionend', () => {
                    loader.remove();
                });
            }, remainingTime);
        }

        window.addEventListener('load', hideLoader);

        setTimeout(hideLoader, 3000);
    </script>

    @stack('scripts')
</body>

</html>
