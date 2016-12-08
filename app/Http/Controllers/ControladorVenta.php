<?php

namespace comercialBuyIt\Http\Controllers;

use Illuminate\Http\Request;

use comercialBuyIt\Http\Requests;

class ControladorVenta extends Controller
{
    public function checkout(){
      return view('venta/checkout');
    }

    public function index(){


    }

    public function create(){

        return view('venta/create');
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
