<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\Seccion;
use App\Sede;
use App\Evento;
use App\Carrera;
use App\Egresados;
use App\Pagina;
use App\Historia;
use App\Blog;

use View;
use DB;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$menu = Menu::where('activo', 1)->orderBy('orden', 'asc')->get();
        $carreras = Carrera::where('activo', 1)->orderBy('orden', 'asc')->get();
        $sedes = Sede::where('activo', 1)->orderBy('id', 'asc')->get();
        $eventos = Evento::where('activo', 1)->orderBy('fecha', 'asc')->get();
        $historia = Historia::where('activo', 1)->orderBy('orden', 'asc')->with('Internas')->get();
    	$secciones = Seccion::where('activo', 1)->orderBy('orden', 'asc')->with('Contenidos')->get();
    	//dd($historia);
        return view('welcome')
        ->with('menu', $menu)
        ->with('sedes', $sedes)
        ->with('carreras', $carreras)
        ->with('eventos', $eventos)
        ->with('historia', $historia)
        ->with('secciones', $secciones);
    }

    public static function getIdYoutube($url = '', $width = '100%', $height = '100%') {
        $idVideoYoutube = '#(?:https?://)?(?:www\.)?(?:youtu\.be/|youtube\.com(?:/embed/|/v/|/watch\?v=))([^&\#]*)#';
        $result = preg_match($idVideoYoutube, $url, $youtube);
        $videos = array();

        if (!empty($youtube)) {
            $idvideo = $youtube[1];

            $videos['iframe'] = '<iframe id="player" type="text/html" width="' . $width . '" height="' . $height . '" src="http://www.youtube.com/embed/' . $idvideo . '?iv_load_policy=3&autoplay=1&controls=0&loop=1&controls=0&showinfo=0&branding=0&autohide=0&disablekb=1&enablejsapi=1&fs=0&rel=0&modestbranding=1&origin=//tls-web.test/" frameborder="0" allow="autoplay; encrypted-media"></iframe>';

            return $videos;
        }
    }

    public static function getVideoIdYoutube($url = '', $width = '100%', $height = '100%') {
        $idVideoYoutube = '#(?:https?://)?(?:www\.)?(?:youtu\.be/|youtube\.com(?:/embed/|/v/|/watch\?v=))([^&\#]*)#';
        $result = preg_match($idVideoYoutube, $url, $youtube);
        $videos = array();

        if (!empty($youtube)) {
            $idvideo = $youtube[1];

            return $idvideo;
        }
    }

    public function evento($id)
    {
        $evento = Evento::where('activo', 1)->where('id', $id)->get();
        $menu = Menu::where('activo', 1)->orderBy('orden', 'asc')->get();

        return View::make('evento')
        ->with('title', $id)
        ->with('menu', $menu)
        ->with('evento', $evento);
    }

    public function sigCarrera($id){
        //Obtener siguiente carrera
        $next = DB::table('carreras')->where('id', '>', $id)->where('activo', 1)->orderBy('id','asc')->first();
        if(!$next)
            $next = DB::table('carreras')->where('activo', 1)->orderBy('id','asc')->first();

        return $next;
    }

    public  function antCarrera($id){
        //Obtener carrera anterior
        $prev = DB::table('carreras')->where('id', '<', $id)->where('activo', 1)->orderBy('id','desc')->first();
        if(!$prev)
            $prev = DB::table('carreras')->where('activo', 1)->orderBy('id','desc')->first();
        return $prev;
    }

    public function carrera($id)
    {
        $carrera = Carrera::where('activo', 1)->where('id', $id)->get();
        $sigCarrera = $this->sigCarrera($carrera[0]->id);
        $antCarrera = $this->antCarrera($carrera[0]->id);
        $menu = Menu::where('activo', 1)->orderBy('orden', 'asc')->get();

        return View::make('carrera')
        ->with('title', $id)
        ->with('menu', $menu)
        ->with('carrera', $carrera)
        ->with('sigCarrera', $sigCarrera)
        ->with('antCarrera', $antCarrera);
    }

    public function sigPagina($id, $id_seccion){
        //Obtener siguiente carrera
        $next = DB::table('paginas')->where('id', '>', $id)->where('id_seccion', $id_seccion)->where('activo', 1)->orderBy('id','asc')->first();
        if(!$next)
            $next = DB::table('paginas')->where('id_seccion', $id_seccion)->where('activo', 1)->orderBy('id','asc')->first();

        return $next;
    }

    public  function antPagina($id, $id_seccion){
        //Obtener carrera anterior
        $prev = DB::table('paginas')->where('id', '<', $id)->where('id_seccion', $id_seccion)->where('activo', 1)->orderBy('id','desc')->first();
        if(!$prev)
            $prev = DB::table('paginas')->where('id_seccion', $id_seccion)->where('activo', 1)->orderBy('id','desc')->first();
        return $prev;
    }

    public function pagina($id,$slug)
    {
        $pagina = Pagina::where('activo', 1)->where('id', $id)->where('slug', $slug)->take(1)
               ->get();
        $menu = Menu::where('activo', 1)->orderBy('orden', 'asc')->get();

        if (count($pagina) > 0) {
            switch ($pagina[0]->tipo_pagina) {
                case 1:
                        //Manda la información a el template 1
                        return view('pagina_1')
                        ->with('title', $slug)
                        ->with('menu', $menu)
                        ->with('pagina', $pagina);
                    break;
                case 2:
                        //Manda la información a el template 2
                        $sigPagina = $this->sigPagina($pagina[0]->id, $pagina[0]->id_seccion);
                        $antPagina = $this->antPagina($pagina[0]->id, $pagina[0]->id_seccion);
                        //dd($sigPagina);
                        return view('pagina_2')
                        ->with('title', $slug)
                        ->with('menu', $menu)
                        ->with('pagina', $pagina)
                        ->with('antPagina', $antPagina)
                        ->with('sigPagina', $sigPagina);
                    break;
                case 3:
                        //Manda la información a el template 3
                        return view('pagina_3')
                        ->with('title', $slug)
                        ->with('menu', $menu)
                        ->with('pagina', $pagina);
                    break;                
                default:
                    return abort(404);
                    break;
            }
        }else{
            return abort(404);
        }

    }

    public function listaEgresadosCarrera($id, $slug)
    {

        $carExist = Carrera::where('id', $id)->where('slug', $slug)->where('activo', 1)->first();
        if (count($carExist) > 0) {

            $lista_egresados = Egresados::where('id_carrera', $carExist->id)->where('activo', 1)->get();
            $lista_carreras = Carrera::where('id', '!=', $carExist->id)->where('activo', 1)->get();
            $menu = Menu::where('activo', 1)->orderBy('orden', 'asc')->get();
            //dd($lista_carreras);
            return view('lista_egresados_carrera')
            ->with('menu', $menu)
            ->with('carrera', $carExist)
            ->with('lista_carreras', $lista_carreras)
            ->with('lista_egresados', $lista_egresados);

        }else{
            return abort(404);
        }
        
    }

    public function listaEgresados()
    {
        $lista_egresados = Egresados::where('activo', 1)->get();
        $menu = Menu::where('activo', 1)->orderBy('orden', 'asc')->get();

        return view('lista_egresados')
        ->with('menu', $menu)
        ->with('lista_egresados', $lista_egresados);
    }

    public function egresado($id)
    {
        $egresado = Egresados::where('activo', 1)->where('id', $id)->get();
        $menu = Menu::where('activo', 1)->orderBy('orden', 'asc')->get();

        return View::make('egresado')
        ->with('title', $id)
        ->with('menu', $menu)
        ->with('egresado', $egresado);
    }

    public function modalidadesTitulacion()
    {
        $seccion = Seccion::where('activo', 1)->where('nombre', 'like', '%Carreras Profesionales%')->orderBy('orden', 'asc')->with('Contenidos')->get();
        $menu = Menu::where('activo', 1)->orderBy('orden', 'asc')->get();
        
        //dd($secciones[0]->contenidos);
        if ($seccion[0]->contenidos) {
            return View::make('modalidades-titulacion')
            ->with('menu', $menu)
            ->with('seccion', $seccion);
            
        }else{
            return abort(404);
        }        
    }

    public function blog()
    {
        $articulos = Blog::where('activo', 1)->orderBy('created_at', 'desc')->take(4)->get();
        $menu = Menu::where('activo', 1)->orderBy('orden', 'asc')->get();

        if (count($articulos) > 0) {

            //Envia la información hacia la plantilla
            return view('blog')
            ->with('menu', $menu)
            ->with('articulos', $articulos);

        }else{
            return abort(404);
        }

    }

    public function articulo($id, $slug)
    {
        $articulo = Blog::where('id', $id)->where('slug', $slug)->where('activo', 1)->get();
        $menu = Menu::where('activo', 1)->orderBy('orden', 'asc')->get();

        if (count($articulo) > 0) {

            $lista_articulos = Blog::where('id', '!=', $articulo[0]->id)->where('activo', 1)->orderBy('created_at', 'desc')->take(3)->get();

            //Envia la información hacia la plantilla
            return view('articulo')
            ->with('menu', $menu)
            ->with('lista_articulos', $lista_articulos)
            ->with('articulo', $articulo);

        }else{
            return abort(404);
        }
    }


}
