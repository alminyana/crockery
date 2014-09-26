@extends('layout.main')
<?php /*
VISTA LOGIN USUARIO
*/ ?>
@section('content')
	<div class="container">
		<div class="titol-head">
				<h3><i class="glyphicon glyphicon-log-in izq"></i>Login Crockery</h3>
			</div>
		<div class="row">
			<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
				<ul>
		        @foreach($errors->all() as $error => $value)
		            <li>{{ $vaue }}</li>
		        @endforeach
		    </ul>
			<h4 class="text-danger">{{Lang::get('textos.titloginusu')}}</h4>
			{{ Form::open(array('url'=>'usuaris/login', 'class' => 'form-login well','id'=>'formulogin','method'=>'post')) }}

			
			    <?php  //Mail  ?>
			    <div id="inputmail" class="form-group">
			    	{{ Form::label('mail','Email') }}
			    	{{ Form::text('mail', null, array('placeholder'=>'Email','class'=>'form-control input-lg','onblur'=>'validate(this.id,this.value)','required'=>'true','title'=>'titulo')) }}
			    </div>
			    <?php  //Password  ?>
			    <div id="inputpassword" class="form-group">
			    	{{ Form::label('password','Password') }}
		    		{{ Form::password('password', array('placeholder'=>'Password','class'=>'form-control input-lg','onblur'=>'validate(this.id,this.value)','required'=>'true','title'=>'titulo')) }}

			    </div>
			    <br/>
			    <div class="form-group">
			    	{{ Form::submit('Login',array('class'=>'btn btn-success btn-lg btn-block','id'=>'idlogin'))}}
			    </div>
			{{ Form::close() }}
		<!-- </div> -->
	<!-- </div> -->
			</div>
		</div>
	</div>
@stop