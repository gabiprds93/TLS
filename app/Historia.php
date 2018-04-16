<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historia extends Model
{

    protected $table = 'historias';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'titulo', 'introduccion', 'color', 'imagen', 'orden', 'activo',
    ];

    public function internas()
    {
        return $this->hasMany('App\HistoriaInterna', 'id_historia', 'id');
    }
}