<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WhiteLabel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'template_id',
        // A seguir, todas as colunas de override (nullable)
        'header_logo_url',
        'header_cta1_text',
        'header_cta1_url',
        'header_cta2_text',
        'header_cta2_url',
        'home_bg_image_url',
        'home_catchy_text',
        'home_cta_text',
        'home_cta_url',
        'about_acc1_title',
        'about_acc1_text',
        'about_acc2_title',
        'about_acc2_text',
        'about_acc3_title',
        'about_acc3_text',
        'about_acc4_title',
        'about_acc4_text',
    ];

    // Relação com Template (base)
    public function template()
    {
        return $this->belongsTo(Template::class);
    }

    /**
     * Retorna o valor final de um campo customizado, caindo no template caso seja NULL.
     * Exemplo de uso: $wl->getHeaderLogoUrl();
     */
    public function getHeaderLogoUrl()
    {
        return $this->header_logo_url ?? $this->template->header_logo_url;
    }

    public function getHeaderCta1Text()
    {
        return $this->header_cta1_text ?? $this->template->header_cta1_text;
    }

    // ... e assim por diante, criando getters para cada campo, se desejar ...
}
