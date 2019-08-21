<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agendas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->date('fechaasignacion');
            $table->date('fecharealizacion');
            $table->time('hora');
            $table->integer('fkEntidad')->unsigned();
            $table->integer('fkEmpleado')->unsigned();
            $table->integer('fkEstado')->unsigned();
            $table->foreign('fkEmpleado')->references('id')->on('empleados')->onUpdate('cascade');
            $table->foreign('fkEstado')->references('id')->on('estados')->onUpdate('cascade');
            $table->foreign('fkEntidad')->references('id')->on('entidads')->onUpdate('cascade');
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
        Schema::drop('agendas');
    }
}
