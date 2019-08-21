<?php

use Illuminate\Database\Seeder;
use App\Models\TipoEntidad;

class tipo_entidadseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         TipoEntidad::create(['nombretipoentidad' => 'Institucion Educativa']);
         TipoEntidad::create(['nombretipoentidad' => 'Empresa']);
    }
}
