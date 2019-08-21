<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramaFormacion extends Model
{
    protected $table = 'programa_formacions';
    protected $fillable = ['nombreprograma','descripcion','fkArea','fkGrado','fkEstado'];
    protected $guarded = ['id'];
    public function Area()
    {
        return $this->hasMany('App\Area', 'fkArea', 'id');
    }
public function GradoFormacion()
    {
        return $this->hasMany('App\GradoFormacion', 'fkGrado', 'id');
    }
public function Estado()
    {
        return $this->hasMany('App\Estado', 'fkEstado', 'id');
    }
}
