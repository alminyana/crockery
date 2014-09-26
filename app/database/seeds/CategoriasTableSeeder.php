<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CategoriasTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
		Categorium::create([
			'nom' => 'ACITES',
			'descripcio' => ''
		]);
		Categorium::create([
			'nom' => 'ALPACA',
			'descripcio' => ''
		]);
		Categorium::create([
			'nom' => 'BANDEJAS',
			'descripcio' => ''
		]);
		Categorium::create([
			'nom' => 'BAR',
			'descripcio' => ''
		]);
		Categorium::create([
			'nom' => 'BARRO',
			'descripcio' => ''
		]);
		Categorium::create([
			'nom' => 'BÁSCULAS',
			'descripcio' => ''
		]);
		Categorium::create([
			'nom' => 'BATERÍAS DE COCINA',
			'descripcio' => ''
		]);
		Categorium::create([
			'nom' => 'BOTES DE COCINA',
			'descripcio' => ''
		]);
		Categorium::create([
			'nom' => 'BOWLS',
			'descripcio' => ''
		]);
		Categorium::create([
			'nom' => 'CAFETERAS',
			'descripcio' => ''
		]);
		Categorium::create([
			'nom' => 'CENTROS DE MESA',
			'descripcio' => ''
		]);
		Categorium::create([
			'nom' => 'COLADORES',
			'descripcio' => ''
		]);
		Categorium::create([
			'nom' => 'CRISTAL',
			'descripcio' => ''
		]);
		Categorium::create([
			'nom' => 'CUBIERTOS',
			'descripcio' => ''
		]);
		Categorium::create([
			'nom' => 'ELECTRODOMÉSTICOS',
			'descripcio' => ''
		]);
		Categorium::create([
			'nom' => 'EXPRIMIDORES',
			'descripcio' => ''
		]);
		Categorium::create([
			'nom' => 'FOGONES',
			'descripcio' => ''
		]);
		Categorium::create([
			'nom' => 'HERVIDORES Y TERMOS',
			'descripcio' => ''
		]);
		Categorium::create([
			'nom' => 'INOX',
			'descripcio' => ''
		]);
		Categorium::create([
			'nom' => 'JARRAS',
			'descripcio' => ''
		]);
		Categorium::create([
			'nom' => 'MADERA',
			'descripcio' => ''
		]);
		Categorium::create([
			'nom' => 'MANTELERÍA',
			'descripcio' => ''
		]);
		Categorium::create([
			'nom' => 'MORTEROS',
			'descripcio' => ''
		]);
		Categorium::create([
			'nom' => 'PANERAS',
			'descripcio' => ''
		]);
		Categorium::create([
			'nom' => 'PICAS DE COCINA',
			'descripcio' => ''
		]);
		Categorium::create([
			'nom' => 'PLANTAS Y FLORES',
			'descripcio' => ''
		]);
		Categorium::create([
			'nom' => 'PLÁSTICO Y ACRÍLICO',
			'descripcio' => ''
		]);
		Categorium::create([
			'nom' => 'RAFIA E INDIVIDUALES',
			'descripcio' => ''
		]);
		Categorium::create([
			'nom' => 'SARTENES',
			'descripcio' => ''
		]);
		Categorium::create([
			'nom' => 'SIFONES',
			'descripcio' => ''
		]);
		Categorium::create([
			'nom' => 'SOPERAS',
			'descripcio' => ''
		]);
		Categorium::create([
			'nom' => 'TABLAS DE CORTE',
			'descripcio' => ''
		]);
		Categorium::create([
			'nom' => 'TAZAS MUG',
			'descripcio' => ''
		]);
		Categorium::create([
			'nom' => 'TOSTADORAS',
			'descripcio' => ''
		]);
		Categorium::create([
			'nom' => 'UTENSILIOS DE COCINA',
			'descripcio' => ''
		]);
		Categorium::create([
			'nom' => 'VAJILLAS Y PLATOS',
			'descripcio' => ''
		]);
		Categorium::create([
			'nom' => 'VARIOS',
			'descripcio' => ''
		]);






		foreach(range(1, 4) as $index)
		{
			Categorium::create([
				'nom' => $faker->nom,
				'descripcio' => $faker->descripcio
			]);
		}
	}

}