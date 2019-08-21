@extends('layouts.app2')
@section('content')
<section class"container">
  <section class"row">
    <article class="col-md-8 col-md-offset-1">
      <div class="card-panel1 hoverable1" >
        <div class="panel panel-heading"><center><h1>Crear Actividad</h1></center></div>
          <HR width=100% align="left">
            {!! Form::open(['route' => 'actividades.store','method' => 'post','novalidate'])!!}
            <section>
                <div class="row">
                   <div class="col s5 col-half">
                      <h4>{!! Form::label('Actividad','Actividad',['class'=>'label'])!!}</h4>
                      <div class="input-group input-group-icon">
                          {!! Form::text('actividad',null,['class' => 'input-lg','onKeyUp' => 'validar(this)', 'required' => 'required','onkeypress' =>'return Validacionletras(event)'])!!}
                          <div class="input-icon"><i class="fa fa-user"></i></div>
                          @if ($errors->has('actividad'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('actividad') }}</strong>
                              </span>
                          @endif
                      </div>
                    </div>          
                    <div class=" col s5 col-half">
                        <h4>{!!Form::label('evidencias','Evidencias',['class'=>'label'])!!}</h4>
                        <div class="input-group input-group-icon">
                          {!! Form::text('evidencias',null,['class' => 'input-lg', 'onKeyUp' => 'validar(this)','required' => 'required'])!!}
                            <div class="input-icon"><i class="fa fa-clock-o"></i></div>
                              @if ($errors->has('evidencias'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('evidencias') }}</strong>
                                  </span>
                              @endif
                        </div>
                    </div>         
                </div> 
                <div class="row">
                   <div class="col s5 col-half">  
                         <h4> {!! Form::label('fecha', 'Fecha',['class'=>'label']) !!}</h4>
                         <div class="input-group input-group-icon">
                          {!! Form::text('fecha', null, ['type'=> 'date' ,'class' => 'datepicker','onKeyUp' => 'validar(this)', 'required' => 'required']) !!}
                          <div class="input-icon"><i class="fa fa-clock-o"></i></div>
                          @if ($errors->has('fecha'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('fecha') }}</strong>
                              </span>
                          @endif
                      </div>
                   </div>
                    <div class="col s5 col-half">                     
                     <h4> {!! Form::label('lugar', 'Lugar',['class'=>'label']) !!}</h4>
                      <div class="input-group input-group-icon">
                          {!! Form::text('lugar', null, ['class' => 'input-lg','onKeyUp' => 'validar(this)', 'required' => 'required','onkeypress' =>'return Validacionletras(event)']) !!}
                          <div class="input-icon"><i class="fa fa-home"></i></div>
                          @if ($errors->has('lugar'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('lugar') }}</strong>
                              </span>
                          @endif
                      </div>
                    </div>
                   </div> 
                <div class="row"> 
                   <div class="col s5 col-half">  
                      <div class="input-group input-group-icon">
                         <h4> {!! Form::label('bitacora', 'Bitacora',['class'=>'label']) !!}</h4>
                          {!! Form::select('fkBitacora',$bitacora,null, ['class' => 'input-lg','onKeyUp' => 'validar(this)', 'required' => 'required']) !!}
                          @if ($errors->has('fkBitacora'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('fkBitacora') }}</strong>
                              </span>
                          @endif
                      </div>
                    </div>                          
                  <div class="col s6 col-half">
                      <div class=" input-group">
                        {!! Form::submit('Enviar',['class' => 'btn waves-effect waves-light'])!!}
                        @if ($roles->nombrerol == 'Instructor')
                                <a type="button" class="waves-effect waves-red btn-flat"href="{{ url('/actividadesI') }}">Volver</a>
                                @endif
                                @if ($roles->nombrerol == 'Lider Articulacion')
                                <a type="button" class="waves-effect waves-red btn-flat"href="{{ url('/actividades') }}">Volver</a>
                                @endif
                                @if ($roles->nombrerol == 'Instructor Lider Area')
                                <a type="button" class="waves-effect waves-red btn-flat"href="{{ url('/actividadesLA') }}">Volver</a>
                                @endif
                                @if ($roles->nombrerol == 'Instructor Etapa productiva')
                                <a type="button" class="waves-effect waves-red btn-flat"href="{{ url('/actividadesE') }}">Volver</a>
                                @endif
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