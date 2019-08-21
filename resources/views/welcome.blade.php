@extends('layouts.app')

@section('content')
<link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
<div class="wrap_bg">
    <div id="main" class="login_wrap singUpActive">
        <div class="login_question_wrap">
            <div class="question_singUp ">
                <h2 class="title"><center>SGSA</center></h2>
                <p><center style="zoom: 1.3;">Sistema de Gestion & Seguimiento para el Area de Articulacion</center>
                </p>
                <center><a href="javascript:void(0)" id="signUpBtn" class="btn btn_rounded">Volver</a></center>
            </div>
            <div class="question_login ">
                <h2 class="title"><center>ARTICULACION SENA</center></h2>
                <br>
                <center> <a href="javascript:void(0)" id="loginBtn" class="btn btn_rounded">Iniciar Sesion</a></center>
            </div>
            <div class="action_singUp">
                <form action="#">
                    <fieldset>
                        <!--<legend class="title">Log in</legend>-->

      <div class="content1">
        <div id="login-button"  class="animated fadeInUpBig">
          <a id="goRight" class="off" ><img src="image/fondoinicio2.png"></a>
          </img>
        </div>

    </div>
    
                        <!--<div class="input_block">
                            <div class="input_wrap">
                                <input type="text" id="mail" class="input" placeholder="Email">
                                <label for="sing_pass" class="label_mail"></label>
                            </div>
                            <div class="input_wrap">
                                <input type="text" id="pass" class="input" placeholder="Password">
                                <label for="sing_pass" class="label_pass"></label>
                            </div>
                        </div>
                        <a href="#" class="forgotPass">Forgot password?</a>
                        <input type="submit" value="Login" class="btn btn_red">-->
                    </fieldset>
                </form>
            </div>
            <div class="action_login">
                <form role="form" method="POST" action="login">
                 {{ csrf_field() }}
                            <fieldset>
                        <legend class="title"><center>Iniciar Sesión</center></legend>
                        <div class="input_block">
                          

                            <div class="input_wrap {{ $errors->has('email') ? ' has-error' : '' }} ">
                                <input  id="email"  type="email" name="email" class="input" value="{{ old('email') }}" placeholder="Correo electronico">
                               
                                <label for="sing_email" class="label_mail"></label>
                                  @if ($errors->has('email'))
                                      <span class="help-block">
                                          <strong style="color: #8084b9" >{{ $errors->first('email') }}</strong>
                                      </span>
                                  @endif
                            </div>
                            <div class="input_wrap {{ $errors->has('password') ? ' has-error' : '' }}">
                                <input  id="password" type="password" name="password" class="input" placeholder="Contraseña">
                                <label for="sing_pass" class="label_pass"></label>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong style="color: #8084b9" >{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <input type="submit" value="Ingresar" class="btn btn_red animated fadeInUpBig">
                    </fieldset>
                   
                </form>
            </div>
        </div>
        <div class="login_action_wrap ">
        </div>
    </div>
</div>

