<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Auth;

use App\Mundo;

class MundosController extends Controller
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
     * Lista de Menú
     */
    public function listaMundos()
    {
        $listMundos = Mundo::all();
        return view('frontend.mundos.lista')
        ->with('lista_mundos', $listMundos);
    }

    /**
     * Formulario de Crear Sección
     */
    public function crearMundo()
    {
        //Formulario de Creación
        return view('frontend.mundos.nuevo');
    }

    /**
     * Acción para Crear Sección
     */
    public function nuevoMundo(Request $request)
    {
        $mundo = new Mundo($request->all());
        $mundo->save();
        return redirect()->route('lista_mundos');
    }

    /**
     * Formulario para Editar Sección
     */
    public function editaMundo($id)
    {
        //Formulario de Edición
        $mundo = Mundo::find($id);
        return view('frontend.mundos.editar')->with('mundo', $mundo);
    }

    /**
     * Acción para Actualizar Sección
     */
    public function actualizaMundo(Request $request, $id)
    {   
        $mundo = Mundo::find($id);
        $mundo->nombre = $request->nombre;
        $mundo->save();
        //flash('La categoría ' . $category->name . ' ha sido editada de manera exitosa', 'warning');
        return redirect()->route('lista_mundos');
    }

    public function activarMundo($id)
    {
        //Activar el Registro Logicamente
        $mundo = Mundo::find($id);
        $mundo->activo = 'A';
        $mundo->save();
        //flash('La categoría ' . $category->name . ' ha sido desactivada de manera exitosa', 'warning');
        return redirect()->route('lista_mundos');
    }

    public function desactivarMundo($id)
    {
        //Desactivar el Registro Logicamente
        $mundo = Mundo::find($id);
        $mundo->activo = 'I';
        $mundo->save();
        //flash('La categoría ' . $category->name . ' ha sido desactivada de manera exitosa', 'warning');
        return redirect()->route('lista_mundos');
    }

}
