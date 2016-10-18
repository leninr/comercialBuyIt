<?php

namespace comercialBuyIt;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = "productos";
    public $primaryKey  = 'idProducto';

    protected $fillable = [
        'nombreProducto', 'rateProducto', 'imagenProducto', 'stockProducto', 'fechaProducto',
        'idTipoProducto', 'precioProducto', 'estadoProducto', 'idUsuarioProducto', 'descripcionPagoProducto',
        'descripcionEntregaProducto',
    ];
}
