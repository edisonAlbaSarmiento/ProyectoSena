<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvitadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invitados', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombreinvitado');
            $table->string('cargo');
            $table->string('entidad');
            $table->integer('fkacta')->unsigned()->nullable();
            $table->foreign('fkacta')->references('id')->on('actas')->onUpdate('cascade');
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
        Schema::drop('invitados');
    }
}
