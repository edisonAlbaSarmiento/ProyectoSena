@extends('layouts.app3')<!--Extendemos de nuestro layouts que es la vista principal-->
@section('content1')<!--creamos una seccion para mostrar lo que esta en la vista llamada content1-->
@foreach ($rolsEmpleado as $roles) <!--creamos una condicion para la validacion de vistas y tener la seguridad-->

<section class="container">
	<section class="row">
		<section class="col-md-8 col-md-offset-1">
			<section class="card-panel hoverable">
					<div class="panel panel-danger">
					  <div class="panel-heading"><center><h3>Programa Formacion</h3></center></div>
					   <div class="panel-body">
					   @if ($roles->nombrerol == 'Instructor Lider Area')<!--Se Hace un condicion para que se muestre si es el rol que me muestre lo correspondiente al rol y si no que siga con la condicion -->
					{!! Form::open(['route' => 'programaformacionLA/search', 'method' => 'post', 'novalidate', 'class' => 'form-inline alto']) !!}<!--Me busca la ruta para que me pueda hacer el metodo de busca-->
					<article class="col s7">
						<div class="input-group input-group-icon">
							<input type="text" class="input-lg" name="nombreprograma" placeholder="Bucar Por Nombre Programa" />
							<div class="input-icon"><i class="fa fa-search" aria-hidden="true"></i></div>
						</div>
					</article>
					<article class="col s5">
						<button type="submit" class="btn-floating btn-large waves-effect waves-light tooltipped"data-position="bottom" data-delay="50" data-tooltip="Buscar"><i class="fa fa-search" aria-hidden="true"></i></button>
						<a href="{{ route('programaformacionLA.index') }}" class="btn-floating btn-large waves-effect waves-light tooltipped"data-position="bottom" data-delay="50" data-tooltip="Mostrar Todo"><i class="fa fa-list-alt" aria-hidden="true"></i></a>
					</article>
					@endif
					@if ($roles->nombrerol == 'Instructor')<!--Se Hace un condicion para que se muestre si es el rol que me muestre lo correspondiente al rol y si no que siga con la condicion -->
					{!! Form::open(['route' => 'programaformacionI/search', 'method' => 'post', 'novalidate', 'class' => 'form-inline alto']) !!}<!--Me busca la ruta para que me pueda hacer el metodo de busca-->
					<article class="col s7">
						<div class="input-group input-group-icon">
							<input type="text" class="input-lg" name="nombreprograma" placeholder="Bucar Por Nombre Programa"/>
							<div class="input-icon"><i class="fa fa-search" aria-hidden="true"></i></div>
						</div>
					</article>
					<article class="col s5">
						<button type="submit" class="btn-floating btn-large waves-effect waves-light tooltipped"data-position="bottom" data-delay="50" data-tooltip="Buscar"><i class="fa fa-search" aria-hidden="true"></i></button>
						<a href="{{ route('programaformacionI.index') }}" class="btn-floating btn-large waves-effect waves-light tooltipped"data-position="bottom" data-delay="50" data-tooltip="Mostrar Todo"><i class="fa fa-list-alt" aria-hidden="true"></i></a>
					</article>
					@endif
					@if ($roles->nombrerol == 'Lider Articulacion')<!--Se Hace un condicion para que se muestre si es el rol que me muestre lo correspondiente al rol y si no que siga con la condicion -->
					{!! Form::open(['route' => 'programaformacion/search', 'method' => 'post', 'novalidate', 'class' => 'form-inline alto']) !!}<!--Me busca la ruta para que me pueda hacer el metodo de busca-->
					<article class="col s7">
					<!--Creamos los input para que se realice la busqueda-->
						<div class="input-group input-group-icon">
							<input type="text" class="input-lg" name="nombreprograma" placeholder="Bucar Por Nombre Programa" />
							<div class="input-icon"><i class="fa fa-search" aria-hidden="true"></i></div>
						</div>
					</article>
					<article class="col s5">
					<!--Articulo Donde estan los botones-->
						<button type="submit" class="btn-floating btn-large waves-effect waves-light tooltipped"data-position="bottom" data-delay="50" data-tooltip="Buscar"><i class="fa fa-search" aria-hidden="true"></i></button>
						<a href="{{ route('programaformacion.index') }}" class="btn-floating btn-large waves-effect waves-light tooltipped"data-position="bottom" data-delay="50" data-tooltip="Mostrar Todo"><i class="fa fa-list-alt" aria-hidden="true"></i></a>
						<a href="{{ route('programaformacion.create') }}" class="btn-floating btn-large waves-effect waves-light tooltipped"data-position="bottom" data-delay="50" data-tooltip="Crear"><i class="fa fa-plus" aria-hidden="true"></i></a>
					</article>
					@endif
				{!! Form::close() !!}		
				<article class="form-group">
				<!--Creamos la tabla para que se muentren los datos-->
					<table class="bordered highlight responsive-table tabla">
								<tr>
								<!--th son los nombres que se van a mostrar-->
									<th>Nombre</th>
									<th>Descripcion</th>
									<th>Area</th>
									<th>Grado Formacion</th>
									<th>Estado</th>
									<!--<th>Accion</th>-->
								</tr>
								<tbody>
									@foreach( $programaformacion as $Programaformacion)<!--se crea una condicion para que me muestre las llaves foraneas y el paginamiento-->
								<tr>

		                			<td>{{ $Programaformacion->nombreprograma}}</td>
		    						<td>{{ $Programaformacion->descripcion}}</td>
		    						<td>{{ $Programaformacion->nombrearea}}</td>
		    						<td>{{ $Programaformacion->codigo}}</td>
		    						<td>{{ $Programaformacion->nombreestado}}</td>
		    						<td>
		    						<!--se crea una condicion para las acciones del respectivo rol-->	
									@if ($roles->nombrerol == 'Lider Articulacion')
										<a href="{{route ('programaformacion.edit',['id'=> $Programaformacion->id])}}" class="btn-floating
            							waves-effect waves-light red tooltipped"data-position="right" data-delay="50" data-tooltip="Editar"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
									@endif
									</td>
									
								</tr>
								@endforeach
							</tbody>
							</table>
							<!--Me muestra la paginacion-->
							<div class"text-center">
							{!! $programaformacion->links() !!}
							</div>
						</article>
					</div>
				</div>
			</section>
		</section>
	</section>
@endforeach
@endsection