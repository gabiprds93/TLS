<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Auth;

use App\Blog;

class BlogsController extends Controller
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
     * Lista de Articulos
     */
    public function listaArticulos()
    {
        $listArticulos = Blog::all();
        return view('frontend.blog.lista')
        ->with('lista_articulos', $listArticulos);
    }

    /**
     * Formulario de Crear Articulo
     */
    public function crearArticulo()
    {
        //Formulario de Creación
        return view('frontend.blog.nuevo');
    }
	
	public function cargarDoc($campo) 
    {    

	    $image = $campo;
	    $name = uniqid('articulo-', true).'.'.$image->getClientOriginalExtension();
	    $destinationPath = public_path('img/blog/');
	    $image->move($destinationPath, $name);
	    return $name;
        
    }

    public function eliminarDoc($archivo) 
    {    
    	$old_image = $archivo;
        \File::delete(public_path('/img/blog/'.$old_image));
	    return 1;
    }


    /**
     * Acción para Crear Articulo
     */
    public function nuevoArticulo(Request $request)
    {
        //dd($request);
        $articulo = new Blog($request->all());
    	
        $this->validate(request(), [
            'imagen' => 'image|mimes:jpg,jpeg,png,gif',
        ]);
        $imagen = $this->cargarDoc($request->file('imagen')); 
        $makeUrl = str_slug($request->titulo, '-');        
        $articulo->slug = $makeUrl;   
        $articulo->id_usuario = Auth::user()->id;
        $articulo->imagen = $imagen;
    	
        $articulo->save();
        return redirect()->route('editar_articulo', $articulo->id);
    }

    /**
     * Formulario para Editar Articulo
     */
    public function editaArticulo($id)
    {
        //Formulario de Edición
        $articulo = Blog::find($id);
        return view('frontend.blog.editar')
        ->with('articulo', $articulo);
    }

    /**
     * Acción para Actualizar Historia
     */
    public function actualizaArticulo(Request $request, $id)
    {   
        //dd($request);
        $articulo = Blog::find($id);

        if ($request->file('imagen')) {

            $this->validate(request(), [
                'imagen' => 'image|mimes:jpg,jpeg,png,gif',
            ]);
            $imagen = $this->cargarDoc($request->file('imagen'));
            $articulo->imagen = $imagen;
        }

        $articulo->titulo = $request->titulo;
        $makeUrl = str_slug($request->titulo, '-');        
        $articulo->slug = $makeUrl; 
        $articulo->introduccion = $request->introduccion;
        $articulo->contenido = $request->contenido;
        $articulo->autor = $request->autor;
        $articulo->cargo = $request->cargo;
       
        $articulo->save();
        return redirect()->route('lista_articulos');
    }
    
    public function activarArticulo($id)
    {
        //Activar el Registro Logicamente
        $articulo = Blog::find($id);
        $articulo->activo = 'A';
        $articulo->save();

        return redirect()->route('lista_articulos');
    }

    public function desactivarArticulo($id)
    {
        //Desactivar el Registro Logicamente
        $articulo = Blog::find($id);
        $articulo->activo = 'I';
        $articulo->save();

        return redirect()->route('lista_articulos');
    }
}
