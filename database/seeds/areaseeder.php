<?php

use Illuminate\Database\Seeder;
use App\Models\Area;

class areaseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Area::create(['nombrearea' => 'Teleinformatica','descripcion' => 'Computo','fkCentro' => '3','fkEstado' => '13']);
        Area::create(['nombrearea' => 'Mercadeo','descripcion' => 'Ventas','fkCentro' => '3','fkEstado' => '13']);
    } 
}
