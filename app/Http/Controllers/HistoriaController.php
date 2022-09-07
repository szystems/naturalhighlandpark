<?php

namespace sisVentasWeb\Http\Controllers;

use Illuminate\Http\Request;

class HistoriaController extends Controller
{
    public function index()
    {
        return view('vistas.historia.index');
    }
}
