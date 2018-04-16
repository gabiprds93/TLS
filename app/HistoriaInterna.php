<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistoriaInterna extends Model
{
    protected $table = 'historia_interna';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'titulo', 'contenido', 'imagen', 'id_historia','activo',
    ];

    public function historia()
    {
        return $this->belongsTo('App\Historia', 'id_historia', 'id');
    }
}
