<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompromisosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compromisos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Actividades');
            $table->string('responsables');
            $table->date('fecha');
            $table->integer('fkacta')->unsigned();
            $table->integer('fkestado')->unsigned();
            $table->foreign('fkacta')->references('id')->on('actas')->onUpdate('cascade');
            $table->foreign('fkestado')->references('id')->on('estados')->onUpdate('cascade');
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
        Schema::drop('compromisos');
    }
}
