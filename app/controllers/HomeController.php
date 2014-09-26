<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
	public function __construct() {
		$this->beforeFilter('auth',array('only'=>array('contacto','index','logo','sobremi')));
	}
	/**
	* Devuelve la vista de index principal
	*/
	public function wellcome()
	{
		//return View::make('home.index');
		return View::make('home.logo');
	}
	public function showindex()
	{
		return View::make('home.index');
	}
	public function showcontacto()
	{
		return View::make('home.contacto');
	}
	public function showsobremi()
	{
		return View::make('home.sobremi');
	}
	public function gestion()
	{
		if (Auth::user()) {
			return View::make('home.gestion');
		} else {
			return Redirect::to('usuaris/login')->with('message','Necesitas estar logueado para acceder al menú de gestión de Crockery');
		}
	}

}
