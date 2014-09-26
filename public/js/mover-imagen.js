$(document).ready(function(){
	$('body').on('change','#seleccategorias',obtenerSubsMover);

	function obtenerSubsMover()
	{
		var ident = $('#seleccategorias').val();
		alert(ident);
		$.ajax({
			type: 'GET',
			url: '/filtrosubcategorias',
			data: {categoria: ident},
			dataType: 'json',
			beforeSend: function(){
				$('#cambio').empty();
				var icono = "<i class='fa fa-refresh fa-spin fa-2x'></i>";
				$('#cambio').html(icono);
			},
			success: function(respuesta) {
				$('#cambio').empty();
				var volcar="";
				if (respuesta) {
                    volcar += "<select class='form-control input-lg' name='id_subcateg' id='id_subcateg'>";
                    for (data in respuesta.subs) {
                        volcar += "<option value="+respuesta.subs[data].id+">"+respuesta.subs[data].nom+"</option>";
                        //volcar += "Nom: "+respuesta.subs[data].nom+"<br/>";
                        //volcar += "Id: "+respuesta.subs[data].id+"<br/>";
                    }
                    volcar += "</select>";
                }

            	//$('#datos').html(volcar);
				$('#cambio').html(volcar);
			}
		});
	}
});