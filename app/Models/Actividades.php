<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Actividades extends Model
{
    //se pone el nombre de las migraciones en $table
	protected $table = 'actividades';
	protected $fillable = ['actividad','evidencias','fecha','lugar','fkBitacora'];
	protected $guarded = ['id'];
	
	public function Bitacora()
    {
        return $this->hasMany('App\Bitacora', 'fkBitacora', 'id');
    }

}

	

