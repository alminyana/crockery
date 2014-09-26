@extends('layout.main')
@section('content')
<script>
	$(document).ready(function(){
		$('#toolnom').hover(function(){
			$('#toolnom').tooltip('show');
		});
	});
</script>
		<div class="container">
			<div class="titol-head">
				<h3><i class="fa fa-list-alt izq"></i>Formulario Alta Usuario</h3>
			</div>
		<div class="row">
			<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-1 col-lg-8 col-lg-offset-2">
			<ul>
		        @foreach($errors->all() as $error)
		            <li>{{ $error }}</li>
		        @endforeach
		    </ul>
			<h4 class="text-danger">{{Lang::get('textos.tit-crea-usu')}}</h4>
			{{ Form::open(array('url'=>'usuaris', 'class' => 'form-login well','id'=>'formuregistro')) }}
		    	<?php  //nom  ?>
			    <div id="inputnom" class="form-group">
			    	{{ Form::label('nom',Lang::get('textos.nombre')).' *' }}
			    	{{ Form::text('nom', null, array('placeholder'=>'Alberto','class'=>'form-control input-lg','data-toggle'=>'tooltip','data-placement'=>'top','title'=>'Introduce solo letras','required'=>'true','id'=>'toolnom')) }}
			    </div>
			    <?php  //Mail  ?>
			    <div id="inputmail" class="form-group">
			    	{{ Form::label('mail','Email *') }}
			    	{{ Form::text('mail', null, array('placeholder'=>'alberto@algo.tal','class'=>'form-control input-lg','onblur'=>'validate(this.id,this.value)','required'=>'true','title'=>'titulo')) }}
			    </div>
			    <?php  //Password  ?>
			    <div id="inputpassword" class="form-group">
			    	{{ Form::label('password','Password *') }}
		    		{{ Form::password('password', array('placeholder'=>'Password','class'=>'form-control input-lg','onblur'=>'validate(this.id,this.value)','required'=>'true','title'=>'titulo')) }}
			    </div>
			    <?php //Repetir Password ?>
				<div id="inputpassword_confirmation" class="form-group">
					{{ Form::label('password_confirmation','Repetir Password *') }}
					{{ Form::password('password_confirmation', array('placeholder'=>'Repetir Password','class'=>'form-control input-lg','required'=>'required','onblur'=>'validate(this.id,this.value)','title'=>Lang::get('textos.passcheck'))) }}
				</div>
				<div class="form-group">
					{{Form::label('acepto', Lang::get('textos.privacidad'))}}
					<p class="form-control-static text-primary">{{Lang::get('textos.textoprivacidad')}}
					</p>
				</div>
			    <br/>
			    <div class="form-group">
			    	{{ Form::submit(Lang::get('textos.registrarme'),array('class'=>'btn btn-primary btn-lg btn-block','id'=>'idlogin'))}}
			    </div>
			{{ Form::close() }}
		<!-- </div> -->
	<!-- </div> -->
			</div>
		</div>
	</div>
@stop