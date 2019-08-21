<?php

use Illuminate\Database\Seeder;
use App\Models\pdf;

class reportesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        pdf::create(['nombrerequisito' => 'Requisito por Ficha', 'urlview' => 'crear_reporte_por_ficha/1', 'urldownload' => 'crear_reporte_por_ficha/2']);
       
        pdf::create(['nombrerequisito' => 'Reporte Ambiente', 'urlview' => 'crear_reporte_por_ambiente/1', 'urldownload' => 'crear_reporte_por_ambiente/2']);
        
        pdf::create(['nombrerequisito' => 'Reporte Programa Formacion', 'urlview' => 'crear_reporte_por_programa/1', 'urldownload' => 'crear_reporte_por_programa/2']);
        
        pdf::create(['nombrerequisito' => 'Reporte  Aprendiz', 'urlview' => 'crear_reporte_por_aprendiz/1', 'urldownload' => 'crear_reporte_por_aprendiz/2']);
        
        pdf::create(['nombrerequisito' => 'Reporte  Agendamiento', 'urlview' => 'crear_reporte_por_agendamiento/1', 'urldownload' => 'crear_reporte_por_agendamiento/2']);
        
        pdf::create(['nombrerequisito' => 'Reporte  Visita', 'urlview' => 'crear_reporte_por_visita/1', 'urldownload' => 'crear_reporte_por_visita/2']);

        pdf::create(['nombrerequisito' => 'Reporte  Empleado', 'urlview' => 'crear_reporte_por_empleado/1', 'urldownload' => 'crear_reporte_por_empleado/2']);

        pdf::create(['nombrerequisito' => 'Reporte  Cantidad De Visitas', 'urlview' => 'crear_reporte_por_cantidad_visitas/1', 'urldownload' => 'crear_reporte_por_cantidad_visitas/2']);

        pdf::create(['nombrerequisito' => 'Reporte  Por Cantidad Aprendices Por Ficha', 'urlview' => 'crear_reporte_por_cantidad_ficha/1', 'urldownload' => 'crear_reporte_por_cantidad_ficha/2']);

        pdf::create(['nombrerequisito' => 'Reporte  Por Cantidad De Ambientes Por Entidad', 'urlview' => 'crear_reporte_por_cantidad_ambiente/1', 'urldownload' => 'crear_reporte_por_cantidad_ambiente/2']);

        pdf::create(['nombrerequisito' => 'Acta', 'urlview' => 'crear_acta/1', 'urldownload' => 'crear_acta/2']);

    }
}
