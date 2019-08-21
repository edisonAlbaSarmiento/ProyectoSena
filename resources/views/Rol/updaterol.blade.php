@extends('layouts.app2')
@section('content')
<section class"container">
  <section class"row">
    <article class="col-md-8 col-md-offset-1">
      <div class="panel panel-default" >
        <div class="panel panel-heading"><center><h1>Actualizar Rol</h1></center></div>
          <HR width=120% align="left">
          <div class="">  
          {!! Form::model($rol,['route'=>'rol/update','method'=>'put','novalidate']) !!}
           {!! Form::hidden('id',$rol->id) !!}
              <section>
                  <div class="row">
                     <div class="col s6 col-half">
                        <h4> {!! Form::label('nombrerol','Nombre Rol',['class'=>'label'])!!}</h4>
                         <div class="input-group input-group-icon">
                            {!! Form::text('nombrerol',null,['class' => 'form-control','onKeyUp' => 'validar(this)', 'required' => 'required','onkeypress' =>'return Validacionletras(event)'])!!}
                            <div class="input-icon"><i class="fa fa-user"></i></div>                  
                              @if ($errors->has('nombrerol'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('nombrerol') }}</strong>
                                  </span>
                              @endif
                        </div>
                      </div>            
                      <div class="col s6 col-half">
                           <div class=" input-group">
                            {!! Form::submit('Enviar',['class' => 'btn waves-effect waves-light'])!!}
                               <a type="button" class="waves-effect waves-red btn-flat"href="{{ url('/rol') }}">Volver</a>
                          </div>
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
