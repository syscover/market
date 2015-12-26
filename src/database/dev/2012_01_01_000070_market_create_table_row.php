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
		if (!Schema::hasTable('012_115_row'))
		{
			Schema::create('012_115_row', function ($table) {
				$table->engine = 'InnoDB';

				$table->increments('id_115')->unsigned();
				$table->integer('order_115')->unsigned();


				$table->integer('product_115')->unsigned();
				$table->string('description_115');


				$table->decimal('discount_115', 10, 2)->nullable();
				$table->decimal('price_115', 10, 2)->nullable();
				$table->smallInteger('quantity_115')->unsigned();


				$table->text('data_115');

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
		if (Schema::hasTable('012_115_row'))
		{
			Schema::drop('012_115_row');
		}
	}
}