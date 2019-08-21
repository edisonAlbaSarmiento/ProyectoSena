@extends('layouts.app2')
@section('content')
@foreach ($rolsEmpleado as $roles)

<section class"container">
  <section class"row">
    <article class="col-md-8 col-md-offset-1">
      <div class="card-panel1 hoverable1" >
        <div class="panel panel-heading"><center><h1>Modificar Actividad</h1></center></div>
          <HR width=100% align="left">
          @if ($roles->nombrerol == 'Instructor Lider Area')
            {!! Form::model($agenda,['route'=>'agendaLA/update','method'=>'put','novalidate']) !!}
             {!! Form::hidden('id',$agenda->id) !!}
          @endif
          @if ($roles->nombrerol == 'Instructor Etapa Productiva')
            {!! Form::model($agenda,['route'=>'agendaE/update','method'=>'put','novalidate']) !!}
            {!! Form::hidden('id',$agenda->id) !!}
          @endif
          @if ($roles->nombrerol == 'Instructor')
            {!! Form::model($agenda,['route'=>'agendaI/update','method'=>'put','novalidate']) !!}
            {!! Form::hidden('id',$agenda->id) !!}
          @endif
          @if ($roles->nombrerol == 'Lider Articulacion')
            {!! Form::model($agenda,['route'=>'agenda/update','method'=>'put','novalidate']) !!}
            {!! Form::hidden('id',$agenda->id) !!}
          @endif
          <section>
            <div class="row">
              <div class="col s5 col-half">  
                      <h4> {!! Form::label('titulo', 'Titulo',['class'=>'label']) !!}</h4>
                  <div class="input-group input-group-icon">
                        {!! Form::text('titulo',null,['class' => 'input-lg','onKeyUp' => 'validar(this)', 'required' => 'required'])!!}
                        <div class="input-icon"><i class="fa fa-book"></i></div>
                        @if ($errors->has('titulo'))
                            <span class="help-block">
                                <strong>{{ $errors->first('titulo') }}</strong>
                            </span>
                          @endif
                    </div>
              </div>
              <div class="col s5 col-half">  
                      <h4> {!! Form::label('fechaasignacion', 'Fecha Asignacion',['class'=>'label']) !!}</h4>
                  <div class="input-group input-group-icon">
                        {!! Form::text('fechaasignacion', null, ['type'=> 'date' ,'class' => 'datepicker','onKeyUp' => 'validar(this)', 'required' => 'required']) !!}
                        <div class="input-icon"><i class="fa fa-clock-o"></i></div>
                        @if ($errors->has('fechaasignacion'))
                            <span class="help-block">
                                <strong>{{ $errors->first('fechaasignacion') }}</strong>
                            </span>
                          @endif
                    </div>
                 </div>
               </div> 
                <div class="row">
                  <div class="col s5 col-half">  
                      <h4> {!! Form::label('fecharealizacion', 'Fecha Realizacion',['class'=>'label']) !!}</h4>
                     <div class="input-group input-group-icon">
                        {!! Form::text('fecharealizacion', null, ['type'=> 'date' ,'class' => 'datepicker','onKeyUp' => 'validar(this)', 'required' => 'required']) !!}
                        <div class="input-icon"><i class="fa fa-clock-o"></i></div>
                        @if ($errors->has('fecharealizacion'))
                            <span class="help-block">
                                <strong>{{ $errors->first('fecharealizacion') }}</strong>
                            </span>
                          @endif
                    </div>
                  </div>
                   <div class="col s5 col-half">  
                      <div class="input-group input-group-icon">
                         <h4> {!! Form::label('Entidad', 'Entidad',['class'=>'label']) !!}</h4>
                          {!! Form::select('fkEntidad',$entidad,null, ['class' => 'input-lg','onKeyUp' => 'validar(this)', 'required' => 'required']) !!}
                          @if ($errors->has('fkEntidad'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('fkEntidad') }}</strong>
                              </span>
                          @endif
                      </div>
                    </div>     
                </div>      
                <div class="row">
                    <div class="col s5 col-half">                     
                       <h4> {!! Form::label('hora', 'Hora',['class'=>'label']) !!}</h4>
                       <div class="input-group input-group-icon">
                        {!! Form::time('hora', null, ['class' => 'input-lg','onKeyUp' => 'validar(this)', 'required' => 'required']) !!}
                        <div class="input-icon"><i class="fa fa-home"></i></div>
                        @if ($errors->has('hora'))
                            <span class="help-block">
                                <strong>{{ $errors->first('hora') }}</strong>
                            </span>
                        @endif
                      </div>
                    </div> 
                    <div class="col s5 col-half">  
                      <div class="input-group input-group-icon">
                         <h4> {!! Form::label('Empleado', 'Empleado',['class'=>'label']) !!}</h4>
                          {!! Form::select('fkEmpleado',$empleado,null, ['class' => 'input-lg','onKeyUp' => 'validar(this)', 'required' => 'required']) !!}
                          @if ($errors->has('fkEmpleado'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('fkEmpleado') }}</strong>
                              </span>
                          @endif
                      </div>
                    </div>
                   <div class="col s5 col-half">  
                      <div class="input-group input-group-icon">
                         <h4> {!! Form::label('Estado', 'Estado',['class'=>'label']) !!}</h4>
                          {!! Form::select('fkEstado',$estado,null, ['class' => 'input-lg','onKeyUp' => 'validar(this)', 'required' => 'required']) !!}
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
                        @if ($roles->nombrerol == 'Instructor')
                                <a type="button" class="waves-effect waves-red btn-flat"href="{{ url('/agendaI') }}">Volver</a>
                                @endif
                                @if ($roles->nombrerol == 'Lider Articulacion')
                                <a type="button" class="waves-effect waves-red btn-flat"href="{{ url('/agenda') }}">Volver</a>
                                @endif
                                @if ($roles->nombrerol == 'Instructor Lider Area')
                                <a type="button" class="waves-effect waves-red btn-flat"href="{{ url('/agendaLA') }}">Volver</a>
                                @endif
                                @if ($roles->nombrerol == 'Instructor Etapa productiva')
                                <a type="button" class="waves-effect waves-red btn-flat"href="{{ url('/agendaE') }}">Volver</a>
                                @endif
                      </div>
                  </div>
                </div>    
            </section>
        {!! Form::close()!!}
        </div>
      </article>
    </section>
@endforeach
 @endsection