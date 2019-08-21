<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetTituloAprendiz extends Model
{
    protected $table = 'det_titulo_aprendizs';
    protected $fillable = ['fkTitulo','fkAprendiz'];
    protected $guarded = ['id'];
}
