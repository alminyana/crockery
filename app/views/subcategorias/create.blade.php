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
			<h3><i class="fa fa-list-alt izq"></i>Formulario Alta Subcategoria</h3>
			
		</div>
		<ul>
	        @foreach($errors->all() as $error)
	            <li>{{ $error }}</li>
	        @endforeach
	    </ul>


			 <div id="tablasubcateg" class="col-xs-12 col-sm-12">
			 	{{--Categorias actuales version tabla--}}
			 	
				@foreach($categorias as $cat)

				                <div class="panel panel-primary">    
				                <div class="panel-heading">
				                    <h4>
				                        <small><strong>CAT  </strong></small> 
				                        <strong>{{$cat->nom}}</strong>
				                    </h4>
				                </div>
				                
				                    <div class="table-responsive">
				                        <table class="table table-hover">
				                            <thead>
				                                <th>Nombre Subcategoría</th>
				                                <th class="text-center">Número de Fotos</th>
				                                <th>Última Modificación</th>
				                                
				                            </thead>
				                            <tbody>
				                                @foreach($subcategorias as $sub)
				                                    @if ($sub->id_categ == $cat->id)
				                                        <tr>
				                                            <td id="tdnom"><strong class="text-danger">{{$sub->nom}}</strong></td>
				                                            <td class="text-center"><span class="badge">{{$sub->numFotos}}</span></td>
				                                            <td>{{$sub->updated_at->format('d-m-Y')}}</td>
				                                            
				                                        </tr>
				                                    @endif
				                                @endforeach
				                            </tbody>
				                        </table>
				                    </div>
				                </div>   

            @endforeach
		    </div>
		    {{-- FORMULARIO --}}
	    <div class="col-xs-12 col-sm-10 col-sm-offset-1">
				<h3 class="text-default"><i class="glyphicon glyphicon-log-in izq"></i>Insertar Subcategoría</h3>
				{{ Form::open(array('url'=>'subcategorias', 'class' => 'form-login well','id'=>'formulogin','method'=>'post','rol'=>'form')) }}
				<?php //categoria ?>
				<div class="for-group">
					{{Form::label('categoria','Categoria')}}
					{{Form::select('categoria',$cats,'id',['class'=>'form-control input-lg'])}}
				</div>


			    <?php  //nom  ?>
			    <div id="inputnom" class="form-group">
			    	{{ Form::label('nom','Nombre') }}
			    	{{ Form::text('nom', null, array('placeholder'=>'Nombre de la Subcategoría','class'=>'form-control input-lg','required'=>'true')) }}
			    </div>
			    <div class="for-group">
			    	{{ Form::submit('Crear Subcategoría',array('class'=>'btn btn-danger btn-lg btn-block'))}}
			    </div>
			{{ Form::close() }}
			</div>





	</div>
@stop