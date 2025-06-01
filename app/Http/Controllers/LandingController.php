<?php

namespace App\Http\Controllers;

use App\Models\WhiteLabel;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    /**
     * Exibe a landing page de acordo com o slug da WhiteLabel.
     *
     * @param  string  $slug
     * @return \Illuminate\View\View
     */
    public function show($slug)
    {
        // 1. Busca a WhiteLabel pelo slug, já carregando o template
        $wl = WhiteLabel::with('template')
            ->where('slug', $slug)
            ->firstOrFail();

        $template = $wl->template;

        // 2. Prepara os dados que vamos injetar no Blade.
        //    Se existir valor em $wl (override), usa; senão, cai no valor padrão do template.
        $dados = [
            // HEADER
            'header_logo_url'  => $wl->header_logo_url  ?? $template->header_logo_url,
            'header_cta1_text' => $wl->header_cta1_text ?? $template->header_cta1_text,
            'header_cta1_url'  => $wl->header_cta1_url  ?? $template->header_cta1_url,
            'header_cta2_text' => $wl->header_cta2_text ?? $template->header_cta2_text,
            'header_cta2_url'  => $wl->header_cta2_url  ?? $template->header_cta2_url,

            // HOME
            'home_bg_image_url'=> $wl->home_bg_image_url ?? $template->home_bg_image_url,
            'home_catchy_text' => $wl->home_catchy_text  ?? $template->home_catchy_text,
            'home_cta_text'    => $wl->home_cta_text     ?? $template->home_cta_text,
            'home_cta_url'     => $wl->home_cta_url      ?? $template->home_cta_url,

            // ABOUT (Acordeon)
            'about_acc1_title' => $wl->about_acc1_title  ?? $template->about_acc1_title,
            'about_acc1_text'  => $wl->about_acc1_text   ?? $template->about_acc1_text,
            'about_acc2_title' => $wl->about_acc2_title  ?? $template->about_acc2_title,
            'about_acc2_text'  => $wl->about_acc2_text   ?? $template->about_acc2_text,
            'about_acc3_title' => $wl->about_acc3_title  ?? $template->about_acc3_title,
            'about_acc3_text'  => $wl->about_acc3_text   ?? $template->about_acc3_text,
            'about_acc4_title' => $wl->about_acc4_title  ?? $template->about_acc4_title,
            'about_acc4_text'  => $wl->about_acc4_text   ?? $template->about_acc4_text,
        ];

        // 3. Decide qual layout usar:
        //    Aqui mantemos: se template_id for 1 → layout1, senão layout2.
        //    Você pode adaptar para basear-se em um campo $wl->layout, se quiser.
        if ($template->id === 1) {
            return view('layouts.layout1', $dados);
        } else {
            return view('layouts.layout2', $dados);
        }
    }
}
