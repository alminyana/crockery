$(document).ready(function(){

		

		$('body').ready(obtenerSubcategoriasListarGestion);
		$('body').ready(obtenerImagenesListar);
		//submit formu borrar imágenes seleccionadas
		$('#borrame1').click(function(){
			$('#toto1').submit();

		});
		
		$('#borrame2').click(function(){
			$('#toto2').submit();
		});

		//boton mostrar subcategorias
		$('body').on('click','#ajaxlistarsub',obtenerSubcategoriasListarGestion);
		$('body').on('change','#cate_listar_gestion',obtenerSubcategoriasListarGestion);
		//boton mostrar imagenes
		$('body').on('click','#ajaxlistarprod',obtenerImagenesListar);
		$('body').on('change','#id_subcateg',obtenerImagenesListar);
		//obtener las imagenes de una subcategoria concreta
		function obtenerImagenesListar()
		{
			$('.tablaprods').slideUp('fast');
			var valor = $('#id_subcateg').val();
			console.log(valor);
			$.ajax({
				type: 'GET',
				url: '/listargestion',
				contentType: "image/png",
				data: {subcategoria: valor},
				dataType: 'json',
				beforeSend: function(){

				},
				success: function(respuesta) {
					var info="";
					if  (respuesta) {
						var subcat = respuesta.subcategoria.nom;
						var numero = respuesta.numero;
						var cate = $('#cate_listar_gestion option:selected').html();
						document.getElementById('cat').innerHTML=cate;
						document.getElementById('sub').innerHTML=subcat;
						document.getElementById('num').innerHTML=numero;
						info+='<div id="links">';
						for (data in respuesta.obs) {
							//info += "<img class='img img-responsive img-rounded' src='/productos/"+respuesta.obs[data].id+"/imatge'/>";
							info+='<tr>';
							info+="<td><a href='/productos/"+respuesta.obs[data].id+"/imatge' title='"+cate+" / "+subcat+"' data-gallery>";


							info+="<img class='img img-responsive img-rounded listado' src='/productos/"+respuesta.obs[data].id+"/imatge'/>";
							info+="</a></td>";
							//info+="<td>"+respuesta.obs[data].id+"</td>";
							//info+="<td>"+subcat+"</td>";
							info+="<td><a class='btn btn-default' href='/productos/"+respuesta.obs[data].id+"/edit'>Editar</a></td>";
							info+="<td><a class='btn btn-danger' href='/productos/"+respuesta.obs[data].id+"/destroy'>Eliminar</a>";

							info+="</td>";
							info+="<td><input type='checkbox' class='form-control' value='"+respuesta.obs[data].id+"' name='selecto[]'></td>";
							info+='</tr>';
						}
						info+="</div>";
					}
					$('#volcar').html(info);
					$('.tablaprods').slideDown('slow');
				}
			});
		}


	//Obtener todos las subcategorias de una categoria concreta ---FORMU ALTA PRODUCTO---   
        function obtenerSubcategoriasListarGestion()
        {
    		$('.subsub').slideUp('fast');
            var dato = $('#cate_listar_gestion').val();
            //console.log(dato);
            $.ajax({
                    type: 'GET',
                    url: 'content_ajax',
                    data: {categoria: dato},
                    dataType: 'json',
                    beforeSend: function(){
                        
                    },
                    success: function (respuesta) {
                        var mostra = ''; 
                        if (respuesta) {
                            mostra += "<select class='form-control input-lg' name='id_subcateg' id='id_subcateg'>";
                            for (data in respuesta.subs) {
                                mostra += "<option value="+respuesta.subs[data].id+">"+respuesta.subs[data].nom+"</option>";
                                //mostra += "Nom: "+respuesta.subs[data].nom+"<br/>";
                                //mostra += "Id: "+respuesta.subs[data].id+"<br/>";
                            }
                            mostra += "</select>";
                        }
                        $('#subcategorias').html(mostra);
                        $('.subsub').slideDown('slow');
                    }
            }); //final metodo ajax

        } //final obtenerSubcategorias()

        $('#marcar').click(function(){
			$("input:checkbox").prop("checked", true);
		});
        $('#desmarcar').click(function(){
			$("input:checkbox").prop("checked", false);
		});

});