<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFichasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fichas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('numero')->unique();
            $table->time('HoraInicioSofia');
            $table->time('HoraFinSofia');
            $table->integer('fkPrograma')->unsigned();
            $table->integer('fkEntidad')->unsigned();
            $table->foreign('fkPrograma')->references('id')->on('programa_formacions')->onUpdate('cascade');
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
        Schema::drop('fichas');
    }
}
