<?php

use Illuminate\Database\Seeder;
use App\Models\TipoDocumento;

class tipo_documentoseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoDocumento::create(['descripcion' => 'Cedula De Ciudadania']);
        TipoDocumento::create(['descripcion' => 'Tarjeta De Identidad']);
        TipoDocumento::create(['descripcion' => 'Cedula De Extranjera']);
        TipoDocumento::create(['descripcion' => 'Pasaporte']);
        TipoDocumento::create(['descripcion' => 'Documento Nacional De Identificacion']);
        TipoDocumento::create(['descripcion' => 'Numero De Identificacion Tributaria']);
    }
}
