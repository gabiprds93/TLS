<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContenidoLink extends Model
{

    protected $table = 'contenido_links';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'url', 'id_contenido', 'activo',
    ];

    public function contenido()
    {
        return $this->belongsTo('App\Contenido', 'id_contenido', 'id');
    }
}