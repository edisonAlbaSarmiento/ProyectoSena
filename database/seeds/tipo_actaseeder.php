<?php

use Illuminate\Database\Seeder;
use App\Models\TipoActa;

class tipo_actaseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoActa::create(['nombretipoacta' => 'Seguimiento']);
        TipoActa::create(['nombretipoacta' => 'Reunion']);
        TipoActa::create(['nombretipoacta' => 'Visita']);
    }
}
