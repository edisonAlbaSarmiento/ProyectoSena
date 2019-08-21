@extends('layouts.app')
@section('content')
<div id="back">
  <div class="backRight"></div>
  <div class="backLeft"></div>
</div>

<div id="slideBox">
  <div class="topLayer">
    <div class="left">
      <div class="content">
        <h2 class="title">INICIO SESION</h2>
        <form class="form-horizontal" role="form" method="POST" action="login">
                        {{ csrf_field() }}

                        <div class="{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="">
                                <input id="email" type="email" class="login-input" name="email" value="{{ old('email') }}" placeholder="Correo electronico" >

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="">
                                <input id="password" type="password" class="login-input" name="password" placeholder="Contraseña">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="">
                            <div class="">          
                                <button type="submit" class="boton">
                                    <i class="fa fa-btn fa-sign-in" ></i> Ingresar
                                </button>
                            </div>
                        </div>
                    </form>
        <!-- Authentication Links -->      
      </div>
    </div>
    <div class="right">

      <div class="content1">
        <div id="login-button"  class="animated fadeInUpBig">
          <a id="goRight" class="off" ><img src="image/login.png"></a>
          </img>
        </div>
      <h2 class="animated fadeInDown">ARTICULACION SENA</h2>
    </div>
  </div>
</div>
 @endsection