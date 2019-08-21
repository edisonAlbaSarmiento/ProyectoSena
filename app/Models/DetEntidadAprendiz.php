<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetEntidadAprendiz extends Model
{
    protected $table = 'det_entidad_aprendizs';
    protected $fillable = ['fkEntidad','fkAprendiz'];
    protected $guarded = ['id'];
}
