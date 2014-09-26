<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsuarisTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('usuaris', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nom');
			$table->string('password');
			$table->string('mail')->unique();
			$table->integer('rol')->default(1);
			$table->text('remember_token')->nullable();
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('usuaris');
	}

}
