<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAprendizsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aprendizs', function (Blueprint $table) {
          $table->increments('id');
          $table->string('nombreaprendiz');
          $table->string('apellido');
          $table->integer('fkTipoDoc')->unsigned();
          $table->biginteger('identificacion')->unique();
          $table->string('correo')->unique();
          $table->biginteger('telefonocelular');
          $table->integer('telefonofijo');
          $table->string('direccion');
          $table->integer('fkEstadoAprendiz')->unsigned();
          $table->integer('fkModalidad')->unsigned();
          $table->integer('fkFicha')->unsigned();
          $table->integer('fkuser')->unsigned();
          $table->foreign('fkTipoDoc')->references('id')->on('tipo_documentos')->onUpdate('cascade');
          $table->foreign('fkEstadoAprendiz')->references('id')->on('estado_aprendizs')->onUpdate('cascade');
          $table->foreign('fkModalidad')->references('id')->on('modalidads')->onUpdate('cascade');
          $table->foreign('fkFicha')->references('id')->on('fichas')->onUpdate('cascade');
          $table->foreign('fkuser')->references('id')->on('users')->onUpdate('cascade');
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
        Schema::drop('aprendizs');
    }
}
