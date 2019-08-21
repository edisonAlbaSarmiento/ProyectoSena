@extends('layouts.app2')
@section('content')
<section class"container">
  <section class"row">
    <article class="col-md-8 col-md-offset-1">
      <div class="card-panel1 hoverable1" >
        <div class="panel panel-heading"><center><h1>Crear Ambiente</h1></center></div>
          <HR width=100% align="left">
          {!! Form::open(['route' => 'ambiente.store','method' => 'post','novalidate'])!!} 
        	 <section>
	            <div class="row">
	               <div class="col s5 col-half">
	                  <h4>{!! Form::label('full_name','Nombre Ambiente',['class'=>'label'])!!}</h4>
	                  <div class="input-group input-group-icon">
	                     	{!! Form::text('nombreambiente',null,['class' => 'input-lg','onKeyUp' => 'validar(this)', 'required' => 'required','onkeypress' =>'return Validacionletras(event)'])!!}
	                      <div class="input-icon"><i class="fa fa-user"></i></div>
	                      @if ($errors->has('nombreambiente'))
	                          <span class="help-block">
	                              <strong>{{ $errors->first('nombreambiente') }}</strong>
	                          </span>
	                      @endif
	                  </div>
	                </div>          
	              </div>
	           	<div class="row">
	                <div class=" col s6 col-half">
	                      <div class="input-group input-group-icon">	
	                        <h4> {!! Form::label('fkEstado', 'Estado',['class'=>'label']) !!}</h4>
	                          {!! Form::select('fkEstado',$estado, null, ['class' => 'input-lg','onKeyUp' => 'validar(this)', 'required' => 'required']) !!}
	                          @if ($errors->has('fkEstado'))
	                              <span class="help-block">
	                                  <strong>{{ $errors->first('fkEstado') }}</strong>
	                              </span>
	                          @endif
	                    </div>
	                </div>
	                <div class=" col s6 col-half">
	                   	<div class="input-group input-group-icon">	
	                        <h4> {!! Form::label('fkEntidad', 'Entidad',['class'=>'label']) !!}</h4>
	                          {!! Form::select('fkEntidad',$entidad, null, ['class' => 'input-lg','onKeyUp' => 'validar(this)', 'required' => 'required']) !!}
	                          @if ($errors->has('fkEntidad'))
	                              <span class="help-block">
	                                  <strong>{{ $errors->first('fkEntidad') }}</strong>
	                              </span>
	                          @endif
	                    </div>
	                </div> 
	                <div class="col s6 col-half">
	                    <div class=" input-group">
	                      {!! Form::submit('Enviar',['class' => 'btn waves-effect waves-light'])!!}                                     
                                <a type="button" class="waves-effect waves-red btn-flat"href="{{ url('/ambiente') }}">Volver</a>
	                    </div>
	                </div>
	              </div>
          	</section>
        {!! Form::close()!!}
          </div>
        </div>
      </article>
    </section>
  </section>
@endsection