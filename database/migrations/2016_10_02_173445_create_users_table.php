<?php

use Illuminate\Support\Facades\Schema;
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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('idUsuario');
            $table->string('name');
            $table->string('password');
            $table->string('nombresUsuario');
            $table->string('apellidosUsurio');
            $table->string('email')->unique();
            $table->integer('idCiudadUsuario')->unsigned();
            $table->foreign('idCiudadUsuario')->references('idCiudad')->on('ciudades');
            $table->string('direccionUsuario');
            $table->char('telefonoUsuario', 7);
            $table->integer('rateUsuario');
            $table->string('webPage');

            $table->rememberToken();
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
        Schema::drop('users');
    }
}
