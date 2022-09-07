<?php

namespace sisVentasWeb\Http\Controllers;

use Illuminate\Http\Request;

class GaleriaController extends Controller
{
    public function index()
    {
        
        
        return view('vistas.galeria.index');
    }
}
