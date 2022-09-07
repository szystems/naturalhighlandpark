<?php

namespace sisVentasWeb;

use Illuminate\Database\Eloquent\Model;

class Reservacion extends Model
{
    protected $table='reservacion';

    protected $primaryKey='idreservacion';

    public $timestamps=false;


    protected $fillable =[
    	'idusuario',
    	'idhuesped',
        'fecha',
        'codigo',
        'abonado',
        'tipo_pago',
        'estado_reservacion',
        'estado_saldo',
        'estado',
        'total',
        'comentario',
        'no_transaccion',
        'imagen_transaccion'
    ];

    protected $guarded =[

    ];
}
