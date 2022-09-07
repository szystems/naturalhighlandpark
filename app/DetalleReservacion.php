<?php

namespace sisVentasWeb;

use Illuminate\Database\Eloquent\Model;

class DetalleReservacion extends Model
{
    protected $table='detalle_reservacion';

    protected $primaryKey='idreservacion';

    public $timestamps=false;


    protected $fillable = [
        'idreservacion',
        'idinmueble', 
        'fecha_entrada', 
        'fecha_salida', 
        'cant_mayores', 
        'cant_menores', 
        'cant_mascotas', 
        'precio_mayores', 
        'precio_menores',
        'precio_mascotas'
    ];
}
