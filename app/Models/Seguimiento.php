<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seguimiento extends Model
{
            protected $table = 'seguimientos';
    protected $fillable = ['archivoadjunto','fkEstado'];
    protected $guarded = ['id'];
    public function Estado()
    {
        return $this->hasMany('App\Estado', 'fkEstado', 'id');
    }
}
