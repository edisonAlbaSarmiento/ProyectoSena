<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aprendiz extends Model
{
    protected $table = 'aprendizs';
    protected $fillable = ['nombreaprendiz','apellido','fkTipoDoc','identificacion','correo','telefonocelular','telefonofijo','direccion','fkEstadoAprendiz','fkModalidad','fkFicha','fkuser'];
    protected $guarded = ['id'];

}