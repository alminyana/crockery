$(document).ready(function(){


        /*$('.felpamenu button').on('click', function(event){
            // console.log(event);
            var identif = event.currentTarget.attributes.valor.nodeValue;
            obtenerSubcategoriasMenu(identif);
            event.toElement.classList.add('pepito');
            // console.log(this);
        });*/


        function obtenerSubcategoriasMenu(identif)
        {
                var dato = identif;
                $.ajax({
                    type: 'GET',
                    url: 'productos/content_ajax',
                    data: {categoria: dato},
                    dataType: 'json',
                    beforeSend: function(){
                       alert('hola');
                    },
                    success: function (respuesta) {
                        
                        var mostra = ''; 
                        if (respuesta) {
                            // console.log(respuesta);
                            for (data in respuesta.subs) {
                                //console.log(respuesta.subs[data]);
                                mostra+="<li><a href='' class='zzzz' id="+ respuesta.subs[data].id +">"+ respuesta.subs[data].nom+"</a></li>";
                            }
                        }
                        $('#'+dato).html(mostra);
                        
                    }
            });
        }


        //Evento click en nuevo menu
        /**
            Al seleccionar un botón de subcategoria capturamos categ y subcateg de los elementos html
            y pintamos dinamicamente el titulo de la galeria.
            Llamamos a método ajax para obtener imágenes
        */
        $('body').on('click', '.zzzz', function (){

            var dato= this.attributes;
            console.log('$dato', dato);
            obtenerProductosNuevoMenu(dato);
        });




        function obtenerProductosNuevoMenu(valor)
        {
             //e.preventDefault();
            //$valor = $(this).val();
            $valor = valor;

            $.ajax({
                type: 'GET',
                url: 'showproductoajax',
                contentType: "image/png",
                data: {subcategoria: $valor},
                dataType: 'json',
                beforeSend: function(){

                    // var logoAjax = '<img src="/img/gif-load.gif" style="padding-top: 5em;" class="center-block"/>'
                    // $('#contenidoajax').html(logoAjax);
                },
                success: function (respuesta) {
                    var content="";
                    if(respuesta){
                        content+="<div id='links'>";
                        for (data in respuesta.obs) {
                            /* version 1 */                            
                            content+="<div class='col-xs-12 col-sm-6 col-md-4 col-lg-3'><div class='thumbnail'>";
                            content+="<a href='productos/"+respuesta.obs[data].id+"/imatge' data-gallery>";
                            content += "<img class='img img-responsive img-rounded anchito' src='productos/"+respuesta.obs[data].id+"/imatge'/>";
                            content+="</a>";
                            
                            content += "<p><a href='productos/"+respuesta.obs[data].id+"/imatge' class='btn btn-success btn-xs center' id='down' download='"+respuesta.obs[data].id+".jpg'><i class='glyphicon glyphicon-cloud-download'></i></a></p>";
                            content+="</div></div>";
                        }
                        content+='</div>';
                    }
                    $('#contenidoajaxxx').html(content);
                }

            }); //final metodo ajax
        } //final funcion



});
