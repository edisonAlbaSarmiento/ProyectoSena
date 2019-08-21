<?php

use Illuminate\Database\Seeder;
use App\Models\pdf;

class reportesESeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        pdf::create(['nombrerequisito' => 'Reporte  Agendamiento', 'urlview' => 'crear_reporte_por_agendamiento/1', 'urldownload' => 'crear_reporte_por_agendamiento/2']);
        
        pdf::create(['nombrerequisito' => 'Reporte  Visita', 'urlview' => 'crear_reporte_por_visita/1', 'urldownload' => 'crear_reporte_por_visita/2']);

        pdf::create(['nombrerequisito' => 'Reporte  Cantidad De Visitas', 'urlview' => 'crear_reporte_por_cantidad_visitas/1', 'urldownload' => 'crear_reporte_por_cantidad_visitas/2']);

        pdf::create(['nombrerequisito' => 'Reporte  Por Cantidad Aprendices Por Ficha', 'urlview' => 'crear_reporte_por_cantidad_ficha/1', 'urldownload' => 'crear_reporte_por_cantidad_ficha/2']);

        pdf::create(['nombrerequisito' => 'Reporte  Por Cantidad De Ambientes Por Entidad', 'urlview' => 'crear_reporte_por_cantidad_ambiente/1', 'urldownload' => 'crear_reporte_por_cantidad_ambiente/2']);

        pdf::create(['nombrerequisito' => 'Acta', 'urlview' => 'crear_acta/1', 'urldownload' => 'crear_acta/2']);

        pdf::create(['nombrerequisito' => 'Bitacora', 'urlview' => 'crear_bitacora/1', 'urldownload' => 'crear_bitacora/2']);
    }
}
