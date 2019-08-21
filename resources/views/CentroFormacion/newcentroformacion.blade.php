@extends('layouts.app2')
@section('content')
<section class"container">
  <section class"row">
    <article class="col-md-8 col-md-offset-1">
      <div class="card-panel3 hoverable3">
        <div class="panel panel-heading"><center><h1>Crear centro Formacion</h1></center></div>
          <div class="">      
         	{!! Form::open(['route' => 'centroformacion.store','method' => 'post','novalidate'])!!}
          <section>
            <div class="row">
               <div class="col s5 col-half">
                  <h4> {!! Form::label('nombrecentro','Nombre del Centro',['class'=>'label'])!!}</h4>
                   <div class="input-group input-group-icon">
                      	{!! Form::text('nombrecentro',null,['class' => 'input-lg','onKeyUp' => 'validar(this)', 'required' => 'required','onkeypress' =>'return Validacionletras(event)'])!!}
                      <div class="input-icon"><i class="fa fa-user"></i></div>                  
                        @if ($errors->has('nombrecentro'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nombrecentro') }}</strong>
                            </span>
                        @endif
                  </div>
                </div>          
                <div class=" col s4 col-half">
                    <h4>{!! Form::label('direccion','Direccion',['class'=>'label'])!!}</h4>
                      <div class="input-group input-group-icon">
                      	{!! Form::text('direccion',null,['class' => 'input-lg','onKeyUp' => 'validar(this)', 'required' => 'required'])!!}
                            <div class="input-icon"><i class="fa fa-home"></i></div>
                              @if ($errors->has('direccion'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('direccion') }}</strong>
                                  </span>
                              @endif
                       </div>
                   </div>
              </div>
              <div class="row">
                 <div class="col s5 col-half"> 
                  <h4> {!! Form::label('telefono','Telefono',['class'=>'label']) !!}</h4>  
                  	<div class="input-group input-group-icon">              
                 		{!! Form::number('telefono',null,['class' => 'input-lg','onKeyUp' => 'validar(this)', 'required' => 'required'])!!}
                 		<div class="input-icon"><i class="fa fa-hashtag"></i></div>     
                         @if ($errors->has('telefono'))
                            <span class="help-block">
                                <strong>{{ $errors->first('telefono') }}</strong>
                            </span>
                        @endif
                       </div>
                 </div>                      
                 <div class="col s4 col-half"> 
                    <div class="input-group input-group-icon">
                        <h4>{!! Form::label('fkCiudad', 'Ciudad',['class'=>'label']) !!}</h4>
                        {!! Form::select('fkCiudad',$ciudad, null, ['class' => 'input-lg','onKeyUp' => 'validar(this)', 'required' => 'required']) !!}
                        @if ($errors->has('fkCiudad'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('fkCiudad') }}</strong>
                              </span>
                        @endif
                    </div>
                 </div> 
              </div> 
               <div class="row">               
              	<div class="col s6 col-half">
               	 <div class=" input-group">
                 	{!! Form::submit('Enviar',['class' => 'btn waves-effect waves-light'])!!}
                 		 <a type="button" class="waves-effect waves-red btn-flat"href="{{ url('/centroformacion') }}">Volver</a>
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