<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\WhiteLabel;
use App\Models\Template;

class WhiteLabelsTableSeeder extends Seeder
{
    public function run()
    {
        // Obter os templates recém-criados
        $templateBasic   = Template::where('name', 'Template Telemedicina Básico')->first();
        $templatePremium = Template::where('name', 'Template Telemedicina Premium')->first();

        // Criar White Label 1 vinculado ao Template Básico
        WhiteLabel::updateOrCreate(
            ['slug' => 'wl-demo-basic'],
            [
                'name'        => 'WL Demo Básico',
                'slug'        => 'wl-demo-basic',
                'template_id' => $templateBasic->id,
            ]
        );

        // Criar White Label 2 vinculado ao Template Premium
        WhiteLabel::updateOrCreate(
            ['slug' => 'wl-demo-premium'],
            [
                'name'        => 'WL Demo Premium',
                'slug'        => 'wl-demo-premium',
                'template_id' => $templatePremium->id,
            ]
        );
    }
}
