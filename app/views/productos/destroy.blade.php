@extends('layout.main')

@section('content')
<!-- Modal HTML (Hidden por defecto)-->
                        <div id="myModal" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h2 class="modal-title text-danger"><i class="glyphicon glyphicon-warning-sign izq"></i>Atención!</h2>
                                    </div>
                                    <div class="modal-body">
                                        <h4 class="text-info">Seguro que quieres eliminar esta imagen?</h4>
                                        <p class="text-warning">Automáticamente se borrará de la Base de Datos.<br/>Esta acción no se puede deshacer</p>
                                        
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                        <button id="xxx" type="button" class="btn btn-danger">Eliminar Imagen</button>
                                    </div>
                                </div>
                            </div>
                        </div>
<style type="text/css">
	#sub,#cat,#num {
            font-size: 35px;
        }
        #eliminarimagen {
        	margin-top: 3em;
        	margin-bottom: 4em;
        }
        .panel {
        	width: 300px;
        }
        .panel-success>.panel-heading {
        	background-color: grey;
        	color: white;
        }
        .margen {
        	margin-top: 3em;
        }
        .blanco {
        	margin-top: 1em;
        }
</style>
	<div class="container">
		<div class="titol-head">
        	<h3 class="bg-primary"><i class="fa fa-list izq"></i>Eliminar Imagen</h3>
    	</div>

			<div class="row">
				<div class="col-xs-12 col-sm-8 col-md-6 col-lg-6">
				{{HTML::image('productos/'.$foto->id.'/imatge','Imagen Producto',array('class'=>'img img-responsive img-thumbnail center-block margen','max-width'=>450))}}
			</div>
			
			<div class="col-xs-12 col-sm-4 col-md-6 col-lg-6 blanco">

				<div class="panel panel-success center-block">
					<div class="panel-heading"><strong>Categoria</strong></div>
				  <div class="panel-body">
				    <h3 class="text-danger"><strong>{{$cat->nom}}</strong></h3>
				  </div>
				  
				</div>
				<div class="panel panel-success center-block">
					<div class="panel-heading"><strong>Subcategoria</strong></div>
				  <div class="panel-body">
				    <h3 class="text-danger"><strong>{{$sub->nom}}</strong></h3>
				  </div>
				  
				</div>

			</div>
			</div>

			<div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3">
				{{ Form::open(array('url' => 'productos/'.$foto->id, 'id'=>'formu'.$foto->id)) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    <a id="eliminarimagen" href="#myModal" class="btn btn-danger btn-lg btn-block" data-toggle="modal"><i class="glyphicon glyphicon-trash izq"></i>Eliminar</a>
                {{ Form::close() }}

			</div>

	</div>
	<script type="text/javascript">
    
		$('form').click('click',function(){
	        var formu_actual = $(this).closest("form").attr('id');
	        $('#xxx').click('click',function(){
	            $('#'+formu_actual).submit();
	        }); 
	    });
    
	</script>
@stop