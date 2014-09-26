@extends('layout.main')

@section('content')
	<div class="container">
		<div class="titol-head">
	        <h3><i class="fa fa-map-marker izq"></i>{{Lang::get('textos.gestiontitulo')}}</h3>
	    </div>
	    <div class="panel">
	    	@if(Auth::check() && Auth::user()->rol == 0)
				<div class="menuadmin">
						<h3><i class="fa fa-cog fa-spin izq"></i>{{Lang::get('textos.paneladmin')}}</h3>
							<?php //<i class="glyphicon glyphicon-cog"></i> ?>

							<div class="col-xs-12 col-sm-12 col-md-4">
									<h4>{{Lang::get('textos.catecate')}}</h4>
									<a id="insertarCategoria" href="{{URL::to('categorias/create')}}" class="btn btn-danger btn-lg btn-block"><i class="glyphicon glyphicon-plus-sign izq"></i>{{Lang::get('textos.inserircate')}}</a>
									<a id="verCategoria" href="{{URL::to('categorias')}}" class="btn btn-warning btn-lg btn-block"><i class="glyphicon glyphicon-wrench izq"></i>{{Lang::get('textos.gestioncates')}}</a>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-4">
								<h4>{{Lang::get('textos.subsub')}}</h4>
								<a id="insertarSubcategoria" href="{{URL::to('subcategorias/create')}}" class="btn btn-default btn-lg btn-block"><i class="glyphicon glyphicon-plus-sign izq"></i>{{Lang::get('textos.inserirsub')}}</a>
								<a id="verSubcategoria" href="{{URL::to('subcategorias')}}" class="btn btn-default btn-lg btn-block"><i class="glyphicon glyphicon-wrench izq"></i>{{Lang::get('textos.gestionsubs')}}</a>
							</div>	
							<div class="col-xs-12 col-sm-12 col-md-4">
								<h4>{{Lang::get('textos.prodprod')}}</h4>
								<a id="insertarfoto" href="{{URL::to('productos/create')}}" class="btn btn-warning btn-lg btn-block"><i class="glyphicon glyphicon-plus-sign izq"></i>{{Lang::get('textos.inserirprod')}}</a>


								<a id="verfoto" href="{{URL::to('productos/listar')}}" class="btn btn-danger btn-lg btn-block"><i class="glyphicon glyphicon-wrench izq"></i>{{Lang::get('textos.gestionproducts')}}</a>
							</div>
				</div>
			@endif
	    </div>




	</div>
@stop