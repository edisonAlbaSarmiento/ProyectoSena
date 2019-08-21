<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetEntidadAprendizsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('det_entidad_aprendizs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fkEntidad')->unsigned();
            $table->integer('fkAprendiz')->unsigned();
            $table->foreign('fkEntidad')->references('id')->on('entidads')->onUpdate('cascade');
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
        Schema::drop('det_entidad_aprendizs');
    }
}
