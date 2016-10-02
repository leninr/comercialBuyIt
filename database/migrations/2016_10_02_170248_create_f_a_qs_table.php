<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFAQsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faqs', function (Blueprint $table) {
            $table->increments('idFaq');
            $table->string('preguntaFaq');
            $table->integer('idUsuarioFaq')->unsigned();
            $table->foreign('idUsuarioFaq')->references('idUsuario')->on('users');
            $table->integer('idProductoFaq')->unsigned();
            $table->foreign('idProductoFaq')->references('idProducto')->on('productos');

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
        Schema::dropIfExists('faqs');
    }
}
