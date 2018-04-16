<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarreraListasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carrera_listas', function (Blueprint $table) {
            $table->increments('id');
            $table->text('certificaciones')->nullable();
            $table->text('ofrecemos')->nullable();
            $table->text('talento')->nullable();
            $table->text('nosotros')->nullable();
            $table->integer('id_carrera')->unsigned()->references('id')->on('carreras');
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
        Schema::dropIfExists('carrera_listas');
    }
}
