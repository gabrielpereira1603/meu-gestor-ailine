<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="shortcut icon" href="{{ asset('images/logo_transparent.png') }}" type="image/x-icon">
    <!-- Styles do Livewire -->
    @livewireStyles

    <!-- Scripts (Tailwind + outros) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Inclusão da navegação (se for sidebar fixa, sem envolver o content em "max-w") --}}
    @include('livewire.layout.navigation')
    <body class="h-[100%] font-sans antialiased">
        {{-- Removi o <div class="min-h-screen bg-gray-100"> para não ter um wrapper que fixe padding/padding lateral --}}
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <main class="h-[100%]">
            {{ $slot }}
        </main>

        <!-- Scripts do Livewire -->
        @livewireScripts
        @stack('scripts')
    </body>
</html>
