<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('idProducto');
            $table->string('nombreProducto');
            $table->integer('rateProducto');
            $table->string('imagenProducto');
            $table->integer('stockProducto');
            $table->date('fechaProducto');
            $table->integer('idTipoProducto')->unsigned();
            $table->foreign('idTipoProducto')->references('idTipoProducto')->on('tipo_productos');
            $table->float('precioProducto', 8, 2);
            $table->string('estadoProducto');
            $table->integer('idUsuarioProducto')->unsigned();
            $table->foreign('idUsuarioProducto')->references('idUsuario')->on('users');
            $table->string('descripcionPagoProducto');
            $table->string('descripcionEntregaProducto');

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
        Schema::dropIfExists('productos');
    }
}
