<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsuarisTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
		Usuari::create([
			'mail' => '',
			'nom' => '',
			'rol' =>,
			'password' => 
		]);
		Usuari::create([
			'mail' => '',
			'nom' => '',
			'rol' =>,
			'password' => 
		]);

		foreach(range(1, 2) as $index)
		{
			Usuari::create([
				'mail' => $faker->mail,
				'nom' => $faker->nom,
				'rol' => $faker->rol,
				'password' => $faker->password
			]);
		}
	}

}