<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use App\Contenido;
use App\ContenidoDetalle;
use App\ContenidoImagen;
use App\ContenidoLink;
use App\Seccion;

use Auth;

use Illuminate\Http\Request;

class ContenidoController extends Controller
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
    public function listaContenidos()
    {
        /*$listContenidos = Contenido::orderBy('id', 'asc')
        ->orderBy('id_seccion', 'asc')
        ->get();*/

        $listContenidos = Contenido::with('seccion')->get()
           ->sortBy(function($contenido) { 
               return $contenido->seccion->nombre;
          });

        return view('frontend.contenido.lista')
        ->with('lista_contenidos', $listContenidos);
    }

    /**
     * Formulario de Crear Sección
     */
    public function crearContenido()
    {
        $listaSeccion = Seccion::where('activo', 'A')->pluck('nombre', 'id');
        //Formulario de Creación
        return view('frontend.contenido.nuevo')
        ->with('lista_secciones', $listaSeccion);
    }

    /**
     * Acción para Crear Sección
     */
    public function nuevoContenido(Request $request)
    {
        $contenido = new Contenido();
        $contenido->titulo = $request->titulo;
        $contenido->subtitulo = $request->subtitulo;
        $contenido->posicion_links = $request->posicion_links;
        $contenido->pie_contenido = $request->pie_contenido;
        $contenido->orden = $request->orden;
        $contenido->video = $request->video;
        $contenido->id_seccion = $request->id_seccion;
        $contenido->color_contenido = $request->color_contenido;
        $makeUrl = str_slug($request->titulo, '-');        
        $contenido->slug = $makeUrl;

        $contenido->save();

        //Flash::success("Se ha registrado la categoría " . $category->name . " de forma exitosa");
        return redirect()->route('editar_contenido', $contenido->id);
    }

    /**
     * Formulario para Editar Sección
     */
    public function editarContenido($id)
    {
        //Formulario de Edición
        $contenido = Contenido::find($id);
        $listSecciones = Seccion::where('activo', 'A')->pluck('nombre', 'id');
        return view('frontend.contenido.editar')
        ->with('contenido', $contenido)
        ->with('lista_secciones', $listSecciones);
    }

    public function cargarFondo($campo) 
    {    
        $image = $campo;
        $name = uniqid('background-', true).'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('img/contenidos/');
        $image->move($destinationPath, $name);
        return $name;
    }

    public function cargarImagenApp($campo) 
    {    
        $image = $campo;
        $name = uniqid('appimg-', true).'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('img/contenidos/');
        $image->move($destinationPath, $name);
        return $name;
    }

    /**
     * Acción para Actualizar Sección
     */
    public function actualizaContenido(Request $request, $id)
    {   
        /*
        $this->validate(request(), [
            'id_seccion' => 'required|unique:contenido,id_seccion,NULL, NULL,orden,'.$request['orden'],
            'orden' => 'required|unique:contenido,orden,NULL,NULL,id_seccion,'.$request['id_seccion'],
        ]);*/

        $contenido = Contenido::find($id);
        //Guardar o Actualizar Links del Contenido
        if ($request->links) {

            foreach ($request->links as $reqLink) {
                //Edita si el item posee un id
                if (isset($reqLink['idLink'])) {

                    $linkContenido = ContenidoLink::where('id', $reqLink['idLink'])
                    ->update([
                      'nombre'=> $reqLink['nomLink'],
                      'url' => $reqLink['rutaLink'],
                    ]);

                }else{
                //Almacena si el item no existe en BD
                    $linkContenido = ContenidoLink::create(['nombre' => $reqLink['nomLink'], 'url' => $reqLink['rutaLink'], 'id_contenido' => $contenido->id]);
                }
            }
        }
        
        //Guardar o Actualizar Detalles del Contenido
        if ($request->detalles) {

            foreach ($request->detalles as $reqDet) {
                //Edita si el item posee un id
                if (isset($reqDet['idDetalle'])) {
                    //dd($request->detalles);
                    $detalleContenido = ContenidoDetalle::where('id', $reqDet['idDetalle'])
                    ->update([
                      'titulo'=> $reqDet['titDetalle'],
                      'detalle' => $reqDet['detalle'],
                    ]);

                }else{
                //Almacena si el item no existe en BD
                    $detalleContenido = ContenidoDetalle::create(['titulo' => $reqDet['titDetalle'], 'detalle' => $reqDet['detalle'], 'id_contenido' => $contenido->id]);
                }
            }
        }
        //dd($request->imagenes);
        //Guardar o Actualizar Imagenes del Contenido
        if ($request->imagenes) {

            foreach ($request->imagenes as $reqIma) {
                //Edita si el item posee un id
                
                if (isset($reqIma['idImagen'])) {
                    
                    $imagenContenido = ContenidoImagen::where('id', $reqIma['idImagen'])
                    ->update([
                      'imagen'=> $reqIma['imagenUrl'],
                    ]);
                    
                }else{
                //Almacena si el item no existe en BD
                    $imagenContenido = ContenidoImagen::create(['imagen' => $reqIma['imagenUrl'], 'id_contenido' => $contenido->id]);
                }
            }
        }

        $contenido->titulo = $request->titulo;
        $makeUrl = str_slug($request->titulo, '-');        
        $contenido->slug = $makeUrl;
        $contenido->subtitulo = $request->subtitulo;
        $contenido->posicion_links = $request->posicion_links;
        $contenido->slide_lab = $request->slide_lab;
        $contenido->pie_contenido = $request->pie_contenido;
        $contenido->texto_contenido = $request->texto_contenido;
        $contenido->orden = $request->orden;
        $contenido->video = $request->video;
        $contenido->id_seccion = $request->id_seccion;
        $contenido->color_contenido = $request->color_contenido;
        $contenido->color_detalle = $request->color_detalle;
        $contenido->color_titulo = $request->color_titulo;
        $contenido->color_link = $request->color_link;
        $contenido->color_sub_link = $request->color_sub_link;
        $contenido->color_sub_tab = $request->color_sub_tab;
        $contenido->link_android = $request->link_android;
        $contenido->link_ios = $request->link_ios;
        if ($request->file('imagen_fondo')) {

            $this->validate(request(), [
                'imagen_fondo' => 'image|mimes:jpg,jpeg,png,gif',
            ]);
            $img_fondo = $this->cargarFondo($request->file('imagen_fondo'));
            $contenido->imagen_fondo = $img_fondo;
        }
        if ($request->file('imagen_app')) {

            $this->validate(request(), [
                'imagen_app' => 'image|mimes:jpg,jpeg,png,gif',
            ]);
            $img_app = $this->cargarImagenApp($request->file('imagen_app'));
            $contenido->imagen_app = $img_app;
        }
       
        $contenido->save();
        //flash('La categoría ' . $category->name . ' ha sido editada de manera exitosa', 'warning');
        return redirect()->route('lista_contenido');
    }

    public function activarContenido($id)
    {
        //Activar el Registro Logicamente
        $contenido = Contenido::find($id);
        $contenido->activo = 'A';
        $contenido->save();
        //flash('La categoría ' . $category->name . ' ha sido desactivada de manera exitosa', 'warning');
        return redirect()->route('lista_contenido');
    }

    public function desactivarContenido($id)
    {
        //Desactivar el Registro Logicamente
        $contenido = Contenido::find($id);
        $contenido->activo = 'I';
        $contenido->save();
        //flash('La categoría ' . $category->name . ' ha sido desactivada de manera exitosa', 'warning');
        return redirect()->route('lista_contenido');
    }

    public function cargarDoc($campo) 
    {    
        if (isset($_FILES[$campo])){
            $ext=$_FILES[$campo]['type'];
            $acceptable = array( 'image/jpeg', 'image/jpg', 'image/gif', 'image/png');
            if(in_array($ext, $acceptable) and (!empty($ext))) { 
                $file = $_FILES[$campo]['name'];
                //$nombre=url($file);
                $url="img/contenidos/".uniqid('detalle-', true)."-".$file;
                if ($file && move_uploaded_file($_FILES[$campo]['tmp_name'],$url))
                    {
                       sleep(3);//retrasamos la petición 3 segundos
                       echo $url;//devolvemos el nombre del archivo para pintar la imagen
                    }
            }else{
                echo 0;
            }
        }
    }

    public function obtenerItem($campo, $id) 
    {    
        //dd($request->valor['titulo']);
        if(isset($campo) && isset($id)){
            switch ($campo) {
                case 'link':
                    $conLink = ContenidoLink::find($id);
                    $conLink->delete();
                    echo 1;
                    break;
                case 'detalle':
                    $conDetalle = ContenidoDetalle::find($id);
                    echo $conDetalle;                    
                    break;
                case 'img':
                    $conImagen = ContenidoImagen::find($id);
                    $conImagen->delete();
                    echo 1;  
                    break;
                default:
                //Si no posee ninguno de estos valores mostramos error
                    echo 0;
                    break;
            }
        }
    }

    public function guardarItem(Request $request) 
    {    
        //dd($request->valor['titulo']);
        if(isset($request->campo) && isset($request->id) && isset($request->valor)){
            switch ($request->campo) {
                case 'link':
                    $conLink = ContenidoLink::find($id);
                    $conLink->delete();
                    echo 1;

                    break;
                case 'detalle':
                    $conDetalle = new ContenidoDetalle();
                    $conDetalle->titulo = $request->valor['titulo'];
                    $conDetalle->detalle = $request->valor['detalle'];
                    $conDetalle->id_contenido = $request->id;
                    $conDetalle->save();
                    echo $conDetalle->id;                    

                    break;
                case 'img':
                    $conImagen = ContenidoImagen::find($id);
                    $conImagen->delete();
                    echo 1;  

                    
                    break;
                default:
                //Si no posee ninguno de estos valores mostramos error
                    echo 0;
                    break;
            }
        }
    }

    public function editarItem(Request $request) 
    {    
        if(isset($request->campo) && isset($request->id) && isset($request->valor)){
            switch ($request->campo) {
                case 'link':
                    /*
                    $conLink = ContenidoLink::find($id);
                    $conLink->delete();
                    echo 1;*/
                    break;
                case 'detalle':
                    $conDetalle = ContenidoDetalle::find($request->id);
                    $conDetalle->titulo = $request->valor['titulo'];
                    $conDetalle->detalle = $request->valor['detalle'];
                    $conDetalle->save();
                    echo $conDetalle->titulo;                    
                    break;
                case 'img':
                    /*
                    $conImagen = ContenidoImagen::find($id);
                    $conImagen->delete();
                    echo 1;*/
                    break;
                default:
                //Si no posee ninguno de estos valores mostramos error
                    echo 0;
                    break;
            }
        }
    }

    public function eliminarItem($campo,$id) 
    {    
        //dd($campo);
        if(isset($campo) && isset($id)){
            switch ($campo) {
                case 'link':
                    $conLink = ContenidoLink::find($id);
                    $conLink->delete();
                    echo 1;

                    break;
                case 'detalle':
                    $conDetalle = ContenidoDetalle::find($id);
                    $conDetalle->delete();
                    echo 1;                    

                    break;
                case 'img':
                    $conImagen = ContenidoImagen::find($id);
                    $conImagen->delete();
                    echo 1;  

                    break;
                default:
                //Si no posee ninguno de estos valores mostramos error
                    echo 0;
                    break;
            }
        }
    }

}
