<?php

namespace sisVentasWeb\Http\Controllers;

use Illuminate\Http\Request;

use sisVentasWeb\Http\Requests;
use sisVentasWeb\User;
use sisVentasWeb\Bitacora;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use sisVentasWeb\Http\Requests\UsuarioFormRequest;
use sisVentasWeb\Http\Requests\UsuarioEditFormRequest;
use sisVentasWeb\Http\Requests\BitacoraFormRequest;
use DB;
use Auth;

class VistaHuespedController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit($id)
    {
    	return view("vistas.vhuesped.edit",["usuario"=>User::findOrFail($id)]);
    }

    public function update(UsuarioEditFormRequest $request,$id)
    {
        //buscar si otro usuario usa el mismo email 
        $emailrepetido=DB::table('users')
        ->where('id','!=',$id)
        ->where('email','=',$request->get('email'))
        ->count();

        if($emailrepetido > 0)
        {
            $request->session()->flash('alert-danger', 'El email '.$request->get('email').' ya esta siendo usado por otro usuario, por favor intente con otro email.');
            return view("vistas.vhuesped.edit",["usuario"=>User::findOrFail($id)]);
        }else
        {
            $usuario=User::findOrFail($id);
            $usuario->name=$request->get('name');
            $usuario->email=$request->get('email');
            $usuario->telefono=$request->get('telefono');
            $usuario->pais=$request->get('pais');
            $usuario->departamento=$request->get('departamento');
            $usuario->direccion=$request->get('direccion');
            $usuario->num_documento=$request->get('num_documento');
            $usuario->update();

            $zonahoraria = Auth::user()->zona_horaria;
            $moneda = Auth::user()->moneda;
            $fechahora= Carbon::now($zonahoraria);

            $bitacora=new Bitacora;
            $bitacora->idusuario=Auth::user()->id;
            $bitacora->fecha=$fechahora;
            $bitacora->tipo="Huesped";
            $bitacora->descripcion="Se edito un usuario huesped: Nombre: ".$usuario->name.", Email: ".$usuario->email.", Pais: ".$usuario->pais.", Departamento: ".$usuario->departamento.", Dirección: ".$usuario->direccion.", Teléfono: ".$usuario->telefono.", tipo: ".$usuario->tipo_usuario;
            $bitacora->save();

            $request->session()->flash('alert-success', 'El usuario de huesped '.$usuario->name.' se edito correctamente1.');

            return view("vistas.vhuesped.edit",["usuario"=>User::findOrFail($usuario->id)]);
        }


    }
}
