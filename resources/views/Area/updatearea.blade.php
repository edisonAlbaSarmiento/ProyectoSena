@extends('layouts.app2')
@section('content')
<section class"container">
  <section class"row">
    <article class="col-md-8 col-md-offset-1">
      <div class="card-panel3 hoverable3" >
        <div class="panel panel-heading"><center><h1>Actualizar Area</h1></center></div>
          <HR width=100% align="left">
            {!! Form::model($area,['route'=>'area/update','method'=>'put','novalidate']) !!}
             {!! Form::hidden('id',$area->id) !!}
              <section>
                <div class="row">
                   <div class="col s6 col-half">
                      <h4>{!! Form::label('nombrearea','Nombre Area',['class'=>'label'])!!}</h4>
                      <div class="input-group input-group-icon">
                          {!! Form::text('nombrearea',null,['class' => 'input-lg','onKeyUp' => 'validar(this)', 'required' => 'required','onkeypress' =>'return Validacionletras(event)'])!!}
                          <div class="input-icon"><i class="fa fa-list-alt"></i></div>
                          @if ($errors->has('nombrearea'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('nombrearea') }}</strong>
                              </span>
                          @endif
                      </div>
                    </div>          
                    <div class=" col s6 col-half">
                        <h4>{!! Form::label('descripcion','Descripcion',['class'=>'label'])!!}</h4>
                        <div class="input-group input-group-icon">
                          {!! Form::text('descripcion',null,['class' => 'input-lg', 'onKeyUp' => 'validar(this)','required' => 'required'])!!}
                            <div class="input-icon"><i class="fa fa-clock-o"></i></div>
                              @if ($errors->has('descripcion'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('descripcion') }}</strong>
                                  </span>
                              @endif
                        </div>
                    </div>
                </div>
               <div class="row">
                     <div class="col s6 col-half">  
                      <div class="input-group input-group-icon">
                          <h4> {!! Form::label('fkCentro', 'Centro',['class'=>'label']) !!}</h4>
                              {!! Form::select('fkCentro',$centro, null, ['class' => 'input-lg','onKeyUp' => 'validar(this)', 'required' => 'required']) !!}
                              @if ($errors->has('fkCentro'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('fkCentro') }}</strong>
                                  </span>
                              @endif
                         </div>
                     </div>                            
                    <div class="col s6 col-half" id="estado">
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
                    <div class="col s6 col-half">
                        <div class=" input-group">
                          {!! Form::submit('Enviar',['class' => 'btn waves-effect waves-light'])!!}
                          <a type="button" class="waves-effect waves-red btn-flat"href="{{ url('/area') }}">Volver</a>
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