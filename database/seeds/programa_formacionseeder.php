<?php

use Illuminate\Database\Seeder;
use App\Models\ProgramaFormacion;

class programa_formacionseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProgramaFormacion::create(['nombreprograma' => 'ADSI','descripcion' => 'Sistemas de informacion','fkArea' =>'1' ,'fkGrado' => '2' ,'fkEstado' =>'22']);
        ProgramaFormacion::create(['nombreprograma' => 'Mantenimiento','descripcion' => 'Computo','fkArea' =>'1' ,'fkGrado' => '2' ,'fkEstado' =>'22']);
    }
}
