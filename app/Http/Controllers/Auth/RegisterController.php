<?php

namespace comercialBuyIt\Http\Controllers\Auth;

use comercialBuyIt\User;
use Validator;
use comercialBuyIt\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use comercialBuyIt\Ciudad;
use Illuminate\Http\Request;
use comercialBuyIt\Http\Requests;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'nombres' => 'required|max:255',
            'apellidos' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'ciudad' => 'required',
            'direccion' => 'required|max:255',
            'telefono' => 'required|max:7',
            'rate' => '',
            'webPage' => 'required|max:255',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'password' => bcrypt($data['password']),
            'nombresUsuario' => $data['nombres'],
            'apellidosUsuario' => $data['apellidos'],
            'email' => $data['email'],
            'idCiudadUsuario' => $data['ciudad'],
            'direccionUsuario' => $data['direccion'],
            'telefonoUsuario' => $data['telefono'],
            'rateUsuario' => $data['rate'],
            'webPageUsuario' => $data['webPage'],
        ]);
    }


   public function register(Request $request)
   {
       $this->validator($request->all())->validate();

       event(new Registered($user = $this->create($request->all())));

       $this->guard()->login($user);

       return redirect($this->redirectPath());
   }


  public function showRegistrationForm()
  {

      $cities = Ciudad::All();
      return view('auth.register',compact('cities'));
  }
}
