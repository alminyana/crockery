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

        <!-- mensaje nuevo horario css html  -->


        <div class="alert alert-info">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <span class="newTime">Nuevo horario tienda:  <span class="horas"> <strong>09:00 - 17:00 h.</strong></span></span>
        </div>
    

<style>
.dropdown-large {
  position: static !important;
}
.dropdown-menu-large {
  margin-left: 16px;
  margin-right: 16px;
  padding: 20px 0px;
}
.dropdown-menu-large > li > ul {
  padding: 0;
  margin: 0;
}
.dropdown-menu-large > li > ul > li {
  list-style: none;
}
.dropdown-menu-large > li > ul > li > a {
  display: block;
  padding: 3px 20px;
  clear: both;
  font-weight: normal;
  line-height: 1.428571429;
  color: #333333;
  white-space: normal;
}
.dropdown-menu-large > li ul > li > a:hover,
.dropdown-menu-large > li ul > li > a:focus {
  text-decoration: none;
  color: #262626;
  background-color: #f5f5f5;
}
.dropdown-menu-large .disabled > a,
.dropdown-menu-large .disabled > a:hover,
.dropdown-menu-large .disabled > a:focus {
  color: #999999;
}
.dropdown-menu-large .disabled > a:hover,
.dropdown-menu-large .disabled > a:focus {
  text-decoration: none;
  background-color: transparent;
  background-image: none;
  filter: progid:DXImageTransform.Microsoft.gradient(enabled = false);
  cursor: not-allowed;
}
.dropdown-menu-large .dropdown-header {
  color: #428bca;
  font-size: 18px;
}
@media (max-width: 768px) {
  .dropdown-menu-large {
    margin-left: 0 ;
    margin-right: 0 ;
  }
  .dropdown-menu-large > li {
    margin-bottom: 30px;
  }
  .dropdown-menu-large > li:last-child {
    margin-bottom: 0;
  }
  .dropdown-menu-large .dropdown-header {
    padding: 3px 15px !important;
  }
}


</style>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                
                     @foreach($catas as $cat) 
                        
                            
                              <span class="pepe" vvalor='{{$cat->id}}'>
                                  {{$cat->nom}} 
                              </span>
                       
                    @endforeach 
                
            </div>
        </div> 





<nav class="navbar navbar-default navbar-static">
    <div class="navbar-header">
        <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Large Dropdown Menu</a>
    </div>
    
    
    <div class="collapse navbar-collapse js-navbar-collapse">
        <ul class="nav navbar-nav">
            <li class="dropdown dropdown-large">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                
                <ul class="dropdown-menu dropdown-menu-large row">
                    <li class="col-sm-3">
                        <ul>
                            <li class="dropdown-header">Glyphicons</li>
                            <li><a href="#">Available glyphs</a></li>
                            <li class="disabled"><a href="#">How to use</a></li>
                            <li><a href="#">Examples</a></li>
                            <li class="divider"></li>
                            <li class="dropdown-header">Dropdowns</li>
                            <li><a href="#">Example</a></li>
                            <li><a href="#">Aligninment options</a></li>
                            <li><a href="#">Headers</a></li>
                            <li><a href="#">Disabled menu items</a></li>
                        </ul>
                    </li>
                    <li class="col-sm-3">
                        <ul>
                            <li class="dropdown-header">Button groups</li>
                            <li><a href="#">Basic example</a></li>
                            <li><a href="#">Button toolbar</a></li>
                            <li><a href="#">Sizing</a></li>
                            <li><a href="#">Nesting</a></li>
                            <li><a href="#">Vertical variation</a></li>
                            <li class="divider"></li>
                            <li class="dropdown-header">Button dropdowns</li>
                            <li><a href="#">Single button dropdowns</a></li>
                        </ul>
                    </li>
                    <li class="col-sm-3">
                        <ul>
                            <li class="dropdown-header">Input groups</li>
                            <li><a href="#">Basic example</a></li>
                            <li><a href="#">Sizing</a></li>
                            <li><a href="#">Checkboxes and radio addons</a></li>
                            <li class="divider"></li>
                            <li class="dropdown-header">Navs</li>
                            <li><a href="#">Tabs</a></li>
                            <li><a href="#">Pills</a></li>
                            <li><a href="#">Justified</a></li>
                        </ul>
                    </li>
                    <li class="col-sm-3">
                        <ul>
                            <li class="dropdown-header">Navbar</li>
                            <li><a href="#">Default navbar</a></li>
                            <li><a href="#">Buttons</a></li>
                            <li><a href="#">Text</a></li>
                            <li><a href="#">Non-nav links</a></li>
                            <li><a href="#">Component alignment</a></li>
                            <li><a href="#">Fixed to top</a></li>
                            <li><a href="#">Fixed to bottom</a></li>
                            <li><a href="#">Static top</a></li>
                            <li><a href="#">Inverted navbar</a></li>
                        </ul>
                    </li>
                </ul>
                
            </li>
        </ul>
        
    </div><!-- /.nav-collapse -->
</nav>
















        <br/><br/><br/>
		<div class="row" id="ancorrow">
			<div class="col-xs-10 col-xs-offset-1 col-sm-3 col-sm-offset-0 col-md-3 col-lg-3 fondopanel">
				<div class="form-group">
				{{--Form::label('categoria','Categoría')--}}
				<h5 class="mipanel"><span class="upper"><strong>{{Lang::get('textos.catecate')}}</strong></span></h5>
				{{Form::select('categoria',$categorias,'id',['class'=>'form-control input-default','size'=>9,'id'=>'indexcategorias'])}}


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
               <div id="contenidoajaxxx"></div>
			</div>
		</div>

	</div>
    
        
    <!-- Blue imp gallery js files -->
    <script src="http://blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
	<script src="js/bootstrap-image-gallery.min.js"></script>
    
<script>
    $('.pepe').on('click', function (e){
        console.log(e);
    });
</script>
@stop