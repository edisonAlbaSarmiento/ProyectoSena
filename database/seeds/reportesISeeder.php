<?php

use Illuminate\Database\Seeder;
use App\Models\pdf;

class reportesISeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        pdf::create(['nombrerequisito' => 'Requisito por Ficha', 'urlview' => 'crear_reporte_por_fichaI/1', 'urldownload' => 'crear_reporte_por_fichaI/2']);
       
        pdf::create(['nombrerequisito' => 'Reporte Ambiente', 'urlview' => 'crear_reporte_por_ambienteI/1', 'urldownload' => 'crear_reporte_por_ambienteI/2']);
        
        pdf::create(['nombrerequisito' => 'Reporte Programa Formacion', 'urlview' => 'crear_reporte_por_programaI/1', 'urldownload' => 'crear_reporte_por_programaI/2']);
        
        pdf::create(['nombrerequisito' => 'Reporte  Aprendiz', 'urlview' => 'crear_reporte_por_aprendizI/1', 'urldownload' => 'crear_reporte_por_aprendizI/2']);
        
        pdf::create(['nombrerequisito' => 'Reporte  Agendamiento', 'urlview' => 'crear_reporte_por_agendamientoI/1', 'urldownload' => 'crear_reporte_por_agendamientoI/2']);
        
        pdf::create(['nombrerequisito' => 'Reporte  Visita', 'urlview' => 'crear_reporte_por_visitaI/1', 'urldownload' => 'crear_reporte_por_visitaI/2']);

        pdf::create(['nombrerequisito' => 'Reporte  Empleado', 'urlview' => 'crear_reporte_por_empleado/1', 'urldownload' => 'crear_reporte_por_empleado/2']);

        pdf::create(['nombrerequisito' => 'Reporte  Cantidad De Visitas', 'urlview' => 'crear_reporte_por_cantidad_visitasI/1', 'urldownload' => 'crear_reporte_por_cantidad_visitasI/2']);

        pdf::create(['nombrerequisito' => 'Reporte  Por Cantidad Aprendices Por Ficha', 'urlview' => 'crear_reporte_por_cantidad_fichaI/1', 'urldownload' => 'crear_reporte_por_cantidad_fichaI/2']);

        pdf::create(['nombrerequisito' => 'Reporte  Por Cantidad De Ambientes Por Entidad', 'urlview' => 'crear_reporte_por_cantidad_ambienteI/1', 'urldownload' => 'crear_reporte_por_cantidad_ambienteI/2']);

        pdf::create(['nombrerequisito' => 'Acta', 'urlview' => 'crear_actaI/1', 'urldownload' => 'crear_actaI/2']);
    }
}
