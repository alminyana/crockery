<?php

class ProductosController extends \BaseController {
	public function moverGrupo()
	{
		//recupero los values de los input-hidden
		$identificadores = Input::get('invisible');
		foreach($identificadores as $identi) {
			$foto = Producto::find($identi);
			//dd(Input::get('id_subcateg'));
			$foto->id_categ = Input::get('id_categ');
			$foto->id_subcateg = Input::get('id_subcateg');
			$foto->save();
		}
		return Redirect::to('productos/listar')->with('message','Imágenes movidas con éxito');

	}

	public function borrarGrupo()
	{
		$identif = Input::get('invisible');
		//dd($identif);
		foreach ($identif as $iden) {
			$prod = Producto::find($iden);
			$prod->delete();
		}
		return Redirect::to('productos/listar')->with('message','Imágenes eliminadas con éxito');
	}
	public function seleccionVarios()
	{
		$datos = Input::all();
		if(isset($datos['borrame1'])) {
			//dd("mover fotos");
			if (Input::has('selecto')) {

				$ides = Input::get('selecto');
				$id = array_only($ides, array(0));
				$categs = Categorium::all()->lists('nom','id');
				return View::make('productos/mover')->with('ides',$ides)->with('categs',$categs);

			} else {
				return Redirect::to('productos/listar')->with('message','No has marcado ninguna imagen!');
			}
		}

		if (isset($datos['borrame2'])) {
			//dd("borrar fotos");
			if (Input::has('selecto')) {
				$ides = Input::get('selecto');
				//dd($ides);
				return View::make('productos/borrargrupo')->with('ides',$ides);
			} else {
				return Redirect::to('productos/listar')->with('message','No has marcado ninguna imagen Jula!');
			}
		}

	}
	public function confirmarBorrado($id)
	{
		$foto = Producto::find($id);
		$sub = Subcategorium::find($foto->id_subcateg);
		$cat = Categorium::find($foto->id_categ);
		return View::make('productos.destroy')->with('foto',$foto)->with('sub',$sub)->with('cat',$cat);
	}
	public function listarGestionProductos()
	{
		if (Request::ajax()) {
			$sub = $_GET['subcategoria'];
			$obs = DB::table('productos')->where('id_subcateg',$sub)->select('id','id_subcateg')->get();
			$subcategoria = Subcategorium::find($sub);
			$numero = DB::table('productos')->where('id_subcateg',$sub)->count();
			return Response::json(array('obs'=>$obs,'subcategoria'=>$subcategoria,'numero'=>$numero));
		}
	}
	/**
	* Devuelve lista de productos de una subcategoría pasada con Ajax
	* @var ID de Subcategoría
	* @return Response formate JSon con las imágenes pertenecientes a dicha subcategoria
	*/
	public function obtenerProductos()
	{
		if (Request::ajax()) {
			$sub = $_GET['subcategoria'];
			$obs = DB::table('productos')->where('id_subcateg',$sub)->select('id','id_subcateg')->get();
			return Response::json(array('obs'=>$obs));
		}
	}
	/**
	 * Devuelve un json con el nombre de las subcategorias, de la categoria pasada por AJAX
	 *	@var  Identificador de la Categoria 
	 * @return Response json format Respuesta Ajax
	 */
	public function obtenerSub()
	{
		if (Request::ajax()){
			$categoria = $_GET['categoria'];
			//$subs = DB::table('subcategorias')->where('id_categ',$categoria)->select('nom','id')->get();
			$subs = Subcategorium::orderBy('nom','asc')->where('id_categ',$categoria)->select('nom','id')->get();
			//sleep(.5);
			return Response::json(array('subs'=>$subs));
		}
	}
	public function listarProductos()
	{
		$categorias = Categorium::orderBy('nom','asc')->lists('nom','id');
		return View::make('productos.listar')->with('categorias',$categorias);	
	}




	/**
	 * Display a listing of the resource.
	 * GET /productos
	 *
	 * @return Response
	 */
	public function index()
	{
		//$categorias = Categorium::all()->lists('nom','id')->orderBy('nom','asc');
		$categorias = Categorium::orderBy('nom','asc')->lists('nom','id');
		return View::make('productos.index')->with('categorias',$categorias);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /productos/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$categorias = Categorium::orderBy('nom','asc')->lists('nom','id');
		return View::make('productos.create')->with('categorias',$categorias);
	}

	/**
	 * Validación e inserción de datos en tabla productos
	 * POST /productos
	 *
	 * @return vista 
	 */
	public function store()
	{
		//dd(count(Input::file('imatge')));
		if(Input::hasFile('imatge')) {
			$fotos = Input::file('imatge');
			$validator = Validator::make($fotos, Producto::$reglas);
			if ($validator->passes()) {
				foreach($fotos as $f) {

					$producto = new Producto();
					$producto->id_categ = Input::get('id_categ');
					$producto->id_subcateg = Input::get('id_subcateg');
					//$ffoto = Image::make(Input::file('imatge')->getRealPath())->resize(570, null);
					//$ffoto = Image::make(Input::file('imatge')->getRealPath())->resize(1000, null, true, false);
					$ffoto = Image::make($f->getRealPath());
					
					$ffoto->resize(800, null, function ($constraint) {
					    $constraint->aspectRatio();
					});
					
					$producto->imatge = $ffoto;
					$producto->save();
				}

				/*  BLOQUE CODIGO FOTO A FOTO
						*/
				/*
				$producto = new Producto();
				$producto->id_categ = Input::get('id_categ');
				$producto->id_subcateg = Input::get('id_subcateg');
				//$ffoto = Image::make(Input::file('imatge')->getRealPath())->resize(570, null);
				//$ffoto = Image::make(Input::file('imatge')->getRealPath())->resize(1000, null, true, false);
				$ffoto = Image::make($fotos[0]->getRealPath());
				
				$ffoto->resize(800, null, function ($constraint) {
				    $constraint->aspectRatio();
				});
				
				$producto->imatge = $ffoto;
				$producto->save();
				*/
				return Redirect::to('gestion')->with('message','Imágenes guardada con éxito');
			} else {
				return Redirect::to('productos/create')->with('message', '<i class="glyphicon glyphicon-warning-sign izq"></i><span class="text-danger">El formato de imagen no és válido.</span>')
														->withErrors($validator);
			}
		} else {
			return Redirect::to('productos/create')->with('message', '<i class="glyphicon glyphicon-warning-sign izq"></i><span class="text-primary">Debes seleccionar al menos una imagen para insertar un producto</span>')
											->withInput(Input::all());
		}
		
	}

	/**
	 * Display the specified resource.
	 * GET /productos/{id}
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
	 * GET /productos/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$prod = Producto::find($id);
		$cat = Categorium::all()->lists('nom','id');
		//$sub = Subcategorium::all()->lists('nom','id');
		$sub = DB::table('subcategorias')->where('id_categ',$prod->id_categ)->lists('nom','id');
		return View::make('productos.edit')->with('prod',$prod)->with('cat',$cat)->with('sub',$sub);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /productos/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$producto = Producto::find($id);
		if (Input::get('id_categ')==$producto->id_categ && Input::get('id_subcateg')==$producto->id_subcateg) {
			return Redirect::back()->with('message','No has realizado ningún cambio');
		} else {
			$producto->id_categ = Input::get('id_categ');
			$producto->id_subcateg = Input::get('id_subcateg');
			$producto->save();
			return Redirect::to('gestion')->with('message','Operación realizada con éxito');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /productos/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$prod = Producto::find($id);
		//dd($prod);
		$prod->delete();
		return Redirect::to('productos/listar')->with('message','Imagen eliminada correctamente.');
	
	}

}