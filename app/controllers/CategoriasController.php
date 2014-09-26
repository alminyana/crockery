<?php

class CategoriasController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /categorias
	 *
	 * @return Response
	 */
	public function index()
	{
		//$categorias = Categorium::all();
		$categorias = Categorium::orderBy('nom','asc')->get();
		foreach ($categorias as $cat) {
			$num = DB::table('productos')->where('id_categ',$cat->id)->count();
			$cat->numFotos = $num;
		}
		$subcategorias = Subcategorium::orderBy('nom','asc')->get();
		return View::make('categorias.index')->with('categorias',$categorias)->with('subcategorias',$subcategorias);
		//return View::make('categorias.index')->with('categorias',$categorias);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /categorias/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$categorias = Categorium::orderBy('nom','asc')->get();
		foreach ($categorias as $cat) {
			$numero = DB::table('productos')->where('id_categ',$cat->id)->count();
			$cat->numFotos = $numero;
		}
		$subcategorias = Subcategorium::orderBy('nom','asc')->get();
		return View::make('categorias.create')->with('categorias',$categorias)->with('subcategorias',$subcategorias);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /categorias
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make(Input::all(), Categorium::$rules);
		if ($validator->passes()) {
			$categoria = new Categorium;
			$categoria->nom = Input::get('nom');
			$categoria->save();
			return Redirect::to('gestion')->with('message','Categoría guardada con éxito');
		} else {
			return Redirect::to('categorias/create')->with('message','Han ocurrido un error')
													->withErrors($validator)
													->withInput(Input::all());
		}
	}

	/**
	 * Display the specified resource.
	 * GET /categorias/{id}
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
	 * GET /categorias/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$categoria = Categorium::find($id);
		$subs = DB::table('subcategorias')->where('id_categ',$id)->get();
		return View::make('categorias.edit')->with('categoria',$categoria)->with('subs',$subs);
	}

	/**
	 * Update the specified resource in st->select('nom')rage.
	 * PUT /categorias/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$categoria = Categorium::find($id);
		
		$validator = Validator::make(Input::all(), Categorium::$rules);

		if ($validator->passes()) {
			if ($categoria->nom == Input::get('nom') && $categoria->descripcio == Input::get('descripcio')) {
				return Redirect::to('categorias/'.$id.'/edit')->with('message', 'No has realizado ningún cambio')
												->withInput(Input::all());
			} else {

				$categoria->nom = Input::get('nom');
				$categoria->descripcio = Input::get('descripcio');
				$categoria->save();
				return Redirect::to('gestion')->with('message','Cambios realizados con éxito');
				//dd($categoria);
			}
		} else {
			return Redirect::to('categorias/'.$id.'/edit')->with('message','Han ocurrido los siguientes errores')
															->withErrors($validator)
															->withInput(Input::all());
		}
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /categorias/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$categoria = Categorium::find($id);
		$categoria->delete();
		return Redirect::to('gestion')->with('message','Categoria '.$categoria->nom.' eliminada con éxito');
	}

}