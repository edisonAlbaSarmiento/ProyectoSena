<?php

use Illuminate\Database\Seeder;
use App\Models\TipoEstado;

class tipo_estadoseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoEstado::create(['tipoestado' => 'Actas']);
        TipoEstado::create(['tipoestado' => 'Agenda']);
        TipoEstado::create(['tipoestado' => 'Ambiente']);
        TipoEstado::create(['tipoestado' => 'Areas']);
        TipoEstado::create(['tipoestado' => 'Compromiso']);
        TipoEstado::create(['tipoestado' => 'Empleado']);
        TipoEstado::create(['tipoestado' => 'Entidad']);
        TipoEstado::create(['tipoestado' => 'Programa formacion']);
        TipoEstado::create(['tipoestado' => 'Seguimiento']);
    }
}
