<?php

namespace sisVentasWeb\Http\Controllers;

use Illuminate\Http\Request;

class EventosController extends Controller
{
    public function index()
    {
        
        
        return view('vistas.eventos.index');
    }
}
