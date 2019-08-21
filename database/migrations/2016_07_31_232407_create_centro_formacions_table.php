<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCentroFormacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('centro_formacions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombrecentro');
            $table->string('direccion');
            $table->biginteger('telefono');
            $table->integer('fkCiudad')->unsigned();
            $table->foreign('fkCiudad')->references('id')->on('ciudads')->onUpdate('cascade');
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
        Schema::drop('centro_formacions');
    }
}
