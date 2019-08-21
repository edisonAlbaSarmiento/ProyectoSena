@extends('layouts.app3')
@section('content1')
@foreach ($rolsEmpleado as $roles) 
<section class="container">
	<section class="row">
		<section class="col-md-8 col-md-offset-1">
			<section class="card-panel hoverable">
					<div class="panel panel-danger">
					  <div class="panel-heading"><center><h3>Invitados</h3></center></div>
					   <div class="panel-body">
					   @if ($roles->nombrerol == 'Lider Articulacion')
					{!! Form::open(['route' => 'invitados/search', 'method' => 'post', 'novalidate', 'class' => 'form-inline alto']) !!}
					<article class="col s7">
						<div class="input-group input-group-icon">
							<input type="text" class="input-lg" name="nombreinvitado" placeholder="Buscar Nombre Invitado " />
							<div class="input-icon"><i class="fa fa-search" aria-hidden="true"></i></div>
						</div>
					</article>
					<article class="col s5">
						<button type="submit" class="btn-floating btn-large waves-effect waves-light tooltipped"data-position="bottom" data-delay="50" data-tooltip="Buscar"><i class="fa fa-search" aria-hidden="true"></i></button>
						<a href="{{ route('invitados.index') }}" class="btn-floating btn-large waves-effect waves-light tooltipped"data-position="bottom" data-delay="50" data-tooltip="Mostrar Todo"><i class="fa fa-list-alt" aria-hidden="true"></i></a>
						<a href="{{ route('invitados.create') }}" class="btn-floating btn-large waves-effect waves-light tooltipped"data-position="bottom" data-delay="50" data-tooltip="Crear"><i class="fa fa-plus" aria-hidden="true"></i></a>
						<a href="{{ url('/acta') }}" class="btn-floating btn-large  waves-effect waves-light amber darken-3 tooltipped"data-position="bottom" data-delay="50" data-tooltip="Listar Actas"><i class="fa fa-file-text" aria-hidden="true"></i></a>
					</article>
					@endif
					@if ($roles->nombrerol == 'Instructor Lider Area')
					{!! Form::open(['route' => 'invitadosLA/search', 'method' => 'post', 'novalidate', 'class' => 'form-inline alto']) !!}
					<article class="col s7">
						<div class="input-group input-group-icon">
							<input type="text" class="input-lg" name="nombreinvitado" placeholder="Buscar Nombre Invitado " />
							<div class="input-icon"><i class="fa fa-search" aria-hidden="true"></i></div>
						</div>
					</article>
					<article class="col s5">
						<button type="submit" class="btn-floating btn-large waves-effect waves-light tooltipped"data-position="bottom" data-delay="50" data-tooltip="Buscar"><i class="fa fa-search" aria-hidden="true"></i></button>
						<a href="{{ route('invitadosLA.index') }}" class="btn-floating btn-large waves-effect waves-light tooltipped"data-position="bottom" data-delay="50" data-tooltip="Mostrar Todo"><i class="fa fa-list-alt" aria-hidden="true"></i></a>
						<a href="{{ route('invitadosLA.create') }}" class="btn-floating btn-large waves-effect waves-light tooltipped"data-position="bottom" data-delay="50" data-tooltip="Crear"><i class="fa fa-plus" aria-hidden="true"></i></a>
						<a href="{{ url('/actaLA') }}" class="btn-floating btn-large waves-effect waves-light darken-3 tooltipped"data-position="bottom" data-delay="50" data-tooltip="Listar Actas"><i class="fa fa-file-text" aria-hidden="true"></i></a>
					</article>
					@endif
					@if ($roles->nombrerol == 'Instructor')
					{!! Form::open(['route' => 'invitadosI/search', 'method' => 'post', 'novalidate', 'class' => 'form-inline alto']) !!}
					<article class="col s7">
						<div class="input-group input-group-icon">
							<input type="text" class="input-lg" name="nombreinvitado" placeholder="Buscar Nombre Invitado " />
							<div class="input-icon"><i class="fa fa-search" aria-hidden="true"></i></div>
						</div>
					</article>
					<article class="col s5">
						<button type="submit" class="btn-floating btn-large waves-effect waves-light tooltipped"data-position="bottom" data-delay="50" data-tooltip="Buscar"><i class="fa fa-search" aria-hidden="true"></i></button>
						<a href="{{ route('invitadosI.index') }}" class="btn-floating btn-large waves-effect waves-light tooltipped"data-position="bottom" data-delay="50" data-tooltip="Mostrar Todo"><i class="fa fa-list-alt" aria-hidden="true"></i></a>
						<a href="{{ route('invitadosI.create') }}" class="btn-floating btn-large waves-effect waves-light tooltipped"data-position="bottom" data-delay="50" data-tooltip="Crear"><i class="fa fa-plus" aria-hidden="true"></i></a>
						<a href="{{ url('/actaI') }}" class="btn-floating btn-large waves-effect waves-light darken-3 tooltipped"data-position="bottom" data-delay="50" data-tooltip="Listar Actas"><i class="fa fa-file-text" aria-hidden="true"></i></a>
					</article>
					@endif
					@if ($roles->nombrerol == 'Instructor Etapa Productiva')
					{!! Form::open(['route' => 'invitadosE/search', 'method' => 'post', 'novalidate', 'class' => 'form-inline alto']) !!}
					<article class="col s7">
						<div class="input-group input-group-icon">
							<input type="text" class="input-lg" name="nombreinvitado" placeholder="Buscar Nombre Invitado " />
							<div class="input-icon"><i class="fa fa-search" aria-hidden="true"></i></div>
						</div>
					</article>
					<article class="col s5">
						<button type="submit" class="btn-floating btn-large waves-effect waves-light tooltipped"data-position="bottom" data-delay="50" data-tooltip="Buscar"><i class="fa fa-search" aria-hidden="true"></i></button>
						<a href="{{ route('invitadosE.index') }}" class="btn-floating btn-large waves-effect waves-light tooltipped"data-position="bottom" data-delay="50" data-tooltip="Mostrar Todo"><i class="fa fa-list-alt" aria-hidden="true"></i></a>
						<a href="{{ route('invitadosE.create') }}" class="btn-floating btn-large waves-effect waves-light tooltipped"data-position="bottom" data-delay="50" data-tooltip="Crear"><i class="fa fa-plus" aria-hidden="true"></i></a>
						<a href="{{ url('/actaE') }}" class="btn-floating orange btn-large waves-effect waves-light darken-3 tooltipped"data-position="bottom" data-delay="50" data-tooltip="Listar Actas"><i class="fa fa-file-text" aria-hidden="true"></i></a>
					</article>
					@endif
				{!! Form::close() !!}		
				<article class="form-group">
					<table class="bordered highlight responsive-table tabla">
							<tr>
								<th>Codigo</th>
								<th>Nombre</th>
								<th>Cargo</th>
								<th>Entidad</th>
								<th>Acta</th>
								<th>Accion</th>
							</tr>
						<tbody>
							@foreach($invitado as $Invitado)
								<tr>
									<td>{{ $Invitado->id}}</td>
	                				<td>{{ $Invitado->nombreinvitado}}</td>
		    						<td>{{ $Invitado->cargo}}</td>
		    						<td>{{ $Invitado->entidad}}</td>
		    						<td>{{ $Invitado->descripcion}}</td>								
									<td>
											@if ($roles->nombrerol == 'Instructor Lider Area')
												<a href="{{route ('invitadosLA.edit',['id'=> $Invitado->id])}}" class="btn-floating
												waves-effect waves-light red tooltipped"data-position="right" data-delay="50" data-tooltip="Editar"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>					
											@endif
											</td>
											<td>
											@if ($roles->nombrerol == 'Instructor')
												<a href="{{route ('invitadosI.edit',['id'=> $Invitado->id])}}" class="btn-floating
												waves-effect waves-light red tooltipped"data-position="right" data-delay="50" data-tooltip="Editar"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
											@endif
											</td>
											<td>
											@if ($roles->nombrerol == 'Lider Articulacion')
												<a href="{{route ('invitados.edit',['id'=> $Invitado->id])}}" class="btn-floating
												waves-effect waves-light red tooltipped"data-position="right" data-delay="50" data-tooltip="Editar"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
											@endif
											</td>
											<td>
											@if ($roles->nombrerol == 'Instructor Etapa Productiva')
												<a href="{{route ('invitadosE.edit',['id'=> $Invitado->id])}}" class="btn-floating
												waves-effect waves-light red tooltipped"data-position="right" data-delay="50" data-tooltip="Editar"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
											@endif
											</td>
									</td>
								</tr>
								@endforeach
							</tbody>
							</table>
							<div class"text-center">
							{!! $invitado->links() !!}
							</div>
						</article>
					</div>
				</div>
			</section>
		</section>
	</section>
	
@endforeach
@endsection
