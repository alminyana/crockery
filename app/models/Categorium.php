<?php

class Categorium extends \Eloquent {
	/**
	 * La BD utilizada por el modelo
	 *
	 * @var string
	 */
	protected $table = 'categorias';
	protected $fillable = ['nom','descripcio','numFotos'];
	/**
	* Reglas de validación nueva Categoria
	*/
	public static $rules = array(
		'nom'=>'required|regex:/^[a-zA-Z0-9 -_]+$/|min:2',
		'descripcio'=>'min:2',
	);
}