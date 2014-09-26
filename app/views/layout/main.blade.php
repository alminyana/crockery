<?php
/**
*	Main principal Crockery
*	
*	autor: alminyana@gmail.com
*	
*	fecha: 29/062014
*	version: 1.0
*/
  if(Session::has('locale')) {
	App::setLocale(Session::get('locale'));
  } else {
	App::setLocale('es');
  }
  
  $url = URL::current();
  Session::put('url', $url);
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Crockery</title>
	<link rel="shortcut icon" href="img/favicon.ico" />
	<link rel="stylesheet" type="text/css" href="">
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
	<link href='http://fonts.googleapis.com/css?family=Archivo+Black' rel='stylesheet' type='text/css'>
  	{{HTML::style('css/crockery-styles.css')}}
  	{{HTML::style('css/font-awesome.min.css')}}
  	{{HTML::script('js/script.js')}}
  	<style type="text/css">
  		.backtotop {
			position: fixed;
			bottom:2em;
			right: 0px;
			text-decoration: none;
			color: white;
			background-color: #222;
			opacity: .8;
			font-size: 12px;
			padding: 1em;
			display: none;
			border-radius: 5px 0 0 5px;
		}

		.backtotop:hover {	
			background-color: #222;
			opacity: 1;
			color:white;
		}
		.banderaidioma {margin: .3em;margin-right: 1em;border: solid #ccc 1px;border-radius: 3px;}
  	</style>
  	<script>
  	/* CODIGO BACK TO TOP
	$(document).ready(function(){
				var offset = 230;
				var duration = 500;
				jQuery(window).scroll(function() {
					if (jQuery(this).scrollTop() > offset) {
						jQuery('.backtotop').fadeIn(duration);
					} else {
						jQuery('.backtotop').fadeOut(duration);
					}
					
				});
				
				jQuery('.backtotop').click(function(event) {
					event.preventDefault();
					jQuery('html, body').animate({scrollTop: 0}, duration);
					return false;
				});
	});
	*/
</script>
</head> 
<body>
	<div id="wrap">
		<header class="header">
				<!-- menu -->
				<div class="menu">
					<nav class="navbar navbar-inverse navbar-static-top" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/index">
        {{HTML::image('img/logo.jpg', 'Crock_logo.jpg', array('width'=>100))}}
      </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul id="lista-menu" class="nav navbar-nav">
        <li><a href="{{URL::to('productos')}}">{{Lang::get('textos.productos')}}</a></li>
        <li><a href="{{URL::to('contacto')}}">{{Lang::get('textos.contacto')}}</a></li>
        <li><a href="{{URL::to('sobremi')}}">{{Lang::get('textos.sobrecrockery')}}</a></li>
      	@if (Auth::check() && Auth::user()->rol==0)
      		<li><a href="{{URL::to('gestion')}}">Gestión Admin</a></li>
      	@endif
      </ul>
      <ul class="nav navbar-nav navbar-right idiomas">
      @if (!Auth::check())
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-user"></i><b class="caret"></b></a>
				<ul class="dropdown-menu">
					<?php //{{URL::to('usuaris/create')}} ?>
					<!--  li class="disabled"><a href="#"><i class="glyphicon glyphicon-pencil izq"></i>{{Lang::get('textos.registro')}}</a></li  -->
					<li><a href="{{URL::to('usuaris/login')}}"><i class="glyphicon glyphicon-log-in izq"></i>Login</a></li>
				</ul>
			</li>
		@else
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class=""></i>{{Auth::user()->nom}} <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="{{URL::to('usuaris/logout')}}"><i class="glyphicon glyphicon-log-out izq"></i>Logout</a></li>
				</ul>
			</li>
		@endif
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-flag izq"></i><b class="caret"></b></a>
          <ul class="dropdown-menu">
          	{{-- Clase para mostrar el idioma seleccionado de forma diferente --}}
				<?php
					if (Session::get('locale')=='cat') {
						//$esp = 'glyphicon glyphicon-chevron-left';
						$axcat = 'idiomaactivo';
						$axesp="";
						$icono = "<i class='glyphicon glyphicon-ok'></i>";
						$iconoesp = "";
					} else {
						//$cat = 'glyphicon glyphicon-chevron-left';
						$axesp = 'idiomaactivo';
						$axcat="";
						$icono = "";
						$iconoesp = "<i class='glyphicon glyphicon-ok'></i>";
					}
				?>
            <li><a class="{{$axcat}}" href="{{URL::to('idioma/cat')}}">{{HTML::image('img/idiomas/cat.jpg','cat',array('width'=>30,'class'=>'banderaidioma'))}} {{$icono}}</a></li>
            <li><a class="{{$axesp}}" href="{{URL::to('idioma/es')}}">{{HTML::image('img/idiomas/esp.jpg','cat',array('width'=>30,'class'=>'banderaidioma'))}} {{$iconoesp}}</i></a></li>
          </ul>
        </li>
		

      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
				</div>
		</header>
			
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
						@if(Session::has('message'))
							<div id="alert" class="alert alert-success alert-dismissable">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								</i>{{ Session::get('message') }}
							</div>
						@endif
					</div>
				</div>
			</div>
		


		@yield('content')

	</div>
	<a href="#" class="backtotop"><i class="glyphicon glyphicon-arrow-up izq"></i>{{Lang::get('textos.arriba')}}</a>
	{{--
	<footer id="footer" class="footer">
			@yield('bottom')
			<nav class="navbar navbar-inverse navbar-static-bottom">
        
        <ul class="nav navbar-nav navbar-right idiomasfooter">

          <li><a id="backtotop" href="#">{{Lang::get('textos.volverarriba')}} <i class="glyphicon glyphicon-arrow-up"></i></a></li>
        </ul>
        
      </nav>

	</footer>
	--}}

</body>
</html>