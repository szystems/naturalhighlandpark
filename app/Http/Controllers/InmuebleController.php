<?php

namespace sisVentasWeb\Http\Controllers;

use sisVentasWeb\Http\Requests;
use sisVentasWeb\Inmueble;
use sisVentasWeb\Bitacora;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use sisVentasWeb\Http\Requests\InmuebleFormRequest;
use sisVentasWeb\Http\Requests\BitacoraFormRequest;
use DB;
use Auth;
use sisVentasWeb\User;
use Illuminate\Support\Facades\Input;

use Illuminate\Http\Request;

class InmuebleController extends Controller
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
            $inmuebles=DB::table('inmueble as i')
            ->join('tipo_inmueble as ti','i.idtipo_inmueble','=','ti.idtipo_inmueble')
            ->select('i.idinmueble','i.idtipo_inmueble','i.nombre','i.descripcion','i.estado_inmueble','i.estado','ti.nombre as Tipo')
            ->where('i.nombre','LIKE','%'.$query.'%')
            ->where ('i.estado','=','Habilitado')
            ->orderByRaw("CAST(ti.nombre as UNSIGNED) ASC","CAST(i.nombre as UNSIGNED) ASC")
            ->paginate(20);
            return view('inmuebles.inmueble.index',["inmuebles"=>$inmuebles,"searchText"=>$query]);
        }
    }
    public function create()
    {
        $tiposinmueble=DB::table('tipo_inmueble')
        ->where('estado','=','Habilitado')
        ->get();
        return view("inmuebles.inmueble.create",["tiposinmueble"=>$tiposinmueble]);
    }
    public function store (InmuebleFormRequest $request)
    {
        $inmueble=new Inmueble;
        $inmueble->idtipo_inmueble=$request->get('idtipo_inmueble');
        $inmueble->nombre=$request->get('nombre');
        $inmueble->descripcion=$request->get('descripcion');
        $inmueble->estado_inmueble=$request->get('estado_inmueble');
        $inmueble->estado='Habilitado';
        $inmueble->save();

        $zonahoraria = Auth::user()->zona_horaria;
        $fechahora= Carbon::now($zonahoraria);
        $bitacora=new Bitacora;
        $bitacora->idusuario=Auth::user()->id;
        $bitacora->fecha=$fechahora;
        $bitacora->tipo="Inmuebles";
        $bitacora->descripcion="Se creo un nuevo inmueble, Nombre: ".$inmueble->nombre.", Descripción: ".$inmueble->descripcion.", Estado: ".$inmueble->estado_inmueble;
        $bitacora->save();

        $request->session()->flash('alert-success', 'Se creo correctamente un inmueble.');

        return view("inmuebles.inmueble.show",["inmueble"=>Inmueble::findOrFail($inmueble->idinmueble)]);

    }
    public function show($id)
    {
        $inmueble=DB::table('inmueble as i')
            ->join('tipo_inmueble as ti','i.idtipo_inmueble','=','ti.idtipo_inmueble')
            ->select('i.idinmueble','i.idtipo_inmueble','i.nombre','i.descripcion','i.estado_inmueble','i.estado','ti.nombre as Tipo')
            ->where ('i.estado','=','Habilitado')
            ->where ('i.idinmueble','=',$id)
            ->first();

        $imagenesInmueble=DB::table('inmueble_img')
            ->where('idinmueble','=',$inmueble->idinmueble)
            ->get();

        return view("inmuebles.inmueble.show",["inmueble"=>$inmueble,"imagenesInmueble"=>$imagenesInmueble]);
    }
    public function edit($id)
    {
        $tiposinmueble=DB::table('tipo_inmueble')
        ->where('estado','=','Habilitado')
        ->get();
        return view("inmuebles.inmueble.edit",["inmueble"=>Inmueble::findOrFail($id),"tiposinmueble"=>$tiposinmueble]);
    }
    public function update(InmuebleFormRequest $request,$id)
    {
        $inmueble=Inmueble::findOrFail($id);
        $inmueble->idtipo_inmueble=$request->get('idtipo_inmueble');
        $inmueble->nombre=$request->get('nombre');
        $inmueble->descripcion=$request->get('descripcion');
        $inmueble->estado_inmueble=$request->get('estado_inmueble');
        $inmueble->update();

        $zonahoraria = Auth::user()->zona_horaria;
        $fechahora= Carbon::now($zonahoraria);
        $bitacora=new Bitacora;
        $bitacora->idusuario=Auth::user()->id;
        $bitacora->fecha=$fechahora;
        $bitacora->tipo="Inmuebles";
        $bitacora->descripcion="Se edito un inmueble, Nombre: ".$inmueble->nombre.", Descripción: ".$inmueble->descripcion.", Estado: ".$inmueble->estado_tipoinmueble;
        $bitacora->save();

        $request->session()->flash('alert-success', 'Se edito correctamente inmueble.');

        $inmueble=DB::table('inmueble as i')
            ->join('tipo_inmueble as ti','i.idtipo_inmueble','=','ti.idtipo_inmueble')
            ->select('i.idinmueble','i.idtipo_inmueble','i.nombre','i.descripcion','i.estado_inmueble','i.estado','ti.nombre as Tipo')
            ->where ('i.estado','=','Habilitado')
            ->where ('i.idinmueble','=',$id)
            ->first();

        return view("inmuebles.inmueble.show",["inmueble"=>$inmueble]);
    }
    public function destroy($id)
    {
        $inmueble=Inmueble::findOrFail($id);
        $inmueble->estado_inmueble='Inactivo';
        $inmueble->estado='Eliminado';
        $inmueble->update();

        $inm=DB::table('inmueble')->where('idinmueble','=',$id)->first();

        $zonahoraria = Auth::user()->zona_horaria;
        $fechahora= Carbon::now($zonahoraria);
        $bitacora=new Bitacora;
        $bitacora->idusuario=Auth::user()->id;
        $bitacora->fecha=$fechahora;
        $bitacora->tipo="inmuebles";
        $bitacora->descripcion="Se elimino un tipo de inmueble, Nombre: ".$inm->nombre;
        $bitacora->save();

        return Redirect::to('inmuebles/inmueble');
    }
}
