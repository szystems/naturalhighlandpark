<?php

namespace sisVentasWeb\Http\Controllers;

use Illuminate\Http\Request;
use sisVentasWeb\Http\Requests;
use sisVentasWeb\Bitacora;
use Illuminate\Support\Facades\Redirect;
use sisVentasWeb\Http\Requests\BitacoraFormRequest;

use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;

use DB;
use Auth;
use sisVentasWeb\User;

class BitacoraController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
            if ($request)
            {
                $fecha=trim($request->get('fecha'));
                $fecha = date("Y-m-d", strtotime($fecha));
                $tipo = trim($request->get('tipo'));
                $usuario=trim($request->get('usuario'));

                $usuarios=DB::table('users')
                ->get();

                $usufiltro=DB::table('users')
					->select('name','id')
                    ->where('id','=',$usuario)
                    ->get();

                $zona_horaria = Auth::user()->zona_horaria;
                $hoy = Carbon::now($zona_horaria);
                $hoy = $hoy->format('d-m-Y');

                if($fecha != '1970-01-01')
                {
                    $bitacora=DB::table('bitacora as b')
                    ->join('users as u','b.idusuario','=','u.id')
                    ->select('b.idbitacora','u.name','b.fecha','b.tipo','b.descripcion')
                    ->whereDate('b.fecha',$fecha)
                    ->where('u.id','LIKE','%'.$usuario.'%')
                    ->where('b.tipo','LIKE','%'.$tipo.'%')
                    ->orderBy('b.fecha','desc')
                    ->groupBy('b.idbitacora','u.name','b.fecha','b.tipo','b.descripcion')
                    ->paginate(50);
                }
                else
                {
                    $bitacora=DB::table('bitacora as b')
                    ->join('users as u','b.idusuario','=','u.id')
                    ->select('b.idbitacora','u.name','b.fecha','b.tipo','b.descripcion')
                    ->where('u.id','LIKE','%'.$usuario.'%')
                    ->where('b.tipo','LIKE','%'.$tipo.'%')
                    ->orderBy('b.fecha','desc')
                    ->groupBy('b.idbitacora','u.name','b.fecha','b.tipo','b.descripcion')
                    ->paginate(50);
                }
                return view('reportes.bitacora.index',["bitacora"=>$bitacora,"fecha"=>$fecha,"tipo"=>$tipo,"usuario"=>$usuario,"usuarios"=>$usuarios,"usufiltro"=>$usufiltro,"hoy"=>$hoy]);
            }
        
    }

    public function show($id)
    {

    	$bitacora=DB::table('bitacora as b')
            ->join('users as u','b.idusuario','=','u.id')
            ->select('b.idbitacora','u.name','b.fecha','b.tipo','b.descripcion')
            ->groupBy('b.idbitacora','u.name','b.fecha','b.tipo','b.descripcion')
            ->where('b.idbitacora','=',$id)
            ->first();

        

        return view("reportes.bitacora.show",["bitacora"=>$bitacora]);
    }
}
