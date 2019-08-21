<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetAmbienteActasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('det_ambiente_actas', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('fkAmbiente')->unsigned();
          $table->integer('fkActa')->unsigned();
          $table->foreign('fkAmbiente')->references('id')->on('ambientes')->onUpdate('cascade');
          $table->foreign('fkActa')->references('id')->on('actas')->onUpdate('cascade');
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
        Schema::drop('det_ambiente_actas');
    }
}
