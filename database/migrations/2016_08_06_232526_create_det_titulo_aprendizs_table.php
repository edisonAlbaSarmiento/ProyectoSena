<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetTituloAprendizsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('det_titulo_aprendizs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fkTitulo')->unsigned();
            $table->integer('fkAprendiz')->unsigned();
            $table->foreign('fkTitulo')->references('id')->on('titulos')->onUpdate('cascade');
            $table->foreign('fkAprendiz')->references('id')->on('aprendizs')->onUpdate('cascade');
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
        Schema::drop('det_titulo_aprendizs');
    }
}
