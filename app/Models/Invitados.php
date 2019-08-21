<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invitados extends Model
{
         protected $table = 'invitados';
    protected $fillable = ['nombreinvitado','cargo','entidad','fkacta'];
    protected $guarded = ['id'];
}
