<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoActa extends Model
{
    protected $table = 'tipo_actas';
    protected $fillable = ['nombretipoacta'];
    protected $guarded = ['id'];
}
