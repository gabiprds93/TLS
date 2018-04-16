<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeneralTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo_sld_carrera')->nullable();
            $table->string('color_sld_carrera')->nullable();
            $table->string('color_tit_sld_carrera')->nullable();
            $table->string('color_linea_sld')->nullable();
            $table->string('color_sld_sedes')->nullable();
            $table->string('color_sld_contacto')->nullable();
            $table->string('imagen_contacto')->nullable();
            $table->string('video_contacto')->nullable();
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
        Schema::dropIfExists('general');
    }
}
