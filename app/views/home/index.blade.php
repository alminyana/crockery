@extends('layout.main')

@section('content')

{{HTML::style('css/miscroll.css')}}
{{HTML::style('css/vegas/jquery.vegas.min.css')}}
{{HTML::script('js/vegas/jquery.vegas.min.js')}}
{{HTML::script('js/vegas/home_vegas.js')}}
<div id="identificador" class="indexhomeocultar"></div>
<style type="text/css">
	body {
		/* activem el padding del body si posem el menu superior (fixed) enlloc de (static)
		padding-top: 55px;
		*/
		font-family: arial;
		background-color: #000;
	}
	.navbar {
		/* posem marges a 0 nomes a la intro, per eliminar espai en blanc entre menu header i fondo imatge*/
		padding-bottom: 0px;
		margin-bottom: 0px;
	}
</style>
		<div class="container">
			<div class="hidden-xs col-sm-12 col-md-12 col-lg-12">
				<img class="img-responsive center-block bloque" src="img/logo.jpg">
			</div>
			<div class="col-xs-12 hidden-sm hidden-md hidden-lg">
				<img class="center-block bloque-peque" width="300px" src="img/logo.jpg">
			</div>
		</div>

@stop
