<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customization;
use App\Models\WhiteLabel;
use App\Models\Template;

class CustomizationsTableSeeder extends Seeder
{
    public function run()
    {
        // Obter as white labels criadas
        $wlBasic   = WhiteLabel::where('slug', 'wl-demo-basic')->first();
        $wlPremium = WhiteLabel::where('slug', 'wl-demo-premium')->first();

        // Obter os templates (para registrar template_id dentro de customization)
        $templateBasic   = Template::where('name', 'Template Telemedicina Básico')->first();
        $templatePremium = Template::where('name', 'Template Telemedicina Premium')->first();

        // Customização para WL Demo Básico (override de algumas cores e textos)
        Customization::updateOrCreate(
            ['white_label_id' => $wlBasic->id],
            [
                'white_label_id'    => $wlBasic->id,
                'template_id'       => $templateBasic->id,

                // HEADER override
                'header_logo_url'   => 'https://via.placeholder.com/150x50?text=WL+Basic+Logo',
                'header_cta1_text'  => 'Quero Agendar',
                'header_cta1_url'   => 'https://wl-basic.com/agendar',
                'header_cta2_text'  => 'Suporte WL',
                'header_cta2_url'   => 'https://wl-basic.com/contato',

                // HOME override
                'home_bg_image_url' => 'https://via.placeholder.com/1200x600?text=WL+Basic+Home',
                'home_catchy_text'  => 'Bem-vindo ao WL Básico!',
                'home_cta_text'     => 'Saiba Mais WL',
                'home_cta_url'      => 'https://wl-basic.com/saiba-mais',

                // ABOUT override
                'about_acc1_title'  => 'WL Básico: Nossos Serviços',
                'about_acc1_text'   => 'Consultas online simplificadas para pequenas clínicas.',
                'about_acc2_title'  => 'WL Básico: Equipe',
                'about_acc2_text'   => 'Profissionais parceiros do WL Basic que atendem 24/7.',
                'about_acc3_title'  => 'WL Básico: Tecnologia',
                'about_acc3_text'   => 'Plataforma leve desenvolvida para velocidade.',
                'about_acc4_title'  => 'WL Básico: Suporte',
                'about_acc4_text'   => 'Canal exclusivo de suporte ao cliente WL.',
            ]
        );

        // Customização para WL Demo Premium (override diferente)
        Customization::updateOrCreate(
            ['white_label_id' => $wlPremium->id],
            [
                'white_label_id'    => $wlPremium->id,
                'template_id'       => $templatePremium->id,

                // HEADER override
                'header_logo_url'   => 'https://via.placeholder.com/150x50?text=WL+Premium+Logo',
                'header_cta1_text'  => 'Começar Agora',
                'header_cta1_url'   => 'https://wl-premium.com/começar',
                'header_cta2_text'  => 'Fale com o Premium',
                'header_cta2_url'   => 'https://wl-premium.com/suporte',

                // HOME override
                'home_bg_image_url' => 'https://via.placeholder.com/1200x600?text=WL+Premium+Home',
                'home_catchy_text'  => 'Experiência Premium 24h',
                'home_cta_text'     => 'Teste Grátis Agora',
                'home_cta_url'      => 'https://wl-premium.com/teste-gratis',

                // ABOUT override
                'about_acc1_title'  => 'WL Premium: Cobertura',
                'about_acc1_text'   => 'Suporte nacional em tempo real para grandes clientes.',
                'about_acc2_title'  => 'WL Premium: Consultas Ilimitadas',
                'about_acc2_text'   => 'Plano premium sem limites de atendimentos.',
                'about_acc3_title'  => 'WL Premium: Alta Tecnologia',
                'about_acc3_text'   => 'Soluções avançadas de telemedicina e segurança.',
                'about_acc4_title'  => 'WL Premium: Testemunhos',
                'about_acc4_text'   => 'Depoimentos de grandes clínicas parceiras do WL Premium.',
            ]
        );
    }
}
