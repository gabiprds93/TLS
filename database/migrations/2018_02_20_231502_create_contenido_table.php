<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContenidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contenido', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->string('subtitulo')->nullable();
            $table->enum('posicion_links',['A','D'])->default('A');
            $table->enum('slide_lab',['S','N'])->default('N');
            $table->text('texto_contenido')->nullable();
            $table->text('pie_contenido')->nullable();
            $table->string('video')->nullable();
            $table->integer('id_seccion')->unsigned()->references('id')->on('secciones');
            $table->integer('orden');
            $table->string('color_contenido')->nullable();
            $table->string('color_detalle')->nullable();
            $table->string('color_titulo')->nullable();
            $table->string('color_link')->nullable();
            $table->string('color_sub_link')->nullable();
            $table->string('color_sub_tab')->nullable();
            $table->string('imagen_fondo')->nullable();
            $table->string('imagen_app')->nullable();
            $table->string('link_android')->nullable();
            $table->string('link_ios')->nullable();
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
        Schema::dropIfExists('contenido');
    }
}
