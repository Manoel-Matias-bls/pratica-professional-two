<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToVeiculosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('veiculos', function(Blueprint $table)
		{
			$table->foreign('categorias_id', 'fk_veiculos_categorias1')->references('id')->on('categorias')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('veiculos', function(Blueprint $table)
		{
			$table->dropForeign('fk_veiculos_categorias1');
		});
	}

}
