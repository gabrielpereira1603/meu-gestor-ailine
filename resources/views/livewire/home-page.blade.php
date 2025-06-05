<div>
    <section
        id="valentine-section"
        class="relative w-full bg-[#f4f4f4] pt-10 pb-36 overflow-hidden"
    >
        {{-- 2.1) Fundo full-width --}}
        <div class="absolute inset-0">
            <img
                src="{{ asset('images/home.png') }}"
                alt="Fundo Dia dos Namorados + Telemedicina"
                class="w-full h-full object-cover opacity-20"
            >
        </div>

        {{-- 2.2) Conteúdo centralizado (logo, texto, botão) --}}
        <div class="relative z-10 max-w-4xl mx-auto text-center px-4">
            <div class="flex justify-center">
                <img
                    src="{{ asset('images/logo_transparent.png') }}"
                    alt="São Lucas Telemedicina"
                    class="h-36 w-auto"
                >
            </div>

            <h1 class="text-4xl sm:text-5xl font-extrabold text-blue-900 mb-4">
                Demonstre que você se importa neste Dia dos Namorados
            </h1>

            <p class="text-lg sm:text-xl text-blue-900 mb-6">
                Presenteie quem você ama com cuidado e carinho:
                <strong>Telemedicina São Lucas</strong> oferece
                super descontos exclusivos para você cuidar da saúde de quem é importante.
                Garanta agora um momento de atenção e tranquilidade para o seu par!
                <span class="text-blue-900 font-semibold">Oferta válida até 30/06.</span>
            </p>


            <a
                href="#contato"
                class="inline-block bg-pink-500 hover:bg-pink-600 text-white font-semibold px-6 py-3 rounded-full shadow-lg transition"
            >
                Quero o Meu Desconto ❤️
            </a>
        </div>

        {{-- 2.3) Corações animados via GSAP --}}
        <div id="heart-container" class="relative z-20 pointer-events-none">
            <img
                src="{{ asset('images/coracao.png') }}"
                id="heart1"
                class="heart absolute w-16 h-16 text-red-400"
                fill="currentColor"
                style="left: 80%; top: 130%;"
            >
            <img
                src="{{ asset('images/coracao.png') }}"
                id="heart2"
                class="heart absolute w-16 h-16 text-red-400"
                fill="currentColor"
                style="right: 10%; top: 100%;"
            >
            <img
                src="{{ asset('images/coracao.png') }}"
                id="heart3"
                class="heart absolute w-16 h-16 text-red-400"
                fill="currentColor"
                style="left: 10%; top: 100%;"
            >
            <img
                src="{{ asset('images/coracao.png') }}"
                id="heart4"
                class="heart absolute w-16 h-16 text-red-400"
                fill="currentColor"
                style="left: 50%; top: 118.9%;"
            >
        </div>

    </section>

    {{-- resources/views/components/about.blade.php --}}
    <section
        id="about-section"
        class="relative w-full bg-white py-20 overflow-hidden"
    >

        {{-- Container centralizado --}}
        <div class="relative z-10 max-w-5xl mx-auto px-4 flex flex-col lg:flex-row items-center gap-12">
            {{-- 1) Coluna da esquerda: imagem ilustrativa --}}
            <div class="w-full lg:w-1/2 flex justify-center">
                {{-- Substitua esta imagem por uma ilustração/coerente com telemedicina --}}
                <img
                    src="{{ asset('images/about.png') }}"
                    alt="Ilustração de telemedicina"
                    class="w-[100%] max-w-sm sm:max-w-lg rounded-lg shadow-2xl"
                >
            </div>

            {{-- 2) Coluna da direita: conteúdo textual --}}
            <div class="w-full lg:w-1/2 text-center lg:text-left">
                {{-- Título principal --}}
                <h2 class="text-3xl sm:text-4xl font-extrabold text-blue-900 mb-6">
                    Sobre a Telemedicina São Lucas
                </h2>

                {{-- Parágrafo introdutório --}}
                <p class="text-lg text-gray-700 mb-6">
                    Na Telemedicina São Lucas, acreditamos que cuidar de quem você ama começa com atenção de qualidade, mesmo à distância. Somos uma equipe multidisciplinar de médicos, enfermeiros e especialistas em tecnologia, unida pelo propósito de levar atendimento humanizado direto para a sua tela.
                </p>

                {{-- Lista de destaques / valores --}}
                <ul class="space-y-4 mb-8">
                    <li class="flex items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-6 h-6 text-pink-500 mt-1 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M5 13l4 4L19 7" />
                        </svg>
                        <span class="text-gray-800">
                        <strong>Atendimento 100% online:</strong> consulta via vídeo com médicos especialistas sem sair de casa.
                    </span>
                    </li>
                    <li class="flex items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-6 h-6 text-pink-500 mt-1 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M5 13l4 4L19 7" />
                        </svg>
                        <span class="text-gray-800">
                        <strong>Equipe especializada:</strong> profissionais capacitados em cardiologia, clínica geral, saúde mental e muito mais.
                    </span>
                    </li>
                    <li class="flex items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-6 h-6 text-pink-500 mt-1 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M5 13l4 4L19 7" />
                        </svg>
                        <span class="text-gray-800">
                        <strong>Atenção personalizada:</strong> um histórico único de cada paciente, garantindo cuidado contínuo e humanizado.
                    </span>
                    </li>
                </ul>

                {{-- Chamada para ação secundária --}}
                <a
                    href="#valentine-section"
                    class="inline-block bg-pink-500 hover:bg-pink-600 text-white font-semibold px-6 py-3 rounded-full shadow-lg transition-colors"
                >
                    Conheça nossos serviços
                </a>
            </div>
        </div>
    </section>

</div>

