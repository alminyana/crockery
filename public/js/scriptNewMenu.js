$(document).ready(function(){
        $('.felpamenu button').on('click', function(val){
            console.log(val);
            var identif = val.currentTarget.attributes.valor.nodeValue;
            obtenerSubcategoriasMenu(identif);
            alert(val.currentTarget.attributes.class.nodeValue);
        });


        function obtenerSubcategoriasMenu(identif)
            {
                var dato = identif;
                $.ajax({
                    type: 'GET',
                    url: 'productos/content_ajax',
                    data: {categoria: dato},
                    dataType: 'json',
                    beforeSend: function(){
                       
                    },
                    success: function (respuesta) {
                
                        var mostra = ''; 
                        if (respuesta) {
                            // console.log(respuesta);
                            for (data in respuesta.subs) {
                                console.log(respuesta.subs[data]);
                                
                            }
                        }
                        // $('.dropdown-menu').html(mostra);
                        
                    }
            });
        }

    });
