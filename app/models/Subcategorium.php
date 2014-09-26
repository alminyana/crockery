<?php

class Subcategorium extends \Eloquent {
	protected $table = 'subcategorias';
	protected $fillable = ['nom','descripcio','id_categ','numFotos'];

	/**
	* Reglas de validación nueva Subcategoria
	*/
	public static $rules = array(
		'nom'=>'required|regex:/^[a-zA-Z0-9 -_]+$/|min:2',
		'descripcio'=>'min:2',
	);


}