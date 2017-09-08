<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToEntradasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('entradas', function(Blueprint $table)
		{
			$table->foreign('veiculos_id', 'fk_entradas_veiculos')->references('id')->on('veiculos')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('entradas', function(Blueprint $table)
		{
			$table->dropForeign('fk_entradas_veiculos');
		});
	}

}
