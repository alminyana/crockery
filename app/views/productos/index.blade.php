@extends('layout.main')
@section('content')

{{--    Blue-imp gallery styles    --}}
<link rel="stylesheet" href="http://blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-image-gallery.min.css">
<!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->


<div id="identificador" class="indexobjbody"></div>
{{-- Galeria blueimp-gallery bootstrap --}}

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
        {{-- <div class="col-xs-12 col-sm-8 col-md-6 col-lg-5 page-header">
        	<h2><strong>Productos Crockery</strong></h2>

        </div> --}}
        {{--<div class="pull-right">
        	<img id="bordebolita" class="img img-responsive img-circle center-block" src="img/animasionOK.gif" width="160px">
        </div>--}}
    </div>
	<div class="container">
		<div class="center-block hidden-xs">
			<img id="bordebolita" class="img img-responsive img-circle center-block ourgif pull-left" src="img/animasionOK.gif" width="160px">
            <img id="bordebolita2" class="img img-responsive img-circle center-block ourgif pull-left" src="img/animasionOKcincoA.gif" width="160px">
            <img id="bordebolita2" class="img img-responsive img-circle center-block ourgif pull-left" src="img/animasionOKcincoB.gif" width="160px">
            <img id="bordebolita2" class="img img-responsive img-circle center-block ourgif pull-left hidden-xs hidden-sm" src="img/animasionOKcincoC.gif" width="160px">
            <img id="bordebolita2" class="img img-responsive img-circle center-block ourgif pull-left hidden-xs hidden-sm hidden-md" src="img/animasionOKcincoD.gif" width="160px">
		</div>
        <div class="clearfix"></div>
<style>
    .felpamenu{
        display:block;
    }
    .felpamenu li {
        display: inline-block;
        padding: .3em;
    }
    .newTime {
        font-size: 22px;
    }
    .horas {
        font-size: 25px;
        margin-left: .5em;
    }
</style>
    
    <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <span class="newTime">Nuevo horario tienda:  <span class="horas"> <strong>09:00 - 17:00 h.</strong></span></span>
    </div>

        {{--<div id="campeon" class="container">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <ul class="felpamenu">
                     @foreach($catas as $cat) 
                        <li>
                            
                            <button class='btn btn-primary' valor='{{$cat->id}}'>{{$cat->nom}}</button>
                        </li>
                    @endforeach 
                </ul>
            </div>
        </div> --}}

		<div class="row" id="ancorrow">
			<div class="col-xs-10 col-xs-offset-1 col-sm-3 col-sm-offset-0 col-md-3 col-lg-3 fondopanel">
				<div class="form-group">
				{{--Form::label('categoria','Categoría')--}}
				<h5 class="mipanel"><span class="upper"><strong>{{Lang::get('textos.catecate')}}</strong></span></h5>
				{{Form::select('categoria',$categorias,'id',['class'=>'form-control input-default','size'=>7,'id'=>'indexcategorias'])}}


			</div>
			<div class="form-group">
				{{--Form::label('id_subcateg','Subcategoria')--}}
				<h5 class="mipanel"><span class="upper"><strong>{{Lang::get('textos.subsub')}}</strong></span></h5>
				<div id="subcategorias"></div>
				<div id="waiting">{{--HTML::image('img/gif-load.gif','waiting...',array('id'=>'fotowait'))--}}
					<i class="fa fa-refresh fa-spin fa-2x"></i>
				</div>
			</div>
			{{-- <br/>
			<button class="btn btn-danger btn-primary btn-block" type="button" id="mostrarobjetos"><i class="fa fa-file-image-o"> </i> {{Lang::get('textos.indexboton')}}</button> --}}
			</div>
			<div class="col-xs-12 hidden-sm hidden-md hidden-lg mas"></div>
			<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 espaitop lightgallery">
				<div class="negro">
					<h3 id="titulogaleria" class="text-right upper"><strong>Galería de imágenes</strong></h3>
				</div>
				<div class="espacio"></div>
	           <div id="contenidoajax"></div>
			</div>
		</div>

	</div>
    
        
    <!-- Blue imp gallery js files -->
    <script src="http://blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
	<script src="js/bootstrap-image-gallery.min.js"></script>
    

@stop