<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetTituloEmpleado extends Model
{
    protected $table = 'det_titulo_empleados';
    protected $fillable = ['fkTitulo','fkEmpleado'];
    protected $guarded = ['id'];
}
