@extends('layouts.app2')
@section('content')
<section class"container">
  <section class"row">
    <article class="col-md-8 col-md-offset-1">
      <div class="panel panel-default" >
        <div class="panel panel-heading"><center><h1>Crear Seguimiento</h1></center></div>
          <HR width=120% align="left">
          <div class="">      
				{!! Form::open(['route' => 'seguimiento.store','method' => 'post','novalidate'])!!}
				<section>
		            <div class="row">
		               <div class="col s6 col-half">
		                  <h4> {!! Form::label('archivoadjunto','Archivo',['class'=>'label'])!!}</h4>
		                   <div class="input-group input-group-icon">
		                  		{!! Form::file('archivoadjunto',null,['class' => 'form-control', 'onKeyUp' => 'validar(this)','required' => 'required'])!!}
		                      <div class="input-icon"><i class="fa fa-user"></i></div>                  
		                        <!--@if ($errors->has('archivoadjunto'))
		                            <span class="help-block">
		                                <strong>{{ $errors->first('archivoadjunto') }}</strong>
		                            </span>
		                        @endif-->
		                  </div>
		                </div> 
		                <div class="row">
		                  <div class="col s6 col-half" id="estado">
		                    <div class="input-group input-group-icon">
		                        <h4 >{!! Form::label('fkEstado', 'Estado',['class'=>'label']) !!}</h4>
		                          {!! Form::select('fkEstado',$estado, null, ['class' => 'input-lg', 'required' => 'required']) !!}
		                            @if ($errors->has('fkEstado'))
		                                  <span class="help-block">
		                                      <strong>{{ $errors->first('fkEstado') }}</strong>
		                                  </span>
		                            @endif
		                    </div>
		                </div>               
			              	<div class="col s6 col-half">
				               	 <div class=" input-group">
				                 	{!! Form::submit('Enviar',['class' => 'btn waves-effect waves-light'])!!}
				                 		 <a type="button" class="waves-effect waves-red btn-flat"href="{{ url('/seguimiento') }}">Volver</a>
				                </div>         
			              </div>
               	</section>
          <HR width=120% align="left">
        {!! Form::close()!!}
          </div>
        </div>
      </article>
    </section>
  </section>
@endsection