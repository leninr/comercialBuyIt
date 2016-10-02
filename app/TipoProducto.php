<?php

namespace comercialBuyIt;

use Illuminate\Database\Eloquent\Model;

class TipoProducto extends Model
{
    protected $table = "tiposProducto";
    public $primaryKey  = 'idTipoProducto';
}
