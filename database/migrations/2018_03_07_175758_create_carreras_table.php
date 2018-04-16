<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarrerasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carreras', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('img')->nullable();
            $table->string('video')->nullable();
            $table->string('color')->nullable();
            $table->string('color_mobile')->nullable()->nullable();
            $table->string('imagen_referencial')->nullable();
            $table->string('color_fuente')->nullable();
            $table->string('color_linea_contenido')->nullable();
            $table->string('color_titulo_slide')->nullable();
            $table->string('color_link_slide')->nullable();
            $table->text('descripcion_carrera')->nullable();
            $table->string('variacion_tiempo');
            $table->string('tiempo_total');
            $table->text('certificaciones')->nullable();
            $table->text('ofrecemos')->nullable();
            $table->text('talento')->nullable();
            $table->text('nosotros')->nullable();
            $table->integer('id_mundo')->unsigned()->references('id')->on('mundos');
            $table->integer('orden')->unique();
            $table->unique(['id_mundo','orden']);
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
        Schema::dropIfExists('carreras');
    }
}
