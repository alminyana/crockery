@extends('layout.main')

@section('content')
<link rel="stylesheet" href="http://blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
<link rel="stylesheet" type="text/css" href="/css/bootstrap-image-gallery.min.css">
<link rel="stylesheet" type="text/css" href="/css/productos-listar-gestion.css">
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

@if(Auth::check() && Auth::user()->rol == 0)
    
    <div class="container">
        <div class="hidden-sm hidden-md hidden-lg">
            <div class="titol-head-head peque">
                <h3><i class="fa fa-list izq"></i>{{Lang::get('textos.gesti1')}}</h3>
            </div>
        </div>
        <div class="hidden-xs">
            <div class="titol-head-head">
                <h3><i class="fa fa-list izq"></i>{{Lang::get('textos.gesti1')}}</h3>
            </div>
        </div>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <br/>
        <h3>{{Lang::get('textos.gesti2')}}</h3>
        <div class="fondopanel espaiasota">
            
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <div class="form-group">
                    <h4><span class="upper"><strong>{{Lang::get('textos.catecate')}}</strong></span></h4>
                    {{Form::select('id_categ',$categorias,'id',['class'=>'form-control input-lg','id'=>'cate_listar_gestion'])}}
                    
                    </div>
                    <div class="form-group">
                        <button class="btn btn-lg btn-success btn-block" type="button" id="ajaxlistarsub">Mostrar Subcategorías</button>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <div class="subsub">
                        <div class="form-group">
                            <h4><span class="upper"><strong>{{Lang::get('textos.subsub')}}</strong></span></h4>
                            <div id="subcategorias"></div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-lg btn-success btn-block" type="button" id="ajaxlistarprod">Mostrar Imágenes</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
<style type="text/css">
    body {
        padding-bottom: 6em;
    }
    .datos th {
        padding: .4em;
        color: #222;
    }
    #cat, #sub, #num {font-size: 23px;padding: 1em;}
    table {padding-bottom: 3em;}
    input[type='checkbox'] {
        width: 20px;
        height: 20px;
        margin: 2em;
    }
</style>
    <div class="container tablaprods">
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
            <div class="table-responsive finalpagina">
            <table class="table table-bordered">
                <thead class="datos">
                    <th>Categoría</th>
                    <th>Subcategoría</th>
                    <th>Número de fotos</th>
                </thead>
                <tbody>
                    <tr>
                        <td><span class="text-success"><strong id="cat"></strong></span></td>
                        <td><span class="text-success lower"><strong id="sub"></strong></span></td>
                        <td><span class="text-success"><strong id="num"></strong></span></td>
                    </tr>
                </tbody>
            </table>
        </div>
        </div>
<style type="text/css">
    #btn-grupo1  {
        margin: 2em 0 1em 0;
    }
    #btn-grupo2 {
     margin: 2em 0 2em 0;   
    }
    .todos {
        margin: 1em;
    }
</style>
        <div class="blanco"></div>
            {{-- Form::open(array('url'=>'productos/borrar', 'class' => 'form-login','role'=>'form','id'=>'toto2')) --}}
            
            
        <div class="blanco"></div>
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
            <div class="pull-right">
                <button id="marcar" class="btn btn-sm btn-default todos">Marcar todos</button>
                <button id="desmarcar" class="btn btn-sm btn-default todos">Desmarcar todos</button>
            </div>
            {{ Form::open(array('url'=>'productos/mover', 'class' => 'form-login','role'=>'form','id'=>'toto1')) }}
            <div class="table-responsive margen">
                <table id="" class="table table-hover">
                    <thead>
                        <th>Imagen</th>
                        <th>Mover Imagen</th>
                        <th>Borrar Imagen</th>
                        <th>Seleccionar Imagen</th>
                    </thead>
                    <tbody id="volcar">
                    </tbody>
                </table>
                <hr/>
            </div>
        </div>

        <div class="blanco"></div>
        <div class="col-xs-12 col-sm-6 col-md-5 col-lg-5">
                {{--<a id="btn-grupo1" class="btn btn-default btn-lg btn-block" href="{{URL::to('productos/mover')}}">
                    Mover Imágenes Seleccionadas
                </a>
                --}}
                
                {{-- Form::submit('Mover imágenes seleccionadas',array('class'=>'btn btn-default btn-lg btn-block','id'=>'btn-grupo1')) --}}
                <br/>
                <button class="btn btn-default btn-lg btn-block" name="borrame1" id="borrame1">Mover Imágenes Seleccionadas</button>

            </div>
            <div class="col-xs-12 col-sm-6 col-md-5 col-md-offset-1 col-lg-5 col-lg-offset-1">
                {{--<a id="borrame" class="btn btn-danger btn-lg btn-block" href="{{URL::to('productos/borrar')}}">
                    Eliminar Imágenes Seleccionadas
                </a>
                --}}
                <br/>
                <button class="btn btn-danger btn-lg btn-block" name="borrame2" id="borrame2">Eliminar Imágenes Seleccionadas</button>
                
            </div>

        <div class="blanco"></div>
        {{-- Form::close() --}}
        {{ Form::close() }}
    </div>

    
    {{HTML::script('js/listar-gestion-prod.js')}}
    {{HTML::script('js/marcar-todos.js')}}
    <script src="http://blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
    <script src="/js/bootstrap-image-gallery.min.js"></script>
@endif
@stop