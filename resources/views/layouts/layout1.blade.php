<x-app-layout>
    {{--
        Layout 1:
        Header → Home → About
    --}}

    {{-- ================================ --}}
    {{-- Seção HEADER – topo da página --}}
    {{-- ================================ --}}
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
            <div class="flex items-center space-x-2">
                <img src="{{ $header_logo_url }}" alt="Logo" class="h-10 w-auto">
            </div>
            <div class="space-x-4">
                <a href="{{ $header_cta1_url }}" class="text-blue-600 hover:underline">
                    {{ $header_cta1_text }}
                </a>
                <a href="{{ $header_cta2_url }}" class="text-blue-600 hover:underline">
                    {{ $header_cta2_text }}
                </a>
            </div>
        </div>
    </header>

    {{-- ================================ --}}
    {{-- Seção HOME – logo abaixo do header --}}
    {{-- ================================ --}}
    <section class="relative mt-6">
        <img src="{{ $home_bg_image_url }}" alt="Background Home" class="w-full h-64 object-cover">
        <div class="absolute inset-0 flex flex-col items-center justify-center bg-black bg-opacity-50 text-white px-4">
            <h1 class="text-4xl font-bold mb-4 text-center">
                {{ $home_catchy_text }}
            </h1>
            <a href="{{ $home_cta_url }}" class="bg-blue-600 px-6 py-3 rounded text-lg hover:bg-blue-700">
                {{ $home_cta_text }}
            </a>
        </div>
    </section>

    {{-- ================================ --}}
    {{-- Seção ABOUT – acordeon com 4 itens --}}
    {{-- ================================ --}}
    <section class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold mb-6 text-center">Sobre Nós</h2>

        <div class="space-y-4">
            {{-- Acordeon 1 --}}
            <div x-data="{ open: false }" class="border rounded-lg">
                <button @click="open = !open"
                        class="w-full flex justify-between items-center px-4 py-3 text-left">
                    <span class="font-medium">{{ $about_acc1_title }}</span>
                    <svg :class="{ 'transform rotate-180': open }"
                         class="h-5 w-5 transition-transform duration-200"
                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="open" class="px-4 py-3 bg-gray-50">
                    <p>{{ $about_acc1_text }}</p>
                </div>
            </div>

            {{-- Acordeon 2 --}}
            <div x-data="{ open: false }" class="border rounded-lg">
                <button @click="open = !open"
                        class="w-full flex justify-between items-center px-4 py-3 text-left">
                    <span class="font-medium">{{ $about_acc2_title }}</span>
                    <svg :class="{ 'transform rotate-180': open }"
                         class="h-5 w-5 transition-transform duration-200"
                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="open" class="px-4 py-3 bg-gray-50">
                    <p>{{ $about_acc2_text }}</p>
                </div>
            </div>

            {{-- Acordeon 3 --}}
            <div x-data="{ open: false }" class="border rounded-lg">
                <button @click="open = !open"
                        class="w-full flex justify-between items-center px-4 py-3 text-left">
                    <span class="font-medium">{{ $about_acc3_title }}</span>
                    <svg :class="{ 'transform rotate-180': open }"
                         class="h-5 w-5 transition-transform duration-200"
                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="open" class="px-4 py-3 bg-gray-50">
                    <p>{{ $about_acc3_text }}</p>
                </div>
            </div>

            {{-- Acordeon 4 --}}
            <div x-data="{ open: false }" class="border rounded-lg">
                <button @click="open = !open"
                        class="w-full flex justify-between items-center px-4 py-3 text-left">
                    <span class="font-medium">{{ $about_acc4_title }}</span>
                    <svg :class="{ 'transform rotate-180': open }"
                         class="h-5 w-5 transition-transform duration-200"
                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="open" class="px-4 py-3 bg-gray-50">
                    <p>{{ $about_acc4_text }}</p>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
