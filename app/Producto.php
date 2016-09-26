<?php

namespace comercialBuyIt;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
      use SoftDeletes;

      protected $table = "productos";
      public $primaryKey  = 'idProducto';

     protected $fillable = [
         'descripcionProducto', 'calificacionProducto', 'stockTotalProducto', 'idTipoProducto', 'imagenProducto',
     ];
}
