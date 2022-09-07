<?php

namespace sisVentasWeb\Http\Controllers;

use Illuminate\Http\Request;

use sisVentasWeb\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sisVentasWeb\Http\Requests\InmuebleFormRequest;
use sisVentasWeb\Inmueble;
use sisVentasWeb\Reservacion;
use sisVentasWeb\DetalleReservacion;
use Cart;
use Carbon\Carbon;
use DB;
use Auth;

use sisVentasWeb\User;
use sisVentasWeb\Http\Requests\UsuarioFormRequest;
use sisVentasWeb\Http\Requests\UsuarioEditFormRequest;

use sisVentasWeb\Http\Requests\ReservacionFormRequest;
use sisVentasWeb\Orden;
use sisVentasWeb\OrdenDetalle;

use sisVentasWeb\Mail\ReservacionMail;
use Illuminate\Support\Facades\Mail;

class CarritoSessionController extends Controller
{
    public function index(Request $request)
    {
        $user = User::all()->first();
        $zona_horaria = $user->zona_horaria;
        $hoy = Carbon::now($zona_horaria);
        $hoy = date("Y-m-d", strtotime($hoy));
        $entrada = date("d-m-Y", strtotime($hoy));
        $salida = date("d-m-Y", strtotime ($hoy."+ 1 days"));

                       
            
        $compHoy = strtotime($hoy);
        $compEntrada = date("Y-m-d", strtotime($entrada));
        $compSalida = date("Y-m-d", strtotime ($salida."- 1 days"));

        $datosConfig=DB::table('users')->first();

        $carrito = Cart::getContent();
        if(Cart::isEmpty() == 1)
        {
            $request->session()->flash('alert-warning', 'Tu Carrito esta vacio.');
        }
        return view('vistas.vcarrito.index',["carrito"=>$carrito,"entrada"=>$entrada,"salida"=>$salida,"datosConfig"=>$datosConfig]);
    }

    public function add(Request $request)
    {
    
        //datos recibidos de detalle_reservacion
        $id = $request->get('idtemporada').$request->get('idinmueble');
        $idtemporada = $request->get('idtemporada');
        $idinmueble = $request->get('idinmueble');
        $name = $request->get('nombre');
        $fecha_entrada = $request->get('fecha_entrada');
        $fecha_salida = $request->get('fecha_salida');
        $price = $request->get('precioadulto');
        $quantity = $request->get('cant_mayores');
        $price2 = $request->get('preciomenor');
        $quantity2 = $request->get('cant_menores');
        $price3 = $request->get('preciomascota');
        $quantity3 = $request->get('cant_mascotas');


        //datos extras
        $menoresxpareja = $request->get('menoresxpareja');
        $promopersonagratis = $request->get('promopersonagratis');
        $promonumpersonas = $request->get('promonumpersonas');
        $minpersonas = $request->get('minpersonas');
        $maxpersonas = $request->get('maxpersonas');

        $detallesCarrito = Cart::getContent();
        $contRepetido = 0;
		foreach($detallesCarrito as $detalle)
		{
            if(($detalle->fecha_entrada == $fecha_entrada) && ($detalle->id == $id) && ($detalle->idtemporada == $idtemporada))
            {
                $contRepetido = $contRepetido + 1;
                
            }

        }
        if($contRepetido >= 1)
        {
            $request->session()->flash('alert-danger', 'Este inmueble ya esta dentro del carrito de reservacion');
        }
        else
        {
            $totalpersonas = $quantity + $quantity2;
            

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
                    $comentario= "Menores a 12 años gratis por 2 adultos: ".$menoresxpareja.".";
                }
                else
                {
                    $comentario= null;
                }
                //vemos si cantidad de menores es menor a $menoresxpareja para que la resta no salga negativa igualamos los valores
                if($quantity2 < $menoresxpareja)
                {
                    $menoresxpareja = $quantity2;
                }
                //si la cantidad de mayores de 12 años es mayor a 2 restamos los menores gratis por pareja
                if($quantity >= 2)
                {
                    $quantity2 = $quantity2-$menoresxpareja;
                }

                //vemos si promopersonasgratis esta habilitado para ver si se activa el numero de personas gratis
            
                if($promopersonagratis = "Habilitado")
                {
                    $comentario = $comentario." Gratis ".$promonumpersonas." adulto al pagar minimo 3 personas adultas mayores a 12 años.";
                }
                //verificamos si son almenos 4 adultos para restar a la persona de la promocion de adulto gratis
                if($quantity >= 4)
                {
                    $quantity = $quantity-$promonumpersonas;
                }

                //grabamos datos a carrito
                // array format
                Cart::add(array(
                    'id' => $id, 
                    'idtemporada' => $idtemporada, 
                    'idinmueble' => $idinmueble, 
                    'name' => $name,
                    'comentario' => $comentario,
                    'fecha_entrada' => $fecha_entrada,
                    'fecha_salida' => $fecha_salida,
                    'price' => $price,
                    'price2' => $price2,
                    'price3' => $price3,
                    'quantity' => $quantity,
                    'quantity2' => $quantity2,
                    'quantity3' => $quantity3
                ));
                $carrito = Cart::getContent();
                if(Cart::isEmpty() == 1)
                {
                    $request->session()->flash('alert-warning', 'Tu Carrito esta vacio.');
                }else
                {
                    $request->session()->flash('alert-success', 'Se agrego el articulo al carrito.');
                }

            }
        }
                
        
        return Redirect::to('vistas/reservaciones/');
    }

    public function delete(Request $request)
    {
        // obtenemos id de item
        $inmueble=$request->get('id');
        //eliminamos el item
        Cart::remove($inmueble);
        $carrito = Cart::getContent();
        $request->session()->flash('alert-success', 'Se elimino el inmueble del carrito.');

        $user = User::all()->first();
        $zona_horaria = $user->zona_horaria;
        $hoy = Carbon::now($zona_horaria);
        $hoy = date("Y-m-d", strtotime($hoy));
        $entrada = date("d-m-Y", strtotime($hoy));
        $salida = date("d-m-Y", strtotime ($hoy."+ 1 days"));
        $datosConfig=DB::table('users')->first();
        return view('vistas.vcarrito.index',["carrito"=>$carrito,"entrada"=>$entrada,"salida"=>$salida,"datosConfig"=>$datosConfig]);
    }

    public function quantity(Request $request)
    {
        // obtenemos id y cantidad nueva de item
        $id=$request->get('id');
        $cant_mayores=$request->get('cant_mayores');
        $cant_menores=$request->get('cant_menores');
        $cant_mascotas=$request->get('cant_mascotas');
        //datos extras
        $menoresxpareja = $request->get('menoresxpareja');
        $promopersonagratis = $request->get('promopersonagratis');
        $promonumpersonas = $request->get('promonumpersonas');
        $minpersonas = $request->get('minpersonas');
        $maxpersonas = $request->get('maxpersonas');

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

            //editamos la catidad del item
            
            Cart::update($id, array(
                'quantity3' => $cant_mascotas, // new item price, price can also be a string format like so: '98.67'
                'quantity2' => $cant_menores, // new item price, price can also be a string format like so: '98.67'
                'quantity' => array(
                    'relative' => false,
                    'value' => $cant_mayores
                ),
              ));
            
            $request->session()->flash('alert-success', 'Se edito la cantidad del detalle de reservacion.');
            
        }
        $carrito = Cart::getContent();
        $user = User::all()->first();
        $zona_horaria = $user->zona_horaria;
        $hoy = Carbon::now($zona_horaria);
        $hoy = date("Y-m-d", strtotime($hoy));
        $entrada = date("d-m-Y", strtotime($hoy));
        $salida = date("d-m-Y", strtotime ($hoy."+ 1 days"));
        $datosConfig=DB::table('users')->first();
        return view('vistas.vcarrito.index',["carrito"=>$carrito,"entrada"=>$entrada,"salida"=>$salida,"datosConfig"=>$datosConfig]);
    }

    public function clear(Request $request)
    {
        // vaciar carrito format
        Cart::clear();
        $carrito = Cart::getContent();
        $request->session()->flash('alert-success', 'Tu Carrito se vacio.');

        $user = User::all()->first();
        $zona_horaria = $user->zona_horaria;
        $hoy = Carbon::now($zona_horaria);
        $hoy = date("Y-m-d", strtotime($hoy));
        $entrada = date("d-m-Y", strtotime($hoy));
        $salida = date("d-m-Y", strtotime ($hoy."+ 1 days"));
        $datosConfig=DB::table('users')->first();
        return view('vistas.vcarrito.index',["carrito"=>$carrito,"entrada"=>$entrada,"salida"=>$salida,"datosConfig"=>$datosConfig]);
    }

    public function create()
    {
        $user = User::all()->first();
        $zona_horaria = $user->zona_horaria;
        $hoy = Carbon::now($zona_horaria);
        $hoy = date("Y-m-d", strtotime($hoy));
        $entrada = date("d-m-Y", strtotime($hoy));
        $salida = date("d-m-Y", strtotime ($hoy."+ 1 days"));

                       
            
        $compHoy = strtotime($hoy);
        $compEntrada = date("Y-m-d", strtotime($entrada));
        $compSalida = date("Y-m-d", strtotime ($salida."- 1 days"));

        $datosConfig=DB::table('users')->first();

        $carrito = Cart::getContent();
        if(Cart::isEmpty() == 1)
        {
            $request->session()->flash('alert-warning', 'Tu Carrito esta vacio.');
        }
        return view("vistas.vcarrito.create",["carrito"=>$carrito,"entrada"=>$entrada,"hoy"=>$hoy,"salida"=>$salida,"datosConfig"=>$datosConfig,"user"=>$user]);
    }

    public function store (ReservacionFormRequest $request)
    {
    	try
    	{
            $idusuario = $request->get('idusuario');
            $idhuesped = $request->get('idhuesped');
            $telefono = $request->get('telefono');
            $fecha = $request->get('fecha');
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
            $codigo = $generar_codigo_reservacion;
            $abonado = '0';
            $tipo_pago = $request->get('tipo_pago');
            $estado_reservacion = $request->get('estado_reservacion');
            $estado = $request->get('estado');
            $estado_saldo = $request->get('estado_saldo');
            $total = $request->get('total');
            $comentario = $request->get('comentario');

            $updateTelefono = User::where('id', '=',  $idhuesped)->first();
            $updateTelefono->telefono = $telefono;
            $updateTelefono->save();
            //guardamos reservacion
            $res=new Reservacion;
            $res->idusuario=$idusuario;
            $res->idhuesped=$idhuesped;
            $res->fecha=$fecha;
            $res->codigo=$codigo;
            $res->abonado=$abonado;
            $res->tipo_pago=$tipo_pago;
            $res->estado_reservacion=$estado_reservacion;
            $res->estado_saldo=$estado_saldo;
            $res->estado=$estado;
            $res->total=$total;
            $res->comentario=$comentario;
            $res->save();
            //guardamos detalles de reservacion
            $carrito = Cart::getContent();
            foreach($carrito as $detalle)
            {
                                
                $detalleReservacion = new DetalleReservacion();
                $detalleReservacion->idreservacion=$res->idreservacion;
                $detalleReservacion->idtemporada=$detalle->idtemporada;
                $detalleReservacion->idinmueble=$detalle->idinmueble;
                $detalleReservacion->fecha_entrada=$detalle->fecha_entrada;
                $detalleReservacion->fecha_salida=$detalle->fecha_salida;
                $detalleReservacion->comentarios=$detalle->comentario;
                $detalleReservacion->cant_mayores=$detalle->quantity;
                $detalleReservacion->cant_menores=$detalle->quantity2;
                $detalleReservacion->cant_mascotas=$detalle->quantity3;
                $detalleReservacion->precio_mayores=$detalle->price;
                $detalleReservacion->precio_menores=$detalle->price2;
                $detalleReservacion->preciomascotas=$detalle->price3;
                $detalleReservacion->save();
            }

            $request->session()->flash('alert-success', 'Tu Reservacion se a confirmado el codigo es: '.$codigo);
            Cart::clear();
            $carrito = Cart::getContent();

            $reserva=DB::table('reservacion')->where('idreservacion','=',$res->idreservacion)->first();
            $cli=DB::table('users')->where('id','=',$reserva->idhuesped)->first();
            $usures =DB::table('users')->where('principal','=','SI')->first();
            $correoCliente = $cli->email;
            $correoUsuario = $usures->email;
            Mail::to($correoCliente,$correoUsuario)->send(new ReservacionMail($reserva,$cli,$usures));

        }catch(\Exception $e)
        {
            DB::rollback();
        }   

    	$reservacion=DB::table('reservacion as r')
            ->join('users as u','r.idusuario','=','u.id')
            ->join('users as h','r.idhuesped','=','h.id')
            ->select('r.idreservacion','r.idusuario','r.idhuesped','r.fecha','r.codigo','r.abonado','r.tipo_pago','r.estado_reservacion','r.estado_saldo','r.estado','r.total','r.comentario','r.no_transaccion','r.imagen_transaccion','u.name','u.email','u.telefono','u.pais','u.departamento','u.direccion','u.num_documento','h.name as huesped','h.email as huespedEmail','h.telefono as huespedTelefono','h.pais as huespedPais','h.departamento as huespedDepartamento','h.direccion as huespedDireccion','h.num_documento as huespedNum_documento')
            ->where('r.idreservacion','=',$res->idreservacion)
            ->groupBy('r.idreservacion','r.idusuario','r.idhuesped','r.fecha','r.codigo','r.abonado','r.tipo_pago','r.estado_reservacion','r.estado_saldo','r.estado','r.total','r.comentario','r.no_transaccion','r.imagen_transaccion','u.name','u.email','u.telefono','u.pais','u.departamento','u.direccion','u.num_documento','h.name','h.email','h.telefono','h.pais','h.departamento','h.direccion','h.num_documento')
            ->first();

        $detalles=DB::table('detalle_reservacion as dr')
        	->join('inmueble as i','dr.idinmueble','=','i.idinmueble')
            ->join('temporada as t','dr.idtemporada','=','t.idtemporada')
        	->where('dr.idreservacion','=',$res->idreservacion)
        	->get();

            $user = User::all()->first();

        return view("vistas.vcarrito.show",["reservacion"=>$reservacion,"detalles"=>$detalles,"user"=>$user]);
    }

    public function transaccion(Request $request)
    {
        $idreservacion = $request->get('idreservacion');
        $no_transaccion = $request->get('no_transaccion');
        $imagen_transaccion = $request->get('imagen_transaccion');

        $reservacion=Reservacion::findOrFail($idreservacion);
        $reservacion->no_transaccion=$no_transaccion;

        if (input::hasfile('imagen_transaccion')){
            $permitted_chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $generar_codigo_imagen = substr(str_shuffle($permitted_chars), 0, 5);

        	$file=Input::file('imagen_transaccion');
        	$file->move(public_path().'/imagenes/transacciones/',$generar_codigo_imagen.$file->getClientOriginalName());
        	$reservacion->imagen_transaccion=$generar_codigo_imagen.$file->getClientOriginalName();
        }
        
        $reservacion->update();


        $reservacion=DB::table('reservacion as r')
            ->join('users as u','r.idusuario','=','u.id')
            ->join('users as h','r.idhuesped','=','h.id')
            ->select('r.idreservacion','r.idusuario','r.idhuesped','r.fecha','r.codigo','r.abonado','r.tipo_pago','r.estado_reservacion','r.estado_saldo','r.estado','r.total','r.comentario','r.no_transaccion','r.imagen_transaccion','u.name','u.email','u.telefono','u.pais','u.departamento','u.direccion','u.num_documento','h.name as huesped','h.email as huespedEmail','h.telefono as huespedTelefono','h.pais as huespedPais','h.departamento as huespedDepartamento','h.direccion as huespedDireccion','h.num_documento as huespedNum_documento')
            ->where('r.idreservacion','=',$idreservacion)
            ->groupBy('r.idreservacion','r.idusuario','r.idhuesped','r.fecha','r.codigo','r.abonado','r.tipo_pago','r.estado_reservacion','r.estado_saldo','r.estado','r.total','r.comentario','r.no_transaccion','r.imagen_transaccion','u.name','u.email','u.telefono','u.pais','u.departamento','u.direccion','u.num_documento','h.name','h.email','h.telefono','h.pais','h.departamento','h.direccion','h.num_documento')
            ->first();

        $detalles=DB::table('detalle_reservacion as dr')
        	->join('inmueble as i','dr.idinmueble','=','i.idinmueble')
            ->join('temporada as t','dr.idtemporada','=','t.idtemporada')
        	->where('dr.idreservacion','=',$idreservacion)
        	->get();

            $user = User::all()->first();
        
        $request->session()->flash('alert-success', 'Se a subido el No. de Transacción o Imagen correctamente.');
        return view("vistas.vcarrito.show",["reservacion"=>$reservacion,"detalles"=>$detalles,"user"=>$user]);
    }
}
