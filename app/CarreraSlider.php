<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarreraSlider extends Model
{
    protected $table = 'carrera_sliders';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'titulo', 'duracion', 'imagen', 'id_carrera','activo',
    ];

    public function carrera()
    {
        return $this->belongsTo('App\Carrera', 'id_carrera', 'id');
    }
}
