<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContenidoDetalleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contenido_detalle', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->text('detalle');
            $table->integer('id_contenido')->unsigned()->references('id')->on('contenido');
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
        Schema::dropIfExists('contenido_detalle');
    }
}
