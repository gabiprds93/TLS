<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarreraLista extends Model
{
    protected $table = 'carrera_listas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'certificaciones', 'ofrecemos', 'talento', 'nosotros', 'id_carrera','activo',
    ];

    public function carrera()
    {
        return $this->belongsTo('App\Carrera', 'id_carrera', 'id');
    }

}
