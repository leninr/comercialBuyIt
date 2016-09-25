<?php

namespace buyIt\Http\Controllers;

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
}
