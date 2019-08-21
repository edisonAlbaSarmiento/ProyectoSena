<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{
    protected $table = 'tipo_documentos';
    protected $fillable = ['descripcion'];
    protected $guarded = ['id'];
}
