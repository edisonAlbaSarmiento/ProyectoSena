<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Titulo extends Model
{
    protected $table = 'titulos';
    protected $fillable = ['titulo','fkGradoFormacion'];
    protected $guarded = ['id'];

public function GradoFormacion()
    {
        return $this->hasMany('App\GradoFormacion', 'fkGradoFormacion', 'id');
    }
}