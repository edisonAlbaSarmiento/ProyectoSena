<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modalidad extends Model
{
    protected $table = 'modalidads';
    protected $fillable = ['nombremodalidad','descripcion'];
    protected $guarded = ['id'];
}
