<?php

namespace sisVentasWeb\Http\Controllers;

use Illuminate\Http\Request;

use sisVentasWeb\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sisVentasWeb\Http\Requests\ReportesFormRequest;
use DB;

use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;

use Auth;
use sisVentasWeb\User;

class ReportesController extends Controller
{
    

    public function reporteventas(ReportesFormRequest $rrequest)
    {  
            if ($rrequest)
            {
                
                $idempresa = Auth::user()->idempresa;
                $nombreusu = Auth::user()->name;
                $empresa = Auth::user()->empresa;
                if (Auth::user()->logo == null)
                {
                    $logo = null;
                    $imagen = null;
                }
                else
                {
                     $logo = Auth::user()->logo;
                     $imagen = public_path('imagenes/logos/'.$logo);
                }

                
                $verpdf=trim($rrequest->get('pdf'));
                $desde=trim($rrequest->get('rdesde'));
                $hasta=trim($rrequest->get('rhasta'));
                $cliente=trim($rrequest->get('rcliente'));
                $usuario=trim($rrequest->get('rusuario'));
                $estadosaldo=trim($rrequest->get('rsaldo'));
                $estadoventa=trim($rrequest->get('restadoventa'));
                $tipopago=trim($rrequest->get('rtipopago'));

                $personas=DB::table('persona')
                ->where('tipo','=','Cliente')
                ->where('idempresa','=',$idempresa)
                ->get();

                $usuarios=DB::table('users')
                ->where('idempresa','=',$idempresa)
                ->get();

                $usufiltro=DB::table('users')
					->select('name')
                	->where('id','=',$usuario)
                    ->get();
                    
                $clientefiltro=DB::table('persona')
                ->select('nombre')
                ->where('idpersona','=',$cliente)
                ->get();

                $zona_horaria = Auth::user()->zona_horaria;
                $hoy = Carbon::now($zona_horaria);
                $hoy = $hoy->format('d-m-Y');

                $nompdf = Carbon::now($zona_horaria);
                $nompdf = $nompdf->format('Y-m-d H:i:s');
                
                if($desde != '1970-01-01' or $hasta != '1970-01-01')
                {
                    if ( $estadosaldo != null )
                    {
                        $ventas=DB::table('venta as v')
                        ->join('persona as p','v.idcliente','=','p.idpersona')
                        ->join('detalle_venta as dv','v.idventa','=','dv.idventa')
                        ->join('users as u','v.idusuario','=','u.id')
                        ->select('v.idventa','p.nombre','u.name','v.tipo_comprobante','v.serie_comprobante','v.num_comprobante','v.fecha','v.impuesto','v.total_venta','v.total_compra','v.total_comision','v.total_impuesto','v.abonado','v.estado','v.estadosaldo','v.estadoventa','v.tipopago')
                        ->whereBetween('fecha', [$desde, $hasta])
                        ->where('p.idpersona','LIKE','%'.$cliente.'%')
                        ->where('u.id','LIKE','%'.$usuario.'%')
                        ->where('v.idempresa','=',$idempresa)
                        ->where('v.estado','=','A')
                        ->where('v.estadosaldo','=',$estadosaldo)
                        ->where('v.estadoventa','LIKE','%'.$estadoventa.'%')
                        ->where('v.tipopago','LIKE','%'.$tipopago.'%')
                        ->orderBy('v.fecha','asc')
                        ->groupBy('v.idventa','p.nombre','u.name','v.tipo_comprobante','v.serie_comprobante','v.num_comprobante','v.fecha','v.impuesto','v.total_venta','v.total_compra','v.total_comision','v.total_impuesto','v.abonado','v.estado','v.estadosaldo','v.estadoventa','v.tipopago')
                        ->paginate(20);
                        //return view('pdf.ventas.reporteventas',["ventas"=>$ventas,"personas"=>$personas,"usuarios"=>$usuarios,"desde"=>$desde,"hasta"=>$hasta,"cliente"=>$cliente,"usuario"=>$usuario,"estadosaldo"=>$estadosaldo,"hoy"=>$hoy,"usufiltro"=>$usufiltro,"provfiltro"=>$clientefiltro]);
                        //return view('pdf.ventas.reporteventas', array("ventas"=>$ventas,"personas"=>$personas,"usuarios"=>$usuarios,"desde"=>$desde,"hasta"=>$hasta,"cliente"=>$cliente,"usuario"=>$usuario,"estadosaldo"=>$estadosaldo,"hoy"=>$hoy,"usufiltro"=>$usufiltro,"provfiltro"=>$clientefiltro));
                    }
                    else
                    {
                        $ventas=DB::table('venta as v')
                        ->join('persona as p','v.idcliente','=','p.idpersona')
                        ->join('detalle_venta as dv','v.idventa','=','dv.idventa')
                        ->join('users as u','v.idusuario','=','u.id')
                        ->select('v.idventa','p.nombre','u.name','v.tipo_comprobante','v.serie_comprobante','v.num_comprobante','v.fecha','v.impuesto','v.total_venta','v.total_compra','v.total_comision','v.total_impuesto','v.abonado','v.estado','v.estadosaldo','v.estadoventa','v.tipopago')
                        ->whereBetween('fecha', [$desde, $hasta])
                        ->where('p.idpersona','LIKE','%'.$cliente.'%')
                        ->where('u.id','LIKE','%'.$usuario.'%')
                        ->where('v.idempresa','=',$idempresa)
                        ->where('v.estado','=','A')
                        ->where('v.estadoventa','LIKE','%'.$estadoventa.'%')
                        ->where('v.tipopago','LIKE','%'.$tipopago.'%')
                        ->where('v.estadosaldo','!=',NULL)
                        ->orderBy('v.fecha','asc')
                        ->groupBy('v.idventa','p.nombre','u.name','v.tipo_comprobante','v.serie_comprobante','v.num_comprobante','v.fecha','v.impuesto','v.total_venta','v.total_compra','v.total_comision','v.total_impuesto','v.abonado','v.estado','v.estadosaldo','v.estadoventa','v.tipopago')
                        ->paginate(20);
                        //return view('pdf.ventas.reporteventas',["ventas"=>$ventas,"personas"=>$personas,"usuarios"=>$usuarios,"desde"=>$desde,"hasta"=>$hasta,"cliente"=>$cliente,"usuario"=>$usuario,"estadosaldo"=>$estadosaldo,"hoy"=>$hoy,"usufiltro"=>$usufiltro,"provfiltro"=>$clientefiltro]);
                        //return view('pdf.ventas.reporteventas', array("ventas"=>$ventas,"personas"=>$personas,"usuarios"=>$usuarios,"desde"=>$desde,"hasta"=>$hasta,"cliente"=>$cliente,"usuario"=>$usuario,"estadosaldo"=>$estadosaldo,"hoy"=>$hoy,"usufiltro"=>$usufiltro,"provfiltro"=>$clientefiltro));
                    }
                    //return view('pdf.ventas.reporteventas',["ventas"=>$ventas,"personas"=>$personas,"usuarios"=>$usuarios,"desde"=>$desde,"hasta"=>$hasta,"cliente"=>$cliente,"usuario"=>$usuario,"estadosaldo"=>$estadosaldo,"hoy"=>$hoy,"usufiltro"=>$usufiltro,"clientefiltro"=>$clientefiltro]);
                }
                else
                {
                    $ventas=DB::table('venta as v')
                        ->join('persona as p','v.idcliente','=','p.idpersona')
                        ->join('detalle_venta as dv','v.idventa','=','dv.idventa')
                        ->join('users as u','v.idusuario','=','u.id')
                        ->select('v.idventa','p.nombre','u.name','v.tipo_comprobante','v.serie_comprobante','v.num_comprobante','v.fecha','v.impuesto','v.total_venta','v.total_compra','v.total_comision','v.total_impuesto','v.abonado','v.estado','v.estadosaldo','v.estadoventa','v.tipopago')
                        ->where('v.idempresa','=',$idempresa)
                        ->where('v.estado','=','A')
                        ->where('v.estadoventa','LIKE','%'.$estadoventa.'%')
                        ->where('v.tipopago','LIKE','%'.$tipopago.'%')
                        ->orderBy('v.fecha','asc')
                        ->groupBy('v.idventa','p.nombre','u.name','v.tipo_comprobante','v.serie_comprobante','v.num_comprobante','v.fecha','v.impuesto','v.total_venta','v.total_compra','v.total_comision','v.total_impuesto','v.abonado','v.estado','v.estadosaldo','v.estadoventa','v.tipopago')
                        ->paginate(20);
                }
                if ( $verpdf == "Descargar" )
                {
                    $view = \View::make('pdf.ventas.reporteventas', compact('ventas','personas','usuarios','desde','hasta','cliente','usuario','estadosaldo','estadoventa','tipopago','hoy','usufiltro','clientefiltro','nombreusu','empresa','imagen'))->render();
                    $pdf = \App::make('dompdf.wrapper');
                    $pdf->loadHTML($view);
                    return $pdf->download ('ReporteVentas'.$nompdf.'.pdf');
                }
                if ( $verpdf == "Navegador" )
                {
                    $view = \View::make('pdf.ventas.reporteventas', compact('ventas','personas','usuarios','desde','hasta','cliente','usuario','estadosaldo','estadoventa','tipopago','hoy','usufiltro','clientefiltro','nombreusu','empresa','imagen'))->render();
                    $pdf = \App::make('dompdf.wrapper');
                    $pdf->loadHTML($view);
                    return $pdf->stream ('ReporteVentas'.$nompdf.'.pdf');
                }
            }
        
    }

    

    public function reportecompras(ReportesFormRequest $rrequest)
    {  
            if ($rrequest)
            {
                
                $idempresa = Auth::user()->idempresa;
                $nombreusu = Auth::user()->name;
                $empresa = Auth::user()->empresa;
                if (Auth::user()->logo == null)
                {
                    $logo = null;
                    $imagen = null;
                }
                else
                {
                     $logo = Auth::user()->logo;
                     $imagen = public_path('imagenes/logos/'.$logo);
                }

                
                $verpdf=trim($rrequest->get('pdf'));
                $desde=trim($rrequest->get('rdesde'));
                $hasta=trim($rrequest->get('rhasta'));
                $proveedor=trim($rrequest->get('rproveedor'));
                $usuario=trim($rrequest->get('rusuario'));
                $estado=trim($rrequest->get('restado'));

                $personas=DB::table('persona')
                ->where('tipo','=','Cliente')
                ->where('idempresa','=',$idempresa)
                ->get();

                $usuarios=DB::table('users')
                ->where('idempresa','=',$idempresa)
                ->get();

                $usufiltro=DB::table('users')
					->select('name')
                	->where('id','=',$usuario)
                    ->get();
                    
                $provfiltro=DB::table('persona')
                ->select('nombre')
                ->where('idpersona','=',$proveedor)
                ->get();

                $zona_horaria = Auth::user()->zona_horaria;
                $hoy = Carbon::now($zona_horaria);
                $hoy = $hoy->format('d-m-Y');

                $nompdf = Carbon::now($zona_horaria);
                $nompdf = $nompdf->format('Y-m-d H:i:s');
                
                if($desde != '1970-01-01' or $hasta != '1970-01-01')
                {
                    $compras=DB::table('ingreso as i')
                    ->join('persona as p','i.idproveedor','=','p.idpersona')
                    ->join('detalle_ingreso as di','i.idingreso','=','di.idingreso')
                    ->join('users as u','i.idusuario','=','u.id')
                    ->select('i.idingreso','i.fecha','p.nombre','u.name','i.tipo_comprobante','i.serie_comprobante','i.num_comprobante','i.impuesto','i.estado',DB::raw('sum(di.cantidad*precio_compra) as total'))
                    ->whereBetween('fecha', [$desde, $hasta])
                    ->where('p.idpersona','LIKE','%'.$proveedor.'%')
                    ->where('u.id','LIKE','%'.$usuario.'%')
                    ->where('i.idempresa','=',$idempresa)
                    ->where('i.estado','LIKE','%'.$estado.'%')
                    ->orderBy('i.fecha','asc')
                    ->groupBy('i.idingreso','i.fecha','p.nombre','u.name','i.tipo_comprobante','i.serie_comprobante','i.num_comprobante','i.impuesto','i.estado')
                    ->paginate(20);
                    //return view('pdf.ventas.reporteventas',["ventas"=>$ventas,"personas"=>$personas,"usuarios"=>$usuarios,"desde"=>$desde,"hasta"=>$hasta,"cliente"=>$cliente,"usuario"=>$usuario,"estadosaldo"=>$estadosaldo,"hoy"=>$hoy,"usufiltro"=>$usufiltro,"clientefiltro"=>$clientefiltro]);
                }
                else
                {
                    $compras=DB::table('ingreso as i')
                    ->join('persona as p','i.idproveedor','=','p.idpersona')
                    ->join('detalle_ingreso as di','i.idingreso','=','di.idingreso')
                    ->join('users as u','i.idusuario','=','u.id')
                    ->select('i.idingreso','i.fecha','p.nombre','u.name','i.tipo_comprobante','i.serie_comprobante','i.num_comprobante','i.impuesto','i.estado',DB::raw('sum(di.cantidad*precio_compra) as total'))
                    ->where('i.idempresa','=',$idempresa)
                    ->orderBy('i.fecha','asc')
                    ->groupBy('i.idingreso','i.fecha','p.nombre','u.name','i.tipo_comprobante','i.serie_comprobante','i.num_comprobante','i.impuesto','i.estado')
                    ->paginate(20);
                }
                if ( $verpdf == "Descargar" )
                {
                    $view = \View::make('pdf.compras.reportecompras', compact('compras','personas','usuarios','desde','hasta','proveedor','usuario','estado','hoy','usufiltro','provfiltro','nombreusu','empresa','imagen'))->render();
                    $pdf = \App::make('dompdf.wrapper');
                    $pdf->loadHTML($view);
                    return $pdf->download ('ReporteCompras'.$nompdf.'.pdf');
                }
                if ( $verpdf == "Navegador" )
                {
                    $view = \View::make('pdf.compras.reportecompras', compact('compras','personas','usuarios','desde','hasta','proveedor','usuario','estado','hoy','usufiltro','provfiltro','nombreusu','empresa','imagen'))->render();
                    $pdf = \App::make('dompdf.wrapper');
                    $pdf->loadHTML($view);
                    return $pdf->stream ('ReporteCompras'.$nompdf.'.pdf');
                }
            }
        
    }

    public function reportecategorias(ReportesFormRequest $rrequest)
    {  
            if ($rrequest)
            {
                
                $idempresa = Auth::user()->idempresa;
                $nombreusu = Auth::user()->name;
                $empresa = Auth::user()->empresa;
                if (Auth::user()->logo == null)
                {
                    $logo = null;
                    $imagen = null;
                }
                else
                {
                     $logo = Auth::user()->logo;
                     $imagen = public_path('imagenes/logos/'.$logo);
                }

                $verpdf=trim($rrequest->get('pdf'));
                                
                $usuarios=DB::table('users')
                ->where('idempresa','=',$idempresa)
                ->get();

                $zona_horaria = Auth::user()->zona_horaria;
                $hoy = Carbon::now($zona_horaria);
                $hoy = $hoy->format('d-m-Y');

                $nompdf = Carbon::now($zona_horaria);
                $nompdf = $nompdf->format('Y-m-d H:i:s');
                

                $categorias=DB::table('categoria')
                ->where ('condicion','=','1')
                ->where('idempresa','=',$idempresa)
                ->orderBy('nombre','asc')
                ->get();
                
                if ( $verpdf == "Descargar" )
                {
                    $view = \View::make('pdf.categorias.reportecategorias', compact('categorias','hoy','nombreusu','empresa','imagen'))->render();
                    $pdf = \App::make('dompdf.wrapper');
                    $pdf->loadHTML($view);
                    return $pdf->download ('ListadoCategorias'.$nompdf.'.pdf');
                }
                if ( $verpdf == "Navegador" )
                {
                    $view = \View::make('pdf.categorias.reportecategorias', compact('categorias','hoy','nombreusu','empresa','imagen'))->render();
                    $pdf = \App::make('dompdf.wrapper');
                    $pdf->loadHTML($view);
                    return $pdf->stream ('ListadoCategorias'.$nompdf.'.pdf');
                }
            }
        
    }

    public function reportearticulos(ReportesFormRequest $rrequest)
    {  
            if ($rrequest)
            {
                
                $idempresa = Auth::user()->idempresa;
                $nombreusu = Auth::user()->name;
                $empresa = Auth::user()->empresa;
                if (Auth::user()->logo == null)
                {
                    $logo = null;
                    $imagen = null;
                }
                else
                {
                     $logo = Auth::user()->logo;
                     $imagen = public_path('imagenes/logos/'.$logo);
                     
                }
                $path = public_path('imagenes/articulos/');
                $verpdf=trim($rrequest->get('pdf'));
                $stock=trim($rrequest->get('rstock'));
                $oferta=trim($rrequest->get('roferta'));
                

                $zona_horaria = Auth::user()->zona_horaria;
                $hoy = Carbon::now($zona_horaria);
                $hoy = $hoy->format('d-m-Y');

                $nompdf = Carbon::now($zona_horaria);
                $nompdf = $nompdf->format('Y-m-d H:i:s');
                
                if ( $stock == "Stock" )
                {
                    $articulos=DB::table('articulo as a')
                    ->join('categoria as c','a.idcategoria','=','c.idcategoria')
                    ->select('a.idarticulo','a.idempresa','a.nombre','a.codigo','a.stock','c.nombre as categoria','a.bodega','a.ubicacion','a.descripcion','a.imagen','a.estado','a.ultimo_precio_venta','a.ultimo_precio_compra','ultimo_precio_oferta','oferta_activar')
                    ->where('a.idempresa','=',$idempresa)
                    ->where('a.estado','=','Activo')
                    ->where('a.stock','>',0)
                    ->where('a.oferta_activar','LIKE','%'.$oferta.'%')
                    ->orderBy('c.nombre','asc')
                    ->orderBy('a.nombre','asc')
                    ->get();
                }
                else
                {
                    $articulos=DB::table('articulo as a')
                    ->join('categoria as c','a.idcategoria','=','c.idcategoria')
                    ->select('a.idarticulo','a.idempresa','a.nombre','a.codigo','a.stock','c.nombre as categoria','a.bodega','a.ubicacion','a.descripcion','a.imagen','a.estado','a.ultimo_precio_venta','a.ultimo_precio_compra','ultimo_precio_oferta','oferta_activar')
                    ->where('a.idempresa','=',$idempresa)
                    ->where('a.estado','=','Activo')
                    ->where('a.oferta_activar','LIKE','%'.$oferta.'%')
                    ->orderBy('c.nombre','asc')
                    ->orderBy('a.nombre','asc')
                    ->get();
                }
                
                if ( $verpdf == "Descargar" )
                {
                    $view = \View::make('pdf.articulos.reportearticulos', compact('articulos','hoy','nombreusu','empresa','imagen','path'))->render();
                    $pdf = \App::make('dompdf.wrapper');
                    $pdf->loadHTML($view);
                    $pdf->setPaper('A4', 'landscape');
                    return $pdf->download ('ListadoArticulos'.$nompdf.'.pdf');
                }
                if ( $verpdf == "Navegador" )
                {
                    $view = \View::make('pdf.articulos.reportearticulos', compact('articulos','hoy','nombreusu','empresa','imagen','path'))->render();
                    $pdf = \App::make('dompdf.wrapper');
                    $pdf->loadHTML($view);
                    $pdf->setPaper('A4', 'landscape');
                    return $pdf->stream ('ListadoArticulos'.$nompdf.'.pdf');
                }
            }
        
    }

    public function reporteproveedores(ReportesFormRequest $rrequest)
    {  
            if ($rrequest)
            {
                
                $idempresa = Auth::user()->idempresa;
                $nombreusu = Auth::user()->name;
                $empresa = Auth::user()->empresa;
               if (Auth::user()->logo == null)
                {
                    $logo = null;
                    $imagen = null;
                }
                else
                {
                     $logo = Auth::user()->logo;
                     $imagen = public_path('imagenes/logos/'.$logo);
                }

                $verpdf=trim($rrequest->get('pdf'));

                $zona_horaria = Auth::user()->zona_horaria;
                $hoy = Carbon::now($zona_horaria);
                $hoy = $hoy->format('d-m-Y');

                $nompdf = Carbon::now($zona_horaria);
                $nompdf = $nompdf->format('Y-m-d H:i:s');
                

                $proveedores=DB::table('persona')
                ->where ('tipo','=','Proveedor')
                ->where('idempresa','=',$idempresa)
                ->orderBy('nombre','asc')
                ->get();
                
                if ( $verpdf == "Descargar" )
                {
                    $view = \View::make('pdf.proveedores.reporteproveedores', compact('proveedores','hoy','nombreusu','empresa','imagen'))->render();
                    $pdf = \App::make('dompdf.wrapper');
                    $pdf->loadHTML($view);
                     $pdf->setPaper('A4', 'landscape');
                    return $pdf->download ('ListadoProveedores'.$nompdf.'.pdf');
                }
                if ( $verpdf == "Navegador" )
                {
                    $view = \View::make('pdf.proveedores.reporteproveedores', compact('proveedores','hoy','nombreusu','empresa','imagen'))->render();
                    $pdf = \App::make('dompdf.wrapper');
                    $pdf->loadHTML($view);
                     $pdf->setPaper('A4', 'landscape');
                    return $pdf->stream ('ListadoProveedores'.$nompdf.'.pdf');
                }
            }
        
    }

    public function reporteclientes(ReportesFormRequest $rrequest)
    {  
            if ($rrequest)
            {
                
                $idempresa = Auth::user()->idempresa;
                $nombreusu = Auth::user()->name;
                $empresa = Auth::user()->empresa;
                if (Auth::user()->logo == null)
                {
                    $logo = null;
                    $imagen = null;
                }
                else
                {
                     $logo = Auth::user()->logo;
                     $imagen = public_path('imagenes/logos/'.$logo);
                }

                $verpdf=trim($rrequest->get('pdf'));

                $zona_horaria = Auth::user()->zona_horaria;
                $hoy = Carbon::now($zona_horaria);
                $hoy = $hoy->format('d-m-Y');

                $nompdf = Carbon::now($zona_horaria);
                $nompdf = $nompdf->format('Y-m-d H:i:s');
                


                $clientes=DB::table('persona')
                ->where ('tipo','=','Cliente')
                ->where('idempresa','=',$idempresa)
                ->orderBy('nombre','asc')
                ->get();
                
                if ( $verpdf == "Descargar" )
                {
                    $view = \View::make('pdf.clientes.reporteclientes', compact('clientes','hoy','nombreusu','empresa','imagen'))->render();
                    $pdf = \App::make('dompdf.wrapper');
                    $pdf->loadHTML($view);
                     $pdf->setPaper('A4', 'landscape');
                    return $pdf->download ('ListadoClientes'.$nompdf.'.pdf');
                }
                if ( $verpdf == "Navegador" )
                {
                    $view = \View::make('pdf.clientes.reporteclientes', compact('clientes','hoy','nombreusu','empresa','imagen'))->render();
                    $pdf = \App::make('dompdf.wrapper');
                    $pdf->loadHTML($view);
                     $pdf->setPaper('A4', 'landscape');
                    return $pdf->stream ('ListadoClientes'.$nompdf.'.pdf');
                }
            }
        
    }

    public function reporteusuarios(ReportesFormRequest $rrequest)
    {  
            if ($rrequest)
            {
                
                $idempresa = Auth::user()->idempresa;
                $nombreusu = Auth::user()->name;
                $empresa = Auth::user()->empresa;
                if (Auth::user()->logo == null)
                {
                    $logo = null;
                    $imagen = null;
                }
                else
                {
                     $logo = Auth::user()->logo;
                     $imagen = public_path('imagenes/logos/'.$logo);
                }

                $verpdf=trim($rrequest->get('pdf'));
                $zona_horaria = Auth::user()->zona_horaria;
                $hoy = Carbon::now($zona_horaria);
                $hoy = $hoy->format('d-m-Y');

                $nompdf = Carbon::now($zona_horaria);
                $nompdf = $nompdf->format('Y-m-d H:i:s');
                


                $usuarios=DB::table('users')
                ->where('idempresa','=',$idempresa)
                ->where('tipo_usuario','!=','Cliente')
                ->orderBy('principal','desc')
                ->orderBy('name','asc')
                ->get();
                
                if ( $verpdf == "Descargar" )
                {
                    $view = \View::make('pdf.usuarios.reporteusuarios', compact('usuarios','hoy','nombreusu','empresa','imagen'))->render();
                    $pdf = \App::make('dompdf.wrapper');
                    $pdf->loadHTML($view);
                     $pdf->setPaper('A4', 'landscape');
                    return $pdf->download ('ListadoUsuarios'.$nompdf.'.pdf');
                }
                if ( $verpdf == "Navegador" )
                {
                    $view = \View::make('pdf.usuarios.reporteusuarios', compact('usuarios','hoy','nombreusu','empresa','imagen'))->render();
                    $pdf = \App::make('dompdf.wrapper');
                    $pdf->loadHTML($view);
                     $pdf->setPaper('A4', 'landscape');
                    return $pdf->stream ('ListadoUsuarios'.$nompdf.'.pdf');
                }
            }
        
    }

    public function vistaarticulo(ReportesFormRequest $rrequest)
    {  
            if ($rrequest)
            {
                
                $idempresa = Auth::user()->idempresa;
                $nombreusu = Auth::user()->name;
                $empresa = Auth::user()->empresa;
                $moneda = Auth::user()->moneda;
                if (Auth::user()->logo == null)
                {
                    $logo = null;
                    $imagen = null;
                }
                else
                {
                     $logo = Auth::user()->logo;
                     $imagen = public_path('imagenes/logos/'.$logo);
                     
                }
                $path = public_path('imagenes/articulos/');
                $verpdf=trim($rrequest->get('pdf'));
                $idarticulo=trim($rrequest->get('rid'));
                $nombrearticulo=trim($rrequest->get('rnombre'));

                $zona_horaria = Auth::user()->zona_horaria;
                $hoy = Carbon::now($zona_horaria);
                $hoy = $hoy->format('d-m-Y');

                $nompdf = Carbon::now($zona_horaria);
                $nompdf = $nompdf->format('Y-m-d H:i:s');
                


                $articulo=DB::table('articulo as a')
                ->join('categoria as c','a.idcategoria','=','c.idcategoria')
                ->select('a.idarticulo','c.nombre as categoria','a.codigo','a.nombre','a.stock','a.bodega','a.ubicacion','a.descripcion','a.imagen','a.estado','a.ultimo_precio_compra','a.ultimo_precio_venta','a.ultimo_precio_oferta','a.oferta_activar')
                ->where('a.estado','=','Activo')
                ->where('a.idarticulo','=',$idarticulo)
                ->where('a.idempresa','=',$idempresa)
                ->first();
                
                if ( $verpdf == "Descargar" )
                {
                    $view = \View::make('pdf.articulos.vista.vistaarticulo', compact('articulo','hoy','nombreusu','empresa','imagen','moneda','path'))->render();
                    $pdf = \App::make('dompdf.wrapper');
                    $pdf->loadHTML($view);
                    //$pdf->setPaper('A4', 'landscape');
                    return $pdf->download ('VistaArticulo'.'-'.$nombrearticulo.'-'.$nompdf.'.pdf');
                }
                if ( $verpdf == "Navegador" )
                {
                    $view = \View::make('pdf.articulos.vista.vistaarticulo', compact('articulo','hoy','nombreusu','empresa','imagen','moneda','path'))->render();
                    $pdf = \App::make('dompdf.wrapper');
                    $pdf->loadHTML($view);
                    //$pdf->setPaper('A4', 'landscape');
                    return $pdf->stream ('VistaArticulo'.'-'.$nombrearticulo.'-'.$nompdf.'.pdf');
                }
            }
        
    }

    public function vistaproveedor(ReportesFormRequest $rrequest)
    {  
            if ($rrequest)
            {
                
                $idempresa = Auth::user()->idempresa;
                $nombreusu = Auth::user()->name;
                $empresa = Auth::user()->empresa;
                $moneda = Auth::user()->moneda;
                if (Auth::user()->logo == null)
                {
                    $logo = null;
                    $imagen = null;
                }
                else
                {
                     $logo = Auth::user()->logo;
                     $imagen = public_path('imagenes/logos/'.$logo);
                     
                }
                $path = public_path('imagenes/articulos/');
                $verpdf=trim($rrequest->get('pdf'));
                $idproveedor=trim($rrequest->get('rid'));
                $nombreproveedor=trim($rrequest->get('rnombre'));

                $zona_horaria = Auth::user()->zona_horaria;
                $hoy = Carbon::now($zona_horaria);
                $hoy = $hoy->format('d-m-Y');

                $nompdf = Carbon::now($zona_horaria);
                $nompdf = $nompdf->format('Y-m-d H:i:s');
                


                $proveedor=DB::table('persona')
                ->where('idpersona','=',$idproveedor)
                ->first();
                
                if ( $verpdf == "Descargar" )
                {
                    $view = \View::make('pdf.proveedores.vista.vistaproveedor', compact('proveedor','hoy','nombreusu','empresa','imagen','moneda','path'))->render();
                    $pdf = \App::make('dompdf.wrapper');
                    $pdf->loadHTML($view);
                    //$pdf->setPaper('A4', 'landscape');
                    return $pdf->download ('VistaProveedor'.'-'.$nombreproveedor.'-'.$nompdf.'.pdf');
                }
                if ( $verpdf == "Navegador" )
                {
                    $view = \View::make('pdf.proveedores.vista.vistaproveedor', compact('proveedor','hoy','nombreusu','empresa','imagen','moneda','path'))->render();
                    $pdf = \App::make('dompdf.wrapper');
                    $pdf->loadHTML($view);
                    //$pdf->setPaper('A4', 'landscape');
                    return $pdf->stream ('VistaProveedor'.'-'.$nombreproveedor.'-'.$nompdf.'.pdf');
                }
            }
        
    }

    public function vistacliente(ReportesFormRequest $rrequest)
    {  
            if ($rrequest)
            {
                
                $idempresa = Auth::user()->idempresa;
                $nombreusu = Auth::user()->name;
                $empresa = Auth::user()->empresa;
                $moneda = Auth::user()->moneda;
                if (Auth::user()->logo == null)
                {
                    $logo = null;
                    $imagen = null;
                }
                else
                {
                     $logo = Auth::user()->logo;
                     $imagen = public_path('imagenes/logos/'.$logo);
                     
                }
                $path = public_path('imagenes/articulos/');
                $verpdf=trim($rrequest->get('pdf'));
                $idcliente=trim($rrequest->get('rid'));
                $nombrecliente=trim($rrequest->get('rnombre'));

                $zona_horaria = Auth::user()->zona_horaria;
                $hoy = Carbon::now($zona_horaria);
                $hoy = $hoy->format('d-m-Y');

                $nompdf = Carbon::now($zona_horaria);
                $nompdf = $nompdf->format('Y-m-d H:i:s');
                


                $cliente=DB::table('persona')
                ->where('idpersona','=',$idcliente)
                ->first();
                
                if ( $verpdf == "Descargar" )
                {
                    $view = \View::make('pdf.clientes.vista.vistacliente', compact('cliente','hoy','nombreusu','empresa','imagen','moneda','path'))->render();
                    $pdf = \App::make('dompdf.wrapper');
                    $pdf->loadHTML($view);
                    //$pdf->setPaper('A4', 'landscape');
                    return $pdf->download ('Vistacliente'.'-'.$nombrecliente.'-'.$nompdf.'.pdf');
                }
                if ( $verpdf == "Navegador" )
                {
                    $view = \View::make('pdf.clientes.vista.vistacliente', compact('cliente','hoy','nombreusu','empresa','imagen','moneda','path'))->render();
                    $pdf = \App::make('dompdf.wrapper');
                    $pdf->loadHTML($view);
                    //$pdf->setPaper('A4', 'landscape');
                    return $pdf->stream ('Vistacliente'.'-'.$nombrecliente.'-'.$nompdf.'.pdf');
                }
            }
        
    }

    public function vistausuario(ReportesFormRequest $rrequest)
    {  
            if ($rrequest)
            {
                
                $idempresa = Auth::user()->idempresa;
                $nombreusu = Auth::user()->name;
                $empresa = Auth::user()->empresa;
                $moneda = Auth::user()->moneda;
                if (Auth::user()->logo == null)
                {
                    $logo = null;
                    $imagen = null;
                }
                else
                {
                     $logo = Auth::user()->logo;
                     $imagen = public_path('imagenes/logos/'.$logo);
                     
                }
                $path = public_path('imagenes/articulos/');
                $verpdf=trim($rrequest->get('pdf'));
                $idusuario=trim($rrequest->get('rid'));
                $nombreusuario=trim($rrequest->get('rnombre'));

                $zona_horaria = Auth::user()->zona_horaria;
                $hoy = Carbon::now($zona_horaria);
                $hoy = $hoy->format('d-m-Y');

                $nompdf = Carbon::now($zona_horaria);
                $nompdf = $nompdf->format('Y-m-d H:i:s');
                


                $usuario=DB::table('users')
                ->where('id','=',$idusuario)
                ->first();
                
                if ( $verpdf == "Descargar" )
                {
                    $view = \View::make('pdf.usuarios.vista.vistausuario', compact('usuario','hoy','nombreusu','empresa','imagen','moneda','path'))->render();
                    $pdf = \App::make('dompdf.wrapper');
                    $pdf->loadHTML($view);
                    //$pdf->setPaper('A4', 'landscape');
                    return $pdf->download ('VistaUsuario'.'-'.$nombreusuario.'-'.$nompdf.'.pdf');
                }
                if ( $verpdf == "Navegador" )
                {
                    $view = \View::make('pdf.usuarios.vista.vistausuario', compact('usuario','hoy','nombreusu','empresa','imagen','moneda','path'))->render();
                    $pdf = \App::make('dompdf.wrapper');
                    $pdf->loadHTML($view);
                    //$pdf->setPaper('A4', 'landscape');
                    return $pdf->stream ('VistaUsuario'.'-'.$nombreusuario.'-'.$nompdf.'.pdf');
                }
            }
        
    }

    public function vistaventa(ReportesFormRequest $rrequest)
    {  
            if ($rrequest)
            {
                
                $idempresa = Auth::user()->idempresa;
                $nombreusu = Auth::user()->name;
                $empresa = Auth::user()->empresa;
                $moneda = Auth::user()->moneda;
                if (Auth::user()->logo == null)
                {
                    $logo = null;
                    $imagen = null;
                }
                else
                {
                     $logo = Auth::user()->logo;
                     $imagen = public_path('imagenes/logos/'.$logo);
                     
                }
                $path = public_path('imagenes/articulos/');
                $verpdf=trim($rrequest->get('pdf'));
                $idventa=trim($rrequest->get('rid'));
                $comprobante=trim($rrequest->get('rcomprobante'));

                $zona_horaria = Auth::user()->zona_horaria;
                $hoy = Carbon::now($zona_horaria);
                $hoy = $hoy->format('d-m-Y');

                $nompdf = Carbon::now($zona_horaria);
                $nompdf = $nompdf->format('Y-m-d H:i:s');
                
                $venta=DB::table('venta as v')
                    ->join('persona as p','v.idcliente','=','p.idpersona')
                    ->join('users as u','v.idusuario','=','u.id')
                    ->join('detalle_venta as dv','v.idventa','=','dv.idventa')
                    ->select('v.idventa','v.fecha','p.nombre','p.tipo_documento','p.num_documento','p.telefono','p.direccion','u.name','v.tipo_comprobante','v.serie_comprobante','v.num_comprobante','v.impuesto','v.estado','v.total_venta','v.total_compra','v.total_comision','v.total_impuesto','v.abonado','v.estadosaldo','v.estadoventa','v.tipopago')
                    ->where('v.idventa','=',$idventa)
                    ->where('v.idempresa','=',$idempresa)
                    ->first();

                $detalles=DB::table('detalle_venta as d')
                    ->join('articulo as a','d.idarticulo','=','a.idarticulo')
                    ->select('a.nombre as articulo','a.codigo','d.cantidad','d.descuento','d.precio_compra','d.precio_venta')
                    ->where('d.idventa','=',$idventa)
                    ->get();
                
                if ( $verpdf == "Descargar" )
                {
                    $view = \View::make('pdf.ventas.vista.vistaventa', compact('venta','detalles','hoy','nombreusu','empresa','imagen','moneda','path'))->render();
                    $pdf = \App::make('dompdf.wrapper');
                    $pdf->loadHTML($view);
                    //$pdf->setPaper('A4', 'landscape');
                    return $pdf->download ('Vistaventa'.'-'.$comprobante.'-'.$nompdf.'.pdf');
                }
                if ( $verpdf == "Navegador" )
                {
                    $view = \View::make('pdf.ventas.vista.vistaventa', compact('venta','detalles','hoy','nombreusu','empresa','imagen','moneda','path'))->render();
                    $pdf = \App::make('dompdf.wrapper');
                    $pdf->loadHTML($view);
                    //$pdf->setPaper('A4', 'landscape');
                    return $pdf->stream ('Vistaventa'.'-'.$comprobante.'-'.$nompdf.'.pdf');
                }
            }
        
    }

    public function vistaventareporte(ReportesFormRequest $rrequest)
    {  
            if ($rrequest)
            {
                
                $idempresa = Auth::user()->idempresa;
                $nombreusu = Auth::user()->name;
                $empresa = Auth::user()->empresa;
                $moneda = Auth::user()->moneda;
                if (Auth::user()->logo == null)
                {
                    $logo = null;
                    $imagen = null;
                }
                else
                {
                     $logo = Auth::user()->logo;
                     $imagen = public_path('imagenes/logos/'.$logo);
                     
                }
                $path = public_path('imagenes/articulos/');
                $verpdf=trim($rrequest->get('pdf'));
                $idventa=trim($rrequest->get('rid'));
                $comprobante=trim($rrequest->get('rcomprobante'));

                $zona_horaria = Auth::user()->zona_horaria;
                $hoy = Carbon::now($zona_horaria);
                $hoy = $hoy->format('d-m-Y');

                $nompdf = Carbon::now($zona_horaria);
                $nompdf = $nompdf->format('Y-m-d H:i:s');
                
                $venta=DB::table('venta as v')
                    ->join('persona as p','v.idcliente','=','p.idpersona')
                    ->join('users as u','v.idusuario','=','u.id')
                    ->join('detalle_venta as dv','v.idventa','=','dv.idventa')
                    ->select('v.idventa','v.fecha','p.nombre','p.tipo_documento','p.num_documento','p.telefono','p.direccion','u.name','v.tipo_comprobante','v.serie_comprobante','v.num_comprobante','v.impuesto','v.estado','v.total_venta','v.total_compra','v.total_comision','v.total_impuesto','v.abonado','v.estadosaldo','v.estadoventa','tipopago')
                    ->where('v.idventa','=',$idventa)
                    ->where('v.idempresa','=',$idempresa)
                    ->first();

                $detalles=DB::table('detalle_venta as d')
                    ->join('articulo as a','d.idarticulo','=','a.idarticulo')
                    ->select('a.nombre as articulo','a.codigo','d.cantidad','d.descuento','d.precio_compra','d.precio_venta')
                    ->where('d.idventa','=',$idventa)
                    ->get();
                
                if ( $verpdf == "Descargar" )
                {
                    $view = \View::make('reportes.ventas.vista.vistaventareporte', compact('venta','detalles','hoy','nombreusu','empresa','imagen','moneda','path'))->render();
                    $pdf = \App::make('dompdf.wrapper');
                    $pdf->loadHTML($view);
                    //$pdf->setPaper('A4', 'landscape');
                    return $pdf->download ('Vistaventareporte'.'-'.$comprobante.'-'.$nompdf.'.pdf');
                }
                if ( $verpdf == "Navegador" )
                {
                    $view = \View::make('reportes.ventas.vista.vistaventareporte', compact('venta','detalles','hoy','nombreusu','empresa','imagen','moneda','path'))->render();
                    $pdf = \App::make('dompdf.wrapper');
                    $pdf->loadHTML($view);
                    //$pdf->setPaper('A4', 'landscape');
                    return $pdf->stream ('Vistaventareporte'.'-'.$comprobante.'-'.$nompdf.'.pdf');
                }
            }
        
    }

    public function vistacompra(ReportesFormRequest $rrequest)
    {  
            if ($rrequest)
            {
                
                $idempresa = Auth::user()->idempresa;
                $nombreusu = Auth::user()->name;
                $empresa = Auth::user()->empresa;
                $moneda = Auth::user()->moneda;
                if (Auth::user()->logo == null)
                {
                    $logo = null;
                    $imagen = null;
                }
                else
                {
                     $logo = Auth::user()->logo;
                     $imagen = public_path('imagenes/logos/'.$logo);
                     
                }
                $path = public_path('imagenes/articulos/');
                $verpdf=trim($rrequest->get('pdf'));
                $idcompra=trim($rrequest->get('rid'));
                $comprobante=trim($rrequest->get('rcomprobante'));

                $zona_horaria = Auth::user()->zona_horaria;
                $hoy = Carbon::now($zona_horaria);
                $hoy = $hoy->format('d-m-Y');

                $nompdf = Carbon::now($zona_horaria);
                $nompdf = $nompdf->format('Y-m-d H:i:s');
                
                $ingreso=DB::table('ingreso as i')
                    ->join('persona as p','i.idproveedor','=','p.idpersona')
                    ->join('users as u','i.idusuario','=','u.id')
                    ->join('detalle_ingreso as di','i.idingreso','=','di.idingreso')
                    ->select('i.idingreso','i.fecha','p.nombre','p.tipo_documento','p.num_documento','p.telefono','p.direccion','u.name','i.tipo_comprobante','i.serie_comprobante','i.num_comprobante','i.impuesto','i.estado',DB::raw('sum(di.cantidad*precio_compra) as total'))
                    ->groupBy('i.idingreso','i.fecha','p.nombre','p.tipo_documento','p.num_documento','p.telefono','p.direccion','u.name','i.tipo_comprobante','i.serie_comprobante','i.num_comprobante','i.impuesto','i.estado')
                    ->where('i.idingreso','=',$idcompra)
                    ->where('i.idempresa','=',$idempresa)
                    ->first();

                $detalles=DB::table('detalle_ingreso as d')
                    ->join('articulo as a','d.idarticulo','=','a.idarticulo')
                    ->select('a.codigo as codigo','a.nombre as articulo','d.cantidad','d.precio_compra','d.precio_venta','d.precio_oferta')
                    ->where('d.idingreso','=',$idcompra)
                    ->get();
                
                if ( $verpdf == "Descargar" )
                {
                    $view = \View::make('pdf.compras.vista.vistacompra', compact('ingreso','detalles','hoy','nombreusu','empresa','imagen','moneda','path'))->render();
                    $pdf = \App::make('dompdf.wrapper');
                    $pdf->loadHTML($view);
                    //$pdf->setPaper('A4', 'landscape');
                    return $pdf->download ('Vistacompra'.'-'.$comprobante.'-'.$nompdf.'.pdf');
                }
                if ( $verpdf == "Navegador" )
                {
                    $view = \View::make('pdf.compras.vista.vistacompra', compact('ingreso','detalles','hoy','nombreusu','empresa','imagen','moneda','path'))->render();
                    $pdf = \App::make('dompdf.wrapper');
                    $pdf->loadHTML($view);
                    //$pdf->setPaper('A4', 'landscape');
                    return $pdf->stream ('Vistacompra'.'-'.$comprobante.'-'.$nompdf.'.pdf');
                }
            }
        
    }

    public function vistacomprareporte(ReportesFormRequest $rrequest)
    {  
            if ($rrequest)
            {
                
                $idempresa = Auth::user()->idempresa;
                $nombreusu = Auth::user()->name;
                $empresa = Auth::user()->empresa;
                $moneda = Auth::user()->moneda;
                if (Auth::user()->logo == null)
                {
                    $logo = null;
                    $imagen = null;
                }
                else
                {
                     $logo = Auth::user()->logo;
                     $imagen = public_path('imagenes/logos/'.$logo);
                     
                }
                $path = public_path('imagenes/articulos/');
                $verpdf=trim($rrequest->get('pdf'));
                $idcompra=trim($rrequest->get('rid'));
                $comprobante=trim($rrequest->get('rcomprobante'));

                $zona_horaria = Auth::user()->zona_horaria;
                $hoy = Carbon::now($zona_horaria);
                $hoy = $hoy->format('d-m-Y');

                $nompdf = Carbon::now($zona_horaria);
                $nompdf = $nompdf->format('Y-m-d H:i:s');
                
                $ingreso=DB::table('ingreso as i')
                    ->join('persona as p','i.idproveedor','=','p.idpersona')
                    ->join('users as u','i.idusuario','=','u.id')
                    ->join('detalle_ingreso as di','i.idingreso','=','di.idingreso')
                    ->select('i.idingreso','i.fecha','p.nombre','p.tipo_documento','p.num_documento','p.telefono','p.direccion','u.name','i.tipo_comprobante','i.serie_comprobante','i.num_comprobante','i.impuesto','i.estado',DB::raw('sum(di.cantidad*precio_compra) as total'))
                    ->groupBy('i.idingreso','i.fecha','p.nombre','p.tipo_documento','p.num_documento','p.telefono','p.direccion','u.name','i.tipo_comprobante','i.serie_comprobante','i.num_comprobante','i.impuesto','i.estado')
                    ->where('i.idingreso','=',$idcompra)
                    ->where('i.idempresa','=',$idempresa)
                    ->first();

                $detalles=DB::table('detalle_ingreso as d')
                    ->join('articulo as a','d.idarticulo','=','a.idarticulo')
                    ->select('a.codigo as codigo','a.nombre as articulo','d.cantidad','d.precio_compra','d.precio_venta','d.precio_oferta')
                    ->where('d.idingreso','=',$idcompra)
                    ->get();
                
                if ( $verpdf == "Descargar" )
                {
                    $view = \View::make('reportes.ingresos.vista.vistacomprareporte', compact('ingreso','detalles','hoy','nombreusu','empresa','imagen','moneda','path'))->render();
                    $pdf = \App::make('dompdf.wrapper');
                    $pdf->loadHTML($view);
                    //$pdf->setPaper('A4', 'landscape');
                    return $pdf->download ('Vistacomprareporte'.'-'.$comprobante.'-'.$nompdf.'.pdf');
                }
                if ( $verpdf == "Navegador" )
                {
                    $view = \View::make('reportes.ingresos.vista.vistacomprareporte', compact('ingreso','detalles','hoy','nombreusu','empresa','imagen','moneda','path'))->render();
                    $pdf = \App::make('dompdf.wrapper');
                    $pdf->loadHTML($view);
                    //$pdf->setPaper('A4', 'landscape');
                    return $pdf->stream ('Vistacomprareporte'.'-'.$comprobante.'-'.$nompdf.'.pdf');
                }
            }
        
    }
    
    
    public function vistacotizacion(ReportesFormRequest $rrequest)
    {  
            if ($rrequest)
            {
                
                $idempresa = Auth::user()->idempresa;
                $nombreusu = Auth::user()->name;
                $empresa = Auth::user()->empresa;
                $moneda = Auth::user()->moneda;
                if (Auth::user()->logo == null)
                {
                    $logo = null;
                    $imagen = null;
                }
                else
                {
                     $logo = Auth::user()->logo;
                     $imagen = public_path('imagenes/logos/'.$logo);
                     
                }
                $path = public_path('imagenes/articulos/');
                $verpdf=trim($rrequest->get('pdf'));
                $idcotizacion=trim($rrequest->get('rid'));
                $cliente=trim($rrequest->get('rcliente'));

                $zona_horaria = Auth::user()->zona_horaria;
                $hoy = Carbon::now($zona_horaria);
                $hoy = $hoy->format('d-m-Y');

                $nompdf = Carbon::now($zona_horaria);
                $nompdf = $nompdf->format('Y-m-d H:i:s');
                
                $cotizacion=DB::table('cotizacion as v')
                    ->join('persona as p','v.idcliente','=','p.idpersona')
                    ->join('users as u','v.idusuario','=','u.id')
                    ->join('detalle_cotizacion as dv','v.idcotizacion','=','dv.idcotizacion')
                    ->select('v.idcotizacion','v.fecha','p.nombre','p.tipo_documento','p.num_documento','p.telefono','p.direccion','u.name','v.tipo_comprobante','v.impuesto','v.estado','v.total_cotizacion','v.total_compra','v.total_comision','v.total_impuesto','v.abonado','observaciones')
                    ->where('v.idcotizacion','=',$idcotizacion)
                    ->where('v.idempresa','=',$idempresa)
                    ->first();

                $detalles=DB::table('detalle_cotizacion as d')
                    ->join('articulo as a','d.idarticulo','=','a.idarticulo')
                    ->select('a.nombre as articulo','a.descripcion as descripcion','a.imagen as imagen','a.codigo','d.cantidad','d.descuento','d.precio_compra','d.precio_venta')
                    ->where('d.idcotizacion','=',$idcotizacion)
                    ->get();
                
                if ( $verpdf == "Descargar" )
                {
                    $view = \View::make('pdf.cotizaciones.vista.vistacotizacion', compact('cotizacion','detalles','hoy','nombreusu','empresa','imagen','moneda','path'))->render();
                    $pdf = \App::make('dompdf.wrapper');
                    $pdf->loadHTML($view);
                    //$pdf->setPaper('A4', 'landscape');
                    return $pdf->download ('Vistacotizacion'.'-'.$cliente.'-'.$nompdf.'.pdf');
                }
                if ( $verpdf == "Navegador" )
                {
                    $view = \View::make('pdf.cotizaciones.vista.vistacotizacion', compact('cotizacion','detalles','hoy','nombreusu','empresa','imagen','moneda','path'))->render();
                    $pdf = \App::make('dompdf.wrapper');
                    $pdf->loadHTML($view);
                    //$pdf->setPaper('A4', 'landscape');
                    return $pdf->stream ('Vistacotizacion'.'-'.$cliente.'-'.$nompdf.'.pdf');
                }
            }
        
    }

    public function reportebitacora(ReportesFormRequest $rrequest)
    {  
            if ($rrequest)
            {
                
                $idempresa = Auth::user()->idempresa;
                $nombreusu = Auth::user()->name;
                $empresa = Auth::user()->empresa;
                if (Auth::user()->logo == null)
                {
                    $logo = null;
                    $imagen = null;
                }
                else
                {
                     $logo = Auth::user()->logo;
                     $imagen = public_path('imagenes/logos/'.$logo);
                }

                
                $verpdf=trim($rrequest->get('pdf'));
                $fecha=trim($rrequest->get('rfecha'));
                $usuario=trim($rrequest->get('rusuario'));
                $tipo=trim($rrequest->get('rtipo'));

                $usuarios=DB::table('users')
                ->where('idempresa','=',$idempresa)
                ->get();

                $usufiltro=DB::table('users')
					->select('name')
                	->where('id','=',$usuario)
                    ->get();

                $zona_horaria = Auth::user()->zona_horaria;
                $hoy = Carbon::now($zona_horaria);
                $hoy = $hoy->format('d-m-Y');

                $nompdf = Carbon::now($zona_horaria);
                $nompdf = $nompdf->format('Y-m-d H:i:s');
                
                if($fecha != '1970-01-01')
                {
                    $bitacora=DB::table('bitacora as b')
                    ->join('users as u','b.idusuario','=','u.id')
                    ->select('b.idbitacora','b.idempresa','u.name','b.fecha','b.tipo','b.descripcion')
                    ->whereDate('b.fecha',$fecha)
                    ->where('u.id','LIKE','%'.$usuario.'%')
                    ->where('b.idempresa','=',$idempresa)
                    ->where('b.tipo','LIKE','%'.$tipo.'%')
                    ->orderBy('b.fecha','desc')
                    ->groupBy('b.idbitacora','b.idempresa','u.name','b.fecha','b.tipo','b.descripcion')
                    ->paginate(20);
                }
                else
                {
                    $bitacora=DB::table('bitacora as b')
                    ->join('users as u','b.idusuario','=','u.id')
                    ->select('b.idbitacora','b.idempresa','u.name','b.fecha','b.tipo','b.descripcion')
                    ->where('u.id','LIKE','%'.$usuario.'%')
                    ->where('b.idempresa','=',$idempresa)
                    ->where('b.tipo','LIKE','%'.$tipo.'%')
                    ->orderBy('b.fecha','desc')
                    ->groupBy('b.idbitacora','b.idempresa','u.name','b.fecha','b.tipo','b.descripcion')
                    ->paginate(50);
                }  
                if ( $verpdf == "Descargar" )
                {
                    $view = \View::make('pdf.bitacora.reportebitacora', compact('bitacora','usuarios','fecha','tipo','usuario','hoy','usufiltro','nombreusu','empresa','imagen'))->render();
                    $pdf = \App::make('dompdf.wrapper');
                    $pdf->loadHTML($view);
                    return $pdf->download ('ReporteBitacora'.$nompdf.'.pdf');
                }
                if ( $verpdf == "Navegador" )
                {
                    $view = \View::make('pdf.bitacora.reportebitacora', compact('bitacora','usuarios','fecha','tipo','usuario','hoy','usufiltro','nombreusu','empresa','imagen'))->render();
                    $pdf = \App::make('dompdf.wrapper');
                    $pdf->loadHTML($view);
                    return $pdf->stream ('ReporteBitacora'.$nompdf.'.pdf');
                }
            }
        
    }

    public function vistabitacorareporte(ReportesFormRequest $rrequest)
    {  
            if ($rrequest)
            {
                
                $idempresa = Auth::user()->idempresa;
                $nombreusu = Auth::user()->name;
                $empresa = Auth::user()->empresa;
                $moneda = Auth::user()->moneda;
                if (Auth::user()->logo == null)
                {
                    $logo = null;
                    $imagen = null;
                }
                else
                {
                     $logo = Auth::user()->logo;
                     $imagen = public_path('imagenes/logos/'.$logo);
                     
                }
                $path = public_path('imagenes/articulos/');
                $verpdf=trim($rrequest->get('pdf'));
                $idbitacora=trim($rrequest->get('rid'));

                $zona_horaria = Auth::user()->zona_horaria;
                $hoy = Carbon::now($zona_horaria);
                $hoy = $hoy->format('d-m-Y');

                $nompdf = Carbon::now($zona_horaria);
                $nompdf = $nompdf->format('Y-m-d H:i:s');
                
                $bitacora=DB::table('bitacora as b')
                    ->join('users as u','b.idusuario','=','u.id')
                    ->select('b.idbitacora','b.idempresa','u.name','b.fecha','b.tipo','b.descripcion')
                    ->where('b.idbitacora','=',$idbitacora)
                    ->where('b.idempresa','=',$idempresa)
                    ->first();

                
                if ( $verpdf == "Descargar" )
                {
                    $view = \View::make('reportes.bitacora.vista.vistabitacorareporte', compact('bitacora','hoy','nombreusu','empresa','imagen','moneda','path'))->render();
                    $pdf = \App::make('dompdf.wrapper');
                    $pdf->loadHTML($view);
                    //$pdf->setPaper('A4', 'landscape');
                    return $pdf->download ('Vistabitacorareporte'.'-'.$nompdf.'.pdf');
                }
                if ( $verpdf == "Navegador" )
                {
                    $view = \View::make('reportes.bitacora.vista.vistabitacorareporte', compact('bitacora','hoy','nombreusu','empresa','imagen','moneda','path'))->render();
                    $pdf = \App::make('dompdf.wrapper');
                    $pdf->loadHTML($view);
                    //$pdf->setPaper('A4', 'landscape');
                    return $pdf->stream ('Vistabitacorareporte'.'-'.$nompdf.'.pdf');
                }
            }
        
    }

    public function reportearticuloscliente(ReportesFormRequest $rrequest)
    {  
            if ($rrequest)
            {
                $datosConfig=DB::table('users')->first();
                $idempresa = $datosConfig->idempresa;
                $nombreusu = $datosConfig->name;
                $empresa = $datosConfig->empresa;
                if ($datosConfig->logo == null)
                {
                    $logo = null;
                    $imagen = null;
                }
                else
                {
                     $logo = $datosConfig->logo;
                     $imagen = public_path('imagenes/logos/'.$logo);
                     
                }
                $path = public_path('imagenes/articulos/');
                $verpdf=trim($rrequest->get('pdf'));
                $stock=trim($rrequest->get('rstock'));
                $oferta=trim($rrequest->get('roferta'));
                

                $zona_horaria = $datosConfig->zona_horaria;
                $hoy = Carbon::now($zona_horaria);
                $hoy = $hoy->format('d-m-Y');

                $nompdf = Carbon::now($zona_horaria);
                $nompdf = $nompdf->format('Y-m-d H:i:s');
                
                if ( $stock == "Stock" )
                {
                    $articulos=DB::table('articulo as a')
                    ->join('categoria as c','a.idcategoria','=','c.idcategoria')
                    ->select('a.idarticulo','a.idempresa','a.nombre','a.codigo','a.stock','c.nombre as categoria','a.bodega','a.ubicacion','a.descripcion','a.imagen','a.estado','a.ultimo_precio_venta','a.ultimo_precio_compra','ultimo_precio_oferta','oferta_activar')
                    ->where('a.idempresa','=',$idempresa)
                    ->where('a.estado','=','Activo')
                    ->where('a.activar_tienda','=','Activado')
                    ->where('a.stock','>',0)
                    ->where('a.oferta_activar','LIKE','%'.$oferta.'%')
                    ->orderBy('c.nombre','asc')
                    ->orderBy('a.nombre','asc')
                    ->get();
                }
                else
                {
                    $articulos=DB::table('articulo as a')
                    ->join('categoria as c','a.idcategoria','=','c.idcategoria')
                    ->select('a.idarticulo','a.idempresa','a.nombre','a.codigo','a.stock','c.nombre as categoria','a.bodega','a.ubicacion','a.descripcion','a.imagen','a.estado','a.ultimo_precio_venta','a.ultimo_precio_compra','ultimo_precio_oferta','oferta_activar')
                    ->where('a.idempresa','=',$idempresa)
                    ->where('a.estado','=','Activo')
                    ->where('a.activar_tienda','=','Activado')
                    ->where('a.oferta_activar','LIKE','%'.$oferta.'%')
                    ->orderBy('c.nombre','asc')
                    ->orderBy('a.nombre','asc')
                    ->get();
                }
                
                if ( $verpdf == "Descargar" )
                {
                    $view = \View::make('pdf.articulos.cliente.reportearticulos', compact('articulos','hoy','nombreusu','empresa','imagen','path'))->render();
                    $pdf = \App::make('dompdf.wrapper');
                    $pdf->loadHTML($view);
                    $pdf->setPaper('A4', 'landscape');
                    return $pdf->download ('ListadoArticulos'.$nompdf.'.pdf');
                }
                if ( $verpdf == "Navegador" )
                {
                    $view = \View::make('pdf.articulos.cliente.reportearticulos', compact('articulos','hoy','nombreusu','empresa','imagen','path'))->render();
                    $pdf = \App::make('dompdf.wrapper');
                    $pdf->loadHTML($view);
                    $pdf->setPaper('A4', 'landscape');
                    return $pdf->stream ('ListadoArticulos'.$nompdf.'.pdf');
                }
            }
        
    }

    public function vistaorden(ReportesFormRequest $rrequest)
    {  
            if ($rrequest)
            {
                
                $idempresa = Auth::user()->idempresa;
                $nombreusu = Auth::user()->name;
                $empresa = Auth::user()->empresa;
                $moneda = Auth::user()->moneda;
                if (Auth::user()->logo == null)
                {
                    $logo = null;
                    $imagen = null;
                }
                else
                {
                     $logo = Auth::user()->logo;
                     $imagen = public_path('imagenes/logos/'.$logo);
                     
                }
                $path = public_path('imagenes/articulos/');
                $verpdf=trim($rrequest->get('pdf'));
                $idorden=trim($rrequest->get('rid'));
                $nombrearticulo=trim($rrequest->get('rnombre'));

                $zona_horaria = Auth::user()->zona_horaria;
                $hoy = Carbon::now($zona_horaria);
                $hoy = $hoy->format('d-m-Y');

                $nompdf = Carbon::now($zona_horaria);
                $nompdf = $nompdf->format('Y-m-d H:i:s');
                
                $orden=DB::table('orden as o')
                    ->join('persona as c','o.idcliente','=','c.idpersona')
                    ->select('o.idorden','o.idempresa','o.idcliente','c.nombre as cliente','o.fecha','o.fecha_update','o.codigo','o.comentarios','o.total','o.estado','o.condicion','o.estado_orden','o.estado_pago','o.nom_contacto','o.email_contacto','o.telefono_contacto','o.whatsapp_contacto','o.tipo_pago','o.link_pago','o.pais','o.departamento','o.municipio','o.direccion','o.envio')
                    ->where('o.idorden','=',$idorden)
                    ->first();

                $detalles=DB::table('orden_detalle as d')
                    ->join('articulo as a','d.idarticulo','=','a.idarticulo')
                    ->join('categoria as c','a.idcategoria','=','c.idcategoria')
			        ->select('d.idorden_detalle','d.idorden','d.idarticulo','a.nombre as articulo','a.imagen','c.nombre as categoria','a.codigo','d.cantidad','d.precio','d.estado','d.condicion')
                    ->where('d.condicion','=','1')
                    ->where('d.idorden','=',$idorden)
                    ->get();
                    
                if ( $verpdf == "Descargar" )
                {
                    $view = \View::make('pdf.ordenes.vista.vistaorden', compact('orden','detalles','hoy','nombreusu','empresa','imagen','moneda','path'))->render();
                    $pdf = \App::make('dompdf.wrapper');
                    $pdf->loadHTML($view);
                    //$pdf->setPaper('A4', 'landscape');
                    return $pdf->download ('VistaOrden'.'-'.$orden->codigo.'-'.$nompdf.'.pdf');
                }
                if ( $verpdf == "Navegador" )
                {
                    $view = \View::make('pdf.ordenes.vista.vistaorden', compact('orden','detalles','hoy','nombreusu','empresa','imagen','moneda','path'))->render();
                    $pdf = \App::make('dompdf.wrapper');
                    $pdf->loadHTML($view);
                    //$pdf->setPaper('A4', 'landscape');
                    return $pdf->stream ('VistaOrden'.'-'.$orden->codigo.'-'.$nompdf.'.pdf');
                }
            }
        
    }
}
