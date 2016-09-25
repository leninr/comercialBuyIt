<?php

namespace buyIt\Http\Controllers;

use Illuminate\Http\Request;
use buyIt\Http\Requests\UsuarioCreateRequest;
use buyIt\Http\Requests\UsuarioUpdateRequest;
use Session;
use buyIt\Usuario;
use buyIt\Ciudad;
use buyIt\Http\Requests;

class ControladorUsuario extends Controller
{
    public function index(){
      // Solo elementos eliminados
      //$users = Usuario::onlyTrashed()->paginate(10);
      $users = Usuario::paginate(10);
      $cities = Ciudad::All();
      return view('admin/usuario/index',compact('users'),compact('cities'));
    }

    public function create(){
      $cities = Ciudad::All();
      return view('admin/usuario/create',compact('cities'));
    }

    public function edit($id){
      $user = Usuario::find($id);
      $cities = Ciudad::All();
      return view('admin/usuario/edit', ['user'=>$user],compact('cities'));
    }

    public function show($id){
    }

    public function store(UsuarioCreateRequest $request){

        Usuario::create([
          'userName' => $request->input('userName'),
          'password' => $request->input('password'),
          'nombresUsuario' => $request->input('nombresUsuario'),
          'apellidosUsuario' => $request->input('apellidosUsuario'),
          'emailUsuario' => $request->input('emailUsuario'),
          'direccionUsuario' => $request->input('direccionUsuario'),
          'idCiudadUsuario' => $request->input('idCiudadUsuario'),
        ]);

        return redirect('/usuario')->with('message','Usuario Ingresado Correctamente');
    }

    public function update($id, UsuarioUpdateRequest $request){
      $user = Usuario::find($id);
      $user->fill($request->all());
      $user->save();

      return redirect('/usuario')->with('message','Usuario Editado Correctamente');
    }

    public function destroy($id){

      $user=Usuario::find($id);
      $user->delete();
      return redirect('/usuario')->with('message','Usuario Eliminado Correctamente');
    }

}