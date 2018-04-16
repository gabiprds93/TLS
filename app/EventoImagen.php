<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventoImagen extends Model
{
    protected $table = 'evento_imagenes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'imagen', 'id_evento','activo',
    ];

    public function evento()
    {
        return $this->belongsTo('App\Evento', 'id_evento', 'id');
    }
}
