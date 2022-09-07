<?php

namespace sisVentasWeb;

use Illuminate\Database\Eloquent\Model;

class Configuracion extends Model
{
    protected $table='users';

    protected $primaryKey='id';

    public $timestamps=false;


    protected $fillable = [
        'empresa',
        'zona_horaria', 
        'moneda', 
        'logo', 
        'nom_imp', 
        'porcentaje_imp', 
    ];
}
