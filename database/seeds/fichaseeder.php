<?php

use Illuminate\Database\Seeder;
use App\Models\Ficha;

class fichaseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Ficha::create(['numero' => '1124809','HoraInicioSofia' => '07:00:00','HoraFinSofia' => '14:00:00' ,'fkPrograma' => '1' ,'fkEntidad' => '1' ]); 
    }
}
