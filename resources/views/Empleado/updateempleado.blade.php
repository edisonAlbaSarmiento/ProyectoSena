@extends('layouts.app2')
@section('content')
<section class"container">
  <section class"row">
    <article class="col-md-8 col-md-offset-1">
    <div class="card-panel1 hoverable1">
      <div class="panel panel-heading"><center><h1>Actualizar Empleado <br>{{ $empleado->nombreempleado}} {{$empleado->apellido}}</h1></br></h1></center></div>
            {!! Form::model($empleado,['route'=>'empleado/update','method'=>'put','novalidate']) !!}
       {!! Form::hidden('id',$empleado->id) !!}
                     <section>
            <div class="row">
               <div class="col s5 col-half">
                  <h4> {!! Form::label('Nombre','Nombre Empleado',['class'=>'label'])!!}</h4>
                   <div class="input-group input-group-icon">
                       {!! Form::text('nombreempleado',null,['class' => 'input-lg','onKeyUp' => 'validar(this)', 'required' => 'required','onkeypress' =>'return Validacionletras(event)'])!!}
                      <div class="input-icon"><i class="fa fa-user"></i></div>                  
                        @if ($errors->has('nombreempleado'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nombreempleado') }}</strong>
                            </span>
                        @endif
                  </div>
                </div>          
                <div class=" col s5 col-half">
                    <h4> {!! Form::label('apellido','Apellido',['class'=>'label'])!!}</h4>
                      <div class="input-group input-group-icon">
                         {!! Form::text('apellido',null,['class' => 'input-lg','onKeyUp' => 'validar(this)', 'required' => 'required','onkeypress' =>'return Validacionletras(event)'])!!}
                            <div class="input-icon"><i class="fa fa-user"></i></div>
                              @if ($errors->has('apellido'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('apellido') }}</strong>
                                  </span>
                              @endif
                       </div>
                   </div>
              </div>
              <div class="row">
                 <div class="col s5 col-half">                  
                 <h4>{!! Form::label('fkTipoDoc', 'Tipo Documento',['class'=>'label']) !!}</h4>
                  {!! Form::select('fkTipoDoc',$tipodocumento, null, ['class' => 'input-lg','onKeyUp' => 'validar(this)', 'required' => 'required']) !!}      
                         @if ($errors->has('fkTipoDoc'))
                            <span class="help-block">
                                <strong>{{ $errors->first('fkTipoDoc') }}</strong>
                            </span>
                        @endif
                 </div>                   
                 <div class="col s5 col-half"> 
                    <h4>{!! Form::label('identificacion','Identificacion',['class'=>'label'])!!}</h4>
                      <div class="input-group input-group-icon">
                         {!! Form::number('identificacion',null,['class' => 'input-lg','onKeyUp' => 'validar(this)', 'required' => 'required','disabled'])!!}    
                            <div class="input-icon"><i class="fa fa-credit-card"></i></div>
                              @if ($errors->has('identificacion'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('identificacion') }}</strong>
                                  </span>
                              @endif
                       </div>
                 </div> 
              </div>                
              <div class="row">
                <div class="col s5 col-half">
                   <h4>{!! Form::label('direccion','Direccion',['class'=>'label'])!!}</h4>
                     <div class="input-group input-group-icon">
                       {!! Form::text('direccion',null,['class' => 'input-lg', 'required' => 'required'])!!}
                         <div class="input-icon"><i class="fa fa-phone"></i></div>
                           @if ($errors->has('direccion'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('direccion') }}</strong>
                              </span>
                           @endif  
                     </div> 
                  </div>          
                  <div class="col s5 col-half">
                    <h4>{!! Form::label('telefonofijo','Telefono Fijo',['class'=>'label'])!!}</h4>
                     <div class="input-group input-group-icon">
                       {!! Form::number('telefonofijo',null,['class' => 'input-lg', 'required' => 'required'])!!}
                         <div class="input-icon"><i class="fa fa-phone"></i></div>
                           @if ($errors->has('telefonofijo'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('telefonofijo') }}</strong>
                              </span>
                           @endif  
                     </div>
                  </div> 
                </div>
               <div class="row">
                  <div class="col s5 col-half">
                      <h4>{!! Form::label('telefonocelular','Telefono Celular',['class'=>'label'])!!}</h4>
                        <div class="input-group input-group-icon">
                           {!! Form::number('telefonocelular',null,['class' => 'input-lg', 'required' => 'required'])!!}
                             <div class="input-icon"><i class="fa fa-hashtag"></i></div> 
                              @if ($errors->has('telefonocelular'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('telefonocelular') }}</strong>
                                </span>
                              @endif                         
                        </div> 
                  </div>
                  <div class="col s5 col-half">
                     <div  id="email" class="input-group input-group-icon">
                        <h4>{!! Form::label('correo','Correo',['class'=>'label'])!!}</h4>
                          <div class="input-group input-group-icon">
                             {!! Form::email('correo',null,['class' => 'input-lg', 'required' => 'required'])!!}
                               <div class="input-icon"><i class="fa fa-envelope"></i></div> 
                                @if ($errors->has('correo'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('correo') }}</strong>
                                  </span>
                                @endif
                              <span id="emailOK"></span>                         
                          </div>
                      </div>
                  </div>
              </div>
              <div class="row">
                <div class="col s5 col-half">
                      <div class="input-group input-group-icon">
                        <h4 >{!! Form::label('centro', 'Centro',['class'=>'label']) !!}</h4>
                          {!! Form::select('fkCentro',$centro, null, ['class' => 'input-lg', 'required' => 'required']) !!}
                            @if ($errors->has('fkCentro'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('fkCentro') }}</strong>
                                  </span>
                            @endif
                      </div>
                </div>
                <div class="col s5 col-half" >
                  <div class="input-group input-group-icon">
                    <h4 >{!! Form::label('estado', 'Estado',['class'=>'label']) !!}</h4>
                      {!! Form::select('fkEstado',$estado, null, ['class' => 'input-lg', 'required' => 'required']) !!}
                        @if ($errors->has('fkEstado'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('fkEstado') }}</strong>
                              </span>
                        @endif
                  </div>
                </div>
              </div>
              <div class="row">
                  <div class="col s5 col-half">
                    <div class="input-group input-group-icon">
                      <h4 >{!! Form::label('user', 'Usuario',['class'=>'label']) !!}</h4>
                        {!! Form::select('fkuser',$user, null, ['class' => 'input-lg', 'required' => 'required']) !!}
                          @if ($errors->has('fkuser'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('fkuser') }}</strong>
                                </span>
                          @endif
                    </div>
                   </div> 
                  <div class="col s5 col-half">
                    <div class=" input-group">
                      {!! Form::submit('Enviar',['class' => 'btn waves-effect waves-light'])!!}
                      <a type="button" class="waves-effect waves-red btn-flat"href="{{ url('/aprendiz') }}">Volver</a>  
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