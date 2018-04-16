<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContenidoImagen extends Model
{

    protected $table = 'contenido_imagenes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'imagen', 'id_contenido', 'activo',
    ];

    public function contenido()
    {
        return $this->belongsTo('App\Contenido', 'id_contenido', 'id');
    }
}