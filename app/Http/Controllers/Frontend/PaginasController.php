<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Auth;
use Validator;

use App\Pagina;
use App\PaginaSlider;
use App\Seccion;

class PaginasController extends Controller
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
    public function listaPaginas()
    {
        $listPaginas = Pagina::all();
        return view('frontend.paginas.lista')
        ->with('lista_paginas', $listPaginas);
    }

    /**
     * Formulario de Crear Sección
     */
    public function crearPagina()
    {
    	$listaSeccion = Seccion::where('activo', 'A')->pluck('nombre', 'id');
        //Formulario de Creación
        return view('frontend.paginas.nuevo')
        ->with('lista_secciones', $listaSeccion);
    }

	public function cargarDoc($campo) 
    {    

	    $image = $campo;
	    $name = uniqid('slider-', true).'.'.$image->getClientOriginalExtension();
	    $destinationPath = public_path('img/paginas/');
	    $image->move($destinationPath, $name);
	    return $name;
        
    }

    public function eliminarDoc($archivo) 
    {    
    	$old_image = $archivo;
        \File::delete(public_path('/img/paginas/'.$old_image));
	    return 1;
    }


    /**
     * Acción para Crear Sección
     */
    public function nuevaPagina(Request $request)
    {
        $pagina = new Pagina($request->all());	
        $makeUrl = str_slug($request->titulo, '-');        
        $pagina->slug = $makeUrl;
        $pagina->save();

        return redirect()->route('editar_pagina', $pagina->id);
    }

    /**
     * Formulario para Editar Sección
     */
    public function editaPagina($id)
    {
        //Formulario de Edición
        $pagina = Pagina::find($id);
        $listaSeccion = Seccion::where('activo', 'A')->pluck('nombre', 'id');
        return view('frontend.paginas.editar')
        ->with('pagina', $pagina)
        ->with('lista_secciones', $listaSeccion);
    }

    /**
     * Acción para Actualizar Sección
     */
    public function actualizaPagina(Request $request, $id)
    {   
        //dd($request);
        $pagina = Pagina::find($id);

        $pagina->titulo = $request->titulo;
        $makeUrl = str_slug($request->titulo, '-');
        $pagina->subtitulo = $request->subtitulo;
        $pagina->id_seccion = $request->id_seccion;
        $pagina->tipo_pagina = $request->tipo_pagina;
        $pagina->titulo_1 = $request->titulo_1;
        $pagina->contenido_1 = $request->contenido_1;
        $pagina->titulo_2 = $request->titulo_2;
        $pagina->contenido_2 = $request->contenido_2;
        $pagina->titulo_3 = $request->titulo_3;
        $pagina->contenido_3 = $request->contenido_3;
        $pagina->video = $request->video;
        $pagina->link = $request->link;
        $pagina->url_link = $request->url_link;
        $pagina->color = $request->color;
        $pagina->color_fuente = $request->color_fuente;
        $pagina->color_titulo = $request->color_titulo;
        $pagina->color_linea = $request->color_linea;
        $pagina->slug = $makeUrl;
        $pagina->save();

        return redirect()->route('lista_paginas');
    }

    public function cargarImgSlider($campo) 
    {    
        $image = $campo;
        $name = uniqid('slider-', true).'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('img/paginas/');
        $image->move($destinationPath, $name);
        return $name;
    }

    public function obtenerItem($campo, $id) 
    {    
        if(isset($campo) && isset($id)){
            switch ($campo) {
                case 'slider':
                    $pagSlider = PaginaSlider::find($id);
                    echo $pagSlider; 
                    break;
                default:
                //Si no posee ninguno de estos valores mostramos error
                    echo 0;
                    break;
            }
        }
    }

    public function agregarItem(Request $request){
        
        switch ($request->tipo) {
            case 'slider':
                if ($request->imagen) {
                    //Valido que sea una imagen
                    $validator = Validator::make($request->all(), [
                        'imagen' => 'image|mimes:jpg,jpeg,png,gif',
                    ]);
                    //Si falla la validacion envio el error
                    if ($validator->fails()) {
                        echo 'F';
                    }else{
                        $pagSlider = new PaginaSlider();
                        $pagSlider->titulo = $request->titulo;
                        $pagSlider->texto_corto = $request->texto_corto;
                        $img_slider = $this->cargarImgSlider($request->file('imagen'));    
                        $pagSlider->imagen = $img_slider;
                        $pagSlider->id_pagina = $request->id_pagina;
                        $pagSlider->save();
                        echo $pagSlider->id; 
                    }
                }else{
                    echo 0;
                }                
                break;
            default:
            //Si no posee ninguno de estos valores mostramos error
                echo 0;
                break;
        }
        
    }

    public function editarItem(Request $request){
        
        switch ($request->tipo) {
            case 'slider':
                if ($request->editImagenModal) {

                    //Valido que sea una imagen
                    $validator = Validator::make($request->all(), [
                        'editImagenModal' => 'image|mimes:jpg,jpeg,png,gif',
                    ]);
                    //Si falla la validacion envio el error
                    if ($validator->fails()) {
                        echo 'F';
                    }else{
                        $pagSlider = PaginaSlider::find($request->itemId);
                        $pagSlider->titulo = $request->editTituloModal;
                        $pagSlider->texto_corto = $request->editTexto_cortoModal;
                        $img_slider = $this->cargarImgSlider($request->file('editImagenModal'));
                        $pagSlider->imagen = $img_slider;
                        $pagSlider->id_pagina = $request->id_pagina;
                        $pagSlider->save();
                        echo $pagSlider->id; 
                    }                                       
                }else{
                    echo 0;
                }                
                break;
            default:
            //Si no posee ninguno de estos valores mostramos error
                echo 0;
                break;
        }
        
    }
    
}
