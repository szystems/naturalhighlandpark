<?php

namespace sisVentasWeb\Http\Controllers;

use Illuminate\Http\Request;

use sisVentasWeb\Http\Requests;
use sisVentasWeb\Caracteristica;
use sisVentasWeb\TipoInmueble;
use sisVentasWeb\Bitacora;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use sisVentasWeb\Http\Requests\CaracteristicaFormRequest;
use sisVentasWeb\Http\Requests\TipoInmuebleFormRequest;
use sisVentasWeb\Http\Requests\BitacoraFormRequest;
use DB;
use Auth;
use sisVentasWeb\User;
use Illuminate\Support\Facades\Input;

class CaracteristicaController extends Controller
{
    
    public function store (CaracteristicaFormRequest $request)
    {
        $caracteristica=new Caracteristica;
        $caracteristica->idtipo_inmueble=$request->get('idtipo_inmueble');
        $caracteristica->nombre=$request->get('nombre');
        $caracteristica->descripcion=$request->get('descripcion');
        $caracteristica->save();

        $zonahoraria = Auth::user()->zona_horaria;
        $fechahora= Carbon::now($zonahoraria);
        $bitacora=new Bitacora;
        $bitacora->idusuario=Auth::user()->id;
        $bitacora->fecha=$fechahora;
        $bitacora->tipo="Inmuebles";
        $bitacora->descripcion="Se creo una nueva caracteristica de tipo de inmueble nuevo, Nombre: ".$caracteristica->nombre.", Descripción: ".$caracteristica->descripcion;
        $bitacora->save();

        $request->session()->flash('alert-success', 'Se creo correctamente una caracteristica.');

        return view("inmuebles.tipoinmueble.show",["tipoInmueble"=>TipoInmueble::findOrFail($request->get('idtipo_inmueble'))]);

    }

    public function update(CaracteristicaFormRequest $request,$id)
    {
        $caracteristica=Caracteristica::findOrFail($id);
        $caracteristica->nombre=$request->get('nombre');
        $caracteristica->descripcion=$request->get('descripcion');
        $caracteristica->update();

        $zonahoraria = Auth::user()->zona_horaria;
        $fechahora= Carbon::now($zonahoraria);
        $bitacora=new Bitacora;
        $bitacora->idusuario=Auth::user()->id;
        $bitacora->fecha=$fechahora;
        $bitacora->tipo="Inmuebles";
        $bitacora->descripcion="Se edito una característica tipo de inmueble, Nombre: ".$caracteristica->nombre.", Descripción: ".$caracteristica->descripcion;
        $bitacora->save();

        $request->session()->flash('alert-success', 'Se edito correctamente una caracteristica de tipo de inmueble.');

        return view("inmuebles.tipoinmueble.show",["tipoInmueble"=>TipoInmueble::findOrFail($request->get('idtipo_inmueble'))]);
    }
    public function destroy($id)
    {
        $car=DB::table('caracteristica')->where('idcaracteristica','=',$id)->first();

        $caracteristica = Caracteristica::find($id);
        $caracteristica->delete();

        $zonahoraria = Auth::user()->zona_horaria;
        $fechahora= Carbon::now($zonahoraria);
        $bitacora=new Bitacora;
        $bitacora->idusuario=Auth::user()->id;
        $bitacora->fecha=$fechahora;
        $bitacora->tipo="inmuebles";
        $bitacora->descripcion="Se elimino una caracteristica de tipo de inmueble, Nombre: ".$car->nombre;
        $bitacora->save();

        return view("inmuebles.tipoinmueble.show",["tipoInmueble"=>TipoInmueble::findOrFail($car->idtipo_inmueble)]);
    }
}
