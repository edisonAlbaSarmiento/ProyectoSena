@extends('layouts.app2')
@section('content')
@foreach ($rolsEmpleado as $roles)
<section class"container">
  <section class"row">
    <article class="col-md-8 col-md-offset-1">
      <div class="card-panel1 hoverable1" >
        <div class="panel panel-heading"><center><h1>Crear Aprendiz</h1></center></div>
          <HR width=100% align="left">
          @if ($roles->nombrerol == 'Instructor')
            {!! Form::open(['route' => 'aprendizI.store','method' => 'post','novalidate'])!!}
          @endif
          @if ($roles->nombrerol == 'Lider Articulacion')
           {!! Form::open(['route' => 'empleado/store','method' => 'post','novalidate','id'=>'formNewEntrada'])!!}
            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="tokenNewEntrada">
          @endif
          <section>
            <div class="row">
               <div class="col s5 col-half">
                  <h4>{!! Form::label('nombreaprendiz','Nombre ',['class'=>'label'])!!}</h4>
                   <div class="input-group input-group-icon">
                      {!! Form::text('nombreaprendiz',null,['class' => 'input-lg','onKeyUp' => 'validar(this)','required' => 'required','id'=>'nombreaprendiz','onkeypress' =>'return Validacionletras(event)'])!!}
                      <div class="input-icon"><i class="fa fa-user"></i></div>                  
              
                  </div>
                </div>          
                <div class=" col s5 col-half">
                    <h4>{!! Form::label('apellido','Apellido',['class'=>'label'])!!}</h4>
                      <div class="input-group input-group-icon">
                         {!! Form::text('apellido',null,['class' => 'input-lg','onKeyUp' => 'validar(this)','required' => 'required','id'=>'apellido','onkeypress' =>'return Validacionletras(event)']) !!}
                            <div class="input-icon"><i class="fa fa-user"></i></div>
                      
                       </div>
                   </div>
              </div>
              <div class="row">
                 <div class="col s5 col-half">   
                  <h4>{!! Form::label('fkFicha', 'Ficha',['class'=>'label']) !!}</h4>                
                  {!! Form::select('fkFicha',$ficha, null, ['class' => 'input-lg','onKeyUp' => 'validar(this)', 'required' => 'required','id'=>'fkFicha']) !!}      
                         @if ($errors->has('fkFicha'))
                            <span class="help-block">
                                <strong>{{ $errors->first('fkFicha') }}</strong>
                            </span>
                        @endif
                 </div>                      
                 <div class="col s5 col-half"> 
                    <div class="input-group input-group-icon">
                        <h4>{!! Form::label('fkTipoDoc', 'Tipo Documento',['class'=>'label']) !!}</h4>
                        {!! Form::select('fkTipoDoc',$tipodoc, null, ['class' => 'input-lg', 'required' => 'required','id'=>'fkTipoDoc']) !!}

                        @if ($errors->has('fkTipoDoc'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('fkTipoDoc') }}</strong>
                              </span>
                        @endif
                    </div>
                 </div> 
              </div>                
              <div class="row">
                <div class="col s5 col-half">
                  <h4>{!! Form::label('identificacion','Identificacion',['class'=>'label'])!!}</h4>
                      <div class="input-group input-group-icon">
                        {!! Form::number('identificacion',null,['class' => 'input-lg', 'required' => 'required','id'=>'identificacion'])!!} 
                        <div class="input-icon"><i class="fa fa-credit-card"></i></div>                       
                            @if ($errors->has('identificacion'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('identificacion') }}</strong>
                                  </span>
                            @endif
                    </div>
                </div>           
                <div class="col s5 col-half">
                  <h4>{!! Form::label('correo','Correo',['class'=>'label'])!!}</h4>
                    <div id="email" class="input-group input-group-icon">
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
              <div class="row">
                  <div class="col s5 col-half">
                      <div class="input-group input-group-icon">
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
                  </div>
                  <div class="col s5 col-half">
                     <div class="input-group input-group-icon">
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
              </div>
              <div class="row">
                <div class="col s5 col-half">
                  <div class="input-group input-group-icon">
                    <h4>{!! Form::label('direccion','Direccion',['class'=>'label'])!!}</h4>
                     <div class="input-group input-group-icon">
                      {!! Form::text('direccion',null,['class' => 'input-lg', 'required' => 'required','id'=>'direccion'])!!}
                       <div class="input-icon"><i class="fa fa-home"></i></div>
                          @if ($errors->has('direccion'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('direccion') }}</strong>
                                </span>
                          @endif
                    </div> 
                  </div>
                </div>
                <div class="col s5 col-half" id="estado">
                    <div class="input-group input-group-icon">
                        <h4 >{!! Form::label('fkEstado', 'Estado',['class'=>'label']) !!}</h4>
                          {!! Form::select('fkEstadoAprendiz',$estado, null, ['class' => 'input-lg', 'required' => 'required','id'=>'fkEstadoAprendiz']) !!}
                            @if ($errors->has('fkEstadoAprendiz'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('fkEstadoAprendiz') }}</strong>
                                  </span>
                            @endif
                    </div>
                </div>
            </div>
            <div class="row">            
              <div class="col s5 col-half">
                <div class="input-group input-group-icon">
                    <h4>{!! Form::label('fkModalidad', 'Modalidad',['class'=>'label']) !!}</h4>
                        {!! Form::select('fkModalidad',$modalidad, null, ['class' => 'input-lg', 'required' => 'required','id'=>'fkModalidad']) !!}
                          @if ($errors->has('fkModalidad'))
                            <span class="help-block">
                                <strong>{{ $errors->first('fkModalidad') }}</strong>
                            </span>
                          @endif
                </div>
              </div>
             </div>
             <div class="row">
                <div class='col s5 col-half'>
                    {!! Form::label('full_name','Entidad') !!}
                    {!! Form::select('Entidad',$entidad, null,['class' =>'input-lg','required' =>'required','id' =>'selectenti' ]) !!}
                       @if ($errors->has('Entidad'))
                  <span>
                    <strong>{{$errors->first('Entidad') }}</strong>
                  </span>
                      @endif
                </div>
                <div  id="separadorb" class=""> 
                </div>
                  <article class="col s5 col-half">
                    <button id="btnAdd" type="button" class="btn btn-success">Agregar Entidad</button> 
                  </article>
                </div>
                  <article class="row">
                    <table class="responsive-table bordered highlight table">
                      <thead>
                        <th>Id</th>
                        <th>entidad</th>
                      </thead>
                      <tbody id="cargaDetalle">
                      </tbody>
                    </table>
                  </article>
                  <div class="row"> 
                <div class='col s5 col-half'>
                    {!! Form::label('full_name','Titulo') !!}
                    {!! Form::select('Titulo',$titulo, null,['class' =>'input-lg','required' =>'required','id' =>'selecttitulo' ]) !!}
                       @if ($errors->has('Titulo'))
                  <span>
                    <strong>{{$errors->first('Titulo') }}</strong>
                  </span>
                      @endif
                </div>
                <div  id="separadorb" class=""> 
                </div>
                  <article class="col s5 col-half">
                    <button id="btnAddt" type="button" class="btn btn-success">Agregar Titulo</button> 
                  </article>
                </div>
                  <article class="row">
                    <table class="responsive-table bordered highlight table">
                      <thead>
                        <th>Id</th>

                        <th>Titulo</th>
                      </thead>
                      <tbody id="cargaDetallet">
                      </tbody>
                    </table>
                  </article>     
        
              <div class="row">            
               <div class="col s5 col-half">
                  <div class=" input-group">
                    {!! Form::submit('Enviar',['class' => 'btn btn-success','id' => 'btnRegistrarenti']) !!} 
                    @if ($roles->nombrerol == 'Instructor')
                      <a type="button" class="waves-effect waves-red btn-flat"href="{{ url('/aprendizI') }}">Volver</a>
                      @endif
                      @if ($roles->nombrerol == 'Lider Articulacion')
                      <a type="button" class="waves-effect waves-red btn-flat"href="{{ url('/aprendiz') }}">Volver</a>
                      @endif
                      @if ($roles->nombrerol == 'Instructor Lider Area')
                      <a type="button" class="waves-effect waves-red btn-flat"href="{{ url('/aprendizLA') }}">Volver</a>
                      @endif
                      @if ($roles->nombrerol == 'Instructor Etapa productiva')
                      <a type="button" class="waves-effect waves-red btn-flat"href="{{ url('/aprendizE') }}">Volver</a>
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