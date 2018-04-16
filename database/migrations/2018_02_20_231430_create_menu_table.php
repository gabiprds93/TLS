<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('url');
            $table->string('sublink_1')->nullable();
            $table->string('url_1')->nullable();
            $table->string('sublink_2')->nullable();
            $table->string('url_2')->nullable();
            $table->string('sublink_3')->nullable();
            $table->string('url_3')->nullable();
            $table->string('sublink_4')->nullable();
            $table->string('url_4')->nullable();
            $table->string('sublink_5')->nullable();
            $table->string('url_5')->nullable();
            $table->integer('orden')->unique();
            $table->integer('id_seccion')->unsigned()->references('id')->on('secciones');
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
        Schema::dropIfExists('menu');
    }
}
