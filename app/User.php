<?php

namespace sisVentasWeb;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\CanResetPassword;

class User extends Authenticatable
{
    use Notifiable;

    protected $table='users';

    protected $primaryKey='id';


    protected $fillable = [
        'name',
        'email', 
        'password', 
        'empresa', 
        'idempresa',
        'zona_horaria', 
        'moneda',  
        'tipo_usuario',
        'principal',
        'telefono',
        'pais',
        'departamento',
        'direccion',
        'num_documento',
        'estado'
        
    ];

    
    protected $hidden = [
        'password', 'remember_token',
    ];
}
