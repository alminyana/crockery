<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Crockery</title>
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>

	<style type="text/css">
		@media screen and (max-width: 350px) {
			
		}
		@media screen and (min-width: 351px) and (max-width: 480px) {
				
		}
		.container-fluid {
			text-align: center;
			width: 100%;
			height: 100%;
			vertical-align: middle;
		}
		.caja {
			text-align: center;
			vertical-align: middle;
		}
	</style>
</head>
<body>
		<div class="container-fluid">
			<div class="caja">
				<a id="logoinicial" href="{{URL::to('index')}}"><img id="imgimg" src="img/home-face.gif" class="img img-responsive"></a>
			</div>
		</div>



	<script type="text/javascript">
		$(document).ready(function(){
			$('.caja').css({
	               position:'absolute',
	               left: ($(window).width() - $('.caja').outerWidth())/2,
	               top: ($(window).height() - $('.caja').outerHeight())/2
	          });
		    $(window).resize(function(){
	          $('.caja').css({
	               position:'absolute',
	               left: ($(window).width() - $('.caja').outerWidth())/2,
	               top: ($(window).height() - $('.caja').outerHeight())/2
	          });
        
  			});
			// Ejecutamos la función
			$(window).resize();
		});
		
	</script>
</body>
</html>