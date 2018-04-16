<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarreraModulo extends Model
{
    protected $table = 'carrera_modulos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'contenido', 'id_carrera','activo',
    ];

    public function carrera()
    {
        return $this->belongsTo('App\Carrera', 'id_carrera', 'id');
    }
}
