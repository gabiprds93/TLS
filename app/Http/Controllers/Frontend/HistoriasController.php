<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Auth;

use App\Historia;
use App\HistoriaInterna;
use App\Contenido;


class HistoriasController extends Controller
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
     * Lista de Historias
     */
    public function listaHistorias()
    {
        $listHistorias = Historia::all();
        return view('frontend.historias.lista')
        ->with('lista_historias', $listHistorias);
    }

    /**
     * Formulario de Crear Historia
     */
    public function crearHistoria()
    {
    	$listaContenidos = Contenido::where('activo', 'A')->pluck('titulo', 'id');
        //Formulario de Creación
        return view('frontend.historias.nuevo')
        ->with('lista_contenido', $listaContenidos);
    }
	
	public function cargarDoc($campo) 
    {    

	    $image = $campo;
	    $name = uniqid('historia-', true).'.'.$image->getClientOriginalExtension();
	    $destinationPath = public_path('img/historias/');
	    $image->move($destinationPath, $name);
	    return $name;
        
    }

    public function eliminarDoc($archivo) 
    {    
    	$old_image = $archivo;
        \File::delete(public_path('/img/historias/'.$old_image));
	    return 1;
    }


    /**
     * Acción para Crear Historia
     */
    public function nuevaHistoria(Request $request)
    {
        //dd($request);
        $historia = new Historia($request->all());
    	
        $this->validate(request(), [
            'imagen' => 'image|mimes:jpg,jpeg,png,gif',
        ]);
        $imagen = $this->cargarDoc($request->file('imagen'));    
        $historia->imagen = $imagen;
    	
        $historia->save();
        return redirect()->route('editar_historia', $historia->id);
    }

    /**
     * Formulario para Editar Historia
     */
    public function editaHistoria($id)
    {
        //Formulario de Edición
        $historia = Historia::find($id);
        $listContenidos = Contenido::where('activo', 'A')->pluck('titulo', 'id');
        return view('frontend.historias.editar')
        ->with('historia', $historia)
        ->with('lista_contenido', $listContenidos);
    }

    /**
     * Acción para Actualizar Historia
     */
    public function actualizaHistoria(Request $request, $id)
    {   
        //dd($request);
        $historia = Historia::find($id);

        if ($request->file('imagen')) {

            $this->validate(request(), [
                'imagen' => 'image|mimes:jpg,jpeg,png,gif',
            ]);
            $imagen = $this->cargarDoc($request->file('imagen'));
            $historia->imagen = $imagen;
        }

        $historia->titulo = $request->titulo;
        $historia->introduccion = $request->introduccion;
        $historia->orden = $request->orden;
        $historia->color = $request->color;
       
        $historia->save();
        return redirect()->route('lista_historias');
    }

    public function cargarImgSubItem($campo) 
    {    
        $image = $campo;
        $name = uniqid('subitem-', true).'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('img/historias/');
        $image->move($destinationPath, $name);
        return $name;
    }

    public function obtenerItem($id) 
    {    
        if(isset($id)){

            $hisInterna = HistoriaInterna::find($id);
            echo $hisInterna; 
        }
    }

    public function agregarItem(Request $request)
    {
        
        if ($request->imagen && $request->titulo && $request->contenido) {
            $hisInterna = new HistoriaInterna();
            $hisInterna->titulo = $request->titulo;
            $hisInterna->contenido = $request->contenido;
            $img_subitem = $this->cargarImgSubItem($request->file('imagen'));    
            $hisInterna->imagen = $img_subitem;
            $hisInterna->id_historia = $request->id_historia;
            $hisInterna->save();
            echo $hisInterna->id;                                        
        }else{
            echo 0;
        }                
                
    }

    public function editarItem(Request $request)
    {
        
        if ($request->editTituloModal && $request->editContenidoModal) {

            $hisInterna = HistoriaInterna::find($request->itemId);
            if ($request->editImagenModal) {
                $img_subitem = $this->cargarImgSubItem($request->file('editImagenModal'));    
                $hisInterna->imagen = $img_subitem;
            }
            $hisInterna->titulo = $request->editTituloModal;
            $hisInterna->contenido = $request->editContenidoModal;
            $hisInterna->save();
            echo $hisInterna->id;                                        
        }else{
            echo 0;
        }                  
    }

    public function eliminarItem($id) 
    {    
        if(isset($id)){

            $hisInterna = HistoriaInterna::find($id);
            $hisInterna->delete();
            echo 1;
        }
    }
    
}
