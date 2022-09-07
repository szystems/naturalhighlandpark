<?php

namespace sisVentasWeb;

use Illuminate\Database\Eloquent\Model;

class InmuebleImg extends Model
{
    protected $table='inmueble_img';

    protected $primaryKey='idinmueble_img';

    public $timestamps=false;


    protected $fillable =[
        'idinmueble',
    	'imagen'
    ];

    protected $guarded =[

    ];
}
