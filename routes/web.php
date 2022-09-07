<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Rutas login */
Route::get('/', function () {
    return view('home');
});

/*Vistas */
    

//Panel de control Administradores y Empresas
/*Panel de Control */
Route::resource('panel','PanelController');

/* Rutas seguridad */
Route::resource('seguridad/usuario','UsuarioController');
Route::resource('seguridad/huesped','HuespedController');
Route::resource('seguridad/configuracion','ConfiguracionController');

/* Rutas Inmuebles */
Route::resource('inmuebles/inmueble','InmuebleController');
Route::get('inmuebles/inmueble/inmuebleimg', 'InmuebleImgController@eliminarmodal');
Route::resource('inmueble/inmuebleimg','InmuebleImgController');
Route::resource('inmuebles/tipoinmueble','TipoInmuebleController');
Route::resource('tipoinmueble/caracteristica','CaracteristicaController');

/* Rutas Reservaciones */

/*Rutas Reservaciones */
    /*Reservacion */

    
    Route::get('reservaciones/reservacion/detalle', 'ReservacionController@detDestroy');
    Route::get('reservaciones/reservacion/detprecio', 'ReservacionController@detprecio');
    Route::get('reservaciones/reservacion/modals', 'ReservacionController@destroycerrar');
    Route::post('reservaciones/reservacion/buscarReservacion', 'ReservacionController@buscarReservacion');
    Route::post('reservaciones/reservacion/agregarDetalle', 'ReservacionController@agregarDetalle');
    Route::resource('reservaciones/reservacion','ReservacionController');
    
    Route::resource('reservaciones/temporada','TemporadaController');
/*Reportes */
Route::resource('reportes/bitacora','BitacoraController');

/*Rutas pdf */
    
    /*Usuarios */
Route::post('pdf/usuarios','ReportesController@reporteusuarios');
Route::post('pdf/usuarios/vista','ReportesController@vistausuario');
    /*Bitacora */
Route::post('pdf/bitacora','ReportesController@reportebitacora');
Route::post('pdf/bitacora/vista','ReportesController@vistabitacora');
Route::post('reportes/bitacora/vista','ReportesController@vistabitacorareporte');

//Vistas 
    
    /*Restaurantes */
Route::resource('vistas/restaurantes','RestaurantesController');
    /*Camping */
Route::resource('vistas/camping','CampingController');
    /*Eventos */
Route::resource('vistas/eventos','EventosController');
    /*Galeria */
Route::resource('vistas/galeria','GaleriaController');
    /*Historia */
Route::resource('vistas/historia','HistoriaController');
    /*Servicios */
Route::resource('vistas/servicios','ServiciosController');
    /*Granjita */
Route::resource('vistas/granjita','GranjitaController');
    /*Contacto */
Route::resource('vistas/contacto','ContactoController');
    /* Inicio */
Route::resource('vistas/vinicio','InicioController');
    /* Inmueble */
Route::resource('vistas/inmuebles','VistaInmuebleController');
    /* Rutas Usuario */
Route::resource('vistas/vusuario','VistaUsuarioController');
Route::resource('vistas/configuracion','ConfiguracionController');
    /* Rutas huesped */
Route::resource('vistas/vhuesped','VistaHuespedController');
    /* Contacto */
Route::resource('vistas/vcontacto','ContactoController');
    /* Rutas Auth */
Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/home', 'HomeController@index')->name('home');
    /*Reservaciones */
Route::get('vistas/reservaciones/reserva', 'ReservacionClienteController@showReserva');
Route::resource('vistas/reservaciones','ReservacionClienteController');
    /*Reservas */
Route::resource('vistas/reservas','VistaReservacionesController');
    /* Rutas vista Carrito session*/

Route::post('vistas/vinicio', 'CarritoSessionController@add');
Route::post('vistas/vinicio/vaciar', 'CarritoSessionController@clear');
Route::post('vistas/vinicio/transaccion', 'CarritoSessionController@transaccion');
Route::post('vistas/vinicio/detalle', 'CarritoSessionController@delete');
Route::post('vistas/vinicio/detprecio', 'CarritoSessionController@quantity');
Route::post('vistas/vcarrito/finalizarordensession', 'CarritoSessionController@finalizarOrden');
Route::post('vistas/vcarrito/confirmarordensession', 'CarritoSessionController@confirmarOrden');
Route::resource('vistas/vcarrito','CarritoSessionController');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
