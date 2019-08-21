<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstadoAprendiz extends Model
{
     protected $table = 'estado_aprendizs';
    protected $fillable = ['nombreestado'];
    protected $guarded = ['id'];
}
