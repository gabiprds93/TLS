<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagina extends Model
{
    protected $table = 'paginas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'titulo', 'subtitulo', 'link', 'url_link',  'tipo_pagina', 'video', 'titulo_1', 'contenido_1', 'titulo_2', 'contenido_2', 'titulo_3', 'contenido_3', 'color','color_fuente', 'color_titulo', 'color_linea', 'id_seccion','slug','activo',
    ];

    public function seccion()
    {
        return $this->belongsTo('App\Seccion', 'id_seccion', 'id');
    }

    public function sliders()
    {
        return $this->hasMany('App\PaginaSlider', 'id_pagina', 'id');
    }

}
