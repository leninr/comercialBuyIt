<?php

namespace buyIt\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use buyIt\Producto;
use buyIt\TiposProducto;
use Session;
use buyIt\Http\Requests;
use buyIt\Http\Requests\ProductoCreateRequest;
use buyIt\Http\Requests\ProductoUpdateRequest;
use Illuminate\Support\Facades\Input;

class ControladorProducto extends Controller
{
    public function index(){

      $products = Producto::paginate(10);
      $types = TiposProducto::All();
      return view('producto/index', compact('products'),compact('types'));
    }

    public function create(){
      $types = TiposProducto::All();
      return view('producto/create',compact('types'));
    }

    public function store(ProductoCreateRequest $request){

      /*$file = Input::file('pic');
      $filename = $request->file('pic')->getClientOriginalName();*/

      $image = Input::file('pic');
      $filename  = time() . '.' . $image->getClientOriginalExtension();

      $path = public_path('imgs/' . $filename);
      Image::make($image->getRealPath())->resize(200, 200)->save($path);


       /*$img = Image::make(Input::file('pic')->getClientOriginalName());
       $img->resize(320, 240);
       $img->save('public/imgs/time() . '.' . bar.jpg');*/


        Producto::create([
          'descripcionProducto' => $request->input('descripcionProducto'),
          'idTipoProducto' => $request->input('idTipoProducto'),
          'imagenProducto' => $filename,
        ]);

        return redirect('/producto')->with('message','Producto Ingresado Correctamente');
    }

    public function showPicture($id)
    {
        $picture = Picture::findOrFail($id);
        $pic = Image::make($picture->pic);
        $response = Response::make($pic->encode('jpeg'));

        //setting content-type
        $response->header('Content-Type', 'image/jpeg');

        return $response;
    }

    public function show($id){
    }
}