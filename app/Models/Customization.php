<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customization extends Model
{
    use HasFactory;

    protected $fillable = [
        'white_label_id',
        'template_id',

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

    // Relação: pertence a um white label
    public function whiteLabel()
    {
        return $this->belongsTo(WhiteLabel::class);
    }

    // Relação: pertence a um template
    public function template()
    {
        return $this->belongsTo(Template::class);
    }
}
