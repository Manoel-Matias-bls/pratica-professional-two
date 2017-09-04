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
			$table->foreign('valores_id', 'fk_veiculos_valores')->references('id')->on('valores')->onUpdate('NO ACTION')->onDelete('NO ACTION');
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
			$table->dropForeign('fk_veiculos_valores');
		});
	}

}
