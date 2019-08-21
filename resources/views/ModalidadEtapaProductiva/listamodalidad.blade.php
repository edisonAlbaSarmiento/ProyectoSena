@extends('layouts.app3')
@section('content1')
<section class="container">
	<section class="row">
		<section class="col-md-8 col-md-offset-1">
			<section class="card-panel hoverable">
					<div class="panel panel-danger">
					  <div class="panel-heading"><center><h3>Programa Formacion</h3></center></div>
					   <div class="panel-body">
					{!! Form::open(['route' => 'modalidadetapaproductiva/search', 'method' => 'post', 'novalidate', 'class' => 'form-inline alto']) !!}
					<article class="col s7">
						<div class="input-group input-group-icon">
							<input type="text" class="input-lg" name="nombremodalidad"/>
							<div class="input-icon"><i class="fa fa-search" aria-hidden="true"></i></div>
						</div>
					</article>
					<article class="col s5">
						<button type="submit" class="btn-floating btn-large waves-effect waves-light tooltipped"data-position="bottom" data-delay="50" data-tooltip="Buscar"><i class="fa fa-search" aria-hidden="true"></i></button>
						<a href="{{ route('modalidadetapaproductiva.index') }}" class="btn-floating btn-large waves-effect waves-light tooltipped"data-position="bottom" data-delay="50" data-tooltip="Mostrar Todo"><i class="fa fa-list-alt" aria-hidden="true"></i></a>
						<a href="{{ route('modalidadetapaproductiva.create') }}" class="btn-floating btn-large waves-effect waves-light tooltipped"data-position="bottom" data-delay="50" data-tooltip="Crear"><i class="fa fa-plus" aria-hidden="true"></i></a>
					</article>
				{!! Form::close() !!}		
				<article class="form-group">
					<table class="bordered highlight responsive-table tabla">
								<tr>
									<th>Nombre</th>
									<th>Descripcion</th>			
									<th>Accion</th>
								</tr>
								<tbody>
									@foreach($aprendizs as $Modalida)
								<tr>
		               				<td>{{ $Modalida->nombremodalidad}}</td>
		    						<td>{{ $Modalida->descripcion}}</td>
		    						<td>{{ $Modalida->Accion}}</td>
									<td>
										<a href="{{route ('modalidadetapaproductiva.edit',['id'=> $Modalida->id])}}" class="btn-floating
										waves-effect waves-light red tooltipped"data-position="right" data-delay="50" data-tooltip="Editar"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
									</td>
								</tr>
								@endforeach
							</tbody>
							</table>
							<div class"text-center">
							{!! $modalidadetapaproductiva->links() !!}
							</div>
						</article>
					</div>
				</div>
			</section>
		</section>
	</section>
@endsection