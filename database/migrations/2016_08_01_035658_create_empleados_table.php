<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombreempleado');
            $table->string('apellido');
            $table->integer('fkTipoDoc')->unsigned();
            $table->biginteger('identificacion')->unique();
            $table->string('direccion');
            $table->integer('telefonofijo');
            $table->biginteger('telefonocelular');
            $table->string('correo');
            $table->integer('fkCentro')->unsigned();
            $table->integer('fkEstado')->unsigned();
            $table->integer('fkuser')->unsigned();
            $table->foreign('fkTipoDoc')->references('id')->on('tipo_documentos')->onUpdate('cascade');
            $table->foreign('fkCentro')->references('id')->on('centro_formacions')->onUpdate('cascade');
            $table->foreign('fkEstado')->references('id')->on('estados')->onUpdate('cascade');
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
        Schema::drop('empleados');
    }
}
