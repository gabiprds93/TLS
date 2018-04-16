<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contenido extends Model
{

    protected $table = 'contenido';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'titulo', 'subtitulo', 'color_contenido', 'color_detalle', 'color_titulo', 'color_link', 'color_sub_link', 'slide_lab', 'color_sub_tab', 'imagen_fondo', 'link_android', 'link_ios', 'texto_contenido','pie_contenido','posicion_links', 'slug', 'orden', 'video', 'id_seccion', 'activo',
    ];

    public function seccion()
    {
        return $this->belongsTo('App\Seccion', 'id_seccion', 'id');
    }

    public function detalles()
    {
        return $this->hasMany('App\ContenidoDetalle', 'id_contenido', 'id');
    }

    public function links()
    {
        return $this->hasMany('App\ContenidoLink', 'id_contenido', 'id');
    }

    public function imagenes()
    {
        return $this->hasMany('App\ContenidoImagen', 'id_contenido', 'id');
    }

}