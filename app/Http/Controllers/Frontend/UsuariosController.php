<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class UsuariosController extends Controller
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
     * Lista de Usuarios
     *
     * @return \Illuminate\Http\Response
     */
    public function listarUsuarios()
    {
        return view('frontend.usuarios.lista');
    }

    /**
     * Nuevo Usuario
     *
     * @return \Illuminate\Http\Response
     */
    public function nuevoUsuario()
    {
        return view('frontend.usuarios.nuevo');
    }

    /**
     * Editar Usuario
     *
     * @return \Illuminate\Http\Response
     */
    public function editarUsuario()
    {
        return view('frontend.usuarios.editar');
    }

    
}
