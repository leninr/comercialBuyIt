<?php

namespace comercialBuyIt\Http\Controllers;

use Illuminate\Http\Request;
use comercialBuyIt\User;

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

    public function store(Request $request){

    }

    public function show(){

    }

    public function update($id, Request $request){

    }

    public function destroy($id){

    }
}
