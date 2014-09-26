@extends ('layout.main')

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
                                        <h4 class="text-info">Seguro que quieres eliminar la categoría de <span id="usuborrar" class="text-danger"></span>?</h4>
                                        <p class="text-warning">Automáticamente se borrarán las subcategorías y sus productos.<br/>Esta acción no se puede deshacer</p>
                                        
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                        <button id="bot" type="button" class="btn btn-danger">Eliminar Categoría</button>
                                    </div>
                                </div>
                            </div>
                        </div>
    <div class="container">
	<div class="titol-head">
        <h3 class="bg-primary"><i class="fa fa-list izq"></i>Categorías Crockery</h3>
    </div>
        
<style type="text/css">
    .badge {
        font-size: 15px;

    }
    .panel {
        -moz-box-shadow: 2px 2px 10px #1c1b1c;
-webkit-box-shadow: 2px 2px 10px #1c1b1c;
box-shadow: 2px 2px 10px #1c1b1c;
    }
</style> 
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4><i class="fa fa-sort izq"></i>Lista ordenable de Categorías</h4>
            </div>
            
            <div class="table-responsive">
            <table id="tablaindexcate" class="table table-hover">
            <thead>
                <th>Nombre</th>
                <th>Número de Fotos</th>
                <th>Subcategorías</th>
                <th>Última Modificación</th>
                <th class="text-center">Acciones</th>
            </thead>
            <tbody>
                @foreach ($categorias as $cat)
                    <tr>
                        <td id="tdnom"><h4 class="text-success">{{$cat->nom}}</h4></td>
                        <td><span class="badge">{{$cat->numFotos}}</span></td>
                        <td>
                        @foreach($subcategorias as $sub)
                            @if ($cat->id==$sub->id_categ)
                                <span class="text-danger"><strong>{{$sub->nom}}</strong></span><br/>
                            @endif
                        @endforeach
                        </td>
                        <td>{{$cat->updated_at->format('d-m-Y')}}</td>
                        <td class="acciones">
                            <a class="pull-left btn btn-default" href="{{ URL::to('categorias/'.$cat->id.'/edit')}}">Editar</a>
                            {{ Form::open(array('url' => 'categorias/'.$cat->id, 'id'=>'formu'.$cat->id)) }}
                                {{ Form::hidden('_method', 'DELETE') }}
                                <a href="#myModal" class="pull-left btn btn-default btn-danger" data-toggle="modal">Eliminar</a>
                            {{ Form::close() }}        
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
    </div>
    {{HTML::script('js/jquery.tablesorter.js')}}
    <script>
    //llamada a tablesorter para Tabla Index Categorias
    $('#tablaindexcate').tablesorter();
</script>
@stop

