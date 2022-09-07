<?php

namespace sisVentasWeb\Http\Controllers;

use Illuminate\Http\Request;

use highland\Http\Requests;

use sisVentasWeb\ReservacionCliente;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sisVentasWeb\Http\Requests\ReservacionClienteFormRequest;
use Carbon\Carbon;


use DB;
use Response;
use Auth;
use sisVentasWeb\User;
use sisVentasWeb\Reservacion;
use sisVentasWeb\Bitacora;

use sisVentasWeb\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class ReservacionClienteController extends Controller
{
    public function index(Request $request)
    {
        if ($request)
        {
            $user = User::all()->first();

            $idtipo_inmueble = $request->get('idtipo_inmueble');
            $zona_horaria = $user->zona_horaria;
            $hoy = Carbon::now($zona_horaria);
            $hoy = date("Y-m-d", strtotime($hoy));
            $entrada = trim($request->get('entrada'));
            $salida = trim($request->get('salida'));

                       
            
            $compHoy = strtotime($hoy);
            $compEntrada = date("Y-m-d", strtotime($entrada));
            $compSalida = date("Y-m-d", strtotime ($salida."- 1 days"));

            if($compEntrada < $hoy)
            {
                $entrada = $hoy;
                $entrada = date("d-m-Y", strtotime($entrada));
                $compEntrada = date("Y-m-d", strtotime($entrada));
            }

            if($compSalida <= $hoy)
            {
                $salida = date("d-m-Y", strtotime ($hoy."+ 1 days"));
                $compSalida = date("Y-m-d", strtotime ($salida."- 1 days"));
            }

            $allRes = DB::table('detalle_reservacion')
            ->get();

            $temporadas=DB::table('temporada as t')
            ->join('tipo_inmueble as ti','t.idtipo_inmueble','=','ti.idtipo_inmueble')
            ->where('t.idtipo_inmueble','LIKE','%'.$idtipo_inmueble.'%')
            ->where('t.estado_temporada','=','Activo')
            ->where('t.estado','=','Habilitado')
            ->orderBy('t.fecha_inicial','asc')
            ->get();

            $tiposInmueble=DB::table('tipo_inmueble')
            ->where('estado','=','Habilitado')
            ->get();
    	
            return view("vistas.reservaciones.index",["entrada"=>$entrada,"salida"=>$salida,"hoy"=>$hoy,"allRes"=>$allRes,"temporadas"=>$temporadas,"compEntrada"=>$compEntrada,"compSalida"=>$compSalida,"tiposInmueble"=>$tiposInmueble,"idtipo_inmueble"=>$idtipo_inmueble,"user"=>$user]);
        }

    }

    protected function dias_transcurridos($fecha_i,$fecha_f)
    {
        $dias	= (strtotime($fecha_i)-strtotime($fecha_f))/86400;
        $dias 	= abs($dias); $dias = floor($dias);		
        return $dias;
    }

    public function create(Request $request)
    {
        

        $user = User::all()->first();

        $idtipo_inmueble = $request->get('idtipo_inmueble');
        $zona_horaria = $user->zona_horaria;
        $hoy = Carbon::now($zona_horaria);
        $hoy = date("Y-m-d", strtotime($hoy));
        $entrada = trim($request->get('entrada'));
        $salida = trim($request->get('salida'));
        
        $compHoy = strtotime($hoy);
        $compEntrada = date("Y-m-d", strtotime($entrada));
        $compSalida = date("Y-m-d", strtotime ($salida."- 1 days"));

        $allRes = DB::table('detalle_reservacion')
            ->get();

        $temporadas=DB::table('temporada as t')
            ->join('tipo_inmueble as ti','t.idtipo_inmueble','=','ti.idtipo_inmueble')
            ->where('t.idtipo_inmueble','LIKE','%'.$idtipo_inmueble.'%')
            ->where('t.estado_temporada','=','Activo')
            ->where('t.estado','=','Habilitado')
            ->orderBy('t.fecha_inicial','asc')
            ->get();

        $tiposInmueble=DB::table('tipo_inmueble')
            ->where('estado','=','Habilitado')
            ->get();
    	
            return view("vistas.reservaciones.create",["entrada"=>$entrada,"salida"=>$salida,"hoy"=>$hoy,"allRes"=>$allRes,"temporadas"=>$temporadas,"compEntrada"=>$compEntrada,"compSalida"=>$compSalida,"tiposInmueble"=>$tiposInmueble,"idtipo_inmueble"=>$idtipo_inmueble,"user"=>$user]);
    }

    public function showReserva(Request $request)
    {
        $codigo = $request->get('codigo');
            
        $reservacion=DB::table('reservacion as r')
            ->join('users as u','r.idusuario','=','u.id')
            ->join('users as h','r.idhuesped','=','h.id')
            ->select('r.idreservacion','r.idusuario','r.idhuesped','r.fecha','r.codigo','r.abonado','r.tipo_pago','r.estado_reservacion','r.estado_saldo','r.estado','r.total','r.comentario','r.no_transaccion','r.imagen_transaccion','u.name','u.email','u.telefono','u.pais','u.departamento','u.direccion','u.num_documento','h.name as huesped','h.email as huespedEmail','h.telefono as huespedTelefono','h.pais as huespedPais','h.departamento as huespedDepartamento','h.direccion as huespedDireccion','h.num_documento as huespedNum_documento')
            ->where('r.codigo','=',$codigo)
            ->groupBy('r.idreservacion','r.idusuario','r.idhuesped','r.fecha','r.codigo','r.abonado','r.tipo_pago','r.estado_reservacion','r.estado_saldo','r.estado','r.total','r.comentario','r.no_transaccion','r.imagen_transaccion','u.name','u.email','u.telefono','u.pais','u.departamento','u.direccion','u.num_documento','h.name','h.email','h.telefono','h.pais','h.departamento','h.direccion','h.num_documento')
            ->first();

        

            $user = User::all()->first();
        
        
        if ($reservacion != null)
        {
            $idReservacion = $reservacion->idreservacion;

            $detalles=DB::table('detalle_reservacion as dr')
        	->join('inmueble as i','dr.idinmueble','=','i.idinmueble')
            ->join('temporada as t','dr.idtemporada','=','t.idtemporada')
        	->where('dr.idreservacion','=',$idReservacion)
        	->get();
                
            $user = User::all()->first();
            return view("vistas.vcarrito.show",["reservacion"=>$reservacion,"detalles"=>$detalles,"user"=>$user]);
        }
        else
        {
            $request->session()->flash('alert-danger', 'No se encontro ninguna reservacion con el codigo: '.$codigo.', porfavor revise si escribio correctamente el codigo.');
            if ($request)
            {
                $user = User::all()->first();

                $idtipo_inmueble = $request->get('idtipo_inmueble');
                $zona_horaria = $user->zona_horaria;
                $hoy = Carbon::now($zona_horaria);
                $hoy = date("Y-m-d", strtotime($hoy));
                $entrada = trim($request->get('entrada'));
                $salida = trim($request->get('salida'));

                        
                
                $compHoy = strtotime($hoy);
                $compEntrada = date("Y-m-d", strtotime($entrada));
                $compSalida = date("Y-m-d", strtotime ($salida."- 1 days"));

                if($compEntrada < $hoy)
                {
                    $entrada = $hoy;
                    $entrada = date("d-m-Y", strtotime($entrada));
                    $compEntrada = date("Y-m-d", strtotime($entrada));
                }

                if($compSalida <= $hoy)
                {
                    $salida = date("d-m-Y", strtotime ($hoy."+ 1 days"));
                    $compSalida = date("Y-m-d", strtotime ($salida."- 1 days"));
                }

                $allRes = DB::table('detalle_reservacion')
                ->get();

                $temporadas=DB::table('temporada as t')
                ->join('tipo_inmueble as ti','t.idtipo_inmueble','=','ti.idtipo_inmueble')
                ->where('t.idtipo_inmueble','LIKE','%'.$idtipo_inmueble.'%')
                ->where('t.estado_temporada','=','Activo')
                ->where('t.estado','=','Habilitado')
                ->orderBy('t.fecha_inicial','asc')
                ->get();

                $tiposInmueble=DB::table('tipo_inmueble')
                ->where('estado','=','Habilitado')
                ->get();
            
                return view("vistas.reservaciones.index",["entrada"=>$entrada,"salida"=>$salida,"hoy"=>$hoy,"allRes"=>$allRes,"temporadas"=>$temporadas,"compEntrada"=>$compEntrada,"compSalida"=>$compSalida,"tiposInmueble"=>$tiposInmueble,"idtipo_inmueble"=>$idtipo_inmueble,"user"=>$user]);
            }
        }
    }

    
}
