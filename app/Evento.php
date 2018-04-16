<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = 'eventos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'fecha','hora','desc_home','que_trata_taller','contenido','expositores', 'id_sede', 'activo',
    ];

    public function sede()
    {
        return $this->belongsTo('App\Sede', 'id_sede', 'id');
    }

    public function eventos_imagenes()
    {
        return $this->hasMany('App\EventoImagen', 'id_evento', 'id');
    }
}
