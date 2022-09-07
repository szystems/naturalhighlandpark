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

class UsuarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index (Request $request)
	{
		if ($request)
		{
			$query=trim($request->get('searchText'));
			$usuarios=DB::table('users')
            ->where('name','LIKE','%'.$query.'%')
            ->where('tipo_usuario','=','Administrador')
            ->where('email','!=','Eliminado')
            ->orderBy('principal','desc')
			->orderBy('name','asc')
			->paginate(20);
			return view('seguridad.usuario.index',["usuarios"=>$usuarios,"searchText"=>$query]);
		}
	}

	public function create()
	{
		return view("seguridad.usuario.create");
	}
    
    public function store(UsuarioFormRequest $request)
    {
        $idempresa = Auth::user()->idempresa;

        $usuario=new User;
    	$usuario->name=$request->get('name');
    	$usuario->email=$request->get('email');
    	$usuario->password=bcrypt($request->get('password'));
    	$usuario->tipo_usuario=$request->get('tipo_usuario');
    	$usuario->telefono=$request->get('telefono');
        $usuario->pais=$request->get('pais');
        $usuario->departamento=$request->get('departamento');
    	$usuario->direccion=$request->get('direccion');
    	$usuario->num_documento=$request->get('num_documento');
        $usuario->empresa=Auth::user()->empresa;
        $usuario->idempresa=Auth::user()->idempresa;
        $usuario->zona_horaria=Auth::user()->zona_horaria;
        $usuario->moneda=Auth::user()->moneda;
        $usuario->logo=Auth::user()->logo;
        $usuario->principal='NO';
        $usuario->tipo_administrador=$request->get('tipo_administrador');
        $usuario->estado='Habilitado';
    	$usuario->save();


        $zonahoraria = Auth::user()->zona_horaria;
        $moneda = Auth::user()->moneda;
        $fechahora= Carbon::now($zonahoraria);
        $bitacora=new Bitacora;
        $bitacora->idusuario=Auth::user()->id;
        $bitacora->fecha=$fechahora;
        $bitacora->tipo="Seguridad";
        $bitacora->descripcion="Se creo un usuario de administrador, Nombre: ".$usuario->name.", Email: ".$usuario->email.", Pais: ".$usuario->pais.", Departamento: ".$usuario->departamento.", Dirección: ".$usuario->direccion.", Teléfono: ".$usuario->telefono.", Tipo: ".$usuario->tipo_usuario.", Tipo Administrador: ".$usuario->tipo_administrador;
        $bitacora->save();

        $request->session()->flash('alert-success', 'El usuario de administrador Nombre: '.$request->get('name').' ,email: '.$request->get('email').' Se creo correctamente.');

    	return Redirect::to('seguridad/usuario');
    }

    public function edit($id)
    {
    	return view("seguridad.usuario.edit",["usuario"=>User::findOrFail($id)]);
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
            return view("seguridad.usuario.edit",["usuario"=>User::findOrFail($id)]);
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
            $usuario->tipo_administrador=$request->get('tipo_administrador');
            $usuario->update();

            $zonahoraria = Auth::user()->zona_horaria;
            $moneda = Auth::user()->moneda;
            $fechahora= Carbon::now($zonahoraria);

            $bitacora=new Bitacora;
            $bitacora->idusuario=Auth::user()->id;
            $bitacora->fecha=$fechahora;
            $bitacora->tipo="Seguridad ";
            $bitacora->descripcion="Se edito un usuario administrador: Nombre: ".$usuario->name.", Email: ".$usuario->email.", Pais: ".$usuario->pais.", Departamento: ".$usuario->departamento.", Dirección: ".$usuario->direccion.", Teléfono: ".$usuario->telefono.", tipo: ".$usuario->tipo_usuario.", Tipo Administrador: ".$usuario->tipo_administrador;
            $bitacora->save();

            $request->session()->flash('alert-success', 'El usuario de administrador '.$usuario->name.' se edito correctamente.');

            return Redirect::to('seguridad/usuario');
        }


    }

    public function show($id)
    {
        return view("seguridad.usuario.show",["usuario"=>User::findOrFail($id)]);
    }

    public function destroy($id)
    {
        $usu=DB::table('users')->where('id','=',$id)->first();

        $usuario=User::findOrFail($id);
        $usuario->email="Eliminado";
        $usuario->estado="Eliminado";
        $usuario->update();

            $zonahoraria = Auth::user()->zona_horaria;
            $fechahora= Carbon::now($zonahoraria);
            $bitacora=new Bitacora;
            $bitacora->idusuario=Auth::user()->id;
            $bitacora->fecha=$fechahora;
            $bitacora->tipo="Seguridad";
            $bitacora->descripcion="Se elimino un Administrador, Nombre: ".$usu->name;
            $bitacora->save();

        return Redirect::to('seguridad/usuario');
    	
    }
}
