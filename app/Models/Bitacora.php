<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
      //se pone el nombre de las migraciones en $table
	protected $table = 'bitacoras';
	protected $fillable = ['regional',
	'fkCentro',
	'fkPrograma',
	'fkFicha',
	'nombreaprendiz',
	'apellido',
	'fkTipoDoc',
	'identificacion',
	'telefonoaprendiz',
	'correo',
	'razonsocial',
	'direccionempresa',
	'nit',
	'nombreresponsable',
	'cargo',
	'telefonoempresa',
	'emailempresa',
	'archivoadjunto'];
	protected $guarded = ['id'];
	
}

