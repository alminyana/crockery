<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('productos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->binary('imatge');
			$table->integer('id_categ')->unsigned()->index()->nullable();
			$table->integer('id_subcateg')->unsigned()->index()->nullable();
			$table->timestamps();
			$table->foreign('id_categ')->references('id')->on('categorias')->onDelete('cascade');
			$table->foreign('id_subcateg')->references('id')->on('subcategorias')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('productos');
	}

}
