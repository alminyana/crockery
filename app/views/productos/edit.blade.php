@extends('layout.main')

@section('content')
<div class="container">
	<div class="hidden-sm hidden-md hidden-lg">
        <div class="titol-head-head peque">
            <h3><i class="fa fa-list izq"></i>Mover Imagen</h3>
        </div>
    </div>
    <div class="hidden-xs">
        <div class="titol-head-head">
            <h3><i class="fa fa-list izq"></i>Mover Imagen</h3>
        </div>
    </div>
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
<style type="text/css">
	i {
		margin-left: 2em;
	}
</style>
    <div class="col-xs-12 col-sm-10 col-sm-offset-1">
			<h3 class="text-default">Cambio de Categoría</h3>
			{{ Form::open(array('url'=>'productos/'.$prod->id, 'class' => 'form-login well','method'=>'put','rol'=>'form')) }}

			<div class="form-group">
				{{ Form::label('id_categ','Categoría') }}

				{{Form::select('id_categ',$cat,$prod->id_categ,['class'=>'form-control input-lg','id'=>'seleccategorias'])}}
			</div>
			<div class="form-group">
				{{ Form::label('id_subcateg','Subcategoría') }}
				<div id="datos"></div>
				<div id="cambio">
					{{Form::select('id_subcateg',$sub,$prod->id_subcateg,['class'=>'form-control input-lg','id'=>'selecsubcategorias'])}}
				</div>
			</div>
			<div class="form-group">
				{{HTML::image('productos/'.$prod->id.'/imatge','imagen producto',['class'=>'img img-responsive img-thumbnail center-block','width'=>500])}}
			</div>
		    <br/>
		    <div class="for-group">
		    	{{ Form::submit('Editar datos',array('class'=>'btn btn-success btn-lg btn-block'))}}
		    </div>
		{{ Form::close() }}
	</div>


</div>
	{{HTML::script('js/mover-imagen.js')}}
@stop