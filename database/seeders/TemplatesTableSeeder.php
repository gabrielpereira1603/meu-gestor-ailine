<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Template;

class TemplatesTableSeeder extends Seeder
{
    public function run()
    {
        // Template 1: Telemedicina Básico
        Template::updateOrCreate(
            ['name' => 'Template Telemedicina Básico'],
            [
                'header_logo_url'   => 'https://via.placeholder.com/150x50?text=Logo+Basic',
                'header_cta1_text'  => 'Agendar Consulta',
                'header_cta1_url'   => 'https://example.com/agendar',
                'header_cta2_text'  => 'Fale Conosco',
                'header_cta2_url'   => 'https://example.com/contato',

                'home_bg_image_url' => 'https://via.placeholder.com/1200x600?text=Home+BG+Basic',
                'home_catchy_text'  => 'Consultas Online 24/7',
                'home_cta_text'     => 'Saiba Mais',
                'home_cta_url'      => 'https://example.com/saiba-mais',

                'about_acc1_title'  => 'Nossos Serviços',
                'about_acc1_text'   => 'Oferecemos consultas com médicos especialistas via videochamada.',
                'about_acc2_title'  => 'Equipe Qualificada',
                'about_acc2_text'   => 'Médicos com anos de experiência em suas respectivas áreas.',
                'about_acc3_title'  => 'Como Funciona',
                'about_acc3_text'   => 'Basta agendar, conectar-se e realizar a consulta sem sair de casa.',
                'about_acc4_title'  => 'Planos e Preços',
                'about_acc4_text'   => 'Planos mensais a partir de R$ 49,90, sem fidelidade.',
            ]
        );

        // Template 2: Telemedicina Premium
        Template::updateOrCreate(
            ['name' => 'Template Telemedicina Premium'],
            [
                'header_logo_url'   => 'https://via.placeholder.com/150x50?text=Logo+Premium',
                'header_cta1_text'  => 'Agendar Agora',
                'header_cta1_url'   => 'https://example.com/agendar-premium',
                'header_cta2_text'  => 'Suporte 24h',
                'header_cta2_url'   => 'https://example.com/suporte-premium',

                'home_bg_image_url' => 'https://via.placeholder.com/1200x600?text=Home+BG+Premium',
                'home_catchy_text'  => 'Atendimento Diferenciado',
                'home_cta_text'     => 'Experimente Grátis',
                'home_cta_url'      => 'https://example.com/experimente',

                'about_acc1_title'  => 'Cobertura Global',
                'about_acc1_text'   => 'Atendemos pacientes em todo o Brasil com alta qualidade.',
                'about_acc2_title'  => 'Consultas Ilimitadas',
                'about_acc2_text'   => 'Realize quantas consultas precisar no plano Premium.',
                'about_acc3_title'  => 'Tecnologia Avançada',
                'about_acc3_text'   => 'Nossa plataforma utiliza criptografia de ponta-a-ponta.',
                'about_acc4_title'  => 'Depoimentos',
                'about_acc4_text'   => 'Confira histórias reais de quem já usou nossos serviços.',
            ]
        );
    }
}
