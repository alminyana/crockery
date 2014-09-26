<?php

class DescargasController extends \BaseController {

	public function descargarUnaImagen()
	{

	}
	public function descargarImagenes()
	{
		//una sola imagen
		

		
		//varias imagenes
		if (Input::has('filesd')) {
			$array=[];
			$files = Input::get('filesd');
				//dd($files);
			foreach ($files as $f) {
				$prod = Producto::find($f);
				$header = [
							'content-type' => 'image/jpg',
							'content-transfer-encoding' => 'binary'
				];
				$response = Response::make($prod->imatge, 200);
				
				$response->header('content-type', 'image/jpg');
				$response->header('content-transfer-encoding', 'binary');
				$response->header('content-disposition: attachment','filename="ppp.jpg"');
				$response->header('Content-Description', 'File Transfer');
				//var_dump($img);
			}
			//return $response;	
			
				
				//storage_path()storage_path()storage_path()

				return Response::download($prod, 'ppp.jpg',$headers);
				//return Response::download($response);
				//return Response::download($imatge);
		} else {
			return Redirect::to('productos')->with('message','No has seleccionado ninguna imagen')->with(Input::all());
		}
		

	}

}