<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ambiente extends Model
{
     //se pone el nombre de las migraciones en $table
	protected $table = 'ambientes';
	protected $fillable = ['nombreambiente','fkEstado','fkEntidad'];
	protected $guarded = ['id'];
	public function Estado()
    {
        return $this->hasMany('App\Estado', 'fkEstado', 'id');
    }

}


