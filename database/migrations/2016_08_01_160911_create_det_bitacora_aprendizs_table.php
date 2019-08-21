<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetBitacoraAprendizsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('det_bitacora_aprendizs', function (Blueprint $table) {
          $table->increments('id');
          $table->date('fecha');
          $table->integer('fkAprendiz')->unsigned();
          $table->integer('fkBitacora')->unsigned();
          $table->foreign('fkAprendiz')->references('id')->on('aprendizs')->onUpdate('cascade');
          $table->foreign('fkBitacora')->references('id')->on('bitacoras')->onUpdate('cascade');
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
        Schema::drop('det_bitacora_aprendizs');
    }
}
