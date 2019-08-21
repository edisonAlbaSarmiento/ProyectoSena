@extends('layouts.app3')<!--Extendemos de nuestro layouts que es la vista principal-->
@section('content1')<!--creamos una seccion para mostrar lo que esta en la vista llamada content1-->
@foreach ($rolsEmpleado as $roles)<!--creamos una condicion para la validacion de vistas y tener la seguridad-->
<section class="container">
	<section class="row">
		<section class="col-md-8 col-md-offset-1">
			<section class="card-panel hoverable">
				<div class="panel panel-danger">
			  		<div class="panel-heading"><center><h3>Asistentes</h3></center></div>
			   			<div class="panel-body">
		   			@if ($roles->nombrerol == 'Lider Articulacion')<!--Se Hace un condicion para que se muestre si es el rol que me muestre lo correspondiente al rol y si no que siga con la condicion -->
						{!! Form::open(['route' => 'asistentes/search', 'method' => 'post', 'novalidate', 'class' => 'form-inline alto']) !!}<!--Me busca la ruta para que me pueda hacer el metodo de busca-->
						<article class="col s7">
						<!--Creamos los input para que se realice la busqueda-->
							<div class="input-group input-group-icon">
								<input type="text" class="input-lg" name="nombreasistente" placeholder="Buscar por Nombre Asistente"/>
								<div class="input-icon"><i class="fa fa-search" aria-hidden="true"></i></div>
							</div>
						</article>
						<article class="col s5">
						<!--Articulo Donde estan los botones-->
							<button type="submit" class="btn-floating btn-large waves-effect waves-light tooltipped"data-position="bottom" data-delay="50" data-tooltip="Buscar"><i class="fa fa-search" aria-hidden="true"></i></button>
							<a href="{{ route('asistentes.index') }}" class="btn-floating btn-large waves-effect waves-light tooltipped"data-position="bottom" data-delay="50" data-tooltip="Mostrar Todo"><i class="fa fa-list-alt" aria-hidden="true"></i></a>
							<a href="{{ route('asistentes.create') }}" class="btn-floating btn-large waves-effect waves-light tooltipped"data-position="bottom" data-delay="50" data-tooltip="Crear"><i class="fa fa-plus" aria-hidden="true"></i></a>	<a href="{{ url('/acta') }}" class="btn-floating btn-large  waves-effect waves-light amber darken-3 tooltipped"data-position="bottom" data-delay="50" data-tooltip="Listar Actas"><i class="fa fa-file-text" aria-hidden="true"></i></a>
						</article>
					@endif
					@if ($roles->nombrerol == 'Instructor Lider Area')<!--Se Hace un condicion para que se muestre si es el rol que me muestre lo correspondiente al rol y si no que siga con la condicion -->
						{!! Form::open(['route' => 'asistentesLA/search', 'method' => 'post', 'novalidate', 'class' => 'form-inline alto']) !!}<!--Me busca la ruta para que me pueda hacer el metodo de busca-->
						<article class="col s7">
						<!--Creamos los input para que se realice la busqueda-->
							<div class="input-group input-group-icon">
								<input type="text" class="input-lg" name="nombreasistente" placeholder="Buscar por Nombre Asistente"/>
								<div class="input-icon"><i class="fa fa-search" aria-hidden="true"></i></div>
							</div>
						</article>
						<article class="col s5">
						<!--Articulo Donde estan los botones-->
							<button type="submit" class="btn-floating btn-large waves-effect waves-light tooltipped"data-position="bottom" data-delay="50" data-tooltip="Buscar"><i class="fa fa-search" aria-hidden="true"></i></button>
							<a href="{{ route('asistentesLA.index') }}" class="btn-floating btn-large waves-effect waves-light tooltipped"data-position="bottom" data-delay="50" data-tooltip="Mostrar Todo"><i class="fa fa-list-alt" aria-hidden="true"></i></a>
							<a href="{{ route('asistentesLA.create') }}" class="btn-floating btn-large waves-effect waves-light tooltipped"data-position="bottom" data-delay="50" data-tooltip="Crear"><i class="fa fa-plus" aria-hidden="true"></i></a>	<a href="{{ url('/actaLA') }}" class="btn-floating btn-large  waves-effect waves-light amber darken-3 tooltipped"data-position="bottom" data-delay="50" data-tooltip="Listar Actas"><i class="fa fa-file-text" aria-hidden="true"></i></a>
						</article>
					@endif
					@if ($roles->nombrerol == 'Instructor')<!--Se Hace un condicion para que se muestre si es el rol que me muestre lo correspondiente al rol y si no que siga con la condicion -->
						{!! Form::open(['route' => 'asistentesI/search', 'method' => 'post', 'novalidate', 'class' => 'form-inline alto']) !!}<!--Me busca la ruta para que me pueda hacer el metodo de busca-->
						<article class="col s7">
						<!--Creamos los input para que se realice la busqueda-->
							<div class="input-group input-group-icon">
								<input type="text" class="input-lg" name="nombreasistente" placeholder="Buscar por Nombre Asistente"/>
								<div class="input-icon"><i class="fa fa-search" aria-hidden="true"></i></div>
							</div>
						</article>
						<article class="col s5">
						<!--Articulo Donde estan los botones-->
							<button type="submit" class="btn-floating btn-large waves-effect waves-light tooltipped"data-position="bottom" data-delay="50" data-tooltip="Buscar"><i class="fa fa-search" aria-hidden="true"></i></button>
							<a href="{{ route('asistentesI.index') }}" class="btn-floating btn-large waves-effect waves-light tooltipped"data-position="bottom" data-delay="50" data-tooltip="Mostrar Todo"><i class="fa fa-list-alt" aria-hidden="true"></i></a>
							<a href="{{ route('asistentesI.create') }}" class="btn-floating btn-large waves-effect waves-light tooltipped"data-position="bottom" data-delay="50" data-tooltip="Crear"><i class="fa fa-plus" aria-hidden="true"></i></a>	<a href="{{ url('/actaI') }}" class="btn-floating btn-large  waves-effect waves-light amber darken-3 tooltipped"data-position="bottom" data-delay="50" data-tooltip="Listar Actas"><i class="fa fa-file-text" aria-hidden="true"></i></a>
						</article>
					@endif
					@if ($roles->nombrerol == 'Instructor Etapa productiva')<!--Se Hace un condicion para que se muestre si es el rol que me muestre lo correspondiente al rol y si no que siga con la condicion -->
						{!! Form::open(['route' => 'asistentesE/search', 'method' => 'post', 'novalidate', 'class' => 'form-inline alto']) !!}<!--Me busca la ruta para que me pueda hacer el metodo de busca-->
						<article class="col s7">
						<!--Creamos los input para que se realice la busqueda-->
							<div class="input-group input-group-icon">
								<input type="text" class="input-lg" name="nombreasistente" placeholder="Buscar por Nombre Asistente"/>
								<div class="input-icon"><i class="fa fa-search" aria-hidden="true"></i></div>
							</div>
						</article>
						<article class="col s5">
						<!--Articulo Donde estan los botones-->
							<button type="submit" class="btn-floating btn-large waves-effect waves-light tooltipped"data-position="bottom" data-delay="50" data-tooltip="Buscar"><i class="fa fa-search" aria-hidden="true"></i></button>
							<a href="{{ route('asistentesE.index') }}" class="btn-floating btn-large waves-effect waves-light tooltipped"data-position="bottom" data-delay="50" data-tooltip="Mostrar Todo"><i class="fa fa-list-alt" aria-hidden="true"></i></a>
							<a href="{{ route('asistentesE.create') }}" class="btn-floating btn-large waves-effect waves-light tooltipped"data-position="bottom" data-delay="50" data-tooltip="Crear"><i class="fa fa-plus" aria-hidden="true"></i></a>	<a href="{{ url('/actaE') }}" class="btn-floating btn-large  waves-effect waves-light amber darken-3 tooltipped"data-position="bottom" data-delay="50" data-tooltip="Listar Actas"><i class="fa fa-file-text" aria-hidden="true"></i></a>
						</article>
					@endif
				{!! Form::close() !!}		
				<article class="form-group">
				<!--Creamos la tabla para que se muentren los datos-->
							<table class="bordered highlight responsive-table tabla">
									<tr>
									<!--th son los nombres que se van a mostrar-->
										<th>Codigo</th>
										<th>Nombre</th>
										<th>CargoDependenciaEntidad</th>
				            			<th>Acta</th>
										<th>Accion</th>
									</tr>
									<tbody>
										@foreach($asistente as $Asistente)<!--se crea una condicion para que me muestre las llaves foraneas y el paginamiento-->
										<tr>
											<td>{{ $Asistente->id}}</td>
			               				 	<td>{{ $Asistente->nombreasistente}}</td>
			    							<td>{{ $Asistente->cargodependenciaentidad}}</td>
			                				<td>{{ $Asistente->descripcion}}</td>
												<td>
												<!--se crea una condicion para las acciones de los respectivos roles-->	
												@if ($roles->nombrerol == 'Instructor Lider Area')
												<a href="{{route ('asistentesLA.edit',['id'=> $Asistente->id])}}" class="btn-floating
													waves-effect waves-light red tooltipped"data-position="right" data-delay="50" data-tooltip="Editar"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
											@endif
											</td>
											<td>
											@if ($roles->nombrerol == 'Instructor')
												<a href="{{route ('asistentesI.edit',['id'=> $Asistente->id])}}" class="btn-floating
													waves-effect waves-light red tooltipped"data-position="right" data-delay="50" data-tooltip="Editar"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
											@endif
											</td>
											<td>
											@if ($roles->nombrerol == 'Lider Articulacion')
												<a href="{{route ('asistentes.edit',['id'=> $Asistente->id])}}" class="btn-floating
													waves-effect waves-light red tooltipped"data-position="right" data-delay="50" data-tooltip="Editar"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
											@endif
											</td>
											<td>
											@if ($roles->nombrerol == 'Instructor Etapa Productiva')
												<a href="{{route ('asistentesE.edit',['id'=> $Asistente->id])}}" class="btn-floating
													waves-effect waves-light red tooltipped"data-position="right" data-delay="50" data-tooltip="Editar"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
											@endif
											</td>
										</tr>
										@endforeach
									</tbody>
							</table>
							<!--Me muestra la paginacion-->
							<div class"text-center">
							{!! $asistente->links() !!}
							</div>
						</article>
					</div>
				</div>
			</section>
		</section>
	</section>	
@endforeach
@endsection