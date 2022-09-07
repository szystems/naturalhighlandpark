<?php

namespace sisVentasWeb\Http\Controllers;

use Illuminate\Http\Request;

use sisVentasWeb\Http\Requests;
use sisVentasWeb\TipoInmueble;
use sisVentasWeb\Bitacora;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use sisVentasWeb\Http\Requests\TipoInmuebleFormRequest;
use sisVentasWeb\Http\Requests\BitacoraFormRequest;
use DB;
use Auth;
use sisVentasWeb\User;
use Illuminate\Support\Facades\Input;

class TipoInmuebleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $tiposinmueble=DB::table('tipo_inmueble')
            ->where('nombre','LIKE','%'.$query.'%')
            ->where ('estado','=','Habilitado')
            ->orderBy('nombre','asc')
            ->paginate(20);
            return view('inmuebles.tipoinmueble.index',["tiposinmueble"=>$tiposinmueble,"searchText"=>$query]);
        }
    }
    public function create()
    {
        return view("inmuebles.tipoinmueble.create");
    }
    public function store (TipoInmuebleFormRequest $request)
    {
        $tipoInmueble=new TipoInmueble;
        $tipoInmueble->nombre=$request->get('nombre');
        $tipoInmueble->descripcion=$request->get('descripcion');
        $tipoInmueble->maxpersonas=$request->get('maxpersonas');
        $tipoInmueble->minpersonas=$request->get('minpersonas');
        $tipoInmueble->menoresxpareja=$request->get('menoresxpareja');
        $tipoInmueble->mascotas=$request->get('mascotas');
        $tipoInmueble->maxmascotas=$request->get('maxmascotas');
        $tipoInmueble->estado_tipoinmueble=$request->get('estado_tipoinmueble');
        $tipoInmueble->estado='Habilitado';
        $tipoInmueble->save();

        $zonahoraria = Auth::user()->zona_horaria;
        $fechahora= Carbon::now($zonahoraria);
        $bitacora=new Bitacora;
        $bitacora->idusuario=Auth::user()->id;
        $bitacora->fecha=$fechahora;
        $bitacora->tipo="Inmuebles";
        $bitacora->descripcion="Se creo un nuevo tipo de inmueble, Nombre: ".$tipoInmueble->nombre.", Descripción: ".$tipoInmueble->descripcion.", Estado: ".$tipoInmueble->estado_tipoinmueble.", Maximo Personas: ".$tipoInmueble->maxpersonas.", Minimo Personas: ".$tipoInmueble->minpersonas.", Menores Gratis X Pareja: ".$tipoInmueble->menoresxpareja.", Mascotas: ".$tipoInmueble->mascotas.", Maximo Mascotas: ".$tipoInmueble->maxmascotas;
        $bitacora->save();

        $request->session()->flash('alert-success', 'Se creo correctamente un tipo de inmueble.');

        return view("inmuebles.tipoinmueble.show",["tipoInmueble"=>TipoInmueble::findOrFail($tipoInmueble->idtipo_inmueble)]);

    }
    public function show($id)
    {
        return view("inmuebles.tipoinmueble.show",["tipoInmueble"=>TipoInmueble::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("inmuebles.tipoinmueble.edit",["tipoInmueble"=>TipoInmueble::findOrFail($id)]);
    }
    public function update(TipoInmuebleFormRequest $request,$id)
    {
        $tipoInmueble=TipoInmueble::findOrFail($id);
        $tipoInmueble->nombre=$request->get('nombre');
        $tipoInmueble->descripcion=$request->get('descripcion');
        $tipoInmueble->maxpersonas=$request->get('maxpersonas');
        $tipoInmueble->minpersonas=$request->get('minpersonas');
        $tipoInmueble->menoresxpareja=$request->get('menoresxpareja');
        $tipoInmueble->mascotas=$request->get('mascotas');
        $tipoInmueble->maxmascotas=$request->get('maxmascotas');
        $tipoInmueble->estado_tipoinmueble=$request->get('estado_tipoinmueble');
        $tipoInmueble->update();

        $zonahoraria = Auth::user()->zona_horaria;
        $fechahora= Carbon::now($zonahoraria);
        $bitacora=new Bitacora;
        $bitacora->idusuario=Auth::user()->id;
        $bitacora->fecha=$fechahora;
        $bitacora->tipo="Inmuebles";
        $bitacora->descripcion="Se edito un tipo de inmueble, Nombre: ".$tipoInmueble->nombre.", Descripción: ".$tipoInmueble->descripcion.", Estado: ".$tipoInmueble->estado_tipoinmueble.", Maximo Personas: ".$tipoInmueble->maxpersonas.", Minimo Personas: ".$tipoInmueble->minpersonas.", Menores Gratis X Pareja: ".$tipoInmueble->menoresxpareja.", Maximo Mascotas: ".$tipoInmueble->maxmascotas;
        $bitacora->save();

        $request->session()->flash('alert-success', 'Se edito correctamente un tipo de inmueble.');

        return view("inmuebles.tipoinmueble.show",["tipoInmueble"=>TipoInmueble::findOrFail($id)]);
    }
    public function destroy($id)
    {
        $tipoInmueble=TipoInmueble::findOrFail($id);
        $tipoInmueble->estado_tipoinmueble='Inactivo';
        $tipoInmueble->estado='Eliminado';
        $tipoInmueble->update();

        $inm=DB::table('tipo_inmueble')->where('idtipo_inmueble','=',$id)->first();

        $zonahoraria = Auth::user()->zona_horaria;
        $fechahora= Carbon::now($zonahoraria);
        $bitacora=new Bitacora;
        $bitacora->idusuario=Auth::user()->id;
        $bitacora->fecha=$fechahora;
        $bitacora->tipo="inmuebles";
        $bitacora->descripcion="Se elimino un tipo de inmueble, Nombre: ".$inm->nombre;
        $bitacora->save();

        return Redirect::to('inmuebles/tipoinmueble');
    }
}
