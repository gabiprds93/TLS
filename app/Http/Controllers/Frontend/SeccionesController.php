<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use App\Seccion;

use Illuminate\Http\Request;

class SeccionesController extends Controller
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
    public function listaSecciones()
    {
        $listSecciones = Seccion::all();
        return view('frontend.secciones.lista')
        ->with('lista_secciones', $listSecciones);
    }

    /**
     * Formulario de Crear Sección
     */
    public function crearSeccion()
    {
        //Formulario de Creación
        return view('frontend.secciones.nuevo');
    }

    /**
     * Acción para Crear Sección
     */
    public function nuevaSeccion(Request $request)
    {
        $validatedData = $request->validate([
            'orden' => 'unique:secciones',
        ]);
        $seccion = new Seccion($request->all());
        $seccion->save();
        //Flash::success("Se ha registrado la categoría " . $category->name . " de forma exitosa");
        return redirect()->route('lista_secciones');
    }

    /**
     * Formulario para Editar Sección
     */
    public function editaSeccion($id)
    {
        //Formulario de Edición
        $seccion = Seccion::find($id);
        return view('frontend.secciones.editar')->with('seccion', $seccion);
    }

    /**
     * Acción para Actualizar Sección
     */
    public function actualizaSeccion(Request $request, $id)
    {   
        $validatedData = $request->validate([
            'orden' => 'unique:secciones',
        ]);
        $seccion = Seccion::find($id);
        $seccion->nombre = $request->nombre;
        $seccion->orden = $request->orden;
        $seccion->save();
        //flash('La categoría ' . $category->name . ' ha sido editada de manera exitosa', 'warning');
        return redirect()->route('lista_secciones');
    }

    public function activarSeccion($id)
    {
        //Activar el Registro Logicamente
        $seccion = Seccion::find($id);
        $seccion->activo = 'A';
        $seccion->save();
        //flash('La categoría ' . $category->name . ' ha sido desactivada de manera exitosa', 'warning');
        return redirect()->route('lista_secciones');
    }

    public function desactivarSeccion($id)
    {
        //Desactivar el Registro Logicamente
        $seccion = Seccion::find($id);
        $seccion->activo = 'I';
        $seccion->save();
        //flash('La categoría ' . $category->name . ' ha sido desactivada de manera exitosa', 'warning');
        return redirect()->route('lista_secciones');
    }

}
