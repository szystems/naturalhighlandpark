<?php

namespace sisVentasWeb\Http\Controllers;

use Illuminate\Http\Request;

use webApp\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;


use DB;
use Response;
use Auth;
use webApp\User;
use Mail;

class PanelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index (Request $request)
	{
		if ($request)
		{
			return view('panel.index');
		}
	}
}
