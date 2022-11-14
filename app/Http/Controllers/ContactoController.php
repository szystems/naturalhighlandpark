<?php

namespace sisVentasWeb\Http\Controllers;

use Illuminate\Http\Request;

use sisVentasWeb\Http\Requests;
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
        

        $nombre = $request->get("name1");
        $email = $request->get("email1");
        $telefono = $request->get("phone1");
        $asunto = $request->get("subject1");
        $mensaje = $request->get("mensaje1");

        

        
        $correoUsuario = env('MAIL_USERNAME');
        Mail::to("admonhighlandpark@gmail.com")->send(new ContactoCliente($nombre,$email,$telefono,$asunto,$mensaje));
        $request->session()->flash('alert-success', 'El mensaje fue enviado, en las próximas horas se contactará un encargado para resolver tus dudas.');
        return view('vistas.vcontacto.index');

    }
}
