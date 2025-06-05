<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component
{
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}; ?>

<nav x-data="{ open: false }" class="bg-blue-700 border-b border-gray-100 p-5">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo (mais afastado da borda pela própria padding do container) -->
            <div class="flex-shrink-0 flex items-center">
                <a href="#" wire:navigate class="block">
                    <img
                        src="https://ailine.com.br/landing/assets/images/white-logo2.png"
                        alt="Logo"
                        class="h-10 w-auto"
                    >
                </a>
            </div>

            <!-- Links de navegação (aparecem em telas SM+ e ficam alinhados à direita) -->
            <div class="hidden sm:flex sm:items-center sm:space-x-6">
                <a href="/dashboard"
                    class="text-gray-100 hover:text-white hover:bg-blue-500/20 px-3 py-2 rounded-md text-sm font-bold transition">
                    Dashboard
                </a>
                <a href="/produtos"
                    class="text-gray-100 hover:text-white hover:bg-blue-500/20 px-3 py-2 rounded-md text-sm font-bold transition">
                    Produtos
                </a>
                <a href="/produtos"
                   class="text-gray-100 hover:text-white hover:bg-blue-500/20 px-3 py-2 rounded-md text-sm font-bold transition">

                Sobre
                </a>
                <a href="/produtos"
                   class="text-gray-100 hover:text-white hover:bg-blue-500/20 px-3 py-2 rounded-md text-sm font-bold transition">

                Contato
                </a>
            </div>

            <!-- Botão “Hamburger” para celular (aparece em telas < SM) -->
            <div class="-me-2 flex items-center sm:hidden">
                <button
                    @click="open = !open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-100 hover:text-blue-900 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out"
                >
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path
                            :class="{ 'hidden': open, 'inline-flex': !open }"
                            class="inline-flex"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"
                        />
                        <path
                            :class="{ 'hidden': !open, 'inline-flex': open }"
                            class="hidden"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"
                        />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div class="sm:hidden" x-show="open">
        <div class="pt-2 pb-3 space-y-1">
            <a href="/dashboard"
                class="block pl-3 pr-4 py-2 border-l-4 border-blue-300 text-base font-medium text-blue-700 bg-red-50 hover:bg-blue-100 hover:border-blue-400">
                Dashboard
            </a>
            <a href="/dashboard"
               class="block pl-3 pr-4 py-2 border-l-4 border-blue-300 text-base font-medium text-blue-700 bg-red-50 hover:bg-blue-100 hover:border-blue-400">

                Produtos
            </a>
            <a href="/dashboard"
               class="block pl-3 pr-4 py-2 border-l-4 border-blue-300 text-base font-medium text-blue-700 bg-red-50 hover:bg-blue-100 hover:border-blue-400">

                Sobre
            </a>
            <a href="/dashboard"
               class="block pl-3 pr-4 py-2 border-l-4 border-blue-300 text-base font-medium text-blue-700 bg-red-50 hover:bg-blue-100 hover:border-blue-400">
                Contato
            </a>
        </div>
    </div>
</nav>
