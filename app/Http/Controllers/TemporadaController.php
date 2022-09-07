<?php

namespace sisVentasWeb\Http\Controllers;

use Illuminate\Http\Request;

use sisVentasWeb\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sisVentasWeb\Http\Requests\TemporadaFormRequest;
use sisVentasWeb\Http\Requests\BitacoraFormRequest;
use sisVentasWeb\Temporada;
use sisVentasWeb\Bitacora;
use Carbon\Carbon;
use DB;
use Auth;
use sisVentasWeb\User;

class TemporadaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        if ($request)
        {
            $desde=trim($request->get('desde'));
            $hasta=trim($request->get('hasta'));
            $desde = date("Y-m-d", strtotime($desde));
            $hasta = date("Y-m-d", strtotime($hasta));
            $idtipo_inmueble=trim($request->get('idtipo_inmueble'));
            $estado_temporada=trim($request->get('estado_temporada'));
            
            

            $tiposInmueble=DB::table('tipo_inmueble')
            ->where('estado','=','Habilitado')
            ->get();

            if($desde != '1970-01-01' or $hasta != '1970-01-01')
                {
                    $temporadas=DB::table('temporada as t')
                        ->join('tipo_inmueble as ti','t.idtipo_inmueble','=','ti.idtipo_inmueble')
                        ->select('t.idtemporada','t.idtipo_inmueble','t.fecha_inicial','t.fecha_final','t.precio','t.preciomenor','t.preciomascota','t.promopersonagratis','t.promonumpersonas','t.estado_temporada','t.estado','ti.nombre','ti.descripcion')
                        ->whereBetween('t.fecha_inicial', [$desde, $hasta])
                        ->where('t.estado_temporada','LIKE','%'.$estado_temporada.'%')
                        ->where('t.idtipo_inmueble','LIKE','%'.$idtipo_inmueble.'%')
                        ->where('t.estado','=','Habilitado')
                        ->orderBy('t.fecha_inicial','asc')
                        ->paginate(20);

                    
                }
                else
                {
                    $temporadas=DB::table('temporada as t')
                        ->join('tipo_inmueble as ti','t.idtipo_inmueble','=','ti.idtipo_inmueble')
                        ->select('t.idtemporada','t.idtipo_inmueble','t.fecha_inicial','t.fecha_final','t.precio','t.preciomenor','t.preciomascota','t.promopersonagratis','t.promonumpersonas','t.estado_temporada','t.estado','ti.nombre','ti.descripcion')
                        ->where('t.estado_temporada','LIKE','%'.$estado_temporada.'%')
                        ->where('t.idtipo_inmueble','LIKE','%'.$idtipo_inmueble.'%')
                        ->where('t.estado','=','Habilitado')
                        ->orderBy('t.fecha_inicial','asc')
                        ->paginate(20);
                }

            return view('reservaciones.temporada.index',["temporadas"=>$temporadas,"tiposInmueble"=>$tiposInmueble,"desde"=>$desde,"hasta"=>$hasta,"idtipo_inmueble"=>$idtipo_inmueble,"estado_temporada"=>$estado_temporada]);
        }
    }
    public function create()
    {
        $tiposInmueble=DB::table('tipo_inmueble')
        ->where('estado','=','Habilitado')
        ->get();
        return view("reservaciones.temporada.create",["tiposInmueble"=>$tiposInmueble]);
    }
    public function store (TemporadaFormRequest $request)
    {
        $zonahoraria = Auth::user()->zona_horaria;
        $fechaActual = Carbon::now($zonahoraria);
        $fechaActual = date("Y-m-d", strtotime($fechaActual));
        $fechaInicial = $request->get('fecha_inicial');
        $fechaInicial = date("Y-m-d", strtotime($fechaInicial));
        $fechaFinal = $request->get('fecha_final');
        $fechaFinal = date("Y-m-d", strtotime($fechaFinal));

        //ver si existe una temporada dentro de los rangos de las fechas

        $temporadaOcupada=DB::table('temporada as t')
        ->join('tipo_inmueble as ti','t.idtipo_inmueble','=','ti.idtipo_inmueble')
        ->where('t.idtipo_inmueble','=',$request->get('idtipo_inmueble'))
        ->where('t.estado','=','Habilitado')
        ->whereBetween('t.fecha_inicial', [$fechaInicial, $fechaFinal])
        ->orwhere('t.idtipo_inmueble','=',$request->get('idtipo_inmueble'))
        ->where('t.estado','=','Habilitado')
        ->whereBetween('t.fecha_final', [$fechaInicial, $fechaFinal])
        ->count();
        if($fechaInicial <= $fechaFinal)
        {
            if($temporadaOcupada != 0)
            {
                $request->session()->flash('alert-danger', 'la fecha inicial o la fecha final esta dentro del rango de alguna otra temporada.');
                return Redirect::to('reservaciones/temporada');
            }else
            {
                $temporada=new Temporada;
                $temporada->idtipo_inmueble=$request->get('idtipo_inmueble');
                $temporada->fecha_inicial=$fechaInicial;
                $temporada->fecha_final=$fechaFinal;
                $temporada->precio=$request->get('precio');
                $temporada->preciomenor=$request->get('preciomenor');
                $temporada->preciomascota=$request->get('preciomascota');
                $temporada->promopersonagratis=$request->get('promopersonagratis');
                $temporada->promonumpersonas=$request->get('promonumpersonas');
                $temporada->estado_temporada='Activo';
                $temporada->estado='Habilitado';
                $temporada->save();

                $request->session()->flash('alert-success', 'Se agrego correctamente una nueva temporada.');

                $moneda = Auth::user()->moneda;
                $fechahora= Carbon::now($zonahoraria);
                $bitacora=new Bitacora;
                $bitacora->idusuario=Auth::user()->id;
                $bitacora->fecha=$fechahora;
                $bitacora->tipo="Reservacion";
                $bitacora->descripcion="Se creo una temporada nueva, Fecha Inicial: ".$request->get('fecha_inicial').", Fecha Final: ".$request->get('fecha_final').", Precio: ".$moneda.$request->get('precio').", Precio Menor: ".$moneda.$request->get('preciomenor').", Precio Mascota: ".$moneda.$request->get('preciomascota').", Promocion Persona Extra: ".$request->get('promopersonagratis').", Promocion Numero de Personas Gratis: ".$moneda.$request->get('promonumpersonas');
                $bitacora->save();

                return Redirect::to('reservaciones/temporada');
            }

        }
        else
        {
            $request->session()->flash('alert-danger', 'la fecha inicial es mayor a la fecha final.');
                return Redirect::to('reservaciones/temporada');
        }
        

    }

    public function show($id)
    {
    	$temporada=DB::table('temporada as t')
            ->join('tipo_inmueble as ti','t.idtipo_inmueble','=','ti.idtipo_inmueble')
            ->select('t.idtemporada','t.idtipo_inmueble','t.fecha_inicial','t.fecha_final','t.precio','t.preciomenor','t.preciomascota','t.promopersonagratis','t.promonumpersonas','t.estado_temporada','t.estado','ti.nombre','ti.descripcion')
            ->where('t.estado','=','Habilitado')
            ->first();
        
        $tiposInmueble=DB::table('tipo_inmueble')
            ->where('estado','=','Habilitado')
            ->get();

        return view("reservaciones.temporada.show",["temporada"=>$temporada,"tiposInmueble"=>$tiposInmueble]);
    }

    public function edit($id)
    {
        $temporada=DB::table('temporada as t')
            ->join('tipo_inmueble as ti','t.idtipo_inmueble','=','ti.idtipo_inmueble')
            ->select('t.idtemporada','t.idtipo_inmueble','t.fecha_inicial','t.fecha_final','t.precio','t.preciomenor','t.preciomascota','t.promopersonagratis','t.promonumpersonas','t.estado_temporada','t.estado','ti.nombre','ti.descripcion')
            ->where('t.idtemporada','=',$id)
            ->first();
        
        $tiposInmueble=DB::table('tipo_inmueble')
            ->where('estado','=','Habilitado')
            ->get();

        return view("reservaciones.temporada.edit",["temporada"=>$temporada,"tiposInmueble"=>$tiposInmueble]);
    }


    public function update(TemporadaFormRequest $request,$id)
    {
        $zonahoraria = Auth::user()->zona_horaria;
        $fechaActual = Carbon::now($zonahoraria);
        $fechaActual = date("Y-m-d", strtotime($fechaActual));
        $fechaInicial = $request->get('fecha_inicial');
        $fechaInicial = date("Y-m-d", strtotime($fechaInicial));
        $fechaFinal = $request->get('fecha_final');
        $fechaFinal = date("Y-m-d", strtotime($fechaFinal));

        //ver si existe una temporada dentro de los rangos de las fechas

        
                $temporada=Temporada::findOrFail($id);
                $temporada->idtipo_inmueble=$request->get('idtipo_inmueble');
                $temporada->fecha_inicial=$fechaInicial;
                $temporada->fecha_final=$fechaFinal;
                $temporada->precio=$request->get('precio');
                $temporada->preciomenor=$request->get('preciomenor');
                $temporada->preciomascota=$request->get('preciomascota');
                $temporada->promopersonagratis=$request->get('promopersonagratis');
                $temporada->promonumpersonas=$request->get('promonumpersonas');
                $temporada->update();

                $request->session()->flash('alert-success', 'Se edito correctamente una nueva temporada.');

                $moneda = Auth::user()->moneda;
                $fechahora= Carbon::now($zonahoraria);
                $bitacora=new Bitacora;
                $bitacora->idusuario=Auth::user()->id;
                $bitacora->fecha=$fechahora;
                $bitacora->tipo="Reservacion";
                $bitacora->descripcion="Se creo una temporada nueva, Fecha Inicial: ".$request->get('fecha_inicial').", Fecha Final: ".$request->get('fecha_final').", Precio: ".$moneda.$request->get('precio').", Precio Menor: ".$moneda.$request->get('preciomenor').", Precio Mascota: ".$moneda.$request->get('preciomascota').", Promocion Persona Extra: ".$request->get('promopersonagratis').", Promocion Numero de Personas Gratis: ".$moneda.$request->get('promonumpersonas');
                $bitacora->save();

                return Redirect::to('reservaciones/temporada');
            
        
    }

    

    public function destroy($id)
    {
        $temporada=Temporada::findOrFail($id);
        $temporada->promopersonagratis='Inhabilitado';
        $temporada->estado='Eliminado';
        $temporada->estado_temporada='Inactivo';
        $temporada->update();

        $tem=DB::table('temporada')->where('idtemporada','=',$id)->first();

        $zonahoraria = Auth::user()->zona_horaria;
        $fechahora= Carbon::now($zonahoraria);
        $bitacora=new Bitacora;
        $bitacora->idusuario=Auth::user()->id;
        $bitacora->fecha=$fechahora;
        $bitacora->tipo="Reservacion";
        $bitacora->descripcion="Se elimino una temporada, Fecha Inicial: ".$tem->fecha_inicial." ,Fecha Final: ".$tem->fecha_final;
        $bitacora->save();
        
        return Redirect::to('reservaciones/temporada');
    }
}
