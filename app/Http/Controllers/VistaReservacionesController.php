<?php

namespace sisVentasWeb\Http\Controllers;

use Illuminate\Http\Request;

use highland\Http\Requests;
use Carbon\Carbon;
use DB;
use Response;
use Auth;
use sisVentasWeb\User;
use sisVentasWeb\Http\Controllers\Controller;


class VistaReservacionesController extends Controller
{
    public function index(Request $request)
    {
        if ($request)
        {
            $config = User::all()->first();

            $huesped=DB::table('users')
            ->where('id','=',Auth::user()->id)
            ->first();

            $reservas=DB::table('reservacion as r')
            ->join('users as u','r.idusuario','=','u.id')
            ->join('users as h','r.idhuesped','=','h.id')
            ->select('r.idreservacion','r.idusuario','r.idhuesped','r.fecha','r.codigo','r.abonado','r.tipo_pago','r.estado_reservacion','r.estado_saldo','r.estado','r.total','r.comentario','u.name','u.email','u.telefono','u.pais','u.departamento','u.direccion','u.num_documento','h.name as huesped','h.email as huespedEmail','h.telefono as huespedTelefono','h.pais as huespedPais','h.departamento as huespedDepartamento','h.direccion as huespedDireccion','h.num_documento as huespedNum_documento')
            ->where('r.idhuesped','=',$huesped->id)
            ->where('r.estado','=','Habilitado')
            ->groupBy('r.idreservacion','r.idusuario','r.idhuesped','r.fecha','r.codigo','r.abonado','r.tipo_pago','r.estado_reservacion','r.estado_saldo','r.estado','r.total','r.comentario','u.name','u.email','u.telefono','u.pais','u.departamento','u.direccion','u.num_documento','h.name','h.email','h.telefono','h.pais','h.departamento','h.direccion','h.num_documento')
            ->orderBy('fecha','desc')
            ->get();
    	
            return view("vistas.reservas.index",["config"=>$config,"huesped"=>$huesped,"reservas"=>$reservas]);
        }

    }
}
