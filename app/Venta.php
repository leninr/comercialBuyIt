<?php

namespace comercialBuyIt;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table = "ventas";
    public $primaryKey  = 'idVenta';

    protected $fillable = [
        'idUsuarioCompradorVenta', 'idUsuarioVendedorVenta', 'idProductoVenta', 'cantidadVenta', 'fechaVenta', 
    ];
}
