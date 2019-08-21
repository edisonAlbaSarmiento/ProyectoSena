<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetEmpleadoRolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('det_empleado_rols', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fkEmpleado')->unsigned();
            $table->integer('fkRol')->unsigned();
            $table->foreign('fkEmpleado')->references('id')->on('empleados')->onUpdate('cascade');
            $table->foreign('fkRol')->references('id')->on('rols')->onUpdate('cascade');

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
        Schema::drop('det_empleado_rols');
    }
}
