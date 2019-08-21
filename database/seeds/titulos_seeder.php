<?php

use Illuminate\Database\Seeder;
use App\Models\Titulo;

class titulos_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Titulo::create(['titulo' => 'Administracion Empresas','fkGradoFormacion' =>'1']);
        Titulo::create(['titulo' => 'Diseño Grafico','fkGradoFormacion' =>'1']);

    }
}
