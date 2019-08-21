@extends('layouts.app2')
@section('content')
<section class"container">
  <section class"row">
    <article class="col-md-8 col-md-offset-1">
      <div class="card-panel1 hoverable1" >
        <div class="panel panel-heading"><center><h1>Actualizar Entidad</h1></center></div>
          <HR width=100% align="left"> 
		  {!! Form::model($entidad,['route'=>'entidad/update','method'=>'put','novalidate']) !!}
       {!! Form::hidden('id',$entidad->id) !!}
            <section>
            <div class="row">
               <div class="col s5 col-half">
                  <h4>{!! Form::label('TipoEntidad', 'Tipo Entidad',['class'=>'label'])!!}</h4>
                   <div class="input-group input-group-icon">
                     {!! Form::select('fkTipoEntidad',$tipoentidad, null, ['class' => 'input-lg','onKeyUp' => 'validar(this)', 'required' => 'required']) !!}            
                        @if ($errors->has('fkTipoEntidad'))
                            <span class="help-block">
                                <strong>{{ $errors->first('fkTipoEntidad') }}</strong>
                            </span>
                        @endif
                  </div>
                </div>          
                <div class=" col s5 col-half">
                    <h4> {!! Form::label('NombreEntidad','Nombre Entidad',['class'=>'label'])!!}</h4>
                      <div class="input-group input-group-icon">
                         {!! Form::text('nombreentidad',null,['class' => 'input-lg', 'onKeyUp' => 'validar(this)','required' => 'required','onkeypress' =>'return Validacionletras(event)'])!!}
                            <div class="input-icon"><i class="fa fa-user"></i></div>
                              @if ($errors->has('nombreentidad'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('nombreentidad') }}</strong>
                                  </span>
                              @endif
                       </div>
                   </div>
              </div>
              <div class="row">
                 <div class="col s5 col-half">   
                  <h4>{!! Form::label('Direccion','Direccion',['class'=>'label']) !!}</h4>  
                      <div class="input-group input-group-icon">              
                        {!! Form::text('direccion',null,['class' => 'input-lg', 'onKeyUp' => 'validar(this)','required' => 'required'])!!}   
                            <div class="input-icon"><i class="fa fa-home"></i></div>
                           @if ($errors->has('direccion'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('direccion') }}</strong>
                              </span>
                          @endif
                      </div>
                 </div>                      
                 <div class="col s5 col-half"> 
                    <h4>{!! Form::label('Telefono','Telefono',['class'=>'label']) !!}</h4>
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
                        <a type="button" class="waves-effect waves-red btn-flat"href="{{ url('/entidad') }}">Volver</a>
                        
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