<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class SubcategoriasTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
		Subcategorium::create([
			'nom' => 'Botes Modernos',
			'descripcio' => '',
			'id_categ' => 1,
		]);
		Subcategorium::create([
			'nom' => 'Botes Clásicos',
			'descripcio' => '',
			'id_categ' => 1,
		]);
		Subcategorium::create([
			'nom' => 'Tacoma Cuchillos',
			'descripcio' => '',
			'id_categ' => 1,
		]);
		Subcategorium::create([
			'nom' => 'Molinillos',
			'descripcio' => '',
			'id_categ' => 1,
		]);
		Subcategorium::create([
			'nom' => 'Ollas',
			'descripcio' => '',
			'id_categ' => 2,
		]);
		Subcategorium::create([
			'nom' => 'Sartenes',
			'descripcio' => '',
			'id_categ' => 2,
		]);
		Subcategorium::create([
			'nom' => 'Baterías',
			'descripcio' => '',
			'id_categ' => 2,
		]);
		Subcategorium::create([
			'nom' => 'Thermos',
			'descripcio' => '',
			'id_categ' => 2,
		]);
		Subcategorium::create([
			'nom' => 'Neveras',
			'descripcio' => '',
			'id_categ' => 3,
		]);
		Subcategorium::create([
			'nom' => 'Microhondas',
			'descripcio' => '',
			'id_categ' => 3,
		]);
		Subcategorium::create([
			'nom' => 'Batidoras',
			'descripcio' => '',
			'id_categ' => 3,
		]);
		Subcategorium::create([
			'nom' => 'Tostadoras',
			'descripcio' => '',
			'id_categ' => 3,
		]);
		Subcategorium::create([
			'nom' => 'Vajillas',
			'descripcio' => '',
			'id_categ' => 4,
		]);
		Subcategorium::create([
			'nom' => 'Cristal',
			'descripcio' => '',
			'id_categ' => 4,
		]);
		Subcategorium::create([
			'nom' => 'Loza',
			'descripcio' => '',
			'id_categ' => 4,
		]);
		Subcategorium::create([
			'nom' => 'Bowls',
			'descripcio' => '',
			'id_categ' => 4,
		]);



		foreach(range(1, 16) as $index)
		{
			Subcategorium::create([
				'nom' => $faker->nom,
				'descripcio' => $faker->descripcio
			]);
		}
	}

}