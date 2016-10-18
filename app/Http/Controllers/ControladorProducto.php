<?php

namespace comercialBuyIt\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use comercialBuyIt\Producto;
use comercialBuyIt\TipoProducto;
use Session;
use comercialBuyIt\Http\Requests;
use comercialBuyIt\Http\Requests\ProductoCreateRequest;
use comercialBuyIt\Http\Requests\ProductoUpdateRequest;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;

class ControladorProducto extends Controller
{
    public function index(){

      $products = Producto::paginate(10);
      $types = TipoProducto::All();
      return view('producto/index', compact('products'),compact('types'));
    }

    public function create(){
      $types = TipoProducto::All();
      return view('producto/create',compact('types'));
    }

    public function store(Request $request){

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
          'nombreProducto' => $request->input('nombreProducto'),
          'imagenProducto' => $filename,
          'stockProducto' => $request->input('stockProducto'),
          'fechaProducto' => Carbon::now()->toDateString(),
          'idTipoProducto' => $request->input('idTipoProducto'),
          'precioProducto' => $request->input('precioProducto'),
          'estadoProducto' => $request->input('estadoProducto'),
          'idUsuarioProducto' => $request->input('idUsuarioProducto'),
          'descripcionPagoProducto' => $request->input('descripcionPagoProducto'),
          'descripcionEntregaProducto' => $request->input('descripcionEntregaProducto'),
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
