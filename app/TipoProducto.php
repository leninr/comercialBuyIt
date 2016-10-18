<?php

namespace comercialBuyIt;

use Illuminate\Database\Eloquent\Model;

class TipoProducto extends Model
{
    protected $table = "tipo_productos";
    public $primaryKey  = 'idTipoProducto';
}
