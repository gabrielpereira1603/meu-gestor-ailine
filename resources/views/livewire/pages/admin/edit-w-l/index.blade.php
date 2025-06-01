<div class="max-w-3xl mx-auto py-8">

    {{-- Título da página de edição --}}
    <h2 class="text-2xl font-semibold mb-6">
        Editar White Label: {{ $name ?? '—' }}
    </h2>

    {{-- Botão de voltar --}}
    <div class="mb-4">
        <a href="{{ route('admin.index') }}"
           class="inline-flex items-center px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">
            ‹ Voltar à Lista
        </a>
    </div>

    {{-- Mensagem de sucesso --}}
    @if ($successMessage)
        <div class="mb-4">
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                {{ $successMessage }}
            </div>
        </div>
    @endif

    {{-- Formulário de edição --}}
    <div class="bg-white p-6 border rounded-lg shadow">
        <form wire:submit.prevent="save" class="space-y-4" enctype="multipart/form-data">

            {{-- Nome --}}
            <div>
                <x-input-label for="name" :value="__('Nome')" />
                <x-text-input
                    id="name"
                    type="text"
                    wire:model.defer="name"
                    class="mt-1 block w-full"
                    autocomplete="off"
                />
                <x-input-error :messages="$errors->get('name')" class="mt-1" />
            </div>

            {{-- Slug --}}
            <div>
                <x-input-label for="slug" :value="__('Slug (URL)')" />
                <x-text-input
                    id="slug"
                    type="text"
                    wire:model.defer="slug"
                    class="mt-1 block w-full"
                    autocomplete="off"
                />
                <x-input-error :messages="$errors->get('slug')" class="mt-1" />
            </div>

            {{-- Template --}}
            <div>
                <x-input-label for="template_id" :value="__('Template')" />
                <select
                    id="template_id"
                    wire:model.defer="template_id"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                >
                    <option value="">-- Selecione um Template --</option>
                    @foreach($templates as $tpl)
                        <option value="{{ $tpl->id }}">{{ $tpl->name }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('template_id')" class="mt-1" />
            </div>

            {{-- Upload de Logo (Header) --}}
            <div>
                <x-input-label for="headerLogo" :value="__('Logo (Header)')" />
                <input
                    type="file"
                    id="headerLogo"
                    wire:model="headerLogo"
                    accept="image/*"
                    class="mt-1 block w-full text-sm text-gray-700"
                />
                <x-input-error :messages="$errors->get('headerLogo')" class="mt-1" />

                {{-- Preview da logo atual ou da nova imagem --}}
                @if($header_logo_url && ! $headerLogo)
                    <div class="mt-2">
                        <span class="text-xs text-gray-500">Logo atual:</span>
                        <img src="{{ $header_logo_url }}" alt="Logo Atual" class="h-12 w-auto rounded">
                    </div>
                @elseif($headerLogo)
                    <div class="mt-2">
                        <span class="text-xs text-gray-500">Pré-visualização:</span>
                        <img src="{{ $headerLogo->temporaryUrl() }}" alt="Preview Logo" class="h-12 w-auto rounded">
                    </div>
                @endif
            </div>

            {{-- Texto e URL dos CTAs do Header --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <x-input-label for="header_cta1_text" :value="__('Texto CTA Header 1')" />
                    <x-text-input
                        id="header_cta1_text"
                        type="text"
                        wire:model.defer="header_cta1_text"
                        class="mt-1 block w-full"
                        autocomplete="off"
                    />
                    <x-input-error :messages="$errors->get('header_cta1_text')" class="mt-1" />
                </div>
                <div>
                    <x-input-label for="header_cta1_url" :value="__('URL CTA Header 1')" />
                    <x-text-input
                        id="header_cta1_url"
                        type="text"
                        wire:model.defer="header_cta1_url"
                        class="mt-1 block w-full"
                        autocomplete="off"
                    />
                    <x-input-error :messages="$errors->get('header_cta1_url')" class="mt-1" />
                </div>
                <div>
                    <x-input-label for="header_cta2_text" :value="__('Texto CTA Header 2')" />
                    <x-text-input
                        id="header_cta2_text"
                        type="text"
                        wire:model.defer="header_cta2_text"
                        class="mt-1 block w-full"
                        autocomplete="off"
                    />
                    <x-input-error :messages="$errors->get('header_cta2_text')" class="mt-1" />
                </div>
                <div>
                    <x-input-label for="header_cta2_url" :value="__('URL CTA Header 2')" />
                    <x-text-input
                        id="header_cta2_url"
                        type="text"
                        wire:model.defer="header_cta2_url"
                        class="mt-1 block w-full"
                        autocomplete="off"
                    />
                    <x-input-error :messages="$errors->get('header_cta2_url')" class="mt-1" />
                </div>
            </div>

            {{-- Upload de Imagem de Fundo (Home) --}}
            <div>
                <x-input-label for="homeBgImage" :value="__('Imagem de Fundo (Home)')" />
                <input
                    type="file"
                    id="homeBgImage"
                    wire:model="homeBgImage"
                    accept="image/*"
                    class="mt-1 block w-full text-sm text-gray-700"
                />
                <x-input-error :messages="$errors->get('homeBgImage')" class="mt-1" />

                @if($home_bg_image_url && ! $homeBgImage)
                    <div class="mt-2">
                        <span class="text-xs text-gray-500">Fundo atual:</span>
                        <img src="{{ $home_bg_image_url }}" alt="Fundo Atual" class="h-16 w-full object-cover rounded">
                    </div>
                @elseif($homeBgImage)
                    <div class="mt-2">
                        <span class="text-xs text-gray-500">Pré-visualização:</span>
                        <img src="{{ $homeBgImage->temporaryUrl() }}" alt="Preview Fundo" class="h-16 w-full object-cover rounded">
                    </div>
                @endif
            </div>

            {{-- Texto e URL do CTA (Home) --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <x-input-label for="home_catchy_text" :value="__('Texto Chamativo (Home)')" />
                    <x-text-input
                        id="home_catchy_text"
                        type="text"
                        wire:model.defer="home_catchy_text"
                        class="mt-1 block w-full"
                        autocomplete="off"
                    />
                    <x-input-error :messages="$errors->get('home_catchy_text')" class="mt-1" />
                </div>
                <div>
                    <x-input-label for="home_cta_text" :value="__('Texto CTA (Home)')" />
                    <x-text-input
                        id="home_cta_text"
                        type="text"
                        wire:model.defer="home_cta_text"
                        class="mt-1 block w-full"
                        autocomplete="off"
                    />
                    <x-input-error :messages="$errors->get('home_cta_text')" class="mt-1" />
                </div>
                <div class="md:col-span-2">
                    <x-input-label for="home_cta_url" :value="__('URL CTA (Home)')" />
                    <x-text-input
                        id="home_cta_url"
                        type="text"
                        wire:model.defer="home_cta_url"
                        class="mt-1 block w-full"
                        autocomplete="off"
                    />
                    <x-input-error :messages="$errors->get('home_cta_url')" class="mt-1" />
                </div>
            </div>

            {{-- ABOUT – Acordeon em quatro partes --}}
            <div class="space-y-4">
                <div>
                    <x-input-label for="about_acc1_title" :value="__('Título Acordeon 1')" />
                    <x-text-input
                        id="about_acc1_title"
                        type="text"
                        wire:model.defer="about_acc1_title"
                        class="mt-1 block w-full"
                    />
                    <x-input-error :messages="$errors->get('about_acc1_title')" class="mt-1" />
                </div>
                <div>
                    <x-input-label for="about_acc1_text" :value="__('Texto Acordeon 1')" />
                    <textarea
                        id="about_acc1_text"
                        wire:model.defer="about_acc1_text"
                        rows="3"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    ></textarea>
                    <x-input-error :messages="$errors->get('about_acc1_text')" class="mt-1" />
                </div>

                <div>
                    <x-input-label for="about_acc2_title" :value="__('Título Acordeon 2')" />
                    <x-text-input
                        id="about_acc2_title"
                        type="text"
                        wire:model.defer="about_acc2_title"
                        class="mt-1 block w-full"
                    />
                    <x-input-error :messages="$errors->get('about_acc2_title')" class="mt-1" />
                </div>
                <div>
                    <x-input-label for="about_acc2_text" :value="__('Texto Acordeon 2')" />
                    <textarea
                        id="about_acc2_text"
                        wire:model.defer="about_acc2_text"
                        rows="3"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    ></textarea>
                    <x-input-error :messages="$errors->get('about_acc2_text')" class="mt-1" />
                </div>

                <div>
                    <x-input-label for="about_acc3_title" :value="__('Título Acordeon 3')" />
                    <x-text-input
                        id="about_acc3_title"
                        type="text"
                        wire:model.defer="about_acc3_title"
                        class="mt-1 block w-full"
                    />
                    <x-input-error :messages="$errors->get('about_acc3_title')" class="mt-1" />
                </div>
                <div>
                    <x-input-label for="about_acc3_text" :value="__('Texto Acordeon 3')" />
                    <textarea
                        id="about_acc3_text"
                        wire:model.defer="about_acc3_text"
                        rows="3"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    ></textarea>
                    <x-input-error :messages="$errors->get('about_acc3_text')" class="mt-1" />
                </div>

                <div>
                    <x-input-label for="about_acc4_title" :value="__('Título Acordeon 4')" />
                    <x-text-input
                        id="about_acc4_title"
                        type="text"
                        wire:model.defer="about_acc4_title"
                        class="mt-1 block w-full"
                    />
                    <x-input-error :messages="$errors->get('about_acc4_title')" class="mt-1" />
                </div>
                <div>
                    <x-input-label for="about_acc4_text" :value="__('Texto Acordeon 4')" />
                    <textarea
                        id="about_acc4_text"
                        wire:model.defer="about_acc4_text"
                        rows="3"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    ></textarea>
                    <x-input-error :messages="$errors->get('about_acc4_text')" class="mt-1" />
                </div>
            </div>

            {{-- Botões --}}
            <div class="flex items-center justify-end space-x-2 pt-4">
                <x-primary-button type="submit">
                    Salvar Alterações
                </x-primary-button>
            </div>
        </form>
    </div>
</div>
