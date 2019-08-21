<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAmbientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ambientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombreambiente');
            $table->integer('fkEstado')->unsigned();
            $table->integer('fkEntidad')->unsigned();
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
        Schema::drop('ambientes');
    }
}
