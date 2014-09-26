<?php

class Producto extends \Eloquent {
	/**
	 * La BD utilizada por el modelo
	 *
	 * @var string
	 */
	protected $table = 'productos';
	/**
	 * Los campos de la bd que puede utilizar eloquent
	 *
	 * @var array campos bd tabla productos
	 */
	protected $fillable = ['imatge','id_subcateg','id_categ'];
	/**
	* Reglas de validación del servidor para formu insertar producto
	*/
	public static $reglas = array(
		'id_categ' => 'integer',
		'id_subcateg' => 'integer',
		'imatge' => 'Image',
	);

}