<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBitacorasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bitacoras', function (Blueprint $table) {
            $table->increments('id');
            $table->string('regional');
            $table->integer('fkCentro')->unsigned();
            $table->integer('fkPrograma')->unsigned();
            $table->integer('fkFicha')->unsigned();
            $table->string('nombreaprendiz');
            $table->string('apellido');
            $table->integer('fkTipoDoc')->unsigned();
            $table->integer('identificacion')->unique();
            $table->biginteger('telefonoaprendiz');
            $table->string('correo')->unique();
            $table->string('razonsocial');
            $table->string('direccionempresa');
            $table->integer('nit');
            $table->string('nombreresponsable');
            $table->string('cargo');
            $table->biginteger('telefonoempresa');
            $table->string('emailempresa');
            $table->binary('archivoadjunto');
            $table->foreign('fkCentro')->references('id')->on('centro_formacions')->onUpdate('cascade');
            $table->foreign('fkPrograma')->references('id')->on('programa_formacions')->onUpdate('cascade');
            $table->foreign('fkFicha')->references('id')->on('Fichas')->onUpdate('cascade');
            $table->foreign('fkTipoDoc')->references('id')->on('tipo_documentos')->onUpdate('cascade');
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
        Schema::drop('bitacoras');
    }
}
