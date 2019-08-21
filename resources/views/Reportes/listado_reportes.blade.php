@extends('layouts.app3')
@section('content1')
@foreach ($rolsEmpleado as $roles)
<section class="container">
  <section class="row">
    <section class="col-md-8 col-md-offset-1">
      <section class="card-panel hoverable">
          <div class="panel panel-danger">
            <div class="panel-heading"><center><h3>REPORTES DEL SISTEMA</h3></center></div>
             <div class="panel-body">
          <article class="col s7">
            <div class="input-group input-group-icon">
              <!--<input type="text" class="input-lg" name="nombrerequisito" placeholder="Buscar Por Nombre" />-->
              <div class="input-icon"><i class="fa fa-search" aria-hidden="true"></i></div>
            </div>
          </article>
        <article class="col s5">
            <button type="submit" class="btn-floating btn-large waves-effect waves-light tooltipped"data-position="bottom" data-delay="50" data-tooltip="Buscar"><i class="fa fa-search" aria-hidden="true"></i></button>
          </article> 
        <article class="form-group">
                              <table class="table table-hover">
                   
                    <thead>
                    <tr>
                      <th>Nombre Del Reporte</th>
                      <th>Ver</th>
                      <th>Descargar</th>
                    </tr></thead>
                    <tbody>
                  @if ($roles->nombrerol == 'Instructor Lider Area')
                    <tr>
                      <td>Reporte Por Ficha</td>
                      <td><a href="crear_reporte_por_fichaLA/1" target="_blank" ><button class="btn btn-block btn-primary btn-xs"><i class="fa fa-file-text-o" aria-hidden="true"></i></button></a></td>
                      <td><a href="crear_reporte_por_fichaLA/2" target="_blank" ><button class="btn btn-block btn-success btn-xs"><i class="fa fa-cloud-download" aria-hidden="true"></i></button></a></td>
                    </tr>
                    <tr>
                      <td>Reporte Ambiente</td>
                      <td><a href="crear_reporte_por_ambienteLA/1" target="_blank" ><button class="btn btn-block btn-primary btn-xs"><i class="fa fa-file-text-o" aria-hidden="true"></i></button></a></td>
                      <td><a href="crear_reporte_por_ambienteLA/2" target="_blank" ><button class="btn btn-block btn-success btn-xs"><i class="fa fa-cloud-download" aria-hidden="true"></i></button></a></td>
                    </tr>
                    <tr>
                      <td>Reporte  Aprendiz</td>
                      <td><a href="crear_reporte_por_aprendizLA/1" target="_blank" ><button class="btn btn-block btn-primary btn-xs"><i class="fa fa-file-text-o" aria-hidden="true"></i></button></a></td>
                      <td><a href="crear_reporte_por_aprendizLA/2" target="_blank" ><button class="btn btn-block btn-success btn-xs"><i class="fa fa-cloud-download" aria-hidden="true"></i></button></a></td>
                    </tr>
                    <tr>
                      <td>Reporte  Agendamiento</td>
                      <td><a href="crear_reporte_por_agendamientoLA/1" target="_blank" ><button class="btn btn-block btn-primary btn-xs"><i class="fa fa-file-text-o" aria-hidden="true"></i></button></a></td>
                      <td><a href="crear_reporte_por_agendamientoLA/2" target="_blank" ><button class="btn btn-block btn-success btn-xs"><i class="fa fa-cloud-download" aria-hidden="true"></i></button></a></td>
                    </tr>
                   <tr>
                      <td>Reporte  Visita</td>
                      <td><a href="crear_reporte_por_visitaLA/1" target="_blank" ><button class="btn btn-block btn-primary btn-xs"><i class="fa fa-file-text-o" aria-hidden="true"></i></button></a></td>
                      <td><a href="crear_reporte_por_visitaLA/2" target="_blank" ><button class="btn btn-block btn-success btn-xs"><i class="fa fa-cloud-download" aria-hidden="true"></i></button></a></td>
                    </tr>
                    <tr>
                      <td>Reporte  Empleado</td>
                      <td><a href="crear_reporte_por_empleadoLA/1" target="_blank" ><button class="btn btn-block btn-primary btn-xs"><i class="fa fa-file-text-o" aria-hidden="true"></i></button></a></td>
                      <td><a href="crear_reporte_por_empleadoLA/2" target="_blank" ><button class="btn btn-block btn-success btn-xs"><i class="fa fa-cloud-download" aria-hidden="true"></i></button></a></td>
                    </tr>
                    <tr>
                      <td>Reporte  Cantidad De Visitas</td>
                      <td><a href="crear_reporte_por_cantidad_visitasLA/1" target="_blank" ><button class="btn btn-block btn-primary btn-xs"><i class="fa fa-file-text-o" aria-hidden="true"></i></button></a></td>
                      <td><a href="crear_reporte_por_cantidad_visitasLA/2" target="_blank" ><button class="btn btn-block btn-success btn-xs"><i class="fa fa-cloud-download" aria-hidden="true"></i></button></a></td>
                    </tr>
                    <tr>
                      <td>Reporte  Por Cantidad Aprendices Por Ficha</td>
                      <td><a href="crear_reporte_por_cantidad_fichaLA/1" target="_blank" ><button class="btn btn-block btn-primary btn-xs"><i class="fa fa-file-text-o" aria-hidden="true"></i></button></a></td>
                      <td><a href="crear_reporte_por_cantidad_fichaLA/2" target="_blank" ><button class="btn btn-block btn-success btn-xs"><i class="fa fa-cloud-download" aria-hidden="true"></i></button></a></td>
                    </tr>
                    <tr>
                      <td>Reporte  Por Cantidad De Ambientes Por Entidad</td>
                      <td><a href="crear_reporte_por_cantidad_ambienteLA/1" target="_blank" ><button class="btn btn-block btn-primary btn-xs"><i class="fa fa-file-text-o" aria-hidden="true"></i></button></a></td>
                      <td><a href="crear_reporte_por_cantidad_ambienteLA/2" target="_blank" ><button class="btn btn-block btn-success btn-xs"><i class="fa fa-cloud-download" aria-hidden="true"></i></button></a></td>
                    </tr>
                    <tr>
                      <td>Acta</td>
                      <td><a href="crear_actaLA/1" target="_blank" ><button class="btn btn-block btn-primary btn-xs"><i class="fa fa-file-text-o" aria-hidden="true"></i></button></a></td>
                      <td><a href="crear_actaLA/2" target="_blank" ><button class="btn btn-block btn-success btn-xs"><i class="fa fa-cloud-download" aria-hidden="true"></i></button></a></td>
                    </tr>
                     <tr>
                      <td>Bitacora</td>
                      <td><a href="crear_bitacoraLA/1" target="_blank" ><button class="btn btn-block btn-primary btn-xs"><i class="fa fa-file-text-o" aria-hidden="true"></i></button></a></td>
                      <td><a href="crear_bitacoraLA/2" target="_blank" ><button class="btn btn-block btn-success btn-xs"><i class="fa fa-cloud-download" aria-hidden="true"></i></button></a></td>
                    </tr>
                  @endif
                  @if($roles->nombrerol =='Lider Articulacion') 
                    <tr>
                      <td>Reporte Por Ficha</td>
                      <td><a href="crear_reporte_por_ficha/1" target="_blank" ><button class="btn btn-block btn-primary btn-xs"><i class="fa fa-file-text-o" aria-hidden="true"></i></button></a></td>
                      <td><a href="crear_reporte_por_ficha/2" target="_blank" ><button class="btn btn-block btn-success btn-xs"><i class="fa fa-cloud-download" aria-hidden="true"></i></button></a></td>
                    </tr>
                    <tr>
                      <td>Reporte Ambiente</td>
                      <td><a href="crear_reporte_por_ambiente/1" target="_blank" ><button class="btn btn-block btn-primary btn-xs"><i class="fa fa-file-text-o" aria-hidden="true"></i></button></a></td>
                      <td><a href="crear_reporte_por_ambiente/2" target="_blank" ><button class="btn btn-block btn-success btn-xs"><i class="fa fa-cloud-download" aria-hidden="true"></i></button></a></td>
                    </tr>
                    <tr>
                      <td>Reporte  Aprendiz</td>
                      <td><a href="crear_reporte_por_aprendiz/1" target="_blank" ><button class="btn btn-block btn-primary btn-xs"><i class="fa fa-file-text-o" aria-hidden="true"></i></button></a></td>
                      <td><a href="crear_reporte_por_aprendiz/2" target="_blank" ><button class="btn btn-block btn-success btn-xs"><i class="fa fa-cloud-download" aria-hidden="true"></i></button></a></td>
                    </tr>
                    <tr>
                      <td>Reporte  Agendamiento</td>
                      <td><a href="crear_reporte_por_agendamiento/1" target="_blank" ><button class="btn btn-block btn-primary btn-xs"><i class="fa fa-file-text-o" aria-hidden="true"></i></button></a></td>
                      <td><a href="crear_reporte_por_agendamiento/2" target="_blank" ><button class="btn btn-block btn-success btn-xs"><i class="fa fa-cloud-download" aria-hidden="true"></i></button></a></td>
                    </tr>
                   <tr>
                      <td>Reporte  Visita</td>
                      <td><a href="crear_reporte_por_visita/1" target="_blank" ><button class="btn btn-block btn-primary btn-xs"><i class="fa fa-file-text-o" aria-hidden="true"></i></button></a></td>
                      <td><a href="crear_reporte_por_visita/2" target="_blank" ><button class="btn btn-block btn-success btn-xs"><i class="fa fa-cloud-download" aria-hidden="true"></i></button></a></td>
                    </tr>
                    <tr>
                      <td>Reporte  Empleado</td>
                      <td><a href="crear_reporte_por_empleado/1" target="_blank" ><button class="btn btn-block btn-primary btn-xs"><i class="fa fa-file-text-o" aria-hidden="true"></i></button></a></td>
                      <td><a href="crear_reporte_por_empleado/2" target="_blank" ><button class="btn btn-block btn-success btn-xs"><i class="fa fa-cloud-download" aria-hidden="true"></i></button></a></td>
                    </tr>
                    <tr>
                      <td>Reporte  Cantidad De Visitas</td>
                      <td><a href="crear_reporte_por_cantidad_visitas/1" target="_blank" ><button class="btn btn-block btn-primary btn-xs"><i class="fa fa-file-text-o" aria-hidden="true"></i></button></a></td>
                      <td><a href="crear_reporte_por_cantidad_visitas/2" target="_blank" ><button class="btn btn-block btn-success btn-xs"><i class="fa fa-cloud-download" aria-hidden="true"></i></button></a></td>
                    </tr>
                    <tr>
                      <td>Reporte  Por Cantidad Aprendices Por Ficha</td>
                      <td><a href="crear_reporte_por_cantidad_ficha/1" target="_blank" ><button class="btn btn-block btn-primary btn-xs"><i class="fa fa-file-text-o" aria-hidden="true"></i></button></a></td>
                      <td><a href="crear_reporte_por_cantidad_ficha/2" target="_blank" ><button class="btn btn-block btn-success btn-xs"><i class="fa fa-cloud-download" aria-hidden="true"></i></button></a></td>
                    </tr>
                    <tr>
                      <td>Reporte  Por Cantidad De Ambientes Por Entidad</td>
                      <td><a href="crear_reporte_por_cantidad_ambiente/1" target="_blank" ><button class="btn btn-block btn-primary btn-xs"><i class="fa fa-file-text-o" aria-hidden="true"></i></button></a></td>
                      <td><a href="crear_reporte_por_cantidad_ambiente/2" target="_blank" ><button class="btn btn-block btn-success btn-xs"><i class="fa fa-cloud-download" aria-hidden="true"></i></button></a></td>
                    </tr>
                    <tr>
                      <td>Acta</td>
                      <td><a href="crear_acta/1" target="_blank" ><button class="btn btn-block btn-primary btn-xs"><i class="fa fa-file-text-o" aria-hidden="true"></i></button></a></td>
                      <td><a href="crear_acta/2" target="_blank" ><button class="btn btn-block btn-success btn-xs"><i class="fa fa-cloud-download" aria-hidden="true"></i></button></a></td>
                    </tr>
                     <tr>
                      <td>Bitacora</td>
                      <td><a href="crear_bitacora/1" target="_blank" ><button class="btn btn-block btn-primary btn-xs"><i class="fa fa-file-text-o" aria-hidden="true"></i></button></a></td>
                      <td><a href="crear_bitacora/2" target="_blank" ><button class="btn btn-block btn-success btn-xs"><i class="fa fa-cloud-download" aria-hidden="true"></i></button></a></td>
                    </tr>
                  @endif

                  @if ($roles->nombrerol == 'Instructor') 
                    <tr>
                      <td>Reporte Por Ficha</td>
                      <td><a href="crear_reporte_por_fichaI/1" target="_blank" ><button class="btn btn-block btn-primary btn-xs"><i class="fa fa-file-text-o" aria-hidden="true"></i></button></a></td>
                      <td><a href="crear_reporte_por_fichaI/2" target="_blank" ><button class="btn btn-block btn-success btn-xs"><i class="fa fa-cloud-download" aria-hidden="true"></i></button></a></td>
                    </tr>
                    <tr>
                      <td>Reporte Ambiente</td>
                      <td><a href="crear_reporte_por_ambienteI/1" target="_blank" ><button class="btn btn-block btn-primary btn-xs"><i class="fa fa-file-text-o" aria-hidden="true"></i></button></a></td>
                      <td><a href="crear_reporte_por_ambienteI/2" target="_blank" ><button class="btn btn-block btn-success btn-xs"><i class="fa fa-cloud-download" aria-hidden="true"></i></button></a></td>
                    </tr>
                    <tr>
                      <td>Reporte  Aprendiz</td>
                      <td><a href="crear_reporte_por_aprendizI/1" target="_blank" ><button class="btn btn-block btn-primary btn-xs"><i class="fa fa-file-text-o" aria-hidden="true"></i></button></a></td>
                      <td><a href="crear_reporte_por_aprendizI/2" target="_blank" ><button class="btn btn-block btn-success btn-xs"><i class="fa fa-cloud-download" aria-hidden="true"></i></button></a></td>
                    </tr>
                    <tr>
                      <td>Reporte  Agendamiento</td>
                      <td><a href="crear_reporte_por_agendamientoI/1" target="_blank" ><button class="btn btn-block btn-primary btn-xs"><i class="fa fa-file-text-o" aria-hidden="true"></i></button></a></td>
                      <td><a href="crear_reporte_por_agendamientoI/2" target="_blank" ><button class="btn btn-block btn-success btn-xs"><i class="fa fa-cloud-download" aria-hidden="true"></i></button></a></td>
                    </tr>
                   <tr>
                      <td>Reporte  Visita</td>
                      <td><a href="crear_reporte_por_visitaI/1" target="_blank" ><button class="btn btn-block btn-primary btn-xs"><i class="fa fa-file-text-o" aria-hidden="true"></i></button></a></td>
                      <td><a href="crear_reporte_por_visitaI/2" target="_blank" ><button class="btn btn-block btn-success btn-xs"><i class="fa fa-cloud-download" aria-hidden="true"></i></button></a></td>
                    </tr>
                    <tr>
                      <td>Reporte  Empleado</td>
                      <td><a href="crear_reporte_por_empleadoI/1" target="_blank" ><button class="btn btn-block btn-primary btn-xs"><i class="fa fa-file-text-o" aria-hidden="true"></i></button></a></td>
                      <td><a href="crear_reporte_por_empleadoI/2" target="_blank" ><button class="btn btn-block btn-success btn-xs"><i class="fa fa-cloud-download" aria-hidden="true"></i></button></a></td>
                    </tr>
                    <tr>
                      <td>Reporte  Cantidad De Visitas</td>
                      <td><a href="crear_reporte_por_cantidad_visitasI/1" target="_blank" ><button class="btn btn-block btn-primary btn-xs"><i class="fa fa-file-text-o" aria-hidden="true"></i></button></a></td>
                      <td><a href="crear_reporte_por_cantidad_visitasI/2" target="_blank" ><button class="btn btn-block btn-success btn-xs"><i class="fa fa-cloud-download" aria-hidden="true"></i></button></a></td>
                    </tr>
                    <tr>
                      <td>Reporte  Por Cantidad Aprendices Por Ficha</td>
                      <td><a href="crear_reporte_por_cantidad_fichaI/1" target="_blank" ><button class="btn btn-block btn-primary btn-xs"><i class="fa fa-file-text-o" aria-hidden="true"></i></button></a></td>
                      <td><a href="crear_reporte_por_cantidad_fichaI/2" target="_blank" ><button class="btn btn-block btn-success btn-xs"><i class="fa fa-cloud-download" aria-hidden="true"></i></button></a></td>
                    </tr>
                    <tr>
                      <td>Reporte  Por Cantidad De Ambientes Por Entidad</td>
                      <td><a href="crear_reporte_por_cantidad_ambienteI/1" target="_blank" ><button class="btn btn-block btn-primary btn-xs"><i class="fa fa-file-text-o" aria-hidden="true"></i></button></a></td>
                      <td><a href="crear_reporte_por_cantidad_ambienteI/2" target="_blank" ><button class="btn btn-block btn-success btn-xs"><i class="fa fa-cloud-download" aria-hidden="true"></i></button></a></td>
                    </tr>
                    <tr>
                      <td>Acta</td>
                      <td><a href="crear_actaI/1" target="_blank" ><button class="btn btn-block btn-primary btn-xs"><i class="fa fa-file-text-o" aria-hidden="true"></i></button></a></td>
                      <td><a href="crear_actaI/2" target="_blank" ><button class="btn btn-block btn-success btn-xs"><i class="fa fa-cloud-download" aria-hidden="true"></i></button></a></td>
                    </tr>
                     <tr>
                      <td>Bitacora</td>
                      <td><a href="crear_bitacoraI/1" target="_blank" ><button class="btn btn-block btn-primary btn-xs"><i class="fa fa-file-text-o" aria-hidden="true"></i></button></a></td>
                      <td><a href="crear_bitacoraI/2" target="_blank" ><button class="btn btn-block btn-success btn-xs"><i class="fa fa-cloud-download" aria-hidden="true"></i></button></a></td>
                    </tr>
                  @endif
                  @if ($roles->nombrerol == 'Instructor Etapa Productiva') 
                    <tr>
                      <td>Reporte Por Ficha</td>
                      <td><a href="crear_reporte_por_fichaE/1" target="_blank" ><button class="btn btn-block btn-primary btn-xs"><i class="fa fa-file-text-o" aria-hidden="true"></i></button></a></td>
                      <td><a href="crear_reporte_por_fichaE/2" target="_blank" ><button class="btn btn-block btn-success btn-xs"><i class="fa fa-cloud-download" aria-hidden="true"></i></button></a></td>
                    </tr>
                    <tr>
                      <td>Reporte Ambiente</td>
                      <td><a href="crear_reporte_por_ambienteE/1" target="_blank" ><button class="btn btn-block btn-primary btn-xs"><i class="fa fa-file-text-o" aria-hidden="true"></i></button></a></td>
                      <td><a href="crear_reporte_por_ambienteE/2" target="_blank" ><button class="btn btn-block btn-success btn-xs"><i class="fa fa-cloud-download" aria-hidden="true"></i></button></a></td>
                    </tr>
                    <tr>
                      <td>Reporte  Aprendiz</td>
                      <td><a href="crear_reporte_por_aprendizE/1" target="_blank" ><button class="btn btn-block btn-primary btn-xs"><i class="fa fa-file-text-o" aria-hidden="true"></i></button></a></td>
                      <td><a href="crear_reporte_por_aprendizE/2" target="_blank" ><button class="btn btn-block btn-success btn-xs"><i class="fa fa-cloud-download" aria-hidden="true"></i></button></a></td>
                    </tr>
                    <tr>
                      <td>Reporte  Agendamiento</td>
                      <td><a href="crear_reporte_por_agendamientoE/1" target="_blank" ><button class="btn btn-block btn-primary btn-xs"><i class="fa fa-file-text-o" aria-hidden="true"></i></button></a></td>
                      <td><a href="crear_reporte_por_agendamientoE/2" target="_blank" ><button class="btn btn-block btn-success btn-xs"><i class="fa fa-cloud-download" aria-hidden="true"></i></button></a></td>
                    </tr>
                   <tr>
                      <td>Reporte  Visita</td>
                      <td><a href="crear_reporte_por_visitaE/1" target="_blank" ><button class="btn btn-block btn-primary btn-xs"><i class="fa fa-file-text-o" aria-hidden="true"></i></button></a></td>
                      <td><a href="crear_reporte_por_visitaE/2" target="_blank" ><button class="btn btn-block btn-success btn-xs"><i class="fa fa-cloud-download" aria-hidden="true"></i></button></a></td>
                    </tr>
                    <tr>
                      <td>Reporte  Empleado</td>
                      <td><a href="crear_reporte_por_empleadoE/1" target="_blank" ><button class="btn btn-block btn-primary btn-xs"><i class="fa fa-file-text-o" aria-hidden="true"></i></button></a></td>
                      <td><a href="crear_reporte_por_empleadoE/2" target="_blank" ><button class="btn btn-block btn-success btn-xs"><i class="fa fa-cloud-download" aria-hidden="true"></i></button></a></td>
                    </tr>
                    <tr>
                      <td>Reporte  Cantidad De Visitas</td>
                      <td><a href="crear_reporte_por_cantidad_visitasE/1" target="_blank" ><button class="btn btn-block btn-primary btn-xs"><i class="fa fa-file-text-o" aria-hidden="true"></i></button></a></td>
                      <td><a href="crear_reporte_por_cantidad_visitasE/2" target="_blank" ><button class="btn btn-block btn-success btn-xs"><i class="fa fa-cloud-download" aria-hidden="true"></i></button></a></td>
                    </tr>
                    <tr>
                      <td>Reporte  Por Cantidad Aprendices Por Ficha</td>
                      <td><a href="crear_reporte_por_cantidad_fichaE/1" target="_blank" ><button class="btn btn-block btn-primary btn-xs"><i class="fa fa-file-text-o" aria-hidden="true"></i></button></a></td>
                      <td><a href="crear_reporte_por_cantidad_fichaE/2" target="_blank" ><button class="btn btn-block btn-success btn-xs"><i class="fa fa-cloud-download" aria-hidden="true"></i></button></a></td>
                    </tr>
                    <tr>
                      <td>Reporte  Por Cantidad De Ambientes Por Entidad</td>
                      <td><a href="crear_reporte_por_cantidad_ambienteE/1" target="_blank" ><button class="btn btn-block btn-primary btn-xs"><i class="fa fa-file-text-o" aria-hidden="true"></i></button></a></td>
                      <td><a href="crear_reporte_por_cantidad_ambienteE/2" target="_blank" ><button class="btn btn-block btn-success btn-xs"><i class="fa fa-cloud-download" aria-hidden="true"></i></button></a></td>
                    </tr>
                    <tr>
                      <td>Acta</td>
                      <td><a href="crear_actaE/1" target="_blank" ><button class="btn btn-block btn-primary btn-xs"><i class="fa fa-file-text-o" aria-hidden="true"></i></button></a></td>
                      <td><a href="crear_actaE/2" target="_blank" ><button class="btn btn-block btn-success btn-xs"><i class="fa fa-cloud-download" aria-hidden="true"></i></button></a></td>
                    </tr>
                     <tr>
                      <td>Bitacora</td>
                      <td><a href="crear_bitacoraE/1" target="_blank" ><button class="btn btn-block btn-primary btn-xs"><i class="fa fa-file-text-o" aria-hidden="true"></i></button></a></td>
                      <td><a href="crear_bitacoraE/2" target="_blank" ><button class="btn btn-block btn-success btn-xs"><i class="fa fa-cloud-download" aria-hidden="true"></i></button></a></td>
                    </tr>
                  @endif  
                  </tbody>
                </table>   
              <div class"text-center">
              {!! $pdfs->links() !!}
              </div>
            </article>
          </div>
        </div>
      </section>
    </section>
  </section>
  @endforeach
@endsection


