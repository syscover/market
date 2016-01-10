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
		if (!Schema::hasTable('012_117_row'))
		{
			Schema::create('012_117_row', function ($table) {
				$table->engine = 'InnoDB';

				$table->increments('id_117')->unsigned();
				$table->integer('order_117')->unsigned();


				$table->integer('product_117')->unsigned();
				$table->string('description_117');


				$table->decimal('discount_117', 10, 2)->nullable();
				$table->decimal('price_117', 10, 2)->nullable();
				$table->smallInteger('quantity_117')->unsigned();


				$table->text('data_117');

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
		if (Schema::hasTable('012_117_row'))
		{
			Schema::drop('012_117_row');
		}
	}
}