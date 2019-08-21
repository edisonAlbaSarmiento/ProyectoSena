<?php

use Illuminate\Database\Seeder;
use App\Models\GradoFormacion;

class grado_formacionseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GradoFormacion::create(['codigo' => '1234546','nombregrado' => 'Tecnologo']);
        GradoFormacion::create(['codigo' => '4546546','nombregrado' => 'Tecnico']);
    }
}
