<?php

namespace sisVentasWeb\Http\Controllers;

use Illuminate\Http\Request;

class GranjitaController extends Controller
{
    public function index()
    {
        return view('vistas.granjita.index');
    }
}
