<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table = 'areas';
    protected $fillable = ['nombrearea','descripcion','fkCentro','fkEstado'];
    protected $guarded = ['id'];
    /*public function Estado()
    {
        return $this->hasMany('App\Estado', 'fkEstado', 'id');
    }*/
}

