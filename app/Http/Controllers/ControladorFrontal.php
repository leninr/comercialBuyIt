<?php

namespace comercialBuyIt\Http\Controllers;

use Illuminate\Http\Request;

use buyIt\Http\Requests;

class ControladorFrontal extends Controller
{
    public function main(){
      return view('main');
    }

    // Administrador

    public function admin(){
      return view('admin/menuAdmin');
    }

    public function __construct()
    {
        //$this->middleware('auth');
        $this->middleware('admin', ['only' => ['admin']]);
    }
}
