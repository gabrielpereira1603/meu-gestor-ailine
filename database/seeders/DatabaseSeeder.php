<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Template;
use App\Models\WhiteLabel;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        //
        // 1) Criar três templates base
        //

        // --- Template 1: Básico ---
        $tpl1 = Template::updateOrCreate(
            ['name' => 'Template Básico'],
            [
                'header_logo_url'   => 'https://via.placeholder.com/150x50?text=Logo+Base',
                'header_cta1_text'  => 'Agendar Consulta',
                'header_cta1_url'   => 'https://exemplo.com/agendar',
                'header_cta2_text'  => 'Contato',
                'header_cta2_url'   => 'https://exemplo.com/contato',

                'home_bg_image_url' => 'https://via.placeholder.com/1200x600?text=Home+Base',
                'home_catchy_text'  => 'Consultas Online 24/7',
                'home_cta_text'     => 'Saiba Mais',
                'home_cta_url'      => 'https://exemplo.com/saiba-mais',

                'about_acc1_title'  => 'Serviços',
                'about_acc1_text'   => 'Consultas com especialistas via videochamada.',
                'about_acc2_title'  => 'Equipe',
                'about_acc2_text'   => 'Profissionais experientes à sua disposição.',
                'about_acc3_title'  => 'Funcionamento',
                'about_acc3_text'   => 'Agende, conecte-se e realize sua consulta.',
                'about_acc4_title'  => 'Planos',
                'about_acc4_text'   => 'Planos a partir de R$ 49,90 sem fidelidade.',
            ]
        );

        // --- Template 2: Premium ---
        $tpl2 = Template::updateOrCreate(
            ['name' => 'Template Premium'],
            [
                'header_logo_url'   => 'https://via.placeholder.com/150x50?text=Logo+Premium',
                'header_cta1_text'  => 'Agendar Agora',
                'header_cta1_url'   => 'https://exemplo.com/agendar-premium',
                'header_cta2_text'  => 'Suporte 24h',
                'header_cta2_url'   => 'https://exemplo.com/suporte-premium',

                'home_bg_image_url' => 'https://via.placeholder.com/1200x600?text=Home+Premium',
                'home_catchy_text'  => 'Atendimento Diferenciado',
                'home_cta_text'     => 'Experimente Grátis',
                'home_cta_url'      => 'https://exemplo.com/experimente',

                'about_acc1_title'  => 'Cobertura Global',
                'about_acc1_text'   => 'Atendemos pacientes em todo o país com alta qualidade.',
                'about_acc2_title'  => 'Consultas Ilimitadas',
                'about_acc2_text'   => 'Realize quantas consultas precisar no plano Premium.',
                'about_acc3_title'  => 'Tecnologia Avançada',
                'about_acc3_text'   => 'Nossa plataforma utiliza criptografia de ponta-a-ponta.',
                'about_acc4_title'  => 'Depoimentos',
                'about_acc4_text'   => 'Confira histórias reais de quem já usou nossos serviços.',
            ]
        );

        // --- Template 3: Terceiro (exemplo extra) ---
        $tpl3 = Template::updateOrCreate(
            ['name' => 'Template Terceiro'],
            [
                'header_logo_url'   => 'https://via.placeholder.com/150x50?text=Logo+Terceiro',
                'header_cta1_text'  => 'Conheça Nossos Planos',
                'header_cta1_url'   => 'https://exemplo.com/planos',
                'header_cta2_text'  => 'Fale Conosco',
                'header_cta2_url'   => 'https://exemplo.com/contato-terceiro',

                'home_bg_image_url' => 'https://via.placeholder.com/1200x600?text=Home+Terceiro',
                'home_catchy_text'  => 'Soluções Personalizadas',
                'home_cta_text'     => 'Peça uma Demonstração',
                'home_cta_url'      => 'https://exemplo.com/demonstracao',

                'about_acc1_title'  => 'Nossa Missão',
                'about_acc1_text'   => 'Oferecer soluções sob medida para cada cliente.',
                'about_acc2_title'  => 'Valores',
                'about_acc2_text'   => 'Credibilidade, inovação e transparência.',
                'about_acc3_title'  => 'Equipe Especializada',
                'about_acc3_text'   => 'Profissionais dedicados à sua saúde e bem-estar.',
                'about_acc4_title'  => 'Resultados Comprovados',
                'about_acc4_text'   => 'Casos de sucesso que reforçam nossa expertise.',
            ]
        );

        //
        // 2) Criar três WhiteLabels, cada uma vinculada a um dos templates
        //

        // --- WhiteLabel 1 ligando-se ao Template Básico (override parcial) ---
        WhiteLabel::updateOrCreate(
            ['slug' => 'cliente1'],
            [
                'name'             => 'Cliente 1',
                'template_id'      => $tpl1->id,
                // Override parcial para Cliente 1
                'header_logo_url'  => 'https://via.placeholder.com/150x50?text=Logo+Cliente1',
                'header_cta1_text' => 'Marque Agora',
                'header_cta1_url'  => 'https://cliente1.com/marcar',
                'header_cta2_text' => 'Fale com a Gente',
                'header_cta2_url'  => 'https://cliente1.com/contato',
                'home_bg_image_url'=> 'https://via.placeholder.com/1200x600?text=Home+Cliente1',
                'home_catchy_text' => 'Bem-vindo ao Cliente 1!',
                'home_cta_text'    => 'Conheça Mais',
                'home_cta_url'     => 'https://cliente1.com/sobre',
                'about_acc1_title' => 'Por que Cliente 1',
                'about_acc1_text'  => 'Somos referência em telemedicina regional.',
                'about_acc2_title' => 'Nossa Equipe',
                'about_acc2_text'  => 'Médicos certificados e experientes.',
                'about_acc3_title' => 'Como Funciona',
                'about_acc3_text'  => 'Agende online, receba no conforto de casa.',
                'about_acc4_title' => 'Planos Flexíveis',
                'about_acc4_text'  => 'Planos personalizados para sua necessidade.',
            ]
        );

        // --- WhiteLabel 2 ligando-se ao Template Premium (override parcial) ---
        WhiteLabel::updateOrCreate(
            ['slug' => 'cliente2'],
            [
                'name'             => 'Cliente 2',
                'template_id'      => $tpl2->id,
                // Override parcial para Cliente 2
                'header_logo_url'  => 'https://via.placeholder.com/150x50?text=Logo+Cliente2',
                'header_cta1_text' => 'Agendar Premium',
                'header_cta1_url'  => 'https://cliente2.com/agendar-premium',
                'home_bg_image_url'=> 'https://via.placeholder.com/1200x600?text=Home+Cliente2',
                'home_catchy_text' => 'Sua Experiência Premium',
                'home_cta_text'    => 'Saiba Mais Premium',
                'home_cta_url'     => 'https://cliente2.com/premium',
                // Deixa os campos ABOUT herdar do template Premium (por isso ficam nulos)
            ]
        );

        // --- WhiteLabel 3 ligando-se ao Template Terceiro (sem override, herda 100%) ---
        WhiteLabel::updateOrCreate(
            ['slug' => 'cliente3'],
            [
                'name'        => 'Cliente 3',
                'template_id' => $tpl3->id,
                // Como não passamos overrides, usará 100% dos campos de $tpl3
            ]
        );

        // Você pode adicionar mais WhiteLabels aqui, usando tpl1, tpl2 ou tpl3,
        // e definindo overrides específicos ou deixando herdar padrões.
    }
}
