<?php

namespace comercialBuyIt\Http\Controllers;

use Illuminate\Http\Request;

use comercialBuyIt\Http\Requests;
use comercialBuyIt\TipoProducto;

class ControladorTipoProducto extends Controller
{
    public function index(){
      $types = TipoProducto::paginate(10);
      return view('tipoProducto/index', compact('types'));
    }

    public function create(){
      $types = TipoProducto::paginate(10);
      return view('tipoProducto/create',compact('types'));
    }

    public function store(Request $request){
      TipoProducto::create([
        'descripcionTipoProducto' => $request->input('descripcionTipoProducto'),
        'idTipoProductoPadre' => $request->input('idTipoProductoPadre'),
      ]);

      return redirect('/tipoProducto')->with('message','Tipo de Producto Ingresado Correctamente');
    }

    public function edit($id){
      $type = TipoProducto::find($id);
      $types = TipoProducto::paginate();
      return view('tipoProducto/edit', ['type'=>$type],compact('types'));
    }

    public function update($id, Request $request){
      $type = TipoProducto::find($id);
      $type->fill([
        'descripcionTipoProducto' => $request->input('descripcionTipoProducto'),
        'idTipoProductoPadre' => $request->input('idTipoProductoPadre'),
      ]);
      $type->save();

      return redirect('/tipoProducto')->with('message','Tipo de Producto Editado Correctamente');
    }

    public function destroy($id){

      $type=TipoProducto::find($id);
      $type->delete();
      return redirect('/tipoProducto')->with('message','Tipo de Producto Eliminado Correctamente');

    }

    public function show(){

    }
}
