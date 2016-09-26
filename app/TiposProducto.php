<?php

namespace comercialBuyIt;

use Illuminate\Database\Eloquent\Model;

class TiposProducto extends Model
{
    protected $table = "tipoProductos";
    public $primaryKey  = 'idTipoProductos';
}
