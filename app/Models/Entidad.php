<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entidad extends Model
{
    protected $table = 'entidads';
    protected $fillable = ['fkTipoEntidad','nombreentidad','direccion','telefono','fkEstado'];
    protected $guarded = ['id'];
    public function TipoEntidad()
    {
        return $this->hasMany('App\TipoEntidad', 'fkTipoEntidad', 'id');
    }
public function Estado()
    {
        return $this->hasMany('App\Estado', 'fkEstado', 'id');
    }
}
