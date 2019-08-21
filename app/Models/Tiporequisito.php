<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tiporequisito extends Model
{
    protected $table = 'tiporequisitos';
    protected $fillable = ['nombre'];
    protected $guarded = ['id'];
}
