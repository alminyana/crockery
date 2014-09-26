@extends('layout.main')

@section('content')
<div class="container">
	<div class="titol-head">
        <h3 class="bg-primary"><i class="glyphicon glyphicon-pencil izq"></i>Editar Categoría</h3>
    </div>

    <div class="container">

    	<div class="row fondo">
 		<div class="col-xs-12 col-sm-6">
 			<h4>Categoría<br/><span class="text-info">{{$categoria->nom}}</span></h4>
 			<p>Desc <span class="text-success">{{$categoria->descripcio}}</span></p>
 		</div>
 		<div class="col-xs-12 col-sm-6">
 			<h4>Subcategorías<br/>
 			@foreach($subs as $s)
 				<span class="text-warning">{{$s->nom}}</span><br/>
 			@endforeach
 			</h4>
 		</div>
    	
    </div>
    </div>

    <div class="row">
    	<div class="col-xs-12 col-sm-10 col-sm-offset-2">
    		<div class="tabla">

    		</div>
    	</div>
    </div>


    <div class="col-xs-12 col-sm-10 col-sm-offset-1">
				<h3 class="text-default">Formulario Edición</h3>
				{{ Form::open(array('url'=>'categorias/'.$categoria->id, 'class' => 'form-login well','method'=>'put','rol'=>'form')) }}
			
			    <?php  //nom  ?>
			    <div id="inputnom" class="form-group">
			    	{{ Form::label('nom','Nombre') }}
			    	{{ Form::text('nom', $categoria->nom, array('class'=>'form-control input-lg')) }}
			    </div>
			    <?php  //descripcion  ?>
			    <div id="inputnom" class="form-group">
			    	{{ Form::label('descripcio','Descripcion') }}
			    	{{ Form::text('descripcio', $categoria->descripcio, array('class'=>'form-control input-lg')) }}
			    </div>
			    <br/>
			    <div class="for-group">
			    	{{ Form::submit('Editar datos',array('class'=>'btn btn-primary btn-lg btn-block'))}}
			    </div>
			{{ Form::close() }}
			</div>
</div>
@stop