<?php

use Illuminate\Database\Seeder;
use App\Models\pdf;

class reportesLASeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        pdf::create(['nombrerequisito' => 'Requisito por Ficha', 'urlview' => 'crear_reporte_por_fichaLA/1', 'urldownload' => 'crear_reporte_por_fichaLA/2']);
       
        pdf::create(['nombrerequisito' => 'Reporte Ambiente', 'urlview' => 'crear_reporte_por_ambienteLA/1', 'urldownload' => 'crear_reporte_por_ambienteLA/2']);
        
        pdf::create(['nombrerequisito' => 'Reporte Programa Formacion', 'urlview' => 'crear_reporte_por_programaLA/1', 'urldownload' => 'crear_reporte_por_programaLA/2']);
        
        pdf::create(['nombrerequisito' => 'Reporte  Aprendiz', 'urlview' => 'crear_reporte_por_aprendizLA/1', 'urldownload' => 'crear_reporte_por_aprendizLA/2']);
        
        pdf::create(['nombrerequisito' => 'Reporte  Agendamiento', 'urlview' => 'crear_reporte_por_agendamientoLA/1', 'urldownload' => 'crear_reporte_por_agendamientoLA/2']);
        
        pdf::create(['nombrerequisito' => 'Reporte  Visita', 'urlview' => 'crear_reporte_por_visitaLA/1', 'urldownload' => 'crear_reporte_por_visitaLA/2']);

        pdf::create(['nombrerequisito' => 'Reporte  Empleado', 'urlview' => 'crear_reporte_por_empleadoLA/1', 'urldownload' => 'crear_reporte_por_empleadoLA/2']);

        pdf::create(['nombrerequisito' => 'Reporte  Cantidad De Visitas', 'urlview' => 'crear_reporte_por_cantidad_visitasLA/1', 'urldownload' => 'crear_reporte_por_cantidad_visitasLA/2']);

        pdf::create(['nombrerequisito' => 'Reporte  Por Cantidad Aprendices Por Ficha', 'urlview' => 'crear_reporte_por_cantidad_fichaLA/1', 'urldownload' => 'crear_reporte_por_cantidad_fichaLA/2']);

        pdf::create(['nombrerequisito' => 'Reporte  Por Cantidad De Ambientes Por Entidad', 'urlview' => 'crear_reporte_por_cantidad_ambienteLA/1', 'urldownload' => 'crear_reporte_por_cantidad_ambienteLA/2']);

        pdf::create(['nombrerequisito' => 'Acta', 'urlview' => 'crear_actaLA/1', 'urldownload' => 'crear_actaLA/2']);

    }
}
