<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'url', 'orden','id_seccion', 'activo',
    ];

    public function seccion()
    {
        return $this->belongsTo('App\Seccion', 'id_seccion', 'id');
    }

}
