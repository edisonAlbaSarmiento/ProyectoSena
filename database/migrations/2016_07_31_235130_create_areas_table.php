<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('areas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombrearea');
            $table->string('descripcion');
            $table->integer('fkCentro')->unsigned();
            $table->integer('fkEstado')->unsigned();
            $table->foreign('fkCentro')->references('id')->on('centro_formacions')->onUpdate('cascade');
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
        Schema::drop('areas');
    }
}
