<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Acta extends Model
{
    //se pone el nombre de las migraciones en $table
	protected $table = 'actas';
	protected $fillable = ['fecha','fkTipoActa','descripcion','HoraInicio','HoraFin','temas','objetivo','desarrolloreunion','conclusion','archivoadjunto','fkEstado'];
	protected $guarded = ['id'];


	
	public function TipoActa()
    {
        return $this->hasMany('App\TipoActa', 'fkTipoActa', 'id');
    }
}


