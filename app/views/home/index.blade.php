@extends('layout.main')

@section('content')

{{HTML::style('css/miscroll.css')}}
<div id="identificador" class="indexhomeocultar"></div>
{{--<!-- div class="container">
	<div id="wrapoculto">
		<h3 class="text-danger">Index Principal</h3>
		<p class="danger">... En desarrollo ...</p>		
	</div>	
</div -->--}}
<style type="text/css">
body {
	/* activem el padding del body si posem el menu superior (fixed) enlloc de (static)
	padding-top: 55px;
	*/
	font-family: arial;

}
	.navbar {
		/* posem marges a 0 nomes a la intro, per eliminar espai en blanc entre menu header i fondo imatge*/
		padding-bottom: 0px;
		margin-bottom: 0px;
	}
</style>
<div class="uno">
		<div class="container">
			<div class="hidden-xs col-sm-12 col-md-12 col-lg-12">
				<img class="img-responsive center-block bloque" src="img/logo.jpg">
			</div>
			<div class="col-xs-12 hidden-sm hidden-md hidden-lg">
				<img class="center-block bloque-peque" width="300px" src="img/logo.jpg">
			</div>
		</div>
		

</div>
<div class="dos"></div>
<div class="hidden-xs blanco-iconos center-block">
	<div class="col-sm-4 col-md-4 col-lg-4 texto">
		<h3><strong>VER</strong></h3>
		<hr/>
		<div class="center-block">
			<h1><i class="glyphicon glyphicon-info-sign"></i></h1>
			<p class="text-center margen"><strong>CROCKERY.es</strong> {{Lang::get('textos.indexexpli')}}</p>
		</div>
	</div>

	<div class="col-sm-4 col-md-4 col-lg-4 texto">
		<h3><strong>BUSCAR</strong></h3>
		<hr/>
		<div class="center-block">
			<h1><i class="glyphicon glyphicon-search"></i></h1>
			<p class="text-center margen">{{Lang::get('textos.indexbuscar')}}</p>
		</div>
	</div>

	<div class="col-sm-4 col-md-4 col-lg-4 texto">
		<h3><strong>DESCARGAR</strong></h3>
		<hr/>
		<div class="center-block">
			<h1><i class="glyphicon glyphicon-cloud-download"></i></h1>
			<p class="text-center margen">{{Lang::get('textos.indexdescargar')}}</p>
		</div>
	</div>		
</div>
<div class="hidden-sm hidden-md hidden-lg blanco-iconos2">
	<div class="row">
		<div class="col-xs-12 texto">
			<h3>VER</h3>
			<hr/>
			<div class="center-block">
				<h1><i class="glyphicon glyphicon-info-sign"></i></h1>
				<p class="text-center margen"><strong>CROCKERY.es</strong> es una herramienta on-line para ver y buscar imágenes de los productos que puedes alquilar</p>
			</div>


		</div>
		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 texto">
			<h3>BUSCAR</h3>
			<hr/>
			<div class="center-block">
				<h1><i class="glyphicon glyphicon-search"></i></h1>
				<p class="text-center margen">Busca y filtra por Categorías y Subcategorías para precisar la búsqueda de aquellos productos que necesites</p>
			</div>
		</div>
		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 texto">
			<h3>DESCARGAR</h3>
			<hr/>
			<div class="center-block">
				<h1><i class="glyphicon glyphicon-cloud-download"></i></h1>
				<p class="text-center margen">Puedes descargar las imágenes si así lo prefieres</p>
			</div>
		</div>

	</div>	
</div>



<div class="tres">
	
</div>
<div class="cuatro">

</div>

@stop
