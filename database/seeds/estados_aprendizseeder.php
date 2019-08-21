<?php

use Illuminate\Database\Seeder;
use App\Models\EstadoAprendiz;

class estados_aprendizseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EstadoAprendiz::create(['nombreestado' => 'Activo']);
        EstadoAprendiz::create(['nombreestado' => 'Inactivo']);
        EstadoAprendiz::create(['nombreestado' => 'Incapacidad']);
    }
}
