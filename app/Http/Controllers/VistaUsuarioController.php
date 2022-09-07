<?php

namespace sisVentasWeb\Http\Controllers;

use Illuminate\Http\Request;

use sisVentasWeb\Http\Requests;
use sisVentasWeb\User;
use sisVentasWeb\Persona;
use sisVentasWeb\Bitacora;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use sisVentasWeb\Http\Requests\VistaUsuarioFormRequest;
use sisVentasWeb\Http\Requests\BitacoraFormRequest;
use DB;
use Auth;

class VistaUsuarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show($id)
    {
        $cliente=DB::table('persona')
        ->where('idpersona','=',Auth::user()->idcliente)
        ->first();

        return view("vistas.vusuario.show",["usuario"=>User::findOrFail($id),"cliente"=>$cliente]);
    }

    public function edit($id)
    {
        $cliente=DB::table('persona')
        ->where('idpersona','=',Auth::user()->idcliente)
        ->first();

    	return view("vistas.vusuario.edit",["usuario"=>User::findOrFail($id),"cliente"=>$cliente]);
    }

    public function update(VistaUsuarioFormRequest $request,$id)
    {
        $usuario=User::findOrFail($id);
        $usuario->name=$request->get('name');
        $usuario->telefono=$request->get('telefono');
        $usuario->direccion=$request->get('direccion');
        $usuario->tipo_documento=$request->get('tipo_documento');
        $usuario->num_documento=$request->get('num_documento');
        $usuario->banco=$request->get('banco');
        $usuario->nom_cuenta=$request->get('nom_cuenta');
        $usuario->num_cuenta=$request->get('num_cuenta');
        $usuario->update();
        
        $persona=Persona::findOrFail($usuario->idcliente);
        $persona->nombre=$request->get('name');
        $persona->pais=$request->get('pais');
        $persona->departamento=$request->get('departamento');
        $persona->municipio=$request->get('municipio');
        $persona->telefono=$request->get('telefono');
        $persona->direccion=$request->get('direccion');
        $persona->tipo_documento=$request->get('tipo_documento');
        $persona->num_documento=$request->get('num_documento');
        $persona->banco=$request->get('banco');
        $persona->nombre_cuenta=$request->get('nom_cuenta');
        $persona->numero_cuenta=$request->get('num_cuenta');
        $persona->update();
        
        
    	$cliente=DB::table('persona')
        ->where('idpersona','=',Auth::user()->idcliente)
        ->first();

        return view("vistas.vusuario.show",["usuario"=>User::findOrFail($id),"cliente"=>$cliente]);


    }
}
