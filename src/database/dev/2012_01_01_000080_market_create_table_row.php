<?php

use Illuminate\Database\Migrations\Migration;

class MarketCreateTableRow extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (!Schema::hasTable('012_116_row'))
		{
			Schema::create('012_116_row', function ($table) {
				$table->engine = 'InnoDB';

				$table->increments('id_116')->unsigned();
				$table->integer('order_116')->unsigned();


				$table->integer('product_116')->unsigned();
				$table->string('description_116');


				$table->decimal('discount_116', 10, 2)->nullable();
				$table->decimal('price_116', 10, 2)->nullable();
				$table->smallInteger('quantity_116')->unsigned();


				$table->text('data_116');

			});
		}
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		if (Schema::hasTable('012_116_row'))
		{
			Schema::drop('012_116_row');
		}
	}
}