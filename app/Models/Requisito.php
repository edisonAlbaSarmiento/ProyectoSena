<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Requisito extends Model
{
    protected $table =  'requisitos';
    protected $fillable = ['fkTipoRequisito','nombrerequisito','observacion','archivoadjunto','fkGradoFormacion','fkEstadoRequisito'];
    protected $guarded = ['id'];
    public function GradoFormacion()
    {
        return $this->hasMany('App\GradoFormacion', 'fkGradoFormacion', 'id');
    }
public function EstadoRequisito()
    {
        return $this->hasMany('App\EstadoRequisito', 'fkEstadoRequisito', 'id');
    }
}
