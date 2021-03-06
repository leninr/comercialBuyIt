<?php

namespace buyIt\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          'userName' => 'required',
          'password' => 'required',
          'nombresUsuario' => 'required',
          'apellidosUsuario' => 'required',
          'emailUsuario' => 'required|unique:usuarios',
          'direccionUsuario' => 'required',
          'idCiudadUsuario' => 'required',
        ];
    }
}
