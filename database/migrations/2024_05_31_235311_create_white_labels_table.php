<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('white_labels', function (Blueprint $table) {
            $table->id();

            // Nome da White Label (ex.: “Cliente X”)
            $table->string('name');

            // Slug único para URL (ex.: “cliente-x”)
            $table->string('slug')->unique();

            // FK para o template base (que indica de qual template padrão este WL parte)
            $table->unsignedBigInteger('template_id');

            // ------------ Agora adicionamos todas as colunas de customização (override) ------------
            //
            // Qualquer campo abaixo pode ser NULL: se NULL, usamos o valor do template base.
            // Caso preenchido, sobrescreve o padrão do template.

            // HEADER: overrides
            $table->string('header_logo_url')->nullable();
            $table->string('header_cta1_text')->nullable();
            $table->string('header_cta1_url')->nullable();
            $table->string('header_cta2_text')->nullable();
            $table->string('header_cta2_url')->nullable();

            // HOME: overrides
            $table->string('home_bg_image_url')->nullable();
            $table->string('home_catchy_text')->nullable();
            $table->string('home_cta_text')->nullable();
            $table->string('home_cta_url')->nullable();

            // ABOUT: overrides (acordeon)
            $table->string('about_acc1_title')->nullable();
            $table->text('about_acc1_text')->nullable();
            $table->string('about_acc2_title')->nullable();
            $table->text('about_acc2_text')->nullable();
            $table->string('about_acc3_title')->nullable();
            $table->text('about_acc3_text')->nullable();
            $table->string('about_acc4_title')->nullable();
            $table->text('about_acc4_text')->nullable();

            $table->timestamps();

            // Índice e FK para templates(id)
            $table->foreign('template_id')
                ->references('id')
                ->on('templates')
                ->onDelete('cascade');

            // índice para busca rápida por slug
            $table->index('slug');
        });
    }

    public function down()
    {
        Schema::dropIfExists('white_labels');
    }
};
