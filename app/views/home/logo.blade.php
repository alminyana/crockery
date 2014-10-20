<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Crockery</title>
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
	<style type="text/css">
	body,html {
		height: 100%;
	}
	.horizontal {
		display: flex;
		justify-content: center;
	}
	.vertical {
		display: flex;
		flex-direction: column;
		justify-content: center;
	}
	.divPadre {
		height: 100%;
	}
	</style>
</head>
<body>
	<div class="horizontal divPadre">
		<div class="vertical">
			<a id="logoinicial" href="{{URL::to('index')}}"><img id="imgimg" src="img/home-face.gif" class="img img-responsive"></a>
		</div>
	</div>
</body>
</html>