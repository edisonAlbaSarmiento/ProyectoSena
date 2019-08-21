<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ficha extends Model
{
    protected $table = 'fichas';
    protected $fillable = ['numero','HoraInicioSofia','HoraFinSofia','fkPrograma','fkEntidad'];
    protected $guarded = ['id'];
    public function fkProgramaFormacion()
    {
        return $this->hasMany('App\ProgramaFormacion', 'fkPrograma', 'id');
    }
public function Entidad()
    {
        return $this->hasMany('App\Entidad', 'fkEntidad', 'id');
    }
}
