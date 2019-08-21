<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetAmbienteActa extends Model
{
    	  //se pone el nombre de las migraciones en $table
     protected $table = 'det_ambiente_actas';
    protected $fillable = ['fkAmbiente','fkActa','fkAmbiente'];
    protected $guarded = ['id'];
}
