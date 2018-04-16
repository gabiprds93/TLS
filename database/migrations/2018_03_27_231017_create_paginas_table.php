<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaginasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paginas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->string('subtitulo')->nullable();
            $table->string('link')->nullable();
            $table->string('url_link')->nullable();
            $table->enum('tipo_pagina',['1','2','3']);//Pagina 1, Pagina 2, Pagina 3
            $table->string('video')->nullable();
            $table->string('titulo_1')->nullable();
            $table->text('contenido_1')->nullable();
            $table->string('titulo_2')->nullable();
            $table->text('contenido_2')->nullable();
            $table->string('titulo_3')->nullable();
            $table->text('contenido_3')->nullable();
            $table->string('color')->nullable();
            $table->string('color_fuente')->nullable();
            $table->string('color_titulo')->nullable();
            $table->string('color_linea')->nullable();
            $table->integer('id_seccion')->unsigned()->references('id')->on('secciones');
            $table->string('slug');
            $table->enum('activo',['A','I'])->default('A');//Activo, Inactivo
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paginas');
    }
}