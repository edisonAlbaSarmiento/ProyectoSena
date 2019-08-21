<?php

use Illuminate\Database\Seeder;
use App\Models\Estado;

class estadoseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Estado::create(['nombreestado' => 'Pendiente','fkTipoEstado' => '9']);
        Estado::create(['nombreestado' => 'En Proceso','fkTipoEstado' => '9']);
        Estado::create(['nombreestado' => 'Finalizado','fkTipoEstado' => '9']);
        Estado::create(['nombreestado' => 'Cumplido','fkTipoEstado' => '2']);
        Estado::create(['nombreestado' => 'En Proceso','fkTipoEstado' => '2']);
        Estado::create(['nombreestado' => 'Completa','fkTipoEstado' => '1']);
        Estado::create(['nombreestado' => 'Incompleta','fkTipoEstado' => '1']);
        Estado::create(['nombreestado' => 'En Proceso','fkTipoEstado' => '1']);
        Estado::create(['nombreestado' => 'Cumplido','fkTipoEstado' => '5']);
        Estado::create(['nombreestado' => 'Incumplido','fkTipoEstado' => '5']);
        Estado::create(['nombreestado' => 'Activo','fkTipoEstado' => '3']);
        Estado::create(['nombreestado' => 'Inactivo','fkTipoEstado' => '3']);
        Estado::create(['nombreestado' => 'Activo','fkTipoEstado' => '4']);
        Estado::create(['nombreestado' => 'Inactivo','fkTipoEstado' => '4']);
        Estado::create(['nombreestado' => 'Activo','fkTipoEstado' => '6']);
        Estado::create(['nombreestado' => 'Inactivo','fkTipoEstado' => '6']);
        Estado::create(['nombreestado' => 'Suspendido','fkTipoEstado' => '6']);
        Estado::create(['nombreestado' => 'En Licencia','fkTipoEstado' => '6']);
        Estado::create(['nombreestado' => 'Incapacitado','fkTipoEstado' => '6']);
        Estado::create(['nombreestado' => 'Activo','fkTipoEstado' => '7']);
		Estado::create(['nombreestado' => 'Inactivo','fkTipoEstado' => '7']);
		Estado::create(['nombreestado' => 'Activo','fkTipoEstado' => '8']);
		Estado::create(['nombreestado' => 'Inactivo','fkTipoEstado' => '7']);
    }
}
