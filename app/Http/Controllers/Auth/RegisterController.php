<?php

namespace sisVentasWeb\Http\Controllers\Auth;

use sisVentasWeb\User;
use sisVentasWeb\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use sisVentasWeb\Persona;
use sisVentasWeb\Http\Requests\PersonaFormRequest;
use DB;

use sisVentasWeb\Mail\CuentaUsuarioRegistro;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = 'home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'telefono' => 'required|string|max:45',
            'password' => 'required|string|min:6|confirmed',
            'zona_horaria' => 'required|string|max:45',
            'moneda' => 'required|string|max:5',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \sisVentasWeb\User
     */
    protected function create(array $data)
    {
        $fecha = date('Y-m-j');

        $datosConfig=DB::table('users')
        ->where('principal','=','SI')
        ->first();

        $contrasena = $data['password'];
        $email=$data['email'];
        $nombre=$data['name'];
        $telefono=$data['telefono'];
        $pais=$data['pais'];
        $departamento=$data['departamento'];
        $direccion=$data['direccion'];
        $num_documento=$data['num_documento'];

        //Mail::to($email)->send(new CuentaUsuarioRegistro($nombre,$email,$contrasena));

        return User::create([
            'name' => $nombre,
            'email' => $email,
            'telefono' => $telefono,
            'password' => bcrypt($contrasena),
            'empresa' => $datosConfig->empresa,
            'idempresa' => $datosConfig->idempresa,
            'tipo_usuario' => 'Huesped',
            'pais' => $pais,
            'departamento' => $pais,
            'direccion' => $direccion,
            'num_documento' => $num_documento,
            'logo' => $datosConfig->logo,
            'zona_horaria' => $datosConfig->zona_horaria,
            'moneda' => $datosConfig->moneda,
            'estado' => 'Habilitado',
            'principal' => 'NO',

        ]);
    }
}
