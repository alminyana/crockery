@extends('layout.main')
@section('content')
<link rel="stylesheet" href="http://blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-image-gallery.min.css">
	<!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->
<div id="blueimp-gallery" class="blueimp-gallery">
    <!-- The container for the modal slides -->
    <div class="slides"></div>
    <!-- Controls for the borderless lightbox -->
    <h1 class="title"></h1>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>2
    <!-- The modal dialog, which will be used to wrap the lightbox content -->
    <div class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" aria-hidden="true">&times;</button>
                    <h4 class="modal-title text-danger"></h4>
                </div>
                <div class="modal-body next"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left prev">
                        <i class="glyphicon glyphicon-chevron-left"></i>
                        Anterior
                    </button>

                    <button type="button" class="btn btn-danger next">
                        {{Lang::get('textos.siguiente')}}
                        <i class="glyphicon glyphicon-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
	<div class="container">
        <div class="hidden-sm hidden-md hidden-lg">
            <div class="titol-head-head peque">
                <h3><i class="fa fa-list izq"></i>{{Lang::get('textos.tituloindexprod')}}</h3>
                <!--  h3 class="sombra"><i class="fa fa-map-marker izq"></i><strong>Sobre Crockery</strong></h3  -->
            </div>
        </div>
        <div class="hidden-xs">
            <div class="titol-head-head">
                <h3><i class="fa fa-list izq"></i>{{Lang::get('textos.tituloindexprod')}}</h3>
            </div>
        </div>
    </div>

<div id="identificador" class="indexobjbody"></div>
<div id="instruc" class="container">
	<div class="jumbotron">
		<div class="row">
			<div class="col-sm-6 hidden-xs">
				<img id="bordebolita" class="img img-responsive img-circle center-block" src="img/animasionOK22.gif" width="230px">
			</div>
			<div class="col-xs-12 col-sm-6 margenlogo">
				<img class="img img-responsive center-block" src="img/logo.jpg">
				
			</div>
			<div id="bolita" class="col-xs-12 hidden-sm hidden-md hidden-lg center-block">
				<img id="bordebolita" class="img img-responsive img-circle center-block" src="img/animasionOK.gif" width="160px">
			</div>
			{{--
			<div class="col-xs-12 col-sm-6">
				<button class="btn btn-primary btn-lg btn-block" id="mostrarobjetos"><i class="glyphicon glyphicon-picture"></i> Mostrar Productos</button>
			</div>
			--}}
		</div>
		
	</div>
</div>
<style type="text/css">
	.centrado {
		text-align: center;
	}
	#down {margin: 0 1em 0 1em;}
</style>
<div class="container">
	<div id="formuprod" class="fondo">
	
	{{--Form::open(array('url'=>'descargas','files'=>'true','class'=>'','role'=>'form'))--}}
	<div class="container">
		<div class="row fondopanel">
		<div class="col-xs-12 col-sm-6">
			<br/>
			<div class="form-group">
				{{--Form::label('categoria','Categoría')--}}
				<h4><span class="upper"><strong>{{Lang::get('textos.catecate')}}</strong></span></h4>
				{{Form::select('categoria',$categorias,'id',['class'=>'form-control input-lg','id'=>'indexcategorias'])}}
			</div>
			<div class="form-group">
				{{--Form::label('id_subcateg','Subcategoria')--}}<br/>
				<h4><span class="upper"><strong>{{Lang::get('textos.subsub')}}</strong></span></h4>
				<div id="subcategorias"></div>
				<div id="waiting">{{--HTML::image('img/gif-load.gif','waiting...',array('id'=>'fotowait'))--}}
					<i class="fa fa-refresh fa-spin fa-2x"></i>
				</div>
			</div>	
		</div>
		<div class="col-xs-12 col-sm-6">			
				<div id="botonesindexprod" class="form-group">
					<br/>
					<h3>Selecciona una <span class="text-success"><strong>{{Lang::get('textos.index01')}}</strong></span> {{Lang::get('textos.index02')}} <span class="text-success"><strong>{{Lang::get('textos.index03')}}</strong></span>.<br/><br/>{{Lang::get('textos.index04')}} <span class="text-danger"><strong>{{Lang::get('textos.index05')}}</strong></span>.</h3>
				<button class="btn btn-lg btn-primary btn-block" type="button" id="mostrarobjetos">{{Lang::get('textos.indexboton')}}</button>
			    {{--Form::submit('Descargar imágenes',array('class'=>'btn btn-lg btn-primary btn-block','id'=>'descargar'))--}}
			</div>

		</div>
	</div>
	</div>
	</div>
	<div class="container titu">
		<div class="hidden-xs">
		<h2 class="upper">{{Lang::get('textos.index06')}}</h2>
	</div>
	<div class="hidden-sm hidden-md hidden-lg petit">
		<h2 class="upper">{{Lang::get('textos.index06')}}</h2>
	</div>

	<div class="espacio"></div>
	<div id="contenidoajax"></div>
	{{--Form::close()--}}
	</div>
</div>

	<script src="http://blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
	<script src="js/bootstrap-image-gallery.min.js"></script>

@stop