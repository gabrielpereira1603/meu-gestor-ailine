<div>
    {{-- menu/navigation --}}
    @include('livewire.layout.navigation')

    {{-- ========== SEÇÃO VALENTINE ========== --}}
    <section id="valentine-section" class="relative bg-[#f4f4f4] pt-20 pb-32 overflow-hidden">
        <div class="max-w-4xl mx-auto text-center px-4">
            {{-- Logo São Lucas, centralizado --}}
            <div class="flex justify-center mb-8">
                <img
                    src="{{ asset('imgaes/SAO LUCAS (2).png') }}"
                    alt="São Lucas Telemedicina"
                    class="h-32 w-auto"
                >
            </div>

            {{-- Título principal --}}
            <h1 class="text-4xl sm:text-5xl font-extrabold text-blue-900 mb-4">
                Demonstre que você se importa neste Dia dos Namorados
            </h1>

            {{-- Subtítulo / Copy --}}
            <p class="text-lg sm:text-xl text-blue-700 mb-6">
                Presenteie quem você ama com cuidado e carinho: <strong>Telemedicina São Lucas</strong> oferece
                super descontos exclusivos para você cuidar da saúde de quem é importante.
                Garanta agora um momento de atenção e tranquilidade para o seu par!
            </p>

            {{-- Botão de CTA --}}
            <a
                href="#contato"
                class="inline-block bg-pink-500 hover:bg-pink-600 text-white font-semibold px-6 py-3 rounded-full shadow-lg transition"
            >
                Quero o Meu Desconto ❤️
            </a>
        </div>

        {{-- Contêiner para os corações animados em 3D --}}
        <div id="heart-container" class="pointer-events-none">
            {{-- Três corações SVG espalhados pela tela; a GSAP vai animar cada um deles --}}
            <img src="{{ asset('imgaes/coracao.png') }}"
                 id="heart1"
                 class="heart absolute w-16 h-16 text-red-400"
                 fill="currentColor"
                 style="left: 80%; top: 130%;">


            <img src="{{ asset('imgaes/coracao.png') }}"
                 id="heart1"
                 class="heart absolute w-16 h-16 text-red-400"
                 fill="currentColor"
                 style="right: 10%; top: 100%;">


            <img src="{{ asset('imgaes/coracao.png') }}"
                 id="heart3"
                 class="heart absolute w-16 h-16 text-red-400"
                 fill="currentColor"
                 style="left: 10%; top: 100%;">

            <img src="{{ asset('imgaes/coracao.png') }}"
                 id="heart3"
                 class="heart absolute w-16 h-16 text-red-400"
                 fill="currentColor"
                 style="left: 50%; top: 118.9%;">



        </div>
    </section>
    {{-- ========== FIM DA SEÇÃO VALENTINE ========== --}}
</div>
