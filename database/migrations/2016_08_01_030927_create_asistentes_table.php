<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsistentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asistentes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombreasistente');
            $table->string('cargodependenciaentidad');
            $table->integer('fkacta')->unsigned();
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
        Schema::drop('asistentes');
    }
}
