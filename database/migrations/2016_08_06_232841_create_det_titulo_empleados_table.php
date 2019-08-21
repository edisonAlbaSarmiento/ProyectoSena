<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetTituloEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('det_titulo_empleados', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fkTitulo')->unsigned();
            $table->integer('fkEmpleado')->unsigned();
            $table->foreign('fkTitulo')->references('id')->on('titulos')->onUpdate('cascade');
            $table->foreign('fkEmpleado')->references('id')->on('empleados')->onUpdate('cascade');
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
        Schema::drop('det_titulo_empleados');
    }
}
