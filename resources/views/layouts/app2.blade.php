<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8 SHA-256-400">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.5">
    <link rel="shortcut icon" href="image/favicon.png">

    <title>SGSA | SENA</title>
        <!-- Iconos -->
        <link rel="stylesheet" href="{{asset('css/materialize.css')}}"> 
        <link href="{{asset ('css/iconosgoogle.css')}}" rel="stylesheet">
        <!-- Fonts -->
        <link rel="stylesheet" href="{{asset ('css/font-awesome.css') }}" >
       
        <link rel="stylesheet" href="{{asset ('css/letra.css')}}">
        <link rel="stylesheet" href="{{asset ('css/material-icons.css')}}">
                  <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="engine1/style.css" />          
              
        <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">-->
        
        <script type="text/javascript" src="engine1/jquery.js"></script>
        {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
        <link rel="stylesheet" href="{{asset('css/stylemenu.css')}}">
        <link rel="stylesheet" href="{{asset('css/styleform.css')}}">   
</head>
  <body>
        <div>
          <div id="container">
            <header role="banner">
              <div class="inner-header">
                  <div class="header-flex">
                      <!--<button aria-controls="global-nav" aria-haspopup="true" tabindex="2" id="menu-button">
                          <span class="menu-icon" aria-hidden="true">
                              <svg version='1.1' x='0px' y='0px' width='30px' height='30px' viewBox='0 0 30 30' enable-background='new 0 0 30 30'><rect width='30' height='5'/><rect y='24' width='30' height='5' /><rect y='12' width='30' height='5'/></svg>
                          </span>
                        <span class="menu-text">Menu</span>
                      </button>-->
                  </div>
              </div>
            </header>          
                  <main>
                    <section>
                      <article>
                            @yield('content')
                      </article>
                    </section>
                </main>
          </div>
          <div class='back-to-top' id='back-to-top' title='Subir'><i class="large material-icons">navigation</i></div>
          <footer class="page-footer page-footer2 orange">
              <div class="container">
                <div class="row">
                  <div class="col l6 s12">
                      <p> 
                        <div id="redessociales">
                          <a class="smedia facebook" href="#">Uno</a>
                          <a class="smedia twitter" href="#">Dos</a>
                          <a class="smedia instagram" href="#">Tres</a>
                          <a class="smedia youtube" href="#">Cuatro</a>
                        </div>
                      </p>
                  </div>
                  </div>
                </div>
          </footer>
        </div> 
        <!-- Funciones JavaScripts -->
        <script src="{{asset('js/jquery-2.1.4.js')}}"></script>
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script type="text/javascript" src="{{asset('js/javamenu.js')}}"></script>
        <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>-->
        {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
        <script src="{{asset ('js/materialize.js') }}"></script>
        <script src="js/tooltip.js"></script>
        <script type="text/javascript" src="engine1/wowslider.js"></script> 
        <script type="text/javascript" src="engine1/script.js"></script>
        <script type="text/javascript" src="{{asset('js/push.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/detalles/scripts.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/detalles/DetAmbActa.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/detalles/DetEntApren.js')}}"></script>


  </body>
</html>