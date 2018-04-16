<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContenidoDetalle extends Model
{

    protected $table = 'contenido_detalle';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'titulo', 'detalle', 'id_contenido', 'activo',
    ];

    public function contenido()
    {
        return $this->belongsTo('App\Contenido', 'id_contenido', 'id');
    }
}