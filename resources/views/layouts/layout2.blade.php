<x-app-layout>
    {{--
        Layout 2:
        Home → Header → About
        (Estrutura e estilos ligeiramente diferentes)
    --}}

    {{-- ================================ --}}
    {{-- Seção HOME – primeiro na ordem --}}
    {{-- ================================ --}}
    <section class="relative">
        <img src="{{ $home_bg_image_url }}" alt="Background Home" class="w-full h-72 object-cover">
        <div class="absolute inset-0 flex flex-col items-center justify-center bg-black bg-opacity-60 text-white px-4">
            <h1 class="text-3xl md:text-5xl font-extrabold mb-3 text-center">
                {{ $home_catchy_text }}
            </h1>
            <a href="{{ $home_cta_url }}" class="bg-green-600 px-5 py-2 rounded-full text-lg hover:bg-green-700">
                {{ $home_cta_text }}
            </a>
        </div>
    </section>

    {{-- ================================ --}}
    {{-- Seção HEADER – logo abaixo do Home --}}
    {{-- ================================ --}}
    <header class="bg-gray-100 shadow mt-8">
        <div class="max-w-6xl mx-auto py-4 px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row justify-between items-center">
            <div class="mb-4 md:mb-0">
                <img src="{{ $header_logo_url }}" alt="Logo" class="h-12 w-auto">
            </div>
            <div class="space-x-6">
                <a href="{{ $header_cta1_url }}" class="text-green-600 font-semibold hover:underline">
                    {{ $header_cta1_text }}
                </a>
                <a href="{{ $header_cta2_url }}" class="text-green-600 font-semibold hover:underline">
                    {{ $header_cta2_text }}
                </a>
            </div>
        </div>
    </header>

    {{-- ================================ --}}
    {{-- Seção ABOUT – acordeon em grid 2 colunas --}}
    {{-- ================================ --}}
    <section class="bg-white py-16">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl font-bold mb-8 text-center">Conheça Nossa Empresa</h2>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                {{-- Acordeon 1 --}}
                <div x-data="{ open: false }" class="border rounded-lg">
                    <button @click="open = !open"
                            class="w-full flex justify-between items-center px-5 py-3 bg-gray-50">
                        <span class="font-medium">{{ $about_acc1_title }}</span>
                        <svg :class="{ 'transform rotate-180': open }"
                             class="h-5 w-5 text-gray-500 transition-transform duration-200"
                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div x-show="open" class="px-5 py-4 bg-white">
                        <p class="text-gray-700">{{ $about_acc1_text }}</p>
                    </div>
                </div>

                {{-- Acordeon 2 --}}
                <div x-data="{ open: false }" class="border rounded-lg">
                    <button @click="open = !open"
                            class="w-full flex justify-between items-center px-5 py-3 bg-gray-50">
                        <span class="font-medium">{{ $about_acc2_title }}</span>
                        <svg :class="{ 'transform rotate-180': open }"
                             class="h-5 w-5 text-gray-500 transition-transform duration-200"
                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div x-show="open" class="px-5 py-4 bg-white">
                        <p class="text-gray-700">{{ $about_acc2_text }}</p>
                    </div>
                </div>

                {{-- Acordeon 3 --}}
                <div x-data="{ open: false }" class="border rounded-lg">
                    <button @click="open = !open"
                            class="w-full flex justify-between items-center px-5 py-3 bg-gray-50">
                        <span class="font-medium">{{ $about_acc3_title }}</span>
                        <svg :class="{ 'transform rotate-180': open }"
                             class="h-5 w-5 text-gray-500 transition-transform duration-200"
                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div x-show="open" class="px-5 py-4 bg-white">
                        <p class="text-gray-700">{{ $about_acc3_text }}</p>
                    </div>
                </div>

                {{-- Acordeon 4 --}}
                <div x-data="{ open: false }" class="border rounded-lg">
                    <button @click="open = !open"
                            class="w-full flex justify-between items-center px-5 py-3 bg-gray-50">
                        <span class="font-medium">{{ $about_acc4_title }}</span>
                        <svg :class="{ 'transform rotate-180': open }"
                             class="h-5 w-5 text-gray-500 transition-transform duration-200"
                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div x-show="open" class="px-5 py-4 bg-white">
                        <p class="text-gray-700">{{ $about_acc4_text }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
