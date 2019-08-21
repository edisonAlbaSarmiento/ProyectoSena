<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetAprendizSeguimiento extends Model
{
       	  //se pone el nombre de las migraciones en $table
     protected $table = 'det_aprendiz_seguimientos';
    protected $fillable = ['autoseguimiento','fecha','fkAprendiz','fkSeguimiento'];
    protected $guarded = ['id'];
}
