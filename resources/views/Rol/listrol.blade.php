@extends('home')<!--Extendemos de nuestro home que es la vista principal-->
@section('content1')<!--creamos una seccion para mostrar lo que esta en la vista llamada content1-->
<section class="container">
	<section class="row">
		<section class="col-md-8 col-md-offset-1">
			<section class="card-panel hoverable">
					<div class="panel panel-danger">
					  <div class="panel-heading"><center><h3>Rol</h3></center></div>
					   <div class="panel-body">
						{!! Form::open(['route' => 'rol/search', 'method' => 'post','novalidate','class' => 'form-inline alto']) !!}<!--Me busca la ruta para que me pueda hacer el metodo de busca-->
					<article class="col s7">
					<!--Creamos los input para que se realice la busqueda-->
						<div class="input-group input-group-icon">
							<input type="text" class="input-lg" name="nombrerol"/>
							<div class="input-icon"><i class="fa fa-search" aria-hidden="true"></i></div>
						</div>
					</article>
				<article class="col s5">
				<!--Articulo Donde estan los botones-->
						<button type="submit" class="btn-floating btn-large waves-effect waves-light tooltipped"data-position="bottom" data-delay="50" data-tooltip="Buscar"><i class="fa fa-search" aria-hidden="true"></i></button>
						<a href="{{ route('rol.index') }}" class="btn-floating btn-large waves-effect waves-light tooltipped"data-position="bottom" data-delay="50" data-tooltip="Mostrar Todo"><i class="fa fa-list-alt" aria-hidden="true"></i></a>
						<a href="{{ route('rol.create') }}" class="btn-floating btn-large waves-effect waves-light tooltipped"data-position="bottom" data-delay="50" data-tooltip="Crear"><i class="fa fa-plus" aria-hidden="true"></i></a>
					</article>
				{!! Form::close() !!}		
				<article class="form-group">
				<!--Creamos la tabla para que se muentren los datos-->
						<table class="bordered highlight responsive-table tabla">
								<tr>
								<!--th son los nombres que se van a mostrar-->
									<th>Codigo</th>
									<th>Nombre</th>
									<th>Accion</th>
								</tr>
									<tbody>
										@foreach($rol as $Rol)<!--se crea una condicion para que me muestre las llaves foraneas y el paginamiento-->
										<tr>
											<td>{{$Rol->id}}</td>
											<td>{{$Rol->nombrerol}}</td>
											<td>
												<a href="{{route ('rol.edit',['id'=> $Rol->id])}}" class="btn-floating
												waves-effect waves-light red tooltipped"data-position="right" data-delay="50" data-tooltip="Editar"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
											</td>
										</tr>
										@endforeach
									</tbody>
							</table>
							<!--Me muestra la paginacion-->
							<div class"text-center">
							{!! $rol->links() !!}
							</div>
						</article>
					</div>
				</div>
			</section>
		</section>
	</section>
@endsection