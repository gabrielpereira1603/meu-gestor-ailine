<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('templates', function (Blueprint $table) {
            $table->id();

            // Nome do template
            $table->string('name')->unique();

            // HEADER: 1 logo e 2 calls to action
            $table->string('header_logo_url');
            $table->string('header_cta1_text');
            $table->string('header_cta1_url');
            $table->string('header_cta2_text');
            $table->string('header_cta2_url');

            // HOME: imagem de fundo, texto chamativo e 1 call to action
            $table->string('home_bg_image_url');
            $table->string('home_catchy_text');
            $table->string('home_cta_text');
            $table->string('home_cta_url');

            // ABOUT: acordeon com 4 titles e textos
            $table->string('about_acc1_title');
            $table->text('about_acc1_text');
            $table->string('about_acc2_title');
            $table->text('about_acc2_text');
            $table->string('about_acc3_title');
            $table->text('about_acc3_text');
            $table->string('about_acc4_title');
            $table->text('about_acc4_text');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('templates');
    }
};
