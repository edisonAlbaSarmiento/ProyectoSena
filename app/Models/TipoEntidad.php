<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoEntidad extends Model
{
    protected $table = 'tipo_entidads';
    protected $fillable = ['nombretipoentidad'];
    protected $guarded = ['id'];
}
