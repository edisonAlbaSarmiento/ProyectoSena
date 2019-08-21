@extends('layouts.app2')
@section('content')
	<section class"row">
		<article class="col-md-10 col-md-offset-1">
			<div class="panel panel-danger">
			<div class="panel-heading"> <h6>Modalidad Etapa Productiva</h6></div>
			 <div class="panel-body">
			    @if ($errors-> any())

          <div class="alert alert-danger" role="alert">
            <p> Corregir Errores</p>
            <ul>
              @foreach($errors->all() as $error)

              <li>{{ $error }}</li>

              @endforeach
            </ul>
            </div>
          @endif
			{!! Form::open(['route => 'modalidadetapaproductiva.store','method' => 'post','novalidate'])!!}
			<section class= "form-group">
				{!! Form::label('Nombre','Nombre')!!}
				{!! Form::text('Nombre',null,['class' => 'form-control','onKeyUp' => 'validar(this)', 'required' => 'required'])!!}
			</section>
			<section class= "form-group">
				{!! Form::label('Descripcion','Descripcion')!!}
				{!! Form::text('Descripcion',null,['class' => 'form-control','onKeyUp' => 'validar(this)', 'required' => 'required'])!!}
			</section>
			<section class= "form-group">
				{!! Form::submit('Enviar',['class' => 'btn btn-success'])!!}
			</section>
			{!! Form::close()!!}
			</div>
		</div>
		</article>
	</section>
</section>
@endsection
