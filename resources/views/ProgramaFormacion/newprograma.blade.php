@extends('layouts.app2')
@section('content')
<section class"container">
  <section class"row">
    <article class="col-md-8 col-md-offset-1">
      <div class="card-panel1 hoverable1" >
        <div class="panel panel-heading"><center><h1>Crear Programa Formacion</h1></center></div>
          <HR width=100% align="left"/>    
         {!! Form::open(['route' => 'programaformacion.store','method' => 'post','novalidate'])!!}
          <section>
            <div class="row">
               <div class="col s5 col-half">
                  <h4>{!! Form::label('nombreprograma', 'Nombre Programa',['class'=>'label'])!!}</h4>
                   <div class="input-group input-group-icon">
                     {!! Form::text('nombreprograma', null, ['class' => 'input-lg','onKeyUp' => 'validar(this)', 'required' => 'required','onkeypress' =>'return Validacionletras(event)']) !!}            
                        <div class="input-icon"><i class="fa fa-users"></i></div>
                        @if ($errors->has('nombreprograma'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nombreprograma') }}</strong>
                            </span>
                        @endif
                  </div>
                </div>          
                <div class=" col s5 col-half">
                    <h4> {!! Form::label('descripcion','Descripcion',['class'=>'label'])!!}</h4>
                      <div class="input-group input-group-icon">
                         {!! Form::text('descripcion',null,['class' => 'input-lg', 'onKeyUp' => 'validar(this)','required' => 'required'])!!}
                            <div class="input-icon"><i class="fa fa-user"></i></div>
                              @if ($errors->has('descripcion'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('descripcion') }}</strong>
                                  </span>
                              @endif
                       </div>
                   </div>
              </div>
              <div class="row">
                 <div class="col s5 col-half"> 
                  <h4>{!! Form::label('area', 'Area',['class'=>'label'])!!}</h4>
                   <div class="input-group input-group-icon">
                       {!! Form::select('fkArea',$area, null, ['class' => 'input-lg','onKeyUp' => 'validar(this)', 'required' => 'required']) !!}            
                          @if ($errors->has('fkArea'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('fkArea') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>                
                  <div class="col s5 col-half"> 
                  <h4>{!! Form::label('grado', 'Grado Formacion',['class'=>'label'])!!}</h4>
                   <div class="input-group input-group-icon">
                       {!! Form::select('fkGrado',$gradoformacion, null, ['class' => 'input-lg','onKeyUp' => 'validar(this)', 'required' => 'required']) !!}            
                          @if ($errors->has('fkGrado'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('fkGrado') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>  
              </div>
               <div class="row">
                <div class="col s5 col-half"> 
                  <h4>{!! Form::label('estado', 'Estado',['class'=>'label'])!!}</h4>
                   <div class="input-group input-group-icon">
                       {!! Form::select('fkEstado',$estado, null, ['class' => 'input-lg','onKeyUp' => 'validar(this)', 'required' => 'required']) !!}            
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
                        <a type="button" class="waves-effect waves-red btn-flat"href="{{ url('/programaformacion') }}">Volver</a>
                        
                      </div>
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