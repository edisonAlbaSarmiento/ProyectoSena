<?php

use Illuminate\Database\Seeder;
use App\Models\CentroFormacion;

class centroformacionseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CentroFormacion::create(['nombrecentro' => 'Centro de Formación Turística, Gente de Mar y de Servicios','direccion' => 'Av. Francisco Newball, San Andrés','telefono' => '5121752','fkCiudad' => '7']);
        CentroFormacion::create(['nombrecentro' => 'Centro de Formación Turística, Gente de Mar y de Servicios','direccion' => 'Av. Francisco Newball, San Andrés','telefono' => '5121752','fkCiudad' => '7']);
        CentroFormacion::create(['nombrecentro' => '​Centro de Gestión de Mercados, Logística y TICs','direccion' => 'Calle 52 # 13 - 65','telefono' => '5941301','fkCiudad' => '13']);
        CentroFormacion::create(['nombrecentro' => '​Centro Industrial y Desarrollo Empresarial de Soacha','direccion' => 'Calle 13 # 10-60 Soacha - Centro','telefono' => '5978250​','fkCiudad' => '12']);
    }
}
