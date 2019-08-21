<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certificacion extends Model
{
    protected $table = 'certificacions';
    protected $fillable = ['fkPrograma','fkAprendiz','fkRequisitos','fkEstado'];
    protected $guarded = ['id'];
}
