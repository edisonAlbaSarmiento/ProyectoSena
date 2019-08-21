<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequisitosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requisitos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fkTipoRequisito')->unsigned();
            $table->string('nombrerequisito');
            $table->string('observacion');
            $table->binary('archivoadjunto');
            $table->integer('fkGradoFormacion')->unsigned();
            $table->integer('fkEstadoRequisito')->unsigned();
            $table->foreign('fkTipoRequisito')->references('id')->on('tiporequisitos')->onUpdate('cascade');
            $table->foreign('fkGradoFormacion')->references('id')->on('grado_formacions')->onUpdate('cascade');
            $table->foreign('fkEstadoRequisito')->references('id')->on('estado_requisitos')->onUpdate('cascade');
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
        Schema::drop('requisitos');
    }
}
