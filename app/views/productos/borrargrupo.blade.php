@extends('layout.main')

@section('content')
<style type="text/css">
	.fondopanel {
		width: auto;
		margin: 2em auto;
	}
</style>
	<div class="container">
		<div class="hidden-sm hidden-md hidden-lg">
            <div class="titol-head-head peque">
                <h3><i class="fa fa-list izq"></i>Borrar imágenes</h3>
            </div>
        </div>
        <div class="hidden-xs">
            <div class="titol-head-head">
                <h3><i class="fa fa-list izq"></i>Borrar imágenes</h3>
            </div>
        </div>
        <div class="row">
        	{{ Form::open(array('url' => 'productos/borrargrupo','class'=>'form-login','role'=>'form')) }}
			<h3>Imágenes seleccionadas para borrar</h3>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 fondopanel">
				
				@foreach( $ides as $i)
	
				{{HTML::image('productos/'.$i.'/imatge','imagen',['class'=>'img img-responsive img-thumbnail moverimagenes','width'=>150])}}
				{{ Form::hidden('invisible[]', $i) }}
			@endforeach
			</div>
        </div>

			<div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3">
				<br/>
				<div class="form-group">
					{{ Form::submit('Eliminar imágenes',array('class'=>'btn btn-danger btn-lg btn-block'))}}
				</div>

			</div>
		{{ Form::close() }}
	</div>
@stop