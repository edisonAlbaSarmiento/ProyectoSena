<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetAprendizSeguimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('det_aprendiz_seguimientos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('autorseguimiento');
            $table->date('fecha');
            $table->integer('fkAprendiz')->unsigned();
            $table->integer('fkSeguimiento')->unsigned();
            $table->foreign('fkAprendiz')->references('id')->on('aprendizs')->onUpdate('cascade');
            $table->foreign('fkSeguimiento')->references('id')->on('seguimientos')->onUpdate('cascade');
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
        Schema::drop('det_aprendiz_seguimientos');
    }
}
