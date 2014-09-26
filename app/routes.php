<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
//Cada cambio de ruta, miro el idioma guradado en sesión y lo seteoa en 'locale'(idioma por defecto).
if(Session::has('locale')) {
	App::setLocale(Session::get('locale'));
}


//LOGO PRINCIPAL
Route::get('/', 'HomeController@wellcome');
//INDEX PRINCIPAL
Route::get('index','HomeController@showindex');
//CONTACTO
Route::get('contacto','HomeController@showcontacto');
//SOBRE MI
Route::get('sobremi','HomeController@showsobremi');
//MENU ADMIN-GESTION
Route::get('gestion','HomeController@gestion');
//FORMU LOGIN
Route::get('usuaris/login', 'UsuarisController@mostrarlogin');			
//POST LOGIN
Route::post('usuaris/login', 'UsuarisController@dologin');
//LOGOUT
Route::get('usuaris/logout', 'UsuarisController@logout');


//SELECCIONAR GRUPO DE IMAGENES
Route::post('productos/mover', 'ProductosController@seleccionVarios');
//BORRAR GRUPO DE FOTOS
Route::post('productos/borrargrupo','ProductosController@borrarGrupo');
//MOVER GRUPO DE IMAGENES
Route::post('productos/movergrupo','ProductosController@moverGrupo');

//CANVI IDIOMA
/**
* Ruta que pasa por parámetro el nuevo idioma y llama al método del Controlador de Idiomas
*/
Route::get('idioma/{llengua}', 'IdiomasController@canviidioma');

//ELIMINAR PRODUCTO
Route::get('productos/{id}/destroy','ProductosController@confirmarBorrado');

//RUTA IMAGENES PRODUCTOS
Route::get('productos/{id}/imatge', function($id)
{
	$produc = Producto::find($id);
	$response = Response::make($produc->imatge, 200);
	$response->header('content-type', 'image/jpg');
	return $response;
});

//PRODUCTOS RUTAS AJAX
//ruta para obtener subcategorias en el menu editar/mover imagen
Route::get('filtrosubcategorias', 'ProductosController@obtenerSub');

//ruta que devuelve un json con los usuarios de la base de datos
Route::get('productos/content_ajax','ProductosController@obtenerSub');
//ruta que devuelve un json con los productos de una subcategoria concreta
Route::get('showproductoajax','ProductosController@obtenerProductos');
//ruta ajax obtener subcategoria y sus imagenes en listar gestion productos
Route::get('listargestion','ProductosController@listarGestionProductos');

//ruta listado de productos en menu gestioin
Route::get('productos/listar','ProductosController@listarProductos');

// ---------------------     RUTAS RESOURCE -------------------
Route::resource('usuaris','UsuarisController');
Route::resource('productos','ProductosController');
Route::resource('categorias','CategoriasController');
Route::resource('subcategorias','SubcategoriasController');

