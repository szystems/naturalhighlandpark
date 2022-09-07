<?php

namespace sisVentasWeb;

use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
    protected $table='bitacora';

    protected $primaryKey='idbitacora';

    public $timestamps=false;


    protected $fillable =[
    	'idempresa',
    	'idusuario',
    	'fecha',
    	'tipo',
    	'descripcion'
        
    ];

    protected $guarded =[

    ];
}
