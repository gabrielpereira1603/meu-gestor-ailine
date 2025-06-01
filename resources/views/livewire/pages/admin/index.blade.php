<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">

    {{-- 1) Título fixo, sem <x-slot> --}}
    <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-6">
        Gestão de White Labels
    </h2>

    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">

            {{-- Mensagem de sucesso --}}
            @if ($successMessage)
                <div class="mb-4">
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                        {{ $successMessage }}
                    </div>
                </div>
            @endif

            {{-- Contêiner flex de coluna, tabela em cima, formulário abaixo --}}
            <div class="flex flex-col space-y-8">

                {{-- =========================== --}}
                {{-- 1) Tabela de White Labels --}}
                {{-- =========================== --}}
                <div class="flex flex-col w-full">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">White Labels Existentes</h3>
                    <div class="overflow-x-auto">
                        <table class="min-w-full text-left divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase">Nome</th>
                                <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase">Slug</th>
                                <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase">Template</th>
                                <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase">Logo Atual</th>
                                <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-right">Ações</th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($whiteLabels as $wl)
                                <tr wire:key="row-{{ $wl->id }}">
                                    <td class="px-6 py-4 text-sm text-gray-900">{{ $wl->name }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-500">{{ $wl->slug }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-500">{{ $wl->template->name }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        @if($wl->header_logo_url)
                                            <img src="{{ $wl->header_logo_url }}"
                                                 alt="Logo"
                                                 class="h-8 w-auto rounded">
                                        @else
                                            <span class="text-gray-400 text-xs">Sem logo</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-sm font-medium text-right space-x-4">
                                        <!-- Link para editar no Admin -->
                                        <a
                                            href="{{ route('admin.editwl.index', ['wl_id' => $wl->id]) }}"
                                            class="text-indigo-600 hover:text-indigo-900 focus:outline-none focus:underline"
                                        >
                                            Editar
                                        </a>

                                        <!-- Link para ver a landing pública do WL -->
                                        <a
                                            href="{{ route('landing.show', ['slug' => $wl->slug]) }}"
                                            target="_blank"
                                            class="text-green-600 hover:text-green-800 focus:outline-none focus:underline"
                                        >
                                            Ver Landing
                                        </a>
                                    </td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-4 text-sm text-gray-500 text-center">
                                        Nenhum White Label cadastrado.
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- ====================================== --}}
                {{-- 2) Formulário de Criar / Editar WhiteLabel --}}
                {{-- ====================================== --}}
                <div class="w-full">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">
                        @if($whiteLabelId)
                            Editar White Label
                        @else
                            Criar Novo White Label
                        @endif
                    </h3>

                    <form wire:submit.prevent="save" class="space-y-4" enctype="multipart/form-data">

                        {{-- Nome --}}
                        <div>
                            <x-input-label for="name" :value="__('Nome')" />
                            <x-text-input
                                id="name"
                                type="text"
                                class="mt-1 block w-full"
                                wire:model.defer="name"
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
                                class="mt-1 block w-full"
                                wire:model.defer="slug"
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

                            {{-- Preview da logo atual (edição) ou do arquivo selecionado --}}
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
                            @if($whiteLabelId)
                                <button
                                    type="button"
                                    wire:click="resetForm"
                                    class="inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-300 focus:outline-none focus:ring focus:ring-gray-300 disabled:opacity-25 transition"
                                >
                                    Cancelar
                                </button>
                            @endif

                            <x-primary-button type="submit">
                                @if($whiteLabelId) Atualizar @else Salvar @endif
                            </x-primary-button>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>
</div>
