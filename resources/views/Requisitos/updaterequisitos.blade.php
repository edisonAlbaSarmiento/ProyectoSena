@extends('layouts.app2')
@section('content')
<section class"container">
  <section class"row">
    <article class="col-md-8 col-md-offset-1">
      <div class="card-panel1 hoverable1" >
        <div class="panel panel-heading"><center><h1>Actualizar Requisitos</h1></center></div>
          <HR width=100% align="left"/>
          {!! Form::model($requisito,['route'=>'requisito/update','method'=>'put','novalidate']) !!}
           {!! Form::hidden('id',$requisito->id) !!}          
          <section>
            <div class="row">
               <div class="col s5 col-half">
                  <h4>{!! Form::label('nombrerequisito', 'Nombre Requisito',['class'=>'label'])!!}</h4>
                   <div class="input-group input-group-icon">
                     {!! Form::text('nombrerequisito', null, ['class' => 'input-lg','onKeyUp' => 'validar(this)', 'required' => 'required','onkeypress' =>'return Validacionletras(event)']) !!}            
                        <div class="input-icon"><i class="fa fa-chain-broken"></i></div>
                        @if ($errors->has('nombrerequisito'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nombrerequisito') }}</strong>
                            </span>
                        @endif
                  </div>
                </div>          
                <div class=" col s5 col-half">
                    <h4> {!! Form::label('observacion','Observacion',['class'=>'label'])!!}</h4>
                      <div class="input-group input-group-icon">
                         {!! Form::text('observacion',null,['class' => 'input-lg', 'onKeyUp' => 'validar(this)','required' => 'required'])!!}
                            <div class="input-icon"><i class="fa fa-book"></i></div>
                              @if ($errors->has('observacion'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('observacion') }}</strong>
                                  </span>
                              @endif
                       </div>
                   </div>
              </div>
              <div class="row">
                 <div class="col s5 col-half"> 
                  <h4>{!! Form::label('archivoadjunto','Archivo Adjunto',['class'=>'label']) !!}</h4>  
                      <div class="file-field input-field">   
                        <div class="btn">
                          <span>subir</span>         
                          {!! Form::file('archivoadjunto',null,['class'=>'', 'type'=>'file', 'onKeyUp' => 'validar(this)','required' => 'required'])!!}
                        </div>  
                        <div class="file-path-wrapper">
                          {!! Form::text('archivoadjunto',null,['class'=>'file-path validate', 'type'=>'file', 'onKeyUp' => 'validar(this)','required' => 'required'])!!}
                        </div>
                      </div>
                 </div>                      
                 <div class="col s5 col-half"> 
                  <h4>{!! Form::label('tiporequisito', 'Tipo Requisito',['class'=>'label'])!!}</h4>
                   <div class="input-group input-group-icon">
                       {!! Form::select('fkTipoRequisito',$tiporequisito, null, ['class' => 'input-lg','onKeyUp' => 'validar(this)', 'required' => 'required']) !!}            
                          @if ($errors->has('fkTipoRequisito'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('fkTipoRequisito') }}</strong>
                              </span>
                          @endif
                      </div>
                 </div> 
              </div>
               <div class="row">
                <div class="col s5 col-half"> 
                  <h4>{!! Form::label('gradoformacion', 'Grado Formacion',['class'=>'label'])!!}</h4>
                   <div class="input-group input-group-icon">
                       {!! Form::select('fkGradoFormacion',$gradoformacion, null, ['class' => 'input-lg','onKeyUp' => 'validar(this)', 'required' => 'required']) !!}            
                          @if ($errors->has('fkGradoFormacion'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('fkGradoFormacion') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>
                  <div class="col s5 col-half"> 
                  <h4>{!! Form::label('estadorequisito', 'Estado Requisito',['class'=>'label'])!!}</h4>
                   <div class="input-group input-group-icon">
                       {!! Form::select('fkEstadoRequisito',$estadorequisito, null, ['class' => 'input-lg','onKeyUp' => 'validar(this)', 'required' => 'required']) !!}            
                          @if ($errors->has('fkEstadoRequisito'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('fkEstadoRequisito') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>                
                </div>
                <div class="row">
                  <div class="col s6 col-half">
                      <div class=" input-group">
                        {!! Form::submit('Enviar',['class' => 'btn waves-effect waves-light'])!!}
                        <a type="button" class="waves-effect waves-red btn-flat"href="{{ url('/requisitos') }}">Volver</a>
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

