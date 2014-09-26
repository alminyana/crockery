@extends('layout.main')

@section('content')
<style type="text/css">
	.fondopanel {
		padding: 2em;
		width: 100%;
	}
	img {
		margin: .3em;
	}
</style>
	<div class="container">
		<div class="hidden-sm hidden-md hidden-lg">
            <div class="titol-head-head peque">
                <h3><i class="fa fa-list izq"></i>Mover imágenes</h3>
            </div>
        </div>
        <div class="hidden-xs">
            <div class="titol-head-head">
                <h3><i class="fa fa-list izq"></i>Mover imágenes</h3>
            </div>
        </div>
			<h3>Imágenes seleccionadas para mover</h3>
			{{ Form::open(array('url' => 'productos/movergrupo','class'=>'form-login','role'=>'form')) }}

			<div class="fondopanel center-block">
				<div class="">	
					@foreach( $ides as $i)
						{{ HTML::image('productos/'.$i.'/imatge','imagen',['class'=>'img img-responsive img-thumbnail moverimagenes','width'=>150]) }}
						{{ Form::hidden('invisible[]', $i) }}
					@endforeach
				</div>
			</div>
			<br/>
			<h3 class="text-danger text-center">Selecciona nuevo destino para las imágenes</h3>
			<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
				<div class="form-group">

					{{ Form::select('id_categ', $categs,null,['class'=>'form-control input-lg center-block','id'=>'cate_movergrupo']) }}

				</div>
			</div>
			<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
				<div class="form-group">
					<div id="volcado"></div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3">
				<br/>
				<div class="form-group">
					{{ Form::submit('Mover imágenes',array('class'=>'btn btn-danger btn-lg btn-block'))}}
				</div>

			</div>
			{{ Form::close() }}
	</div>
	{{HTML::script('js/mover_grupo_img.js')}}
@stop