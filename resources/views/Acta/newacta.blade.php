@extends('layouts.app2')<!--Extendemos de nuestro layouts que es la vista principal-->
@section('content')<!--creamos una seccion para mostrar lo que esta en la vista llamada content-->
@foreach ($rolsEmpleado as $roles) <!--creamos una condicion para la validacion de vistas y tener la seguridad-->
<section class"container">
  <section class"row">
    <article class="col-md-8 col-md-offset-1">
      <div class="card-panel1 hoverable1">
        <div class="panel panel-heading"><center><h1>Crear Acta</h1></center></div>
          <HR width=100% align="top">
          
          @if ($roles->nombrerol == 'Instructor Lider Area') 
              {!! Form::open(['route' => 'actaLA.store','method' => 'post','novalidate'])!!}
          @endif

          @if ($roles->nombrerol == 'Lider Articulacion')
               {!! Form::open(['route' => 'acta/store','method' => 'post','novalidate','id'=>'formNewEntrada'])!!}
               <input type="hidden" name="_token" value="{{ csrf_token() }}" id="tokenNewEntrada">
          @endif

          @if ($roles->nombrerol == 'Instructor')
              {!! Form::open(['route' => 'actaI.store','method' => 'post','novalidate'])!!}
          @endif

          @if ($roles->nombrerol == 'Instructor Etapa Productiva')
              {!! Form::open(['route' => 'actaE.store','method' => 'post','novalidate'])!!}
          @endif
              <section>
                <ul class="collapsible popout" data-collapsible="accordion">
                  <li>
                    <div class="collapsible-header"><i class="material-icons">assignment</i>Encabezado Acta</div>
                      <div class="collapsible-body">
                        <div class="row">
                         <div class=" col s5 col-half">
                                <h4>{!! Form::label('descripcion','Titulo',['class'=>'label'])!!}</h4>
                                  <div class="input-group input-group-icon">
                                      {!! Form::text('descripcion',null,['class' => 'input-lg','onKeyUp' => 'validar(this)', 'required' => 'required','id' => 'descripcion'])!!}
                                      <div class="input-icon"><i class="fa fa-book"></i></div>
                                        @if ($errors->has('descripcion'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('descripcion') }}</strong>
                                            </span>
                                        @endif
                                  </div>
                               </div>
                          <div class="col s5 col-half">  
                            <h4> {!! Form::label('fecha', 'Fecha ',['class'=>'label']) !!}</h4>
                            <div class="input-group input-group-icon">
                                  {!! Form::text('fecha', null, ['type'=> 'date' ,'class' => 'datepicker','onKeyUp' => 'validar(this)', 'required' => 'required','id' => 'fecha']) !!}
                                  <div class="input-icon"><i class="fa fa-clock-o"></i></div>
                                  @if ($errors->has('fecha'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('fecha') }}</strong>
                                      </span>
                                    @endif
                              </div>
                            </div>         
                          </div>
                          <div class="row">
                            <div class="col s6 col-half">
                              <h4>{!! Form::label('fkTipoActa','Tipo Acta',['class'=>'label']) !!}</h4>
                                {!! Form::select('fkTipoActa',$tipoacta, ['class' => 'input-lg','onKeyUp' => 'validar(this)', 'required' => 'required','id' => 'fkTipoActa']) !!}
                                  @if ($errors->has('fkTipoActa'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('fkTipoActa') }}</strong>
                                      </span>
                                  @endif
                            </div> 

                             <div class="col s6 col-half">  
                               <h4> {!! Form::label('HoraInicio','Hora Inicio',['class'=>'label'])!!}</h4>
                                  <div class="input-group input-group-icon">
                                    {!! Form::time('HoraInicio',null,['class' => 'input-lg','onKeyUp' => 'validar(this)', 'required' => 'required','id' => 'HoraInicio'])!!}
                                     <div class="input-icon"><i class="fa fa-clock-o"></i></div>
                                      @if ($errors->has('HoraInicio'))
                                          <span class="help-block">
                                              <strong>{{ $errors->first('HoraInicio') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                             </div>                      
                             <div class="col s5 col-half"> 
                                <h4>{!! Form::label('HoraFin','HoraFin',['class'=>'label'])!!}</h4>
                                  <div class="input-group input-group-icon">
                                     {!! Form::time('HoraFin',null,['class' => 'input-lg ','onKeyUp' => 'validar(this)', 'required' => 'required','id' => 'HoraFin'])!!}
                                        <div class="input-icon"><i class="fa fa-clock-o"></i></div>
                                        @if ($errors->has('HoraFin'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('HoraFin') }}</strong>
                                            </span>
                                        @endif
                                  </div>
                             </div> 
                          </div>
                      </div>
                  </li>
                </ul>
                <ul class="collapsible popout" data-collapsible="accordion">
                  <li>
                    <div class="collapsible-header"><i class="material-icons">assignment</i>Temas y Objetivos</div>
                      <div class="collapsible-body">                   
                          <div class="row">
                            <div class="col s12 ">
                                <h4> {!! Form::label('temas','Temas',['class'=>'label'])!!}</h4>
                                  <div class="input-group input-group-icon">
                                      {!! Form::textarea('temas',null,['class' => 'input-lg materialize-textarea','onKeyUp' => 'validar(this)', 'required' => 'required','id' => 'temas'])!!}
                                        @if ($errors->has('temas'))
                                          <span class="help-block">
                                              <strong>{{ $errors->first('temas') }}</strong>
                                          </span>
                                        @endif
                                  </div>
                                </div>           
                            <div class="col s12 ">
                              <h4>{!! Form::label('Objetivo','Objetivos',['class'=>'label'])!!}</h4>
                                <div class="input-group input-group-icon">
                                   {!! Form::textarea('objetivo',null,['class' => 'input-lg materialize-textarea', 'onKeyUp' => 'validar(this)','required' => 'required','id' => 'objetivo'])!!}
                                      @if ($errors->has('objetivo'))
                                          <span class="help-block">
                                              <strong>{{ $errors->first('objetivo') }}</strong>
                                          </span>
                                      @endif
                                </div>
                            </div>
                          </div>
                      </div>
                  </li>
                </ul>  
                <ul class="collapsible popout" data-collapsible="accordion">
                  <li>
                    <div class="collapsible-header"><i class="material-icons">assignment</i>Desarrollo y Conclusion</div>
                      <div class="collapsible-body"> 
                          <div class="row">
                              <div class="col s12 ">
                                  <h4> {!! Form::label('desarrolloreunion','Desarrollo Reunion',['class'=>'label'])!!}</h4>
                                    <div class="input-group input-group-icon">
                                      {!! Form::textarea('desarrolloreunion',null,['class' => 'input-lg materialize-textarea','onKeyUp' => 'validar(this)', 'required' => 'required','id' => 'desarrolloreunion'])!!}
                                          @if ($errors->has('desarrolloreunion'))
                                              <span class="help-block">
                                                  <strong>{{ $errors->first('desarrolloreunion') }}</strong>
                                              </span>
                                          @endif
                                     </div>                          
                              </div>
                              <div class="col s12 ">
                                  <h4> {!! Form::label('conclusion','Conclusion',['class'=>'label'])!!}</h4>
                                   <div class="input-group input-group-icon">
                                       {!! Form::textarea('conclusion',null,['class' => 'input-lg materialize-textarea', 'onKeyUp' => 'validar(this)','required' => 'required','id' => 'conclusion'])!!}
                                          @if ($errors->has('conclusion'))
                                              <span class="help-block">
                                                  <strong>{{ $errors->first('conclusion') }}</strong>
                                              </span>
                                          @endif
                                    </div>
                              </div>
                          </div>
                      </div>
                  </li>
                </ul>   
                <ul class="collapsible popout" data-collapsible="accordion">
                  <li>
                    <div class="collapsible-header"><i class="material-icons">assignment</i>Enviar</div>
                      <div class="collapsible-body">   
                        <div class="row">
                          <div class="col s6 col-half">
                              <h4> {!! Form::label('archivoadjunto','ArchivoAdjunto',['class'=>'label'])!!}</h4>
                                <div class="input-group input-group-icon">        
                                     {!! Form::file('archivoadjunto',null,['class' => 'form-control','onKeyUp' => 'validar(this)', 'required' => 'required','id' => 'archivoadjunto'])!!}
                                </div>
                          </div> 
                          <div class="col s5 col-half" id="estado">
                              <div class="input-group input-group-icon">
                                <h4> {!! Form::label('fkEstado', 'Estado',['class'=>'label']) !!}</h4>
                                     {!! Form::select('fkEstado',$estado, null, ['class' => 'input-lg','required' => 'required','id'=>'fkEstado']) !!}
                                    @if ($errors->has('fkEstado'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('fkEstado') }}</strong>
                                        </span>
                                    @endif
                              </div>
                          </div>
          
                      <ul>
                      @if ($roles->nombrerol == 'Instructor')       
                        <li><a href="{{ route('compromisoI/create') }} " class="btn-floating green btn-large waves-effect waves-light tooltipped" data-position="bottom" data-delay="50" data-tooltip="Agregar Compromiso" class="btn-floating red"><i class="fa fa-wpforms" aria-hidden="true"></i></a></li>
                        <li><a href="{{ route('asistentesI.create') }} " class="btn-floating yellow darken-1 btn-large waves-effect waves-light tooltipped" data-position="bottom" data-delay="50" data-tooltip="Agregar Asistentes" ><i class="fa fa-wpforms" aria-hidden="true"></i></a></li>
                        <li><a href="{{ route('invitadosI.create') }} "  class="btn-floating red btn-large waves-effect waves-light tooltipped" data-position="bottom" data-delay="50" data-tooltip="Agregar Invitados" ><i class="fa fa-wpforms" aria-hidden="true"></i></a></li>
                        @endif
                        @if ($roles->nombrerol == 'Lider Articulacion')       
                        <li><a href="{{ route('compromiso.create') }} " class="btn-floating green btn-large waves-effect waves-light tooltipped" data-position="bottom" data-delay="50" data-tooltip="Agregar Compromiso" class="btn-floating red"><i class="fa fa-wpforms" aria-hidden="true"></i></a></li>
                        <li><a href="{{ route('asistentes.create') }} " class="btn-floating yellow darken-1 btn-large waves-effect waves-light tooltipped" data-position="bottom" data-delay="50" data-tooltip="Agregar Asistentes" ><i class="fa fa-wpforms" aria-hidden="true"></i></a></li>
                        <li><a href="{{ route('invitados.create') }} "  class="btn-floating red btn-large waves-effect waves-light tooltipped" data-position="bottom" data-delay="50" data-tooltip="Agregar Invitados" ><i class="fa fa-wpforms" aria-hidden="true"></i></a></li>
                        @endif
                        @if ($roles->nombrerol == 'Instructor Lider Area')       
                        <li><a href="{{ route('compromisoLA.create') }} " class="btn-floating green btn-large waves-effect waves-light tooltipped" data-position="bottom" data-delay="50" data-tooltip="Agregar Compromiso" class="btn-floating red"><i class="fa fa-wpforms" aria-hidden="true"></i></a></li>
                        <li><a href="{{ route('asistentesLA.create') }} " class="btn-floating yellow darken-1 btn-large waves-effect waves-light tooltipped" data-position="bottom" data-delay="50" data-tooltip="Agregar Asistentes" ><i class="fa fa-wpforms" aria-hidden="true"></i></a></li>
                        <li><a href="{{ route('invitadosLA.create') }} "  class="btn-floating red btn-large waves-effect waves-light tooltipped" data-position="bottom" data-delay="50" data-tooltip="Agregar Invitados" ><i class="fa fa-wpforms" aria-hidden="true"></i></a></li>
                        @endif
                        @if ($roles->nombrerol == 'Instructor Etapa Productiva')       
                        <li><a href="{{ route('compromisoE.create') }} " class="btn-floating green btn-large waves-effect waves-light tooltipped" data-position="bottom" data-delay="50" data-tooltip="Agregar Compromiso" class="btn-floating red"><i class="fa fa-wpforms" aria-hidden="true"></i></a></li>
                        <li><a href="{{ route('asistentesE.create') }} " class="btn-floating yellow darken-1 btn-large waves-effect waves-light tooltipped" data-position="bottom" data-delay="50" data-tooltip="Agregar Asistentes" ><i class="fa fa-wpforms" aria-hidden="true"></i></a></li>
                        <li><a href="{{ route('invitadosE.create') }} "  class="btn-floating red btn-large waves-effect waves-light tooltipped" data-position="bottom" data-delay="50" data-tooltip="Agregar Invitados" ><i class="fa fa-wpforms" aria-hidden="true"></i></a></li>
                        @endif
                      </ul>
   <div class="col s5 col-half">  
                <!-- Modal Trigger -->
  <a class="modal-trigger waves-effect waves-light btn" href="#modal1">Agregar Ambiente </a>

  <!-- Modal Structure -->
  <div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">

          <article class="col-md-8 col-md-offset-1">
    <div class="collapsible-div">sdsd</div>
        <div class="panel panel-heading"><center><h1>Agregar Ambiente</h1></center></div>
          <section>
            <div class="row">
                <div class='col s5 col-half'>
                   <div class="input-group input-group-icon">
                        <h4 >{!! Form::label('full_name','Ambiente',['class'=>'label']) !!} </h4>
                          {!! Form::select('fkAmbiente',$ambientes, null, ['class' => 'input-lg', 'required' => 'required','id'=>'selectAmbiente']) !!}
                            @if ($errors->has('fkAmbiente'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('fkAmbiente') }}</strong>
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
                        <th>Ambiente</th>
                      </thead>
                        <tbody id="cargaDetalle">
                        </tbody>
                    </table>
                  </article> 
              </div>


          </section>
            </article>

    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Cerrar</a>
    </div>
  </div>

            </div>     


                    </div>
                        <div class="row">
                          <div class="col s6 col-half">
                            <div class=" input-group">
                               {!! Form::submit('Enviar',['class' => 'btn btn-success','id' => 'btnRegistrarAmbiente']) !!} 
                                @if ($roles->nombrerol == 'Instructor')
                                <a type="button" class="waves-effect waves-red btn-flat"href="{{ url('/actaI') }}">Volver</a>
                                @endif
                                @if ($roles->nombrerol == 'Lider Articulacion')
                                <a type="button" class="waves-effect waves-red btn-flat"href="{{ url('/acta') }}">Volver</a>
                                @endif
                                @if ($roles->nombrerol == 'Instructor Lider Area')
                                <a type="button" class="waves-effect waves-red btn-flat"href="{{ url('/actaLA') }}">Volver</a>
                                @endif
                                @if ($roles->nombrerol == 'Instructor Etapa productiva')
                                <a type="button" class="waves-effect waves-red btn-flat"href="{{ url('/actaE') }}">Volver</a>
                                @endif
                            </div>
                          </div>
                        </div>
                      </div>
                      <!--Menu para agregar-->
                    
                  
                 
                  </li>
                </ul>
            </section>
          <HR width=100% align="left">
        {!! Form::close()!!}
        </div>
      </article>
    </section>
  </section>
@endforeach
@endsection