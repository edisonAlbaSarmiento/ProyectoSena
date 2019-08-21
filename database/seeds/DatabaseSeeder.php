<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(reportesSeeder::class);
        $this->call(reportesLASeeder::class);
        $this->call(reportesISeeder::class);
        $this->call(estados_aprendizseeder::class);
        $this->call(grado_formacionseeder::class);
        $this->call(ciudadseeder::class);
        $this->call(tipo_estadoseeder::class);
        $this->call(estadoseeder::class);
        $this->call(tipo_actaseeder::class);
        $this->call(rolsseeder::class);
        $this->call(centroformacionseeder::class);
        $this->call(areaseeder::class);
        $this->call(programa_formacionseeder::class);
        $this->call(tipo_documentoseeder::class);
        $this->call(modalidadseeder::class);
        $this->call(tipo_entidadseeder::class);
        $this->call(entidadseeder::class);
        $this->call(fichaseeder::class);
        $this->call(aprendizseeder::class);
        $this->call(empleadoseeder::class);
        $this->call(tipo_requisitoseeder::class);
        $this->call(titulos_seeder::class);
    }
}
