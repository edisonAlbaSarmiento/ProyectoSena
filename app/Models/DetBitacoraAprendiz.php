<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetBitacoraAprendiz extends Model
{
           	  //se pone el nombre de las migraciones en $table
    protected $table = 'det_bitacora_aprendizs';
    protected $fillable = ['fecha','fkAprendiz','fkBitacora'];
    protected $guarded = ['id'];
}
