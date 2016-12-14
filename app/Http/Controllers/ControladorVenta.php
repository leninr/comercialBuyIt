<?php

namespace comercialBuyIt\Http\Controllers;

use Illuminate\Http\Request;
use comercialBuyIt\User;
use comercialBuyIt\Venta;
use comercialBuyIt\Producto;
use Gloudemans\Shoppingcart\Facades\Cart;

use comercialBuyIt\Http\Requests;

class ControladorVenta extends Controller
{
    public function checkout(){
      return view('venta/checkout');
    }

    public function index(){


    }

    public function create(){
        $id = auth()->user()->idUsuario;
        $user = User::find($id);
        return view('venta/create', ['user'=>$user]);
    }

    public function edit($id){

    }

    public function store(){

      foreach(Cart::content() as $row) {
          $product = Producto::find($row->id);
          $id = auth()->user()->idUsuario;

          Venta::create([
            'idUsuarioCompradorVenta' => $id,
            'idUsuarioVendedorVenta' => $product->idUsuarioProducto,
            'idProductoVenta' => $row->id,
            'cantidadVenta' => $row->qty,
            'fechaVenta' => strftime('%F'),
          ]);
      }

      Cart::destroy();

      return redirect('producto')->with('message','Venta Realizada Correctamente');
    }

    public function misCompras(){
      $idUser = auth()->user()->idUsuario;
      $myBuyings = Venta::where('idUsuarioCompradorVenta', '=',$idUser)->orderBy('fechaVenta')->paginate(10);
      return view('venta/misCompras', compact('myBuyings'));
    }

    public function misVentas(){
      $idUser = auth()->user()->idUsuario;
      $mySales = Venta::where('idUsuarioVendedorVenta', '=',$idUser)->orderBy('fechaVenta')->paginate(10);
      return view('venta/misVentas', compact('mySales'));
    }

    public function show(){

    }

    public function update($id, Request $request){

    }

    public function destroy($id){

    }
}
