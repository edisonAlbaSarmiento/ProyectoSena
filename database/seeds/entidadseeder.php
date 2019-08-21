<?php

use Illuminate\Database\Seeder;

use App\Models\Entidad As Entidad;

class entidadseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Entidad::create(['fkTipoEntidad' => '1','nombreentidad' => 'Aldemar','direccion' =>'Calle5' ,'telefono' => '456465' ,'fkEstado' =>'20']);
        Entidad::create(['fkTipoEntidad' => '1','nombreentidad' => 'Julio Florez','direccion' =>'Av 68' ,'telefono' => '887945' ,'fkEstado' =>'20']);
    }
}
