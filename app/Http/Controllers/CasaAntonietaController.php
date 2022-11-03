<?php

namespace sisVentasWeb\Http\Controllers;

use Illuminate\Http\Request;

class CasaAntonietaController extends Controller
{
    public function index()
    {
        return view('vistas.casaantonieta.index');
    }
}
