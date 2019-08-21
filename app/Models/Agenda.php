<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Empleado As Empleado;
use App\Models\Estado As Estado;

class Agenda extends Model
{
    //se pone el nombre de las migraciones en $table
	protected $table = 'agendas';
	protected $fillable = [
	'titulo','fechaasignacion','fecharealizacion','hora','fkEntidad','fkEmpleado','fkEstado'
	];
	protected $guarded = [
	'id'
	];
}

