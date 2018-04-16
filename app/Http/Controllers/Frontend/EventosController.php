<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use App\Evento;
use App\EventoImagen;
use App\Seccion;
use App\Sede;

use Auth;

use Illuminate\Http\Request;

class EventosController extends Controller
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
        $name = uniqid('eventoEventos-', true).'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('img/eventos/');
        $image->move($destinationPath, $name);
        return $name;
    }

    public function subirImg($campo) 
    {    
        if (isset($_FILES[$campo])){
            $ext=$_FILES[$campo]['type'];
            $acceptable = array( 'image/jpeg', 'image/jpg', 'image/gif', 'image/png');
            if(in_array($ext, $acceptable) and (!empty($ext))) { 
                $file = $_FILES[$campo]['name'];
                //$nombre=url($file);
                $url="img/eventos/".uniqid('evento-', true)."-".$file;
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

    /**
     * Lista de Menú
     */
    public function listaEventos()
    {
        $listEventos = Evento::all();
        return view('frontend.eventos.lista')
        ->with('lista_eventos', $listEventos);
    }

    /**
     * Formulario de Crear Eventos
     */
    public function crearEvento()
    {
        $listaSeccion = Seccion::where('activo', 'A')->pluck('nombre', 'id');
        $listaSedes = Sede::where('activo', 'A')->pluck('nombre', 'id');
        //Formulario de Creación
        return view('frontend.eventos.nuevo')
        ->with('lista_secciones', $listaSeccion)
        ->with('lista_sedes', $listaSedes);
    }

    /**
     * Acción para Crear Eventos
     */
    public function nuevoEvento(Request $request)
    {   
        //dd($request);

        $this->validate(request(), [
            'desc_home' => 'required',
        ]);

        $evento = new Evento($request->all());
        $makeUrl = str_slug($request->nombre, '-');        
        $evento->slug = $makeUrl;
        $evento->save();

        if ($request->imagenes) {

            foreach ($request->imagenes as $reqIma) {
                //Almacena si el item no existe en BD
                $imagenEventos = EventoImagen::create(['imagen' => $reqIma['imagenUrl'], 'id_evento' => $evento->id]);
            }
        }

        //Flash::success("Se ha registrado la categoría " . $category->name . " de forma exitosa");
        return redirect()->route('lista_eventos');
    }

    /**
     * Formulario para Editar Eventos
     */
    public function editaEvento($id)
    {
        //Formulario de Edición
        $evento = Evento::find($id);
        $listaSedes = Sede::where('activo', 'A')->pluck('nombre', 'id');

        return view('frontend.eventos.editar')
        ->with('evento', $evento)
        ->with('lista_sedes', $listaSedes);
    }

    /**
     * Acción para Actualizar Eventos
     */
    public function actualizaEvento(Request $request, $id)
    {   
        $evento = Evento::find($id);
        if ($request->imagenes) {
            foreach ($request->imagenes as $reqIma) {
                //Edita si el item posee un id
                if (isset($reqIma['idImagen'])) {
                    $imagenEvento = EventoImagen::where('id', $reqIma['idImagen'])
                    ->update([
                      'imagen'=> $reqIma['imagenUrl'],
                    ]);
                }else{
                //Almacena si el item no existe en BD
                    $imagenEvento = EventoImagen::create(['imagen' => $reqIma['imagenUrl'], 'id_evento' => $evento->id]);
                }
            }
        }
        $evento->nombre = $request->nombre;
        $evento->id_sede = $request->id_sede;
        $evento->fecha = $request->fecha;
        $evento->hora = $request->hora;
        $evento->desc_home = $request->desc_home;
        $evento->que_trata_taller = $request->que_trata_taller;
        $evento->contenido = $request->contenido;
        $evento->expositores = $request->expositores;
        $evento->save();
        //flash('La categoría ' . $category->name . ' ha sido editada de manera exitosa', 'warning');
        return redirect()->route('lista_eventos');
    }

    public function activarEvento($id)
    {
        //Activar el Registro Logicamente
        $sede = Evento::find($id);
        $sede->activo = 'A';
        $sede->save();
        //flash('La categoría ' . $category->name . ' ha sido desactivada de manera exitosa', 'warning');
        return redirect()->route('lista_sedes');
    }

    public function desactivarEvento($id)
    {
        //Desactivar el Registro Logicamente
        $sede = Evento::find($id);
        $sede->activo = 'I';
        $sede->save();
        //flash('La categoría ' . $category->name . ' ha sido desactivada de manera exitosa', 'warning');
        return redirect()->route('lista_sedes');
    }

    public function eliminarItem($campo,$id) 
    {    
        //dd($campo);
        if(isset($campo) && isset($id)){
            switch ($campo) {
                case 'img':
                    $conImagen = EventoImagen::find($id);
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
