<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asistentes extends Model
{
      //se pone el nombre de las migraciones en $table
	protected $table = 'asistentes';
	protected $fillable = ['nombreasistente','cargodependenciaentidad','fkacta'];
	protected $guarded = ['id'];
	public function Acta()
    {
        return $this->hasMany('App\Acta', 'fkActa', 'id');
    }
}

