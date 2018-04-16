<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EgresadoImagen extends Model
{
    protected $table = 'egresado_imagenes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'imagen', 'id_egresado','activo',
    ];

    public function egresado()
    {
        return $this->belongsTo('App\Egresados', 'id_egresado', 'id');
    }
}
