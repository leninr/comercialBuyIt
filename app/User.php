<?php

namespace comercialBuyIt;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    public $primaryKey  = 'idUsuario';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'password', 'nombresUsuario', 'apellidosUsuario', 'email', 'idCiudadUsuario',
        'direccionUsuario', 'telefonoUsuario', 'rateUsuario', 'webPageUsuario', 'isAdmin',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isAdmin()
    {
        return $this->isAdmin; // this looks for an admin column in your users table
    }
}
