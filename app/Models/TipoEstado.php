<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoEstado extends Model
{
    protected $table = 'tipo_estados';
    protected $fillable = ['tipoestado'];
    protected $guarded = ['id'];
}
