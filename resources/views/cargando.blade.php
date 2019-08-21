<html>
<head>
 	<meta http-equiv='refresh', content="4; URL={{asset('home')}}">
 	<link rel="stylesheet" href="{{asset ('css/cargando.css')}}">
</head>
	<body>
	<div class="out">
	  	<div class="fade-in">
			<div class="wrapper">
			    <div class="box-wrap">
			        <div class="box one"></div>
			        <div class="box two"></div>
			        <div class="box three"></div>
			        <div class="box four"></div>
			        <div class="box five"></div>
			        <div class="box six"></div>
			    </div>
			</div>
	    
		</div>
		
	 	<h1>Bienvenid@ {{ Auth::user()->name }}</h1>
 	</div>
</html>
