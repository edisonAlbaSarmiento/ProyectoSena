@extends('layouts.app2')
@section('content')
<section class"container">
  <section class"row">
    <article class="col-md-8 col-md-offset-1">
      <div class="card-panel1 hoverable1">
        <div class="panel panel-heading"><center><h1>Crear Formato de Seguimiento Etapa Productiva</h1></center></div>
          <HR width=100% align="top">
           {!! Form::open(['route' => 'bitacora.store','method' => 'post','novalidate'])!!}
              <section>
                <ul class="collapsible popout" data-collapsible="accordion">
                  <li>
                    <div class="collapsible-header"><i class="material-icons">assignment</i>Encabezado Bictacora</div>
                      <div class="collapsible-body">
                        <div class="row">
                           <div class="col s5 col-half">
                              <h4>{!! Form::label('Regional','Regional',['class'=>'label']) !!}</h4>
                                <div class="input-group input-group-icon">
	                                {!! Form::text('regional',null, ['class' => 'input-lg','onKeyUp' => 'validar(this)', 'required' => 'required','onkeypress' =>'return Validacionletras(event)']) !!}
	                                <div class="input-icon"><i class="fa fa-user"></i></div> 
	                                  @if ($errors->has('regional'))
	                                      <span class="help-block">
	                                          <strong>{{ $errors->first('regional') }}</strong>
	                                      </span>
	                                  @endif
                            	</div>
                            </div>          
	                        <div class="col s5 col-half">   
			                  <h4>{!! Form::label('centro', 'Centro',['class'=>'label']) !!}</h4>                
		                 	 {!! Form::select('fkCentro',$centro, null, ['class' => 'input-lg','onKeyUp' => 'validar(this)', 'required' => 'required']) !!}      
		                         @if ($errors->has('fkCentro'))
		                            <span class="help-block">
		                                <strong>{{ $errors->first('fkCentro') }}</strong>
		                            </span>
		                        @endif
	                 		</div> 
                        </div>
                          <div class="row">
                            <div class="col s5 col-half">   
			                  <h4>{!! Form::label('programa', 'Programa',['class'=>'label']) !!}</h4>                
		                 		 {!! Form::select('fkPrograma',$programa, null, ['class' => 'input-lg','onKeyUp' => 'validar(this)', 'required' => 'required']) !!}      
		                         @if ($errors->has('fkPrograma'))
		                            <span class="help-block">
		                                <strong>{{ $errors->first('fkPrograma') }}</strong>
		                            </span>
		                        @endif
	                 		</div>           
                            <div class="col s5 col-half">   
			                  <h4>{!! Form::label('ficha', 'Ficha',['class'=>'label']) !!}</h4>                
		                 		 {!! Form::select('fkFicha',$ficha, null, ['class' => 'input-lg','onKeyUp' => 'validar(this)', 'required' => 'required']) !!}      
		                         @if ($errors->has('fkFicha'))
		                            <span class="help-block">
		                                <strong>{{ $errors->first('fkFicha') }}</strong>
		                            </span>
		                        @endif
	                 		</div>
                          </div>
                      </div>
                  </li>
                </ul>
                <ul class="collapsible popout" data-collapsible="accordion">
                  <li>
                    <div class="collapsible-header"><i class="material-icons">assignment</i>Informacion Aprendiz</div>
                      <div class="collapsible-body">                   
                          <div class="row">
                            <div class="col s5 col-half">
			                  <h4>{!! Form::label('nombreaprendiz','Nombre Aprendiz ',['class'=>'label'])!!}</h4>
			                   	<div class="input-group input-group-icon">
			                      {!! Form::text('nombreaprendiz',null,['class' => 'input-lg','onKeyUp' => 'validar(this)','required' => 'required','id'=>'nombreaprendiz','onkeypress' =>'return Validacionletras(event)'])!!}
			                      <div class="input-icon"><i class="fa fa-user"></i></div>                  
			                        @if ($errors->has('nombreaprendiz'))
			                            <span class="help-block">
			                                <strong>{{ $errors->first('nombreaprendiz') }}</strong>
			                            </span>
			                        @endif
			                  	</div>
			                </div>           
			                <div class=" col s5 col-half">
			                  <h4>{!! Form::label('apellido','Apellido',['class'=>'label'])!!}</h4>
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
			                  <h4>{!! Form::label('tipodocumento', 'Tipo Documento',['class'=>'label']) !!}</h4>                
		                 		 {!! Form::select('fkTipoDoc',$tipodocumento, null, ['class' => 'input-lg','onKeyUp' => 'validar(this)', 'required' => 'required']) !!}      
		                         @if ($errors->has('fkTipoDoc'))
		                            <span class="help-block">
		                                <strong>{{ $errors->first('fkTipoDoc') }}</strong>
		                            </span>
		                        @endif
	                 		</div>          
			                <div class=" col s5 col-half">
			                  <h4>{!! Form::label('identificacion','Identificacion',['class'=>'label'])!!}</h4>
			                    <div class="input-group input-group-icon">
			                         {!! Form::number('identificacion',null,['class' => 'input-lg','onKeyUp' => 'validar(this)', 'required' => 'required'])!!}
		                            <div class="input-icon"><i class="fa fa-credit-card"></i></div>
		                              @if ($errors->has('identificacion'))
		                                  <span class="help-block">
		                                      <strong>{{ $errors->first('identificacion') }}</strong>
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
                    <div class="collapsible-header"><i class="material-icons">assignment</i>Aprendiz</div>
                     <div class="collapsible-body"> 
	                    <div class="row">
	                        <div class="col s5 col-half">												
			                  <h4>{!! Form::label('telefonoaprendiz','Telefono del Aprendiz',['class'=>'label'])!!}</h4>
			                   	<div class="input-group input-group-icon">
			                      {!! Form::number('telefonoaprendiz',null,['class' => 'input-lg','onKeyUp' => 'validar(this)','required' => 'required'])!!}
			                      <div class="input-icon"><i class="fa fa-hashtag"></i></div>                  
			                        @if ($errors->has('telefonoaprendiz'))
			                            <span class="help-block">
			                                <strong>{{ $errors->first('telefonoaprendiz') }}</strong>
			                            </span>
			                        @endif
			                  	</div>
			                </div>           
			                <div class=" col s5 col-half">
			                  <h4>{!! Form::label('correo','Correo',['class'=>'label'])!!}</h4>
			                    <div id="email" class="input-group input-group-icon">
			                         {!! Form::email('correo',null,['class' => 'input-lg','onKeyUp' => 'validar(this)', 'required' => 'required'])!!}
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
			                  <h4>{!! Form::label('razonsocial','Razon Social',['class'=>'label'])!!}</h4>
			                   	<div class="input-group input-group-icon">
			                      {!! Form::text('razonsocial',null,['class' => 'input-lg','onKeyUp' => 'validar(this)','required' => 'required'])!!}
			                      <div class="input-icon"><i class="fa fa-home"></i></div>                  
			                        @if ($errors->has('razonsocial'))
			                            <span class="help-block">
			                                <strong>{{ $errors->first('razonsocial') }}</strong>
			                            </span>
			                        @endif
			                  	</div>
			                </div>
			                <div class=" col s4 col-half">
			                  <h4>{!! Form::label('direccionempresa','Direccion Empresa',['class'=>'label'])!!}</h4>
			                    <div  class="input-group input-group-icon">
			                         {!! Form::text('direccionempresa',null,['class' => 'input-lg','onKeyUp' => 'validar(this)', 'required' => 'required'])!!}
		                            <div class="input-icon"><i class="fa fa-user"></i></div>
		                              @if ($errors->has('direccionempresa'))
		                                  <span class="help-block">
		                                      <strong>{{ $errors->first('direccionempresa') }}</strong>
		                                  </span>
		                              @endif
			                    </div>
			                </div>           
			                <div class=" col s5 col-half">
			                  <h4>{!! Form::label('nit','Nit',['class'=>'label'])!!}</h4>
			                    <div class="input-group input-group-icon">
			                         {!! Form::number('nit',null,['class' => 'input-lg','onKeyUp' => 'validar(this)', 'required' => 'required'])!!}
		                            <div class="input-icon"><i class="fa fa-user"></i></div>
		                              @if ($errors->has('nit'))
		                                  <span class="help-block">
		                                      <strong>{{ $errors->first('nit') }}</strong>
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
                    <div class="collapsible-header"><i class="material-icons">assignment</i>Responsable</div>
                      <div class="collapsible-body">   
	                    <div class="row">
	                        <div class="col s5 col-half">											
			                  <h4>{!! Form::label('nombreresponsable','Nombre Responsable',['class'=>'label'])!!}</h4>
			                   	<div class="input-group input-group-icon">
			                      {!! Form::text('nombreresponsable',null,['class' => 'input-lg','onKeyUp' => 'validar(this)','required' => 'required','onkeypress' =>'return Validacionletras(event)'])!!}
			                      <div class="input-icon"><i class="fa fa-user"></i></div>                  
			                        @if ($errors->has('nombreresponsable'))
			                            <span class="help-block">
			                                <strong>{{ $errors->first('nombreresponsable') }}</strong>
			                            </span>
			                        @endif
			                  	</div>
			                </div>           
			                <div class=" col s5 col-half">
			                  <h4>{!! Form::label('cargo','Cargo',['class'=>'label'])!!}</h4>
			                    <div  class="input-group input-group-icon">
			                         {!! Form::text('cargo',null,['class' => 'input-lg','onKeyUp' => 'validar(this)', 'required' => 'required','onkeypress' =>'return Validacionletras(event)'])!!}
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
			                  <h4>{!! Form::label('telefonoempresa','Telefono Empresa',['class'=>'label'])!!}</h4>
			                   	<div class="input-group input-group-icon">
			                      {!! Form::number('telefonoempresa',null,['class' => 'input-lg','onKeyUp' => 'validar(this)','required' => 'required'])!!}
			                      <div class="input-icon"><i class="fa fa-hashtag"></i></div>                  
			                        @if ($errors->has('telefonoempresa'))
			                            <span class="help-block">
			                                <strong>{{ $errors->first('telefonoempresa') }}</strong>
			                            </span>
			                        @endif
			                  	</div>
			                </div>           
			                <div class=" col s5 col-half">
			                  <h4>{!! Form::label('emailempresa','Email Empresa',['class'=>'label'])!!}</h4>
          						<div id="email" class="input-group input-group-icon">
			                         {!! Form::email('emailempresa',null,['class' => 'input-lg','onKeyUp' => 'validar(this)', 'required' => 'required'])!!}
		                            <div class="input-icon"><i class="fa fa-envelope"></i></div>
		                              @if ($errors->has('emailempresa'))
		                                  <span class="help-block">
		                                      <strong>{{ $errors->first('emailempresa') }}</strong>
		                                  </span>
		                              @endif
		                              <span id="emailOK"></span>
			                    </div>
			                </div>
                  		</div>
                        <div class="row">
                       		<div class="col s6 col-half"> 
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
				             
		                </div>   
		                <div class="row">	
                          	<div class="col s6 col-half">
	                            <div class=" input-group">
	                              {!! Form::submit('Enviar',['class' => 'btn waves-effect waves-light'])!!}
	                                <a type="button" class="waves-effect waves-red btn-flat"href="{{ url('/bitacora') }}">Volver</a>
	                            </div>
                          </div>
                        </div>
                      </div>
                  </li>
                </ul>
                <a href="{{ route('actividades.create') }} " class="btn-floating yellow darken-1 btn-large waves-effect waves-light tooltipped" data-position="bottom" data-delay="50" data-tooltip="Agregar Actividad"><i class="material-icons">add</i></a>   
            </section>
          <HR width=100% align="left">
        {!! Form::close()!!}
        </div>
      </article>
    </section>
  </section>
@endsection

