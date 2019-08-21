<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstadoRequisito extends Model
{
    protected $table = 'estado_requisitos';
    protected $fillable = ['nombre'];
    protected $guarded = ['id'];
}
