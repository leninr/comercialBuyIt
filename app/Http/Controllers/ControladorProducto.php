<?php

namespace comercialBuyIt\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use comercialBuyIt\Producto;
use comercialBuyIt\TipoProducto;
use comercialBuyIt\User;
use Session;
use comercialBuyIt\Http\Requests;
use comercialBuyIt\Http\Requests\ProductoCreateRequest;
use comercialBuyIt\Http\Requests\ProductoUpdateRequest;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use Auth;

class ControladorProducto extends Controller
{
    public function index(){
      $products = Producto::paginate(10);
      $types = TipoProducto::All();
      $users = User::All();
      return view('producto/index', compact('products', 'types', 'users'));
    }

    public function create(){
      $types = TipoProducto::All();
      return view('producto/create',compact('types'));
    }

    public function misProductos(){
      $idUser = auth()->user()->idUsuario;
      $myproducts = Producto::where('idUsuarioProducto', '=',$idUser)->orderBy('fechaProducto')->paginate(10);
      $types = TipoProducto::All();
      return view('producto/misProductos', compact('myproducts', 'types'));
    }

    public function addToCart($id, Request $request){


        $product = Producto::find($id);

        $new_product["product_code"] = $product->idProducto;
        $new_product["product_name"] = $product->nombreProducto;
        $new_product["product_price"] = $product->precioProducto;

        if(isset($_SESSION["cart_products"])){  //if session var already exist
            if(isset($_SESSION["cart_products"][$new_product['product_code']])) //check item exist in products array
            {
                unset($_SESSION["cart_products"][$new_product['product_code']]); //unset old array item
            }
        }
        $request->session()->push('cart_products', $id);
        //$_SESSION["cart_products"][$new_product['product_code']] = $new_product; //update or create product session with new item
        $products = Producto::paginate(10);
        $types = TipoProducto::All();
        $users = User::All();
        return view('producto/index', compact('products', 'types', 'users'));
    }


    public function updateDeleteCart(){
      //update or remove items
      if(isset($_POST["product_qty"]) || isset($_POST["remove_code"]))
      {
          //update item quantity in product session
          if(isset($_POST["product_qty"]) && is_array($_POST["product_qty"])){
              foreach($_POST["product_qty"] as $key => $value){
                  if(is_numeric($value)){
                      $_SESSION["cart_products"][$key]["product_qty"] = $value;
                  }
              }
          }
          //remove an item from product session
          if(isset($_POST["remove_code"]) && is_array($_POST["remove_code"])){
              foreach($_POST["remove_code"] as $key){
                  unset($_SESSION["cart_products"][$key]);
              }
          }
      }
    }

    public function edit($id){
      $product = Producto::find($id);
      $types = TipoProducto::All();
      return view('producto/edit', ['product'=>$product],compact('types'));
    }

    public function store(Request $request){

      /*$file = Input::file('pic');
      $filename = $request->file('pic')->getClientOriginalName();*/

      $image = Input::file('pic');
      $filename  = time() . '.' . $image->getClientOriginalExtension();

      $path = public_path('imgs/' . $filename);
      Image::make($image->getRealPath())->resize(200, 200)->save($path);


      $idUser = auth()->user()->idUsuario;

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
          'idUsuarioProducto' => $idUser,
          'descripcionPagoProducto' => $request->input('descripcionPagoProducto'),
          'descripcionEntregaProducto' => $request->input('descripcionEntregaProducto'),
        ]);

        return redirect('/misProductos')->with('message','Producto Ingresado Correctamente');
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
      $product = Producto::find($id);
      $types = TipoProducto::All();
      $users = User::All();
      return view('producto/ver', ['product'=>$product],compact('types', 'users'));
    }


    public function update($id, Request $request){
      $product = Producto::find($id);
      //$product->fill($request->all());

      //$image = $request->input('pic');
      //$foto = $request->input('pic');
      /*$image = $request(Input::file('pic'));

      $filename  = time() . '.' . $image->getClientOriginalExtension();

      $path = public_path('imgs/' . $filename);
      Image::make($image->getRealPath())->resize(200, 200)->save($path);

*/
      $idUser = auth()->user()->idUsuario;

      $product->fill([
        'nombreProducto' => $request->input('nombreProducto'),
        'imagenProducto' => $filename,
        'stockProducto' => $request->input('stockProducto'),
        'fechaProducto' => Carbon::now()->toDateString(),
        'idTipoProducto' => $request->input('idTipoProducto'),
        'precioProducto' => $request->input('precioProducto'),
        'estadoProducto' => $request->input('estadoProducto'),
        'idUsuarioProducto' => $idUser,
        'descripcionPagoProducto' => $request->input('descripcionPagoProducto'),
        'descripcionEntregaProducto' => $request->input('descripcionEntregaProducto'),
      ]);
      $product->save();

      return redirect('/misProductos')->with('message','Producto Editado Correctamente');
    }

    public function destroy($id){

      $product=Producto::find($id);
      $product->delete();
      return redirect('/misProductos')->with('message','Producto Eliminado Correctamente');
    }
}
