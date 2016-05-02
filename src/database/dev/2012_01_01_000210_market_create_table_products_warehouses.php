<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MarketCreateTableProductsWarehouses extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (! Schema::hasTable('012_131_products_warehouses'))
		{
			Schema::create('012_131_products_warehouses', function (Blueprint $table) {
				$table->engine = 'InnoDB';

				$table->integer('product_131')->unsigned();
				$table->integer('warehouse_131')->unsigned();
				$table->decimal('quantity_131', 10, 2); // number units

				$table->primary(['product_131', 'warehouse_131']);
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
		if (Schema::hasTable('012_131_products_warehouses'))
		{
			Schema::drop('012_131_products_warehouses');
		}
	}
}