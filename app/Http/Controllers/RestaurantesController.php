<?php

namespace sisVentasWeb\Http\Controllers;

use sisVentasWeb\Http\Request;

class RestaurantesController extends Controller
{
    public function index()
    {
        
        
        return view('vistas.restaurantes.index');
    }
}
