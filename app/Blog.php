<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blog';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'titulo', 'introduccion', 'contenido', 'imagen', 'autor', 'cargo', 'slug', 'id_usuario', 'activo',
    ];

}
