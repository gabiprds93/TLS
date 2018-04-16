<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Egresados extends Model
{
    protected $table = 'egresados';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'descripcion', 'quote', 'pie_contenido', 'twitter', 'linkedin', 'slug' ,'id_carrera','activo',
    ];

    public function imagenes()
    {
        return $this->hasMany('App\EgresadoImagen', 'id_egresado', 'id');
    }

    public function carrera()
    {
        return $this->belongsTo('App\Carrera', 'id_carrera', 'id');
    }

}
