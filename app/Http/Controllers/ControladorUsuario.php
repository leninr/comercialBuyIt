<?php

namespace comercialBuyIt\Http\Controllers;

use Illuminate\Http\Request;
use comercialBuyIt\Http\Requests\UsuarioCreateRequest;
use comercialBuyIt\Http\Requests\UsuarioUpdateRequest;
use Session;
use comercialBuyIt\User;
use comercialBuyIt\Ciudad;
use comercialBuyIt\Http\Requests;
use Auth;

class ControladorUsuario extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->only('create');
        $this->middleware('auth')->only('edit');
        $this->middleware('admin')->only('index');
    }

    public function index(){
      // Solo elementos eliminados
      //$users = Usuario::onlyTrashed()->paginate(10);
      $users = User::paginate(10);
      $cities = Ciudad::All();
      return view('admin/usuario/index',compact('users'),compact('cities'));
    }

    public function create(){
      $cities = Ciudad::All();
      return view('admin/usuario/create',compact('cities'));
    }

    public function edit($id){
      $user = User::find($id);
      $cities = Ciudad::All();
      return view('auth/edit', ['user'=>$user],compact('cities'));
    }

    public function editMe(){
      $id = auth()->user()->idUsuario;
      $user = User::find($id);
      $cities = Ciudad::All();
      return view('admin/usuario/edit', ['user'=>$user],compact('cities'));
    }

    public function show($id){
    }

    public function store(Request $request){

        User::create([
          'name' => $request->input('name'),
          'password' => bcrypt($request->input('password')),
          'nombresUsuario' => $request->input('nombresUsuario'),
          'apellidosUsuario' => $request->input('apellidosUsuario'),
          'email' => $request->input('email'),
          'direccionUsuario' => $request->input('direccionUsuario'),
          'idCiudadUsuario' => $request->input('idCiudadUsuario'),
          'telefonoUsuario' => $request->input('telefonoUsuario'),
          'webPageUsuario' => $request->input('webPageUsuario'),
        ]);

        return redirect('/')->with('message','Usuario Ingresado Correctamente');
    }

    public function update($id, Request $request){
      $user = User::find($id);
      $user->fill($request->all());
      $user->save();

      if (auth()->user()->isAdmin == 1){
        return redirect('/usuario')->with('message','Usuario Editado Correctamente');
      }
      else {
        return redirect('/')->with('message','Editaste tu Perfil Correctamente');        
      }
    }

    public function destroy($id){

      $user=User::find($id);
      $user->delete();
      return redirect('/usuario')->with('message','Usuario Eliminado Correctamente');
    }

}
