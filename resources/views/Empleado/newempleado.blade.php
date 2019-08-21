@extends('layouts.app2')
@section('content')
<section class"container">
  <section class"row">
    <article class="col-md-8 col-md-offset-1">
    <div class="card-panel1 hoverable1">
      <div class="panel panel-heading"><center><h1>Empleado</h1></center></div>
      {!! Form::open(['route' => 'empleado.store','method' => 'post','novalidate','id'=>'formNewEntrada'])!!}
      <input type="hidden" name="_token" value="{{ csrf_token() }}" id="tokenNewEntrada">
           <section>
            <div class="row">
               <div class="col s5 col-half">
                  <h4> {!! Form::label('Nombre','Nombre Empleado',['class'=>'label'])!!}</h4>
                   <div class="input-group input-group-icon">
                       {!! Form::text('nombreempleado',null,['class' => 'input-lg','onKeyUp' => 'validar(this)', 'required' => 'required','onkeypress' =>'return Validacionletras(event)','id'=>'nombreempleado'])!!}
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
                         {!! Form::text('apellido',null,['class' => 'input-lg','onKeyUp' => 'validar(this)', 'required' => 'required','onkeypress' =>'return Validacionletras(event)','id'=>'apellido'])!!}
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
                  {!! Form::select('fkTipoDoc',$tipodocumento, null, ['class' => 'input-lg','onKeyUp' => 'validar(this)', 'required' => 'required','id'=>'fkTipoDoc']) !!}      
                         @if ($errors->has('fkTipoDoc'))
                            <span class="help-block">
                                <strong>{{ $errors->first('fkTipoDoc') }}</strong>
                            </span>
                        @endif
                 </div>                   
                 <div class="col s5 col-half"> 
                    <h4>{!! Form::label('identificacion','Identificacion',['class'=>'label'])!!}</h4>
                      <div class="input-group input-group-icon">
                         {!! Form::number('identificacion',null,['class' => 'input-lg','onKeyUp' => 'validar(this)', 'required' => 'required','id'=>'identificacion'])!!}    
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
                       {!! Form::text('direccion',null,['class' => 'input-lg', 'required' => 'required','id'=>'direccion'])!!}
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
                       {!! Form::number('telefonofijo',null,['class' => 'input-lg', 'required' => 'required','id'=>'telefonofijo'])!!}
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
                           {!! Form::number('telefonocelular',null,['class' => 'input-lg', 'required' => 'required','id'=>'telefonocelular'])!!}
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
                             {!! Form::email('correo',null,['class' => 'input-lg', 'required' => 'required','id'=>'correo'])!!}
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
                          {!! Form::select('fkCentro',$centro, null, ['class' => 'input-lg', 'required' => 'required','id'=>'fkCentro']) !!}
                            @if ($errors->has('fkCentro'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('fkCentro') }}</strong>
                                  </span>
                            @endif
                      </div>
                </div>
           

            <div class="col s5 col-half">  
                <!-- Modal Trigger -->
  <a class="modal-trigger waves-effect waves-light btn" href="#modal1">Agregar Rol </a>

  <!-- Modal Structure -->
  <div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">

          <article class="col-md-8 col-md-offset-1">
    <div class="card-panel2 hoverable2">

        <div class="panel panel-heading"><center><h1>Agregar Rol</h1></center></div>
          <section>
            <div class="row">
                <div class='col s5 col-half'>
                   <div class="input-group input-group-icon">
                        <h4 >{!! Form::label('full_name','Rol',['class'=>'label']) !!} </h4>
                          {!! Form::select('fkRol',$rol, null, ['class' => 'input-lg', 'required' => 'required','id'=>'selectRol']) !!}
                            @if ($errors->has('fkRol'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('fkRol') }}</strong>
                                  </span>
                            @endif
                      </div>
                  </div>          
                <div class=" col s5 col-half">
                   <div  id="separadorb" class=""> 
                </div>
                  <article class="col s5 col-half">
                    <button id="btnAdd" type="button" class="btn btn-success">Agregar Rol</button> 
                  </article>
                </div>
                  <article class="row">
                    <table class="bordered highlight responsive-table tabla">
                      <thead>
                        <th>Id</th>
                        <th>Rol</th>
                      </thead>
                        <tbody id="cargaDetalle">
                        </tbody>
                    </table>
                  </article> 
              </div>
               <div class="row">      
                <div class='col s5 col-half'>
                        <div class="input-group input-group-icon">
                        <h4 >{!! Form::label('full_name','Titulo',['class'=>'label']) !!} </h4>
                          {!! Form::select('Titulo',$titulo, null, ['class' => 'input-lg', 'required' => 'required','id'=>'selecttitulo']) !!}
                            @if ($errors->has('Titulo'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('Titulo') }}</strong>
                                  </span>
                            @endif
                      </div>
                </div>
                <div  id="separadorb" class=""> 
                </div>
                  <article class="col s5 col-half">
                    <button id="btnAddt" type="button" class="btn btn-success">Agregar Titulo</button> 
                  </article>
                </div>
                  <article class="row">
                    <table class="bordered highlight responsive-table tabla">
                      <thead>
                        <th>Id</th>
                        <th>Titulo</th>
                      </thead>
                      <tbody id="cargaDetallet">
                      </tbody>
                    </table>
                  </article> 
          </section>
            </article>

    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Cerrar</a>
    </div>
  </div>

            </div>       
      
              <div class="row">
                  <div class="col s5 col-half">
                    <div class=" input-group">
                         
                     {!! Form::submit('Enviar',['class' => 'btn btn-success','id' => 'btnRegistrar']) !!} 
                
                      <a type="button" class="waves-effect waves-red btn-flat" href="{{ url('/empleado') }}">Volver</a>  
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