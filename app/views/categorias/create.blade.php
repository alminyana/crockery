@extends('layout.main')

@section('content')
<style type="text/css">
	.panel {
        margin-top: 2em;
        margin-bottom: 2em;
        -moz-box-shadow: 2px 2px 10px #1c1b1c;
		-webkit-box-shadow: 2px 2px 10px #1c1b1c;
		box-shadow: 2px 2px 10px #1c1b1c;
    }
</style>
	<div class="container">
		<div class="titol-head">
			<h3><i class="fa fa-list-alt izq"></i>Formulario Alta Categoria</h3>
			
		</div>
		<ul>
	        @foreach($errors->all() as $error)
	            <li>{{ $error }}</li>
	        @endforeach
	    </ul>
			 <div id="tablacateg" class="col-xs-12 col-sm-12">
			 	{{--Categorias actuales version tabla--}}
			 	
	    	<div class="panel panel-primary">
				  <div class="panel-heading">
                <h4><i class="fa fa-sort izq"></i>Subcategorías actuales de Crockery</h4>
            </div>

				  		<div class="table-responsive">
			 		
				<table id="tabla-actuales" class="table table-hover table-striped">
					<thead>
						<tr>
							<th>Nombre</th>
							<th>Número de Fotos</th>
							<th>Subcategorías</th>
							<th>Fecha de creación</th>
							<th>Última modificación</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($categorias as $cate)			  	
							<tr>
								<td><h4 class="text-warning">{{$cate->nom}}</h4></td>
								<td><span class="badge">{{$cate->numFotos}}</span></td>
								<td><i class=""></i>
									@foreach($subcategorias as $sub)
										@if($sub->id_categ == $cate->id)
											<span class="text-danger"><strong>{{$sub->nom}}</strong></span><br/>
										@endif
									@endforeach
								</td>
								<td>{{$cate->created_at->format('d-m-Y')}}</td>
								<td>{{$cate->updated_at->format('d-m-Y')}}</td>
							</tr>				
						@endforeach
					</tbody>
				</table>
			 	</div>		  
				</div>
		    </div>
			
			<div class="col-xs-12 col-sm-10 col-sm-offset-1">
				<h3 class="text-default"><i class="glyphicon glyphicon-log-in izq"></i>Insertar Categoria</h3>
				{{ Form::open(array('url'=>'categorias', 'class' => 'form-login well','id'=>'formulogin','method'=>'post','rol'=>'form')) }}
			
			    <?php  //nom  ?>
			    <div id="inputnom" class="form-group">
			    	{{ Form::label('nom','Nombre') }}
			    	{{ Form::text('nom', null, array('placeholder'=>'Nombre de la Categoría','class'=>'form-control input-lg','required'=>'true')) }}
			    </div>
			    <div class="for-group">
			    	{{ Form::submit('Crear Categoria',array('class'=>'btn btn-success btn-lg btn-block'))}}
			    </div>
			{{ Form::close() }}
			</div>
	</div>
	{{HTML::script('js/jquery.tablesorter.js')}}
    <script>
    //llamada a tablesorter para Tabla Index Categorias
    $('#tabla-actuales').tablesorter();
</script>
@stop