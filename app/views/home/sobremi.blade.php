@extends('layout.main')

@section('content')
    <?php  //boton facebook ?>
    <div id="fb-root"></div>
    <script>
    (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v2.0";
      fjs.parentNode.insertBefore(js, fjs);
    }
    (document, 'script', 'facebook-jssdk'));
    </script>


	<div class="container">
        <div class="hidden-sm hidden-md hidden-lg">
            <div class="titol-head-head peque">
                <h3><i class=""></i>Sobre Crockery</h3>
                <!--  h3 class="sombra"><i class="fa fa-map-marker izq"></i><strong>Sobre Crockery</strong></h3  -->
            </div>
        </div>
        <div class="hidden-xs">
            <div class="titol-head-head">
                <h3><i class=""></i>Sobre Crockery</h3>
            </div>
        </div>
    </div>
    
	<div class="container finalpagina">
        <div class="col-xs-12 col-sm-8 col-sm-offset-2">
            <h2 class="text-info">{{Lang::get('textos.infoinfo')}}</h2>
        <p class="expli">{{Lang::get('textos.expli1')}}<br/>
          {{Lang::get('textos.expli2')}} </p>
        </div>

        <style type="text/css">
    .megusta{
        margin-left: 15em;
        margin-top: 5em;

    } 
    </style>
    {{-- 
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="megusta">
            <div class="fb-like" data-href="https://www.crockery.es" data-layout="standard" data-action="like" data-show-faces="false" data-share="true"></div>
        </div>
    </div>
    --}}

    </div>	


@stop