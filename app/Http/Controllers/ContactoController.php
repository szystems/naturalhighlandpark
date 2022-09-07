<?php

namespace sisVentasWeb\Http\Controllers;

use Illuminate\Http\Request;

use sisVentasWeb\Http\Requests;
use sisVentasWeb\Contacto;
use Illuminate\Support\Facades\Redirect;
use sisVentasWeb\Http\Requests\ContactoFormRequest;
use DB;
use sisVentasWeb\User;
use sisVentasWeb\Mail\ContactoCliente;
use Illuminate\Support\Facades\Mail;

class ContactoController extends Controller
{
    public function index(Request $request)
    {
        return view('vistas.vcontacto.index');
    }

    public function store (ContactoFormRequest $request)
    {
        

        $nombre = $request->get("name");
        $email = $request->get("email");
        $telefono = $request->get("phone");
        $asunto = $request->get("subject");
        $mensaje = $request->get("mensaje");

        

        
        $correoUsuario = env('MAIL_USERNAME');
        Mail::to($correoUsuario)->send(new ContactoCliente($nombre,$email,$telefono,$asunto,$mensaje));
        $request->session()->flash('alert-success', 'El mensaje fue enviado, en las próximas horas se contactará un encargado para resolver tus dudas.');
        return view('vistas.vcontacto.index');

    }
}
