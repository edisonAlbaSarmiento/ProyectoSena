<?php

use Illuminate\Database\Seeder;
use App\Models\Modalidad;

class modalidadseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Modalidad::create(['nombremodalidad' => 'contrato de aprendizaje','descripcion' => 'estudiante']);
    }
}
