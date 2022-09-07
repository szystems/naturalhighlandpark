<?php

namespace sisVentasWeb\Http\Controllers;

use Illuminate\Http\Request;

use sisVentasWeb\Http\Requests;
use sisVentasWeb\Bitacora;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

use sisVentasWeb\Http\Requests\BitacoraFormRequest;
use DB;
use Auth;
use sisVentasWeb\User;

use sisVentasWeb\InmuebleImg;
use sisVentasWeb\Http\Requests\InmuebleImgFormRequest;

use sisVentasWeb\Http\Controllers\InmuebleController;
use sisVentasWeb\Inmueble;
use sisVentasWeb\Http\Requests\InmuebleFormRequest;

class InmuebleImgController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store (InmuebleImgFormRequest $request)
    {
        //obtenemos id de inmueble
        $idinmueble = $request->get('idinmueble');
        if (input::hasfile('imagen'))
        {
            //Guardar archivo de imagen y obtener nombre unico
            $permitted_chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $generar_codigo_imagen = substr(str_shuffle($permitted_chars), 0, 5);
            $file=Input::file('imagen');
            $file->move(public_path().'/imagenes/inmuebles/',$generar_codigo_imagen.$file->getClientOriginalName());
            //Guardamos imagen en base de datos
            $ImgInmueble=new InmuebleImg;
            $ImgInmueble->idinmueble=$request->get('idinmueble');
            $ImgInmueble->imagen=$generar_codigo_imagen.$file->getClientOriginalName();
            $ImgInmueble->save();

            $mensajeImagen = "Se agrego la imagen al inmueble correctamente.";
        
            $zonahoraria = Auth::user()->zona_horaria;
            $fechahora= Carbon::now($zonahoraria);
            $bitacora=new Bitacora;
            $bitacora->idusuario=Auth::user()->id;
            $bitacora->fecha=$fechahora;
            $bitacora->tipo="Inmuebles";
            $bitacora->descripcion="Se agrego una imagen nueva a inmueble.";
            $bitacora->save();

            $request->session()->flash('alert-success', 'Se agrego correctamente una imagen de un inmueble.');
        }else
        {
            $request->session()->flash('alert-success', 'No se agrego la imagen, seleccione una e intente de nuevo.');
        }
        $idinmueble=$request->get('idinmueble');

        return view("inmuebles.inmueble.show",["inmueble"=>Inmueble::findOrFail($idinmueble)]);
    }

    public function update(InmuebleImgFormRequest $request,$id)
    {
        
        if (input::hasfile('imagen')){
            //guardamos y obtenemos nombre unico de imagen
            $permitted_chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $generar_codigo_imagen = substr(str_shuffle($permitted_chars), 0, 5);
            $file=Input::file('imagen');
            $file->move(public_path().'/imagenes/inmuebles/',$generar_codigo_imagen.$file->getClientOriginalName());
            //Guardamos nombre de imagen en base de datos
            $ImgInmueble=InmuebleImg::findOrFail($id);
            $ImgInmueble->imagen=$generar_codigo_imagen.$file->getClientOriginalName();
            $ImgInmueble->update();

            $zonahoraria = Auth::user()->zona_horaria;
            $fechahora= Carbon::now($zonahoraria);
            $bitacora=new Bitacora;
            $bitacora->idusuario=Auth::user()->id;
            $bitacora->fecha=$fechahora;
            $bitacora->tipo="Inmuebles";
            $bitacora->descripcion="Se edito una imagen de inmueble";
            $bitacora->save();

            $request->session()->flash('alert-success', 'Se edito correctamente una imagen de un inmueble.');
        }else
        {
            $request->session()->flash('alert-success', 'No se pudo editar la imagen ya que no selecciono ninguna.');
        }
        $idinmueble=$request->get('idinmueble');

        return view("inmuebles.inmueble.show",["inmueble"=>Inmueble::findOrFail($idinmueble)]);
    }

    

    public function eliminarmodal(Request $request)
    {
        $idinmueble=$request->get('idinmueble');
        $idinmueble_imagen=$request->get('idinmueble_imagen');

        $inmuebleImg = InmuebleImg::find($idinmueble_imagen);
        $inmuebleImg->delete();

            $zonahoraria = Auth::user()->zona_horaria;
            $fechahora= Carbon::now($zonahoraria);
            $bitacora=new Bitacora;
            $bitacora->idusuario=Auth::user()->id;
            $bitacora->fecha=$fechahora;
            $bitacora->tipo="Inmuebles";
            $bitacora->descripcion="Se elimino una imagen de un inmueble.";
            $bitacora->save();
            
            $request->session()->flash('alert-success', 'Se elimino correctamente una imagen de un inmueble.');

            return Redirect::to('inmuebles/inmueble');
    }

    public function destroy($id)
    {
        $inmuebleImg = InmuebleImg::find($id);
        $inmuebleImg->delete();


        $zonahoraria = Auth::user()->zona_horaria;
        $fechahora= Carbon::now($zonahoraria);
        $bitacora=new Bitacora;
        $bitacora->idusuario=Auth::user()->id;
        $bitacora->fecha=$fechahora;
        $bitacora->tipo="inmuebles";
        $bitacora->descripcion="Se elimino una imagen de un inmueble";
        $bitacora->save();

        return Redirect::to('inmuebles/inmueble');
    }
}
