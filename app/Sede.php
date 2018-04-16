<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{
    protected $table = 'sedes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'direccion','latitud','longitud','imagen','activo',
    ];

    public function eventos()
    {
        return $this->hasMany('App\Evento', 'id_sede', 'id');
    }
}
