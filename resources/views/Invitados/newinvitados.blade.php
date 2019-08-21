@extends('layouts.app2')
@section('content')
@foreach ($rolsEmpleado as $roles)
<section class"container">
  <section class"row">
    <article class="col-md-8 col-md-offset-1">
      <div class="card-panel1 hoverable1" >
        <div class="panel panel-heading"><center><h1>Crear Invitados</h1></center></div>
          <HR width=100% align="left"/>  
          @if ($roles->nombrerol == 'Instructor')  
        	 {!! Form::open(['route' => 'invitadosI.store','method' => 'post','novalidate'])!!}
           @endif
           @if ($roles->nombrerol == 'Lider Articulacion')  
           {!! Form::open(['route' => 'invitados.store','method' => 'post','novalidate'])!!}
           @endif
           @if ($roles->nombrerol == 'Instructor Lider Area')  
           {!! Form::open(['route' => 'invitadosLA.store','method' => 'post','novalidate'])!!}
           @endif
           @if ($roles->nombrerol == 'Instructor Etapa productiva')  
           {!! Form::open(['route' => 'invitadosE.store','method' => 'post','novalidate'])!!}
           @endif
          <section>
            <div class="row">
               <div class="col s5 col-half">
               		<h4>{!! Form::label('nombreinvitado','Nombre Invitado',['class'=>'label'])!!}</h4>
                  	 <div class="input-group input-group-icon">
                     {!! Form::text('nombreinvitado',null,['class' => 'input-lg', 'onKeyUp' => 'validar(this)','required' => 'required','onkeypress' =>'return Validacionletras(event)'])!!}            
                         <div class="input-icon"><i class="fa fa-user"></i></div>
                        @if ($errors->has('nombreinvitado'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nombreinvitado') }}</strong>
                            </span>
                        @endif
                  </div>
                </div>          
                <div class=" col s5 col-half">
                    <h4> {!! Form::label('cargo','Cargo',['class'=>'label'])!!}</h4>
                      <div class="input-group input-group-icon">
                         {!! Form::text('cargo',null,['class' => 'input-lg', 'onKeyUp' => 'validar(this)','required' => 'required'])!!}
                            <div class="input-icon"><i class="fa fa-user"></i></div>
                              @if ($errors->has('cargo'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('cargo') }}</strong>
                                  </span>
                              @endif
                       </div>
                   </div>
              </div>
              <div class="row">
                 <div class="col s5 col-half">   
              		<h4> {!! Form::label('entidad','Entidad',['class'=>'label'])!!}</h4>
                      	<div class="input-group input-group-icon">
                         {!! Form::text('entidad',null,['class' => 'input-lg', 'onKeyUp' => 'validar(this)','required' => 'required','onkeypress' =>'return Validacionletras(event)'])!!}
                          <div class="input-icon"><i class="fa fa-home"></i></div>
                          @if ($errors->has('entidad'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('entidad') }}</strong>
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
                                <a type="button" class="waves-effect waves-red btn-flat"href="{{ url('/invitadosI') }}">Volver</a>
                                @endif
                                @if ($roles->nombrerol == 'Lider Articulaciom')
                                <a type="button" class="waves-effect waves-red btn-flat"href="{{ url('/invitados') }}">Volver</a>
                                @endif
                                @if ($roles->nombrerol == 'Instructor Lider Area')
                                <a type="button" class="waves-effect waves-red btn-flat"href="{{ url('/invitadosLA') }}">Volver</a>
                                @endif
                                @if ($roles->nombrerol == 'Instructor Etapa productiva')
                                <a type="button" class="waves-effect waves-red btn-flat"href="{{ url('/invitadosE') }}">Volver</a>
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
  @endforeach
@endsection