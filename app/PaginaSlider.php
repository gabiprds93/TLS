<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaginaSlider extends Model
{
    protected $table = 'pagina_sliders';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'titulo', 'texto_corto', 'imagen', 'id_pagina','activo',
    ];

    public function pagina()
    {
        return $this->belongsTo('App\Pagina', 'id_pagina', 'id');
    }
}
