<?php

class IdiomasController extends BaseController
{
	/**
	* Gestión del cambio de idioma en toda la web, recibe un idioma por parametro, y guarda en la sesión "locale",
	* Cuando hay un cambio de idioma, se guarda la url acutal en una sesion, y una vez cambiado el idioma,
	* devuelve a la url en la que estaba el usuario. 
	* @param Es un string, el idioma.
	* @return Devuelve una redireccion a la url donde se cambio el idioma
	*/
	public function canviidioma($llengua)
	{
		Session::put('locale', $llengua);
		$destino = Session::get('url');
		return Redirect::to($destino);
	}




}