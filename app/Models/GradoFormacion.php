<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GradoFormacion extends Model
{
    protected $table = 'grado_formacions';
    protected $fillable= ['codigo','nombregrado'];
    protected $guarded = ['id'];
}
