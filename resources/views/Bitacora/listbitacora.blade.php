@extends('layouts.app3')<!--Extendemos de nuestro layouts que es la vista principal-->
@section('content1')<!--creamos una seccion para mostrar lo que esta en la vista llamada content1-->
@foreach ($Aprendiz as $aprendiz )<!--creamos una condicion para la validacion de vistas y tener la seguridad-->
	@if ($aprendiz->fkEstado == 1)<!--Se Hace un condicion para que se muestre si es el rol que me muestre lo correspondiente al rol y si no que siga con la condicion -->
	<section class="row">
		<section class="col-md-10 col-md-offset-1">
			<section class="card-panel hoverable">
		 	 	<div class="panel-heading"><center><h3>Bitacora</h3></center></div>
			   	<div class="panel-body">
				{!! Form::open(['route' => 'bitacoraA/search', 'method' => 'post', 'novalidate', 'class' => 'form-inline alto']) !!}<!--Me busca la ruta para que me pueda hacer el metodo de busca-->
				<article class="col s7">
				<!--Creamos los input para que se realice la busqueda-->
					<div class="input-group input-group-icon">
					<input type="text" class="form-control" name="nombreaprendiz"/>
					<div class="input-icon"><i class="fa fa-search" aria-hidden="true"></i></div>
				</div>
				</article>
				<article class="col s5">
				<!--Articulo Donde estan los botones-->
					<button type="submit" class="btn-floating btn-large waves-effect waves-light tooltipped"data-position="bottom" data-delay="50" data-tooltip="Buscar"><i class="fa fa-search" aria-hidden="true"></i></button>
					<a href="{{ route('bitacoraA.index') }}" class="btn-floating btn-large waves-effect waves-light tooltipped"data-position="bottom" data-delay="50" data-tooltip="Mostrar Todo"><i class="fa fa-list-alt" aria-hidden="true"></i></a>
					<a href="{{ route('bitacoraA.create') }}" class="btn-floating btn-large waves-effect waves-light tooltipped"data-position="bottom" data-delay="50" data-tooltip="Crear"><i class="fa fa-plus" aria-hidden="true"></i></a>
				</article>
				{!! Form::close() !!}
				<article class="form-group">
				<!--Creamos la tabla para que se muentren los datos-->
					<table class="bordered highlight responsive-table tabla">
						<tr>
						<!--th son los nombres que se van a mostrar-->
						    <th>Codigo</th>
							<th>Regional</th>
							<th>Centro</th>
							<th>Programa</th>
							<th>Ficha</th>
							<th>Nombre Aprendiz</th>
							<th>Apellido</th>
							<th>Tipo Documento</th>
							<th>Identificacion</th>
	                        <th>Telefono Aprendiz</th>
							<th>Correo</th>
	                        <th>Razon Social</th>
							<th>Direccion Empresa</th>
	                        <!--<th>Nit Empresa</th>
							<th>Cargo</th>
	                        <th>Nombre Reponsable</th>
							<th>Telefono Empresa</th>
							<th>Correo Empresa</th>
							<th>Archivoadjunto</th>-->
							<th>Accion</th>
						</tr>
						<tbody>
							@foreach($bitacora as $Bitacora)<!--se crea una condicion para que me muestre las llaves foraneas y el paginamiento-->
							<tr>
								<td>{{$Bitacora->id}}</td>
								<td>{{$Bitacora->regional}}</td>
								<td>{{$Bitacora->nombrecentro}}</td>
								<td>{{$Bitacora->nombreprograma}}</td>
								<td>{{$Bitacora->numero}}</td>
								<td>{{$Bitacora->nombreaprendiz}}</td>
								<td>{{$Bitacora->apellido}}</td>
								<td>{{$Bitacora->descripcion}}</td>
								<td>{{$Bitacora->identificacion}}</td>
								<td>{{$Bitacora->telefonoaprendiz}}</td>
								<td>{{$Bitacora->correo}}</td>
								<td>{{$Bitacora->razonsocial}}</td>
								<td>{{$Bitacora->direccionempresa}}</td>
								<td>{{$Bitacora->nombreempresa}}</td>
								<!--<td>{{$Bitacora->nit}}</td>
								<td>{{$Bitacora->cargo}}</td>
								<td>{{$Bitacora->nombreresponsable}}</td>
								<td>{{$Bitacora->telefonoempresa}}</td>
								<td>{{$Bitacora->emailempresa}}</td>
								<td>{{$Bitacora->archivoadjunto}}</td>-->
								<td>
								<a href="{{route ('bitacoraA.edit',['id'=> $Bitacora->id])}}" class="btn-floating
												waves-effect waves-light red tooltipped"data-position="right" data-delay="50" data-tooltip="Editar"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>			
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					<!--Me muestra la paginacion-->
					<div class"text-center">
						{!! $bitacora->links() !!}
					</div>
				</article>
			</div>
		</section>
	</section>
</section>
@endif
@endforeach
@endsection
	
		
