<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Menu;
use App\Seccion;

use Illuminate\Http\Request;

class MenuController extends Controller
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
     *
     * @return \Illuminate\Http\Response
     */
    public function listaMenu()
    {
        $listMenu = Menu::all();
        return view('frontend.menu.lista')
        ->with('lista_menu', $listMenu);
    }

    public function crearMenu()
    {
        $listSecciones = Seccion::where('activo', 'A')->pluck('nombre', 'id');
        //Formulario de Creacion
        return view('frontend.menu.nuevo')
        ->with('lista_secciones', $listSecciones);
    }

    public function nuevoMenu(Request $request)
    {
        $validatedData = $request->validate([
            'orden' => 'unique:menu',
        ]);
        $menu = new Menu($request->all());
        $menu->save();
        //Flash::success("Se ha registrado la categoría " . $category->name . " de forma exitosa");
        return redirect()->route('lista_menu');
    }

    /**
     * Formulario para Editar Sección
     */
    public function editarMenu($id)
    {
        //Formulario de Edición
        $menu = Menu::find($id);
        $listSecciones = Seccion::where('activo', 'A')->pluck('nombre', 'id');
        return view('frontend.menu.editar')
        ->with('menu', $menu)
        ->with('lista_secciones', $listSecciones);
    }

    /**
     * Acción para Actualizar Menu
     */
    public function actualizaMenu(Request $request, $id)
    {   
        /*
        $validatedData = $request->validate([
            'orden' => 'unique:menu',
        ]);*/
        $menu = Menu::find($id);
        $menu->nombre = $request->nombre;
        $menu->url = $request->url;
        $menu->orden = $request->orden;
        $menu->id_seccion = $request->id_seccion;

        $menu->sublink_1 = $request->sublink_1;
        $menu->url_1 = $request->url_1;
        $menu->sublink_2 = $request->sublink_2;
        $menu->url_2 = $request->url_2;
        $menu->sublink_3 = $request->sublink_3;
        $menu->url_3 = $request->url_3;
        $menu->sublink_4 = $request->sublink_4;
        $menu->url_4 = $request->url_4;
        $menu->sublink_5 = $request->sublink_5;
        $menu->url_5 = $request->url_5;
        $menu->save();
        //flash('La categoría ' . $category->name . ' ha sido editada de manera exitosa', 'warning');
        return redirect()->route('lista_menu');
    }

    public function activarMenu($id)
    {
        //Activar el Registro Logicamente
        $menu = Menu::find($id);
        $menu->activo = 'A';
        $menu->save();
        //flash('La categoría ' . $category->name . ' ha sido desactivada de manera exitosa', 'warning');
        return redirect()->route('lista_menu');
    }

    public function desactivarMenu($id)
    {
        //Desactivar el Registro Logicamente
        $menu = Menu::find($id);
        $menu->activo = 'I';
        $menu->save();
        //flash('La categoría ' . $category->name . ' ha sido desactivada de manera exitosa', 'warning');
        return redirect()->route('lista_menu');
    }

}
