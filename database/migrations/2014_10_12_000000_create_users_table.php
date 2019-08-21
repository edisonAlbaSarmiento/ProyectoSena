<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
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
        Schema::create('users', function (Blueprint $table) {/*se hace una funcion para pasar los prametros dados por medio del blueprint y se crea la variable Table para identificar los atributos de las tablas */
            $table->increments('id');/*para crear el dato en auto incremento como el ID*/
            $table->string('name');/**/
            $table->string('email');/**/
            $table->string('password');/**/
            $table->rememberToken();/*recuerde Token que es para identificar  */
            $table->timestamps();/*guarda el momento en que se guardo el registro*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /*Para eliminar la tabla*/
        Schema::drop('users');
    }
}
