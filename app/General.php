<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class General extends Model
{

    protected $table = 'general';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'titulo_sld_carrera', 'color_sld_carrera', 'color_tit_sld_carrera', 'color_linea_sld', 'color_sld_sedes', 'color_sld_contacto', 'imagen_contacto', 'video_contacto',
    ];

    public function contenido()
    {
        return $this->belongsTo('App\Contenido', 'id_contenido', 'id');
    }

    public function internas()
    {
        return $this->hasMany('App\HistoriaInterna', 'id_historia', 'id');
    }
}