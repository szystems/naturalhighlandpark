<?php

namespace sisVentasWeb\Http\Controllers;

use Illuminate\Http\Request;

class ServiciosController extends Controller
{
    public function index()
    {
        return view('vistas.servicios.index');
    }
}
