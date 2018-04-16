<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mundo extends Model
{
    protected $table = 'mundos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'activo',
    ];

    public function carreras()
    {
        return $this->hasMany('App\Carrera', 'id_mundo', 'id');
    }


}
