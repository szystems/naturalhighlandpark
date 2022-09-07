<?php

namespace sisVentasWeb;

use Illuminate\Database\Eloquent\Model;

class Caracteristica extends Model
{
    protected $table='caracteristica';

    protected $primaryKey='idcaracteristica';

    public $timestamps=false;


    protected $fillable =[
    	'idtipo_inmueble',
    	'nombre',
    	'descripcion'
        
    ];

    protected $guarded =[

    ];
}
