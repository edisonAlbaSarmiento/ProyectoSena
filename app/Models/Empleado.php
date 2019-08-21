<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = 'empleados';
    protected $fillable = ['nombreempleado','apellido','fkTipoDoc','identificacion','direccion','telefonofijo','telefonocelular','correo','fkCentro','fkEstado','fkuser'];
    protected $guarded = ['id'];
    public function TipoDocumento()
    {
        return $this->hasMany('App\TipoDocumento', 'fkTipoDDoc', 'id');
    }
public function CentroFormacion()
    {
        return $this->hasMany('App\CentroFormacion', 'fkCentro', 'id');
    }
public function Estado()
    {
        return $this->hasMany('App\Estado', 'fkEstado', 'id');
    }
public function fkRol()
    {
        return $this->hasMany('App\Rol', 'fkRol', 'id');
    }
}
