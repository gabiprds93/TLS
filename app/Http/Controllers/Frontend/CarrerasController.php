<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Auth;

use App\Carrera;
use App\CarreraSlider;
use App\CarreraModulo;
use App\Mundo;

class CarrerasController extends Controller
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
    public function listaCarreras()
    {
        $listCarreras = Carrera::all();
        return view('frontend.carreras.lista')
        ->with('lista_carreras', $listCarreras);
    }

    /**
     * Formulario de Crear Sección
     */
    public function crearCarrera()
    {
    	$listaMundo = Mundo::where('activo', 'A')->pluck('nombre', 'id');
        //Formulario de Creación
        return view('frontend.carreras.nuevo')
        ->with('lista_mundos', $listaMundo);
    }
	
	public function cargarDoc($campo) 
    {    

	    $image = $campo;
	    $name = uniqid('carrera-', true).'.'.$image->getClientOriginalExtension();
	    $destinationPath = public_path('img/carreras/');
	    $image->move($destinationPath, $name);
	    return $name;
        
    }

    public function eliminarDoc($archivo) 
    {    
    	$old_image = $archivo;
        \File::delete(public_path('/img/carreras/'.$old_image));
	    return 1;
    }


    /**
     * Acción para Crear Sección
     */
    public function nuevaCarrera(Request $request)
    {
        //dd($request);
        $carrera = new Carrera($request->all());

    	$this->validate(request(), [
	        'imagen_referencial' => 'image|mimes:jpg,jpeg,png,gif'
	    ]);
    	
        if ($request->img) {
            $this->validate(request(), [
                'img' => 'image|mimes:jpg,jpeg,png,gif',
            ]);
            $img_principal = $this->cargarDoc($request->file('img'));    
            $carrera->img = $img_principal;
        }
    	
    	$img_referencial = $this->cargarDoc($request->file('imagen_referencial'));
        $makeUrl = str_slug($request->nombre, '-');        
        $carrera->imagen_referencial = $img_referencial;
        $carrera->video = $request->video;
        $carrera->slug = $makeUrl;
        $carrera->save();
        return redirect()->route('editar_carrera', $carrera->id);
    }

    /**
     * Formulario para Editar Sección
     */
    public function editaCarrera($id)
    {
        //Formulario de Edición
        $carrera = Carrera::find($id);
        //dd($lista);
        $listaMundo = Mundo::where('activo', 'A')->pluck('nombre', 'id');
        return view('frontend.carreras.editar')
        ->with('carrera', $carrera)
        ->with('lista_mundos', $listaMundo);
    }

    /**
     * Acción para Actualizar Sección
     */
    public function actualizaCarrera(Request $request, $id)
    {   
        //dd($request);
        $carrera = Carrera::find($id);
        if ($request->img) {
            $this->validate(request(), [
                'img' => 'image|mimes:jpg,jpeg,png,gif'
            ]);
            if($carrera->img){
                $img_antigua = $this->eliminarDoc($carrera->img);    
            }
            $img_principal = $this->cargarDoc($request->file('img'));
            $carrera->img = $img_principal;    
        }

        if ($request->imagen_referencial) {
            $this->validate(request(), [
                'imagen_referencial' => 'image|mimes:jpg,jpeg,png,gif'
            ]);
            $img_antigua = $this->eliminarDoc($carrera->imagen_referencial);
            $img_principal = $this->cargarDoc($request->file('imagen_referencial'));
            $carrera->imagen_referencial = $img_principal;    
        }
        
        $carrera->nombre = $request->nombre;
        $makeUrl = str_slug($request->nombre, '-');
        $carrera->id_mundo = $request->id_mundo;
        $carrera->tiempo_total = $request->tiempo_total;
        $carrera->variacion_tiempo = $request->variacion_tiempo;
        $carrera->certificaciones = $request->certificaciones;
        $carrera->ofrecemos = $request->ofrecemos;
        $carrera->talento = $request->talento;
        $carrera->nosotros = $request->nosotros;
        $carrera->video = $request->video;
        $carrera->descripcion_carrera = $request->descripcion_carrera;
        $carrera->color_mobile = $request->color_mobile;
        $carrera->color = $request->color;
        $carrera->color_titulo_slide = $request->color_titulo_slide;
        $carrera->color_link_slide = $request->color_link_slide;
        $carrera->color_linea_contenido = $request->color_linea_contenido;
        $carrera->color_fuente = $request->color_fuente;
        $carrera->slug = $makeUrl;
        $carrera->save();

        return redirect()->route('lista_carreras');
    }

    public function cargarImgSlider($campo) 
    {    
        $image = $campo;
        $name = uniqid('slider-', true).'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('img/carreras/');
        $image->move($destinationPath, $name);
        return $name;
    }

    public function obtenerItem($campo, $id) 
    {    
        if(isset($campo) && isset($id)){
            switch ($campo) {
                case 'slider':
                    $carSlider = CarreraSlider::find($id);
                    echo $carSlider; 
                    break;
                case 'modulo':
                    $carModulo = CarreraModulo::find($id);
                    echo $carModulo;                 
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
                if ($request->imagen && $request->titulo && $request->subtitulo && $request->texto_corto) {
                    $carSlider = new CarreraSlider();
                    $carSlider->titulo = $request->titulo;
                    $carSlider->subtitulo = $request->subtitulo;
                    $carSlider->texto_corto = $request->texto_corto;
                    $img_slider = $this->cargarImgSlider($request->file('imagen'));    
                    $carSlider->imagen = $img_slider;
                    $carSlider->id_carrera = $request->id_carrera;
                    $carSlider->save();
                    echo $carSlider->id;                                        
                }else{
                    echo 0;
                }                
                break;
            case 'modulo':
                if ($request->nombre && $request->contenido) {
                    $carModulo = new CarreraModulo();
                    $carModulo->nombre = $request->nombre;
                    $carModulo->contenido = $request->contenido;
                    $carModulo->id_carrera = $request->id_carrera;
                    $carModulo->save();
                    echo $carModulo->id;
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
                if ($request->editTituloModal && $request->editSubtituloModal && $request->editTexto_cortoModal) {

                    $carSlider = CarreraSlider::find($request->itemId);
                    if ($request->editImagenModal) {
                        $img_slider = $this->cargarImgSlider($request->file('editImagenModal'));    
                        $carSlider->imagen = $img_slider;
                    }
                    $carSlider->titulo = $request->editTituloModal;
                    $carSlider->subtitulo = $request->editSubtituloModal;
                    $carSlider->texto_corto = $request->editTexto_cortoModal;
                    $carSlider->save();
                    echo $carSlider->id;                                        
                }else{
                    echo 0;
                }                
                break;
            case 'modulo':
                if ($request->editNombreModal && $request->editContenidoModal) {

                    $carModulo = CarreraModulo::find($request->modId);
                    $carModulo->nombre = $request->editNombreModal;
                    $carModulo->contenido = $request->editContenidoModal;
                    $carModulo->save();
                    echo $carModulo->id;
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

    public function activarCarrera($id)
    {
        //Activar el Registro Logicamente
        $carrera = Carrera::find($id);
        $carrera->activo = 'A';
        $carrera->save();
        //flash('La categoría ' . $category->name . ' ha sido desactivada de manera exitosa', 'warning');
        return redirect()->route('lista_carreras');
    }

    public function desactivarCarrera($id)
    {
        //Desactivar el Registro Logicamente
        $carrera = Carrera::find($id);
        $carrera->activo = 'I';
        $carrera->save();
        //flash('La categoría ' . $category->name . ' ha sido desactivada de manera exitosa', 'warning');
        return redirect()->route('lista_carreras');
    }

    
}
