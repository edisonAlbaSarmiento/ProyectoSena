<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table = 'estados';
    protected $fillable = ['nombreestado','fkTipoEstado'];
    protected $guarded = ['id'];
    public function TipoEstado()
    {
        return $this->hasMany('App\TipoEstado', 'fkTipoEstado', 'id');
    }

}
