<?php

namespace buyIt\Http\Controllers;

use Auth;
use Session;
use Redirect;
use Illuminate\Http\Request;
use buyIt\Http\Requests;
use buyIt\Http\Requests\LoginRequest;

class LogController extends Controller
{
    public function index(){
      return view('/login');
    }

    public function store(LoginRequest $request){
      return $request->$userName;
    }

    public function show($id){

    }
}
