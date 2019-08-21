<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramaFormacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programa_formacions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombreprograma');
            $table->string('descripcion');
            $table->integer('fkArea')->unsigned();
            $table->integer('fkGrado')->unsigned();
            $table->integer('fkEstado')->unsigned();
            $table->foreign('fkArea')->references('id')->on('areas')->onUpdate('cascade');
            $table->foreign('fkGrado')->references('id')->on('grado_formacions')->onUpdate('cascade');
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
        Schema::drop('programa_formacions');
    }
}
