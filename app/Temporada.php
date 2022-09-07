<?php

namespace sisVentasWeb;

use Illuminate\Database\Eloquent\Model;

class Temporada extends Model
{
    protected $table='temporada';

    protected $primaryKey='idtemporada';

    public $timestamps=false;


    protected $fillable =[
    	'idtipo_inmueble',
    	'fecha_inicial',
    	'fecha_final',
        'precio',
        'preciomenor',
        'preciomascota',
        'promopersonagratis',
        'promonumpersonas',
        'estado_temporada',
        'estado'
        
    ];

    protected $guarded =[

    ];
}
