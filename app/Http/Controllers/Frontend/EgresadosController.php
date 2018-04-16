<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Auth;

use App\Carrera;
use App\Egresados;
use App\EgresadoImagen;


class EgresadosController extends Controller
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
    public function listaEgresados()
    {
        $listEgresados = Egresados::all();
        return view('frontend.egresados.lista')
        ->with('lista_egresados', $listEgresados);
    }
    /**
     * Formulario de Crear Egresado
     */
    public function crearEgresado()
    {
    	$listaCarrera = Carrera::where('activo', 'A')->pluck('nombre', 'id');
        //Formulario de Creación
        return view('frontend.egresados.nuevo')
        ->with('lista_carreras', $listaCarrera);
    }

    public function nuevoEgresado(Request $request)
    {
    	$egresado = new Egresados($request->all());
    	$makeUrl = str_slug($request->nombre, '-');
    	$egresado->slug = $makeUrl;
    	$egresado->save();
    	return redirect()->route('editar_egresado', $egresado->id);
    }
    
    public function editaEgresado($id)
    {
        //Formulario de Edición
        $egresado = Egresados::find($id);
        //dd($lista);
        $listaCarrera = Carrera::where('activo', 'A')->pluck('nombre', 'id');
        return view('frontend.egresados.editar')
        ->with('egresado', $egresado)
        ->with('lista_carreras', $listaCarrera);
    }
    
    public function actualizaEgresado(Request $request, $id)
    {   
        //dd($request);
        $egresado = Egresados::find($id);
        $egresado->nombre = $request->nombre;
        $egresado->twitter = $request->twitter;
        $egresado->linkedin = $request->linkedin;
        $egresado->quote = $request->quote;
        $egresado->descripcion = $request->descripcion;
        $egresado->pie_contenido = $request->pie_contenido;
	    $egresado->id_carrera = $request->id_carrera;
	    $makeUrl = str_slug($request->nombre, '-');
	    $egresado->slug = $makeUrl;
	    $egresado->save();
	    return redirect()->route('lista_egresados');
    }

    public function cargarImg($campo) 
    {    
        $image = $campo;
        $name = uniqid('imagen-', true).'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('img/egresados/');
        $image->move($destinationPath, $name);
        return $name;
    }

    public function obtenerItem($campo, $id) 
    {    
        if(isset($campo) && isset($id)){
            switch ($campo) {
                case 'imagen':
                    $egrImagen = EgresadoImagen::find($id);
                    echo $egrImagen; 
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
            case 'imagen':
                if ($request->imagen) {
                    $egrImagen = new EgresadoImagen();
                    $img = $this->cargarImg($request->file('imagen'));    
                    $egrImagen->imagen = $img;
                    $egrImagen->id_egresado = $request->id_egresado;
                    $egrImagen->save();
                    echo $egrImagen->id;                                        
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
            case 'imagen':
                if ($request->editImagenModal) {

                    $egrImagen = EgresadoImagen::find($request->itemId);
                    $img = $this->cargarImg($request->file('editImagenModal'));    
                    $egrImagen->imagen = $img;
                    $egrImagen->save();
                    echo $egrImagen->id;                                        
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
