@extends('layout.main')

@section('content')
	{{HTML::script('js/fileinput.js')}}
    {{HTML::style('css/fileinput.css')}}
<style>
.file-preview-frame {
    display: table;
    margin: 8px;
    height: 160px;
    border: 0px solid #ddd;
    box-shadow: 1px 1px 5px 0px #a2958a;
    padding: 6px;
    float: left;
    text-align: center;
}
</style>
<div id="identificador" class="createobjbody"></div>

	<div class="container">
		<div class="titol-head">
			<h3>
				<i class="fa fa-list-alt izq"></i>Formulario Alta Producto
				{{--HTML::image('img/tituloproducto.jpg', 'titulo',['class'=>'img img-responsive center-block']);--}}
			</h3>
			
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-10 col-lg-offset-1">
				<ul>
		        @foreach($errors->all() as $error)
		            <li>{{ $error }}</li>
		        @endforeach
		    </ul>
				<h3><i class="glyphicon glyphicon-floppy-save izq"></i>Insertar Producto</h3>
				{{ Form::open(array('url'=>'productos', 'files' => true, 'class' => 'form-login well','id'=>'formuproducto','role'=>'form','enctype'=>'multipart/form-data')) }}

			<div class="form-group">
				{{Form::label('id_categ','Categoria')}}<br/>
				{{Form::select('id_categ',$categorias,'id',['class'=>'form-control','id'=>'selectsubcategorias'])}}
				
			</div>
			<div class="form-group">
				{{Form::label('id_subcateg','Subcategoria')}}<br/>
				<div id="subcateg"></div>
				<div id="wait">{{--HTML::image('img/gif-load.gif','waiting...',array('id'=>'fotowait'))--}}
					<i class="fa fa-refresh fa-spin fa-2x"></i>
				</div>
			</div>
			<div class="form-group">
				{{Form::label('imatge','Foto Producto')}}<br/>
				{{--Form::file('imatge[]',array('class'=>'form-control input-lg','onchange'=>
				'readVariosURL(this)','multiple'=>true))--}}
				

                <input id="file-3" type="file" name="imatge[]" accept="image/jpeg, image/x-png" multiple=true class="form-control input-lg">
                <p class="help-block">Formatos permitidos jpg, png.</p>
            </div>

			    <div class="form-group">
			    	{{-- Form::submit('Insertar Producto',array('class'=>'btn btn-lg btn-success btn-block','id'=>'idlogin')) --}}
			    </div>
			{{ Form::close() }}
			</div>
		</div>
	</div>
	<script>
		$("#file-3").fileinput({
			showCaption: true,
			showUpload: true,
			showRemove: true,
			browseLabel: 'Seleccionar',
			removeLabel: 'Eliminar',
			browseClass: "btn btn-primary",
			fileType: "image"
		});
	</script>
@stop