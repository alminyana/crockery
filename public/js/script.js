$(document).ready(function(){
    /* Método para obtener el id del formulario actual,
        una vez comfirmado en el modal, ejecutamos submit
        utilizado en Modulo Usuaris, Modulo Bars, Modulo Rutas 
    */
    $('form').click(function(){
        var formu_actual = $(this).closest("form").attr('id');
        $('#bot').click(function(){
            $('#'+formu_actual).submit();
        }); 
    });
    /*Metodo para obtener el usuario actual cuando clicamos para borrar cuenta,
    y se lo asignamos al Modal de Bootstrap para personalizarlo
    utilizado en Modulo Categorias, Modulo Subcategorias, Modulo Productos 
    */
    $('tr').click(function(){
        var tal = $(this).find('td#tdnom').text();
        $('#usuborrar').text(tal); 
    });
    //codigo para hacer visible y funcionalidad del boton back-to-top en todas las páginas
    var offset = 230;
    var duration = 500;
    jQuery(window).scroll(function() {
        if (jQuery(this).scrollTop() > offset) {
            jQuery('.backtotop').fadeIn(duration);
        } else {
            jQuery('.backtotop').fadeOut(duration);
        }
        
    });
    
    jQuery('.backtotop').click(function(event) {
        event.preventDefault();
        jQuery('html, body').animate({scrollTop: 0}, duration);
        return false;
    });
    
    //si identificador es igual a formu crear producto...  lanzamos evento onload
    if ($('#identificador').hasClass="createobjbody") {
        $('body').ready(obtenerSubcategorias);

    }
    if ($('#identificador').hasClass="indexobjbody") {
        $('body').ready(obtenerSubcategoriasIndex);
        $('body').on('load','window',obtenerProductosAjax);
        $('body').on('click','#mostrarobjetos',obtenerProductosAjax);
        
        //$('#selectsubcategorias').ready(obtenerProductosAjax);

    }
        //AJAX PARA OBTENER SUBCATEGORIAS EN VISTA CREATE-PRODUCTO
        $('#selectsubcategorias').change(obtenerSubcategorias);

        //AJAX PARA OBTENER SUBCATEGORIAS EN VISTA INDEX-GENERAL-PRODUCTO
        $('#indexcategorias').change(obtenerSubcategoriasIndex);

        $('body').on('change','#id_subcateg',obtenerProductosAjax);
        $('body').on('ready','#id_subcateg',obtenerProductosAjax);
        

        //Obtener todos las subcategorias de una categoria concreta --INDEX PRODUCTOS---
         function obtenerSubcategoriasIndex()
            {
                var dato = $('#indexcategorias').val();
                console.log(dato);
                $.ajax({
                    type: 'GET',
                    url: 'productos/content_ajax',
                    data: {categoria: dato},
                    dataType: 'json',
                    beforeSend: function(){
                        $('#subcategorias').empty();
                        $('#waiting').show();
                        //$('#subcateg').html('hola');
                    },
                    success: function (respuesta) {
                        $('#waiting').hide();
                        var mostra = ''; 
                        if (respuesta) {
                            mostra += "<select class='form-control input-default' name='id_subcateg' id='id_subcateg'>";
                            for (data in respuesta.subs) {
                                mostra += "<option value="+respuesta.subs[data].id+">"+respuesta.subs[data].nom+"</option>";
                            }
                            mostra += "</select>";
                        }
                        $('#subcategorias').html(mostra);
                    }
            });
        } //final obtenerSubcategorias()

        //Obtener todos las subcategorias de una categoria concreta ---FORMU ALTA PRODUCTO---   
            function obtenerSubcategorias()
            {
                var dato = $('#selectsubcategorias').val();
                console.log(dato);
                $.ajax({
                    type: 'GET',
                    url: 'content_ajax',
                    data: {categoria: dato},
                    dataType: 'json',
                    beforeSend: function(){
                        $('#subcateg').empty();
                        $('#wait').show();
                        //$('#subcateg').html('hola');
                    },
                    success: function (respuesta) {
                        $('#wait').hide();
                        var mostra = ''; 
                        if (respuesta) {
        
                            mostra += "<select class='form-control input-lg' name='id_subcateg' id='id_subcateg'>";
                            for (data in respuesta.subs) {
                                mostra += "<option value="+respuesta.subs[data].id+">"+respuesta.subs[data].nom+"</option>";

                            }
                            mostra += "</select>";
                        }
                        $('#subcateg').html(mostra);
                    }
            }); //final metodo ajax
        } //final obtenerSubcategorias()

        //INDEX GENERAL PRODUCTOS
        /*Metodo para obtener y mostrar los productos de id de subcategoria concreta
            Sintaxis diferente porque el objeto con el listener es dinamico
        */

        function obtenerProductosAjax()
        {
             //e.preventDefault();
            //$valor = $(this).val();
            $valor = $('#id_subcateg').val();

            $.ajax({
                type: 'GET',
                url: 'showproductoajax',
                contentType: "image/png",
                data: {subcategoria: $valor},
                dataType: 'json',
                beforeSend: function(){
                    $('#contenidoajax').html('holaaa!!');
                },
                success: function (respuesta) {
                    var content="";
                    if(respuesta){
                        console.log('hay algo');
                        content+="<div id='links'>";
                        var titolo = $("select option:selected").html();
                        var titolo2 = $("#id_subcateg option:selected").html();
                        var titolgaleria = titolo2;
                        console.log(titolo);
                        for (data in respuesta.obs) {
                            /* version2 */
                            content+="<div class='col-xs-12 col-sm-6 col-md-4 col-lg-3'><div class='thumbnail'>";
                                content+="<a href='productos/"+respuesta.obs[data].id+"/imatge' title='"+titolo+" | "+titolgaleria+"' data-gallery>";
                                content += "<img class='img img-responsive img-rounded anchito' src='productos/"+respuesta.obs[data].id+"/imatge'/>";
                                content+="</a>";
                                if (titolo2 == 'TODO' || titolo2 == 'todo' || titolo2 == 'Todo') {
                                    titolo2 = "<i class='glyphicon glyphicon-asterisk'></i>";
                                }
                                content+="<h4 class='centrado'><span class='text-success'>"+titolo+"</span></h4>";
                                content+="<h4 class='centrado'>"+titolo2+"</h4>";
                                var nombre_foto = titolo.toLowerCase();
                                var nombre_foto2 = titolgaleria.toLowerCase();
                                //content+="<hr/>";
                                content += "<p><a href='productos/"+respuesta.obs[data].id+"/imatge' class='btn btn-success center-block' id='down' download='"+nombre_foto+"_"+nombre_foto2+"_"+respuesta.obs[data].id+".jpg'><i class='glyphicon glyphicon-cloud-download'></i> Descargar</a></p>";
                                content+="</div></div>";
                        }
                        content+='</div>';
                    }
                    $('#contenidoajax').html(content);
                }
            }); //final metodo ajax
        } //final funcion

});
