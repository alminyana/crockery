<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Crockery</title>
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>

	<style type="text/css">
		body {
			background-color: grey;
			width: 100%;
		}
		#imgimg {width: 100%;}
		@media screen and (max-width: 350px) {
			#imgimg {width: 100%;}
		}
		@media screen and (min-width: 351px) and (max-width: 480px) {
				#imgimg {width: 50%;}
		}
	</style>
</head>
<body>
		<div class="caja">
			<a id="logoinicial" href="{{URL::to('index')}}">
				<img id="imgimg" src="img/home-face.gif" class="img-responsive">
			</a>
		</div>
	<script type="text/javascript">
		$(document).ready(function(){
			//$(window).location.reload();

			$('.caja').css({
	               position:'absolute',
	               left: ($(window).width() - $('.caja').outerWidth())/2,
	               top: ($(window).height() - $('.caja').outerHeight())/2
	          });

		    $(window).resize(function(){

	          // aquí le pasamos la clase o id de nuestro div a centrar (en este caso "container")
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