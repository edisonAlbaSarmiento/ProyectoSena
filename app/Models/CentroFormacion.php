<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CentroFormacion extends Model
{
    protected $table ='centro_formacions';
    protected $fillable = ['nombrecentro','direccion','telefono','fkCiudad'];
    protected $guarded = ['id'];
    public function Ciudad()
    {
        return $this->hasMany('App\Ciudad', 'fkCiudad', 'id');
    }
}
