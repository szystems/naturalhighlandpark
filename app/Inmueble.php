<?php

namespace sisVentasWeb;

use Illuminate\Database\Eloquent\Model;

class Inmueble extends Model
{
    protected $table='inmueble';

    protected $primaryKey='idinmueble';

    public $timestamps=false;


    protected $fillable =[
        'idtipo_inmueble',
    	'nombre',
    	'descripcion',
    	'estado_inmueble',
    	'estado'
    ];

    protected $guarded =[

    ];
}
