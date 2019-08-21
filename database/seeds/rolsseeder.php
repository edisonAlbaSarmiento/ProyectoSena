<?php

use Illuminate\Database\Seeder;
use App\Models\Rol;

class rolsseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rol::create(['nombrerol' => 'Lider Articulacion']);
        Rol::create(['nombrerol' => 'Instructor Lider Area']);
        Rol::create(['nombrerol' => 'Instructor']);
        Rol::create(['nombrerol' => 'Instructor Etapa Productiva']);
        
    }
}
