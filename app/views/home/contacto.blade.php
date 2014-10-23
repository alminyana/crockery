@extends('layout.main')
<script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAHsPg75t40Gs1_fuCiRD0KBRKa72gNgtg&sensor=true">
    </script>
@section('content')
<script>
/*
crockery:
  latitud: 41.39696313211986
  longitud: 2.17448148472522
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
        var myCenter =  new google.maps.LatLng(41.400867, 2.184670);
        var mapOptions = {
          center:myCenter,
          zoom: 14,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        //icono y marker de crockery
        var image = "img/marker1.png";

        var marker = new google.maps.Marker({
            position: myLatlng,
            map: map,
            animation: google.maps.Animation.DROP,
            title:"Crockery",
            icon: image
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

        var infowindow = new google.maps.InfoWindow({
            content: contentString
        });
        //listener on click para el marker de crockery
        google.maps.event.addListener(marker, 'click', function() {
          infowindow.open(map,marker);
        });

        map = new google.maps.Map(document.getElementById("map_canvas"),mapOptions);
        map.setOptions({styles: styles, scrollwheel: false});
        marker.setMap(map);
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
    </style>
    <div class="container">
        <div class="col-xs-12 col-sm-8 col-md-6 col-lg-5 page-header">
          <h2><strong>CROCKERY</strong> <i class="fa fa-map-marker"></i></h2>

        </div>
    </div>

    <div class="container finalpagina">
      <div id="map_canvas"></div>  
      <div class="jumbotron">
        <div class="col-xs-12 col-sm-6 col-md-6">
          <div class="logo">{{HTML::image('img/logo.jpg','logo Crockery',array('width'=>'400','class'=>'img img-responsive center-block','width'=>350))}}</div>
          <br/>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6">
          <div id="fondodirec" class="contacto">
          <address>

          <h2><span class="text text-info">{{Lang::get('textos.direcc')}}</span></h2>
          <i class="glyphicon glyphicon-map-marker izq"></i> {{Lang::get('textos.pasaje')}} Tasso 6, Barcelona<br>
          <i class="glyphicon glyphicon-phone-alt izq"></i> (93) 5341768<br/>
          <i class="glyphicon glyphicon-phone izq"></i> 678 437 407<br/>
          <i class="glyphicon glyphicon-phone izq"></i> 678 437 408<br/>
        </address></div>
        </div>
      </div>
      <div class="clearfix"></div>
      <br/>
      <br/>
          <div class="container">
            <div class="row fondo">
          <div class="col-xs-12 col-sm-6 col-md-5 col-lg-5">
          <h2 class="text-info">{{Lang::get('textos.horario')}}</h2>
          <p class="horario"><span class="text-success upper"><strong>{{Lang::get('textos.julio')}}</strong></span><br/>
            {{Lang::get('textos.manana')}} 10:00 14:00<br/>
            {{Lang::get('textos.tarde')}} 16:00 19:00<br/>
          </p>
          <p class="horario"><span class="text-success upper"><strong>{{Lang::get('textos.agosto')}}</strong></span><br/>
            {{Lang::get('textos.reserva')}} <br/><i class="glyphicon glyphicon-phone izq"></i> 678 437 408
          </p>
          <br/>
          <h2 class="text-info">{{Lang::get('textos.acces')}}</h2>
          <p class="horario">
            {{Lang::get('textos.acces2')}}
          </p>
          <br/><br/>

        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-md-offset-1 col-lg-6 col-lg-offset-1">
       
          {{Html::image('img/plano2.PNG','plano cercano',['class'=>'img-responsive','id'=>'planomapa'])}}
        </div>
        </div>
          </div>     
        
  </div>

@stop