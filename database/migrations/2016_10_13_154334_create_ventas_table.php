<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->increments('idVenta');
            $table->integer('idUsuarioCompradorVenta')->unsigned();
            $table->foreign('idUsuarioCompradorVenta')->references('idUsuario')->on('users');
            $table->integer('idProductoVenta')->unsigned();
            $table->foreign('idProductoVenta')->references('idProducto')->on('productos');
            $table->integer('cantidadVenta');
            $table->date('fechaVenta');            
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
        Schema::dropIfExists('ventas');
    }
}
