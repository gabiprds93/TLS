<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use App\Sede;

use Illuminate\Http\Request;

class SedesController extends Controller
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

    public function cargarImg($campo) 
    {    
        $image = $campo;
        $name = uniqid('sede-', true).'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('img/sedes/');
        $image->move($destinationPath, $name);
        return $name;
    }

    /**
     * Lista de Menú
     */
    public function listaSedes()
    {
        $listSede = Sede::all();
        return view('frontend.sedes.lista')
        ->with('lista_sedes', $listSede);
    }

    /**
     * Formulario de Crear Sede
     */
    public function crearSede()
    {
        //Formulario de Creación
        return view('frontend.sedes.nuevo');
    }

    /**
     * Acción para Crear Sede
     */
    public function nuevaSede(Request $request)
    {
        $sede = new Sede($request->all());

        if ($request->file('imagen')) {

            $this->validate(request(), [
                'imagen' => 'image|mimes:jpg,jpeg,png,gif',
            ]);
            $imagen = $this->cargarImg($request->file('imagen'));
            $sede->imagen = $imagen;
        }

        $sede->save();
        //Flash::success("Se ha registrado la categoría " . $category->name . " de forma exitosa");
        return redirect()->route('lista_sedes');
    }

    /**
     * Formulario para Editar Sede
     */
    public function editaSede($id)
    {
        //Formulario de Edición
        $sede = Sede::find($id);
        return view('frontend.sedes.editar')->with('sede', $sede);
    }

    /**
     * Acción para Actualizar Sede
     */
    public function actualizaSede(Request $request, $id)
    {   
        $sede = Sede::find($id);
        if ($request->file('imagen')) {

            $this->validate(request(), [
                'imagen' => 'image|mimes:jpg,jpeg,png,gif',
            ]);
            $imagen = $this->cargarImg($request->file('imagen'));
            $sede->imagen = $imagen;
        }
        $sede->nombre = $request->nombre;
        $sede->direccion = $request->direccion;
        $sede->latitud = $request->latitud;
        $sede->longitud = $request->longitud;
        $sede->save();
        //flash('La categoría ' . $category->name . ' ha sido editada de manera exitosa', 'warning');
        return redirect()->route('lista_sedes');
    }

    public function activarSede($id)
    {
        //Activar el Registro Logicamente
        $sede = Sede::find($id);
        $sede->activo = 'A';
        $sede->save();
        //flash('La categoría ' . $category->name . ' ha sido desactivada de manera exitosa', 'warning');
        return redirect()->route('lista_sedes');
    }

    public function desactivarSede($id)
    {
        //Desactivar el Registro Logicamente
        $sede = Sede::find($id);
        $sede->activo = 'I';
        $sede->save();
        //flash('La categoría ' . $category->name . ' ha sido desactivada de manera exitosa', 'warning');
        return redirect()->route('lista_sedes');
    }

}
