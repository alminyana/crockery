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
                    <h4 class="text-info">Seguro que quieres eliminar la Subcategoría de <span id="usuborrar" class="text-danger"></span>?</h4>
                    <p class="text-warning">Automáticamente se borrarán sus productos.<br/>Esta acción no se puede deshacer</p>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button id="bot" type="button" class="btn btn-danger">Eliminar Subcategoría</button>
                </div>
            </div>
        </div>
    </div>
<style type="text/css">
    .badge {
        font-size: 15px;
        background-color: green;
    }
    .bloque {
        border: solid grey 1px;
        margin: 1em;
        padding: 1em;
    }
    .bloque-titol {
        background-color: #ccc;
        padding: 1em;

    }
    th:hover {
        background-color: #ddd;
        cursor:pointer;
    }
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
	        <h3 class="bg-primary"><i class="fa fa-list izq"></i>Subcategorías Crockery</h3>
	    </div>
        {{--<div class="panel panel-primary">
            <div class="panel-heading">
                <h4><i class="fa fa-sort izq"></i>Lista ordenable de Subcategorías</h4>
            </div>
        </div>--}}
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
                                <th>Acciones</th>
                            </thead>
                            <tbody>
                                @foreach($subcategorias as $sub)
                                    @if ($sub->id_categ == $cat->id)
                                        <tr>
                                            <td id="tdnom"><strong class="text-danger">{{$sub->nom}}</strong></td>
                                            <td class="text-center"><span class="badge">{{$sub->numFotos}}</span></td>
                                            <td>{{$sub->updated_at->format('d-m-Y')}}</td>
                                            <td class="acciones">
                                                <a class="pull-left btn btn-default" href="{{ URL::to('subcategorias/'.$sub->id.'/edit')}}">Editar</a>
                                                {{ Form::open(array('url' => 'subcategorias/'.$sub->id, 'id'=>'formu'.$sub->id)) }}
                                                    {{ Form::hidden('_method', 'DELETE') }}
                                                    <a href="#myModal" class="pull-left btn btn-default btn-danger" data-toggle="modal">Eliminar</a>
                                                {{ Form::close() }}        
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>   

            @endforeach
	</div>
        {{HTML::script('js/jquery.tablesorter.js')}}
    <script>
    //llamada a tablesorter para Tabla Index Categorias
    $('table').tablesorter();
</script>
@stop