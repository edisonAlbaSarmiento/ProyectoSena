@extends('layouts.app2')
@section('content')
<section class"container">
  <section class"row">
    <article class="col-md-8 col-md-offset-1">
      <div class="card-panel1 hoverable1" >
        <div class="panel panel-heading"><center><h1>Crear Ficha</h1></center></div>
          <HR width=100% align="left"/>    
         	{!! Form::open(['route' => 'ficha.store','method' => 'post','novalidate'])!!}
          <section>
            <div class="row">
               <div class="col s5 col-half">
               		<h4>{!! Form::label('numero','Numero',['class'=>'label'])!!}</h4> 
                  	 <div class="input-group input-group-icon">
                     {!! Form::number('numero',null,['class' => 'input-lg', 'onKeyUp' => 'validar(this)','required' => 'required'])!!}            
                          <div class="input-icon"><i class="fa fa-user"></i></div>
                        @if ($errors->has('numero'))
                            <span class="help-block">
                                <strong>{{ $errors->first('numero') }}</strong>
                            </span>
                        @endif
                  </div>
                </div>          
                <div class=" col s5 col-half">
                    <h4> {!! Form::label('HoraInicioSofia','Horario Inicio En Sofia',['class'=>'label'])!!}</h4>
                      <div class="input-group input-group-icon">
                         {!! Form::time('HoraInicioSofia',null,['class' => 'input-lg', 'onKeyUp' => 'validar(this)','required' => 'required'])!!}
                            <div class="input-icon"><i class="fa fa-user"></i></div>
                              @if ($errors->has('HoraInicioSofia'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('HoraInicioSofia') }}</strong>
                                  </span>
                              @endif
                       </div>
                   </div>
              </div>
              <div class="row">
                 <div class="col s5 col-half">   
              		<h4> {!! Form::label('HoraFinSofia','Horario Fin en  Sofia',['class'=>'label'])!!}</h4>
                      	<div class="input-group input-group-icon">
                         {!! Form::time('HoraFinSofia',null,['class' => 'input-lg', 'onKeyUp' => 'validar(this)','required' => 'required'])!!}
                          <div class="input-icon"><i class="fa fa-user"></i></div>
                          @if ($errors->has('HoraFinSofia'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('HoraFinSofia') }}</strong>
                              </span>
                          @endif
                       </div>
                 </div>                      
                 <div class="col s5 col-half"> 
                    <h4>{!! Form::label('fkPrograma','Programa',['class'=>'label']) !!}</h4>
                      <div class="input-group input-group-icon"> 
	                       {!! Form::select('fkPrograma',$programaformacion,null,['class' => 'input-lg','onKeyUp' => 'validar(this)', 'required' => 'required'])!!}
	                        @if ($errors->has('fkPrograma'))
	                              <span class="help-block">
	                                  <strong>{{ $errors->first('fkPrograma') }}</strong>
	                              </span>
	                        @endif
                      </div>
                 </div> 
              </div>
               <div class="row">
                <div class="col s5 col-half"> 
                  <h4>{!! Form::label('entidad', 'Entidad',['class'=>'label'])!!}</h4>
                   <div class="input-group input-group-icon">
                       {!! Form::select('fkEntidad',$entidad, null, ['class' => 'input-lg','onKeyUp' => 'validar(this)', 'required' => 'required']) !!}            
                          @if ($errors->has('fkEntidad'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('fkEntidad') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>                
                </div>
                <div class="row">
	              	<div class="col s6 col-half">
	                  <div class=" input-group">
	                    {!! Form::submit('Enviar',['class' => 'btn waves-effect waves-light'])!!}
	                    <a type="button" class="waves-effect waves-red btn-flat"href="{{ url('/ficha') }}">Volver</a>
	                    
	                  </div>
	              	</div>
          	  </div>
          </section>
        {!! Form::close()!!}
        </div>
      </article>
    </section>
  </section>
@endsection
