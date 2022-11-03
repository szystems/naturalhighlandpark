<?php

namespace sisVentasWeb\Http\Controllers;

use Illuminate\Http\Request;

class TzununahController extends Controller
{
    public function index()
    {
        return view('vistas.tzununah.index');
    }
}
