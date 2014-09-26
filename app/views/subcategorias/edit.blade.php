@extends('layout.main')

@section('content')
	<div class="container">
		<div class="titol-head">
        	<h3 class="bg-primary"><i class="glyphicon glyphicon-pencil izq"></i>Editar Subcategoría</h3>
    	</div>
    	<div class="container">

    		<fieldset class="fondo-fieldset">
    			<legend><h3>Datos Subcategoria</h3></legend>
    			<div class="col-xs-12 col-sm-6">
	 			<h4>Nombre<br/><span class="text-info">{{$sub->nom}}</span></h4>
	 			<h4>Descrición<br/> <span class="text-success">{{$sub->descripcio}}</span></h4>
	 		</div>
	 		<div class="col-xs-12 col-sm-6">
	 			<h4>Número de Imágenes<br/>
	 			<span class="text-info">{{$numFotos}}</span>
	 			</h4>
	 		</div>
    		</fieldset>

	    </div>

	    <div class="col-xs-12 col-sm-10 col-sm-offset-1">
				<h3 class="text-default">Formulario Edición</h3>
				{{ Form::open(array('url'=>'subcategorias/'.$sub->id, 'class' => 'form-login well','method'=>'put','rol'=>'form')) }}
			
			    <?php  //nom  ?>
			    <div id="inputnom" class="form-group">
			    	{{ Form::label('nom','Nombre') }}
			    	{{ Form::text('nom', $sub->nom, array('class'=>'form-control input-lg')) }}
			    </div>
			    <?php  //descripcion  ?>
			    <div id="inputnom" class="form-group">
			    	{{ Form::label('descripcio','Descripcion') }}
			    	{{ Form::text('descripcio', $sub->descripcio, array('class'=>'form-control input-lg')) }}
			    </div>
			    <br/>
			    <div class="for-group">
			    	{{ Form::submit('Editar datos',array('class'=>'btn btn-success btn-lg btn-block'))}}
			    </div>
			{{ Form::close() }}
			</div>



	</div>
@stop