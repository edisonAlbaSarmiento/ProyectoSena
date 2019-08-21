<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Compromiso extends Model
{
	  //se pone el nombre de las migraciones en $table
     protected $table = 'compromisos';
    protected $fillable = ['Actividades','responsables','fecha','fkacta','fkestado'];
    protected $guarded = ['id'];
    public function Acta()
    {
        return $this->hasMany('App\Acta', 'fkActa', 'id');
    }

}
