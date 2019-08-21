<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actas', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->integer('fkTipoActa')->unsigned();
            $table->string('descripcion');
            $table->time('HoraInicio');
            $table->time('HoraFin');
            $table->string('temas');
            $table->string('objetivo');
            $table->string('desarrolloreunion');
            $table->string('conclusion');
            $table->binary('archivoadjunto');
            $table->integer('fkEstado')->unsigned();
            $table->foreign('fkTipoActa')->references('id')->on('tipo_actas')->onUpdate('cascade');
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
        Schema::drop('actas');
    }
}
