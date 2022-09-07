<?php

namespace sisVentasWeb\Http\Controllers;

use Illuminate\Http\Request;

use sisVentasWeb\Http\Requests;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sisVentasWeb\Http\Requests\ReservacionFormRequest;
use sisVentasWeb\Http\Requests\ReservacionSaldoFormRequest;
use sisVentasWeb\Http\Requests\InmuebleFormRequest;


use sisVentasWeb\Reservacion;
use sisVentasWeb\DetalleReservacion;
use sisVentasWeb\Habitacion;
use sisVentasWeb\Bitacora;
use DB;

use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;

use Auth;
use sisVentasWeb\User;

use sisVentasWeb\Mail\ReservacionMail;
use Illuminate\Support\Facades\Mail;

class ReservacionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if ($request)
        {
            $idempresa = Auth::user()->idempresa;
            
            $usuario=trim($request->get('usuario'));
            $huesped=trim($request->get('husped'));

            $desde=trim($request->get('desde'));
            $hasta=trim($request->get('hasta'));

            $desde = date("Y-m-d", strtotime($desde));
            $hasta = date("Y-m-d", strtotime($hasta));

            $estado_saldo=trim($request->get('estado_saldo'));
            $estado_reservacion=trim($request->get('estado_reservacion'));
            $tipo_pago=trim($request->get('tipo_pago'));

            $xsearch = trim($request->get('xsearch'));
            if ($xsearch == "")
            {
                $xsearch = "xfiltros";
            }

            $tiposInmueble=DB::table('tipo_inmueble')
            ->where('estado','=','Habilitado')
            ->get();

            $huespedes=DB::table('users')
            ->where('tipo_usuario','=','Huesped')
            ->where('estado','=','Habilitado')
            ->get();

            $usuarios=DB::table('users')
            ->where('tipo_usuario','=','Administrador')
            ->where('estado','=','Habilitado')
            ->get();

            $usufiltro=DB::table('users')
			->select('name','id')
            ->where('id','=',$usuario)
            ->get();
                    
            $huespedfiltro=DB::table('users')
			->select('name','id')
            ->where('id','=',$huesped)
            ->get();

            $zona_horaria = Auth::user()->zona_horaria;
            $hoy = Carbon::now($zona_horaria);
            $hoy = $hoy->format('d-m-Y');

            if ($xsearch == "xfiltros")
            {
                if($desde != '1970-01-01' or $hasta != '1970-01-01')
                {
                    if ( $estado_saldo == null )
                    {
                        $reservaciones=DB::table('reservacion as r')
                            ->join('users as u','r.idusuario','=','u.id')
                            ->join('users as h','r.idhuesped','=','h.id')
                            ->select('r.idreservacion','r.idusuario','r.idhuesped','r.fecha','r.codigo','r.abonado','r.tipo_pago','r.estado_reservacion','r.estado_saldo','r.estado','r.total','r.comentario','r.no_transaccion','r.imagen_transaccion','u.name','u.email','u.telefono','u.pais','u.departamento','u.direccion','u.num_documento','h.name as huesped','h.email as huespedEmail','h.telefono as huespedTelefono','h.pais as huespedPais','h.departamento as huespedDepartamento','h.direccion as huespedDireccion','h.num_documento as huespedNum_documento')
                            ->whereBetween('r.fecha', [$desde, $hasta])
                            ->where('h.id','LIKE','%'.$huesped.'%')
                            ->where('u.id','LIKE','%'.$usuario.'%')
                            ->where('r.estado','=','Habilitado')
                            ->where('r.estado_reservacion','LIKE','%'.$estado_reservacion.'%')
                            ->where('r.tipo_pago','LIKE','%'.$tipo_pago.'%')
                            ->orderBy('r.fecha','asc')
                            ->groupBy('r.idreservacion','r.idusuario','r.idhuesped','r.fecha','r.codigo','r.abonado','r.tipo_pago','r.estado_reservacion','r.estado_saldo','r.estado','r.total','r.comentario','r.no_transaccion','r.imagen_transaccion','u.name','u.email','u.telefono','u.pais','u.departamento','u.direccion','u.num_documento','h.name','h.email','h.telefono','h.pais','h.departamento','h.direccion','h.num_documento')
                            ->paginate(20);
                    }
                    elseif ( $estado_saldo != null )
                    {
                        $reservaciones=DB::table('reservacion as r')
                            ->join('users as u','r.idusuario','=','u.id')
                            ->join('users as h','r.idhuesped','=','h.id')
                            ->select('r.idreservacion','r.idusuario','r.idhuesped','r.fecha','r.codigo','r.abonado','r.tipo_pago','r.estado_reservacion','r.estado_saldo','r.estado','r.total','r.comentario','r.no_transaccion','r.imagen_transaccion','u.name','u.email','u.telefono','u.pais','u.departamento','u.direccion','u.num_documento','h.name as huesped','h.email as huespedEmail','h.telefono as huespedTelefono','h.pais as huespedPais','h.departamento as huespedDepartamento','h.direccion as huespedDireccion','h.num_documento as huespedNum_documento')
                            ->whereBetween('r.fecha', [$desde, $hasta])
                            ->where('h.id','LIKE','%'.$huesped.'%')
                            ->where('u.id','LIKE','%'.$usuario.'%')
                            ->where('r.estado','=','Habilitado')
                            ->where('r.estado_reservacion','LIKE','%'.$estado_reservacion.'%')
                            ->where('r.tipo_pago','LIKE','%'.$tipo_pago.'%')
                            ->where('r.estado_saldo','=',$estado_saldo)
                            ->orderBy('r.fecha','asc')
                            ->groupBy('r.idreservacion','r.idusuario','r.idhuesped','r.fecha','r.codigo','r.abonado','r.tipo_pago','r.estado_reservacion','r.estado_saldo','r.estado','r.total','r.comentario','r.no_transaccion','r.imagen_transaccion','u.name','u.email','u.telefono','u.pais','u.departamento','u.direccion','u.num_documento','h.name','h.email','h.telefono','h.pais','h.departamento','h.direccion','h.num_documento')
                            ->paginate(20);
                    }
                }
                else
                {
                    $reservaciones=DB::table('reservacion as r')
                        ->join('users as u','r.idusuario','=','u.id')
                        ->join('users as h','r.idhuesped','=','h.id')
                        ->select('r.idreservacion','r.idusuario','r.idhuesped','r.fecha','r.codigo','r.abonado','r.tipo_pago','r.estado_reservacion','r.estado_saldo','r.estado','r.total','r.comentario','r.no_transaccion','r.imagen_transaccion','u.name','u.email','u.telefono','u.pais','u.departamento','u.direccion','u.num_documento','h.name as huesped','h.email as huespedEmail','h.telefono as huespedTelefono','h.pais as huespedPais','h.departamento as huespedDepartamento','h.direccion as huespedDireccion','h.num_documento as huespedNum_documento')
                        ->where('r.estado','=','Habilitado')
                        ->where('r.estado_reservacion','LIKE','%'.$estado_reservacion.'%')
                        ->where('r.tipo_pago','LIKE','%'.$tipo_pago.'%')
                        ->orderBy('r.fecha','asc')
                        ->groupBy('r.idreservacion','r.idusuario','r.idhuesped','r.fecha','r.codigo','r.abonado','r.tipo_pago','r.estado_reservacion','r.estado_saldo','r.estado','r.total','r.comentario','r.no_transaccion','r.imagen_transaccion','u.name','u.email','u.telefono','u.pais','u.departamento','u.direccion','u.num_documento','h.name','h.email','h.telefono','h.pais','h.departamento','h.direccion','h.num_documento')
                        ->paginate(20);
                }
                $searchCodigo="";
                return view('reservaciones.reservacion.index',["reservaciones"=>$reservaciones,"huespedes"=>$huespedes,"usuarios"=>$usuarios,"desde"=>$desde,"hasta"=>$hasta,"huesped"=>$huesped,"usuario"=>$usuario,"estado_saldo"=>$estado_saldo,"estado_reservacion"=>$estado_reservacion,"tipo_pago"=>$tipo_pago,"hoy"=>$hoy,"usufiltro"=>$usufiltro,"huespedfiltro"=>$huespedfiltro,"searchCodigo"=>$searchCodigo,"tiposInmueble"=>$tiposInmueble]);
            }
            if($xsearch == "xcod")
            {
                
                $searchCodigo=trim($request->get('searchCodigo'));

                $reservaciones=DB::table('reservacion as r')
                    ->join('users as u','r.idusuario','=','u.id')
                    ->join('users as h','r.idhuesped','=','h.id')
                    ->select('r.idreservacion','r.idusuario','r.idhuesped','r.fecha','r.codigo','r.abonado','r.tipo_pago','r.estado_reservacion','r.estado_saldo','r.estado','r.total','r.comentario','r.no_transaccion','r.imagen_transaccion','u.name','u.email','u.telefono','u.pais','u.departamento','u.direccion','u.num_documento','h.name as huesped','h.email as huespedEmail','h.telefono as huespedTelefono','h.pais as huespedPais','h.departamento as huespedDepartamento','h.direccion as huespedDireccion','h.num_documento as huespedNum_documento')
                    ->where('r.estado','=','Habilitado')
                    ->where('r.codigo','LIKE','%'.$searchCodigo.'%')
                    ->orderBy('r.fecha','desc')
                    ->groupBy('r.idreservacion','r.idusuario','r.idhuesped','r.fecha','r.codigo','r.abonado','r.tipo_pago','r.estado_reservacion','r.estado_saldo','r.estado','r.total','r.comentario','r.no_transaccion','r.imagen_transaccion','u.name','u.email','u.telefono','u.pais','u.departamento','u.direccion','u.num_documento','h.name','h.email','h.telefono','h.pais','h.departamento','h.direccion','h.num_documento')
                    ->paginate(20);

           
            
                    return view('reservaciones.reservacion.index',["reservaciones"=>$reservaciones,"huespedes"=>$huespedes,"usuarios"=>$usuarios,"desde"=>$desde,"hasta"=>$hasta,"huesped"=>$huesped,"usuario"=>$usuario,"estado_saldo"=>$estado_saldo,"estado_reservacion"=>$estado_reservacion,"tipo_pago"=>$tipo_pago,"hoy"=>$hoy,"usufiltro"=>$usufiltro,"huespedfiltro"=>$huespedfiltro,"searchCodigo"=>$searchCodigo,"tiposInmueble"=>$tiposInmueble]);
            }
        }

    }

    protected function dias_transcurridos($fecha_i,$fecha_f)
    {
        $dias	= (strtotime($fecha_i)-strtotime($fecha_f))/86400;
        $dias 	= abs($dias); $dias = floor($dias);		
        return $dias;
    }

    public function store (ReservacionFormRequest $request)
    {
    	try
    	{
            $idhuesped = $request->get('idhuesped');
            $idusuario = $request->get('idusuario');
            $idtipo_inmueble = $request->get('idtipo_inmueble');
            $zona_horaria = Auth::user()->zona_horaria;
            $hoy = Carbon::now($zona_horaria);
            $hoy = date("Y-m-d", strtotime($hoy));
            $entrada = trim($request->get('entrada'));
            $salida = trim($request->get('salida'));
            $estado_reservacion = $request->get('estado_reservacion');
            $tipo_pago = $request->get('tipo_pago');
            $abonado = $request->get('abonado');
            $total = $request->get('total');

            if($total == $abonado)
            {
                $estado_saldo = "Pagado";
            }
            else
            {
                $estado_saldo = "Pendiente";
            }

            //Generar codigo de reservacion
            $CodigoRepetido = 1;
            while ($CodigoRepetido >= 1):
                $permitted_chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $generar_codigo_reservacion = substr(str_shuffle($permitted_chars), 0, 10);

                $codigoOrdenUnico=DB::table('reservacion')
                ->where('codigo','=',$generar_codigo_reservacion)
                ->get();

                $CodigoRepetido = count($codigoOrdenUnico);
            endwhile;

            $reservacion=new Reservacion;
            $reservacion->idusuario=$idusuario;
            $reservacion->idhuesped=$idhuesped;
            $reservacion->fecha=$hoy;
            $reservacion->codigo=$generar_codigo_reservacion;
            $reservacion->abonado=$abonado;
            $reservacion->tipo_pago=$tipo_pago;
            $reservacion->estado_reservacion=$estado_reservacion;
            $reservacion->estado_saldo=$estado_saldo;
            $reservacion->estado='Habilitado';
            $reservacion->total=$total;
            $reservacion->comentario="";
            $reservacion->save();

            $compHoy = strtotime($hoy);
            $compEntrada = date("Y-m-d", strtotime($entrada));
            $compSalida = date("Y-m-d", strtotime ($salida."- 1 days"));

            $huespedes=DB::table('users')
            ->where('tipo_usuario','=','Huesped')
            ->where('estado','=','Habilitado')
            ->get();

            $allRes = DB::table('detalle_reservacion')
            ->get();

            $temporadas=DB::table('temporada as t')
            ->join('tipo_inmueble as ti','t.idtipo_inmueble','=','ti.idtipo_inmueble')
            ->where('t.idtipo_inmueble','LIKE','%'.$idtipo_inmueble.'%')
            ->where('t.estado_temporada','=','Activo')
            ->where('t.estado','=','Habilitado')
            ->orderBy('t.fecha_inicial','asc')
            ->get();

            $reservacion=DB::table('reservacion as r')
            ->join('users as u','r.idusuario','=','u.id')
            ->join('users as h','r.idhuesped','=','h.id')
            ->where('r.idreservacion','=',$reservacion->idreservacion)
            ->first();

            $detalles=DB::table('detalle_reservacion as dr')
            ->join('reservacion as r','dr.idreservacion','=','r.idreservacion')
            ->join('inmueble as i','dr.idinmueble','=','i.idinmueble')
            ->where('r.idreservacion','=',$reservacion->idreservacion)
            ->orderBy('dr.iddetalle_reservacion','asc')
            ->get();

            $tiposInmueble=DB::table('tipo_inmueble')
            ->where('estado','=','Habilitado')
            ->get();

        }catch(\Exception $e)
        {
            DB::rollback();
        }   

    	return view("reservaciones.reservacion.edit",["huespedes"=>$huespedes,"entrada"=>$entrada,"salida"=>$salida,"hoy"=>$hoy,"allRes"=>$allRes,"temporadas"=>$temporadas,"compEntrada"=>$compEntrada,"compSalida"=>$compSalida,"reservacion"=>$reservacion,"detalles"=>$detalles,"tiposInmueble"=>$tiposInmueble,"idtipo_inmueble"=>$idtipo_inmueble]);
    }



    public function edit($id)
    {
        $zona_horaria = Auth::user()->zona_horaria;
        $hoy = Carbon::now($zona_horaria);
        $hoy = date("Y-m-d", strtotime($hoy));
        $entrada = date("Y-m-d", strtotime($hoy));
        $salida = date("Y-m-d", strtotime($entrada.'+ 1 days'));            

        $compHoy = strtotime($hoy);
        $compEntrada = date("Y-m-d", strtotime($entrada));
        $compSalida = date("Y-m-d", strtotime ($salida."- 1 days"));

        $huespedes=DB::table('users')
            ->where('tipo_usuario','=','Huesped')
            ->where('estado','=','Habilitado')
            ->get();

        $allRes = DB::table('detalle_reservacion')
            ->get();

        $temporadas=DB::table('temporada as t')
            ->join('tipo_inmueble as ti','t.idtipo_inmueble','=','ti.idtipo_inmueble')
            ->where('t.estado_temporada','=','Activo')
            ->where('t.estado','=','Habilitado')
            ->orderBy('t.fecha_inicial','asc')
            ->get();

        $reservacion=DB::table('reservacion as r')
            ->join('users as u','r.idusuario','=','u.id')
            ->join('users as h','r.idhuesped','=','h.id')
            ->where('r.idreservacion','=',$id)
            ->first();

        $detalles=DB::table('detalle_reservacion as dr')
            ->join('reservacion as r','dr.idreservacion','=','r.idreservacion')
            ->join('inmueble as i','dr.idinmueble','=','i.idinmueble')
            ->where('r.idreservacion','=',$id)
            ->orderBy('dr.iddetalle_reservacion','asc')
            ->get();
        
        $tiposInmueble=DB::table('tipo_inmueble')
            ->where('estado','=','Habilitado')
            ->get();

        return view("reservaciones.reservacion.edit",["huespedes"=>$huespedes,"entrada"=>$entrada,"salida"=>$salida,"hoy"=>$hoy,"allRes"=>$allRes,"temporadas"=>$temporadas,"compEntrada"=>$compEntrada,"compSalida"=>$compSalida,"reservacion"=>$reservacion,"detalles"=>$detalles,"tiposInmueble"=>$tiposInmueble]);
    }

    public function update(ReservacionFormRequest $request,$id)
    {
        
        $idhuesped = $request->get('idhuesped');
        $estado_reservacion = $request->get('estado_reservacion');
        $tipo_pago = $request->get('tipo_pago');
        $total = $request->get('total');
        $abonado = $request->get('abonado');
        $saldo = $request->get('saldo');
        $abonar = $request->get('abonar');
        $comentarios = $request->get('comentarios');
        $no_transaccion = $request->get('no_transaccion');
        $imagen_transaccion = $request->get('imagen_transaccion');

        //abonamos y cambiamos estado_saldo
        if($abonar != "0")
        {
            $abonado = $abonado + $abonar;
        }

        if($total == $abonado)
        {
            $estado_saldo = "Pagado";
        }else
        {
            $estado_saldo = "Pendiente";
        }

        $zona_horaria = Auth::user()->zona_horaria;
        $hoy = Carbon::now($zona_horaria);
        $hoy = date("Y-m-d", strtotime($hoy));
        $entrada = date("Y-m-d", strtotime($hoy));
        $salida = date("Y-m-d", strtotime($entrada.'+ 1 days'));

        $compHoy = strtotime($hoy);
        $compEntrada = date("Y-m-d", strtotime($entrada));
        $compSalida = date("Y-m-d", strtotime ($salida."- 1 days"));

        $reservacion=Reservacion::findOrFail($id);
        $reservacion->idhuesped=$idhuesped;
        $reservacion->abonado=$abonado;
        $reservacion->tipo_pago=$tipo_pago;
        $reservacion->estado_reservacion=$estado_reservacion;
        $reservacion->estado_saldo=$estado_saldo;
        $reservacion->comentario=$comentarios;
        $reservacion->no_transaccion=$no_transaccion;

        if (input::hasfile('imagen_transaccion')){
            $permitted_chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $generar_codigo_imagen = substr(str_shuffle($permitted_chars), 0, 5);

        	$file=Input::file('imagen_transaccion');
        	$file->move(public_path().'/imagenes/transacciones/',$generar_codigo_imagen.$file->getClientOriginalName());
        	$reservacion->imagen_transaccion=$generar_codigo_imagen.$file->getClientOriginalName();
        }

        $reservacion->update();

        $huespedes=DB::table('users')
            ->where('tipo_usuario','=','Huesped')
            ->where('estado','=','Habilitado')
            ->get();

        $allRes = DB::table('detalle_reservacion')
            ->get();

        $temporadas=DB::table('temporada as t')
            ->join('tipo_inmueble as ti','t.idtipo_inmueble','=','ti.idtipo_inmueble')
            ->where('t.estado_temporada','=','Activo')
            ->where('t.estado','=','Habilitado')
            ->orderBy('t.fecha_inicial','asc')
            ->get();

        $reservacion=DB::table('reservacion as r')
            ->join('users as u','r.idusuario','=','u.id')
            ->join('users as h','r.idhuesped','=','h.id')
            ->where('r.idreservacion','=',$id)
            ->first();

        $detalles=DB::table('detalle_reservacion as dr')
            ->join('reservacion as r','dr.idreservacion','=','r.idreservacion')
            ->join('inmueble as i','dr.idinmueble','=','i.idinmueble')
            ->where('r.idreservacion','=',$id)
            ->orderBy('dr.iddetalle_reservacion','asc')
            ->get();
        
        $tiposInmueble=DB::table('tipo_inmueble')
            ->where('estado','=','Habilitado')
            ->get();
        
        //enviar correo
        $cli=DB::table('users')->where('id','=',$idhuesped)->first();
        $reserva=DB::table('reservacion')->where('idreservacion','=',$reservacion->idreservacion)->first();
        $usures =DB::table('users')->where('id','=',Auth::user()->id)->first();
        $correoCliente = $cli->email;
        $correoUsuario = Auth::user()->email;
        Mail::to($correoCliente)->send(new ReservacionMail($reserva,$cli,$usures));

        return view("reservaciones.reservacion.edit",["huespedes"=>$huespedes,"entrada"=>$entrada,"salida"=>$salida,"hoy"=>$hoy,"allRes"=>$allRes,"temporadas"=>$temporadas,"compEntrada"=>$compEntrada,"compSalida"=>$compSalida,"reservacion"=>$reservacion,"detalles"=>$detalles,"tiposInmueble"=>$tiposInmueble]);    
    }

    public function buscarReservacion(Request $request)
    {
        $id = $request->get('idreservacion');
        $idtipo_inmueble = $request->get('idtipo_inmueble');
        $zona_horaria = Auth::user()->zona_horaria;
        $hoy = Carbon::now($zona_horaria);
        $hoy = date("Y-m-d", strtotime($hoy));
        $entradatemp = trim($request->get('entrada'));
        $entradatemp = date("Y-m-d", strtotime($entradatemp));
        $salidatemp = trim($request->get('salida'));
        $salidatemp = date("Y-m-d", strtotime($salidatemp));
        $entrada = trim($request->get('entrada'));
        $salida = trim($request->get('salida'));

        if(($entradatemp < $hoy) || ($salidatemp <= $entradatemp))
        {
            $hoy = date("d-m-Y", strtotime($hoy));
            $entrada = date("d-m-Y", strtotime($hoy));
            $salida = date("d-m-Y", strtotime($entrada.'+ 1 days'));
            $request->session()->flash('alert-warning', 'La fecha de entrada y salida deben ser igual o mayores que la fecha actual o la fecha de salida debe ser mayor a la de entrada, verfifique la fecha de la consulta e intente de nuevo. Fecha:'.$hoy."/ F.Entrada:".$entrada."/ F.Salida:".$salida);
            
        }

        

        $compHoy = strtotime($hoy);
        $compEntrada = date("Y-m-d", strtotime($entrada));
        $compSalida = date("Y-m-d", strtotime ($salida."- 1 days"));

        $huespedes=DB::table('users')
            ->where('tipo_usuario','=','Huesped')
            ->where('estado','=','Habilitado')
            ->get();

        $allRes = DB::table('detalle_reservacion')
            ->get();

        $temporadas=DB::table('temporada as t')
            ->join('tipo_inmueble as ti','t.idtipo_inmueble','=','ti.idtipo_inmueble')
            ->where('t.idtipo_inmueble','LIKE','%'.$idtipo_inmueble.'%')
            ->where('t.estado_temporada','=','Activo')
            ->where('t.estado','=','Habilitado')
            ->orderBy('t.fecha_inicial','asc')
            ->get();

        $reservacion=DB::table('reservacion as r')
            ->join('users as u','r.idusuario','=','u.id')
            ->join('users as h','r.idhuesped','=','h.id')
            ->where('r.idreservacion','=',$id)
            ->first();

        $detalles=DB::table('detalle_reservacion as dr')
            ->join('reservacion as r','dr.idreservacion','=','r.idreservacion')
            ->join('inmueble as i','dr.idinmueble','=','i.idinmueble')
            ->where('r.idreservacion','=',$id)
            ->orderBy('dr.iddetalle_reservacion','asc')
            ->get();
        
        $tiposInmueble=DB::table('tipo_inmueble')
            ->where('estado','=','Habilitado')
            ->get();
        

        return view("reservaciones.reservacion.edit",["huespedes"=>$huespedes,"entrada"=>$entrada,"salida"=>$salida,"hoy"=>$hoy,"allRes"=>$allRes,"temporadas"=>$temporadas,"compEntrada"=>$compEntrada,"compSalida"=>$compSalida,"reservacion"=>$reservacion,"detalles"=>$detalles,"tiposInmueble"=>$tiposInmueble,"idtipo_inmueble"=>$idtipo_inmueble]);
    }

    public function agregarDetalle(Request $request)
    {
        $idreservacion = $request->get('idreservacion');
        $idtemporada = $request->get('idtemporada');
        $idinmueble = $request->get('idinmueble');
        $idtipo_inmueble = "";
        $fecha_entrada = $request->get('fecha_entrada');
        $fecha_salida = $request->get('fecha_salida');

        $minpersonas = $request->get('minpersonas');
        $maxpersonas = $request->get('maxpersonas');

        $cant_mayores = $request->get('cant_mayores');
        $cant_menores = $request->get('cant_menores');
        $cant_mascotas = $request->get('cant_mascotas');
        $precio_mayores = $request->get('precio');
        $precio_menores = $request->get('preciomenor');
        $precio_mascotas = $request->get('preciomascotas');

        $abonar = $request->get('abonar');
        $tipo_pago = $request->get('tipo_pago');
        $abonado = $request->get('abonado');
        $total = $request->get('total_reservacion');

        $totalpersonas = $cant_mayores + $cant_menores;
        
        //verificamos que la cantidad de personas no sobrepase el max o min 
        if(($totalpersonas > $maxpersonas) || ($totalpersonas < $minpersonas))
        {
            $request->session()->flash('alert-danger', 'La cantidad total de personas mayores y menores debe estar entre: '.$minpersonas." y ".$maxpersonas." Personas.");
        }
        else
        {
            //vemos si menoresxpareja diferente a 0 para agregarle a comentario la promocion
            $menoresxpareja = $request->get('menoresxpareja');
            if($menoresxpareja != 0)
            {
                $comentarios= "Menores a 12 años gratis por 2 adultos: ".$menoresxpareja.".";
            }
            else
            {
                $comentarios= null;
            }
            //vemos si cantidad de menores es menor a $menoresxpareja para que la resta no salga negativa igualamos los valores
            if($cant_menores < $menoresxpareja)
            {
                $menoresxpareja = $cant_menores;
            }
            //si la cantidad de mayores de 12 años es mayor a 2 restamos los menores gratis por pareja
            if($cant_mayores >= 2)
            {
                $cant_menores = $cant_menores-$menoresxpareja;
            }
            

            //vemos si promopersonasgratis esta habilitado para ver si se activa el numero de personas gratis
            $promopersonagratis = $request->get('promopersonagratis');
            $promonumpersonas = $request->get('promonumpersonas');
            if($promopersonagratis = "Habilitado")
            {
                $comentarios = $comentarios." Gratis ".$promonumpersonas." adulto al pagar minimo 3 personas adultas mayores a 12 años.";
            }
            //verificamos si son almenos 4 adultos para restar a la persona de la promocion de adulto gratis
            if($cant_mayores >= 4)
            {
                $cant_mayores = $cant_mayores-$promonumpersonas;
            }
            //grabamos los datos de detalle
            $detalle=new DetalleReservacion;
            $detalle->idreservacion=$idreservacion;
            $detalle->idtemporada=$idtemporada;
            $detalle->idinmueble=$idinmueble;
            $detalle->fecha_entrada=$fecha_entrada;
            $detalle->fecha_salida=$fecha_salida;
            $detalle->comentarios=$comentarios;
            $detalle->cant_mayores=$cant_mayores;
            $detalle->cant_menores=$cant_menores;
            $detalle->cant_mascotas=$cant_mascotas;
            $detalle->precio_mayores=$precio_mayores;
            $detalle->precio_menores=$precio_menores;
            $detalle->preciomascotas=$precio_mascotas;
            $detalle->save();

            //calculamos total y abono de la reservacion
            $subtotal = (($cant_mayores * $precio_mayores)+($cant_menores * $precio_menores)+($cant_mascotas * $precio_mascotas));
            $abonado= $abonado + $abonar;

            //verificamos que lo abonado sea igual al total o no para cambiar el estado de saldo
            if(($subtotal+$total) == $abonado)
            {
                $estado_saldo = "Pagado";
            }
            else
            {
                $estado_saldo = "Pendiente";
            }

            //guardamos datos de total y abono en la reservacion
            $reservacion=Reservacion::findOrFail($idreservacion);
            $reservacion->tipo_pago=$tipo_pago;
            $reservacion->abonado=$abonado;
            $reservacion->total=$subtotal+$total;
            $reservacion->estado_saldo=$estado_saldo;
            $reservacion->update();
            

            $request->session()->flash('alert-success', 'Se agrego correctamente un inmueble a reservacion.');

            //enviar correo
            $reserva=DB::table('reservacion')->where('idreservacion','=',$reservacion->idreservacion)->first();
            $cli=DB::table('users')->where('id','=',$reserva->idhuesped)->first();
            $usures =DB::table('users')->where('id','=',Auth::user()->id)->first();
            $correoCliente = $cli->email;
            $correoUsuario = Auth::user()->email;
            Mail::to($correoCliente,$correoUsuario)->send(new ReservacionMail($reserva,$cli,$usures));
        }
        //Datos para mostrar vista edit
        $zona_horaria = Auth::user()->zona_horaria;
        $hoy = Carbon::now($zona_horaria);
        $hoy = date("Y-m-d", strtotime($hoy));
        $entrada = trim($request->get('entrada'));
        $salida = trim($request->get('salida'));

        $compHoy = strtotime($hoy);
        $compEntrada = date("Y-m-d", strtotime($entrada));
        $compSalida = date("Y-m-d", strtotime ($salida."- 1 days"));

        $huespedes=DB::table('users')
            ->where('tipo_usuario','=','Huesped')
            ->where('estado','=','Habilitado')
            ->get();
        
        $allRes = DB::table('detalle_reservacion')
            ->get();

        $temporadas=DB::table('temporada as t')
            ->join('tipo_inmueble as ti','t.idtipo_inmueble','=','ti.idtipo_inmueble')
            ->where('t.idtipo_inmueble','LIKE','%'.$idtipo_inmueble.'%')
            ->where('t.estado_temporada','=','Activo')
            ->where('t.estado','=','Habilitado')
            ->orderBy('t.fecha_inicial','asc')
            ->get();
        
        $reservacion=DB::table('reservacion as r')
            ->join('users as u','r.idusuario','=','u.id')
            ->join('users as h','r.idhuesped','=','h.id')
            ->where('r.idreservacion','=',$idreservacion)
            ->first();

        $detalles=DB::table('detalle_reservacion as dr')
            ->join('reservacion as r','dr.idreservacion','=','r.idreservacion')
            ->join('inmueble as i','dr.idinmueble','=','i.idinmueble')
            ->where('r.idreservacion','=',$idreservacion)
            ->orderBy('dr.iddetalle_reservacion','asc')
            ->get();
        
        $tiposInmueble=DB::table('tipo_inmueble')
            ->where('estado','=','Habilitado')
            ->get();

        return view("reservaciones.reservacion.edit",["huespedes"=>$huespedes,"entrada"=>$entrada,"salida"=>$salida,"hoy"=>$hoy,"allRes"=>$allRes,"temporadas"=>$temporadas,"compEntrada"=>$compEntrada,"compSalida"=>$compSalida,"reservacion"=>$reservacion,"detalles"=>$detalles,"tiposInmueble"=>$tiposInmueble]);

    }

    public function detDestroy(Request $request)
    {
        $iddetalle_reservacion = $request->get('iddetalle_reservacion');
        $idreservacion = $request->get('idreservacion');
        $idtipo_inmueble = "";
        $idinmueble = $request->get('idinmueble');
        $cant_mayores = $request->get('cant_mayores');
        $cant_menores = $request->get('cant_menores');
        $cant_mascotas = $request->get('cant_mascotas');
        $precio_mayores = $request->get('precio_mayores');
        $precio_menores = $request->get('precio_menores');
        $precio_mascotas = $request->get('precio_mascotas');

        $abonado = $request->get('abonadoreservacion');
        $total = $request->get('totalreservacion');

        //restamos a total el subtotal del detale de reservacion
        $subtotal = (($cant_mayores * $precio_mayores)+($cant_menores * $precio_menores)+($cant_mascotas * $precio_mascotas));
        $nuevototal = ($total-$subtotal);

        //verificamos que lo abonado sea igual al total o no para cambiar el estado de saldo
        if(($total-$subtotal) == $abonado)
        {
            $estado_saldo = "Pagado";
        }
        else
        {
            $estado_saldo = "Pendiente";
        }

        //guardamos datos de total 
        $reservacionDet=Reservacion::findOrFail($idreservacion);
        $reservacionDet->total=$nuevototal;
        $reservacionDet->estado_saldo=$estado_saldo;
        $reservacionDet->update();

        $eliminarinmueblereservacion = DB::table('detalle_reservacion')
                ->where('iddetalle_reservacion', '=', $iddetalle_reservacion)
                ->delete();

        $request->session()->flash('alert-success', 'Detalle de reservacion eliminada');

        //Datos para mostrar vista edit
        $zona_horaria = Auth::user()->zona_horaria;
        $hoy = Carbon::now($zona_horaria);
        $hoy = date("Y-m-d", strtotime($hoy));
        $entrada = trim($request->get('entrada'));
        $salida = trim($request->get('salida'));

        $compHoy = strtotime($hoy);
        $compEntrada = date("Y-m-d", strtotime($entrada));
        $compSalida = date("Y-m-d", strtotime ($salida."- 1 days"));

        $huespedes=DB::table('users')
            ->where('tipo_usuario','=','Huesped')
            ->where('estado','=','Habilitado')
            ->get();
        
        $allRes = DB::table('detalle_reservacion')
            ->get();

        $temporadas=DB::table('temporada as t')
            ->join('tipo_inmueble as ti','t.idtipo_inmueble','=','ti.idtipo_inmueble')
            ->where('t.idtipo_inmueble','LIKE','%'.$idtipo_inmueble.'%')
            ->where('t.estado_temporada','=','Activo')
            ->where('t.estado','=','Habilitado')
            ->orderBy('t.fecha_inicial','asc')
            ->get();
        
        $reservacion=DB::table('reservacion as r')
            ->join('users as u','r.idusuario','=','u.id')
            ->join('users as h','r.idhuesped','=','h.id')
            ->where('r.idreservacion','=',$idreservacion)
            ->first();

        $detalles=DB::table('detalle_reservacion as dr')
            ->join('reservacion as r','dr.idreservacion','=','r.idreservacion')
            ->join('inmueble as i','dr.idinmueble','=','i.idinmueble')
            ->where('r.idreservacion','=',$idreservacion)
            ->orderBy('dr.iddetalle_reservacion','asc')
            ->get();
        
        $tiposInmueble=DB::table('tipo_inmueble')
            ->where('estado','=','Habilitado')
            ->get();
        
        $reserva=DB::table('reservacion')->where('idreservacion','=',$reservacion->idreservacion)->first();
        $cli=DB::table('users')->where('id','=',$reserva->idhuesped)->first();
        $usures =DB::table('users')->where('id','=',Auth::user()->id)->first();
        $correoCliente = $cli->email;
        $correoUsuario = Auth::user()->email;
        Mail::to($correoCliente,$correoUsuario)->send(new ReservacionMail($reserva,$cli,$usures));

        return view("reservaciones.reservacion.edit",["huespedes"=>$huespedes,"entrada"=>$entrada,"salida"=>$salida,"hoy"=>$hoy,"allRes"=>$allRes,"temporadas"=>$temporadas,"compEntrada"=>$compEntrada,"compSalida"=>$compSalida,"reservacion"=>$reservacion,"detalles"=>$detalles,"tiposInmueble"=>$tiposInmueble]);
    }

    public function detprecio(Request $request)
    {
        $iddetalle_reservacion = $request->get('iddetalle_reservacion');
        $idreservacion = $request->get('idreservacion');
        $idtemporada = $request->get('idtemporada');
        $idinmueble = $request->get('idinmueble');
        $idtipo_inmueble = "";

        $cant_mayores = $request->get('cant_mayores');
        $cant_menores = $request->get('cant_menores');
        $cant_mascotas = $request->get('cant_mascotas');
        $precio_mayores = $request->get('precio_mayores');
        $precio_menores = $request->get('precio_menores');
        $precio_mascotas = $request->get('precio_mascotas');

        $minpersonas = $request->get('minpersonas');
        $maxpersonas = $request->get('maxpersonas');

        $fecha_entrada = $request->get('fecha_entrada');
        $fecha_salida = $request->get('fecha_salida');

        $abonar = $request->get('abonar');
        $abonado = $request->get('abonado');
        $total = $request->get('total_reservacion');

        $totalpersonas = $cant_mayores + $cant_menores;
        
        //verificamos que la cantidad de personas no sobrepase el max o min 
        if(($totalpersonas > $maxpersonas) || ($totalpersonas < $minpersonas))
        {
            $request->session()->flash('alert-danger', 'La cantidad total de personas mayores y menores debe estar entre: '.$minpersonas." y ".$maxpersonas." Personas.");
        }
        else
        {
        
            //vemos si menoresxpareja diferente a 0 para agregarle a comentario la promocion
            $menoresxpareja = $request->get('menoresxpareja');
            
            //vemos si cantidad de menores es menor a $menoresxpareja para que la resta no salga negativa igualamos los valores
            if($cant_menores < $menoresxpareja)
            {
                $menoresxpareja = $cant_menores;
            }
            //si la cantidad de mayores de 12 años es mayor a 2 restamos los menores gratis por pareja
            if($cant_mayores >= 2)
            {
                $cant_menores = $cant_menores-$menoresxpareja;
            }
            

            //vemos si promopersonasgratis esta habilitado para ver si se activa el numero de personas gratis
            $promopersonagratis = $request->get('promopersonagratis');
            $promonumpersonas = $request->get('promonumpersonas');
            
            //verificamos si son almenos 4 adultos para restar a la persona de la promocion de adulto gratis
            if($cant_mayores >= 4)
            {
                $cant_mayores = $cant_mayores-$promonumpersonas;
            }

            $detalleAnterior=DB::table('detalle_reservacion')
                ->where('iddetalle_reservacion','=',$iddetalle_reservacion)
                ->first();
            
            $subtotalAnterior = (($detalleAnterior->cant_mayores * $detalleAnterior->precio_mayores)+($detalleAnterior->cant_menores * $detalleAnterior->precio_menores)+($detalleAnterior->cant_mascotas * $detalleAnterior->preciomascotas));

            //grabamos los datos de detalle
            //$detalleNuevo=DetalleReservacion::findOrFail($iddetalle_reservacion);
            //$detalleNuevo->cant_mayores=$cant_mayores;
            //$detalleNuevo->cant_menores=$cant_menores;
            //$detalleNuevo->precio_mayores=$precio_mayores;
            //$detalleNuevo->precio_menores=$precio_menores;
            //$detalleNuevo->update();

            DB::table('detalle_reservacion')
                ->where('iddetalle_reservacion', $iddetalle_reservacion)
                ->update
                ([
                    'cant_mayores' => $cant_mayores,
                    'cant_menores' => $cant_menores,
                    'cant_mascotas' => $cant_mascotas,
                    'precio_mayores' => $precio_mayores,
                    'precio_menores' => $precio_menores,
                    'preciomascotas' => $precio_mascotas
                ]);

            //calculamos total y abono de la reservacion
            $subtotal = (($cant_mayores * $precio_mayores)+($cant_menores * $precio_menores)+($cant_mascotas * $precio_mascotas));
            $totalNuevo = (($total-$subtotalAnterior)+$subtotal);

            //verificamos que lo abonado sea igual al total o no para cambiar el estado de saldo
            if(($totalNuevo) == $abonado)
            {
                $estado_saldo = "Pagado";
            }
            else
            {
                $estado_saldo = "Pendiente";
            }

            //guardamos datos de total y abono en la reservacion
            $reservacion=Reservacion::findOrFail($idreservacion);
            $reservacion->total=$totalNuevo;
            $reservacion->estado_saldo=$estado_saldo;
            $reservacion->update();
            

            $request->session()->flash('alert-success', 'Se edito correctamente un inmueble de reservacion. ');

            $reserva=DB::table('reservacion')->where('idreservacion','=',$reservacion->idreservacion)->first();
            $cli=DB::table('users')->where('id','=',$reserva->idhuesped)->first();
            $usures =DB::table('users')->where('id','=',Auth::user()->id)->first();
            $correoCliente = $cli->email;
            $correoUsuario = Auth::user()->email;
            Mail::to($correoCliente,$correoUsuario)->send(new ReservacionMail($reserva,$cli,$usures));
        }
        //Datos para mostrar vista edit
        $zona_horaria = Auth::user()->zona_horaria;
        $hoy = Carbon::now($zona_horaria);
        $hoy = date("Y-m-d", strtotime($hoy));
        $entrada = trim($request->get('entrada'));
        $salida = trim($request->get('salida'));

        $compHoy = strtotime($hoy);
        $compEntrada = date("Y-m-d", strtotime($entrada));
        $compSalida = date("Y-m-d", strtotime ($salida."- 1 days"));

        $huespedes=DB::table('users')
            ->where('tipo_usuario','=','Huesped')
            ->where('estado','=','Habilitado')
            ->get();
        
        $allRes = DB::table('detalle_reservacion')
            ->get();

        $temporadas=DB::table('temporada as t')
            ->join('tipo_inmueble as ti','t.idtipo_inmueble','=','ti.idtipo_inmueble')
            ->where('t.idtipo_inmueble','LIKE','%'.$idtipo_inmueble.'%')
            ->where('t.estado_temporada','=','Activo')
            ->where('t.estado','=','Habilitado')
            ->orderBy('t.fecha_inicial','asc')
            ->get();
        
        $reservacion=DB::table('reservacion as r')
            ->join('users as u','r.idusuario','=','u.id')
            ->join('users as h','r.idhuesped','=','h.id')
            ->where('r.idreservacion','=',$idreservacion)
            ->first();

        $detalles=DB::table('detalle_reservacion as dr')
            ->join('reservacion as r','dr.idreservacion','=','r.idreservacion')
            ->join('inmueble as i','dr.idinmueble','=','i.idinmueble')
            ->where('r.idreservacion','=',$idreservacion)
            ->orderBy('dr.iddetalle_reservacion','asc')
            ->get();
        
        $tiposInmueble=DB::table('tipo_inmueble')
            ->where('estado','=','Habilitado')
            ->get();

        return view("reservaciones.reservacion.edit",["huespedes"=>$huespedes,"entrada"=>$entrada,"salida"=>$salida,"hoy"=>$hoy,"allRes"=>$allRes,"temporadas"=>$temporadas,"compEntrada"=>$compEntrada,"compSalida"=>$compSalida,"reservacion"=>$reservacion,"detalles"=>$detalles,"tiposInmueble"=>$tiposInmueble]);
    }

    
    public function show($id)
    {       
        $reservacion=DB::table('reservacion as r')
            ->join('users as u','r.idusuario','=','u.id')
            ->join('users as h','r.idhuesped','=','h.id')
            ->select('r.idreservacion','r.idusuario','r.idhuesped','r.fecha','r.codigo','r.abonado','r.tipo_pago','r.estado_reservacion','r.estado_saldo','r.estado','r.total','r.comentario','r.no_transaccion','r.imagen_transaccion','u.name','u.email','u.telefono','u.pais','u.departamento','u.direccion','u.num_documento','h.name as huesped','h.email as huespedEmail','h.telefono as huespedTelefono','h.pais as huespedPais','h.departamento as huespedDepartamento','h.direccion as huespedDireccion','h.num_documento as huespedNum_documento')
            ->where('r.idreservacion','=',$id)
            ->groupBy('r.idreservacion','r.idusuario','r.idhuesped','r.fecha','r.codigo','r.abonado','r.tipo_pago','r.estado_reservacion','r.estado_saldo','r.estado','r.total','r.comentario','r.no_transaccion','r.imagen_transaccion','u.name','u.email','u.telefono','u.pais','u.departamento','u.direccion','u.num_documento','h.name','h.email','h.telefono','h.pais','h.departamento','h.direccion','h.num_documento')
            ->first();

        $detalles=DB::table('detalle_reservacion as dr')
        	->join('inmueble as i','dr.idinmueble','=','i.idinmueble')
            ->join('temporada as t','dr.idtemporada','=','t.idtemporada')
        	->where('dr.idreservacion','=',$id)
        	->get();

        return view("reservaciones.reservacion.show",["reservacion"=>$reservacion,"detalles"=>$detalles]);
    }

    public function destroy($id)
    {
    	$reservacion=Reservacion::findOrFail($id);
        $reservacion->estado='Eliminada';
        $reservacion->estado_reservacion='Cancelada';
        $reservacion->update();

            $eliminardetalles = DB::table('detalle_reservacion')
                ->where('idreservacion', '=', $reservacion->idreservacion)
                ->delete();
                
        $reserva=DB::table('reservacion')->where('idreservacion','=',$reservacion->idreservacion)->first();
        $cli=DB::table('users')->where('id','=',$reserva->idhuesped)->first();
        $usures =DB::table('users')->where('id','=',Auth::user()->id)->first();
        $correoCliente = $cli->email;
        $correoUsuario = Auth::user()->email;
        Mail::to($correoCliente,$correoUsuario)->send(new ReservacionMail($reserva,$cli,$usures));
    	return Redirect::to('reservaciones/reservacion');
    }

    public function destroycerrar(Request $request)
    {

        $idreservacion = $request->get('idreservacion');
        //$fechaSalida=strtotime($request->get('FinFechaSalida'));
        //$fechaSalida = $request->get('FinFechaSalida'));->format('d-m-Y');
        $fechaSalida = $request->get('FinFechaSalida');
        $zona_horaria = Auth::user()->zona_horaria;
        $factual = Carbon::now($zona_horaria);
        $factual = $factual->format('Y-m-d');
        if ($factual < $fechaSalida)
        {
            $request->session()->flash('alert-danger', 'La Reservacion no puede finalizar ya que la fecha actual es menor a la fecha de salida.');
            return Redirect::to('reservaciones/reservacion');
            
        }
        else
        {
            $reservacion=Reservacion::findOrFail($idreservacion);
            $reservacion->estado_Reservacion="Finalizada";
            $reservacion->update();

            $res=DB::table('reservacion')->where('idreservacion','=',$idreservacion)->first();
            $cli=DB::table('persona')->where('idpersona','=',$res->idcliente)->first();

            $zonahoraria = Auth::user()->zona_horaria;
            $moneda = Auth::user()->moneda;
            $fechahora= Carbon::now($zonahoraria);
            $bitacora=new Bitacora;
            $bitacora->idempresa=Auth::user()->idempresa;
            $bitacora->idusuario=Auth::user()->id;
            $bitacora->fecha=$fechahora;
            $bitacora->tipo="Reservacion";
            $bitacora->descripcion="Reservacion Finalizada, Cliente: ".$cli->nombre.", Fecha Reservacion: ".$res->fecha.", Fecha entrada: ".$res->fecha_entrada.", Fecha salida: ".$res->fecha_salida.", Total: ".$moneda.$res->total.", Abonado: ".$moneda.$res->abonado.", Estado Saldo: ".$res->estado_saldo.", Estado Reservacion: ".$res->estado_reservacion.", Tipo Pago: ".$res->tipo_pago;
            $bitacora->save();
            $request->session()->flash('alert-success', 'La Reservacion se finalizo correctamente.');

            $reserva=DB::table('reservacion')->where('idreservacion','=',$reservacion->idreservacion)->first();
            $usures =DB::table('users')->where('id','=',Auth::user()->id)->first();
            $correoCliente = $cli->email;
            $correoUsuario = Auth::user()->email;
            Mail::to($correoCliente)->send(new ReservacionFinalizada($reserva,$cli,$usures));

            return Redirect::to('reservaciones/reservacion');
        }
        
    }

    
}
