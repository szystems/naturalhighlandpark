<?php

namespace sisVentasWeb\Http\Controllers;

use Illuminate\Http\Request;

use sisVentasWeb\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;


use DB;
use Response;
use Auth;
use sisVentasWeb\User;
use Mail;

class VistaInmuebleController extends Controller
{
    public function index()
    {
            
        $tipo_inmuebles=DB::table('tipo_inmueble')
        ->where ('estado_tipoinmueble','=','Activo')
        ->where ('estado','=','Habilitado')
        ->orderBy('nombre','asc')
        ->get();
        return view('vistas.inmuebles.index',["tipo_inmuebles"=>$tipo_inmuebles]);
    }
    
    public function show($id)
    {
            
        $inmuebleImagenes=DB::table('inmueble_img')
        ->where('idinmueble','=',$id)
        ->orderBy('idinmueble_img','asc')
        ->get();

        $inmueble=DB::table('inmueble as i')
        ->join('tipo_inmueble as ti','i.idtipo_inmueble','=','ti.idtipo_inmueble')
        ->select('i.idinmueble','i.idtipo_inmueble','i.nombre','i.descripcion','i.estado_inmueble','i.estado','ti.nombre as Tipo','ti.descripcion as TipoDescripcion','ti.maxpersonas','ti.minpersonas','ti.menoresxpareja')
        ->where('i.idinmueble','LIKE',$id)
        ->first();

        $temporadas=DB::table('temporada')
        ->where('idtipo_inmueble','=',$inmueble->idtipo_inmueble)
        ->get();

        $caracteristicas=DB::table('caracteristica')
			->where ('idtipo_inmueble','=',$inmueble->idtipo_inmueble)
			->orderBy('idcaracteristica','asc')
			->get();
    
         return view("vistas.inmuebles.show",["inmueble"=>$inmueble,"temporadas"=>$temporadas,"inmuebleImagenes"=>$inmuebleImagenes,"caracteristicas"=>$caracteristicas]);
    }
}
