/*Metodo de la vista INSERTAR PRODUCTO
Al cargar una imagen en el formulario, muestra dicha imagen
*/
function readURL(input)
{
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                        //.width(100)
                        //.height(100);
                };

                reader.readAsDataURL(input.files[0]);
            }
}
