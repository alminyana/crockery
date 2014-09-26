$(document).ready(function(){

	$('body').ready(obtenerSubs);
	$('body').on('change','#cate_movergrupo',obtenerSubs);

	function obtenerSubs()
	{
		var cate = $('#cate_movergrupo').val();
		$.ajax({
			type: 'GET',
			url: 'content_ajax',
			data: {categoria: cate},
			dataType: 'json',
			beforeSend: function(){
				var espera = "<i class='fa fa-refresh fa-spin fa-2x'></i>";
				$('#volcado').html(espera);
			},
			success: function (resposta){
				$('#volcado').empty();
				var mostra = ''; 
	            if (resposta) {
	                mostra += "<select class='form-control input-lg' name='id_subcateg'>";
	                for (data in resposta.subs) {
	                    mostra += "<option value="+resposta.subs[data].id+">"+resposta.subs[data].nom+"</option>";
	                    //mostra += "Nom: "+resposta.subs[data].nom+"<br/>";
	                    //mostra += "Id: "+resposta.subs[data].id+"<br/>";
	                }
	                mostra += "</select>";
	            }
	            $('#volcado').html(mostra);
			}
		});//final metodo ajax
	}
});