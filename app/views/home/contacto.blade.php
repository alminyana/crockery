@extends('layout.main')
<script
    src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCSFonLSF9y00Ez9qpqyEprGwiWES4X1ik&sensor=true&libraries=places">
  </script>
@section('content')
<script>
/*
crockery:
  latitud: 41.39696313211986
  longitud: 2.17448148472522

Barcelona Spain Calle Pallars 84-88
  latitud: 41.3950228
  longitud: 2.189605799999981

*/
  
	var styles = [
  {"stylers":[
	{
    "visibility":"on"},{"saturation":0.54},{"gamma":0.3}]//gamma:0.54
  },
  {
    "featureType":"road",
    "elementType":"labels.icon", //iconos de carreteras
    "stylers":[{"visibility":"on"}]},
  {
    "featureType":"water",
    "stylers":[{"color":"#0077FF"}]},//#4d4946
  {
    "featureType":"poi",
    "elementType":"labels.icon",
    "stylers":[{"visibility":"off"}]},
  {
    "featureType":"poi",
    "elementType":"labels.text",
    "stylers":[{"visibility":"on"}]},
  {
    "featureType":"road",
    "elementType":"geometry.fill",
    "stylers":[{"color":"#ffffff"}]},
  {
    "featureType":"road.local",
    "elementType":"labels.text",
    "stylers":[{"visibility":"on"}]},
  {
    "featureType":"water",
    "elementType":"labels.text.fill",
    "stylers":[{"color":"#ffffff"}]},
  {
    "featureType":"transit.line",
    "elementType":"geometry",
    "stylers":[{"gamma":0.48}]},
  {
    "featureType":"transit.station",
    "elementType":"labels.icon",
    "stylers":[{"visibility":"off"}]},
  {
    "featureType":"road",
    "elementType":"geometry.stroke",
    "stylers":[{"gamma":7.18}]},
  {
	 "featureType": "poi.school",
	 "elementType": "geometry.fill",
	 "stylers": [{"visibility": "off"}]},
{
  "featureType": "poi.business",
  "stylers": [{"visibility": "off"}]},
{
  "featureType": "poi.medical",
  "stylers": [{ "visibility": "off" }]},
{
  "featureType": "poi.sports_complex",
  "stylers": [{"visibility": "off"}]}
];

    var map;
      function initializeMapaRutas() {
      	var myLatlng =  new google.maps.LatLng(41.39696313211986, 2.17448148472522);
        var myLatlng2 =  new google.maps.LatLng(41.3950228, 2.189605799999981);
        var myCenter =  new google.maps.LatLng(41.400867, 2.184670);
        var mapOptions = {
          center:myCenter,
          zoom: 14,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        //icono y marker de crockery
        var image = "img/marker1.png",
            image2 = "img/markerojo.png";

        var marker = new google.maps.Marker({
            position: myLatlng,
            map: map,
            animation: google.maps.Animation.DROP,
            title:"Crockery",
            icon: image
        });
        var marker2 = new google.maps.Marker({
            position: myLatlng2,
            map: map,
            animation: google.maps.Animation.DROP,
            title:"Nuevo Crockery",
            icon: image2
        });
        //info del marker de crockery
        var contentString = '<div id="content">'+
            '<div id="siteNotice">'+
            '<img width="70%" class="img img-responsive" src="img/logo.jpg">'+
            '<div id="bodyContent">'+
            
            '<br/><p><i class="glyphicon glyphicon-home izq"></i> Pasaje Tasso 6, Barcelona</p>'+
            '<p><i class="glyphicon glyphicon-time izq"></i> <strong>Mañana</strong> 10:00 - 13:00<br/><strong><span class="sangria">Tarde</span></strong> 16:00 - 19:00</p>'+
            '</div>'+
            '</div>'+
            '</div>';

        var contentString2 = '<div id="content">'+
            '<div id="siteNotice">'+
            '<img width="70%" class="img img-responsive" src="img/logo.jpg">'+
            '<div id="bodyContent">'+
            '<br/><h4 class="text-default"><span class="text-danger"><i class="glyphicon glyphicon-warning-sign izq"></i></span><strong>Nuevo Local</strong></h4>'+
            '<p class="text-danger"><i class="glyphicon glyphicon-home izq"></i>Dirección - Pallars 84-88 2º1a, Barcelona</p>'+
            '<p><i class="glyphicon glyphicon-time izq"></i> <strong>Mañana</strong> 10:00 - 13:00<br/><strong><span class="sangria">Tarde</span></strong> 16:00 - 19:00</p>'+
            '</div>'+
            '</div>'+
            '</div>';

        var infowindow = new google.maps.InfoWindow({
            content: contentString
        });
        var infowindow2 = new google.maps.InfoWindow({
            content: contentString2
        });
        //listener on click para el marker de crockery
        google.maps.event.addListener(marker, 'click', function() {
          infowindow.open(map,marker);
        });
        google.maps.event.addListener(marker2, 'click', function() {
          infowindow2.open(map,marker2);
        });
        map = new google.maps.Map(document.getElementById("map_canvas"),mapOptions);
        map.setOptions({styles: styles, scrollwheel: false});
        marker.setMap(map);
        marker2.setMap(map);
    }

    google.maps.event.addDomListener(window, 'load', initializeMapaRutas);
    // Testing the addMarker function
   function addMarker()
   {
      var image = "img/marker.png";
      var marker = new google.maps.Marker({
      position: new google.maps.LatLng(41.39696313211986, 2.17448148472522),
      map: map,
      animation: google.maps.Animation.DROP,
      icon:image,
      title:"Crockery"});
      marker.setMap(map);
   }

    </script>
    <style type="text/css">
    #content {
      width: 100%;
    }
    .sangria {
      margin-left: 1.7em;
    }
    .contacto {
      margin-top: 2em;
    }
    </style>
    <div class="container">
        <div class="col-xs-12 col-sm-8 col-md-6 col-lg-5 page-header">
          <h2><strong>CROCKERY</strong> <i class="fa fa-map-marker"></i></h2>

        </div>
    </div>

    <div class="container finalpagina">
      <div id="map_canvas"></div>
      <div class="row">
        <div class="col-xs-12">
          <h1 class="text-danger text-center" style="font-size: 55px;margin: 2em 0"><strong>¡{{ Lang::get('textos.traslado')}}!</strong><br/><small>{{Lang::get('textos.calle')}} Pallars 84-88</small></h1>
        </div>
      </div>  
      <div class="jumbotron">
        <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2">
          <div class="logo">{{HTML::image('img/logo.jpg','logo Crockery',array('width'=>'400','class'=>'img img-responsive center-block','width'=>350))}}</div>
          <br/>

          


        </div>

        <div class="col-xs-12 col-sm-8 col-md-8">
          
          <h3 class="text-danger">{{Lang::get('textos.plano')}}</h3>
          {{Html::image('img/planoPallars.PNG','plano cercano',['class'=>'img-responsive','id'=>'planomapa'])}}
        </div>

        <div class="col-xs-12 col-sm-4 col-md-4">
          <div id="fondodirec" class="contacto">
          <address>

          <h3><span class="text text-danger">{{Lang::get('textos.direcc')}}</span></h3>
          
          </p>
          <i class="glyphicon glyphicon-map-marker izq"></i> {{-- Lang::get('textos.pasaje') --}} {{Lang::get('textos.calle')}} Pallars 84-88 2º 1a<br/><span style="margin-left: 2em">08018</span><br/>
          <i class="glyphicon glyphicon-phone-alt izq"></i> (93) 5341768<br/><br/>
          <h4 class="text-info">{{Lang::get('textos.horario')}}</h4>
          <p class="horario">
            
            09:00 - 17:00 h<br/>
            
          </p>
          <p class="horario"><span class="text-success upper"><strong>{{Lang::get('textos.agosto')}}</strong></span><br/>
            {{Lang::get('textos.reserva')}} <br/>
          <i class="glyphicon glyphicon-phone izq"></i> 678 437 408<br/>
          <i class="glyphicon glyphicon-phone izq"></i> 678 437 407<br/>
          <i class="glyphicon glyphicon-phone izq"></i> Aitor 678 411 421<br/>
          <i class="glyphicon glyphicon-envelope izq"></i> guilleduran69@gmail.com<br/>

        </address></div>
        </div>
      </div>
      <div class="clearfix"></div>

    
        
  </div>

@stop