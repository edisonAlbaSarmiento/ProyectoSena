@extends('layouts.app2')
@section('content')
@foreach ($rolsEmpleado as $roles) 
<section class"container">
  <section class"row">
    <article class="col-md-8 col-md-offset-1">
      <div class="card-panel1 hoverable1" >
        <div class="panel panel-heading"><center><h1>Crear Compromisos</h1></center></div>
          <HR width=100% align="left">  
          @if ($roles->nombrerol == 'Instructor Lider Area') 
              {!! Form::open(['route' => 'compromisoLA.store','method' => 'post','novalidate'])!!}
          @endif

          @if ($roles->nombrerol == 'Lider Articulacion')
              {!! Form::open(['route' => 'compromiso.store','method' => 'post','novalidate'])!!}
          @endif

          @if ($roles->nombrerol == 'Instructor')
              {!! Form::open(['route' => 'compromisoI.store','method' => 'post','novalidate'])!!}
          @endif

          @if ($roles->nombrerol == 'Instructor Etapa Productiva')
              {!! Form::open(['route' => 'compromisoE.store','method' => 'post','novalidate'])!!}
          @endif
         		
          <section>
            <div class="row">
               <div class="col s6 col-half">
                  <h4> {!! Form::label('Actividades','Actividad',['class'=>'label'])!!}</h4>
                   <div class="input-group input-group-icon">
                  		{!! Form::text('Actividades',null,['class' => 'input-lg','onKeyUp' => 'validar(this)', 'required' => 'required','onkeypress' =>'return Validacionletras(event)'])!!}
                      <div class="input-icon"><i class="fa fa-user"></i></div>                  
                        @if ($errors->has('Actividades'))
                            <span class="help-block">
                                <strong>{{ $errors->first('Actividades') }}</strong>
                            </span>
                        @endif
                  </div>
                </div>          
                <div class=" col s4 col-half">
                    <h4>{!! Form::label('responsables','Responsable',['class'=>'label'])!!}</h4>
                      <div class="input-group input-group-icon">
                      	{!! Form::text('responsables',null,['class' => 'input-lg','onKeyUp' => 'validar(this)', 'required' => 'required','onkeypress' =>'return Validacionletras(event)'])!!}
                            <div class="input-icon"><i class="fa fa-user"></i></div>
                              @if ($errors->has('responsables'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('responsables') }}</strong>
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
                        @if ($errors->has('fechaasignacion'))
                            <span class="help-block">
                                <strong>{{ $errors->first('fecha') }}</strong>
                            </span>
                          @endif
                    </div>
              </div>             
                 <div class="col s5 col-half"> 
                    <div class="input-group input-group-icon">
                        <h4> {!! Form::label('fkacta', 'Acta',['class'=>'label']) !!}</h4>
                        {!! Form::select('fkacta', $acta, null, ['class' => 'input-lg', 'onKeyUp' => 'validar(this)','required' => 'required']) !!}
                        @if ($errors->has('fkacta'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('fkacta') }}</strong>
                              </span>
                        @endif
                    </div>
                 </div> 
                  <div class="col s5 col-half" id="estado">
                    <div class="input-group input-group-icon">
                        <h4 >{!! Form::label('fkestado', 'Estado',['class'=>'label']) !!}</h4>
                          {!! Form::select('fkestado',$estado, null, ['class' => 'input-lg', 'required' => 'required']) !!}
                            @if ($errors->has('fkestado'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('fkestado') }}</strong>
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
                                <a type="button" class="waves-effect waves-red btn-flat"href="{{ url('/compromisoI') }}">Volver</a>
                                @endif
                                @if ($roles->nombrerol == 'Lider Articulaciom')
                                <a type="button" class="waves-effect waves-red btn-flat"href="{{ url('/compromiso') }}">Volver</a>
                                @endif
                                @if ($roles->nombrerol == 'Instructor Lider Area')
                                <a type="button" class="waves-effect waves-red btn-flat"href="{{ url('/compromisoLA') }}">Volver</a>
                                @endif
                                @if ($roles->nombrerol == 'Instructor Etapa productiva')
                                <a type="button" class="waves-effect waves-red btn-flat"href="{{ url('/compromisoE') }}">Volver</a>
                                @endif
                       <a type="button" class="waves-effect waves-red btn-flat"href="{{ url('/acta') }}">Volver</a>
                     </div>
                  </div>
                </div>
          </section>
        {!! Form::close()!!}
        </div>
      </article>
    </section>
  </section>
  @endforeach
@endsection