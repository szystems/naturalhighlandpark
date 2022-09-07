<?php

namespace sisVentasWeb;

use Illuminate\Database\Eloquent\Model;

class TipoInmueble extends Model
{
    protected $table='tipo_inmueble';

    protected $primaryKey='idtipo_inmueble';

    public $timestamps=false;


    protected $fillable =[
    	'nombre',
    	'descripcion',
        'maxpersonas',
        'minpersonas',
        'menoresxpareja',
    	'estado_tipoinmueble',
    	'estado',
        'mascotas',
        'maxmascotas'
        
    ];

    protected $guarded =[

    ];
}
