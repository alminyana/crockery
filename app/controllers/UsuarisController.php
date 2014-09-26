<?php

class UsuarisController extends \BaseController {

	public function __construct() {
		$this->beforeFilter('auth',array('only'=>array('usuaris/login')));
    	$this->beforeFilter('csrf', array('on'=>'post'));
	}
	/**
	 * Método que dirige a la vista Formulario Login.
	 * @return Vista de formulario login..
	 */
	public function mostrarlogin()
	{
		return View::make('usuaris.login');
	}
	/**
	 * Método que realiza login, recoge mail y password del formulario y comprueba si es combinación correcta.
	 * Si es Ok de vuelve a vista de Usuarios con mensaje ok, sino, devuelve vista formulario login con mensaje
	 * de error.
	 * 
	 * @return vista index si es ok, o vista formulario si hay error.
	 */
	public function dologin()
	{
		//$remember = (Input::has('remember')) ? true : false;
		$auth = Auth::attempt(array('mail'=>Input::get('mail'), 'password'=>Input::get('password')));
		if ($auth) {
		    return Redirect::to('gestion')->with('message', '<i class="glyphicon glyphicon-ok izq izq"></i><span class="text-success">Hola <span class="blanco">'.Auth::user()->nom.'</span>, Loggin realizado con éxito.</span>');
		} else {
		    return Redirect::to('usuaris/login')

		        ->with('message', '<i class="glyphicon glyphicon-warning-sign izq"></i><span class="text-danger">'.Lang::get('textos.nocombina').'</span>')
		        ->withInput();
		}
	}
	/**
	 * Método logout. Se cierra automáticamente la sesión de usuario actual.
	 *
	 * @return vista de index usuaris con mensaje de logout confirmado.
	 */
	public function logout()
	{
		Auth::logout();
		return Redirect::to('usuaris/login')->with('message', '<i class="glyphicon glyphicon-ok izq izq"></i><span class="text-success">'.Lang::get('textos.logout').'</span>');
	}
	/**
	 * Display a listing of the resource.
	 * GET /usuaris
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /usuaris/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('usuaris.create');
	}

	/**
	 * Validación e inserción de los datos de registro de usuario
	 * POST /usuaris
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make(Input::all(), Usuari::$rules);
		if ($validator->passes()) {
			$usuari = new Usuari;
			$usuari->nom = Input::get('nom');
			$usuari->mail = Input::get('mail');
			$usuari->password = Hash::make(Input::get('password'));
			$usuari->save();
			return Redirect::to('usuaris/login')->with('message', '<i class="glyphicon glyphicon-ok izq"></i><span class="text-info">'.Lang::get('textos.registroexito').'</span>');
		} else {
			return Redirect::to('usuaris/create')->with('message',Lang::get('textos.errores'))
												->withErrors($validator)
												->withInput(Input::except('password'));
		}										
	}

	/**
	 * Display the specified resource.
	 * GET /usuaris/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /usuaris/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /usuaris/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /usuaris/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}