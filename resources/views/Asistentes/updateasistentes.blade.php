@extends('layouts.app2')
@section('content')
@foreach ($rolsEmpleado as $roles)
<section class"container">
  <section class"row">
    <article class="col-md-8 col-md-offset-1">
      <div class="panel panel-default" >
        <div class="panel panel-heading"><center><h1>Actualizar Asistente</h1></center></div>
          <HR width=120% align="left">
          <div class=""> 
          @if ($roles->nombrerol == 'Lider Articulacion')
		        {!! Form::model($asistentes,['route'=>'asistentes/update','method'=>'put','novalidate']) !!}
		        {!! Form::hidden('id',$asistentes->id) !!}
         @endif
         @if ($roles->nombrerol == 'Instructor Lider Area')
            {!! Form::model($asistentes,['route'=>'asistentesLA/update','method'=>'put','novalidate']) !!}
            {!! Form::hidden('id',$asistentes->id) !!}
         @endif
         @if ($roles->nombrerol == 'Instructor')
            {!! Form::model($asistentes,['route'=>'asistentesI/update','method'=>'put','novalidate']) !!}
            {!! Form::hidden('id',$asistentes->id) !!}
         @endif
         @if ($roles->nombrerol == 'Instructor Etapa Productiva')
            {!! Form::model($asistentes,['route'=>'asistentesE/update','method'=>'put','novalidate']) !!}
            {!! Form::hidden('id',$asistentes->id) !!}
         @endif
         <section>
                <div class="row">
                   <div class="col s5 col-half">
                      <h4>{!! Form::label('nombreasistente','Nombre',['class'=>'label'])!!}</h4>
                      <div class="input-group input-group-icon">
                          {!! Form::text('nombreasistente',null,['class' => 'input-lg','onKeyUp' => 'validar(this)', 'required' => 'required','onkeypress' =>'return Validacionletras(event)'])!!}
                          <div class="input-icon"><i class="fa fa-user"></i></div>
                          @if ($errors->has('nombreasistente'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('nombreasistente') }}</strong>
                              </span>
                          @endif
                      </div>
                    </div>          
                    <div class=" col s5 col-half">
                        <h4>{!!Form::label('cargodependenciaentidad','Cargo Dependencia Entidad',['class'=>'label'])!!}</h4>
                        <div class="input-group input-group-icon">
                          {!! Form::text('cargodependenciaentidad',null,['class' => 'input-lg', 'onKeyUp' => 'validar(this)','required' => 'required','onkeypress' =>'return Validacionletras(event)'])!!}
                            <div class="input-icon"><i class="fa fa-clock-o"></i></div>
                              @if ($errors->has('cargodependenciaentidad'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('cargodependenciaentidad') }}</strong>
                                  </span>
                              @endif
                        </div>
                    </div>         
                   <div class="col s5 col-half">  
                      <div class="input-group input-group-icon">
                         <h4> {!! Form::label('fkacta', 'Acta',['class'=>'label']) !!}</h4>
                          {!! Form::select('fkacta',$acta, null, ['class' => 'input-lg','onKeyUp' => 'validar(this)', 'required' => 'required']) !!}
                          @if ($errors->has('fkacta'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('fkacta') }}</strong>
                              </span>
                          @endif
                      </div>
                   </div>
                </div> 
                <div class="row">                           
                  <div class="col s6 col-half">
                      <div class=" input-group">
                        {!! Form::submit('Enviar',['class' => 'btn waves-effect waves-light'])!!}
                        @if ($roles->nombrerol == 'Instructor')
                                <a type="button" class="waves-effect waves-red btn-flat"href="{{ url('/asistentesI') }}">Volver</a>
                                @endif
                                @if ($roles->nombrerol == 'Lider Articulaciom')
                                <a type="button" class="waves-effect waves-red btn-flat"href="{{ url('/asistentes') }}">Volver</a>
                                @endif
                                @if ($roles->nombrerol == 'Instructor Lider Area')
                                <a type="button" class="waves-effect waves-red btn-flat"href="{{ url('/asistentesLA') }}">Volver</a>
                                @endif
                                @if ($roles->nombrerol == 'Instructor Etapa productiva')
                                <a type="button" class="waves-effect waves-red btn-flat"href="{{ url('/asistentesE') }}">Volver</a>
                                @endif
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
  @endforeach
@endsection