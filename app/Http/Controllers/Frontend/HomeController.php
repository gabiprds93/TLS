<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Inicio del CMS
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.home');
    }

    /**
     * Gestionar Secciones
     *
     * @return \Illuminate\Http\Response
     */
    public function gestionSeccion()
    {
        return view('frontend.secciones');
    }

    /**
     * Gestionar Menu
     *
     * @return \Illuminate\Http\Response
     */
    public function gestionMenu()
    {
        return view('frontend.menu');
    }

    /**
     * Gestionar Seccion Home
     *
     * @return \Illuminate\Http\Response
     */
    public function seccionHome()
    {
        return view('frontend.seccion_home');
    }

    /**
     * Ver Configuración General
     *
     * @return \Illuminate\Http\Response
     */
    public function verConfGeneral()
    {
        return view('frontend.configuracion');
    }
    
}
