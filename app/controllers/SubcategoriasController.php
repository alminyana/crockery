<?php

class SubcategoriasController extends \BaseController {
	
	/**
	 * Display a listing of the resource.
	 * GET /subcategorias
	 *
	 * @return Response
	 */
	public function index()
	{
		$categorias = Categorium::orderBy('nom','asc')->get();
		$subcategorias = Subcategorium::orderBy('nom','asc')->get();
		foreach($subcategorias as $sub) {
			$num = DB::table('productos')->where('id_subcateg',$sub->id)->count();
			$sub->numFotos = $num;
		}
		return View::make('subcategorias.index')->with('subcategorias',$subcategorias)->with('categorias',$categorias);
	}	

	/**
	 * Show the form for creating a new resource.
	 * GET /subcategorias/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$cats = Categorium::all()->lists('nom','id');
		asort($cats);
		$categorias = Categorium::orderBy('nom','asc')->get();
		$subcategorias = Subcategorium::orderBy('nom','asc')->get();
		foreach($subcategorias as $sub) {
			$num = DB::table('productos')->where('id_subcateg',$sub->id)->count();
			$sub->numFotos = $num;
		}
		return View::make('subcategorias.create')->with('cats',$cats)->with('categorias',$categorias)->with('subcategorias',$subcategorias);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /subcategorias
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make(Input::all(), Subcategorium::$rules);
		if($validator->passes()) {
			//guay
			$subcate = new Subcategorium();
			$subcate->nom = Input::get('nom');
			$subcate->id_categ = Input::get('categoria');
			$subcate->save();
			return Redirect::to('gestion')->with('message','Subcategoría creada con éxito');
		} else {
			return Redirect::to('subcategorias/create')->with('message','Han ocurrido los siguiente errores')
														->withErrors($validator)
														->withInput(Input::all());
		}
	}

	/**
	 * Display the specified resource.
	 * GET /subcategorias/{id}
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
	 * GET /subcategorias/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$sub = Subcategorium::find($id);
		$numFotos = DB::table('productos')->where('id_subcateg',$id)->count();
		return View::make('subcategorias.edit')->with('sub',$sub)->with('numFotos',$numFotos);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /subcategorias/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$subcategoria = Subcategorium::find($id);
		
		$validator = Validator::make(Input::all(), Subcategorium::$rules);

		if ($validator->passes()) {
			if ($subcategoria->nom == Input::get('nom') && $subcategoria->descripcio == Input::get('descripcio')) {
				return Redirect::to('subcategorias/'.$id.'/edit')->with('message', 'No has realizado ningún cambio')
												->withInput(Input::all());
			} else {

				$subcategoria->nom = Input::get('nom');
				$subcategoria->descripcio = Input::get('descripcio');
				$subcategoria->save();
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
	 * DELETE /subcategorias/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$subcategoria = Subcategorium::find($id);
		$subcategoria->delete();
		return Redirect::to('gestion')->with('message','Subcategoria '.$subcategoria->nom.' eliminada con éxito');
	}

}