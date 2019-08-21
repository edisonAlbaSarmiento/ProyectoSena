<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntidadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entidads', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fkTipoEntidad')->unsigned();
            $table->string('nombreentidad');
            $table->string('direccion');
            $table->biginteger('telefono');
            $table->integer('fkEstado')->unsigned();
            $table->foreign('fkTipoEntidad')->references('id')->on('tipo_entidads')->onUpdate('cascade');
            $table->foreign('fkEstado')->references('id')->on('estados')->onUpdate('cascade');
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
        Schema::drop('entidads');
    }
}
