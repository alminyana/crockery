$(document).ready(function(){

    /*new Gallery*/
    




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

    }
        //AJAX PARA OBTENER SUBCATEGORIAS EN VISTA CREATE-PRODUCTO
        $('#selectsubcategorias').change(obtenerSubcategorias);

        //AJAX PARA OBTENER SUBCATEGORIAS EN VISTA INDEX-GENERAL-PRODUCTO
        $('#indexcategorias').change(obtenerSubcategoriasIndex);

        $('body').on('change','#id_subcateg',obtenerProductosAjax);
        $('body').on('ready','#id_subcateg',obtenerProductosAjax);
        
        ///funcion para captura el evento de boton de subcategoria clicado para
            //añadir clase de boton clicado


        /**
            Al seleccionar un botón de subcategoria capturamos categ y subcateg de los elementos html
            y pintamos dinamicamente el titulo de la galeria.
            Llamamos a método ajax para obtener imágenes
        */
        $('body').on('click', '.xxxx', function (){
            
            $dato= this.attributes.iden.nodeValue;

            $('.xxxx').removeClass('active');
            $(this).addClass('active');
            var valor1 = $('#indexcategorias').find(":selected").text();
            var valor2 = $(this).html();

            var output = "<h3 class='text'><strong><small>CAT</small>&nbsp;" + valor1 + "&nbsp;&nbsp;|&nbsp;&nbsp;<small>SUB</small>&nbsp;" + valor2 + "</strong></h3>";
            var titulo = $('#titulogaleria').html(output);

            obtenerProductosAjaxBotonera($dato);
        });

        /**
            Añadir botones de subcategorias en lugar de selectbox
        */

        function pintarBotonesSubcategs(respuesta) {
                var botones="<div id='botonera'>";
                var ultimo;
                for (dato in respuesta.subs) {
                    /*if (respuesta.subs[dato].nom === "TODO") {
                        ultimo = "<btn href='' iden='" + respuesta.subs[dato].id + "' class='btn btn-block btn-default xxxx'>"+ respuesta.subs[dato].nom +"</btn>";
                    } else {
                        botones+= "<btn href='' iden='" + respuesta.subs[dato].id + "' class='btn btn-block btn-default xxxx'>"+ respuesta.subs[dato].nom +"</btn>";                        
                    }*/
                    botones+= "<btn href='#ancorrow' iden='" + respuesta.subs[dato].id + "' class='btn btn-block btn-default xxxx'>"+ respuesta.subs[dato].nom +"</btn>";                         
                }
                // botones += ultimo;

                botones+="</div>";
            return botones;
        }


        //Obtener todos las subcategorias de una categoria concreta --INDEX PRODUCTOS---
         function obtenerSubcategoriasIndex()
            {
                var dato = $('#indexcategorias').val();
                $.ajax({
                    type: 'GET',
                    url: 'productos/content_ajax',
                    data: {categoria: dato},
                    dataType: 'json',
                    beforeSend: function(){
                        // $('#subcategorias').empty();
                        // $('#waiting').show();
                       
                    },
                    success: function (respuesta) {
                        var newButtons = pintarBotonesSubcategs(respuesta);
                        $('#waiting').hide();
                        
                        var mostra = ''; 
                        if (respuesta) {
                            mostra += "<select class='form-control input-default' name='id_subcateg' id='id_subcateg'>";
                            for (data in respuesta.subs) {
                                mostra += "<option value="+respuesta.subs[data].id+">"+respuesta.subs[data].nom+"</option>";
                            }
                            mostra += "</select>";
                        }
                        /*$('#subcategorias').html(mostra);*/
                        $('#subcategorias').html(newButtons+"<hr/>");
                    }
            });
        } //final obtenerSubcategorias()

        //Obtener todos las subcategorias de una categoria concreta ---FORMU ALTA PRODUCTO---   
            function obtenerSubcategorias()
            {
                var dato = $('#selectsubcategorias').val();
                $.ajax({
                    type: 'GET',
                    url: 'content_ajax',
                    data: {categoria: dato},
                    dataType: 'json',
                    beforeSend: function(){
                        $('#subcateg').empty();
                        $('#wait').show();
                    },
                    success: function (respuesta) {
                        $('#wait').hide();
                        var mostra = ''; 
                        if (respuesta) {
        
                            mostra += "<select class='form-control' name='id_subcateg' id='id_subcateg'>";
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

                    var logoAjax = '<img src="/img/gif-load.gif" style="padding-top: 5em;" class="center-block"/>'
                    $('#contenidoajax').html(logoAjax);
                },
                success: function (respuesta) {
                    var content="";
                    if(respuesta){
                        content+="<div id='links'>";
                        var titolo = $("select option:selected").html();
                        var titoloPartido;
                        if (titolo == 'ELECTRODOMÉSTICOS' || titolo == 'ELECTRODOMESTICOS' || titolo == 'Electrodomésticos' || titolo == 'Electrodomesticos') {
                            titoloPartido = 'ELECTRODO-<br/>MÉSTICOS';
                        } else {
                            titoloPartido = titolo;
                        }
                        var titolo2 = $("#id_subcateg option:selected").html();
                        var titolgaleria = titolo2;
                        for (data in respuesta.obs) {
                            /* version 1 */                            
                            content+="<div class='col-xs-12 col-sm-6 col-md-4 col-lg-3 grid-filtro=''><div class='thumbnail'>";
                            content+="<a href='productos/"+respuesta.obs[data].id+"/imatge' title='"+titolo+" | "+titolgaleria+"' data-gallery>";
                            content += "<img class='img img-responsive img-rounded anchito' src='productos/"+respuesta.obs[data].id+"/imatge'/>";
                            content+="</a>";
                            if (titolo2 == 'TODO' || titolo2 == 'todo' || titolo2 == 'Todo') {
                                titolo2 = "<i class='glyphicon glyphicon-asterisk'></i>";
                            }
                            //content+="<h4 class='centrado'><span class='text-success'>"+titoloPartido+"</span></h4>";
                            //content+="<h4 class='centrado'>"+titolo2+"</h4>";
                            var nombre_foto = titolo.toLowerCase();
                            var nombre_foto2 = titolgaleria.toLowerCase();
                            //content+="<hr/>";
                            content += "<p><a href='productos/"+respuesta.obs[data].id+"/imatge' class='btn btn-success center-block' id='down' download='"+nombre_foto+"_"+nombre_foto2+"_"+respuesta.obs[data].id+".jpg'><i class='glyphicon glyphicon-cloud-download'></i> Descargar</a></p>";
                            content+="</div></div>";

                            /* version2 
                            content+="<div class='col-xs-12 col-sm-6 col-md-4 col-lg-3'><div class='thumbnail'>";
                            content += "<a href='productos/"+respuesta.obs[data].id+"/imatge'>";
                            content += "<img src='productos/"+respuesta.obs[data].id+"/imatge' />";
                            content += "</a>";
                            content += "</div></div>";*/
                        }
                        content+='</div>';
                    }
                    $('#contenidoajax').html(content);
                }
            }); //final metodo ajax
        } //final funcion







        ///obtener productos ajax al pulsar boton de subcategoria
        function obtenerProductosAjaxBotonera(valor)
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

                    var logoAjax = '<img src="/img/gif-load.gif" style="padding-top: 5em;" class="center-block"/>'
                    $('#contenidoajax').html(logoAjax);
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
                    $('#contenidoajax').html(content);
                }
            }); //final metodo ajax
        } //final funcion









});
