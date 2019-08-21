@extends('layouts.app3')<!--Extendemos de nuestro layouts que es la vista principal-->
@section('content1')<!--creamos una seccion para mostrar lo que esta en la vista llamada content1-->
@foreach ($rolsEmpleado as $roles)<!--creamos una condicion para la validacion de vistas y tener la seguridad-->
<section class="container">
	<section class="row">
		<section class="col-md-8 col-md-offset-1">
			<section class="card-panel hoverable">
					<div class="panel panel-danger">
					  <div class="panel-heading"><center><h3>Agenda</h3></center></div>
					   <div class="panel-body">
					   @if ($roles->nombrerol == 'Instructor Lider Area')<!--Se Hace un condicion para que se muestre si es el rol que me muestre lo correspondiente al rol y si no que siga con la condicion -->
						{!! Form::open(['route' => 'agendaLA/search', 'method' => 'post','novalidate','class' => 'form-inline alto']) !!}<!--Me busca la ruta para que me pueda hacer el metodo de busca-->
						<article class="col s7">
						<div class="input-group input-group-icon">
							<input type="text" class="input-lg" name="fechaasignacion" placeholder="Buscar Por Fecha"/>
							<div class="input-icon"><i class="fa fa-search" aria-hidden="true"></i></div>
						</div>
					</article>
					<article class="col s5">
						<button type="submit" class="btn-floating btn-large waves-effect waves-light tooltipped"data-position="bottom" data-delay="50" data-tooltip="Buscar"><i class="fa fa-search" aria-hidden="true"></i></button>
						<a href="{{ route('agendaLA.index') }}" class="btn-floating btn-large waves-effect waves-light tooltipped"data-position="bottom" data-delay="50" data-tooltip="Mostrar Todo"><i class="fa fa-list-alt" aria-hidden="true"></i></a>
						<a href="{{ route('agendaLA.create') }}" class="btn-floating btn-large waves-effect waves-light tooltipped " data-position="bottom" data-delay="50" data-tooltip="Crear"><i class="fa fa-plus" aria-hidden="true"></i></a>
					</article>
					@endif
					@if ($roles->nombrerol == 'Instructor Etapa Productiva')<!--Se Hace un condicion para que se muestre si es el rol que me muestre lo correspondiente al rol y si no que siga con la condicion -->
						{!! Form::open(['route' => 'agendaE/search', 'method' => 'post','novalidate','class' => 'form-inline alto']) !!}<!--Me busca la ruta para que me pueda hacer el metodo de busca-->
						<article class="col s7">
						<!--Creamos los input para que se realice la busqueda-->
						<div class="input-group input-group-icon">
							<input type="text" class="input-lg" name="fechaasignacion" placeholder="Buscar Por Fecha"/>
							<div class="input-icon"><i class="fa fa-search" aria-hidden="true"></i></div>
						</div>
					</article>
					<article class="col s5">
						<!--Articulo Donde estan los botones-->
						<button type="submit" class="btn-floating btn-large waves-effect waves-light tooltipped"data-position="bottom" data-delay="50" data-tooltip="Buscar"><i class="fa fa-search" aria-hidden="true"></i></button>
						<a href="{{ route('agendaE.index') }}" class="btn-floating btn-large waves-effect waves-light tooltipped"data-position="bottom" data-delay="50" data-tooltip="Mostrar Todo"><i class="fa fa-list-alt" aria-hidden="true"></i></a>
						<a href="{{ route('agendaE.create') }}" class="btn-floating btn-large waves-effect waves-light tooltipped " data-position="bottom" data-delay="50" data-tooltip="Crear"><i class="fa fa-plus" aria-hidden="true"></i></a>
					</article>
					@endif
					@if ($roles->nombrerol == 'Instructor')<!--Se Hace un condicion para que se muestre si es el rol que me muestre lo correspondiente al rol y si no que siga con la condicion -->
						{!! Form::open(['route' => 'agendaI/search', 'method' => 'post','novalidate','class' => 'form-inline alto']) !!}<!--Me busca la ruta para que me pueda hacer el metodo de busca-->
						<article class="col s7">
						<!--Creamos los input para que se realice la busqueda-->
						<div class="input-group input-group-icon">
							<input type="text" class="input-lg" name="fechaasignacion" placeholder="Buscar Por Fecha"/>
							<div class="input-icon"><i class="fa fa-search" aria-hidden="true"></i></div>
						</div>
					</article>
					<article class="col s5">
					<!--Articulo Donde estan los botones-->
						<button type="submit" class="btn-floating btn-large waves-effect waves-light tooltipped"data-position="bottom" data-delay="50" data-tooltip="Buscar"><i class="fa fa-search" aria-hidden="true"></i></button>
						<a href="{{ route('agendaI.index') }}" class="btn-floating btn-large waves-effect waves-light tooltipped"data-position="bottom" data-delay="50" data-tooltip="Mostrar Todo"><i class="fa fa-list-alt" aria-hidden="true"></i></a>
						<a href="{{ route('agendaI.create') }}" class="btn-floating btn-large waves-effect waves-light tooltipped " data-position="bottom" data-delay="50" data-tooltip="Crear"><i class="fa fa-plus" aria-hidden="true"></i></a>
					</article>
					@endif
					@if ($roles->nombrerol == 'Lider Articulacion')<!--Se Hace un condicion para que se muestre si es el rol que me muestre lo correspondiente al rol y si no que siga con la condicion -->
						{!! Form::open(['route' => 'agenda/search', 'method' => 'post','novalidate','class' => 'form-inline alto']) !!}<!--Me busca la ruta para que me pueda hacer el metodo de busca-->
						<article class="col s7">
						<!--Creamos los input para que se realice la busqueda-->
						<div class="input-group input-group-icon">
							<input type="text" class="input-lg" name="fechaasignacion" placeholder="Buscar Por Fecha"/>
							<div class="input-icon"><i class="fa fa-search" aria-hidden="true"></i></div>
						</div>
					</article>
					<article class="col s5">
					<!--Articulo Donde estan los botones-->
						<button type="submit" class="btn-floating btn-large waves-effect waves-light tooltipped"data-position="bottom" data-delay="50" data-tooltip="Buscar"><i class="fa fa-search" aria-hidden="true"></i></button>
						<a href="{{ route('agenda.index') }}" class="btn-floating btn-large waves-effect waves-light tooltipped"data-position="bottom" data-delay="50" data-tooltip="Mostrar Todo"><i class="fa fa-list-alt" aria-hidden="true"></i></a>
						<a href="{{ route('agenda.create') }}" class="btn-floating btn-large waves-effect waves-light tooltipped " data-position="bottom" data-delay="50" data-tooltip="Crear"><i class="fa fa-plus" aria-hidden="true"></i></a>
					</article>
					@endif
				{!! Form::close() !!}		
				<article class="form-group">
				<!--Creamos la tabla para que se muentren los datos-->
					<table class="responsive-table bordered highlight">
								<tr>
								<!--th son los nombres que se van a mostrar-->
									<th>Codigo</th>
									<th>Titulo</th>
									<th>Fecha Asignacion</th>
									<th>Fecha Realizacion</th>
									<th>Hora</th>
									<th>Entidad</th>
									<th>Empleado</th>
									<th>Estado</th>
									<th>Accion</th>
								</tr>
								<tbody>
								@foreach($agenda as $Agenda)<!--se crea una condicion para que me muestre las llaves foraneas y el paginamiento-->
								<tr>
									<td>{{$Agenda->id}}</td>
									<td>{{$Agenda->titulo}}</td>
									<td>{{$Agenda->fechaasignacion}}</td>
									<td>{{$Agenda->fecharealizacion}}</td>
									<td>{{$Agenda->hora}}</td>
									<td>{{$Agenda->nombreentidad}}</td>
									<td>{{$Agenda->nombreempleado}}</td>
									<td>{{$Agenda->nombreestado}}</td>
									<td>
									<!--se crea una condicion para las acciones de los respectivos roles-->
									@if ($roles->nombrerol == 'Instructor Lider Area')
										<a href="{{route ('agendaLA.edit',['id'=> $Agenda->id])}}" class="btn-floating
										waves-effect waves-light red tooltipped"data-position="right" data-delay="50" data-tooltip="Editar"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
									@endif
									@if ($roles->nombrerol == 'Instructor Etapa Productiva')
									<a href="{{route ('agendaE.edit',['id'=> $Agenda->id])}}" class="btn-floating
										waves-effect waves-light red tooltipped"data-position="right" data-delay="50" data-tooltip="Editar"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
									@endif
									@if ($roles->nombrerol == 'Instructor')
									<a href="{{route ('agendaI.edit',['id'=> $Agenda->id])}}" class="btn-floating waves-effect waves-light red tooltipped" data-position="right" data-delay="50" data-tooltip="Editar"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
									@endif
									@if ($roles->nombrerol == 'Lider Articulacion')
									<a href="{{route ('agenda.edit',['id'=> $Agenda->id])}}" class="btn-floating
										waves-effect waves-light red tooltipped"data-position="right" data-delay="50" data-tooltip="Editar"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
									@endif
									</td>
								</tr>
								@endforeach
								</tbody>
							</table>
							<!--Me muestra la paginacion-->
							<div class"text-center">
							{!! $agenda->links() !!}
							</div>
						</article>
					</div>
			</div>
		</section>
	</section>
</section>

@endforeach
@endsection