<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEntradasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('entradas', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->dateTime('entrada')->nullable();
			$table->dateTime('saida')->nullable();
			$table->float('total', 10, 0)->nullable();
			$table->integer('veiculos_id')->index('fk_entradas_veiculos_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('entradas');
	}

}
