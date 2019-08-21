@extends('layouts.app2')
@section('content')
       @if(count($rolsEmpleado) != 0) 
            @foreach($rolsEmpleado as $rol)
                @if($rol->nombrerol == 'Lider Articulacion')
                          <!--menu-->
                  <header class="morph-dropdown">
                    <a href="#0" class="nav-trigger">Open Nav<span class="nav-trigger-bar" aria-hidden="true"></span></a>
                      <nav class="main-nav">
                        <ul>
                          <li class="has-dropdown links" data-content="pricing">
                            <a href="#0" tabindex="6"><i class=" medium material-icons" style="color: #212121" >account_box</i></a>
                          </li>
                          <li class="has-dropdown gallery" data-content="about">
                            <a href="#0" tabindex="1"><i class=" medium material-icons"  style="color: #212121">assignment</i></a>
                          </li>
                          <li class="has-dropdown button" data-content="contact">
                            <a href="#0" tabindex="23"><i class="medium material-icons"  style="color: #212121">settings_applications</i></a>
                          </li>
                        </ul>
                      </nav>
                      <div class="morph-dropdown-wrapper">
                        <div class="dropdown-list">
                            <ul>
                              <li id="pricing" class="dropdown links">
                                <a href="#0" class="label">Usuario</a>
                                <div class="content">
                                  <ul>
                                    <h2>Usuario</h2>
                                      <ul class="links-list" style="margin-top: 35px">
                                        <li><a class="waves-effect waves-light modal-trigger" href="#modal1"><img class="circle" src="image/fondo12.jpg"></a></li>
                                        <li><a href="#!name"><span class="white-text name"><b>Instructor Lider Articulacion {{ Auth::user()->name }}</b></span></a></li>
                                        <li><a href="#!email"><span class="white-text email"><b>{{ Auth::user()->email }}</b></span></a></li>
                                        <br>
                                        <li><a class="waves-effect waves-light modal-trigger" href="#modal1" tabindex="8">Actualizar Datos</a></li>
                                      </ul>
                                </div>
                              </li>
                               <!--   -->
                              <li id="about" class="dropdown gallery">
                                <a href="#0" class="label">Usuario</a>
                                  <div class="content">
                                    <ul>                
                                        <li><a href="{{ url('/acta') }}" tabindex="2"><i id="hover color" class=" small material-icons"  style="color: #212121">chrome_reader_mode</i><p id="acta">Acta</p></a></li>
                                        <li><a class="" href="{{ url('/compromiso') }}"><i id="hover" class=" small material-icons"  style="color: #212121">assignment</i><p id="compromiso">Compromisos</p></a></li>
                                        <li><a class="dr-icon dr-icon-fa " href="{{ url('/asistentes') }}"><i id="hover" class=" small material-icons"  style="color: #212121">assignment</i><p id="asistentes">Asistentes</p></a></li>
                                        <li><a class="dr-icon dr-icon-fa " href="{{ url('/invitados') }}"><i id="hover" class=" small material-icons"  style="color: #212121">assignment</i><p id="invitados">Invitados</p></a></li>
                                        <li><a class="dr-icon dr-icon-fa " href="{{ url('/area') }}"><i id="hover" class=" small material-icons"  style="color: #212121">assignment</i><p id="area" >Area</p></a></li>
                                        <li><a class="dr-icon dr-icon-fa " href="{{ url('/ambiente') }}"><i id="hover" class=" small material-icons"  style="color: #212121">assignment</i><p id="ambiente">Ambiente</p></a></li>
                                        <li><a class="dr-icon dr-icon-fa " href="{{ url('/aprendiz') }}"><i id="hover" class=" small material-icons"  style="color: #212121">assignment</i><p  id="aprendiz">Aprendiz</p></a></li>
                                        <li><a class="dr-icon dr-icon-fa " href="{{ url('/entidad') }}"><i id="hover" class=" small material-icons"  style="color: #212121">assignment</i><p id="entidad">Entidad</p></a></li>
                                        <li><a class="dr-icon dr-icon-fa " href="{{ url('/programaformacion') }}"><i id="hover" class=" small material-icons"  style="color: #212121">assignment</i><p id="programa">Programa</p></a></li>
                                        <li><a class="dr-icon dr-icon-fa " href="{{ url('/centroformacion') }}"><i class=" small material-icons"  style="color: #212121">assignment</i><p id="centro">Centro</p></a></li>
                                        <li><a class="dr-icon dr-icon-fa " href="{{ url('/empleado') }}"><i id="hover" class=" small material-icons"  style="color: #212121">assignment</i><p id="empleado">Empleado</p></a></li>
                                        <li><a class="dr-icon dr-icon-fa " href="{{ url('/reportes') }}"><i id="hover" class=" small material-icons"  style="color: #212121">assignment</i><p id="reportes">Reportes</p></a></li>
                                    </ul>
                                  </div>
                              </li>
                              <!--  -->
                              <li id="contact" class="dropdown gallery">
                                <div class="content">
                                  <ul>
                                    <li>
                                      <a href="{{ url('/home') }}" tabindex="24">
                                        <strong>Inicio</strong>
                                      </a>
                                    </li>
                                    <li>
                                      <a href="{{ url('/logout') }}" tabindex="25">
                                        <strong>Salir</strong>
                                      </a>
                                    </li>
                                  </ul>
                                </div>
                              </li>
                            </ul>
                          <div class="bg-layer" aria-hidden="true"></div>
                        </div> <!-- dropdown-list -->
                      </div> <!-- morph-dropdown-wrapper -->
                  </header>
                @endif
                @if($rol->nombrerol == 'Instructor Lider Area')
                                                 <!--menu -->
                  <header class="morph-dropdown">
                    <a href="#0" class="nav-trigger">Open Nav<span class="nav-trigger-bar" aria-hidden="true"></span></a>
                      <nav class="main-nav">
                        <ul>
                          <li class="has-dropdown links" data-content="pricing">
                            <a href="#0" tabindex="6">Usuario</a>
                          </li>
                          <li class="has-dropdown gallery" data-content="about">
                            <a href="#0" tabindex="1">Accion</a>
                          </li>
                          <li class="has-dropdown button" data-content="contact">
                            <a href="#0" tabindex="23">Opciones</a>
                          </li>
                        </ul>
                      </nav>
                      <div class="morph-dropdown-wrapper">
                        <div class="dropdown-list">
                            <ul>
                              <li id="pricing" class="dropdown links">
                                <a href="#0" class="label">Usuario</a>
                                <div class="content">
                                  <ul>
                                    <h2>Usuario</h2>
                                      <ul class="links-list" style="margin-top: 35px">
                                        <li><a class="waves-effect waves-light modal-trigger" href="#modal1"><img class="circle" src="image/fondo12.jpg"></a></li>
                                        <li><a href="#!name"><span class="white-text name"><b>Instructor Area {{ Auth::user()->name }}</b></span></a></li>
                                        <li><a href="#!email"><span class="white-text email"><b>{{ Auth::user()->email }}</b></span></a></li>
                                        <br>
                                        <li><a class="waves-effect waves-light modal-trigger" href="#modal1" tabindex="8">Actualizar Datos</a></li>
                                      </ul>
                                </div>
                              </li>
                               <!--   -->
                              <li id="about" class="dropdown gallery">
                                <a href="#0" class="label">Usuario</a>
                                  <div class="content">
                                    <ul>
                                      <li><a href="{{ url('/acta') }}" tabindex="2">Acta  </a></li>
                                      <li><a class="dr-icon dr-icon-fa fa-fax" href="{{ url('/areaLA') }}">Area</a></li>
                                      <li><a class="dr-icon dr-icon-fa fa-building" href="{{ url('/entidadLA') }}">Entidad</a></li>
                                      <li><a class="dr-icon dr-icon-fa fa-building" href="{{ url('/actaLA') }}">Acta</a></li>
                                      <li><a class="dr-icon dr-icon-fa fa-laptop" href="{{ url('/agendaLA') }}">Agenda</a></li>
                                      <li><a class="dr-icon dr-icon-fa fa-laptop" href="{{ url('/programaformacionLA') }}">Programa </a></li>
                                     <li> <a class="dr-icon dr-icon-fa fa-laptop" href="{{ url('/fichaLA') }}">Ficha</a></li>
                                      <li><a class="dr-icon dr-icon-fa fa-file-o" href="{{ url('/reportesLA') }}">Reportes</a></li>
                                    </ul>
                                  </div>
                              </li>
                              <!--  -->
                              <li id="contact" class="dropdown gallery">
                                <div class="content">
                                  <ul>
                                    <li>
                                      <a href="{{ url('/home') }}" tabindex="24">
                                        <strong>Inicio</strong>
                                      </a>
                                    </li>
                                    <li>
                                      <a href="{{ url('/logout') }}" tabindex="25">
                                        <strong>Salir</strong>
                                      </a>
                                    </li>
                                  </ul>
                                </div>
                              </li>
                            </ul>
                          <div class="bg-layer" aria-hidden="true"></div>
                        </div> <!-- dropdown-list -->
                      </div> <!-- morph-dropdown-wrapper -->
                  </header>
                @endif
                @if($rol->nombrerol == 'Instructor')
                                                <!--menu-->
                  <header class="morph-dropdown">
                    <a href="#0" class="nav-trigger">Open Nav<span class="nav-trigger-bar" aria-hidden="true"></span></a>
                      <nav class="main-nav">
                        <ul>
                          <li class="has-dropdown links" data-content="pricing">
                            <a href="#0" tabindex="6">Usuario</a>
                          </li>
                          <li class="has-dropdown gallery" data-content="about">
                            <a href="#0" tabindex="1">Accion</a>
                          </li>
                          <li class="has-dropdown button" data-content="contact">
                            <a href="#0" tabindex="23">Opciones</a>
                          </li>
                        </ul>
                      </nav>
                      <div class="morph-dropdown-wrapper">
                        <div class="dropdown-list">
                            <ul>
                              <li id="pricing" class="dropdown links">
                                <a href="#0" class="label">Usuario</a>
                                <div class="content">
                                  <ul>
                                    <h2>Usuario</h2>
                                      <ul class="links-list" style="margin-top: 35px">
                                        <li><a class="waves-effect waves-light modal-trigger" href="#modal1"><img class="circle" src="image/fondo12.jpg"></a></li>
                                        <li><a href="#!name"><span class="white-text name"><b>Instructor {{ Auth::user()->name }}</b></span></a></li>
                                        <li><a href="#!email"><span class="white-text email"><b>{{ Auth::user()->email }}</b></span></a></li>
                                        <br>
                                        <li><a class="waves-effect waves-light modal-trigger" href="#modal1" tabindex="8">Actualizar Datos</a></li>
                                      </ul>
                                </div>
                              </li>
                               <!--   -->
                              <li id="about" class="dropdown gallery">
                                <a href="#0" class="label">Usuario</a>
                                  <div class="content">
                                    <ul>                
                                        <li><a href="{{ url('/actaI') }}">Acta</a></li>
                                        <li><a href="{{ url('/entidadI') }}">Entidad</a></li>
                                        <li><a class="dr-icon " href="{{ url('/aprendizI') }}">Aprendiz</a></li>
                                        <li><a class="dr-icon " href="{{ url('/centroformacionI') }}">Centro F</a></li>
                                        <li><a class="dr-icon " href="{{ url('/programaformacionI') }}">Programa</a></li>
                                        <li><a  href="{{ url('/reportes') }}">Reportes</a></li>
                                    </ul>
                                  </div>
                              </li>
                              <!--  -->
                              <li id="contact" class="dropdown gallery">
                                <div class="content">
                                  <ul>
                                    <li>
                                      <a href="{{ url('/home') }}" tabindex="24">
                                        <strong>Inicio</strong>
                                      </a>
                                    </li>
                                    <li>
                                      <a href="{{ url('/logout') }}" tabindex="25">
                                        <strong>Salir</strong>
                                      </a>
                                    </li>
                                  </ul>
                                </div>
                              </li>
                            </ul>
                          <div class="bg-layer" aria-hidden="true"></div>
                        </div> <!-- dropdown-list -->
                      </div> <!-- morph-dropdown-wrapper -->
                  </header> 
                @endif
                @if($rol->nombrerol == 'Instructor Etapa Productiva')                                    
                                                                <!--menu-->
                  <header class="morph-dropdown">
                    <a href="#0" class="nav-trigger">Open Nav<span class="nav-trigger-bar" aria-hidden="true"></span></a>
                      <nav class="main-nav">
                        <ul>
                          <li class="has-dropdown links" data-content="pricing">
                            <a href="#0" tabindex="6">Usuario</a>
                          </li>
                          <li class="has-dropdown gallery" data-content="about">
                            <a href="#0" tabindex="1">Accion</a>
                          </li>
                          <li class="has-dropdown button" data-content="contact">
                            <a href="#0" tabindex="23">Opciones</a>
                          </li>
                        </ul>
                      </nav>
                      <div class="morph-dropdown-wrapper">
                        <div class="dropdown-list">
                            <ul>
                              <li id="pricing" class="dropdown links">
                                <a href="#0" class="label">Usuario</a>
                                <div class="content">
                                  <ul>
                                    <h2>Usuario</h2>
                                      <ul class="links-list" style="margin-top: 35px">
                                        <li><a class="waves-effect waves-light modal-trigger" href="#modal1"><img class="circle" src="image/fondo12.jpg"></a></li>
                                        <li><a href="#!name"><span class="white-text name"><b>Instructor Etapa Productiva {{ Auth::user()->name }}</b></span></a></li>
                                        <li><a href="#!email"><span class="white-text email"><b>{{ Auth::user()->email }}</b></span></a></li>
                                        <br>
                                        <li><a class="waves-effect waves-light modal-trigger" href="#modal1" tabindex="8">Actualizar Datos</a></li>
                                      </ul>
                                </div>
                              </li>
                               <!--   -->
                              <li id="about" class="dropdown gallery">
                                <a href="#0" class="label">Usuario</a>
                                  <div class="content">
                                    <ul>                
                                      <li><a href="{{ url('/actaE') }}">Acta</a></li>
                                      <li><a href="{{ url('/entidadE') }}">Entidad</a></li>
                                      <li><a href="{{ url('/agendaE') }}">Agenda</a></li>
                                      <li><a  href="{{ url('/reportesE') }}">Reportes</a></li>
                                    </ul>
                                  </div>
                              </li>
                              <!--  -->
                              <li id="contact" class="dropdown gallery">
                                <div class="content">
                                  <ul>
                                    <li>
                                      <a href="{{ url('/home') }}" tabindex="24">
                                        <strong>Inicio</strong>
                                      </a>
                                    </li>
                                    <li>
                                      <a href="{{ url('/logout') }}" tabindex="25">
                                        <strong>Salir</strong>
                                      </a>
                                    </li>
                                  </ul>
                                </div>
                              </li>
                            </ul>
                          <div class="bg-layer" aria-hidden="true"></div>
                        </div> <!-- dropdown-list -->
                      </div> <!-- morph-dropdown-wrapper -->
                  </header> 
                @endif
            @endforeach
        @endif    
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                </div>                
                <div class="panel-body">
                <!--  Ventana Modal  -->
                <div id="modal1" class="modal modal-fixed-footer">
                  <div class="modal-content">
                    <center><h4>Actualizar Datos: {{ Auth::user()->name }}</h4></center>
                    <div class="container">
                   @foreach($empleado as $empleado)
                          @include('Empleado.partial.updateEmpleado')
                        @endforeach 
                      <div class="panel-body">      
                        
                      </div>
                    </div>
                  </div>                                    
                </div>
                <!-- Fin de Modal-->
                  
                   @yield('content1')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection