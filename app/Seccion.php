<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seccion extends Model
{

    protected $table = 'secciones';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'orden','activo',
    ];


    public function menu()
    {
        return $this->hasOne('App\Menu', 'id_seccion', 'id');
    }

    public function contenidos()
    {
        return $this->hasMany('App\Contenido', 'id_seccion', 'id');
    }

    public function paginas()
    {
        return $this->hasMany('App\Pagina', 'id_pagina', 'id');
    }

}