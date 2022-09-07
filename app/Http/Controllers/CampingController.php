<?php

namespace sisVentasWeb\Http\Controllers;

use Illuminate\Http\Request;

class CampingController extends Controller
{
    public function index()
    {
        
        
        return view('vistas.camping.index');
    }
}
