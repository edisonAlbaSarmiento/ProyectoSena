<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePasswordResetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         /*Creacion De Las Tablas */
        /*clase Schema funciona para manipular tablas en las base de datos. */
        Schema::create('password_resets', function (Blueprint $table) {/*se hace una funcion para pasar los prametros dados por medio del blueprint y se crea la variable Table para identificar los atributos de las tablas */
            $table->string('email')->index();
            $table->string('token')->index();
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('password_resets');
    }
}
