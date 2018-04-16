<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    protected $table = 'carreras';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'multimedia', 'orden',  'color', 'color_titulo_slide', 'color_link_slide', 'color_mobile', 'imagen_referencial', 'descripcion_carrera', 'color_fuente', 'color_linea_contenido', 'variacion_tiempo','tiempo_total', 'certificaciones', 'ofrecemos', 'talento', 'nosotros', 'id_mundo', 'slug','activo',
    ];

    public function mundo()
    {
        return $this->belongsTo('App\Mundo', 'id_mundo', 'id');
    }

    public function sliders()
    {
        return $this->hasMany('App\CarreraSlider', 'id_carrera', 'id');
    }

    public function modulos()
    {
        return $this->hasMany('App\CarreraModulo', 'id_carrera', 'id');
    }

    public function egresados()
    {
        return $this->hasMany('App\Egresados', 'id_egresado', 'id');
    }

}
